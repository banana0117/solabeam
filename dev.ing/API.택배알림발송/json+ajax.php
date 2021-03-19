<?php

include 'lib_my.php';
include 'lib_arr.php';



$tracking_query = "SELECT code FROM tracking WHERE status NOT LIKE '%배달완료%'";
$tracking_result = mysqli_query($mysqli, $tracking_query);
while ($tracking_row = mysqli_fetch_row($tracking_result)) {
    $tracking_code[] = $tracking_row[0];
}
$tracking_counter = count($tracking_code);
echo json_encode($tracking_counter);

?>

<script>
    $(document).ready(function() {
        var myKey = "zh9uaKvUgxpF3P1nOlUQFQ"; // sweet tracker에서 발급받은 자신의 키 넣는다.
        // 배송정보와 배송추적 tracking-api
        var code_array = <?php echo json_encode($tracking_code) ?>;
        var code_counter = <?php echo $tracking_counter ?>;
        var t_code = "04";
        var invoice = new Array();
        var kinds = [];

        for (i = 0; i <= code_counter; i = i + 1) {

            var t_invoice = code_array[i];
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "http://info.sweettracker.co.kr/api/v1/trackingInfo?t_key=" + myKey + "&t_code=" + t_code + "&t_invoice=" + t_invoice,
                success: function(data) {
                    console.log(data);
                    var myInvoiceData = "";
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
                url: "/wp-content/themes/storefront-child/formtests.php",
                type: "POST",
                data: {
                    count: code_counter,
                    ars: invoiceJson,
                    arx: kindsJson
                },

                success: function(val) {
                    console.log("hi");
                }

            });

        }, 1000);



    });
</script>