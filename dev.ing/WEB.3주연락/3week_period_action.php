<?php

/*

    * 식단변경, 단계변경 완료페이지

    * 3주마다 알림받아서 연장 및 시기, 요금제를 변경하는 시스템
    * 연장시 자동으로 식단이 업데이트 된다

    * POST로 넘겨받은 값을 통해
    * 새로운 식단 입력

    * 주 작동원리
    1. wp_woocommerce_order_item에 있는 sub_id의 fee를 모두 삭제
    2. wp_woocommerce_order_itemmeta에 있는 위 fee들에 대한 정보 제거 ( order_item_meta 서칭 )
    3. 새로운 order_item > sub_id의 fee 생성
    4. 새로 생성된 fee의 가격 및 정보를 itemmeta에 생성

    * 맨 아래 html부분에 html 모양 만들어주면 됨
    * 실사용시 banana 지우고 위에거 쓰면됩니다

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

$userid = "banana";

$news_user_id = $userid;

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
//POST
$post_period = $_POST['period'];
$post_table = $_POST['table'];
$post_opt = $_POST['opt'];
$post_point = $_POST['point'];

$table_str = $post_table;
$period_str = $post_period;
$side_str = $post_opt;

$table_arr = array($post_table);
$period_arr = array($post_period);
$side_arr = array($side_str);

$select_opts = array_merge($side_arr, $period_arr, $table_arr);

$period_opt = array();
$table_opt = array();
$side_opt = array();

if (in_array("Z", $select_opts)) {
    array_push($period_opt, "Z");
    $pkg_counter = 1;
    $now_period = "준비기";
}
if (in_array("X", $select_opts)) {
    array_push($period_opt, "X");
    $pkg_counter = 1;
    $now_period = "초기";
}
if (in_array("T", $select_opts)) {
    array_push($period_opt, "T");
    $pkg_counter = 3;
    $now_period = "중기";
}
if (in_array("H", $select_opts)) {
    array_push($period_opt, "H");
    $pkg_counter = 3;
    $now_period = "후기";
}
if (in_array("W", $select_opts)) {
    array_push($period_opt, "W");
    $pkg_counter = 3;
    $now_period = "완료기";
}
if (in_array("Y", $select_opts)) {
    array_push($period_opt, "Y");
    $pkg_counter = 12;
    $now_period = "유아기";
}

if (in_array("A", $select_opts)) {
    array_push($table_opt, "A");
    $table = "A";
    $tables = "기본";
}
if (in_array("B", $select_opts)) {
    array_push($table_opt, "B");
    $table = "B";
    $tables = "플러스";
}

if (in_array("K", $select_opts)) {
    array_push($side_opt, "K");
    $snack = "K";
} else {
    $snack = "";
}

$period_str = implode("", $period_opt);
$table_str = implode("", $table_opt);
$side_str = implode("", $side_opt);

$new_date_query = "SELECT * FROM userbase WHERE userid = '$userid'";
$new_date_result = mysqli_query($mysqli, $new_date_query);
$new_date_row = mysqli_fetch_array($new_date_result);

$new_user_date = $new_date_row[nextdeliday];

$new_user_opt = "UPDATE `userbase` SET `nowperiod`='$now_period', `opt`='$snack', `membership`='$tables', `tables` = '$tables' WHERE userid = '$news_user_id'";
mysqli_query($mysqli, $new_user_opt);

$next_payday[0] = date("Y-m-d", strtotime($new_user_date));
$next_payday[1] = date("Y-m-d", strtotime("+7 days", strtotime($new_user_date)));
$next_payday[2] = date("Y-m-d", strtotime("+14 days", strtotime($new_user_date)));
$next_payday[3] = date("Y-m-d", strtotime("+21 days", strtotime($new_user_date)));
$next_post_circle = date("Y-m-d", strtotime("+28 days", strtotime($new_user_date)));

$update_nextdeliday = "UPDATE `userbase` SET `nextpayment`='$next_payday[2]', `nextdeliday` = '$next_post_circle' WHERE userid = '$userid'";
mysqli_query($mysqli, $update_nextdeliday);

$count_opt = count($select_opts);


if(in_array("B", $select_opts)){
    for ($od = 1; $od <= 6; $od = $od + 1) {
        $option_del_id = $userid . "-" . $od;
        $option_del_query = "UPDATE `shicktest` SET `water` = '육수팩1' WHERE userid = '$option_del_id'";
        mysqli_query($mysqli, $option_del_query);
    }
} else {
    for ($od = 1; $od <= 6; $od = $od + 1) {
        $option_del_id = $userid . "-" . $od;
        $option_del_query = "UPDATE `shicktest` SET `water` = '' WHERE userid = '$option_del_id'";
        mysqli_query($mysqli, $option_del_query);
    }
}


if (in_array("간식", $new_date_row)) {
    if (in_array("K", $select_opts)) {
    } else {
        for ($od = 1; $od <= 4; $od = $od + 1) {
            $option_del_id = $userid . "-" . $od;
            $option_del_query = "DELETE FROM `snacktable` WHERE userid = '$option_del_id'";
            mysqli_query($mysqli, $option_del_query);
        }
    }
} else {
    if (in_array("K", $select_opts)) {
        $shick_select_id = $userid . "-1";
        $shick_select = "SELECT `name`, `membership`, `deliday`, `opt`,`period`,`water`,`delinum` FROM shicktest WHERE userid = '$shick_select_id'";
        $shick_result = mysqli_query($mysqli, $shick_select);
        $shick_row = mysqli_fetch_array($shick_result);
        for ($od = 1; $od <= 4; $od = $od + 1) {
            $insert_user = $userid . "-" . $od;
            $snack_insert_query = "INSERT INTO `shicktest` (userid, name, membership, deilday, opt, period, memo, water, delinum) VALUES ('$insert_user','$shick_row[name]','$shick_row[membership]','$shick_row[deliday]','$slick_row[opt]','$shick_row[period]','$shick_row[water]', '$shick_row[delinum]')";
            mysqli_query($mysqli, $snack_insert_query);
        }
    }
}


while ($np <= 3) {
    $next_postdays = $next_payday[$np];
    $next_postday = "SELECT * FROM tablebase where based = 'default'";
    $next_postday_result = mysqli_query($mysqli, $next_postday);
    while ($next_postday_row = mysqli_fetch_array($next_postday_result)) {
        $testday[$np] = $next_postday_row[$next_postdays];
    }
    $np++;
}


//식단 넣기
if (in_array("Z", $select_opts)) {
    $ns = 0;
    for ($qs = 1; $qs <= 4; $qs = $qs + 3) {

        $loades_menu[1] = "쌀미음";
        $loades_menu[4] = "찹쌀미음";

        $insert_user = $news_user_id . "-" . $qs;

        $update_query = "UPDATE `shicktest` SET `$next_payday[$ns]`='$load_menu[$qs]' where userid = '$insert_user'";
        mysqli_query($mysqli, $update_query);
    }

    $ns = 1;

    while ($ns <= 3) {
        for ($qs = 1; $qs <= 6; $qs = $qs + 1) {

            $load_query = "SELECT * FROM tablelist WHERE periods = '$period_str' AND options = '$table_str' AND codes LIKE '%-$qs'";
            $load_result = mysqli_query($mysqli, $load_query);
            $load_row = mysqli_fetch_array($load_result);
            $load_menu[$qs] = $load_row[$testday[$ns]];

            $insert_user = $news_user_id . "-" . $qs;

            $update_query = "UPDATE `shicktest` SET `$next_payday[$ns]`='$load_menu[$qs]' where userid = '$insert_user'";
            mysqli_query($mysqli, $update_query);
        }
        $ns++;
    }
} elseif (in_array("X", $select_opts)) {
    $ns = 0;
    for ($qs = 1; $qs = 4; $qs = $qs + 3) {

        $loades_menu[1] = "한우미음";
        $loades_menu[4] = "닭고기미음";

        $insert_user = $news_user_id . "-" . $qs;

        $update_query = "UPDATE `shicktest` SET `$next_payday[$ns]`='$load_menu[$qs]' where userid = '$insert_user'";
        mysqli_query($mysqli, $update_query);
    }

    $ns = 1;

    while ($ns <= 3) {
        for ($qs = 1; $qs = 6; $qs = $qs + 1) {

            $load_query = "SELECT * FROM tablelist WHERE periods = '$period_str' AND options = '$table_str' AND codes LIKE '%-$qs'";
            $load_result = mysqli_query($mysqli, $load_query);
            $load_row = mysqli_fetch_array($load_result);
            $load_menu[$qs] = $load_row[$testday[$ns]];

            $insert_user = $news_user_id . "-" . $qs;

            $update_query = "UPDATE `shicktest` SET `$next_payday[$ns]`='$load_menu[$qs]' where userid = '$insert_user'";
            mysqli_query($mysqli, $update_query);
        }

        $ns++;
    }
} else {
    $ns = 0;
    while ($ns <= 3) {
        for ($qs = 1; $qs = 6; $qs = $qs + 1) {

            $load_query = "SELECT * FROM tablelist WHERE periods = '$period_str' AND options = '$table_str' AND codes LIKE '%-$qs'";
            $load_result = mysqli_query($mysqli, $load_query);
            $load_row = mysqli_fetch_array($load_result);
            $load_menu[$qs] = $load_row[$testday[$ns]];

            $insert_user = $news_user_id . "-" . $qs;

            $update_query = "UPDATE `shicktest` SET `$next_payday[$ns]`='$load_menu[$qs]' where userid = '$insert_user'";
            mysqli_query($mysqli, $update_query);
        }

        $ns++;
    }
}

if (in_array("K", $select_opts)) {

    while ($ns <= 3) {
        for ($qs = 1; $qs = 2; $qs = $qs + 1) {

            $snack_load_query = "SELECT * FROM tablelist WHERE periods = '$period_str' AND snack = '$snack' AND codes LIKE '%-$qs'";
            $snack_load_result = mysqli_query($mysqli, $snack_load_query);
            $snack_load_row = mysqli_fetch_array($snack_load_result);

            $snack_menu[$qs] = $snack_load_row[$testday[$ns]];

            $insert_user = $news_user_id . "-" . $qs;
            $snack_update_query = "UPDATE `snacktable` `$next_payday[$ns]` = '$snack_menu[$qs]' WHERE userid = '$insert_user'";
            mysqli_query($mysqli, $snack_update_query);
        }
    }
}

//fee 제거
$subid_query = "SELECT * FROM userbase WHERE userid = '$userid'";
$subid_result = mysqli_query($mysqli, $subid_query);
$subid_row = mysqli_fetch_array($subid_result);
$subid = $subid_row[subid];

$fee_del_query = "DELETE FROM `wp_woocommerce_order_items` WHERE order_id = '$subid' AND order_item_type = 'fee'";
mysqli_query($mysqli, $fee_del_query);

$all_period = array_merge($period_opt, $table_opt, $side_opt);
$opt_all_count = count($opt_period);

$qq = 0;
while ($qq <= $opt_all_count - 1) {
    //fee를 새로 생성
    if ($opt_all_array[$qq] == "Z") {

        if(in_array("A",$select_opt)){
            $item_name[$qq] = "준비기";
            $item_price[$qq] = "69000";
        } else {
            $item_name[$qq] = "준비기";
            $item_price[$qq] = "69000";
        }

    } elseif ($opt_all_array[$qq] == "X") {
        if(in_array("A",$select_opt)){
            $item_name[$qq] = "초기";
            $item_price[$qq] = "89000";
        } else {
            $item_name[$qq] = "초기";
            $item_price[$qq] = "114000";
        }

    } elseif ($opt_all_array[$qq] == "T") {

        if(in_array("A",$select_opt)){
            $item_name[$qq] = "중기";
            $item_price[$qq] = "169000";
        } else {
            $item_name[$qq] = "중기";
            $item_price[$qq] = "238000";
        }

    } elseif ($opt_all_array[$qq] == "H") {
        
        if(in_array("A",$select_opt)){
            $item_name[$qq] = "후기";
            $item_price[$qq] = "239000";
        } else {
            $item_name[$qq] = "중기";
            $item_price[$qq] = "348000";
        }

    } elseif ($opt_all_array[$qq] == "W") {

        if(in_array("A",$select_opt)){
            $item_name[$qq] = "유아식준비기";
            $item_price[$qq] = "249000";
        } else {
            $item_name[$qq] = "중기";
            $item_price[$qq] = "369000";
        }

    } elseif ($opt_all_array[$qq] == "Y") {
        if(in_array("A",$select_opt)){
            $item_name[$qq] = "유아기";
            $item_price[$qq] = "199000";
        } else {
            $item_name[$qq] = "유아기";
            $item_price[$qq] = "244000";
        }
    } elseif ($opt_all_array[$qq] == "K") {
        $item_name[$qq] = "간식키트";
        $item_price[$qq] = "98000";    
    } 

    $all_pay = $all_pay + $item_price[$qq];

    $new_fee_query = "INSERT INTO `wp_woocommerce_order_items`(`order_item_name`, `order_item_type`, `order_id`) VALUES ('$item_name[$qq]','fee','$subid')";
    mysqli_query($mysqli, $new_fee_query);

    $fee_data_query = "SELECT * FROM wp_woocommerce_order_items WHERE order_item_name = '$item_name[$qq]' AND order_itme_type = 'fee' AND order_id = '$subid'";
    $fee_data_result = mysqli_query($mysqli, $fee_data_query);
    $fee_data_row = mysqli_fetch_array($fee_data_result);
    $order_item_id[$qq] = $fee_data_row[order_item_id];

    $total = '"total"';
    $fee_meta_key = ["_fee_amount", "_tax_class", "_tax_status", "_line_total", "line_tax", "_line_tax_data"];
    $fake_text = "a:1:{s:5:" . $total . ";a:0:{}}";
    $fee_meta_count = count($fee_meta_key);
    $fee_meta_val = [$item_price[$qq], "0", "taxable", $item_price[$qq], "0", $fake_text];


    for ($jk = 0; $jk = $fee_meta_count; $jk = $jk + 1) {
        $new_fee_amount_query = "INSERT INTO `wp_woocommerce_order_itemmeta`(`order_item_id`, `meta_key`, `meta_value`) VALUES ('$order_item_id[$qq]','$fee_meta_key[$jk]','$fee_meta_val[$jk]')";
        mysqli_query($mysqli, $new_fee_amount_query);
    }

    $qq++;
}

if($post_point == '' || empty($post_point) || $post_point == '0'){

} else {

    $point = "-".$post_point;

    $point_fee_query = "INSERT INTO `wp_woocommerce_order_items`(`order_item_name`, `order_item_type`, `order_id`) VALUES ('적립금할인','fee','$subid')";
    mysqli_query($mysqli, $point_fee_query);

    $point_search_query = "SELECT * FROM wp_woocommerce_order_items WHERE order_id = '$subid' AND order_item_name = '적립금할인'";
    $point_search_result = mysqli_query($mysqli, $point_search_query);
    $point_search_row = mysqli_fetch_array($point_search_result);
    $point_order_id = $point_search_row[order_item_id];

    $fee_meta_val_2 = [$point, "0", "taxable", $point, "0", $fake_text];
    for ($jk = 0; $jk = $fee_meta_count; $jk = $jk + 1) {
        $new_point_amount_query = "INSERT INTO `wp_woocommerce_order_itemmeta`(`order_item_id`, `meta_key`, `meta_value`) VALUES ('$point_order_id','$fee_meta_key[$jk]','$fee_meta_val[$jk]')";
        mysqli_query($mysqli, $new_point_amount_query);
    }

    $log_day = date("Y-m-d");
    $point_log = "INSERT INTO `pointlog`(`dates`, `userid`, `type`, `used`, `points`) VALUES ('$log_day','$userid','차감','다음결제','$point')";
    mysqli_query($mysqli, $point_log);

}

//로그남기기
$log_date = date("Y-m-d");
$log_opt = implode("/", $all_period);

$log_query = "INSERT INTO `periodlog`(`date`,`userid`,`selectopt`,`allpay`) VALUES ('$log_date','$userid','$log_opt','$all_pay')";
mysqli_query($mysqli, $log_query);

// 여기 이후에 html 만들면 됩니다
?>