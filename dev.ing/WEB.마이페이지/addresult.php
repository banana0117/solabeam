<?php
/**
 * Template Name: addresult
 */

 // 배송지변경 완료페이지
 // html 부분 수정해주면 됩니다

get_header(); ?>

<?php
    $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
?>

<?php
date_default_timezone_set('Asia/Seoul');

$redate = date("Y-m-d H:i:s");
$userid = get_user_meta( $current_user -> ID, 'username', true );
$cha_name = $_POST['addname'];
$cha_phone = $_POST['addphone'];
$cha_add_1 = $_POST['addaddress_1'];
$cha_add_2 = $_POST['addaddress_2'];
$cha_address = $cha_add_1." ".$cha_add_2;
$cha_postcode = $_POST['addpostcode'];

$cha_message = $_POST['message'];

if ($cha_message == "text"){
    $cha_message = $_POST['direct'];
}


$insert_query = "UPDATE userbase SET username = '$cha_name', phone = '$cha_phone', address = '$cha_address', postcode = '$cha_postcode', message='$cha_message'  WHERE userid = '$userid'";

mysqli_query($mysqli, $insert_query);

$insert_log_query = "INSERT INTO addresslog (chadate, chaaddress, userid, username, userphone, usermessage) VALUES ( '$redate', '$cha_address', '$userid', '$cha_name','$cha_phone','$cha_message' )";
mysqli_query($mysqli, $insert_log_query);


mysqli_close($mysqli);

?>


<div>
<p>배송지변경이 완료됨~</p>
</div>





<?php
do_action( 'storefront_sidebar' );
get_footer();


