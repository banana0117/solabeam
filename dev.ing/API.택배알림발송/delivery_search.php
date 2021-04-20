<?php
/*

*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
배송조회 페이지소스입니다

아래에 html 코드 부분 수정해서 사용하시면 됩니다

클래스명 바꾸시고 이것저것 하신다음 사용하시면 되겠네용

*/

// 회원등급 구독자 이상 조회가능
if( current_user_can( 'subscriber' ) ){
$userid = get_user_meta( $current_user -> ID, 'username', true );
$username = get_user_meta( $current_user -> ID, 'first_name', true );
} else { 
echo "<script>alert('로그인 하지 않았거나, 대상자가 아닙니다.');location.href='/';</script>";
}

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$user_search = "SELECT * FROM userbase WHERE userid = '$userid'";
$user_result = mysqli_query($mysqli, $user_search);
$user_row = mysqli_fetch_array($user_result);

$user_subid = $user_row[subid];
$user_name = $user_row[username];
$user_phone = $user_row[phone];
$user_membership = $user_row[membership];
$user_nowperiod = $user_row[nowperiod];
$user_delidate = $user_row[delidate];
$user_deliday = $user_row[deliday];


$order_query = "SELECT * FROM wp_postmeta WHERE post_id = '$user_subid' AND meta_key = '_order_total'";
$order_result = mysqli_query($mysqli, $order_query);
$order_row = mysqli_fetch_array($order_result);

$order_price = $order_row[meta_value];

$order_price = number_format($order_price);


$post_search = "SELECT * FROM tracking WHERE phone = '$user_phone' ORDER BY date DESC";
$post_result = mysqli_query($mysqli, $post_search);

while ($post_row = mysqli_fetch_array($post_result)) {
    $post_code[] = $post_row[code];
    $post_date[] = $post_row[date];
}

$post_counter = count($post_code);

?>
<!--제이쿼리 없어서 테스트할때 넣었던 것 -->
<!--<script type="text/javascript" src="/wp-content/themes/storefront-child/jquery/jquery-3.4.1.min.js"></script>-->


<div class="">

    <div class="">
        <div class="">
            <p><?php echo $user_name ?>님의 이유식</p>
        </div>
        <div class="">
            <p><?php echo $user_nowperiod ?> / <?php echo $user_membership ?></p>
            <p>최초배송일 <?php echo $user_delidate ?> / 매주 <?php echo $user_deliday ?>요일 발송</p>
        </div>
        <div class="">
            <p><?php echo $order_price ?>원</p>
        </div>
    </div>

    <div id="data"></div>

</div>



<script>
    $(document).ready(function() {
        var code_array = <?php echo json_encode($post_code) ?>;
        var date_array = <?php echo json_encode($post_date) ?>;
        var code_counter = <?php echo $post_counter ?>;
        var invoice = [];
        var kinds = [];
        var myInvoiceData = '';

        for (i = 0; i <= code_counter; i++) {

            t_invoice = code_array[i];
            t_date = date_array[i];

            $.ajax({
                type: 'GET',
                dataType: 'json',
                async: false,
                url: 'https://apis.tracker.delivery/carriers/kr.cjlogistics/tracks/' + t_invoice,
                success: function(data) {
                    if (data.state == false) {

                    } else {
                        console.log(data);
                        var delistatus = data.state;
                        var detail = data.progresses;

                        //맨위블럭
                        myInvoiceData += ('<div class=""><div class=""><p>' + t_date + ' ㅣ 송장번호(' + t_invoice + ')</p></div>');
                        myInvoiceData += ('<div class=""><div class=""><p>' + delistatus.text + '</p><span>자세히보기</span></div>'); // 자세히보기 누르면 아래로 펼쳐지게
                        myInvoiceData += ('<div class="">'); // 펼쳐질 div가 되는건가?

                        if (delistatus.text == "상품인수") {
                            ons1 = "on";
                            ons2 = "on big";
                            ons3 = "";
                            ons4 = "";
                        } else if (delistatus.text == "상품이동중") {
                            ons1 = "on";
                            ons2 = "on";
                            ons3 = "on big";
                            ons4 = "";
                        } else if (delistatus.text == "배송출발") {
                            ons1 = "on";
                            ons2 = "on";
                            ons3 = "on big";
                            ons4 = "";
                        } else if (delistatus.text == "배달완료") {
                            ons1 = "on";
                            ons2 = "on";
                            ons3 = "on";
                            ons4 = "on big";
                        } else {
                            ons1 = "on big";
                            ons2 = "";
                            ons3 = "";
                            ons4 = "";
                        }

                        //그림블럭
                        myInvoiceData += ('<div class="">');
                        myInvoiceData += ('<ol class="post-step-wrap post-step-wrap' + i + '"><li class="post-step post-step1 ' + ons1 + '"><span>상품준비중</span></li><li class="post-step post-step2 ' + ons2 + '"><span>배송접수</span></li><li class="post-step post-step3  ' + ons3 + '"><span>배송중</span></li><li class="post-step post-step4 ' + ons4 + '"><span>배송완료</span></li></ol>');
                        myInvoiceData += ('</div>');

                        //택배사
                        myInvoiceData += ('<div class=""><p>택배사 CJ대한통운</p></div>');

                        //상세내용
                        myInvoiceData += ('<div class="flex">');
                        myInvoiceData += ('<p class="flexible">배송시간</p>');
                        myInvoiceData += ('<p class="flexible">현재위치</p>');
                        myInvoiceData += ('<p class="flexible">배송상태</p>');
                        myInvoiceData += ('</div>');
                        $.each(detail, function(key, value) {
                            myInvoiceData += ('<div class="flex">');
                            var times = value.time;
                            myInvoiceData += ('<p class="flexible">' + times.substr(0, 10) + ' ' + times.substr(11, 5) + '</p>');

                            var location = value.location;
                            myInvoiceData += ('<p class="flexible">' + location.name + '</p>');
                            //myInvoiceData += ('<p class="flexible">' + value.description + '</p>'); //배송상세정보

                            var deep_status = value.status;
                            myInvoiceData += ('<p class="flexible">' + deep_status.text + '</p>');
                            myInvoiceData += ('</div>');
                        });
                        myInvoiceData += ('</div>');

                        myInvoiceData += ('');
                        myInvoiceData += ('</div>');
                        myInvoiceData += ('</div>');

                        $("#data").html(myInvoiceData);

                    }

                }
            });

        }

    });
</script>