<?php
/*

*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
리뷰작성 페이지소스입니다

아래에 html 코드 부분 수정해서 사용하시면 됩니다

클래스명 바꾸시고 이것저것 하신다음 사용하시면 되겠네용

*/

if (is_user_logged_in()) {

    $userid = get_user_meta($current_user->ID, 'username', true);
    $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
} else {
    //로그인->리다이렉트 하는거 신경써야함, 마이페이지 주소가 바뀔경우 주소 꼭 바꿔주기
    echo "<script>alert('로그인이 필요합니다.');location.href='/login?redirect_to=/mypage';</script>";
}

$user_data = "SELECT * FROM userbase WHERE userid = '$userid'";
$user_data_r = mysqli_query($mysqli, $user_data);
$user_data_a = mysqli_fetch_array($user_data_r);

$user_name = $user_data_a[username];
$user_nowperiod = $user_data_a[nowperiod];
$user_membership = $user_data_a[membership];
$user_delidate = $user_data_a[delidate];
$user_deliday = $user_data_a[deliday];


$baby_data = "SELECT * FROM presearch WHERE userid = '$userid'";
$baby_data_r = mysqli_query($mysqli, $baby_data);
$baby_data_a = mysqli_fetch_array($baby_data_r);
$baby_name = $baby_data_a[babyname];

?>
<style>
    .starR1 {
        background: url('/wp-content/themes/storefront-child/image/stars.png') no-repeat -52px 0;
        background-size: auto 100%;
        width: 15px;
        height: 30px;
        float: left;
        text-indent: -9999px;
        cursor: pointer;
    }

    .starR2 {
        background: url('/wp-content/themes/storefront-child/image/stars.png') no-repeat right 0;
        background-size: auto 100%;
        width: 15px;
        height: 30px;
        float: left;
        text-indent: -9999px;
        cursor: pointer;
    }

    .starR1.on {
        background-position: 0 0;
    }

    .starR2.on {
        background-position: -15px 0;
    }
</style>

<div class="">
    <?php

    if (empty($user_name)) {
        echo '<p>진행중인 정기배송이 없습니다.</p>';
        echo '<a>가입하러가기</a>';
    } else {
        echo '
    <p>' . $baby_name . '이를 위한</p>
    <p>' . $user_nowperiod . '/' . $user_membership . ' 식단 진행 중</p>
    <div class="mypage-sub_star">
    <p>' . $user_delidate . ' 시작</p>
    <p>매주 ' . $user_deliday . '요일 발송<span class="atagsub" data-href="">배송조회하기 ></span></p>
    </div>
    ';
    }

    ?>
</div>
<form method="POST" action="">
<div class="">
    <div class="starRev">
        <span class="starR1 on">별1_왼쪽</span>
        <span class="starR2">별1_오른쪽</span>
        <span class="starR1">별2_왼쪽</span>
        <span class="starR2">별2_오른쪽</span>
        <span class="starR1">별3_왼쪽</span>
        <span class="starR2">별3_오른쪽</span>
        <span class="starR1">별4_왼쪽</span>
        <span class="starR2">별4_오른쪽</span>
        <span class="starR1">별5_왼쪽</span>
        <span class="starR2">별5_오른쪽</span>
    </div>

    <div class="">
        <input type="text" name="comment" maxlength="200">
        <p><span id="length">0</span>/200</p>
    </div>
<div class="">
<input type="hidden" value="" name="score" id="score">
<input type="hidden" value="<?php echo $userid ?>" name="userid">
<input type="hidden" value="<?php echo $user_nowperiod ?>" name="period">
<input type="hidden" value="<?php echo $user_membership ?>" name="membership">

<input type="submit" value="작성하기">
</div>
</div>
</form>




<script>

    $('.starRev span').click(function() {
        $(this).parent().children('span').removeClass('on');
        $(this).addClass('on').prevAll('span').addClass('on');

        var scores = $(".on").length;
        $("#score").val(scores);

    });

    $("input[name=comment]").on('keyup change', function() {
        
        let count = $(this).val().length;
        $("#length").html(count);
        
    });

</script>