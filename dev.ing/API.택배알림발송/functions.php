<?php

add_filter( 'cron_schedules', 'isa_add_every_three_minutes' ); // 크론에 스케줄 추가
function isa_add_every_three_minutes( $schedules ) { // 스케줄생성
    $schedules['every_three_minutes'] = array(
            'interval'  => 180, //초
            'display'   => __( 'Every 3 Minutes', 'textdomain' ) // 표시될문구
    );
    return $schedules;
}

if ( ! wp_next_scheduled( 'isa_add_every_three_minutes' ) ) { // 해당이름으로된 스케줄이 없을경우
    wp_schedule_event( time(), 'every_three_minutes', 'isa_add_every_three_minutes' ); // 해당 구문 실행, 조건은 위의 스케줄생성
}

add_action( 'isa_add_every_three_minutes', 'every_three_minutes_event_func' ); // 해당 훅에서 실행될 함수

function every_three_minutes_event_func() { // 스케줄마다 실행될 함수
    $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
    $testz = date("h:i:s");
    $mysqli_query = "INSERT INTO `userTest`(`userid`) VALUES ('$testz')";
    mysqli_query($mysqli,$mysqli_query);
    mysqli_close($mysqli);
    // do something
}