<?php

$order_id = $order->get_id();

if (wcs_order_contains_subscription($order_id)) { // 주문내역에 정기배송 상품이 있을경우   
    $subid = $order_id + 1;
    $news = 1;
} else {
    $subid = $order_id;
    $news = 2;
}

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
$get_post_day = get_post_meta($subid, 'deliday', true);

$message_query = "SELECT post_excerpt FROM wp_posts WHERE ID = '$order_id'";
$message_result = mysqli_query($mysqli, $message_query);
$message_row = mysqli_fetch_array($message_result);
$deli_message = $message_row[post_excerpt];

$limitdate = date("Y-m-d", strtotime("+1 month", strtotime($new_user_date)));
$next_payday = date("Y-m-d", strtotime("+4 weeks", strtotime($new_user_date)));
$next_paydays = date("Y-m-d", strtotime("-3 days", strtotime($next_payday)));

$reco_query = "SELECT meta_value FROM wp_postmeta WHERE post_id = '$subid' AND meta_key = 'recommedid'";
$reco_result = mysqli_query($mysqli, $reco_query);
$reco_row = mysqli_fetch_array($reco_result);
$reco_id = $reco_row[meta_value];

$dip = 0;

$fee_option_query = "SELECT * FROM wp_woocommerce_order_items WHERE order_id = '$subid' AND order_item_type = 'fee'";
$fee_option_result = mysqli_query($mysqli, $fee_option_query);
while ($fee_option_row = mysqli_fetch_array($fee_option_result)) {

    $select_opts[] = $fee_option_row[order_item_name];
}

$opts_count = count($select_opts);
$loop = 0;

$period_opt = array();
$table_opt = array();
$side_opt = array();

if (in_array("준비기", $select_opts)) {
    array_push($period_opt, "Z");
    $pkg_counter = 1;
}
if (in_array("초기", $select_opts)) {
    array_push($period_opt, "X");
    $pkg_counter = 1;
}
if (in_array("중기", $select_opts)) {
    array_push($period_opt, "T");
    $pkg_counter = 3;
}
if (in_array("후기", $select_opts)) {
    array_push($period_opt, "H");
    $pkg_counter = 3;
}
if (in_array("완료기", $select_opts)) {
    array_push($period_opt, "W");
    $pkg_counter = 3;
}
if (in_array("유아기", $select_opts)) {
    array_push($period_opt, "Y");
    $pkg_counter = 12;
}
if (in_array("슈퍼푸드1", $select_opts)) {
    array_push($table_opt, "S");
    $super = "S";
}
if (in_array("슈퍼푸드2", $select_opts)) {
    array_push($table_opt, "Z");
    $mate = "Z";
}

if (in_array("내맘", $select_opts)) {
    array_push($table_opt, "I");
    $table_box = "I";
    $table_message = "내맘대로";
}

if (in_array("균형", $select_opts)) {
    array_push($table_opt, "U");
    $table_box = "U";
    $table_message = "균형";
}

if (in_array("단백", $select_opts)) {
    array_push($table_opt, "J");
    $table_box = "J";
    $table_message = "단백질";
}

if (in_array("다양", $select_opts)) {
    array_push($table_opt, "D");
    $table_box = "D";
    $table_message = "다양다양";
}

if (in_array("맞춤", $select_opts)) {
    array_push($table_opt, "Q");
    $table_box = "Q";
    $table_message = "맞춤형";
}

if (in_array("안전", $select_opts)) {
    array_push($table_opt, "E");
    $safe = "E";
    $table_box = "E";
    $table_message = "안전";
}

if (in_array("고기추가", $select_opts)) {
    array_push($table_opt, "A");
    $beef = "A";
}
if (in_array("안심", $select_opts)) {
    array_push($table_opt, "B");
    $tenloin = "B";
}
if (in_array("육수", $select_opts)) {
    array_push($side_opt, "R");
    $water = "R";
}
if (in_array("주말", $select_opts)) {
    array_push($side_opt, "D");
    $weekend = "D";
}
if (in_array("케어", $select_opts)) {
    array_push($side_opt, "C");
}
if (in_array("멀티", $select_opts)) {
    array_push($side_opt, "G");
}
if (in_array("편수", $select_opts)) {
    array_push($side_opt, "F");
}
if (in_array("간식", $select_opts)) {
    array_push($side_opt, "K");
    $snack = "K";
}
if (in_array("메가", $select_opts)) {
    array_push($side_opt, "P");
    $mega = "P";
}


$period_str = implode("", $period_opt);
$table_str = implode("/", $table_opt);
$side_str = implode("/", $side_opt);

$total_opt = $table_str . $side_str;

$new_user_query = "INSERT INTO userbase(userid, username,phone,address,firstperiod,membership,opt,delidate,deliday,postcode,message,limitday,nextpayment,nowperiod,recommend,tables,super,mate,beef,tenloin,water,weekend,care,news,periodstr,tablestr,sidestr, safe) VALUES ('$news_user_id','$new_user_name','$new_user_phone','$new_user_address','$choice_period','$table_message','$total_opt','$new_user_date','$new_user_day','$new_user_postcode','$deli_message','$limitdate','$next_paydays','$choice_period','$reco_id','$table_box','$select_super','$select_mate','$select_beef','$select_tenloin','$select_water','$select_weekend','$select_care','$news','$period_str','$table_str','$side_str','$safe')";
mysqli_query($mysqli, $new_user_query);

$new_user_opt = "UPDATE `userbase` SET `super` = '$super', `mate`='$mate', `beef` = '$beef', `tenloin`='$tenloin', `water` ='$water', `snack`='$snack', `weekend` = '$weekend', `care` = '$care', `mega`='$mega' WHERE userid = '$news_user_id'";
mysqli_query($mysqli, $new_user_opt);

$next_payday[0] = date("Y-m-d", strtotime($new_user_date));
$next_payday[1] = date("Y-m-d", strtotime("+7 days", strtotime($new_user_date)));
$next_payday[2] = date("Y-m-d", strtotime("+14 days", strtotime($new_user_date)));
$next_payday[3] = date("Y-m-d", strtotime("+21 days", strtotime($new_user_date)));
$next_post_circle = date("Y-m-d", strtotime("+28 days", strtotime($new_user_date)));

if ($news == "2") {
    $update_news_query = "UPDATE userbase SET `nextpayment`='$next_payday[2]',`nextdeliday` = '$next_post_circle', `pkg` = '$pkg_counter' WHERE userid = '$news_user_id'";
    mysqli_query($mysqli, $update_news_query);
} else {
    $update_subid_query = "UPDATE userbase SET `nextpayment`='$next_payday[2]',`nextdeliday` = '$next_post_circle', `subid` = '$subid' WHERE userid = '$news_user_id'";
    mysqli_query($mysqli, $update_subid_query);
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

if (in_array("R", $side_opt)) {
    $current_water = "육수팩1";
} else {
    $current_water = "";
}

if ($get_post_day == "월") {
    $get_post_num = 0;
} elseif ($get_post_day == "화") {
    $get_post_num = 1;
} elseif ($get_post_day == "수") {
    $get_post_num = 2;
} elseif ($get_post_day == "목") {
    $get_post_num = 3;
} elseif ($get_post_day == "금") {
    $get_post_num = 4;
}


for ($qs = 1; $qs = 6; $qs = $qs + 1) {

    $insert_user = $news_user_id . "-" . $qs;
    $shick_insert_query = "INSERT INTO `shicktest` (userid, name, deilday, opt, period, memo, water, delinum) VALUES ('$insert_user','$new_user_name','$get_post_day','$total_opt','$choice_period','','$current_water','$get_post_num')";
    mysqli_query($mysqli, $shick_insert_query);
}

if (in_array("D", $side_opt)) {
    $insert_user = $news_user_id . "-7";
    $weekend_insert_query = "INSERT INTO `shicktest` (userid, name, deilday, opt, period, memo, water, delinum) VALUES ('$insert_user','$new_user_name','$get_post_day','$total_opt','$choice_period','','$current_water','$get_post_num')";
    mysqli_query($mysqli, $weekend_insert_query);
} else {
}

if (in_array("Z", $period_opt)) {
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

            $load_codes = $table_code . "-" . $qs;
            $load_query = "SELECT * FROM tablelist WHERE periods = '$period_str' AND safe = '$safe' AND super = '$super' AND beef = '$beef' AND tenloin = '$tenloin' AND mate = '$mate' AND codes LIKE '%-$qs'";
            $load_result = mysqli_query($mysqli, $load_query);
            $load_row = mysqli_fetch_array($load_result);
            $load_menu[$qs] = $load_row[$testday[$ns]];

            $insert_user = $news_user_id . "-" . $qs;

            $update_query = "UPDATE `shicktest` SET `$next_payday[$ns]`='$load_menu[$qs]' where userid = '$insert_user'";
            mysqli_query($mysqli, $update_query);
        }
        $ns++;
    }
} elseif (in_array("X", $period_opt)) {
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

            $load_query = "SELECT * FROM tablelist WHERE periods = '$period_str' AND safe = '$safe' AND super = '$super' AND beef = '$beef' AND tenloin = '$tenloin' AND mate = '$mate' AND codes LIKE '%-$qs'";
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

            $load_query = "SELECT * FROM tablelist WHERE periods = '$period_str' AND safe = '$safe' AND super = '$super' AND beef = '$beef' AND tenloin = '$tenloin' AND mate = '$mate' AND codes LIKE '%-$qs'";
            $load_result = mysqli_query($mysqli, $load_query);
            $load_row = mysqli_fetch_array($load_result);
            $load_menu[$qs] = $load_row[$testday[$ns]];

            $insert_user = $news_user_id . "-" . $qs;

            $update_query = "UPDATE `shicktest` SET `$next_payday[$ns]`='$load_menu[$qs]' where userid = '$insert_user'";
            mysqli_query($mysqli, $update_query);
        }

        if (in_array("D", $side_opt)) {
            $weekend_user = $news_user_id . "-7";
            $weekend_query = "SELECT * FROM tablelist WHERE periods = '$period_str' AND weekend = 'D'";
            $weekend_result = mysqli_query($mysqli, $weekend_query);
            $weekend_row = mysqli_fetch_array($weekend_result);
            $weekend_menu[$qs] = $weekend_row[$testday[$ns]];
            $update_week_query = "UPDATE `shicktest` SET `$next_payday[$ns]`='$load_menu[$qs]' where userid = '$weekend_user'";
            mysqli_query($mysqli, $update_week_query);
        } else {
        }

        $ns++;
    }
}

if (in_array("K", $side_opt)) {

    for ($qs = 1; $qs = 2; $qs = $qs + 1) {

        $insert_user = $news_user_id . "-" . $qs;
        $snack_insert_query = "INSERT INTO `shicktest` (userid, name, deilday, opt, period, memo, water, delinum) VALUES ('$insert_user','$new_user_name','$get_post_day','$total_opt','$choice_period','','','$get_post_num')";
        mysqli_query($mysqli, $snack_insert_query);
    }

    while ($ns <= 3) {
        for ($qs = 1; $qs = 2; $qs = $qs + 1) {

            $snack_load_query = "SELECT * FROM tablelist WHERE periods = '' AND snack = '$snack' AND codes LIKE '%-$qs'";
            $snack_load_result = mysqli_query($mysqli, $snack_load_query);
            $snack_load_row = mysqli_fetch_array($snack_load_result);

            $snack_menu[$qs] = $snack_load_row[$testday[$ns]];

            $insert_user = $news_user_id . "-" . $qs;
            $snack_update_query = "UPDATE `snacktable` `$next_payday[$ns]` = '$snack_menu[$qs]' WHERE userid = '$insert_user'";
            mysqli_query($mysqli, $snack_update_query);
        }
    }
}
