<?php 


$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$userid = $_REQUEST['userid'];
$year = $_REQUEST['year'];
$month = $_REQUEST['month'];
$day = $_REQUEST['day'];

//json을 php에서 사용하기 위해 필요한 구문
header("Content-Type: application/json");


$userdate = $year."-".$month."-".$day;

$userdate_1 = date("Y-m-d", strtotime("+1 weeks", strtotime($userdate)));
$userdate_2 = date("Y-m-d", strtotime("+2 weeks", strtotime($userdate)));
$userdate_3 = date("Y-m-d", strtotime("+3 weeks", strtotime($userdate)));
$userdate_4 = date("Y-m-d", strtotime("+4 weeks", strtotime($userdate)));
$userdate_5 = date("Y-m-d", strtotime("+5 weeks", strtotime($userdate)));
$userdate_6 = date("Y-m-d", strtotime("+6 weeks", strtotime($userdate)));
$userdate_7 = date("Y-m-d", strtotime("+7 weeks", strtotime($userdate)));


$seq_row = array();
$user_row = array();
$week1_row = array();
$week2_row = array();
$week3_row = array();
$week4_row = array();
$week5_row = array();
$week6_row = array();
$week7_row = array();
$week8_row = array();
$memo_row = array();
$date_row = array('',$userdate,$userdate_1,$userdate_2,$userdate_3,$userdate_4,$userdate_5,$userdate_6,$userdate_7);

$u = 1;
while($u <= 7){

$userids = $userid."-".$u;
//DB 조회 쿼리문
$db_data_comeon_qr = "SELECT * FROM shicktest WHERE userid = '$userids'";
//SQL 명령어 실행~
$db_data_comeon_rs = mysqli_query($mysqli, $db_data_comeon_qr);


//DB에서 가져온 데이타를 PHP 배열에 각각 넣어서 JSON으로 전달해 주자.
$db_data_row = mysqli_fetch_array($db_data_comeon_rs);

array_push($seq_row, $u);
array_push($user_row, $db_data_row[userid]);
array_push($memo_row, $db_data_row[memo]);
array_push($week1_row, $db_data_row[$userdate]);
array_push($week2_row, $db_data_row[$userdate_1]);
array_push($week3_row, $db_data_row[$userdate_2]);
array_push($week4_row, $db_data_row[$userdate_3]);
array_push($week5_row, $db_data_row[$userdate_4]);
array_push($week6_row, $db_data_row[$userdate_5]);
array_push($week7_row, $db_data_row[$userdate_6]);
array_push($week8_row, $db_data_row[$userdate_7]);


$u++;

}

echo json_encode(array("date"=>$date_row,"memo"=>$memo_row,"id"=>$user_row, "week1"=>$week1_row,"week2"=>$week2_row,"week3"=>$week3_row,"week4"=>$week4_row,"week5"=>$week5_row,"week6"=>$week6_row,"week7"=>$week7_row,"week8"=>$week8_row, "seq"=>$seq_row));



mysqli_close($mysqli);
//최종 결과를 json으로 전달해 주자.
//echo(json_encode(array("mode" => $_REQUEST['mode'], "seq" => $db_seq, "name" => $db_name, "age" => $db_age, "email" => $db_email)));

