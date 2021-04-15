<?php
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
                url: '/wp-content/themes/storefront-child/kakao_send_action.php',
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