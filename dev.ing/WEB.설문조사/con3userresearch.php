<?php

/**
 * Template Name: con3userresearch
 */

get_header(); ?>

<style>
</style>

<?php
$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
$current_user = wp_get_current_user();
$user_id = $current_user->user_login;

$today = date("Y-m-d");

$day_query = "SELECT * FROM userbase WHERE userid = '$user_id'";
$day_result = mysqli_query($mysqli, $day_query);
$day_row = mysqli_fetch_array($day_result);

$day_code = $day_row[deliday];

if ($day_code == "월") {
    $day_cont = "MON";
} elseif ($day_code == "화") {
    $day_cont = "TUE";
} elseif ($day_code == "수") {
    $day_cont = "WED";
} elseif ($day_code == "목") {
    $day_cont = "THU";
} else {
    $day_cont = "FRI";
}

$start_date = date("Y-m-d");
$days = date("Y-m-d", strtotime($start_date . $day_cont));

for ($i = 1; $i <= 6; $i = $i + 1) {
    $check_id = $user_id . "-" . $i;
    $query = "SELECT * FROM shicktest WHERE userid = '$check_id'";
    $result = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($result);
    $menu[$i] = $row[$days];
}

?>

<div class="section">
    <!--액션값까먹지말고 추가하세용-->
    <form method="POST" action="">
        <input type="hidden" name="userid" value="<?php echo $user_id?>">
        <input type="hidden" name="menu1" value="<?php echo $menu[0] ?>">
        <input type="hidden" name="menu2" value="<?php echo $menu[1] ?>">
        <input type="hidden" name="menu3" value="<?php echo $menu[2] ?>">
        <input type="hidden" name="menu4" value="<?php echo $menu[3] ?>">
        <input type="hidden" name="menu5" value="<?php echo $menu[4] ?>">
        <input type="hidden" name="menu6" value="<?php echo $menu[5] ?>">

        <div class="userr-page fade ">
            <div class="userr-page ps20">
                <div class="user-bar"></div>
                <p class="userr-title">도담밀 식단 설문 조사</p>
                <p class="userr-title-text">만족스러운 메뉴와 식단을 위한 설문조사입니다.<br>여러분의 설문조사를 바탕으로 메뉴와 식단이<br> 더욱 풍성해집니다.</p>
                <div class="userr-img">
                    <img src="/wp-content/themes/storefront-child/con3/image/snack-img05.png" alt="영양사">
                </div>
                <!-- 입력 -->
                <input type="text">
                <label for=""></label>
            </div>
            <div class="userr-btn">
                <div class="btn user-btn-inner bg-ff">
                    <p>다음 ></p>
                </div>
            </div>
        </div>
        <!-- page01 -->
        <?php
        $i = 1;
        while ($i <= 6) {
            if(empty($menu[$i]) || $menu[$i] == ""){}else{
            echo '
        <div class="survey-sub fade ps20 userr-page0' . $i . '">
            <div class="user-bar"></div>
            <!-- 메뉴 -->
            <p class="">도담밀 메뉴</p>
            <!-- 메뉴 이름 -->
            <p class="">' . $menu[$i] . '</p>
            <!-- 질문1 -->
            <div class="userr-qu">
                <p>1. 아기가 메뉴를 맛있게 먹었나요?</p>
                <div class="userr-radio qu-01">
                    <input type="radio" name="userr0' . $i . '-01" id="user0' . $i . '-101" value="맛있다">
                    <label for="user01-101">맛있게 먹었어요.</label>
                    <input type="radio" name="userr0' . $i . '-01" id="user0' . $i . '-102" value="보통이에요">
                    <label for="user01-102">보통이에요.</label>
                    <input type="radio" name="userr0' . $i . '-01" id="user0' . $i . '-103" value="맛없어">
                    <label for="user01-103">맛없어 했어요.</label>
                </div>
            </div>
            <!-- 질문2 -->
            <div class="userr-qu">
                <p>2. 아기가 메뉴를 얼마나 먹었나요?</p>
                <div class="userr-radio qu-02">
                    <input type="radio" name="userr0' . $i . '-02" id="user0' . $i . '-201" value="전부">
                    <label for="user01-201">전부 다 먹었어요.</label>
                    <input type="radio" name="userr0' . $i . '-02" id="user0' . $i . '-202" value="많이">
                    <label for="user01-202">많이 먹었어요..</label>
                    <input type="radio" name="userr0' . $i . '-02" id="user0' . $i . '-203" value="절반">
                    <label for="user01-203">절반 먹었어요.</label>
                    <input type="radio" name="userr0' . $i . '-02" id="user0' . $i . '-204" value="남겼어요">
                    <label for="user01-204">많이 남겼어요.</label>
                    <input type="radio" name="userr0' . $i . '-02" id="user0' . $i . '-205" value="다남겼어요">
                    <label for="user01-205">다 남겼어요.</label>
                </div>
            </div>
            <!-- 질문3 -->
            <div class="userr-qu">
                <p>3. 메뉴 조리가 쉬웠나요?</p>
                <div class="userr-radio qu-03">
                    <input type="radio" name="userr0' . $i . '-03" id="user0' . $i . '-301" value="쉬웠어요">
                    <label for="user01-301">쉬웠어요.</label>
                    <input type="radio" name="userr0' . $i . '-03" id="user0' . $i . '-302" value="보통이에요">
                    <label for="user01-302">보통이에요.</label>
                    <input type="radio" name="userr0' . $i . '-03" id="user0' . $i . '-303" value="어려웠어요">
                    <label for="user01-303">어려웠어요.</label>
                </div>
            </div>
            <!-- 질문4 -->
            <div class="userr-qu">
                <p>4. 메뉴에 대한 별점을 매겨주세요.</p>
                <!-- 메뉴 별점 -->
                <div class="starRev' . $i . '">
                <span class="starR1 on">별1_왼쪽</span>
                <span class="starR2">별1_오른쪽</span>
                <span class="starR1">별2_왼쪽</span>
                <span class="starR2">별2_오른쪽</span>
                <span class="starR1">별3_왼쪽</span>
                <span class="starR2">별3_오른쪽</span>
                <span class="starR1">별4_왼쪽</span>
                <span class="starR2">별4_오른쪽</span>
                <span class="starR1">별5_왼쪽</span>
                <span class="starR2">별5_오른쪽</span>
            </div>
            </div>
            <input type="hidden" value="" name="score'.$i.'" id="score'.$i.'">
            <!-- 질문5 -->
            <div class="userr-qu qu-05">
                <p>5. 메뉴에 대한 한줄평을 남겨주세요.</p>
                <div class="userr-text">
                    <input type="text" name="userr0' . $i . '-04" placeholder="한줄평을 남겨주세요.">
                </div>
            </div>
        </div>';
            $i++;
        }}
        ?>
        <!-- page07 -->
        <div class="survey-sub fade ps20 userr-page07">
            <div class="user-bar"></div>
            <!-- 메뉴 -->

            <div class="userr-menu">
                <div class="userr-menu-list">
                    <ul>
                        <li>1일</li>
                        <li>2일</li>
                        <li>3일</li>
                    </ul>
                    <ul>
                        <li>4일</li>
                        <li>5일</li>
                        <li>6일</li>
                        <li>7일</li>
                    </ul>
                </div>


                <div class="userr-menu-box">
                    <ul>
                        <li><?php echo $menu[0] ?></li>
                        <li><?php echo $menu[1] ?></li>
                        <li><?php echo $menu[2] ?></li>
                    </ul>
                    <ul>
                        <li><?php echo $menu[3] ?></li>
                        <li><?php echo $menu[4] ?></li>
                        <li><?php echo $menu[5] ?></li>
                    </ul>
                </div>
            </div>

            <!-- 질문1 -->
            <div class="userr-qu">
                <p>7. 이번 주 식단에서 가장 마음에 드는 점은 무엇인가요? <span>(복수 선택 가능)</span></p>
                <div class="userr-checkbox qu-07">
                    <input type="checkbox" name="userr07-01" id="user07-101" value="메뉴별">
                    <label for="user07-101">메뉴별 재료 궁합</label>
                    <input type="checkbox" name="userr07-01" id="user07-102" value="간편한">
                    <label for="user07-102">간편한 레시피</label>
                    <input type="checkbox" name="userr07-01" id="user07-103" value="좋아하는">
                    <label for="user07-103">아기가 잘 먹고, 좋아하는 재료로 구성</label>
                    <input type="checkbox" name="userr07-01" id="user07-104" value="다양한">
                    <label for="user07-104">제철 재료, 다양한 재료로 구성</label>
                    <input type="checkbox" name="userr07-01" id="user07-105" value="먹이고">
                    <label for="user07-105">아기에게 먹이고 싶은 재료로 구성</label>
                    <input type="checkbox" name="userr07-01" id="user07-106" value="신선하게">
                    <label for="user07-106">신선하게 배송된 재료</label>
                    <input type="checkbox" name="userr07-01" id="user07-107" value="기타">
                    <label for="user07-107">기타</label>
                    <input type="text" name=userr07-108 id="user07-108" placeholder="기타 의견을 남겨주세요." class="block">
                </div>
            </div>
            <!-- 질문2 -->
            <div class="userr-qu">
                <p>8. 이번 주 식단에서 가장 만족스럽지 않은 점은 무엇인가요? <span>(복수 선택 가능)</span></p>
                <div class="userr-checkbox qu-08">
                    <input type="checkbox" name="userr07-02" id="user07-201" value="메뉴별">
                    <label for="user07-201">메뉴별 재료 궁합</label>
                    <input type="checkbox" name="userr07-02" id="user07-202" value="간편한">
                    <label for="user07-202">어려운 레시피</label>
                    <input type="checkbox" name="userr07-02" id="user07-203" value="좋아하는">
                    <label for="user07-203">제철 재료, 다양한 재료가 부족</label>
                    <input type="checkbox" name="userr07-02" id="user07-204" value="다양한">
                    <label for="user07-204">아기가 잘 안먹고, 싫어하는 재료로 구성</label>
                    <input type="checkbox" name="userr07-02" id="user07-205" value="먹이고">
                    <label for="user07-205">아기에게 먹이고 싶은 재료 부족</label>
                    <input type="checkbox" name="userr07-02" id="user07-206" value="신선하게">
                    <label for="user07-206">신선하지 않게 배송된 재료</label>
                    <input type="checkbox" name="userr07-02" id="user07-207" value="기타">
                    <label for="user07-207">만족스럽지 않은 점이 없었어요.</label>
                    <input type="checkbox" name="userr07-02" id="user07-208" value="기타">
                    <label for="user07-208">기타</label>
                    <input type="text" name="userr07-209" id="user07-209" placeholder="기타 의견을 남겨주세요." class="block">
                </div>
            </div>
        </div>
        <!-- page08 -->
        <div class="survey-sub fade ps20 userr-page08">
            <div class="user-bar"></div>
            <!-- 질문5 -->
            <div class="userr-qu qu-09">
                <p>9. 도담밀에 바라는 점이 있다면 알려주세요.</p>
                <div class="userr-text textarea-span">
                    <textarea class="DOC_TEXT" name="DOC_TEXT" value="text"></textarea>
                    <span id="counter">(0 / 최대 200)</span>
                </div>
            </div>
        </div>
        

        <!-- 버튼 -->
        <div class="survey-btn">
            <ul>
                <li class="prev" onclick="moveSlide(-1)">
                    < 이전</li>
                <li class="next02" onclick="moveSlide(1)">다음 ></li>
            </ul>
        </div>
        <!--폼은 무조건 서밋으로 끝나야합니다 -->
        <input type="submit" value="제출하기">
    </form>
</div>
<!-- 첫페이지에서 설문으로 넘어가는 버튼 -->
<script>
    $(".userr-btn").on("click", function() {
        $(".userr-page").css({
            "display": "none"
        });
        $(".userr-page01").css({
            "display": "block"
        });
    });
</script>
<script>
    // 설문페이지 변화
    var slideIndex = 0;
    var sub = document.getElementsByClassName("survey-sub");
    var size = sub.length;
    var btn = document.getElementsByClassName("survey-btn");

    function moveSlide(n) {
        slideIndex = slideIndex + n;

        if (slideIndex < 0) {
            slideIndex = 0;
        }

        showSlide(slideIndex);
        $("html,body").animate({
            scrollTop: 0
        });
    }

    function showSlide(n) {

        for (i = 0; i < sub.length; i++) {
            sub[i].style.display = "none";
        }
        sub[n].style.display = "block";
    }
</script>
<!-- 버튼 보이기 -->
<script>
    $(".userr-page01").on("click", function() {
        var q1 = $(".qu-01 input").is(":checked");
        var q2 = $(".qu-02 input").is(":checked");
        var q3 = $(".qu-03 input").is(":checked");
        var q5 = $(".qu-05 input").is(":focus");
        if (q1 && q2 && q3 && q5) {
            $(".survey-btn").fadeIn();
        }
    });
    $(".userr-page02").on("click", function() {
        var q1 = $(".qu-01 input").is(":checked");
        var q2 = $(".qu-02 input").is(":checked");
        var q3 = $(".qu-03 input").is(":checked");
        var q5 = $(".qu-05 input").is(":focus");
        if (q1 && q2 && q3 && q5) {
            $(".survey-btn").fadeIn();
        }
    });
    $(".userr-page03").on("click", function() {
        var q1 = $(".qu-01 input").is(":checked");
        var q2 = $(".qu-02 input").is(":checked");
        var q3 = $(".qu-03 input").is(":checked");
        var q5 = $(".qu-05 input").is(":focus");
        if (q1 && q2 && q3 && q5) {
            $(".survey-btn").fadeIn();
        }
    });
    $(".userr-page04").on("click", function() {
        var q1 = $(".qu-01 input").is(":checked");
        var q2 = $(".qu-02 input").is(":checked");
        var q3 = $(".qu-03 input").is(":checked");
        var q5 = $(".qu-05 input").is(":focus");
        if (q1 && q2 && q3 && q5) {
            $(".survey-btn").fadeIn();
        }
    });
    $(".userr-page05").on("click", function() {
        var q1 = $(".qu-01 input").is(":checked");
        var q2 = $(".qu-02 input").is(":checked");
        var q3 = $(".qu-03 input").is(":checked");
        var q5 = $(".qu-05 input").is(":focus");
        if (q1 && q2 && q3 && q5) {
            $(".survey-btn").fadeIn();
        }
    });
    $(".userr-page06").on("click", function() {
        var q1 = $(".qu-01 input").is(":checked");
        var q2 = $(".qu-02 input").is(":checked");
        var q3 = $(".qu-03 input").is(":checked");
        var q5 = $(".qu-05 input").is(":focus");
        if (q1 && q2 && q3 && q5) {
            $(".survey-btn").fadeIn();
        }
    });
    $(".userr-page07").on("click", function() {
        var q7 = $(".qu-07 input").is(":checked");
        var q8 = $(".qu-08 input").is(":checked");
        if (q7 && q8) {
            $(".survey-btn").fadeIn();
        }
    });

    $(".next02").on("click", function() {
        $(".survey-btn").hide();
    });
</script>

<script>
    // 설문페이지 변화
    var slideIndex = 0;
    var sub = document.getElementsByClassName("survey-sub");
    var size = sub.length;
    var btn = document.getElementsByClassName("survey-btn");

    function moveSlide(n) {
        slideIndex = slideIndex + n;

        if (slideIndex < 0) {
            slideIndex = 0;
        }

        showSlide(slideIndex);
        $("html,body").animate({
            scrollTop: 0
        });
    }

    function showSlide(n) {

        for (i = 0; i < sub.length; i++) {
            sub[i].style.display = "none";
        }
        sub[n].style.display = "block";
    }
</script>
<script>
    $("#user07-107").on("click", function() {
        $("#user07-108.block").toggleClass("on");
    });
    $("#user07-208").on("click", function() {
        $("#user07-209.block").toggleClass("on");
    });
</script>
<!-- textarea -->
<script>
    $('.DOC_TEXT').keyup(function(e) {
        var content = $(this).val();
        $('#counter').html("(" + content.length + " / 200)"); //글자수 실시간 카운팅
        $(".survey-btn").fadeIn();
    });
</script>
<!-- 페이지 이동 -->

<script>
    // window.onload = function(){
    //     setTimeout(function(){
    //         location.href='http://dodammeal.com';
    //     }, 10000);
    // }
</script>
<script>
    //   var memberCountConTxt= 0;
    //     $({ val : 11 }).animate({ val : memberCountConTxt }, {
    //     duration: 10000,
    //     step: function() {
    //     var num = numberWithCommas(Math.floor(this.val));
    //     $(".edit-count").text(num + "");
    //     },
    //     complete: function() {
    //     var num = numberWithCommas(Math.floor(this.val));
    //     $(".edit-count").text(num + "");
    //     }
    //     });
    //     function numberWithCommas(x) {
    //     return x.toString().replace(/\B(?=(\d{3})-(?!\d))/g, ",");   
    //     }
    $(".DOC_TEXT").on("click", function() {
        $(".next02").addClass("loding");
    });
    $(".next02").on("click", function() {

        if ($(".next02").hasClass("loding")) {
            // $(".survey-sub").css({"display":"none"});
            // $(".showSlide-last").css({"display":"block"});
            setTimeout(function() {
                location.href = 'http://test007.dothome.co.kr';
            }, 10000);
            var memberCountConTxt = 0;
            $({
                val: 10
            }).animate({
                val: memberCountConTxt
            }, {
                duration: 11000,
                step: function() {
                    var num = numberWithCommas(Math.floor(this.val));
                    $(".edit-count").text(num);
                },
                complete: function() {
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

<script>
    $('.starRev1 span').click(function() {
        $(this).parent().children('span').removeClass('on');
        $(this).addClass('on').prevAll('span').addClass('on');

        var scores = $(".on").length;
        $("#score1").val(scores);
    });

    $('.starRev3 span').click(function() {
        $(this).parent().children('span').removeClass('on');
        $(this).addClass('on').prevAll('span').addClass('on');

        var scores = $(".on").length;
        $("#score3").val(scores);
    });

    $('.starRev4 span').click(function() {
        $(this).parent().children('span').removeClass('on');
        $(this).addClass('on').prevAll('span').addClass('on');

        var scores = $(".on").length;
        $("#score4").val(scores);
    });

    $('.starRev5 span').click(function() {
        $(this).parent().children('span').removeClass('on');
        $(this).addClass('on').prevAll('span').addClass('on');

        var scores = $(".on").length;
        $("#score5").val(scores);
    });

    $('.starRev6 span').click(function() {
        $(this).parent().children('span').removeClass('on');
        $(this).addClass('on').prevAll('span').addClass('on');

        var scores = $(".on").length;
        $("#score6").val(scores);
    });

    $('.starRev2 span').click(function() {
        $(this).parent().children('span').removeClass('on');
        $(this).addClass('on').prevAll('span').addClass('on');

        var scores = $(".on").length;
        $("#score2").val(scores);
    });
</script>

<?php
do_action('storefront_sidebar');
get_footer();
