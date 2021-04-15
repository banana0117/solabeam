
<?php

$today_date = date("Y-m-d");

?>

<style>

    @import url(https://cdn.jsdelivr.net/gh/moonspam/NanumSquare@1.0/nanumsquare.css);
    #adminmenu li button { font-family:'NanumSquare'; }
    .adminmenuback { position:fixed; top:0; bottom:-120px; z-index:1; width:200px; background-color:#23282d; }
    #adminmenuwrap { position:fixed; float:left; z-index:9999; }
    #adminbody { padding:10px 10px 10px 30px; margin-left:200px; }
    #adminmenu { clear:left; margin:12px 0; padding:0; list-style:none; }
    #adminmenu li { border:none !important; min-height:40px; position:relative; margin-bottom:10px; color:#fff; width:200px; }
    #adminmenu li button { width:200px; font-size:25px; background-color:#23282d; color:#fff; border:none; padding:15px 0; }
    #adminmenu li button.on { background-color:#0b8249; font-weight:800; }

    .tab1 { display:none; }
    .tab2 { display:none; }
    .tab3 { display:none; }
    .tab4 { display:none; }

    .tab_box .title h3 { font-size:40px; font-weight:800; letter-spacing:-3px; }
    .select { margin-bottom:30px; }
    .select select { background-color:#fff; background-image:url(/wp-content/themes/storefront-child/image/otherpage/research/select_under.png); background-position:95% 50%; background-repeat:no-repeat; background-size:15px; border:1px solid #e7e7e7; padding:20px 60px 20px 50px; border-radius:9px; appearance:none; font-size:25px; font-weight:800; }
    .select textarea { border-radius:9px; }

    .one_button input[type=submit] { float:right; padding:20px 50px; font-size:22px; font-weight:800; background-color:#0b8249; border:none; border-radius:9px; color:#fff; width:30%; max-width:280px;  }
    .thr_button input[type=submit] { float:right; padding:20px 50px; font-size:22px; font-weight:800; background-color:#0b8249; border:none; border-radius:9px; color:#fff; width:50%; max-width:280px;  }
    .two_button input[type=submit] { padding:20px 50px; font-size:22px; font-weight:800; background-color:#0b8249; border:none; border-radius:9px; color:#fff; width:100%; max-width:280px;  }
    .radio_list { display:flex; justify-content:space-around; vertical-align:middle; padding:5px; }
    .radio_list input[type=radio] { display:none; }
    .radio_list input[type=radio] + label { width:100%; border:2px solid #e7e7e7; text-align:center; width:100%; padding:20px 0; background-color:#e7e7e7; margin:10px; border-radius:9px; }
    .radio_list input[type=radio] + label span { padding:20px; color:666; font-size:20px; }
    .radio_list input[type=radio]:checked + label { background-color:#fff; border:2px solid #0b8249; }
    .radio_list input[type=radio]:checked + label span { color:#0b8249; font-weight:800; }

    #dodamform { width:100%; display:flex; justify-content:flex-start; }
    #dodamform select { background-color:#fff; margin-right:10px; background-image:url(/wp-content/themes/storefront-child/image/otherpage/research/select_under.png); background-position:95% 50%; background-repeat:no-repeat; background-size:15px; border:1px solid #e7e7e7; padding:20px 60px 20px 50px; border-radius:9px; appearance:none; font-size:25px; font-weight:800; }

    .todays p { display:block; width:30%; margin:0 auto; border:2px solid #e7e7e7; padding:20px; font-size:30px; font-weight:800; text-align:center; border-radius:9px; margin-bottom:20px; }

    .hr-sect { display:flex; flex-basis:100%; align-items:center; font-size:17px; margin:8px 0; }
    .hr-sect:before, .hr-sect:after { content:''; flex-grow:1; background:rgba(0,0,0,0.35); height:1px; font-size:0; line-height:0px; margin:0px 16px; }
    .hr-sect p { font-size:40px; font-weight:800; }

    img { width:100%; margin:0 auto; display:block; }

.justify img { justify-content:center; }

</style>

<script type="text/javascript" src="/wp-content/themes/storefront-child/jquery/jquery-3.4.1.min.js"></script>

<div class="adminmenuback"></div>
<div id = "adminmenuwrap">
    <ul id="adminmenu">
        <li style="height:200px;">
            <img src="/wp-content/themes/storefront-child/image/dodam_old_logo.png" style="width:90%; padding:5px;">
        </li>
        <li>
            <button class="tab_menu_btn on" id="top_btn00" type="button">홈</button>
        </li>
        <li>
            <button class="tab_menu_btn" id="top_btn01" type="button">DB업로드</button>
        </li>
        <li>
            <button class="tab_menu_btn"  id="top_btn02" type="button">출력양식</button>
        </li>
        <li>
            <button class="tab_menu_btn" id="top_btn03" type="button">포스트모템</button>
        </li>
        <li>
            <button class="tab_menu_btn" id="top_btn04" type="button">준비중</button>
        </li>
    </ul>
</div>

<div id="admincontent">

    <div id="adminmainbar"></div>
    <div id="adminbody" role="main">

        <div class="tab_box tab0 on">

            <div class="justify" style="display:flex;">
                <img src="/wp-content/themes/storefront-child/image/Preloader_3.gif" style="max-width:500px;">
            </div>

            <div class="hr-sect">
                <p>어서오세요</p>
            </div>

            <div>
                <p>왼쪽에서 골라서 쓰시면 됩니다!</p>
            </div>



        </div>


        <div class="tab_box tab1">


            <div class="title">
                <h3>데이터베이스 업로드</h3>
            </div>

            <?php


            include 'lib_my.php';
include 'lib_arr.php';
?>

<form method="post" action="/wp-content/themes/storefront-child/dbup.php">
                <input type="hidden" name="action" value="form_submit">

                <div class="part_title">
                    <h2>STEP 1. 업로드 DB 선택</h2>
                </div>
                <div class="select">
                <select name="table_name">
                    <option value="shicktest">식단용</option>
                    <option value="acctest">인증번호용</option>
                    <option value="menutest">메뉴용</option>
                    <option value="contentbox">컨텐츠페이지</option>
                    <option value="mealclass">도담레시피용</option>
                    <option value="snacktable">간식고객용</option>
                </select>
                </div>

                <div class="part_title">
                    <h2>STEP 2.  업로드 내용 붙여넣기</h2>
                </div>
                <div class="select">
                <textarea name="excel_text" style="width:100%;height:300px;"></textarea>
                </div>
                <div class="one_button">
                <input type="submit" value="전송하기">
                </div>
            </form>



        </div>

        <div class="tab_box tab2">

            <div class="title">
                <h3>엑셀 내보내기</h3>
            </div>

            <div class="part_title">
                <h2>STEP 1. 출력할 자료 선택</h2>
            </div>

            <div class="">
                <form>
                <div class="radio_list">
                    <input type="radio" id="labelgogi" name="change"><label for="labelgogi"><span>육류스티커</span></label>
                    <input type="radio" id="labelssal" name="change"><label for="labelssal"><span>쌀스티커</span></label>
                    <input type="radio" id="labelleaf" name="change"><label for="labelleaf"><span>잎채소</span></label>
                    <input type="radio" id="labelwater" name="change"><label for="labelwater"><span>물스티커</span></label>
                </div>
                <div class="radio_list">
                    <input type="radio" id="myungdan" name="change"><label for="myungdan"><span>발송명단</span></label>
                    <input type="radio" id="jearyobuy" name="change"><label for="jearyobuy"><span>재료구매량</span></label>
                    <input type="radio" id="produce" name="change"><label for="produce"><span>생산목록</span></label>
                    <input type="radio" id="songjang" name="change"><label for="songjang"><span>송장출력</span></label>    
                </div>
                    <div class="radio_list">
                        <input type="radio" id="presearch" name="change"><label for="presearch"><span>사전설문조사</span></label>
                        <input type="radio" id="test0002" name="change"><label for="test0002"><span>없음</span></label>
                        <input type="radio" id="test0003" name="change"><label for="test0003"><span>없음</span></label>
                        <input type="radio" id="test0004" name="change"><label for="test0004"><span>없음</span></label>
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

        <div class="tab_box tab3">

            <div class="">
                <iframe src="https://forms.monday.com/forms/embed/4dc94114262eb1ba6799329bb93969fc" width="100%" height="100%" style="border: 0; box-shadow: 5px 5px 56px 0px rgba(0,0,0,0.25);"></iframe>
            </div>

        </div>

        <div class="tab_box tab4">

        </div>




</div>



    <!--탭 juqery-->
    <script>

        $('.tab_menu_btn').on('click',function(){
            //버튼 색 제거,추가
            $('.tab_menu_btn').removeClass('on');
            $(this).addClass('on')

            //컨텐츠 제거 후 인덱스에 맞는 컨텐츠 노출
            var idx = $('.tab_menu_btn').index(this);

            $('.tab_box').hide();
            $('.tab_box').eq(idx).show();
        });

    </script>


    <script>

        $("input[id=songjang]").click(function(){
            $("#dodamform").attr("action","/wp-content/themes/storefront-child/csv_down/csvdown.php");
            $("#dodamform2").attr("action","/wp-content/themes/storefront-child/csv_down/csvdown.php");
            $("#dodamform3").attr("action","/wp-content/themes/storefront-child/csv_down/csvdown.php");
        });
        $("input[id=labelgogi]").click(function(){
            $("#dodamform").attr("action","/wp-content/themes/storefront-child/csv_down/meatcsv.php");
            $("#dodamform2").attr("action","/wp-content/themes/storefront-child/csv_down/meatcsv.php");
            $("#dodamform3").attr("action","/wp-content/themes/storefront-child/csv_down/meatcsv.php");
        });
        $("input[id=labelwater]").click(function(){
            $("#dodamform").attr("action","/wp-content/themes/storefront-child/csv_down/watercsv.php");
            $("#dodamform2").attr("action","/wp-content/themes/storefront-child/csv_down/watercsv.php");
            $("#dodamform3").attr("action","/wp-content/themes/storefront-child/csv_down/watercsv.php");
        });
        $("input[id=labelssal]").click(function(){
            $("#dodamform").attr("action","/wp-content/themes/storefront-child/csv_down/ssalcsv.php");
            $("#dodamform2").attr("action","/wp-content/themes/storefront-child/csv_down/ssalcsv.php");
            $("#dodamform3").attr("action","/wp-content/themes/storefront-child/csv_down/ssalcsv.php");
        });
        $("input[id=myungdan]").click(function(){
            $("#dodamform").attr("action","/wp-content/themes/storefront-child/csv_down/listcsv.php");
            $("#dodamform2").attr("action","/wp-content/themes/storefront-child/csv_down/listcsv.php");
            $("#dodamform3").attr("action","/wp-content/themes/storefront-child/csv_down/listcsv.php");
        });
        $("input[id=jearyobuy]").click(function(){
            $("#dodamform").attr("action","/wp-content/themes/storefront-child/csv_down/buying.php");
            $("#dodamform2").attr("action","/wp-content/themes/storefront-child/csv_down/buying.php");
            $("#dodamform3").attr("action","/wp-content/themes/storefront-child/csv_down/buying.php");
        });
        $("input[id=produce]").click(function(){
            $("#dodamform").attr("action","/wp-content/themes/storefront-child/csv_down/produce_list.php");
            $("#dodamform2").attr("action","/wp-content/themes/storefront-child/csv_down/produce_list.php");
            $("#dodamform3").attr("action","/wp-content/themes/storefront-child/csv_down/produce_list.php");
        });

        $("input[id=presearch]").click(function(){
            $("#dodamform").attr("action","/wp-content/themes/storefront-child/csv_down/presearch_result.php");
            $("#dodamform2").attr("action","/wp-content/themes/storefront-child/csv_down/presearch_result.php");
            $("#dodamform3").attr("action","/wp-content/themes/storefront-child/csv_down/presearch_result.php");
        });

        $("input[id=labelleaf]").click(function(){
            $("#dodamform").attr("action","/wp-content/themes/storefront-child/csv_down/leaf_csv.php");
            $("#dodamform2").attr("action","/wp-content/themes/storefront-child/csv_down/leaf_csv.php");
            $("#dodamform3").attr("action","/wp-content/themes/storefront-child/csv_down/leaf_csv.php");
        });
        
    </script>

