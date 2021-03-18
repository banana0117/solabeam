add_action('woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice');

function bbloomer_checkout_radio_choice()
{

    $chosen = WC()->session->get('radio_chosen');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;

    $args = array(
        'type' => 'radio',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            '0' => 'No Option',
            '1' => 'test',
            '2' => 'test2',
        ),
        'default' => $chosen
    );

    echo '<div id="checkout-radio">';
    echo '<h3>Customize Your Order!</h3>';
    woocommerce_form_field('radio_choice', $args, $chosen);
    echo '</div>';
}

add_action('woocommerce_cart_calculate_fees', 'bbloomer_checkout_radio_choice_fee', 20, 1);

function bbloomer_checkout_radio_choice_fee($cart)
{

    if (is_admin() && !defined('DOING_AJAX')) return;

    $radio = WC()->session->get('radio_chosen');

    if ($radio) {
        $cart->add_fee('옵션1', $radio);
    }
}

add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session');

function bbloomer_checkout_radio_choice_set_session($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice'])) {
        WC()->session->set('radio_chosen', $output['radio_choice']);
    }
}