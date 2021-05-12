
<?php
/**
 * Template Name: con3survey-02
 */
 
get_header(); ?>

<style>
@media screen and (min-width: 1024px) { 
    .survey-btn {max-width: 418px;}
}
</style>

<div class="section">
    <form method="POST" action="">
        <div class="survey fade sur_01 survey01">
        <div class="survey-img ps20">
            <img src="/wp-content/themes/storefront-child/con3/image/suv-img.png" alt="설문지메인이미지">
        </div>
        <div class="survey-sub-contents ps20">
            <div class="survey-title">
               <h4>도담밀 시작 전<br>사전 설문조사</h4>
                <p class="survey-title-p">도담밀 시작전에 블라블라</p>
            </div>
        </div> 
        <div class="btn ms20 btn-type01" id="pppp">
            <div class="btn-survey-main">
                <p>지금 시작하기 ></p>
            </div>
        </div>
        <div class="popup-page">
            <div class="dark-box">
                <div class="popup-sub">
                    <div class="container">
                        <div class="pp-list">
                            <h5>이유식 시작 체크 리스트</h5>
                            <img src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="Arrow1">
                            <div class="pp-title">
                                <p>체크리스트 중 3개 이상 해당하지 않으면 조금 더 있다 이유식을 시작하는 것이 좋아요.</p>
                            </div>
                            <div class="pupup-text">
                                <p>아기가 혼자 앉을 수 있어요.</p>
                                <p>아기가 혼자 목을 가눌 수 있어요.</p>
                                <p>뱉어내기 반사(음식을 입에 넣었을 때 혀로 밀어내는 것)를 하지 않아요.</p>
                                <p>아기의 현재 체중이 출생 시 체중의 2배 이상이에요.</p>
                                <p>1회 수유량이 100ml 이상이거나, 하루 총 수유량이 1000ml 이상이에요.</p>
                            </div>
                        </div>
                        <div class="check-text">
                            <p> 부모님에게 식품 알레르기가 있다면 생후 5개월 이후에 이유식을 시작하는 것이 좋아요.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
<div class="survey sur_02 sur_04">
    <div class="servey">
    <div class="step">
    <ul>
        <li class="on">기본정보</li>
        <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
        <li>섭취정보</li>
        <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
        <li>건강정보</li>
    </ul>
    </div>
    <div class="prograp">
    <div class="prograp-bar  percent100"></div>
    </div>
    <div class="servey-main ps20">
        <div class="user">
            <p>고객 ID</p>
            <input type="text" name="user-name" id="user" value="아이디">
            <label for="user"></label>
            <p>통화 가능한 연락처</p>
            <input type="text" name="user-phone" id="phone" value="연락처">
            <label for="phone"></label>
        </div>
        <div class="age">
            <p>고객님의 연령대를 알려주세요.</p>
            <div class="radio">
                <input type="radio" name="ages" id="age20" value="age20">
                <label for="age20">만 20세 미만</label>
                <input type="radio" name="ages" id="age25" value="age25">
                <label for="age25">만 20~25세 미만</label>
                <input type="radio" name="ages" id="age30" value="age30">
                <label for="age30">만 25~30세 미만</label>
                <input type="radio" name="ages" id="age35" value="age35">
                <label for="age35">만 30~35세 미만</label>
                <input type="radio" name="ages" id="age40" value="age40">
                <label for="age40">만 35~40세 미만</label>
                <input type="radio" name="ages" id="age40up" value="age45">
                <label for="age40up">만 40세 이상       </label>
            </div>
        </div>
        <div class="baby">
            <p>아기 이름</p>
            <input type="text" name="baby-name" id="rebaby-name" placeholder="아기의 이름을 입력해주세요.">
            <label for="rebaby-name"></label>
            <p>출생일월</p>
            <input type="date" name="date" id="redate">
        </div>
        <div class="ranking">
            <p>아기의 출생 순위를 알려주세요.</p>
            <div class="radio radiomb">
                <input type="radio" name="rangking" id="first" value="first">
                <label for="first">첫째</label>
                <input type="radio" name="rangking" id="second" value="second">
                <label for="second">둘째</label>
                <input type="radio" name="rangking" id="third" value="third">
                <label for="third">셋째</label>
                <input type="radio" name="rangking" id="fourth" value="fourth">
                <label for="fourth">넷째</label>
            </div>
        </div>
        <div class="gender">
            <p>성별</p>
            <div class="radio">
                <input type="radio" name="gender" id="girl"  value="girl">
                <label for="girl">여</label>
                <input type="radio" name="gender" id="man"  value="man">
                <label for="man">남</label>
            </div>
        </div>
        <div class="cm pb40">
            <p>현재 키 cm</p>
            <input type="text" name="cm" id="recm" placeholder="숫자만 입력해주세요. cm">
            <label for="recm"></label>
            <div class="check-text">
                <p>24개월 미만 아기의 신장은 누운 키로 측정하는 것이 정확합니다.</p>
            </div>
        </div>

        <div class="kg">
            <p>현재 체중 kg</p>
            <input type="text" name="kg" id="rekg" placeholder="숫자만 입력해주세요. kg" placeholder="kg">
            <label for="rekg"></label>
        </div>
       
        
            <div class="btn btn-type01 sur02-btn">
                <h5>다음 ></h5>
            </div>
    </div>
    </div>
</div>
<!-- page01 -->
<div class="survey-sub fade sur_03">
    <div class="step">
        <ul>
            <li>기본정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li class="on">섭취정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li>건강정보</li>
        </ul>
    </div>
    <div class="prograp">
        <div class="prograp-bar percent20"></div>
    </div>
    <div class="survey-sub-contents ps20">
        <p>1. 현재 이유식 진행 중으로, 유아식이 처음이시라면 아래 문항에 답해주세요. <br>
            <span>(현재 이유식을 시작중이고 아직 유아식 시작 전이라면, <span>[문항 넘어가기]</span> 버튼을 눌러주세요)</span>
        </p>
        <div class="checkbox p20 page01">
            <input type="checkbox" name="page1[]" id="page1-01" value="직접">
            <label for="page1-01">직접 조리</label>
            <input type="checkbox" name="page1[]" id="page1-02" value="시판">
            <label for="page1-02">시판,배달 이유식 이용</label>
            <input type="text" name="page001[]" value="업체명을 입력해주세요" id="page001">
            <input type="checkbox" name="page1[]" id="page1-03" value="배달">
            <label for="page1-03">분말 이유식 이용</label>
            <input type="text" name="page001[]" value="업체명을 입력해주세요" id="page002">
            <input type="checkbox" name="page1[]" id="page1-04" value="분말">
            <label for="page1-04">혼합 진행</label>
            <input type="text" name="page001[]" id="page003">
            <input type="checkbox" name="page1[]" id="page1-05" value="기타">
            <label for="page1-05">기타</label>
            <input type="text" name="page001[]" id="page004">
        </div>
    </div>
</div>  
<!-- page02 -->
<div class="survey-sub fade">
    <div class="step">
        <ul>
            <li>기본정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li class="on">섭취정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li>건강정보</li>
        </ul>
    </div>
    <div class="prograp">
        <div class="prograp-bar percent60"></div>
    </div>
    <div class="survey-sub-contents ps20">
        <p>1-2. 아기가 한 번에 먹는 이유식 섭취량을 알려주세요. <br><span>(최근 일주일 평균 섭취량을 입력해 주세요.)</span></p>
        <div class="radio">
        <select name="one-eat" id="one-eat">
            <option value="30">30ml</option>
            <option value="40">40ml</option>
            <option value="50">50ml</option>
            <option value="60">60ml</option>
            <option value="70">70ml</option>
            <option value="80">80ml</option>
            <option value="90">90ml</option>
            <option value="100">100ml</option> 
            <option value="110">110ml</option>
            <option value="120">120ml</option>
            <option value="130">130ml</option>
            <option value="140">140ml</option>
            <option value="150">150ml</option>
        </select>
        </div>
    </div>
</div> 
 <!-- page3 -->
<div class="survey-sub fade">
    <div class="step">
        <ul>
            <li>기본정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li class="on">섭취정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li>건강정보</li>
        </ul>
    </div>
    <div class="prograp">
        <div class="prograp-bar percent80"></div>
    </div>
    <div class="survey-sub-contents ps20">
        <p>1-3. 아기가 먹어본 재료를 모두 선택해주세요.</p>
        <div class="checkbox02 check02mb">
            <input type="checkbox" name="cook-eat[]" id=cook-eat01 value="가지">
            <label for="cook-eat01">가지</label> 
            <input type="checkbox" name="cook-eat[]" id=cook-eat02 value="감자">
            <label for="cook-eat02">감자</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat03 value="강남콩">
            <label for="cook-eat03">강남콩</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat04 value="건미역">
            <label for="cook-eat04">건미역</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat05 value="고구마">
            <label for="cook-eat05">고구마</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat06 value="귀리">
            <label for="cook-eat06">귀리</label> 
            <input type="checkbox" name="cook-eat[]" id=cook-eat07 value="근대">
            <label for="cook-eat07">근대</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat08 value="김">
            <label for="cook-eat08">김</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat09 value="노란콩가루">
            <label for="cook-eat09" class="lh20">노란콩<br>가루</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat10 value="느타리">
            <label for="cook-eat10">느타리</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat11 value="단호박">
            <label for="cook-eat11">단호박</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat12 value="닭고기">
            <label for="cook-eat12">닭고기</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat13 value="당근">
            <label for="cook-eat13">당근</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat14 value="돌나무">
            <label for="cook-eat14">돌나무</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat15 value="무">
            <label for="cook-eat15">무</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat16 value="배">
            <label for="cook-eat16">배</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat17 value="배추">
            <label for="cook-eat17">배추</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat18 value="보리">
            <label for="cook-eat18">보리</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat19 value="봄동">
            <label for="cook-eat19">봄동</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat20 value="부추">
            <label for="cook-eat20">부추</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat21 value="브로콜리">
            <label for="cook-eat21">브로콜리</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat22 value="비타민">
            <label for="cook-eat22">비타민</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat23 value="비트">
            <label for="cook-eat23">비트</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat24 value="사과">
            <label for="cook-eat24">사과</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat25 value="새송이">
            <label for="cook-eat25">새송이</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat26 value="수수">
            <label for="cook-eat26">수수</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat27 value="시금치">
            <label for="cook-eat27">시금치</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat28 value="쌀">
            <label for="cook-eat28">쌀</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat29 value="쌀가루">
            <label for="cook-eat29">쌀가루</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat30 value="아욱">
            <label for="cook-eat30">아욱</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat31 value="애호박">
            <label for="cook-eat31">애호박</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat32 value="양배추">
            <label for="cook-eat32">양배추</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat33 value="양송이">
            <label for="cook-eat33">양송이</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat34 value="양파">
            <label for="cook-eat34">양파</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat35 value="연근">
            <label for="cook-eat35">연근</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat36 value="연두부">
            <label for="cook-eat36">연두부</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat37 value="열무">
            <label for="cook-eat37">열무</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat38 value="오이">
            <label for="cook-eat38">오이</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat39 value="옥수수">
            <label for="cook-eat39">옥수수</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat40 value="완두콩가루">
            <label for="cook-eat40" class="lh20">완두콩<br>가루</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat41 value="우엉">
            <label for="cook-eat41">우엉</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat42 value="적채">
            <label for="cook-eat42">적채</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat43 value="전분">
            <label for="cook-eat43">전분</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat44 value="쪽파">
            <label for="cook-eat44">쪽파</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat45 value="차조">
            <label for="cook-eat45">차조</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat46 value="참나물">
            <label for="cook-eat46">참나물</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat47 value="찹쌀">
            <label for="cook-eat47">찹쌀</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat48 value="찹쌀가루">
            <label for="cook-eat48">찹쌀가루</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat49 value="청경채">
            <label for="cook-eat49">청경채</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat50 value="취나물">
            <label for="cook-eat50">취나물</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat51 value="치즈">
            <label for="cook-eat51">치즈</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat52 value="케일">
            <label for="cook-eat52">케일</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat53 value="파프리카">
            <label for="cook-eat53">파프리카</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat54 value="팽이">
            <label for="cook-eat54">팽이</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat55 value="표고">
            <label for="cook-eat55">표고</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat56 value="한우">
            <label for="cook-eat56">한우</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat57 value="현미">
            <label for="cook-eat57">현미</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat58 value="흑미">
            <label for="cook-eat58">흑미</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat59 value="깻잎">
            <label for="cook-eat59">깻잎</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat60 value="대추">
            <label for="cook-eat60">대추</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat61 value="마늘쫑">
            <label for="cook-eat61">마늘쫑</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat62 value="방울토마토">
            <label for="cook-eat62" class="lh20">방울<br>토마토</label>
            <input type="checkbox" name="cook-eat[]" id=cook-eat63 id=cook-eat62 value="병아리콩">
            <label for="cook-eat63">병아리콩</label>
        </div>
    </div>
</div>  
<!-- page04 -->
<!-- 수정 -->
<div class="survey-sub fade">
    <div class="step">
        <ul>
            <li>기본정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li>섭취정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li class="on">건강정보</li>
        </ul>
    </div>
    <div class="prograp">
        <div class="prograp-bar percent75"></div>
    </div>
    <div class="survey-sub-contents ps20 page11">
        <p>2. 현재 수유는 어떻게 진행하고 계신가요? <br><span>(수유량은 최근 일주일 평균치로 작성해주세요.)</span></p>
        <div class="select">
            <!-- 완모 -->
            <input type="radio" name="reselect" id="select001"> 
            <label for="select001">완모</label>
            <select name="reselect001" id="resel01">
                    <option value="30">30ml</option>
                    <option value="40">40ml</option>
                    <option value="50">50ml</option>
                    <option value="60">60ml</option>
                    <option value="70">70ml</option>
                    <option value="80">80ml</option>
                    <option value="90">90ml</option>
                    <option value="100">100ml</option>
                    <option value="110">110ml</option>
                    <option value="120">120ml</option>
                    <option value="130">130ml</option>
                    <option value="140">140ml</option>
                    <option value="150">150ml</option>
            </select>
            <!-- 완분 -->
            <input type="radio" name="reselect" id="select002">
            <label for="select002">완분</label>
            <input type="text" name="reselect-text" id="select002-1" placeholder="업체명을 입력해주세요.">
            <input type="text" name="reselect-text" id="select003" placeholder="분유양 g">
            <input type="text" name="reselect-text" id="select004" placeholder="물 양 ml">
            <!-- 혼합수유 -->
            <input type="radio" name="reselect" id="select005">
            <label for="select005">혼합수유</label>
            <select name="reselect001" id="select006">
                    <option value="30">30ml</option>
                    <option value="40">40ml</option>
                    <option value="50">50ml</option>
                    <option value="60">60ml</option>
                    <option value="70">70ml</option>
                    <option value="80">80ml</option>
                    <option value="90">90ml</option>
                    <option value="100">100ml</option>
                    <option value="110">110ml</option>
                    <option value="120">120ml</option>
                    <option value="130">130ml</option>
                    <option value="140">140ml</option>
                    <option value="150">150ml</option>
            </select>
            <input type="text" name="reselect-text" id="select007" placeholder="업체명을 입력해주세요.">
            <input type="text" name="reselect-text" id="select008" placeholder="분유양 g">
            <input type="text" name="reselect-text" id="select009" placeholder="물 양 ml">
            <!-- 기타 -->
            <input type="radio" name="reselect" id="select010">
            <label for="select010">기타</label>
            <input type="text" name="reselect" id="select011">
        </div>
    </div>
    </div>
</div>
<!-- page05 -->
<div class="survey-sub fade">
    <div class="step">
        <ul>
            <li>기본정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li class="on">섭취정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li>건강정보</li>
        </ul>
    </div>
    <div class="prograp">
        <div class="prograp-bar percent100"></div>
    </div>
    <div class="survey-sub-contents ps20">
        <p>3. 우리 아기 이유식 식단에서 가장 중요하게 생각하는 부분은 어떤 것인가요?</p>
        <div class="select gogo">
            <input type="radio" name="impo" id="impo01" value="알레르기">
            <label for="impo01">알레르기 없이 안전한 이유식을 먹이고 싶어요.</label>
            <input type="radio" name="impo" id="impo02" value="다양한">
            <label for="impo02">최대한 많은 재료를 다양하게 먹이고 싶어요.</label>
            <input type="radio" name="impo" id="impo03" value="신선한">
            <label for="impo03">신선한 한우를 매일 먹이고 싶어요.</label>
            <input type="radio" name="impo" id="impo04" value="가성비">
            <label for="impo04">꼭 필요한 것만 챙겨서 가성비 좋은 이유식을 먹이고 싶어요.</label>
            <input type="radio" name="impo" id="impo05" value="마은대로">
            <label for="impo05">내 마음대로 우리 아기에게 맞춰서 식단을 구성하고 싶어요.</label>
        </div>
    </div>
</div>
<!-- page06-->
<div class="survey-sub fade">
    <div class="step">
        <ul>
            <li>기본정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li>섭취정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li class="on">건강정보</li>
        </ul>
    </div>
    <div class="prograp">
        <div class="prograp-bar percent25"></div>
    </div>
    <div class="survey-sub-contents ps20">
        <p>1. 식품 알레르기가 있는 가족이 있나요? <br><span>(있다면 해당 재료와 증상을 모두 말씀해주세요.)</span></p>
        <div class="radio radio-two">
            <input type="radio" name="family" id="yes-family" value="있어요">
            <label for="yes-family">있어요.</label>
            <input type="radio" name="family" id=no-family value="없어요">
            <label for="no-family">없어요.</label>
            <div class="text-box">
                <textarea class="DOC_TEXT" name="DOC_TEXT01" placeholder="해당 재료와 증상을 입력해 주세요" value="200자"></textarea> 
                <span id="counter">(0 / 최대 200자)</span>
            </div>
        </div>
    </div> 
</div>
<!-- page07 -->
<div class="survey-sub fade">
    <div class="step">
        <ul>
            <li>기본정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li>시기추천</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li>섭취정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li class="on">건강정보</li>
        </ul>
    </div>
    <div class="prograp">
        <div class="prograp-bar percent50"></div>
    </div>
    <div class="survey-sub-contents ps20">
        <p>2. 기존 이유식을 진행하거나, 알레르기 테스트에서 반응이 나타난 재료를 모두 선택해주세요.</p>
        <div class="checkbox02 check02mb">
            <input type="checkbox" name="allergy[]" id=allergy01 value="가지">
            <label for="allergy01">가지</label> 
            <input type="checkbox" name="allergy[]" id=allergy02 value="감자">
            <label for="allergy02">감자</label>
            <input type="checkbox" name="allergy[]" id=allergy03 value="강남콩">
            <label for="allergy03">강남콩</label>
            <input type="checkbox" name="allergy[]" id=allergy04 value="건미역">
            <label for="allergy04">건미역</label>
            <input type="checkbox" name="allergy[]" id=allergy05 value="고구마">
            <label for="allergy05">고구마</label>
            <input type="checkbox" name="allergy[]" id=allergy06 value="귀리">
            <label for="allergy06">귀리</label> 
            <input type="checkbox" name="allergy[]" id=allergy07 value="근대">
            <label for="allergy07">근대</label>
            <input type="checkbox" name="allergy[]" id=allergy08 value="김">
            <label for="allergy08">김</label>
            <input type="checkbox" name="allergy[]" id=allergy09 value="노란콩가루">
            <label for="allergy09" class="lh20">노란콩<br>가루</label>
            <input type="checkbox" name="allergy[]" id=allergy10 value="느타리">
            <label for="allergy10">느타리</label>
            <input type="checkbox" name="allergy[]" id=allergy11 value="단호박">
            <label for="allergy11">단호박</label>
            <input type="checkbox" name="allergy[]" id=allergy12 value="닭고기">
            <label for="allergy12">닭고기</label>
            <input type="checkbox" name="allergy[]" id=allergy13 value="당근">
            <label for="allergy13">당근</label>
            <input type="checkbox" name="allergy[]" id=allergy14 value="돌나무">
            <label for="allergy14">돌나무</label>
            <input type="checkbox" name="allergy[]" id=allergy15 value="무">
            <label for="allergy15">무</label>
            <input type="checkbox" name="allergy[]" id=allergy16 value="배">
            <label for="allergy16">배</label>
            <input type="checkbox" name="allergy[]" id=allergy17 value="배추">
            <label for="allergy17">배추</label>
            <input type="checkbox" name="allergy[]" id=allergy18 value="보리">
            <label for="allergy18">보리</label>
            <input type="checkbox" name="allergy[]" id=allergy19 value="봄동">
            <label for="allergy19">봄동</label>
            <input type="checkbox" name="allergy[]" id=allergy20 value="부추">
            <label for="allergy20">부추</label>
            <input type="checkbox" name="allergy[]" id=allergy21 value="브로콜리">
            <label for="allergy21">브로콜리</label>
            <input type="checkbox" name="allergy[]" id=allergy22 value="비타민">
            <label for="allergy22">비타민</label>
            <input type="checkbox" name="allergy[]" id=allergy23 value="비트">
            <label for="allergy23">비트</label>
            <input type="checkbox" name="allergy[]" id=allergy24 value="사과">
            <label for="allergy24">사과</label>
            <input type="checkbox" name="allergy[]" id=allergy25 value="새송이">
            <label for="allergy25">새송이</label>
            <input type="checkbox" name="allergy[]" id=allergy26 value="수수">
            <label for="allergy26">수수</label>
            <input type="checkbox" name="allergy[]" id=allergy27 value="시금치">
            <label for="allergy27">시금치</label>
            <input type="checkbox" name="allergy[]" id=allergy28 value="쌀">
            <label for="allergy28">쌀</label>
            <input type="checkbox" name="allergy[]" id=allergy29 value="쌀가루">
            <label for="allergy29">쌀가루</label>
            <input type="checkbox" name="allergy[]" id=allergy30 value="아욱">
            <label for="allergy30">아욱</label>
            <input type="checkbox" name="allergy[]" id=allergy31 value="애호박">
            <label for="allergy31">애호박</label>
            <input type="checkbox" name="allergy[]" id=allergy32 value="양배추">
            <label for="allergy32">양배추</label>
            <input type="checkbox" name="allergy[]" id=allergy33 value="양송이">
            <label for="allergy33">양송이</label>
            <input type="checkbox" name="allergy[]" id=allergy34 value="양파">
            <label for="allergy34">양파</label>
            <input type="checkbox" name="allergy[]" id=allergy35 value="연근">
            <label for="allergy35">연근</label>
            <input type="checkbox" name="allergy[]" id=allergy36 value="연두부">
            <label for="allergy36">연두부</label>
            <input type="checkbox" name="allergy[]" id=allergy37 value="열무">
            <label for="allergy37">열무</label>
            <input type="checkbox" name="allergy[]" id=allergy38 value="오이">
            <label for="allergy38">오이</label>
            <input type="checkbox" name="allergy[]" id=allergy39 value="옥수수">
            <label for="allergy39">옥수수</label>
            <input type="checkbox" name="allergy[]" id=allergy40 value="완두콩가루">
            <label for="allergy40" class="lh20">완두콩<br>가루</label>
            <input type="checkbox" name="allergy[]" id=allergy41 value="우엉">
            <label for="allergy41">우엉</label>
            <input type="checkbox" name="allergy[]" id=allergy42 value="적채">
            <label for="allergy42">적채</label>
            <input type="checkbox" name="allergy[]" id=allergy43 value="전분">
            <label for="allergy43">전분</label>
            <input type="checkbox" name="allergy[]" id=allergy44 value="쪽파">
            <label for="allergy44">쪽파</label>
            <input type="checkbox" name="allergy[]" id=allergy45 value="차조">
            <label for="allergy45">차조</label>
            <input type="checkbox" name="allergy[]" id=allergy46 value="참나물">
            <label for="allergy46">참나물</label>
            <input type="checkbox" name="allergy[]" id=allergy47 value="찹쌀">
            <label for="allergy47">찹쌀</label>
            <input type="checkbox" name="allergy[]" id=allergy48 value="찹쌀가루">
            <label for="allergy48">찹쌀가루</label>
            <input type="checkbox" name="allergy[]" id=allergy49 value="청경채">
            <label for="allergy49">청경채</label>
            <input type="checkbox" name="allergy[]" id=allergy50 value="취나물">
            <label for="allergy50">취나물</label>
            <input type="checkbox" name="allergy[]" id=allergy51 value="치즈">
            <label for="allergy51">치즈</label>
            <input type="checkbox" name="allergy[]" id=allergy52 value="케일">
            <label for="allergy52">케일</label>
            <input type="checkbox" name="allergy[]" id=allergy53 value="파프리카">
            <label for="allergy53">파프리카</label>
            <input type="checkbox" name="allergy[]" id=allergy54 value="팽이">
            <label for="allergy54">팽이</label>
            <input type="checkbox" name="allergy[]" id=allergy55 value="표고">
            <label for="allergy55">표고</label>
            <input type="checkbox" name="allergy[]" id=allergy56 value="한우">
            <label for="allergy56">한우</label>
            <input type="checkbox" name="allergy[]" id=allergy57 value="현미">
            <label for="allergy57">현미</label>
            <input type="checkbox" name="allergy[]" id=allergy58 value="흑미">
            <label for="allergy58">흑미</label>
            <input type="checkbox" name="allergy[]" id=allergy59 value="깻잎">
            <label for="allergy59">깻잎</label>
            <input type="checkbox" name="allergy[]" id=allergy60 value="대추">
            <label for="allergy60">대추</label>
            <input type="checkbox" name="allergy[]" id=allergy61 value="마늘쫑">
            <label for="allergy61">마늘쫑</label>
            <input type="checkbox" name="allergy[]" id=allergy62 value="방울토마토">
            <label for="allergy62" class="lh20">방울<br>토마토</label>
            <input type="checkbox" name="allergy[]" id=allergy63 value="병아리콩">
            <label for="allergy63">병아리콩</label>
            <input type="checkbox" name="allergy[]" id=allergy64 value="세발나물">
            <label for="allergy64">세발나물</label>
            <input type="checkbox" name="allergy[]" id=allergy65 value="아몬드">
            <label for="allergy65">아몬드</label>
            <input type="checkbox" name="allergy[]" id=allergy66 value="팥가루">
            <label for="allergy66">팥가루</label>
            <input type="checkbox" name="allergy[]" id=allergy67 value="피망">
            <label for="allergy67">피망</label>
            <input type="checkbox" name="allergy[]" id=allergy68 value="렌틸콩">
            <label for="allergy68">렌틸콩</label>
            <input type="checkbox" name="allergy[]" id=allergy69 value="루꼴라">
            <label for="allergy69">루꼴라</label>
            <input type="checkbox" name="allergy[]" id=allergy70 value="밤">
            <label for="allergy70">밤</label>
            <input type="checkbox" name="allergy[]" id=allergy71 value="블루베리">
            <label for="allergy71">블루베리</label>
            <input type="checkbox" name="allergy[]" id=allergy72 value="안심">
            <label for="allergy72">안심</label>
            <input type="checkbox" name="allergy[]" id=allergy73 value="잣">
            <label for="allergy73">잣</label>
            <input type="checkbox" name="allergy[]" id=allergy74 value="콜라비">
            <label for="allergy74">콜라비</label>                    
            <input type="checkbox" name="allergy[]" id=allergy75 value="퀴노아">
            <label for="allergy75">퀴노아</label>             
            <input type="checkbox" name="allergy[]" id=allergy76 value="테프가루">
            <label for="allergy76">테프가루</label>                           
            <input type="checkbox" name="allergy[]" id=allergy77 value="홍미">
            <label for="allergy77">홍미</label>                                     
        </div>
        <div class="text-box">
            <textarea class="DOC_TEXT" name="DOC_TEXT02" value="텍스트" placeholder="해당 재료와 증상을 입력해 주세요.예시) 일주일 전 단호박을 먹고 1시간 정도 후에 가려운 증상이 있었어요."></textarea> 
            <span id="counter">(0 / 최대 200자)</span>
        </div>
    </div>
</div> 
 <!--page08  -->
<div class="survey-sub fade">
    <div class="step">
        <ul>
            <li>기본정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li>섭취정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li class="on">건강정보</li>
        </ul>
    </div>
    <div class="prograp">
        <div class="prograp-bar percent75"></div>
    </div>
    <div class="survey-sub-contents ps20">
        <p>3. 다음 중 최근 한 달 사이에 자주 나타난 증상이 있나요?</p>
        <div class="radio radio-two">
            <input type="checkbox" name="sick[]" id="sick01" value="변비">
            <label for="sick01">변비</label>
            <input type="checkbox" name="sick[]" id=sick02 value="설사">
            <label for="sick02">설사 </label>
            <input type="checkbox" name="sick[]" id="sick03" value="구토">
            <label for="sick03">구역질,구토</label>
            <input type="checkbox" name="sick[]" id=sick04 value="발열">
            <label for="sick04">발열</label>
            <input type="checkbox" name="sick[]" id=sick05 value="호흡기">
            <label for="sick05">호흡기 증상</label>
            <input type="checkbox" name="sick[]" id=sick06 value="증상없음">
            <label for="sick06">증상없음</label>
        </div>
    </div>
</div>
    <!-- popup -->
    <!-- 변비 팝업 -->
    <div class="popup-page_01">
        <div class="dark-box">
            <div class="popup-sub">
                <div class="container">
                    <div class="pop-list_01">
                        <h5>변비</h5>
                        <img src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="Arrow1">
                        <div class="checkbox checkbox-one" id="radio_01">
                            <input type="checkbox" id="const01" name="sick001[]" value="변원" class="sick001">
                            <label for="const01">병원에서 변비 진단을 받았어요.</label>
                            <input type="checkbox" id="const02" name="sick001[]" value="불록" class="sick001">
                            <label for="const02">배가 불록하고 단단한테, 변을 보지 않아요.</label>
                            <input type="checkbox" id="const03" name="sick001[]" value="단단" class="sick001">
                            <label for="const03">굵고 단단한 변이 나와요.</label>
                            <input type="checkbox" id="const04" name="sick001[]" value="항문" class="sick001">
                            <label for="const04">항문에 피가 묻어나와요.</label>
                            <input type="checkbox" id="const05" name="sick001[]" value="화장실" class="sick001">
                            <label for="const05">화장실을 가기 싫어하고,배변 시 불편해하거나 아파해요.</label>
                            <input type="checkbox" id="const06" name="sick001[]" value="배변" class="sick001">
                            <label for="const06">평상시와 달리 2일 또는 3일 동안 배변 활동을 못 했어요.</label>
                            <div class="btn-check fade">
                                <div>
                                    <p>선택 완료</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 설사 -->
    <div class="popup-page_02">
        <div class="dark-box">
            <div class="popup-sub">
                <div class="container">
                    <div class="pop-list_02">
                        <h5>설사</h5>
                        <img src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="Arrow1">
                        <div class="checkbox checkbox-one" id="radio_02">
                            <input type="checkbox" id="diarrhea01" name="sick002[]" value="변비"class="sick002">
                            <label for="diarrhea01">병원에서 설사 진단을 받았어요.</label>
                            <input type="checkbox" id="diarrhea02" name="sick002[]" value="장염"class="sick002">
                            <label for="diarrhea02">장염, 식중독 등 특정 질환 때문에 설사를 해요.</label>
                            <input type="checkbox" id="diarrhea03" name="sick002[]" value="묽은"class="sick002">
                            <label for="diarrhea03">하루 평균 3회 이상 묽은 변이 나와요.</label>
                            <input type="checkbox" id="diarrhea04" name="sick002[]" value="체중"class="sick002">
                            <label for="diarrhea04">하루 대변량의 체중(kg)당 10~20g 이상이에요.</label>
                            <div class="btn-check fade">
                                <div>
                                    <p>선택 완료</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 구토 -->
    <div class="popup-page_03">
        <div class="dark-box">
            <div class="popup-sub">
                <div class="container">
                    <div class="pop-list_03">
                        <h5>구역질,구토</h5>
                        <img src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="Arrow1">
                        <div class="checkbox checkbox-one" id="radio_03">
                            <input type="checkbox" id="goo01" name="sick003" class="sick003">
                            <label for="goo01">식중독, 알레르기 등 특정 질환때문에 구토를 해요.</label>
                            <div class="info blue">&middot;&nbsp; 구토 횟수와 시기는 숫자만 입력해주세요.</div>
                            <div class="goo02">
                                <p>구토 횟수</p>
                                <select name="sick003s" id="goo02">
                                    <option value="1">1회/하루</option>
                                    <option value="2">2회/하루</option>
                                    <option value="3">3회/하루</option>
                                    <option value="4">4회/하루</option>
                                    <option value="5">5회/하루</option>
                                    <option value="6">6회/하루</option>
                                    <option value="7">7회/하루</option>
                                    <option value="8">8회/하루</option>
                                    <option value="9">9회/하루</option>
                                    <option value="10">10회/하루</option>
                                </select>
                            </div>
                            <p>구토시기 :</p>
                            <div class="goo03">
                                <p>주로 식후&nbsp;</p>
                                <select name="sick003ss" id="goo03">
                                    <option value="10">10분</option>
                                    <option value="20">20분</option>
                                    <option value="30">30분</option>
                                    <option value="40">40분</option>
                                    <option value="50">50분</option>
                                    <option value="60">60분</option>
                                    <option value="70">70분</option>
                                    <option value="80">80분</option>
                                    <option value="90">90분</option>
                                    <option value="100">100분</option>
                                    <option value="110">110분</option>
                                    <option value="120">120분</option>
                                </select><hr>
                                <p>&nbsp;분 정도 후에 구토를 해요.</p>
                            </div>
                            <div class="btn-check fade">
                                <div>
                                    <p>선택 완료</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 발열 -->
    <div class="popup-page_04">
        <div class="dark-box">
            <div class="popup-sub">
                <div class="container">
                    <div class="pop-list_04">
                        <h5>발열</h5>
                        <img src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="Arrow1">
                        <div class="checkbox checkbox-one" id="radio_04">
                            <input type="checkbox" id="foot01" name="sick004[]" value="감기"  class="sick004">
                            <label for="foot01">감기, 폐렴 등 특정 질환때문에 열이 나요.</label>
                            <input type="checkbox" id="foot02" name="sick004[]" value="액와" class="sick004">
                            <label for="foot02">액와(겨드랑이 안쪽) 부위 체온이 37.4℃ 이상이에요.</label>
                            <input type="checkbox" id="foot03" name="sick004[]" value="구강" class="sick004">
                            <label for="foot03">구강 또는 고막 체온이 37.6℃ 이상이에요.</label>
                            <input type="checkbox" id="foot04" name="sick004[]" value="체온" class="sick004">
                            <label for="foot04">항문 체온이 38℃ 이상이에요.</label>
                            <div class="btn-check fade">
                                <div>
                                    <p>선택 완료</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 호흡기증상 -->
    <div class="popup-page_05">
    <div class="dark-box">
        <div class="popup-sub">
            <div class="container">
                <div class="pop-list_05">
                    <h5>호흡기증상</h5>
                    <img src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="Arrow1">
                    <div class="checkbox checkbox-one breath">
                        <input type="checkbox" id="breath01" name="breath[]" value="질환" class="sick005">
                        <label for="breath01">감기, 알레르기 등 특정 질환때문에 증상이 나타나요</label>
                        <input type="text" id="breath01-text" name="breath[]" placeholder="질환명을 입력해주세요." class="sick005">
                        <input type="checkbox" id="breath02" name="breath[]" value="기침" class="sick005">
                        <label for="breath02">기침</label>
                        <input type="checkbox" id="breath03" name="breath[]" value="콧물" class="sick005">
                        <label for="breath03">콧물</label>
                        <input type="checkbox" id="breath04" name="breath[]" value="가래" class="sick005">
                        <label for="breath04">콧물</label>
                        <input type="checkbox" id="breath05" name="breath[]" value="호흡곤란" class="sick005">
                        <label for="breath05">호흡곤란</label>
                        <div class="btn-check fade">
                            <div>
                                <p>선택 완료</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page09 -->
<div class="survey-sub fade showSlide-loding">
    <div class="step">
        <ul>
            <li>기본정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
              <li>섭취정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li class="on">건강정보</li>
        </ul>
    </div>
    <div class="prograp">
        <div class="prograp-bar percent100"></div>
    </div> 
    <div class="survey-sub-contents ps20">
        <p>4. 위 문항 외에 다른 특이사항이 있거나, 병원에서 진단을 받은 적이 있나요?<br> <span>(있다면 자세히 적어주세요.)</span></p>
        <div class="text-box text-box-top">
                <textarea class="DOC_TEXT" name="DOC_TEXT03" value="text" placeholder="예시) 감기 – 감기에 자주 걸려요.(월 1회 정도) 빈혈 – 병원에서 철결핍성 빈혈 진단을 받았어요. 이유식 거부 – 아기가 이유식을 잘 안먹어요."></textarea> 
                <span id="counter">(0 / 최대 240자)</span>
        </div>
    </div>
</div>

<!-- 유아식 -->
<!-- page10 -->
<!-- 수정 -->
<div class="survey-sub fade showSlide-yoo">
    <div class="step">
        <ul>
            <li>기본정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li class="on">섭취정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li>건강정보</li>
        </ul>
    </div>
    <div class="prograp">
        <div class="prograp-bar percent20"></div>
    </div>
    <div class="survey-sub-contents ps20">
        <p>1. 현재 이유식 진행 중으로, 유아식이 처음이시라면 아래 문항에 답해주세요. <br>
            <span>(현재 이유식을 시작중이고 아직 유아식 시작 전이라면, <span>[문항 넘어가기]</span> 버튼을 눌러주세요)</span>
        </p>
        <div class="checkbox showSlide15 page17">
            <input type="checkbox" name="recooking[]" id="recooking01" value="직접">
            <label for="recooking01">직접 조리</label>
            <input type="checkbox" name="recooking[]" id="recooking02" value="시판">
            <label for="recooking02">시판,배달 이유식 이용</label>
            <input type="text" name="recooking001[]" value="업체명을 입력해주세요" id="recooking001">
            <input type="checkbox" name="recooking[]" id="recooking03" value="배달">
            <label for="recooking03">분말 이유식 이용</label>
            <input type="text" name="recooking001[]" value="업체명을 입력해주세요" id="recooking002">
            <input type="checkbox" name="recooking[]" id="recooking04" value="분말">
            <label for="recooking04">혼합 진행</label>
            <input type="text" name="recooking001[]" id="recooking003">
            <input type="checkbox" name="recooking[]" id="recooking05" value="기타">
            <label for="recooking05">기타</label>
            <input type="text" name="recooking001[]" id="recooking004">
        </div>
    </div>
</div>  
<!-- page11 -->
<div class="survey-sub fade">
    <div class="step">
        <ul>
            <li>기본정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li class="on">섭취정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li>건강정보</li>
        </ul>
    </div>
    <div class="prograp">
        <div class="prograp-bar percent40"></div>
    </div>
    <div class="survey-sub-contents ps20">
        <p>1-2. 아이가 한 번에 먹는 유아식 섭취량을 알려주세요. <br><span>(최근 일주일 평균 섭취량을 입력해 주세요.)</span></p>
        <div class="radio">
        <select name="one-you" id="one-you">
            <option value="30">30ml</option>
            <option value="40">40ml</option>
            <option value="50">50ml</option>
            <option value="60">60ml</option>
            <option value="70">70ml</option>
            <option value="80">80ml</option>
            <option value="90">90ml</option>
            <option value="100">100ml</option> 
            <option value="110">110ml</option>
            <option value="120">120ml</option>
            <option value="130">130ml</option>
            <option value="140">140ml</option>
            <option value="150">150ml</option>
        </select>
        </div>
    </div> 
</div>
<!-- page12 -->
<!-- 수정 -->
<div class="survey-sub fade">
    <div class="step">
        <ul>
            <li>기본정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li class="on">섭취정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li>건강정보</li>
        </ul>
    </div>
    <div class="prograp">
        <div class="prograp-bar percent60"></div>
    </div>
    <div class="survey-sub-contents ps20">
        <p>2. 현재 수유 중이시라면 하루 총 수유량을 알려주세요.<br><span>(최근 일주일 평균 섭취량을 입력해 주세요.)</span></p>
        <div class="select">
        <input type="radio" name="su-you01" id="su-yoo01">
        <label for="su-yoo01">수유중</label>
        <select name="su-you" id="su-you">
            <option value="30">30ml</option>
            <option value="40">40ml</option>
            <option value="50">50ml</option>
            <option value="60">60ml</option>
            <option value="70">70ml</option>
            <option value="80">80ml</option>
            <option value="90">90ml</option>
            <option value="100">100ml</option> 
            <option value="110">110ml</option>
            <option value="120">120ml</option>
            <option value="130">130ml</option>
            <option value="140">140ml</option>
            <option value="150">150ml</option>
        </select>
        <input type="radio" name="su-you01" id="su-yoo02">
        <label for="su-yoo02">단유중</label>
        </div>
        <div class="one-speak">
            <p>도담밀의 한마디!</p>
            <div class="speak">
                <p>하루 3회 밥을 먹는 유아기에도 수유를 하게 되면 밥을 덜 먹게 되어 영양소 섭취가 부족해 질 수 있어요. 또한 우유병을 오래 물면 치아우식증이 생길 위험도 높아져요. 분유 수유를 한다면 돌 이후부터 우유로 바꿔 먹이면서 양을 줄이고, 모유 수유를 한다면 18개월 전후에는 단유를 시도하는 것이 좋아요.</p>
            </div>
        </div>
    </div>  
</div> 
<!-- page13 -->
<!-- 수정 -->
<div class="survey-sub fade">
    <div class="step">
        <ul>
            <li>기본정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li class="on">섭취정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li>건강정보</li>
        </ul>
    </div>
    <div class="prograp">
        <div class="prograp-bar percent80"></div>
    </div>
    <div class="survey-sub-contents ps20">
        <p>3. 현재 유아식 진행 중이시라면 한 번에 먹는 밥 섭취량을 알려주세요.<br><span>(최근 일주일 평균 섭취량을 입력해 주세요.)</span></p>
        <div class="select select-you">
            <input type="radio" name="average-you" id="average-you01">
            <label for="average-you01">아직 유아식을 시작하지 않았어요.</label>              
            <input type="radio" name="average-you" id="average-you02">
            <label for="average-you02">밥</label>
            <select name="average-yous" id="average-you03">
                    <option value="30">30g</option>
                    <option value="40">40g</option>
                    <option value="50">50g</option>
                    <option value="60">60g</option>
                    <option value="70">70g</option>
                    <option value="80">80g</option>
                    <option value="90">90g</option>
                    <option value="100">100g</option>
                    <option value="110">110g</option>
                    <option value="120">120g</option>
                    <option value="130">130g</option>
                    <option value="140">140g</option>
                    <option value="150">150g</option>
            </select>
            <input type="radio" name="average-you" id="average-you03">
            <label for="average-you03">잘 모르겠어요.</label>
        </div>
    </div>
</div> 
<!-- page14 -->
<div class="survey-sub fade">
    <div class="step">
        <ul>
            <li>기본정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li class="on">섭취정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li>건강정보</li>
        </ul>
    </div>
    <div class="prograp">
        <div class="prograp-bar percent100"></div>
    </div>
    <div class="survey-sub-contents ps20">
        <p>4. 우리 아이 유아식 식단에서 가장 중요하게 생각하는 부분은 어떤 것인가요?</p>
        <div class="select gogo">
            <input type="radio" name="impo-you" id=impo-you01 value="재료">
            <label for="impo-you01">아기 편식을 고칠 수 있는 다양한 식단이면 좋겠어요.</label>
            <input type="radio" name="impo-you" id=impo-you02 value="한우">
            <label for="impo-you02">필수 영양분이 균형을 이루는 식단이면 좋겠어요. </label>
            <input type="radio" name="impo-you" id=impo-you03 value="가성비">
            <label for="impo-you03">필수 영양분 외에도 풍성한 식단이면 좋겠어요.</label>
            <input type="radio" name="impo-you" id=impo-you04 value="마음대로">
            <label for="impo-you04">우리 아기에게 꼭 맞춘 식단을 먹이고 싶어요.</label>
        </div>
    </div>
</div>
<!-- page15 -->
<div class="survey-sub fade">
    <div class="step">
        <ul>
            <li>기본정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li>섭취정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li class="on">건강정보</li>
        </ul>
    </div>
    <div class="prograp">
        <div class="prograp-bar percent33"></div>
    </div>
    <div class="survey-sub-contents ps20">
        <p>1. 기존 음식을 먹거나, 알레르기 테스트에서 반응이 나타난 재료를 모두 선택해주세요.</p>
        <div class="checkbox02 check02mb">
            <input type="checkbox" name="cook-you[]" id=cook-you01 value="가지">
            <label for="cook-you01">가지</label> 
            <input type="checkbox" name="cook-you[]" id=cook-you02 value="감자">
            <label for="cook-you02">감자</label>
            <input type="checkbox" name="cook-you[]" id=cook-you03 value="강남콩">
            <label for="cook-you03">강남콩</label>
            <input type="checkbox" name="cook-you[]" id=cook-you04 value="건미역">
            <label for="cook-you04">건미역</label>
            <input type="checkbox" name="cook-you[]" id=cook-you05 value="고구마">
            <label for="cook-you05">고구마</label>
            <input type="checkbox" name="cook-you[]" id=cook-you06 value="귀리">
            <label for="cook-you06">귀리</label> 
            <input type="checkbox" name="cook-you[]" id=cook-you07 value="근대">
            <label for="cook-you07">근대</label>
            <input type="checkbox" name="cook-you[]" id=cook-you08 value="김">
            <label for="cook-you08">김</label>
            <input type="checkbox" name="cook-you[]" id=cook-you09 value="노란콩가루">
            <label for="cook-you09" class="lh20">노란콩<br>가루</label>
            <input type="checkbox" name="cook-you[]" id=cook-you10 value="느타리">
            <label for="cook-you10">느타리</label>
            <input type="checkbox" name="cook-you[]" id=cook-you11 value="단호박">
            <label for="cook-you11">단호박</label>
            <input type="checkbox" name="cook-you[]" id=cook-you12 value="닭고기">
            <label for="cook-you12">닭고기</label>
            <input type="checkbox" name="cook-you[]" id=cook-you13 value="당근">
            <label for="cook-you13">당근</label>
            <input type="checkbox" name="cook-you[]" id=cook-you14 value="돌나무">
            <label for="cook-you14">돌나무</label>
            <input type="checkbox" name="cook-you[]" id=cook-you15 value="무">
            <label for="cook-you15">무</label>
            <input type="checkbox" name="cook-you[]" id=cook-you16 value="배">
            <label for="cook-you16">배</label>
            <input type="checkbox" name="cook-you[]" id=cook-you17 value="배추">
            <label for="cook-you17">배추</label>
            <input type="checkbox" name="cook-you[]" id=cook-you18 value="보리">
            <label for="cook-you18">보리</label>
            <input type="checkbox" name="cook-you[]" id=cook-you19 value="봄동">
            <label for="cook-you19">봄동</label>
            <input type="checkbox" name="cook-you[]" id=cook-you20 value="부추">
            <label for="cook-you20">부추</label>
            <input type="checkbox" name="cook-you[]" id=cook-you21 value="브로콜리">
            <label for="cook-you21">브로콜리</label>
            <input type="checkbox" name="cook-you[]" id=cook-you22 value="비타민">
            <label for="cook-you22">비타민</label>
            <input type="checkbox" name="cook-you[]" id=cook-you23 value="비트">
            <label for="cook-you23">비트</label>
            <input type="checkbox" name="cook-you[]" id=cook-you24 value="사과">
            <label for="cook-you24">사과</label>
            <input type="checkbox" name="cook-you[]" id=cook-you25 value="새송이">
            <label for="cook-you25">새송이</label>
            <input type="checkbox" name="cook-you[]" id=cook-you26 value="수수">
            <label for="cook-you26">수수</label>
            <input type="checkbox" name="cook-you[]" id=cook-you27 value="시금치">
            <label for="cook-you27">시금치</label>
            <input type="checkbox" name="cook-you[]" id=cook-you28 value="쌀">
            <label for="cook-you28">쌀</label>
            <input type="checkbox" name="cook-you[]" id=cook-you29 value="쌀가루">
            <label for="cook-you29">쌀가루</label>
            <input type="checkbox" name="cook-you[]" id=cook-you30 value="아욱">
            <label for="cook-you30">아욱</label>
            <input type="checkbox" name="cook-you[]" id=cook-you31 value="애호박">
            <label for="cook-you31">애호박</label>
            <input type="checkbox" name="cook-you[]" id=cook-you32 value="양배추">
            <label for="cook-you32">양배추</label>
            <input type="checkbox" name="cook-you[]" id=cook-you33 value="양송이">
            <label for="cook-you33">양송이</label>
            <input type="checkbox" name="cook-you[]" id=cook-you34 value="양파">
            <label for="cook-you34">양파</label>
            <input type="checkbox" name="cook-you[]" id=cook-you35 value="연근">
            <label for="cook-you35">연근</label>
            <input type="checkbox" name="cook-you[]" id=cook-you36 value="연두부">
            <label for="cook-you36">연두부</label>
            <input type="checkbox" name="cook-you[]" id=cook-you37 value="열무">
            <label for="cook-you37">열무</label>
            <input type="checkbox" name="cook-you[]" id=cook-you38 value="오이">
            <label for="cook-you38">오이</label>
            <input type="checkbox" name="cook-you[]" id=cook-you39 value="옥수수">
            <label for="cook-you39">옥수수</label>
            <input type="checkbox" name="cook-you[]" id=cook-you40 value="완두콩가루">
            <label for="cook-you40" class="lh20">완두콩<br>가루</label>
            <input type="checkbox" name="cook-you[]" id=cook-you41 value="우엉">
            <label for="cook-you41">우엉</label>
            <input type="checkbox" name="cook-you[]" id=cook-you42 value="적채">
            <label for="cook-you42">적채</label>
            <input type="checkbox" name="cook-you[]" id=cook-you43 value="전분">
            <label for="cook-you43">전분</label>
            <input type="checkbox" name="cook-you[]" id=cook-you44 value="쪽파">
            <label for="cook-you44">쪽파</label>
            <input type="checkbox" name="cook-you[]" id=cook-you45 value="차조">
            <label for="cook-you45">차조</label>
            <input type="checkbox" name="cook-you[]" id=cook-you46 value="참나물">
            <label for="cook-you46">참나물</label>
            <input type="checkbox" name="cook-you[]" id=cook-you47 value="찹쌀">
            <label for="cook-you47">찹쌀</label>
            <input type="checkbox" name="cook-you[]" id=cook-you48 value="찹쌀가루">
            <label for="cook-you48">찹쌀가루</label>
            <input type="checkbox" name="cook-you[]" id=cook-you49 value="청경채">
            <label for="cook-you49">청경채</label>
            <input type="checkbox" name="cook-you[]" id=cook-you50 value="취나물">
            <label for="cook-you50">취나물</label>
            <input type="checkbox" name="cook-you[]" id=cook-you51 value="치즈">
            <label for="cook-you51">치즈</label>
            <input type="checkbox" name="cook-you[]" id=cook-you52 value="케일">
            <label for="cook-you52">케일</label>
            <input type="checkbox" name="cook-you[]" id=cook-you53 value="파프리카">
            <label for="cook-you53">파프리카</label>
            <input type="checkbox" name="cook-you[]" id=cook-you54 value="팽이">
            <label for="cook-you54">팽이</label>
            <input type="checkbox" name="cook-you[]" id=cook-you55 value="표고">
            <label for="cook-you55">표고</label>
            <input type="checkbox" name="cook-you[]" id=cook-you56 value="한우">
            <label for="cook-you56">한우</label>
            <input type="checkbox" name="cook-you[]" id=cook-you57 value="현미">
            <label for="cook-you57">현미</label>
            <input type="checkbox" name="cook-you[]" id=cook-you58 value="흑미">
            <label for="cook-you58">흑미</label>
            <input type="checkbox" name="cook-you[]" id=cook-you59 value="깻잎">
            <label for="cook-you59">깻잎</label>
            <input type="checkbox" name="cook-you[]" id=cook-you60 value="대추">
            <label for="cook-you60">대추</label>
            <input type="checkbox" name="cook-you[]" id=cook-you61 value="마늘쫑">
            <label for="cook-you61">마늘쫑</label>
            <input type="checkbox" name="cook-you[]" id=cook-you62 value="방울토마토">
            <label for="cook-you62" class="lh20">방울<br>토마토</label>
            <input type="checkbox" name="cook-you[]" id=cook-you63 value="병아리콩">
            <label for="cook-you63">병아리콩</label>
            <input type="checkbox" name="cook-you[]" id=cook-you64 value="세발나물">
            <label for="cook-you64">세발나물</label>
            <input type="checkbox" name="cook-you[]" id=cook-you65 value="아몬드">
            <label for="cook-you65">아몬드</label>
            <input type="checkbox" name="cook-you[]" id=cook-you66 value="팥가루">
            <label for="cook-you66">팥가루</label>
            <input type="checkbox" name="cook-you[]" id=cook-you67 value="피망">
            <label for="cook-you67">피망</label>
            <input type="checkbox" name="cook-you[]" id=cook-you68 value="렌틸콩">
            <label for="cook-you68">렌틸콩</label>
            <input type="checkbox" name="cook-you[]" id=cook-you69 value="루꼴라">
            <label for="cook-you69">루꼴라</label>
            <input type="checkbox" name="cook-you[]" id=cook-you70 value="밤">
            <label for="cook-you70">밤</label>
            <input type="checkbox" name="cook-you[]" id=cook-you71 value="블루베리">
            <label for="cook-you71">블루베리</label>
            <input type="checkbox" name="cook-you[]" id=cook-you72 value="안심">
            <label for="cook-you72">안심</label>
            <input type="checkbox" name="cook-you[]" id=cook-you73 value="잣">
            <label for="cook-you73">잣</label>
            <input type="checkbox" name="cook-you[]" id=cook-you74 value="콜라비">
            <label for="cook-you74">콜라비</label>                    
            <input type="checkbox" name="cook-you[]" id=cook-you75 value="퀴노아">
            <label for="cook-you75">퀴노아</label>             
            <input type="checkbox" name="cook-you[]" id=cook-you76 value="테프가루">
            <label for="cook-you76">테프가루</label>                           
            <input type="checkbox" name="cook-you[]" id=cook-you77 value="홍미">
            <label for="cook-you77">홍미</label>  
        </div>
        <div class="text-box">
            <textarea class="DOC_TEXT" name="DOC_TEXT04"value="text" placeholder="해당 재료와 증상을 입력해 주세요. 예시) 일주일 전 단호박을 먹고 1시간 정도 후에 가려운 증상이 있었어요."></textarea> 
            <span id="counter">(0 / 최대 200자)</span>
        </div>
        <div class="one-speak text-box-padding">
            <p>도담밀의 한마디!</p>
            <div class="speak">
                <p>돌 전의 알레르기 증상은 소화기관이 충분히 발달하지 않아 생기는 경우가 많아요. 이러한 알레르기 증상은 소화기관이 발달하는 돌 이후에 없어지기도 한답니다. 도담밀에서는 돌 이전에 식품 섭취로 인해 발생한 알레르기의 경우 유아식에서 한 번 더 시도하고, 또 증상이 나타날 경우 알러지 대체 메뉴를 제공하고 있습니다.</p>
            </div>
        </div>
    </div>
</div>
<!-- 팝업 -->
<!-- page16 -->
<!-- 수정 -->
<div class="survey-sub fade">
    <div class="step">
        <ul>
            <li>기본정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li>시기추천</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li>섭취정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li class="on">건강정보</li>
        </ul>
    </div>
    <div class="prograp">
        <div class="prograp-bar percent66"></div>
    </div>
    <div class="survey-sub-contents ps20">
        <p>3. 다음 중 최근 한 달 사이에 자주 나타난 증상이 있나요?</p>
        <div class="radio radio-two">
            <input type="checkbox" name="sick-two[]" id="sick-two01" value="변비">
            <label for="sick-two01">변비</label>
            <input type="checkbox" name="sick-two[]" id=sick-two02 value="설사">
            <label for="sick-two02">설사 </label>
            <input type="checkbox" name="sick-two[]" id="sick-two03" value="구토">
            <label for="sick-two03">구역질,구토</label>
            <input type="checkbox" name="sick-two[]" id=sick-two04 value="발열">
            <label for="sick-two04">발열</label>
            <input type="checkbox" name="sick-two[]" id=sick-two05 value="호흡기">
            <label for="sick-two05">호흡기 증상</label>
            <input type="checkbox" name="sick-two[]" id=sick-two06 value="증상없음">
            <label for="sick-two06">증상 없음</label>
        </div>
    </div>
</div>
    <!-- popup -->
    <!-- 변비 팝업 -->
    <div class="popup-page_001">
        <div class="dark-box">
            <div class="popup-sub">
                <div class="container">
                    <div class="pop-list_01">
                        <h5>변비</h5>
                        <img src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="Arrow1">
                        <div class="checkbox checkbox-one" id="radio_01">
                            <input type="checkbox" id="con-sick01" name="con-sick[]" value="병원" class="con-sick01">
                            <label for="con-sick01">병원에서 변비 진단을 받았어요.</label>
                            <input type="checkbox" id="con-sick02" name="con-sick[]" value="배"class="con-sick01">
                            <label for="con-sick02">배가 불록하고 단단한테, 변을 보지 않아요.</label>
                            <input type="checkbox" id="con-sick03" name="con-sick[]" value="굵고"class="con-sick01">
                            <label for="con-sick03">굵고 단단한 변이 나와요.</label>
                            <input type="checkbox" id="con-sick04" name="con-sick[]" value="항문"class="con-sick01">
                            <label for="con-sick04">항문에 피가 묻어나와요.</label>
                            <input type="checkbox" id="con-sick05" name="con-sick[]" value="화장실" class="con-sick01">
                            <label for="con-sick05">화장실을 가기 싫어하고,배변 시 불편해하거나 아파해요.</label>
                            <input type="checkbox" id="con-sick06" name="con-sick[]" value="배변" class="con-sick01">
                            <label for="con-sick06">평상시와 달리 2일 또는 3일 동안 배변 활동을 못 했어요.</label>
                            <div class="btn-check fade">
                                <div>
                                    <p>선택 완료</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 설사 -->
    <div class="popup-page_002">
        <div class="dark-box">
            <div class="popup-sub">
                <div class="container">
                    <div class="pop-list_02">
                        <h5>설사</h5>
                        <img src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="Arrow1">
                        <div class="checkbox checkbox-one" id="radio_02">
                            <input type="checkbox" id="diarsick01" name="diarsick[]" value="병원" class="diarsick01">
                            <label for="diarsick01">병원에서 변비 진단을 받았어요.</label>
                            <input type="checkbox" id="diarsick02" name="diarsick[]" value="장염" class="diarsick01">
                            <label for="diarsick02">장염, 식중독 등 특정 질환 때문에 설사를 해요.</label>
                            <input type="checkbox" id="diarsick03" name="diarsick[]" value="하루" class="diarsick01">
                            <label for="diarsick03">하루 평균 3회 이상 묽은 변이 나와요.</label>
                            <input type="checkbox" id="diarsick04" name="diarsick[]" value="대변량" class="diarsick01">
                            <label for="diarsick04">하루 대변량의 체중(kg)당 10~20g 이상이에요.</label>
                            <div class="btn-check fade">
                                <div>
                                    <p>선택 완료</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 구역질,구토 -->
    <div class="popup-page_003">
        <div class="dark-box">
            <div class="popup-sub">
                <div class="container">
                    <div class="pop-list_03">
                        <h5>구역질,구토</h5>
                        <img src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="Arrow1">
                        <div class="checkbox checkbox-one" id="radio_03">
                            <input type="checkbox" id="goo-sick01" name="goo-sick" class="goo-sick01">
                            <label for="goo-sick01">식중독, 알레르기 등 특정 질환때문에 구토를 해요.</label>
                            <div class="info blue">&middot;&nbsp; 구토 횟수와 시기는 숫자만 입력해주세요.</div>
                            <div class="goo02">
                                <p>구토 횟수</p>
                                <select name="goo-sicks" id="goo-sick02">
                                    <option value="1">1회/하루</option>
                                    <option value="2">2회/하루</option>
                                    <option value="3">3회/하루</option>
                                    <option value="4">4회/하루</option>
                                    <option value="5">5회/하루</option>
                                    <option value="6">6회/하루</option>
                                    <option value="7">7회/하루</option>
                                    <option value="8">8회/하루</option>
                                    <option value="9">9회/하루</option>
                                    <option value="10">10회/하루</option>
                                </select>
                            </div>
                            <p>구토시기 :</p>
                            <div class="goo03">
                                <p>주로 식후&nbsp;</p>
                                <select name="goo-sickss" id="goo-sick03">
                                    <option value="10">10분</option>
                                    <option value="20">20분</option>
                                    <option value="30">30분</option>
                                    <option value="40">40분</option>
                                    <option value="50">50분</option>
                                    <option value="60">60분</option>
                                    <option value="70">70분</option>
                                    <option value="80">80분</option>
                                    <option value="90">90분</option>
                                    <option value="100">100분</option>
                                    <option value="110">110분</option>
                                    <option value="120">120분</option>
                                </select><hr>
                                <p>&nbsp;분 정도 후에 구토를 해요.</p>
                            </div>
                            <div class="btn-check fade">
                                <div>
                                    <p>선택 완료</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 발열 -->
    <div class="popup-page_004">
        <div class="dark-box">
            <div class="popup-sub">
                <div class="container">
                    <div class="pop-list_04">
                        <h5>발열</h5>
                        <img src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="Arrow1">
                        <div class="checkbox checkbox-one" id="radio_04">
                            <input type="checkbox" id="foot-sick01" name="foot-sick[]" value="감기" class="foot-sick01">
                            <label for="foot-sick01">감기, 폐렴 등 특정 질환때문에 열이 나요.</label>
                            <input type="checkbox" id="foot-sick02" name="foot-sick[]" value="액와" class="foot-sick01">
                            <label for="foot-sick02">액와(겨드랑이 안쪽) 부위 체온이 37.4℃ 이상이에요.</label>
                            <input type="checkbox" id="foot-sick03" name="foot-sick[]" value="구강" class="foot-sick01">
                            <label for="foot-sick03">구강 또는 고막 체온이 37.6℃ 이상이에요.</label>
                            <input type="checkbox" id="foot-sick04" name="foot-sick[]" value="항문" class="foot-sick01">
                            <label for="foot-sick04">항문 체온이 38℃ 이상이에요.</label>
                            <div class="btn-check fade">
                                <div>
                                    <p>선택 완료</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 호흡기 증상 -->
    <div class="popup-page_005">
        <div class="dark-box">
            <div class="popup-sub">
                <div class="container">
                    <div class="pop-list_05">
                        <h5>호흡기</h5>
                        <img src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="Arrow1">
                        <div class="checkbox checkbox-one" id="radio_05">
                            <input type="checkbox" id="breath-sick01" name="breath-sick[]" value="감기" class="breath-sick01">
                            <label for="breath-sick01">감기, 폐렴 등 특정 질환때문에 열이 나요.</label>
                            <input type="checkbox" id="breath-sick02" name="breath-sick[]" value="액와" class="breath-sick01">
                            <label for="breath-sick02">액와(겨드랑이 안쪽) 부위 체온이 37.4℃ 이상이에요.</label>
                            <input type="checkbox" id="breath-sick03" name="breath-sick[]" value="구강" class="breath-sick01">
                            <label for="breath-sick03">구강 또는 고막 체온이 37.6℃ 이상이에요.</label>
                            <input type="checkbox" id="breath-sick04" name="breath-sick[]" value="항문" class="breath-sick01">
                            <label for="breath-sick04">항문 체온이 38℃ 이상이에요.</label>
                            <div class="btn-check fade">
                                <div>
                                    <p>선택 완료</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- page17 -->
<div class="survey-sub fade showSlide-loding">
    <div class="step">
        <ul>
            <li>기본정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li>섭취정보</li>
            <li><img src="/wp-content/themes/storefront-child/con3/image/Arrow1.png" alt="Arrow1"></li>
            <li class="on">건강정보</li>
        </ul>
    </div>
    <div class="prograp">
        <div class="prograp-bar percent100"></div>
    </div> 
    <div class="survey-sub-contents ps20">
        <p>3. 위 문항 외에 다른 특이사항이 있거나, 병원에서 진단을 받은 적이 있나요?<br> <span>(있다면 자세히 적어주세요.)</span></p>
        <div class="text-box text-box-top">
                <textarea class="DOC_TEXT" name="DOC_TEXT05" value="text" placeholder="예시) 감기 – 감기에 자주 걸려요.(월 1회 정도) 빈혈 – 병원에서 철결핍성 빈혈 진단을 받았어요. 유아식 거부 – 아기가 유아식을 잘 안먹어요."></textarea> 
                <span id="counter">(0 / 최대 240자)</span>
        </div>
    </div>
</div> 

    <!-- <div class="survey-sub-contents ps20">
        <div class="sur-header">
            <p>답변 내용을 <br> 분석하고 있습니다.<br><p class="sur-p">답변해주신 내용을 바탕으로 우리 아기에게 꼭 맞는    식단을 추천해드립니다.</p></p>
        </div>
    </div>
    <div class="loding">
        <div class="loding-img">
            <div class="loding-img-box">
                <img src="/wp-content/themes/storefront-child/con3/image/loding-01.png" alt="loding">
                <img src="/wp-content/themes/storefront-child/con3/image/loding-02.png" alt="loding">
            </div>
        </div>
        <div class="loading-percent"></div>
    </div>
    <div class="loding-img-text">
        <p>잠시만 기다려 주세요!</p>
    </div>
    <div class="loading-banner">
        <img src="/wp-content/themes/storefront-child/con3/image/loading-banner01.png" alt="광고">
        <img src="/wp-content/themes/storefront-child/con3/image/loadding-banner02.png" alt="광고">
    </div> -->
</div>   


        <!-- 버튼 -->
        <div class="survey-btn"> 
            <ul>
                <li class="prev" onclick="moveSlide(-1)">< 이전</li>
                <li class="next" onclick="moveSlide(1)">다음 ></li>
                <!-- <li class="yoo-next" onclick="moveSlide(16)">다음 ></li> -->
                <!-- 문항 넘기기 -->
            </ul>
            <a class="no skip_01" onclick="moveSlide(3)">문항 넘어가기  ></a>
            <a class="no skip_02" onclick="moveSlide(2)">문항 넘어가기  ></a>
        </div>

        <!--마지막은 무조건 서밋!!! -->
        <!-- 미니보고서는 서밋 없어도 되게해놨는데 이건 안되있어요 -->
        <input type="submit">

    </form>
</div>

<script>
    
    // 설문페이지 변화
    var slideIndex = 0;
    var sub =  document.getElementsByClassName("survey-sub");
    var size = sub.length;
    var btn = document.getElementsByClassName("survey-btn");

    function moveSlide(n) {
        slideIndex = slideIndex + n;

        if(slideIndex < 0) {
            slideIndex = 0;
        }
            
        showSlide(slideIndex);
        $("html,body").animate({scrollTop:0});
    }
    function showSlide (n) {
        
        for(i = 0; i < sub.length; i++){
            sub[i].style.display = "none";
        }
        sub[n].style.display = "block";

        
 
    }
//    input 클릭시 버튼 나타나기
    $(".survey-sub .radio input").on("click",function(){
        $('.radio input').is(":checked");
        $(".survey-btn").fadeIn();
    });  
    $(".radio select").on("click",function(){
        $('.radio select').is(":selected");
        $(".survey-btn").fadeIn();
    })
    $(" .select select").on("click",function(){
        $('.radio select').is(":selected");
        $(".survey-btn").fadeIn();
        
    })
    $(".checkbox label").on("click",function(){
        $('.radio select').is(":selected");
        $(".survey-btn").fadeIn();
    });
    $(".select label").on("click",function(){
        $('.select label').is(":selected");
        $(".survey-btn").fadeIn();
    });
    $(".survey-btn").on("click",function(){
        $(".survey-btn p").addClass("no");
        $(".survey-btn a").addClass('no')
    }); 

    $(".checkbox02 label").on("click",function(){
        $('.checkbox2 input').is(":checked");
        $(".survey-btn").fadeIn();
    });
    $(".showSlide8").on("click",function(){
        $(".survey-btn p").removeClass("no");
        $(".survey-btn .skip_01").removeClass('no');
      $(".survey-btn .next").on("click",function(){
        $(".survey-btn p").addClass("no");
        $(".survey-btn .skip_01").addClass('no')
      })
    });
    $(".showSlide15").on("click",function(){
        $(".survey-btn p").removeClass("no");
        $(".survey-btn .skip_02").removeClass('no');
      $(".survey-btn .next").on("click",function(){
        $(".survey-btn p").addClass("no");
        $(".survey-btn .skip_02").addClass('no')
      })
    });
	$(".page01").on("click",function(){
        $(".survey-btn p").removeClass("no");
        $(".survey-btn .skip_01").removeClass('no');
      $(".survey-btn .next").on("click",function(){
        $(".survey-btn p").addClass("no");
        $(".survey-btn .skip_01").addClass('no')
      })
    });
    
//  이유식페이지 이동
  
    $("#yoo-go").one("click",function(){
            var yooch = $("#yoo-go").is(":checked");
        if(yooch){
           $(".next").one("click",function(){
            moveSlide(15);
            
           });

            
        }                
    }); 
//    로딩창 이동후 보고서 링크로 이동
// $(".showSlide-loding .DOC_TEXT").on("click",function(){
//     $(".next").addClass("loding");
// });
// $(".next").on("click",function(){

//     if($(".next").hasClass("loding")){
//         $(".survey-sub").css({"display":"none"});
//         $(".showSlide-last").css({"display":"block"});
//         setTimeout(function(){
//             location.href='http://test007.dothome.co.kr/con3report';
//         }, 3000);
//         var memberCountConTxt= 100;
//         $({ val : 0 }).animate({ val : memberCountConTxt }, {
//         duration: 3000,
//         step: function() {
//         var num = numberWithCommas(Math.floor(this.val));
//         $(".loading-percent").text(num + "%");
//         },
//         complete: function() {
//         var num = numberWithCommas(Math.floor(this.val));
//         $(".loading-percent").text(num + "%");
//         }
//         });
//         function numberWithCommas(x) {
//         return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    
//         }
//         }
// });
$(".showSlide-loding .DOC_TEXT").on("click",function(){
    $(".next").addClass("loding");
});
$(".next").on("click",function(){

    if($(".next").hasClass("loding")){
        $(".survey-sub").css({"display":"none"});
        $(".showSlide-last").css({"display":"block"});
        setTimeout(function(){
            location.href='http://test007.dothome.co.kr';
        }, 10000);
        var memberCountConTxt= 0;
        $({ val : 10 }).animate({ val : memberCountConTxt }, {
        duration: 11000,
        step: function() {
        var num = numberWithCommas(Math.floor(this.val));
        $(".edit-count").text(num );
        },
        complete: function() {
        var num = numberWithCommas(Math.floor(this.val));
        $(".edit-count").text(num );
        }
        });
        function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})-(?!\d))/g, ",");
    
        }
        }
});

    
    // 버튼 클릭시 사라지기
    $(".prev").on("click",function(){
        $(".survey-btn").addClass("active");
    })
    $(".next").on("click",function(){
        $(".survey-btn").hide();
    });
    // textarea
    $('.DOC_TEXT').keyup(function (e){
    var content = $(this).val();
    $('#counter').html("("+content.length+" / 200)");    //글자수 실시간 카운팅
});
</script>
 

<!-- popup -->
<script>
    // 팝업 체크박스 클리시 닫기 버튼 활성화
    for(var i = 1; i < 6; i++){
        $(".pop-list_0"+[i]+" input").on("click",function(){
        $(".pop-list_0"+[i]+" input").is("checked");
        pop_btn.addClass("on");
    });
    }

    
    // 변비판업
    var input01 = $("#sick01")
    var popup01 = $(".popup-page_01")
   
    var pop_btn = $(".btn-check")
    var btn_img = $(".popup-sub img");

       // 선택 완료후 팝업 닫기
       btn_img.click(function(){
        for(i = 0; i < 6; i++){
        $(".popup-page_0"+[i]).css({"position":"absolute","top":"115%"});
        $(".popup-page_0"+[i]).css({"opacity":"0"});
        $(".btn-check").removeClass("on")
        }
    });
    // 닫기 버튼 클릭
    pop_btn.click(function(){
        for(i = 0; i < 6; i++){
        $(".popup-page_0"+[i]).css({"position":"absolute","top":"115%"});
        $(".popup-page_0"+[i]).css({"opacity":"0"});
        $(".btn-check").removeClass("on")
        }
    });

    // input checked 확인 및 내용 제거
    input01.click(function(){
        var inpch01 = $("#sick01").is(":checked");
        if (inpch01){
            popup01.css({"position":"absolute","top":"0%"});
            popup01.css({"opacity":"1"});
        }else {
            popup01.css({"position":"absolute","top":"115%"});
            popup01.css({"opacity":"0"});
            $(".sick001").prop("checked",false);
        }
    });

    var input02 = $("#sick02")
    var popup02 = $(".popup-page_02")
    // input checked 확인 및 내용 제거
    input02.click(function(){
        var inpch02 = $("#sick02").is(":checked");
        if (inpch02){
            popup02.css({"position":"absolute","top":"0%"});
            popup02.css({"opacity":"1"});
        }else {
            popup02.css({"position":"absolute","top":"115%"});
            popup02.css({"opacity":"0"});
            $(".sick002").prop("checked",false);
        }
    });

    var input03 = $("#sick03")
    var popup03 = $(".popup-page_03")
    // input checked 확인 및 내용 제거
    input03.click(function(){
        var inpch03 = $("#sick03").is(":checked");
        if (inpch03){
            popup03.css({"position":"absolute","top":"0%"});
            popup03.css({"opacity":"1"});
        }else {
            popup03.css({"position":"absolute","top":"115%"});
            popup03.css({"opacity":"0"});
            $(".sick003").prop("checked",false);
        }
    });

    var input04 = $("#sick04")
    var popup04 = $(".popup-page_04")
    // input checked 확인 및 내용 제거
    input04.click(function(){
        var inpch04 = $("#sick04").is(":checked");
        if (inpch04){
            popup04.css({"position":"absolute","top":"0%"});
            popup04.css({"opacity":"1"});
        }else {
            popup04.css({"position":"absolute","top":"115%"});
            popup04.css({"opacity":"0"});
            $(".sick004").prop("checked",false);
        }
    });
    
    var input05 = $("#sick05")
    var popup05 = $(".popup-page_05")
    // input checked 확인 및 내용 제거
    input05.click(function(){
        var inpch05 = $("#sick05").is(":checked");
        if (inpch05){
            popup05.css({"position":"absolute","top":"0%"});
            popup05.css({"opacity":"1"});
        }else {
            popup05.css({"position":"absolute","top":"115%"});
            popup05.css({"opacity":"0"});
            $(".sick005").prop("checked",false);
            $(">sick005").val("");
        }
    });
</script>
<!--  팝업2 -->
<script>
        // 팝업 체크박스 클리시 닫기 버튼 활성화
        for(var i = 1; i < 6; i++){
        $(".pop-list_0"+[i]+" input").on("click",function(){
        $(".pop-list_0"+[i]+" input").is("checked");
        pop_btn.addClass("on");
    });
    }
    
    // 변비판업
 
   
    var pop_btn = $(".btn-check")
    var btn_img = $(".popup-sub img");

       // 선택 완료후 팝업 닫기
       btn_img.click(function(){
        for(i = 0; i < 6; i++){
        $(".popup-page_00"+[i]).css({"position":"absolute","top":"115%"});
        $(".popup-page_00"+[i]).css({"opacity":"0"});
        $(".btn-check").removeClass("on")
        }
    });
    // 닫기 버튼 클릭
    pop_btn.click(function(){
        for(i = 0; i < 6; i++){
        $(".popup-page_00"+[i]).css({"position":"absolute","top":"115%"});
        $(".popup-page_00"+[i]).css({"opacity":"0"});
        $(".btn-check").removeClass("on")
        }
    });

    var input001 = $("#sick-two01")
    var popup001 = $(".popup-page_001")

    // input checked 확인 및 내용 제거
    input001.click(function(){
        var inpch001 = $("#sick-two01").is(":checked");
        if (inpch001){
            popup001.css({"position":"absolute","top":"0%"});
            popup001.css({"opacity":"1"});
        }else {
            popup001.css({"position":"absolute","top":"115%"});
            popup001.css({"opacity":"0"});
            $(".con-sick01").prop("checked",false);
        }
    });

    var input002 = $("#sick-two02")
    var popup002 = $(".popup-page_002")
    // input checked 확인 및 내용 제거
    input002.click(function(){
        var inpch002 = $("#sick-two02").is(":checked");
        if (inpch002){
            popup002.css({"position":"absolute","top":"0%"});
            popup002.css({"opacity":"1"});
        }else {
            popup002.css({"position":"absolute","top":"115%"});
            popup002.css({"opacity":"0"});
            $(".diarsick01").prop("checked",false);
        }
    });

    var input003 = $("#sick-two03")
    var popup003 = $(".popup-page_003")
    // input checked 확인 및 내용 제거
    input003.click(function(){
        var inpch003 = $("#sick-two03").is(":checked");
        if (inpch003){
            popup003.css({"position":"absolute","top":"0%"});
            popup003.css({"opacity":"1"});
        }else {
            popup003.css({"position":"absolute","top":"115%"});
            popup003.css({"opacity":"0"});
            $(".goo-sick01").prop("checked",false);
        }
    });

    var input004 = $("#sick-two04")
    var popup004 = $(".popup-page_004")
    // input checked 확인 및 내용 제거
    input004.click(function(){
        var inpch004 = $("#sick-two04").is(":checked");
        if (inpch004){
            popup004.css({"position":"absolute","top":"0%"});
            popup004.css({"opacity":"1"});
        }else {
            popup004.css({"position":"absolute","top":"115%"});
            popup004.css({"opacity":"0"});
            $(".foot-sick01").prop("checked",false);
        }
    });
    var input005 = $("#sick-two05")
    var popup005 = $(".popup-page_005")
    // input checked 확인 및 내용 제거
    input005.click(function(){
        var inpch005 = $("#sick-two05").is(":checked");
        if (inpch005){
            popup005.css({"position":"absolute","top":"0%"});
            popup005.css({"opacity":"1"});
        }else {
            popup005.css({"position":"absolute","top":"115%"});
            popup005.css({"opacity":"0"});
            $(".breath-sick01").prop("checked",false);
        }
    });
</script>
<script>    
        var pop_btn = $(".btn-check")
        var btn_img = $(".popup-sub img");
        var pp = $(".pp")
        var pppage = $(".popup-page")

        // 닫기 버튼 클릭
        btn_img.click(function(){
            pppage.css({"position":"absolute","top":"115%"});
            pppage.css({"opacity":"0"});
            $(".btn-check").removeClass("on")
        });
     
        // input checked 확인 및 내용 제거
        pp.click(function(){
            pppage.css({"position":"absolute","top":"0%"});
            pppage.css({"opacity":"1"});
        });

</script>
<!-- text-box 체크확인 -->
<script>
    $(".text-box").on("click",function(){
        $(".survey-btn").fadeIn();
    })
</script>
 <script>
        // pp
        $("#pppp").on("click",function(){
        $(".sur_01").css({"display":"none"});
        $(".sur_02").css({"display":"block"});
    });
 

</script>

<!-- 설문조사 페이지 이동 -->
<!-- 페이지 상당 스크롤 -->
<script>
    $(".time-go").on("click",function(){
        $(".sur_02").css({"display":"none"});
        $(".sur_03").css({"display":"block"});
        $("html,body").animate({scrollTop:0});
    });
  

    $(".food-go").on("click",function(){
        $(".sur_02").css({"display":"none"});
        moveSlide(7);
    });

    $("#pppp").on("click",function(){
        $("html,body").animate({scrollTop:0});
    });
</script>

<script>
 
    //유아식 유아식 갈림
    var day, month, year;
    // var average = $("input[name='average']").is("checked");
    //     $(".next").on("click",function(){
    //         if(average && result > 365);{
    //         var Dday  = new Date($('#redate').val());
    //         var now = new Date();   
    //         var gap = now.getTime() - Dday.getTime();                 
    //         var result = Math.floor(gap / (1000 * 60 * 60 * 24)) * 1;            
    //         moveSlide(8);
    //     }
    //     });
     
        $(".sur02-btn").on("click",function(){
            
           
            var Dday  = new Date($('#redate').val());
            var now = new Date();   
            var gap = now.getTime() - Dday.getTime();                 
            var result = Math.floor(gap / (1000 * 60 * 60 * 24)) * 1; 
          
           if( result > 390){
				moveSlide(16);
				$(".sur_02").css({"display":"none"});
            }
			else{
				moveSlide(0);
				$(".sur_02").css({"display":"none"});
			}
        });
        // // 시기선택 추천받기
        // $(".radio-food-go").on("click",function(){
        //     $(".food-go").fadeIn();
        // })
    
</script>
<script>
$(document).onload(function(){
	$("body,html").animate({scrollTop:0});
})
</script>
 

<!--여기까지-->

<?php
do_action( 'storefront_sidebar' );
get_footer();
  