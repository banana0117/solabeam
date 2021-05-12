
<?php
/**
 * Template Name: con3babyresearch
 */

get_header(); ?>

<?php

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
$current_user = wp_get_current_user();
$user_id = $current_user->user_login;

$today = date("Y-m-d");

?>

<style>
	input[type="text"] {display:block; width: 100%; border: 1px solid #c4c4c4; background: #fff; border-radius: 5px;}
	input[type='radio'] + label {margin:0;}
    input[name=bady] {border: 1px solid #333}
    label[for=bady-page] {font-weight:bold; color:#333;}
</style>

<div class="section">
	<form method="POST" action="">
		<input type="hidden" name="userid" value="<?php echo $user_id ?>">
		<div class="baby-page fade ">
			<div class="userr-page ps20">
				<div class="user-bar"></div>
				<p class="userr-title">도담밀 <br>아기 성장 설문 조사</p>
				<p class="userr-title-text">아기 성장 설문조사에 참여해 야 성장보고서가 정확하게 업데이트 됩니다.</p>
				<div class="userr-img">
					<img src="/wp-content/themes/storefront-child/con3/image/snack-img06.png" alt="영양사">
				</div>
				<!-- 입력 -->
				<label for="baby-page">아기 이름을 알려주세요.</label>
				<input type="text" name="bady" id="baby-page">
			</div>  
			<div class="baby-btn baby-btn01">
				<div class="btn baby-btn-inner bg-ff">
					<p>다음 ></p>
				</div>
			</div>
		</div>
		
			<!-- page01 -->
		<div class="baby-page01 fade ">
			<div class="userr-page ps20">
				<div class="user-bar"></div>
				<div class="baby-box baby-01">
					<label for="baby-cm">1. 우리 아기의 현재 키를 알려주세요.</label>
					<input type="text" name="cm" id="baby-cm" placeholder="숫자만 입력해주세요. cm">
					<div class="check-text">
						<p>24개월 미만 아기의 신장은 누운 키로 측정하는 것이 정확합니다.</p>
					</div>
				</div>
				<div class="baby-box baby-02">
					<label for="baby-kg">2. 우리 아기의 현재 체중을 알려주세요.</label>
					<input type="text" name="kg" id="baby-kg" placeholder="숫자만 입력해주세요. kg" placeholder="kg">
				</div>
				<div class="baby-radio baby-su baby-box baby-03">
					<p>3. 수유는 어떻게 진행하고 계신가요?</p>
					<div class="baby-flex">
						<input type="radio" name="su" id="su01" value="모유">
						<label for="su01">모유</label>
						<input type="radio" name="su" id="su02" value="분유">
						<label for="su02">분유</label>
						<input type="radio" name="su" id="su03" value="혼합">
						<label for="su03">혼합</label>
					</div>
				</div>
				<div class="baby-radio baby-box baby-04">
					<p>4. 아기의 하루 평균 모유/분유 섭취량은 얼마인가요?</p>
					<input type="radio" name="today" id="today-01" value="알 수 없음">
					<label for="today-01">알 수 없음</label>
					<div class="baby-flex">
					<input type="radio" name="today" id="today-02" value="수유중">
					<label for="today-02">수유중</label>
						<select name="su-ing" id="su-ing">
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
				<div class="baby-radio baby-box baby-05">
					<p>5. 아기의 한 끼 평균 이유식(유아식) 섭취량은 얼마인가요?</p>
					<div class="baby-flex mb10">
						<input type="radio" name="num05" id="num05-01" value="이유식">
						<label for="num05-01">이유식</label>
						<select name="num05-sel01" id="num05-sel01">
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
					<div class="baby-flex">
						<input type="radio" name="num05" id="num05-02" value="유아식">
						<label for="num05-02">유아식</label>
						<select name="num05-sel02" id="num05-sel02">
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
				<div class="baby-radio baby-box baby-06">
					<p>6. 아기에게 나타났던 특이사항이 있나요?</p>
					<div class="baby-flex baby-flex6">
						<input type="radio" name="num06" id="num06-01" value="없어요">
						<label for="num06-01">없어요</label>
						<input type="radio" name="num06" id="num06-02" value="감기">
						<label for="num06-02">감기</label>
						<input type="radio" name="num06" id="num06-03" value="변비">
						<label for="num06-03">변비</label>
						<input type="radio" name="num06" id="num06-04" value="설사">
						<label for="num06-04">설사</label>
						<input type="radio" name="num06" id="num06-05" value="발열">
						<label for="num06-05">발열</label>
						<input type="radio" name="num06" id="num06-06" value="알레르기">
						<label for="num06-06">알레르기</label>
					</div>
				</div>
				<div class="baby-box baby-07">
					<label for="num07">7. 위 보기에 없지만 나타났던 특이사항이 있나요? </label>
					<input type="text" name="num07" id="num07" placeholder="예시) 이유식 거부 – 아기가 이유식을 잘 안먹어요.">
				</div>
				<div class="food-hot bg-f2 baby-im">
					<ul>
						<li>
							<div class="box-i mb15">
								<img src="/wp-content/themes/storefront-child/con3/image/Group 258.png" alt="중요">
								<h5>잠깐!</h5>
							</div>
							<p>알레르기 재료가 있는 경우 고객센터로 연락 주셔야 대체 메뉴로 발송을 도와드릴 수 있습니다.</p>
						</li>
					</ul>
				</div>
				<div class="baby-box baby-08">
					<p class="box8">8. 도담밀에 바라는 점이 있다면 알려주세요.</p>
					<div class="userr-text textarea-span mb40">
						<textarea class="DOC_TEXT" name="DOC_TEXT" value="text"></textarea> 
						<span id="counter">(0 / 최대 200)</span>
					</div>
				</div>
			</div>

			<div class="baby-btn baby-btn02">
				<div class="btn baby-btn-inner bg-ff">
					<p>다음 ></p>
				</div>
			</div>
		</div>
		
        </form>
    </div>

<script>
$(".baby-btn01").on("click",function(){
	$(".baby-page").css({"display":"none"});
	$(".baby-page01").css({"display":"block"});
    $("html,body").animate({scrollTop:0});
});
$(".baby-btn02").on("click",function(){
	$(".baby-page01").css({"display":"none"});
	$(".baby-page02").css({"display":"block"});
    $("html,body").animate({scrollTop:0});
});
$(".baby-06").on("click",function(){
	$(".baby-btn02").addClass("loding");
})
</script>
<script>
	 $(".baby-06").on("click",function(){
  
           $(".baby-btn02").fadeIn();
    });
</script>

<!-- textarea -->
<script>
 $('.DOC_TEXT').keyup(function (e){
    var content = $(this).val();
    $('#counter').html("("+content.length+" / 200)");    //글자수 실시간 카운팅
});
</script>

<script>
	$(".baby-btn02").on("click",function(){

    if($(".baby-btn02").hasClass("loding")){
        // $(".survey-sub").css({"display":"none"});
        // $(".showSlide-last").css({"display":"block"});
        setTimeout(function(){
            location.href='http://test007.dothome.co.kr';
        }, 10000);
        var memberCountConTxt= 0;
        $({ val : 11 }).animate({ val : memberCountConTxt }, {
        duration: 10000,
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
<?php
do_action( 'storefront_sidebar' );
get_footer();
