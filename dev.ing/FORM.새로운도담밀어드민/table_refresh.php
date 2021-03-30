<?php 

header("Content-Type: application/json");
$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

//-1 의 것
$user_1 = $_REQUEST['tableid0'];
$memo_1 = $_REQUEST['tablememo0'];
$week1menu_1 = $_REQUEST['week1menu0'];
$week2menu_1 = $_REQUEST['week2menu0'];
$week3menu_1 = $_REQUEST['week3menu0'];
$week4menu_1 = $_REQUEST['week4menu0'];
$week5menu_1 = $_REQUEST['week5menu0'];
$week6menu_1 = $_REQUEST['week6menu0'];
$week7menu_1 = $_REQUEST['week7menu0'];
$week8menu_1 = $_REQUEST['week8menu0'];

//-2 의 것
$user_2 = $_REQUEST['tableid1'];
$memo_2 = $_REQUEST['tablememo1'];
$week1menu_2 = $_REQUEST['week1menu1'];
$week2menu_2 = $_REQUEST['week2menu1'];
$week3menu_2 = $_REQUEST['week3menu1'];
$week4menu_2 = $_REQUEST['week4menu1'];
$week5menu_2 = $_REQUEST['week5menu1'];
$week6menu_2 = $_REQUEST['week6menu1'];
$week7menu_2 = $_REQUEST['week7menu1'];
$week8menu_2 = $_REQUEST['week8menu1'];

//-3 의 것
$user_3 = $_REQUEST['tableid2'];
$memo_3 = $_REQUEST['tablememo2'];
$week1menu_3 = $_REQUEST['week1menu2'];
$week2menu_3 = $_REQUEST['week2menu2'];
$week3menu_3 = $_REQUEST['week3menu2'];
$week4menu_3 = $_REQUEST['week4menu2'];
$week5menu_3 = $_REQUEST['week5menu2'];
$week6menu_3 = $_REQUEST['week6menu2'];
$week7menu_3 = $_REQUEST['week7menu2'];
$week8menu_3 = $_REQUEST['week8menu2'];

//-4 의 것
$user_4 = $_REQUEST['tableid3'];
$memo_4 = $_REQUEST['tablememo3'];
$week1menu_4 = $_REQUEST['week1menu3'];
$week2menu_4 = $_REQUEST['week2menu3'];
$week3menu_4 = $_REQUEST['week3menu3'];
$week4menu_4 = $_REQUEST['week4menu3'];
$week5menu_4 = $_REQUEST['week5menu3'];
$week6menu_4 = $_REQUEST['week6menu3'];
$week7menu_4 = $_REQUEST['week7menu3'];
$week8menu_4 = $_REQUEST['week8menu3'];

//-5 의 것
$user_5 = $_REQUEST['tableid4'];
$memo_5 = $_REQUEST['tablememo4'];
$week1menu_5 = $_REQUEST['week1menu4'];
$week2menu_5 = $_REQUEST['week2menu4'];
$week3menu_5 = $_REQUEST['week3menu4'];
$week4menu_5 = $_REQUEST['week4menu4'];
$week5menu_5 = $_REQUEST['week5menu4'];
$week6menu_5 = $_REQUEST['week6menu4'];
$week7menu_5 = $_REQUEST['week7menu4'];
$week8menu_5 = $_REQUEST['week8menu4'];

//-6 의 것
$user_6 = $_REQUEST['tableid5'];
$memo_6 = $_REQUEST['tablememo5'];
$week1menu_6 = $_REQUEST['week1menu5'];
$week2menu_6 = $_REQUEST['week2menu5'];
$week3menu_6 = $_REQUEST['week3menu5'];
$week4menu_6 = $_REQUEST['week4menu5'];
$week5menu_6 = $_REQUEST['week5menu5'];
$week6menu_6 = $_REQUEST['week6menu5'];
$week7menu_6 = $_REQUEST['week7menu5'];
$week8menu_6 = $_REQUEST['week8menu5'];

//날짜 총8주

$week1 = $_REQUEST['week1'];
$week2 = $_REQUEST['week2'];
$week3 = $_REQUEST['week3'];
$week4 = $_REQUEST['week4'];
$week5 = $_REQUEST['week5'];
$week6 = $_REQUEST['week6'];
$week7 = $_REQUEST['week7'];
$week8 = $_REQUEST['week8'];



$week1query = "UPDATE `shicktest` SET `$week1` = '$week1menu_1', `$week2` ='$week2menu_1', `$week3` = '$week3menu_1', `$week4` = '$week4menu_1', `$week5` ='$week5menu_1', `$week6` ='$week6menu_1', `$week7` ='$week7menu_1', `$week8` ='$week8menu_1', `memo` ='$memo_1' WHERE userid = '$user_1'";
$week2query = "UPDATE `shicktest` SET `$week1` = '$week1menu_2', `$week2` ='$week2menu_2', `$week3` = '$week3menu_2', `$week4` = '$week4menu_2', `$week5` ='$week5menu_2', `$week6` ='$week6menu_2', `$week7` ='$week7menu_2', `$week8` ='$week8menu_2', `memo` ='$memo_2' WHERE userid = '$user_2'";
$week3query = "UPDATE `shicktest` SET `$week1` = '$week1menu_3', `$week2` ='$week2menu_3', `$week3` = '$week3menu_3', `$week4` = '$week4menu_3', `$week5` ='$week5menu_3', `$week6` ='$week6menu_3', `$week7` ='$week7menu_3', `$week8` ='$week8menu_3', `memo` ='$memo_3' WHERE userid = '$user_3'";
$week4query = "UPDATE `shicktest` SET `$week1` = '$week1menu_4', `$week2` ='$week2menu_4', `$week3` = '$week3menu_4', `$week4` = '$week4menu_4', `$week5` ='$week5menu_4', `$week6` ='$week6menu_4', `$week7` ='$week7menu_4', `$week8` ='$week8menu_4', `memo` ='$memo_4' WHERE userid = '$user_4'";
$week5query = "UPDATE `shicktest` SET `$week1` = '$week1menu_5', `$week2` ='$week2menu_5', `$week3` = '$week3menu_5', `$week4` = '$week4menu_5', `$week5` ='$week5menu_5', `$week6` ='$week6menu_5', `$week7` ='$week7menu_5', `$week8` ='$week8menu_5', `memo` ='$memo_5' WHERE userid = '$user_5'";
$week6query = "UPDATE `shicktest` SET `$week1` = '$week1menu_6', `$week2` ='$week2menu_6', `$week3` = '$week3menu_6', `$week4` = '$week4menu_6', `$week5` ='$week5menu_6', `$week6` ='$week6menu_6', `$week7` ='$week7menu_6', `$week8` ='$week8menu_6', `memo` ='$memo_6' WHERE userid = '$user_6'";


mysqli_query($mysqli, $week1query);


mysqli_query($mysqli, $week2query);

mysqli_query($mysqli, $week3query);


mysqli_query($mysqli, $week4query);


mysqli_query($mysqli, $week5query);


mysqli_query($mysqli, $week6query);

mysqli_close($mysqli);