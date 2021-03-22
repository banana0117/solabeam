<?php

$today_date = date("Y-m-d");

?>

<style>
    @import url(https://cdn.jsdelivr.net/gh/moonspam/NanumSquare@1.0/nanumsquare.css);

    #adminmenu li button {
        font-family: 'NanumSquare';
    }

    .adminmenuback {
        position: fixed;
        top: 0;
        bottom: -120px;
        z-index: 1;
        width: 200px;
        background-color: #23282d;
    }

    #adminmenuwrap {
        position: fixed;
        float: left;
        z-index: 9999;
    }

    #adminbody {
        padding: 10px 10px 10px 30px;
        margin-left: 200px;
    }

    #adminmenu {
        clear: left;
        margin: 12px 0;
        padding: 0;
        list-style: none;
    }

    #adminmenu li {
        border: none !important;
        
        position: relative;
        margin-bottom: 10px;
        color: #fff;
        width: 200px;
    }

    #adminmenu li button {
        width: 200px;
        font-size: 25px;
        background-color: #23282d;
        color: #fff;
        border: none;
        padding: 15px 0;
    }

    #adminmenu li button.on {
        background-color: #0b8249;
        font-weight: 800;
    }

    .tab1 {
        display: none;
    }

    .tab2 {
        display: none;
    }

    .tab3 {
        display: none;
    }

    .tab4 {
        display: none;
    }

    .tab_box .title h3 {
        font-size: 40px;
        font-weight: 800;
        letter-spacing: -3px;
    }

    .select {
        margin-bottom: 30px;
    }

    .select select {
        background-color: #fff;
        background-image: url(/wp-content/themes/storefront-child/image/otherpage/research/select_under.png);
        background-position: 95% 50%;
        background-repeat: no-repeat;
        background-size: 15px;
        border: 1px solid #e7e7e7;
        padding: 20px 60px 20px 50px;
        border-radius: 9px;
        appearance: none;
        font-size: 25px;
        font-weight: 800;
    }

    .select textarea {
        border-radius: 9px;
    }

    .one_button input[type=submit] {
        float: right;
        padding: 20px 50px;
        font-size: 22px;
        font-weight: 800;
        background-color: #0b8249;
        border: none;
        border-radius: 9px;
        color: #fff;
        width: 30%;
        max-width: 280px;
    }

    .thr_button input[type=submit] {
        float: right;
        padding: 20px 50px;
        font-size: 22px;
        font-weight: 800;
        background-color: #0b8249;
        border: none;
        border-radius: 9px;
        color: #fff;
        width: 50%;
        max-width: 280px;
    }

    .two_button input[type=submit] {
        padding: 20px 50px;
        font-size: 22px;
        font-weight: 800;
        background-color: #0b8249;
        border: none;
        border-radius: 9px;
        color: #fff;
        width: 100%;
        max-width: 280px;
    }

    .radio_list {
        display: flex;
        justify-content: space-around;
        vertical-align: middle;
        padding: 5px;
    }

    .radio_list input[type=radio] {
        display: none;
    }

    .radio_list input[type=radio]+label {
        width: 100%;
        border: 2px solid #e7e7e7;
        text-align: center;
        width: 100%;
        padding: 20px 0;
        background-color: #e7e7e7;
        margin: 10px;
        border-radius: 9px;
    }

    .radio_list input[type=radio]+label span {
        padding: 20px;
        color: 666;
        font-size: 20px;
    }

    .radio_list input[type=radio]:checked+label {
        background-color: #fff;
        border: 2px solid #0b8249;
    }

    .radio_list input[type=radio]:checked+label span {
        color: #0b8249;
        font-weight: 800;
    }

    #dodamform {
        width: 100%;
        display: flex;
        justify-content: flex-start;
    }

    #dodamform select {
        background-color: #fff;
        margin-right: 10px;
        background-image: url(/wp-content/themes/storefront-child/image/otherpage/research/select_under.png);
        background-position: 95% 50%;
        background-repeat: no-repeat;
        background-size: 15px;
        border: 1px solid #e7e7e7;
        padding: 20px 60px 20px 50px;
        border-radius: 9px;
        appearance: none;
        font-size: 25px;
        font-weight: 800;
    }

    .todays p {
        display: block;
        width: 30%;
        margin: 0 auto;
        border: 2px solid #e7e7e7;
        padding: 20px;
        font-size: 30px;
        font-weight: 800;
        text-align: center;
        border-radius: 9px;
        margin-bottom: 20px;
    }

    .hr-sect {
        display: flex;
        flex-basis: 100%;
        align-items: center;
        font-size: 17px;
        margin: 8px 0;
    }

    .hr-sect:before,
    .hr-sect:after {
        content: '';
        flex-grow: 1;
        background: rgba(0, 0, 0, 0.35);
        height: 1px;
        font-size: 0;
        line-height: 0px;
        margin: 0px 16px;
    }

    .hr-sect p {
        font-size: 40px;
        font-weight: 800;
    }

    img {
        width: 100%;
        margin: 0 auto;
        display: block;
    }

    #tekbeCompnayList,
    #invoiceNumberText {
        width: 500px;
        height: 30px;
        padding-left: 10px;
        font-size: 18px;
        color: #0000ff;
        border: 1px solid #006fff;
        border-radius: 3px;
    }

    #tekbeCompnayName,
    #invoiceNumber {
        color: black;
        font-weight: bold;
        margin-right: 20px;
        font-size: 18px;
    }

    #myButton1 {
        background: #6893b0;
        background-image: -webkit-linear-gradient(top, #6893b0, #2980b9);
        background-image: -moz-linear-gradient(top, #6893b0, #2980b9);
        background-image: -ms-linear-gradient(top, #6893b0, #2980b9);
        background-image: -o-linear-gradient(top, #6893b0, #2980b9);
        background-image: linear-gradient(to bottom, #6893b0, #2980b9);
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0px;
        font-family: Arial;
        color: #ffffff;
        font-size: 20px;
        padding: 10px 10px 10px 10px;
        text-decoration: none;
    }

    #myButton1:hover {
        background: #3cb0fd;
        background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
        background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
        background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
        background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
        background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
        text-decoration: none;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .side_menu .under_slide { padding:12px 20px; position:relative; color:#fff; }
    .side_menu .under_slide p { font-size:20px; font-weight:bold; margin:0; }
.side_menu .under_slide:after { content:''; float:right; display:block; width:18px; height:18px; background-image:url(/wp-content/themes/storefront-child/image/con2/gray_bot.png); position:absolute; top:15px; right:15px; background-repeat:no-repeat; background-size:cover; }
.side_menu .under_slide.open { box-shadow:0px 8px 15px -6px #e7eaf0; }
.side_menu .under_slide.open:after { background-image:url(/wp-content/themes/storefront-child/image/con2/blue_top.png); }
.side_menu .slide_ready { display:none; }
.floor { width:100%; }
.floor li { display:block; width:100%; padding:11px 0px 11px 20px; border:1px solid #fff; border-collapse:collapse; }
::-webkit-scrollbar { display: none; }
.floor a { color:#fff; text-decoration:none;}

</style>

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