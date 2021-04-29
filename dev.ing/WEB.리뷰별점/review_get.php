<?php 
//SELECT * FROM posts ORDER BY idx DESC LIMIT 0, 5;
//이파일을 위치시킨 곳에 review_form.php 의 스크립트 url에 연결시켜주면 됩니다
// 별관련 클래스명의 추가 등은 여기서 사용하면 됩니다

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$page = $_REQUEST['page'];
if($page == "") {
    $page = 1;
}
$from = ($page - 1) * 5;
$next = $page + 1;
$prev = $page - 1;

$count_query = "SELECT * FROM starreview";
$count_result = mysqli_query($mysqli, $count_query);
while ($count_row = mysqli_fetch_array($count_result)){
    $counter[] = $count_row[no];
}

$count = count($counter);
$count = $count / 5;
$count = round($count);

$query = "SELECT * FROM starreview ORDER BY date DESC LIMIT $from, 5";
$result = mysqli_query($mysqli, $query);

while ($row = mysqli_fetch_array($result)){

    echo '
        <div class="">
            <div class="starRev">
                ';

    if($row[score] == "10"){
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
    } elseif($row[score] == "9" ){
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
    } elseif($row[score] == "8" ){
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
    } elseif($row[score] == "7" ){
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
    } elseif($row[score] == "6" ){
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
    } elseif($row[score] == "5" ){
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
    } elseif($row[score] == "4" ){
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
    } elseif($row[score] == "3" ){
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
    } elseif($row[score] == "2" ){
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
    } elseif($row[score] == "1" ){
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
    echo '
            </div>
            <div class="">
                <p>'.$row[comment].'</p>
            </div>
            <div class="">
                <p>'.substr($row[userid], 0, -3) . "***".'</p>
                <p>'.$row[date].'</p>
            </div>
        </div>
    ';

}

echo '<input type="hidden" id="next" value="'.$next.'">';
echo '<input type="hidden" id="prev" value="'.$prev.'">';
echo '<input type="hidden" id="now" value="'.$page.'">';
echo '<input type="hidden" id="max" value="'.$count.'">';

?>
