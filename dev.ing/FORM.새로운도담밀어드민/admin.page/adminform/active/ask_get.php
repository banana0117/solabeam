<?php 

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$sql = "SELECT * FROM onebyoneask WHERE status = '대기중' ORDER BY date ASC";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_array($result);

echo '<form method="POST" action="/wp-content/themes/storefront-child/adminform/active/ask_active.php">
        <input type="hidden" name="nos" id="nos" value="'.$row[no].'">
        <div class="">

            <div class="flexed">
            <div class="format">
            <p>문의일</p>
            </div>
            <div class="data">
            <p>'.$row[date].'</p>
            </div>
            </div>

            <div class="flexed">
            <div class="format">
            <p>고객아이디</p>
            </div>
            <div class="data">
            <p>'.$row[userid].'</p>
            </div>
            </div>

            <div class="flexed">
            <div class="format">
            <p>분류</p>
            </div>
            <div class="data">
            <p>'.$row[category].'</p>
            </div>
            </div>

            <div class="flexed">
            <div class="format">
            <p>제목</p>
            </div>
            <div class="data">
            <p>'.$row[title].'</p>
            </div>
            </div>

            <div class="flexed">
            <div class="format">
            <p>내용</p>
            </div>
            <div class="data">
            <p>'.$row[indexs].'</p>
            </div>
            </div>

        </div>
        <div class="">
        <p>답변하기</p>
            <textarea name="cont" id="cont" placeholder="여기에 답변쓰세요"></textarea>
        </div>
        <input type="submit" value="답변남기기">
    </form>
';