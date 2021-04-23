
<?php

if (is_user_logged_in()) {

    $userid = get_user_meta( $current_user -> ID, 'username', true );
    $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

} else {
    //로그인->리다이렉트 하는거 신경써야함, 마이페이지 주소가 바뀔경우 주소 꼭 바꿔주기
    echo "<script>alert('로그인이 필요합니다.');location.href='/login?redirect_to=/mypage';</script>";
}

$user_current_query = "SELECT * FROM wp_users WHERE user_login = '$userid'";
$user_current_result = mysqli_query($mysqli, $user_current_query);
$user_current_row = mysqli_fetch_array($user_current_result);

$user_code = $user_current_row[ID];
$user_pass = $user_current_row[user_pass];
$user_mail = $user_current_row[user_email];

$user_name_query = "SELECT * FROM wp_usermeta WHERE user_id = '$user_code' AND meta_key = 'first_name'";
$user_name_result = mysqli_query($myqsli, $user_name_query);
$user_name_row = mysqli_fetch_array($user_name_result);
$user_name = $user_name_row[meta_value];

$user_phone_query = "SELECT * FROM wp_usermeta WHERE user_id = '$user_code' AND meta_key = 'billing_phone'";
$user_phone_result = mysqli_query($myqsli, $user_phone_query);
$user_phone_row = mysqli_fetch_array($user_phone_result);
$user_phone = $user_phone_row[meta_value];

$baby_name_query = "SELECT * FROM wp_usermeta WHERE user_id = '$user_code' AND meta_key = 'baby_name'";
$baby_name_result = mysqli_query($myqsli, $baby_name_query);
$baby_name_row = mysqli_fetch_array($baby_name_result);
$baby_name = $baby_name_row[meta_value];

$baby_birth_query = "SELECT * FROM wp_usermeta WHERE user_id = '$user_code' AND meta_key = 'baby_birth'";
$baby_birth_result = mysqli_query($myqsli, $baby_birth_query);
$baby_birth_row = mysqli_fetch_array($baby_birth_result);
$baby_birth = $baby_birth_row[meta_value];

?>

<div>
    <!--action값에 회원정보수정 완료페이지 링크 달아주세요-->
    <form method="POST" id="userdata-editt" action="/">
        <input type="hidden" name="userid" value="<?php echo $userid ?>">
        <input type="hidden" name="usercode" value="<?php echo $user_code ?>">
        <div class="">
            <div class="">
                <p>고객정보</p>
            </div>
            <div class="">
                <div class="">
                    <p>이름</p>
                </div>
                <div class="">
                    <input type="text" name="username" value="<?php echo $user_name ?>" readonly>
                </div>
            </div>
            <div class="">
                <div class="">
                    <p>연락처</p>
                </div>
                <div class="">
                    <input type="text" name="userphone" value="<?php echo $user_phone ?>">
                </div>
            </div>
            <div class="">
                <div class="">
                    <p>이메일</p>
                </div>
                <div class="">
                    <input type="text" name="usermail" value="<?php echo $user_mail ?>">
                </div>
            </div>
        </div>

        <div class="">
            <div class="">
                <div class="">
                    <p>현재비밀번호</p>
                </div>
                <div class="">
                    <input type="password" name="nowpass" value="<?php echo $user_pass ?>">
                </div>
            </div>
            <div class="">
                <div class="">
                    <p>새 비밀번호</p>
                </div>
                <div class="">
                    <input type="password" name="newpass" placeholder='****' value="">
                </div>
            </div>
            <div class="">
                <div class="">
                    <p>새 비밀번호 확인</p>
                </div>
                <div class="">
                    <input type="password" name="newpass2" placeholder='****' value="">
                </div>
            </div>
        </div>

        <div class="">
            <div class="">
                <p>아기정보</p>
            </div>
            <div class="">
                <div class="">
                    <p>이름</p>
                </div>
                <div class="">
                    <input type="text" name="babyname" value="<?php echo $baby_name ?>">
                </div>
            </div>
            <div class="">
                <div class="">
                    <p>출생일월</p>
                </div>
                <div class="">
                    <input type="text" name="birthday" value="<?php echo $baby_birth ?>">
                </div>
            </div>
        </div>

        <div class="">
            <input type="submit" value="정보수정 하기">
        </div>

    </form>

</div>
