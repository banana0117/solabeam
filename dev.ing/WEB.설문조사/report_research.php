
<?php


$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$today = date("Y-m-d");

$add_day = "SELECT * FROM userbase";
$day_result = mysqli_query($mysqli, $add_day);
while($day_row = mysqli_fetch_array($day_result)){
    $days[$i] = $day_row[delidate];
    $dayz_z = $days[$i];
        $dayz = [];
        for($z = 0; $z <= 12; $z=$z+1){
            $dayz_z = date("Y-m-d", strtotime("+25 days", strtotime($dayz_z)));
            array_push($dayz, $dayz_z);
        }

    if(in_array($today, $dayz)){
        $report_array[] = $day_row[phone];
    }

    $i++;
}

$data_count = count($report_array);

?>

<script>
    $(document).ready(function() {
        var select_array = <?php echo json_encode($report_array) ?>;
        var select_count = <?php echo $data_count ?>;

        var json_users = JSON.stringify(select_array);
        console.log(json_users);
        $.ajax({
            type: 'POST',
            url: '/wp-content/themes/storefront-child/api/report_research_send.php',
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