<script type="text/javascript" src="/wp-content/themes/storefront-child/jquery/jquery-3.4.1.min.js"></script>
<?php 

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

    $today = date("Y-m-d");
    $last_week_day = date("Y-m-d", strtotime("+7 days", strtotime($today)));

    $day_query = "SELECT * FROM userbase WHERE nextpayment = '$last_week_day' AND news = '1'";
    $day_result = mysqli_query($mysqli, $day_query);
    while($day_row = mysqli_fetch_array($day_result)){
        $select_users[] = $day_row[phone];
    }

    $select_count = count($select_users);

    print_r($select_users);
    echo $today;
    echo $last_week_day;


?>

    <script>
        $(document).ready(function(){
            var select_array = <?php echo json_encode($select_users) ?>;
            var select_count = <?php echo $select_count ?>;
            var last_week_day = <?php echo $last_week_day ?>;

            

            var json_users = JSON.stringify(select_array);
            console.log(json_users);
                $.ajax({
                    type:'POST',
                    url:'3week_kakao_send_active.php',
                    data:{
                        count: select_count,
                        ars: json_users,
                        days: last_week_day
                    },
                    success:function(data){
                        console.log(data);
                    }
                });
        });
    </script>