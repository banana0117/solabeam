<?php

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$name = $_POST['username'];
$phone = $_POST['userphone'];

$id_search = "SELECT * FROM wp_usermeta WHERE meta_value = '$phone'";
$id_search_r = mysqli_query($mysqli, $id_search);
$id_search_row = mysqli_fetch_array($id_search_r);

$meta = $id_search_row[user_id];

$login_search = "SELECT * FROM wp_users WHERE ID = '$meta'";
$login_result = mysqli_query($mysqli, $login_search);
$login_row = mysqli_fetch_array($login_result);

$showid = $login_row[ID];

if (empty($showid)) {
    $code = 1;
} else {
    $code = 2;
}


?>

<input type="hidden" name="code" value="<?php echo $code ?>">

<div class="" id="suc">
    <div class="">
        <p>회원님의 아이디는</p>
        <p><?php echo $showid ?></p>
        <p>입니다</p>
    </div>
    <div class="">
        <a href="">비밀번호찾기 ></a>
    </div>
    <div class="">
        <a href="/login/?redirect_to=">로그인하기</a>
    </div>
</div>

<div class="" id="fail">
    <p>해당하는 정보를 찾을 수 없습니다</p>
    <!-- 다시 아이디비번찾기 페이지로 링크 -->
    <a href="">재시도</a>
</div>

<script>

var code = $(input[name="code"]).val();

if (code == 1){
    $("#suc").hide();
    $("#fail").show();
} else{
    $("#suc").show();
    $("#fail").hide();
}

</script>