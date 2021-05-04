
<?php


$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$today = date("Y-m-d");
$send_days = date("Y-m-d", strtotime("-3 days", strtotime($today)));
$send_dayss = date("Y-m-d", strtotime("-6 days", strtotime($today)));

$del_array = ["-1","-2","-3","-4","-5","-6","-7"];

$add_day = "(SELECT * FROM shicktest WHERE ifnull($send_days,0) > ' ') UNION (SELECT * FROM shicktest WHERE ifnull($send_days,0) > ' ') UNION (SELECT * FROM snacktable WHERE ifnull($send_days,0) > ' ') UNION (SELECT * FROM snacktable WHERE ifnull($send_dayss,0) > ' ') ORDER BY name ASC";
$day_result = mysqli_query($mysqli, $add_day);
while($day_row = mysqli_fetch_array($day_result)){
    $users[] = str_replace($del_array,"",$day_row[userid]);
}

$data_count = count($users);
$x = 0;

while($x <= $data_count){

$add_phone = "SELECT * FROM userbase WHERE userid = '$user[$x]'";
$add_result = mysqli_query($mysqli, $add_phone);
$add_row = mysqli_fetch_array($add_result);

$userz[] = $add_row[phone];

}

?>

<script>
    $(document).ready(function() {
        var select_array = <?php echo json_encode($userz) ?>;
        var select_count = <?php echo $select_count ?>;

        var json_users = JSON.stringify(select_array);
        console.log(json_users);
        $.ajax({
            type: 'POST',
            url: '/wp-content/themes/storefront-child/api/menu_research.php',
            data: {
                count: select_count,
                ars: json_users
            },
            success: function(data) {
                console.log(data);
            }
        });
    });
</script>