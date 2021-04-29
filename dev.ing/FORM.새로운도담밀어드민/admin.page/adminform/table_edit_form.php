<?php

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

?>
<script type="text/javascript" src="/wp-content/themes/storefront-child/jquery/jquery-3.4.1.min.js"></script>
<div>
    <form method="POST" id="table_form" name="table_form" action="">
        <input name="userid" type="text">
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
                    html += "<div>";
                    html += "<input type='text' name='tableid" + i + "' value=" + data.id[i] + ">";
                    html += "<input type='text' name='tablememo" + i + "' value=" + data.memo[i] + ">";
                    html += "<input type='text' name='week1menu" + i + "' value=" + data.week1[i] + ">";
                    html += "<input type='text' name='week2menu" + i + "' value=" + data.week2[i] + ">";
                    html += "<input type='text' name='week3menu" + i + "' value=" + data.week3[i] + ">";
                    html += "<input type='text' name='week4menu" + i + "' value=" + data.week4[i] + ">";
                    html += "<input type='text' name='week5menu" + i + "' value=" + data.week5[i] + ">";
                    html += "<input type='text' name='week6menu" + i + "' value=" + data.week6[i] + ">";
                    html += "<input type='text' name='week7menu" + i + "' value=" + data.week7[i] + ">";
                    html += "<input type='text' name='week8menu" + i + "' value=" + data.week8[i] + ">";
                    html += "</div>";
                }

                //snackhtml = "";
                //for(var i =0; i< data.sseq.length; i++){
                //    snackhtml += "<div>";
                //    snackhtml += ""
                //}

                var tabledate = "";
                tabledate += "<div><p>" + data.date[0] + "</p></div>";
                tabledate += "<div><p>메모</p></div>";
                tabledate += "<div><input type='text' name='week1' value=" + data.date[1] + ">";
                tabledate += "<div><input type='text' name='week2' value=" + data.date[2] + ">";
                tabledate += "<div><input type='text' name='week3' value=" + data.date[3] + ">";
                tabledate += "<div><input type='text' name='week4' value=" + data.date[4] + ">";
                tabledate += "<div><input type='text' name='week5' value=" + data.date[5] + ">";
                tabledate += "<div><input type='text' name='week6' value=" + data.date[6] + ">";
                tabledate += "<div><input type='text' name='week7' value=" + data.date[7] + ">";
                tabledate += "<div><input type='text' name='week8' value=" + data.date[8] + ">";

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