<?php

/**
 * Template Name: deliaddchange
 */

// 배송지 변경 페이지~ addresult 로 post 시킬 페이지
// 밑에 html 부분 수정하면 됩니다
// action 으로 무조건 배송지변경 완료페이지로 보내야함

get_header(); ?>


<?php $userid = get_user_meta($current_user->ID, 'username', true); ?>

<?php

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
if ($mysqli->connect_errno) die('Connect failed: ' . $mysqli->connect_error);
if (!$mysqli->set_charset('utf8')) die('Error loading character set utf8: ' . $mysqli->error);

$user_data_query = "SELECT * FROM userbase WHERE userid = '$userid'";
$user_data_result = mysqli_query($mysqli, $user_data_query);
$user_data_rows = mysqli_fetch_array($user_data_result);

$user_name = $user_data_rows[username];
$user_phone = $user_data_rows[phone];
$user_address = $user_data_rows[address];
$user_postcode = $user_data_rows[postcode];
$user_message = $user_data_rows[message];

?>

<div class="">
    <div class="">
        <p>배송정보</p>
        <span>변경</span>
    </div>
    <div class="">
        <p><?php echo $user_name ?></p>
        <p><?php echo $user_phone ?></p>
        <p><?php echo $user_postcode ?></p>
        <p><?php echo $user_address ?></p>
        <p><?php echo $user_message ?></p>
    </div>
</div>

<div class="">
    <div class="">
        <p>배송지 변경 기록</p>
    </div>

    <?php

    $change_log_query = "SELECT * FROM addresslog WHERE userid = '$userid' ORDER BY chadate DESC LIMIT 3";
    $change_log_result = mysqli_query($mysqli, $change_log_query);
    while ($change_log_row = mysqli_fetch_array($change_log_result)) {
        echo '
            <div>
                <div class="">
                    <p>변경일자 | </p>
                    <p>' . $change_log_row[chadate] . '</p>
                </div>
                <div class="">
                    <p>' . $change_log_row[username] . '</p>
                    <p>' . $change_log_row[charphone] . '</p>
                    <p>' . $change_log_row[chaaddress] . '</p>
                    <p>' . $change_log_row[chamessage] . '</p>
                </div>
            </div>';
    }

    ?>

</div>

<!--버튼누르면 팝업-->
<div class="">
    <form method="POST" name="addresschange" action="/addresult">
        <div class="">
            <p>배송지 변경</p>
        </div>


        <div class="">
            <div class="">
                <p>수령자</p>
            </div>
            <div class="">
                <input class="info_form_label_cont_inner" type="text" name="addname" placeholder="이름">
            </div>
        </div>

        <div class="">
            <div class="">
                <p>연락처</p>
            </div>
            <div class="">
                <input class="info_form_label_cont_inner" type="text" name="addphone" placeholder="전화번호(숫자만입력)">
            </div>
        </div>

        <div class="">
            <div class="">
                <p>배송지</p>
            </div>
            <div class="">
                <input class="info_form_label_cont_inner" id="addpostcode" type="text" name="addpostcode" placeholder="우편번호">
            </div>
        </div>

        <div class="">
            <input class="info_form_label_cont_inner" type="text" id="addaddress_1" name="addaddress_1" placeholder="도로명주소">
            <input class="info_form_label_cont_inner" type="text" id="addaddress_2" name="addaddress_2" placeholder="상세주소">
        </div>

        <div class="">
            <select name="message" id="messages">
                <option value="안전하게 배송해주세요.">안전하게 배송해주세요.</option>
                <option value="배송 전 연락주세요.">배송 전 연락주세요.</option>
                <option value="아기가 자고있으니 초인종 누르지 말아주세요.">아기가 자고있으니 초인종 누르지 말아주세요.</option>
                <option value="text">직접입력</option>
            </select>
            <input type="text" id="direct" name="direct">
        </div>


        <div>
            <input type="submit" value="배송지 변경하기">
        </div>
    </form>

    <script>
        $("#direct").hide();

        $("#messages").change(function() {
            if ($("#message").val() == "text") {
                $("#direct").show();
            } else {
                $("#direct").hide();
            }
        });
    </script>


    <?php
    do_action('storefront_sidebar');
    get_footer();
