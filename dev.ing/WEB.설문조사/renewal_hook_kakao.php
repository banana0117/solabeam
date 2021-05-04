<?php

function banana_renewal_kakao_send($subscription, $order){

    $order_id = $order->get_id();

$newz_user_phone = get_post_meta($order_id, '_billing_phone', true);
$new_user_phone = preg_replace("/[^0-9]/", "", $newz_user_phone);
$new_user_name = get_post_meta($order_id, '_billing_first_name', true);



}

add_action('woocommerce_subscription_renewal_payment_complete', 'banana_renewal_kakao_send');
