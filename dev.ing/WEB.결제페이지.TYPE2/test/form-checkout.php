<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 * 
 * @banana custom
 * 
 * wp-content/plugins/woocommerce/checkout/form-checkout.php 에 덮어씌우면 됩니다
 * 결제페이지에서 ridio 버튼들의 jquery 동작이 포함된 파일입니다
 * 딱히 수정하고 건드릴건 없지만 jquery 동작이 이상하면 수정해야하는 파일입니다
 * 
 */
if (!defined('ABSPATH')) {
    exit;
}

do_action('woocommerce_before_checkout_form', $checkout);
// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
    echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
    return;
}
?>

<style>
.checkout-title {
    padding-bottom: 20px;
    padding-top: 30px;
}

.checkout-title p {
    font-size: 16px;
    font-weight: bold;
    color: #333;
}

.flexed {
    display: flex;
}

.flexibled {
    justify-content: space-between;
}

.period-title {
    display: flex;
    padding-bottom: 10px;
}

.period-title p {
    font-size: 15px;
    color: #333;
    width: 100%;
}

.period-title span {
    font-size: 15px;
    font-weight: bold;
    text-align: right;
    color: #333;
    width: 60%;
}

.detail-img {
    width: 30%;
}

.detail-order {
    width: 70%;
    padding: 0 10px;
}

.deli-type p {
    font-size: 14px;
    color: #666;
}

.opt-wrap {
    display: block;
    float: left;
    padding-top: 20px;
    padding-bottom: 20px;
}

.opt-price {
    display: inline-block;
    width: 50%;
}

.opt-price p {
    font-size: 12px;
    color: #666;
}

.opt-price span {
    font-size: 14px;
    color: #666;
}

.period-detail {
    font-size: 14px;
    color: #666;
}

.total-prices {
    border-top: 1px solid #c4c4c4;
    padding: 20px 0;
    width: 100%;
}

.total-prices p {
    font-size: 15px;
    color: #333;
    width: 100%;
}

.total-prices .left {
    text-align: left;
    padding-top: 6px;
}

.total-prices .right {
    text-align: right;
}

.total-prices span {
    font-size: 24px;
    color: #333;
}

.opt-parts {
    padding-top: 30px;
}

.opt-parts p {
    width: 100%;
    font-size: 15px;
    color: #333;
    padding-bottom: 10px;
}

.checkout-counter {}

.checkout-counter .minus {}

.checkout-counter .plus {}

.checkout-counter .counter {}

.discount-price {
    display: flex;
}

.discount-price p {
    color: #2277f2;
    font-size: 14px;
    text-align: left;
    justify-content: space-between;
}

.discount-price span {
    color: #2277f2;
    font-size: 14px;
    text-align: right;
    justify-content: space-between;
    width: 100%;
}


/* 주문내역변경하기 */

.checkout-slide-box {}

.checkout-slide-box p {
    padding: 14px;
    border: 1px solid #c4c4c4;
    border-radius: 5px;
    font-size: 15px;
    color: #777;
}

.checkout-slide-box.opend p {
    border: none;
    border-bottom: 1px dotted #c4c4c4;
}

.checkout-custom-wrap.opend {
    border: 1.5px solid #333;
    border-radius: 5px;
}

.checkout-slide-box p::after {}

.checkout-slide-down {
    display: none;
    padding: 0 15px;
}

.opt-pop-btn {
    text-align: right;
    font-size: 14px;
    color: #777 !important;
    text-decoration-line: underline;
    font-weight: normal !important;
}

.checkout-btns {
    width: 100%;
    margin: 6px 0;
    display: block;
    border: 1px solid #c4c4c4;
    background-color: #fff;
    border-radius: 5px;
    padding: 10px 0;
    font-size: 14px;
    color: #777;
    text-align: center;
    height: 45px;
}

.checkout-btns.checkout-period-btn {
    padding: 6px;
    line-height: 16px;
    height: 45px;
}

.checkout-btns.checked {
    border: 1.5px solid #333;
    background-color: #f2f2f2;
    color: #333;
}


/* 카드창 */

fieldset {
    margin: 0;
    padding: 0;
}

.banana-checkout-box input {
    background-color: #fff;
    border: 1px solid #c4c4c4;
    box-shadow: none;
    font-size: 15px !important;
    height: 45px;
}

.banana-checkout-box input::placeholder {
    color: #c4c4c4;
}

.banana-checkout-box select {
    background-color: #fff;
    border: 1px solid #c4c4c4;
    box-shadow: none;
    margin-right: 0;
    color: #c4c4c4;
    font-size: 15px;
    height: 45px;
}

.banana-checkout-box .left-radius {
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}

.banana-checkout-box .right-radius {
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
}

.banana-checkout-box .longs {
    width: 100%;
}

.banana-checkout-box .shorts {
    width: 30%;
}

.banana-checkout-box div {
    margin: 7px 0;
}


/* 적립금 */

.checkout-points input {
    background-color: #fff;
    border: 1px solid #c4c4c4;
    width: 100%;
    border-radius: 5px;
    color: #c4c4c4;
    height: 45px;
}

.checkout-points .flexed p {
    font-size: 14px;
    color: #666;
    width: 100%;
}

.checkout-points .flexed span {
    font-size: 14px;
    color: #2277f2;
}


/* 추천인 */

.checkout-recos input {
    background-color: #fff;
    border: 1px solid #c4c4c4;
    width: 100%;
    border-radius: 5px;
    height: 45px;
}

.checkout-recos .reco-notice {
    font-size: 14px;
    color: #2277f2;
    padding-top: 10px;
}

#recommendid_field {
    display: none;
}

#order_comments_field {
    display: none;
}

.wc_payment_method.payment_method_iamport_subscription {
    display: none !important;
}

.wc_payment_method.payment_method_iamport_kakao {
    display: none !important;
}

#radio_choice_dis {
    border-radius: 5px;
    border: 1px solid #c4c4c4;
    padding: 11px 15px;
    color: #333;
    height: 45px;
}

.payment-btns {
    background-color: #fff;
    height: 50px;
    padding: 14px 55px;
    font-size: 15px;
    color: #c4c4c4;
    border: 1px solid #c4c4c4;
    text-align: center;
}

.payment-btns.on {
    color: #fff;
    background-color: #ff9900;
}

.pay-title div {
    width: 100%;
}

.woocommerce-billing-fields__field-wrapper {
    position: absolute;
    left: -9999px;
}

#selboxdirect {
    display: none;
    height: 45px;
    width: 100%;
    border: 1px solid #c4c4c4;
    background-color: #fff;
    border-radius: 5px;
    color: #666;
    margin-top: 15px;
}

#selbox {
    width: 100%;
    height: 45px;
    border: 1px solid #c4c4c4;
    border-radius: 5px;
    padding: 5px 15px;
    color: #777;
}

#dtwc_delivery_date {
    height: 45px;
    border: 1px solid #c4c4c4;
    border-radius: 5px;
    padding: 5px 15px;
    color: #777;
    background-color: #fff;
}

label[for='dtwc_delivery_date'] {
    padding-bottom: 20px;
    padding-top: 30px;
    font-size: 16px;
    font-weight: bold;
    color: #333;
}

.checkout-boxes {
    padding: 0 20px;
    padding-bottom: 30px;
    border-bottom: 5px solid #f2f2f2;
}

#dtwc_delivery_date_field {
    padding: 0 20px;
    padding-bottom: 30px;
    border-bottom: 5px solid #f2f2f2;
}

.woocommerce-checkout-review-order {
    padding: 0;
}

.woocommerce-checkout #payment div.payment_box .wc-credit-card-form-card-quota {
    margin: 0;
}

.pay-title {
    padding-bottom: 25px;
}

.del-pop-detail .flexed label {
    width: 30%;
    padding-top: 13px;
}

.del-pop-detail .flexed input {
    width: 100%;
    margin: 5px 0;
    height: 45px;
    border-radius: 5px;
    color: #c4c4c4;
    background-color: #fff;
    border: 1px solid #c4c4c4;
}

.del-pop-title-text {
    font-size: 18px;
}

.js-order-detail-btn {
    margin-top: 10px;
}

.ui-widget-header {
    background-color: #ff82a0;
}
</style>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
    <?php if ($checkout->get_checkout_fields()) : ?>
        <?php do_action('woocommerce_checkout_before_customer_details'); ?>
        <div class="col2-set" id="customer_details">
            <div class="col-1">
                <?php do_action('woocommerce_checkout_billing'); ?>
            </div>
            <div class="col-2">
                <?php do_action('woocommerce_checkout_shipping'); ?>
            </div>
        </div>
        <?php do_action('woocommerce_checkout_after_customer_details'); ?>
    <?php endif; ?>
    <?php do_action('woocommerce_checkout_before_order_review_heading'); ?>
    <h3 id="order_review_heading"><?php esc_html_e('Your order', 'woocommerce'); ?></h3>
    <?php do_action('woocommerce_checkout_before_order_review'); ?>

    <div id="order_review" class="woocommerce-checkout-review-order">

        <?php do_action('woocommerce_checkout_order_review'); ?>
    </div>
    <?php do_action('woocommerce_checkout_after_order_review'); ?>
</form>
<?php do_action('woocommerce_after_checkout_form', $checkout); ?>

<?php
$paycodes = $_POST['paycode'];
$periodcodes = $_POST['periodcode'];
$today = date("Y-m-d");
$tommorow = date("Y-m-d", strtotime("+1 Days", strtotime($today)));

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
$current_user = wp_get_current_user();
$user_id = $current_user->user_login;

$userquery = "SELECT * FROM wp_usermeta WHERE meta_value = '$user_id'";
$userresult = mysqli_query($mysqli, $userquery);
$userrow = mysqli_fetch_array($userresult);

$codes = $userrow[user_id];

$codequery = "SELECT * FROM wp_usermeta WHERE user_id = '$codes' AND meta_key = 'first_name'";
$coderesult = mysqli_query($mysqli, $codequery);
$coderow = mysqli_fetch_array($coderesult);

$names = $coderow[meta_value];

?>

<script>

    $("input[name='radio_choice_pop']").prop("checked", false);
    $("input[name='radio_choice_opt_pot']").prop("checked", false);
    $("input[name='radio_choice_opt_multipot']").prop("checked", false);
    $("input[name='radio_choice_opt_snack']").prop("checked", false);
    $("input[name='radio_choice_opt_table']").prop("checked", false);
    $("input[name='radio_choice_opt_counter']").prop("checked", false);
    $("input[name='radio_choice_opt_maker']").prop("checked", false);
    
    $("#radio_choice_dis option[value='0']").prop("selected", true);

    $("#radio_choice_pop_0").trigger("click");
    $("#radio_choice_opt_pot_0").trigger("click");
    $("#radio_choice_opt_multipot_0").trigger("click");
    $("#radio_choice_opt_snack_0").trigger("click");
    $("#radio_choice_opt_table_0").trigger("click");
    $("#radio_choice_opt_maker_0").trigger("click");
    $("#radio_choice_opt_counter_0").trigger("click");

    $("#meal_detail").hide();
    $("#etc_detail").hide();


    var pays = "<?php echo $paycodes; ?>";
    var periods = "<?php echo $periodcodes; ?>";

    $(document).ready(function(){
        if (pays == "a") {
            $("#meal_kit_form").show();
            $("#basic_a_btn").trigger("click");
            $("#meal_detail").show();
            $("#etc_detail").hide();
        } else if (pays == "b") {
            $("#meal_kit_form").show();
            $("#basic_b_btn").trigger("click");
            $("#meal_detail").show();
            $("#etc_detail").hide();
        } else if (pays == "p") {
            $("#meal_kit_form").show();
            $("#prm_btn").trigger("click");
            $("#meal_detail").show();
            $("#etc_detail").hide();
        } else if (pays == "set") {
            $("#meal_kit_form").hide();
            $("#dtwc_delivery_date").val('<?php echo $tommorow ?>');
            $("#meal_detail").hide();
            $("#etc_detail").show();
            $("#etc_img").attr("src", ""); // 상품별 이미지 url
            $("#radio_choice_opt_multipot_15000").trigger("click");
            $("#radio_choice_opt_counter_1").trigger("click");
            $("#product_detail").html('이유식에 필요한 도구를 모두 한번에!');
            $("#dtwc_delivery_date_field").css('position','absolute');
            $("#dtwc_delivery_date_field").css('left','-9999px');
        } else if (pays == "pot") {
            $("#meal_kit_form").hide();
            $("#dtwc_delivery_date").val('<?php echo $tommorow ?>');
            $("#meal_detail").hide();
            $("#etc_detail").show();
            $("#etc_img").attr("src", ""); // 상품별 이미지 url
            $("#radio_choice_opt_pot_15000").trigger("click");
            $("#radio_choice_opt_counter_1").trigger("click");
            $("#product_detail").html('도담밀이 만든 이유식 전용 냄비!');
            $("#dtwc_delivery_date_field").css('position','absolute');
            $("#dtwc_delivery_date_field").css('left','-9999px');
        } else if (pays == "maker") {
            $("#meal_kit_form").hide();
            $("#dtwc_delivery_date").val('<?php echo $tommorow ?>');
            $("#meal_detail").hide();
            $("#etc_detail").show();
            $("#etc_img").attr("src", ""); // 상품별 이미지 url
            $("#radio_choice_opt_counter_1").trigger("click");
            $("#product_detail").html('이유식을 더욱 간편하게!');
            $("#dtwc_delivery_date_field").css('position','absolute');
            $("#dtwc_delivery_date_field").css('left','-9999px');
        } 

        if (periods == "jun") {
            $("#jun_btn").trigger("click");
        } else if (periods == "cho") {
            $("#cho_btn").trigger("click");
        } else if (periods == "jung") {
            $("#jung_btn").trigger("click");
        } else if (periods == "hu") {
            $("#hu_btn").trigger("click");
        } else if (periods == "wan") {
            $("#wan_btn").trigger("click");
        } else if (periods == "yoo") {
            $("#yoo_btn").trigger("click");
        }
    });

    $("input[name='radio_choice_pop']").css('position','absolute');
    $("input[name='radio_choice_pop']").css('left','-9999px');
    $("input[name='radio_choice_opt_pot']").css('position','absolute');
    $("input[name='radio_choice_opt_multipot']").css('position','absolute');
    $("input[name='radio_choice_opt_maker']").css('position','absolute');
    $("input[name='radio_choice_opt_snack']").css('position','absolute');
    $("input[name='radio_choice_table']").css('position','absolute');
    $("input[name='radio_choice_opt_counter']").css('position','absolute');

    $("input[name='radio_choice_opt_pot']").css('left','-9999px');
    $("input[name='radio_choice_opt_multipot']").css('left','-9999px');
    $("input[name='radio_choice_opt_maker']").css('left','-9999px');
    $("input[name='radio_choice_opt_snack']").css('left','-9999px');
    $("input[name='radio_choice_table']").css('left','-9999px');
    $("input[name='radio_choice_opt_counter']").css('left','-9999px');

    $("input[name='radio_choice_pop']").each(function() {
        var labelID = $(this).attr("id");
        $("label[for=" + labelID + "]").css('position','absolute');
        $("label[for=" + labelID + "]").css('left','-9999px');
    });

    $("input[name='radio_choice_table']").each(function() {
        var labelID = $(this).attr("id");
        $("label[for=" + labelID + "]").css('position','absolute');
        $("label[for=" + labelID + "]").css('left','-9999px');
    });
    $("input[name='radio_choice_opt_pot']").each(function() {
        var labelID = $(this).attr("id");
        $("label[for=" + labelID + "]").css('position','absolute');
        $("label[for=" + labelID + "]").css('left','-9999px');
    });
    $("input[name='radio_choice_opt_maker']").each(function() {
        var labelID = $(this).attr("id");
        $("label[for=" + labelID + "]").css('position','absolute');
        $("label[for=" + labelID + "]").css('left','-9999px');
    });
    $("input[name='radio_choice_opt_snack']").each(function() {
        var labelID = $(this).attr("id");
        $("label[for=" + labelID + "]").css('position','absolute');
        $("label[for=" + labelID + "]").css('left','-9999px');
    });
    $("input[name='radio_choice_opt_multipot']").each(function() {
        var labelID = $(this).attr("id");
        $("label[for=" + labelID + "]").css('position','absolute');
        $("label[for=" + labelID + "]").css('left','-9999px');
    });
    $("input[name='radio_choice_opt_counter']").each(function() {
        var labelID = $(this).attr("id");
        $("label[for=" + labelID + "]").css('position','absolute');
        $("label[for=" + labelID + "]").css('left','-9999px');
    });
    // 멤버십선택시 가격변경
    $("#basic_a_btn").on('click', function() {
        $("#radio_choice_table_1").trigger("click");
        $(".basic_only").show();
        $(".checkout-membership-btn").removeClass("checked");
        $(this).addClass("checked");
    });
    $("#basic_b_btn").on('click', function() {
        $("#radio_choice_table_2").trigger("click");
        $(".basic_only").show();
        $(".checkout-membership-btn").removeClass("checked");
        $(this).addClass("checked");
    });
    $("#prm_btn").on('click', function() {
        $("#radio_choice_table_3").trigger("click");
        $(".basic_only").hide();
        $(".checkout-membership-btn").removeClass("checked");
        $(this).addClass("checked");
    });
    // 시기 선택시 가격변경
    $("#jun_btn").on('click', function() {
        $("#radio_choice_pop_69000").trigger("click");
        $(".checkout-period-btn").removeClass("checked");
        $(this).addClass("checked");
        $("#period_img").attr("src", ""); // 시기별 이미지 url
        $("#radio_choice_dis option[value='0']").prop("selected", true);
        $("#radio_choice_dis option[value='1']").prop("disabled", false);
        $("#radio_choice_dis option[value='2']").prop("disabled", true);
        $("#radio_choice_dis option[value='3']").prop("disabled", true);
    });
    $("#cho_btn").on('click', function() {
        $("#radio_choice_pop_89000").trigger("click");
        $(".checkout-period-btn").removeClass("checked");
        $(this).addClass("checked");
        $("#period_img").attr("src", ""); // 시기별 이미지 url
        $("#radio_choice_dis option[value='0']").prop("selected", true);
        $("#radio_choice_dis option[value='1']").prop("disabled", true);
        $("#radio_choice_dis option[value='2']").prop("disabled", false);
        $("#radio_choice_dis option[value='3']").prop("disabled", true);
    });
    $("#jung_btn").on('click', function() {
        $("#radio_choice_pop_169000").trigger("click");
        $(".checkout-period-btn").removeClass("checked");
        $(this).addClass("checked");
        $("#period_img").attr("src", ""); // 시기별 이미지 url
        $("#radio_choice_dis option[value='0']").prop("selected", true);
        $("#radio_choice_dis option[value='1']").prop("disabled", true);
        $("#radio_choice_dis option[value='2']").prop("disabled", true);
        $("#radio_choice_dis option[value='3']").prop("disabled", false);
    });
    $("#hu_btn").on('click', function() {
        $("#radio_choice_pop_239000").trigger("click");
        $(".checkout-period-btn").removeClass("checked");
        $(this).addClass("checked");
        $("#period_img").attr("src", ""); // 시기별 이미지 url
        $("#radio_choice_dis option[value='0']").prop("selected", true);
        $("#radio_choice_dis option[value='1']").prop("disabled", true);
        $("#radio_choice_dis option[value='2']").prop("disabled", true);
        $("#radio_choice_dis option[value='3']").prop("disabled", true);
    });
    $("#wan_btn").on('click', function() {
        $("#radio_choice_pop_249000").trigger("click");
        $(".checkout-period-btn").removeClass("checked");
        $(this).addClass("checked");
        $("#period_img").attr("src", ""); // 시기별 이미지 url
        $("#radio_choice_dis option[value='0']").prop("selected", true);
        $("#radio_choice_dis option[value='1']").prop("disabled", true);
        $("#radio_choice_dis option[value='2']").prop("disabled", true);
        $("#radio_choice_dis option[value='3']").prop("disabled", true);
        
    });
    $("#yoo_btn").on('click', function() {
        $("#radio_choice_pop_199000").trigger("click");
        $(".checkout-period-btn").removeClass("checked");
        $(this).addClass("checked");
        $("#period_img").attr("src", ""); // 시기별 이미지 url
        $("#radio_choice_dis option[value='0']").prop("selected", true);
        $("#radio_choice_dis option[value='1']").prop("disabled", true);
        $("#radio_choice_dis option[value='2']").prop("disabled", true);
        $("#radio_choice_dis option[value='3']").prop("disabled", true);
    });

    $("#snack_btn").on('click', function() {
        if ($(this).hasClass("disabled")) {} else {
            if ($("#radio_choice_opt_snack_15000").is(":checked")) {
                $("#radio_choice_opt_snack_0").trigger("click");
            } else {
                $("#radio_choice_opt_snack_15000").trigger("click");
                $("#radio_choice_opt_snacke_0").trigger("click");
            }
        }
        if ($("#radio_choice_opt_snack_15000").prop("checked")) {
            $(this).addClass("checked");
        } else {
            $(this).removeClass("checked");
        }
    });
    $("#set_btn").on('click', function() {
        if ($(this).hasClass("disabled")) {} else {
            if ($("#radio_choice_opt_multipot_15000").is(":checked")) {
                $("#radio_choice_opt_multipot_0").trigger("click");
            } else {
                $("#radio_choice_opt_multipot_15000").trigger("click");
            }
        }
        if ($("#radio_choice_opt_multipot_15000").prop("checked")) {
            $(this).addClass("checked");
        } else {
            $(this).removeClass("checked");
        }
    });
    $("#pot_btn").on('click', function() {
        if ($(this).hasClass("disabled")) {} else {
            if ($("#radio_choice_opt_pot_15000").is(":checked")) {
                $("#radio_choice_opt_pot_0").trigger("click");
            } else {
                $("#radio_choice_opt_pot_15000").trigger("click");
            }
        }
        if ($("#radio_choice_opt_pot_15000").prop("checked")) {
            $(this).addClass("checked");
        } else {
            $(this).removeClass("checked");
        }
    });
    $("#add_d").on('click', function() {
        var counters = $("#add").text();
        if (counters == 1) {
            $("#add").text('1');
            $("#radio_choice_opt_counter_1").trigger("click");
        } else if (counters == 2) {
            $("#add").text('1');
            $("#radio_choice_opt_counter_1").trigger("click");
        } else if (counters == 3) {
            $("#add").text('2');
            $("#radio_choice_opt_counter_2").trigger("click");
        } else if (counters == 4) {
            $("#add").text('3');
            $("#radio_choice_opt_counter_3").trigger("click");
        } else if (counters == 5) {
            $("#add").text('4');
            $("#radio_choice_opt_counter_4").trigger("click");
        } else if (counters == 6) {
            $("#add").text('5');
            $("#radio_choice_opt_counter_5").trigger("click");
        } else if (counters == 7) {
            $("#add").text('6');
            $("#radio_choice_opt_counter_6").trigger("click");
        } else if (counters == 8) {
            $("#add").text('7');
            $("#radio_choice_opt_counter_7").trigger("click");
        } else if (counters == 9) {
            $("#add").text('8');
            $("#radio_choice_opt_counter_8").trigger("click");
        }
    });
    $("#add_p").on('click', function() {
        var counters = $("#add").text();
        if (counters == 1) {
            $("#add").text('2');
            $("#radio_choice_opt_counter_2").trigger("click");
        } else if (counters == 2) {
            $("#add").text('3');
            $("#radio_choice_opt_counter_3").trigger("click");
        } else if (counters == 3) {
            $("#add").text('4');
            $("#radio_choice_opt_counter_4").trigger("click");
        } else if (counters == 4) {
            $("#add").text('5');
            $("#radio_choice_opt_counter_5").trigger("click");
        } else if (counters == 5) {
            $("#add").text('6');
            $("#radio_choice_opt_counter_6").trigger("click");
        } else if (counters == 6) {
            $("#add").text('7');
            $("#radio_choice_opt_counter_7").trigger("click");
        } else if (counters == 7) {
            $("#add").text('8');
            $("#radio_choice_opt_counter_8").trigger("click");
        } else if (counters == 8) {
            $("#add").text('9');
            $("#radio_choice_opt_counter_9").trigger("click");
        } else if (counters == 9) {
            alert('더 이상 추가할 수 없습니다.');
        }
    });
</script>
<script>
    $("#order_comments").hide();
    $("#recommendid").hide();
    $(".js-order-detail-btn").click(function() {
        var name = $("#detail_new_name").val();
        var phone = $("#detail_new_phone").val();
        var postcode = $("#detail_new_postcode").val();
        var post = $("#detail_new_post").val();
        var sidepost = $("#detail_new_sidepost").val();
        $("#billing_first_name").val(name);
        $("#billing_first_phone").val(phone);
        $("#billing_postcode").val(postcode);
        $("#billing_address_1").val(post);
        $("#billing_address_2").val(sidepost);
        $("#name").html(name);
        $("#phone").html(phone);
        $("#postcode").html(postcode);
        $("#post").html(post);
        $("#sidepost").html(sidepost);
        $("#delpop").css('top', '100%');
    });

    $(".js-deli-closed").on('click', function(){
        $(".del-pop").css('top', '100%');
    });
    
    $(document).ready(function() {
        $("#billing_first_name").val('<?php echo $names ?>');
        var names = $("#billing_first_name").val();
        var phones = $("#billing_phone").val();
        var postcodes = $("#billing_postcode").val();
        var posts = $("#billing_address_1").val();
        var sideposts = $("#billing_address_2").val();
        $("#name").html(names);
        $("#phone").html(phones);
        $("#postcode").html(postcodes);
        $("#post").html(posts);
        $("#sidepost").html(sideposts);
    });
    $("#selboxDirect").hide();
    $("#selbox").change(function() {
        var selbox = $("#selbox").val();
        $("#order_comments").val(selbox);
        if ($("#selbox").val() == "text") {
            $("#selboxdirect").show();
        } else {
            $("#selboxdirect").hide();
        }
    });
    $("#selboxdirect").on('keyup change', function() {
        $("#order_comments").val($(this).val());
    });
    $("#recommend").on('keyup change', function() {
        $("#recommendid").val($(this).val());
    });
</script>
<script>
$('#checkout-slide').on('click',function(){
    $('.checkout-slide-down').slideToggle();
    $(this).toggleClass('opend');
    $(".checkout-custom-wrap").toggleClass('opend');
});
</script>
<script>

    $("#deli-change").on('click', function(){
        $("#delpop").css('top', '0%');
    });

    $("#table-btns").on('click',function(){
        $(".table-pop").css('top','0%');
    });

    $("#etc-btns").on('click',function(){
        $(".etc-pop").css('top','0%');
    });

</script>

