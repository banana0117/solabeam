<?php 

//이파일을 위치시킨 곳에 stop_schedule.php 의 스크립트 url에 연결시켜주면 됩니다
// 날짜관련 클래스는 여기서 적용하면 됩니다

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$week = $_REQUEST['weeks'];
$rote = $_REQUEST['rote'];
$didy = $_REQUEST['didy'];

$rote = date("Y-m-d", $rote);
$rotes = date("Y-m-d", strtotime("+".$week." weeks", strtotime($rote)));

echo '

    <p>'.$rote.'('.$didy.') 부터 일시정지</p>
    <p>'.$rotes.'('.$didy.') 부터 재시작</p>

';

?>
