<script type="text/javascript" src="/wp-content/themes/storefront-child/jquery/jquery-3.4.1.min.js"></script>

<?php

//if( current_user_can( 'subscriber' ) ){
//$userid = get_user_meta( $current_user -> ID, 'username', true );
//$username = get_user_meta( $current_user -> ID, 'first_name', true );
//
//}
//else
//{ 
//echo "<script>alert('로그인 하지 않았거나, 대상자가 아닙니다.');location.href='/';</script>";
//}

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$userid = "banana";

$user_info_query = "SELECT * FROM userbase WHERE userid = '$userid'";
$user_info_result = mysqli_query($mysqli, $user_info_query);
$user_info_row = mysqli_fetch_array($deli_data_result);

$meta_name = $user_info_row[username];
$meta_tables = $user_info_row[tables];
$meta_super = $user_info_row[super];
$meta_mate = $user_info_row[mate];
$meta_beef = $user_info_row[beef];
$meta_tenloin = $user_info_row[tenloin];
$meta_water = $user_info_row[water];
$meta_weekend = $user_info_row[weekend];
$meta_care = $user_info_row[care];
$meta_nowperiod = $user_info_row[nowperiod];



?>

<style>

    input[type="radio"]:checked + label { background-color:#666; }

</style>

<form method="POST" action="">
<div>
    <div class="">
        <p><?php echo $meta_name ?>님의<br>지금이유식은?</p>
    </div>
    <div>
<p>지금 현재시기는?</p>
</div>
    <div class="">
        <input type="radio" name="period" id="period_jun" value="">
        <label for="period_jun">준비기</label>
        <input type="radio" name="period" id="period_cho" value="">
        <label for="period_cho">초기</label>
        <input type="radio" name="period" id="period_jung" value="">
        <label for="period_jung">중기</label>
        <input type="radio" name="period" id="period_hu" value="">
        <label for="period_hu">후기</label>
        <input type="radio" name="period" id="period_wan" value="">
        <label for="period_wan">완료기</label>
        <input type="radio" name="period" id="period_yoo" value="">
        <label for="period_yoo">유아기</label>
    </div>
    <div>
<p>현재 식단은?</p>
</div>
    <div class="">
        <input type="radio" name="table" id="table_1" value="">
        <label for="table_1">식단1</label>
        <input type="radio" name="table" id="table_2" value="">
        <label for="table_2">식단2</label>
        <input type="radio" name="table" id="table_3" value="">
        <label for="table_3">식단3</label>
        <input type="radio" name="table" id="table_4" value="">
        <label for="table_4">식단4</label>
    </div>

<div>
<p>이런옵션은 어떤가요?</p>
</div>
    <div class="">
        <input type="checkbox" name="opt" id="opt_1" value="">
        <label for="opt_1"></label>
        <input type="checkbox" name="opt" id="opt_2" value="">
        <label for="opt_2"></label>
        <input type="checkbox" name="opt" id="opt_3" value="">
        <label for="opt_3"></label>
        <input type="checkbox" name="opt" id="opt_4" value="">
        <label for="opt_4"></label>
    </div>



</div>
</form>