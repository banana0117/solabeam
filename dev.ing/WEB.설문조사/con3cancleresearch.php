<?php
/**
 * Template Name: con3cancleresearch
 */

get_header(); ?>

<?php

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
$current_user = wp_get_current_user();
$user_id = $current_user->user_login;

$today = date("Y-m-d");

?>

<style>
    input[type='checkbox']+label,
    input[type='radio']+label {
        margin: 0;
    }
    @media screen and (min-width: 1024px) {
    .user-bar {max-width: 418px;}
    .cler-pop {left: 50%; max-width:418px;}
    .cler-pop-btn {left:66%; width:100%; max-width:378px;}
}
</style>

<div class="section">
    <form method="POST" action="">
    <input type="hidden" name="userid" value="<?php echo $user_id ?>">
        <div class="cler-page01 fade">
            <div class="cler-page ps20">
                <div class="user-bar"></div>
                <p class="userr-title">도담밀 이용 만족도 조사</p>
                <p class="userr-title-text">들려주신 의견을 바탕으로 도담밀 서비스가<br>개선됩니다.</p>
                <div class="cler-img">
                    <img src="/wp-content/themes/storefront-child/con3/image/cler-bg.png" alt="배경">
                    <img src="/wp-content/themes/storefront-child/con3/image/cler-img.png" alt="영양사">
                </div>
                <div class="eu">
                    <p>도담밀을 이용하지 않게 된 이유를<br> 알려주시겠어요?</p>
                </div>
                <div class="cler-qu">
                    <input type="checkbox" name="cler[]" id="cler-01" value="추후">
                    <label for="cler-01">1.추후 재가입 예정</label>
                    <input type="checkbox" name="cler[]" id="cler-02" value="유아식">
                    <label for="cler-02">2. 유아식 진행 예정으로</label>
                    <input type="checkbox" name="cler[]" id="cler-03" value="유아식끝">
                    <label for="cler-03">3. 유아식 시기가 지나서</label>
                    <input type="checkbox" name="cler[]" id="cler-04" value="시간부족">
                    <label for="cler-04">4. 이유식(유아식)만들 시간이 부족해서</label>
                    <input type="checkbox" name="cler[]" id="cler-05" value="비싸서">
                    <label for="cler-05">5. 이용 금액이 부담스러워서</label>
                    <input type="checkbox" name="cler[]" id="cler-06" value="재료">
                    <label for="cler-06">6. 재료가 만족스럽지 못해서</label>
                    <input type="checkbox" name="cler[]" id="cler-07" value="배송">
                    <label for="cler-07">7. 배송 서비스가 만족스럽지 못해서</label>
                    <input type="checkbox" name="cler[]" id="cler-08" value="만족못함">
                    <label for="cler-08">8. 서비스 만족도가 낮아서</label>
                    <input type="checkbox" name="cler[]" id="cler-09" value="기타사유">
                    <label for="cler-09">9. 기타</label>
                </div>

                <!-- 팝업 -->
                <!-- 2 -->
                <div class="cler-pop cler-pop_02">
                    <div class="cler-pop-container">
                        <div class="cler-pop-title">
                            <p>유아식 진행 예정으로</p>
                            <div class="cler-pop-title-img">
                                <img src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="닫기">
                            </div>
                        </div>
                        <div class="cler-pop-inner ps20">
                            <p>2-1. 유아식은 어떻게 먹이실 예정인가요?</p>
                            <div class="cler-flex">
                                <input type="checkbox" name="cler-pop02[]" id="cler-pop02_01" class="cler-pop02"
                                    value="직접조리">
                                <label for="cler-pop02_01">직접 조리</label>
                                <input type="checkbox" name="cler-pop02[]" id="cler-pop02_02" class="cler-pop02"
                                    value="시판유아식">
                                <label for="cler-pop02_02">시판 유아식</label>
                                <input type="checkbox" name="cler-pop02[]" id="cler-pop02_03" class="cler-pop02"
                                    value="배달유아식">
                                <label for="cler-pop02_03">배달 유아식</label>
                                <input type="checkbox" name="cler-pop02[]" id="cler-pop02_04" class="cler-pop02"
                                    value="혼합">
                                <label for="cler-pop02_04">혼합</label>
                                <input type="checkbox" name="cler-pop02[]" id="cler-pop02_05" class="cler-pop02"
                                    value="그 외">
                                <label for="cler-pop02_05">그 외</label>
                            </div>
                        </div>
                        <div class="cler-pop-btn btn">
                            <p>선택 완료</p>
                        </div>
                    </div>
                </div>
                <!-- 4 -->
                <div class="cler-pop cler-pop_04">
                    <div class="cler-pop-container">
                        <div class="cler-pop-title">
                            <p>만들 시간이 부족해서</p>
                            <div class="cler-pop-title-img">
                                <img src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="닫기">
                            </div>
                        </div>
                        <div class="cler-pop-inner ps20">
                            <p>4-1. 유아식은 어떻게 먹이실 예정인가요?</p>
                            <div class="cler-flex">
                                <input type="checkbox" name="cler-pop04[]" id="cler-pop04_01" class="cler-pop04"
                                    value="시판">
                                <label for="cler-pop04_01">시판 이유식(유아식)</label>
                                <input type="checkbox" name="cler-pop04[]" id="cler-pop04_02" class="cler-pop04"
                                    value="배달">
                                <label for="cler-pop04_02">배달 이유식(유아식)</label>
                                <input type="checkbox" name="cler-pop04[]" id="cler-pop04_03" class="cler-pop04"
                                    value="혼합">
                                <label for="cler-pop04_03">혼합</label>
                                <input type="checkbox" name="cler-pop04[]" id="cler-pop04_04" class="cler-pop04"
                                    value="그">
                                <label for="cler-pop04_04">그 외</label>
                            </div>
                        </div>
                        <div class="cler-pop-btn btn">
                            <p>선택 완료</p>
                        </div>
                    </div>
                </div>
                <!-- 5 -->
                <div class="cler-pop cler-pop_05">
                    <div class="cler-pop-container">
                        <div class="cler-pop-title">
                            <p>이용 금액이 부담스러워서</p>
                            <div class="cler-pop-title-img">
                                <img src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="닫기">
                            </div>
                        </div>
                        <div class="cler-pop-inner ps20 mb50">
                            <p>5-1. 도담밀에서 먹었던 단계를 알려주세요.</p>
                            <div class="cler-flex">
                                <input type="checkbox" name="cler-pop05[]" id="cler-pop05_01" class="cler-pop05"
                                    value="준비기">
                                <label for="cler-pop05_01">준비기</label>
                                <input type="checkbox" name="cler-pop05[]" id="cler-pop05_02" class="cler-pop05"
                                    value="초기">
                                <label for="cler-pop05_02">초기</label>
                                <input type="checkbox" name="cler-pop05[]" id="cler-pop05_03" class="cler-pop05"
                                    value="중기">
                                <label for="cler-pop05_03">중기</label>
                                <input type="checkbox" name="cler-pop05[]" id="cler-pop05_04" class="cler-pop05"
                                    value="후기">
                                <label for="cler-pop05_04">후기</label>
                                <input type="checkbox" name="cler-pop05[]" id="cler-pop05_05" class="cler-pop05"
                                    value="유아식준비기">
                                <label for="cler-pop05_05">유아식 준비기</label>
                                <input type="checkbox" name="cler-pop05[]" id="cler-pop05_06" class="cler-pop05"
                                    value="유아식">
                                <label for="cler-pop05_06">유아식</label>
                            </div>
                            <p>5-2. 어느정도의 금액이 적절하다고 생각하세요?</p>
                            <div class="cler-flex">
                                <input type="checkbox" name="cler-pop05[]" id="cler-pop05_101" class="cler-pop05"
                                    value="10만원">
                                <label for="cler-pop05_101">월 10만원 이하</label>
                                <input type="checkbox" name="cler-pop05[]" id="cler-pop05_102" class="cler-pop05"
                                    value="15만원">
                                <label for="cler-pop05_102">월 15만원 이하</label>
                                <input type="checkbox" name="cler-pop05[]" id="cler-pop05_103" class="cler-pop05"
                                    value="20만원">
                                <label for="cler-pop05_103">월 20만원 이하</label>
                                <input type="checkbox" name="cler-pop05[]" id="cler-pop05_104" class="cler-pop05"
                                    value="25만원">
                                <label for="cler-pop05_104">월 25만원 이하</label>
                                <input type="checkbox" name="cler-pop05[]" id="cler-pop05_105" class="cler-pop05"
                                    value="30만원">
                                <label for="cler-pop05_105">월 30만원 이하</label>
                                <input type="checkbox" name="cler-pop05[]" id="cler-pop05_106" class="cler-pop05"
                                    value="35만원">
                                <label for="cler-pop05_106">월 35만원 이하</label>
                            </div>
                        </div>
                        <div class="cler-pop-btn btn">
                            <p>선택 완료</p>
                        </div>
                    </div>
                </div>
                <!-- 6 -->
                <div class="cler-pop cler-pop_06">
                    <div class="cler-pop-container">
                        <div class="cler-pop-title">
                            <p>재료가 만족스럽지 못해서</p>
                            <div class="cler-pop-title-img">
                                <img src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="닫기">
                            </div>
                        </div>
                        <div class="cler-pop-inner ps20">
                            <p>6-1. 구체적인 항목을 선택해주세요.</p>
                            <div class="cler-flex">
                                <input type="checkbox" name="cler-pop06[]" id="cler-pop06_01" class="cler-pop06"
                                    value="신선도">
                                <label for="cler-pop06_01">신선도</label>
                                <input type="checkbox" name="cler-pop06[]" id="cler-pop06_02" class="cler-pop06"
                                    value="포장">
                                <label for="cler-pop06_02">포장 상태</label>
                                <input type="checkbox" name="cler-pop06[]" id="cler-pop06_03" class="cler-pop06"
                                    value="유통기한">
                                <label for="cler-pop06_03">유통기한</label>
                                <input type="checkbox" name="cler-pop06[]" id="cler-pop06_04" class="cler-pop06"
                                    value="구성">
                                <label for="cler-pop06_04">재료 구성</label>
                                <input type="checkbox" name="cler-pop06[]" id="cler-pop06_05" class="cler-pop06"
                                    value="종류">
                                <label for="cler-pop06_05">재료 종류</label>
                                <input type="checkbox" name="cler-pop06[]" id="cler-pop06_06" class="cler-pop06"
                                    value="기타">
                                <label for="cler-pop06_06">기타</label>
                            </div>
                        </div>
                        <div class="cler-pop-btn btn">
                            <p>선택 완료</p>
                        </div>
                    </div>
                </div>
                <!-- 9 -->
                <div class="cler-pop cler-pop_09">
                    <div class="cler-pop-container">
                        <div class="cler-pop-title">
                            <p>재료가 만족스럽지 못해서</p>
                            <div class="cler-pop-title-img">
                                <img src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="닫기">
                            </div>
                        </div>
                        <div class="cler-pop-inner ps20">
                            <P>9-1. 기타의견을 알려주세요.</P>
                            <div class="box right">
                                <textarea class="DOC_TEXT cler-pop09" name="DOC_TEXT01" placeholder="해당 재료와 증상을 입력해 주세요"
                                    value="200자"></textarea>
                                <span class="counter">(0 / 최대 200자)</span>
                            </div>
                        </div>
                        <div class="cler-pop-btn btn">
                            <p>선택 완료</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- pop -->
            <div class="userr-btn cler-btn-01">
                <div class="btn user-btn-inner bg-ff">
                    <p>다음 ></p>
                </div>
            </div>
        </div>
        <div class="cler-page02">
            <div class="cler-page ps20">
                <div class="user-bar"></div>
                <div class="eu">
                    <p>도담밀에 바라는 점이 있으신가요?</p>
                </div>
                <div class="box right">
                    <textarea class="DOC_TEXT" name="DOC_TEXT02" placeholder=""
                        value="200자"></textarea>
                    <span class="counter">(0 / 최대 200자)</span>
                </div>
            </div>
            <!-- 버튼 -->
            <div class="userr-btn cler-btn-02">
                <div class="btn user-btn-inner bg-ff">
                    <p>제출하기 ></p>
                </div>
            </div>
        </div>
        <!-- 무조건 폼 마무리는 서밋 서밋 서밋 서밋 서밋 -->
        <!-- 설문조사 완료페이지로 무조건 넘겨야합니다 -->
        <!-- 안되면 로딩 후에 submit 트리거를 걸던지 해야합니다. 주의해주세요 -->
        <input type="submit" value="제출하기">

    </form>
</div>
<!-- 페이지 이동 -->
<script>
    $(".cler-btn-01").on("click", function () {
        $(".cler-page01").css({
            "display": "none"
        });
        $(".cler-page02").css({
            "display": "block"
        });
        $("html,body").animate({
            scrollTop: 0
        });
    });
    $(".cler-btn-02").on("click", function () {
        $(".cler-page02").css({
            "display": "none"
        });
        $(".cler-page03").css({
            "display": "block"
        });
    });
</script>
<!-- 버튼 나타내기 -->
<script>
    // $(".cler-page01").on("click",function(){
    //     $(".cler-btn-01").fadeIn();
    // });
    $(".cler-page02").on("click",function(){
        $(".cler-btn-02").fadeIn();
    });
</script>
<script>
    var pop_btn = $(".cler-pop-btn")
    var btn_img = $(".cler-pop-title-img");

    // 선택 완료후 팝업 닫기
    btn_img.click(function () {
        for (i = 1; i < 10; i++) {
            $(".cler-pop_0" + [i]).css({
                "position": "fixed",
                "top": "200%"
            });
            $(".cler-btn-01").fadeIn();
            $(".cler-pop-btn").css({"display":"none"});
        }
    });
    // 닫기 버튼 클릭
    pop_btn.click(function () {
        for (i = 1; i < 10; i++) {
            $(".cler-pop_0" + [i]).css({
                "position": "fixed",
                "top": "200%"
            });
            $(".cler-btn-01").fadeIn();
            $(".cler-pop-btn").css({"display":"none"});
        }
    });
    // input checked 확인 및 내용 제거
    var input002 = $("#cler-02")
    var popup002 = $(".cler-pop_02")

    input002.click(function () {
        var inpch002 = $("#cler-02").is(":checked");
        if (inpch002) {
            popup002.css({
                "position": "fixed",
                "top": "0%"
            });
            $(".cler-pop-btn").fadeIn();
            $(".userr-btn").css({"display":"none"});

            // $(".userr-btn").css({"display":"none"});
        } else {
            popup002.css({
                "position": "fixed",
                "top": "200%"
            });
            $(".cler-pop02").prop("checked", false);
        }
    });
    // input checked 확인 및 내용 제거
    var input004 = $("#cler-04")
    var popup004 = $(".cler-pop_04")

    input004.click(function () {
        var inpch004 = $("#cler-04").is(":checked");
        if (inpch004) {
            popup004.css({
                "position": "fixed",
                "top": "0%"
            });
            $(".cler-pop-btn").fadeIn();
            $(".userr-btn").css({"display":"none"});
        } else {
            popup004.css({
                "position": "fixed",
                "top": "200%"
            });
            $(".cler-pop04").prop("checked", false);
        }
    });
    // input checked 확인 및 내용 제거
    var input005 = $("#cler-05")
    var popup005 = $(".cler-pop_05")

    input005.click(function () {
        var inpch005 = $("#cler-05").is(":checked");
        if (inpch005) {
            popup005.css({
                "position": "fixed",
                "top": "0%"
            });
            $(".cler-pop-btn").fadeIn();
            $(".userr-btn").css({"display":"none"});
        } else {
            popup005.css({
                "position": "fixed",
                "top": "200%"
            });
            $(".cler-pop05").prop("checked", false);
        }
    });
    // input checked 확인 및 내용 제거
    var input006 = $("#cler-06")
    var popup006 = $(".cler-pop_06")

    input006.click(function () {
        var inpch006 = $("#cler-06").is(":checked");
        if (inpch006) {
            popup006.css({
                "position": "fixed",
                "top": "0%"
            });
            $(".cler-pop-btn").fadeIn();
            $(".userr-btn").css({"display":"none"});
        } else {
            popup006.css({
                "position": "fixed",
                "top": "200%"
            });
            $(".cler-pop06").prop("checked", false);
        }
    });
    // input checked 확인 및 내용 제거
    var input009 = $("#cler-09")
    var popup009 = $(".cler-pop_09")

    input009.click(function () {
        var inpch009 = $("#cler-09").is(":checked");
        if (inpch009) {
            popup009.css({
                "position": "fixed",
                "top": "0%"
            });
            $(".cler-pop-btn").fadeIn();
            $(".userr-btn").css({"display":"none"});
        } else {
            popup009.css({
                "position": "fixed",
                "top": "200%"
            });
            $(".cler-pop09").val("");
        }
    });
</script>
<!-- textarea -->
<script>
    $('.DOC_TEXT').keyup(function (e) {
        var content = $(this).val();
        $('.counter').html("(" + content.length + " / 200)"); //글자수 실시간 카운팅
        $(".survey-btn").fadeIn();
    });
</script>
<script>
    $(".cler-btn-01").on("click", function () {
        $(".cler-btn-02").addClass("loding");
    });
    $(".cler-btn-02").on("click", function () {

        if ($(".cler-btn-02").hasClass("loding")) {
            // $(".survey-sub").css({"display":"none"});
            // $(".showSlide-last").css({"display":"block"});
            setTimeout(function () {
                location.href = 'http://test007.dothome.co.kr';
            }, 10000);
            var memberCountConTxt = 0;
            $({
                val: 10
            }).animate({
                val: memberCountConTxt
            }, {
                duration: 11000,
                step: function () {
                    var num = numberWithCommas(Math.floor(this.val));
                    $(".edit-count").text(num);
                },
                complete: function () {
                    var num = numberWithCommas(Math.floor(this.val));
                    $(".edit-count").text(num);
                }
            });

            function numberWithCommas(x) {
                return x.toString().replace(/\B(?=(\d{3})-(?!\d))/g, ",");

            }
        }
    });
</script>
 
<?php
do_action( 'storefront_sidebar' );
get_footer();