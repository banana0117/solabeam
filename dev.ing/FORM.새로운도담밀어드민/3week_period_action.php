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
$news_user_id = $userid;
$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
//POST
$post_period = $_POST['period'];
$post_table = $_POST['table'];
$post_opt = $_POST['opt'];
$post_other_opt = $_POST['opts'];

$table_str = $post_table;
$period_str = $post_period;
$table_arr = array($post_table);
$period_arr = array($post_period);

$select_opts = array_merge($post_opt, $post_other_opt, $period_arr, $table_arr);

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
if (in_array("S", $select_opts)) {
    array_push($table_opt, "S");
    $super = "S";
}
if (in_array("Z", $select_opts)) {
    array_push($table_opt, "Z");
    $mate = "Z";
}

if (in_array("I", $select_opts)) {
    array_push($table_opt, "I");
    $table_box = "I";
    $table_message = "내맘대로";
}

if (in_array("U", $select_opts)) {
    array_push($table_opt, "U");
    $table_box = "U";
    $table_message = "균형";
}

if (in_array("J", $select_opts)) {
    array_push($table_opt, "J");
    $table_box = "J";
    $table_message = "단백질";
}

if (in_array("D", $select_opts)) {
    array_push($table_opt, "D");
    $table_box = "D";
    $table_message = "다양다양";
}

if (in_array("Q", $select_opts)) {
    array_push($table_opt, "Q");
    $table_box = "Q";
    $table_message = "맞춤형";
}

if (in_array("E", $select_opts)) {
    array_push($table_opt, "E");
    $safe = "E";
    $table_box = "E";
    $table_message = "안전";
}

if (in_array("A", $select_opts)) {
    array_push($table_opt, "A");
    $beef = "A";
}
if (in_array("B", $select_opts)) {
    array_push($table_opt, "B");
    $tenloin = "B";
}
if (in_array("W", $select_opts)) {
    array_push($side_opt, "R");
    $water = "R";
}
if (in_array("D", $select_opts)) {
    array_push($side_opt, "D");
    $weekend = "D";
}
if (in_array("C", $select_opts)) {
    array_push($side_opt, "C");
}
if (in_array("G", $select_opts)) {
    array_push($side_opt, "G");
}
if (in_array("F", $select_opts)) {
    array_push($side_opt, "F");
}
if (in_array("K", $select_opts)) {
    array_push($side_opt, "K");
    $snack = "K";
}
if (in_array("P", $select_opts)) {
    array_push($side_opt, "P");
    $mega = "P";
}

$new_date_query = "SELECT * FROM userbase WHERE userid = '$userid'";
$new_date_result = mysqli_query($mysqli, $new_date_query);
$new_date_row = mysqli_fetch_array($new_date_result);

$new_user_date = $new_date_row[nextdeliday];

$new_user_opt = "UPDATE `userbase` SET `super` = '$super', `mate`='$mate', `beef` = '$beef', `tenloin`='$tenloin', `water` ='$water', `snack`='$snack', `weekend` = '$weekend', `care` = '$care', `mega`='$mega' WHERE userid = '$news_user_id'";
mysqli_query($mysqli, $new_user_opt);

$next_payday[0] = date("Y-m-d", strtotime($new_user_date));
$next_payday[1] = date("Y-m-d", strtotime("+7 days", strtotime($new_user_date)));
$next_payday[2] = date("Y-m-d", strtotime("+14 days", strtotime($new_user_date)));
$next_payday[3] = date("Y-m-d", strtotime("+21 days", strtotime($new_user_date)));
$next_post_circle = date("Y-m-d", strtotime("+28 days", strtotime($new_user_date)));

$update_nextdeliday = "UPDATE `userbase` SET `nowperiod` = '$now_period', `membership`='$table_message', `nextpayment`='$next_payday[2]', `nextdeliday` = '$next_post_circle' WHERE userid = '$userid'";
mysqli_query($mysqli, $update_nextdeliday);

$count_opt = count($select_opts);

if (in_array("R", $new_date_row)) {
    if (in_array("R", $select_opts)) {
    } else {
        for ($od = 1; $od <= 6; $od = $od + 1) {
            $option_del_id = $userid . "-" . $od;
            $option_del_query = "UPDATE `shicktest` SET `water` = '' WHERE userid = '$option_del_id'";
            mysqli_query($mysqli, $option_del_query);
        }
    }
} else {
    if (in_array("R", $select_opts)) {
        $option_del_query = "UPDATE `shicktest` SET `water` = '육수팩1' WHERE userid = '$option_del_id'";
    }
}

if (in_array("D", $new_date_row)) {
    if (in_array("D", $select_opts)) {
    } else {
        $option_del_id = $userid . "-7";
        $option_del_query = "DELETE FROM `shicktest` WHERE userid = '$option_del_id'";
        mysqli_query($mysqli, $option_del_query);
    }
} else {
    if (in_array("D", $select_opts)) {
        $shick_select_id = $userid . "-1";
        $shick_select = "SELECT `name`, `membership`, `deliday`, `opt`,`period`,`water`,`delinum` FROM shicktest WHERE userid = '$shick_select_id'";
        $shick_result = mysqli_query($mysqli, $shick_select);
        $shick_row = mysqli_fetch_array($shick_result);

        $insert_user = $userid . "-7";
        $weekend_insert_query = "INSERT INTO `shicktest` (userid, name, membership, deilday, opt, period, memo, water, delinum) VALUES ('$insert_user','$shick_row[name]','$shick_row[membership]','$shick_row[deliday]','$slick_row[opt]','$shick_row[period]','$shick_row[water]', '$shick_row[delinum]')";
        mysqli_query($mysqli, $weekend_insert_query);
    }
}

if (in_array("K", $new_date_row)) {
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

        if (in_array("D", $select_opts)) {
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

if (in_array("K", $select_opts)) {

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
while ($qq <= $opt_all_count - 1) {
    //fee를 새로 생성
    if ($opt_all_array[$qq] == "Z") {
        $item_name[$qq] = "준비기";
        $item_price[$qq] = "69000";
    } elseif ($opt_all_array[$qq] == "X") {
        $item_name[$qq] = "초기";
        $item_price[$qq] = "89000";
    } elseif ($opt_all_array[$qq] == "T") {
        $item_name[$qq] = "중기";
        $item_price[$qq] = "169000";
    } elseif ($opt_all_array[$qq] == "H") {
        $item_name[$qq] = "후기";
        $item_price[$qq] = "209000";
    } elseif ($opt_all_array[$qq] == "W") {
        $item_name[$qq] = "완료기";
        $item_price[$qq] = "239000";
    } elseif ($opt_all_array[$qq] == "Y") {
        $item_name[$qq] = "유아기";
        $item_price[$qq] = "199000";
    } elseif ($opt_all_array[$qq] == "S") {
        $item_name[$qq] = "슈퍼푸드1";

        if (in_array("Z", $opt_all_array[$qq])) {
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
    } elseif ($opt_all_array[$qq] == "Q") {
        $item_name[$qq] = "슈퍼푸드2";

        if (in_array("Z", $opt_all_array[$qq])) {
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
    } elseif ($opt_all_array[$qq] == "H") {
        $item_name[$qq] = "고기추가";

        if (in_array("Z", $opt_all_array[$qq])) {
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
    } elseif ($opt_all_array[$qq] == "B") {
        $item_name[$qq] = "안심변경";

        if (in_array("Z", $opt_all_array[$qq])) {
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
    } elseif ($opt_all_array[$qq] == "W") {
        $item_name[$qq] = "육수추가";

        if (in_array("Z", $opt_all_array[$qq])) {
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
    } elseif ($opt_all_array[$qq] == "E") {
        $item_name[$qq] = "주말팩";
        $item_price[$qq] = "0";
    } elseif ($opt_all_array[$qq] == "R") {
        $item_name[$qq] = "케어프로그램";

        if (in_array("Z", $opt_all_array[$qq])) {
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

// 여기 이후에 html 만들면 됩니다
?>