<?php
//패키지부분
add_action('woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice_point', 38, 1);

function bbloomer_checkout_radio_choice_point()
{
    $chosen = WC()->session->get('radio_chosen_point');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_point') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;

    $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
    $current_user = wp_get_current_user();
    $news_user_id = $current_user->user_login;

    $pointz = 0;
    $query = "SELECT * FROM userTest WHERE userid = '$news_user_id'";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_array($result)) {
        $pointz = $pointz + $row[opt];
    }

    $args = array(
        'type' => 'number',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'custom_attributes' => array(
            'min'       =>  0,
            'max'       =>  $pointz,
        ),
        'placeholder' => __('0'),
        'default' => $chosen
    );

    echo '<div>';
    woocommerce_form_field('radio_choice_point', $args, $chosen);
    echo '<p>보유중 적립금 '.$pointz.'</p>';
    echo '<script>
    $( "#radio_choice_point" ).change(function() {
        var max = '.$pointz.';
        var min = 0;
        if ($(this).val() > max)
        {
            $(this).val(max);
        }
        else if ($(this).val() < min)
        {
            $(this).val(min);
        }       
      });</script>
      ';
    
    echo '</div>';
}

add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_point');

function bbloomer_checkout_radio_choice_set_session_point($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_point'])) {
        WC()->session->set('radio_chosen_point', $output['radio_choice_point']);
    }
}

add_action('woocommerce_cart_calculate_fees', 'bbloomer_checkout_radio_choice_fee', 20, 1);

function bbloomer_checkout_radio_choice_fee($cart)
{
  $pointly = WC()->session->get('radio_chosen_point');
  $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
  $current_user = wp_get_current_user();
  $news_user_id = $current_user->user_login;
  $pointz = 0;
  $query = "SELECT * FROM userTest WHERE userid = '$news_user_id'";
  $result = mysqli_query($mysqli, $query);
  while ($row = mysqli_fetch_array($result)) {
      $pointz = $pointz + $row[opt];
  }

    if($pointly){

        if($pointly >= $pointz){
            $pointly = $pointz;   
        }

        $cart->add_fee('적립금할인', -$pointly, false, 'standard');
    }
}