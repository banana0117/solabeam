<?php

add_filter('cron_schedules', 'isa_add_every_thrid_minutes'); // 크론에 스케줄 추가
function isa_add_every_thrid_minutes($schedules)
{ // 스케줄생성
    $schedules['every_thrid_minutes'] = array(
        'interval'  => 60, //초
        'display'   => __('Every 30 Minutes', 'textdomain') // 표시될문구
    );
    return $schedules;
}

if (!wp_next_scheduled('isa_add_every_thrid_minutes')) { // 해당이름으로된 스케줄이 없을경우
    wp_schedule_event(time(), 'every_thrid_minutes', 'isa_add_every_thrid_minutes'); // 해당 구문 실행, 조건은 위의 스케줄생성
}

add_action('isa_add_every_thrid_minutes', 'banana_kakao_send_action'); // 해당 훅에서 실행될 함수

function banana_kakao_send_action()
{ // 스케줄마다 실행될 함수
    include 'lib_my.php';
    include 'lib_arr.php';

    $tracking_query = "SELECT code FROM tracking WHERE status NOT LIKE '%배달완료%'";
    $tracking_result = mysqli_query($mysqli, $tracking_query);
    while ($tracking_row = mysqli_fetch_row($tracking_result)) {
        $tracking_code[] = $tracking_row[0];
    }
    $tracking_counter = count($tracking_code);
?>

    <script>
        $(document).ready(function() {
            var myKey = 'zh9uaKvUgxpF3P1nOlUQFQ';
            var code_array = <?php echo json_encode($tracking_code) ?>;
            var code_counter = <?php echo $tracking_counter ?>;
            var t_code = '04';
            var invoice = new Array();
            var kinds = [];

            for (i = 0; i <= code_counter; i = i + 1) {

                var t_invoice = code_array[i];
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'http://info.sweettracker.co.kr/api/v1/trackingInfo?t_key=' + myKey + '&t_code=' + t_code + '&t_invoice=' + t_invoice,
                    success: function(data) {
                        var myInvoiceData = '';
                        if (data.status == false) {
                            myInvoiceData += ('<p>' + data.msg + '<p>');
                        } else {
                            invoice.push(data.invoiceNo);
                        }
                        var trackingDetails = data.trackingDetails;
                        detailcount = Object.keys(trackingDetails).length;
                        detailcounts = detailcount - 1;
                        var details = data.trackingDetails[detailcounts];
                        kinds.push(details.kind);
                    }
                });
            }
            setTimeout(function() {
                var invoiceJson = JSON.stringify(invoice);
                var kindsJson = JSON.stringify(kinds);
                $.ajax({
                    url: '/wp-content/themes/storefront-child/kakao_send_action.php',
                    type: 'POST',
                    data: {
                        count: code_counter,
                        ars: invoiceJson,
                        arx: kindsJson
                    },
                    success: function(val) {
                        console.log('hi');
                    }
                });
            }, 1000);
        });
    </script> <?php
            }


            ////

            add_filter('cron_schedules', 'isa_add_every_thrid_minutes'); // 크론에 스케줄 추가
            function isa_add_every_thrid_minutes($schedules)
            { // 스케줄생성
                $schedules['every_thrid_minutes'] = array(
                    'interval'  => 60, //초
                    'display'   => __('Every 30 Minutes', 'textdomain') // 표시될문구
                );
                return $schedules;
            }

            if (!wp_next_scheduled('isa_add_every_thrid_minutes')) { // 해당이름으로된 스케줄이 없을경우
                wp_schedule_event(time(), 'every_thrid_minutes', 'isa_add_every_thrid_minutes'); // 해당 구문 실행, 조건은 위의 스케줄생성
            }

            add_action('isa_add_every_thrid_minutes', 'banana_kakao_send_action'); // 해당 훅에서 실행될 함수

            function banana_kakao_send_action()
            { // 스케줄마다 실행될 함수
                $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
                $testz = date("h:i:s");
                $mysqli_query = "INSERT INTO `userTest`(`userid`) VALUES ('$testz')";
                mysqli_query($mysqli, $mysqli_query); ?>
    <script>
        $(document).ready(function() {
            $("#query_test").val("10");
        });
    </script>
<?php
            }
