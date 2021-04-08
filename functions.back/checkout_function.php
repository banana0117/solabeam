<?php

//시기선택부분
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
            '79000' => '초기',
            '169000' => '중기',
            '239000' => '후기',
            '249000' => '완료기',
            '199000' => '유아기',
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

    if ($radio == "69000") {
        $period_label = "준비기이유식";
    } elseif ($radio == "79000") {
        $period_label = "초기이유식";
    } elseif ($radio == "169000") {
        $period_label = "중기이유식";
    } elseif ($radio == "239000") {
        $period_label = "후기이유식";
    } elseif ($radio == "249000") {
        $period_label = "완료기이유식";
    } elseif ($radio == "199000") {
        $period_label = "유아기";
    }

    if ($radio) {
        $cart->add_fee($period_label, $radio);
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

//식단선택부분
add_action('woocommerce_checkout_before_order_review', 'bbloomer_checkout_radio_choice_table');

function bbloomer_checkout_radio_choice_table()
{
    $chosen = WC()->session->get('radio_chosen_table');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_table') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;

    $args = array(
        'type' => 'radio',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            'a' => '균형식단',
            'b' => '안전식단',
            'c' => '단백질식단',
            'd' => '다양식단',
            'e' => '내맘대로식단',
            'f' => '맞춤형식단',
        ),
        'default' => $chosen
    );

    echo '<div id="checkout-table" class="js-checkout-table">';
    echo '<div id="checkout-radio">';
    woocommerce_form_field('radio_choice_table', $args, $chosen);
    echo '</div></div>';
}

add_action('woocommerce_cart_calculate_fees', 'bbloomer_checkout_radio_choice_fee_table', 20, 1);

function bbloomer_checkout_radio_choice_fee_table($cart)
{
    if (is_admin() && !defined('DOING_AJAX')) return;

    $radio_table = WC()->session->get('radio_chosen_table');

    if ($radio_table == "a") {
        $period_label = "균형식단";
    } elseif ($radio_table == "b") {
        $period_label = "안전식단";
    } elseif ($radio_table == "c") {
        $period_label = "단백질식단";
    } elseif ($radio_table == "d") {
        $period_label = "다양식단";
    }

    if ($radio_table) {
        $cart->add_fee($period_label, "0");
    }
}

add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_table');

function bbloomer_checkout_radio_choice_set_session_table($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_table'])) {
        WC()->session->set('radio_chosen_table', $output['radio_choice_table']);
    }
}

//옵션선택부분 - 슈퍼푸드
add_action('woocommerce_checkout_before_order_review', 'bbloomer_checkout_radio_choice_opt_super');
function bbloomer_checkout_radio_choice_opt_super()
{
    $chosen = WC()->session->get('radio_chosen_opt_super');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_opt_super') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;

    $args = array(
        'type' => 'radio',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            '15000' => '슈퍼푸드1',
        ),
        'default' => $chosen
    );

    echo '<div id="option-box" class="option-box js-option-box">';
    echo '<div id="super-option-box" class="super-option-box">';
    woocommerce_form_field('radio_choice_opt_super', $args, $chosen);
    echo '</div>';
}

add_action('woocommerce_cart_calculate_fees', 'bbloomer_checkout_radio_choice_fee_opt_super', 20, 1);

function bbloomer_checkout_radio_choice_fee_opt_super($cart)
{
    if (is_admin() && !defined('DOING_AJAX')) return;

    $radio_opt_super = WC()->session->get('radio_chosen_opt_super');
    $radio = WC()->session->get('radio_chosen_pop');

    if ($radio == "69000") {
        $super_pay = "15000";
    } elseif ($radio == "79000") {
        $super_pay = "25000";
    } elseif ($radio == "169000") {
        $super_pay = "35000";
    } elseif ($radio == "239000") {
        $super_pay = "45000";
    } elseif ($radio == "249000") {
        $super_pay = "55000";
    } elseif ($radio == "199000") {
        $super_pay = "66000";
    }

    if ($radio_opt_super) {
        $cart->add_fee('슈퍼푸드추가', $super_pay);
    }
}

add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_opt_super');

function bbloomer_checkout_radio_choice_set_session_opt_super($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_opt_super'])) {
        WC()->session->set('radio_chosen_opt_super', $output['radio_choice_opt_super']);
    }
}

///
//옵션선택부분 - 재료2
add_action('woocommerce_checkout_before_order_review', 'bbloomer_checkout_radio_choice_opt_mate');
function bbloomer_checkout_radio_choice_opt_mate()
{
    $chosen = WC()->session->get('radio_chosen_opt_mate');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_opt_mate') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;

    $args = array(
        'type' => 'radio',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            '15000' => '슈퍼푸드2',
        ),
        'default' => $chosen
    );

    echo '<div id="mate-option-box" class="mate-option-box">';
    woocommerce_form_field('radio_choice_opt_mate', $args, $chosen);
    echo '</div>';
}

add_action('woocommerce_cart_calculate_fees', 'bbloomer_checkout_radio_choice_fee_opt_mate', 20, 1);

function bbloomer_checkout_radio_choice_fee_opt_mate($cart)
{
    if (is_admin() && !defined('DOING_AJAX')) return;

    $radio_opt_mate = WC()->session->get('radio_chosen_opt_mate');
    $radio = WC()->session->get('radio_chosen_pop');

    if ($radio == "69000") {
        $mate_pay = "15000";
    } elseif ($radio == "79000") {
        $mate_pay = "25000";
    } elseif ($radio == "169000") {
        $mate_pay = "35000";
    } elseif ($radio == "239000") {
        $mate_pay = "45000";
    } elseif ($radio == "249000") {
        $mate_pay = "55000";
    } elseif ($radio == "199000") {
        $mate_pay = "66000";
    }

    if ($radio_opt_mate) {
        $cart->add_fee('슈퍼푸드2추가', $mate_pay);
    }
}

add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_opt_mate');

function bbloomer_checkout_radio_choice_set_session_opt_mate($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_opt_mate'])) {
        WC()->session->set('radio_chosen_opt_mate', $output['radio_choice_opt_mate']);
    }
}

///



//패키지부분
add_action('woocommerce_checkout_before_order_review', 'bbloomer_checkout_radio_choice_dis');

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
        if (!$cart->find_product_in_cart($product_cart_id)) {
            $cart->empty_cart();
            $cart->add_to_cart($selectedproduct);
        }
    } else {
        $selectedproduct = 7653;
        $selectedproducts = 7634;
        $product_cart_id = $cart->generate_cart_id($selectedproduct);
        if (!$cart->find_product_in_cart($product_cart_id)) {
            $cart->empty_cart();
            $cart->add_to_cart($selectedproduct);
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