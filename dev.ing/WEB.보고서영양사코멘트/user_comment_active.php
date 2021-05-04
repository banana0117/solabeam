
<?php
$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$userid = $_POST['userid'];
$year = $_POST['reyear'];
$month = $_POST['remonth'];
$day = $_POST['reday'];

$date = $year.'-'.$month.'-'.$day;

$comment_1 = $POST['text1'];
$comment_2 = $POST['text2'];
$comment_3 = $POST['text3'];
$comment_4 = $POST['text4'];
$comment_5 = $POST['text5'];


$insert = "INSERT INTO `babycomment`(`date`, `userid`, `one`, `two`, `the`, `four`, `five`) VALUES ('$date', '$userid', '$comment_1','$comment_2','$comment_3','$comment_4','$comment_5')";
mysqli_query($mysqli, $insert);


?>

<p>완료~~~~~</p>
