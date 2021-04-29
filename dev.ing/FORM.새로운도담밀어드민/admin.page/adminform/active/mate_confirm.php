
<?php 

    $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

    $year = $_POST['reyear'];
    $month = $_POST['remonth'];
    $day = $_POST['reday'];

    $date = $year."-".$month."-".$day;

    $mate = $_POST['name'];
    $base = $_POST['base'];

    $cut = $_POST['cut'];
    $buy = $_POST['buy'];
    $pay = $_POST['pay'];

    $count = count($mate);

    $x = 0;

    while($x <= $count-1){

    $insert_query = "INSERT INTO `mateinsert`(`date`, `mate`, `before`, `after`, `count`, `price`) VALUES ('$date','$mate[$x]','$base[$x]','$cut[$x]','$buy[$x]','$pay[$x]')";
    mysqli_query($mysqli, $insert_query);

        $x++;

    }

    print_r($mate);
    print_r($base);


?>