<?php

/*

    POST로 넘겨받은 값을 통해
    새로운 식단 입력

    주 작동원리
    1. wp_woocommerce_order_item에 있는 sub_id의 fee를 모두 삭제
    2. wp_woocommerce_order_itemmeta에 있는 위 fee들에 대한 정보 제거 ( order_item_meta 서칭 )
    3. 새로운 order_item > sub_id의 fee 생성
    4. 새로 생성된 fee의 가격 및 정보를 itemmeta에 생성

*/

//if( current_user_can( 'subscriber' ) ){
//$userid = get_user_meta( $current_user -> ID, 'username', true );
//$username = get_user_meta( $current_user -> ID, 'first_name', true );
//
//}
//else
//{ 
//echo "<script>alert('로그인 하지 않았거나, 대상자가 아닙니다.');location.href='/';</script>";
//}

    //POST
    $post_period = $_POST['period'];
    $post_table = $_POST['table'];
    $post_opt = $_POST['opt'];
    $post_other_opt = $_POST['opts'];

    if($post_period == "준비기"){
        $post_period_en = "Z";
    } elseif($post_period == "초기"){
        $post_period_en = "X";
    } elseif($post_period == "중기"){
        $post_period_en = "T";
    } elseif($post_period == "후기"){
        $post_period_en = "H";
    } elseif($post_period == "완료기"){
        $post_period_en = "W";
    } elseif($post_period == "유아기"){
        $post_period_en = "Y";
    }

    $after_opt = implode("",$post_opt);
    array_push($post_opt, $post_period_en);

    $count_opt = count($post_opt);

    $table_search_query = "SELECT * FROM tablelist WHERE coeds LIKE '%D%'";

    $qa = 0;
    while ($qa <= $count_opt - 1){
        $table_search_query .= " AND codes LIKE '%.$post_opt[$qa].%'";
    }

    $table_search_result = mysqli_query($mysqli, $table_search_query);
    $table_search_row = mysqli_fetch_array($table_search_result);

    $table_coden = $table_search_row[codes];

    $table_coden = preg_replace("/[^A-Za-z]/","",$table_coden);  

    $update_coden = "UPDATE `userbase` SET `tablecode`='$table_coden' WHERE userid = '$userid";
    mysqli_query($mysqli, $update_coden);

    // 다음 식단 일시
    $table_search_query = "SELECT * FROM userbase WHERE userid = '$userid'";
    $table_search_result = mysqli_query($mysqli, $table_search_query);
    $table_search_row = mysqli_fetch_array($table_search_result);
    // 다음 식단 넣을 날짜
    $table_insert_date = $table_search_row[nextdeliday];    
    $table_code = $table_search_row[tablecode];
    $table_period = $table_search_row[nowperiod];

    $next_insert_postday[0] = date("Y-m-d", strtotime($table_insert_date));
    $next_insert_postday[1] = date("Y-m-d", strtotime("+7 days", strtotime($table_insert_date)));
    $next_insert_postday[2] = date("Y-m-d", strtotime("+14 days", strtotime($table_insert_date)));
    $next_insert_postday[3] = date("Y-m-d", strtotime("+21 days", strtotime($table_insert_date)));
    $next_circle = date("Y-m-d", strtotime("+28 days", strtotime($table_insert_date)));

    $next_circle_query = "UPDATE `userbase` SET `nextdeliday` = '$next_circle' WHERE userid = '$userid'";
    mysqli_query($mysqli, $next_circle_query);

    //식단 넣기
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

        if(in_array("E", $post_other_opt)){
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

    //fee 제거
    $subid_query = "SELECT * FROM userbase WHERE userid = '$userid'";
    $subid_result = mysqli_query($mysqli, $subid_query);
    $subid_row = mysqli_fetch_array($subid_result);
    $subid = $subid_row[subid];

    $fee_del_query = "DELETE FROM `wp_woocommerce_order_items` WHERE order_id = '$subid' AND order_item_type";
    mysqli_query($mysqli, $fee_del_query);

    $opt_all_array = array_merge($post_opt, $post_other_opt);

    $opt_all_count = count($opt_all_array);

    $qq = 0;
    while ($qq <= $opt_all_count - 1){
        //fee를 새로 생성
        if($opt_all_array[$qq] == "Z"){
            $item_name[$qq] = "준비기";
            $item_price[$qq] = "69000";
        } elseif($opt_all_array[$qq] == "X") {
            $item_name[$qq] = "초기";
            $item_price[$qq] = "89000";
        } elseif($opt_all_array[$qq] == "T") {
            $item_name[$qq] = "중기";
            $item_price[$qq] = "169000";
        } elseif($opt_all_array[$qq] == "H") {
            $item_name[$qq] = "후기";
            $item_price[$qq] = "209000";
        } elseif($opt_all_array[$qq] == "W") {
            $item_name[$qq] = "완료기";
            $item_price[$qq] = "239000";
        } elseif($opt_all_array[$qq] == "Y") {
            $item_name[$qq] = "유아기";
            $item_price[$qq] = "199000";
        } elseif($opt_all_array[$qq] == "S") {
            $item_name[$qq] = "슈퍼푸드1";

            if(in_array("Z", $opt_all_array[$qq])){
                $item_price[$qq] = "0";
            } elseif (in_array("X", $opt_all_array[$qq])) {
                $item_price[$qq] = "0";
            } elseif (in_array("T", $opt_all_array[$qq])) {
                $item_price[$qq] = "15000";
            } elseif (in_array("H", $opt_all_array[$qq])) {
                $item_price[$qq] = "25000";
            } elseif (in_array("W", $opt_all_array[$qq])) {
                $item_price[$qq] = "35000";
            } elseif (in_array("Y", $opt_all_array[$qq])) {
                $item_price[$qq] = "15000";
            }

        } elseif($opt_all_array[$qq] == "Q") {
            $item_name[$qq] = "슈퍼푸드2";
            
            if(in_array("Z", $opt_all_array[$qq])){
                $item_price[$qq] = "0";
            } elseif (in_array("X", $opt_all_array[$qq])) {
                $item_price[$qq] = "0";
            } elseif (in_array("T", $opt_all_array[$qq])) {
                $item_price[$qq] = "25000";
            } elseif (in_array("H", $opt_all_array[$qq])) {
                $item_price[$qq] = "35000";
            } elseif (in_array("W", $opt_all_array[$qq])) {
                $item_price[$qq] = "45000";
            } elseif (in_array("Y", $opt_all_array[$qq])) {
                $item_price[$qq] = "25000";
            }

        } elseif($opt_all_array[$qq] == "H") {
            $item_name[$qq] = "고기추가";

            if(in_array("Z", $opt_all_array[$qq])){
                $item_price[$qq] = "0";
            } elseif (in_array("X", $opt_all_array[$qq])) {
                $item_price[$qq] = "15000";
            } elseif (in_array("T", $opt_all_array[$qq])) {
                $item_price[$qq] = "25000";
            } elseif (in_array("H", $opt_all_array[$qq])) {
                $item_price[$qq] = "29000";
            } elseif (in_array("W", $opt_all_array[$qq])) {
                $item_price[$qq] = "40000";
            } elseif (in_array("Y", $opt_all_array[$qq])) {
                $item_price[$qq] = "25000";
            }

        } elseif($opt_all_array[$qq] == "B") {
            $item_name[$qq] = "안심변경";
            
            if(in_array("Z", $opt_all_array[$qq])){
                $item_price[$qq] = "0";
            } elseif (in_array("X", $opt_all_array[$qq])) {
                $item_price[$qq] = "15000";
            } elseif (in_array("T", $opt_all_array[$qq])) {
                $item_price[$qq] = "25000";
            } elseif (in_array("H", $opt_all_array[$qq])) {
                $item_price[$qq] = "29000";
            } elseif (in_array("W", $opt_all_array[$qq])) {
                $item_price[$qq] = "40000";
            } elseif (in_array("Y", $opt_all_array[$qq])) {
                $item_price[$qq] = "25000";
            }

        } elseif($opt_all_array[$qq] == "W") {
            $item_name[$qq] = "육수추가";
            
            if(in_array("Z", $opt_all_array[$qq])){
                $item_price[$qq] = "0";
            } elseif (in_array("X", $opt_all_array[$qq])) {
                $item_price[$qq] = "0";
            } elseif (in_array("T", $opt_all_array[$qq])) {
                $item_price[$qq] = "40000";
            } elseif (in_array("H", $opt_all_array[$qq])) {
                $item_price[$qq] = "60000";
            } elseif (in_array("W", $opt_all_array[$qq])) {
                $item_price[$qq] = "60000";
            } elseif (in_array("Y", $opt_all_array[$qq])) {
                $item_price[$qq] = "0";
            }


        } elseif($opt_all_array[$qq] == "E") {
            $item_name[$qq] = "주말팩";
            $item_price[$qq] = "0";
        } elseif($opt_all_array[$qq] == "R") {
            $item_name[$qq] = "케어프로그램";

            if(in_array("Z", $opt_all_array[$qq])){
                $item_price[$qq] = "0";
            } elseif (in_array("X", $opt_all_array[$qq])) {
                $item_price[$qq] = "35000";
            } elseif (in_array("T", $opt_all_array[$qq])) {
                $item_price[$qq] = "45000";
            } elseif (in_array("H", $opt_all_array[$qq])) {
                $item_price[$qq] = "55000";
            } elseif (in_array("W", $opt_all_array[$qq])) {
                $item_price[$qq] = "55000";
            } elseif (in_array("Y", $opt_all_array[$qq])) {
                $item_price[$qq] = "45000";
            }

        }


        $new_fee_query = "INSERT INTO `wp_woocommerce_order_items`(`order_item_name`, `order_item_type`, `order_id`) VALUES ('$item_name[$qq]','fee','$subid')";
        mysqli_query($mysqli, $new_fee_query);

        $fee_data_query = "SELECT * FROM wp_woocommerce_order_items WHERE order_item_name = '$item_name[$qq]' AND order_itme_type = 'fee' AND order_id = '$subid'";
        $fee_data_result = mysqli_query($mysqli, $fee_data_query);
        $fee_data_row = mysqli_fetch_array($fee_data_result);
        $order_item_id[$qq] = $fee_data_row[order_item_id];

        $fee_meta_key = ["_fee_amount","_tax_class","_tax_status","_line_total","line_tax","_line_tax_data"];
        $fake_text = "a:1:{s:5:"."total".";a:0:{}}";
        $fee_meta_count = count($fee_meta_key);
        $fee_meta_val = [$item_price[$qq],"0","taxable",$item_price[$qq],"0",$fake_text];


        for($jk=0; $jk=$fee_meta_count; $jk=$jk+1){
            $new_fee_amount_query = "INSERT INTO `wp_woocommerce_order_itemmeta`(`order_item_id`, `meta_key`, `meta_value`) VALUES ('$order_item_id[$qq]','$fee_meta_key[$jk]','$fee_meta_val[$jk]')";
            mysqli_query($mysqli, $new_fee_amount_query);
        }
        $qq++;
    }