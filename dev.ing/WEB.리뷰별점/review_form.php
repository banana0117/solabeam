<?php
/*
* 상세페이지에서 리뷰를 보는 소스입니다
* style 부분은 삭제하고 사용해도 무방하나 일단 별 나오는 소스임
* $_per 가 붙은 변수는 비율 % 로써 세로막대 그래프 그릴때 넣어서 % 비율로 사용하면 됩니다
* 스크립트 부분은 앵간하면 짜져있으니 모양만 만지면 될듯 합니다
* 전달한 파일의 위치를 변경할 경우 review_get.php의 경로를 아래 스크립트 function 3개의 url 에다가 붙여넣어줘야합니다
*/
?>

<style>
    .starR1 {
        background: url('/wp-content/themes/storefront-child/image/stars.png') no-repeat -52px 0;
        background-size: auto 100%;
        width: 15px;
        height: 30px;
        float: left;
        text-indent: -9999px;
        cursor: pointer;
    }

    .starR2 {
        background: url('/wp-content/themes/storefront-child/image/stars.png') no-repeat right 0;
        background-size: auto 100%;
        width: 15px;
        height: 30px;
        float: left;
        text-indent: -9999px;
        cursor: pointer;
    }

    .starR1.on {
        background-position: 0 0;
    }

    .starR2.on {
        background-position: -15px 0;
    }
</style>

<?php

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$review_query = "SELECT * FROM starreview";
$review_result = mysqli_query($mysqli, $review_query);
while ($review_row = mysqli_fetch_array($review_result)) {

    $point = $point + $review_row[score];
    $counter[] = $review_row[score];

    if ($review_row[score] == "10") { // 5
        $five_count = $five_count + 1;
    } elseif ($review_row[score] == "9") { // 4.5
        $five_count = $five_count + 1;
    } elseif ($review_row[score] == "8") { //4
        $four_count = $four_count + 1;
    } elseif ($review_row[score] == "7") { //3.5
        $four_count = $four_count + 1;
    } elseif ($review_row[score] == "6") { // 3
        $thr_count = $thr_count + 1;
    } elseif ($review_row[score] == "5") { //2.5
        $thr_count = $thr_count + 1;
    } elseif ($review_row[score] == "4") { //2
        $two_count = $two_count + 1;
    } elseif ($review_row[score] == "3") { //1.5
        $two_count = $two_count + 1;
    } elseif ($review_row[score] == "2") { //1
        $one_count = $one_count + 1;
    } elseif ($review_row[score] == "1") { //0.5
        $one_count = $one_count + 1;
    }
}



$total = count($counter);
$sum = $point / $total;
$sum = $sum / 2;
$sum = round($sum, 1);
$point = $point / 2;
$point = round($point, 1);

$five_per = ($five_count / $total) * 100;
$four_per = ($four_count / $total) * 100;
$thr_per = ($thr_count / $total) * 100;
$two_per = ($two_count / $total) * 100;
$one_per = ($one_count / $total) * 100;

$totals = $total / 5;
$totals = round($totals);

?>

<div class="">

    <div class="">
        <div class="">
            <p><?php echo $sum ?></p>
            <p>/5</p>
            <?php
                if($sum > 4.5){
                    echo '<span class="starR1 on">별1_왼쪽</span>
                    <span class="starR2 on">별1_오른쪽</span>
                    <span class="starR1 on">별2_왼쪽</span>
                    <span class="starR2 on">별2_오른쪽</span>
                    <span class="starR1 on">별3_왼쪽</span>
                    <span class="starR2 on">별3_오른쪽</span>
                    <span class="starR1 on">별4_왼쪽</span>
                    <span class="starR2 on">별4_오른쪽</span>
                    <span class="starR1 on">별5_왼쪽</span>
                    <span class="starR2 on">별5_오른쪽</span>';
                } elseif($sum <= 4.5 && $sum > 4){
                    echo '<span class="starR1 on">별1_왼쪽</span>
                    <span class="starR2 on">별1_오른쪽</span>
                    <span class="starR1 on">별2_왼쪽</span>
                    <span class="starR2 on">별2_오른쪽</span>
                    <span class="starR1 on">별3_왼쪽</span>
                    <span class="starR2 on">별3_오른쪽</span>
                    <span class="starR1 on">별4_왼쪽</span>
                    <span class="starR2 on">별4_오른쪽</span>
                    <span class="starR1 on">별5_왼쪽</span>
                    <span class="starR2">별5_오른쪽</span>';
                } elseif($sum < 4.5 && $sum > 3.5){
                    echo '<span class="starR1 on">별1_왼쪽</span>
                    <span class="starR2 on">별1_오른쪽</span>
                    <span class="starR1 on">별2_왼쪽</span>
                    <span class="starR2 on">별2_오른쪽</span>
                    <span class="starR1 on">별3_왼쪽</span>
                    <span class="starR2 on">별3_오른쪽</span>
                    <span class="starR1 on">별4_왼쪽</span>
                    <span class="starR2 on">별4_오른쪽</span>
                    <span class="starR1">별5_왼쪽</span>
                    <span class="starR2">별5_오른쪽</span>';
                } elseif($sum < 3.5 && $sum > 3){
                    echo '<span class="starR1 on">별1_왼쪽</span>
                    <span class="starR2 on">별1_오른쪽</span>
                    <span class="starR1 on">별2_왼쪽</span>
                    <span class="starR2 on">별2_오른쪽</span>
                    <span class="starR1 on">별3_왼쪽</span>
                    <span class="starR2 on">별3_오른쪽</span>
                    <span class="starR1 on">별4_왼쪽</span>
                    <span class="starR2">별4_오른쪽</span>
                    <span class="starR1">별5_왼쪽</span>
                    <span class="starR2">별5_오른쪽</span>';
                } elseif($sum < 3 && $sum > 2.5){
                    echo '<span class="starR1 on">별1_왼쪽</span>
                    <span class="starR2 on">별1_오른쪽</span>
                    <span class="starR1 on">별2_왼쪽</span>
                    <span class="starR2 on">별2_오른쪽</span>
                    <span class="starR1 on">별3_왼쪽</span>
                    <span class="starR2 on">별3_오른쪽</span>
                    <span class="starR1">별4_왼쪽</span>
                    <span class="starR2">별4_오른쪽</span>
                    <span class="starR1">별5_왼쪽</span>
                    <span class="starR2">별5_오른쪽</span>';
                } elseif($sum <= 2.5 && $sum > 2){
                    echo '<span class="starR1 on">별1_왼쪽</span>
                    <span class="starR2 on">별1_오른쪽</span>
                    <span class="starR1 on">별2_왼쪽</span>
                    <span class="starR2 on">별2_오른쪽</span>
                    <span class="starR1 on">별3_왼쪽</span>
                    <span class="starR2">별3_오른쪽</span>
                    <span class="starR1">별4_왼쪽</span>
                    <span class="starR2">별4_오른쪽</span>
                    <span class="starR1">별5_왼쪽</span>
                    <span class="starR2">별5_오른쪽</span>';
                } elseif($sum <= 2 && $sum > 1.5){
                    echo '<span class="starR1 on">별1_왼쪽</span>
                    <span class="starR2 on">별1_오른쪽</span>
                    <span class="starR1 on">별2_왼쪽</span>
                    <span class="starR2 on">별2_오른쪽</span>
                    <span class="starR1">별3_왼쪽</span>
                    <span class="starR2">별3_오른쪽</span>
                    <span class="starR1">별4_왼쪽</span>
                    <span class="starR2">별4_오른쪽</span>
                    <span class="starR1">별5_왼쪽</span>
                    <span class="starR2">별5_오른쪽</span>';
                } elseif($sum <= 1.5 && $sum > 1){
                    echo '<span class="starR1 on">별1_왼쪽</span>
                    <span class="starR2 on">별1_오른쪽</span>
                    <span class="starR1 on">별2_왼쪽</span>
                    <span class="starR2">별2_오른쪽</span>
                    <span class="starR1">별3_왼쪽</span>
                    <span class="starR2">별3_오른쪽</span>
                    <span class="starR1">별4_왼쪽</span>
                    <span class="starR2">별4_오른쪽</span>
                    <span class="starR1">별5_왼쪽</span>
                    <span class="starR2">별5_오른쪽</span>';
                } elseif($sum <= 1 && $sum > 0.5){
                    echo '<span class="starR1 on">별1_왼쪽</span>
                    <span class="starR2 on">별1_오른쪽</span>
                    <span class="starR1">별2_왼쪽</span>
                    <span class="starR2">별2_오른쪽</span>
                    <span class="starR1">별3_왼쪽</span>
                    <span class="starR2">별3_오른쪽</span>
                    <span class="starR1">별4_왼쪽</span>
                    <span class="starR2">별4_오른쪽</span>
                    <span class="starR1">별5_왼쪽</span>
                    <span class="starR2">별5_오른쪽</span>';
                } else{
                    echo '<span class="starR1 on">별1_왼쪽</span>
                    <span class="starR2">별1_오른쪽</span>
                    <span class="starR1">별2_왼쪽</span>
                    <span class="starR2">별2_오른쪽</span>
                    <span class="starR1">별3_왼쪽</span>
                    <span class="starR2">별3_오른쪽</span>
                    <span class="starR1">별4_왼쪽</span>
                    <span class="starR2">별4_오른쪽</span>
                    <span class="starR1">별5_왼쪽</span>
                    <span class="starR2">별5_오른쪽</span>';
                }
            ?>
            <p><?php echo $total ?>개의 후기</p>
        </div>
        <div class="">
            <!--비율 퍼센트 이거 땡겨서 쓰면 됩니다 -->
            <p>5점 : <?php echo round($five_per) ?></p>
            <p>4점 : <?php echo round($four_per) ?></p>
            <p>3점 : <?php echo round($thr_per) ?></p>
            <p>2점 : <?php echo round($two_per) ?></p>
            <p>1점 : <?php echo round($one_per) ?></p>

        </div>
    </div>

    <div id="review_cont">
        <input type="hidden" id="next" value="2">
        <input type="hidden" id="prev" value="">
        <input type="hidden" id="now" value="">
        <input type="hidden" id="max" value="">
    </div>

    <div class="" style="display:flex;">
        <p id="prevs"><</p>
                <p id="nows">1</p>
                <p>/</p>
                <p id="maxs"><?php echo $totals ?></p>
                <p id="nexts">></p>
    </div>

</div>

<script>
    $(document).ready(function() {
        var url = "/wp-content/themes/storefront-child/csv_down/test/review_get.php";
        $.get(url, {
            page: 1
        }, function(args) {
            $("#review_cont").html(args);
        });
    });

    $("#nexts").click(function() {
        var no = $("#next").val();
        var max = $("#max").val();
        var now = $("#now").val();

        if (now == max) {

        } else {
            var url = "/wp-content/themes/storefront-child/csv_down/test/review_get.php";
            //$("#review_cont").html("/로딩되는이미지?");
            $.get(url, {
                page: no
            }, function(args) {
                $("#review_cont").html(args);
            });

        }
        $("#nows").html(no);
        $("#maxs").html(max);
    });

    $("#prevs").click(function() {
        var no = $("#prev").val();
        var now = $("#now").val();
        var max = $("#max").val();

        if (now == '1') {

        } else {
            var url = "/wp-content/themes/storefront-child/csv_down/test/review_get.php";
            //$("#review_cont").html("/로딩되는이미지?");
            $.get(url, {
                page: no
            }, function(args) {
                $("#review_cont").html(args);
            });
        }

        $("#nows").html(no);
        $("#maxs").html(max);
    });
</script>