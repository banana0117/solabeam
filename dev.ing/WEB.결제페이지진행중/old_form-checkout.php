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

    <!--
    <div style="text-align:center; padding:10px;">
        <p>금요일을 배송출발일로 선택할 경우,<br>다음날 수령이 불가할 수있습니다.<br>배송문제 발생시 도담밀에 말씀해주세요.</p>
    </div>
-->

    <div id="order_review" class="woocommerce-checkout-review-order">
        <!-- <a href="#" onclick="history.go(-1)" class="muhan_loop" id="imsi_loop" style="display:block;">결제창이 로딩되지 않으면<br><b>여기</b>를 눌러주세요!</a>-->
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

?>

<script>
    $("input[name='radio_choice_mem']").prop("checked", false);
    $("input[name='radio_choice_pop']").prop("checked", false);
    $("input[name='radio_choice_opt_pot']").prop("checked", false);
    $("input[name='radio_choice_opt_multipot']").prop("checked", false);
    $("input[name='radio_choice_opt_snack']").prop("checked", false);
    $("input[name='radio_choice_opt_table']").prop("checked", false);
    $("input[name='radio_choice_opt_counter']").prop("checked", false);
    $("input[name='radio_choice_dis']").val('0').prop("selected", true);

    var pays = "<?php echo $paycodes ?>";
    var periods = "<?php echo $periodcodes ?>";

    $(document).ready(function() {

        if (pays == "a") {
            $("#meal_kit_form").show();
            $("#basic_a_btn").trriger("click");
            $("#meal_detail").show();
            $("#etc_detail").hide();
        } else if (pays == "b") {
            $("#meal_kit_form").show();
            $("#basic_b_btn").trriger("click");
            $("#meal_detail").show();
            $("#etc_detail").hide();
        } else if (pays == "p") {
            $("#meal_kit_form").show();
            $("#prm_btn").trriger("click");
            $("#meal_detail").show();
            $("#etc_detail").hide();
        } else if (pays == "set") {
            $("#meal_kit_form").hide();
            $("#dtwc_delivery_date_field").val('<?php echo $tommorow ?>');
            $("#meal_detail").hide();
            $("#etc_detail").show();
            $("#etc_img").attr("src",""); // 상품별 이미지 url
            $("#radio_choice_opt_multipot_15000").trriger("click");
        } else if (pays == "pot") {
            $("#meal_kit_form").hide();
            $("#dtwc_delivery_date_field").val('<?php echo $tommorow ?>');
            $("#meal_detail").hide();
            $("#etc_detail").show();
            $("#etc_img").attr("src","");// 상품별 이미지 url
            $("#radio_choice_opt_pot_15000").trriger("click");
        } else if (pays == "maker") {
            $("#meal_kit_form").hide();
            $("#dtwc_delivery_date_field").val('<?php echo $tommorow ?>');
            $("#meal_detail").hide();
            $("#etc_detail").show();
            $("#etc_img").attr("src","");// 상품별 이미지 url
        }

        if (periods == "jun") {
            $("#jun_btn").trriger("click");
        } else if (periods == "cho") {
            $("#cho_btn").trriger("click");
        } else if (periods == "jung") {
            $("#jung_btn").trriger("click");
        } else if (periods == "hu") {
            $("#hu_btn").trriger("click");
        } else if (periods == "wan") {
            $("#wan_btn").trriger("click");
        } else if (periods == "yoo") {
            $("#yoo_btn").trriger("click");
        }

    });

    $("input[name='radio_choice_mem']").hide();
    $("input[name='radio_choice_pop']").hide();
    $("input[name='radio_choice_pot']").hide();
    $("input[name='radio_choice_multipot']").hide();
    $("input[name='radio_choice_maker']").hide();
    $("input[name='radio_choice_snack']").hide();
    $("input[name='radio_choice_table']").hide();
    $("input[name='radio_choice_counter']").hide();

    $("input[name='radio_choice_pop']").each(function() {
        var labelID = $(this).attr("id");
        $("label[for=" + labelID + "]").hide();
    });
    $("input[name='radio_choice_mem']").each(function() {
        var labelID = $(this).attr("id");
        $("label[for=" + labelID + "]").hide();
    });

    $("input[name='radio_choice_table']").each(function() {
        var labelID = $(this).attr("id");
        $("label[for=" + labelID + "]").hide();
    });

    $("input[name='radio_choice_pot']").each(function() {
        var labelID = $(this).attr("id");
        $("label[for=" + labelID + "]").hide();
    });

    $("input[name='radio_choice_maker']").each(function() {
        var labelID = $(this).attr("id");
        $("label[for=" + labelID + "]").hide();
    });

    $("input[name='radio_choice_snack']").each(function() {
        var labelID = $(this).attr("id");
        $("label[for=" + labelID + "]").hide();
    });

    $("input[name='radio_choice_multipot']").each(function() {
        var labelID = $(this).attr("id");
        $("label[for=" + labelID + "]").hide();
    });

    $("input[name='radio_choice_counter']").each(function() {
        var labelID = $(this).attr("id");
        $("label[for=" + labelID + "]").hide();
    });

    // 멤버십선택시 가격변경
    $("#basic_a_btn").on('click', function() {
        $("#radio_choice_table_1").trriger("click");
        $(".basic_only").show();
    });

    $("#basic_b_btn").on('click', function() {
        $("#radio_choice_table_2").trriger("click");
        $(".basic_only").show();
    });

    $("#prm_btn").on('click', function() {
        $("#radio_choice_table_0").trriger("click");
        $(".basic_only").hide();
    });

    // 시기 선택시 가격변경
    $("#jun_btn").on('click', function() {
        $("#radio_choice_pop_69000").trigger("click");
        $(".checkout-period-btn").removeClass("checked");
        $(this).addClass("checked");
        $("#period_img").attr("src","/wp-content/themes/storefront-child/con3/image/choice4.png");// 시기별 이미지 url
        $("input[name='radio_choice_dis']").val('0').prop("selected", true);
        $("input[name='radio_choice_dis'").val('1').prop("disabled", false);
        $("input[name='radio_choice_dis'").val('2').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('3').prop("disabled", true);
    });

    $("#cho_btn").on('click', function() {
        $("#radio_choice_pop_89000").trigger("click");
        $(".checkout-period-btn").removeClass("checked");
        $(this).addClass("checked");
        $("#period_img").attr("src","/wp-content/themes/storefront-child/con3/image/choice06");// 시기별 이미지 url
        $("input[name='radio_choice_dis']").val('0').prop("selected", true);
        $("input[name='radio_choice_dis'").val('1').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('2').prop("disabled", false);
        $("input[name='radio_choice_dis'").val('3').prop("disabled", false);
    });
    $("#jung_btn").on('click', function() {
        $("#radio_choice_pop_169000").trigger("click");
        $(".checkout-period-btn").removeClass("checked");
        $(this).addClass("checked");
        $("#period_img").attr("src","/wp-content/themes/storefront-child/con3/image/choice07");// 시기별 이미지 url
        $("input[name='radio_choice_dis']").val('0').prop("selected", true);
        $("input[name='radio_choice_dis'").val('1').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('2').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('3').prop("disabled", false);
    });
    $("#hu_btn").on('click', function() {
        $("#radio_choice_pop_239000").trigger("click");
        $(".checkout-period-btn").removeClass("checked");
        $(this).addClass("checked");
        $("#period_img").attr("src","/wp-content/themes/storefront-child/con3/image/choice10");// 시기별 이미지 url
        $("input[name='radio_choice_dis']").val('0').prop("selected", true);
        $("input[name='radio_choice_dis'").val('1').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('2').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('3').prop("disabled", true);

    });
    $("#wan_btn").on('click', function() {
        $("#radio_choice_pop_249000").trigger("click");
        $(".checkout-period-btn").removeClass("checked");
        $(this).addClass("checked");
        $("#period_img").attr("src","/wp-content/themes/storefront-child/con3/image/choice13");// 시기별 이미지 url
        $("input[name='radio_choice_dis']").val('0').prop("selected", true);
        $("input[name='radio_choice_dis'").val('1').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('2').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('3').prop("disabled", true);
    });
    $("#yoo_btn").on('click', function() {
        $("#radio_choice_pop_199000").trigger("click");
        $(".checkout-period-btn").removeClass("checked");
        $(this).addClass("checked");
        $("#period_img").attr("src","/wp-content/themes/storefront-child/con3/image/choice14");// 시기별 이미지 url
        $("input[name='radio_choice_dis']").val('0').prop("selected", true);
        $("input[name='radio_choice_dis'").val('1').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('2').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('3').prop("disabled", true);
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

    $("#multipot_btn").on('click', function() {
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
            $("#radio_choice_opt_counter_1").trriger("click");
        }
        elseif(counters == 2) {
            $("#add").text('1');
            $("#radio_choice_opt_counter_1").trriger("click");
        }
        elseif(counters == 3) {
            $("#add").text('2');
            $("#radio_choice_opt_counter_2").trriger("click");
        }
        elseif(counters == 4) {
            $("#add").text('3');
            $("#radio_choice_opt_counter_3").trriger("click");
        }
        elseif(counters == 5) {
            $("#add").text('4');
            $("#radio_choice_opt_counter_4").trriger("click");
        }
        elseif(counters == 6) {
            $("#add").text('5');
            $("#radio_choice_opt_counter_5").trriger("click");
        }
        elseif(counters == 7) {
            $("#add").text('6');
            $("#radio_choice_opt_counter_6").trriger("click");
        }
        elseif(counters == 8) {
            $("#add").text('7');
            $("#radio_choice_opt_counter_7").trriger("click");
        }
        elseif(counters == 9) {
            $("#add").text('8');
            $("#radio_choice_opt_counter_8").trriger("click");
        }
    });

    $("#add_p").on('click', function() {
        var counters = $("#add").text();
        if (counters == 1) {
            $("#add").text('2');
            $("#radio_choice_opt_counter_2").trriger("click");
        }
        elseif(counters == 2) {
            $("#add").text('3');
            $("#radio_choice_opt_counter_3").trriger("click");
        }
        elseif(counters == 3) {
            $("#add").text('4');
            $("#radio_choice_opt_counter_4").trriger("click");
        }
        elseif(counters == 4) {
            $("#add").text('5');
            $("#radio_choice_opt_counter_5").trriger("click");
        }
        elseif(counters == 5) {
            $("#add").text('6');
            $("#radio_choice_opt_counter_6").trriger("click");
        }
        elseif(counters == 6) {
            $("#add").text('7');
            $("#radio_choice_opt_counter_7").trriger("click");
        }
        elseif(counters == 7) {
            $("#add").text('8');
            $("#radio_choice_opt_counter_8").trriger("click");
        }
        elseif(counters == 8) {
            $("#add").text('9');
            $("#radio_choice_opt_counter_9").trriger("click");
        }
        elseif(counters == 9) {
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

    });

    $(document).ready(function() {

        var names = $("#billing_first_name").val();
        var phones = $("#billing_first_phone").val();
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

    $("#selboxdirect").on('keyup change', function(){
        $("#order_comments").val($(this).val());
    });

    $("#recommend").on('keyup change', function(){
        $("#recommendid").val($(this).val());
    });
</script>