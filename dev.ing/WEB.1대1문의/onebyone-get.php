<?php 
//SELECT * FROM posts ORDER BY idx DESC LIMIT 0, 5;
//이파일을 위치시킨 곳에 review_form.php 의 스크립트 url에 연결시켜주면 됩니다
// 별관련 클래스명의 추가 등은 여기서 사용하면 됩니다

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$page = $_REQUEST['page'];
$userid = $_REQUEST['userid'];

if($page == "") {
    $page = 1;
}
$from = ($page - 1) * 5;
$next = $page + 1;
$prev = $page - 1;

$count_query = "SELECT * FROM onebyoneask WHERE userid = '$userid'";
$count_result = mysqli_query($mysqli, $count_query);
while ($count_row = mysqli_fetch_array($count_result)){
    $counter[] = $count_row[no];
}

$count = count($counter);
$count = $count / 5;
$count = round($count);

$query = "SELECT * FROM onebyoneask WHERE userid = '$userid' ORDER BY date DESC LIMIT $from, 5";
$result = mysqli_query($mysqli, $query);

$i = 1;
echo '<input type="hidden" id="next" value="'.$next.'">';
echo '<input type="hidden" id="prev" value="'.$prev.'">';
echo '<input type="hidden" id="now" value="'.$page.'">';
echo '<input type="hidden" id="max" value="'.$count.'">';

while ($row = mysqli_fetch_array($result)){

    echo '
        <div class="">
            <div class="">
                <p id="popup_'.$i.'">'.$row[category].' '.$row[title].'</p>
            </div>
            <div class="">
                <p>'.$row[date].'</p>
                <p>'.$row[status].'</p>
            </div>
            <div class="" id="popcont'.$i.'">
                <div class="">
                    <p>문의내용</p>
                    <p>'.$row[indexs].'</p>
                </div>
                <div class="">
                    <p>답변내용</p>
                    <p>'.$row[comment].'</p>
                </div>
            </div>
        </div>';

    $i++;
}

?>
