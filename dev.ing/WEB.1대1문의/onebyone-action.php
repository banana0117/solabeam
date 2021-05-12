
<?php 

    $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
    $current_user = wp_get_current_user();
    $user_id = $current_user->user_login;


    $today = date("Y-m-d");
    $category = $_POST['category'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $content = $_POST['contentbox'];
    $userid = $_POST['userid'];

    $query = "INSERT INTO `onebyoneask`(`date`, `userid`, `category`, `title`, `indexs`,`status`) VALUES ('$today','$userid','$category','$title','$content','대기중')";
    mysqli_query($mysqli, $query);

    
?>

<div class="baby-page02 fade">
    <div class="edit">
        <div class="deit-title">
            <div class="deit-title-img">
                <img src="/wp-content/themes/storefront-child/con3/image/survey-img.png" alt="도담밀">
            </div>
            <h3>문의가<br>접수되었습니다.</h3>
            <!--a태그에 문의하기 링크 넣기-->
            <span><span class="edit-count"><a href="">여기</span>를 누르면 이전페이지로 이동합니다.</span>
        </div>
        <div class="dodammeal-contents">
            <p>도다밀의 다양한 컨텐츠를<br> 확인해보세요!</p>
            <div class="dodammeal-contents-img">
                <div class="img-inner">
                    <a href="https://www.instagram.com/dodammeal_official/">
                        <img src="/wp-content/themes/storefront-child/con3/image/instar.png" alt="인스타">
                        <p>도담밀 공식<br> 인스타그램</p>
                    </a>
                </div>
                <div class="img-inner">
                    <a href="https://blog.naver.com/PostList.nhn?blogId=olivejna&parentCategoryNoe">
                        <img src="/wp-content/themes/storefront-child/con3/image/blog.png" alt="블로그">
                        <p>도담밀 공식<br> 블로그</p>
                    </a>
                </div>
                <div class="img-inner">
                    <a href="">
                        <img src="/wp-content/themes/storefront-child/con3/image/baby.png" alt="도담클래스">
                        <p>도담밀<br> 이유식 클래스</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>