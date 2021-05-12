 <?php
/**
 * Template Name:  con3firstresearch
 */

get_header(); ?>

<?php

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
$current_user = wp_get_current_user();
$user_id = $current_user->user_login;

$today = date("Y-m-d");

?>
 <style>
     input[type="text"] {
         display: block;
         width: 100%;
         border: 1px solid #c4c4c4;
         background: #fff;
         border-radius: 5px;
     }

     input[type='radio']+label {
         margin: 0;
     }

     input[name=first] {
         border: 1px solid #333
     }

     label[for=first-page] {
         font-weight: bold;
         color:#333;
     }
 </style>

 <div class="section">
     <form method="POST" action="">
        <input type="hidden" name="userid" value="<?php echo $user_id ?>">
         <div class="first-page fade ">
            <div class="ps20">
                <div class="first-bar">
                    <div class="first-bar-gauge"></div>
                </div>
                <p class="userr-title">도담밀 식단 설문 조사</p>
                <p class="userr-title-text">아기 성장 설문조사에 참여해 주셔야 성장보고서가 <br>정확하게 업데이트 됩니다.</p>
                <div class="userr-img">
                    <img src="/wp-content/themes/storefront-child/con3/image/snack-img06.png" alt="영양사">
                </div>
         <!-- 입력 -->
         <label for="first-page">아기 이름을 알려주세요.</label>
				<input type="text"name="first" id="first-page">
            </div>  
            <div class="userr-btn">
                <div class="btn user-btn-inner first-btn">
                    <p>다음 ></p>
                </div>
            </div>
        </div>
         <!-- page01 -->
         <div class="survey-sub fade ps20 first-page01">
             <div class="first-bar">
                 <div class="first-bar-gauge25"></div>
             </div>
             <div class="first-title">
                 <p>아기 성장 관련 문항</p>
             </div>
             <!-- 질문1 -->
             <div class="first-qu">
                 <div class="fir-01">
                     <label for="first-cm">1. 우리 아기의 현재 키를 알려주세요.</label>
                     <input type="text" name="cm" id="first-cm" placeholder="숫자만 입력해주세요. cm">
                     <div class="check-text">
                         <p>24개월 미만 아기의 신장은 누운 키로 측정하는 것이 정확합니다.</p>
                     </div>
                 </div>
             </div>
             <!-- 질문2 -->
             <div class="first-qu">
                 <div class="fir-02">
                     <label for="first-kg">2. 우리 아기의 현재 체중을 알려주세요.</label>
                     <input type="text" name="kg" id="first-kg" placeholder="숫자만 입력해주세요. kg" placeholder="kg">
                 </div>
             </div>
             <!-- 질문3 -->
             <div class="first-qu">
                 <div class="first-radio fir-03">
                     <p>3. 아기에게 나타났던 특이사항이 있나요?</p>
                     <div class="first-flex first-flex6">
                         <input type="radio" name="first03" id="first03-01" value="없어요">
                         <label for="first03-01">없어요</label>
                         <input type="radio" name="first03" id="first03-02" value="감기">
                         <label for="first03-02">감기</label>
                         <input type="radio" name="first03" id="first03-03" value="변비">
                         <label for="first03-03">변비</label>
                         <input type="radio" name="first03" id="first03-04" value="설사">
                         <label for="first03-04">설사</label>
                         <input type="radio" name="first03" id="first03-05" value="발열">
                         <label for="first03-05">발열</label>
                         <input type="radio" name="first03" id="first03-06" value="알레르기">
                         <label for="first03-06">알레르기</label>
                     </div>
                 </div>
             </div>
             <!-- 질문4 -->
             <div class="first-qu">
                 <div class="fir-04">
                     <label for="first04">4. 그 외 나타났던 특이사항을 알려주시거나, 특이사항에 대해 더 자세히 알려주세요. </label>
                     <input type="text" name="first04" id="first04" placeholder="예시) 빈혈 – 병원에서 철결핍성 빈혈 진단을 받았어요.">
                 </div>
             </div>
             <!-- 질문5 -->
             <div class="first-qu">
                 <div class="fir-05">
                     <p>5.아기에게 눈에 띄는 신체 변화가 있었다면 알려주세요. </p>
                     <div class="userr-text textarea-span">
                         <textarea class="DOC_TEXT" name="DOC_TEXT" value="text"
                             placeholder="예시) 아랫니가 두 개 올라왔어요, 이제 스스로 스푼을 들고 음식을 먹어요."></textarea>
                         <span class="counter">(0 / 최대 200)</span>
                     </div>
                 </div>
             </div>
         </div>
         <div class="survey-sub fade ps20 first-page02">
             <div class="first-bar">
                 <div class="first-bar-gauge50"></div>
             </div>
             <div class="first-title">
                 <p>아기 성장 관련 문항</p>
             </div>
             <!-- 질문6 -->
             <div class="first-qu">
                 <div class="first-radio fir-06">
                     <p>6. 수유는 어떻게 진행하고 계신가요?</p>
                     <div class="baby-flex">
                         <input type="radio" name="first06" id="first06-01" value="모유">
                         <label for="first06-01">모유</label>
                         <input type="radio" name="first06" id="first06-02" value="분유">
                         <label for="first06-02">분유</label>
                         <input type="radio" name="first06" id="first06-03" value="혼합">
                         <label for="first06-03">혼합</label>
                     </div>
                 </div>
             </div>
             <!-- 질문7 -->
             <div class="first-qu">
                 <div class="first-radio fir-07">
                     <p>7. 아기의 하루 평균 모유/분유 섭취량은 얼마인가요?</p>
                     <input type="radio" name="first07" id="first07-01" value="알 수 없음">
                     <label for="first07-01">알 수 없음</label>
                     <div class="baby-flex">
                         <input type="radio" name="first07" id="first07-02" value="수유중">
                         <label for="first07-02">수유중</label>
                         <select name="first07-ing" id="first07-ing">
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
             <!-- 질문8 -->
             <div class="first-qu">
                 <div class="first-radio fir-08">
                     <p>8. 아기의 한 끼 평균 이유식(유아식) 섭취량은 얼마인가요?</p>
                     <div class="first-flex mb10">
                         <input type="radio" name="first08" id="first08-01" value="이유식">
                         <label for="first08-01">이유식</label>
                         <select name="first08-sel01" id="first08-sel01">
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
                     <div class="first-flex">
                         <input type="radio" name="first08" id="first08-02" value="유아식">
                         <label for="first08-02">유아식</label>
                         <select name="first08-sel02" id="first08-sel02">
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
            <!-- 질문9 -->
            <div class="first-qu">
                 <div class="first-radio fir-09">
                    <p>9. 아기가 이번 달 제공된 메뉴를 전반적으로 잘 먹었나요?</p>          
                         <input type="radio" name="first09" id="first09-01" value="먹었어요">
                         <label for="first09-01">네, 잘 먹었어요.</label>
                         <input type="radio" name="first09" id="first09-02" value="보통이에요">
                         <label for="first09-02">보통이에요.</label>
                         <input type="radio" name="first09" id="first09-03" value="않았어요">
                         <label for="first09-03">아니요, 잘 먹지 않았어요.</label>
                 </div>
             </div>
            <!-- 질문10 -->
            <div class="first-qu">
                 <div class="first-radio fir-10">
                    <p>10. 아기가 도담밀에서 제공하는 양을 얼마나 먹나요?</p>        
                         <input type="radio" name="first10" id="first10-01" value="남기지않고">
                         <label for="first10-01">남기지 않고 다 먹어요.</label>
                         <input type="radio" name="first10" id="first10-02" value=">조금남기고">
                         <label for="first10-02">조금 남기고 다 먹어요.</label>
                         <input type="radio" name="first10" id="first10-03" value="보통이에요">
                         <label for="first10-03">보통이에요.</label>
                         <input type="radio" name="first10" id="first10-04" value="남겨요">
                         <label for="first10-04">많이 남겨요.</label>
                         <input type="radio" name="first10" id="first10-05" value="거의">
                         <label for="first10-05">거의 다 남겨요.</label>
                 </div>
             </div>
            <!-- 질문11 -->
            <div class="first-qu">
                 <div class="first-radio fir-11">
                    <p>11. 이번 달 제공된 메뉴를 먹이면서 특별히 신경 쓰였던 점이 있다면 알려주세요.</p>    
                         <input type="radio" name="first11" id="first11-01" value="특별히">
                         <label for="first11-01">특별히 신경 쓰였던 점은 없어요.</label>
                         <input type="radio" name="first11" id="first11-02" value=">고기">
                         <label for="first11-02">고기 양이 부족했던 것 같아요.</label>
                         <input type="radio" name="first11" id="first11-03" value="다양한">
                         <label for="first11-03">더 다양한 재료를 먹이고 싶어요.</label>
                         <input type="radio" name="first11" id="first11-04" value="양이부족한">
                         <label for="first11-04">아기에게 양이 부족한 것 같아요.</label>
                         <input type="radio" name="first11" id="first11-05" value="양이많은것 ">
                         <label for="first11-05">아기에게 양이 많은 것 같아요.</label>
                 </div>
             </div>
               <!-- 질문12 -->
               <div class="first-qu">
                 <div class="fir-12">
                     <label for="first12">12. 위 보기에 없지만 신경 쓰였던 점이 있다면 알려주세요.</label>
                     <input type="text" name="first12" id="first12">
                 </div>
             </div>
             <!-- 질문13 -->
             <div class="first-qu">
                 <div class="fir-13">
                     <label for="first13">13. 특별히 아기에게 먹여보고 싶은 재료가 있다면, 재료와 그 이유를 알려주세요.</label>
                     <input type="text" name="first13" id="first13">
                 </div>
             </div>
             <!-- 질문14 -->
             <div class="first-qu">
                 <div class="fir-14">
                     <label for="first14">14. 특별히 아기에게 먹이고 싶지 않은 재료가 있다면, 재료와 그 이유를 알려주세요.</label>
                     <input type="text" name="first14" id="first14">
                 </div>
             </div>
               <!-- 질문15 -->
               <div class="first-qu">
                 <div class="first-radio fir-15">
                     <p>15. 지금 아기에게 어떤 간식을 먹이고 계신가요?</p>
                     <div class="first-flex first-flex4">
                         <input type="radio" name="first15" id="first15-01" value="수제 간식">
                         <label for="first15-01">수제 간식</label>
                         <input type="radio" name="first15" id="first15-02" value="완제품">
                         <label for="first15-02">완제품 간식</label>
                         <input type="radio" name="first15" id="first15-03" value="과일">
                         <label for="first15-03">과일, 채소 등</label>
                         <input type="radio" name="first15" id="first15-04" value="먹이고">
                         <label for="first15-04">먹이고 있지 않아요.</label>
                     </div>
                 </div>
             </div>
               <!-- 질문16-->
               <div class="first-qu">
                 <div class="fir-16">
                     <p>16. 위 보기에는 없지만 먹이고 있는 간식을 알려주시거나 간식에 대한 고민을 알려주세요.</p>
                     <div class="userr-text textarea-span">
                         <textarea class="DOC_TEXT" name="DOC_TEXT2" value="text"
                             placeholder="예시) 아랫니가 두 개 올라왔어요, 이제 스스로 스푼을 들고 음식을 먹어요."></textarea>
                         <span class="counter">(0 / 최대 200)</span>
                     </div>
                 </div>
             </div>
             <!-- page02 -->
         </div>
           <!-- page03 -->
           <div class="survey-sub fade ps20 first-page03">
             <div class="first-bar">
                 <div class="first-bar-gauge75"></div>
             </div>
             <div class="first-title title-width">
                 <p>도담밀 서비스 관련 문항</p>
             </div>
            <!-- 질문17 -->
               <div class="first-qu">
                 <div class="first-radio fir-17">
                    <p>17. 이번 달 받아 보신 식단은 만족하셨나요?</p>
                    <input type="radio" name="first17" id="first17-01" value="5점">
                    <label for="first17-01">아주 만족했어요. (5점)</label>
                    <input type="radio" name="first17" id="first17-02" value="4점">
                    <label for="first17-02">만족했어요. (4점)</label>
                    <input type="radio" name="first17" id="first17-03" value="3점">
                    <label for="first17-03">보통이에요. (3점)</label>
                    <input type="radio" name="first17" id="first17-04" value="2점">
                    <label for="first17-04">불만족했어요. (2점)</label>
                    <input type="radio" name="first17" id="first17-05" value="1점">
                    <label for="first17-05">아주 불만족했어요. (1점)</label>
                 </div>
             </div>
            <!-- 질문18 -->
            <div class="first-qu">
                <div class="fir-18">
                     <label for="first14">18. 위와 같이 답변한 이유를 알려주세요.</label>
                     <input type="text" name="first18" id="first18">
                 </div>
             </div>
            <!-- 질문19 -->
            <div class="first-qu">
                <div class="first-radio fir-19">
                <p>19. 이번 달 받아 보신 재료는 모두 신선했나요?</p>
                <input type="radio" name="first19" id="first19-01" value="5점">
                <label for="first19-01">아주 신선했어요. (5점)</label>
                <input type="radio" name="first19" id="first19-02" value="4점">
                <label for="first19-02">신선했어요. (4점)</label>
                <input type="radio" name="first19" id="first19-03" value="3점">
                <label for="first19-03">보통이에요. (3점)</label>
                <input type="radio" name="first19" id="first19-04" value="2점">
                <label for="first19-04">신선하지 않았어요. (2점)</label>
                <input type="radio" name="first19" id="first19-05" value="1점">
                <label for="first19-05">아주 신선하지 않았어요. (1점)</label>
                </div>
            </div>
             <!-- 질문20 -->
             <div class="first-qu">
                <div class="first-radio fir-20">
                <p>20. 이번 달 받은 상담은 만족하셨나요?</p>
                <input type="radio" name="first20" id="first20-01" value="5점">
                <label for="first20-01">아주 만족했어요. (5점)</label>
                <input type="radio" name="first20" id="first20-02" value="4점">
                <label for="first20-02">만족했어요. (4점)</label>
                <input type="radio" name="first20" id="first20-03" value="3점">
                <label for="first20-03">보통이에요. (3점)</label>
                <input type="radio" name="first20" id="first20-04" value="2점">
                <label for="first20-04">불만족했어요. (2점)</label>
                <input type="radio" name="first20" id="first20-05" value="1점">
                <label for="first20-05">아주 불만족했어요. (1점)</label>
                </div>
            </div>
            <!-- 질문21-->
            <div class="first-qu">
                <div class="fir-21">
                    <p>21. 도담밀에 바라는 점이 있다면 알려주세요.</p>
                    <div class="userr-text textarea-span">
                        <textarea class="DOC_TEXT next-page" name="DOC_TEXT3" value="text"></textarea>
                        <span class="counter">(0 / 최대 200)</span>
                     </div>
                 </div>
             </div>
            <!-- page03 -->
         </div>

         <!-- page04 -->
         

         <!-- 버튼 -->
         <div class="survey-btn">
             <ul>
                 <li class="prev" onclick="moveSlide(-1)">< 이전</li> 
                 <li class="next03" onclick="moveSlide(1)">다음 ></li>
             </ul>
         </div>
     </form>
 </div>
 <!-- 첫페이지에서 설문으로 넘어가는 버튼 -->
 <script>
     $(".userr-btn").on("click", function () {
         $(".userr-page").css({
             "display": "none"
         });
         $(".first-page01").css({
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
 <!-- textarea -->
 <script>
     $('.DOC_TEXT').keyup(function (e) {
         var content = $(this).val();
         $('.counter').html("(" + content.length + " / 200)"); //글자수 실시간 카운팅
     });
 </script>
 <!-- 다음 버튼 -->
<script>
    $(".fir-05").on("click",function(){
        $(".survey-btn").fadeIn();
    });
    $(".fir-16").on("click",function(){
        $(".survey-btn").fadeIn();
    });
    $(".fir-21").on("click",function(){
        $(".survey-btn").fadeIn();
    });

      $(".next03").on("click",function(){
        $(".survey-btn").hide();
    });
</script>
<!-- 마지막 페이지 이동 -->
<script>
    $(".fir-15").on("click",function(){
        $(".fir-20").addClass("loding");
    });

    $(".fir-20").on("click",function(){

        if($(".fir-20").hasClass("loding")){
            // $(".survey-sub").css({"display":"none"});
            // $(".showSlide-last").css({"display":"block"});
            setTimeout(function(){
                location.href='http://test007.dothome.co.kr';
            }, 10000);
            var memberCountConTxt= 0;
            $({ val : 11 }).animate({ val : memberCountConTxt }, {
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
</script>
<!-- 버튼나타나기 -->
<script>
    $(".first-page").on("click",function(){
        $(".first-btn").fadeIn();
    });
    $(".first-btn").on("click",function(){
        $(".first-btn").css({"display":"none"});
        $(".first-page").css({"display":"none"});
    });
    $(".fir-03").on("click",function(){
        $(".survey-btn").fadeIn();
    });
    $(".fir-15").on("click",function(){
        $(".survey-btn").fadeIn();
    });
    $(".fir-20").on("click",function(){
        $(".survey-btn").fadeIn();
    });
</script>
 <?php
do_action( 'storefront_sidebar' );
get_footer();