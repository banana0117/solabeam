<?php

$today_date = date("Y-m-d");

?>


<link rel="stylesheet" href="/wp-content/themes/storefront-child/css/form_admin.css?ver=<?php echo date('YmdHis') ?>" />
<script type="text/javascript" src="/wp-content/themes/storefront-child/jquery/jquery-3.4.1.min.js"></script>

<style>

    .flexed { display:flex; width:100%; }
    .can { width:150px; height:45px; text-align:center; margin:3px; border:1px solid #c4c4c4; }
    .can p { width:150px; }

</style>

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

            <?php

            $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

            ?>
            <div>
                <form method="POST" id="table_form" name="table_form" action="">
                <p>고객 아이디를 입력하세요</p>
                    <input name="userid" type="text">
                    <p>조회할 날짜를 입력하세요</p>
                    <select name="year">
                        <option value="2021">2021</option>
                    </select>

                    <select name="month">
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

                    <select name="day">
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
                </form>
                <button id="table_submit">조회하기</button>
            </div>


            <script>
                $(document).ready(function() {
                    $("#table_submit").click(function() {

                        var userids = $("input[name=userid]").val();
                        var years = $("input[name=year]").val();
                        var months = $("input[name=month]").val();
                        var days = $("input[name=day]").val();

                        var tests = $("#table_form").serialize();
                        console.log(tests);

                        $.ajax({
                            type: "POST",
                            url: "/wp-content/themes/storefront-child/adminform/active/dbget.php",
                            dataType: "json",
                            data: $("#table_form").serialize(),
                        }).done(function(data) {
                            console.log(data);
                            var html = "";
                            for (var i = 0; i < data.seq.length; i++) {
                                html += "<div style='display:flex;'>";
                                html += "<input type='text' class='can' name='tableid" + i + "' value=" + data.id[i] + ">";
                                html += "<input type='text' class='can' name='tablememo" + i + "' value=" + data.memo[i] + ">";
                                html += "<input type='text' class='can' name='week1menu" + i + "' value=" + data.week1[i] + ">";
                                html += "<input type='text' class='can' name='week2menu" + i + "' value=" + data.week2[i] + ">";
                                html += "<input type='text' class='can' name='week3menu" + i + "' value=" + data.week3[i] + ">";
                                html += "<input type='text' class='can' name='week4menu" + i + "' value=" + data.week4[i] + ">";
                                html += "<input type='text' class='can' name='week5menu" + i + "' value=" + data.week5[i] + ">";
                                html += "<input type='text' class='can' name='week6menu" + i + "' value=" + data.week6[i] + ">";
                                html += "<input type='text' class='can' name='week7menu" + i + "' value=" + data.week7[i] + ">";
                                html += "<input type='text' class='can' name='week8menu" + i + "' value=" + data.week8[i] + ">";
                                html += "</div>";
                            }

                            //snackhtml = "";
                            //for(var i =0; i< data.sseq.length; i++){
                            //    snackhtml += "<div>";
                            //    snackhtml += ""
                            //}

                            var tabledate = "";
                            tabledate += "<div class='flexed'><div class='can'><p>" + data.date[0] + "</p></div>";
                            tabledate += "<div class='can'><p>메모</p></div>";
                            tabledate += "<div><input type='text' class='can' name='week1' value=" + data.date[1] + "></div>";
                            tabledate += "<div><input type='text' class='can' name='week2' value=" + data.date[2] + "></div>";
                            tabledate += "<div><input type='text' class='can' name='week3' value=" + data.date[3] + "></div>";
                            tabledate += "<div><input type='text' class='can' name='week4' value=" + data.date[4] + "></div>";
                            tabledate += "<div><input type='text' class='can' name='week5' value=" + data.date[5] + "></div>";
                            tabledate += "<div><input type='text' class='can' name='week6' value=" + data.date[6] + "></div>";
                            tabledate += "<div><input type='text' class='can' name='week7' value=" + data.date[7] + "></div>";
                            tabledate += "<div><input type='text' class='can' name='week8' value=" + data.date[8] + "></div></div>";

                            $("#table_forms").html(html);
                            $("#table-date").html(tabledate);

                        });
                    });
                });
            </script>
            <div>
                <form id="test_form">
                    <div class="" id="table-date">

                    </div>
                    
                    <div id="table_forms"></div>
                </form>
                <div class="">
                    <button id="table_refresh">수정적용하기</button>
                </div>
            </div>

            <div id="end_point"></div>

            <script>
                $(document).ready(function() {
                    $("#table_refresh").click(function() {
                        $.ajax({
                            type: "POST",
                            url: "/wp-content/themes/storefront-child/adminform/active/table_refresh.php",
                            dataType: "json",
                            data: $("#test_form").serialize(),
                        }).done(function(data) {
                            console.log(data);
                            $("#end_point").html("완료");

                        });
                    });
                });
            </script>
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