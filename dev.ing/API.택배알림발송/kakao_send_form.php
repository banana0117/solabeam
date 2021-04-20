<?php

/*

    Banana ver 0.1.1
    * 처음만든 API 이중 사용

    * 데이터베이스에서 배달완료가아닌 송장데이터를 가져와서 조회 후
    * JSON으로 엔코딩해서 kakao_send_action.php 로 데이터를 POST함
    * 아래쪽 /wp-con.../kakao_send_action.php 의 url을 신경써야함

    * 해당 소스는 주기적으로 들어가는 페이지에 들어가있어야함
    
    * 어드민페이지에 넣을 것

*/

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
$tracking_query = "SELECT code FROM tracking WHERE status NOT LIKE '%배달완료%'";
$tracking_result = mysqli_query($mysqli, $tracking_query);
while ($tracking_row = mysqli_fetch_row($tracking_result)) {
    $tracking_code[] = $tracking_row[0];
}
$tracking_counter = count($tracking_code);
?>
<script>
    $(document).ready(function() {
        var code_array = <?php echo json_encode($tracking_code) ?>;
        var code_counter = <?php echo $tracking_counter ?>;
        var invoice = new Array();
        var kinds = [];
        var myInvoiceData = '';
        for (i = 0; i <= code_counter; i = i + 1) {

            var t_invoice = code_array[i];
            invoice.push(t_invoice);
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'https://apis.tracker.delivery/carriers/kr.cjlogistics/tracks/' + t_invoice,

                success: function(data) {

                    if (data.status == false) {
                        
                    } else {

                        var delistatus = data.state;
                        kinds.push(delistatus.text);

                    }
                }
            });
        }
        setTimeout(function() {
            var invoiceJson = JSON.stringify(invoice);
            var kindsJson = JSON.stringify(kinds);
            $.ajax({
                url: '/wp-content/themes/storefront-child/api/kakao_send_action.php',
                type: 'POST',
                data: {
                    count: code_counter,
                    ars: invoiceJson,
                    arx: kindsJson
                },
                success: function(val) {
                    console.log(invoiceJson);
                    console.log(kindsJson);
                }
            });
        }, 1000);
    });
</script>