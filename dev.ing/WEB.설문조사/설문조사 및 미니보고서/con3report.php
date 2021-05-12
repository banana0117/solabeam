<?php

/**
 * Template Name: con3report
 */

get_header(); ?>

<?php

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$today = date("Y-m-d"); // 오늘날짜 colum : date

$user_id = $_POST['user-name']; // 고객아이디 colum : userid
$user_phone = $_POST['user-phone']; // 고객폰 colum : userphone
$user_age = $_POST['ages']; // 엄마나이 colum : userage
$baby_name = $_POST['baby-name']; // 아기이름 colum : babyname
$baby_birth = $_POST['date']; // 아이생일 colum : birthday

// 생후개월계산
$baby_after_q = strtotime($today) - strtotime($baby_birth);
$baby_after_y = floor($baby_after_q / 31536000);
$baby_after_w = floor($baby_after_q / 86400);
$baby_after_day = ($baby_after_w - (365 * $baby_after_y)) + 1;
$baby_after = $baby_after_day / 30;
$baby_after = round($baby_after);

$baby_rank = $_POST['rangking']; // 아기첫째둘째 colum : rank
$baby_gender = $_POST['gender']; // 아이성별 colum : gender
$baby_cm = $_POST['cm']; // 키 colum : height
$baby_kg = $_POST['kg']; // 무게 colum : weight
$start_time = $_POST['time']; // 시작시기 colum : startperiod
$step1_1 = $_POST['ing']; // 진행유무 colum : ing
$step1_2 = $_POST['start-dodam']; // 4주전후 colum : start
$step1_3 = $_POST['eat']; // 고기이유식유무 colum : eat
$step1_4 = $_POST['mix']; // 재료혼합유무 colum : mix
$step1_5 = $_POST['foods']; // 하루이유식섭취횟수 colum : foods
$step1_6 = $_POST['one-time']; // 한번섭취량 colum : onetime
$step1_7 = $_POST['big-fd']; // 입자감진행 colum : bigfd
$step2_1_1 = $_POST['average']; // 수유방법 colum : average
$step2_1_2 = $_POST['averages']; // 수유량 colum : averages
$step2_2 = $_POST['cooking']; // 이유식어케만듬 colum : cooking
$step2_2_i = implode("/", $step_2_2); // 배열분리
$step2_2_1 = $_POST['one-eat']; // 한번에먹는 이유식 섭취량 colum : oneeat
$step2_2_2 = $_POST['cook-eat']; // 먹어본재료 모두선택 colum : cookeat
$step2_2_2_i = implode("/", $step2_2_2); // 배열분리
$step2_3 = $_POST['impo']; // 가장중요하게 생각하는 부분 colum : impo
$step3_1 = $_POST['family']; // 알러지가족력 colum : family
$step3_2 = $_POST['allergy']; // 알러지반응이나온재료 colum : allergy
$step3_2_i = implode("/", $step3_2); // 배열분리
$step3_2_t = $_POST['DOC_TEXT02']; // 알러지 특이사항 colum : allergyabout*
$step3_3 = $_POST['sick']; // 자주나타난 증상 colum : sick
$step3_3_i = implode("/", $step3_3); // 배열분리
$step3_3_1 = $_POST['sick001']; // 변비특이사항 colum : sick001
$step3_3_1_i = implode("/", $step3_3_1); // 배열분리
$step3_3_2 = $_POST['sick002']; // 설사특이사항 colum : sick002
$step3_3_2_i = implode("/", $step3_3_2); // 배열분리
$step3_3_3_1 = $_POST['sick003']; // 구토체크 
$step3_3_3_2 = $_POST['sick003s']; // 구토횟수하루 colum : sick003
$step3_3_3_3 = $_POST['sick003ss']; // 구토주기 colum : sick003count
$step3_3_4 = $_POST['sick004']; // 발열 colum : sick004
$step3_3_4_i = implode("/", $step3_3_4); // 배열분리  
$step3_4 = $_POST['DOC_TEXT03']; // 그외특이사항병원진단 colum : otherabout

$ystep1_1 = $_POST['recooking']; // 유아기조리방법 colum : recooking
$ystep1_1_i = implode("/", $ystep1_1); // 배열분리
$ystep1_2 = $_POST['one-you']; // 이유식 섭취량 colum : oneyou
$ystep1_3 = $_POST['su-you']; // 유아기 수유량 colum : suyou
$ystep1_4 = $_POST['average-you']; // 유아식섭취량 colum : averageyou
$ystep1_4_1 = $_POST['average-yous']; // 먹을경우용량 colum : averageyous
$ystep1_5 = $_POST['impo-you']; // 중요하게생각하는것 colum : impoyou
$ystep2_1 = $_POST['cook-you']; // 알러지테스트 colum : cookyou
$ystep2_1_i = implode("/", $ystep2_1); // 배열분리
$ystep2_1_t = $_POST['DOC_TEXT04']; // 알러지증상 colum : allergyaboutyou*
$ystep3_3 = $_POST['sick-two']; // 아픈것 colum : sicktwo
$ystep3_3_i = implode("/", $ystep3_3); // 배열분리
$ystep3_3_1 = $_POST['con-sick']; // 변비특이사항 colum : consick
$ystep3_3_1_i = implode("/", $ystep3_3_1); // 배열분리 
$ystep3_3_2 = $_POST['diarsick']; // 설사 colum : diarsick
$ystep3_3_2_i = implode("/", $ystep3_3_2); // 배열분리
$ystep3_3_3_1 = $_POST['goo-sick']; // 구토체크 
$ystep3_3_3_2 = $_POST['goo-sicks']; // 구토횟수 colum : goosick
$ystep3_3_3_3 = $_POST['goo-sickss']; // 구토시기 colum : goosicks
$ystep3_3_4 = $_POST['foot-sick']; // 발열 colum : footsick
$ystep3_3_4_i = implode("/", $ystep3_3_4); // 배열분리
$ystep3_4 = $_POST['DOC_TEXT05']; // 병원진단특이사항 colum : otheraboutyou

$presearch_add_query = "INSERT INTO `presearch`(`date`, `userid`, `username`, `phone`, `babyname`, `birthday`, `monthly`, `rank`, `gender`, `height`, `weight`, `startperiod`, `ing`, `start`, `eat`, `mix`, `foods`,     `onetime`, `bigfd`, `average`, `averages`, `cooking`, `oneeat`, `cookeat`, `impo`, `family`, `allergy`,`allergyabout`, `sick`, `sick001`, `sick002`, `sick003`, `sick003count`, `sick004`,      `otherabout`, `recooking`, `oneyou`, `suyou`, `averageyou`, `averageyous`, `impoyou`, `cookyou`, `allergyaboutyou`, `sicktwo`, `consick`, `diarsick`, `goosick`, `goosicks`, `footsick`, `otheraboutyou`) VALUES    ('$today','$user_id','','$user_phone','$baby_name','$baby_birth','','$baby_rank','$baby_gender','$baby_cm','$baby_kg','$start_time','$step1_1','$step1_2','$step1_3','$step1_4','$step1_5',    '$step1_6','$step1_7','$step2_1_1','$step2_1_2','$step2_2_i','$step2_2_1','$step2_2_2_i','$step2_3','$step3_1','$step3_2_i','$step3_2_t','$step3_3_i','$step3_3_1_i','$step3_3_2_i','$step3_3_3_2','$step3_3_3_3','$step3_3_4_i',    '$step3_4','$ystep1_1_i','$ystep1_2','$ystep1_3','$ystep1_4','$ystep1_4_1','$ystep1_5','$ystep2_1_i','$ystep2_1_t','$ystep3_3_i','$ystep3_3_1_i','$ystep3_3_2_i','$ystep3_3_3_2','$ystep3_3_3_3','$ystep3_3_4_i', '$ystep3_4')";
mysqli_query($mysqli, $presearch_add_query);

$height_graph = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
$weight_graph = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
$heigth_graph[$baby_after] = $baby_cm;
$weigth_graph[$baby_after] = $baby_kg;

?>

<input type="hidden" value="<?php echo $baby_gender ?>" id="babygender">
<!--남아키-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {
        packages: ["corechart"]
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', '우리아이', '저신장', '평균신장', '고신장'],
            [0, <?php echo $height_graph[0] ?>, 47.5, 49.9, 52.3],
            [1, <?php echo $height_graph[1] ?>, 52.2, 54.7, 57.2],
            [2, <?php echo $height_graph[2] ?>, 55.9, 58.4, 61],
            [3, <?php echo $height_graph[3] ?>, 58.8, 61.4, 64],
            [4, <?php echo $height_graph[4] ?>, 61.2, 63.9, 66.6],
            [5, <?php echo $height_graph[5] ?>, 63.2, 65.9, 68.6],
            [6, <?php echo $height_graph[6] ?>, 64.9, 67.6, 70.4],
            [7, <?php echo $height_graph[7] ?>, 66.4, 69.2, 71.9],
            [8, <?php echo $height_graph[8] ?>, 67.8, 70.6, 73.4],
            [9, <?php echo $height_graph[9] ?>, 69.1, 72, 74.8],
            [10, <?php echo $height_graph[10] ?>, 70.4, 73.3, 76.2],
            [11, <?php echo $height_graph[11] ?>, 71.6, 74.5, 77.5],
            [12, <?php echo $height_graph[12] ?>, 72.7, 75.7, 78.8],
            [13, <?php echo $height_graph[13] ?>, 73.8, 76.9, 80],
            [14, <?php echo $height_graph[14] ?>, 74.9, 78, 81.2],
            [15, <?php echo $height_graph[15] ?>, 75.9, 79.1, 82.4],
            [16, <?php echo $height_graph[16] ?>, 76.9, 80.2, 83.5],
            [17, <?php echo $height_graph[17] ?>, 77.9, 81.2, 84.6]
        ]);
        var options = {
            tooltip: {
                isHtml: true
            },
            legend: 'none',
            height: 300,
            width: 380,
            vAxis: {
                viewWindow: {
                    min: 45,
                    max: 85
                }
            },
            chartArea: {
                width: '80%',
                height: '80%'
            },
            series: {
                0: {
                    color: '#000000',
                    lineWidth: 5,
                    pointShape: 'circle',
                    pointSize: 9
                },
                1: {
                    color: '#e8b026',
                    lineWidth: 2,
                    opacity: 0.5
                },
                2: {
                    color: '#177c48',
                    lineWidth: 2,
                    opacity: 0.5
                },
                3: {
                    color: '#ea5514',
                    lineWidth: 2,
                    opacity: 0.5
                }
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('chart_man_h'));
        chart.draw(data, options);
    }
</script>
<!--남아무게-->
<script type="text/javascript">
    google.load("visualization", "1", {
        packages: ["corechart"]
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', '우리아이', '저체중', '평균체중', '과체중'],
            [0, <?php echo $weight_graph[0] ?>, 2.8, 3.3, 4],
            [1, <?php echo $weight_graph[1] ?>, 3.8, 4.5, 5.3],
            [2, <?php echo $weight_graph[2] ?>, 4.7, 5.6, 6.5],
            [3, <?php echo $weight_graph[3] ?>, 5.5, 6.4, 7.4],
            [4, <?php echo $weight_graph[4] ?>, 6, 7, 8.1],
            [5, <?php echo $weight_graph[5] ?>, 6.5, 7.5, 8.6],
            [6, <?php echo $weight_graph[6] ?>, 6.9, 7.9, 9.1],
            [7, <?php echo $weight_graph[7] ?>, 7.2, 8.3, 9.5],
            [8, <?php echo $weight_graph[8] ?>, 7.5, 8.6, 9.9],
            [9, <?php echo $weight_graph[9] ?>, 7.7, 8.9, 10.2],
            [10, <?php echo $weight_graph[10] ?>, 8, 9.2, 10.5],
            [11, <?php echo $weight_graph[11] ?>, 8.2, 9.4, 10.8],
            [12, <?php echo $weight_graph[12] ?>, 8.4, 9.6, 11.1],
            [13, <?php echo $weight_graph[13] ?>, 8.6, 9.9, 11.4],
            [14, <?php echo $weight_graph[14] ?>, 8.8, 10.1, 11.6],
            [15, <?php echo $weight_graph[15] ?>, 9, 10.3, 11.9],
            [16, <?php echo $weight_graph[16] ?>, 9.1, 10.5, 12.1],
            [17, <?php echo $weight_graph[17] ?>, 9.3, 10.7, 12.4]

        ]);
        var options = {
            tooltip: {
                isHtml: true
            },
            legend: 'none',
            height: 300,
            width: 380,
            chartArea: {
                width: '80%',
                height: '80%'
            },
            series: {
                0: {
                    color: '#000000',
                    lineWidth: 5,
                    pointShape: 'circle',
                    pointSize: 9
                },
                1: {
                    color: '#e8b026',
                    lineWidth: 2,
                    opacity: 0.5
                },
                2: {
                    color: '#177c48',
                    lineWidth: 2,
                    opacity: 0.5
                },
                3: {
                    color: '#ea5514',
                    lineWidth: 2,
                    opacity: 0.5
                }
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('chart_man_w'));
        chart.draw(data, options);
    }
</script>
<!--여아키-->
<script type="text/javascript">
    google.load("visualization", "1", {
        packages: ["corechart"]
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', '우리아이(여)', '저신장(여)', '평균신장(여)', '고신장(여)'],
            [0, <?php echo $height_graph[0] ?>, 46.8, 49.1, 51.5],
            [1, <?php echo $height_graph[1] ?>, 51.2, 53.7, 56.2],
            [2, <?php echo $height_graph[2] ?>, 54.5, 57.1, 59.7],
            [3, <?php echo $height_graph[3] ?>, 57.1, 59.8, 62.5],
            [4, <?php echo $height_graph[4] ?>, 59.3, 62.1, 64.9],
            [5, <?php echo $height_graph[5] ?>, 61.2, 64, 66.9],
            [6, <?php echo $height_graph[6] ?>, 62.8, 65.7, 68.6],
            [7, <?php echo $height_graph[7] ?>, 64.3, 67.3, 70.3],
            [8, <?php echo $height_graph[8] ?>, 65.7, 68.7, 71.8],
            [9, <?php echo $height_graph[9] ?>, 67, 70.1, 73.2],
            [10, <?php echo $height_graph[10] ?>, 68.3, 71.5, 74.6],
            [11, <?php echo $height_graph[11] ?>, 69.5, 72.8, 76],
            [12, <?php echo $height_graph[12] ?>, 70.7, 74, 77.3],
            [13, <?php echo $height_graph[13] ?>, 71.8, 75.2, 78.6],
            [14, <?php echo $height_graph[14] ?>, 72.9, 76.4, 79.8],
            [15, <?php echo $height_graph[15] ?>, 74, 77.5, 81],
            [16, <?php echo $height_graph[16] ?>, 75, 78.6, 82.2],
            [17, <?php echo $height_graph[17] ?>, 76, 79.7, 83.3]

        ]);
        var options = {
            tooltip: {
                isHtml: true
            },
            legend: 'none',
            height: 300,
            width: 380,
            vAxis: {
                viewWindow: {
                    min: 45,
                    max: 85
                }
            },
            chartArea: {
                width: '80%',
                height: '80%'
            },
            series: {
                0: {
                    color: '#000000',
                    lineWidth: 5,
                    pointShape: 'circle',
                    pointSize: 9
                },
                1: {
                    color: '#e8b026',
                    lineWidth: 2,
                    opacity: 0.5
                },
                2: {
                    color: '#177c48',
                    lineWidth: 2,
                    opacity: 0.5
                },
                3: {
                    color: '#ea5514',
                    lineWidth: 2,
                    opacity: 0.5
                }
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('chart_girl_h'));
        chart.draw(data, options);
    }
</script>
<!--여아무게-->
<script type="text/javascript">
    google.load("visualization", "1", {
        packages: ["corechart"]
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', '우리아이(여)', '저체중(여)', '평균체중(여)', '과체중(여)'],
            [0, <?php echo $weight_graph[0] ?>, 2.7, 3.2, 3.9],
            [1, <?php echo $weight_graph[1] ?>, 3.5, 4.2, 5],
            [2, <?php echo $weight_graph[2] ?>, 4.3, 5.1, 6],
            [3, <?php echo $weight_graph[3] ?>, 5, 5.8, 6.9],
            [4, <?php echo $weight_graph[4] ?>, 5.5, 6.4, 7.5],
            [5, <?php echo $weight_graph[5] ?>, 5.9, 6.9, 8.1],
            [6, <?php echo $weight_graph[6] ?>, 6.2, 7.3, 8.5],
            [7, <?php echo $weight_graph[7] ?>, 6.5, 7.6, 8.9],
            [8, <?php echo $weight_graph[8] ?>, 6.8, 7.9, 9.3],
            [9, <?php echo $weight_graph[9] ?>, 7, 8.2, 9.6],
            [10, <?php echo $weight_graph[10] ?>, 7.3, 8.5, 9.9],
            [11, <?php echo $weight_graph[11] ?>, 7.5, 8.7, 10.2],
            [12, <?php echo $weight_graph[12] ?>, 7.7, 8.9, 10.5],
            [13, <?php echo $weight_graph[13] ?>, 7.9, 9.2, 10.8],
            [14, <?php echo $weight_graph[14] ?>, 8, 9.4, 11],
            [15, <?php echo $weight_graph[15] ?>, 8.2, 9.6, 11.3],
            [16, <?php echo $weight_graph[16] ?>, 8.4, 9.8, 11.5],
            [17, <?php echo $weight_graph[17] ?>, 8.6, 10, 11.8]

        ]);
        var options = {
            tooltip: {
                isHtml: true
            },
            legend: 'none',
            height: 300,
            width: 380,
            chartArea: {
                width: '80%',
                height: '80%'
            },
            series: {
                0: {
                    color: '#000000',
                    lineWidth: 5,
                    pointShape: 'circle',
                    pointSize: 9
                },
                1: {
                    color: '#e8b026',
                    lineWidth: 2,
                    opacity: 0.5
                },
                2: {
                    color: '#177c48',
                    lineWidth: 2,
                    opacity: 0.5
                },
                3: {
                    color: '#ea5514',
                    lineWidth: 2,
                    opacity: 0.5
                }
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('chart_girl_w'));
        chart.draw(data, options);
    }
</script>


<div class="section sec-sur">
    <div class="survey1-sub fade">
        <div class="survey-sub-contents ps20 bg-f2">
            <div class="survey-tab">
                <div class="guide-tab">
                    <ul class="guide-tab-menu flex ps20">
                        <li class="guide-on">미니 보고서</li>
                        <li>도담 보고서 샘플</li>
                    </ul>
                </div>
                <div class="result">
                    <p><?php do_shortcode('[wpmem_field first_name]') ?>님의<br>추천식단 설문 결과표</p>
                </div>
            </div>
            <div class="report-text ps20">
                <div class="report-title">
                    <div class="report-flex">
                        <div class="report-title-ball"></div>
                        <p><?php echo $baby_name ?></p>
                        <?php
                        if ($baby_gender == "girl") {
                            // 여자애버전 추가해주세요
                            echo '
                                <div class="report-title-man">
                                    <img src="/wp-content/themes/storefront-child/con3/image/man.png" alt="남자">
                                </div>                                
                                ';
                        } else {
                            echo '
                                <div class="report-title-man">
                                    <img src="/wp-content/themes/storefront-child/con3/image/man.png" alt="남자">
                                </div>
                                ';
                        }
                        ?>
                    </div>
                    <div class="report-title-text">
                        <ul>
                            <li><?php echo $baby_birth ?> 출생</li>
                            <li><?php echo $baby_after ?> 개월</li>
                            <li>신장: <?php echo $baby_cm ?> cm</li>
                            <li>체중: <?php echo $baby_kg ?> kg</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="report-check">
                <div class="box">
                    <div class="check-title">
                        <h5 class="box-title">성장척도 확인하기</h5>
                        <a class="report-pup" href="#none">성장도표 보는법?</a>
                        <div class="popup-page_a">
                            <div class="dark-box">
                                <div class="popup-sub">
                                    <div class="container">
                                        <div class="pop-list_a">
                                            <h5>성장도표보는법</h5>
                                            <img src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="Arrow1">
                                            <div class="pop-text-a">
                                                <p class="pop-be">우리아이의 키와 체중을 검은점으로 표시했어요.</p>
                                                <p class="pop-be">빨강, 초록, 노란선과 아이의 신장, 체중을 비교해주세요.</p>
                                                <p><span class="green-ss">초록색 선</span> 에 가까우면 우리아이가 평균치에 맞게 잘 크고 있는 것이에요.<span class="red-ss">빨간색 선</span>보다 위에있다면 성장이 빠르고, <span class="yellow-ss">노란색 선</span>보다 아래에 있으면 성장이 느린 것이에요.</p>
                                                <p>오랫동안 평균치에서 벗어난다면 전문가와 상담해보시는 것이 좋아요.</p>
                                                <div class="check-text">
                                                    <p>* 부모님에게 식품 알레르기가 있다면 생후 5개월 이후에 이유식을 시작하는 것이 좋아요.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-contents">
                        <div class="list">
                            <div class="col list-item">
                                <div class="list-item__img">
                                    <div id="chart_man_h"></div>
                                    <div id="chart_girl_h"></div>
                                </div>
                                <p class="report-check-p">현재 신장 : <?php echo $baby_cm ?>cm</p>
                            </div>
                            <div class="col list-item">
                                <div class="list-item__img">
                                    <div id="chart_man_w"></div>
                                    <div id="chart_girl_w"></div>
                                </div>
                                <p class="report-check-p">현재 체중 : <?php echo $baby_kg ?>kg</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php

    if($baby_gender == "girl"){
        $baby_gender_kor = "여아";
    } else {
        $baby_gender_kor = "남아";
    }

    $dopyo_query = "SELECT * FROM dopyo WHERE gender = '$baby_gender_kor' AND monthly = '$baby_after' AND category = 'height'";
    $dopyo_result = mysqli_query($mysqli, $dopyo_query);
    $dopyo_row = mysqli_fetch_array($dopyo_result);

    $height_p = $dopyo_row[50th];

    $dopyo_query = "SELECT * FROM dopyo WHERE gender = '$baby_gender_kor' AND monthly = '$baby_after' AND category = 'weight'";
    $dopyo_result = mysqli_query($mysqli, $dopyo_query);
    $dopyo_row = mysqli_fetch_array($dopyo_result);

    $weight_p = $dopyo_row[50th];

    $per_height = ($baby_cm / $height_p) * 100;
    $per_weight = ($baby_kg / $weight_p) * 100;

?>

            <div class="box">
                <div class="grow-bar">
                    <!-- 이걸 어떻게 처리할건가-->
                    <div class="grow-dot"></div>
                </div>
                <div class="grow-text">
                    <p>저성장</p>
                    <p>평균</p>
                    <p>과성장</p>
                </div>
            </div>
            <div class="box">
                <div class="box-contents">
                    <div class="list">
                        <div class="col list-item">
                            <div class="growing">
                                <p><span class="pink"><?php echo round($per_height) ?>% </span> / <?php echo $baby_after ?>개월 <?php echo $baby_gender_kor ?> 중</p>
                            </div>
                            <div class="grow-txt">
                                <p>신장 성장상태</p>
                            </div>
                        </div>
                        <div class="col list-item">
                            <div class="growing">
                                <p><span class="pink"><?php echo round($per_weight) ?>% </span> / <?php echo $baby_after ?>개월 <?php echo $baby_gender_kor ?> 중</p>
                            </div>
                            <div class="grow-txt">
                                <p>체중 성장상태</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--
            <div class="dodma-grow">
                <p>김도담이는 잘 자라나고 있어요.</p>
                <p>6개월 남아의 경우 몸무게 5~6kg, 신장 65~68cm 의 성장상태를 보이고 있습니다. 도담이는 표준성장 범위 안에서 잘 자라나고 있어요. 다만 이유식 거부와 섭취량이 저조합니다. 바른 성장을 위한 부모님의 관심이 필요합니다.</p>
            </div>
            <div class="check-text-pk">
                <p> &#183; 본 결과는 의사의 처방을 대신하지 않습니다.</p>
            </div>
            -->
        </div>

        <?php
            $alink = "/detail";
            if($step1_1 == "없어요" && $baby_after < 6){
                //준비기
                $alink .= "jun";
                $period = "준비기";
            } elseif($step1_1 == "없어요" && $baby_after >= 6){
                //초기
                $alink .= "cho";
                $period = "초기";
            } elseif( $step1_3 == "안먹었다" && $baby_after < 6 ){
                //준비기
                $alink .= "jun";
                $period = "준비기";
            }elseif( $step1_3 == "안먹었다" && $baby_after >= 6 ){
                //초기
                $alink .= "cho";
                $period = "초기";
            } elseif($baby_after >= 15) {
                // 무조건 유아식
                $alink .= "yoo";
                $period = "유아기";
            } elseif($baby_after >= 13 ){
                // 유아식준비기
                $alink .= "wan";
                $period = "유아식준비기";
            } elseif($baby_after >= 13 ){
                // 유아식준비기
                $alink .= "wan";
                $period = "유아식준비기";
            } elseif($baby_after >= 10){
                // 후기
                $alink .= "hu";
                $period = "후기";
            } elseif($baby_after >= 8 && $step1_7 == "4주이상"){
                //중기
                $alink .= "jung";
                $period = "중기";
            } elseif($baby_after >= 8 && $step1_6 >= 120){
                // 후기
                $alink .= "hu";
                $period = "후기";
            } elseif($baby_after >= 8 && $step1_6 < 119){
                //중기
                $alink .= "jung";
                $period = "중기";
            } elseif($baby_after > 8 && $baby_after < 6 && $step1_5 == "한번"){
                // 중기
                $alink .= "jung";
                $period = "중기";
            } elseif($baby_after >= 6 && $step1_6 < 70){
                // 초기
                $alink .= "cho";
                $period = "초기";
            } elseif( $baby_after > 7 && $step1_7 == "아직" || $step1_7 == "시도" ){
                //중기
                $alink .= "jung";
                $period = "중기";
            } elseif( $baby_after < 7 && $step1_7 == "아직" || $step1_7 == "시도" ){
                //초기
                $alink .= "cho";
                $period = "초기";
            } elseif($step1_1 == "없어요"){
                //준비기
                $alink .= "jun";
                $period = "준비기";
            } elseif($baby_after < 6 || $step1_1 == "no" ) {      
                // 준비기
                $alink .= "jun";
                $period = "준비기";
            } elseif($baby_after > 6){
                //초기
                $alink .= "cho";
                $period = "초기";
            } elseif($baby_after >= 15){
                //유아기
                $alink .= "yoo";
                $period = "유아기";
            } elseif($baby_after >= 13){
                //완료기
                $alink .= "wan";
                $period = "완료기";
            } elseif($baby_after >= 9){
                //후기
                $alink .= "hu";
                $period = "후기";
            } elseif($baby_after >= 8 && $baby_after <= 6){
                //중기
                $alink .= "jung";
                $period = "중기";
            } elseif($baby_after <= 6){
                //준비기
                $alink .= "jun";
                $period = "준비기";
            }

            if($step2_3 == "한우" || $ystep1_5 == "한우" || round($per_height) <= 95 || round($per_weight) <= 90 || strpos($ystep3_4,"빈혈") !== false || strpos($step3_4,"빈혈") !== false){
                //단백질식단추천하세요
                $alink .= "-c";
                $table = "단백질";
            } elseif($step2_3 == "알레르기"){
                //안전식단
                $alink .= "-b";
                $table = "안전";
            } elseif($step2_3 == "재료" || $ystep1_5 == "재료"){
                // 다양다양
                $alink .= "-d";
                $table = "다양다양";
            } elseif($step2_3 == "마음대로" || $ystep1_5 == "마음대로"){
                // 내맘대로
                $alink .= "-e";
                $table = "내맘대로";
            } else {
                //균형식단
                $alink .= "-a";
                $table = "균형";
            }

            if($step2_3 == "한우" || $ystep1_5 == "한우" || strpos($ystep3_4,"빈혈") !== false || strpos($step3_4,"빈혈") !== false ){
                $cate_no = 2;
            } else {
                $cate_no = 1;
            }

            $table_notice_query = "SELECT * FROM tablenotice WHERE tables = '$table' AND after = '$cate_no'";
            $table_notice_result = mysqli_query($mysqli, $table_notice_query);
            $table_notice_row = mysqli_fetch_array($table_notice_result);

            $table_notice = $table_notice_row[notice];

        ?>

        <div class="box">
            <div class="box size">
                <div class="lft">
                    <div class="lft-img">
                        <img src="/wp-content/themes/storefront-child/con3/image/rice.png" alt="밥">
                        <p><?php echo $baby_name ?>이에게 권장하는<br>도담밀 이유식은 <br> <span class="green-s"> “<?php echo $period ?> <?php echo $table ?> 식단”</span> 입니다.</p>
                    </div>
                    <p class="pt20"><?php echo $table_notice ?></p>
                </div>
            </div>
            <?php

                $opt_1 = "C";
                $opt_2 = "R";

                if(strpos($step3_4,"거부") != false || strpos($step3_4,"편식") != false || strpos($ystep3_4, "거부") != false || strpos($ystep3_4, "편식") != false){
                    $opt_2 = "R";
                }

                if(empty($step3_3) == true || empty($ystep3_3) == true ){
                    $opt_1 = "C";
                }

                $option_1 = "육수팩 추가";
                $option_1_t = "이유식 섭취량이 적거나, 잘 먹지않는 우리 아이는 이유식을 더욱 잘 먹을 수 있도록 합성첨가물 없이 건강하게 만든 도담밀 육수팩으로 이유식에 풍미를 더해보세요.";
                $option_2 = "도담케어+";
                $option_2_t = "설사, 변비, 감기 등 우리 아기의 상태나 성장 정도에 맞춰서 식단 변경이 가능한 도담케어 옵션으로 더욱 튼튼하게 이유식을 시작해 보세요.";

            ?>
            <!--새로 추가된부분-->
            <div class="">
                <div class="">
                    <div class="">
                        <p>추천드리는 추가옵션</p>
                    </div>
                    <div class="">
                        <div class="">
                            <p><?php echo $option_1 ?></p>
                        </div>
                        <div class="">
                            <p><?php echo $option_1_t ?></p>
                        </div>
                    </div>
                    <div class="">
                        <div class="">
                            <p><?php echo $option_2 ?></p>
                        </div>
                        <div class="">
                            <p><?php echo $option_2_t ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="recommene ps20">
                <h5 class="box-title">영양소 제공량</h5>
                <div class="recommend-img">
                    <ul class="re-bar">
                        <li class="sbar h35"></li>
                        <li class="longbar h146"></li>
                        <li class="sbar h35"></li>
                        <li class="longbar h170"></li>
                        <li class="sbar h35"></li>
                        <li class="longbar h170"></li>
                        <li class="sbar h35"></li>
                        <li class="longbar h96"></li>
                        <div class="recommend-bar"></div>
                    </ul>
                    <div class="recommend-color">
                        <ul class="re-color">
                            <li></li>
                            <li>목표량</li>
                            <li></li>
                            <li>제공량</li>
                        </ul>
                    </div>
                </div>
                <div class="recommend-text">
                    <p>도담밀 <span class="green-s">“<?php echo $period ?> <?php echo $table ?> 식단”</span> 을 이용할 경우<br>권장 섭취량의 약 <span class="green-s">120%</span> 이상의 영양소가 제공됩니다.</p>
                </div>
                <div class="btn bg-ff btn-md">
                    <p class="go-staring atagsub" data-href="<?php echo $alink ?>">추천받은 식단으로 시작하기 ></p>
                </div>
            </div>
        </div>
        <div class="box bg-f2">
            <div class="text-box tb">
                <div class="box-title">도담이의 식사 계획</div>
            </div>
            <?php 

                $meal_schedule_query = "SELECT * FROM reportschedule WHERE period = '$period'";
                $meal_schedule_result = mysqli_query($mysqli, $meal_schedule_query);
                $meal_schedult_row = mysqli_fetch_array($meal_schedule_result);

                $yamount = $meal_schedule_row[yamount];
                $ycount = $meal_schedule_row[ycount];
                $ytime = $meal_schedule_row[ytime];
                $eamount = $meal_schedule_row[eamount];
                $ecount = $meal_schedule_row[ecount];
                $etime = $meal_schedule_row[etime];
                $etime2 = $meal_schedule_row[etime2];
                $texter = $meal_schedule_row[texter];
                $snack = $meal_schedule_row[snack];
                $formimg = $meal_schedule_row[formimg];
                

            ?>
            <div class="three-text ps20">
                <div class="three-head">
                    <p>수유 스케줄</p>
                    <div class="three-text">
                        <ul>
                            <li>
                                <div class="three-text-inner">
                                    <?php echo $yamount ?>ml
                                </div>
                                <p>하루 섭취량</p>
                            </li>
                            <li>
                                <div class="three-text-inner">
                                    <?php echo $ycount ?>회
                                </div>
                                <p>하루 수유 횟수</p>
                            </li>
                            <li>
                                <div class="three-text-inner">
                                    <?php echo $ytime ?>시간
                                </div>
                                <p>수유 간격</p>
                            </li>
                        </ul>
                        <p>이유식 스케줄</p>
                        <ul>
                            <li>
                                <div class="three-text-inner">
                                    <?php echo $eamount ?>g
                                </div>
                                <p>1회 섭취량</p>
                            </li>
                            <li>
                                <div class="three-text-inner">
                                    <?php echo $ecount ?>회
                                </div>
                                <p>하루 섭취 횟수</p>
                            </li>
                            <li>
                                <div class="three-text-inner">
                                    <?php echo $etime ?><br><?php echo $etime2 ?>
                                </div>
                                <p>섭취 시간</p>
                            </li>
                        </ul>
                        <ul class="three">
                            <li>
                                <div class="three-text-inner inner01">
                                    <div class="three-img_01">
                                        <!-- 파일명 gujun, gucho, gujung, guhu, guwan, guyoo 해서 루트에 넣어두시기 바래요 -->
                                        <img src="/wp-content/themes/storefront-child/con3/image/<?php echo $formimg ?>.png" alt="쌀알">
                                    </div>
                                    <p><?php echo $form ?></p>
                                </div>
                                <p>형태</p>
                            </li>
                            <li>
                                <div class="three-text-inner inner02">
                                    <div class="three-img_02">
                                        <img src="/wp-content/themes/storefront-child/con3/image/guma.png" alt="불린쌀">
                                        <img src="/wp-content/themes/storefront-child/con3/image/dotdot.png" alt="점">
                                        <img src="/wp-content/themes/storefront-child/con3/image/icon-si.png" alt="물">
                                    </div>
                                    <p><?php echo $texter ?></p>
                                </div>
                                <p>농도</p>
                            </li>
                            <li>
                                <div class="three-text-inner inner03">
                                    <div class="three-img_03">
                                        <img src="/wp-content/themes/storefront-child/con3/image/icon-br.png" alt="빵">
                                    </div>
                                    <p><?php echo $snack ?>회</p>
                                </div>
                                <p>간식 섭취 횟수</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="check-text-pk ps20">
        <p>&#183; 섭취량과 횟수, 시간은 아이의 섭취정도와 생활패턴에 따라 달라질 수 있습니다.</p>
    </div>
    <div class="btn-top">
        <div class="top">
            <img src="/wp-content/themes/storefront-child/con3/image/top.png" alt="탑버튼">
        </div>
    </div>
</div>

<script>
    var pop_btn = $(".btn-check")
    var btn_img = $(".popup-sub img");
    var inputa = $(".report-pup")
    var popupa = $(".popup-page_a")
    // input checked 확인 및 내용 제거
    inputa.click(function() {
        popupa.css({
            "position": "absolute",
            "top": "0%"
        });
        popupa.css({
            "opacity": "1"
        });

    });

    // 보고서 팝업
    btn_img.click(function() {
        $(".popup-page_a").css({
            "position": "absolute",
            "top": "115%"
        });
        $(".popup-page_a").css({
            "opacity": "0"
        });
        $(".btn-check").removeClass("on")
    });
</script>
<script>
    $(".btn-top").click(function() {
        $("html,body").animate({
            scrollTop: 0
        });
    })
</script>

<script>
    // 남아 여아 그래프 다르게나오기
    var gender = $("#babygender").val();
    if (gender == "girl") {
        $("#chart_man_h").hide();
        $("#chart_man_w").hide();
    } else {
        $("#chart_girl_h").hide();
        $("#chart_girl_w").hide();
    }
</script>

<!--여기까지-->

<?php
do_action('storefront_sidebar');
get_footer();
