<?php

$today_date = date("Y-m-d");

?>

<script type="text/javascript" src="/wp-content/themes/storefront-child/jquery/jquery-3.4.1.min.js"></script>

<?php

include 'lib_my.php';
include 'lib_arr.php';


$test_date = date("Y-m-d", strtotime("+1 month", strtotime($today_date)));

?>

<div class="adminmenuback"></div>
<div id="adminmenuwrap">
    <ul id="adminmenu">
        <li style="height:200px;">
            <img src="/wp-content/themes/storefront-child/image/otherpage/report/snack/banana.png" style="width:90%; padding:5px;">
        </li>
        <div class="under_shadow side_menu" style="width:200px;">
            <!--셀렉1-->
            <div class="">
                <div class="side_title gray_border under_slide toggle open">
                    <p class="h5">DB업로드</p>
                </div>
            </div>
            <div class="slide_ready" style="display:block;">
                <div class="floor flex bg_f9">
                    <li class="flexible"><a class="p" id="order_jun_go" href="">메뉴업데이트</a></li>
                    <li class="flexible"><a class="p" id="order_cho_go" href="">송장등록</a></li>
                </div>
                <div class="floor flex bg_f9">
                    <li class="flexible"><a class="p" id="order_jung_go" href="">빈칸</a></li>
                    <li class="flexible"><a class="p" id="order_hu_go" href="">빈칸</a></li>
                </div>
                <div class="floor flex bg_f9">
                    <li class="flexible"><a class="p" id="order_wan_go" href="">빈칸</a></li>
                    <li class="flexible"><a class="p" id="order_yuu_go" href="">빈칸</a></li>
                </div>
            </div>
            <!--셀렉2-->
            <div class="">
                <div class="side_title gray_border under_slide toggle">
                    <p class="h5">고객정보</p>
                </div>
            </div>
            <div class="slide_ready">
                <div class="floor flex bg_f9">
                    <li class="flexible"><a class="p" href="/">고객정보</a></li>
                    <li class="flexible"><a class="p" href="/">식단확인/변경</a></li>
                </div>
                <div class="floor flex bg_f9">
                    <li class="flexible"><a class="p" href="/">보고서 확인</a></li>    
                    <li class="flexible"><a class="p" href="/">빈칸</a></li>                  
                </div>
                <div class="floor flex bg_f9">
                    <li class="flexible"><a class="p" href="/">빈칸</a></li>
                    <li class="flexible"><a class="p" href="">빈칸</a></li>
                </div>
            </div>
            <div class="">
                <div class="side_title gray_border under_slide toggle">
                    <p class="h5">라벨출력</p>
                </div>
            </div>
            <div class="slide_ready">
                <div class="floor flex bg_f9">
                    <li class="flexible"><a class="p" href="/">라벨출력</a></li>
                    <li class="flexible"><a class="p" href="/">빈칸</a></li>
                </div>
                <div class="floor flex bg_f9">
                    <li class="flexible"><a class="p" href="/">빈칸</a></li>    
                    <li class="flexible"><a class="p" href="/">빈칸</a></li>                  
                </div>
                <div class="floor flex bg_f9">
                    <li class="flexible"><a class="p" href="/">빈칸</a></li>
                    <li class="flexible"><a class="p" href="">빈칸</a></li>
                </div>
            </div>
    </ul>
</div>

<div id="admincontent">

    <div id="adminmainbar"></div>
    <div id="adminbody" role="main">

        <div class="tab_box tab0 on">

            <div>

        </div>

    </div>
</div>


<!--탭 juqery-->
<script>
$('.toggle').on('click',function(){
    //컨텐츠 제거 후 인덱스에 맞는 컨텐츠 노출
    var idx = $('.toggle').index(this);
    $('.slide_ready').slideUp();
    $('.under_slide').removeClass("open");
    $('.slide_ready').eq(idx).slideDown();
    $('.under_slide').eq(idx).addClass("open");
});

</script>
</script>