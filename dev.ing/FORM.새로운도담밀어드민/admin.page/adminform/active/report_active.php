<?php

$loginid = $_POST['userid'];
$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');


//$snack_auth_query = "SELECT userid FROM userbase WHERE opt LIKE '%간식%'";
//$snack_auth_result = mysqli_query($mysqli, $snack_auth_query);
//$snack_auth_array = array();
//while ($snack_auth_row = mysqli_fetch_array($snack_auth_result)) {
//    $snack_auth_array[] = $snack_auth_row[userid];
//}

//if (in_array("$loginid", $snack_auth_array)) {
//    $snack_auth_code = 1;
//} else {
//    $snack_auth_code = 2;
//}

?>

<link rel="stylesheet" href="/wp-content/themes/storefront-child/css/plugin/swiper.min.css?ver=<?php echo date('YmdHis') ?>" />
<link rel="stylesheet" href="/wp-content/themes/storefront-child/css/header.css?ver=<?php echo date('YmdHis') ?>" />
<script type="text/javascript" src="/wp-content/themes/storefront-child/jquery/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/wp-content/themes/storefront-child/jquery/swiper.min.js"></script>
<script type="text/javascript" src="/wp-content/themes/storefront-child/jquery/jquery.mockjax.js"></script>
<link rel="stylesheet" href="/wp-content/themes/storefront-child/css/conceptcss.css?ver=<?php echo date('YmdHis') ?>" />
<link rel="stylesheet" href="/wp-content/themes/storefront-child/css/con3.css?ver=<?php echo date('YmdHis') ?>" />

<style>
    /* #move_paycheck_click { display:none !important; } */
</style>


<!--유저데이터-->
<?php
//조건전체출력
$user_query = "SELECT * FROM research WHERE userid = '$loginid' ORDER BY date DESC LIMIT 1";
$user_query_result = mysqli_query($mysqli, $user_query);
$userrow = mysqli_fetch_array($user_query_result);
$user_date = $userrow[date];
$user_username = $userrow[username];
$user_babyname = $userrow[babyname];
$user_gender = $userrow[gender];

if ($user_gender == "man") {
    $user_gender = "남아";
    $user_gendera = "man";
} elseif ($usre_gender == "girl") {
    $user_gender = "여아";
    $user_gendera = "girl";
} else {
    $user_gender = $user_gender;

    if ($user_gender == "남아") {
        $user_gendera = "man";
    } else {
        $user_gendera = "girl";
    }
}

$user_birthday = $userrow[birthday];
$user_monthly = $userrow[monthly];
$user_period = $userrow[period];
$user_weight = $userrow[weight];
$user_height = $userrow[height];
$user_phone = $userrow[phone];
$user_satisfaction = $userrow[satisfaction];
$user_yessatis = $userrow[yessatis];
$user_nonsatis = $userrow[nonsatis];
$user_fresh = $userrow[fresh];
$user_nofresh = $userrow[nofresh];
$user_milk = $userrow[milk];
$user_nursing = $userrow[nursing];
$user_amount = $userrow[amount];
$user_unusual = $userrow[unusual];
$user_otherunusual = $userrow[otherunusual];
$birthday_year = $userrow[year];
$birthday_day = $userrow[day];
$birthday_month = $userrow[month];
$target_date = strtotime($user_birthday);
$today_date = strtotime(date("Y-m-d"));
$dday_date = $today_date - $target_date;
$dday_date = floor($dday_date) / 86400;
$todgn_date = $dday_date + 1;
$userz_date = strtotime($user_date);
$reserch_date = date("Y.m.d", $userz_date);
?>
<!--무게키계산기-->
<?php
$i = 0;
while ($i < 21) {
    $height_query = "SELECT height FROM research WHERE userid = '$loginid' AND monthly = $i";
    $height_result = mysqli_query($mysqli, $height_query);
    $heightrow = mysqli_fetch_array($height_result);
    $height_graph[$i] = $heightrow[height];
    $i++;
}
$j = 0;
while ($j < 21) {
    $weight_query = "SELECT weight FROM research WHERE userid = '$loginid' AND monthly = $j";
    $weight_result = mysqli_query($mysqli, $weight_query);
    $weightrow = mysqli_fetch_array($weight_result);
    $weight_graph[$j] = $weightrow[weight];
    $j++;
} ?>
<?php
$k = $user_monthly - 1;
$l = $user_monthly;
$before_weight = $weight_graph[$k];
$before_height = $height_graph[$k];
$after_weight = $weight_graph[$l];
$after_height = $height_graph[$l];
$sum_weight = $after_weight - $before_weight;
$sum_height = $after_height - $before_height;
?>
<?php
$center_value = "50th";
$dopyo_1_query = "SELECT * FROM dopyo WHERE gender = '$user_gender' AND monthly = '$user_monthly' AND category = 'height'";
$dopyo_1_result = mysqli_query($mysqli, $dopyo_1_query);
$dopyo_1_row = mysqli_fetch_array($dopyo_1_result);
$bigyo_height = $dopyo_1_row[$center_value];
$dopyo_2_query = "SELECT * FROM dopyo WHERE gender = '$user_gender' AND monthly = '$user_monthly' AND category = 'weight'";
$dopyo_2_result = mysqli_query($mysqli, $dopyo_2_query);
$dopyo_2_row = mysqli_fetch_array($dopyo_2_result);
$bigyo_weight = $dopyo_2_row[$center_value];
if ($weight_graph[$user_monthly] <= $bigyo_weight) {
    $bigyo_after_weight = 1;
} else {
    $bigyo_after_weight = 0;
}
if ($height_graph[$user_monthly] <= $bigyo_height) {
    $bigyo_after_height = 1;
} else {
    $bigyo_after_height = 0;
} ?>
<!--아기정보-->
<?php
// 아기 월령별 성장발달
// 신체발달
$dev_query = "SELECT * FROM babydev WHERE babymonth = '$user_monthly'";
$dev_result = mysqli_query($mysqli, $dev_query);
$dev_row = mysqli_fetch_array($dev_result);
$physical = $dev_row[physical];
$emotion = $dev_row[emotion];
$language = $dev_row[language];
$cognitive = $dev_row[cognitive];
?>
<!--daylog-->
<?php
$loginids = "$loginid" . "-1";
$loginidss = "$loginid" . "-2";
$loginidsss = "$loginid" . "-3";
$loginidssss = "$loginid" . "-4";
$loginidsssss = "$loginid" . "-5";
$loginidssssss = "$loginid" . "-6";
$d = date("Y-m-d");
$prev_month = strtotime($d . "-1 month");
//$start_date = date("Y-m-01", $prev_month);
//$end_date = date("Y-m-t",$prev_month);
$daylog_query = "SELECT delinum FROM shicktest WHERE userid = '$loginids'";
$daylog_result = mysqli_query($mysqli, $daylog_query);
$daylog_row = mysqli_fetch_array($daylog_result);
$daylog = $daylog_row[delinum];
?>
<!--특이사항교육자료-->
<?php
// 설문조사 특이사항에 대한 교육자료 출력
// 특이사항별, 없을시 개월수에 따른 이미지파일 출력
$unusual_query = "SELECT * FROM edutable WHERE education = '$user_unusual'";
$unusual_result = mysqli_query($mysqli, $unusual_query);
$unusual_row = mysqli_fetch_array($unusual_result);
$edudata = $unusual_row[$user_monthly];
?>
<!--영양소총계산-->
<?php
$aa = 0;
$bb = 1;
$cc = 2;
$dd = 3;
if ($daylog == $aa) {
    $day_cont = "MON";
} else if ($daylog == $bb) {
    $day_cont = "TUE";
} else if ($daylog == $cc) {
    $day_cont = "WED";
} else if ($daylog == $dd) {
    $day_cont = "THU";
} else {
    $day_cont = "FRI";
}

$start_date = date("Y-m-d");
$rotationday = date("Y-m-d", strtotime($start_date . $day_cont));
$lasts_day[3] = date("Y-m-d", strtotime("-4 weeks", strtotime($rotationday)));
$lasts_day[2] = date("Y-m-d", strtotime("-3 weeks", strtotime($rotationday)));
$lasts_day[1] = date("Y-m-d", strtotime("-2 weeks", strtotime($rotationday)));
$lasts_day[0] = date("Y-m-d", strtotime("-1 weeks", strtotime($rotationday)));

//$x=0;
//for ($rotationday = strtotime($start_date.$day_cont),
//     $rotationdaye = strtotime($end_date);
//     $rotationday <= $rotationdaye;
//     $rotationday = $rotationday + 86400 * 7 )
//{    $lasts_day[$x] = date('Y-m-d', $rotationday);
//    $x++;
//}

$today = "SELECT * FROM shicktest WHERE userid = '$loginids'";
$result = mysqli_query($mysqli, $today);
while ($row = mysqli_fetch_array($result)) {
    $menunama = $row[$lasts_day[0]];
    $menunamb = $row[$lasts_day[1]];
    $menunamc = $row[$lasts_day[2]];
    $menunamd = $row[$lasts_day[3]];
}
$todayy = "SELECT * FROM shicktest WHERE userid = '$loginidss'";
$results = mysqli_query($mysqli, $todayy);
while ($row = mysqli_fetch_array($results)) {
    $menunamaa = $row[$lasts_day[0]];
    $menunambb = $row[$lasts_day[1]];
    $menunamcc = $row[$lasts_day[2]];
    $menunamdd = $row[$lasts_day[3]];
    //echo "<tr><td>",$row[$abouttime],"</td></tr>" ;
}
$todayyy = "SELECT * FROM shicktest WHERE userid = '$loginidsss'";
$resultss = mysqli_query($mysqli, $todayyy);
while ($row = mysqli_fetch_array($resultss)) {
    $menunamaaa = $row[$lasts_day[0]];
    $menunambbb = $row[$lasts_day[1]];
    $menunamccc = $row[$lasts_day[2]];
    $menunamddd = $row[$lasts_day[3]];
    //echo "<tr><td>",$row[$abouttime],"</td></tr>" ;
}
$todayyyy = "SELECT * FROM shicktest WHERE userid = '$loginidssss'";
$resultsss = mysqli_query($mysqli, $todayyyy);
while ($row = mysqli_fetch_array($resultsss)) {
    $menunamaaaa = $row[$lasts_day[0]];
    $menunambbbb = $row[$lasts_day[1]];
    $menunamcccc = $row[$lasts_day[2]];
    $menunamdddd = $row[$lasts_day[3]];
    //echo "<tr><td>",$row[$abouttime],"</td></tr>" ;
}
$todayyyyy = "SELECT * FROM shicktest WHERE userid = '$loginidsssss'";
$resultssss = mysqli_query($mysqli, $todayyyyy);
while ($row = mysqli_fetch_array($resultssss)) {
    $menunamaaaaa = $row[$lasts_day[0]];
    $menunambbbbb = $row[$lasts_day[1]];
    $menunamccccc = $row[$lasts_day[2]];
    $menunamddddd = $row[$lasts_day[3]];
    //echo "<tr><td>",$row[$abouttime],"</td></tr>" ;
}
$todayyyyyy = "SELECT * FROM shicktest WHERE userid = '$loginidssssss'";
$resultsssss = mysqli_query($mysqli, $todayyyyyy);
while ($row = mysqli_fetch_array($resultsssss)) {
    $menunamaaaaaa = $row[$lasts_day[0]];
    $menunambbbbbb = $row[$lasts_day[1]];
    $menunamcccccc = $row[$lasts_day[2]];
    $menunamdddddd = $row[$lasts_day[3]];
    //echo "<tr><td>",$row[$abouttime],"</td></tr>" ;
} //영양소계산띠

//스낵메뉴 등
for ($number = 1; $number <= 4; $number = $number + 1) {
    $snackid = $loginid . "-" . $number;
    $snack_table_query = "SELECT * FROM snacktable WHERE userid = '$snackid'";
    $snack_table_result = mysqli_query($mysqli, $snack_table_query);
    while ($snack_table_row = mysqli_fetch_array($snack_table_result)) {
        $snack_table_menu[1][$number] = $snack_table_row[$lasts_day[0]];
        $snack_table_menu[2][$number] = $snack_table_row[$lasts_day[1]];
        $snack_table_menu[3][$number] = $snack_table_row[$lasts_day[2]];
        $snack_table_menu[4][$number] = $snack_table_row[$lasts_day[3]];
    }
}

//스낵메뉴 영양소
for ($number = 1; $number <= 4; $number = $number + 1) {
    for ($inser_num = 1; $inser_num <= 4; $inser_num = $inser_num + 1) {
        $spec_menu = $snack_table_menu[$inser_num][$number];
        $snack_nutr_spec = "SELECT * FROM menutest WHERE menu = '$spec_menu'";
        $snack_nutr_result = mysqli_query($mysqli, $snack_nutr_spec);
        while ($snack_nutr_row = mysqli_fetch_array($snack_nutr_result)) {
            $snack_nutr_cal[$inser_num][$number] = $snack_nutr_row[calorie];
            $snack_nutr_pro[$inser_num][$number] = $snack_nutr_row[protein];
            $snack_nutr_fat[$inser_num][$number] = $snack_nutr_row[fat];
            $snack_nutr_car[$inser_num][$number] = $snack_nutr_row[carbohydrate];
            $snack_nutr_ncal[$inser_num][$number] = $snack_nutr_row[needcalorie];
            $snack_nutr_npro[$inser_num][$number] = $snack_nutr_row[needprotein];
            $snack_nutr_nfat[$inser_num][$number] = $snack_nutr_row[needfat];
            $snack_nutr_ncar[$inser_num][$number] = $snack_nutr_row[needcarbohydrate];
        }
    }
}

//1주차
$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunama'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ($nut_row = mysqli_fetch_array($nut_result)) {
    $week1cal1 = $nut_row[calorie];
    $week1pro1 = $nut_row[protein];
    $week1pat1 = $nut_row[fat];
    $week1car1 = $nut_row[carbohydrate];
    $need1cal1 = $nut_row[needcalorie];
    $need1pro1 = $nut_row[needprotein];
    $need1pat1 = $nut_row[needfat];
    $need1car1 = $nut_row[needcarbohydrate];
}
$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamb'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ($nut_row = mysqli_fetch_array($nut_result)) {
    $week1cal2 = $nut_row[calorie];
    $week1pro2 = $nut_row[protein];
    $week1pat2 = $nut_row[fat];
    $week1car2 = $nut_row[carbohydrate];
    $need1cal2 = $nut_row[needcalorie];
    $need1pro2 = $nut_row[needprotein];
    $need1pat2 = $nut_row[needfat];
    $need1car2 = $nut_row[needcarbohydrate];
}
$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamc'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ($nut_row = mysqli_fetch_array($nut_result)) {
    $week1cal3 = $nut_row[calorie];
    $week1pro3 = $nut_row[protein];
    $week1pat3 = $nut_row[fat];
    $week1car3 = $nut_row[carbohydrate];
    $need1cal3 = $nut_row[needcalorie];
    $need1pro3 = $nut_row[needprotein];
    $need1pat3 = $nut_row[needfat];
    $need1car3 = $nut_row[needcarbohydrate];
}
$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamd'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ($nut_row = mysqli_fetch_array($nut_result)) {
    $week1cal4 = $nut_row[calorie];
    $week1pro4 = $nut_row[protein];
    $week1pat4 = $nut_row[fat];
    $week1car4 = $nut_row[carbohydrate];
    $need1cal4 = $nut_row[needcalorie];
    $need1pro4 = $nut_row[needprotein];
    $need1pat4 = $nut_row[needfat];
    $need1car4 = $nut_row[needcarbohydrate];
} //2주차
$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamaa'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ($nut_row = mysqli_fetch_array($nut_result)) {
    $week2cal1 = $nut_row[calorie];
    $week2pro1 = $nut_row[protein];
    $week2pat1 = $nut_row[fat];
    $week2car1 = $nut_row[carbohydrate];
    $need2cal1 = $nut_row[needcalorie];
    $need2pro1 = $nut_row[needprotein];
    $need2pat1 = $nut_row[needfat];
    $need2car1 = $nut_row[needcarbohydrate];
}
$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunambb'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ($nut_row = mysqli_fetch_array($nut_result)) {
    $week2cal2 = $nut_row[calorie];
    $week2pro2 = $nut_row[protein];
    $week2pat2 = $nut_row[fat];
    $week2car2 = $nut_row[carbohydrate];
    $need2cal2 = $nut_row[needcalorie];
    $need2pro2 = $nut_row[needprotein];
    $need2pat2 = $nut_row[needfat];
    $need2car2 = $nut_row[needcarbohydrate];
}
$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamcc'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ($nut_row = mysqli_fetch_array($nut_result)) {
    $week2cal3 = $nut_row[calorie];
    $week2pro3 = $nut_row[protein];
    $week2pat3 = $nut_row[fat];
    $week2car3 = $nut_row[carbohydrate];
    $need2cal3 = $nut_row[needcalorie];
    $need2pro3 = $nut_row[needprotein];
    $need2pat3 = $nut_row[needfat];
    $need2car3 = $nut_row[needcarbohydrate];
}
$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamdd'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ($nut_row = mysqli_fetch_array($nut_result)) {
    $week2cal4 = $nut_row[calorie];
    $week2pro4 = $nut_row[protein];
    $week2pat4 = $nut_row[fat];
    $week2car4 = $nut_row[carbohydrate];
    $need2cal4 = $nut_row[needcalorie];
    $need2pro4 = $nut_row[needprotein];
    $need2pat4 = $nut_row[needfat];
    $need2car4 = $nut_row[needcarbohydrate];
} //3주차
$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamaaa'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ($nut_row = mysqli_fetch_array($nut_result)) {
    $week3cal1 = $nut_row[calorie];
    $week3pro1 = $nut_row[protein];
    $week3pat1 = $nut_row[fat];
    $week3car1 = $nut_row[carbohydrate];
    $need3cal1 = $nut_row[needcalorie];
    $need3pro1 = $nut_row[needprotein];
    $need3pat1 = $nut_row[needfat];
    $need3car1 = $nut_row[needcarbohydrate];
}
$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunambbb'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ($nut_row = mysqli_fetch_array($nut_result)) {
    $week3cal2 = $nut_row[calorie];
    $week3pro2 = $nut_row[protein];
    $week3pat2 = $nut_row[fat];
    $week3car2 = $nut_row[carbohydrate];
    $need3cal2 = $nut_row[needcalorie];
    $need3pro2 = $nut_row[needprotein];
    $need3pat2 = $nut_row[needfat];
    $need3car2 = $nut_row[needcarbohydrate];
}
$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamccc'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ($nut_row = mysqli_fetch_array($nut_result)) {
    $week3cal3 = $nut_row[calorie];
    $week3pro3 = $nut_row[protein];
    $week3pat3 = $nut_row[fat];
    $week3car3 = $nut_row[carbohydrate];
    $need3cal3 = $nut_row[needcalorie];
    $need3pro3 = $nut_row[needprotein];
    $need3pat3 = $nut_row[needfat];
    $need3car3 = $nut_row[needcarbohydrate];
}
$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamddd'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ($nut_row = mysqli_fetch_array($nut_result)) {
    $week3cal4 = $nut_row[calorie];
    $week3pro4 = $nut_row[protein];
    $week3pat4 = $nut_row[fat];
    $week3car4 = $nut_row[carbohydrate];
    $need3cal4 = $nut_row[needcalorie];
    $need3pro4 = $nut_row[needprotein];
    $need3pat4 = $nut_row[needfat];
    $need3car4 = $nut_row[needcarbohydrate];
} //4주차
$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamaaaa'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ($nut_row = mysqli_fetch_array($nut_result)) {
    $week4cal1 = $nut_row[calorie];
    $week4pro1 = $nut_row[protein];
    $week4pat1 = $nut_row[fat];
    $week4car1 = $nut_row[carbohydrate];
    $need4cal1 = $nut_row[needcalorie];
    $need4pro1 = $nut_row[needprotein];
    $need4pat1 = $nut_row[needfat];
    $need4car1 = $nut_row[needcarbohydrate];
}
$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunambbbb'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ($nut_row = mysqli_fetch_array($nut_result)) {
    $week4cal2 = $nut_row[calorie];
    $week4pro2 = $nut_row[protein];
    $week4pat2 = $nut_row[fat];
    $week4car2 = $nut_row[carbohydrate];
    $need4cal2 = $nut_row[needcalorie];
    $need4pro2 = $nut_row[needprotein];
    $need4pat2 = $nut_row[needfat];
    $need4car2 = $nut_row[needcarbohydrate];
}
$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamcccc'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ($nut_row = mysqli_fetch_array($nut_result)) {
    $week4cal3 = $nut_row[calorie];
    $week4pro3 = $nut_row[protein];
    $week4pat3 = $nut_row[fat];
    $week4car3 = $nut_row[carbohydrate];
    $need4cal3 = $nut_row[needcalorie];
    $need4pro3 = $nut_row[needprotein];
    $need4pat3 = $nut_row[needfat];
    $need4car3 = $nut_row[needcarbohydrate];
}
$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamdddd'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ($nut_row = mysqli_fetch_array($nut_result)) {
    $week4cal4 = $nut_row[calorie];
    $week4pro4 = $nut_row[protein];
    $week4pat4 = $nut_row[fat];
    $week4car4 = $nut_row[carbohydrate];
    $need4cal4 = $nut_row[needcalorie];
    $need4pro4 = $nut_row[needprotein];
    $need4pat4 = $nut_row[needfat];
    $need4car4 = $nut_row[needcarbohydrate];
}

$snack_nutr_cal[$inser_num][$number] = $snack_nutr_row[calorie];
$snack_nutr_pro[$inser_num][$number] = $snack_nutr_row[protein];
$snack_nutr_fat[$inser_num][$number] = $snack_nutr_row[fat];
$snack_nutr_car[$inser_num][$number] = $snack_nutr_row[carbohydrate];
$snack_nutr_ncal[$inser_num][$number] = $snack_nutr_row[needcalorie];
$snack_nutr_npro[$inser_num][$number] = $snack_nutr_row[needprotein];
$snack_nutr_nfat[$inser_num][$number] = $snack_nutr_row[needfat];
$snack_nutr_ncar[$inser_num][$number] = $snack_nutr_row[needcarbohydrate];

$sum_week1_cal = $week1cal1 + $week1cal2 + $week1cal3 + $week1cal4 + $snack_nutr_cal[1][1] + $snack_nutr_cal[1][2] + $snack_nutr_cal[1][3] + $snack_nutr_cal[1][4];
$sum_week2_cal = $week2cal1 + $week2cal2 + $week2cal3 + $week2cal4 + $snack_nutr_cal[2][1] + $snack_nutr_cal[2][2] + $snack_nutr_cal[2][3] + $snack_nutr_cal[2][4];
$sum_week3_cal = $week3cal1 + $week3cal2 + $week3cal3 + $week3cal4 + $snack_nutr_cal[3][1] + $snack_nutr_cal[3][2] + $snack_nutr_cal[3][3] + $snack_nutr_cal[3][4];
$sum_week4_cal = $week4cal1 + $week4cal2 + $week4cal3 + $week4cal4 + $snack_nutr_cal[4][1] + $snack_nutr_cal[4][2] + $snack_nutr_cal[4][3] + $snack_nutr_cal[4][4];
$sum_cal = $sum_week1_cal + $sum_week2_cal + $sum_week3_cal + $sum_week4_cal;
$sum_week1_pro = $week1pro1 + $week1pro2 + $week1pro3 + $week1pro4 + $snack_nutr_pro[1][1] + $snack_nutr_pro[1][2] + $snack_nutr_pro[1][3] + $snack_nutr_pro[1][4];
$sum_week2_pro = $week2pro1 + $week2pro2 + $week2pro3 + $week2pro4 + $snack_nutr_pro[2][1] + $snack_nutr_pro[2][2] + $snack_nutr_pro[2][3] + $snack_nutr_pro[2][4];
$sum_week3_pro = $week3pro1 + $week3pro2 + $week3pro3 + $week3pro4 + $snack_nutr_pro[3][1] + $snack_nutr_pro[3][2] + $snack_nutr_pro[3][3] + $snack_nutr_pro[3][4];
$sum_week4_pro = $week4pro1 + $week4pro2 + $week4pro3 + $week4pro4 + $snack_nutr_pro[4][1] + $snack_nutr_pro[4][2] + $snack_nutr_pro[4][3] + $snack_nutr_pro[4][4];
$sum_pro = $sum_week1_pro + $sum_week2_pro + $sum_week3_pro + $sum_week4_pro;
$sum_week1_pat = $week1pat1 + $week1pat2 + $week1pat3 + $week1pat4 + $snack_nutr_fat[1][1] + $snack_nutr_fat[1][2] + $snack_nutr_fat[1][3] + $snack_nutr_fat[1][4];
$sum_week2_pat = $week2pat1 + $week2pat2 + $week2pat3 + $week2pat4 + $snack_nutr_fat[2][1] + $snack_nutr_fat[2][2] + $snack_nutr_fat[2][3] + $snack_nutr_fat[2][4];
$sum_week3_pat = $week3pat1 + $week3pat2 + $week3pat3 + $week3pat4 + $snack_nutr_fat[3][1] + $snack_nutr_fat[3][2] + $snack_nutr_fat[3][3] + $snack_nutr_fat[3][4];
$sum_week4_pat = $week4pat1 + $week4pat2 + $week4pat3 + $week4pat4 + $snack_nutr_fat[4][1] + $snack_nutr_fat[4][2] + $snack_nutr_fat[4][3] + $snack_nutr_fat[4][4];
$sum_pat = $sum_week1_pat + $sum_week2_pat + $sum_week3_pat + $sum_week4_pat;
$sum_week1_car = $week1car1 + $week1car2 + $week1car3 + $week1car4 + $snack_nutr_fat[1][1] + $snack_nutr_fat[1][2] + $snack_nutr_fat[1][3] + $snack_nutr_fat[1][4];
$sum_week2_car = $week2car1 + $week2car2 + $week2car3 + $week2car4 + $snack_nutr_fat[2][1] + $snack_nutr_fat[2][2] + $snack_nutr_fat[2][3] + $snack_nutr_fat[2][4];
$sum_week3_car = $week3car1 + $week3car2 + $week3car3 + $week3car4 + $snack_nutr_fat[2][1] + $snack_nutr_fat[2][2] + $snack_nutr_fat[3][3] + $snack_nutr_fat[3][4];
$sum_week4_car = $week4car1 + $week4car2 + $week4car3 + $week4car4 + $snack_nutr_fat[4][1] + $snack_nutr_fat[4][2] + $snack_nutr_fat[4][3] + $snack_nutr_fat[4][4];
$sum_car = $sum_week1_car + $sum_week2_car + $sum_week3_car + $sum_week4_car;
$sum_need1_cal = $need1cal1 + $need1cal2 + $need1cal3 + $need1cal4 + $snack_nutr_ncal[1][1] + $snack_nutr_ncal[1][2] + $snack_nutr_ncal[1][3] + $snack_nutr_ncal[1][4];
$sum_need2_cal = $need2cal1 + $need2cal2 + $need2cal3 + $need2cal4 + $snack_nutr_ncal[2][1] + $snack_nutr_ncal[2][2] + $snack_nutr_ncal[2][3] + $snack_nutr_ncal[2][4];
$sum_need3_cal = $need3cal1 + $need3cal2 + $need3cal3 + $need3cal4 + $snack_nutr_ncal[3][1] + $snack_nutr_ncal[3][2] + $snack_nutr_ncal[3][3] + $snack_nutr_ncal[3][4];
$sum_need4_cal = $need4cal1 + $need4cal2 + $need4cal3 + $need4cal4 + $snack_nutr_ncal[4][1] + $snack_nutr_ncal[4][2] + $snack_nutr_ncal[4][3] + $snack_nutr_ncal[4][4];
$sum_need_cal = $sum_need1_cal + $sum_need2_cal + $sum_need3_cal + $sum_need4_cal;
$sum_need1_pro = $need1pro1 + $need1pro2 + $need1pro3 + $need1pro4 + $snack_nutr_npro[1][1] + $snack_nutr_npro[1][2] + $snack_nutr_npro[1][3] + $snack_nutr_npro[1][4];
$sum_need2_pro = $need2pro1 + $need2pro2 + $need2pro3 + $need2pro4 + $snack_nutr_npro[2][1] + $snack_nutr_npro[2][2] + $snack_nutr_npro[2][3] + $snack_nutr_npro[2][4];
$sum_need3_pro = $need3pro1 + $need3pro2 + $need3pro3 + $need3pro4 + $snack_nutr_npro[3][1] + $snack_nutr_npro[3][2] + $snack_nutr_npro[3][3] + $snack_nutr_npro[3][4];
$sum_need4_pro = $need4pro1 + $need4pro2 + $need4pro3 + $need4pro4 + $snack_nutr_npro[4][1] + $snack_nutr_npro[4][2] + $snack_nutr_npro[4][3] + $snack_nutr_npro[4][4];
$sum_need_pro = $sum_need1_pro + $sum_need2_pro + $sum_need3_pro + $sum_need4_pro;
$sum_need1_pat = $need1pat1 + $need1pat2 + $need1pat3 + $need1pat4 + $snack_nutr_nfat[1][1] + $snack_nutr_nfat[1][2] + $snack_nutr_nfat[1][3] + $snack_nutr_nfat[1][4];
$sum_need2_pat = $need2pat1 + $need2pat2 + $need2pat3 + $need2pat4 + $snack_nutr_nfat[2][1] + $snack_nutr_nfat[2][2] + $snack_nutr_nfat[2][3] + $snack_nutr_nfat[2][4];
$sum_need3_pat = $need3pat1 + $need3pat2 + $need3pat3 + $need3pat4 + $snack_nutr_nfat[3][1] + $snack_nutr_nfat[3][2] + $snack_nutr_nfat[3][3] + $snack_nutr_nfat[3][4];
$sum_need4_pat = $need4pat1 + $need4pat2 + $need4pat3 + $need4pat4 + $snack_nutr_nfat[4][1] + $snack_nutr_nfat[4][2] + $snack_nutr_nfat[4][3] + $snack_nutr_nfat[4][4];
$sum_need_pat = $sum_need1_pat + $sum_need2_pat + $sum_need3_pat + $sum_need4_pat;
$sum_need1_car = $need1car1 + $need1car2 + $need1car3 + $need1car4 + $snack_nutr_ncar[1][1] + $snack_nutr_ncar[1][2] + $snack_nutr_ncar[1][3] + $snack_nutr_ncar[1][4];
$sum_need2_car = $need2car1 + $need2car2 + $need2car3 + $need2car4 + $snack_nutr_ncar[2][1] + $snack_nutr_ncar[2][2] + $snack_nutr_ncar[2][3] + $snack_nutr_ncar[2][4];
$sum_need3_car = $need3car1 + $need3car2 + $need3car3 + $need3car4 + $snack_nutr_ncar[3][1] + $snack_nutr_ncar[3][2] + $snack_nutr_ncar[3][3] + $snack_nutr_ncar[3][4];
$sum_need4_car = $need4car1 + $need4car2 + $need4car3 + $need4car4 + $snack_nutr_ncar[4][1] + $snack_nutr_ncar[4][2] + $snack_nutr_ncar[4][3] + $snack_nutr_ncar[4][4];
$sum_need_car = $sum_need1_car + $sum_need2_car + $sum_need3_car + $sum_need4_car;
?>

<!--menudev-->
<?php
$menudev_query = "SELECT * FROM userbase WHERE userid = '$loginid'";
$menudev_result = mysqli_query($mysqli, $menudev_query);
$menudev_row = mysqli_fetch_array($menudev_result);
$baby_period = $menudev_row[nowperiod];
$babydev_query = "SELECT * FROM menudev WHERE period = '$baby_period'";
$babydev_result = mysqli_query($mysqli, $babydev_query);
$babydev_row = mysqli_fetch_array($babydev_result);
$now_menuinfo = $babydev_row[menuinfo];
$now_precautions = $babydev_row[precautions];
?>
<!--영양정보-->
<?php
$nutr_query = "SELECT * FROM nutrtest WHERE period = '$user_period'";
$nutr_result = mysqli_query($mysqli, $nutr_query);
$nutr_row = mysqli_fetch_array($nutr_result);
$nutr_cal = $nutr_row[cal];
$nutr_fat = $nutr_row[fat];
$nutr_car = $nutr_row[car];
$nutr_pro = $nutr_row[pro];
$per_cal = ($sum_cal / $sum_need_cal) * 100;
$per_car = ($sum_car / $sum_need_car) * 100;
$per_pro = ($sum_pro / $sum_need_pro) * 100;
$per_pat = ($sum_pat / $sum_need_pat) * 100;
$pers_cal = round($per_cal);
$pers_car = round($per_car);
$pers_pro = round($per_pro);
$pers_pat = round($per_pat);
?>
<!--밥스케줄-->
<?php

$meal_schedule_query = "SELECT * FROM reportschedule WHERE period = '$baby_period'";
$meal_schedule_result = mysqli_query($mysqli, $meal_schedule_query);
$meal_schedule_row = mysqli_fetch_array($meal_schedule_result);

$yamount = $meal_schedule_row[yamount];
$ycount = $meal_schedule_row[ycount];
$ytime = $meal_schedule_row[ytime];
$eamount = $meal_schedule_row[eamount];
$ecount = $meal_schedule_row[ecount];
$etime = $meal_schedule_row[etime];
$etime2 = $meal_schedule_row[etime2];
$texter = $meal_schedule_row[texter];
$snack = $meal_schedule_row[snack];
$formimg = $meal_schedule_row[formimg];
$form = $meal_schedule_row[form];

?>
<!--첫시작시기-->
<?php
$userbase_query = "SELECT * FROM userbase WHERE userid = '$loginid'";
$userbase_result = mysqli_query($mysqli, $userbase_query);
$userbase_row = mysqli_fetch_array($userbase_result);
$user_firstperiod = $userbase_row[firstperiod];
$limit_day = $userbase_row[limitday];
?>
<!--원그래프-->
<?php
$real_last = date("Y-m-t", strtotime($lasts_day[0]));
$rhrfb = 0;
$rhkdlffb = 0;
$djdbrfb = 0;
$dbwpvna = 0;
$cothfb = 0;
$dounut_query = "(SELECT * FROM shicktest WHERE userid LIKE '$loginid%') UNION (SELECT * FROM snacktable WHERE userid LIKE '$loginid%')";
$dounut_result = mysqli_query($mysqli, $dounut_query);
while ($dounut_row = mysqli_fetch_array($dounut_result)) {
    $i = 0;
    $q = date("Y-m-d", strtotime($lasts_day[3]));
    $p = date("Y-m-d", strtotime($lasts_day[0]));
    while (strtotime($q) <= strtotime($p)) {
        $dou_menu_query = "SELECT * FROM menutest WHERE menu = '$dounut_row[$q]'";
        $dou_menu_result = mysqli_query($mysqli, $dou_menu_query);
        $dou_menu_row = mysqli_fetch_array($dou_menu_result);
        $dou_obj[$i] = $dou_menu_row;

        if (in_array("김", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("김", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("닭고기", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("닭고기", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $djdbrfb = $djdbrfb + $showout[$i][$key[$i]];
        }
        if (in_array("건미역", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("건미역", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("수수", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("수수", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("연두부", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("연두부", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $djdbrfb = $djdbrfb + $showout[$i][$key[$i]];
        }
        if (in_array("차조", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("차조", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("감자", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("감자", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("찹쌀", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("찹쌀", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("치즈", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("치즈", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $dbwpvna = $dbwpvna + $showout[$i][$key[$i]];
        }
        if (in_array("한우", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("한우", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $djdbrfb = $djdbrfb + $showout[$i][$key[$i]];
        }
        if (in_array("현미", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("현미", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("흑미", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("흑미", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("쌀가루", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("쌀가루", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("찹쌀가루", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("찹쌀가루", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("무", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("무", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("양배추", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("양배추", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("시금치", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("시금치", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("고구마", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("고구마", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("애호박", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("애호박", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("브로콜리", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("브로콜리", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("연근", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("연근", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("오이", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("오이", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("청경채", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("청경채", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("귀리", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("귀리", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("단호박", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("단호박", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("비타민", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("비타민", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("밤", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("밤", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("사과", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("사과", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhkdlffb = $rhkdlffb + $showout[$i][$key[$i]];
        }
        if (in_array("배", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("배", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhkdlffb = $rhkdlffb + $showout[$i][$key[$i]];
        }
        if (in_array("안심", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("안심", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $djdbrfb = $djdbrfb + $showout[$i][$key[$i]];
        }
        if (in_array("완두콩가루", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("완두콩가루", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("노란콩가루", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("노란콩가루", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("쌀", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("쌀", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("강낭콩", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("강낭콩", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("보리", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("보리", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("퀴노아", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("퀴노아", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("전분", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("전분", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("당근", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("당근", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("현미가루", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("현미가루", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("비트", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("비트", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("밀가루", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("밀가루", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("파프리카", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("파프리카", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("검은콩가루", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("검은콩가루", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("한천", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("한천", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("바나나", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("바나나", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhkdlffb = $rhkdlffb + $showout[$i][$key[$i]];
        }
        if (in_array("표고", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("표고", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("케일", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("케일", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("양파", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("양파", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("돼지고기", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("돼지고기", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $djdbrfb = $djdbrfb + $showout[$i][$key[$i]];
        }
        if (in_array("근대", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("근대", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("병아리콩", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("병아리콩", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("블루베리", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("블루베리", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhkdlffb = $rhkdlffb + $showout[$i][$key[$i]];
        }
        if (in_array("아욱", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("아욱", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("양송이", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("양송이", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("렌틸콩", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("렌틸콩", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("로메인", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("로메인", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("느타리", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("느타리", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("배추", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("배추", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("새송이", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("새송이", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("돌나물", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("돌나물", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("가지", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("가지", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("옥수수", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("옥수수", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("봄동", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("봄동", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("콜라비", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("콜라비", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("깻잎", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("깻잎", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("열무", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("열무", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("방울토마토", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("방울토마토", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("건파래", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("건파래", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("취나물", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("취나물", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("참나물", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("참나물", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("적채", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("적채", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("부추", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("부추", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("건톳", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("건톳", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("우엉", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("우엉", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("대추", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("대추", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("아몬드", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("아몬드", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("잣", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("잣", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("건목이", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("건목이", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("쪽파", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("쪽파", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("세발나물", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("세발나물", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("루꼴라", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("루꼴라", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("피망", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("피망", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("마늘쫑", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("마늘쫑", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("팽이", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("팽이", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("홍미", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("홍미", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("들깨가루", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("들깨가루", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("건고사리", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("건고사리", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if (in_array("참깨", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("참깨", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("호두", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("호두", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("기장", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("기장", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("팥가루", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("팥가루", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if (in_array("테프가루", preg_replace("/[0-9]/", "", $dou_obj[$i]))) {
            $checkout[$i] = preg_replace("/[0-9]/", "", $dou_obj[$i]);
            $key[$i] = array_search("테프가루", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/", "", $dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }

        $q = date("Y-m-d", strtotime("+1 days", strtotime($q)));
        $i = $i++;
    }
}
if (empty($cothfb)) {
    $cothfb = 0;
}
if (empty($djdbrfb)) {
    $djdbrfb = 0;
}
if (empty($rhkdlffb)) {
    $rhkdlffb = 0;
}
if (empty($dbwpvna)) {
    $dbwpvna = 0;
}
if (empty($rhrfb)) {
    $rhrfb = 0;
} ?>
<?php
$snackmenu_query = "SELECT * FROM snackmenu WHERE period = '$baby_period'";
$snackmenu_result = mysqli_query($mysqli, $snackmenu_query);
$snackmenu_row = mysqli_fetch_array($snackmenu_result);
$snack_material = $snackmenu_row[material];
$snack_ingr1 = $snackmenu_row[ingr1];
$snack_ingr2 = $snackmenu_row[ingr2];
$snack_ingr3 = $snackmenu_row[ingr3];
$snack_explains = $snackmenu_row[explains];
$snack_menuname = $snackmenu_row[menuname];
$snack_submate = $snackmenu_row[submate];
$snack_reci1 = $snackmenu_row[reci1];
$snack_reci2 = $snackmenu_row[reci2];
$snack_reci3 = $snackmenu_row[reci3];
$snack_reci4 = $snackmenu_row[reci4];
$snack_reci5 = $snackmenu_row[reci5];
$snack_tips = $snackmenu_row[tips];
$snack_matefile = $snackmenu_row[matefile];
$snack_menufile = $snackmenu_row[menufile];
?>
<!--빙고-->
<?php
$alldaymenu_query = "SELECT * FROM shicktest WHERE userid LIKE '$loginid%'";
$alldaymenu_result = mysqli_query($mysqli, $alldaymenu_query);
while ($alldaymenu_row = mysqli_fetch_array($alldaymenu_result)) {
    $z = '2020-03-01';
    $e = date("Y-m-d");
    $i = 0;
    while (strtotime($z) <= strtotime($e)) {
        $menudirect_query = "SELECT * FROM menutest WHERE menu = '$alldaymenu_row[$z]'";
        $menudirect_result = mysqli_query($mysqli, $menudirect_query);
        $menudirect_row = mysqli_fetch_array($menudirect_result);
        $menu_obj[$i] = $menudirect_row;
        if (in_array("김", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $rla = 1;
        }
        if (in_array("닭고기", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $ekfrrhrl = 1;
        }
        if (in_array("건미역", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $rjsaldur = 1;
        }
        if (in_array("수수", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $tntn = 1;
        }
        if (in_array("연두부", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $dusenqn = 1;
        }
        if (in_array("차조", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $ckwh = 1;
        }
        if (in_array("감자", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $rkawk = 1;
        }
        if (in_array("찹쌀", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $ckqtkf = 1;
        }
        if (in_array("치즈", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $clwm = 1;
        }
        if (in_array("한우", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $gksdn = 1;
        }
        if (in_array("현미", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $gusal = 1;
        }
        if (in_array("흑미", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $gmral = 1;
        }
        if (in_array("쌀가루", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $tkfrkfn = 1;
        }
        if (in_array("찹쌀가루", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $ckqtkfrkfn = 1;
        }
        if (in_array("무", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $an = 1;
        }
        if (in_array("양배추", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $didqocn = 1;
        }
        if (in_array("시금치", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $tlrmacl = 1;
        }
        if (in_array("고구마", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $rhrnak = 1;
        }
        if (in_array("애호박", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $doghqkr = 1;
        }
        if (in_array("브로콜리", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $qmfhzhffl = 1;
        }
        if (in_array("연근", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $dusrms = 1;
        }
        if (in_array("오이", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $dhdl = 1;
        }
        if (in_array("청경채", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $cjdrudco = 1;
        }
        if (in_array("귀리", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $rnlfl = 1;
        }
        if (in_array("단호박", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $eksghqkr = 1;
        }
        if (in_array("비타민", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $qlxkals = 1;
        }
        if (in_array("밤", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $qka = 1;
        }
        if (in_array("사과", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $tkrhk = 1;
        }
        if (in_array("배", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $qo = 1;
        }
        if (in_array("안심", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $dkstla = 1;
        }
        if (in_array("완두콩가루", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $dhksenzhdrkfn = 1;
        }
        if (in_array("노란콩가루", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $shfkszhdrkfn = 1;
        }
        if (in_array("쌀", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $tkfrkfn = 1;
        }
        if (in_array("강낭콩", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $rkdskdzhd = 1;
        }
        if (in_array("보리", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $qhfl = 1;
        }
        if (in_array("퀴노아", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $znlshdk = 1;
        }
        if (in_array("전분", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $wjsqns = 1;
        }
        if (in_array("당근", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $ekdrms = 1;
        }
        if (in_array("현미가루", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $gusalrkfn = 1;
        }
        if (in_array("비트", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $qlxm = 1;
        }
        if (in_array("밀가루", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $alfrkfn = 1;
        }
        if (in_array("파프리카", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $vkvmflzk = 1;
        }
        if (in_array("검은콩가루", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $rjadmzhdrkfn = 1;
        }
        if (in_array("한천", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $gkscjs = 1;
        }
        if (in_array("바나나", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $qksksk = 1;
        }
        if (in_array("표고", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $vyrh = 1;
        }
        if (in_array("케일", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $zpdlf = 1;
        }
        if (in_array("양파", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $didvk = 1;
        }
        if (in_array("돼지고기", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $ehowlrhrl = 1;
        }
        if (in_array("근대", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $rmseo = 1;
        }
        if (in_array("병아리콩", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $quddkflzhd = 1;
        }
        if (in_array("블루베리", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $qmffnqpfl = 1;
        }
        if (in_array("아욱", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $dkdnr = 1;
        }
        if (in_array("양송이", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $didthddl = 1;
        }
        if (in_array("렌틸콩", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $fpsxlfzhd = 1;
        }
        if (in_array("로메인", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $fhapdls = 1;
        }
        if (in_array("느타리", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $smxkfl = 1;
        }
        if (in_array("배추", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $qocn = 1;
        }
        if (in_array("새송이", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $tothddl = 1;
        }
        if (in_array("돌나물", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $ehfskanf = 1;
        }
        if (in_array("가지", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $rkwl = 1;
        }
        if (in_array("옥수수", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $dhrtntn = 1;
        }
        if (in_array("봄동", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $qhaehd = 1;
        }
        if (in_array("콜라비", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $zhffkql = 1;
        }
        if (in_array("깻잎", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $rotdlv = 1;
        }
        if (in_array("열무", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $dufan = 1;
        }
        if (in_array("방울토마토", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $qkddnfxhakxh = 1;
        }
        if (in_array("건파래", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $rjsvkfo = 1;
        }
        if (in_array("취나물", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $cnlskanf = 1;
        }
        if (in_array("참나물", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $ckaskanf = 1;
        }
        if (in_array("적채", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $wjrco = 1;
        }
        if (in_array("부추", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $qncn = 1;
        }
        if (in_array("건톳", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $rjsxht = 1;
        }
        if (in_array("우엉", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $dndjd = 1;
        }
        if (in_array("대추", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $eocn = 1;
        }
        if (in_array("아몬드", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $dkahsem = 1;
        }
        if (in_array("잣", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $wkt = 1;
        }
        if (in_array("건목이", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $rjsahrdl = 1;
        }
        if (in_array("쪽파", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $whrvk = 1;
        }
        if (in_array("세발나물", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $tpqkfskanf = 1;
        }
        if (in_array("루꼴라", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $fnrhffk = 1;
        }
        if (in_array("피망", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $vlakd = 1;
        }
        if (in_array("마늘쫑", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $aksmfwhd = 1;
        }
        if (in_array("팽이", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $voddl = 1;
        }
        if (in_array("홍미", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $ghdal = 1;
        }
        if (in_array("들깨가루", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $emfrorkfn = 1;
        }
        if (in_array("건고사리", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $rjsrhtkfl = 1;
        }
        if (in_array("참깨", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $ckaro = 1;
        }
        if (in_array("호두", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $ghrn = 1;
        }
        if (in_array("기장", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $rlwkd = 1;
        }
        if (in_array("팥가루", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $vkxrkfn = 1;
        }
        if (in_array("테프가루", preg_replace("/[0-9]/", "", $menu_obj[$i]))) {
            $xpvmrkfn = 1;
        }
        $z = date("Y-m-d", strtotime("+1 days", strtotime($z)));
        $i = $i++;
    }
} ?>
<!--이달의영양소-->
<?php

$tomont = date("n");

$tomonth_query = "SELECT * FROM tomonth WHERE period = '$tomont'";
$tomonth_result = mysqli_query($mysqli, $tomonth_query);
$tomonth_row = mysqli_fetch_array($tomonth_result);
$tomonth_nutr = $tomonth_row[nutr];
$tomonth_nutrinfo = $tomonth_row[nutrinfo];
?>
<?php
$nutr_sum = (int)$pers_cal + (int)$pers_car + (int)$pers_pat + (int)$pers_pro;
$nutr_trim = 4;
$nutr_aver = intval($nutr_sum / $nutr_trim);
?>
<?php
$test_obj = "object";
$presearch_query = "SELECT * FROM presearch WHERE userid = '$loginid' ORDER BY date DESC LIMIT 1";
$presearch_result = mysqli_query($mysqli, $presearch_query);
$presearch_row = mysqli_fetch_array($presearch_result);
$old_eating = explode("/", $presearch_row[$test_obj]);
if (in_array("김",  $old_eating)) {
    $rla = 2;
}
if (in_array("닭고기",  $old_eating)) {
    $ekfrrhrl = 2;
}
if (in_array("건미역",  $old_eating)) {
    $rjsaldur = 2;
}
if (in_array("수수",  $old_eating)) {
    $tntn = 2;
}
if (in_array("연두부",  $old_eating)) {
    $dusenqn = 2;
}
if (in_array("차조",  $old_eating)) {
    $ckwh = 2;
}
if (in_array("감자",  $old_eating)) {
    $rkawk = 2;
}
if (in_array("찹쌀",  $old_eating)) {
    $ckqtkf = 2;
}
if (in_array("치즈",  $old_eating)) {
    $clwm = 2;
}
if (in_array("한우",  $old_eating)) {
    $gksdn = 2;
}
if (in_array("현미",  $old_eating)) {
    $gusal = 2;
}
if (in_array("흑미",  $old_eating)) {
    $gmral = 2;
}
if (in_array("쌀가루",  $old_eating)) {
    $tkfrkfn = 2;
}
if (in_array("찹쌀가루",  $old_eating)) {
    $ckqtkfrkfn = 2;
}
if (in_array("무",  $old_eating)) {
    $an = 2;
}
if (in_array("양배추",  $old_eating)) {
    $didqocn = 2;
}
if (in_array("시금치",  $old_eating)) {
    $tlrmacl = 2;
}
if (in_array("고구마",  $old_eating)) {
    $rhrnak = 2;
}
if (in_array("애호박",  $old_eating)) {
    $doghqkr = 2;
}
if (in_array("브로콜리",  $old_eating)) {
    $qmfhzhffl = 2;
}
if (in_array("연근",  $old_eating)) {
    $dusrms = 2;
}
if (in_array("오이",  $old_eating)) {
    $dhdl = 2;
}
if (in_array("청경채",  $old_eating)) {
    $cjdrudco = 2;
}
if (in_array("귀리",  $old_eating)) {
    $rnlfl = 2;
}
if (in_array("단호박",  $old_eating)) {
    $eksghqkr = 2;
}
if (in_array("비타민",  $old_eating)) {
    $qlxkals = 2;
}
if (in_array("밤",  $old_eating)) {
    $qka = 2;
}
if (in_array("사과",  $old_eating)) {
    $tkrhk = 2;
}
if (in_array("배",  $old_eating)) {
    $qo = 2;
}
if (in_array("안심",  $old_eating)) {
    $dkstla = 2;
}
if (in_array("완두콩가루",  $old_eating)) {
    $dhksenzhdrkfn = 2;
}
if (in_array("노란콩가루",  $old_eating)) {
    $shfkszhdrkfn = 2;
}
if (in_array("쌀",  $old_eating)) {
    $tkfrkfn = 2;
}
if (in_array("강낭콩",  $old_eating)) {
    $rkdskdzhd = 2;
}
if (in_array("보리",  $old_eating)) {
    $qhfl = 2;
}
if (in_array("퀴노아",  $old_eating)) {
    $znlshdk = 2;
}
if (in_array("전분",  $old_eating)) {
    $wjsqns = 2;
}
if (in_array("당근",  $old_eating)) {
    $ekdrms = 2;
}
if (in_array("현미가루",  $old_eating)) {
    $gusalrkfn = 2;
}
if (in_array("비트",  $old_eating)) {
    $qlxm = 2;
}
if (in_array("밀가루",  $old_eating)) {
    $alfrkfn = 2;
}
if (in_array("파프리카",  $old_eating)) {
    $vkvmflzk = 2;
}
if (in_array("검은콩가루",  $old_eating)) {
    $rjadmzhdrkfn = 2;
}
if (in_array("한천",  $old_eating)) {
    $gkscjs = 2;
}
if (in_array("바나나",  $old_eating)) {
    $qksksk = 2;
}
if (in_array("표고",  $old_eating)) {
    $vyrh = 2;
}
if (in_array("케일",  $old_eating)) {
    $zpdlf = 2;
}
if (in_array("양파",  $old_eating)) {
    $didvk = 2;
}
if (in_array("돼지고기",  $old_eating)) {
    $ehowlrhrl = 2;
}
if (in_array("근대",  $old_eating)) {
    $rmseo = 2;
}
if (in_array("병아리콩",  $old_eating)) {
    $quddkflzhd = 2;
}
if (in_array("블루베리",  $old_eating)) {
    $qmffnqpfl = 2;
}
if (in_array("아욱",  $old_eating)) {
    $dkdnr = 2;
}
if (in_array("양송이",  $old_eating)) {
    $didthddl = 2;
}
if (in_array("렌틸콩",  $old_eating)) {
    $fpsxlfzhd = 2;
}
if (in_array("로메인",  $old_eating)) {
    $fhapdls = 2;
}
if (in_array("느타리",  $old_eating)) {
    $smxkfl = 2;
}
if (in_array("배추",  $old_eating)) {
    $qocn = 2;
}
if (in_array("새송이",  $old_eating)) {
    $tothddl = 2;
}
if (in_array("돌나물",  $old_eating)) {
    $ehfskanf = 2;
}
if (in_array("가지",  $old_eating)) {
    $rkwl = 2;
}
if (in_array("옥수수",  $old_eating)) {
    $dhrtntn = 2;
}
if (in_array("봄동",  $old_eating)) {
    $qhaehd = 2;
}
if (in_array("콜라비",  $old_eating)) {
    $zhffkql = 2;
}
if (in_array("깻잎",  $old_eating)) {
    $rotdlv = 2;
}
if (in_array("열무",  $old_eating)) {
    $dufan = 2;
}
if (in_array("방울토마토",  $old_eating)) {
    $qkddnfxhakxh = 2;
}
if (in_array("건파래",  $old_eating)) {
    $rjsvkfo = 2;
}
if (in_array("취나물",  $old_eating)) {
    $cnlskanf = 2;
}
if (in_array("참나물",  $old_eating)) {
    $ckaskanf = 2;
}
if (in_array("적채",  $old_eating)) {
    $wjrco = 2;
}
if (in_array("부추",  $old_eating)) {
    $qncn = 2;
}
if (in_array("건톳",  $old_eating)) {
    $rjsxht = 2;
}
if (in_array("우엉",  $old_eating)) {
    $dndjd = 2;
}
if (in_array("대추",  $old_eating)) {
    $eocn = 2;
}
if (in_array("아몬드",  $old_eating)) {
    $dkahsem = 2;
}
if (in_array("잣",  $old_eating)) {
    $wkt = 2;
}
if (in_array("건목이",  $old_eating)) {
    $rjsahrdl = 2;
}
if (in_array("쪽파",  $old_eating)) {
    $whrvk = 2;
}
if (in_array("세발나물",  $old_eating)) {
    $tpqkfskanf = 2;
}
if (in_array("루꼴라",  $old_eating)) {
    $fnrhffk = 2;
}
if (in_array("피망",  $old_eating)) {
    $vlakd = 2;
}
if (in_array("마늘쫑",  $old_eating)) {
    $aksmfwhd = 2;
}
if (in_array("팽이",  $old_eating)) {
    $voddl = 2;
}
if (in_array("홍미",  $old_eating)) {
    $ghdal = 2;
}
if (in_array("들깨가루",  $old_eating)) {
    $emfrorkfn = 2;
}
if (in_array("건고사리",  $old_eating)) {
    $rjsrhtkfl = 2;
}
if (in_array("참깨",  $old_eating)) {
    $ckaro = 2;
}
if (in_array("호두",  $old_eating)) {
    $ghrn = 2;
}
if (in_array("기장",  $old_eating)) {
    $rlwkd = 2;
}
if (in_array("팥가루",  $old_eating)) {
    $vkxrkfn = 2;
}
if (in_array("테프가루",  $old_eating)) {
    $xpvmrkfn = 2;
}

?>
<input type="hidden" value="<?php echo $user_gender ?>" id="babygender">
<!--남아키-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {
        packages: ["corechart"]
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', '우리아이', '저신장', '평균신장', '고신장'],
            [0, <?php echo $height_graph[0] ?>, 47.5, 49.9, 52.3],
            [1, <?php echo $height_graph[1] ?>, 52.2, 54.7, 57.2],
            [2, <?php echo $height_graph[2] ?>, 55.9, 58.4, 61],
            [3, <?php echo $height_graph[3] ?>, 58.8, 61.4, 64],
            [4, <?php echo $height_graph[4] ?>, 61.2, 63.9, 66.6],
            [5, <?php echo $height_graph[5] ?>, 63.2, 65.9, 68.6],
            [6, <?php echo $height_graph[6] ?>, 64.9, 67.6, 70.4],
            [7, <?php echo $height_graph[7] ?>, 66.4, 69.2, 71.9],
            [8, <?php echo $height_graph[8] ?>, 67.8, 70.6, 73.4],
            [9, <?php echo $height_graph[9] ?>, 69.1, 72, 74.8],
            [10, <?php echo $height_graph[10] ?>, 70.4, 73.3, 76.2],
            [11, <?php echo $height_graph[11] ?>, 71.6, 74.5, 77.5],
            [12, <?php echo $height_graph[12] ?>, 72.7, 75.7, 78.8],
            [13, <?php echo $height_graph[13] ?>, 73.8, 76.9, 80],
            [14, <?php echo $height_graph[14] ?>, 74.9, 78, 81.2],
            [15, <?php echo $height_graph[15] ?>, 75.9, 79.1, 82.4],
            [16, <?php echo $height_graph[16] ?>, 76.9, 80.2, 83.5],
            [17, <?php echo $height_graph[17] ?>, 77.9, 81.2, 84.6]

        ]);
        var options = {
            tooltip: {
                isHtml: true
            },
            legend: 'none',
            height: 300,
            width: 330,
            vAxis: {
                viewWindow: {
                    min: 45,
                    max: 85
                }
            },
            chartArea: {
                width: '80%',
                height: '80%'
            },
            series: {
                0: {
                    color: '#000000',
                    lineWidth: 5,
                    pointShape: 'circle',
                    pointSize: 9
                },
                1: {
                    color: '#e8b026',
                    lineWidth: 2,
                    opacity: 0.5
                },
                2: {
                    color: '#177c48',
                    lineWidth: 2,
                    opacity: 0.5
                },
                3: {
                    color: '#ea5514',
                    lineWidth: 2,
                    opacity: 0.5
                }
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('chart_one'));
        chart.draw(data, options);
    }
</script>
<!--남아무게-->
<script type="text/javascript">
    google.load("visualization", "1", {
        packages: ["corechart"]
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', '우리아이', '저체중', '평균체중', '과체중'],
            [0, <?php echo $weight_graph[0] ?>, 2.8, 3.3, 4],
            [1, <?php echo $weight_graph[1] ?>, 3.8, 4.5, 5.3],
            [2, <?php echo $weight_graph[2] ?>, 4.7, 5.6, 6.5],
            [3, <?php echo $weight_graph[3] ?>, 5.5, 6.4, 7.4],
            [4, <?php echo $weight_graph[4] ?>, 6, 7, 8.1],
            [5, <?php echo $weight_graph[5] ?>, 6.5, 7.5, 8.6],
            [6, <?php echo $weight_graph[6] ?>, 6.9, 7.9, 9.1],
            [7, <?php echo $weight_graph[7] ?>, 7.2, 8.3, 9.5],
            [8, <?php echo $weight_graph[8] ?>, 7.5, 8.6, 9.9],
            [9, <?php echo $weight_graph[9] ?>, 7.7, 8.9, 10.2],
            [10, <?php echo $weight_graph[10] ?>, 8, 9.2, 10.5],
            [11, <?php echo $weight_graph[11] ?>, 8.2, 9.4, 10.8],
            [12, <?php echo $weight_graph[12] ?>, 8.4, 9.6, 11.1],
            [13, <?php echo $weight_graph[13] ?>, 8.6, 9.9, 11.4],
            [14, <?php echo $weight_graph[14] ?>, 8.8, 10.1, 11.6],
            [15, <?php echo $weight_graph[15] ?>, 9, 10.3, 11.9],
            [16, <?php echo $weight_graph[16] ?>, 9.1, 10.5, 12.1],
            [17, <?php echo $weight_graph[17] ?>, 9.3, 10.7, 12.4]
        ]);
        var options = {
            tooltip: {
                isHtml: true
            },
            legend: 'none',
            height: 300,
            width: 330,
            chartArea: {
                width: '80%',
                height: '80%'
            },
            series: {
                0: {
                    color: '#000000',
                    lineWidth: 5,
                    pointShape: 'circle',
                    pointSize: 9
                },
                1: {
                    color: '#e8b026',
                    lineWidth: 2,
                    opacity: 0.5
                },
                2: {
                    color: '#177c48',
                    lineWidth: 2,
                    opacity: 0.5
                },
                3: {
                    color: '#ea5514',
                    lineWidth: 2,
                    opacity: 0.5
                }
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('chart_two'));
        chart.draw(data, options);
    }
</script>
<!--여아키-->
<script type="text/javascript">
    google.load("visualization", "1", {
        packages: ["corechart"]
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', '우리아이(여)', '저신장(여)', '평균신장(여)', '고신장(여)'],
            [0, <?php echo $height_graph[0] ?>, 46.8, 49.1, 51.5],
            [1, <?php echo $height_graph[1] ?>, 51.2, 53.7, 56.2],
            [2, <?php echo $height_graph[2] ?>, 54.5, 57.1, 59.7],
            [3, <?php echo $height_graph[3] ?>, 57.1, 59.8, 62.5],
            [4, <?php echo $height_graph[4] ?>, 59.3, 62.1, 64.9],
            [5, <?php echo $height_graph[5] ?>, 61.2, 64, 66.9],
            [6, <?php echo $height_graph[6] ?>, 62.8, 65.7, 68.6],
            [7, <?php echo $height_graph[7] ?>, 64.3, 67.3, 70.3],
            [8, <?php echo $height_graph[8] ?>, 65.7, 68.7, 71.8],
            [9, <?php echo $height_graph[9] ?>, 67, 70.1, 73.2],
            [10, <?php echo $height_graph[10] ?>, 68.3, 71.5, 74.6],
            [11, <?php echo $height_graph[11] ?>, 69.5, 72.8, 76],
            [12, <?php echo $height_graph[12] ?>, 70.7, 74, 77.3],
            [13, <?php echo $height_graph[13] ?>, 71.8, 75.2, 78.6],
            [14, <?php echo $height_graph[14] ?>, 72.9, 76.4, 79.8],
            [15, <?php echo $height_graph[15] ?>, 74, 77.5, 81],
            [16, <?php echo $height_graph[16] ?>, 75, 78.6, 82.2],
            [17, <?php echo $height_graph[17] ?>, 76, 79.7, 83.3]
        ]);
        var options = {
            tooltip: {
                isHtml: true
            },
            legend: 'none',
            height: 300,
            width: 330,
            vAxis: {
                viewWindow: {
                    min: 45,
                    max: 85
                }
            },
            chartArea: {
                width: '80%',
                height: '80%'
            },
            series: {
                0: {
                    color: '#000000',
                    lineWidth: 5,
                    pointShape: 'circle',
                    pointSize: 9
                },
                1: {
                    color: '#e8b026',
                    lineWidth: 2,
                    opacity: 0.5
                },
                2: {
                    color: '#177c48',
                    lineWidth: 2,
                    opacity: 0.5
                },
                3: {
                    color: '#ea5514',
                    lineWidth: 2,
                    opacity: 0.5
                }
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('chart_thr'));
        chart.draw(data, options);
    }
</script>
<!--여아무게-->
<script type="text/javascript">
    google.load("visualization", "1", {
        packages: ["corechart"]
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', '우리아이(여)', '저체중(여)', '평균체중(여)', '과체중(여)'],
            [0, <?php echo $weight_graph[0] ?>, 2.7, 3.2, 3.9],
            [1, <?php echo $weight_graph[1] ?>, 3.5, 4.2, 5],
            [2, <?php echo $weight_graph[2] ?>, 4.3, 5.1, 6],
            [3, <?php echo $weight_graph[3] ?>, 5, 5.8, 6.9],
            [4, <?php echo $weight_graph[4] ?>, 5.5, 6.4, 7.5],
            [5, <?php echo $weight_graph[5] ?>, 5.9, 6.9, 8.1],
            [6, <?php echo $weight_graph[6] ?>, 6.2, 7.3, 8.5],
            [7, <?php echo $weight_graph[7] ?>, 6.5, 7.6, 8.9],
            [8, <?php echo $weight_graph[8] ?>, 6.8, 7.9, 9.3],
            [9, <?php echo $weight_graph[9] ?>, 7, 8.2, 9.6],
            [10, <?php echo $weight_graph[10] ?>, 7.3, 8.5, 9.9],
            [11, <?php echo $weight_graph[11] ?>, 7.5, 8.7, 10.2],
            [12, <?php echo $weight_graph[12] ?>, 7.7, 8.9, 10.5],
            [13, <?php echo $weight_graph[13] ?>, 7.9, 9.2, 10.8],
            [14, <?php echo $weight_graph[14] ?>, 8, 9.4, 11],
            [15, <?php echo $weight_graph[15] ?>, 8.2, 9.6, 11.3],
            [16, <?php echo $weight_graph[16] ?>, 8.4, 9.8, 11.5],
            [17, <?php echo $weight_graph[17] ?>, 8.6, 10, 11.8]
        ]);
        var options = {
            tooltip: {
                isHtml: true
            },
            legend: 'none',
            height: 300,
            width: 330,
            chartArea: {
                width: '80%',
                height: '80%'
            },
            series: {
                0: {
                    color: '#000000',
                    lineWidth: 5,
                    pointShape: 'circle',
                    pointSize: 9
                },
                1: {
                    color: '#e8b026',
                    lineWidth: 2,
                    opacity: 0.5
                },
                2: {
                    color: '#177c48',
                    lineWidth: 2,
                    opacity: 0.5
                },
                3: {
                    color: '#ea5514',
                    lineWidth: 2,
                    opacity: 0.5
                }
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('chart_fow'));
        chart.draw(data, options);
    }
</script>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {
        packages: ["corechart"]
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', '우리아이', '저신장', '평균신장', '고신장'],
            [0, <?php echo $height_graph[0] ?>, 47.5, 49.9, 52.3],
            [1, <?php echo $height_graph[1] ?>, 52.2, 54.7, 57.2],
            [2, <?php echo $height_graph[2] ?>, 55.9, 58.4, 61],
            [3, <?php echo $height_graph[3] ?>, 58.8, 61.4, 64],
            [4, <?php echo $height_graph[4] ?>, 61.2, 63.9, 66.6],
            [5, <?php echo $height_graph[5] ?>, 63.2, 65.9, 68.6],
            [6, <?php echo $height_graph[6] ?>, 64.9, 67.6, 70.4],
            [7, <?php echo $height_graph[7] ?>, 66.4, 69.2, 71.9],
            [8, <?php echo $height_graph[8] ?>, 67.8, 70.6, 73.4],
            [9, <?php echo $height_graph[9] ?>, 69.1, 72, 74.8],
            [10, <?php echo $height_graph[10] ?>, 70.4, 73.3, 76.2],
            [11, <?php echo $height_graph[11] ?>, 71.6, 74.5, 77.5],
            [12, <?php echo $height_graph[12] ?>, 72.7, 75.7, 78.8],
            [13, <?php echo $height_graph[13] ?>, 73.8, 76.9, 80],
            [14, <?php echo $height_graph[14] ?>, 74.9, 78, 81.2],
            [15, <?php echo $height_graph[15] ?>, 75.9, 79.1, 82.4],
            [16, <?php echo $height_graph[16] ?>, 76.9, 80.2, 83.5],
            [17, <?php echo $height_graph[17] ?>, 77.9, 81.2, 84.6]

        ]);
        var options = {
            tooltip: {
                isHtml: true
            },
            legend: 'none',
            height: 300,
            width: 380,
            vAxis: {
                viewWindow: {
                    min: 45,
                    max: 85
                }
            },
            chartArea: {
                width: '80%',
                height: '80%'
            },
            series: {
                0: {
                    color: '#000000',
                    lineWidth: 5,
                    pointShape: 'circle',
                    pointSize: 9
                },
                1: {
                    color: '#e8b026',
                    lineWidth: 2,
                    opacity: 0.5
                },
                2: {
                    color: '#177c48',
                    lineWidth: 2,
                    opacity: 0.5
                },
                3: {
                    color: '#ea5514',
                    lineWidth: 2,
                    opacity: 0.5
                }
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('chart_one_y'));
        chart.draw(data, options);
    }
</script>
<!--남아무게-->
<script type="text/javascript">
    google.load("visualization", "1", {
        packages: ["corechart"]
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', '우리아이', '저체중', '평균체중', '과체중'],
            [0, <?php echo $weight_graph[0] ?>, 2.8, 3.3, 4],
            [1, <?php echo $weight_graph[1] ?>, 3.8, 4.5, 5.3],
            [2, <?php echo $weight_graph[2] ?>, 4.7, 5.6, 6.5],
            [3, <?php echo $weight_graph[3] ?>, 5.5, 6.4, 7.4],
            [4, <?php echo $weight_graph[4] ?>, 6, 7, 8.1],
            [5, <?php echo $weight_graph[5] ?>, 6.5, 7.5, 8.6],
            [6, <?php echo $weight_graph[6] ?>, 6.9, 7.9, 9.1],
            [7, <?php echo $weight_graph[7] ?>, 7.2, 8.3, 9.5],
            [8, <?php echo $weight_graph[8] ?>, 7.5, 8.6, 9.9],
            [9, <?php echo $weight_graph[9] ?>, 7.7, 8.9, 10.2],
            [10, <?php echo $weight_graph[10] ?>, 8, 9.2, 10.5],
            [11, <?php echo $weight_graph[11] ?>, 8.2, 9.4, 10.8],
            [12, <?php echo $weight_graph[12] ?>, 8.4, 9.6, 11.1],
            [13, <?php echo $weight_graph[13] ?>, 8.6, 9.9, 11.4],
            [14, <?php echo $weight_graph[14] ?>, 8.8, 10.1, 11.6],
            [15, <?php echo $weight_graph[15] ?>, 9, 10.3, 11.9],
            [16, <?php echo $weight_graph[16] ?>, 9.1, 10.5, 12.1],
            [17, <?php echo $weight_graph[17] ?>, 9.3, 10.7, 12.4]
        ]);
        var options = {
            tooltip: {
                isHtml: true
            },
            legend: 'none',
            height: 300,
            width: 380,
            chartArea: {
                width: '80%',
                height: '80%'
            },
            series: {
                0: {
                    color: '#000000',
                    lineWidth: 5,
                    pointShape: 'circle',
                    pointSize: 9
                },
                1: {
                    color: '#e8b026',
                    lineWidth: 2,
                    opacity: 0.5
                },
                2: {
                    color: '#177c48',
                    lineWidth: 2,
                    opacity: 0.5
                },
                3: {
                    color: '#ea5514',
                    lineWidth: 2,
                    opacity: 0.5
                }
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('chart_two_y'));
        chart.draw(data, options);
    }
</script>
<!--여아키-->
<script type="text/javascript">
    google.load("visualization", "1", {
        packages: ["corechart"]
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', '우리아이(여)', '저신장(여)', '평균신장(여)', '고신장(여)'],
            [0, <?php echo $height_graph[0] ?>, 46.8, 49.1, 51.5],
            [1, <?php echo $height_graph[1] ?>, 51.2, 53.7, 56.2],
            [2, <?php echo $height_graph[2] ?>, 54.5, 57.1, 59.7],
            [3, <?php echo $height_graph[3] ?>, 57.1, 59.8, 62.5],
            [4, <?php echo $height_graph[4] ?>, 59.3, 62.1, 64.9],
            [5, <?php echo $height_graph[5] ?>, 61.2, 64, 66.9],
            [6, <?php echo $height_graph[6] ?>, 62.8, 65.7, 68.6],
            [7, <?php echo $height_graph[7] ?>, 64.3, 67.3, 70.3],
            [8, <?php echo $height_graph[8] ?>, 65.7, 68.7, 71.8],
            [9, <?php echo $height_graph[9] ?>, 67, 70.1, 73.2],
            [10, <?php echo $height_graph[10] ?>, 68.3, 71.5, 74.6],
            [11, <?php echo $height_graph[11] ?>, 69.5, 72.8, 76],
            [12, <?php echo $height_graph[12] ?>, 70.7, 74, 77.3],
            [13, <?php echo $height_graph[13] ?>, 71.8, 75.2, 78.6],
            [14, <?php echo $height_graph[14] ?>, 72.9, 76.4, 79.8],
            [15, <?php echo $height_graph[15] ?>, 74, 77.5, 81],
            [16, <?php echo $height_graph[16] ?>, 75, 78.6, 82.2],
            [17, <?php echo $height_graph[17] ?>, 76, 79.7, 83.3]
        ]);
        var options = {
            tooltip: {
                isHtml: true
            },
            legend: 'none',
            height: 170,
            width: 170,
            vAxis: {
                viewWindow: {
                    min: 45,
                    max: 85
                }
            },
            chartArea: {
                width: '80%',
                height: '80%'
            },
            series: {
                0: {
                    color: '#000000',
                    lineWidth: 5,
                    pointShape: 'circle',
                    pointSize: 9
                },
                1: {
                    color: '#e8b026',
                    lineWidth: 2,
                    opacity: 0.5
                },
                2: {
                    color: '#177c48',
                    lineWidth: 2,
                    opacity: 0.5
                },
                3: {
                    color: '#ea5514',
                    lineWidth: 2,
                    opacity: 0.5
                }
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('chart_thr_y'));
        chart.draw(data, options);
    }
</script>
<!--여아무게-->
<script type="text/javascript">
    google.load("visualization", "1", {
        packages: ["corechart"]
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', '우리아이(여)', '저체중(여)', '평균체중(여)', '과체중(여)'],
            [0, <?php echo $weight_graph[0] ?>, 2.7, 3.2, 3.9],
            [1, <?php echo $weight_graph[1] ?>, 3.5, 4.2, 5],
            [2, <?php echo $weight_graph[2] ?>, 4.3, 5.1, 6],
            [3, <?php echo $weight_graph[3] ?>, 5, 5.8, 6.9],
            [4, <?php echo $weight_graph[4] ?>, 5.5, 6.4, 7.5],
            [5, <?php echo $weight_graph[5] ?>, 5.9, 6.9, 8.1],
            [6, <?php echo $weight_graph[6] ?>, 6.2, 7.3, 8.5],
            [7, <?php echo $weight_graph[7] ?>, 6.5, 7.6, 8.9],
            [8, <?php echo $weight_graph[8] ?>, 6.8, 7.9, 9.3],
            [9, <?php echo $weight_graph[9] ?>, 7, 8.2, 9.6],
            [10, <?php echo $weight_graph[10] ?>, 7.3, 8.5, 9.9],
            [11, <?php echo $weight_graph[11] ?>, 7.5, 8.7, 10.2],
            [12, <?php echo $weight_graph[12] ?>, 7.7, 8.9, 10.5],
            [13, <?php echo $weight_graph[13] ?>, 7.9, 9.2, 10.8],
            [14, <?php echo $weight_graph[14] ?>, 8, 9.4, 11],
            [15, <?php echo $weight_graph[15] ?>, 8.2, 9.6, 11.3],
            [16, <?php echo $weight_graph[16] ?>, 8.4, 9.8, 11.5],
            [17, <?php echo $weight_graph[17] ?>, 8.6, 10, 11.8]
        ]);
        var options = {
            tooltip: {
                isHtml: true
            },
            legend: 'none',
            height: 170,
            width: 170,
            chartArea: {
                width: '80%',
                height: '80%'
            },
            series: {
                0: {
                    color: '#000000',
                    lineWidth: 5,
                    pointShape: 'circle',
                    pointSize: 9
                },
                1: {
                    color: '#e8b026',
                    lineWidth: 2,
                    opacity: 0.5
                },
                2: {
                    color: '#177c48',
                    lineWidth: 2,
                    opacity: 0.5
                },
                3: {
                    color: '#ea5514',
                    lineWidth: 2,
                    opacity: 0.5
                }
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('chart_fow_y'));
        chart.draw(data, options);
    }
</script>

<!--남아키-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {
        packages: ["corechart"]
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', '우리아이', '저신장', '평균신장', '고신장'],
            [0, <?php echo $height_graph[0] ?>, 47.5, 49.9, 52.3],
            [1, <?php echo $height_graph[1] ?>, 52.2, 54.7, 57.2],
            [2, <?php echo $height_graph[2] ?>, 55.9, 58.4, 61],
            [3, <?php echo $height_graph[3] ?>, 58.8, 61.4, 64],
            [4, <?php echo $height_graph[4] ?>, 61.2, 63.9, 66.6],
            [5, <?php echo $height_graph[5] ?>, 63.2, 65.9, 68.6],
            [6, <?php echo $height_graph[6] ?>, 64.9, 67.6, 70.4],
            [7, <?php echo $height_graph[7] ?>, 66.4, 69.2, 71.9],
            [8, <?php echo $height_graph[8] ?>, 67.8, 70.6, 73.4],
            [9, <?php echo $height_graph[9] ?>, 69.1, 72, 74.8],
            [10, <?php echo $height_graph[10] ?>, 70.4, 73.3, 76.2],
            [11, <?php echo $height_graph[11] ?>, 71.6, 74.5, 77.5],
            [12, <?php echo $height_graph[12] ?>, 72.7, 75.7, 78.8],
            [13, <?php echo $height_graph[13] ?>, 73.8, 76.9, 80],
            [14, <?php echo $height_graph[14] ?>, 74.9, 78, 81.2],
            [15, <?php echo $height_graph[15] ?>, 75.9, 79.1, 82.4],
            [16, <?php echo $height_graph[16] ?>, 76.9, 80.2, 83.5],
            [17, <?php echo $height_graph[17] ?>, 77.9, 81.2, 84.6]

        ]);
        var options = {
            tooltip: {
                isHtml: true
            },
            legend: 'none',
            height: 300,
            width: 380,
            vAxis: {
                viewWindow: {
                    min: 45,
                    max: 85
                }
            },
            chartArea: {
                width: '80%',
                height: '80%'
            },
            series: {
                0: {
                    color: '#000000',
                    lineWidth: 5,
                    pointShape: 'circle',
                    pointSize: 9
                },
                1: {
                    color: '#e8b026',
                    lineWidth: 2,
                    opacity: 0.5
                },
                2: {
                    color: '#177c48',
                    lineWidth: 2,
                    opacity: 0.5
                },
                3: {
                    color: '#ea5514',
                    lineWidth: 2,
                    opacity: 0.5
                }
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('man_h'));
        chart.draw(data, options);
    }
</script>
<!--남아무게-->
<script type="text/javascript">
    google.load("visualization", "1", {
        packages: ["corechart"]
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', '우리아이', '저체중', '평균체중', '과체중'],
            [0, <?php echo $weight_graph[0] ?>, 2.8, 3.3, 4],
            [1, <?php echo $weight_graph[1] ?>, 3.8, 4.5, 5.3],
            [2, <?php echo $weight_graph[2] ?>, 4.7, 5.6, 6.5],
            [3, <?php echo $weight_graph[3] ?>, 5.5, 6.4, 7.4],
            [4, <?php echo $weight_graph[4] ?>, 6, 7, 8.1],
            [5, <?php echo $weight_graph[5] ?>, 6.5, 7.5, 8.6],
            [6, <?php echo $weight_graph[6] ?>, 6.9, 7.9, 9.1],
            [7, <?php echo $weight_graph[7] ?>, 7.2, 8.3, 9.5],
            [8, <?php echo $weight_graph[8] ?>, 7.5, 8.6, 9.9],
            [9, <?php echo $weight_graph[9] ?>, 7.7, 8.9, 10.2],
            [10, <?php echo $weight_graph[10] ?>, 8, 9.2, 10.5],
            [11, <?php echo $weight_graph[11] ?>, 8.2, 9.4, 10.8],
            [12, <?php echo $weight_graph[12] ?>, 8.4, 9.6, 11.1],
            [13, <?php echo $weight_graph[13] ?>, 8.6, 9.9, 11.4],
            [14, <?php echo $weight_graph[14] ?>, 8.8, 10.1, 11.6],
            [15, <?php echo $weight_graph[15] ?>, 9, 10.3, 11.9],
            [16, <?php echo $weight_graph[16] ?>, 9.1, 10.5, 12.1],
            [17, <?php echo $weight_graph[17] ?>, 9.3, 10.7, 12.4]
        ]);
        var options = {
            tooltip: {
                isHtml: true
            },
            legend: 'none',
            height: 300,
            width: 380,
            chartArea: {
                width: '80%',
                height: '80%'
            },
            series: {
                0: {
                    color: '#000000',
                    lineWidth: 5,
                    pointShape: 'circle',
                    pointSize: 9
                },
                1: {
                    color: '#e8b026',
                    lineWidth: 2,
                    opacity: 0.5
                },
                2: {
                    color: '#177c48',
                    lineWidth: 2,
                    opacity: 0.5
                },
                3: {
                    color: '#ea5514',
                    lineWidth: 2,
                    opacity: 0.5
                }
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('man_w'));
        chart.draw(data, options);
    }
</script>
<!--여아키-->
<script type="text/javascript">
    google.load("visualization", "1", {
        packages: ["corechart"]
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', '우리아이(여)', '저신장(여)', '평균신장(여)', '고신장(여)'],
            [0, <?php echo $height_graph[0] ?>, 46.8, 49.1, 51.5],
            [1, <?php echo $height_graph[1] ?>, 51.2, 53.7, 56.2],
            [2, <?php echo $height_graph[2] ?>, 54.5, 57.1, 59.7],
            [3, <?php echo $height_graph[3] ?>, 57.1, 59.8, 62.5],
            [4, <?php echo $height_graph[4] ?>, 59.3, 62.1, 64.9],
            [5, <?php echo $height_graph[5] ?>, 61.2, 64, 66.9],
            [6, <?php echo $height_graph[6] ?>, 62.8, 65.7, 68.6],
            [7, <?php echo $height_graph[7] ?>, 64.3, 67.3, 70.3],
            [8, <?php echo $height_graph[8] ?>, 65.7, 68.7, 71.8],
            [9, <?php echo $height_graph[9] ?>, 67, 70.1, 73.2],
            [10, <?php echo $height_graph[10] ?>, 68.3, 71.5, 74.6],
            [11, <?php echo $height_graph[11] ?>, 69.5, 72.8, 76],
            [12, <?php echo $height_graph[12] ?>, 70.7, 74, 77.3],
            [13, <?php echo $height_graph[13] ?>, 71.8, 75.2, 78.6],
            [14, <?php echo $height_graph[14] ?>, 72.9, 76.4, 79.8],
            [15, <?php echo $height_graph[15] ?>, 74, 77.5, 81],
            [16, <?php echo $height_graph[16] ?>, 75, 78.6, 82.2],
            [17, <?php echo $height_graph[17] ?>, 76, 79.7, 83.3]
        ]);
        var options = {
            tooltip: {
                isHtml: true
            },
            legend: 'none',
            height: 170,
            width: 170,
            vAxis: {
                viewWindow: {
                    min: 45,
                    max: 85
                }
            },
            chartArea: {
                width: '80%',
                height: '80%'
            },
            series: {
                0: {
                    color: '#000000',
                    lineWidth: 5,
                    pointShape: 'circle',
                    pointSize: 9
                },
                1: {
                    color: '#e8b026',
                    lineWidth: 2,
                    opacity: 0.5
                },
                2: {
                    color: '#177c48',
                    lineWidth: 2,
                    opacity: 0.5
                },
                3: {
                    color: '#ea5514',
                    lineWidth: 2,
                    opacity: 0.5
                }
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('girl_h'));
        chart.draw(data, options);
    }
</script>
<!--여아무게-->
<script type="text/javascript">
    google.load("visualization", "1", {
        packages: ["corechart"]
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', '우리아이(여)', '저체중(여)', '평균체중(여)', '과체중(여)'],
            [0, <?php echo $weight_graph[0] ?>, 2.7, 3.2, 3.9],
            [1, <?php echo $weight_graph[1] ?>, 3.5, 4.2, 5],
            [2, <?php echo $weight_graph[2] ?>, 4.3, 5.1, 6],
            [3, <?php echo $weight_graph[3] ?>, 5, 5.8, 6.9],
            [4, <?php echo $weight_graph[4] ?>, 5.5, 6.4, 7.5],
            [5, <?php echo $weight_graph[5] ?>, 5.9, 6.9, 8.1],
            [6, <?php echo $weight_graph[6] ?>, 6.2, 7.3, 8.5],
            [7, <?php echo $weight_graph[7] ?>, 6.5, 7.6, 8.9],
            [8, <?php echo $weight_graph[8] ?>, 6.8, 7.9, 9.3],
            [9, <?php echo $weight_graph[9] ?>, 7, 8.2, 9.6],
            [10, <?php echo $weight_graph[10] ?>, 7.3, 8.5, 9.9],
            [11, <?php echo $weight_graph[11] ?>, 7.5, 8.7, 10.2],
            [12, <?php echo $weight_graph[12] ?>, 7.7, 8.9, 10.5],
            [13, <?php echo $weight_graph[13] ?>, 7.9, 9.2, 10.8],
            [14, <?php echo $weight_graph[14] ?>, 8, 9.4, 11],
            [15, <?php echo $weight_graph[15] ?>, 8.2, 9.6, 11.3],
            [16, <?php echo $weight_graph[16] ?>, 8.4, 9.8, 11.5],
            [17, <?php echo $weight_graph[17] ?>, 8.6, 10, 11.8]
        ]);
        var options = {
            tooltip: {
                isHtml: true
            },
            legend: 'none',
            height: 170,
            width: 170,
            chartArea: {
                width: '80%',
                height: '80%'
            },
            series: {
                0: {
                    color: '#000000',
                    lineWidth: 5,
                    pointShape: 'circle',
                    pointSize: 9
                },
                1: {
                    color: '#e8b026',
                    lineWidth: 2,
                    opacity: 0.5
                },
                2: {
                    color: '#177c48',
                    lineWidth: 2,
                    opacity: 0.5
                },
                3: {
                    color: '#ea5514',
                    lineWidth: 2,
                    opacity: 0.5
                }
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('girl_w'));
        chart.draw(data, options);
    }
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {
        packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback(drawAxisTickColors);

    function drawAxisTickColors() {
        var data = google.visualization.arrayToDataTable([
            ['영양소', '기준값', '제공량'],
            ['열량', 100, <?php echo (int)$pers_cal ?>],
            ['탄수화물', 100, <?php echo (int)$pers_car ?>],
            ['단백질', 100, <?php echo (int)$pers_pro ?>],
            ['지방', <?php echo (int)$sum_need_pat ?>, <?php echo (int)$sum_pat ?>]
        ]);
        var options = {
            legend: 'none',
            width: 380,
            height: 220,
            chartArea: {
                width: '80%',
                height: '100%'
            },
            focusTarget: 'category',
            annotations: {
                boxStyle: {
                    rx: 10,
                    ry: 10
                }
            },
            series: {
                0: {
                    color: '#e7e7e7'
                },
                1: {
                    color: '#8cc364'
                }
            },
            hAxis: {},
            vAxis: {}
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('per_chart_div'));
        chart.draw(data, options);
    }
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {
        packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback(drawAxisTickColors);

    function drawAxisTickColors() {
        var data = google.visualization.arrayToDataTable([
            ['영양소', '기준값', '제공량'],
            ['열량', 100, <?php echo (int)$pers_cal ?>],
            ['탄수화물', 100, <?php echo (int)$pers_car ?>],
            ['단백질', 100, <?php echo (int)$pers_pro ?>],
            ['지방', <?php echo (int)$sum_need_pat ?>, <?php echo (int)$sum_pat ?>]
        ]);
        var options = {
            legend: 'none',
            width: 380,
            height: 220,
            chartArea: {
                width: '80%',
                height: '100%'
            },
            focusTarget: 'category',
            annotations: {
                boxStyle: {
                    rx: 10,
                    ry: 10
                }
            },
            series: {
                0: {
                    color: '#e7e7e7'
                },
                1: {
                    color: '#8cc364'
                }
            },
            hAxis: {},
            vAxis: {}
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('per_chart_div2'));
        chart.draw(data, options);
    }
</script>

<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['재료명', '제공량'],
            ['단백질류', <?php echo (int)$djdbrfb ?>],
            ['과일류', <?php echo (int)$rhkdlffb ?>],
            ['채소류', <?php echo (int)$cothfb ?>],
            ['곡류', <?php echo (int)$rhrfb ?>],
            ['유제품', <?php echo (int)$dbwpvna ?>]
        ]);
        var options = {
            legend: 'none',
            is3D: true,
            width: 380,
            height: 200,
            chartArea: {
                width: '90%',
                height: '100%'
            },
            colors: ['#d2612a', '#ffc85a', '#aacf52', '#af4b22', '#7d895b'],
            pieHole: 0.4
        };
        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
    }
</script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['재료명', '제공량'],
            ['단백질류', <?php echo (int)$djdbrfb ?>],
            ['과일류', <?php echo (int)$rhkdlffb ?>],
            ['채소류', <?php echo (int)$cothfb ?>],
            ['곡류', <?php echo (int)$rhrfb ?>],
            ['유제품', <?php echo (int)$dbwpvna ?>]
        ]);
        var options = {
            legend: 'none',
            is3D: true,
            width: 380,
            height: 200,
            chartArea: {
                width: '90%',
                height: '100%'
            },
            colors: ['#d2612a', '#ffc85a', '#aacf52', '#af4b22', '#7d895b'],
            pieHole: 0.4
        };
        var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
        chart.draw(data, options);
    }
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {
        packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback(drawAxisTickColors);

    function drawAxisTickColors() {
        var data = google.visualization.arrayToDataTable([
            ['영양소', '기준값', '제공량'],
            ['열량', 100, <?php echo (int)$pers_cal ?>],
            ['탄수화물', 100, <?php echo (int)$pers_car ?>],
            ['단백질', 100, <?php echo (int)$pers_pro ?>],
            ['지방', <?php echo (int)$sum_need_pat ?>, <?php echo (int)$sum_pat ?>]
        ]);
        var options = {
            legend: 'none',
            width: 340,
            height: 200,
            chartArea: {
                width: '80%',
                height: '80%'
            },
            focusTarget: 'category',
            annotations: {
                boxStyle: {
                    rx: 10,
                    ry: 10
                }
            },
            series: {
                0: {
                    color: '#e7e7e7'
                },
                1: {
                    color: '#8cc364'
                }
            },
            hAxis: {},
            vAxis: {}
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('nutr_graph'));
        chart.draw(data, options);
    }
</script>

<!--게이지바-->
<?php
$chogiview = 0;
$jungthree = 0;
if ($baby_period == "준비기") {
    $gaze = 10;
    $chogiview = 1;
} elseif ($baby_period == "초기") {
    $gaze = 20;
    $chogiview = 1;
} elseif ($baby_period == "중기1") {
    $gaze = 40;
} elseif ($baby_period == "중기2") {
    $gaze = 40;
} elseif ($baby_period == "중기") {
    $gaze = 40;
} elseif ($baby_period == "중기3") {
    $gaze = 40;
    $jungthree = 1;
} elseif ($baby_period == "후기1") {
    $gaze = 60;
    $hugi = 1;
} elseif ($baby_period == "후기2") {
    $gaze = 60;
    $hugi = 1;
} elseif ($baby_period == "후기") {
    $gaze = 60;
    $hugi = 1;
} elseif ($baby_period == "후기3") {
    $gaze = 60;
    $hugi = 1;
} elseif ($baby_period == "완료기1") {
    $gaze = 90;
    $hugi = 1;
} elseif ($baby_period == "완료기2") {
    $gaze = 90;
    $hugi = 1;
} elseif ($baby_period == "완료기") {
    $gaze = 90;
    $hugi = 1;
} elseif ($baby_period == "유아식준비기") {
    $gaze = 90;
    $hugi = 1;
} else {
    $gaze = 100;
    $hugi = 1;
}
if ($user_firstperiod == "준비기") {
    $gazes = 0;
} elseif ($user_firstperiod == "초기") {
    $gazes = 20;
} elseif ($user_firstperiod == "중기") {
    $gazes = 40;
} elseif ($user_firstperiod == "후기") {
    $gazes = 60;
} elseif ($user_firstperiod == "완료기") {
    $gazes = 90;
} elseif ($user_firstperiod == "유아식준비기") {
    $gazes = 90;
} else {
    $gazes = 90;
}



$login_weekend = $loginid . "-7";

$weekend_query = "SELECT * FROM shicktest WHERE userid = '$login_weekend'";
$weekend_result = mysqli_query($mysqli, $weekend_query);
$weekend_row = mysqli_fetch_array($weekend_result);

$weekendmenu1 = $weekend_row[$lasts_day[0]];
$weekendmenu2 = $weekend_row[$lasts_day[1]];
$weekendmenu3 = $weekend_row[$lasts_day[2]];
$weekendmenu4 = $weekend_row[$lasts_day[3]];

$tomonthz = date("n");

$tomonthdata = "SELECT * FROM matecomment WHERE month = '$tomonthz'";
$tomonthdatas = mysqli_query($mysqli, $tomenthdata);
$tomonthdata_row = mysqli_fetch_array($tomonthdatas);

$nutr_name = $tomonthdata_row[nutr];
$nutr_comm = $tomonthdata_row[nutrcomment];
$mate_name = $tomonthdata_row[mate];
$mate_comm = $tomonthdata_row[matecomment];


if ($baby_period == "유아기") {
    $baby_part = "1";
} else {
    $baby_part = "2";
}

?>



<!--인풋히든-->

<input name="babypart" type="hidden" value="<?php echo $baby_part ?>">

<input name="rla" type="hidden" value="<?php echo $rla ?>">
<input name="ekfrrhrl" type="hidden" value="<?php echo $ekfrrhrl ?>">
<input name="rjsaldur" type="hidden" value="<?php echo $rjsaldur ?>">
<input name="tntn" type="hidden" value="<?php echo $tntn ?>">
<input name="dusenqn" type="hidden" value="<?php echo $dusenqn ?>">
<input name="ckwh" type="hidden" value="<?php echo $ckwh ?>">
<input name="rkawk" type="hidden" value="<?php echo $rkawk ?>">
<input name="ckqtkf" type="hidden" value="<?php echo $ckqtkf ?>">
<input name="clwm" type="hidden" value="<?php echo $clwm ?>">
<input name="gksdn" type="hidden" value="<?php echo $gksdn ?>">
<input name="gusal" type="hidden" value="<?php echo $gusal ?>">
<input name="gmral" type="hidden" value="<?php echo $gmral ?>">
<input name="tkfrkfn" type="hidden" value="<?php echo $tkfrkfn ?>">
<input name="ckqtkfrkfn" type="hidden" value="<?php echo $ckqtkfrkfn ?>">
<input name="an" type="hidden" value="<?php echo $an ?>">
<input name="didqocn" type="hidden" value="<?php echo $didqocn ?>">
<input name="tlrmacl" type="hidden" value="<?php echo $tlrmacl ?>">
<input name="rhrnak" type="hidden" value="<?php echo $rhrnak ?>">
<input name="doghqkr" type="hidden" value="<?php echo $doghqkr ?>">
<input name="qmfhzhffl" type="hidden" value="<?php echo $qmfhzhffl ?>">
<input name="dusrms" type="hidden" value="<?php echo $dusrms ?>">
<input name="dhdl" type="hidden" value="<?php echo $dhdl ?>">
<input name="cjdrudco" type="hidden" value="<?php echo $cjdrudco ?>">
<input name="rnlfl" type="hidden" value="<?php echo $rnlfl ?>">
<input name="eksghqkr" type="hidden" value="<?php echo $eksghqkr ?>">
<input name="qlxkals" type="hidden" value="<?php echo $qlxkals ?>">
<input name="qka" type="hidden" value="<?php echo $qka ?>">
<input name="tkrhk" type="hidden" value="<?php echo $tkrhk ?>">
<input name="qo" type="hidden" value="<?php echo $qo ?>">
<input name="dkstla" type="hidden" value="<?php echo $dkstla ?>">
<input name="dhksenzhdrkfn" type="hidden" value="<?php echo $dhksenzhdrkfn ?>">
<input name="shfkszhdrkfn" type="hidden" value="<?php echo $shfkszhdrkfn ?>">
<input name="tkfrkfn" type="hidden" value="<?php echo $tkfrkfn ?>">
<input name="rkdskdzhd" type="hidden" value="<?php echo $rkdskdzhd ?>">
<input name="qhfl" type="hidden" value="<?php echo $qhfl ?>">
<input name="znlshdk" type="hidden" value="<?php echo $znlshdk ?>">
<input name="wjsqns" type="hidden" value="<?php echo $wjsqns ?>">
<input name="ekdrms" type="hidden" value="<?php echo $ekdrms ?>">
<input name="gusalrkfn" type="hidden" value="<?php echo $gusalrkfn ?>">
<input name="qlxm" type="hidden" value="<?php echo $qlxm ?>">
<input name="alfrkfn" type="hidden" value="<?php echo $alfrkfn ?>">
<input name="vkvmflzk" type="hidden" value="<?php echo $vkvmflzk ?>">
<input name="rjadmzhdrkfn" type="hidden" value="<?php echo $rjadmzhdrkfn ?>">
<input name="gkscjs" type="hidden" value="<?php echo $gkscjs ?>">
<input name="qksksk" type="hidden" value="<?php echo $qksksk ?>">
<input name="vyrh" type="hidden" value="<?php echo $vyrh ?>">
<input name="zpdlf" type="hidden" value="<?php echo $zpdlf ?>">
<input name="didvk" type="hidden" value="<?php echo $didvk ?>">
<input name="ehowlrhrl" type="hidden" value="<?php echo $ehowlrhrl ?>">
<input name="rmseo" type="hidden" value="<?php echo $rmseo ?>">
<input name="quddkflzhd" type="hidden" value="<?php echo $quddkflzhd ?>">
<input name="qmffnqpfl" type="hidden" value="<?php echo $qmffnqpfl ?>">
<input name="dkdnr" type="hidden" value="<?php echo $dkdnr ?>">
<input name="didthddl" type="hidden" value="<?php echo $didthddl ?>">
<input name="fpsxlfzhd" type="hidden" value="<?php echo $fpsxlfzhd ?>">
<input name="fhapdls" type="hidden" value="<?php echo $fhapdls ?>">
<input name="smxkfl" type="hidden" value="<?php echo $smxkfl ?>">
<input name="qocn" type="hidden" value="<?php echo $qocn ?>">
<input name="tothddl" type="hidden" value="<?php echo $tothddl ?>">
<input name="ehfskanf" type="hidden" value="<?php echo $ehfskanf ?>">
<input name="rkwl" type="hidden" value="<?php echo $rkwl ?>">
<input name="dhrtntn" type="hidden" value="<?php echo $dhrtntn ?>">
<input name="qhaehd" type="hidden" value="<?php echo $qhaehd ?>">
<input name="zhffkql" type="hidden" value="<?php echo $zhffkql ?>">
<input name="rotdlv" type="hidden" value="<?php echo $rotdlv ?>">
<input name="dufan" type="hidden" value="<?php echo $dufan ?>">
<input name="qkddnfxhakxh" type="hidden" value="<?php echo $qkddnfxhakxh ?>">
<input name="rjsvkfo" type="hidden" value="<?php echo $rjsvkfo ?>">
<input name="cnlskanf" type="hidden" value="<?php echo $cnlskanf ?>">
<input name="ckaskanf" type="hidden" value="<?php echo $ckaskanf ?>">
<input name="wjrco" type="hidden" value="<?php echo $wjrco ?>">
<input name="qncn" type="hidden" value="<?php echo $qncn ?>">
<input name="rjsxht" type="hidden" value="<?php echo $rjsxht ?>">
<input name="dndjd" type="hidden" value="<?php echo $dndjd ?>">
<input name="eocn" type="hidden" value="<?php echo $eocn ?>">
<input name="dkahsem" type="hidden" value="<?php echo $dkahsem ?>">
<input name="wkt" type="hidden" value="<?php echo $wkt ?>">
<input name="rjsahrdl" type="hidden" value="<?php echo $rjsahrdl ?>">
<input name="whrvk" type="hidden" value="<?php echo $whrvk ?>">
<input name="tpqkfskanf" type="hidden" value="<?php echo $tpqkfskanf ?>">
<input name="fnrhffk" type="hidden" value="<?php echo $fnrhffk ?>">
<input name="vlakd" type="hidden" value="<?php echo $vlakd ?>">
<input name="aksmfwhd" type="hidden" value="<?php echo $aksmfwhd ?>">
<input name="voddl" type="hidden" value="<?php echo $voddl ?>">
<input name="ghdal" type="hidden" value="<?php echo $ghdal ?>">
<input name="emfrorkfn" type="hidden" value="<?php echo $emfrorkfn ?>">
<input name="rjsrhtkfl" type="hidden" value="<?php echo $rjsrhtkfl ?>">
<input name="ckaro" type="hidden" value="<?php echo $ckaro ?>">
<input name="ghrn" type="hidden" value="<?php echo $ghrn ?>">
<input name="rlwkd" type="hidden" value="<?php echo $rlwkd ?>">
<input name="vkxrkfn" type="hidden" value="<?php echo $vkxrkfn ?>">
<input name="xpvmrkfn" type="hidden" value="<?php echo $xpvmrkfn ?>">

<!--지금현재 퍼센트-->
<input name="gaze" type="hidden" value="<?php echo $gaze ?>">
<!--시작시기퍼센트-->
<input name="gazes" type="hidden" value="<?php echo $gazes ?>">
<!-- <p>지금은 도담밀<br><?php //echo $baby_period
                    ?>이용중</p>-->


<input name="jungthree" type="hidden" value="<?php echo $jungthree ?>">
<input name="bigyo_weight" type="hidden" value="<?php echo $bigyo_after_weight ?>">
<input name="bigyo_height" type="hidden" value="<?php echo $bigyo_after_height ?>">
<input name="chogiveiw" type="hidden" value="<?php echo $chogiview ?>">
<input name="snack_auth_code" id="snack_auth_code" type="hidden" value="<?php echo $snack_auth_code ?>">


<div class="">
    <div class="back_header">
        <div class="back_head">
            <li class="back">
                <a href="javascript:window.history.back();"></a>
            </li>
            <li class="title" id="move_paycheck_click">
                <h2>보고서 확인하기</h2>
            </li>
        </div>
    </div>
    <!--이유식파트-->
    <div class="box_out">
        <div class="fixedbox">
            <div class="tab_menu_container btn01">
                <button class="tab_menu_btn on" id="top_btn01" type="button">기본정보</button>
                <button class="tab_menu_btn " id="top_btn02" type="button">영양정보</button>
                <button class="tab_menu_btn" id="top_btn03" type="button">성장발달정보</button>
                <button class="tab_menu_btn" id="top_btn04" type="button">교육자료</button>
                <button class="tab_menu_btn" id="top_btn05" type="button">기본성장정보</button>
                <button class="tab_menu_btn" id="top_btn06" type="button">식단/영양정보</button>
                <button class="tab_menu_btn" id="top_btn07" type="button">영양교육자료</button>
                <button class="tab_menu_btn" id="top_btn08" type="button">육아교육자료</button>
            </div>
            <div class="tab_top"></div>
        </div>
        <div class="tab_box_container">
            <!--기본-->
            <div class="tab_box tab1 on">
                <div id="tabbox1" class="tab-inner">
                    <div class="">
                        <div class="tabbox1-contents">
                            <div class="tabbox1-box">
                                <div class="tabbox1-fiex">
                                    <div class="tabbox1-gender">
                                        <!--남자 man, 여자 girl 해서 폴더위치만 조정해주세요 -->
                                        <img src="/wp-content/themes/storefront-child/con3/image/<?php echo $user_gendera ?>.png">
                                    </div>
                                    <div class="tabbox1-title">
                                        <p><?php echo $user_babyname ?></p>
                                    </div>
                                </div>
                                <div class="tabbox1-inner">
                                    <p><?php echo $user_birthday ?> 출생</p>
                                    <p><?php echo $user_monthly ?> 개월</p>
                                    <p>신장 <?php echo $user_height ?> cm</p>
                                    <p>체중 <?php echo $user_weight ?> kg</p>
                                </div>
                                <div class="">
                                    <!--임의로 추가한것 글자 작고 회색 -->
                                    <p><?php echo $reserch_date ?> 기준</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="eat">
                        <div class="eat-title">
                            <p><?php echo $user_babyname ?>이는 지금<br><?php echo $user_period ?> 이유식을 먹고있어요.
                        </div>
                        <div class="eat-inners">
                            <p><?php echo $now_precautions ?></p>
                        </div>
                    </div>

                    <div class="outline bg-f2" style="margin-top:15px; padding:40px 20px; border-radius:9px; overflow:hidden;">
                        <div class="inline">
                            <div class="cont">
                                <div class="number">
                                    <p><span></span><?php echo $user_babyname ?>이의 식사계획</p>
                                </div>
                                <div class="three-text">
                                    <div class="three-head">
                                        <p>수유 스케줄</p>
                                        <div class="three-text">
                                            <ul>
                                                <li>
                                                    <div class="three-text-inner">
                                                        <?php echo $yamount ?>ml
                                                    </div>
                                                    <p>하루 섭취량</p>
                                                </li>
                                                <li>
                                                    <div class="three-text-inner">
                                                        <?php echo $ycount ?>회
                                                    </div>
                                                    <p>하루 수유 횟수</p>
                                                </li>
                                                <li>
                                                    <div class="three-text-inner">
                                                        <?php echo $ytime ?>시간
                                                    </div>
                                                    <p>수유 간격</p>
                                                </li>
                                            </ul>
                                            <p>이유식 스케줄</p>
                                            <ul>
                                                <li>
                                                    <div class="three-text-inner">
                                                        <?php echo $eamount ?>g
                                                    </div>
                                                    <p>1회 섭취량</p>
                                                </li>
                                                <li>
                                                    <div class="three-text-inner">
                                                        <?php echo $ecount ?>회
                                                    </div>
                                                    <p>하루 섭취 횟수</p>
                                                </li>
                                                <li>
                                                    <div class="three-text-inner">
                                                        <?php echo $etime ?><br><?php echo $etime2 ?>
                                                    </div>
                                                    <p>섭취 시간</p>
                                                </li>
                                            </ul>
                                            <ul class="three">
                                                <li>
                                                    <div class="three-text-inner inner01">
                                                        <div class="three-img_01">
                                                            <!-- 파일명 gujun, gucho, gujung, guhu, guwan, guyoo 해서 루트에 넣어두시기 바래요 -->
                                                            <img src="/wp-content/themes/storefront-child/con3/image/<?php echo $formimg ?>.png" alt="쌀알">

                                                        </div>
                                                        <p><?php echo $form ?></p>
                                                    </div>
                                                    <p>형태</p>
                                                </li>
                                                <li>
                                                    <div class="three-text-inner inner02">
                                                        <div class="three-img_02">
                                                            <img src="/wp-content/themes/storefront-child/con3/image/guma.png" alt="불린쌀">
                                                            <img src="/wp-content/themes/storefront-child/con3/image/dotdot.png" alt="점">
                                                            <img src="/wp-content/themes/storefront-child/con3/image/icon-si.png" alt="물">
                                                        </div>
                                                        <p><?php echo $texter ?></p>
                                                    </div>
                                                    <p>농도</p>
                                                </li>
                                                <li>
                                                    <div class="three-text-inner inner03">
                                                        <div class="three-img_03">
                                                            <img src="/wp-content/themes/storefront-child/con3/image/icon-br.png" alt="빵">
                                                        </div>
                                                        <p><?php echo $snack ?>회</p>
                                                    </div>
                                                    <p>간식 섭취 횟수</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="check-blue">
                                    <p>섭취량과 횟수, 시간은 아이의 섭취정도와생활패턴에 따라 달라질 수 있습니다.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nr">
                        <div class="nr-title">
                            <p>영양소 제공량</p>
                        </div>
                        <div class="">
                            <div id="nutr_graph"></div>
                        </div>
                        <div class="nr-text">
                            <p>이번달 도담밀의 <b>영양소 제공량</b>은</p>
                            <p><b>권장 섭취량의 약 <span><?php echo (int)$pers_cal ?>% </span>수준으로 제공</b>되었습니다.</p>
                        </div>
                        <div class="btn nr-btn">
                            <p>자세히 보러가기 ></p>
                        </div>
                    </div>
                    <div class="gray-bar">
                        <div class="g-bar"></div>
                    </div>
                    <div class="grap-check">
                        <div class="grap-check-title">
                            <p>성장척도 확인하기</p>
                        </div>
                        <div class="grap-check-inner">
                            <div id="man_h"></div>
                            <div id="man_w"></div>
                            <div id="girl_h"></div>
                            <div id="girl_w"></div>
                            <div style="position:absolute; background-color:#fff; border-radius:9px; top: 2px; left:8%; padding:5px; border:2px solid #ea5514; font-size:5px;">
                                <p style="color:#ea5514;"><span style="font-weight:bold;">빨간선</span>은 키 상위 <span style="font-weight:bold;">5%</span></p>
                            </div>
                            <div style="position:absolute; background-color:#fff; border-radius:9px; top:116px; left:15%; padding:5px; border:2px solid #ffc85a; font-size:5px;">
                                <p style="color:#ffc85a;"><span style="font-weight:bold;">노란선</span>은 키 하위 <span style="font-weight:bold;">5%</span></p>
                            </div>
                            <div style="position:absolute; background-color:#fff; border-radius:9px; top: 2px; left:59%; padding:5px; border:2px solid #ea5514; font-size:5px;">
                                <p style="color:#ea5514;"><span style="font-weight:bold;">빨간선</span>은 체중 상위 <span style="font-weight:bold;">5%</span></p>
                            </div>
                            <div style="position:absolute; background-color:#fff; border-radius:9px; top:116px; left:65%; padding:5px; border:2px solid #ffc85a; font-size:5px;">
                                <p style="color:#ffc85a;"><span style="font-weight:bold;">노란선</span>은 체중 하위 <span style="font-weight:bold;">5%</span></p>
                            </div>
                        </div>
                        <div class="chart-title-flex">
                            <div class="chart-title-flex_01">
                                <p>현재 신장 : <?php echo $user_height ?> cm</p>
                            </div>
                            <div class="chart-title-flex_01">
                                <p>현재 체중 : <?php echo $user_weight ?> kg</p>
                            </div>
                        </div>
                        <div class="grap-text">
                            <p><b><?php echo $user_babyname ?></b>(이)는 지난달보다<br><b>신장은 <span class="point_text"><?php echo $sum_height ?></span><span style="font-size:14px; color:#666;"> cm</span> 만큼</b>, <b>체중은 <span class="point_text"><?php echo $sum_weight ?></span><span> kg</span></b><br>더 늘어나 튼튼하게 잘 자라고있습니다.</p>
                        </div>
                        <div class="btn nr-btn ms20">
                            <p>자세히 보러가기 ></p>
                        </div>
                    </div>
                </div>
                <!--유아식은 이걸로 바뀔거에요-->
                <div id="tabbox1-yoo" class="tab-inner">
                    <div class="cont-progress">
                        <div class="cont-progress">
                            <div class="prograss">
                                <p class="prograss-p-up" style="margin-left:<?php echo $gaze ?>%">지금은 도담밀<br><?php echo $baby_period ?>이용중</p>
                                <div class="progress-bar" style="display:block; width:<?php echo $gaze ?>%" value="<?php echo $gaze ?>" max="110"></div>
                                <p class="prograss-p-down" style="margin-left:<?php echo $gazes ?>%">도담밀과 <br>함께한 시기</p>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="tabbox1-yoo-contents">
                            <div class="tabbox1-yoo-box">
                                <div class="tabbox1-yoo-fiex">
                                    <div class="tabbox1-yoo-gender">
                                        <!--남자 man, 여자 girl 해서 폴더위치만 조정해주세요 -->
                                        <img src="/wp-content/themes/storefront-child/con3/image/<?php echo $user_gendera ?>.png">
                                    </div>
                                    <div class="tabbox1-yoo-title">
                                        <p><?php echo $user_babyname ?></p>
                                    </div>
                                </div>
                                <div class="tabbox1-yoo-inner">
                                    <p><?php echo $user_birthday ?> 출생</p>
                                    <p>신장 <?php echo $user_height ?> cm</p>
                                    <p><?php echo $user_monthly ?> 개월</p>
                                    <p>체중 <?php echo $user_weight ?> kg</p>
                                </div>
                                <div class="">
                                    <!--임의로 추가한것 글자 작고 회색 -->
                                    <p><?php echo $reserch_date ?> 기준</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gray-bar">
                        <div class="g-bar"></div>
                    </div>
                    <div class="ps20">
                        <div class="grop-check-title">
                            <p><span></span>성장척도 확인하기</p>
                        </div>
                        <div class="">
                            <p>알려주신 신장과 체중정보를 바탕으로 우리아이의 성장 정보를 아래 그래프에 표기해 두었어요.</p>
                        </div>
                        <div class="">
                            <!-- <div class="">
                                <p>성장도표 보는 방법</p>
                            </div>
                            <div class="">
                                <p><b>1.</b> 우리아이의 키와 체중을 검은점 으로 표시했어요.</p>
                                <p><b>2.</b>빨강 초록 노란선과 아이의 신장, 체중을 비교해주세요</p>
                                <p>초록색 선에 가까우면 우리아이가 평균치에 맞게 잘 크고 있는 것이에요. 빨간색 선보다 위에있다면 노란색 선보다 아래에 있으면 성장이 느린 것이에요.</p>
                                <p>오랫동안 평균치에서 벗어난다면 전문가와 상담해보시는 것이 좋아요.</p>
                                <p>성장지표는 참고용 자료일 뿐이니 과도한 체중관리로 우리아이 성장에 방해가 되게해서는 안됩니다.</p>
                            </div> -->
                            <div>

                                <div class="chart-flex">
                                    <div class="">
                                        <div id="chart_one_y"></div>
                                        <div id="chart_thr_y"></div>
                                    </div>
                                    <div class="">
                                        <div id="chart_two_y"></div>
                                        <div id="chart_fow_y"></div>
                                    </div>
                                </div>
                                <div class="chart-title-flex">
                                    <div class="chart-title-flex_01">
                                        <p>현재 신장 : <?php echo $user_height ?> cm</p>
                                    </div>
                                    <div class="chart-title-flex_01">
                                        <p>현재 체중 : <?php echo $user_weight ?> kg</p>
                                    </div>
                                </div>

                                <div class="">
                                    <p>현재 신장 : <?php echo $user_height ?> cm</p>
                                </div>

                                <div style="position:absolute; background-color:#fff; border-radius:9px; top:800px; left:20%; padding:5px; border:2px solid #ea5514; font-size:15px;">
                                    <p style="color:#ea5514;"><span style="font-weight:bold;">빨간선</span>은 키 상위 <span style="font-weight:bold;">5%</span></p>
                                </div>
                                <div style="position:absolute; background-color:#fff; border-radius:9px; top:950px; left:50%; padding:5px; border:2px solid #ffc85a; font-size:15px;">
                                    <p style="color:#ffc85a;"><span style="font-weight:bold;">노란선</span>은 키 하위 <span style="font-weight:bold;">5%</span></p>
                                </div>



                                <div style="position:absolute; background-color:#fff; border-radius:9px; top:1160px; left:15%; padding:5px; border:2px solid #ea5514; font-size:15px;">
                                    <p style="color:#ea5514;"><span style="font-weight:bold;">빨간선</span>은 체중 상위 <span style="font-weight:bold;">5%</span></p>
                                </div>
                                <div style="position:absolute; background-color:#fff; border-radius:9px; top:1320px; left:50%; padding:5px; border:2px solid #ffc85a; font-size:15px;">
                                    <p style="color:#ffc85a;"><span style="font-weight:bold; color:#ffc85a;">노란선</span>은 체중 하위 <span style="font-weight:bold;">5%</span></p>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="reper_bar">
                    <b>위 자료는 아래의 자료를 참고하여 제작되었습니다.</b>
                    <p>영유아 단체급식 가이드라인</p>
                    <p>식품의약품 안전처·어린이급식관리지원센터 [ 2013. 05 ]</p>
                    <p>Infant Nutrition and Feeding, 미국농무부(USDA) [ 2019.04 ]</p>
                </div>
            </div>
            <!--두번째-->
            <div class="tab_box tab2">
                <div id="tabbox2" class="tab-inner">
                    <div class="outline">
                        <div class="inline">
                            <div class="cont">
                                <div class="cont-progress">
                                    <div class="prograss">
                                        <p class="prograss-p-up" style="margin-left:<?php echo $gaze ?>%">지금은 도담밀<br><?php echo $baby_period ?>이용중</p>
                                        <div class="progress-bar" style="display:block; width:<?php echo $gaze ?>%" value="<?php echo $gaze ?>" max="110"></div>
                                        <p class="prograss-p-down" style="margin-left:<?php echo $gazes ?>%">도담밀과 <br>함께한 시기</p>
                                    </div>
                                </div>
                                <div class="eat02">
                                    <div class="eat-title">
                                        <p><?php echo $user_babyname ?>이는 지금<br><?php echo $baby_period ?> 이유식을 먹고있어요.</p>
                                    </div>
                                </div>
                                <div class="eat-inner ">
                                    <div class="">
                                        <p><?php echo $now_menuinfo ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-f2 mon-box">
                                <div class="mon-food">
                                    <p><span></span>지난달 제공된 식단</p>
                                </div>
                                <div class="mon-list-day">
                                    <p></p>
                                    <p>1일</p>
                                    <p>2일</p>
                                    <p>3일</p>
                                    <p>4일</p>
                                    <p>5일</p>
                                    <p>6일</p>
                                </div>
                                <div class="mon-list">
                                    <ul>
                                        <li>
                                            <div class="mon-food-week">
                                                <p>1주차</p>
                                            </div>
                                            <div class="mon-food-week-text">
                                                <div class="week-text-inner">
                                                    <p><?php echo preg_replace("/[(4)]/", "", $menunamd) ?></p>
                                                    <p><?php echo preg_replace("/[(4)]/", "", $menunamdd) ?></p>
                                                    <p><?php echo preg_replace("/[(4)]/", "", $menunamddd) ?></p>
                                                </div>
                                                <div class="week-text-inner">
                                                    <p><?php echo $menunamdddd ?></p>
                                                    <p><?php echo $menunamddddd ?></p>
                                                    <p><?php echo $menunamdddddd ?></p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mon-food-week">
                                                <p>2주차</p>
                                            </div>
                                            <div class="mon-food-week-text">
                                                <div class="week-text-inner">
                                                    <p><?php echo preg_replace("/[(4)]/", "", $menunamc) ?></p>
                                                    <p><?php echo preg_replace("/[(4)]/", "", $menunamcc) ?></p>
                                                    <p><?php echo preg_replace("/[(4)]/", "", $menunamccc) ?></p>
                                                </div>
                                                <div class="week-text-inner">
                                                    <p><?php echo $menunamcccc ?></p>
                                                    <p><?php echo $menunamccccc ?></p>
                                                    <p><?php echo $menunamcccccc ?></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <div class="mon-food-week">
                                                <p>3주차</p>
                                            </div>
                                            <div class="mon-food-week-text">
                                                <div class="week-text-inner">
                                                    <p><?php echo preg_replace("/[(4)]/", "", $menunamb) ?></p>
                                                    <p><?php echo preg_replace("/[(4)]/", "", $menunambb) ?></p>
                                                    <p><?php echo preg_replace("/[(4)]/", "", $menunambbb) ?></p>
                                                </div>
                                                <div class="week-text-inner">
                                                    <p><?php echo $menunambbbb ?></p>
                                                    <p><?php echo $menunambbbbb ?></p>
                                                    <p><?php echo $menunambbbbbb ?></p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mon-food-week">
                                                <p>4주차</p>
                                            </div>
                                            <div class="mon-food-week-text">
                                                <div class="week-text-inner">
                                                    <p><?php echo preg_replace("/[(4)]/", "", $menunama) ?></p>
                                                    <p><?php echo preg_replace("/[(4)]/", "", $menunamaa) ?></p>
                                                    <p><?php echo preg_replace("/[(4)]/", "", $menunamaaa) ?></p>
                                                </div>
                                                <div class="week-text-inner">
                                                    <p><?php echo $menunamaaaa ?></p>
                                                    <p><?php echo $menunamaaaaa ?></p>
                                                    <p><?php echo $menunamaaaaaa ?></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="day7">
                                    <div class="day7-head">
                                        <p></p>
                                        <p>7일(+주말팩)</p>
                                    </div>
                                    <div class="day7-week">
                                        <p>1주차</p>
                                        <p><?php echo $weekendmenu1 ?></p>
                                    </div>
                                    <div class="day7-week">
                                        <p>2주차</p>
                                        <p><?php echo $weekendmenu2 ?></p>
                                    </div>
                                    <div class="day7-week">
                                        <p>3주차</p>
                                        <p><?php echo $weekendmenu3 ?></p>
                                    </div>
                                    <div class="day7-week">
                                        <p>4주차</p>
                                        <p><?php echo $weekendmenu4 ?></p>
                                    </div>
                                </div>
                            </div>

                            <!--간식식단-->
                            <!-- auth_snack 이 없으면 덮어씌우기 -->
                            <!--<div class="cont">
                                <div class="number">
                                    <p><span></span>지난달 제공된 간식식단</p>
                                </div>
                                <div class="schedulebox greenbox shickdan ganshickdan" id="auth_snack_block">
                                    <ul>
                                        <li>
                                            <div class="sch_top">
                                                <p>1주차</p>
                                            </div>
                                            <div class="sch_bot">
                                                <div class="floor_one">
                                                    <p><?php //echo $snack_table_menu[1][1] 
                                                        ?></p>
                                                    <p><?php //echo $snack_table_menu[1][2] 
                                                        ?></p>
                                                </div>
                                                <div class="floor_two">
                                                    <p><?php //echo $snack_table_menu[1][3] 
                                                        ?></p>
                                                    <p><?php //echo $snack_table_menu[1][4] 
                                                        ?></p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sch_top">
                                                <p>72주차</p>
                                            </div>
                                            <div class="sch_bot">
                                                <div class="floor_one">
                                                    <p><?php //echo $snack_table_menu[2][1] 
                                                        ?></p>
                                                    <p><?php //echo $snack_table_menu[2][2] 
                                                        ?></p>
                                                </div>
                                                <div class="floor_two">
                                                    <p><?php //echo $snack_table_menu[2][3] 
                                                        ?></p>
                                                    <p><?php //echo $snack_table_menu[2][4] 
                                                        ?></p>
                                                </div>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <div class="sch_top">
                                                <p>3주차</p>
                                            </div>
                                            <div class="sch_bot">
                                                <div class="floor_one">
                                                    <p><?php //echo $snack_table_menu[3][1] 
                                                        ?></p>
                                                    <p><?php //echo $snack_table_menu[3][2] 
                                                        ?></p>
                                                </div>
                                                <div class="floor_two">
                                                    <p><?php //echo $snack_table_menu[3][3] 
                                                        ?></p>
                                                    <p><?php //echo $snack_table_menu[3][4] 
                                                        ?></p>
                                                </div>
                                        </li>
                                        <li>
                                            <div class="sch_top">
                                                <p>4주차</p>
                                            </div>
                                            <div class="sch_bot">
                                                <div class="floor_one">
                                                    <p><?php //echo $snack_table_menu[4][1] 
                                                        ?></p>
                                                    <p><?php //echo $snack_table_menu[4][2] 
                                                        ?></p>
                                                </div>
                                                <div class="floor_two">
                                                    <p><?php //echo $snack_table_menu[4][3] 
                                                        ?></p>
                                                    <p><?php //echo $snack_table_menu[4][4] 
                                                        ?></p>
                                                </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>-->

                            <div class="per-box">
                                <div class="per-box-inner">
                                    <div class="per-title">
                                        <p>영양소 제공량</p>
                                    </div>
                                    <div class="per-text">
                                        <p>이번달 도담밀의 <b>영양소 제공량</b>은</p>
                                        <p><b>권장 섭취량의 약 <span><?php echo (int)$pers_cal ?>%</span>수준으로 제공</b>되었습니다.</p>
                                    </div>
                                    <div id="per_chart_div"></div>
                                    <!--차트 div-->
                                    <div class="per-chart_text">
                                        <p><span style="border-left:15px solid #c4c4c4;height:13px; padding-right:3px; display: inline-block;"></span>목표량</p>
                                        <p><span style="border-left:15px solid #F55380; margin-left:3px; padding-right:3px; display: inline-block;"></span>제공량</p>
                                    </div>
                                    <table class="per-chart-table">
                                        <tr>
                                            <td style="width:18%; background-color:#F55380; border-top-left-radius:9px; border-top:1px solid #e7e7e7; border-left:1px solid #e7e7e7; border-right:1px solid #e7e7e7;"></td>
                                            <td style="background-color:#FF82A0; font-family:'210gullim'; color:#3e3e3e; font-size:12px; border-top:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;
											color:#fff">열량<span style="font-size:10px;color:#fff;">( kcal )</span></td>
                                            <td style="background-color:#FF82A0; font-family:'210gullim'; color:#3e3e3e; font-size:12px; border-top:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;color:#fff">탄수화물<span style="font-size:10px; color:#fff;">( g )</span></td>
                                            <td style="background-color:#FF82A0; font-family:'210gullim'; color:#3e3e3e; font-size:12px; border-top:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;color:#fff">단백질<span style="font-size:10px; color:#fff;">( g )</span></td>
                                            <td style="background-color:#FF82A0; font-family:'210gullim'; color:#3e3e3e; font-size:12px; border-top-right-radius:9px; border-top:1px solid #e7e7e7; border-right:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;color:#fff">지방<span style="font-size:10px; color:#fff;">( g )</span></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color:#fff !important;color:#777; font-family:'210gullim'; color:#666; font-size:12px; border-left:1px solid #e7e7e7; border-right:1px solid #e7e7e7;
											border-bottom:1px solid #e7e7e7">권장<br>섭취량</td>
                                            <td style="vertical-align:middle;"><?php echo round($sum_need_cal) ?></td>
                                            <td style="vertical-align:middle;"><?php echo round($sum_need_car) ?></td>
                                            <td style="vertical-align:middle;"><?php echo round($sum_need_pro) ?></td>
                                            <td style="border-right:1px solid #e7e7e7; vertical-align:middle;"><?php echo round($sum_need_pat) ?></td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom-left-radius:9px; background-color:#fff; color:#777;font-family:'210gullim';  font-size:12px; border-left:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7; border-right:1px solid #e7e7e7;">도담밀<br>제공량</td>
                                            <td style="border-bottom:1px solid #e7e7e7; vertical-align:middle;"><?php echo round($sum_cal) ?></td>
                                            <td style="border-bottom:1px solid #e7e7e7; vertical-align:middle;"><?php echo round($sum_car) ?></td>
                                            <td style="border-bottom:1px solid #e7e7e7; vertical-align:middle;"><?php echo round($sum_pro) ?></td>
                                            <td style="border-bottom-right-radius:9px; vertical-align:middle; border-bottom:1px solid #e7e7e7; border-right:1px solid #e7e7e7;"><?php echo round($sum_pat) ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="schdulebox_notice" id="chogiview">
                                    <p>이유식 초기까지는 섭취연습을 하는 시기로, 분유 또는 모유를 통해 대부분의 영양소를 섭취합니다.</p>
                                </div>
                            </div>
                            <div class="food-grap">
                                <div class="food-grap-inner">
                                    <div class="food-grap-title">
                                        <p><span></span>식품군별 제공 비율</p>
                                    </div>
                                    <div id="donutchart"></div>
                                    <div class="donutchart-inner">
                                        <p><span></span>곡류</p>
                                        <p><span></span>단백질류</p>
                                        <p><span></span>유제품류</p>
                                        <p><span></span>과일류</p>
                                        <p><span></span>채소류</p>
                                    </div>
                                </div>
                            </div>
                            <div class="cont">
                                <!--빙고판-->
                                <div class="" id="bingopan">
                                    <div class="bingopan-title">
                                        <p>도담밀과 함께 먹어본 재료</p>
                                    </div>
                                    <div class="bingopan">
                                        <p id="rla">김</p>
                                        <p id="ekfrrhrl">닭고기</p>
                                        <p id="rjsaldur">건미역</p>
                                        <p id="tntn">수수</p>
                                        <p id="dusenqn">연두부</p>
                                        <p id="ckwh">차조</p>
                                        <p id="rkawk">감자</p>
                                        <p id="ckqtkf">찹쌀</p>
                                        <p id="clwm">치즈</p>
                                        <p id="gksdn">한우</p>
                                        <p id="gusal">현미</p>
                                        <p id="gmral">흑미</p>
                                        <p id="tkfrkfn">쌀가루</p>
                                        <p id="ckqtkfrkfn">찹쌀가루</p>
                                        <p id="an">무</p>
                                        <p id="didqocn">양배추</p>
                                        <p id="tlrmacl">시금치</p>
                                        <p id="rhrnak">고구마</p>
                                        <p id="doghqkr">애호박</p>
                                        <p id="qmfhzhffl">브로콜리</p>
                                        <p id="dusrms">연근</p>
                                        <p id="dhdl">오이</p>
                                        <p id="cjdrudco">청경채</p>
                                        <p id="rnlfl">귀리</p>
                                        <p id="eksghqkr">단호박</p>
                                        <p id="qlxkals">비타민</p>
                                        <p id="tkrhk">사과</p>
                                        <p id="qo">배</p>
                                        <p id="dhksenzhdrkfn">완두콩<br>가루</p>
                                        <p id="shfkszhdrkfn">노란콩<br>가루</p>
                                        <p id="tkfrkfn">쌀</p>
                                        <p id="rkdskdzhd">강낭콩</p>
                                        <p id="qhfl">보리</p>
                                        <p id="wjsqns">전분</p>
                                        <p id="ekdrms">당근</p>
                                        <p id="gusalrkfn">현미가루</p>
                                        <p id="qlxm">비트</p>
                                        <p id="alfrkfn">밀가루</p>
                                        <p id="vkvmflzk">파프리카</p>
                                        <p id="rjadmzhdrkfn">검은콩<br>가루</p>
                                        <p id="gkscjs">한천</p>
                                        <p id="qksksk">바나나</p>
                                        <p id="vyrh">표고</p>
                                        <p id="zpdlf">케일</p>
                                        <p id="didvk">양파</p>
                                        <p id="ehowlrhrl">돼지고기</p>
                                        <p id="rmseo">근대</p>
                                        <p id="dkdnr">아욱</p>
                                        <p id="didthddl">양송이</p>
                                        <p id="fhapdls">로메인</p>
                                        <p id="smxkfl">느타리</p>
                                        <p id="qocn">배추</p>
                                        <p id="tothddl">새송이</p>
                                        <p id="ehfskanf">돌나물</p>
                                        <p id="rkwl">가지</p>
                                        <p id="dhrtntn">옥수수</p>
                                        <p id="qhaehd">봄동</p>
                                        <p id="dufan">열무</p>
                                        <p id="rjsvkfo">건파래</p>
                                        <p id="cnlskanf">취나물</p>
                                        <p id="ckaskanf">참나물</p>
                                        <p id="wjrco">적채</p>
                                        <p id="qncn">부추</p>
                                        <p id="rjsxht">건톳</p>
                                        <p id="dndjd">우엉</p>
                                        <p id="rjsahrdl">건목이</p>
                                        <p id="whrvk">쪽파</p>
                                        <p id="voddl">팽이</p>
                                        <p id="emfrorkfn">들깨가루</p>
                                        <p id="rjsrhtkfl">건고사리</p>
                                        <p id="ckaro">참깨</p>
                                        <p id="ghrn">호두</p>
                                        <p id="rlwkd">기장</p>
                                        <p id="eocn">대추</p>
                                        <p id="rotdlv">깻잎</p>
                                        <p id="aksmfwhd">마늘쫑</p>
                                        <p id="qkddnfxhakxh">방울<br>토마토</p>
                                        <p id="quddkflzhd">병아리콩</p>
                                        <p id="quddkflzhd">세발나물</p>
                                        <p id="dkahsem">아몬드</p>
                                        <p id="vkxrkfn">팥가루</p>
                                        <p id="vlakd">피망</p>
                                        <p id="fpsxlfzhd">렌틸콩</p>
                                        <p id="fnrhffk">루꼴라</p>
                                        <p id="qka">밤</p>
                                        <p id="qmffnqpfl">블루베리</p>
                                        <p id="dkstla">안심</p>
                                        <p id="wkt">잣</p>
                                        <p id="zhffkql">콜라비</p>
                                        <p id="znlshdk">퀴노아</p>
                                        <p id="xpvmrkfn">테프가루</p>
                                        <p id="ghdal">홍미</p>
                                    </div>
                                    <div class="dodam-food">
                                        <p><span></span>도담밀과 먹어볼재료</p>
                                        <p><span></span>도담밀전에 먹어본재료</p>
                                        <p><span></span>먹은 채소</p>
                                        <p><span></span>먹은 단백질</p>
                                        <p><span></span>먹은 곡물</p>
                                        <p><span></span>먹은 과일</p>
                                        <p><span></span>먹은 유제품</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="month-nr">
                            <div class="month-nr-title">
                                <div class="month-nr-title">
                                    <p>이달의 영양소</p>
                                </div>
                                <div class="month-nr-inner">
                                    <p><span><?php echo $tomonth_nutr ?></span><?php echo $tomonth_nutrinfo ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--유아식탭2-->
                <div id="tabbox2-yoo" class="tab-inner">
                    <div class="bg-f2 mon-box">
                        <div class="mon-food">
                            <p><span></span>지난달 제공된 식단</p>
                        </div>
                        <div class="mon-list-day">
                            <p></p>
                            <p>1일</p>
                            <p>2일</p>
                            <p>3일</p>
                            <p>4일</p>
                            <p>5일</p>
                            <p>6일</p>
                        </div>
                        <div class="mon-list">
                            <ul>
                                <li>
                                    <div class="mon-food-week">
                                        <p>1주차</p>
                                    </div>
                                    <div class="mon-food-week-text">
                                        <div class="week-text-inner">
                                            <p><?php echo preg_replace("/[(4)]/", "", $menunamd) ?></p>
                                            <p><?php echo preg_replace("/[(4)]/", "", $menunamdd) ?></p>
                                            <p><?php echo preg_replace("/[(4)]/", "", $menunamddd) ?></p>
                                        </div>
                                        <div class="week-text-inner">
                                            <p><?php echo $menunamdddd ?></p>
                                            <p><?php echo $menunamddddd ?></p>
                                            <p><?php echo $menunamdddddd ?></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="mon-food-week">
                                        <p>2주차</p>
                                    </div>
                                    <div class="mon-food-week-text">
                                        <div class="week-text-inner">
                                            <p><?php echo preg_replace("/[(4)]/", "", $menunamc) ?></p>
                                            <p><?php echo preg_replace("/[(4)]/", "", $menunamcc) ?></p>
                                            <p><?php echo preg_replace("/[(4)]/", "", $menunamccc) ?></p>
                                        </div>
                                        <div class="week-text-inner">
                                            <p><?php echo $menunamcccc ?></p>
                                            <p><?php echo $menunamccccc ?></p>
                                            <p><?php echo $menunamcccccc ?></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <div class="mon-food-week">
                                        <p>3주차</p>
                                    </div>
                                    <div class="mon-food-week-text">
                                        <div class="week-text-inner">
                                            <p><?php echo preg_replace("/[(4)]/", "", $menunamb) ?></p>
                                            <p><?php echo preg_replace("/[(4)]/", "", $menunambb) ?></p>
                                            <p><?php echo preg_replace("/[(4)]/", "", $menunambbb) ?></p>
                                        </div>
                                        <div class="week-text-inner">
                                            <p><?php echo $menunambbbb ?></p>
                                            <p><?php echo $menunambbbbb ?></p>
                                            <p><?php echo $menunambbbbbb ?></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="mon-food-week">
                                        <p>4주차</p>
                                    </div>
                                    <div class="mon-food-week-text">
                                        <div class="week-text-inner">
                                            <p><?php echo preg_replace("/[(4)]/", "", $menunama) ?></p>
                                            <p><?php echo preg_replace("/[(4)]/", "", $menunamaa) ?></p>
                                            <p><?php echo preg_replace("/[(4)]/", "", $menunamaaa) ?></p>
                                        </div>
                                        <div class="week-text-inner">
                                            <p><?php echo $menunamaaaa ?></p>
                                            <p><?php echo $menunamaaaaa ?></p>
                                            <p><?php echo $menunamaaaaaa ?></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="day7">
                            <div class="day7-head">
                                <p></p>
                                <p>7일(+주말팩)</p>
                            </div>
                            <div class="day7-week">
                                <p>1주차</p>
                                <p><?php echo $weekendmenu1 ?></p>
                            </div>
                            <div class="day7-week">
                                <p>2주차</p>
                                <p><?php echo $weekendmenu2 ?></p>
                            </div>
                            <div class="day7-week">
                                <p>3주차</p>
                                <p><?php echo $weekendmenu3 ?></p>
                            </div>
                            <div class="day7-week">
                                <p>4주차</p>
                                <p><?php echo $weekendmenu4 ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="food-grap">
                        <div class="food-grap-inner">
                            <div class="food-grap-title">
                                <p><span></span>식품군별 제공 비율</p>
                            </div>
                            <div id="donutchart_2"></div>
                            <div class="donutchart-inner">
                                <p><span></span>곡류</p>
                                <p><span></span>단백질류</p>
                                <p><span></span>유제품류</p>
                                <p><span></span>과일류</p>
                                <p><span></span>채소류</p>
                            </div>
                        </div>
                    </div>
                    <!--이달의재료-->
                    <div class="month-ft">
                        <div class="ft-title">
                            <p>이달의재료</p>
                        </div>
                        <div>
                            <p><?php echo $mate_comm ?></p>
                        </div>
                    </div>

                    <div class="per-box">
                        <div class="per-box-inner">
                            <div class="per-title">
                                <p>영양소 제공량</p>
                            </div>
                            <div class="per-text">
                                <p>이번달 도담밀의 <b>영양소 제공량</b>은</p>
                                <p><b>권장 섭취량의 약 <span><?php echo (int)$pers_cal ?>%</span>수준으로 제공</b>되었습니다.</p>
                            </div>
                            <div id="per_chart_div_2"></div>
                            <!--차트 div-->
                            <div class="per-chart_text">
                                <p><span style="border-left:14px solid #c4c4c4; padding-right:3px;"></span>목표량</p>
                                <p><span style="border-left:14px solid #F55380; margin-left:3px; padding-right:3px;"></span>제공량</p>
                            </div>
                            <table class="per-chart-table">
                                <tr>
                                    <td style="width:18%; background-color:#F55380; border-top-left-radius:9px; border-top:1px solid #e7e7e7; border-left:1px solid #e7e7e7; border-right:1px solid #e7e7e7;"></td>
                                    <td style="background-color:#FF82A0; font-family:'210gullim'; color:#3e3e3e; font-size:12px; border-top:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;
										color:#fff">열량<span style="font-size:10px;color:#fff;">( kcal )</span></td>
                                    <td style="background-color:#FF82A0; font-family:'210gullim'; color:#3e3e3e; font-size:12px; border-top:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;color:#fff">탄수화물<span style="font-size:10px; color:#fff;">( g )</span></td>
                                    <td style="background-color:#FF82A0; font-family:'210gullim'; color:#3e3e3e; font-size:12px; border-top:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;color:#fff">단백질<span style="font-size:10px; color:#fff;">( g )</span></td>
                                    <td style="background-color:#FF82A0; font-family:'210gullim'; color:#3e3e3e; font-size:12px; border-top-right-radius:9px; border-top:1px solid #e7e7e7; border-right:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;color:#fff">지방<span style="font-size:10px; color:#fff;">( g )</span></td>
                                </tr>
                                <tr>
                                    <td style="background-color:#fff !important;color:#777; font-family:'210gullim'; color:#666; font-size:12px; border-left:1px solid #e7e7e7; border-right:1px solid #e7e7e7;
								border-bottom:1px solid #e7e7e7 ">권장<br>섭취량</td>
                                    <td style="vertical-align:middle;"><?php echo round($sum_need_cal) ?></td>
                                    <td style="vertical-align:middle;"><?php echo round($sum_need_car) ?></td>
                                    <td style="vertical-align:middle;"><?php echo round($sum_need_pro) ?></td>
                                    <td style="vertical-align:middle;"><?php echo round($sum_need_pat) ?></td>
                                </tr>
                                <tr>
                                    <td style="background-color:#fff !important;color:#777; font-family:'210gullim'; color:#666; font-size:12px; border-left:1px solid #e7e7e7; border-right:1px solid #e7e7e7;
								border-bottom:1px solid #e7e7e7; border-bottom-left-radius: 10px;">도담밀<br>제공량</td>
                                    <td style="vertical-align:middle;"><?php echo round($sum_cal) ?></td>
                                    <td style="vertical-align:middle;"><?php echo round($sum_car) ?></td>
                                    <td style="vertical-align:middle;"><?php echo round($sum_pro) ?></td>
                                    <td style="border-right:1px solid #e7e7e7;border-bottom-right-radius: 10px;"><?php echo round($sum_pat) ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="nr-box">
                        <div class="nr-title">
                            <p>이달의 영양소</p>
                        </div>
                        <div class="nr-inof">
                            <p><span><?php echo $nutr_name ?></span><?php echo $nutr_comm ?></p>
                        </div>
                    </div>
                </div>
                <div class="nr-info-list">
                    <b>위 자료는 아래의 자료를 참고하여 제작되었습니다.</b>
                    <p>영유아 단체급식 가이드라인</p>
                    <p>식품의약품 안전처·어린이급식관리지원센터 [ 2013.05 ]</p>
                    <p>생각이 필요한 식품재료학 노봉수 외 6, [ 2020.02 ]</p>
                    <p>2015 한국인 영양소 섭취기준, 보건복지부·한국영양학회 [ 2015.11 ]</p>
                    <p>Harold Mcgee, On food and cooking [ 2017.03 ]</p>
                    <p>Infant Nutrition and Feeding, 미국농무부(USDA) [ 2019.04 ]</p>
                </div>
            </div>
            <!--세번째-->
            <div class="tab_box tab3">
                <div id="tabbox3" class="tab-inner">
                    <div class="tabbox3-box">
                        <div class="tabbox3-content">
                            <div class="tabbox3-content-inner">
                                <div class="tabbox3-title">
                                    <p>성장척도 확인하기</p>
                                    <span class="report-pup">성장도표 보는법?</span>
                                </div>
                                <div class="tabbox3-text">
                                    <p>알려주신 신장과 체중정보를 바탕으로 우리아이의 성장 정보를 아래 그래프에 표기해 두었어요.</p>
                                </div>
                                <div class="popup-page_a">
                                    <div class="dark-box">
                                        <div class="popup-sub">
                                            <div class="container">
                                                <div class="pop-list_a">
                                                    <h5>성장도표보는법</h5>
                                                    <img src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="Arrow1">
                                                    <div class="pop-text-a">
                                                        <p class="pop-be">우리아이의 키와 체중을 검은점으로 표시했어요.</p>
                                                        <p class="pop-be">빨강, 초록, 노란선과 아이의 신장, 체중을 비교해주세요.</p>
                                                        <p><span class="green-ss">초록색 선</span> 에 가까우면 우리아이가 평균치에 맞게 잘 크고 있는 것이에요.<span class="red-ss">빨간색 선</span>보다 위에있다면 성장이 빠르고, <span class="yellow-ss">노란색 선</span>보다 아래에 있으면 성장이 느린 것이에요.</p>
                                                        <p>오랫동안 평균치에서 벗어난다면 전문가와 상담해보시는 것이 좋아요.</p>
                                                        <div class="check-text">
                                                            <p> 성장지표는 참고용 자료일 뿐이니 과도한 체중관리로 우리아이 성장에 방해가 되게해서는 안됩니다.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grap-two">
                                <div>
                                    <div class="grap-title">
                                        <p>현재 신장 : <?php echo $user_height ?> cm</p>
                                    </div>
                                    <div id="chart_one"></div>
                                    <div id="chart_thr"></div>
                                    <div style="position:absolute; background-color:#fff; border-radius:9px; top:94px; left:20%; padding:5px; border:2px solid #ea5514; font-size:15px;">
                                        <p style="color:#ea5514;"><span style="font-weight:bold;">빨간선</span>은 키 상위 <span style="font-weight:bold;">5%</span></p>
                                    </div>
                                    <div style="position:absolute; background-color:#fff; border-radius:9px; top:245px; left:50%; padding:5px; border:2px solid #ffc85a; font-size:15px;">
                                        <p style="color:#ffc85a;"><span style="font-weight:bold;">노란선</span>은 키 하위 <span style="font-weight:bold;">5%</span></p>
                                    </div>
                                    <p class="graph_center" style="text-align:center; font-size:13px;  color:#666;">만나이 (개월)</p>
                                    <div class="graph_title grap-title" style="padding-top:20px;">
                                        <p>현재 체중 : <?php echo $user_weight ?> kg</p>
                                    </div>
                                    <div id="chart_two"></div>
                                    <div id="chart_fow"></div>
                                    <div style="position:absolute; background-color:#fff; border-radius:9px; top:485px; left:17%; padding:5px; border:2px solid #ea5514; font-size:15px;">
                                        <p style="color:#ea5514;"><span style="font-weight:bold;">빨간선</span>은 체중 상위 <span style="font-weight:bold;">5%</span></p>
                                    </div>
                                    <div style="position:absolute; background-color:#fff; border-radius:9px; top:627px; left:50%; padding:5px; border:2px solid #ffc85a; font-size:15px;">
                                        <p style="color:#ffc85a;"><span style="font-weight:bold; color:#ffc85a;">노란선</span>은 체중 하위 <span style="font-weight:bold;">5%</span></p>
                                    </div>
                                    <p class="graph_center" style="text-align:center; font-size:13px; color:#666; padding-bottom:20px;">만나이 (개월)</p>
                                </div>
                            </div>
                        </div>
                        <div class="cont count02">
                            <div class="number">
                                <p><span></span>얼마나 자랐을까요?</p>
                            </div>
                            <div class="star_text">
                                <p>우리아이는 이번달 얼만큼 더 자랐을까요?</p>
                            </div>
                            <div class="graph_table">
                                <table>
                                    <tbody>
                                        <tr class="table01">
                                            <td></td>
                                            <td>지난달</td>
                                            <td>이번달</td>
                                            <td>차이</td>
                                        </tr>
                                        <tr class="table02">
                                            <td>신장</td>
                                            <td><?php echo $before_height ?>cm</td>
                                            <td><?php echo $after_height ?>cm</td>
                                            <td><?php echo $sum_height ?>cm</td>
                                        </tr>
                                        <tr class="table03">
                                            <td>체중</td>
                                            <td><?php echo $before_weight ?>kg</td>
                                            <td><?php echo $after_weight ?>kg</td>
                                            <td><?php echo $sum_weight ?>kg</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="toolkg">
                                <p><?php echo $user_babyname ?>(이)는 지난달보다<br> 신장은 <span><?php echo $sum_height ?> cm</span> 만큼, 체중은 <span><?php echo $sum_weight ?> kg</span><br> 더 늘어나 튼튼하게 잘 자라고있습니다.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box001">
                    <p>성장도표는 질병관리본부에서 제공하는 2017 소아성정도표를 기준으로 만들어졌습니다.</p>
                </div>
                < class="grow">
                    <div class="grow-contents">
                        <div class="grow-inner">
                            <div class="grow-title">
                                <p><span></span>성장 정도에 따른 도담밀의 팁!</p>
                            </div>
                            <div>
                                <div class="">
                                    <div class="" id="cpwndwkrek">
                                        <b>체중이 적게 나간다면?</b>
                                        <p>한 끼에 너무 많은 양을 먹으면 다음 끼니의 식사량이 줄어들 수 있어요. 중간중간 적당량의 간식을 먹도록 도와주세요.</p>
                                    </div>
                                    <div class="" id="cpwndaksgek">
                                        <b>체중이 많이 나간다면?</b>
                                        <p>과도한 체중 관리는 아이의 성장을 방해할 수 있어요. 중기가 지났다면 수유량을 조금씩 줄여주세요.</p>
                                    </div>
                                    <div class="" id="zlwkrek">
                                        <b>키가 작다면?</b>
                                        <p>단백질이 풍부한 육류를 충분히 섭취할 수 있도록 해주세요. 중기가 지났다면 칼슘 섭취를 위해 어린이용 치즈를 간식으로 주는 것도 좋아요.</p>
                                    </div>
                                    <div class="" id="zlzmek">
                                        <b>키가 크다면?</b>
                                        <p>아이의 키는 유전적 요인에 영향을 많이 받기 때문에 질환에 의한 과성장이 아니라면 걱정하지 않아도 괜찮아요.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grow-check">
                            <div class="grow-check-title">
                                <p><span></span>발달정도 확인하기</p>
                            </div>
                            <div class="grow-check-text">
                                <p>생후 <?php echo $user_monthly ?>개월의 <b><?php echo $user_babyname ?></b> (이)의 발달 정도는?</p>
                            </div>
                            <!-- 개월령에 맞는 자료의 출력 -->
                            <table class="evolu" id="evolu001">
                                <tr>
                                    <td class="evtd">신체</td>
                                    <td><?php echo $physical ?></td>
                                </tr>
                                <tr>
                                    <td class="evtd">사회<br>정서</td>
                                    <td><?php echo $emotion ?></td>
                                </tr>
                                <tr>
                                    <td class="evtd">언어</td>
                                    <td><?php echo $language ?></td>
                                </tr>
                                <tr>
                                    <td class="evtd">인지</td>
                                    <td><?php echo $cognitive ?></td>
                                </tr>
                            </table>
                            <div class="text-blue">
                                <p>아이의 성장발달 정도는 개인차가 크니 참고용으로 봐주세요.</p>
                            </div>
                        </div>
                    </div>

                    <div id="tabbox3-yoo" style="display:none;">
                        <div class="">
                            <div class="">
                                <div class="">
                                    <img src="/wp-content/themes/storefront-child/image/edudata/<?php echo $edudata ?>.png">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="reper_bar">
                        <b>위 자료는 아래의 자료를 참고하여 제작되었습니다.</b>
                        <p>2017 소아청소년 성장도표, 보건복지부 [ 2017. ]</p>
                        <p>미국질병통제예방센터, CDC [ 2020.06 ]</p>
                        <p>Infant Nutrition and Feeding, 미국농무부(USDA) [ 2019.04 ]</p>
                    </div>
            </div>

            <!--네번째-->
            <div class="tab_box tab4">
                <div id="tabbox4" class="tab-inner">
                    <div class="">
                        <div class="">
                            <div class="">
                                <img src="/wp-content/themes/storefront-child/image/edudata/<?php echo $edudata ?>.png">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tabbox4-yoo">
                    <div class="" class="tab-inner">
                        <div class="">
                            <div class="">
                                <img src="/wp-content/themes/storefront-child/image/edudata/<?php echo $edudata ?>.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<input type="hidden" name="babyperiod" value="<?php echo $baby_period ?>">



<script>
    var babypart = $("input[name=babypart]").val();

    if (babypart == "1") {

        $("#top_btn01").hide();
        $("#top_btn02").hide();
        $("#top_btn03").hide();
        $("#top_btn04").hide();
        $("#tabbox1").hide();
        $("#tabbox1-yoo").show();

    } else {
        $("#top_btn05").hide();
        $("#top_btn06").hide();
        $("#top_btn07").hide();
        $("#top_btn08").hide();
        $("#tabbox1").show();
        $("#tabbox1-yoo").hide();

    }
</script>
<script>
    var zlsms = $("input[name=bigyo_height]").val();
    var cpwnddms = $("input[name=bigyo_weight]").val();
    if (zlsms == 0) {
        $("#zlzmek").fadeIn();
        $("#zlwkrek").fadeOut();
    } else {
        $("#zlzmek").fadeOut();
        $("#zlwkrek").fadeIn();
    }
    if (cpwnddms == 0) {
        $("#cpwndwkrek").fadeOut();
        $("#cpwndaksgek").fadeIn();
    } else {
        $("#cpwndwkrek").fadeIn();
        $("#cpwndaksgek").fadeOut();
    }
</script>
<!--성장곡선 jquery -->
<script>
    var inputval = $("#babygender").val();
    if (inputval == '남아') {
        $("#chart_one").fadeIn();
        $("#chart_two").fadeIn();
        $("#chart_one_y").fadeIn();
        $("#chart_two_y").fadeIn();

        $("#chart_thr").hide();
        $("#chart_fow").hide();
        $("#chart_thr_y").hide();
        $("#chart_fow_y").hide();

        $("#girl_h").hide();
        $("#girl_w").hide();
    } else {
        $("#chart_one").hide();
        $("#chart_two").hide();
        $("#chart_one_y").hide();
        $("#chart_two_y").hide();

        $("#chart_thr").fadeIn();
        $("#chart_fow").fadeIn();
        $("#chart_thr_y").fadeIn();
        $("#chart_fow_y").fadeIn();
        $("#man_h").hide();
        $("#man_w").hide();
    }
</script>
<!--탭 juqery-->
<script>
    //$('.tab_menu_btn').on('click', function() {
    //버튼 색 제거,추가
    //    $('.tab_menu_btn').removeClass('on');
    //    $(this).addClass('on')
    //컨텐츠 제거 후 인덱스에 맞는 컨텐츠 노출
    //    var idx = $('.tab_menu_btn').index(this);
    //    $('.tab_box').hide();
    //    $('.tab_box').eq(idx).show();
    //});

    $("#tab_btn01").on("click", function() {
        $(".tab_box").hide();
        $('.tab_menu_btn').removeClass('on');
        $(this).addClass('on')
        $(".tab1").show();
        $(".tab-inner").hide();
        $("#tabbox1").show();
    });

    $("#tab_btn02").on("click", function() {
        $(".tab_box").hide();
        $('.tab_menu_btn').removeClass('on');
        $(this).addClass('on')
        $(".tab2").show();
        $(".tab-inner").hide();
        $(".tab-inner").hide();
        $("#tabbox2").show();
    });

    $("#tab_btn03").on("click", function() {
        $(".tab_box").hide();
        $('.tab_menu_btn').removeClass('on');
        $(this).addClass('on')
        $(".tab3").show();
        $(".tab-inner").hide();
        $("#tabbox3").show();
    });

    $("#tab_btn04").on("click", function() {
        $(".tab_box").hide();
        $('.tab_menu_btn').removeClass('on');
        $(this).addClass('on')
        $(".tab4").show();
        $(".tab-inner").hide();
        $("#tabbox4").show();
    });

    $("#tab_btn05").on("click", function() {
        $(".tab_box").hide();
        $('.tab_menu_btn').removeClass('on');
        $(this).addClass('on')
        $(".tab1").show();
        $(".tab-inner").hide();
        $("#tabbox1-yoo").show();
    });

    $("#tab_btn06").on("click", function() {
        $(".tab_box").hide();
        $('.tab_menu_btn').removeClass('on');
        $(this).addClass('on')
        $(".tab2").show();
        $(".tab-inner").hide();
        $("#tabbox2-yoo").show();
    });

    $("#tab_btn07").on("click", function() {
        $(".tab_box").hide();
        $('.tab_menu_btn').removeClass('on');
        $(this).addClass('on')
        $(".tab3").show();
        $(".tab-inner").hide();
        $("#tabbox3-yoo").show();
    });

    $("#tab_btn08").on("click", function() {
        $(".tab_box").hide();
        $('.tab_menu_btn').removeClass('on');
        $(this).addClass('on')
        $(".tab4").show();
        $(".tab-inner").hide();
        $("#tabbox4-yoo").show();
    });
</script>
<!--빙고판 query + 재료종류가짓수-->
<script>
    var rhrfbrns = 0;
    var eksqorwlffb = 0;
    var cothrns = 0;
    var rhkdlfrns = 0;
    var dbwpvnarns = 0;

    var rla = $("input[name=rla]").val();
    if (rla == 1) {
        $("#rla").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var ekfrrhrl = $("input[name=ekfrrhrl]").val();
    if (ekfrrhrl == 1) {
        $("#ekfrrhrl").addClass("bingo2");
        var eksqorwlffb = eksqorwlffb + 1;
    }
    var rjsaldur = $("input[name=rjsaldur]").val();
    if (rjsaldur == 1) {
        $("#rjsaldur").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var tntn = $("input[name=tntn]").val();
    if (tntn == 1) {
        $("#tntn").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var dusenqn = $("input[name=dusenqn]").val();
    if (dusenqn == 1) {
        $("#dusenqn").addClass("bingo2");
        var eksqorwlffb = eksqorwlffb + 1;
    }
    var ckwh = $("input[name=ckwh]").val();
    if (ckwh == 1) {
        $("#ckwh").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var rkawk = $("input[name=rkawk]").val();
    if (rkawk == 1) {
        $("#rkawk").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var ckqtkf = $("input[name=ckqtkf]").val();
    if (ckqtkf == 1) {
        $("#ckqtkf").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var clwm = $("input[name=clwm]").val();
    if (clwm == 1) {
        $("#clwm").addClass("bingo5");
        var dbwpvnarns = dbwpvnarns + 1;
    }
    var gksdn = $("input[name=gksdn]").val();
    if (gksdn == 1) {
        $("#gksdn").addClass("bingo2");
        var eksqorwlffb = eksqorwlffb + 1;
    }
    var gusal = $("input[name=gusal]").val();
    if (gusal == 1) {
        $("#gusal").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var gmral = $("input[name=gmral]").val();
    if (gmral == 1) {
        $("#gmral").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var tkfrkfn = $("input[name=tkfrkfn]").val();
    if (tkfrkfn == 1) {
        $("#tkfrkfn").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var ckqtkfrkfn = $("input[name=ckqtkfrkfn]").val();
    if (ckqtkfrkfn == 1) {
        $("#ckqtkfrkfn").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var an = $("input[name=an]").val();
    if (an == 1) {
        $("#an").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var didqocn = $("input[name=didqocn]").val();
    if (didqocn == 1) {
        $("#didqocn").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var tlrmacl = $("input[name=tlrmacl]").val();
    if (tlrmacl == 1) {
        $("#tlrmacl").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var rhrnak = $("input[name=rhrnak]").val();
    if (rhrnak == 1) {
        $("#rhrnak").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var doghqkr = $("input[name=doghqkr]").val();
    if (doghqkr == 1) {
        $("#doghqkr").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var qmfhzhffl = $("input[name=qmfhzhffl]").val();
    if (qmfhzhffl == 1) {
        $("#qmfhzhffl").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var dusrms = $("input[name=dusrms]").val();
    if (dusrms == 1) {
        $("#dusrms").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var dhdl = $("input[name=dhdl]").val();
    if (dhdl == 1) {
        $("#dhdl").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var cjdrudco = $("input[name=cjdrudco]").val();
    if (cjdrudco == 1) {
        $("#cjdrudco").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var rnlfl = $("input[name=rnlfl]").val();
    if (rnlfl == 1) {
        $("#rnlfl").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var eksghqkr = $("input[name=eksghqkr]").val();
    if (eksghqkr == 1) {
        $("#eksghqkr").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var qlxkals = $("input[name=qlxkals]").val();
    if (qlxkals == 1) {
        $("#qlxkals").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var qka = $("input[name=qka]").val();
    if (qka == 1) {
        $("#qka").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var tkrhk = $("input[name=tkrhk]").val();
    if (tkrhk == 1) {
        $("#tkrhk").addClass("bingo4");
        var rhkdlfrns = rhkdlfrns + 1;
    }
    var qo = $("input[name=qo]").val();
    if (qo == 1) {
        $("#qo").addClass("bingo4");
        var rhkdlfrns = rhkdlfrns + 1;
    }
    var dkstla = $("input[name=dkstla]").val();
    if (dkstla == 1) {
        $("#dkstla").addClass("bingo2");
        var eksqorwlffb = eksqorwlffb + 1;
    }
    var dhksenzhdrkfn = $("input[name=dhksenzhdrkfn]").val();
    if (dhksenzhdrkfn == 1) {
        $("#dhksenzhdrkfn").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var shfkszhdrkfn = $("input[name=shfkszhdrkfn]").val();
    if (shfkszhdrkfn == 1) {
        $("#shfkszhdrkfn").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var tkfrkfn = $("input[name=tkfrkfn]").val();
    if (tkfrkfn == 1) {
        $("#tkfrkfn").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var rkdskdzhd = $("input[name=rkdskdzhd]").val();
    if (rkdskdzhd == 1) {
        $("#rkdskdzhd").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var qhfl = $("input[name=qhfl]").val();
    if (qhfl == 1) {
        $("#qhfl").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var znlshdk = $("input[name=znlshdk]").val();
    if (znlshdk == 1) {
        $("#znlshdk").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var wjsqns = $("input[name=wjsqns]").val();
    if (wjsqns == 1) {
        $("#wjsqns").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var ekdrms = $("input[name=ekdrms]").val();
    if (ekdrms == 1) {
        $("#ekdrms").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var gusalrkfn = $("input[name=gusalrkfn]").val();
    if (gusalrkfn == 1) {
        $("#gusalrkfn").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var qlxm = $("input[name=qlxm]").val();
    if (qlxm == 1) {
        $("#qlxm").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var alfrkfn = $("input[name=alfrkfn]").val();
    if (alfrkfn == 1) {
        $("#alfrkfn").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var vkvmflzk = $("input[name=vkvmflzk]").val();
    if (vkvmflzk == 1) {
        $("#vkvmflzk").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var rjadmzhdrkfn = $("input[name=rjadmzhdrkfn]").val();
    if (rjadmzhdrkfn == 1) {
        $("#rjadmzhdrkfn").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var gkscjs = $("input[name=gkscjs]").val();
    if (gkscjs == 1) {
        $("#gkscjs").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var qksksk = $("input[name=qksksk]").val();
    if (qksksk == 1) {
        $("#qksksk").addClass("bingo4");
        var rhkdlfrns = rhkdlfrns + 1;
    }
    var vyrh = $("input[name=vyrh]").val();
    if (vyrh == 1) {
        $("#vyrh").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var zpdlf = $("input[name=zpdlf]").val();
    if (zpdlf == 1) {
        $("#zpdlf").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var didvk = $("input[name=didvk]").val();
    if (didvk == 1) {
        $("#didvk").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var ehowlrhrl = $("input[name=ehowlrhrl]").val();
    if (ehowlrhrl == 1) {
        $("#ehowlrhrl").addClass("bingo2");
        var eksqorwlffb = eksqorwlffb + 1;
    }
    var rmseo = $("input[name=rmseo]").val();
    if (rmseo == 1) {
        $("#rmseo").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var quddkflzhd = $("input[name=quddkflzhd]").val();
    if (quddkflzhd == 1) {
        $("#quddkflzhd").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var qmffnqpfl = $("input[name=qmffnqpfl]").val();
    if (qmffnqpfl == 1) {
        $("#qmffnqpfl").addClass("bingo4");
        var rhkdlfrns = rhkdlfrns + 1;
    }
    var dkdnr = $("input[name=dkdnr]").val();
    if (dkdnr == 1) {
        $("#dkdnr").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var didthddl = $("input[name=didthddl]").val();
    if (didthddl == 1) {
        $("#didthddl").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var fpsxlfzhd = $("input[name=fpsxlfzhd]").val();
    if (fpsxlfzhd == 1) {
        $("#fpsxlfzhd").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var fhapdls = $("input[name=fhapdls]").val();
    if (fhapdls == 1) {
        $("#fhapdls").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var smxkfl = $("input[name=smxkfl]").val();
    if (smxkfl == 1) {
        $("#smxkfl").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var qocn = $("input[name=qocn]").val();
    if (qocn == 1) {
        $("#qocn").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var tothddl = $("input[name=tothddl]").val();
    if (tothddl == 1) {
        $("#tothddl").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var ehfskanf = $("input[name=ehfskanf]").val();
    if (ehfskanf == 1) {
        $("#ehfskanf").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var rkwl = $("input[name=rkwl]").val();
    if (rkwl == 1) {
        $("#rkwl").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var dhrtntn = $("input[name=dhrtntn]").val();
    if (dhrtntn == 1) {
        $("#dhrtntn").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var qhaehd = $("input[name=qhaehd]").val();
    if (qhaehd == 1) {
        $("#qhaehd").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var zhffkql = $("input[name=zhffkql]").val();
    if (zhffkql == 1) {
        $("#zhffkql").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var rotdlv = $("input[name=rotdlv]").val();
    if (rotdlv == 1) {
        $("#rotdlv").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var dufan = $("input[name=dufan]").val();
    if (dufan == 1) {
        $("#dufan").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var qkddnfxhakxh = $("input[name=qkddnfxhakxh]").val();
    if (qkddnfxhakxh == 1) {
        $("#qkddnfxhakxh").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var rjsvkfo = $("input[name=rjsvkfo]").val();
    if (rjsvkfo == 1) {
        $("#rjsvkfo").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var cnlskanf = $("input[name=cnlskanf]").val();
    if (cnlskanf == 1) {
        $("#cnlskanf").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var ckaskanf = $("input[name=ckaskanf]").val();
    if (ckaskanf == 1) {
        $("#ckaskanf").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var wjrco = $("input[name=wjrco]").val();
    if (wjrco == 1) {
        $("#wjrco").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var qncn = $("input[name=qncn]").val();
    if (qncn == 1) {
        $("#qncn").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var rjsxht = $("input[name=rjsxht]").val();
    if (rjsxht == 1) {
        $("#rjsxht").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var dndjd = $("input[name=dndjd]").val();
    if (dndjd == 1) {
        $("#dndjd").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var eocn = $("input[name=eocn]").val();
    if (eocn == 1) {
        $("#eocn").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var dkahsem = $("input[name=dkahsem]").val();
    if (dkahsem == 1) {
        $("#dkahsem").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var wkt = $("input[name=wkt]").val();
    if (wkt == 1) {
        $("#wkt").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var rjsahrdl = $("input[name=rjsahrdl]").val();
    if (rjsahrdl == 1) {
        $("#rjsahrdl").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var whrvk = $("input[name=whrvk]").val();
    if (whrvk == 1) {
        $("#whrvk").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var tpqkfskanf = $("input[name=tpqkfskanf]").val();
    if (tpqkfskanf == 1) {
        $("#tpqkfskanf").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var fnrhffk = $("input[name=fnrhffk]").val();
    if (fnrhffk == 1) {
        $("#fnrhffk").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var vlakd = $("input[name=vlakd]").val();
    if (vlakd == 1) {
        $("#vlakd").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var aksmfwhd = $("input[name=aksmfwhd]").val();
    if (aksmfwhd == 1) {
        $("#aksmfwhd").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var voddl = $("input[name=voddl]").val();
    if (voddl == 1) {
        $("#voddl").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var ghdal = $("input[name=ghdal]").val();
    if (ghdal == 1) {
        $("#ghdal").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var emfrorkfn = $("input[name=emfrorkfn]").val();
    if (emfrorkfn == 1) {
        $("#emfrorkfn").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var rjsrhtkfl = $("input[name=rjsrhtkfl]").val();
    if (rjsrhtkfl == 1) {
        $("#rjsrhtkfl").addClass("bingo3");
        var cothrns = cothrns + 1;
    }
    var ckaro = $("input[name=ckaro]").val();
    if (ckaro == 1) {
        $("#ckaro").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var ghrn = $("input[name=ghrn]").val();
    if (ghrn == 1) {
        $("#ghrn").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var rlwkd = $("input[name=rlwkd]").val();
    if (rlwkd == 1) {
        $("#rlwkd").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var vkxrkfn = $("input[name=vkxrkfn]").val();
    if (vkxrkfn == 1) {
        $("#vkxrkfn").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }
    var xpvmrkfn = $("input[name=xpvmrkfn]").val();
    if (xpvmrkfn == 1) {
        $("#xpvmrkfn").addClass("bingo1");
        var rhrfbrns = rhrfbrns + 1;
    }

    if (rla == 2) {
        $("#rla").addClass("old_bingo");
    }
    if (ekfrrhrl == 2) {
        $("#ekfrrhrl").addClass("old_bingo");
    }
    if (rjsaldur == 2) {
        $("#rjsaldur").addClass("old_bingo");
    }
    if (tntn == 2) {
        $("#tntn").addClass("old_bingo");
    }
    if (dusenqn == 2) {
        $("#dusenqn").addClass("old_bingo");
    }
    if (ckwh == 2) {
        $("#ckwh").addClass("old_bingo");
    }
    if (rkawk == 2) {
        $("#rkawk").addClass("old_bingo");
    }
    if (ckqtkf == 2) {
        $("#ckqtkf").addClass("old_bingo");
    }
    if (clwm == 2) {
        $("#clwm").addClass("old_bingo");
    }
    if (gksdn == 2) {
        $("#gksdn").addClass("old_bingo");
    }
    if (gusal == 2) {
        $("#gusal").addClass("old_bingo");
    }
    if (gmral == 2) {
        $("#gmral").addClass("old_bingo");
    }
    if (tkfrkfn == 2) {
        $("#tkfrkfn").addClass("old_bingo");
    }
    if (ckqtkfrkfn == 2) {
        $("#ckqtkfrkfn").addClass("old_bingo");
    }
    if (an == 2) {
        $("#an").addClass("old_bingo");
    }
    if (didqocn == 2) {
        $("#didqocn").addClass("old_bingo");
    }
    if (tlrmacl == 2) {
        $("#tlrmacl").addClass("old_bingo");
    }
    if (rhrnak == 2) {
        $("#rhrnak").addClass("old_bingo");
    }
    if (doghqkr == 2) {
        $("#doghqkr").addClass("old_bingo");
    }
    if (qmfhzhffl == 2) {
        $("#qmfhzhffl").addClass("old_bingo");
    }
    if (dusrms == 2) {
        $("#dusrms").addClass("old_bingo");
    }
    if (dhdl == 2) {
        $("#dhdl").addClass("old_bingo");
    }
    if (cjdrudco == 2) {
        $("#cjdrudco").addClass("old_bingo");
    }
    if (rnlfl == 2) {
        $("#rnlfl").addClass("old_bingo");
    }
    if (eksghqkr == 2) {
        $("#eksghqkr").addClass("old_bingo");
    }
    if (qlxkals == 2) {
        $("#qlxkals").addClass("old_bingo");
    }
    if (qka == 2) {
        $("#qka").addClass("old_bingo");
    }
    if (tkrhk == 2) {
        $("#tkrhk").addClass("old_bingo");
    }
    if (qo == 2) {
        $("#qo").addClass("old_bingo");
    }
    if (dkstla == 2) {
        $("#dkstla").addClass("old_bingo");
    }
    if (dhksenzhdrkfn == 2) {
        $("#dhksenzhdrkfn").addClass("old_bingo");
    }
    if (shfkszhdrkfn == 2) {
        $("#shfkszhdrkfn").addClass("old_bingo");
    }
    if (tkfrkfn == 2) {
        $("#tkfrkfn").addClass("old_bingo");
    }
    if (rkdskdzhd == 2) {
        $("#rkdskdzhd").addClass("old_bingo");
    }
    if (qhfl == 2) {
        $("#qhfl").addClass("old_bingo");
    }
    if (znlshdk == 2) {
        $("#znlshdk").addClass("old_bingo");
    }
    if (wjsqns == 2) {
        $("#wjsqns").addClass("old_bingo");
    }
    if (ekdrms == 2) {
        $("#ekdrms").addClass("old_bingo");
    }
    if (gusalrkfn == 2) {
        $("#gusalrkfn").addClass("old_bingo");
    }
    if (qlxm == 2) {
        $("#qlxm").addClass("old_bingo");
    }
    if (alfrkfn == 2) {
        $("#alfrkfn").addClass("old_bingo");
    }
    if (vkvmflzk == 2) {
        $("#vkvmflzk").addClass("old_bingo");
    }
    if (rjadmzhdrkfn == 2) {
        $("#rjadmzhdrkfn").addClass("old_bingo");
    }
    if (gkscjs == 2) {
        $("#gkscjs").addClass("old_bingo");
    }
    if (qksksk == 2) {
        $("#qksksk").addClass("old_bingo");
    }
    if (vyrh == 2) {
        $("#vyrh").addClass("old_bingo");
    }
    if (zpdlf == 2) {
        $("#zpdlf").addClass("old_bingo");
    }
    if (didvk == 2) {
        $("#didvk").addClass("old_bingo");
    }
    if (ehowlrhrl == 2) {
        $("#ehowlrhrl").addClass("old_bingo");
    }
    if (rmseo == 2) {
        $("#rmseo").addClass("old_bingo");
    }
    if (quddkflzhd == 2) {
        $("#quddkflzhd").addClass("old_bingo");
    }
    if (qmffnqpfl == 2) {
        $("#qmffnqpfl").addClass("old_bingo");
    }
    if (dkdnr == 2) {
        $("#dkdnr").addClass("old_bingo");
    }
    if (didthddl == 2) {
        $("#didthddl").addClass("old_bingo");
    }
    if (fpsxlfzhd == 2) {
        $("#fpsxlfzhd").addClass("old_bingo");
    }
    if (fhapdls == 2) {
        $("#fhapdls").addClass("old_bingo");
    }
    if (smxkfl == 2) {
        $("#smxkfl").addClass("old_bingo");
    }
    if (qocn == 2) {
        $("#qocn").addClass("old_bingo");
    }
    if (tothddl == 2) {
        $("#tothddl").addClass("old_bingo");
    }
    if (ehfskanf == 2) {
        $("#ehfskanf").addClass("old_bingo");
    }
    if (rkwl == 2) {
        $("#rkwl").addClass("old_bingo");
    }
    if (dhrtntn == 2) {
        $("#dhrtntn").addClass("old_bingo");
    }
    if (qhaehd == 2) {
        $("#qhaehd").addClass("old_bingo");
    }
    if (zhffkql == 2) {
        $("#zhffkql").addClass("old_bingo");
    }
    if (rotdlv == 2) {
        $("#rotdlv").addClass("old_bingo");
    }
    if (dufan == 2) {
        $("#dufan").addClass("old_bingo");
    }
    if (qkddnfxhakxh == 2) {
        $("#qkddnfxhakxh").addClass("old_bingo");
    }
    if (rjsvkfo == 2) {
        $("#rjsvkfo").addClass("old_bingo");
    }
    if (cnlskanf == 2) {
        $("#cnlskanf").addClass("old_bingo");
    }
    if (ckaskanf == 2) {
        $("#ckaskanf").addClass("old_bingo");
    }
    if (wjrco == 2) {
        $("#wjrco").addClass("old_bingo");
    }
    if (qncn == 2) {
        $("#qncn").addClass("old_bingo");
    }
    if (rjsxht == 2) {
        $("#rjsxht").addClass("old_bingo");
    }
    if (dndjd == 2) {
        $("#dndjd").addClass("old_bingo");
    }
    if (eocn == 2) {
        $("#eocn").addClass("old_bingo");
    }
    if (dkahsem == 2) {
        $("#dkahsem").addClass("old_bingo");
    }
    if (wkt == 2) {
        $("#wkt").addClass("old_bingo");
    }
    if (rjsahrdl == 2) {
        $("#rjsahrdl").addClass("old_bingo");
    }
    if (whrvk == 2) {
        $("#whrvk").addClass("old_bingo");
    }
    if (tpqkfskanf == 2) {
        $("#tpqkfskanf").addClass("old_bingo");
    }
    if (fnrhffk == 2) {
        $("#fnrhffk").addClass("old_bingo");
    }
    if (vlakd == 2) {
        $("#vlakd").addClass("old_bingo");
    }
    if (aksmfwhd == 2) {
        $("#aksmfwhd").addClass("old_bingo");
    }
    if (voddl == 2) {
        $("#voddl").addClass("old_bingo");
    }
    if (ghdal == 2) {
        $("#ghdal").addClass("old_bingo");
    }
    if (emfrorkfn == 2) {
        $("#emfrorkfn").addClass("old_bingo");
    }
    if (rjsrhtkfl == 2) {
        $("#rjsrhtkfl").addClass("old_bingo");
    }
    if (ckaro == 2) {
        $("#ckaro").addClass("old_bingo");
    }
    if (ghrn == 2) {
        $("#ghrn").addClass("old_bingo");
    }
    if (rlwkd == 2) {
        $("#rlwkd").addClass("old_bingo");
    }
    if (vkxrkfn == 2) {
        $("#vkxrkfn").addClass("old_bingo");
    }
    if (xpvmrkfn == 2) {
        $("#xpvmrkfn").addClass("old_bingo");
    }

    var allsum = rhrfbrns + eksqorwlffb + cothrns + rhkdlfrns + dbwpvnarns;
</script>


<script>
    $("#top_btn01").on("click", function() {
        $(".tab_menu_container").addClass("btn01");
        $(".tab_menu_btn").removeClass("on");
        $("#top_btn01").addClass("on");
        $(".tab_menu_container").removeClass("btn02");
        $(".tab_menu_container").removeClass("btn03");
        $(".tab_menu_container").removeClass("btn04");
    })
    $("#top_btn02").on("click", function() {
        $(".tab_menu_container").addClass("btn02");
        $(".tab_menu_btn").removeClass("on");
        $("#top_btn02").addClass("on");
        $(".tab_menu_container").removeClass("btn01");
        $(".tab_menu_container").removeClass("btn03");
        $(".tab_menu_container").removeClass("btn04");
    })
    $("#top_btn03").on("click", function() {
        $(".tab_menu_container").addClass("btn03");
        $(".tab_menu_btn").removeClass("on");
        $("#top_btn03").addClass("on");
        $(".tab_menu_container").removeClass("btn01");
        $(".tab_menu_container").removeClass("btn02");
        $(".tab_menu_container").removeClass("btn04");
    })
    $("#top_btn04").on("click", function() {
        $(".tab_menu_container").addClass("btn04");
        $(".tab_menu_btn").removeClass("on");
        $("#top_btn04").addClass("on");
        $(".tab_menu_container").removeClass("btn01");
        $(".tab_menu_container").removeClass("btn02");
        $(".tab_menu_container").removeClass("btn03");
    })
    // 유아식

    $("#top_btn05").on("click", function() {
        $(".tab_menu_container").addClass("btn01");
        $(".tab_menu_btn").removeClass("on");
        $("#top_btn05").addClass("on");
        $(".tab_menu_container").removeClass("btn06");
        $(".tab_menu_container").removeClass("btn07");
        $(".tab_menu_container").removeClass("btn08");
    })
    $("#top_btn06").on("click", function() {
        $(".tab_menu_container").addClass("btn02");
        $(".tab_menu_btn").removeClass("on");
        $("#top_btn06").addClass("on");
        $(".tab_menu_container").removeClass("btn05");
        $(".tab_menu_container").removeClass("btn07");
        $(".tab_menu_container").removeClass("btn08");
    })
    $("#top_btn07").on("click", function() {
        $(".tab_menu_container").addClass("btn03");
        $(".tab_menu_btn").removeClass("on");
        $("#top_btn07").addClass("on");
        $(".tab_menu_container").removeClass("btn05");
        $(".tab_menu_container").removeClass("btn06");
        $(".tab_menu_container").removeClass("btn08");
    })
    $("#top_btn08").on("click", function() {
        $(".tab_menu_container").addClass("btn04");
        $(".tab_menu_btn").removeClass("on");
        $("#top_btn08").addClass("on");
        $(".tab_menu_container").removeClass("btn05");
        $(".tab_menu_container").removeClass("btn06");
        $(".tab_menu_container").removeClass("btn07");
    })
</script>
<script>
    var pop_btn = $(".btn-check");
    var btn_img = $(".popup-sub img");
    var inputa = $(".report-pup");
    var popupa = $(".popup-page_a")
    // input checked 확인 및 내용 제거
    inputa.click(function() {
        popupa.css({
            "position": "absolute",
            "top": "0%"
        });
        popupa.css({
            "opacity": "1"
        });

    });

    // 보고서 팝업
    btn_img.click(function() {
        $(".popup-page_a").css({
            "position": "absolute",
            "top": "115%"
        });
        $(".popup-page_a").css({
            "opacity": "0"
        });
        $(".btn-check").removeClass("on")
    });
</script>
<script>
    $("#top_btn01").on("click", function() {
        $(".tab_box").removeClass("on");
        $(".tab1").addClass("on");
    });
    $("#top_btn01").on("click", function() {
        $(".tab_box").removeClass("on");
        $(".tab1").addClass("on");
    });
    $("#top_btn01").on("click", function() {
        $(".tab_box").removeClass("on");
        $(".tab1").addClass("on");
    });
    $("#top_btn01").on("click", function() {
        $(".tab_box").removeClass("on");
        $(".tab1").addClass("on");
    });
    $("#top_btn01").on("click", function() {
        $(".tab_box").removeClass("on");
        $(".tab1").addClass("on");
    });
    $("#top_btn01").on("click", function() {
        $(".tab_box").removeClass("on");
        $(".tab1").addClass("on");
    });
    $("#top_btn01").on("click", function() {
        $(".tab_box").removeClass("on");
        $(".tab1").addClass("on");
    });

    $("#top_btn01").on("click", function() {
        $(".tab_box").removeClass("on");
        $(".tab1").addClass("on");
    });
</script>

<?php
mysqli_close($mysqli);
?>
<?php
do_action('storefront_sidebar');
get_footer();
