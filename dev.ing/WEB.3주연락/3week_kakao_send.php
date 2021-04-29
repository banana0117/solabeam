<script type="text/javascript" src="/wp-content/themes/storefront-child/jquery/jquery-3.4.1.min.js"></script>
<?php 

/*

    * 3주차에 알림톡을 보내는 시스템의 시작
    * ajax url 부분에 3week_kakao_send_active.php 의 링크를 알맞게 수정해주면 된다
    * 링크의 파일은 notification_kakao 와 같은 위치에 있게 해야한다

    * 아래의 소스는 매일1번은 오픈하게 되는 페이지의 아래에 삽입하면 된다
    * 위 php 태그부터 맨아래 스크립트까지, 제이쿼리의 아래면 어느 위치든 중요하지 않다
    * 카카오 알림톡 발생 특성상 리소스를 어느정도 잡아먹기때문에 조금은 느려질 수 있다

*/

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

    $today = date("Y-m-d");
    $last_week_day = date("Y-m-d", strtotime("+10 days", strtotime($today)));

    $day_query = "SELECT * FROM userbase WHERE nextdeliday = '$last_week_day' AND news = '1'";
    $day_result = mysqli_query($mysqli, $day_query);
    while($day_row = mysqli_fetch_array($day_result)){
        $select_users[] = $day_row[phone];
    }

    $select_count = count($select_users);

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
                    url:'/wp-content/themes/storefront-child/api/3week_kakao_send_active.php',
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