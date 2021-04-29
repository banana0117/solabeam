<?php

$today_date = date("Y-m-d");

?>


<link rel="stylesheet" href="/wp-content/themes/storefront-child/css/form_admin.css?ver=<?php echo date('YmdHis') ?>" />
<script type="text/javascript" src="/wp-content/themes/storefront-child/jquery/jquery-3.4.1.min.js"></script>

<style>
    .mate {
        display: flex;
    }

    .mate p {
        display: block;
        width: 100%;
    }

    .mate input[type=text] {
        margin: 5px;
        width: 100%;
        display: block;
    }
</style>

<?php

include 'lib_my.php';
include 'lib_arr.php';

?>

<div class="adminmenuback"></div>
<div id="adminmenuwrap">
    <ul id="adminmenu">
        <li style="height:200px;">
            <img src="/wp-content/themes/storefront-child/image/otherpage/report/snack/banana.png" style="width:90%; padding:5px;">
        </li>
        <div class="under_shadow side_menu" style="width:200px;">
            <!--셀렉1-->
            <div class="">
                <div class="side_title gray_border under_slide toggle open">
                    <p class="h5">데이터관련</p>
                </div>
            </div>
            <div class="slide_ready" style="display:block;">
                <div class="floor flex bg_f9">
                    <li class="flexible"><a class="p" href="/wp-content/themes/storefront-child/adminform/menu_up.php">메뉴업데이트</a></li>
                    <li class="flexible"><a class="p" href="/wp-content/themes/storefront-child/adminform/form_post_update.php">송장등록</a></li>
                </div>
                <div class="floor flex bg_f9">
                    <li class="flexible"><a class="p" href="/wp-content/themes/storefront-child/adminform/mate_insert.php">구매량출력</a></li>
                    <li class="flexible"><a class="p" href="/wp-content/themes/storefront-child/adminform/mate_confirm.php">재고입력</a></li>
                </div>
                <div class="floor flex bg_f9">
                    <li class="flexible"><a class="p" href="/wp-content/themes/storefront-child/adminform/label_form.php">라벨출력</a></li>
                    <li class="flexible"><a class="p" href="">빈칸</a></li>
                </div>
            </div>
            <!--셀렉2-->
            <div class="">
                <div class="side_title gray_border under_slide toggle">
                    <p class="h5">고객정보</p>
                </div>
            </div>
            <div class="slide_ready">
                <div class="floor flex bg_f9">
                    <li class="flexible"><a class="p" href="/">고객정보</a></li>
                    <li class="flexible"><a class="p" href="//wp-content/themes/storefront-child/adminform/user_cancle.php">배송해지</a></li>
                </div>
                <div class="floor flex bg_f9">
                    <li class="flexible"><a class="p" href="/wp-content/themes/storefront-child/adminform/user_report.php">보고서 확인</a></li>
                    <li class="flexible"><a class="p" href="/wp-content/themes/storefront-child/adminform/table_edit_form.php">식단확인 및 변경</a></li>
                </div>
                <div class="floor flex bg_f9">
                    <li class="flexible"><a class="p" href="/">빈칸</a></li>
                    <li class="flexible"><a class="p" href="">빈칸</a></li>
                </div>
            </div>
    </ul>
</div>

<div id="admincontent">

    <div id="adminmainbar"></div>
    <div id="adminbody" role="main">

        <div class="tab_box tab0 on">

            <div class="part_title">
                <h2>STEP 1-1. 재고입력 날짜 선택</h2>
            </div>

            <form method="POST" name="dodamform" action="/wp-content/themes/storefront-child/adminform/active/mate_confirm.php">

                <select name="reyear">
                    <option value="">----</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                </select>
                <select name="remonth">
                    <option value="">----</option>
                    <option value="01">1</option>
                    <option value="02">2</option>
                    <option value="03">3</option>
                    <option value="04">4</option>
                    <option value="05">5</option>
                    <option value="06">6</option>
                    <option value="07">7</option>
                    <option value="08">8</option>
                    <option value="09">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                <select name="reday">
                    <option value="">----</option>
                    <option value="01">1</option>
                    <option value="02">2</option>
                    <option value="03">3</option>
                    <option value="04">4</option>
                    <option value="05">5</option>
                    <option value="06">6</option>
                    <option value="07">7</option>
                    <option value="08">8</option>
                    <option value="09">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>

                <div class="">
                    <p>재료 입력</p>
                </div>



                <div class="">
                    <div class="mate">
                        <p>견과류기타</p>
                        <p>아몬드</p><input type="hidden" name="name[]" value="아몬드"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>견과류기타</p>
                        <p>잣</p><input type="hidden" name="name[]" value="잣"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>견과류기타</p>
                        <p>들깨가루</p><input type="hidden" name="name[]" value="들깨가루"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>견과류기타</p>
                        <p>참깨</p><input type="hidden" name="name[]" value="참깨"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>견과류기타</p>
                        <p>호두</p><input type="hidden" name="name[]" value="호두"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>곡류</p>
                        <p>수수</p><input type="hidden" name="name[]" value="수수"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>곡류</p>
                        <p>차조</p><input type="hidden" name="name[]" value="차조"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>곡류</p>
                        <p>찹쌀</p><input type="hidden" name="name[]" value="찹쌀"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>곡류</p>
                        <p>현미</p><input type="hidden" name="name[]" value="현미"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>곡류</p>
                        <p>흑미</p><input type="hidden" name="name[]" value="흑미"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>곡류</p>
                        <p>쌀가루</p><input type="hidden" name="name[]" value="쌀가루"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>곡류</p>
                        <p>찹쌀가루</p><input type="hidden" name="name[]" value="찹쌀가루"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>곡류</p>
                        <p>귀리</p><input type="hidden" name="name[]" value="귀리"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>곡류</p>
                        <p>쌀</p><input type="hidden" name="name[]" value="쌀"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>곡류</p>
                        <p>보리</p><input type="hidden" name="name[]" value="보리"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>곡류</p>
                        <p>퀴노아</p><input type="hidden" name="name[]" value="퀴노아"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>곡류</p>
                        <p>전분</p><input type="hidden" name="name[]" value="전분"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>곡류</p>
                        <p>현미가루</p><input type="hidden" name="name[]" value="현미가루"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>곡류</p>
                        <p>밀가루</p><input type="hidden" name="name[]" value="밀가루"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>곡류</p>
                        <p>홍미</p><input type="hidden" name="name[]" value="홍미"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>곡류</p>
                        <p>기장</p><input type="hidden" name="name[]" value="기장"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>곡류</p>
                        <p>테프가루</p><input type="hidden" name="name[]" value="테프가루"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>과일류</p>
                        <p>사과</p><input type="hidden" name="name[]" value="사과"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>과일류</p>
                        <p>배</p><input type="hidden" name="name[]" value="배"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>과일류</p>
                        <p>바나나</p><input type="hidden" name="name[]" value="바나나"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>과일류</p>
                        <p>블루베리</p><input type="hidden" name="name[]" value="블루베리"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>과일류</p>
                        <p>방울토마토</p><input type="hidden" name="name[]" value="방울토마토"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>근과채류</p>
                        <p>연근</p><input type="hidden" name="name[]" value="연근"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>근과채류</p>
                        <p>오이</p><input type="hidden" name="name[]" value="오이"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>근과채류</p>
                        <p>단호박</p><input type="hidden" name="name[]" value="단호박"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>근과채류</p>
                        <p>밤</p><input type="hidden" name="name[]" value="밤"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>근과채류</p>
                        <p>비트</p><input type="hidden" name="name[]" value="비트"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>근과채류</p>
                        <p>파프리카</p><input type="hidden" name="name[]" value="파프리카"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>근과채류</p>
                        <p>가지</p><input type="hidden" name="name[]" value="가지"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>근과채류</p>
                        <p>옥수수</p><input type="hidden" name="name[]" value="옥수수"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>근과채류</p>
                        <p>콜라비</p><input type="hidden" name="name[]" value="콜라비"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>근과채류</p>
                        <p>우엉</p><input type="hidden" name="name[]" value="우엉"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>근과채류</p>
                        <p>대추</p><input type="hidden" name="name[]" value="대추"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>근과채류</p>
                        <p>세발나물</p><input type="hidden" name="name[]" value="세발나물"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>근과채류</p>
                        <p>피망</p><input type="hidden" name="name[]" value="피망"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>근과채류</p>
                        <p>마늘쫑</p><input type="hidden" name="name[]" value="마늘쫑"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>기본채소</p>
                        <p>감자</p><input type="hidden" name="name[]" value="감자"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>기본채소</p>
                        <p>무</p><input type="hidden" name="name[]" value="무"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>기본채소</p>
                        <p>양배추</p><input type="hidden" name="name[]" value="양배추"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>기본채소</p>
                        <p>고구마</p><input type="hidden" name="name[]" value="고구마"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>기본채소</p>
                        <p>애호박</p><input type="hidden" name="name[]" value="애호박"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>기본채소</p>
                        <p>당근</p><input type="hidden" name="name[]" value="당근"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>기본채소</p>
                        <p>양파</p><input type="hidden" name="name[]" value="양파"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>기본채소</p>
                        <p>배추</p><input type="hidden" name="name[]" value="배추"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>기타단백</p>
                        <p>연두부</p><input type="hidden" name="name[]" value="연두부"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>기타단백</p>
                        <p>치즈</p><input type="hidden" name="name[]" value="치즈"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>버섯류</p>
                        <p>표고</p><input type="hidden" name="name[]" value="표고"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>버섯류</p>
                        <p>양송이</p><input type="hidden" name="name[]" value="양송이"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>버섯류</p>
                        <p>느타리</p><input type="hidden" name="name[]" value="느타리"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>버섯류</p>
                        <p>새송이</p><input type="hidden" name="name[]" value="새송이"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>버섯류</p>
                        <p>건목이</p><input type="hidden" name="name[]" value="건목이"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>버섯류</p>
                        <p>팽이</p><input type="hidden" name="name[]" value="팽이"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>어육류</p>
                        <p>닭고기</p><input type="hidden" name="name[]" value="닭고기"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>어육류</p>
                        <p>한우</p><input type="hidden" name="name[]" value="한우"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>어육류</p>
                        <p>안심</p><input type="hidden" name="name[]" value="안심"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>어육류</p>
                        <p>돼지고기</p><input type="hidden" name="name[]" value="돼지고기"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>엽채류</p>
                        <p>시금치</p><input type="hidden" name="name[]" value="시금치"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>엽채류</p>
                        <p>브로콜리</p><input type="hidden" name="name[]" value="브로콜리"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>엽채류</p>
                        <p>청경채</p><input type="hidden" name="name[]" value="청경채"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>엽채류</p>
                        <p>비타민</p><input type="hidden" name="name[]" value="비타민"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>엽채류</p>
                        <p>케일</p><input type="hidden" name="name[]" value="케일"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>엽채류</p>
                        <p>근대</p><input type="hidden" name="name[]" value="근대"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>엽채류</p>
                        <p>아욱</p><input type="hidden" name="name[]" value="아욱"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>엽채류</p>
                        <p>로메인</p><input type="hidden" name="name[]" value="로메인"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>엽채류</p>
                        <p>돌나물</p><input type="hidden" name="name[]" value="돌나물"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>엽채류</p>
                        <p>봄동</p><input type="hidden" name="name[]" value="봄동"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>엽채류</p>
                        <p>깻잎</p><input type="hidden" name="name[]" value="깻잎"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>엽채류</p>
                        <p>열무</p><input type="hidden" name="name[]" value="열무"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>엽채류</p>
                        <p>취나물</p><input type="hidden" name="name[]" value="취나물"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>엽채류</p>
                        <p>참나물</p><input type="hidden" name="name[]" value="참나물"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>엽채류</p>
                        <p>적채</p><input type="hidden" name="name[]" value="적채"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>엽채류</p>
                        <p>부추</p><input type="hidden" name="name[]" value="부추"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>엽채류</p>
                        <p>쪽파</p><input type="hidden" name="name[]" value="쪽파"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>엽채류</p>
                        <p>루꼴라</p><input type="hidden" name="name[]" value="루꼴라"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>엽채류</p>
                        <p>건고사리</p><input type="hidden" name="name[]" value="건고사리"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>콩류</p>
                        <p>완두콩가루</p><input type="hidden" name="name[]" value="완두콩가루"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>콩류</p>
                        <p>노란콩가루</p><input type="hidden" name="name[]" value="노란콩가루"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>콩류</p>
                        <p>강낭콩</p><input type="hidden" name="name[]" value="강낭콩"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>콩류</p>
                        <p>검은콩가루</p><input type="hidden" name="name[]" value="검은콩가루"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>콩류</p>
                        <p>병아리콩</p><input type="hidden" name="name[]" value="병아리콩"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>콩류</p>
                        <p>렌틸콩</p><input type="hidden" name="name[]" value="렌틸콩"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>콩류</p>
                        <p>팥가루</p><input type="hidden" name="name[]" value="팥가루"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>해조류</p>
                        <p>김</p><input type="hidden" name="name[]" value="김"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>해조류</p>
                        <p>건미역</p><input type="hidden" name="name[]" value="건미역"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>해조류</p>
                        <p>한천</p><input type="hidden" name="name[]" value="한천"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>해조류</p>
                        <p>건파래</p><input type="hidden" name="name[]" value="건파래"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                    <div class="mate">
                        <p>해조류</p>
                        <p>건톳</p><input type="hidden" name="name[]" value="건톳"> <input placeholder="원물재고" name="base[]" type="text"><input type="text" placeholder="손질후재고" name="cut[]"><input type="text" placeholder="구매량" name="buy[]"><input type="text" placeholder="구매금액" name="pay[]">
                    </div>
                </div>

                <div class="two_button" style="padding-top:30px;">
                    <input type="submit" value="입력하기">
                </div>
            </form>

        </div>

    </div>
</div>


<!--탭 juqery-->
<script>
    $('.toggle').on('click', function() {
        //컨텐츠 제거 후 인덱스에 맞는 컨텐츠 노출
        var idx = $('.toggle').index(this);
        $('.slide_ready').slideUp();
        $('.under_slide').removeClass("open");
        $('.slide_ready').eq(idx).slideDown();
        $('.under_slide').eq(idx).addClass("open");
    });
</script>