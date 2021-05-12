
<?php

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
$current_user = wp_get_current_user();
$user_id = $current_user->user_login;

$user_query = "SELECT * FROM userbase WHERE userid = '$user_id'";
$user_result = mysqli_query($mysqli, $user_query);
$user_row = mysqli_fetch_array($user_result);

$data_query = "SELECT * FROM onebyoneask WHERE userid = '$user_id' ORDER BY no DESC";
$data_result = mysqli_query($mysqli, $data_query);
$data_row = mysqli_fetch_array($data_result);

$status_com_count_query = "SELECT * FROM onebyoneask WHERE userid = '$user_id' AND status = '답변완료'";
$status_com_result = mysqli_query($mysqli, $status_com_count_query);
while ($status_com_row = mysqli_fetch_array($status_com_result)){
    $com_counter[] = $status_com_row[status];
}

$status_on_count_query = "SELECT * FROM onebyoneask WHERE userid = '$user_id' AND status = '대기중'";
$status_on_result = mysqli_query($mysqli, $status_on_count_query);
while ($status_on_row = mysqli_fetch_array($status_on_result)){
    $on_counter[] = $status_on_row[status];
}

$coms = count($com_counter);
$ons = count($on_counter);

$totals = $coms + $ons;

?>

<!-- 탭 -->
<div class="">
    <p>상담하기</p>
    <p>상담내역</p>
</div>
<!--상담하기-->
<div class="">
    <!-- 이용안내 -->
    <div class="">

    </div>
    <div class="">
        <!--액션에 active, 완료페이지 파일 링크-->
        <form method="POST" action="">

            <select name="category">
                <option value="" disabled selected>선택하세요.</option>
                <option value="배송지연/불만">배송지연/불만</option>
                <option value="반품/교환/환불">반품/교환/환불</option>
                <option value="주문취소">주문취소</option>
                <option value="결제">결제</option>
                <option value="상품정보">상품정보</option>
                <option value="기타">기타</option>
            </select>
            <input type="hidden" name="userid" value="<?php echo $user_id ?>">
            <input type="text" name="name" placeholder="이름을 입력하여 주세요." value="<?php echo $user_row[username] ?>">

            <input type="text" name="phone" placeholder="전화번호(숫자만 입력)를 입력해주세요." value="<?php echo $user_row[phone] ?>">

            <input type="text" name="email" placeholder="메일주소를 입력해주세요.">

            <input type="text" name="title" placeholder="제목을 입력해주세요">

            <textarea name="contenbox">
            </textarea>

            <!-- 잠깐보류-->
            <input type="file" name="image1">
            <input type="file" name="image2">
            <input type="file" name="image3">
            <p>jpg, gif, png, jpeg 이미지 파일을 올릴 수 있습니다. 장당 최대 1MB까지 업로드 가능합니다.</p>

            <input type="submit" value="등록하기">

        </form>
    </div>
</div>

<!--상담내역-->
<div class="">
    <!-- 이용안내 -->
    <div class="">
        
    </div>
    <div class="">
        <div>
        <p>대기 <?php echo $ons ?>건</p>
        <p>답변완료 <?php echo $coms ?>건</p>
        </div>
    </div>

    <div id="askedbox">
        <input type="hidden" id="next" value="2">
        <input type="hidden" id="prev" value="">
        <input type="hidden" id="now" value="">
        <input type="hidden" id="max" value="">
    </div>

    <div class="" style="display:flex;">
        <p id="prevs"> < </p>
        <p id="nows">1</p>
        <p>/</p>
        <p id="maxs"><?php echo $totals ?></p>
        <p id="nexts"> > </p>
    </div>

</div>

<script>
    $(document).ready(function() {
        var url = "/wp-content/themes/storefront-child/csv_down/test/onebyone_get.php";
        $.get(url, {
            page: 1,
            userid: <?php echo $user_id ?>
        }, function(args) {
            $("#askedbox").html(args);
        });
    });

    $("#nexts").click(function() {
        var no = $("#next").val();
        var max = $("#max").val();
        var now = $("#now").val();

        if (now == max) {

        } else {
            var url = "/wp-content/themes/storefront-child/csv_down/test/onebyone_get.php";
            //$("#review_cont").html("/로딩되는이미지?");
            $.get(url, {
                page: no,
                userid: <?php echo $user_id ?>
            }, function(args) {
                $("#askedbox").html(args);
            });

        }
        $("#nows").html(no);
        $("#maxs").html(max);
    });

    $("#prevs").click(function() {
        var no = $("#prev").val();
        var now = $("#now").val();
        var max = $("#max").val();

        if (now == '1') {

        } else {
            var url = "/wp-content/themes/storefront-child/csv_down/test/onebyone_get.php";
            //$("#review_cont").html("/로딩되는이미지?");
            $.get(url, {
                page: no,
                userid: <?php echo $user_id ?>
            }, function(args) {
                $("#askedbox").html(args);
            });
        }

        $("#nows").html(no);
        $("#maxs").html(max);
    });
</script>