<?php

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
$today = date("Y-m-d");

$userid = $_POST['userid'];

$user_query = "SELECT * FROM userbase WHERE userid = '$userid'";
$user_result = mysqli_query($mysqli, $user_result);
$user_row = mysqli_fetch_array($user_result);

$c_subid = $user_row[subid];
$c_userid = $user_row[userid];
$c_username = $user_row[username];
$c_phone = $user_row[phone];
$c_address = $user_row[address];
$c_firstperiod = $user_row[firstperiod];
$c_membership = $user_row[membership];
$c_opt = $user_row[opt];
$c_delidate = $user_row[delidate];
$c_deliday = $user_row[deliday];
$c_postcode = $user_row[postcode];
$c_message = $user_row[message];
$c_limitday = $user_row[limitday];
$c_addproduct = $user_row[addproduct];
$c_nextpayment = $user_row[nextpayment];
$c_nextdeliday = $user_row[nextdeliday];
$c_tables = $user_row[tables];
$c_super = $user_row[super];
$c_mate = $user_row[mate];
$c_beef = $user_row[beef];
$c_tenloin = $user_row[tenloin];
$c_water = $user_row[water];
$c_snack = $user_row[snack];
$c_snacke = $user_row[snacke];
$c_weekend = $user_row[weekend];
$c_care = $user_row[care];
$c_safe = $user_row[safe];
$c_tablecode = $user_row[tablecode];
$c_news = $user_row[news];
$c_pkg = $user_row[pkg];
$c_periodstr = $user_row[periodstr];
$c_tablestr = $user_row[tablestr];
$c_sidestr = $user_row[sidestr];


$cancle_query = "INSERT INTO `canclebase`(`cancledate`, `subid`, `userid`, `username`, `phone`, `address`, `firstperiod`, `membership`, `opt`, `delidate`, `deliday`, `postcode`, `message`, `limitday`, `addproduct`, `nextpayment`, `nextdeliday`, `nowperiod`, `recommend`, `tables`, `super`, `mate`, `beef`, `tenloin`, `water`, `snack`, `snacke`, `weekend`, `care`, `safe`, `tablecode`, `news`, `pkg`, `periodstr`,`tablestr`, `sidestr`) VALUES ('$today','$c_subid','$c_userid','$c_username','$c_phone','$c_address','$c_firstperiod','$c_membership', '$c_opt','$c_delidate','$c_deliday','$c_limitday','$c_addproduct','$c_nextpayment','$c_nextdeliday', '$c_tables','$c_super','$c_mate','$c_beef','$c_tenloin','$c_water','$c_snack','$c_snacke','$c_weekend','$c_care', '$c_safe','$c_tablecode','$c_news','$c_pkg','$c_periodstr','$c_tablestr','$c_sidestr')";
mysqli_query($mysqli, $cancle_query);

$delete_query = "DELETE FROM `userbase` WHERE userid = '$userid'";
mysqli_query($mysqli, $delete_query);

echo '<p>완료 <a href="/wp-content/themes/storefront-child/adminform/new_form.php">여기</a>를 눌러 돌아가세요';

?>
