<?php

//신규 서브스크립션 생성시
add_action('woocommerce_thankyou','bana_new_subscription_action');

function bana_new_subscription_action(){

    if ( wcs_order_contains_subscription( $order_id ) ) {
        $subid = $order_id + 1;
    
        $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
    
        $current_user = wp_get_current_user();
        $news_user_id = $current_user -> user_login;
        $new_user_date = get_post_meta ( $subid, 'dtwc_delivery_date', true);

        // 경우의수
        $table_category = "SELECT * FROM userbase WHERE userid = '$news_user_id'";

        // 시기
        $new_period = ["준비기","초기","중기","후기","완료기","유아기"];
        $date_period = ["44","40","36","24","12","12"];

        $user_period = array_search($new_user_period, $new_period);

        

        // 날짜
        
        
        $i = 0;
        while($i < $date_period[$user_period]){

            $new_user_date =  date('Y-m-d',strtotime($new_user_date.'+7days'));
            $date_array[$i] = $new_user_date;

        }


    $querys = "INSERT INTO userTest (userid, name, deliday, opt) VALUES ('$news_user_id','$new_user_phone','$new_user_name','$new_user_address')";
    mysqli_query($mysqli, $querys)
    }
}