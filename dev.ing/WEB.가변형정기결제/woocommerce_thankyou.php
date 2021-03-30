<?php
add_action('woocommerce_thankyou', 'banana_change_payment_subscription');
function banana_change_payment_subscription($order_id)
{
    if (wcs_order_contains_subscription($order_id)) { // 주문내역에 정기배송 상품이 있을경우
        $order = new WC_Order($order_id);

        $subid = $order_id + 1;

        $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

        $current_user = wp_get_current_user();
        $news_user_id = $current_user->user_login;
        $new_user_day = get_post_meta($subid, 'deliday', true);
        $new_user_date = get_post_meta($subid, 'dtwc_delivery_date', true);
        $newz_user_phone = get_post_meta($subid, '_shipping_phone', true);
        $new_user_phone = preg_replace("/[^0-9]/", "", $newz_user_phone);
        $new_user_address_1 = get_post_meta($subid, '_shipping_address_1', true);
        $new_user_address_2 = get_post_meta($subid, '_shipping_address_2', true);
        $new_user_address = $new_user_address_1 . " " . $new_user_address_2;
        $new_user_postcode = get_post_meta($subid, '_shipping_postcode', true);
        $new_user_name = get_post_meta($subid, '_shipping_first_name', true);

        $message_query = "SELECT post_excerpt FROM wp_posts WHERE ID = '$order_id'";
        $message_result = mysqli_query($mysqli, $message_query);
        $message_row = mysqli_fetch_array($message_result);
        $deli_message = $message_row[post_excerpt];

        $limitdate = date("Y-m-d", strtotime("+1 month", strtotime($new_user_date)));
        $next_payday = date("Y-m-d", strtotime("+4 weeks", strtotime($new_user_date)));

        $reco_query = "SELECT meta_value FROM wp_postmeta WHERE post_id = '$subid' AND meta_key = 'recommedid'";
        $reco_result = mysqli_query($mysqli, $reco_query);
        $reco_row = mysqli_fetch_array($reco_result);
        $reco_id = $reco_row[meta_value];

        $dip = 0;

        $fee_option_query = "SELECT * FROM wp_woocommerce_order_items WHERE order_id = '$subid' AND order_item_type = 'fee'";
        $fee_option_result = mysqli_query($mysqli, $fee_option_query);
        while ($fee_option_row = mysqli_fetch_array($fee_option_result)) {

            $select_opt[$dip] = $fee_option_row[order_item_name];
            $dip++;
        }

        $choice_period = $select_opt[0];
        $choice_table = $select_opt[1];
        $dip_count = count($select_opt);
        $dip_roop = 2;

        while ($dip_roop > $dip_count) {
            if (empty($select_opt[$dip_roop])) {
            } else {
                
                if(strpos($select_opt[$dip_roop],"슈퍼푸드1") !== false ){
                    $select_super = $select_opt[$dip_roop];
                } elseif(strpos($select_opt[$dip_roop],"슈퍼푸드2") !== false ) {
                    $select_mate = $select_opt[$dip_roop];
                } elseif(strpos($select_opt[$dip_roop],"고기추가") !== false ) {
                    $select_beef = $select_opt[$dip_roop];
                } elseif(strpos($select_opt[$dip_roop],"안심소고기변경") !== false ) {
                    $select_tenloin = $select_opt[$dip_roop];
                } elseif(strpos($select_opt[$dip_roop],"육수추가") !== false ) {
                    $select_water = $select_opt[$dip_roop];
                } elseif(strpos($select_opt[$dip_roop],"주말팩") !== false ) {
                    $select_weekend = $select_opt[$dip_roop];
                } elseif(strpos($select_opt[$dip_roop],"케어") !== false ) {
                    $select_care = $select_opt[$dip_roop];    
                }
            }
            $total_opt .= $select_opt[$dip_roop];
            $dip_roop++;
        
        }

        //SELECT * FROM (SELECT * FROM wp_woocommerce_order_items WHERE order_id = '7581' AND order_item_type = 'line_item') AS wp_woocommerce_order_items WHERE NOT order_item_type = 'fee'
        

        $new_user_query = "INSERT INTO userbase(userid, username,phone,address,firstperiod,membership,opt,delidate,deliday,postcode,message,limitday,nextpayment,nowperiod,recommend,tables,super,mate,beef,tenloin,water,weekend,care) VALUES ('$news_user_id','$new_user_name','$new_user_phone','$new_user_address','$choice_period','프리미엄','$total_opt','$new_user_date','$new_user_day','$new_user_postcode','$deli_message','$limitdate','$next_payday','$choice_period','$reco_id','$choice_table','$select_super','$select_mate','$select_beef','$select_tenloin','$select_water','$select_weekend','$select_care')";
        mysqli_query($mysqli, $new_user_query);


        
        $table_code = "D";
        
        if(strpos($choice_period, "중기") !== false ){
            $table_code .= "T";
        } elseif (strpos($choice_period, "후기") !== false ){
            $table_code .= "H";
        } elseif (strpos($choice_period, "완료") !== false ){
            $table_code .= "W";
        } elseif (strpos($choice_period, "유아") !== false ){
            $table_code .= "Y";
        }

        if(empty($select_tenloin)){
            $table_code .= "A";
        } else {
            $table_code .= "B";
        }

        if(strpos($choice_table,"균형") !== false ){
            $table_code .= "N";
        } elseif(strpos($choice_table,"안전") !== false ){
            $table_code .= "S";
        } elseif(strpos($choice_table,"다양") !== false ){
            $table_code .= "C";
        } elseif(strpos($choice_table,"단백질") !== false ){
            $table_code .= "B";
        }


        $next_payday[0] = date("Y-m-d", strtotime("+7 days", strtotime($new_user_date)));
        $next_payday[1] = date("Y-m-d", strtotime("+14 days", strtotime($new_user_date)));
        $next_payday[2] = date("Y-m-d", strtotime("+21 days", strtotime($new_user_date)));
        $next_payday[3] = date("Y-m-d", strtotime("+28 days", strtotime($new_user_date)));

        $np = 0;

        while ($np <= 4){
            $next_postdays = $next_payday[$np];
            $next_postday = "SELECT * FROM tablebase where based = 'default'";
            $next_postday_result = mysqli_query($mysqli, $next_postday);
            while ($next_postday_row = mysqli_fetch_array($next_postday_result)){
                $testday[$np] = $next_postday_row[$next_postdays];
            }
            $np++;
        }

        //INSERT INTO `shicktest`(`userid`, `name`, `membership`, `deliday`, `opt`, `period`, `memo`, `water`, `delinum`) VALUES ();
        
        if(empty($select_water)){

        }else{
            $current_water = "육수팩1";
        }

        for($qs=1; $qs=6; $qs=$qs+1){

            $insert_user = $news_user_id."-".$qs;
            $shick_insert_query = "INSERT INTO `shicktest` (userid, name, membership, deilday, opt, period, memo, water, delinum) VALUES '$insert_user','$new_user_name','$choice_table','$new_user_date','$total_opt','$choice_period','','$current_water')";
            mysqli_query($mysqli, $shick_insert_query);

        }

        if(empty($select_weekend)){

        }else{
            $insert_user = $news_user_id."-7";
            $weekend_insert_query = "INSERT INTO `shicktest` (userid, name, membership, deilday, opt, period, memo, water, delinum) VALUES '$insert_user','$new_user_name','$choice_table','$new_user_date','$total_opt','$choice_period','','$current_water')";
            mysqli_query($mysqli, $shick_insert_weekend);
        }

        $weekend_code = "END-";

        if(strpos($choice_period, "중기") !== false ){
            $weekend_code .= "T";
        } elseif (strpos($choice_period, "후기") !== false ){
            $weekend_code .= "H";
        } elseif (strpos($choice_period, "완료") !== false ){
            $weekend_code .= "W";
        } elseif (strpos($choice_period, "유아") !== false ){
            $weekend_code .= "Y";
        }

        

        $ns = 0;
        while($ns <= 3){
            for($qs=1; $qs=6; $qs=$qs+1){

                $load_codes = $table_code."-".$qs;
                $load_query = "SELECT * FROM tablelist WHERE codes = '$load_codes'";
                $load_result = mysqli_query($mysqli,$load_query);
                $load_row = mysqli_fetch_array($load_result);
                $load_menu[$qs] = $load_row[$testday[$ns]];
                
                $insert_user = $news_user_id."-".$qs;

                $update_query = "UPDATE `shicktest` SET `$next_payday[$ns]`='$load_menu[$qs]' where userid = '$insert_user'";
                mysqli_query($mysqli, $update_query);

            }

            if(empty($select_weekend)){

            } else {
                $weekend_user = $news_user_id."-7";
                $weekend_query = "SELECT * FROM tablelist WHERE codes = '$weekend_code'";
                $weekend_result = mysqli_query($mysqli,$weekend_query);
                $weekend_row = mysqli_fetch_array($weekend_result);
                $weekend_menu[$qs] = $weekend_row[$testday[$ns]];
                $update_week_query = "UPDATE `shicktest` SET `$next_payday[$ns]`='$load_menu[$qs]' where userid = '$weekend_user'";
                mysqli_query($mysqli, $update_week_query);
            }

            $ns++;

        }

    }



}



mysqli_close($mysqli);
