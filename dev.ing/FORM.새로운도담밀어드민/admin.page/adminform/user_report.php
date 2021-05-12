<?php

$today_date = date("Y-m-d");

?>

<link rel="stylesheet" href="/wp-content/themes/storefront-child/css/form_admin.css?ver=<?php echo date('YmdHis') ?>" />
<script type="text/javascript" src="/wp-content/themes/storefront-child/jquery/jquery-3.4.1.min.js"></script>

<?php

include 'lib_my.php';
include 'lib_arr.php';

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
                    <p class="h5">데이터관련</p>
                </div>
            </div>
            <div class="slide_ready" style="display:block;">
                <div class="floor flex bg_f9">
                    <li class="flexible"><a class="p" href="/wp-content/themes/storefront-child/adminform/menu_up.php">메뉴업데이트</a></li>
                    <li class="flexible"><a class="p" href="/wp-content/themes/storefront-child/adminform/form_post_update.php">송장등록</a></li>
                </div>
                <div class="floor flex bg_f9">
                    <li class="flexible"><a class="p" href="/wp-content/themes/storefront-child/adminform/mate_insert.php">재고입력</a></li>
                    <li class="flexible"><a class="p" href="/wp-content/themes/storefront-child/adminform/mate_buying.php">구매량받기</a></li>
                </div>
                <div class="floor flex bg_f9">
                    <li class="flexible"><a class="p" href="/wp-content/themes/storefront-child/adminform/label_form.php">라벨출력</a></li>
                    <li class="flexible"><a class="p" href="/wp-content/themes/storefront-child/adminform/ask_.php">문의답변</a></li>
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
                    <li class="flexible"><a class="p" href="/wp-content/themes/storefront-child/adminform/user_cancle.php">배송해지</a></li>
                </div>
                <div class="floor flex bg_f9">
                    <li class="flexible"><a class="p" href="/wp-content/themes/storefront-child/adminform/user_report.php">보고서 확인</a></li>
                    <li class="flexible"><a class="p" href="/wp-content/themes/storefront-child/adminform/table_edit_form.php">식단확인 및 변경</a></li>
                </div>
                <div class="floor flex bg_f9">
                <li class="flexible"><a class="p" href="/wp-content/themes/storefront-child/adminform/comment_active.php">보고서코멘트등록</a></li>
                    <li class="flexible"><a class="p" href="">빈칸</a></li>
                </div>
            </div>
    </ul>
</div>

<div id="admincontent">

    <div id="adminmainbar"></div>
    <div id="adminbody" role="main">

        <div class="tab_box tab0 on">

            <div class="">
                <form method="POST" action="/wp-content/themes/storefront-child/adminform/active/report_active.php">
                    <div class="">
                        <p>회원id</p>
                        <input type="text" name="userid">
                    </div>

                    <input type="submit" value="조회하기">
                </form>
            </div>

        </div>

    </div>
</div>


<!--탭 juqery-->
<script>
    $('.toggle').on('click', function() {
        //컨텐츠 제거 후 인덱스에 맞는 컨텐츠 노출
        var idx = $('.toggle').index(this);
        $('.slide_ready').slideUp();
        $('.under_slide').removeClass("open");
        $('.slide_ready').eq(idx).slideDown();
        $('.under_slide').eq(idx).addClass("open");
    });
</script>