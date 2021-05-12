<?php

/**
 * Checkout Payment Section
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.3
 * 
 * 
 * wp-content/plugins/woocommerce/template/checkout 에 payment.php 에 덮어씌워주시면됩니다
 * 탭의 수정은 아래에 주석에 달아뒀어요
 * 결제수단의 내용도 아래에 있는 h3을 수정하면 됩니다.
 * 
 * 	css에 .wc_payment_method 얘를 display:none !important 해주세요
 * 
 */

defined('ABSPATH') || exit;

if (!is_ajax()) {
	do_action('woocommerce_review_order_before_payment');
}
?>
<div id="payment" class="woocommerce-checkout-payment">
	<div class="checkout-boxes">
<div class="checkout-title">
<p class="">결제수단</p>
</div>
	<!-- 탭버튼은 아래에 있는것을 수정하자 -->
	<div class="pay-title" style="display:flex; ">
		<div>
			<p class="payment-btns on" style="border-top-left-radius:5px; border-bottom-left-radius:5px;" id="subtab">카드결제</p>
		</div>
		<div>
			<p class="payment-btns" style="border-top-right-radius:5px; border-bottom-right-radius:5px;" id="kakaotab">카카오페이</p>
		</div>
	</div>
	<script>
		$("#subtab").on("click", function() {
			$(".payment-btns").removeClass('on');
			$(this).addClass('on');
			$(".payment_method_iamport_subscription").show();
			$(".wc_payment_method").hide();
			$(".payment_method_iamport_kakao").hide();
		});

		$("#kakaotab").on("click", function() {
			$(".payment-btns").removeClass('on');
			$(this).addClass('on');
			$(".payment_method_iamport_subscription").hide();
			$(".wc_payment_method").hide();
			$(".payment_method_iamport_kakao").show();
		});
	</script>

	<?php if (WC()->cart->needs_payment()) : ?>
		<ul class="wc_payment_methods payment_methods methods">
			<?php
			if (!empty($available_gateways)) {
				foreach ($available_gateways as $gateway) {
					wc_get_template('checkout/payment-method.php', array('gateway' => $gateway));
				}
			} else {
				echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters('woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__('Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce') : esc_html__('Please fill in your details above to see available payment methods.', 'woocommerce')) . '</li>'; // @codingStandardsIgnoreLine
			}
			?>
		</ul>
	<?php endif; ?>
		</div>
	<div class="form-row place-order">
		<noscript>
			<?php
			/* translators: $1 and $2 opening and closing emphasis tags respectively */
			printf(esc_html__('Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce'), '<em>', '</em>');
			?>
			<br /><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e('Update totals', 'woocommerce'); ?>"><?php esc_html_e('Update totals', 'woocommerce'); ?></button>
		</noscript>

		<?php wc_get_template('checkout/terms.php'); ?>

		<?php do_action('woocommerce_review_order_before_submit'); ?>

		<?php echo apply_filters('woocommerce_order_button_html', '<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr($order_button_text) . '" data-value="' . esc_attr($order_button_text) . '">' . esc_html($order_button_text) . '</button>'); // @codingStandardsIgnoreLine 
		?>

		<?php do_action('woocommerce_review_order_after_submit'); ?>

		<?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>
	</div>
</div>
<?php
if (!is_ajax()) {
	do_action('woocommerce_review_order_after_payment');
}
