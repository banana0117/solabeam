
<?php
/**
 * Template Name: con3mpage
 */
 
get_header(); ?>

<?php 

if (is_user_logged_in()) {

    $userid = get_user_meta( $current_user -> ID, 'username', true );
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
 
<div class="box mt50">
    <div class="mypage-title">
        <div class="mypage-title-img">
            <div class="mypage-title-img-inner"></div>
        </div>
        <div class="mypage-title-text">
            <p><?php echo $username ?>님 반갑습니다.</p>
            <span>정보수정 ></span>
        </div>
    </div>
</div>
 
<div class="mypage-sub">

    <?php 

        if(empty($username)){
            echo '<p>진행중인 정기배송이 없습니다.</p>';
            echo '<p>가입하러가기</p>';
        } else {
            echo '
            <p>'.$baby_name.'이를 위한</p>
            <p>'.$user_nowperiod.'/'.$user_membership.' 식단 진행 중</p>
            <div class="mypage-sub_star">
            <p>'.$user_delidate.' 시작</p>
            <p>매주 '.$user_deliday.'요일 발송<span class="atagsub" data-href="">배송조회하기 ></span></p>
            </div>
            ';
        }
        // 위에 배송조회하기 링크 넣어주세요
    ?>

    
</div>
<!--
<div class="box">
    <div class="mypage-point">
        <div class="mypage-point-inner01">
            <p>포인트</p>
            <p>10,000</p>
        </div>
        <div class="mypage-point-inner02">
            <p>추천인내역</p>
            <p>2</p>
        </div>
    </div>
</div>
-->
<div class="box">
    <div class="box-contents">
        <div class="list mypage-list">
            <div class="col3-00 list-item">
                <div class="list-item__imgs">
                    <div class="mypage-img">
                      <img src="/wp-content/themes/storefront-child/con3/image/mypage01.png" alt="변송지변경">
                    </div>
                    <div class="mypage-text">
                        <p>배송지변경</p>
                    </div>
                </div>
            </div>
            <div class="col3-00 list-item">
                <div class="list-item__imgs">
                    <div class="mypage-img">
                        <img src="/wp-content/themes/storefront-child/con3/image/mypgae02.png" alt="식단확인">
                    </div>
                    <div class="mypage-text">
                        <p>식단확인</p>
                    </div>
                </div>
            </div>
            <div class="col3-00 list-item">
                <div class="list-item__imgs">
                    <div class="mypage-img">
                        <img src="/wp-content/themes/storefront-child/con3/image/mypage03.png" alt="보고서확인">
                    </div>
                    <div class="mypage-text">
                        <p>보고서확인</p>
                    </div>
                </div>
            </div>
            <div class="col3-00 list-item">
                <div class="list-item__imgs">
                    <div class="mypage-img">
                      <img src="/wp-content/themes/storefront-child/con3/image/mypage04.png" alt="도담가이드">
                    </div>
                    <div class="mypage-text">
                        <p>도담가이드</p>
                    </div>
                </div>
            </div>
            <div class="col3-00 list-item">
                <div class="list-item__imgs">
                    <div class="mypage-img">
                        <img src="/wp-content/themes/storefront-child/con3/image/mypage05.png" alt="이벤트">
                    </div>
                    <div class="mypage-text">
                        <p>이벤트</p>
                    </div>
                </div>
            </div>
            <div class="col3-00 list-item">
                <div class="list-item__imgs">
                    <div class="mypage-img">
                        <img src="/wp-content/themes/storefront-child/con3/image/mypage06.png" alt="후기작성하기">
                    </div>
                    <div class="mypage-text">
                        <!-- 누르면 준비중입니다 alert 만들기 -->
                        <p>후기작성하기</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="box">
    <div class="mypage-center">
        <ul>
            <li>
                <p>고객센터</p>
            </li>
        </ul>
    </div>
</div>

 
<!--여기까지-->

<?php
do_action( 'storefront_sidebar' );
get_footer();
