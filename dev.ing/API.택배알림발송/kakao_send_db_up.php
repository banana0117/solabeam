<div class="title">
    <h3>데이터베이스 업로드</h3>
</div>


<form method="post" action="/wp-content/themes/storefront-child/post_dbup.php">
    <input type="hidden" name="action" value="form_submit">

    <div class="part_title">
        <h2>STEP 1. 업로드 DB 선택</h2>
    </div>
    <div class="select">
        <select name="table_name">
                <option value="tracking">송장정보</option>
        </select>
    </div>

    <div class="part_title">
        <h2>STEP 2. 업로드 내용 붙여넣기</h2>
    </div>
    <div class="select">
        <textarea name="excel_text" style="width:100%;height:300px;"></textarea>
    </div>
    <div class="one_button">
        <input type="submit" value="전송하기">
    </div>
</form>