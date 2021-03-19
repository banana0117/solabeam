<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */

get_header(); ?>
<style>
    .main_wrap_slider {padding-bottom: 60px;}
    .banner {box-shadow:none;}
    .slide-txt {text-align: center; padding: 10px 17px 0; height: 235px;}
    .star-img {display: flex; justify-content: center;}
    .star-img img {width: 18px; height: 27px; margin: 0 3px 15px;}
    .slide-txt {text-align: center;}
    .slide-name {margin-left: 30px; padding-top: 30px;}
    .slide-name:first-child {margin-left: 30px; padding-top: 15px;}
    .slide-name span {position: relative; font-size: 14px; color: #999999; margin-right: 20px;}
    .slide-name span::before {content: ""; position: absolute; top: 4px; right: -12px; width: 1px; height: 14px; background-color: #999;}
    .slide-name span:last-child:before {width: 0px;}
    .slide-review {text-align: left;}
    .slide-review p {font-size: 14px;}
    .slide-boxshadow { box-shadow: 0px 5px 8px rgba(0, 0, 0, 0.15);}

    
    .icon-box {background-color: #dce2f0; padding-bottom: 60px;}
    .icon-box h3 {text-align: center; color: #50586c; padding: 60px 0 36px;}
    .icon-boxs {display: flex;}
    .icon-img {width: 58px; height: 59px; margin: 0 34px 30px 44px;}
    .icon-txt {}
    .icon-txt p {font-size: 16px; color: #50586c; font-weight: bold; padding-top: 16px;}
    .icon-txt span {font-size: 14px; font-weight: normal;}
    
    /* slide2 */
    .slide2 {padding-bottom: 60px;}
    .h3-slide2 {text-align: center; font-size: 24px; color: #427ac7; padding: 50px 0 10px;}
    .swiper-slide {text-align: center; margin-bottom: 10px;}
    .swiper-slide img {}
    .swiper-slide .slide03 {font-size: 12px;}
    .slide-btn {padding-bottom: 30px;}

    .num-bg {background-color: #50586c; padding: 5px 20px 75px;}
    .num-txt {margin-top: 55px;}
    .num-txt h3 {color: #fff; font-size: 26px; }
    .num-txt span {color: #fff; font-size: 14px; font-weight: normal; letter-spacing: -0.4px;}

    /* report */
    .report-bg {background-color: #7b9acc; padding: 60px 20px;} 
    .report-box {width: 100%; background-color: #fcf6f5; border-radius: 18px; margin-bottom: 30px; max-height: 280px;}
    .report-box:last-child {margin-bottom: 0;}
    .report-box:nth-child(2) { padding-bottom: 34%;}
    .report-txt { padding: 30px 30px 10px;}
    .report-txt h3 {font-size: 24px; color: #50586c; padding-bottom: 10px;}
    .report-txt p {font-size: 14px; color: #50586c;}
    .meal-img {padding-left: 120px; transform: translate(16px, -32px); max-width: 340px; animation: updown1 2s infinite;}

    .report-img {padding: 0 15px;}
    .report-img-box {position: relative;  animation: updown2 2s infinite;}
    .report-img-box img {width: 31%;}
    .report-img-box img:nth-child(1) {position: absolute; top: 10px; left: 2%;}
    .report-img-box img:nth-child(2) {position: absolute; top: 0px; left: 23%;}
    .report-img-box img:nth-child(3) {position: absolute; top: 10px; left: 45%;}
    .report-img-box img:nth-child(4) {position: absolute; top: 0px; left: 67.5%;}
 
    .re-del {padding-bottom: 41%;}
    .delivery-img {position: relative;}
    .delivery-img-box {position: absolute; top: -119px; right: 0; padding-left: 50px; transform: translate(-12px, 0);  animation: updown3 2s infinite;}
    .report-box img {max-width: 300px;}

    
    .back-cir3 {background-color: #fffdf8; padding: 0px 0 75px; text-align: center;}
    .back-cir3 h3 {color: #7d5028; font-size: 24px; padding-top: 60px;}
    .cir {padding: 54px 0 29px; text-align: center;}
    .cir-img {border-radius: 50%; width: 219px; height: 219px;  margin: 0 auto; background-color: #fff;  transform:translateY(200px); transition:all 0.6s; opacity:0;} 
    .cir-img.on{transform: translateY(0); opacity: 1;}
    .cir-txt {padding-top: 29px;  transform:translateY(200px); transition:all 0.6s; opacity:0;}
    .cir-txt.on {transform: translateY(0); opacity: 1;}
    .cir-txt p {font-size: 14px; color: #7d5028;}
    .cir-txt h4 {font-size: 18px; font-weight: bold; color: #7d5028; margin: 0; padding-top: 10px; line-height: 1.44;}
    .cir-img img {border-radius: 50%; box-shadow: -1px 5px 10px rgba(85, 51, 0, 0.2)}
  
    
    .back-img_01 { background-image: url("/wp-content/themes/storefront-child/image/con2/back_01.png"); background-size: 100% 100%; background-position: center; background-repeat: no-repeat;}
    .back-img_02 {background-image: url("/wp-content/themes/storefront-child/image/con2/back_02.png"); background-size: 100% 100%; background-repeat: no-repeat;}
    .back-img_03 {background-image: url("/wp-content/themes/storefront-child/image/con2/back_03.png"); background-size: 100% 100%; background-repeat: no-repeat;}
    .back-txt {padding: 16% 0 70%; transform: translateY(200px); opacity: 0; transition: all 0.6s;}
    .back-txt.on {transform: translateY(0); opacity: 1;}
    .back-txt h3 {font-size: 24px; font-weight: bold; padding: 0 0 0 20px; line-height: 37px;}
    .back-txt h3 span {font-size: 32px;}
    .back-txt p {font-size: 14px; padding: 0 20px; line-height: 25px; padding-top: 15px;}
    .back_01 h3 {color: #427ac7;}
    .back_01 p { color: #427ac7;}
    .back_02 h3 {color: #22881a;}
    .back_02 p { color: #22881a;}
    .back_03 h3 {color: #50586c;}
    .back_03 p { color: #50586c;}

    .make {background: #7b9acc; text-align: center; padding:55px 0 75px;}
    .make p {font-size: 14px; color: #fff; padding-bottom: 10px;}
    .make h3 {font-size: 24px; color: #fff; margin: 0 0 45px; font-weight: normal;}
    .make h3 span {font-weight: bold;}
    .make a {font-size: 14px; font-weight: bold; color: #427ac7; padding: 16px 58px; background: #fff; margin-top: 30px;}
    .img_under_text p {letter-spacing: -0.3px;}

    .st-pusher {padding-bottom: 0;}

    @keyframes updown1 {
        0%   {transform: translate(16px,-32px)}
        50%  {transform: translate(16px,-38px)}
	    100% {transform: translate(16px,-32px)}
    }
    @keyframes updown2 {
        0%   {transform: translate(0px,0px)}
        50%  {transform: translate(0px,-8px)}
	    100% {transform: translate(0px,0px)}
    }
    @keyframes updown3 {
        0%   {transform: translate(-12px,0px)}
        50%  {transform: translate(-12px,-8px)}
	    100% {transform: translate(-12px,0px)}
    }
 

</style>


<div class="box">
    <div class="navi">
        <ul class="flex flexible center">
            <li><a href="/con2dodammeal" class="p">처음 오셨나요</a></li>
            <li><a href="/con2period" class="p">주문하기</a></li>
            <li><a href="/event" class="p">이벤트</a></li>
        </ul>
        <div class="bar"></div>
    </div>
</div>
<div class="swiper-container main_wrap_slider">
    <div class="swiper-wrapper">
        <div class="swiper-slide atagsub" data-href="/con2dodammeal">
            <img src="/wp-content/themes/storefront-child/con2/30_01.png">
            <div class="txt_box">
                <h3 class="h3">아기와 엄마를 위한 요리시간,</h3>
                <h3 class="h3 mb10">도담밀 이유식 밀키트</h3>
                <p class="p">집에서 만드는 이유식을 100% 완벽하게,</p>
                <p class="p">도담밀이 밀키트를 만듭니다.</p>
            </div>
        </div>
        <div class="swiper-slide atagsub" data-href="/dodamclass">
            <img src="/wp-content/themes/storefront-child/con2/30_06.png">
            <div class="txt_box">
                <h3 class="h3">도담밀이 추천하는</h3>
                <h3 class="h3 mb10">이달의 이유식!</h3>
                <p class="p">도담밀 이유식 클래스에서</p>
                <p class="p">다양한 이유식 레시피를 배워보세요.</p>
            </div>
        </div>
        <div class="swiper-slide atagsub" data-href="/con2period">
            <img src="/wp-content/themes/storefront-child/con2/30_07.png">
            <div class="txt_box">
                <h3 class="h3">간식 키트 출시</h3>
                <h3 class="h3 mb10">이제 간식도 도담밀</h3>
                <p class="p">만들 때는 간편하도록, 먹일 때는 안심되도록,</p>
                <p class="p">먹이고 나서는 건강하도록, 도담밀 간식 키트</p>
            </div>
        </div>      
    </div>
    <div class="slide-btns">
        <div class="swiper-pagination" style="text-align:center;"></div>
    </div>
</div>
</div>
<div class="banner_cover mb40">
    <div class="banner atagsub" data-href="/event0023">
        <img src="/wp-content/themes/storefront-child/image/con2/banner.png">
    </div>
</div>
<!-- 리뷰 슬라이드 -->
<div class="box">
    <div class="swiper-container main_wrap_slider1">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide-boxshadow" style="border-radius: 15px" >
                <div class="slide-txt">
                    <h4>깨끗한 도담밀</h4>
                    <div class="star-img">
                        <img src="/wp-content/themes/storefront-child/image/con2/star.png" alt="별">
                        <img src="/wp-content/themes/storefront-child/image/con2/star.png" alt="별">
                        <img src="/wp-content/themes/storefront-child/image/con2/star.png" alt="별">
                        <img src="/wp-content/themes/storefront-child/image/con2/star.png" alt="별">
                        <img src="/wp-content/themes/storefront-child/image/con2/star.png" alt="별">
                    </div>
                    <div class="slide-review">
                        <p>식재료를 확인할 수 있어서 좋아요. 아이한테 먹이기 전에는 성분표를 꼭 확인하는데, 어떤 재료가 어느 정도로 신선한지 얼마나 깨끗한지 다 확인이 되니까 훨씬 안심이 되더라고요.</p>
                    </div>
                    <div class="slide-name slide">
                        <span>e**8**</span>
                        <span>부산</span>
                        <span>정기구독 6회차</span>
                    </div>
                </div>
            </div>
            <div class="swiper-slide slide-boxshadow" style="border-radius: 15px" >
                <div class="slide-txt">
                    <h4>맛있는 도담밀</h4>
                    <div class="star-img">
                        <img src="/wp-content/themes/storefront-child/image/con2/star.png" alt="별">
                        <img src="/wp-content/themes/storefront-child/image/con2/star.png" alt="별">
                        <img src="/wp-content/themes/storefront-child/image/con2/star.png" alt="별">
                        <img src="/wp-content/themes/storefront-child/image/con2/star.png" alt="별">
                        <img src="/wp-content/themes/storefront-child/image/con2/star.png" alt="별">
                    </div>
                    <div class="slide-review">
                        <p>아이가 잘 안 먹어서 걱정이었는데 도담밀을 하고 나서는 너무 맛있어 했어요. 아기가 잘 먹어서 혹시 양을 늘릴 수 있냐고 했더니 양도 늘려줘서 더 좋았어요.</p>
                    </div>
                    <div class="slide-name">
                        <span>ki**5*</span>
                        <span>서울</span>
                        <span>정기구독 3회차</span>
                    </div>
                </div>
            </div>
            <div class="swiper-slide slide-boxshadow" style="border-radius: 15px" >
                <div class="slide-txt">
                    <h4>든든한 도담밀</h4>
                    <div class="star-img">
                        <img src="/wp-content/themes/storefront-child/image/con2/star.png" alt="별">
                        <img src="/wp-content/themes/storefront-child/image/con2/star.png" alt="별">
                        <img src="/wp-content/themes/storefront-child/image/con2/star.png" alt="별">
                        <img src="/wp-content/themes/storefront-child/image/con2/star.png" alt="별">
                        <img src="/wp-content/themes/storefront-child/image/con2/gray-star.png" alt="별">
                    </div>
                    <div class="slide-review">
                        <p>이유식 먹이는 동안 생기는 궁금증이나 불편사항들을 도담밀이 모두 관리해주니까 믿고 맡길 수 있었어요. 저는 만들기만 하면 돼요.</p>
                    </div>
                    <div class="slide-name">
                        <span>me**g0*</span>
                        <span>대구</span>
                        <span>정기구독 5회차</span>
                    </div>
                </div>
            </div>
            <div class="swiper-slide slide-boxshadow" style="border-radius: 15px" >
                <div class="slide-txt">
                    <h4>간편한 도담밀</h4>
                    <div class="star-img">
                        <img src="/wp-content/themes/storefront-child/image/con2/star.png" alt="별">
                        <img src="/wp-content/themes/storefront-child/image/con2/star.png" alt="별">
                        <img src="/wp-content/themes/storefront-child/image/con2/star.png" alt="별">
                        <img src="/wp-content/themes/storefront-child/image/con2/star.png" alt="별">
                        <img src="/wp-content/themes/storefront-child/image/con2/star.png" alt="별">
                    </div>
                    <div class="slide-review">
                        <p>식단 고민, 장보기, 레시피 찾기, 재료 손질 전부 다. 도담밀이 해결해줘서 좋았어요. 엄마표 이유식 고민하는 분들은 모두 도담밀 써보셨으면 좋겠어요.</p>
                    </div>
                    <div class="slide-name">
                        <span>jh**30**</span>
                        <span>인천</span>
                        <span>정기구독 8회차</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide-btn">
            <div class="swiper-pagination1" style="text-align:center;"></div>
        </div>
    </div>
</div>
<div class="box icon-box">
    <h3>&#34;한 눈에 보는 도담밀&#34;</h3>
    <div class="icon-boxs">
        <div class="icon-img">
            <img src="/wp-content/themes/storefront-child/image/con2/icon_delivery.png" alt="정기배송">
        </div>
        <div class="icon-txt">
            <p><span>매주 이유식재료</span> 정기배송</p>
        </div>
    </div>
    <div class="icon-boxs">
        <div class="icon-img">
            <img src="/wp-content/themes/storefront-child/image/con2/icon_mealkit.png" alt="밀키트">
        </div>
        <div class="icon-txt">
            <p><span>친환경 재료로 구성된</span> 밀키트</p>
        </div>
    </div>
    <div class="icon-boxs">
        <div class="icon-img">
            <img src="/wp-content/themes/storefront-child/image/con2/icon_service.png" alt="식단 관리 서비스">
        </div>
        <div class="icon-txt">
            <p><span>아기 월령별 </span>식단 관리 서비스</p>
        </div>
    </div>
    <div class="icon-boxs">
        <div class="icon-img">
            <img src="/wp-content/themes/storefront-child/image/con2/icon_care.png" alt="알러지 케어">
        </div>
        <div class="icon-txt">
            <p><span>이유식 최초</span> 알러지 케어</p>
        </div>
    </div>
</div>
<div class="box slide2">
    <div class="swiper-container main_wrap_slider2">
        <h3 class="h3-slide2">도담밀 수상 내역</h3>
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="border-radius: 5px" >
                <img src="/wp-content/themes/storefront-child/image/con2/img_01.png" alt="">
                <p class="slide03">벤처기업인증</p>
            </div>
            <div class="swiper-slide" style="border-radius: 5px" >
                <img src="/wp-content/themes/storefront-child/image/con2/img_02.png" alt="">
                <p class="slide03">부산형착한기업</p>
            </div>
            <div class="swiper-slide" style="border-radius: 5px" >
                <img src="/wp-content/themes/storefront-child/image/con2/img_03.png" alt="">
                <p class="slide03">부산시선정</p>
                <p class="slide03">부산대표기업</p>
            </div>
            <div class="swiper-slide" style="border-radius: 5px" >
                <img src="/wp-content/themes/storefront-child/image/con2/img_04.png" alt="">
                <p class="slide03">기업부설연구소</p>
            </div>
            <div class="swiper-slide" style="border-radius: 5px" >
                <img src="/wp-content/themes/storefront-child/image/con2/img_05.png" alt="">
                <p class="slide03">농식품벤처</p>
                <p class="slide03">육성사업선정기업</p>
            </span>
            </span>
            </div>           
        </div>
    </div>
</div>
<div class="box num-bg">
    <div class="num-txt">
        <h3><p class="num_85 on">0%</p><span>의 고객이 2달 이상 이용 중입니다.</span></h3>
    </div>
    <div class="num-txt">
        <h3><p class="num_240 on">240분</p><span>이면 홈메이드 이유식이 완성됩니다.</span></h3>
    </div>
    <div class="num-txt">
        <h3><p class="num_39 on">0%</p> <span>절감된 비용으로 이유식을 먹일 수 있습니다.</span></h3>
    </div>
    <div class="num-txt">
        <h3><p class="num_100 on">0%</p><span>내가 원하는 재료로 이유식을 만들 수 있습니다.</span></h3>
    </div>
</div>
<div class="box report-bg">
    <div class="report-box">
        <div class="report-txt">
            <h3>밀키트</h3>
            <p>재료 고민, 장보기, 손질 걱정, 복잡한 조리과정을 모두 줄인 밀키트로 누구나 쉽게 이유식을 만들 수 있습니다.</p>
        </div>
        <div class="meal-img">
            <img src="/wp-content/themes/storefront-child/image/con2/mealkit_box.png" alt="밀키트박스">
        </div>
    </div>
    <div class="report-box">
        <div class="report-txt">
            <h3>보고서</h3>
            <p>아기의 성장 과정을 보고서로 받아볼 수 있습니다. 매일매일 자라는 우리아기, 도담밀 식단과 함께 얼마나 잘 자라고 있는지 한 눈에 확인할 수 있습니다.</p>
        </div>
        <div class="report-img">
            <div class="report-img-box">
                <img src="/wp-content/themes/storefront-child/image/con2/report_01.png" alt="리포트01">
                <img src="/wp-content/themes/storefront-child/image/con2/report_02.png" alt="리포트02">
                <img src="/wp-content/themes/storefront-child/image/con2/report_03.png" alt="리포트03">
                <img src="/wp-content/themes/storefront-child/image/con2/report_04.png" alt="리포트04">
            </div>
        </div>
    </div>
    <div class="report-box re-del">
        <div class="report-txt">
            <h3>무료배송</h3>
            <p>무료배송으로 매주 모든 재료를 받아볼 수 있습니다. 매주 정해진 요일에 무료배송 되는 이유식 재료로 배송비 부담을 줄였습니다.</p>
        </div>
        <div class="delivery-img">
            <div class="delivery-img-box">
                <img src="/wp-content/themes/storefront-child/image/con2/delivery-car.png" alt="택배차">
            </div>
        </div>
    </div>
</div>
<div class="box back-cir3">
    <h3 class="cir-txt ready">도담밀을 시작하면</h3>
    <div class="cir">
        <div class="cir-img ready">
            <img src="/wp-content/themes/storefront-child/image/con2/cir_01.png" alt="이미지">
        </div>
        <div class="cir-txt ready">
            <p>“이가 안 난 우리아기는 어느정도 묽기가 좋지?”</p>
            <h4>우리 아기에게 딱 맞는<br>이유식을 만들어요.</h4>
        </div>
    </div>

    <div class="cir">
        <div class="cir-img ready">
            <img src="/wp-content/themes/storefront-child/image/con2/cir_02.png" alt="이미지">
        </div>
        <div class="cir-txt ready">
            <p>“중기 아기에게 브로콜리 먹여도 될까?”</p>
            <h4>혼자 걱정하던 이유식 문제를 <br>영양사와 해결해요.</h4>
        </div>
    </div>
    <div class="cir">
        <div class="cir-img ready">
            <img src="/wp-content/themes/storefront-child/image/con2/cir_03.png" alt="이미지">
        </div>
        <div class="cir-txt ready">
            <p>“오늘 먹는 이유식에는 뭐가 들어가지?”</p>
            <h4>복잡한 성분표 대신 신선한 <br> 재료를 직접 확인해요.</h4>
        </div>
    </div>
</div>
<div class="box">
    <div class="back-content back-img_01">
        <div class="back-txt back_01 ready">
            <h3>이유식,<br> <span>왜</span> 직접 만들어 먹여야 할까요?</h3>
            <p>우리아기 먹거리는 어떤 재료가 들어갔는지, 그 재료의 상태는 어땠는지 꼼꼼히 확인하고 싶습니다. 재료의 상태는 물론 아기의 모든 것을 아는 사람이 직접 만들어야 아기가 맛있는 이유식을 먹고 건강하게 성장할 수 있지요.</p>
        </div>
    </div>
    <div class="back-content back-img_02">
        <div class="back-txt back_02 ready">
            <h3>이유식,<br><span>왜</span> 관리받아야 할까요?</h3>
            <p>지금 우리 아기, 어떤 영양분이 필요할까요? 지금 아기에게 꼭 필요한 영양분, 알러지 반응이 있는 재료, 또래와 비교한 성장 속도까지. 엄마가 놓칠 수 있는 부분까지 전문가가 데이터로 관리해야 아기가 건강하게 성장할 수 있습니다.</p>
        </div>
    </div>
    <div class="back-content back-img_03">
        <div class="back-txt back_03 ready">
            <h3>이유식,<br><span>왜</span> 도담밀일까요?</h3>
            <p>도담밀은 전문 영양사가 건강한 재료로 구성한 영양식단을 밀키트로 받아볼 수 있습니다. 전문 영양사가 함께 하기 때문에 이유식을 먹이는 동안 생기는 걱정과 고민도 영양사와 함께 해결할 수 있습니다. 엄마가 만드는 이유식이 가장 안전하니까, 도담밀과 함께 하세요.</p>
        </div>
    </div>
</div>
<div class="box">
    <div class="make">
        <p>평생 식습관의 첫 걸음</p>
        <h3>내일 이유식은<br><span>도담밀과 함께 하세요. </span></h3>
        <a href="/con2period">지금 바로 시작하기 ></a>
    </div>
</div>
<script>
    new Swiper('.main_wrap_slider', {
        speed: 400,
        //truewrapper adoptsheight of active slide
        autoHeight: false,
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        // delay between transitions in ms
        autoplay: {delay: 5000,},
        autoplayStopOnLast: false, // loop false also
        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
        },
        // Navigation arrows

        // And if we need scrollbar
        //scrollbar: '.swiper-scrollbar',
        // "slide", "fade", "cube", "coverflow" or "flip"
        effect: 'slide',
        // Distance between slides in px.
        centeredSlides: true,
        //
        slidesOffsetBefore: 0,
        //
        grabCursor: true,
        initialSlide :0,
        startSlide:'random',
    
    });
</script>
<script>
    new Swiper('.main_wrap_slider1', {
        speed: 400,
        //truewrapper adoptsheight of active slide
        autoHeight: false,
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        // delay between transitions in ms
        autoplay: {delay: 3000,},
        autoplayStopOnLast: false, // loop false also
        // If we need pagination
        pagination: {
            el: '.swiper-pagination1',
            type: 'bullets',
        },
        // Navigation arrows

        // And if we need scrollbar
        //scrollbar: '.swiper-scrollbar',
        // "slide", "fade", "cube", "coverflow" or "flip"
        effect: 'slide',
        // Distance between slides in px.
        spaceBetween: 10,
        //
        slidesPerView: 1.1,
        //
        centeredSlides: true,
        //
        slidesOffsetBefore: 0,
        //
        grabCursor: true,
        initialSlide :0,
        startSlide:'random',
    });
</script>
<script>
    new Swiper('.main_wrap_slider2', {
        speed: 250,
        //truewrapper adoptsheight of active slide
        autoHeight: false,
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        // delay between transitions in ms
        autoplay: {delay: 3000,},
        autoplayStopOnLast: false, // loop false also
        // If we need pagination
        pagination: {
            el: '.swiper-pagination2',
            type: 'bullets',
        },
        // Navigation arrows

        // And if we need scrollbar
        //scrollbar: '.swiper-scrollbar',
        // "slide", "fade", "cube", "coverflow" or "flip"
        effect: 'slide',
        // Distance between slides in px.
        spaceBetween: 10,
        //
        slidesPerView: 3.5,
        //
        centeredSlides: true,
        //
        slidesOffsetBefore: 0,
        //
        grabCursor: true,
        initialSlide :0,
        startSlide:'random',
    });
</script>


<script>
    function fnMove(){
        var offset = $("#cont_move").offset();
        $('html, body').animate({scrollTop : offset.top}, 400);
    }
</script>
<script>
    var modal = document.getElementById('myModal1');
    var btn = document.getElementById("myBtn1");
    var span = document.getElementsByClassName("close1")[0];
    btn.onclick = function() {
        modal.style.display = "block";
    };
    span.onclick = function() {
        modal.style.display = "none";
    };
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
</script>

<script>
    $("#test_pkg_jun").click(function(){
        $("#check_modal_jun").fadeIn();
    });

    $("#js_pop_close1_jun").click(function(){
        $("#check_modal_jun").fadeOut();
    });

    $("#js_pop_close2_jun").click(function(){
        $("#check_modal_jun").fadeOut();
    });
    $("#test_pkg_cho").click(function(){
        $("#check_modal_cho").fadeIn();
    });

    $("#js_pop_close1_cho").click(function(){
        $("#check_modal_cho").fadeOut();
    });

    $("#js_pop_close2_cho").click(function(){
        $("#check_modal_cho").fadeOut();
    });

    $("#test_pkg_jung").click(function(){
        $("#check_modal_jung").fadeIn();
    });

    $("#js_pop_close1_jung").click(function(){
        $("#check_modal_jung").fadeOut();
    });

    $("#js_pop_close2_jung").click(function(){
        $("#check_modal_jung").fadeOut();
    });

    $("#test_pkg_hu").click(function(){
        $("#check_modal_hu").fadeIn();
    });

    $("#js_pop_close1_hu").click(function(){
        $("#check_modal_hu").fadeOut();
    });

    $("#js_pop_close2_hu").click(function(){
        $("#check_modal_hu").fadeOut();
    });

</script>




<script>

    $("#testpack_move").click(function(){
        var offset = $("#testpackoffset").offset();
        $('html').animate({scrollTop : offset.top}, 400);
    });

</script>

<style>
    @media only screen and (min-width: 1070px){ .site-footer { margin-left:0 !important; }}
</style>

<script>
    $('.slide_tab').on('click',function(){
        //컨텐츠 제거 후 인덱스에 맞는 컨텐츠 노출
        var idx = $('.slide_tab').index(this);
        $('.slide_tab').removeClass("slider");
        $('.bottom').slideUp();
        $('.bottom').eq(idx).slideDown();
    });
    </script>



    <!-- 숫자 -->
    <!-- <script>

        // $(window).scroll(function(){
        // const scrollTop = $(window).scrollTop()+ $(window).height()/4;
        // }

        $(window).one("scroll", function(){
            var scrollTop = $(window).scrollTop()
            if(scrollTop > $(".num-bg").offset().top && ){
                var memberCountConTxt= 85;
        
        $({ val : 0 }).animate({ val : memberCountConTxt }, {
        duration: 1000,
        step: function() {
        var num = numberWithCommas(Math.floor(this.val));
        $(".num_85").text(num + "%");
        },
        complete: function() {
        var num = numberWithCommas(Math.floor(this.val));
        $(".num_85").text(num + "%");
        }
    });
    
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
            }
              
            // 실행시킬DIV 위치 OFFSET TEST
        });
        
</script> -->
<script>
    
    $(window).scroll(function(){
			const scrollTop = $(window).scrollTop()+ $(window).height()/1;

			if( scrollTop >  $(".num-bg").offset().top && $(".num_85").hasClass("on")){
                $(".num_85").removeClass("on");
		
        var memberCountConTxt= 85;

        $({ val : 0 }).animate({ val : memberCountConTxt }, {
        duration: 1500,
        step: function() {
        var num = numberWithCommas(Math.floor(this.val));
        $(".num_85").text(num + "%");   
        },
        complete: function() {
        var num = numberWithCommas(Math.floor(this.val));
        $(".num_85").text(num + "%");
        }
        });

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
            
        }
			});
</script>
<script>
    
    $(window).scroll(function(){
			const scrollTop = $(window).scrollTop()+ $(window).height()/1;

			if( scrollTop >  $(".num-bg").offset().top && $(".num_240").hasClass("on")){
                $(".num_240").removeClass("on");
		
        var memberCountConTxt= 10;

        $({ val : 240 }).animate({ val : memberCountConTxt }, {
        duration: 1500,
        step: function() {
        var num = numberWithCommas(Math.floor(this.val));
        $(".num_240").text(num + "분");   
        },
        complete: function() {
        var num = numberWithCommas(Math.floor(this.val));
        $(".num_240").text(num + "분");
        }
        });

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})-(?!\d))/g, ",");
        }
            
        }
			});
</script>
<script>
    
    $(window).scroll(function(){
			const scrollTop = $(window).scrollTop()+ $(window).height()/1;

			if( scrollTop >  $(".num-bg").offset().top && $(".num_39").hasClass("on")){
                $(".num_39").removeClass("on");
		
        var memberCountConTxt= 39;

        $({ val : 0 }).animate({ val : memberCountConTxt }, {
        duration: 1500,
        step: function() {
        var num = numberWithCommas(Math.floor(this.val));
        $(".num_39").text(num + "%");   
        },
        complete: function() {
        var num = numberWithCommas(Math.floor(this.val));
        $(".num_39").text(num + "%");
        }
        });

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
            
        }
			});
</script>
<script>
    
    $(window).scroll(function(){
			const scrollTop = $(window).scrollTop()+ $(window).height()/1;

			if( scrollTop >  $(".num-bg").offset().top && $(".num_100").hasClass("on")){
                $(".num_100").removeClass("on");
		
        var memberCountConTxt= 100;

        $({ val : 0 }).animate({ val : memberCountConTxt }, {
        duration: 1500,
        step: function() {
        var num = numberWithCommas(Math.floor(this.val));
        $(".num_100").text(num + "%");   
        },
        complete: function() {
        var num = numberWithCommas(Math.floor(this.val));
        $(".num_100").text(num + "%");
        }
        });

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
            
        }
			});
</script>

 <script>
//     $(window).scroll(function(){
// 			const scrollTop = $(window).scrollTop()+ $(window).height()/4;

// 			if( scrollTop >= $(".num-bg").offset().top ){
// 			var memberCountConTxt= 30;
    
//     $({ val : 0 }).animate({ val : memberCountConTxt }, {
//      duration: 2000,
//     step: function() {
//       var num = numberWithCommas(Math.floor(this.val));
//       $(".num_30").text(num + "분");
//     },
//     complete: function() {
//       var num = numberWithCommas(Math.floor(this.val));
//       $(".num_30").text(num + "분");
//     }
//   });
  
//   function numberWithCommas(x) {
//       return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
//   }

// 			}
// 			});
// </script>
  <script>


    $(document).ready(function($) {

        $window = $(window);

        // 다음 섹션이 브라우저 하단으로부터 200px 만큼 보여질때
        var delayPosition = -100,
            // 현재 브라우저의 높이값
            windowheight;

        // 브라우저의 크기가 변하면 대상 엘리먼트의 위치값을 다시 할당
        $window.on('resize', function() {
            insertTargetPosition();
        });

        // 스크롤이 이동할때
        $window.on('scroll', function() {
            // 현재의 위치 = 스크롤이 이동한 값 + 윈도우 높이 - 처음에 선언한 지연 위치값(200);
            var position = $window.scrollTop() + windowheight - delayPosition;

            // 아직 활성화되지 않은 타겟 엘리먼트를 순회하여
            $('.cir-txt.ready').each(function() {
                // 활성화되어 있지 않고 타겟의 위차값이 현재 위치값보다 작으면
                if(!$(this).hasClass('on') && $(this).data('offsetTop') < position) {
                    // 활성화
                    $(this)
                    $(this).addClass('on');
                    // 활성화 된 엘리먼트는 이후 타겟에서 제외
                    $(this).removeClass('ready');
                }
            });
        });

        function insertTargetPosition() {
            windowheight = $window.height(); // 브라우저의 높이값 할당
            $('.cir-txt').each(function() { // 모든 대상 엘리먼트에
                $(this).data('offsetTop', ($(this).offset().top)); // 각자의 위치 값을 할당
            });
        }

        (function init() {
            // 최초 진입시 각 섹션의 위치값을 할당
            // 컨텐츠 중에 이미지 파일이 있거나 비동기로 가져오는 값이 있다면, 대상 요소들이 모두 불러진 후에
            // 각 섹션의 위치값을 다시 할당해 줘어야 합니다.
            insertTargetPosition();
        })();
    });
</script>
<script>


    $(document).ready(function($) {

        $window = $(window);

        // 다음 섹션이 브라우저 하단으로부터 200px 만큼 보여질때
        var delayPosition = -100,
            // 현재 브라우저의 높이값
            windowheight;

        // 브라우저의 크기가 변하면 대상 엘리먼트의 위치값을 다시 할당
        $window.on('resize', function() {
            insertTargetPosition();
        });

        // 스크롤이 이동할때
        $window.on('scroll', function() {
            // 현재의 위치 = 스크롤이 이동한 값 + 윈도우 높이 - 처음에 선언한 지연 위치값(200);
            var position = $window.scrollTop() + windowheight - delayPosition;

            // 아직 활성화되지 않은 타겟 엘리먼트를 순회하여
            $('.back-txt.ready').each(function() {
                // 활성화되어 있지 않고 타겟의 위차값이 현재 위치값보다 작으면
                if(!$(this).hasClass('on') && $(this).data('offsetTop') < position) {
                    // 활성화
                    $(this)
                    $(this).addClass('on');
                    // 활성화 된 엘리먼트는 이후 타겟에서 제외
                    $(this).removeClass('ready');
                }
            });
        });

        function insertTargetPosition() {
            windowheight = $window.height(); // 브라우저의 높이값 할당
            $('.back-txt').each(function() { // 모든 대상 엘리먼트에
                $(this).data('offsetTop', ($(this).offset().top)); // 각자의 위치 값을 할당
            });
        }

        (function init() {
            // 최초 진입시 각 섹션의 위치값을 할당
            // 컨텐츠 중에 이미지 파일이 있거나 비동기로 가져오는 값이 있다면, 대상 요소들이 모두 불러진 후에
            // 각 섹션의 위치값을 다시 할당해 줘어야 합니다.
            insertTargetPosition();
        })();
    });
</script>
<script>


    $(document).ready(function($) {

        $window = $(window);

        // 다음 섹션이 브라우저 하단으로부터 200px 만큼 보여질때
        var delayPosition = -100,
            // 현재 브라우저의 높이값
            windowheight;

        // 브라우저의 크기가 변하면 대상 엘리먼트의 위치값을 다시 할당
        $window.on('resize', function() {
            insertTargetPosition();
        });

        // 스크롤이 이동할때
        $window.on('scroll', function() {
            // 현재의 위치 = 스크롤이 이동한 값 + 윈도우 높이 - 처음에 선언한 지연 위치값(200);
            var position = $window.scrollTop() + windowheight - delayPosition;

            // 아직 활성화되지 않은 타겟 엘리먼트를 순회하여
            $('.cir-img.ready').each(function() {
                // 활성화되어 있지 않고 타겟의 위차값이 현재 위치값보다 작으면
                if(!$(this).hasClass('on') && $(this).data('offsetTop') < position) {
                    // 활성화
                    $(this)
                    $(this).addClass('on');
                    // 활성화 된 엘리먼트는 이후 타겟에서 제외
                    $(this).removeClass('ready');
                }
            });
        });

        function insertTargetPosition() {
            windowheight = $window.height(); // 브라우저의 높이값 할당
            $('.cir-img').each(function() { // 모든 대상 엘리먼트에
                $(this).data('offsetTop', ($(this).offset().top)); // 각자의 위치 값을 할당
            });
        }

        (function init() {
            // 최초 진입시 각 섹션의 위치값을 할당
            // 컨텐츠 중에 이미지 파일이 있거나 비동기로 가져오는 값이 있다면, 대상 요소들이 모두 불러진 후에
            // 각 섹션의 위치값을 다시 할당해 줘어야 합니다.
            insertTargetPosition();
        })();
    });
</script>



    <?php
get_footer();
