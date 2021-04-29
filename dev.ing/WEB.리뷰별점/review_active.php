
<?php

    $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

    $userid = $_POST['userid'];
    $date = date("Y-m-d");
    $score = $_POST['score'];
    $comment = $_POST['comment'];
    $period = $_POST['period'];
    $membership = $_POST['membership'];


    $review_insert_query = "INSERT INTO `starreview`(`date`, `userid`, `score`, `period`, `membership`, `comment`) VALUES ('$date','$userid','$score','$period','$membership','$comment')";
    mysqli_query($mysqli, $review_insert_query);

?>


<div class="">
<p>리뷰 ㄱㅅㄱㅅ</p>
</div>