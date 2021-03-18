<?php
//mysqli 접속정보
$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
if($mysqli->connect_errno) die('Connect failed: '.$mysqli->connect_error);
if(!$mysqli->set_charset('utf8')) die('Error loading character set utf8: '.$mysqli->error);

?>