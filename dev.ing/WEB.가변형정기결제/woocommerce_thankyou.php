<?php
    add_action( 'woocommerce_thankyou', 'banana_change_payment_subscription' );
    function banana_change_payment_subscription( $order_id ) {
        if ( wcs_order_contains_subscription( $order_id ) ) { // 주문내역에 정기배송 상품이 있을경우
            $order = new WC_Order( $order_id ); 
        
            $subscription_id = $order_id + 1;

            $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
            
        }
    }

    if ( wcs_order_contains_subscription( $order_id ) ) {
        $subid = $order_id + 1;
    
        $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
    
        $current_user = wp_get_current_user();
        $news_user_id = $current_user -> user_login;
        $new_user_day = get_post_meta( $subid, 'deliday', true );
        $new_user_date = get_post_meta ( $subid, 'dtwc_delivery_date', true);
        $newz_user_phone = get_post_meta ( $subid, '_shipping_phone', true );
        $new_user_phone = preg_replace("/[^0-9]/","",$newz_user_phone);
        $new_user_address_1 = get_post_meta ( $subid, '_shipping_address_1', true );
        $new_user_address_2 = get_post_meta ( $subid, '_shipping_address_2', true );
        $new_user_address = $new_user_address_1." ".$new_user_address_2 ;
        $new_user_postcode = get_post_meta ( $subid, '_shipping_postcode', true );
        $new_user_name = get_post_meta ( $subid, '_shipping_first_name', true );
    
        $message_query="SELECT post_excerpt FROM wp_posts WHERE ID = '$order_id'";
        $message_result = mysqli_query($mysqli,$message_query);
        $message_row = mysqli_fetch_array($message_result);
        $deli_message = $message_row[post_excerpt];
    
        $limitdate = date("Y-m-d",strtotime("+1 month", strtotime($new_user_date)));
    
        $new_user_status = "wc-processing";
        $normal_auth = 0;
    
        $order = new WC_Order( $order_id );
        foreach( $order->get_items() as $item_id => $item ){
            $product = $item->get_product();
            $product_id = $item->get_product_id();
            $product_names[] = $item->get_name();
        }

        $opt_meta = $opt_meta_5.$opt_meta_4.$opt_meta_3.$opt_meta_2.$opt_meta_1.$opt_meta_6.$opt_meta_7;
    
        $new_user_query = "INSERT INTO userbase (userid, username, phone, address, delidate, deliday, postcode, membership, firstperiod, opt, limitday, message ) VALUES ('$news_user_id','$new_user_name','$new_user_phone','$new_user_address','$new_user_date', '$new_user_day', '$new_user_postcode','$product_meta', '$period_meta','$opt_meta','$limitdate','$deli_message')";
        mysqli_query($mysqli, $new_user_query);
    
        if (empty($product_etc)) {
            
        } else {
            $new_etc_query = "INSERT INTO normalorder (userid, username, phone, address, postcode, status, period, orderid,quantity) VALUES ('$news_user_id','$new_user_name','$new_user_phone','$new_user_address','$new_user_postcode','$new_user_status','$product_etc','$order_id','$product_qua')";
            mysqli_query($mysqli, $new_etc_query);
        }
        
        mysqli_close($mysqli);
    