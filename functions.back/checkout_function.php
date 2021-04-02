<?php

//add_action('woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice_pop');
add_action('woocommerce_checkout_before_order_review', 'bbloomer_checkout_radio_choice_pop');

function bbloomer_checkout_radio_choice_pop()
{
    $chosen = WC()->session->get('radio_chosen_pop');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_pop') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;

    $args = array(
        'type' => 'radio',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            '69000' => '준비기',
            '139000' => '중기',
            '149000' => '초기',
        ),
        'default' => $chosen
    );

    echo '<div id="checkout-popup" class="js-checkout-popup">';
    echo '<div id="checkout-radio">';
    woocommerce_form_field('radio_choice_pop', $args, $chosen);
    echo '</div></div>';
}

add_action('woocommerce_cart_calculate_fees', 'bbloomer_checkout_radio_choice_fee_pop', 20, 1);

function bbloomer_checkout_radio_choice_fee_pop($cart)
{

    if (is_admin() && !defined('DOING_AJAX')) return;

    $radio = WC()->session->get('radio_chosen_pop');

    if ($radio) {
        $cart->add_fee('tests', $radio);
    }
}

add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_pop');

function bbloomer_checkout_radio_choice_set_session_pop($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_pop'])) {
        WC()->session->set('radio_chosen_pop', $output['radio_choice_pop']);
    }
}

///
add_action('woocommerce_checkout_before_order_review', 'bbloomer_checkout_radio_choice_dis');
//add_action('woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice_dis');

function bbloomer_checkout_radio_choice_dis()
{
    $chosen = WC()->session->get('radio_chosen_dis');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_dis') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;

    $args = array(
        'type' => 'select',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            '0' => '일반',
            '20' => '20',
            '30' => '30',
        ),
        'default' => $chosen
    );

    echo '<div id="checkout-popup" class="js-checkout-popup">';
    echo '<div id="checkout-radio">';
    woocommerce_form_field('radio_choice_dis', $args, $chosen);
    echo '</div></div>';
}

add_action('woocommerce_cart_calculate_fees', 'bbloomer_checkout_radio_choice_fee_dis', 20, 1);

function bbloomer_checkout_radio_choice_fee_dis($cart)
{

    if (is_admin() && !defined('DOING_AJAX')) return;
    $radioz = WC()->session->get('radio_chosen_dis');

    $fee_object = $cart->fees_api();
    $allfeedata = $fee_object->get_fees();
    $totalfee = array_sum(array_column($allfeedata, 'amount'));

    if ($radioz == '0') {
        $selectedproduct = 7634;
        $selectedproducts = 7653;
        $product_cart_id = $cart->generate_cart_id($selectedproduct);
        if(!$cart->find_product_in_cart ($product_cart_id)){
            $cart->empty_cart();
            $cart->add_to_cart( $selectedproduct );
        }
    } else {
        $selectedproduct = 7653;
        $selectedproducts = 7634;
        $product_cart_id = $cart->generate_cart_id($selectedproduct);
        if(!$cart->find_product_in_cart ($product_cart_id)){
            $cart->empty_cart();
            $cart->add_to_cart( $selectedproduct );
        }
    }

    $discount_total = absint($totalfee) * (absint($radioz) / 100);


    if ($radioz) {
        $cart->add_fee('할인', -$discount_total, false, 'standard');
    }
}

add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_dis');

function bbloomer_checkout_radio_choice_set_session_dis($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_dis'])) {
        WC()->session->set('radio_chosen_dis', $output['radio_choice_dis']);
    }
}



//

