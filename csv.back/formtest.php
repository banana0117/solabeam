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
        min-height: 40px;
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
        <li>
            <button class="tab_menu_btn on" id="top_btn00" type="button">바나나용</button>
        </li>
        <li>
            <button class="tab_menu_btn" id="top_btn01" type="button">DB업로드</button>
        </li>
        <li>
            <button class="tab_menu_btn" id="top_btn02" type="button">출력양식</button>
        </li>
        <li>
            <button class="tab_menu_btn" id="top_btn03" type="button">준비중</button>
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

            <div>
                <img src="/wp-content/themes/storefront-child/image/otherpage/report/snack/banana.png" style="max-width:700px;">
            </div>

            <div class="hr-sect">
                <p>바나나용 입니다.</p>
            </div>

            <div>
                <p>다른 고객님들은 <a href="https://www.dodammeal.com/wp-content/themes/storefront-child/dodamform.php">이쪽</a> 으로가세요</p>
                <p><?php echo $test_date ?></p>
            </div>

            <?php

            $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

            $query = "SELECT * FROM userTest WHERE userid = 'banana'";
            $result = mysqli_query($mysqli, $query);
            while ($row = mysqli_fetch_array($result)) {
                $point[] = $row[opt];
            }

            $count = count($point);

            $x = 0;
            $points = 0;
            while ($x <= $count) {
                $points = $points + $point[$x];
                $x++;
            }

            echo $points;


            ?>

            <input type="text" id="ass">
            <input type="text" id="asd">

            <select name="tdas" id="gsa">
                <option value="1">fadf</option>
                <option value="2">fadf</option>
                <option value="3">fadf</option>
                <option value="4">fadf</option>
                <option value="5">fadf</option>
            </select>

            <div class="">
                <p id="add_d">ㅁ</p>
                        <p id="add">1</p>
                        <p id="add_p">ㅌ</p>
            </div>

        </div>

        <script>
            $("#add_d").on('click', function() {
                var counters = $("#add").text();

                if (counters == 1) {
                    $("#add").text('1');

                } else if (counters == 2) {
                    $("#add").text('1');

                } else if (counters == 3) {
                    $("#add").text('2');

                } else if (counters == 4) {
                    $("#add").text('3');

                } else if (counters == 5) {
                    $("#add").text('4');

                } else if (counters == 6) {
                    $("#add").text('5');

                } else if (counters == 7) {
                    $("#add").text('6');

                } else if (counters == 8) {
                    $("#add").text('7');

                } else if (counters == 9) {
                    $("#add").text('8');

                }

            });

            $("#add_p").on('click', function() {
                var counters = $("#add").text();
                if (counters == 1) {
                    $("#add").text('2');

                } else if (counters == 2) {
                    $("#add").text('3');

                } else if (counters == 3) {
                    $("#add").text('4');

                } else if (counters == 4) {
                    $("#add").text('5');

                } else if (counters == 5) {
                    $("#add").text('6');

                } else if (counters == 6) {
                    $("#add").text('7');

                } else if (counters == 7) {
                    $("#add").text('8');

                } else if (counters == 8) {
                    $("#add").text('9');

                } else if (counters == 9) {
                    alert('더 이상 추가할 수 없습니다.');
                }
            });

            $("#gsa option[value='2']").prop("disabled", true);

            $("#asd").on('keyup change', function() {
                $("#ass").val($(this).val());
            });
        </script>

        <div class="tab_box tab1">


            <div class="title">
                <h3>데이터베이스 업로드</h3>
            </div>


            <form method="post" action="/wp-content/themes/storefront-child/dbup.php">
                <input type="hidden" name="action" value="form_submit">

                <div class="part_title">
                    <h2>STEP 1. 업로드 DB 선택</h2>
                </div>
                <div class="select">
                    <select name="table_name">
                        <?php
                        $tabs = query_arr("SHOW TABLES");
                        foreach ($tabs as $tab) {
                            echo "<option value='$tab'>$tab</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="part_title">
                    <h2>STEP 2. 업로드 내용 붙여넣기</h2>
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
                        <input type="radio" id="songjang" name="change"><label for="songjang"><span>송장출력</span></label>
                        <input type="radio" id="labelgogi" name="change"><label for="labelgogi"><span>육류스티커</span></label>
                        <input type="radio" id="labelssal" name="change"><label for="labelssal"><span>쌀스티커</span></label>
                        <input type="radio" id="labelwater" name="change"><label for="labelwater"><span>물스티커</span></label>
                    </div>
                    <div class="radio_list">
                        <input type="radio" id="myungdan" name="change"><label for="myungdan"><span>발송명단</span></label>
                        <input type="radio" id="jearyobuy" name="change"><label for="jearyobuy"><span>재료구매량</span></label>
                        <input type="radio" id="produce" name="change"><label for="produce"><span>생산목록</span></label>
                        <input type="radio" id="presearch" name="change"><label for="presearch"><span>사전설문조사</span></label>
                    </div>
                    <div class="radio_list">
                        <input type="radio" id="test0001" name="change"><label for="test0001"><span>잎채소(테스트)</span></label>
                        <input type="radio" id="test0002" name="change"><label for="test0002"><span>메뉴(테스트)</span></label>
                        <input type="radio" id="test0003" name="change"><label for="test0003"><span>간식(테스트)</span></label>
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
                        <option value="2020">2020</option>
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
        $('.tab_menu_btn').on('click', function() {
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
        $("input[id=songjang]").click(function() {
            $("#dodamform").attr("action", "/wp-content/themes/storefront-child/csv_down/csvdown.php");
            $("#dodamform2").attr("action", "/wp-content/themes/storefront-child/csv_down/csvdown.php");
            $("#dodamform3").attr("action", "/wp-content/themes/storefront-child/csv_down/csvdown.php");
        });
        $("input[id=labelgogi]").click(function() {
            $("#dodamform").attr("action", "/wp-content/themes/storefront-child/csv_down/meatcsv.php");
            $("#dodamform2").attr("action", "/wp-content/themes/storefront-child/csv_down/meatcsv.php");
            $("#dodamform3").attr("action", "/wp-content/themes/storefront-child/csv_down/meatcsv.php");
        });
        $("input[id=labelwater]").click(function() {
            $("#dodamform").attr("action", "/wp-content/themes/storefront-child/csv_down/watercsv.php");
            $("#dodamform2").attr("action", "/wp-content/themes/storefront-child/csv_down/watercsv.php");
            $("#dodamform3").attr("action", "/wp-content/themes/storefront-child/csv_down/watercsv.php");
        });
        $("input[id=labelssal]").click(function() {
            $("#dodamform").attr("action", "/wp-content/themes/storefront-child/csv_down/ssalcsv.php");
            $("#dodamform2").attr("action", "/wp-content/themes/storefront-child/csv_down/ssalcsv.php");
            $("#dodamform3").attr("action", "/wp-content/themes/storefront-child/csv_down/ssalcsv.php");
        });
        $("input[id=myungdan]").click(function() {
            $("#dodamform").attr("action", "/wp-content/themes/storefront-child/csv_down/listcsv.php");
            $("#dodamform2").attr("action", "/wp-content/themes/storefront-child/csv_down/listcsv.php");
            $("#dodamform3").attr("action", "/wp-content/themes/storefront-child/csv_down/listcsv.php");
        });
        $("input[id=jearyobuy]").click(function() {
            $("#dodamform").attr("action", "/wp-content/themes/storefront-child/csv_down/buying.php");
            $("#dodamform2").attr("action", "/wp-content/themes/storefront-child/csv_down/buying.php");
            $("#dodamform3").attr("action", "/wp-content/themes/storefront-child/csv_down/buying.php");
        });
        $("input[id=produce]").click(function() {
            $("#dodamform").attr("action", "/wp-content/themes/storefront-child/csv_down/produce_list.php");
            $("#dodamform2").attr("action", "/wp-content/themes/storefront-child/csv_down/produce_list.php");
            $("#dodamform3").attr("action", "/wp-content/themes/storefront-child/csv_down/produce_list.php");
        });

        $("input[id=presearch]").click(function() {
            $("#dodamform").attr("action", "/wp-content/themes/storefront-child/csv_down/presearch_result.php");
            $("#dodamform2").attr("action", "/wp-content/themes/storefront-child/csv_down/presearch_result.php");
            $("#dodamform3").attr("action", "/wp-content/themes/storefront-child/csv_down/presearch_result.php");
        });

        $("input[id=test0001]").click(function() {
            $("#dodamform").attr("action", "/wp-content/themes/storefront-child/csv_down/leaf_csv.php");
            $("#dodamform2").attr("action", "/wp-content/themes/storefront-child/csv_down/leaf_csv.php");
            $("#dodamform3").attr("action", "/wp-content/themes/storefront-child/csv_down/leaf_csv.php");
        });

        $("input[id=test0002]").click(function() {
            $("#dodamform").attr("action", "/wp-content/themes/storefront-child/csv_down/menudown.php");
            $("#dodamform2").attr("action", "/wp-content/themes/storefront-child/csv_down/menudown.php");
            $("#dodamform3").attr("action", "/wp-content/themes/storefront-child/csv_down/menudown.php");
        });

        $("input[id=test0003]").click(function() {
            $("#dodamform").attr("action", "/wp-content/themes/storefront-child/csv_down/test_snack.php");
            $("#dodamform2").attr("action", "/wp-content/themes/storefront-child/csv_down/test_snack.php");
            $("#dodamform3").attr("action", "/wp-content/themes/storefront-child/csv_down/test_snack.php");
        });
    </script>