<?php
/**
 * Template Name: graphtest
 */
get_header(); ?>
<?php
//mysqli 연동
$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
if($mysqli->connect_errno) die('Connect failed: '.$mysqli->connect_error);
if(!$mysqli->set_charset('utf8')) die('Error loading character set utf8: '.$mysqli->error);
?>
<?php
$limit_notice = 0;
$auth_no = 0;
$auth_query = "SELECT userid FROM userbase WHERE membership = '프리미엄' OR opt LIKE '%케어%'";
$auth_result = mysqli_query($mysqli,$auth_query);
$auth_array = array();
while( $auth_row = mysqli_fetch_array($auth_result)){
    $auth_array[] = $auth_row[userid];
}
$limit_query = "SELECT userid FROM userbase WHERE limitday >= NOW()";
$limit_result = mysqli_query($mysqli, $limit_query);
$limit_array = array();
while ( $limit_row = mysqli_fetch_array($limit_result)){
    $limit_array[] = $limit_row[userid];
}if (is_user_logged_in()) {
    $loginid = get_user_meta( $current_user -> ID, 'username', true );
    if ( in_array("$loginid", $auth_array )) {
    } elseif(in_array("$loginid", $limit_array)) {
        $limit_notice = 1;
    } else {
        $limit_notice = 2;
    }
} else {
    $auth_no = 1;
    mysqli_close($mysqli);
}

$snack_auth_query = "SELECT userid FROM userbase WHERE opt LIKE '%간식%'";
$snack_auth_result = mysqli_query($mysqli,$snack_auth_query);
$snack_auth_array = array();
while( $snack_auth_row = mysqli_fetch_array($snack_auth_result)){
    $snack_auth_array[] = $snack_auth_row[userid];
}

if (in_array("$loginid", $snack_auth_array)){
    $snack_auth_code = 1;
} else {
    $snack_auth_code = 2;
}

?>



    <!--유저데이터-->
<?php
//조건전체출력
$user_query = "SELECT * FROM research WHERE userid = '$loginid' ORDER BY date DESC LIMIT 1";
$user_query_result = mysqli_query($mysqli,$user_query);
$userrow = mysqli_fetch_array($user_query_result);
$user_date = $userrow[date];
$user_username = $userrow[username];
$user_babyname = $userrow[babyname];
$user_gender = $userrow[gender];
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
$dday_date = floor($dday_date)/86400;
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
}$j = 0;
while ($j < 21) {
    $weight_query = "SELECT weight FROM research WHERE userid = '$loginid' AND monthly = $j";
    $weight_result = mysqli_query($mysqli, $weight_query);
    $weightrow = mysqli_fetch_array($weight_result);
    $weight_graph[$j] = $weightrow[weight];
    $j++;
}?>
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
$dopyo_1_result = mysqli_query($mysqli,$dopyo_1_query);
$dopyo_1_row = mysqli_fetch_array($dopyo_1_result);
$bigyo_height = $dopyo_1_row[$center_value];
$dopyo_2_query = "SELECT * FROM dopyo WHERE gender = '$user_gender' AND monthly = '$user_monthly' AND category = 'weight'";
$dopyo_2_result = mysqli_query($mysqli,$dopyo_2_query);
$dopyo_2_row = mysqli_fetch_array($dopyo_2_result);
$bigyo_weight = $dopyo_2_row[$center_value];
if ( $weight_graph[$user_monthly] <= $bigyo_weight) {
    $bigyo_after_weight = 1;
} else {
    $bigyo_after_weight = 0;
}if ( $height_graph[$user_monthly] <= $bigyo_height) {
    $bigyo_after_height = 1;
} else {
    $bigyo_after_height = 0;
}?>
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
$loginids = "$loginid"."-1";
$loginidss = "$loginid"."-2";
$loginidsss = "$loginid"."-3";
$loginidssss = "$loginid"."-4";
$loginidsssss = "$loginid"."-5";
$loginidssssss = "$loginid"."-6";
$d = date("Y-m-d");
$prev_month = strtotime($d."-1 month");
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
if ( $daylog == $aa) {
    $day_cont = "MON";
} else if ( $daylog == $bb ) {
    $day_cont = "TUE";
} else if ( $daylog == $cc ) {
    $day_cont = "WED";
} else if ( $daylog == $dd ) {
    $day_cont = "THU";
} else {
    $day_cont = "FRI";
}

$start_date = date("Y-m-d");
$rotationday = date("Y-m-d",strtotime($start_date.$day_cont));
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
while($row = mysqli_fetch_array($result)){
    $menunama = $row[$lasts_day[0]];
    $menunamb = $row[$lasts_day[1]];
    $menunamc = $row[$lasts_day[2]];
    $menunamd = $row[$lasts_day[3]];
}$todayy = "SELECT * FROM shicktest WHERE userid = '$loginidss'";
$results = mysqli_query($mysqli, $todayy);
while($row = mysqli_fetch_array($results)){
    $menunamaa = $row[$lasts_day[0]];
    $menunambb = $row[$lasts_day[1]];
    $menunamcc = $row[$lasts_day[2]];
    $menunamdd = $row[$lasts_day[3]];
    //echo "<tr><td>",$row[$abouttime],"</td></tr>" ;
}$todayyy = "SELECT * FROM shicktest WHERE userid = '$loginidsss'";
$resultss = mysqli_query($mysqli, $todayyy);
while($row = mysqli_fetch_array($resultss)){
    $menunamaaa = $row[$lasts_day[0]];
    $menunambbb = $row[$lasts_day[1]];
    $menunamccc = $row[$lasts_day[2]];
    $menunamddd = $row[$lasts_day[3]];
    //echo "<tr><td>",$row[$abouttime],"</td></tr>" ;
}$todayyyy = "SELECT * FROM shicktest WHERE userid = '$loginidssss'";
$resultsss = mysqli_query($mysqli, $todayyyy);
while($row = mysqli_fetch_array($resultsss)){
    $menunamaaaa = $row[$lasts_day[0]];
    $menunambbbb = $row[$lasts_day[1]];
    $menunamcccc = $row[$lasts_day[2]];
    $menunamdddd = $row[$lasts_day[3]];
    //echo "<tr><td>",$row[$abouttime],"</td></tr>" ;
}$todayyyyy = "SELECT * FROM shicktest WHERE userid = '$loginidsssss'";
$resultssss = mysqli_query($mysqli, $todayyyyy);
while($row = mysqli_fetch_array($resultssss)){
    $menunamaaaaa = $row[$lasts_day[0]];
    $menunambbbbb = $row[$lasts_day[1]];
    $menunamccccc = $row[$lasts_day[2]];
    $menunamddddd = $row[$lasts_day[3]];
    //echo "<tr><td>",$row[$abouttime],"</td></tr>" ;
}$todayyyyyy = "SELECT * FROM shicktest WHERE userid = '$loginidssssss'";
$resultsssss = mysqli_query($mysqli, $todayyyyyy);
while($row = mysqli_fetch_array($resultsssss)){
    $menunamaaaaaa = $row[$lasts_day[0]];
    $menunambbbbbb = $row[$lasts_day[1]];
    $menunamcccccc = $row[$lasts_day[2]];
    $menunamdddddd = $row[$lasts_day[3]];
    //echo "<tr><td>",$row[$abouttime],"</td></tr>" ;
}//영양소계산띠

//스낵메뉴 등
for($number=1; $number <= 4; $number=$number+1) {
    $snackid = $loginid."-".$number;
    $snack_table_query = "SELECT * FROM snacktable WHERE userid = '$snackid'";
    $snack_table_result = mysqli_query($mysqli, $snack_table_query);
    while($snack_table_row = mysqli_fetch_array($snack_table_result)){
        $snack_table_menu[1][$number] = $snack_table_row[$lasts_day[0]];
        $snack_table_menu[2][$number] = $snack_table_row[$lasts_day[1]];
        $snack_table_menu[3][$number] = $snack_table_row[$lasts_day[2]];
        $snack_table_menu[4][$number] = $snack_table_row[$lasts_day[3]];
    }
}

//스낵메뉴 영양소
for($number=1; $number <= 4; $number=$number+1){
    for($inser_num=1; $inser_num <= 4; $inser_num=$inser_num+1){
        $spec_menu = $snack_table_menu[$inser_num][$number];
        $snack_nutr_spec = "SELECT * FROM menutest WHERE menu = '$spec_menu'";
        $snack_nutr_result = mysqli_query($mysqli, $snack_nutr_spec);
        while($snack_nutr_row = mysqli_fetch_array($snack_nutr_result)) {
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
while ( $nut_row = mysqli_fetch_array($nut_result) ){
    $week1cal1 = $nut_row[calorie];
    $week1pro1 = $nut_row[protein];
    $week1pat1 = $nut_row[fat];
    $week1car1 = $nut_row[carbohydrate];
    $need1cal1 = $nut_row[needcalorie];
    $need1pro1 = $nut_row[needprotein];
    $need1pat1 = $nut_row[needfat];
    $need1car1 = $nut_row[needcarbohydrate];
}$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamb'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ( $nut_row = mysqli_fetch_array($nut_result) ){
    $week1cal2 = $nut_row[calorie];
    $week1pro2 = $nut_row[protein];
    $week1pat2 = $nut_row[fat];
    $week1car2 = $nut_row[carbohydrate];
    $need1cal2 = $nut_row[needcalorie];
    $need1pro2 = $nut_row[needprotein];
    $need1pat2 = $nut_row[needfat];
    $need1car2 = $nut_row[needcarbohydrate];
}$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamc'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ( $nut_row = mysqli_fetch_array($nut_result) ){
    $week1cal3 = $nut_row[calorie];
    $week1pro3 = $nut_row[protein];
    $week1pat3 = $nut_row[fat];
    $week1car3 = $nut_row[carbohydrate];
    $need1cal3 = $nut_row[needcalorie];
    $need1pro3 = $nut_row[needprotein];
    $need1pat3 = $nut_row[needfat];
    $need1car3 = $nut_row[needcarbohydrate];
}$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamd'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ( $nut_row = mysqli_fetch_array($nut_result) ){
    $week1cal4 = $nut_row[calorie];
    $week1pro4 = $nut_row[protein];
    $week1pat4 = $nut_row[fat];
    $week1car4 = $nut_row[carbohydrate];
    $need1cal4 = $nut_row[needcalorie];
    $need1pro4 = $nut_row[needprotein];
    $need1pat4 = $nut_row[needfat];
    $need1car4 = $nut_row[needcarbohydrate];
}//2주차
$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamaa'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ( $nut_row = mysqli_fetch_array($nut_result) ){
    $week2cal1 = $nut_row[calorie];
    $week2pro1 = $nut_row[protein];
    $week2pat1 = $nut_row[fat];
    $week2car1 = $nut_row[carbohydrate];
    $need2cal1 = $nut_row[needcalorie];
    $need2pro1 = $nut_row[needprotein];
    $need2pat1 = $nut_row[needfat];
    $need2car1 = $nut_row[needcarbohydrate];
}$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunambb'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ( $nut_row = mysqli_fetch_array($nut_result) ){
    $week2cal2 = $nut_row[calorie];
    $week2pro2 = $nut_row[protein];
    $week2pat2 = $nut_row[fat];
    $week2car2 = $nut_row[carbohydrate];
    $need2cal2 = $nut_row[needcalorie];
    $need2pro2 = $nut_row[needprotein];
    $need2pat2 = $nut_row[needfat];
    $need2car2 = $nut_row[needcarbohydrate];
}$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamcc'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ( $nut_row = mysqli_fetch_array($nut_result) ){
    $week2cal3 = $nut_row[calorie];
    $week2pro3 = $nut_row[protein];
    $week2pat3 = $nut_row[fat];
    $week2car3 = $nut_row[carbohydrate];
    $need2cal3 = $nut_row[needcalorie];
    $need2pro3 = $nut_row[needprotein];
    $need2pat3 = $nut_row[needfat];
    $need2car3 = $nut_row[needcarbohydrate];
}$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamdd'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ( $nut_row = mysqli_fetch_array($nut_result) ){
    $week2cal4 = $nut_row[calorie];
    $week2pro4 = $nut_row[protein];
    $week2pat4 = $nut_row[fat];
    $week2car4 = $nut_row[carbohydrate];
    $need2cal4 = $nut_row[needcalorie];
    $need2pro4 = $nut_row[needprotein];
    $need2pat4 = $nut_row[needfat];
    $need2car4 = $nut_row[needcarbohydrate];
}//3주차
$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamaaa'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ( $nut_row = mysqli_fetch_array($nut_result) ){
    $week3cal1 = $nut_row[calorie];
    $week3pro1 = $nut_row[protein];
    $week3pat1 = $nut_row[fat];
    $week3car1 = $nut_row[carbohydrate];
    $need3cal1 = $nut_row[needcalorie];
    $need3pro1 = $nut_row[needprotein];
    $need3pat1 = $nut_row[needfat];
    $need3car1 = $nut_row[needcarbohydrate];
}$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunambbb'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ( $nut_row = mysqli_fetch_array($nut_result) ){
    $week3cal2 = $nut_row[calorie];
    $week3pro2 = $nut_row[protein];
    $week3pat2 = $nut_row[fat];
    $week3car2 = $nut_row[carbohydrate];
    $need3cal2 = $nut_row[needcalorie];
    $need3pro2 = $nut_row[needprotein];
    $need3pat2 = $nut_row[needfat];
    $need3car2 = $nut_row[needcarbohydrate];
}$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamccc'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ( $nut_row = mysqli_fetch_array($nut_result) ){
    $week3cal3 = $nut_row[calorie];
    $week3pro3 = $nut_row[protein];
    $week3pat3 = $nut_row[fat];
    $week3car3 = $nut_row[carbohydrate];
    $need3cal3 = $nut_row[needcalorie];
    $need3pro3 = $nut_row[needprotein];
    $need3pat3 = $nut_row[needfat];
    $need3car3 = $nut_row[needcarbohydrate];
}$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamddd'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ( $nut_row = mysqli_fetch_array($nut_result) ){
    $week3cal4 = $nut_row[calorie];
    $week3pro4 = $nut_row[protein];
    $week3pat4 = $nut_row[fat];
    $week3car4 = $nut_row[carbohydrate];
    $need3cal4 = $nut_row[needcalorie];
    $need3pro4 = $nut_row[needprotein];
    $need3pat4 = $nut_row[needfat];
    $need3car4 = $nut_row[needcarbohydrate];
}//4주차
$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamaaaa'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ( $nut_row = mysqli_fetch_array($nut_result) ){
    $week4cal1 = $nut_row[calorie];
    $week4pro1 = $nut_row[protein];
    $week4pat1 = $nut_row[fat];
    $week4car1 = $nut_row[carbohydrate];
    $need4cal1 = $nut_row[needcalorie];
    $need4pro1 = $nut_row[needprotein];
    $need4pat1 = $nut_row[needfat];
    $need4car1 = $nut_row[needcarbohydrate];
}$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunambbbb'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ( $nut_row = mysqli_fetch_array($nut_result) ){
    $week4cal2 = $nut_row[calorie];
    $week4pro2 = $nut_row[protein];
    $week4pat2 = $nut_row[fat];
    $week4car2 = $nut_row[carbohydrate];
    $need4cal2 = $nut_row[needcalorie];
    $need4pro2 = $nut_row[needprotein];
    $need4pat2 = $nut_row[needfat];
    $need4car2 = $nut_row[needcarbohydrate];
}$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamcccc'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ( $nut_row = mysqli_fetch_array($nut_result) ){
    $week4cal3 = $nut_row[calorie];
    $week4pro3 = $nut_row[protein];
    $week4pat3 = $nut_row[fat];
    $week4car3 = $nut_row[carbohydrate];
    $need4cal3 = $nut_row[needcalorie];
    $need4pro3 = $nut_row[needprotein];
    $need4pat3 = $nut_row[needfat];
    $need4car3 = $nut_row[needcarbohydrate];
}$nut_spec = "SELECT * FROM menutest WHERE menu = '$menunamdddd'";
$nut_result = mysqli_query($mysqli, $nut_spec);
while ( $nut_row = mysqli_fetch_array($nut_result) ){
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
$menudev_query = "SELECT period FROM shicktest WHERE userid = '$loginids'";
$menudev_result = mysqli_query($mysqli, $menudev_query);
$menudev_row = mysqli_fetch_array($menudev_result);
$baby_period = $menudev_row[period];
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
$mealschedule_query = "SELECT * FROM mealschedule WHERE period = '$baby_period'";
$mealschedule_result = mysqli_query($mysqli, $mealschedule_query);
$mealschedule_row = mysqli_fetch_array($mealschedule_result);
$mealschedule_amount = $mealschedule_row[amount];
$mealschedule_oftime = $mealschedule_row[oftime];
$mealschedule_atime = $mealschedule_row[attime];
$mealschedule_snack = $mealschedule_row[snack];
$mealschedule_nursing = $mealschedule_row[nursing];
$mealschedule_noftime = $mealschedule_row[noftime];
$mealschedule_natime = $mealschedule_row[natime];
$mealschedule_forms = $mealschedule_row[forms];
$mealschedule_viscosity = $mealschedule_row[viscosity];
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
while ($dounut_row = mysqli_fetch_array($dounut_result)){
    $i = 0;
    $q = date("Y-m-d",strtotime($lasts_day[3]));
    $p = date("Y-m-d",strtotime($lasts_day[0]));
    while (strtotime($q) <= strtotime($p)){
        $dou_menu_query = "SELECT * FROM menutest WHERE menu = '$dounut_row[$q]'";
        $dou_menu_result = mysqli_query($mysqli, $dou_menu_query);
        $dou_menu_row = mysqli_fetch_array($dou_menu_result);
        $dou_obj[$i] = $dou_menu_row;
        if(in_array("감자", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("감자", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if(in_array("고구마", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("고구마", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if(in_array("귀리", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("귀리", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if(in_array("밤", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("밤", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if(in_array("수수", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("수수", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if(in_array("쌀", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("쌀", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if(in_array("쌀가루", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("쌀가루", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if(in_array("전분가루", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("전분가루", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if(in_array("차조", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("차조", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if(in_array("찹쌀", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("찹쌀", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if(in_array("찹쌀가루", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("찹쌀가루", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if(in_array("퀴노아", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("퀴노아", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if(in_array("현미", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("현미", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if(in_array("흑미", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("흑미", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }
        if(in_array("대추", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("대추", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $rhkdlffb = $rhkdlffb + $showout[$i][$key[$i]];
        }
        if(in_array("배", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("배", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $rhkdlffb = $rhkdlffb + $showout[$i][$key[$i]];
        }
        if(in_array("블루베리", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("블루베리", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $rhkdlffb = $rhkdlffb + $showout[$i][$key[$i]];
        }
        if(in_array("사과", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("사과", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $rhkdlffb = $rhkdlffb + $showout[$i][$key[$i]];
        }
        if(in_array("닭고기", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("닭고기", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $djdbrfb = $djdbrfb + $showout[$i][$key[$i]];
        }
        if(in_array("렌틸콩", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("렌틸콩", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $djdbrfb = $djdbrfb + $showout[$i][$key[$i]];
        }
        if(in_array("병아리콩", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("병아리콩", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $djdbrfb = $djdbrfb + $showout[$i][$key[$i]];
        }
        if(in_array("연두부", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("연두부", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $djdbrfb = $djdbrfb + $showout[$i][$key[$i]];
        }
        if(in_array("한우", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("한우", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $djdbrfb = $djdbrfb + $showout[$i][$key[$i]];
        }
        if(in_array("치즈", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("치즈", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $dbwpvna = $dbwpvna + $showout[$i][$key[$i]];
        }
        if(in_array("가지", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("가지", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("근대", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("근대", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("김", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("김", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("느타리", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("느타리", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("단호박", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("단호박", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("당근", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("당근", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("로메인", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("로메인", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("무", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("무", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("미역", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("미역", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("배추", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("배추", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("브로콜리", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("브로콜리", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("비타민", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("비타민", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("비트", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("비트", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("새송이", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("새송이", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("시금치", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("시금치", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("아욱", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("아욱", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("애호박", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("애호박", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("양배추", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("양배추", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("양송이", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("양송이", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("양파", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("양파", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("연근", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("연근", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("오이", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("오이", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("우엉", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("우엉", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("적채", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("적채", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("청경채", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("청경채", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("파프리카", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("파프리카", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }
        if(in_array("표고", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("표고", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }

        if(in_array("완두콩가루", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("완두콩가루", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $djdbrfb = $djdbrfb + $showout[$i][$key[$i]];
        }

        if(in_array("검은콩가루", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("검은콩가루", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $djdbrfb = $djdbrfb + $showout[$i][$key[$i]];
        }

        if(in_array("바나나", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("바나나", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $rhkdlffb = $rhkdlffb + $showout[$i][$key[$i]];
        }

        if(in_array("케일", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("케일", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }

        if(in_array("방울토마토", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("방울토마토", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }

        if(in_array("한천가루", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("한천가루", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $cothfb = $cothfb + $showout[$i][$key[$i]];
        }

        if(in_array("아몬드", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("아몬드", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $djdbrfb = $djdbrfb + $showout[$i][$key[$i]];
        }

        if(in_array("밀가루", preg_replace("/[0-9]/","",$dou_obj[$i])))
        {
            $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
            $key[$i] = array_search("밀가루", $checkout[$i]);
            $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
            $rhrfb = $rhrfb + $showout[$i][$key[$i]];
        }

        $q = date("Y-m-d", strtotime("+1 days", strtotime($q)));
        $i = $i++;
    }
}if (empty($cothfb)){
    $cothfb = 0;
}if (empty($djdbrfb)){
    $djdbrfb = 0;
}if (empty($rhkdlffb)){
    $rhkdlffb = 0;
}if (empty($dbwpvna)){
    $dbwpvna = 0;
}if (empty($rhrfb)){
    $rhrfb = 0;
}?>
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
while ($alldaymenu_row = mysqli_fetch_array($alldaymenu_result)){
    $z = '2020-03-01';
    $e = date("Y-m-d");
    $i = 0;
    while (strtotime($z) <= strtotime($e)){
        $menudirect_query = "SELECT * FROM menutest WHERE menu = '$alldaymenu_row[$z]'";
        $menudirect_result = mysqli_query($mysqli, $menudirect_query);
        $menudirect_row = mysqli_fetch_array($menudirect_result);
        $menu_obj[$i] = $menudirect_row;
        if(in_array("가지", preg_replace("/[0-9]/","",$menu_obj[$i])))
        {
            $rkwl = 1;
        }
        if(in_array("감자", preg_replace("/[0-9]/","",$menu_obj[$i])))
        {
            $rkawk = 1;
        }
        if(in_array("건포도", preg_replace("/[0-9]/","",$menu_obj[$i])))
        {
            $rjsvheh = 1;
        }
        if(in_array("검은깨", preg_replace("/[0-9]/","",$menu_obj[$i])))
        {
            $rjadmsro = 1;
        }
        if(in_array("검은콩", preg_replace("/[0-9]/","",$menu_obj[$i])))
        {
            $rjadmszhd = 1;
        }
        if(in_array("고구마", preg_replace("/[0-9]/","",$menu_obj[$i])))
        {
            $rhrnak = 1;
        }
        if(in_array("귀리", preg_replace("/[0-9]/","",$menu_obj[$i])))
        {
            $rnlfl = 1;
        }
        if(in_array("근대", preg_replace("/[0-9]/","",$menu_obj[$i])))
        {
            $rmseo = 1;
        }
        if(in_array("김", preg_replace("/[0-9]/","",$menu_obj[$i])))
        {
            $rla = 1;
        }
        if(in_array("느타리", preg_replace("/[0-9]/","",$menu_obj[$i])))
        {
            $smxkfl = 1;
        }
        if(in_array("다시마", preg_replace("/[0-9]/","",$menu_obj[$i])))
        {
            $ektlak = 1;
        }
        if(in_array("단호박", preg_replace("/[0-9]/","",$menu_obj[$i])))
        {
            $eksghqkr = 1;
        }
        if(in_array("닭고기", preg_replace("/[0-9]/", "",$menu_obj[$i])))
        {
            $ekfrrhrl = 1;
        }
        if(in_array("당근", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {
            $ekdrms = 1;
        }
        if(in_array("대추", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {
            $eocn = 1;
        }
        if(in_array("렌틸콩", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {
            $fpsxlfzhd = 1;
        }
        if(in_array("로메인", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {
            $fhapdls = 1;
        }
        if(in_array("무", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {
            $an = 1;
        }
        if(in_array("건미역", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {
            $aldur = 1;
        }

        if(in_array("밤", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {
            $qka = 1;
        }
        if(in_array("배", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {
            $qo = 1;
        }
        if(in_array("배추", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {
            $qocn = 1;
        }
        if(in_array("병아리콩", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {
            $quddkflzhd = 1;
        }
        if(in_array("부추", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$qncn = 1; }
        if(in_array("브로콜리", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$qmfhzhffl = 1; }
        if(in_array("블루베리", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$qmffnqpfl = 1; }
        if(in_array("비타민", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$qlxkals = 1; }
        if(in_array("비트", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$qlxm = 1; }
        if(in_array("사과", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$tkrhk = 1; }
        if(in_array("새송이", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$tothddl = 1; }
        if(in_array("수수", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$tntn = 1; }
        if(in_array("시금치", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$tlrmacl = 1; }
        if(in_array("쌀", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$tkf = 1; }
        if(in_array("쌀가루", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$tkf = 1; }
        if(in_array("아스파라거스", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$dktmvkfkrjtm = 1; }
        if(in_array("아욱", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$dkdnr = 1; }
        if(in_array("애호박", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$doghqkr = 1; }
        if(in_array("양배추", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$didqocn = 1; }
        if(in_array("양송이", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$didthddl = 1; }
        if(in_array("양파", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$didvk = 1; }
        if(in_array("연근", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$dusrms = 1; }
        if(in_array("연두부", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$dusenqn = 1; }
        if(in_array("오이", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$dhdl = 1; }
        if(in_array("옥수수", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$dhrtntn = 1; }
        if(in_array("완두콩", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$dhksenzhd = 1; }
        if(in_array("우엉", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$dndjd = 1; }
        if(in_array("잔멸치", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$wksaufcl = 1; }
        if(in_array("적채", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$wjrco = 1; }
        if(in_array("전분가루", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$wjsqnsrkfn = 1; }
        if(in_array("중기쌀", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$wndrltkf = 1; }
        if(in_array("차조", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$ckwh = 1; }
        if(in_array("찹쌀", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$ckqtkf = 1; }
        if(in_array("찹쌀가루", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$ckqtkf = 1; }
        if(in_array("청경채", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$cjdrudco = 1; }
        if(in_array("치즈", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$clwm = 1; }
        if(in_array("퀴노아", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$znlshdk = 1; }
        if(in_array("파프리카", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$vkvmflzk = 1; }
        if(in_array("표고", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$vyrh = 1; }
        if(in_array("한우", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$gksdn = 1; }
        if(in_array("현미", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$gusal = 1; }
        if(in_array("후기쌀", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$gnrltkf = 1; }
        if(in_array("흑미", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$gmral = 1; }
        if(in_array("흰살생선", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$gmlstkftodtjs = 1; }

        if(in_array("완두콩가루", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$dhksenzhd = 1; }
        if(in_array("바나나", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$qksksk = 1;}
        if(in_array("검은콩가루", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$rjadmszhd = 1;}
        if(in_array("케일", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$zpdlf = 1;}
        if(in_array("방울토마토", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$qkddnfxhakxh = 1;}
        if(in_array("한천가루", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$gkscjsrkfn = 1;}
        if(in_array("아몬드", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$dkahsem = 1;}
        if(in_array("밀가루", preg_replace("/[0-9]/", "",$menu_obj[$i]))) {$alfrkfn = 1;}

        $z = date("Y-m-d", strtotime("+1 days", strtotime($z)));
        $i = $i++;
    }
}?>
    <!--이달의영양소-->
<?php
$tomonth_query = "SELECT * FROM tomonth WHERE period = '$baby_period'";
$tomonth_result = mysqli_query($mysqli, $tomonth_query);
$tomonth_row = mysqli_fetch_array($tomonth_result);
$tomonth_nutr = $tomonth_row[nutr];
$tomonth_nutrinfo = $tomonth_row[nutrinfo];
?>
<?php
$nutr_sum = (int)$pers_cal + (int)$pers_car + (int)$pers_pat + (int)$pers_pro;
$nutr_trim = 4;
$nutr_aver = intval($nutr_sum/$nutr_trim);
?>
<?php
$test_obj = "object";
$presearch_query = "SELECT * FROM presearch WHERE userid = '$loginid' ORDER BY date DESC LIMIT 1";
$presearch_result = mysqli_query($mysqli, $presearch_query);
$presearch_row = mysqli_fetch_array($presearch_result);
$old_eating = explode("/",$presearch_row[$test_obj]);
if(in_array("가지", $old_eating))
{    $rkwl = 2;
}if(in_array("감자", $old_eating))
{    $rkawk = 2;
}if(in_array("건포도", $old_eating))
{    $rjsvheh = 2;
}if(in_array("검은깨", $old_eating))
{    $rjadmsro = 2;
}if(in_array("검은콩", $old_eating))
{    $rjadmszhd = 2;
}if(in_array("고구마", $old_eating))
{    $rhrnak = 2;
}if(in_array("귀리", $old_eating))
{    $rnlfl = 2;
}if(in_array("근대", $old_eating))
{    $rmseo = 2;
}if(in_array("김", $old_eating))
{    $rla = 2;
}if(in_array("느타리", $old_eating))
{    $smxkfl = 2;
}if(in_array("다시마", $old_eating))
{    $ektlak = 2;
}if(in_array("단호박", $old_eating))
{    $eksghqkr = 2;
}if(in_array("닭고기", $old_eating))
{    $ekfrrhrl = 2;
}if(in_array("당근", $old_eating)) {
    $ekdrms = 2;
}if(in_array("대추", $old_eating)) {
    $eocn = 2;
}if(in_array("렌틸콩", $old_eating)) {
    $fpsxlfzhd = 2;
}if(in_array("로메인", $old_eating)) {
    $fhapdls = 2;
}if(in_array("무", $old_eating)) {
    $an = 2;
}if(in_array("건미역", $old_eating)) {
    $aldur = 2;
}if(in_array("밤", $old_eating)) {
    $qka = 2;
}if(in_array("배", $old_eating)) {
    $qo = 2;
}if(in_array("배추", $old_eating)) {
    $qocn = 2;
}if(in_array("병아리콩", $old_eating)) {
    $quddkflzhd = 2;
}if(in_array("부추", $old_eating)) {$qncn = 2; }
if(in_array("브로콜리", $old_eating)) {$qmfhzhffl = 2; }
if(in_array("블루베리", $old_eating)) {$qmffnqpfl = 2; }
if(in_array("비타민", $old_eating)) {$qlxkals = 2; }
if(in_array("비트", $old_eating)) {$qlxm = 2; }
if(in_array("사과", $old_eating)) {$tkrhk = 2; }
if(in_array("새송이", $old_eating)) {$tothddl = 2; }
if(in_array("수수", $old_eating)) {$tntn = 2; }
if(in_array("시금치", $old_eating)) {$tlrmacl = 2; }
if(in_array("쌀", $old_eating)) {$tkf = 2; }
if(in_array("쌀가루", $old_eating)) {$tkf = 2; }
if(in_array("아스파라거스", $old_eating)) {$dktmvkfkrjtm = 2; }
if(in_array("아욱", $old_eating)) {$dkdnr = 2; }
if(in_array("애호박", $old_eating)) {$doghqkr = 2; }
if(in_array("양배추", $old_eating)) {$didqocn = 2; }
if(in_array("양송이", $old_eating)) {$didthddl = 2; }
if(in_array("양파", $old_eating)) {$didvk = 2; }
if(in_array("연근", $old_eating)) {$dusrms = 2; }
if(in_array("연두부", $old_eating)) {$dusenqn = 2; }
if(in_array("오이", $old_eating)) {$dhdl = 2; }
if(in_array("옥수수", $old_eating)) {$dhrtntn = 2; }
if(in_array("옥수수", $old_eating)) {$dhrtntn = 2; }
if(in_array("완두콩", $old_eating)) {$dhksenzhd = 2; }
if(in_array("우엉", $old_eating)) {$dndjd = 2; }
if(in_array("잔멸치", $old_eating)) {$wksaufcl = 2; }
if(in_array("적채", $old_eating)) {$wjrco = 2; }
if(in_array("전분가루", $old_eating)) {$wjsqnsrkfn = 2; }
if(in_array("중기쌀", $old_eating)) {$wndrltkf = 2; }
if(in_array("차조", $old_eating)) {$ckwh = 2; }
if(in_array("찹쌀", $old_eating)) {$ckqtkf = 2; }
if(in_array("찹쌀가루", $old_eating)) {$ckqtkf = 2; }
if(in_array("청경채", $old_eating)) {$cjdrudco = 2; }
if(in_array("치즈", $old_eating)) {$clwm = 2; }
if(in_array("퀴노아", $old_eating)) {$znlshdk = 2; }
if(in_array("파프리카", $old_eating)) {$vkvmflzk = 2; }
if(in_array("표고", $old_eating)) {$vyrh = 2; }
if(in_array("한우", $old_eating)) {$gksdn = 2; }
if(in_array("현미", $old_eating)) {$gusal = 2; }
if(in_array("후기쌀", $old_eating)) {$gnrltkf = 2; }
if(in_array("흑미", $old_eating)) {$gmral = 2; }
if(in_array("흰살생선", $old_eating)) {$gmlstkftodtjs = 2; }

if(in_array("완두콩", $old_eating)) {$dhksenzhd = 2; }
if(in_array("바나나", $old_eating)) {$qksksk = 2; }
if(in_array("검은콩", $old_eating)) {$rjadmszhd = 2; }
if(in_array("케일", $old_eating)) {$zpdlf = 2; }
if(in_array("방울토마토", $old_eating)) {$qkddnfxhakxh = 2; }
if(in_array("한천", $old_eating)) {$gkscjsrkfn = 2; }
if(in_array("아몬드", $old_eating)) {$dkahsem = 2; }
if(in_array("밀가루", $old_eating)) {$alfrkfn = 2; }


?>
    <input type="hidden" value="<?php echo $user_gender ?>" id="babygender">
    <!--남아키-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Month', '우리아이', '저신장', '평균신장', '고신장'],
                [0,<?php echo $height_graph[0] ?>,47.5,49.9,52.3],
                [1,<?php echo $height_graph[1] ?>,52.2,54.7,57.2],
                [2,<?php echo $height_graph[2] ?>,55.9,58.4,61],
                [3,<?php echo $height_graph[3] ?>,58.8,61.4,64],
                [4,<?php echo $height_graph[4] ?>,61.2,63.9,66.6],
                [5,<?php echo $height_graph[5] ?>,63.2,65.9,68.6],
                [6,<?php echo $height_graph[6] ?>,64.9,67.6,70.4],
                [7,<?php echo $height_graph[7] ?>,66.4,69.2,71.9],
                [8,<?php echo $height_graph[8] ?>,67.8,70.6,73.4],
                [9,<?php echo $height_graph[9] ?>,69.1,72,74.8],
                [10,<?php echo $height_graph[10] ?>,70.4,73.3,76.2],
                [11,<?php echo $height_graph[11] ?>,71.6,74.5,77.5],
                [12,<?php echo $height_graph[12] ?>,72.7,75.7,78.8],
                [13,<?php echo $height_graph[13] ?>,73.8,76.9,80],
                [14,<?php echo $height_graph[14] ?>,74.9,78,81.2],
                [15,<?php echo $height_graph[15] ?>,75.9,79.1,82.4],
                [16,<?php echo $height_graph[16] ?>,76.9,80.2,83.5],
                [17,<?php echo $height_graph[17] ?>,77.9,81.2,84.6]
                /*-[18,<?php echo $height_graph[18] ?>,78.8,82.3,85.7],
                [19,<?php echo $height_graph[19] ?>,79.7,83.2,86.8],
                [20,<?php echo $height_graph[20] ?>,80.6,84.2,87.8]
                [21,<?php echo $height_graph[21] ?>,81.5,85.1,88.8],
                [22,<?php echo $height_graph[22] ?>,82.3,86,89.8],
                [23,<?php echo $height_graph[23] ?>,83.1,86.9,90.8],
                [24,<?php echo $height_graph[24] ?>,83.2,87.1,91],
                [25,<?php echo $height_graph[25] ?>,84,88,92],
                [26,<?php echo $height_graph[26] ?>,84.7,88.8,92.9],
                [27,<?php echo $height_graph[27] ?>,85.5,89.6,93.8],
                [28,<?php echo $height_graph[28] ?>,86.2,90.4,94.6],
                [29,<?php echo $height_graph[29] ?>,86.9,91.2,95.5],
                [30,<?php echo $height_graph[30] ?>,87.6,91.9,96.3],
                [31,<?php echo $height_graph[31] ?>,88.2,92.7,97.1],
                [32,<?php echo $height_graph[32] ?>,88.9,93.4,97.9],
                [33,<?php echo $height_graph[33] ?>,89.5,94.1,98.6],
                [34,<?php echo $height_graph[34] ?>,90.1,94.8,99.4],
                [35,<?php echo $height_graph[35] ?>,90.7,95.4,100.1],
                [36,<?php echo $height_graph[36] ?>,91.8,96.5,101.8],
                [37,<?php echo $height_graph[37] ?>,92.3,97,102.3],
                [38,<?php echo $height_graph[38] ?>,92.8,97.6,102.9],
                [39,<?php echo $height_graph[39] ?>,93.3,98.1,103.5],
                [40,<?php echo $height_graph[40] ?>,93.8,98.7,104],
                [41,<?php echo $height_graph[41] ?>,94.3,99.2,104.6],
                [42,<?php echo $height_graph[42] ?>,94.9,99.8,105.1],
                [43,<?php echo $height_graph[43] ?>,95.4,100.3,105.7],
                [44,<?php echo $height_graph[44] ?>,95.9,100.9,106.3],
                [45,<?php echo $height_graph[45] ?>,96.4,101.4,106.8],
                [46,<?php echo $height_graph[46] ?>,96.9,102,107.4],
                [47,<?php echo $height_graph[47] ?>,97.4,102.5,108],
                [48,<?php echo $height_graph[48] ?>,97.9,103.1,108.5],
                [49,<?php echo $height_graph[49] ?>,98.5,103.6,109.1],
                [50,<?php echo $height_graph[50] ?>,99,104.2,109.6],
                [51,<?php echo $height_graph[51] ?>,99.5,104.7,110.2],
                [52,<?php echo $height_graph[52] ?>,100,105.3,110.8],
                [53,<?php echo $height_graph[53] ?>,100.5,105.8,111.3],
                [54,<?php echo $height_graph[54] ?>,101,106.3,111.9],
                [55,<?php echo $height_graph[55] ?>,101.5,106.9,112.5],
                [56,<?php echo $height_graph[56] ?>,102,107.4,113],
                [57,<?php echo $height_graph[57] ?>,102.6,108,113.6],
                [58,<?php echo $height_graph[58] ?>,103.1,108.5,114.1],
                [59,<?php echo $height_graph[59] ?>,103.6,109.1,114.7],
                [60,<?php echo $height_graph[60] ?>,104.1,109.6,115.3]-*/
            ]);
            var options = {
                tooltip: {isHtml: true},
                legend : 'none',
                height : 300,
                width : 380,
                vAxis : {
                    viewWindow : {
                        min:45, max:85
                    }
                },
                chartArea : { width : '80%', height:'80%' },
                series : {
                    0 : { color:'#000000', lineWidth:5, pointShape:'circle', pointSize:9 },
                    1 : { color:'#e8b026', lineWidth:2, opacity:0.5 },
                    2 : { color:'#177c48', lineWidth:2, opacity:0.5 },
                    3 : { color:'#ea5514', lineWidth:2, opacity:0.5 }
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('chart_one'));
            chart.draw(data, options);
        }
    </script>
    <!--남아무게-->
    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Month', '우리아이', '저체중', '평균체중', '과체중'],
                [0,<?php echo $weight_graph[0] ?>,2.8,3.3,4],
                [1,<?php echo $weight_graph[1] ?>,3.8,4.5,5.3],
                [2,<?php echo $weight_graph[2] ?>,4.7,5.6,6.5],
                [3,<?php echo $weight_graph[3] ?>,5.5,6.4,7.4],
                [4,<?php echo $weight_graph[4] ?>,6,7,8.1],
                [5,<?php echo $weight_graph[5] ?>,6.5,7.5,8.6],
                [6,<?php echo $weight_graph[6] ?>,6.9,7.9,9.1],
                [7,<?php echo $weight_graph[7] ?>,7.2,8.3,9.5],
                [8,<?php echo $weight_graph[8] ?>,7.5,8.6,9.9],
                [9,<?php echo $weight_graph[9] ?>,7.7,8.9,10.2],
                [10,<?php echo $weight_graph[10] ?>,8,9.2,10.5],
                [11,<?php echo $weight_graph[11] ?>,8.2,9.4,10.8],
                [12,<?php echo $weight_graph[12] ?>,8.4,9.6,11.1],
                [13,<?php echo $weight_graph[13] ?>,8.6,9.9,11.4],
                [14,<?php echo $weight_graph[14] ?>,8.8,10.1,11.6],
                [15,<?php echo $weight_graph[15] ?>,9,10.3,11.9],
                [16,<?php echo $weight_graph[16] ?>,9.1,10.5,12.1],
                [17,<?php echo $weight_graph[17] ?>,9.3,10.7,12.4]
                /*-[18,<?php echo $weight_graph[18] ?>,9.5,10.9,12.6],
                [19,<?php echo $weight_graph[19] ?>,9.7,11.1,12.9],
                [20,<?php echo $weight_graph[20] ?>,9.8,11.3,13.1],
                [21,<?php echo $weight_graph[21] ?>,10,11.5,13.3],
                [22,<?php echo $weight_graph[22] ?>,10.2,11.8,13.6],
                [23,<?php echo $weight_graph[23] ?>,10.3,12,13.8],
                [24,<?php echo $weight_graph[24] ?>,10.5,12.2,14.1],
                [25,<?php echo $weight_graph[25] ?>,10.7,12.4,14.3],
                [26,<?php echo $weight_graph[26] ?>,10.8,12.5,14.6],
                [27,<?php echo $weight_graph[27] ?>,11,12.7,14.8],
                [28,<?php echo $weight_graph[28] ?>,11.1,12.9,15],
                [29,<?php echo $weight_graph[29] ?>,11.3,13.1,15.2],
                [30,<?php echo $weight_graph[30] ?>,11.4,13.3,15.5],
                [31,<?php echo $weight_graph[31] ?>,11.6,13.5,15.7],
                [32,<?php echo $weight_graph[32] ?>,11.7,13.7,15.9],
                [33,<?php echo $weight_graph[33] ?>,11.9,13.8,16.1],
                [34,<?php echo $weight_graph[34] ?>,12,14,16.3],
                [35,<?php echo $weight_graph[35] ?>,12.2,14.2,16.6],
                [36,<?php echo $weight_graph[36] ?>,13,14.7,16.7],
                [37,<?php echo $weight_graph[37] ?>,13.2,14.9,16.9],
                [38,<?php echo $weight_graph[38] ?>,13.3,15.1,17.1],
                [39,<?php echo $weight_graph[39] ?>,13.4,15.3,17.4],
                [40,<?php echo $weight_graph[40] ?>,13.6,15.4,17.6],
                [41,<?php echo $weight_graph[41] ?>,13.7,15.6,17.8],
                [42,<?php echo $weight_graph[42] ?>,13.8,15.8,18.1],
                [43,<?php echo $weight_graph[43] ?>,14,16,18.3],
                [44,<?php echo $weight_graph[44] ?>,14.1,16.1,18.5],
                [45,<?php echo $weight_graph[45] ?>,14.3,16.3,18.8],
                [46,<?php echo $weight_graph[46] ?>,14.4,16.5,19],
                [47,<?php echo $weight_graph[47] ?>,14.5,16.7,19.2],
                [48,<?php echo $weight_graph[48] ?>,14.7,16.8,19.5],
                [49,<?php echo $weight_graph[49] ?>,14.8,17,19.7],
                [50,<?php echo $weight_graph[50] ?>,15,17.2,20],
                [51,<?php echo $weight_graph[51] ?>,15.1,17.4,20.2],
                [52,<?php echo $weight_graph[52] ?>,15.3,17.5,20.4],
                [53,<?php echo $weight_graph[53] ?>,15.4,17.7,20.7],
                [54,<?php echo $weight_graph[54] ?>,15.5,17.9,20.9],
                [55,<?php echo $weight_graph[55] ?>,15.7,18.1,21.1],
                [56,<?php echo $weight_graph[56] ?>,15.8,18.2,21.4],
                [57,<?php echo $weight_graph[57] ?>,16,18.4,21.6],
                [58,<?php echo $weight_graph[58] ?>,16.1,18.6,21.9],
                [59,<?php echo $weight_graph[59] ?>,16.3,18.8,22.1],
                [60,<?php echo $weight_graph[60] ?>,16.4,19,22.4]-*/
            ]);
            var options = {
                tooltip: {isHtml: true},
                legend : 'none',
                height : 300,
                width : 380,
                chartArea : { width : '80%', height:'80%' },
                series : {
                    0 : { color:'#000000', lineWidth:5, pointShape:'circle', pointSize:9 },
                    1 : { color:'#e8b026', lineWidth:2, opacity:0.5 },
                    2 : { color:'#177c48', lineWidth:2, opacity:0.5 },
                    3 : { color:'#ea5514', lineWidth:2, opacity:0.5 }
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('chart_two'));
            chart.draw(data, options);
        }
    </script>
    <!--여아키-->
    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Month', '우리아이(여)', '저신장(여)', '평균신장(여)', '고신장(여)'],
                [0,<?php echo $height_graph[0] ?>,46.8,49.1,51.5],
                [1,<?php echo $height_graph[1] ?>,51.2,53.7,56.2],
                [2,<?php echo $height_graph[2] ?>,54.5,57.1,59.7],
                [3,<?php echo $height_graph[3] ?>,57.1,59.8,62.5],
                [4,<?php echo $height_graph[4] ?>,59.3,62.1,64.9],
                [5,<?php echo $height_graph[5] ?>,61.2,64,66.9],
                [6,<?php echo $height_graph[6] ?>,62.8,65.7,68.6],
                [7,<?php echo $height_graph[7] ?>,64.3,67.3,70.3],
                [8,<?php echo $height_graph[8] ?>,65.7,68.7,71.8],
                [9,<?php echo $height_graph[9] ?>,67,70.1,73.2],
                [10,<?php echo $height_graph[10] ?>,68.3,71.5,74.6],
                [11,<?php echo $height_graph[11] ?>,69.5,72.8,76],
                [12,<?php echo $height_graph[12] ?>,70.7,74,77.3],
                [13,<?php echo $height_graph[13] ?>,71.8,75.2,78.6],
                [14,<?php echo $height_graph[14] ?>,72.9,76.4,79.8],
                [15,<?php echo $height_graph[15] ?>,74,77.5,81],
                [16,<?php echo $height_graph[16] ?>,75,78.6,82.2],
                [17,<?php echo $height_graph[17] ?>,76,79.7,83.3]
                /*-[18,<?php echo $height_graph[18] ?>,77,80.7,84.4],
                [19,<?php echo $height_graph[19] ?>,77.9,81.7,85.5],
                [20,<?php echo $height_graph[20] ?>,78.8,82.7,86.6]
                [21,<?php echo $height_graph[21] ?>,79.7,83.7,87.6],
                [22,<?php echo $height_graph[22] ?>,80.6,84.6,88.6],
                [23,<?php echo $height_graph[23] ?>,81.5,85.5,89.6],
                [24,<?php echo $height_graph[24] ?>,81.6,85.7,89.9],
                [25,<?php echo $height_graph[25] ?>,82.4,86.6,90.8],
                [26,<?php echo $height_graph[26] ?>,83.2,87.4,91.7],
                [27,<?php echo $height_graph[27] ?>,83.9,88.3,92.6],
                [28,<?php echo $height_graph[28] ?>,84.7,89.1,93.5],
                [29,<?php echo $height_graph[29] ?>,85.4,89.9,94.4],
                [30,<?php echo $height_graph[30] ?>,86.2,90.7,95.2],
                [31,<?php echo $height_graph[31] ?>,86.9,91.4,96],
                [32,<?php echo $height_graph[32] ?>,87.5,92.2,96.8],
                [33,<?php echo $height_graph[33] ?>,88.2,92.9,97.6],
                [34,<?php echo $height_graph[34] ?>,88.9,93.6,98.4],
                [35,<?php echo $height_graph[35] ?>,89.5,94.4,99.2],
                [36,<?php echo $height_graph[36] ?>,90.4,95.4,100.5],
                [37,<?php echo $height_graph[37] ?>,90.9,95.9,101.1],
                [38,<?php echo $height_graph[38] ?>,91.5,96.5,101.6],
                [39,<?php echo $height_graph[39] ?>,92,97,102.2],
                [40,<?php echo $height_graph[40] ?>,92.5,97.6,102.8],
                [41,<?php echo $height_graph[41] ?>,93.1,98.1,103.3],
                [42,<?php echo $height_graph[42] ?>,93.6,98.6,103.9],
                [43,<?php echo $height_graph[43] ?>,94.1,99.2,104.5],
                [44,<?php echo $height_graph[44] ?>,94.7,99.7,105],
                [45,<?php echo $height_graph[45] ?>,95.2,100.3,105.6],
                [46,<?php echo $height_graph[46] ?>,95.7,100.8,106.1],
                [47,<?php echo $height_graph[47] ?>,96.2,101.4,106.7],
                [48,<?php echo $height_graph[48] ?>,96.8,101.9,107.3],
                [49,<?php echo $height_graph[49] ?>,97.3,102.4,107.8],
                [50,<?php echo $height_graph[50] ?>,97.8,103,108.4],
                [51,<?php echo $height_graph[51] ?>,98.4,103.5,108.9],
                [52,<?php echo $height_graph[52] ?>,98.9,104.1,109.5],
                [53,<?php echo $height_graph[53] ?>,99.4,104.6,110.1],
                [54,<?php echo $height_graph[54] ?>,99.9,105.1,110.6],
                [55,<?php echo $height_graph[55] ?>,100.5,105.7,111.2],
                [56,<?php echo $height_graph[56] ?>,101,106.2,111.7],
                [57,<?php echo $height_graph[57] ?>,101.5,106.8,112.3],
                [58,<?php echo $height_graph[58] ?>,102.1,107.3,112.8],
                [59,<?php echo $height_graph[59] ?>,102.6,107.8,113.4],
                [60,<?php echo $height_graph[60] ?>,103.1,108.4,114]-*/
            ]);
            var options = {
                tooltip: {isHtml: true},
                legend : 'none',
                height : 300,
                width : 380,
                vAxis : {
                    viewWindow : {
                        min:45, max:85
                    }
                },
                chartArea : { width : '80%', height:'80%' },
                series : {
                    0 : { color:'#000000', lineWidth:5, pointShape:'circle', pointSize:9 },
                    1 : { color:'#e8b026', lineWidth:2, opacity:0.5 },
                    2 : { color:'#177c48', lineWidth:2, opacity:0.5 },
                    3 : { color:'#ea5514', lineWidth:2, opacity:0.5 }
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('chart_thr'));
            chart.draw(data, options);
        }
    </script>
    <!--여아무게-->
    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Month', '우리아이(여)', '저체중(여)', '평균체중(여)', '과체중(여)'],
                [0,<?php echo $weight_graph[0] ?>,2.7,3.2,3.9],
                [1,<?php echo $weight_graph[1] ?>,3.5,4.2,5],
                [2,<?php echo $weight_graph[2] ?>,4.3,5.1,6],
                [3,<?php echo $weight_graph[3] ?>,5,5.8,6.9],
                [4,<?php echo $weight_graph[4] ?>,5.5,6.4,7.5],
                [5,<?php echo $weight_graph[5] ?>,5.9,6.9,8.1],
                [6,<?php echo $weight_graph[6] ?>,6.2,7.3,8.5],
                [7,<?php echo $weight_graph[7] ?>,6.5,7.6,8.9],
                [8,<?php echo $weight_graph[8] ?>,6.8,7.9,9.3],
                [9,<?php echo $weight_graph[9] ?>,7,8.2,9.6],
                [10,<?php echo $weight_graph[10] ?>,7.3,8.5,9.9],
                [11,<?php echo $weight_graph[11] ?>,7.5,8.7,10.2],
                [12,<?php echo $weight_graph[12] ?>,7.7,8.9,10.5],
                [13,<?php echo $weight_graph[13] ?>,7.9,9.2,10.8],
                [14,<?php echo $weight_graph[14] ?>,8,9.4,11],
                [15,<?php echo $weight_graph[15] ?>,8.2,9.6,11.3],
                [16,<?php echo $weight_graph[16] ?>,8.4,9.8,11.5],
                [17,<?php echo $weight_graph[17] ?>,8.6,10,11.8]
                /*-[18,<?php echo $weight_graph[18] ?>,8.8,10.2,12],
                [19,<?php echo $weight_graph[19] ?>,8.9,10.4,12.3],
                [20,<?php echo $weight_graph[20] ?>,9.1,10.6,12.5]
                [21,<?php echo $weight_graph[21] ?>,9.3,10.9,12.8],
                [22,<?php echo $weight_graph[22] ?>,9.5,11.1,13],
                [23,<?php echo $weight_graph[23] ?>,9.7,11.3,13.3],
                [24,<?php echo $weight_graph[24] ?>,9.8,11.5,13.5],
                [25,<?php echo $weight_graph[25] ?>,10,11.7,13.8],
                [26,<?php echo $weight_graph[26] ?>,10.2,11.9,14],
                [27,<?php echo $weight_graph[27] ?>,10.4,12.1,14.3],
                [28,<?php echo $weight_graph[28] ?>,10.5,12.3,14.5],
                [29,<?php echo $weight_graph[29] ?>,10.7,12.5,14.7],
                [30,<?php echo $weight_graph[30] ?>,10.9,12.7,15],
                [31,<?php echo $weight_graph[31] ?>,11,12.9,15.2],
                [32,<?php echo $weight_graph[32] ?>,11.2,13.1,15.5],
                [33,<?php echo $weight_graph[33] ?>,11.3,13.3,15.7],
                [34,<?php echo $weight_graph[34] ?>,11.5,13.5,15.9],
                [35,<?php echo $weight_graph[35] ?>,11.6,13.7,16.2],
                [36,<?php echo $weight_graph[36] ?>,12.4,14.2,16.1],
                [37,<?php echo $weight_graph[37] ?>,12.6,14.4,16.3],
                [38,<?php echo $weight_graph[38] ?>,12.7,14.5,16.5],
                [39,<?php echo $weight_graph[39] ?>,12.9,14.7,16.8],
                [40,<?php echo $weight_graph[40] ?>,13,14.9,17],
                [41,<?php echo $weight_graph[41] ?>,13.1,15.1,17.2],
                [42,<?php echo $weight_graph[42] ?>,13.3,15.2,17.5],
                [43,<?php echo $weight_graph[43] ?>,13.4,15.4,17.7],
                [44,<?php echo $weight_graph[44] ?>,13.6,15.6,17.9],
                [45,<?php echo $weight_graph[45] ?>,13.7,15.7,18.2],
                [46,<?php echo $weight_graph[46] ?>,13.9,15.9,18.4],
                [47,<?php echo $weight_graph[47] ?>,14,16.1,18.6],
                [48,<?php echo $weight_graph[48] ?>,14.1,16.3,18.9],
                [49,<?php echo $weight_graph[49] ?>,14.3,16.4,19.1],
                [50,<?php echo $weight_graph[50] ?>,14.4,16.6,19.3],
                [51,<?php echo $weight_graph[51] ?>,14.6,16.8,19.6],
                [52,<?php echo $weight_graph[52] ?>,14.7,17,19.8],
                [53,<?php echo $weight_graph[53] ?>,14.9,17.1,20],
                [54,<?php echo $weight_graph[54] ?>,15,17.3,20.3],
                [55,<?php echo $weight_graph[55] ?>,15.1,17.5,20.5],
                [56,<?php echo $weight_graph[56] ?>,15.3,17.7,20.8],
                [57,<?php echo $weight_graph[57] ?>,15.4,17.8,21],
                [58,<?php echo $weight_graph[58] ?>,15.6,18,21.2],
                [59,<?php echo $weight_graph[59] ?>,15.7,18.2,21.5],
                [60,<?php echo $weight_graph[60] ?>,15.9,18.4,21.7]-*/
            ]);
            var options = {
                tooltip: {isHtml: true},
                legend : 'none',
                height : 300,
                width : 380,
                chartArea : { width : '80%', height:'80%' },
                series : {
                    0 : { color:'#000000', lineWidth:5, pointShape:'circle', pointSize:9 },
                    1 : { color:'#e8b026', lineWidth:2, opacity:0.5 },
                    2 : { color:'#177c48', lineWidth:2, opacity:0.5 },
                    3 : { color:'#ea5514', lineWidth:2, opacity:0.5 }
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('chart_fow'));
            chart.draw(data, options);
        }
    </script>
    <!--페이크차트-->
    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Month', '우리아이(여)', '저신장(여)', '평균신장(여)', '고신장(여)'],
                [0,,46.8,49.1,51.5],
                [1,,51.2,53.7,56.2],
                [2,,54.5,57.1,59.7],
                [3,,57.1,59.8,62.5],
                [4,62.9,59.3,62.1,64.9],
                [5,64.5,61.2,64,66.9],
                [6,66.2,62.8,65.7,68.6],
                [7,,64.3,67.3,70.3],
                [8,,65.7,68.7,71.8],
                [9,,67,70.1,73.2],
                [10,,68.3,71.5,74.6],
                [11,,69.5,72.8,76],
                [12,,70.7,74,77.3],
                [13,,71.8,75.2,78.6],
                [14,,72.9,76.4,79.8],
                [15,,74,77.5,81],
                [16,,75,78.6,82.2],
                [17,,76,79.7,83.3]
            ]);
            var options = {
                tooltip: {isHtml: true},
                legend : 'none',
                height : 300,
                width : 380,
                vAxis : {
                    viewWindow : {
                        min:45, max:85
                    }
                },
                chartArea : { width : '80%', height:'80%' },
                series : {
                    0 : { color:'#000000', lineWidth:5, pointShape:'circle', pointSize:9 },
                    1 : { color:'#e8b026', lineWidth:2, opacity:0.5 },
                    2 : { color:'#177c48', lineWidth:2, opacity:0.5 },
                    3 : { color:'#ea5514', lineWidth:2, opacity:0.5 }
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('fake_chart_thr'));
            chart.draw(data, options);
        }
    </script>
    <!--여아무게-->
    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Month', '우리아이(여)', '저체중(여)', '평균체중(여)', '과체중(여)'],
                [0,,2.7,3.2,3.9],
                [1,,3.5,4.2,5],
                [2,,4.3,5.1,6],
                [3,,5,5.8,6.9],
                [4,6.6,5.5,6.4,7.5],
                [5,7.1,5.9,6.9,8.1],
                [6,7.5,6.2,7.3,8.5],
                [7,,6.5,7.6,8.9],
                [8,,6.8,7.9,9.3],
                [9,,7,8.2,9.6],
                [10,,7.3,8.5,9.9],
                [11,,7.5,8.7,10.2],
                [12,,7.7,8.9,10.5],
                [13,,7.9,9.2,10.8],
                [14,,8,9.4,11],
                [15,,8.2,9.6,11.3],
                [16,,8.4,9.8,11.5],
                [17,,8.6,10,11.8]
            ]);
            var options = {
                tooltip: {isHtml: true},
                legend : 'none',
                height : 300,
                width : 380,
                chartArea : { width : '80%', height:'80%' },
                series : {
                    0 : { color:'#000000', lineWidth:5, pointShape:'circle', pointSize:9 },
                    1 : { color:'#e8b026', lineWidth:2, opacity:0.5 },
                    2 : { color:'#177c48', lineWidth:2, opacity:0.5 },
                    3 : { color:'#ea5514', lineWidth:2, opacity:0.5 }
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('fake_chart_fow'));
            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawAxisTickColors);
        function drawAxisTickColors() {
            var data = google.visualization.arrayToDataTable([
                ['영양소', '기준값', '제공량'],
                ['열량', 100,<?php echo (int)$pers_cal ?>],
                ['탄수화물', 100, <?php echo (int)$pers_car ?>],
                ['단백질', 100, <?php echo (int)$pers_pro ?>],
                ['지방', <?php echo (int)$sum_need_pat ?>, <?php echo (int)$sum_pat ?>]
            ]);
            var options = {
                legend : 'none',
                width:380,
                height:220,
                chartArea: {width: '80%', height:'100%'},
                focusTarget: 'category',
                annotations:{
                    boxStyle : {
                        rx : 10,
                        ry : 10
                    }
                },
                series: {
                    0:{color:'#e7e7e7'},
                    1:{color:'#8cc364'}
                },
                hAxis: {
                },
                vAxis: {
                }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('per_chart_div'));
            chart.draw(data, options);
        }
    </script>
    <script>
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawAxisTickColors);
        function drawAxisTickColors() {
            var data = google.visualization.arrayToDataTable([
                ['영양소', '기준값', '제공량'],
                ['열량', 100,120],
                ['탄수화물', 100, 120],
                ['단백질', 100, 120],
                ['지방', 100, 110]
            ]);
            var options = {
                legend : 'none',
                width:380,
                height:220,
                chartArea: {width: '80%', height:'100%'},
                focusTarget: 'category',
                annotations:{
                    boxStyle : {
                        rx : 10,
                        ry : 10
                    }
                },
                series: {
                    0:{color:'#e7e7e7'},
                    1:{color:'#8cc364'}
                },
                hAxis: {
                },
                vAxis: {
                }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('fake_per_chart_div'));
            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['재료명', '제공량'],
                ['단백질류',<?php echo (int)$djdbrfb ?>],
                ['과일류',<?php echo (int)$rhkdlffb ?>],
                ['채소류',<?php echo (int)$cothfb ?>],
                ['곡류',<?php echo (int)$rhrfb ?>],
                ['유제품',<?php echo (int)$dbwpvna ?>]
            ]);
            var options = {
                legend : 'none',
                is3D: true,
                width:380,
                height:200,
                chartArea: {width: '90%', height:'100%'},
                colors: ['#d2612a', '#ffc85a', '#aacf52', '#af4b22', '#7d895b'],
                pieHole: 0.4
            };
            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['재료명', '제공량'],
                ['단백질류',200],
                ['과일류',200],
                ['채소류',200],
                ['곡류',200],
                ['유제품',200]
            ]);
            var options = {
                legend : 'none',
                is3D: true,
                width:380,
                height:200,
                chartArea: {width: '90%', height:'100%'},
                colors: ['#d2612a', '#ffc85a', '#aacf52', '#af4b22', '#7d895b'],
                pieHole: 0.4
            };
            var chart = new google.visualization.PieChart(document.getElementById('fakedonutchart'));
            chart.draw(data, options);
        }
    </script>
    <!--게이지바-->
<?php
$chogiview = 0;
$jungthree = 0;
if ( $baby_period == 준비기 ){
    $gaze = 10;
    $chogiview = 1;
}elseif ( $baby_period == 초기 ){
    $gaze = 20;
    $chogiview = 1;
}elseif ( $baby_period == 중기1 ){
    $gaze = 30;
}elseif ( $baby_period == 중기2 ){
    $gaze = 40;
}elseif ( $baby_period == 중기3 ){
    $gaze = 50;
    $jungthree = 1;
}elseif ( $baby_period == 후기1 ){
    $gaze = 60;
    $hugi = 1;
}elseif ( $baby_period == 후기2 ){
    $gaze = 70;
    $hugi = 1;
}elseif ( $baby_period == 후기3 ){
    $gaze = 80;
    $hugi = 1;
}elseif ( $baby_period == 완료기1 ){
    $gaze = 90;
    $hugi = 1;
}elseif ( $baby_period == 완료기2 ){
    $gaze = 100;
    $hugi = 1;
}else {
    $gaze = 110;
    $hugi = 1;
}if ( $user_firstperiod == 준비기 ){
    $gazes = 10;
}elseif ( $user_firstperiod == 초기 ){
    $gazes = 20;
}elseif ( $user_firstperiod == 중기 ){
    $gazes = 40;
}elseif ( $user_firstperiod == 후기 ){
    $gazes = 70;
}elseif ( $user_firstperiod == 완료기 ){
    $gazes = 90;
}else {
    $gazes = 110;
}?>
    <!--인풋히든-->
    <input name="auth" type="hidden" value="<?php echo $auth_no ?>">
    <input name="limit" type="hidden" value="<?php echo $limit_notice ?>">
    <input name="rkwl" type="hidden" value="<?php echo $rkwl?>">
    <input name="rkawk" type="hidden" value="<?php echo $rkawk?>">
    <input name="rjsvheh" type="hidden" value="<?php echo $rjsvheh?>">
    <input name="rjadmsro" type="hidden" value="<?php echo $rjadmsro?>">
    <input name="rjadmszhd" type="hidden" value="<?php echo $rjadmszhd?>">
    <input name="rhrnak" type="hidden" value="<?php echo $rhrnak?>">
    <input name="rnlfl" type="hidden" value="<?php echo $rnlfl?>">
    <input name="rmseo" type="hidden" value="<?php echo $rmseo?>">
    <input name="rla" type="hidden" value="<?php echo $rla?>">
    <input name="smxkfl" type="hidden" value="<?php echo $smxkfl?>">
    <input name="ektlak" type="hidden" value="<?php echo $ektlak?>">
    <input name="eksghqkr" type="hidden" value="<?php echo $eksghqkr?>">
    <input name="ekfrrhrl" type="hidden" value="<?php echo $ekfrrhrl?>">
    <input name="ekdrms" type="hidden" value="<?php echo $ekdrms?>">
    <input name="eocn" type="hidden" value="<?php echo $eocn?>">
    <input name="fpsxlfzhd" type="hidden" value="<?php echo $fpsxlfzhd?>">
    <input name="fhapdls" type="hidden" value="<?php echo $fhapdls?>">
    <input name="an" type="hidden" value="<?php echo $an?>">
    <input name="aldur" type="hidden" value="<?php echo $aldur?>">

    <input name="qka" type="hidden" value="<?php echo $qka?>">
    <input name="qo" type="hidden" value="<?php echo $qo?>">
    <input name="qocn" type="hidden" value="<?php echo $qocn?>">
    <input name="quddkflzhd" type="hidden" value="<?php echo $quddkflzhd?>">
    <input name="qncn" type="hidden" value="<?php echo $qncn?>">
    <input name="qmfhzhffl" type="hidden" value="<?php echo $qmfhzhffl?>">
    <input name="qmffnqpfl" type="hidden" value="<?php echo $qmffnqpfl?>">
    <input name="qlxkals" type="hidden" value="<?php echo $qlxkals?>">
    <input name="qlxm" type="hidden" value="<?php echo $qlxm?>">
    <input name="tkrhk" type="hidden" value="<?php echo $tkrhk?>">
    <input name="tothddl" type="hidden" value="<?php echo $tothddl?>">
    <input name="tntn" type="hidden" value="<?php echo $tntn?>">
    <input name="tlrmacl" type="hidden" value="<?php echo $tlrmacl?>">
    <input name="tkf" type="hidden" value="<?php echo $tkf?>">
    <input name="tkfrkfn" type="hidden" value="<?php echo $tkfrkfn?>">
    <input name="dktmvkfkrjtm" type="hidden" value="<?php echo $dktmvkfkrjtm?>">
    <input name="dkdnr" type="hidden" value="<?php echo $dkdnr?>">
    <input name="doghqkr" type="hidden" value="<?php echo $doghqkr?>">
    <input name="didqocn" type="hidden" value="<?php echo $didqocn?>">
    <input name="didthddl" type="hidden" value="<?php echo $didthddl?>">
    <input name="didvk" type="hidden" value="<?php echo $didvk?>">
    <input name="dusrms" type="hidden" value="<?php echo $dusrms?>">
    <input name="dusenqn" type="hidden" value="<?php echo $dusenqn?>">
    <input name="dhdl" type="hidden" value="<?php echo $dhdl?>">
    <input name="dhrtntn" type="hidden" value="<?php echo $dhrtntn?>">
    <input name="dhrtntn" type="hidden" value="<?php echo $dhrtntn?>">

    <input name="dndjd" type="hidden" value="<?php echo $dndjd?>">
    <input name="wksaufcl" type="hidden" value="<?php echo $wksaufcl?>">
    <input name="wjrco" type="hidden" value="<?php echo $wjrco?>">
    <input name="wjsqnsrkfn" type="hidden" value="<?php echo $wjsqnsrkfn?>">
    <input name="wndrltkf" type="hidden" value="<?php echo $wndrltkf?>">
    <input name="ckwh" type="hidden" value="<?php echo $ckwh?>">
    <input name="ckqtkf" type="hidden" value="<?php echo $ckqtkf?>">
    <input name="ckqtkfrkfn" type="hidden" value="<?php echo $ckqtkfrkfn?>">
    <input name="cjdrudco" type="hidden" value="<?php echo $cjdrudco?>">
    <input name="clwm" type="hidden" value="<?php echo $clwm?>">
    <input name="znlshdk" type="hidden" value="<?php echo $znlshdk?>">
    <input name="vkvmflzk" type="hidden" value="<?php echo $vkvmflzk?>">
    <input name="vyrh" type="hidden" value="<?php echo $vyrh?>">
    <input name="gksdn" type="hidden" value="<?php echo $gksdn?>">
    <input name="gusal" type="hidden" value="<?php echo $gusal?>">
    <input name="gnrltkf" type="hidden" value="<?php echo $gnrltkf?>">
    <input name="gmral" type="hidden" value="<?php echo $gmral?>">
    <input name="gmlstkftodtjs" type="hidden" value="<?php echo $gmlstkftodtjs?>">

    <input name="dhksenzhd" type="hidden" value="<?php echo $dhksenzhd ?>">
    <input name="qksksk" type="hidden" value="<?php echo $qksksk ?>">
    <input name="rjadmszhd" type="hidden" value="<?php echo $rjadmszhd ?>">
    <input name="zpdlf" type="hidden" value="<?php echo $zpdlf ?>">
    <input name="qkddnfxhakxh" type="hidden" value="<?php echo $qkddnfxhakxh ?>">
    <input name="gkscjsrkfn" type="hidden" value="<?php echo $gkscjsrkfn ?>">
    <input name="dkahsem" type="hidden" value="<?php echo $dkahsem ?>">
    <input name="alfrkfn" type="hidden" value="<?php echo $alfrkfn ?>">

    <input name="gaze" type="hidden" value="<?php echo $gaze ?>">
    <input name="hugi" type="hidden" value="<?php echo $hugi ?>">
    <input name="gazes" type="hidden" value="<?php echo $gazes ?>">
    <input name="jungthree" type="hidden" value="<?php echo $jungthree ?>">
    <input name="bigyo_weight" type="hidden" value="<?php echo $bigyo_after_weight ?>">
    <input name="bigyo_height" type="hidden" value="<?php echo $bigyo_after_height ?>">
    <input name="chogiveiw" type="hidden" value="<?php echo $chogiview ?>">
    <input name="snack_auth_code" id="snack_auth_code" type="hidden" value="<?php echo $snack_auth_code?>">



    <style>

        #chart_one { display:none; }
        #chart_two { display:none; }
        #chart_thr { display:none; }
        #chart_fow { display:none; }
        .graph_table td { vertical-align:middle; text-align:center; }
        .table_view { border-left:10px solid #427ac7; padding-left:10px; }
        .table_view b { display:inline-block; width:25%; font-size:20px; padding-bottom:5px; }
        .table_view p { display:inline-block; width:75%; font-size:20px; }
        .cont .number span { padding-right:0; margin-right:10px; border-radius:9px; }
        .cont .number p { font-size:25px; font-weight:normal; font-family:'210gullim'; }
        .cont .sub_text p { font-size:16px; }
        .graph_title { font-size:22px; padding-left:21px; font-weight:bold; }
        .tab1 .cont .number span { border-right:10px solid #33875d; }
        .tab2 .cont .number span { border-right:10px solid #8cc364; }
        .tab3 .cont .number span { border-right:10px solid #ffc85a; }
        .tab4 .cont .number span { border-right:10px solid #ea5514; }
        .evolu { border-radius:9px; border:1px solid #999; }
        button { background:none; color:#fff; border:0; outline:0; cursor:pointer; padding:0; font-size:0.8rem; border-top-right-radius:9px; border-top-left-radius:9px; }
        button:hover {  color:#fff; }
        .tab_menu_container { display:flex; }
        .tab_menu_btn { width:25%; height:50px; transition:0.9s all; background-color:#fff; margin-right:5px; }
        .tab_menu_btn.on {  font-weight:700; color:#fff; }
        .tab_menu_btn:hover { color:#fff; border:0 !important; border-top-left-radius:9px; border-top-right-radius:9px;border-top-right-radius:9px; border-top-left-radius:9px; }
        .tab_box { display:none; }
        .tab_box.on { display:block; }
        #top_btn01 { background-color:#33875d !important; }
        #top_btn02 { background-color:#8cc364 !important; }
        #top_btn03 { background-color:#ffc85a !important; }
        #top_btn04 { background-color:#ff7864 !important; }
        #top_btn01:hover { border-bottom:2px solid #33875d; background-color:#33875d; }
        #top_btn02:hover { border-bottom:2px solid #8cc364; background-color:#8cc364; }
        #top_btn03:hover { border-bottom:2px solid #8fb62d; background-color:#ffc85a; }
        #top_btn04:hover { border-bottom:2px solid #ff7864; background-color:#ff7864; }
        .bingo1 { background-color:#af4b22 !important; color:#fff; font-family:'210gullim'; }
        .bingo2 { background-color:#d2612a !important; color:#fff; font-family:'210gullim'; }
        .bingo3 { background-color:#aacf52 !important; color:#fff; font-family:'210gullim'; }
        .bingo4 { background-color:#ffc85a !important; color:#fff; font-family:'210gullim'; }
        .bingo5 { background-color:#7d895b !important; color:#fff; font-family:'210gullim'; }
        progress { display:block; width:100%; -webkit-appearance:none; appearance:none; }
        progress::-webkit-progress-bar { background-color:#e7e7e7; border-radius:9px; }
        progress::-webkit-progress-value { background:linear-gradient(to right, rgb(11, 130, 73), rgb(143,195,31), rgb(248, 182, 45)); background-size:400px 5px; border-radius:9px; }
        progress[value] { display:block; width:100%; -webkit-appearance:none; appearance:none; }
        progress[value]::-webkit-progress-bar {  background-color:#e7e7e7; border-radius:9px; }
        progress[value]::-webkit-progress-value { background:linear-gradient(to right, rgb(11, 130, 73), rgb(143,195,31), rgb(248, 182, 45)); background-size:400px 5px; border-radius:9px; }
        .pro_after { margin-bottom:-60px; z-index:2; position:relative;}
        progress[value="10"] + .pro_after { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/baby_jun.png); display:block; width:100px; height:117.5px; background-size:cover; background-repeat:no-repeat; margin-left:-5%; background-position:center; }
        progress[value="20"] + .pro_after { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/baby_cho.png); display:block; width:100px; height:117.5px; background-size:cover; background-repeat:no-repeat; margin-left:2%; background-position:center; }
        progress[value="30"] + .pro_after { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/baby_jung1.png); display:block; width:100px; height:117.5px; background-size:cover; background-repeat:no-repeat; margin-left:22%; background-position:center; }
        progress[value="40"] + .pro_after { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/baby_jung2.png); display:block; width:100px; height:117.5px; background-size:cover; background-repeat:no-repeat; margin-left:22%; background-position:center; }
        progress[value="50"] + .pro_after { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/baby_jung2.png); display:block; width:100px; height:117.5px; background-size:cover; background-repeat:no-repeat; margin-left:22%; background-position:center; }
        progress[value="60"] + .pro_after { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/baby_hu1.png); display:block; width:100px; height:117.5px; background-size:cover; background-repeat:no-repeat; margin-left:47%; background-position:center; }
        progress[value="70"] + .pro_after { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/baby_hu2.png); display:block; width:100px; height:117.5px; background-size:cover; background-repeat:no-repeat; margin-left:47%; background-position:center; }
        progress[value="80"] + .pro_after { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/baby_hu2.png); display:block; width:100px; height:117.5px; background-size:cover; background-repeat:no-repeat; margin-left:47%; background-position:center; }
        progress[value="90"] + .pro_after { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/baby_wan.png); display:block; width:100px; height:117.5px; background-size:cover; background-repeat:no-repeat; margin-left:66%; background-position:center; }
        progress[value="100"] + .pro_after { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/baby_wan.png); display:block; width:100px; height:117.5px; background-size:cover; background-repeat:no-repeat; margin-left:66%; background-position:center; }
        progress[value="110"] + .pro_after { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/baby_wan.png); display:block; width:100px; height:117.5px; background-size:cover; background-repeat:no-repeat; margin-left:66%; background-position:center; }
        .pro_after_chat { margin-bottom:-60px; z-index:2; position:relative; }
        progress[value="10"] + .pro_after + .pro_after_chat { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/chat_jun.png); display:block; width:60px; height:60px; background-size:cover; background-repeat:no-repeat; margin-left:20%; background-position:center; }
        progress[value="20"]+ .pro_after + .pro_after_chat { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/chat_cho.png); display:block; width:60px; height:60px; background-size:cover; background-repeat:no-repeat; margin-left:28%; background-position:center; }
        progress[value="30"] + .pro_after + .pro_after_chat { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/chat_jung.png); display:block; width:60px; height:60px; background-size:cover; background-repeat:no-repeat; margin-left:43%; background-position:center; }
        progress[value="40"] + .pro_after + .pro_after_chat { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/chat_jung.png); display:block; width:60px; height:60px; background-size:cover; background-repeat:no-repeat; margin-left:43%; background-position:center; }
        progress[value="50"] + .pro_after + .pro_after_chat { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/chat_jung.png); display:block; width:60px; height:60px; background-size:cover; background-repeat:no-repeat; margin-left:43%; background-position:center; }
        progress[value="60"] + .pro_after + .pro_after_chat { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/chat_hu.png); display:block; width:60px; height:60px; background-size:cover; background-repeat:no-repeat; margin-left:70%; background-position:center; }
        progress[value="70"] + .pro_after + .pro_after_chat { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/chat_hu.png); display:block; width:60px; height:60px; background-size:cover; background-repeat:no-repeat; margin-left:70%; background-position:center; }
        progress[value="80"] + .pro_after + .pro_after_chat { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/chat_hu.png); display:block; width:60px; height:60px; background-size:cover; background-repeat:no-repeat; margin-left:70%; background-position:center; }
        progress[value="90"] + .pro_after + .pro_after_chat { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/chat_wan.png); display:block; width:60px; height:60px; background-size:cover; background-repeat:no-repeat; margin-left:85%; background-position:center; }
        progress[value="100"] + .pro_after + .pro_after_chat { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/chat_wan.png); display:block; width:60px; height:60px; background-size:cover; background-repeat:no-repeat; margin-left:85%; background-position:center; }
        progress[value="110"] + .pro_after + .pro_after_chat { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/chat_wan.png); display:block; width:60px; height:60px; background-size:cover; background-repeat:no-repeat; margin-left:85%; background-position:center; }
        .pro_after_bg { z-index:1; position:relative; }
        progress[value="10"] + .pro_after + .pro_after_chat + .pro_after_bg { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/bg_jun.png); display:block; width:100%; height:60px; background-size:cover; background-repeat:no-repeat;  background-position:center; }
        progress[value="20"]+ .pro_after + .pro_after_chat + .pro_after_bg { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/bg_cho.png); display:block; width:100%; height:60px; background-size:cover; background-repeat:no-repeat;  background-position:center; }
        progress[value="30"] + .pro_after + .pro_after_chat + .pro_after_bg { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/bg_jung.png); display:block; width:100%; height:60px; background-size:cover; background-repeat:no-repeat;  background-position:center; }
        progress[value="40"] + .pro_after + .pro_after_chat + .pro_after_bg { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/bg_jung.png); display:block; width:100%; height:60px; background-size:cover; background-repeat:no-repeat;  background-position:center; }
        progress[value="50"] + .pro_after + .pro_after_chat + .pro_after_bg { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/bg_jung.png); display:block; width:100%; height:60px; background-size:cover; background-repeat:no-repeat;  background-position:center; }
        progress[value="60"] + .pro_after + .pro_after_chat + .pro_after_bg { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/bg_hu.png); display:block; width:100%; height:60px; background-size:cover; background-repeat:no-repeat;  background-position:center; }
        progress[value="70"] + .pro_after + .pro_after_chat + .pro_after_bg { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/bg_hu.png); display:block; width:100%; height:60px; background-size:cover; background-repeat:no-repeat;  background-position:center; }
        progress[value="80"] + .pro_after + .pro_after_chat + .pro_after_bg { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/bg_hu.png); display:block; width:100%; height:60px; background-size:cover; background-repeat:no-repeat;  background-position:center; }
        progress[value="90"] + .pro_after + .pro_after_chat + .pro_after_bg { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/bg_wan.png); display:block; width:100%; height:60px; background-size:cover; background-repeat:no-repeat;  background-position:center; }
        progress[value="100"] + .pro_after + .pro_after_chat + .pro_after_bg { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/bg_wan.png); display:block; width:100%; height:60px; background-size:cover; background-repeat:no-repeat;  background-position:center; }
        progress[value="110"] + .pro_after + .pro_after_chat + .pro_after_bg { background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/bg_wan.png); display:block; width:100%; height:60px; background-size:cover; background-repeat:no-repeat; background-position:center; }
        .schedulebox { position:relative; }
        .schedulebox ul { display:flex; text-align:center; justify-content:center; }
        .schedulebox li { width:100%; position:relative; text-align:center; height:145px; border-radius:9px; border:1px solid #f7f7f7; margin:10px; box-shadow:2px 2px 2px grey; }
        .schedulebox .sch_top { padding:10px 0; border-top-right-radius:9px; border-top-left-radius:9px; }
        .schedulebox .sch_bot { padding-top:10px; }
        .schedulebox .sch_top p { color:#fff; font-family:'210gullim'; }
        .greenbox .sch_top { background-color:#33875d; }
        .redbox .sch_top { background-color:#f7b52c; }
        .tab_top { border-top-left-radius:9px; border-top-right-radius:9px; height:18px; background-color:#33875d; }
        .outline { padding:50px 10px 10px; background-color:#fff; border-bottom-right-radius:9px; border-bottom-left-radius:9px; }
        .box_out { background-color:#e7e7e7; padding:10px; }
        .tab_menu_container { width:90%; margin:0 auto; }
        .reper_bar { font-size:0.7rem; padding:25px 15px 15px; }
        .cont { padding-top:30px; }
        .star h3 { font-family:'210gullim'; font-weight:normal; }
        .star_text { padding:10px; line-height:1.8; }
        .schdulebox_notice { text-align:center; color:#666; padding:30px 0; font-family:'210gullim'; }
        .schdulebox_notice b { color:#666; }
        .weeks_menu td { text-align:center; vertical-align:middle; font-size:0.7rem; }
        .per_chart_name { display:flex; justify-content:center; }
        .per_chart_name p { margin:5px 20px; text-align:center; font-family:'210gullim'; }
        .under_chart { display:flex; justify-content:center; padding:15px 0 15px 0; }
        .under_chart p { margin:5px 5px; }
        .under_chart span { margin-right:10px;  }
        .nutr_table { text-align:center; vertical-align:middle; }
        .nutr_table td { text-align:center; vertical-align:middle; }
        .bingopan div { display:flex; justify-content:space-around; font-size:8px; }
        .bingopan p { margin:3px; width:100%; width:100%; background-color:#f0f0f0; text-align:center; vertical-align:middle; height:35px; padding:9px 0; border-radius:9px; font-weight:normal; font-size:11px; }
        .hr-sect { display:flex; flex-basis:100%; align-items:center; font-size:17px; margin:8px 0; }
        .hr-sect:before, .hr-sect:after { content:''; flex-grow:1; background:rgba(0,0,0,0.35); height:1px; font-size:0; line-height:0px; margin:0px 16px; }
        .hr-sect p { font-size:22px; font-weight:800; }
        .graph_guide { text-align:center; }
        .graph_guide b { font-weight:800; }
        .graph_guide span { font-weight:800; }
        .dodam_tip b { font-size:23px; font-weight:800; padding-left:10px; }
        .dodam_tip p { padding:10px; line-height:1.8; }
        .number { padding-bottom:25px; }
        .jungthree { display:none; }
        .hugipan { display:none; }
        .report_title { padding:5px 0; }
        .report_title h3 { font-family:'210gullim'; font-weight:normal; padding-left:60px; line-height:1.3; background-image:url(/wp-content/themes/storefront-child/image/otherpage/report/new_dodamlogo.png); background-repeat:no-repeat; background-size:50px; background-position:0% 50%; }
        /*--fixed--*/
        .fixed_title { position:fixed; width:100%; background-color:#fff; padding:10px; top:47px; z-index:20; }
        .fixedbox { padding-top:15px; position:fixed; width:95.5%; background:#e7e7e7; z-index:20; top:130px; }
        .tab_box_container { padding-top:75px; }
        @media only screen and (min-width:1070px){
            .fixedbox { max-width:398px; }
            .fixed_title { max-width:418px; }
            .my_module_mask { margin-left:50%; max-width:418px; }
        }
        .before_star { padding-left:30px; background-image:url(/wp-content/themes/storefront-child/image/icon/star_red.png); background-repeat:no-repeat; background-size:18px; background-position:2% 50%; }
        .pro_after_red { display:block; color:#33875d; line-height:1; position:absolute; width:200px; font-family:'210gullim'; font-weight:normal; top:320px; font-size:14px; }
        /*--간식--*/
        .snack_name { text-align:center; font-weight:800; font-size:28px; padding:10px; }
        .snack_nutr { text-align:center; padding:10px 0; padding-bottom:30px; }
        .snack_nutr p { font-size:16px; color:#666; line-height:1.9; padding-top:20px; }
        .snack_nutr b { font-size:22px; font-weight:800; }
        .snack_nutr ul { margin-top:5px; margin-bottom:10px; display:flex; justify-content:space-around; border-top:10px solid #dae000; border-radius:9px; width:90%; margin:0 auto; }
        .snack_nutr li { font-size:20px; font-weight:700; background-color:#e7e7e7; width:100%; padding:3px 0; }
        .recipe_title { text-align:center; font-size:20px; font-weight:800; }
        .recipe_menu { text-align:center; font-size:24px; font-weight:800; padding-bottom:10px; }
        .recipe_start { padding-left:5px; padding-top:20px; }
        .recipe_start p { padding-bottom:8px; font-size:16px; color:#666; }
        .recipe_start span { font-size:20px; font-weight:800; }
        .snack_end { text-align:center; font-size:14px; padding-bottom:20px; }
        .snack_tip { padding-top:10px; padding-bottom:10px; margin-top:20px; border-radius:9px; border:2px solid #8cc364; border-top:8px solid #8cc364; margin-bottom:20px; }
        .menual_tip_name { color:#8cc364; font-weight:800; font-size:18px; padding-top:7px; padding-bottom:5px; padding-left:30px; text-align:left; background-image:url(/wp-content/themes/storefront-child/image/icon/star_green.png); background-repeat:no-repeat; background-size:18px; background-position:2% 50%; }
        .menual_tip_text { padding-bottom:5px; color:#8cc364; font-weight:700; padding-left:15px; text-align:left; padding-right:15px; font-size:16px;}
        .jungthree_end {text-align:center; display:none; padding-top:20px;}
        .jungthree_end p { font-size:17px; }
        .jungthree_end span { font-weight:800; }
        .jungthree_box ul { display:flex; justify-content:space-around; }
        .jungthree_box li { width:40%; }
        .jungthree_bot { text-align:center; }
        .jungthree_bot p { font-size:22px; padding:8px; font-weight:800; }
        .google-visualization-tooltip { z-index:3 !important; width:150px !important; height:50px !important; border-radius:9px; border:2px solid #e7e7e7; }
        .google-visualization-tooltip ul { font-family:'NanumSquare' !important; padding:10px; line-height:1; }
        .google-visualization-tooltip li { margin:0 !important; padding:0 !important; }
        .google-visualization-tooltip li span { font-family:'NanumSquare' !important; font-size:15px !important;  }
        .google-visualization-tooltip-item-list { margin:0; }
        .after_height { text-align:center; font-size:17px; margin-bottom:20px; }
        .after_height b { font-weight:800; }
        .after_height span { font-size:26px; }
        .after_height .point_text { color:#ffc85a; }
        .under_chart span { border-radius:3px; }
        .star_texts {padding:10px; line-height:1.8;}
        .star_texts p:first-letter { color:#33875d; line-height:1; font-weight:800; font-size:30px; }
        .progresss { height:30px; margin-bottom:20px; overflow:hidden; background-color:#f5f5f5; border-radius:4px; box-shadow:inset 0 1px 2px rgba(0,0,0,.1); -webkit-box-shadow:inset 0 1px 2px rgba(0,0,0,.1); }
        .progress-bar.active { animation:progress-bar-stripes 2s linear infinite; -webkit-animation:progress-bar-stripes 2s linear infinite; -o-animation:progress-bar-stripes 2s linear infinite; }
        .progress-bar { float:left; background-color:#999;  height:100%; font-size:12px; line-height:20px; color:#fff; text-align:center; transition:width .6s ease; -webkit-transition:width .6s ease; -o-transition:width .6s ease; }
        .progress-bar-success.active { background-color:#8cc364; }
        .progress-bar-warning.active { background-color:#8cc364; }
        .progress-bar-danger.active { background-color:#8cc364; }
        .progress-bar-primary.active { background-color:#8cc364; }
        .progress-bar-info.active { background-color:#8cc364; }
        .progress-bar-success.now_active { background-color:#33875d; }
        .progress-bar-warning.now_active { background-color:#33875d; }
        .progress-bar-danger.now_active { background-color:#33875d; }
        .progress-bar-primary.now_active { background-color:#33875d; }
        .progress-bar-info.now_active { background-color:#33875d; }
        .progress-bar-striped { background-image:linear-gradient(90deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent); background-size:50px; }
        .progress-bar p { color:#fff; }
        .old_bingo { background-color:#999 !important; color:#fff; }
        .shickdan .sch_bot { text-align:left; }
        .shickdan .sch_bot p { padding-left:5px; }
        .shickdan .sch_bot p:before { content:''; width:3px; height:3px; display:inline-block; border-radius:100%; margin:0 5px; margin-bottom:2px; background-color:#999; }
        .shickdan li { overflow:hidden; height:235px; }
        .ganshickdan li { height:194px; }
        .shickdan li p { white-space:nowrap; }
        .shickdan .sch_bot { font-size:14px; padding:0; }
        .shickdan .floor_one { padding:15px 0; }
        .shickdan .floor_two { padding:15px 0; background-color:#e7e7e7; }
        .my_module_mask { position:fixed; right:0; bottom:0; left:0; font-size:0; top:0px; z-index:400; }
        .my_module_mask:before { content:''; position:absolute; top:0; right:0; bottom:0; left:0; background-color:#fff; opacity:.9; }
        .my_module_mask > div { position:relative; display:inline-block; width:calc(100% - 1px); max-height:100%; padding:80px 20px; box-sizing:border-box; color:#333; text-align:center; vertical-align:middle; overflow-Y:auto; }
        .my_module_mask > div h1 { display:inline-block; width:129px; height:131px; background:url(/wp-content/themes/storefront-child/image/dodam_old_logo.png) no-repeat center / 129px auto; color:transparent; font-size:1px; }
        .my_module_mask > div b { display:block; margin-top:29px; font-size:24px; font-family:'NanumSquareRound'; font-weight:800; line-height:1.3; letter-spacing:-1.2px; }
        .my_module_mask > div p { margin-top:10px; font-size:18px; line-height:1.6; letter-spacing:-0.6px; }
        .my_module_mask > div .btn_area { margin-top:40px; display:table; width:100%; table-layout:fixed; box-sizing:border-box; }
        .btn_area > li { position:relative; display:table-cell; vertical-align:top; }
        .btn_area > li [class*="btn_ty"] { display:block; width:100%; }
        .btn_ty { background-color:#427ac7; height:50px; padding:0 10px; box-sizing:border-box; border-radius:9px; color:#fff; font-size:17px; font-weight:800; text-align:center; line-height:50px; letter-spacing:-0.6px; outline:none; }
        .sample_bottom b { font-size:22px; font-weight:800; }
        .sample_bottom p { font-size:18px; }
        .sample_text { text-align:center; }
        #faketabbox2 .bingopan:after { background-image:linear-gradient(40deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent); background-size:50px; content:'Sample'; background-color:#999; width:100%; height:40px; position:absolute; display:block; left:0; opacity:.9; vertical-align:middle; color:#fff; font-weight:800; line-height:2; text-align:center; font-size:22px; top:50%; z-index:2; }
        #faketabbox2 #fakedonutchart:after { background-image:linear-gradient(40deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent); background-size:50px; content:'Sample'; background-color:#999; width:100%; height:40px; position:absolute; display:block; left:0; opacity:.9; vertical-align:middle; color:#fff; font-weight:800; line-height:2; text-align:center; font-size:22px; top:50%; z-index:2; }
        #faketabbox2 #fake_per_chart_div:after { background-image:linear-gradient(40deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent); background-size:50px; content:'Sample'; background-color:#999; width:100%; height:40px; position:absolute; display:block; left:0; opacity:.9; vertical-align:middle; color:#fff; font-weight:800; line-height:2; text-align:center; font-size:22px; top:50%; z-index:2; }
        #faketabbox2 .star_text:after { background-image:linear-gradient(40deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent); background-size:50px; content:'Sample'; background-color:#999; width:100%; height:40px; position:absolute; display:block; left:0; opacity:.9; vertical-align:middle; color:#fff; font-weight:800; line-height:2; text-align:center; font-size:22px; top:50%; z-index:2; }
        #faketabbox2 #fakedonutchart, #fake_per_chart_div,.bingopan, .star_text { position:relative; }
        #faketabbox3 #fake_chart_thr:after { background-image:linear-gradient(40deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent); background-size:50px; content:'Sample'; background-color:#999; width:100%; height:40px; position:absolute; display:block; left:0; opacity:.9; vertical-align:middle; color:#fff; font-weight:800; line-height:2; text-align:center; font-size:22px; top:50%; z-index:2; }
        #faketabbox3 #fake_chart_fow:after { background-image:linear-gradient(40deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent); background-size:50px; content:'Sample'; background-color:#999; width:100%; height:40px; position:absolute; display:block; left:0; opacity:.9; vertical-align:middle; color:#fff; font-weight:800; line-height:2; text-align:center; font-size:22px; top:50%; z-index:2; }
        #faketabbox3 #fake_chart_fow, #fake_chart_thr { position:relative; }

        #auth_snack_block { display:block; overflow:hidden; position:relative; }
        #auth_snack_block.authoff:after { content:'간식옵션을 선택하지 않았습니다.'; border-radius:9px; position:absolute; top:0; left:0; width:100%; height:100%; display:block; background-color:#e7e7e7; overflow:hidden; line-height:26; text-align:center; }

        .back_header .back_head .title h2:after { content:'\25B6'; padding:0 5px; position:absolute; font-size:12px; padding-top:4px; transform:rotate(90deg); -wekkit-transform:rotate(90deg); }
        .back_header .back_head .title .ons:after { transform:rotate(270deg); -wekkit-transform:rotate(270deg); }
        .stic { top:50px; }
    </style>
    <div class="period_choice">
    <div class="choice_tab flex">
        <div class="flexible choice_tabs">
            <p><a href="/menucheck">식단 확인하기</a></p>
        </div>
        <div class="flexible choice_tabs  open">
            <p><a href="/dodamreport">보고서 확인하기</a></p>
        </div>
    </div>
    </div>
    <div class="">
        <div class="back_header">
            <div class="back_head">
                <li class="back">
                    <a href="javascript:window.history.back();"></a>
                </li>
                <li class="title" id="move_paycheck_click">
                    <h2>영양보고서</h2>
                </li>
            </div>
        </div>

        <div class="box_out">
            <div class="fixedbox">
                <div class="tab_menu_container">
                    <button class="tab_menu_btn on" id="top_btn01" type="button">기본정보</button>
                    <button class="tab_menu_btn"  id="top_btn02" type="button">영양정보</button>
                    <button class="tab_menu_btn" id="top_btn03" type="button">성장발달정보</button>
                    <button class="tab_menu_btn" id="top_btn04" type="button">교육자료</button>
                </div>
                <div class="tab_top"></div>
            </div>
            <div class="tab_box_container">
                <!--기본-->
                <div class="tab_box tab1 on">
                    <div  id="tabbox1">
                    <div class="outline" style="padding-bottom:30px; padding-top:0;">
                        <div class="inline">
                            <div class="cont" style="padding:0;">
                                <div class="prograss">
                                    <progress class="progress" style="display:none;" value="<?php echo $gaze ?>" max="110"></progress>
                                    <div class="pro_after"></div>
                                    <div class="pro_after_chat"></div>
                                    <div class="pro_after_bg"></div>
                                </div>
                                <div class="progresss" style="margin-top:-25px;">
                                    <div id="pro_jun" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:10%">
                                        <p></p>
                                    </div>
                                    <div id="pro_cho" class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" style="width:10%">
                                        <p></p>
                                    </div>
                                    <div id="pro_jung" class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" style="width:26.6%">
                                        <p></p>
                                    </div>
                                    <div id="pro_hu" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" style="width:26.6%">
                                        <p></p>
                                    </div>
                                    <div id="pro_wan" class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" style="width:26.6%">
                                        <p></p>
                                    </div>
                                    <div class="pro_after_red" id="startpoint" style="display:block;">▲<br>도담밀과 함께<br>시작한시기</div>
                                    
                                </div>
                                <div class="flag-bar" style="display:none; width:30px; height:30px; margin-top:-92px; position:absolute; right:30px;">
                                    <img src="/wp-content/themes/storefront-child/image/otherpage/report/falg.png">
                                </div>
                            </div>
                            <div class="table_view" style="margin-top:70px;">
                                <b>아이이름</b><p><?php echo $user_babyname ?></p>
                                <b>생년월일</b><p><?php echo $birthday_year ?>년 <?php echo $birthday_month ?>월 <?php echo $birthday_day ?>일</p>
                                <b>생후날짜</b><p>생후 <?php echo $todgn_date ?>일 <span style="font-size:13px; vertical-align:bottom; color:#999;">( <?php echo $user_monthly ?> 개월 )</span></p>
                                <b>현재단계</b><p><?php echo $baby_period ?> 단계</p>
                                <b>신장</b><p><?php echo $user_height ?> cm <span style="font-size:13px; vertical-align:bottom; color:#999;">( <?php echo $reserch_date ?> 기준 )</span></p>
                                <b>체중</b><p><?php echo $user_weight ?> kg <span style="font-size:13px; vertical-align:bottom; color:#999;">( <?php echo $reserch_date ?> 기준 )</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="outline" style="margin-top:15px; padding:10px; border-radius:9px; overflow:hidden;">
                        <div class="inline">
                            <div class="cont">
                                <div class="star">
                                    <h3 class="before_star">도담밀의 한마디</h3>
                                </div>
                                <div class="star_texts">
                                    <p><?php echo $now_precautions ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="outline" style="margin-top:15px; padding:10px; border-radius:9px; overflow:hidden;">
                        <div class="inline">
                            <div class="cont">
                                <div class="number">
                                    <p><span></span>다음달 <?php echo $user_babyname ?>(이)의 식사계획</p>
                                </div>
                                <div class="schedule">
                                    <div class="top">
                                        <p class="top_sub graph_title">수유계획</p>
                                        <div class="schedulebox greenbox">
                                            <ul>
                                                <li>
                                                    <div class="sch_top">
                                                        <p>하루섭취량</p>
                                                    </div>
                                                    <div class="sch_bot">
                                                        <p><?php echo $mealschedule_nursing ?></p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="sch_top">
                                                        <p>하루 수유횟수</p>
                                                    </div>
                                                    <div class="sch_bot">
                                                        <p><?php echo $mealschedule_oftime ?></p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="sch_top">
                                                        <p>수유시간</p>
                                                    </div>
                                                    <div class="sch_bot">
                                                        <p><?php echo $mealschedule_atime ?></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="top" style="padding-top:30px;">
                                            <p class="top_sub graph_title">이유식 섭취 계획</p>
                                            <div class="schedulebox redbox">
                                                <ul>
                                                    <li>
                                                        <div class="sch_top">
                                                            <p>1회 섭취량</p>
                                                        </div>
                                                        <div class="sch_bot">
                                                            <p><?php echo $mealschedule_amount ?></p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="sch_top">
                                                            <p>하루 섭취 횟수</p>
                                                        </div>
                                                        <div class="sch_bot">
                                                            <p><?php echo $mealschedule_noftime ?></p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="sch_top">
                                                            <p>섭취시간</p>
                                                        </div>
                                                        <div class="sch_bot">
                                                            <p><?php echo $mealschedule_natime ?></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="schedulebox redbox">
                                                <ul>
                                                    <li>
                                                        <div class="sch_top">
                                                            <p>형태</p>
                                                        </div>
                                                        <div class="sch_bot">
                                                            <p><?php echo $mealschedule_forms ?></p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="sch_top">
                                                            <p>농도</p>
                                                        </div>
                                                        <div class="sch_bot">
                                                            <p><?php echo $mealschedule_viscosity ?></p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="sch_top">
                                                            <p>간식섭취횟수</p>
                                                        </div>
                                                        <div class="sch_bot">
                                                            <p><?php echo $mealschedule_snack ?></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <p class="schdulebox_notice">섭취량과 횟수, 시간은 아이의 섭취정도와<br>생활패턴에 따라 달라질 수 있습니다.</p>
                                        </div>
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
                <div id="faketabbox1" style="display:none;">
                    <div class="outline" style="padding-bottom:30px; padding-top:0;">
                        <div class="inline">
                            <div class="cont" style="padding:0;">
                                <div class="prograss">
                                    <progress class="progress" style="display:none;" value="40" max="110"></progress>
                                    <div class="pro_after"></div>
                                    <div class="pro_after_chat"></div>
                                    <div class="pro_after_bg"></div>
                                    
                                </div>
                                <div class="progresss" style="margin-top:-25px;">
                                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:10%">
                                        <p></p>
                                    </div>
                                    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" style="width:10%">
                                        <p></p>
                                    </div>
                                    <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" style="width:26.6%">
                                        <p></p>
                                    </div>
                                    <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" style="width:26.6%">
                                        <p></p>
                                    </div>
                                    <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" style="width:26.6%">
                                        <p></p>
                                    </div>
                                    <div class="pro_after_red" style="display:block;">▲<br>도담밀과 함께<br>시작한시기</div>
                                    
                                </div>
                                <div class="flag-bar" style="display:none; width:30px; height:30px; margin-top:-92px; position:absolute; right:30px;">
                                    <img src="/wp-content/themes/storefront-child/image/otherpage/report/falg.png">
                                </div>
                            </div>
                            <div class="table_view" style="margin-top:70px;">
                                <b>아이이름</b><p>김도담(샘플)</p>
                                <b>생년월일</b><p>2020년 8월 15일</p>
                                <b>생후날짜</b><p>생후 199일 <span style="font-size:13px; vertical-align:bottom; color:#999;">( 6 개월 )</span></p>
                                <b>현재단계</b><p><?php echo $baby_period ?> 단계</p>
                                <b>신장</b><p>65.4 cm <span style="font-size:13px; vertical-align:bottom; color:#999;">( 2021.02.25 기준 )</span></p>
                                <b>체중</b><p>6.7 kg <span style="font-size:13px; vertical-align:bottom; color:#999;">( 2021.02.25 기준 )</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="outline" style="margin-top:15px; padding:10px; border-radius:9px; overflow:hidden;">
                        <div class="inline">
                            <div class="cont">
                                <div class="star">
                                    <h3 class="before_star">도담밀의 한마디</h3>
                                </div>
                                <div class="star_texts">
                                    <p>유치가 나면서 어느정도 입자가 있는 음식을 먹을 수 있게 돼요. 도담밀의 중기 2달차 이유식은 턱근육 발달을 위해 단백질이 많은 고기와 새로운 질감을 느낄 수 있는여러 채소 및 슈퍼푸드로 구성하였어요.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="outline" style="margin-top:15px; padding:10px; border-radius:9px; overflow:hidden;">
                        <div class="inline">
                            <div class="cont">
                                <div class="number">
                                    <p><span></span>다음달 김도담(이)의 식사계획</p>
                                </div>
                                <div class="schedule">
                                    <div class="top">
                                        <p class="top_sub graph_title">수유계획</p>
                                        <div class="schedulebox greenbox">
                                            <ul>
                                                <li>
                                                    <div class="sch_top">
                                                        <p>하루섭취량</p>
                                                    </div>
                                                    <div class="sch_bot">
                                                        <p><br>700-800ml<br></p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="sch_top">
                                                        <p>하루 수유횟수</p>
                                                    </div>
                                                    <div class="sch_bot">
                                                        <p><br>3-5회<br></p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="sch_top">
                                                        <p>수유시간</p>
                                                    </div>
                                                    <div class="sch_bot">
                                                        <p>5시간<br>~<br>6시간마다</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="top" style="padding-top:30px;">
                                            <p class="top_sub graph_title">이유식 섭취 계획</p>
                                            <div class="schedulebox redbox">
                                                <ul>
                                                    <li>
                                                        <div class="sch_top">
                                                            <p>1회 섭취량</p>
                                                        </div>
                                                        <div class="sch_bot">
                                                            <p><br>80~120g<br></p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="sch_top">
                                                            <p>하루 섭취 횟수</p>
                                                        </div>
                                                        <div class="sch_bot">
                                                            <p><br>2회<br></p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="sch_top">
                                                            <p>섭취시간</p>
                                                        </div>
                                                        <div class="sch_bot">
                                                            <p>오전 9시<br><br>오후 5시</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="schedulebox redbox">
                                                <ul>
                                                    <li>
                                                        <div class="sch_top">
                                                            <p>형태</p>
                                                        </div>
                                                        <div class="sch_bot">
                                                            <p><br>쌀알 절반 크기<br></p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="sch_top">
                                                            <p>농도</p>
                                                        </div>
                                                        <div class="sch_bot">
                                                            <p><br>불린 쌀1 : 물7<br></p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="sch_top">
                                                            <p>간식섭취횟수</p>
                                                        </div>
                                                        <div class="sch_bot">
                                                        <p><br>1회<br></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <p class="schdulebox_notice">섭취량과 횟수, 시간은 아이의 섭취정도와<br>생활패턴에 따라 달라질 수 있습니다.</p>
                                        </div>
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
            </div>
            </div>
            <!--두번째-->
            <div class="tab_box tab2">
                <div id="tabbox2">
                    <div class="outline">
                        <div class="inline">
                            <div class="cont">
                                <div class="number">
                                    <p><span></span>지금은 <?php echo $baby_period ?> 단계</p>
                                </div>
                                <div class="star">
                                    <div class="star_texts">
                                        <p><?php echo $now_menuinfo ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="cont">
                                <div class="number">
                                    <p><span></span>지난달 제공된 식단</p>
                                </div>
                                <div class="schedulebox greenbox shickdan">
                                    <ul>
                                        <li>
                                            <div class="sch_top">
                                                <p>1주차</p>
                                            </div>
                                            <div class="sch_bot">
                                                <div class="floor_one">
                                                    <p><?php echo preg_replace("/[(4)]/", "",$menunamd) ?></p>
                                                    <p><?php echo preg_replace("/[(4)]/", "",$menunamdd) ?></p>
                                                    <p><?php echo preg_replace("/[(4)]/", "",$menunamddd) ?></p>
                                                </div>
                                                <div class="floor_two">
                                                    <p><?php echo $menunamdddd ?></p>
                                                    <p><?php echo $menunamddddd ?></p>
                                                    <p><?php echo $menunamdddddd ?></p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sch_top">
                                                <p>2주차</p>
                                            </div>
                                            <div class="sch_bot">
                                                <div class="floor_one">
                                                    <p><?php echo preg_replace("/[(4)]/", "",$menunamc) ?></p>
                                                    <p><?php echo preg_replace("/[(4)]/", "",$menunamcc) ?></p>
                                                    <p><?php echo preg_replace("/[(4)]/", "",$menunamccc) ?></p>
                                                </div>
                                                <div class="floor_two">
                                                    <p><?php echo $menunamcccc ?></p>
                                                    <p><?php echo $menunamccccc ?></p>
                                                    <p><?php echo $menunamcccccc ?></p>
                                                </div>
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
                                                    <p><?php echo preg_replace("/[(4)]/", "",$menunamb) ?></p>
                                                    <p><?php echo preg_replace("/[(4)]/", "",$menunambb) ?></p>
                                                    <p><?php echo preg_replace("/[(4)]/", "",$menunambbb) ?></p>
                                                </div>
                                                <div class="floor_two">
                                                    <p><?php echo $menunambbbb ?></p>
                                                    <p><?php echo $menunambbbbb ?></p>
                                                    <p><?php echo $menunambbbbbb ?></p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sch_top">
                                                <p>4주차</p>
                                            </div>
                                            <div class="sch_bot">
                                                <div class="floor_one">
                                                    <p><?php echo preg_replace("/[(4)]/", "",$menunama) ?></p>
                                                    <p><?php echo preg_replace("/[(4)]/", "",$menunamaa) ?></p>
                                                    <p><?php echo preg_replace("/[(4)]/", "",$menunamaaa) ?></p>
                                                </div>
                                                <div class="floor_two">
                                                    <p><?php echo $menunamaaaa ?></p>
                                                    <p><?php echo $menunamaaaaa ?></p>
                                                    <p><?php echo $menunamaaaaaa ?></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!--간식식단-->
                            <div class="cont">
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
                                                    <p><?php echo $snack_table_menu[1][1] ?></p>
                                                    <p><?php echo $snack_table_menu[1][2] ?></p>
                                                </div>
                                                <div class="floor_two">
                                                    <p><?php echo $snack_table_menu[1][3] ?></p>
                                                    <p><?php echo $snack_table_menu[1][4] ?></p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sch_top">
                                                <p>2주차</p>
                                            </div>
                                            <div class="sch_bot">
                                                <div class="floor_one">
                                                    <p><?php echo $snack_table_menu[2][1] ?></p>
                                                    <p><?php echo $snack_table_menu[2][2] ?></p>
                                                </div>
                                                <div class="floor_two">
                                                    <p><?php echo $snack_table_menu[2][3] ?></p>
                                                    <p><?php echo $snack_table_menu[2][4] ?></p>
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
                                                    <p><?php echo $snack_table_menu[3][1] ?></p>
                                                    <p><?php echo $snack_table_menu[3][2] ?></p>
                                                </div>
                                                <div class="floor_two">
                                                    <p><?php echo $snack_table_menu[3][3] ?></p>
                                                    <p><?php echo $snack_table_menu[3][4] ?></p>
                                                </div>
                                        </li>
                                        <li>
                                            <div class="sch_top">
                                                <p>4주차</p>
                                            </div>
                                            <div class="sch_bot">
                                                <div class="floor_one">
                                                    <p><?php echo $snack_table_menu[4][1] ?></p>
                                                    <p><?php echo $snack_table_menu[4][2] ?></p>
                                                </div>
                                                <div class="floor_two">
                                                    <p><?php echo $snack_table_menu[4][3] ?></p>
                                                    <p><?php echo $snack_table_menu[4][4] ?></p>
                                                </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="cont">
                                <div class="">
                                    <div class="number">
                                        <p><span></span>영양소 제공량</p>
                                    </div>
                                    <div style="text-align:center; padding-bottom:20px;">
                                        <p>이번달 도담밀의 <b>영양소 제공량</b>은</p>
                                        <p><b>권장 섭취량의 약 <span style="font-size:25px; font-family:'210gullim'; font-weight:normal; color:#33875d;"><?php echo (int)$pers_cal ?>%</span>수준으로 제공</b>되었습니다.</p>
                                    </div>
                                    <div id="per_chart_div" style="text-align:center; margin:0 auto;"></div>
                                    <div class="per_chart_name">
                                        <p>열량</p>
                                        <p>탄수화물</p>
                                        <p>단백질</p>
                                        <p>지방</p>
                                    </div>
                                    <div class="under_chart">
                                        <p><span style="border-left:20px solid #e7e7e7;"></span>목표량</p>
                                        <p><span style="border-left:20px solid #8cc364;" ></span>제공량</p>
                                    </div>
                                    <table class="nutr_table">
                                        <tr>
                                            <td style="width:25%; background-color:#8cc364; border-top-left-radius:9px; border-top:1px solid #e7e7e7; border-left:1px solid #e7e7e7; border-right:1px solid #e7e7e7;"></td>
                                            <td style="background-color:#e9ec66; font-family:'210gullim'; color:#3e3e3e; font-size:13px; border-top:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;">열량<span style="font-size:10px; color:#3e3e3e;">( kcal )</span></td>
                                            <td style="background-color:#e9ec66; font-family:'210gullim'; color:#3e3e3e; font-size:13px; border-top:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;">탄수화물<span style="font-size:10px; color:#3e3e3e;">( g )</span></td>
                                            <td style="background-color:#e9ec66; font-family:'210gullim'; color:#3e3e3e; font-size:13px; border-top:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;">단백질<span style="font-size:10px; color:#3e3e3e;">( g )</span></td>
                                            <td style="background-color:#e9ec66; font-family:'210gullim'; color:#3e3e3e; font-size:13px; border-top-right-radius:9px; border-top:1px solid #e7e7e7; border-right:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;">지방<span style="font-size:10px; color:#3e3e3e;">( g )</span></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color:#8cc364 !important; font-family:'210gullim'; color:#fff; font-size:15px; border-left:1px solid #e7e7e7; border-right:1px solid #e7e7e7;">권장섭취량</td>
                                            <td><?php echo round($sum_need_cal) ?></td>
                                            <td><?php echo round($sum_need_car) ?></td>
                                            <td><?php echo round($sum_need_pro) ?></td>
                                            <td style="border-right:1px solid #e7e7e7;"><?php echo round($sum_need_pat) ?></td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom-left-radius:9px; background-color:#8cc364; font-family:'210gullim'; color:#fff; font-size:15px; border-left:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7; border-right:1px solid #e7e7e7;">도담밀<br>제공량</td>
                                            <td style="border-bottom:1px solid #e7e7e7;"><?php echo round($sum_cal) ?></td>
                                            <td style="border-bottom:1px solid #e7e7e7;"><?php echo round($sum_car) ?></td>
                                            <td style="border-bottom:1px solid #e7e7e7;"><?php echo round($sum_pro) ?></td>
                                            <td style="border-bottom-right-radius:9px; border-bottom:1px solid #e7e7e7; border-right:1px solid #e7e7e7;"><?php echo round($sum_pat) ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="schdulebox_notice" id="chogiview">
                                    <p>이유식 초기까지는 섭취연습을 하는 시기로, 분유 또는 모유를 통해 대부분의 영양소를 섭취합니다.</p>
                                </div>
                            </div>
                            <div class="cont">
                                <div class="">
                                    <div class="number">
                                        <p><span></span>식품군별 제공 비율</p>
                                    </div>
                                    <div id="donutchart"></div>
                                    <div class="under_chart" style="padding-bottom:0;">
                                        <p><span style="border-left:20px solid #af4b22;"></span>곡류</p>
                                        <p><span style="border-left:20px solid #d2612a;"></span>단백질류</p>
                                        <p><span style="border-left:20px solid #7d895b;"></span>유제품류</p>
                                    </div>
                                    <div class="under_chart" style="padding-top:0;">
                                        <p><span style="border-left:20px solid #ffc85a;"></span>과일류</p>
                                        <p><span style="border-left:20px solid #aacf52;"></span>채소류</p>
                                    </div>
                                </div>
                            </div>
                            <div class="cont">
                                <!--빙고판-->
                                <div class="" id="bingopan">
                                    <div class="number">
                                        <p><span></span>도담밀과 함께 먹어본 재료</p>
                                    </div>
                                    <div class="bingopan">
                                        <div>
                                            <p id="rkwl">가지</p>
                                            <p id="rkawk">감자</p>
                                            <p id="rhrnak">고구마</p>
                                            <p id="rmseo">근대</p>
                                            <p id="rla">김</p>
                                            <p id="smxkfl">느타리</p>
                                            <p id="eksghqkr">단호박</p>
                                        </div>
                                        <div>
                                            <p id="ekdrms">당근</p>
                                            <p id="eocn">대추</p>
                                            <p id="fhapdls">로메인</p>
                                            <p id="an">무</p>
                                            <p id="aldur">미역</p>
                                            <p id="qka">밤</p>
                                            <p id="qocn">배추</p>
                                        </div>
                                        <div>
                                            <p id="qmfhzhffl">브로콜리</p>
                                            <p id="qlxkals">비타민</p>
                                            <p id="qlxm">비트</p>
                                            <p id="tothddl">새송이</p>
                                            <p id="tlrmacl">시금치</p>
                                            <p id="dkdnr">아욱</p>
                                            <p id="doghqkr">애호박</p>
                                        </div>
                                        <div>
                                            <p id="didqocn">양배추</p>
                                            <p id="didthddl">양송이</p>
                                            <p id="didvk">양파</p>
                                            <p id="dusrms">연근</p>
                                            <p id="dhdl">오이</p>
                                            <p id="dndjd">우엉</p>
                                            <p id="wjrco">적채</p>
                                        </div>
                                        <div>
                                            <p id="cjdrudco">청경채</p>
                                            <p id="zpdlf">케일</p>
                                            <p id="qkddnfxhakxh">방울토마토</p>
                                            <p id="vkvmflzk">파프리카</p>
                                            <p id="vyrh">표고</p>
                                            <p id="ekfrrhrl">닭고기</p>
                                            <p id="fpsxlfzhd">렌틸콩</p>
                                        </div>
                                        <div>
                                            <p id="quddkflzhd">병아리콩</p>
                                            <p id="dhksenzhd">완두콩</p>
                                            <p id="rjadmszhd">검은콩</p>
                                            <p id="dusenqn">연두부</p>
                                            <p id="gksdn">한우</p>
                                            <p id="rnlfl">귀리</p>
                                            <p id="tntn">수수</p>
                                        </div>
                                        <div>
                                            <p id="tkf">쌀</p>
                                            <p id="wjsqnsrkfn">전분가루</p>
                                            <p id="ckwh">차조</p>
                                            <p id="ckqtkf">찹쌀</p>
                                            <p id="znlshdk">퀴노아</p>
                                            <p id="gusal">현미</p>
                                            <p id="gmral">흑미</p>

                                        </div>
                                        <div>
                                            <p id="alfrkfn">밀가루</p>
                                            <p id="gkscjsrkfn">한천가루</p>
                                            <p id="dkahsem">아몬드</p>
                                            <p id="qksksk">바나나</p>
                                            <p id="qo">배</p>
                                            <p id="qmffnqpfl">블루베리</p>
                                            <p id="tkrhk">사과</p>
                                            <p id="clwm">치즈</p>
                                        </div>
                                    </div>
                                    <div class="under_chart">
                                        <p><span style="border-left:20px solid #e7e7e7;"></span>도담밀과 먹어볼재료</p>
                                        <p><span style="border-left:20px solid #999;"></span>도담밀전에 먹어본재료</p>
                                    </div>
                                    <div class="under_chart" style="padding:0;">
                                        <p><span style="border-left:20px solid #aacf52;"></span>먹은 채소</p>
                                        <p><span style="border-left:20px solid #d2612a;"></span>먹은 단백질</p>
                                        <p><span style="border-left:20px solid #af4b22;"></span>먹은 곡물</p>
                                    </div>
                                    <div class="under_chart" style="padding-top:0;">
                                        <p><span style="border-left:20px solid #ffc85a;"></span>먹은 과일</p>
                                        <p><span style="border-left:20px solid #7d895b;"></span>먹은 유제품</p>
                                    </div>
                                    <div class="bingo_end" style="display:none;">
                                        <p><span><?php echo $user_babyname ?></span>(이)가 새로운 재료들을 모두 먹어보았어요!<br>후기 이유식부터는 복합적인 맛에 익숙해지도록<br>보다 다양한 재료를 혼합하여 만든 요리가 제공될 거에요.</p>
                                        <p class="schdulebox_notice">다음 보고서부터는 위 내용 대신 '함께 먹으면 좋은 간식재료' 관련 내용을 제공할 예정입니다.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="reper_bar">
                        <p>권장섭취량은 2015 한국인 영양소섭취기준을 바탕으로, 월령별 평균 수유량 및 간식섭취량을 뺀 후 계산되었습니다.</p>
                    </div>
                    <div class="outline" style="border-radius:9px;">
                        <div class="inline">
                            <div class="cont" style="padding-top:0;">
                                <div class="number">
                                    <p><span></span>이달의 영양소</p>
                                </div>
                                <div class="month_nutr star_text">
                                    <p><span style="color:#33875d; line-height:1; font-weight:800; font-size:30px;"><?php echo $tomonth_nutr ?></span><?php echo $tomonth_nutrinfo ?></p>
                                </div>
                            </div>
                            <!--중기3노출-->
                            <div class="jungthree" id="jungthree">
                                <div class="cont">
                                    <div class="number">
                                        <p><span></span><?php echo $user_babyname ?>(이)가 먹어본 재료 통계</p>
                                    </div>
                                    <div class="jungthree_box">
                                        <div>
                                            <ul>
                                                <li>
                                                    <div>
                                                        <div class="jungthree_top">
                                                            <img src="/wp-content/themes/storefront-child/image/otherpage/report/rhrfbrns.png">
                                                        </div>
                                                        <div class="jungthree_bot">
                                                            <p style="color:#af4b22;"><span id="rhrfbrns"></span>가지</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <div class="jungthree_top">
                                                            <img src="/wp-content/themes/storefront-child/image/otherpage/report/eksqorwlfrns.png">
                                                        </div>
                                                        <div class="jungthree_bot">
                                                            <p style="color:#ff7864;"><span id="eksqorwlffb"></span>가지</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul>
                                                <li>
                                                    <div>
                                                        <div class="jungthree_top">
                                                            <img src="/wp-content/themes/storefront-child/image/otherpage/report/cothrns.png">
                                                        </div>
                                                        <div class="jungthree_bot">
                                                            <p style="color:#aacf52;"><span id="cothrns"></span>가지</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul>
                                                <li>
                                                    <div>
                                                        <div class="jungthree_top">
                                                            <img src="/wp-content/themes/storefront-child/image/otherpage/report/rhkdlfrns.png">
                                                        </div>
                                                        <div class="jungthree_bot">
                                                            <p style="color:#ffc85a;"><span id="rhkdlfrns"></span>가지</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <div class="jungthree_top">
                                                            <img src="/wp-content/themes/storefront-child/image/otherpage/report/dbwpvnarns.png">
                                                        </div>
                                                        <div class="jungthree_bot">
                                                            <p style="color:#7d895b;"><span id="dbwpvnarns"></span>가지</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="jungthree_end" id="yes_super">
                                            <p><span><?php echo $user_babyname ?></span>(이)가 새로운 재료 <span id="allsum1"></span>종을 모두 먹어보았어요!</p>
                                            <p>후기 이유식부터는 복합적인 맛에 익숙해지도록, 보다 다양한 재료를 혼합하여 만든 요리가 제공될 예정입니다.</p>
                                        </div>
                                        <div class="jungthree_end" id="no_super" >
                                            <p><span><?php echo $user_babyname ?></span>(이)가 슈퍼푸드를 제외한 새로운 재료 <span id="allsum"></span>종을 먹어보았어요!</p>
                                            <p>슈퍼푸드 옵션을 선택해 더욱 다양한 재료를 시도해보세요~</p>
                                            <br>
                                            <p>후기 이유식부터는 복합적인 맛에 익숙해지도록, 보다 다양한 재료를 혼합하여 만든 요리가 제공될 예정입니다.</p>
                                        </div>
                                        <div>
                                            <p class="schdulebox_notice">
                                                다음 보고서부터는 위 내용대신,<br><b>'함께 먹으면 좋은 간식 재료'</b>관련 내용을 제공할 예정입니다.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--후기노출-->
                            <div class="hugipan" id="hugipan">
                                <div class="cont">
                                    <div class="number">
                                        <p><span></span>함께먹으면 좋은 간식재료</p>
                                    </div>
                                    <div class="snack">
                                        <div class="snack_name">
                                            <p><?php echo $snack_material ?></p>
                                        </div>
                                        <div class="snack_mate_image" style="width:50%; text-align:center; margin:20px auto;">
                                            <img src="/wp-content/themes/storefront-child/image/otherpage/report/snack/<?php echo $snack_matefile ?>.png">
                                        </div>
                                        <div class="snack_nutr">
                                            <b>주요 성분</b>
                                            <ul>
                                                <li style="border-bottom-left-radius:9px; border-right:1px solid #f7f7f7;"><?php echo $snack_ingr1 ?></li>
                                                <li><?php echo $snack_ingr2 ?></li>
                                                <li style="border-left:1px solid #f7f7f7; border-bottom-right-radius:9px;"><?php echo $snack_ingr3 ?></li>
                                            </ul>
                                            <p><?php echo $snack_explains ?></p>
                                        </div>
                                        <div class="snack_recipe">
                                            <div class="recipe_title">
                                                <p><?php echo $snack_material ?>을 이용한 영양만점 간식</p>
                                            </div>
                                            <div class="recipe_menu">
                                                <p><?php echo $snack_menuname ?></p>
                                            </div>
                                            <div class="snack_image" style="width:80%; margin:10px auto;">
                                                <img src="/wp-content/themes/storefront-child/image/otherpage/report/snack/<?php echo $snack_menufile ?>.png">
                                            </div>
                                            <div class="recipe_start">
                                                <p><span>1. </span><?php echo $snack_reci1 ?></p>
                                                <p><span>2. </span><?php echo $snack_reci2 ?></p>
                                                <p><span>3. </span><?php echo $snack_reci3 ?></p>
                                                <p><span>4. </span><?php echo $snack_reci4 ?></p>
                                                <p><span>5. </span><?php echo $snack_reci5 ?></p>
                                            </div>
                                            <div class="snack_tip">
                                                <p class="menual_tip_name">도담TIP</p>
                                                <p class="menual_tip_text"><?php echo $snack_tips ?></p>
                                            </div>
                                            <div class="snack_end">
                                                <p>간식은 시간을 정하고, 규칙적으로 제공해주세요.</p>
                                                <p>만약 아이가 이유식을 먹지않고 간식만 먹으려 한다면,</p>
                                                <p>올바른 식습관 형성을 위해 한동안 간식을 중단하시는게 좋아요.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="reper_bar">
                        <b>위 자료는 아래의 자료를 참고하여 제작되었습니다.</b>
                        <p>영유아 단체급식 가이드라인</p>
                        <p>식품의약품 안전처·어린이급식관리지원센터 [ 2013.05 ]</p>
                        <p>생각이 필요한 식품재료학 노봉수 외 6, [ 2020.02 ]</p>
                        <p>2015 한국인 영양소 섭취기준, 보건복지부·한국영양학회 [ 2015.11 ]</p>
                        <p>Harold Mcgee, On food and cooking [ 2017.03 ]</p>
                        <p>Infant Nutrition and Feeding, 미국농무부(USDA) [ 2019.04 ]</p>
                    </div>
                </div>
                <!--여기에 2짭-->
                <div id="faketabbox2" style="display:none;">
                    <div class="outline">
                        <div class="inline">
                            <div class="sample_text" style="padding:30px 0;">
                                <div class="">
                                    <div class="sample_top">
                                        <img style="width:30%;" src="/wp-content/themes/storefront-child/image/dodam_old_logo.png">
                                    </div>
                                    <div class="sample_bottom" style="padding:20px 0;">
                                        <div>
                                            <b>해당 내용은 샘플 자료입니다.</b>
                                            <p>우리 아이의 이유식 정보와는 다를 수 있습니다.</p>
                                        </div>
                                    </div>
                                    <div class="btn_area">
                                        <ul class="btn_area">
                                            <li style="display:block; margin-bottom:15px;">
                                                <a href="/checkout/?add-to-cart=4566" class="btn_ty btn_1">케어프로그램 가입하기</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="cont">
                                <div class="number">
                                    <p><span></span>지금은 중기 1 단계</p>
                                </div>
                                <div class="star">
                                    <div class="star_texts">
                                        <p>이 시기가 지나면 아이가 엄마로부터 받은 항체가 없어지고 면역력이 떨어질 수 있어요. 도담밀의 중기 1달 차 이유식은 우리 아이가 면역력을 기를 수 있도록 다양한 비타민과 무기질이 고루 함유된 균형 잡힌 식단으로 구성하였어요.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="cont">
                                <div class="number">
                                    <p><span></span>지난달 제공된 식단</p>
                                </div>
                                <div class="schedulebox greenbox shickdan">
                                    <ul>
                                        <li>
                                            <div class="sch_top">
                                                <p>1주차</p>
                                            </div>
                                            <div class="sch_bot">
                                                <div class="floor_one">
                                                    <p>닭고기파프리카양배추죽</p>
                                                    <p>닭고기찹쌀고구마죽</p>
                                                    <p></p>
                                                </div>
                                                <div class="floor_two">
                                                    <p>한우애호박근대죽</p>
                                                    <p>연두부배무죽</p>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sch_top">
                                                <p>2주차</p>
                                            </div>
                                            <div class="sch_bot">
                                                <div class="floor_one">
                                                    <p>닭고기새송이고구마죽</p>
                                                    <p>수수감자양배추죽</p>
                                                    <p></p>
                                                </div>
                                                <div class="floor_two">
                                                    <p>한우오이적채죽</p>
                                                    <p>미역무죽</p>
                                                    <p></p>
                                                </div>
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
                                                    <p>닭고기느타리애호박죽</p>
                                                    <p>치즈양배추당근죽</p>
                                                    <p></p>
                                                </div>
                                                <div class="floor_two">
                                                    <p>한우사과감자죽</p>
                                                    <p>한우차조가지죽</p>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sch_top">
                                                <p>4주차</p>
                                            </div>
                                            <div class="sch_bot">
                                                <div class="floor_one">
                                                    <p>닭고기애호박배추죽</p>
                                                    <p>현미대추무죽</p>
                                                    <p></p>
                                                </div>
                                                <div class="floor_two">
                                                    <p>한우무양파죽</p>
                                                    <p>김표고감자죽</p>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="cont">
                                <div class="">
                                    <div class="number">
                                        <p><span></span>영양소 제공량</p>
                                    </div>
                                    <div style="text-align:center; padding-bottom:20px;">
                                        <p>이번달 도담밀의 <b>영양소 제공량</b>은</p>
                                        <p><b>권장 섭취량의 약 <span style="font-size:25px; font-family:'210gullim'; font-weight:normal; color:#33875d;">120%</span>수준으로 제공</b>되었습니다.</p>
                                    </div>
                                    <div id="fake_per_chart_div" style="text-align:center; margin:0 auto;"></div>
                                    <div class="per_chart_name">
                                        <p>열량</p>
                                        <p>탄수화물</p>
                                        <p>단백질</p>
                                        <p>지방</p>
                                    </div>
                                    <div class="under_chart">
                                        <p><span style="border-left:20px solid #e7e7e7;"></span>목표량</p>
                                        <p><span style="border-left:20px solid #8cc364;" ></span>제공량</p>
                                    </div>
                                    <table class="nutr_table">
                                        <tr>
                                            <td style="width:25%; background-color:#8cc364; border-top-left-radius:9px; border-top:1px solid #e7e7e7; border-left:1px solid #e7e7e7; border-right:1px solid #e7e7e7;"></td>
                                            <td style="background-color:#e9ec66; font-family:'210gullim'; color:#3e3e3e; font-size:13px; border-top:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;">열량<span style="font-size:10px; color:#3e3e3e;">( kcal )</span></td>
                                            <td style="background-color:#e9ec66; font-family:'210gullim'; color:#3e3e3e; font-size:13px; border-top:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;">탄수화물<span style="font-size:10px; color:#3e3e3e;">( g )</span></td>
                                            <td style="background-color:#e9ec66; font-family:'210gullim'; color:#3e3e3e; font-size:13px; border-top:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;">단백질<span style="font-size:10px; color:#3e3e3e;">( g )</span></td>
                                            <td style="background-color:#e9ec66; font-family:'210gullim'; color:#3e3e3e; font-size:13px; border-top-right-radius:9px; border-top:1px solid #e7e7e7; border-right:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;">지방<span style="font-size:10px; color:#3e3e3e;">( g )</span></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color:#8cc364 !important; font-family:'210gullim'; color:#fff; font-size:15px; border-left:1px solid #e7e7e7; border-right:1px solid #e7e7e7;">권장섭취량</td>
                                            <td>3672</td>
                                            <td>715</td>
                                            <td>140</td>
                                            <td style="border-right:1px solid #e7e7e7;">20</td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom-left-radius:9px; background-color:#8cc364; font-family:'210gullim'; color:#fff; font-size:15px; border-left:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7; border-right:1px solid #e7e7e7;">도담밀<br>제공량</td>
                                            <td style="border-bottom:1px solid #e7e7e7;">4406</td>
                                            <td style="border-bottom:1px solid #e7e7e7;">858</td>
                                            <td style="border-bottom:1px solid #e7e7e7;">168</td>
                                            <td style="border-bottom-right-radius:9px; border-bottom:1px solid #e7e7e7; border-right:1px solid #e7e7e7;">22</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="cont">
                            <div class="">
                                <div class="number">
                                    <p><span></span>식품군별 제공 비율</p>
                                </div>
                                <div id="fakedonutchart"></div>
                                <div class="under_chart" style="padding-bottom:0;">
                                    <p><span style="border-left:20px solid #af4b22;"></span>곡류</p>
                                    <p><span style="border-left:20px solid #d2612a;"></span>단백질류</p>
                                    <p><span style="border-left:20px solid #7d895b;"></span>유제품류</p>
                                </div>
                                <div class="under_chart" style="padding-top:0;">
                                    <p><span style="border-left:20px solid #ffc85a;"></span>과일류</p>
                                    <p><span style="border-left:20px solid #aacf52;"></span>채소류</p>
                                </div>
                            </div>
                        </div>
                        <div class="cont">
                            <!--빙고판-->
                            <div class="" id="bingopantt">
                                <div class="number">
                                    <p><span></span>도담밀과 함께 먹어본 재료</p>
                                </div>
                                <div class="bingopan">
                                    <div>
                                        <p class="bingo3">가지</p>
                                        <p class="bingo3">감자</p>
                                        <p>고구마</p>
                                        <p>근대</p>
                                        <p>김</p>
                                        <p class="bingo3">느타리</p>
                                        <p class="bingo3">단호박</p>
                                    </div>
                                    <div>
                                        <p class="bingo3">당근</p>
                                        <p>대추</p>
                                        <p>로메인</p>
                                        <p>무</p>
                                        <p class="bingo3">미역</p>
                                        <p class="bingo3">밤</p>
                                        <p>배추</p>
                                    </div>
                                    <div>
                                        <p>브로콜리</p>
                                        <p>비타민</p>
                                        <p class="bingo3">비트</p>
                                        <p class="bingo3">새송이</p>
                                        <p>시금치</p>
                                        <p>아욱</p>
                                        <p class="bingo3">애호박</p>
                                    </div>
                                    <div>
                                        <p class="bingo3">양배추</p>
                                        <p>양송이</p>
                                        <p class="bingo3">양파</p>
                                        <p>연근</p>
                                        <p>오이</p>
                                        <p>우엉</p>
                                        <p>적채</p>
                                    </div>
                                    <div>
                                        <p>청경채</p>
                                        <p>파프리카</p>
                                        <p>표고</p>
                                        <p class="bingo2">닭고기</p>
                                        <p>렌틸콩</p>
                                        <p>병아리콩</p>
                                        <p class="bingo2">연두부</p>
                                    </div>
                                    <div>
                                        <p class="bingo2">한우</p>
                                        <p>귀리</p>
                                        <p>수수</p>
                                        <p class="bingo1">쌀</p>
                                        <p>전분가루</p>
                                        <p class="bingo1">차조</p>
                                        <p class="bingo1">찹쌀</p>
                                    </div>
                                    <div>
                                        <p>퀴노아</p>
                                        <p class="bingo1">현미</p>
                                        <p>흑미</p>
                                        <p>배</p>
                                        <p>블루베리</p>
                                        <p class="bingo4">사과</p>
                                        <p class="bingo5">치즈</p>
                                    </div>
                                </div>
                                <div class="under_chart">
                                    <p><span style="border-left:20px solid #e7e7e7;"></span>도담밀과 먹어볼재료</p>
                                    <p><span style="border-left:20px solid #999;"></span>도담밀전에 먹어본재료</p>
                                </div>
                                <div class="under_chart" style="padding:0;">
                                    <p><span style="border-left:20px solid #aacf52;"></span>먹은 채소</p>
                                    <p><span style="border-left:20px solid #d2612a;"></span>먹은 단백질</p>
                                    <p><span style="border-left:20px solid #af4b22;"></span>먹은 곡물</p>
                                </div>
                                <div class="under_chart" style="padding-top:0;">
                                    <p><span style="border-left:20px solid #ffc85a;"></span>먹은 과일</p>
                                    <p><span style="border-left:20px solid #7d895b;"></span>먹은 유제품</p>
                                </div>
                                <div class="bingo_end" style="display:none;">
                                    <p><span>도담이</span>(이)가 새로운 재료들을 모두 먹어보았어요!<br>후기 이유식부터는 복합적인 맛에 익숙해지도록<br>보다 다양한 재료를 혼합하여 만든 요리가 제공될 거에요.</p>
                                    <p class="schdulebox_notice">다음 보고서부터는 위 내용 대신 '함께 먹으면 좋은 간식재료' 관련 내용을 제공할 예정입니다.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="reper_bar">
                        <p>권장섭취량은 2015 한국인 영양소섭취기준을 바탕으로, 월령별 평균 수유량 및 간식섭취량을 뺀 후 계산되었습니다.</p>
                    </div>
                    <div class="outline" style="border-radius:9px;">
                        <div class="inline">
                            <div class="cont" style="padding-top:0;">
                                <div class="number">
                                    <p><span></span>이달의 영양소</p>
                                </div>
                                <div class="month_nutr star_text">
                                    <p><span style="color:#33875d; line-height:1; font-weight:800; font-size:30px;">비타민A</span>는 눈의 점막을 형성하고, 시력을 유지하는 기능을 해요. 때문에 시력이 점차 발달하는 시기에 아주 중요한 영양소에요. 또한 면역 시스템을 유지하는 데 도움을 주기 때문에 엄마에게 받은 면역 성분이 없어지는 6~7개월 이후에 꼭 필요한 영양소입니다.</p>
                                </div>
                            </div>
                            <div class="sample_text" style="padding:30px 0;">
                                <div class="">
                                    <div class="sample_top">
                                        <img style="width:30%;" src="/wp-content/themes/storefront-child/image/dodam_old_logo.png">
                                    </div>
                                    <div class="sample_bottom" style="padding:20px 0;">
                                        <div>
                                            <b>해당 내용은 샘플 자료입니다.</b>
                                            <p>우리 아이의 이유식 정보와는 다를 수 있습니다.</p>
                                        </div>
                                    </div>
                                    <div class="btn_area">
                                        <ul class="btn_area">
                                            <li style="display:block; margin-bottom:15px;">
                                                <a href="/checkout/?add-to-cart=4566" class="btn_ty btn_1">케어프로그램 가입하기</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="reper_bar">
                        <b>위 자료는 아래의 자료를 참고하여 제작되었습니다.</b>
                        <p>영유아 단체급식 가이드라인</p>
                        <p>식품의약품 안전처·어린이급식관리지원센터 [ 2013.05 ]</p>
                        <p>생각이 필요한 식품재료학 노봉수 외 6, [ 2020.02 ]</p>
                        <p>2015 한국인 영양소 섭취기준, 보건복지부·한국영양학회 [ 2015.11 ]</p>
                        <p>Harold Mcgee, On food and cooking [ 2017.03 ]</p>
                        <p>Infant Nutrition and Feeding, 미국농무부(USDA) [ 2019.04 ]</p>
                    </div>
                </div>
            </div>
            <!--세번째-->
            <div class="tab_box tab3">
                <div id="tabbox3">
                    <div class="outline">
                        <div class="inline">
                            <div class="cont">
                                <div class="number">
                                    <p><span></span>성장척도 확인하기</p>
                                </div>
                                <div class="star_text">
                                    <p>알려주신 신장과 체중정보를 바탕으로 우리아이의 성장 정보를 아래 그래프에 표기해 두었어요.</p>
                                </div>
                                <div class="">
                                    <div class="hr-sect">
                                        <p>성장도표 보는 방법</p>
                                    </div>
                                    <div class="graph_guide">
                                        <p><b>1.</b> 우리아이의 키와 체중을 <span>검은점</span>으로 표시했어요.</p>
                                        <p><b>2.</b> <span style="color:#ea5514;">빨강</span>, <span style="color:#177c48;">초록</span>, <span style="color:#ffc85a;">노란</span>선과 아이의 신장, 체중을 비교해주세요</p>
                                        <p><span style="color:#177c48;">초록색 선</span>에 가까우면 우리아이가<br><span style="color:#177c48;">평균치</span>에 맞게 잘 크고 있는 것이에요.<br><span style="color:#ea5514;">빨간색 선</span>보다 위에있다면 <span style="color:#ea5514;">성장이 빠르고</span>,<br><span style="color:#ffc85a;">노란색 선</span>보다 아래에 있으면 <span style="color:#ffc85a;">성장이 느린 것</span>이에요.</p>
                                        <p style="padding-top:20px;">오랫동안 평균치에서 벗어난다면<br>전문가와 상담해보시는 것이 좋아요.</p>
                                        <p class="schdulebox_notice">성장지표는 참고용 자료일 뿐이니 과도한 체중관리로 우리아이 성장에 방해가 되게해서는 안됩니다.</p>
                                    </div>
                                    <div>
                                        <div class="graph_title">
                                            <p>현재 신장 : <?php echo $user_height ?> cm</p>
                                        </div>
                                        <div id="chart_one"></div>
                                        <div id="chart_thr"></div>
                                        <div style="position:absolute; background-color:#fff; border-radius:9px; top:800px; left:20%; padding:5px; border:2px solid #ea5514; font-size:15px;">
                                            <p style="color:#ea5514;"><span style="font-weight:bold;">빨간선</span>은 키 상위 <span style="font-weight:bold;">5%</span></p>
                                        </div>
                                        <div style="position:absolute; background-color:#fff; border-radius:9px; top:950px; left:50%; padding:5px; border:2px solid #ffc85a; font-size:15px;">
                                            <p style="color:#ffc85a;"><span style="font-weight:bold;">노란선</span>은 키 하위 <span style="font-weight:bold;">5%</span></p>
                                        </div>
                                        <p class="graph_center" style="text-align:center; font-size:13px;  color:#666;">만나이 (개월)</p>
                                        <div class="graph_title" style="padding-top:20px;">
                                            <p>현재 체중 : <?php echo $user_weight ?> kg</p>
                                        </div>
                                        <div id="chart_two"></div>
                                        <div id="chart_fow"></div>
                                        <div style="position:absolute; background-color:#fff; border-radius:9px; top:1160px; left:15%; padding:5px; border:2px solid #ea5514; font-size:15px;">
                                            <p style="color:#ea5514;"><span style="font-weight:bold;">빨간선</span>은 체중 상위 <span style="font-weight:bold;">5%</span></p>
                                        </div>
                                        <div style="position:absolute; background-color:#fff; border-radius:9px; top:1320px; left:50%; padding:5px; border:2px solid #ffc85a; font-size:15px;">
                                            <p style="color:#ffc85a;"><span style="font-weight:bold; color:#ffc85a;">노란선</span>은 체중 하위 <span style="font-weight:bold;">5%</span></p>
                                        </div>
                                        <p class="graph_center" style="text-align:center; font-size:13px; color:#666; padding-bottom:20px;">만나이 (개월)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="cont">
                                <div class="number">
                                    <p><span></span>얼마나 자랐을까요?</p>
                                </div>
                                <div class="star_text">
                                    <p>우리아이는 이번달 얼만큼 더 자랐을까요?</p>
                                </div>
                                <div class="graph_table">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td style="border-top-left-radius:9px; width:28%; background-color:#ffc85a;"></td>
                                            <td style="font-family:'210gullim'; background-color:#fad380; font-size:13px; color:#3e3e3e; width:24%;">지난달</td>
                                            <td style="font-family:'210gullim'; background-color:#fad380; font-size:13px; color:#3e3e3e; width:24%;">이번달</td>
                                            <td style="font-family:'210gullim'; font-size:13px; color:#3e3e3e; background-color:#fad380; border-top-right-radius:9px; width:24%; border-right:1px solid #e7e7e7;">차이</td>
                                        </tr>
                                        <tr>
                                            <td style="background-color:#ffc85a !important; font-size:15px; color:#3e3e3e; font-family:'210gullim'; ">신장</td>
                                            <td><?php echo $before_height ?> <span style="font-size:10px; color:#666;">cm</span></td>
                                            <td><?php echo $after_height ?> <span style="font-size:10px; color:#666;">cm</span></td>
                                            <td style=" border-right:1px solid #e7e7e7;"><b style="font-weight:800;"><?php echo $sum_height ?></b> <span style="font-size:10px; color:#666;">cm</span></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color:#ffc85a; font-size:15px; color:#3e3e3e; font-family:'210gullim'; border-bottom:1px solid #e7e7e7; border-bottom-left-radius:9px;">체중</td>
                                            <td style="border-bottom:1px solid #e7e7e7;"><?php echo $before_weight ?> <span style="font-size:10px; color:#666;">kg</span></td>
                                            <td style="border-bottom:1px solid #e7e7e7;"><?php echo $after_weight ?> <span style="font-size:10px; color:#666;">kg</span></td>
                                            <td style="border-bottom-right-radius:9px; border-right:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;"><b style="font-weight:800;"><?php echo $sum_weight ?></b> <span style="font-size:10px; color:#666;">kg</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="after_height">
                                    <p><b style="font-weight:800;"><?php echo $user_babyname ?></b>(이)는 지난달보다<br><b>신장은 <span class="point_text"><?php echo $sum_height ?></span><span style="font-size:14px; color:#666;"> cm</span> 만큼</b>, <b>체중은 <span class="point_text"><?php echo $sum_weight ?></span><span style="font-size:14px; color:#666;"> kg</span></b><br>더 늘어나 튼튼하게 잘 자라고있습니다.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="reper_bar">
                        <p>성장도표는 질병관리본부에서 제공하는 2017 소아성정도표를 기준으로 만들어졌습니다.</p>
                    </div>
                    <div class="outline" style="border-top-left-radius:9px; border-top-right-radius:9px;">
                        <div class="inline">
                            <div class="cont">
                                <div class="number">
                                    <p><span></span>성장 정도에 따른 도담밀의 팁!</p>
                                </div>
                                <div>
                                    <div class="dodam_tip" style="padding-top:20px;">
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
                            <div class="cont">
                                <div class="number">
                                    <p><span></span>발달정도 확인하기</p>
                                </div>
                                <div class="sub_text">
                                    <p style="padding:10px; font-size:18px;">생후 <?php echo $user_monthly ?>개월의 <b><?php echo $user_babyname ?></b> (이)의 발달 정도는?</p>
                                </div>
                                <!-- 개월령에 맞는 자료의 출력 -->
                                <table class="evolu">
                                    <tr>
                                        <td style="width:28%; border-bottom:1px solid #999 !important; border-top-left-radius:9px; text-align:center; vertical-align:middle; background-color:#e8b026; font-size:20px; font-weight:bold; color:#3e3e3e;">신체</td>
                                        <td style="border-top-right-radius:9px; border-bottom:1px solid #999 !important;"><?php echo $physical ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width:28%; border-bottom:1px solid #999 !important; text-align:center; vertical-align:middle; background-color:#e8b026 !important; font-size:20px; font-weight:bold; color:#3e3e3e;">사회<br>정서</td>
                                        <td style="border-bottom:1px solid #999 !important;"><?php echo $emotion ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width:28%; border-bottom:1px solid #999 !important; text-align:center; vertical-align:middle; background-color:#e8b026; font-size:20px; font-weight:bold; color:#3e3e3e;">언어</td>
                                        <td style="border-bottom:1px solid #999 !important;"><?php echo $language ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width:28%; border-bottom-left-radius:9px; text-align:center; vertical-align:middle; background-color:#e8b026 !important; font-size:20px; font-weight:bold; color:#3e3e3e;">인지</td>
                                        <td style="border-bottom-right-radius:9px;"><?php echo $cognitive ?></td>
                                    </tr>
                                </table>
                                <div>
                                    <p class="schdulebox_notice">아이의 성장발달 정도는<br>개인차가 크니 참고용으로 봐주세요.</p>
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
                <div id="faketabbox3" style="display:none;">
                    <div class="outline">
                        <div class="inline">
                            <div class="sample_text" style="padding:30px 0;">
                                <div class="">
                                    <div class="sample_top">
                                        <img style="width:30%;" src="/wp-content/themes/storefront-child/image/dodam_old_logo.png">
                                    </div>
                                    <div class="sample_bottom" style="padding:20px 0;">
                                        <div>
                                            <b>해당 내용은 샘플 자료입니다.</b>
                                            <p>우리 아이의 이유식 정보와는 다를 수 있습니다.</p>
                                        </div>
                                    </div>
                                    <div class="btn_area">
                                        <ul class="btn_area">
                                            <li style="display:block; margin-bottom:15px;">
                                                <a href="/" class="btn_ty btn_1">케어프로그램 가입하기</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="cont">
                                <div class="number">
                                    <p><span></span>성장척도 확인하기</p>
                                </div>
                                <div class="star_text">
                                    <p>알려주신 신장과 체중정보를 바탕으로 우리아이의 성장 정보를 아래 그래프에 표기해 두었어요.</p>
                                </div>
                                <div class="">
                                    <div class="hr-sect">
                                        <p>성장도표 보는 방법</p>
                                    </div>
                                    <div class="graph_guide">
                                        <p><b>1.</b> 우리아이의 키와 체중을 <span>검은점</span>으로 표시했어요.</p>
                                        <p><b>2.</b> <span style="color:#ea5514;">빨강</span>, <span style="color:#177c48;">초록</span>, <span style="color:#ffc85a;">노란</span>선과 아이의 신장, 체중을 비교해주세요</p>
                                        <p><span style="color:#177c48;">초록색 선</span>에 가까우면 우리아이가<br><span style="color:#177c48;">평균치</span>에 맞게 잘 크고 있는 것이에요.<br><span style="color:#ea5514;">빨간색 선</span>보다 위에있다면 <span style="color:#ea5514;">성장이 빠르고</span>,<br><span style="color:#ffc85a;">노란색 선</span>보다 아래에 있으면 <span style="color:#ffc85a;">성장이 느린 것</span>이에요.</p>
                                        <p style="padding-top:20px;">오랫동안 평균치에서 벗어난다면<br>전문가와 상담해보시는 것이 좋아요.</p>
                                        <p class="schdulebox_notice">성장지표는 참고용 자료일 뿐이니 과도한 체중관리로 우리아이 성장에 방해가 되게해서는 안됩니다.</p>
                                    </div>
                                    <div>
                                        <div class="graph_title">
                                            <p>현재 신장 :  66.2cm</p>
                                        </div>
                                        <div id="fake_chart_thr"></div>
                                        <div style="position:absolute; background-color:#fff; border-radius:9px; top:1150px; left:20%; padding:5px; border:2px solid #ea5514; font-size:15px;">
                                            <p style="color:#ea5514;"><span style="font-weight:bold;">빨간선</span>은 키 상위 <span style="font-weight:bold;">5%</span></p>
                                        </div>
                                        <div style="position:absolute; background-color:#fff; border-radius:9px; top:1290px; left:50%; padding:5px; border:2px solid #ffc85a; font-size:15px;">
                                            <p style="color:#ffc85a;"><span style="font-weight:bold;">노란선</span>은 키 하위 <span style="font-weight:bold;">5%</span></p>
                                        </div>
                                        <p class="graph_center" style="text-align:center; font-size:13px;  color:#666;">만나이 (개월)</p>
                                        <div class="graph_title" style="padding-top:20px;">
                                            <p>현재 체중 : 7.5 kg</p>
                                        </div>
                                        <div id="fake_chart_fow"></div>
                                        <div style="position:absolute; background-color:#fff; border-radius:9px; top:1530px; left:15%; padding:5px; border:2px solid #ea5514; font-size:15px;">
                                            <p style="color:#ea5514;"><span style="font-weight:bold;">빨간선</span>은 체중 상위 <span style="font-weight:bold;">5%</span></p>
                                        </div>
                                        <div style="position:absolute; background-color:#fff; border-radius:9px; top:1680px; left:50%; padding:5px; border:2px solid #ffc85a; font-size:15px;">
                                            <p style="color:#ffc85a;"><span style="font-weight:bold; color:#ffc85a;">노란선</span>은 체중 하위 <span style="font-weight:bold;">5%</span></p>
                                        </div>
                                        <p class="graph_center" style="text-align:center; font-size:13px; color:#666; padding-bottom:20px;">만나이 (개월)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="cont">
                                <div class="number">
                                    <p><span></span>얼마나 자랐을까요?</p>
                                </div>
                                <div class="star_text">
                                    <p>우리아이는 이번달 얼만큼 더 자랐을까요?</p>
                                </div>
                                <div class="graph_table">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td style="border-top-left-radius:9px; width:28%; background-color:#ffc85a;"></td>
                                            <td style="font-family:'210gullim'; background-color:#fad380; font-size:13px; color:#3e3e3e; width:24%;">지난달</td>
                                            <td style="font-family:'210gullim'; background-color:#fad380; font-size:13px; color:#3e3e3e; width:24%;">이번달</td>
                                            <td style="font-family:'210gullim'; font-size:13px; color:#3e3e3e; background-color:#fad380; border-top-right-radius:9px; width:24%; border-right:1px solid #e7e7e7;">차이</td>
                                        </tr>
                                        <tr>
                                            <td style="background-color:#ffc85a !important; font-size:15px; color:#3e3e3e; font-family:'210gullim'; ">신장</td>
                                            <td>64.5 <span style="font-size:10px; color:#666;">cm</span></td>
                                            <td>66.2 <span style="font-size:10px; color:#666;">cm</span></td>
                                            <td style=" border-right:1px solid #e7e7e7;"><b style="font-weight:800;">1.7</b><span style="font-size:10px; color:#666;">cm</span></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color:#ffc85a; font-size:15px; color:#3e3e3e; font-family:'210gullim'; border-bottom:1px solid #e7e7e7; border-bottom-left-radius:9px;">체중</td>
                                            <td style="border-bottom:1px solid #e7e7e7;">7.1 <span style="font-size:10px; color:#666;">kg</span></td>
                                            <td style="border-bottom:1px solid #e7e7e7;">7.5 <span style="font-size:10px; color:#666;">kg</span></td>
                                            <td style="border-bottom-right-radius:9px; border-right:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;"><b style="font-weight:800;">0.4</b> <span style="font-size:10px; color:#666;">kg</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="after_height">
                                    <p><b style="font-weight:800;">도담이</b>(이)는 지난달보다<br><b>신장은 <span class="point_text">1.7</span><span style="font-size:14px; color:#666;"> cm</span> 만큼</b>, <b>체중은 <span class="point_text">0.4</span><span style="font-size:14px; color:#666;"> kg</span></b><br>더 늘어나 튼튼하게 잘 자라고있습니다.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="reper_bar">
                        <p>성장도표는 질병관리본부에서 제공하는 2017 소아성정도표를 기준으로 만들어졌습니다.</p>
                    </div>
                    <div class="outline" style="border-top-left-radius:9px; border-top-right-radius:9px;">
                        <div class="inline">
                            <div class="cont">
                                <div class="number">
                                    <p><span></span>성장 정도에 따른 도담밀의 팁!</p>
                                </div>
                                <div>
                                    <div class="dodam_tip" style="padding-top:20px;">
                                        <div class="">
                                            <b>체중이 많이 나간다면?</b>
                                            <p>과도한 체중 관리는 아이의 성장을 방해할 수 있어요. 중기가 지났다면 수유량을 조금씩 줄여주세요.</p>
                                        </div>
                                        <div class="">
                                            <b>키가 작다면?</b>
                                            <p>단백질이 풍부한 육류를 충분히 섭취할 수 있도록 해주세요. 중기가 지났다면 칼슘 섭취를 위해 어린이용 치즈를 간식으로 주는 것도 좋아요.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cont">
                                <div class="number">
                                    <p><span></span>발달정도 확인하기</p>
                                </div>
                                <div class="sub_text">
                                    <p style="padding:10px; font-size:18px;">생후 6개월의 <b>도담</b>(이)의 발달 정도는?</p>
                                </div>
                                <!-- 개월령에 맞는 자료의 출력 -->
                                <table class="evolu">
                                    <tr>
                                        <td style="width:28%; border-bottom:1px solid #999 !important; border-top-left-radius:9px; text-align:center; vertical-align:middle; background-color:#e8b026; font-size:20px; font-weight:bold; color:#3e3e3e;">신체</td>
                                        <td style="border-top-right-radius:9px; border-bottom:1px solid #999 !important;">배밀이를 하며 기어가고, 허리 힘이 강해지면서 혼자 오래 앉을 수 있게 돼요. 아기에 따라 유치가 나기 시작해요. 다만 치아의 발달 시기는 아기마다 다르고, 성장 정도와 크게 관련이 없기 때문에 치아가 늦게 난다고 걱정하지 않으셔도 돼요.</td>
                                    </tr>
                                    <tr>
                                        <td style="width:28%; border-bottom:1px solid #999 !important; text-align:center; vertical-align:middle; background-color:#e8b026 !important; font-size:20px; font-weight:bold; color:#3e3e3e;">사회<br>정서</td>
                                        <td style="border-bottom:1px solid #999 !important;">친숙한 사람과 낯선 사람을 구분하기 시작하면서 낯가림을 해요. 시기나 표현하는 정도는 아기마다 다르지만, 일정 시기가 지나면 자연스럽게 없어지니 낯가림이 심해도 너무 걱정하지 않으셔도 돼요.</td>
                                    </tr>
                                    <tr>
                                        <td style="width:28%; border-bottom:1px solid #999 !important; text-align:center; vertical-align:middle; background-color:#e8b026; font-size:20px; font-weight:bold; color:#3e3e3e;">언어</td>
                                        <td style="border-bottom:1px solid #999 !important;">'브', '쁘', '프' 등 보다 다양한 형태의 옹알이를 하고, 옹알이를 통해 다른 사람과 관계를 맺으려고 하고, 말을 걸려고 해요. 아기가 옹알이를 하면 자연스럽게 대화를 나눠주세요.</td>
                                    </tr>
                                    <tr>
                                        <td style="width:28%; border-bottom-left-radius:9px; text-align:center; vertical-align:middle; background-color:#e8b026 !important; font-size:20px; font-weight:bold; color:#3e3e3e;">인지</td>
                                        <td style="border-bottom-right-radius:9px;">두뇌가 발달하면서 사물에 대한 영속성 개념(사물이 눈에 안 보여도 계속 존재한다는 것을 아는 인지 능력)이 생겨 물건이나 사람이 없어지는 상황에 관심을 보여요. </td>
                                    </tr>
                                </table>
                                <div>
                                    <p class="schdulebox_notice">아이의 성장발달 정도는<br>개인차가 크니 참고용으로 봐주세요.</p>
                                </div>
                            </div>
                        </div>
                        <div class="sample_text" style="padding:30px 0;">
                            <div class="">
                                <div class="sample_top">
                                    <img style="width:30%;" src="/wp-content/themes/storefront-child/image/dodam_old_logo.png">
                                </div>
                                <div class="sample_bottom" style="padding:20px 0;">
                                    <div>
                                        <b>해당 내용은 샘플 자료입니다.</b>
                                        <p>우리 아이의 이유식 정보와는 다를 수 있습니다.</p>
                                    </div>
                                </div>
                                <div class="btn_area">
                                    <ul class="btn_area">
                                        <li style="display:block; margin-bottom:15px;">
                                            <a href="/checkout/?add-to-cart=4566" class="btn_ty btn_1">케어프로그램 가입하기</a>
                                        </li>
                                    </ul>
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
            </div>
            <!--네번째-->
            <div class="tab_box tab4">
                <div id="tabbox4">
                    <div class="outline">
                        <div class="inline">
                            <div class="cont">
                                <img src="/wp-content/themes/storefront-child/image/edudata/<?php echo $edudata ?>.png">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="faketabbox4" style="display:none;">
                    <div class="outline">
                        <div class="inline">
                            <div class="sample_text" style="padding:30px 0;">
                                <div class="">
                                    <div class="sample_top">
                                        <img style="width:30%;" src="/wp-content/themes/storefront-child/image/dodam_old_logo.png">
                                    </div>
                                    <div class="sample_bottom" style="padding:20px 0;">
                                        <div>
                                            <b>해당 내용은 샘플 자료입니다.</b>
                                            <p>우리 아이의 이유식 정보와는 다를 수 있습니다.</p>
                                        </div>
                                    </div>
                                    <div class="btn_area">
                                        <ul class="btn_area">
                                            <li style="display:block; margin-bottom:15px;">
                                                <a href="/checkout/?add-to-cart=4566" class="btn_ty btn_1">케어프로그램 가입하기</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="cont">
                                <img src="/wp-content/themes/storefront-child/image/edudata/4none.png">
                            </div>
                            <div class="sample_text" style="padding:30px 0;">
                                <div class="">
                                    <div class="sample_top">
                                        <img style="width:30%;" src="/wp-content/themes/storefront-child/image/dodam_old_logo.png">
                                    </div>
                                    <div class="sample_bottom" style="padding:20px 0;">
                                        <div>
                                            <b>해당 내용은 샘플 자료입니다.</b>
                                            <p>우리 아이의 이유식 정보와는 다를 수 있습니다.</p>
                                        </div>
                                    </div>
                                    <div class="btn_area">
                                        <ul class="btn_area">
                                            <li style="display:block; margin-bottom:15px;">
                                                <a href="/checkout/?add-to-cart=4566" class="btn_ty btn_1">케어프로그램 가입하기</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
    </div>
    <div class="my_module_mask" id="no_auth" style="display:none;">
        <div>
            <h1></h1>
            <b>도담밀 이유식 영양보고서는<br>프리미엄, 케어회원 전용 서비스입니다.</b>
            <p>로그인 후 우리아이가 잘 자라고있는지<br>성장·발달과 영양정보를 확인해보세요.</p>
            <ul class="btn_area">
            <li style="display:block; margin-bottom:15px;">
                    <a href="/login?redirect_to=/dodamreport" class="btn_ty btn_1">로그인하러가기</a>
    </li>
    <li style="display:block; margin-bottom:15px;">
                    <a id="limit_next_1" href="#" class="btn_ty btn_1">보고서 샘플 둘러보기</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="my_module_mask" id="no_limit" style="display:none;">
        <div>
            <h1></h1>
            <b>이유식 영양보고서는<br>최초 1회 무료 제공됩니다.</b>
            <p>고객님의 영양보고서 무료 열람기간은<br><b style="display:inline-block; margin-top:0; font-size:20px;"><?php echo $limit_day ?></b>까지 입니다.</p>
            <ul class="btn_area">
                <li>
                    <a id="limit_next" href="#" class="btn_ty btn_1">보고서 확인하기</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="my_module_mask" id="end_limit" style="display:none;">
        <div>
            <h1></h1>
            <b>고객님의 도담밀 영양보고서의<br>열람 대상자가 아닙니다.</b>
            <p>프리미엄 멤버십 또는 케어프로그램<br>가입 고객만 정상확인이 가능합니다.</p>
            <ul class="btn_area">
                <li style="display:block; margin-bottom:15px;">
                    <a id="limit_end_next" href="#" class="btn_ty btn_1">보고서 샘플 둘러보기</a>
                </li>
                <li style="display:block; margin-bottom:15px;">
                    <a id="limit_end_care" href="/checkout/?add-to-cart=4566" class="btn_ty btn_1">케어프로그램 구매하기</a>
                </li>
            </ul>
        </div>
    </div>
    <!--기간한정 블럭노출-->
    <script>
        var limit = $("input[name=limit").val();
        if(limit == 1){
            $("#andappinstall").fadeIn();
        } else {
        }
        $(".btn-layerClose2").click(function () {
            $(".andappinstall").fadeOut(); // 레이어 감춤
        });
    </script>
    <script>
        var zlsms = $("input[name=bigyo_height").val();
        var cpwnddms = $("input[name=bigyo_weight").val();
        if(zlsms == 0){
            $("#zlzmek").fadeIn();
            $("#zlwkrek").fadeOut();
        } else {
            $("#zlzmek").fadeOut();
            $("#zlwkrek").fadeIn();
        }
        if(cpwnddms == 0){
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
        if( inputval == '남아' ){
            $("#chart_one").fadeIn();
            $("#chart_two").fadeIn();
        }else
        {
            $("#chart_thr").fadeIn();
            $("#chart_fow").fadeIn();
        }
    </script>
    <!--탭 juqery-->
    <script>
        $('.tab_menu_btn').on('click',function(){
            //버튼 색 제거,추가
            $('.tab_menu_btn').removeClass('on');
            $(this).addClass('on')
            //컨텐츠 제거 후 인덱스에 맞는 컨텐츠 노출
            var idx = $('.tab_menu_btn').index(this);
            $('.tab_box').hide();
            $('.tab_box').eq(idx).show();
        });
    </script>
    <!--빙고판 query + 재료종류가짓수-->
    <script>
        var rhrfbrns = 0;
        var eksqorwlffb = 0;
        var cothrns = 0;
        var rhkdlfrns = 0;
        var dbwpvnarns = 0;
        var rkwl = $("input[name=rkwl]").val();
        if (rkwl == 1 ){
            $("#rkwl").addClass("bingo3");
            var cothrns = cothrns + 1;
        }
        var rkawk = $("input[name=rkawk]").val();
        if (rkawk == 1 ){
            $("#rkawk").addClass("bingo3");
            var cothrns = cothrns + 1;
        }
        var rjsvheh = $("input[name=rjsvheh]").val();
        if (rjsvheh == 1 ){
            $("#rjsvheh").addClass("bingo");
        }
        var rjadmsro = $("input[name=rjadmsro]").val();
        if (rjadmsro == 1 ){
            $("#rjadmsro").addClass("bingo");
        }
        var rjadmszhd = $("input[name=rjadmszhd]").val();
        if (rjadmszhd == 1 ){
            $("#rjadmszhd").addClass("bingo");
        }
        var rhrnak = $("input[name=rhrnak]").val();
        if (rhrnak == 1 ){
            $("#rhrnak").addClass("bingo3");
            var cothrns = cothrns + 1;
        }
        var rnlfl = $("input[name=rnlfl]").val();
        if (rnlfl == 1 ){
            $("#rnlfl").addClass("bingo1");
            var rhrfbrns = rhrfbrns + 1;
        }
        var rmseo = $("input[name=rmseo]").val();
        if (rmseo == 1 ){
            $("#rmseo").addClass("bingo3");
            var cothrns = cothrns + 1;
        }
        var rla = $("input[name=rla]").val();
        if (rla == 1 ){
            $("#rla").addClass("bingo3");
            var cothrns = cothrns + 1;
        }
        var smxkfl = $("input[name=smxkfl]").val();
        if (smxkfl == 1 ){
            $("#smxkfl").addClass("bingo3");
            var cothrns = cothrns + 1;
        }
        var ektlak = $("input[name=ektlak]").val();
        if (ektlak == 1 ){
            $("#ektlak").addClass("bingo");
        }
        var eksghqkr = $("input[name=eksghqkr]").val();
        if (eksghqkr == 1 ){
            $("#eksghqkr").addClass("bingo3");
            var cothrns = cothrns + 1;
        }
        var ekfrrhrl = $("input[name=ekfrrhrl]").val();
        if (ekfrrhrl == 1 ){
            $("#ekfrrhrl").addClass("bingo2");
            var eksqorwlffb = eksqorwlffb + 1;
        }
        var ekdrms = $("input[name=ekdrms]").val();
        if (ekdrms == 1 ){
            $("#ekdrms").addClass("bingo3");
            var cothrns = cothrns + 1;
        }
        var eocn = $("input[name=eocn]").val();
        if (eocn == 1 ){
            $("#eocn").addClass("bingo3");
            var cothrns = cothrns + 1;
        }
        var fpsxlfzhd = $("input[name=fpsxlfzhd]").val();
        if (fpsxlfzhd == 1 ){
            $("#fpsxlfzhd").addClass("bingo2");
            var eksqorwlffb = eksqorwlffb + 1;
        }
        var fhapdls = $("input[name=fhapdls]").val();
        if (fhapdls == 1 ){
            $("#fhapdls").addClass("bingo3");
            var cothrns = cothrns + 1;
        }
        var an = $("input[name=an]").val();
        if (an == 1 ){
            $("#an").addClass("bingo3");
            var cothrns = cothrns + 1;
        }
        var aldur = $("input[name=aldur]").val();
        if (aldur == 1 ){
            $("#aldur").addClass("bingo3");
            var cothrns = cothrns + 1;
        }
        var qksksk = $("input[name=qksksk]").val();
        if (qksksk == 1 ){
            $("#qksksk").addClass("bingo");
        }
        var qka = $("input[name=qka]").val(); if (qka == 1 ){ $("#qka").addClass("bingo3"); var cothrns = cothrns + 1; }
        var qo = $("input[name=qo]").val(); if (qo == 1 ){ $("#qo").addClass("bingo4"); var rhkdlfrns = rhkdlfrns + 1; }
        var qocn = $("input[name=qocn]").val(); if (qocn == 1 ){ $("#qocn").addClass("bingo3"); var cothrns = cothrns + 1; }
        var quddkflzhd = $("input[name=quddkflzhd]").val(); if (quddkflzhd == 1 ){ $("#quddkflzhd").addClass("bingo2"); var eksqorwlffb = eksqorwlffb + 1; }
        var qncn = $("input[name=qncn]").val(); if (qncn == 1 ){ $("#qncn").addClass("bingo"); }
        var qmfhzhffl = $("input[name=qmfhzhffl]").val(); if (qmfhzhffl == 1 ){ $("#qmfhzhffl").addClass("bingo3"); var cothrns = cothrns + 1; }
        var qmffnqpfl = $("input[name=qmffnqpfl]").val(); if (qmffnqpfl == 1 ){ $("#qmffnqpfl").addClass("bingo4"); var rhkdlfrns = rhkdlfrns + 1; }
        var qlxkals = $("input[name=qlxkals]").val(); if (qlxkals == 1 ){ $("#qlxkals").addClass("bingo3"); var cothrns = cothrns + 1; }
        var qlxm = $("input[name=qlxm]").val(); if (qlxm == 1 ){ $("#qlxm").addClass("bingo3"); var cothrns = cothrns + 1; }
        var tkrhk = $("input[name=tkrhk]").val(); if (tkrhk == 1 ){ $("#tkrhk").addClass("bingo4"); var rhkdlfrns = rhkdlfrns + 1; }
        var tothddl = $("input[name=tothddl]").val(); if (tothddl == 1 ){ $("#tothddl").addClass("bingo3"); var cothrns = cothrns + 1; }
        var tntn = $("input[name=tntn]").val(); if (tntn == 1 ){ $("#tntn").addClass("bingo1"); var rhrfbrns = rhrfbrns + 1; }
        var tlrmacl = $("input[name=tlrmacl]").val(); if (tlrmacl == 1 ){ $("#tlrmacl").addClass("bingo3");  var cothrns = cothrns + 1; }
        var tkf = $("input[name=tkf]").val(); if (tkf == 1 ){ $("#tkf").addClass("bingo1"); var rhrfbrns = rhrfbrns + 1; }
        var tkfrkfn = $("input[name=tkfrkfn]").val(); if (tkfrkfn == 1 ){ $("#tkfrkfn").addClass("bingo1"); var rhrfbrns = rhrfbrns + 1; }
        var dktmvkfkrjtm = $("input[name=dktmvkfkrjtm]").val(); if (dktmvkfkrjtm == 1 ){ $("#dktmvkfkrjtm").addClass("bingo"); }
        var dkdnr = $("input[name=dkdnr]").val(); if (dkdnr == 1 ){ $("#dkdnr").addClass("bingo3"); var cothrns = cothrns + 1; }
        var doghqkr = $("input[name=doghqkr]").val(); if (doghqkr == 1 ){ $("#doghqkr").addClass("bingo3"); var cothrns = cothrns + 1; }
        var didqocn = $("input[name=didqocn]").val(); if (didqocn == 1 ){ $("#didqocn").addClass("bingo3"); var cothrns = cothrns + 1; }
        var didthddl = $("input[name=didthddl]").val(); if (didthddl == 1 ){ $("#didthddl").addClass("bingo3"); var cothrns = cothrns + 1; }
        var didvk = $("input[name=didvk]").val(); if (didvk == 1 ){ $("#didvk").addClass("bingo3"); var cothrns = cothrns + 1; }
        var dusrms = $("input[name=dusrms]").val(); if (dusrms == 1 ){ $("#dusrms").addClass("bingo3"); var cothrns = cothrns + 1; }
        var dusenqn = $("input[name=dusenqn]").val(); if (dusenqn == 1 ){ $("#dusenqn").addClass("bingo2"); var eksqorwlffb = eksqorwlffb + 1; }
        var dhdl = $("input[name=dhdl]").val(); if (dhdl == 1 ){ $("#dhdl").addClass("bingo3"); var cothrns = cothrns + 1; }
        var dndjd = $("input[name=dndjd]").val(); if (dndjd == 1 ){ $("#dndjd").addClass("bingo3"); var cothrns = cothrns + 1; }

        var wjrco = $("input[name=wjrco]").val(); if (wjrco == 1 ){ $("#wjrco").addClass("bingo3");var cothrns = cothrns + 1;  }
        var wjsqnsrkfn = $("input[name=wjsqnsrkfn]").val(); if (wjsqnsrkfn == 1 ){ $("#wjsqnsrkfn").addClass("bingo1"); var rhrfbrns = rhrfbrns + 1; }
        var wndrltkf = $("input[name=wndrltkf]").val(); if (wndrltkf == 1 ){ $("#wndrltkf").addClass("bingo1"); var rhrfbrns = rhrfbrns + 1; }
        var ckwh = $("input[name=ckwh]").val(); if (ckwh == 1 ){ $("#ckwh").addClass("bingo1"); var rhrfbrns = rhrfbrns + 1; }
        var ckqtkf = $("input[name=ckqtkf]").val(); if (ckqtkf == 1 ){ $("#ckqtkf").addClass("bingo1"); var rhrfbrns = rhrfbrns + 1; }
        var ckqtkfrkfn = $("input[name=ckqtkfrkfn]").val(); if (ckqtkfrkfn == 1 ){ $("#ckqtkfrkfn").addClass("bingo1"); var rhrfbrns = rhrfbrns + 1; }
        var cjdrudco = $("input[name=cjdrudco]").val(); if (cjdrudco == 1 ){ $("#cjdrudco").addClass("bingo3"); var cothrns = cothrns + 1; }
        var clwm = $("input[name=clwm]").val(); if (clwm == 1 ){ $("#clwm").addClass("bingo5"); var dbwpvnarns = dbwpvnarns + 1; }
        var znlshdk = $("input[name=znlshdk]").val(); if (znlshdk == 1 ){ $("#znlshdk").addClass("bingo1"); var rhrfbrns = rhrfbrns + 1; }
        var vkvmflzk = $("input[name=vkvmflzk]").val(); if (vkvmflzk == 1 ){ $("#vkvmflzk").addClass("bingo3"); var cothrns = cothrns + 1; }
        var vyrh = $("input[name=vyrh]").val(); if (vyrh == 1 ){ $("#vyrh").addClass("bingo3"); var cothrns = cothrns + 1; }
        var gksdn = $("input[name=gksdn]").val(); if (gksdn == 1 ){ $("#gksdn").addClass("bingo2"); var eksqorwlffb = eksqorwlffb + 1; }
        var gusal = $("input[name=gusal]").val(); if (gusal == 1 ){ $("#gusal").addClass("bingo1"); var rhrfbrns = rhrfbrns + 1; }
        var gnrltkf = $("input[name=gnrltkf]").val(); if (gnrltkf == 1 ){ $("#gnrltkf").addClass("bingo1"); var rhrfbrns = rhrfbrns + 1; }
        var gmral = $("input[name=gmral]").val(); if (gmral == 1 ){ $("#gmral").addClass("bingo1"); var rhrfbrns = rhrfbrns + 1; }

        var dhksenzhd = $("input[name=dhksenzhd]").val(); if (dhksenzhd == 1 ){ $("#dhksenzhd").addClass("bingo2"); var eksqorwlffb = eksqorwlffb + 1; }
        var qksksk = $("input[name=qksksk]").val(); if (qksksk == 1 ){ $("#qksksk").addClass("bingo4"); var qksksk = qksksk + 1; }
        var rjadmszhd = $("input[name=rjadmszhd]").val(); if (rjadmszhd == 1 ){ $("#rjadmszhd").addClass("bingo2"); var eksqorwlffb = eksqorwlffb +1; }
        var zpdlf = $("input[name=zpdlf]").val(); if (zpdlf == 1 ){ $("#zpdlf").addClass("bingo3"); var cothrns = 1 + cothrns; }
        var qkddnfxhakxh = $("input[name=qkddnfxhakxh]").val(); if (qkddnfxhakxh == 1 ){ $("#").addClass("bingo3"); var cothrns = cothrns + 1; }
        var gkscjsrkfn = $("input[name=gkscjsrkfn]").val(); if (gkscjsrkfn == 1 ){ $("#gkscjsrkfn").addClass("bingo1"); var cothrns = cothrns + 1; }
        var dkahsem = $("input[name=dkahsem]").val(); if (dkahsem == 1 ){ $("#dkahsem").addClass("bingo2"); var eksqorwlffb = eksqorwlffb + 1; }
        var alfrkfn = $("input[name=alfrkfn]").val(); if (alfrkfn == 1 ){ $("#alfrkfn").addClass("bingo1"); var rhrfbrns = rhrfbrns + 1; }

        var gmlstkftodtjs = $("input[name=gmlstkftodtjs]").val(); if (gmlstkftodtjs == 1 ){ $("#gmlstkftodtjs").addClass("bingo"); }
        if(rkwl == 2){ $("#rkwl").addClass("old_bingo");}
        if(rkawk == 2){ $("#rkawk").addClass("old_bingo");}
        if(rhrnak == 2){ $("#rhrnak").addClass("old_bingo");}
        if(rmseo == 2){ $("#rmseo").addClass("old_bingo");}
        if(rla == 2){ $("#rla").addClass("old_bingo");}
        if(smxkfl == 2){ $("#smxkfl").addClass("old_bingo");}
        if(eksghqkr == 2){ $("#eksghqkr").addClass("old_bingo");}
        if(ekdrms == 2){ $("#ekdrms").addClass("old_bingo");}
        if(eocn == 2){ $("#eocn").addClass("old_bingo");}
        if(fhapdls == 2){ $("#fhapdls").addClass("old_bingo");}
        if(an == 2){ $("#an").addClass("old_bingo");}
        if(aldur == 2){ $("#aldur").addClass("old_bingo");}
        if(qka == 2){ $("#qka").addClass("old_bingo");}
        if(qocn == 2){ $("#qocn").addClass("old_bingo");}
        if(qmfhzhffl == 2){ $("#qmfhzhffl").addClass("old_bingo");}
        if(qlxkals == 2){ $("#qlxkals").addClass("old_bingo");}
        if(qlxm == 2){ $("#qlxm").addClass("old_bingo");}
        if(tothddl == 2){ $("#tothddl").addClass("old_bingo");}
        if(tlrmacl == 2){ $("#tlrmacl").addClass("old_bingo");}
        if(dkdnr == 2){ $("#dkdnr").addClass("old_bingo");}
        if(doghqkr == 2){ $("#doghqkr").addClass("old_bingo");}
        if(didqocn == 2){ $("#didqocn").addClass("old_bingo");}
        if(didthddl == 2){ $("#didthddl").addClass("old_bingo");}
        if(didvk == 2){ $("#didvk").addClass("old_bingo");}
        if(dusrms == 2){ $("#dusrms").addClass("old_bingo");}
        if(dhdl == 2){ $("#dhdl").addClass("old_bingo");}
        if(dndjd == 2){ $("#dndjd").addClass("old_bingo");}
        if(wjrco == 2){ $("#wjrco").addClass("old_bingo");}
        if(cjdrudco == 2){ $("#cjdrudco").addClass("old_bingo");}
        if(vkvmflzk == 2){ $("#vkvmflzk").addClass("old_bingo");}
        if(vyrh == 2){ $("#vyrh").addClass("old_bingo");}
        if(ekfrrhrl == 2){ $("#ekfrrhrl").addClass("old_bingo");}
        if(fpsxlfzhd == 2){ $("#fpsxlfzhd").addClass("old_bingo");}
        if(quddkflzhd == 2){ $("#quddkflzhd").addClass("old_bingo");}
        if(dusenqn == 2){ $("#dusenqn").addClass("old_bingo");}
        if(gksdn == 2){ $("#gksdn").addClass("old_bingo");}
        if(rnlfl == 2){ $("#rnlfl").addClass("old_bingo");}
        if(tntn == 2){ $("#tntn").addClass("old_bingo");}
        if(tkf == 2){ $("#tkf").addClass("old_bingo");}
        if(wjsqnsrkfn == 2){ $("#wjsqnsrkfn").addClass("old_bingo");}
        if(ckwh == 2){ $("#ckwh").addClass("old_bingo");}
        if(ckqtkf == 2){ $("#ckqtkf").addClass("old_bingo");}
        if(znlshdk == 2){ $("#znlshdk").addClass("old_bingo");}
        if(gusal == 2){ $("#gusal").addClass("old_bingo");}
        if(gmral == 2){ $("#gmral").addClass("old_bingo");}
        if(qo == 2){ $("#qo").addClass("old_bingo");}
        if(qmffnqpfl == 2){ $("#qmffnqpfl").addClass("old_bingo");}
        if(tkrhk == 2){ $("#tkrhk").addClass("old_bingo");}
        if(clwm == 2){ $("#clwm").addClass("old_bingo");}

        if( dhksenzhd == 2){ $("#dhksenzhd").addClass("old_bingo");}
        if( qksksk == 2){ $("#qksksk").addClass("old_bingo");}
        if( rjadmszhd == 2){ $("#rjadmszhd").addClass("old_bingo");}
        if( zpdlf == 2){ $("#zpdlf").addClass("old_bingo");}
        if( qkddnfxhakxh == 2){ $("#qkddnfxhakxh").addClass("old_bingo");}
        if( dkahsem == 2){ $("#dkahsem").addClass("old_bingo");}
        if( gkscjsrkfn == 2){ $("#gkscjsrkfn").addClass("old_bingo");}

        var allsum = rhrfbrns + eksqorwlffb + cothrns + rhkdlfrns + dbwpvnarns;
        $("#rhrfbrns").html(rhrfbrns);
        $("#eksqorwlffb").html(eksqorwlffb);
        $("#cothrns").html(cothrns);
        $("#dbwpvnarns").html(dbwpvnarns);
        $("#rhkdlfrns").html(rhkdlfrns);
        $("#allsum").html(allsum);
        $("#allsum1").html(allsum);
    </script>
    <script>
        var hugi = $("input[name=hugi]").val();
        if ( hugi == 0 ){
            $("#bingopan").fadeIn();
            $("#hugipan").fadeOut();
        } else {
            $("#bingopan").fadeOut();
            $("#hugipan").fadeIn();
        }
        var chogi = $("input[name=chogiview]").val();
        if ( chogi == 1 ){
            $("#chogiview").fadeIn();
        } else {
            $("#chogiview").fadeOut();
        }
    </script>
    <script>
        var superfood = $("input[name=fhapdls").val();
        var jungthree = $("input[name=jungthree]").val();
        if ( jungthree == 0 ){
            $("#jungthree").fadeOut();
        } else {
            if (superfood == 1) {
                $("#no_super").fadeOut();
                $("#yes_super").fadeIn();
            }
            else{
                $("#no_super").fadeIn();
                $("#yes_super").fadeOut();
            }
            $("#bingo_end").fadeIn();
            $("#jungthree").fadeIn();
        }
    </script>
    <script>
        var noauth = $("input[name=auth").val();
        if (noauth == 1) {
            $("#no_auth").fadeIn();
            $("#tabbox1").fadeOut();
            $("#tabbox2").fadeOut();
            $("#tabbox3").fadeOut();
            $("#tabbox4").fadeOut();
            $("#faketabbox1").fadeIn();
            $("#faketabbox2").fadeIn();
            $("#faketabbox3").fadeIn();
            $("#faketabbox4").fadeIn();
        } 


        var nolimit = $("input[name=limit").val();
        if (nolimit == 1) {
            $("#no_limit").fadeIn();
        } else if(nolimit == 2) {
            $("#end_limit").fadeIn();
            $("#tabbox1").fadeOut();
            $("#tabbox2").fadeOut();
            $("#tabbox3").fadeOut();
            $("#tabbox4").fadeOut();
            $("#faketabbox1").fadeIn();
            $("#faketabbox2").fadeIn();
            $("#faketabbox3").fadeIn();
            $("#faketabbox4").fadeIn();
        }
        $("#limit_next").click(function(){
            $("#no_limit").fadeOut();
        });

        $("#limit_next_1").click(function(){
            $("#no_auth").fadeOut();
        });

        $("#limit_end_next").click(function(){
            $("#end_limit").fadeOut();
        });
    </script>
    <script>
        var gazesval = $("input[name=gazes]").val();
        if ( gazesval == 10 ){
            $("#startpoint").css("margin-left","0%");
        } else if( gazesval == 20 ) {
            $("#startpoint").css("margin-left","10%");
        } else if( gazesval == 40 ) {
            $("#startpoint").css("margin-left","18%");
        } else if( gazesval == 70 ) {
            $("#startpoint").css("margin-left","42%");
        } else if( gazesval == 90 ) {
            $("#startpoint").css("margin-left","66%");
        } else if( gazesval == 110 ) {
            $("#startpoint").css("display","none");
        }
        var gazeval = $("input[name=gaze]").val();
        if ( gazeval == 10 ){
            $("#pro_jun").addClass('active now_active');
        } else if( gazeval == 20 ) {
            $("#pro_jun").addClass("active");
            $("#pro_cho").addClass("active now_active");
        } else if( gazeval == 30 ) {
            $("#pro_jun").addClass("active");
            $("#pro_cho").addClass("active");
            $("#pro_jung").addClass("active now_active");
        } else if( gazeval == 40 ) {
            $("#pro_jun").addClass('active');
            $("#pro_cho").addClass('active');
            $("#pro_jung").addClass('active now_active');
        } else if( gazeval == 50 ) {
            $("#pro_jun").addClass("active");
            $("#pro_cho").addClass("active");
            $("#pro_jung").addClass("active now_active");
        } else if( gazeval == 60 ) {
            $("#pro_jun").addClass("active");
            $("#pro_cho").addClass("active");
            $("#pro_jung").addClass("active");
            $("#pro_hu").addClass("active now_active");
        } else if( gazeval == 70 ) {
            $("#pro_jun").addClass("active");
            $("#pro_cho").addClass("active");
            $("#pro_jung").addClass("active");
            $("#pro_hu").addClass("active now_active");
        } else if( gazeval == 80 ) {
            $("#pro_jun").addClass("active");
            $("#pro_cho").addClass("active");
            $("#pro_jung").addClass("active");
            $("#pro_hu").addClass("active now_active");
        } else if( gazeval == 90 ) {
            $("#pro_jun").addClass("active");
            $("#pro_cho").addClass("active");
            $("#pro_jung").addClass("active");
            $("#pro_hu").addClass("active");
            $("#pro_wan").addClass("active now_active");
        } else if( gazeval == 100 ) {
            $("#pro_jun").addClass("active");
            $("#pro_cho").addClass("active");
            $("#pro_jung").addClass("active");
            $("#pro_hu").addClass("active");
            $("#pro_wan").addClass("active now_active");
        } else if( gazeval == 110 ) {
            $("#pro_jun").addClass("active");
            $("#pro_cho").addClass("active");
            $("#pro_jung").addClass("active");
            $("#pro_hu").addClass("active");
            $("#pro_wan").addClass("active now_active");
        }
    </script>
    <script>
        $("#top_btn01").click(function(){
            $(".tab_top").css("background-color","#33875d");
            $("html").animate({scrollTop : 0}, 400);
        });
        $("#top_btn02").click(function(){
            $(".tab_top").css("background-color","#8cc364");
            $("html").animate({scrollTop : 0}, 400);
        });
        $("#top_btn03").click(function(){
            $(".tab_top").css("background-color","#ffc85a");
            $("html").animate({scrollTop : 0}, 400);
        });
        $("#top_btn04").click(function(){
            $(".tab_top").css("background-color","#ff7864");
            $("html").animate({scrollTop : 0}, 400);
        });
    </script>

    <script>

        var snackauth = $("#snack_auth_code").val();
        if ( snackauth == 1 ){
            $("#auth_snack_block").removeClass("authoff");
        } else {
            $("#auth_snack_block").addClass("authoff");
        }

    </script>

    <script>

        $(".header").hide();

        var last_top = 250;
        $(window).scroll(function() {
            var this_top = $(this).scrollTop();
            if( this_top > last_top ) {
                $(".fixedbox").addClass("stic");
            }
            else {
                $(".fixedbox").removeClass("stic");
            }

        });

    </script>

<?php
mysqli_close($mysqli);
?>
<?php
do_action( 'storefront_sidebar' );
get_footer();
