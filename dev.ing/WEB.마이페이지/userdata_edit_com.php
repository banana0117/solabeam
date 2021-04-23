
<?php 

    $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

    $userid = $_POST['userid'];
    $usercode = $_POST['usercode'];

    $userphone = $_POST['userphone'];
    $usermail = $_POST['usermail'];
    $nowpass = $_POST['nowpass'];
    $newpass = $_POST['newpass'];
    $newpass2 = $_POST['newpass2'];
    $babyname = $_POST['babyname'];
    $birthday = $_POST['birthday'];

    $wpusers_up_query = "UPDATE `wp_users` SET `user_email`='$usermail' WHERE ID = '$usercode'";
    mysqli_query($mysqli, $wpusers_up_query);

    if(empty($newpass)){
        $wpusers_pass_up_query = "UPDATE `wp_users` SET `userpass`='$nowpass' WHERE ID = '$usercode'";
    } else {
        $wpusers_pass_up_query = "UPDATE `wp_users` SET `userpass`= MD5('$newpass') WHERE ID = '$usercode'";
    }

    mysqli_query($mysqli, $wpusers_pass_up)

    $other_up_query = "UPDATE `wp_usermeta` SET `meta_value` = '$userphone' WHERE user_id = '$usercode' AND meta_key = 'billing_phone'";
    mysqli_query($mysqli, $other_up_query);
    $other_up_query = "UPDATE `wp_usermeta` SET `meta_value` = '$babyname' WHERE user_id = '$usercode' AND meta_key = 'baby_name'";
    mysqli_query($mysqli, $other_up_query);
    $other_up_query = "UPDATE `wp_usermeta` SET `meta_value` = '$babybirth' WHERE user_id = '$usercode' AND meta_key = 'baby_birth'";
    mysqli_query($mysqli, $other_up_query);
    
// 밑에다가 완료페이지 소스 넣어주시면됩니다~
?>

