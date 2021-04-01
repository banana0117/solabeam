<?php

//if( current_user_can( 'subscriber' ) ){
//$userid = get_user_meta( $current_user -> ID, 'username', true );
//$username = get_user_meta( $current_user -> ID, 'first_name', true );
//
//}
//else
//{ 
//echo "<script>alert('로그인 하지 않았거나, 대상자가 아닙니다.');location.href='/';</script>";
//}

    // 다음 식단 일시
    $table_search_query = "SELECT * FROM userbase WHERE userid = '$userid'";
    $table_search_result = mysqli_query($mysqli, $table_search_query);
    $table_search_row = mysqli_fetch_array($table_search_result);
    // 다음 식단 넣을 날짜
    $table_insert_date = $table_search_row[nextdeliday];    
    $table_code = $table_search_row[tablecode];
    $table_period = $table_search_row[nowperiod];

    $next_insert_postday[0] = date("Y-m-d", strtotime($table_insert_date));
    $next_insert_postday[1] = date("Y-m-d", strtotime("+7 days", strtotime($table_insert_date)));
    $next_insert_postday[2] = date("Y-m-d", strtotime("+14 days", strtotime($table_insert_date)));
    $next_insert_postday[3] = date("Y-m-d", strtotime("+21 days", strtotime($table_insert_date)));
    $next_circle = date("Y-m-d", strtotime("+28 days", strtotime($table_insert_date)));

    $next_circle_query = "UPDATE `userbase` SET `nextdeliday` = '$next_circle' WHERE userid = '$userid'";
    mysqli_query($mysqli, $next_circle_query);

    //식단 넣기
    $ns = 0;
    while($ns <= 3){
        for($qs=1; $qs=6; $qs=$qs+1){

            $load_codes = $table_code."-".$qs;
            $load_query = "SELECT * FROM tablelist WHERE codes = '$load_codes'";
            $load_result = mysqli_query($mysqli,$load_query);
            $load_row = mysqli_fetch_array($load_result);
            $load_menu[$qs] = $load_row[$testday[$ns]];
            
            $insert_user = $news_user_id."-".$qs;

            $update_query = "UPDATE `shicktest` SET `$next_payday[$ns]`='$load_menu[$qs]' where userid = '$insert_user'";
            mysqli_query($mysqli, $update_query);

        }

        if(empty($select_weekend)){

        } else {
            $weekend_user = $news_user_id."-7";
            $weekend_query = "SELECT * FROM tablelist WHERE codes = '$weekend_code'";
            $weekend_result = mysqli_query($mysqli,$weekend_query);
            $weekend_row = mysqli_fetch_array($weekend_result);
            $weekend_menu[$qs] = $weekend_row[$testday[$ns]];
            $update_week_query = "UPDATE `shicktest` SET `$next_payday[$ns]`='$load_menu[$qs]' where userid = '$weekend_user'";
            mysqli_query($mysqli, $update_week_query);
        }

        $ns++;

    }