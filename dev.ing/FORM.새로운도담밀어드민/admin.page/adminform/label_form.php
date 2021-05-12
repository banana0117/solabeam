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

            <div class="title">
                <h3>라벨출력</h3>
            </div>

            <div class="part_title">
                <h2>STEP 1. 출력할 자료 선택</h2>
            </div>

            <div class="">
                <form>
                    <div class="radio_list">
                        <input type="radio" id="labelgogi" name="change"><label for="labelgogi"><span>육류스티커</span></label>
                        <input type="radio" id="labelleaf" name="change"><label for="labelleaf"><span>잎채소</span></label>
                        <input type="radio" id="labelssal" name="change"><label for="labelssal"><span>쌀스티커</span></label>
                        <input type="radio" id="labelwater" name="change"><label for="labelwater"><span>물스티커</span></label>
                    </div>
                    <div class="radio_list">
                        <input type="radio" id="myungdan" name="change"><label for="myungdan"><span>발송명단</span></label>
                        <input type="radio" id="produce" name="change"><label for="produce"><span>생산목록</span></label>
                        <input type="radio" id="songjang" name="change"><label for="songjang"><span>송장출력</span></label>
                        <input type="radio" id="presearch" name="change"><label for="presearch"><span>사전설문조사</span></label>
                    </div>
                </form>
            </div>

            <div>

                <div class="part_title">
                    <h2>STEP 2-1. 출력희망 날짜 선택</h2>
                </div>

                <form method="POST" id="dodamform" name="dodamform" action="/wp-content/themes/storefront-child/csvdown.php">

                    <select name="reyear">
                        <option value="">----</option>
                        <option value="2021">2021</option>
                    </select>
                    <select name="remonth">
                        <option value="">----</option>
                        <option value="01">1</option>
                        <option value="02">2</option>
                        <option value="03">3</option>
                        <option value="04">4</option>
                        <option value="05">5</option>
                        <option value="06">6</option>
                        <option value="07">7</option>
                        <option value="08">8</option>
                        <option value="09">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <select name="reday">
                        <option value="">----</option>
                        <option value="01">1</option>
                        <option value="02">2</option>
                        <option value="03">3</option>
                        <option value="04">4</option>
                        <option value="05">5</option>
                        <option value="06">6</option>
                        <option value="07">7</option>
                        <option value="08">8</option>
                        <option value="09">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                    <div class="two_button">
                        <input type="submit" value="내려받기">
                    </div>
                </form>

                <div class="part_title">
                    <h2>STEP 2-2. 오늘날짜 바로받기</h2>
                </div>

                <div class="todays">
                    <p><?php echo $today_date ?></p>
                </div>

                <form method="POST" id="dodamform2" name="dodamform2" action="/wp-content/themes/storefront-child/csvdown.php">
                    <input type="hidden" name="cndate" value="<?php echo $today_date ?>">
                    <div class="thr_button">
                        <input type="submit" value="내려받기">
                    </div>
                </form>

                <div class="part_title" style="padding-top:90px;">
                    <h2>STEP 2-3. 내일날짜 바로받기</h2>
                </div>

                <?php
                $today_dates = date("Y-m-d", strtotime("+1 days", strtotime($today_date)));
                ?>

                <div class="todays">
                    <p><?php echo $today_dates ?></p>
                </div>

                <form method="POST" id="dodamform3" name="dodamform3" action="/wp-content/themes/storefront-child/csvdown.php">
                    <input type="hidden" name="cndate" value="<?php echo $today_dates ?>">
                    <div class="thr_button">
                        <input type="submit" value="내려받기">
                    </div>
                </form>

            </div>

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

    $("input[id=songjang]").click(function() {
        $("#dodamform").attr("action", "/wp-content/themes/storefront-child/adminform/csv/csvdown.php");
        $("#dodamform2").attr("action", "/wp-content/themes/storefront-child/adminform/csv/csvdown.php");
        $("#dodamform3").attr("action", "/wp-content/themes/storefront-child/adminform/csv/csvdown.php");
    });
    $("input[id=labelgogi]").click(function() {
        $("#dodamform").attr("action", "/wp-content/themes/storefront-child/adminform/csv/meatcsv.php");
        $("#dodamform2").attr("action", "/wp-content/themes/storefront-child/adminform/csv/meatcsv.php");
        $("#dodamform3").attr("action", "/wp-content/themes/storefront-child/adminform/csv/meatcsv.php");
    });
    $("input[id=labelwater]").click(function() {
        $("#dodamform").attr("action", "/wp-content/themes/storefront-child/adminform/csv/watercsv.php");
        $("#dodamform2").attr("action", "/wp-content/themes/storefront-child/adminform/csv/watercsv.php");
        $("#dodamform3").attr("action", "/wp-content/themes/storefront-child/adminform/csv/watercsv.php");
    });
    $("input[id=labelssal]").click(function() {
        $("#dodamform").attr("action", "/wp-content/themes/storefront-child/adminform/csv/ssalcsv.php");
        $("#dodamform2").attr("action", "/wp-content/themes/storefront-child/adminform/csv/ssalcsv.php");
        $("#dodamform3").attr("action", "/wp-content/themes/storefront-child/adminform/csv/ssalcsv.php");
    });
    $("input[id=myungdan]").click(function() {
        $("#dodamform").attr("action", "/wp-content/themes/storefront-child/adminform/csv/listcsv.php");
        $("#dodamform2").attr("action", "/wp-content/themes/storefront-child/adminform/csv/listcsv.php");
        $("#dodamform3").attr("action", "/wp-content/themes/storefront-child/adminform/csv/listcsv.php");
    });
    $("input[id=jearyobuy]").click(function() {
        $("#dodamform").attr("action", "/wp-content/themes/storefront-child/adminform/csv/buying.php");
        $("#dodamform2").attr("action", "/wp-content/themes/storefront-child/adminform/csv/buying.php");
        $("#dodamform3").attr("action", "/wp-content/themes/storefront-child/adminform/csv/buying.php");
    });
    $("input[id=produce]").click(function() {
        $("#dodamform").attr("action", "/wp-content/themes/storefront-child/adminform/csv/produce_list.php");
        $("#dodamform2").attr("action", "/wp-content/themes/storefront-child/adminform/csv/produce_list.php");
        $("#dodamform3").attr("action", "/wp-content/themes/storefront-child/adminform/csv/produce_list.php");
    });

    $("input[id=presearch]").click(function() {
        $("#dodamform").attr("action", "/wp-content/themes/storefront-child/adminform/csv/presearch_result.php");
        $("#dodamform2").attr("action", "/wp-content/themes/storefront-child/adminform/csv/presearch_result.php");
        $("#dodamform3").attr("action", "/wp-content/themes/storefront-child/adminform/csv/presearch_result.php");
    });

    $("input[id=labelleaf]").click(function() {
        $("#dodamform").attr("action", "/wp-content/themes/storefront-child/adminform/csv/leaf_csv.php");
        $("#dodamform2").attr("action", "/wp-content/themes/storefront-child/adminform/csv/leaf_csv.php");
        $("#dodamform3").attr("action", "/wp-content/themes/storefront-child/adminform/csv/leaf_csv.php");
    });
</script>