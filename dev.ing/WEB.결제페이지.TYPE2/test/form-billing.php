<?php

/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 * 
 * 팝업부분 팝업으로 스크립트 짜서 만들면되고, div btn 누르면 값이 바뀔겁니다
 * 아래 div woocommerce-billing-fields__field-wrapper 안에 나타나는 친구들은 어쩔수없이
 * 개발자모드에서 css보고 css로만 수정해야할거같네요 
 * 
 * 필요한 스크립트가 있으면 form-checkout.php 이쪽에다가 추가하면 됩니다
 * 
 */

defined('ABSPATH') || exit;
?>


<div class="woocommerce-billing-fields">

	<!--일단 그냥 여기다가 작업해보세요 될지는 잘 모르겠지만 한번 해봅시당-->
	<div class="checkout-boxes">
		<div class="checkout-title flexed">
			<p class="flexed" style="width:100%">배송정보</p>
			<p class="opt-pop-btn flexibled" id="deli-change" style="width:100%">변경</p>
		</div>
		<div class="bill-delivery-inner">
			<div class="flexed">
				<p id="name" style="padding-right:20px;"></p>
				<p id="phone"></p>
			</div>
			<div class="flexed">
				<p id="postcode" style="padding-right:20px;"></p>
				<p id="post"></p>
			</div>
			<div class="flexed">
				<p id="sidepost"></p>
			</div>
		</div>
		<div class="" style="padding-top: 15px;">
			<select id="selbox" name="selbox">
				<option value="안전하게 배송해주세요.">안전하게 배송해주세요.</option>
				<option value="배송 전 연락주세요.">배송 전 연락주세요.</option>
				<option value="아기가 자고있으니 초인종 누르지 말아주세요.">아기가 자고있으니 초인종 누르지 말아주세요.</option>
				<option value="text">직접입력</option>
			</select>
			<input type="text" id="selboxdirect" name="selboxdirect">
		</div>
	</div>


	<?php if (wc_ship_to_billing_address_only() && WC()->cart->needs_shipping()) : ?>

	<?php else : ?>

	<?php endif; ?>

	<?php do_action('woocommerce_before_checkout_billing_form', $checkout); ?>

	<div class="woocommerce-billing-fields__field-wrapper">
		<?php
		$fields = $checkout->get_checkout_fields('billing');

		foreach ($fields as $key => $field) {
			woocommerce_form_field($key, $field, $checkout->get_value($key));
		}
		?>
	</div>

	<?php do_action('woocommerce_after_checkout_billing_form', $checkout); ?>
</div>

<!-- 이부분을 팝업으로 쓰면됩니다, 결제페이지 들어가서 개발자도구로 html 작성되는거 보고 수정해야함-->
<div class="del-pop" id="delpop">
	<div class="popup">
		<!--이걸로 팝업으로 만들면 됩니다-->
		<!--변경하기 누르면 정보가 바뀌는 방식으로 만들긴했는데 잘될진 모르겠네요-->
		<div class="del-pop-title">
			<div class="del-pop-title-img">
			</div>
			<div class="del-pop-title-text">
				<p>배송지 변경</p>
				<img class="js-deli-closed" src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="Arrow1">
			</div>
		</div>

		<div class="">
			<div class="checkout-title">
				<p>배송정보</p>
			</div>
			<div class="del-pop-detail">
				<div class="flexed">
					<label for="detail_new_name">수령자</label>
					<input type="text" id="detail_new_name" placeholder="받는분 이름" name="detail">
				</div>
				<div class="flexed">
					<label for="detail_new_phone">연락처</label>
					<input type="text" id="detail_new_phone" placeholder="전화번호(숫자만입력)" name="detail">
				</div>
				<div class="flexed">
				<label for="de_postcode">배송지</label>
				<input type="text" id="detail_new_postcode" style="width:65%; border-top-right-radius:0px; border-bottom-right-radius:0px;" placeholder="우편번호" name="detail">
				<input type="button" id="billing_postcode_search" style="background-color:#ff9900; color:#fff; width:30%; border-top-left-radius:0px; border-bottom-left-radius:0px;" value="주소찾기" class="postcode-search" onclick="openDaumPostcode5();">
				</div>
				<div class="flexed">
				<input type="text" id="detail_new_post" placeholder="주소" name="">
				</div>
				<div class="flexed">
				<input type="text" id="detail_new_sidepost" placeholder="상세주소" name="detail">
				</div>
			</div>
		</div>
		<div class="js-order-detail-btn">변경하기</div>
	</div>
</div>





<?php if (!is_user_logged_in() && $checkout->is_registration_enabled()) : ?>
	<div class="woocommerce-account-fields">
		<?php if (!$checkout->is_registration_required()) : ?>

			<p class="form-row form-row-wide create-account">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked((true === $checkout->get_value('createaccount') || (true === apply_filters('woocommerce_create_account_default_checked', false))), true); ?> type="checkbox" name="createaccount" value="1" /> <span><?php esc_html_e('Create an account?', 'woocommerce'); ?></span>
				</label>
			</p>

		<?php endif; ?>

		<?php do_action('woocommerce_before_checkout_registration_form', $checkout); ?>

		<?php if ($checkout->get_checkout_fields('account')) : ?>

			<div class="create-account">
				<?php foreach ($checkout->get_checkout_fields('account') as $key => $field) : ?>
					<?php woocommerce_form_field($key, $field, $checkout->get_value($key)); ?>
				<?php endforeach; ?>
				<div class="clear"></div>
			</div>

		<?php endif; ?>

		<?php do_action('woocommerce_after_checkout_registration_form', $checkout); ?>
	</div>
<?php endif; ?>