<?php


$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
$userid = $_POST['userid'];
$today = date("Y-m-d");
$data_1_1 = $_POST['cler'];
$data_1_c = implode("/", $data_1_1);

$data_2_1 = $_POST['cler-pop02'];
$data_2_c = implode("/", $data_2_1);

$data_3_1 = $_POST['cler-pop04'];
$data_3_c = implode("/", $data_3_1);

$data_4_1 = $_POST['cler-pop05'];
$data_4_c = implode("/", $data_4_1);

$data_5_1 = $_POST['cler-pop06'];
$data_5_c = implode("/", $data_5_1);

$data_6 = $_POST['DOC_TEXT01'];
$data_7 = $_POST['DOC_TEXT02'];

$query = "INSERT INTO `cancleresearch`(`date`, `userid`, `data1`, `data2`, `data3`, `data4`, `data5`, `data6`, `data7`) VALUES ('$today', '$userid','$data_1_c','$data_2_c','$data_3_c','$data_4_c','$data_5_c', '$data_6', '$data_7')";
mysqli_query($mysqli, $query);

?>

<div class="cler-page03">
    <div class="cler-page ps20">
        <div class="edit">
            <div class="deit-title">
                <div class="deit-title-img">
                    <img src="/wp-content/themes/storefront-child/con3/image/cler-edit-img.png" alt="도담밀">
                </div>
                <h3>도담밀 이용 만족도 조사가<br>완료되었습니다.
                    <p>그동안 도담밀을 이용해 주셔서 감사합니다. </p>
                </h3>
                <span><span class="edit-count">10</span> 초 뒤 마이 페이지로 자동 이동합니다.</span>
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
</div>