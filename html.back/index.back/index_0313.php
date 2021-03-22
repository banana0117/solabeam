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


<div class="box">
    <div class="navi">
        <ul class="flex flexible center">
            <li><a href="/con2dodammeal" class="p">처음이신가요</a></li>
            <li><a href="/con2period" class="p">주문하기</a></li>
            <li><a href="/event" class="p">이벤트</a></li>
        </ul>
        <div class="bar"></div>
    </div>
</div>
<div class="swiper-container main_wrap_slider mb40">
    <div class="swiper-wrapper">
        <div class="swiper-slide atagsub" data-href="/con2dodammeal">
            <img src="/wp-content/themes/storefront-child/con2/30_01.png">
            <div class="txt_box">
                <h3 class="h3">1등급 엄마의 똑똑한 선택,</h3>
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
</div>
</div>
<div class="banner_cover mb40">
    <div class="banner atagsub" data-href="/event0023">
        <img src="/wp-content/themes/storefront-child/image/con2/review-main-banner.png">
    </div>
</div>
<div class="box">
    <div class="img_box01">
        <div class="img_txt center mt40">
            <h4 class="h4">엄마가 만드는 이유식이</h4>
            <h4 class="h4 mb10">가장 완벽합니다.</h4>
            <p class="p">직접 만드니까 더 안전한 도담밀 이유식</p>
        </div>
        <div class="btn_1_wrap mb40">
            <div class="btn_1">
                <a href="/con2mealkit" class="p">도담밀 밀키트 안내</a>
            </div>
        </div>
    </div>
   
</div>
<div class="img_txt center mt40">
        <h4 class="h4 mb10">오래 먹이는 이유식,</h4>
        <h4 class="h4 mb40">도담밀 밀키트가 경제적입니다.</h4>
</div>
<div class="box">
    <div class="img_box02">
        <img src="/wp-content/themes/storefront-child/con2/30_04.png" alt="">
    </div>
    <div class="btn_1_wrap mb40">
    <h5 class="h5 mt40 mb10 center" style="width:100%;">비교할수록 도담밀 밀키트</h5>
        <div class="btn_1">
            <a href="/con2membership" class="p">멤버십 안내</a>
        </div>
    </div>
</div>
</div>
<div class="box mb40">
    <div class="img_box03">
        <div class="img_txt center mt40">
            <h4 class="h4">아이 먹거리 기본은</h4>
            <h4 class="h4 mb10">엄선된 재료입니다.</h4>
            <p class="p">친환경 식재료 우선 정책을 바탕으로 운영합니다.</p>
        </div>
        <div class="btn_1_wrap mb40">
        <div class="btn_1">
            <a href="/con2mate" class="p">재료 기준 안내</a>
        </div>
    </div>
    </div>
</div>
<div class="box ps20 mb40">
<div class="loader_text pb20">
        <p class="h4 center">전체 고객의 85%가<br>2달 이상 이용하고 있습니다.</p>
    </div>
    <div class="loader">
        <img style="padding:0 22px" src="/wp-content/themes/storefront-child/image/con2/loader.png">
    </div>
</div>
<div class="main_insta_block random_insta" style="padding-bottom:20px;">
        <div class="insta_wrapper ">
            <div class="insta_pic swiper-container main_wrap_slider2">
                <ul id="insta_area" class="insta_area swiper-wrapper">
                    <div class="swiper-slide insta-swiper card">
                        <a class="insta-wrap insta-icon" href="https://www.instagram.com/hyunkihe/" target="_blank">
                            <div class="insta-image"><img src="/wp-content/themes/storefront-child/image/insta/0003-02.jpg"></div>
                            <div class="insta-content">
                                <div class="insta-content-profile"><img src="/wp-content/themes/storefront-child/image/insta/0003-01.jpg"></div>
                                <div class="insta-content-name">hyunkihe</div>
                                <div class="insta-content-text">#6개월아기 #첫이유식 엄마도 첨이라ㅋㅋㅋㅋ #도담밀 #쌀미음1일차 나름 잘먹음😁<br><p style="color:#fff;">.</p></div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide insta-swiper card">
                        <a class="insta-wrap blog-icon" href="https://blog.naver.com/kieshoon/221864379357" target="_blank">
                            <div class="insta-image"><img src="/wp-content/themes/storefront-child/image/insta/0004-02.jpg"></div>
                            <div class="insta-content">
                                <div class="insta-content-profile"><img src="/wp-content/themes/storefront-child/image/insta/0004-01.jpg"></div>
                                <div class="insta-content-name">kieshoon</div>
                                <div class="insta-content-text">진짜 너무좋은건.. 재료궁합 고민할 필요없고.. 힘들게 큐브만들 필요없고.. 진짜 넘나 편하다..<br><p style="color:#fff;">.</p></div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide insta-swiper card">
                        <a class="insta-wrap insta-icon" href="https://www.instagram.com/seulgiioii/" target="_blank">
                            <div class="insta-image"><img src="/wp-content/themes/storefront-child/image/insta/0002-02.jpg"></div>
                            <div class="insta-content">
                                <div class="insta-content-profile"><img src="/wp-content/themes/storefront-child/image/insta/0002-01.jpg"></div>
                                <div class="insta-content-name">seulgiioii</div>
                                <div class="insta-content-text">냄비로 만들었어요, 이십분 휘저었는데 담부터는 이유식메이커 사용해야징😊<br><p style="color:#fff;">.</p></div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide insta-swiper card">
                        <a class="insta-wrap blog-icon" href="https://blog.naver.com/seulgiioii/221855213744" target="_blank">
                            <div class="insta-image"><img src="/wp-content/themes/storefront-child/image/insta/0005-02.jpg"></div>
                            <div class="insta-content">
                                <div class="insta-content-profile"><img src="/wp-content/themes/storefront-child/image/insta/0005-01.jpg"></div>
                                <div class="insta-content-name">seulgiioii</div>
                                <div class="insta-content-text">깔끔하고 정갈하게 안전하게 배송되니 걱정없어요. 깔끔하고 신선한 재료를 다음날 받아볼 수 있어요<p style="color:#fff;">.</p></div>
                            </div>
                        </a>
                    </div>
                    <!--신규-->
                    <div class="swiper-slide insta-swiper card">
                        <a class="insta-wrap blog-icon" href="https://blog.naver.com/eunbin7624/221842626683" target="_blank">
                            <div class="insta-image"><img src="/wp-content/themes/storefront-child/image/insta/0007-02.jpg"></div>
                            <div class="insta-content">
                                <div class="insta-content-profile"><img src="/wp-content/themes/storefront-child/image/insta/0007-01.jpg"></div>
                                <div class="insta-content-name">eunbin7624</div>
                                <div class="insta-content-text">포장된 재료 뜯어 그대로 메이커에 넣고 물만 넣어 버튼만 눌러주면 끝!👍🏻<br><p style="color:#fff;">.</p> </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide insta-swiper card">
                        <a class="insta-wrap insta-icon" href="https://www.instagram.com/finlandtea/" target="_blank">
                            <div class="insta-image"><img src="/wp-content/themes/storefront-child/image/insta/0001-02.jpg"></div>
                            <div class="insta-content">
                                <div class="insta-content-profile"><img src="/wp-content/themes/storefront-child/image/insta/0001-01.jpg"></div>
                                <div class="insta-content-name">finlandtea</div>
                                <div class="insta-content-text">유기농 이유식으로 재료도 믿을 수 있고, 낱개 진공포장으로 정말 편리함! 첫째때 큐브만드느라 고생했는데 정말 쉽게만들어서 너무좋다.</div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide insta-swiper card">
                        <a class="insta-wrap insta-icon" href="https://www.instagram.com/eunbeen91/" target="_blank">
                            <div class="insta-image"><img src="/wp-content/themes/storefront-child/image/insta/0006-02.jpg"></div>
                            <div class="insta-content">
                                <div class="insta-content-profile"><img src="/wp-content/themes/storefront-child/image/insta/0006-01.jpg"></div>
                                <div class="insta-content-name">eunbeen91</div>
                                <div class="insta-content-text">우리아기 개월수 몸무게 알러지 유무에따라 식단짜주고 친환경 재료와 이유식메이커 까지 보내주는👍🏻👍🏻👍🏻</div>
                            </div>
                        </a>
                    </div>
                </ul>
            </div>
            <div class="swiper-pagination2 swiper-pagination" style="display:block; margin-bottom:20px; position:relative; margin-top:10px;"></div>
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
    new Swiper('.main_wrap_slider2', {
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
            el: '.swiper-pagination',
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
        slidesPerView: 1.3,
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

    <?php
get_footer();