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
$tablecodes = $_POST['tablecode'];
$periodcodes = $_POST['periodcode'];
?>

<script>
    $("input[name='radio_choice_pop']").prop("checked", false);
    $("input[name='radio_choice_table']").prop("checked", false);
    $("input[name='radio_choice_opt_super']").prop("checked", false);
    $("input[name='radio_choice_opt_mate']").prop("checked", false);
    $("input[name='radio_choice_opt_beef']").prop("checked", false);
    $("input[name='radio_choice_opt_water']").prop("checked", false);
    $("input[name='radio_choice_opt_weekend']").prop("checked", false);
    $("input[name='radio_choice_opt_tenloin']").prop("checked", false);
    $("input[name='radio_choice_opt_care']").prop("checked", false);
    $("input[name='radio_choice_opt_pot']").prop("checked", false);
    $("input[name='radio_choice_opt_multipot']").prop("checked", false);
    $("input[name='radio_choice_opt_snack']").prop("checked", false);
    $("input[name='radio_choice_opt_snacke']").prop("checked", false);
    $("input[name='radio_choice_dis']").val('0').prop("selected", true);

    var tables = "<?php echo $tablecodes; ?>";
    var periods = "<?php echo $periodcodes; ?>";

    $(document).ready(function() {
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

        if (tables == "a") {
            $("#a_btn").trigger("click");
        } else if (tables == "b") {
            $("#b_btn").trigger("click");
        } else if (tables == "c") {
            $("#c_btn").trigger("click");
        } else if (tables == "d") {
            $("#d_btn").trigger("click");
        } else if (tables == "e") {
            $("#e_btn").trigger("click");
        } else if (tables == "f") {
            $("#f_btn").trigger("click");
        }
    });
    $("input[name='radio_choice_pop']").hide();
    $("input[name='radio_choice_table']").hide();
    $("input[name='radio_choice_pop']").each(function() {
        var labelID = $(this).attr("id");
        $("label[for=" + labelID + "]").hide();
    });
    $("input[name='radio_choice_table']").each(function() {
        var labelID = $(this).attr("id");
        $("label[for=" + labelID + "]").hide();
    });

    $("#radio_choice_opt_super_0").hide();
    $("#radio_choice_opt_mate_0").hide();
    $("#radio_choice_opt_water_0").hide();
    $("#radio_choice_opt_beef_0").hide();
    $("#radio_choice_opt_tenloin_0").hide();
    $("#radio_choice_opt_weekend_0").hide();
    $("#radio_choice_opt_care_0").hide();
    $("#radio_choice_opt_snack_0").hide();
    $("#radio_choice_opt_multipot_0").hide();
    $("#radio_choice_opt_pot_0").hide();
    $("label[for=radio_choice_opt_super_0]").hide();
    $("label[for=radio_choice_opt_mate_0]").hide();
    $("label[for=radio_choice_opt_water_0]").hide();
    $("label[for=radio_choice_opt_beef_0]").hide();
    $("label[for=radio_choice_opt_tenloin_0]").hide();
    $("label[for=radio_choice_opt_weekend_0]").hide();
    $("label[for=radio_choice_opt_care_0]").hide();
    $("label[for=radio_choice_opt_snack_0]").hide();
    $("label[for=radio_choice_opt_multipot_0]").hide();
    $("label[for=radio_choice_opt_pot_0]").hide();
    $("#radio_choice_opt_super_15000").hide();
    $("#radio_choice_opt_mate_15000").hide();
    $("#radio_choice_opt_water_15000").hide();
    $("#radio_choice_opt_beef_15000").hide();
    $("#radio_choice_opt_tenloin_15000").hide();
    $("#radio_choice_opt_weekend_15000").hide();
    $("#radio_choice_opt_care_15000").hide();
    $("#radio_choice_opt_snack_15000").hide();
    $("label[for=radio_choice_opt_super_15000]").hide();
    $("label[for=radio_choice_opt_mate_15000]").hide();
    $("label[for=radio_choice_opt_water_15000]").hide();
    $("label[for=radio_choice_opt_beef_15000]").hide();
    $("label[for=radio_choice_opt_tenloin_15000]").hide();
    $("label[for=radio_choice_opt_weekend_15000]").hide();
    $("label[for=radio_choice_opt_care_15000]").hide();
    $("label[for=radio_choice_opt_snack_15000]").hide();
    $("#radio_choice_opt_pot_15000").hide();
    $("#radio_choice_opt_multipot_15000").hide();
    $("label[for=radio_choice_opt_pot_15000]").hide();
    $("label[for=radio_choice_opt_multipot_15000]").hide();

    // 시기 선택시 가격변경
    $("#jun_btn").on('click', function() {
        $("#radio_choice_pop_69000").trigger("click");
        $(".checkout-period-btn").removeClass("checked");
        $(this).addClass("checked");
        $("input[name='radio_choice_dis']").val('0').prop("selected", true);
        $("input[name='radio_choice_dis'").val('1').prop("disabled", false);
        $("input[name='radio_choice_dis'").val('2').prop("disabled", false);
        $("input[name='radio_choice_dis'").val('3').prop("disabled", false);
        $("input[name='radio_choice_dis'").val('4').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('5').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('6').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('7').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('8').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('9').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('10').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('11').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('12').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('13').prop("disabled", true);
    });
    $("#cho_btn").on('click', function() {
        $("#radio_choice_pop_89000").trigger("click");
        $(".checkout-period-btn").removeClass("checked");
        $(this).addClass("checked");
        $("input[name='radio_choice_dis']").val('0').prop("selected", true);
        $("input[name='radio_choice_dis'").val('1').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('2').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('3').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('4').prop("disabled", false);
        $("input[name='radio_choice_dis'").val('5').prop("disabled", false);
        $("input[name='radio_choice_dis'").val('6').prop("disabled", false);
        $("input[name='radio_choice_dis'").val('7').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('8').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('9').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('10').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('11').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('12').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('13').prop("disabled", true);
    });
    $("#jung_btn").on('click', function() {
        $("#radio_choice_pop_169000").trigger("click");
        $(".checkout-period-btn").removeClass("checked");
        $(this).addClass("checked");
        $("input[name='radio_choice_dis']").val('0').prop("selected", true);
        $("input[name='radio_choice_dis']").val('0').prop("selected", true);
        $("input[name='radio_choice_dis'").val('1').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('2').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('3').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('4').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('5').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('6').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('7').prop("disabled", false);
        $("input[name='radio_choice_dis'").val('8').prop("disabled", false);
        $("input[name='radio_choice_dis'").val('9').prop("disabled", false);
        $("input[name='radio_choice_dis'").val('10').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('11').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('12').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('13').prop("disabled", true);
    });
    $("#hu_btn").on('click', function() {
        $("#radio_choice_pop_239000").trigger("click");
        $(".checkout-period-btn").removeClass("checked");
        $(this).addClass("checked");
        $("input[name='radio_choice_dis']").val('0').prop("selected", true);
        $("input[name='radio_choice_dis']").val('0').prop("selected", true);
        $("input[name='radio_choice_dis'").val('1').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('2').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('3').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('4').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('5').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('6').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('7').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('8').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('9').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('10').prop("disabled", false);
        $("input[name='radio_choice_dis'").val('11').prop("disabled", false);
        $("input[name='radio_choice_dis'").val('12').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('13').prop("disabled", true);
    });
    $("#wan_btn").on('click', function() {
        $("#radio_choice_pop_249000").trigger("click");
        $(".checkout-period-btn").removeClass("checked");
        $(this).addClass("checked");
        $("input[name='radio_choice_dis']").val('0').prop("selected", true);
        $("input[name='radio_choice_dis']").val('0').prop("selected", true);
        $("input[name='radio_choice_dis'").val('1').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('2').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('3').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('4').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('5').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('6').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('7').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('8').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('9').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('10').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('11').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('12').prop("disabled", false);
        $("input[name='radio_choice_dis'").val('13').prop("disabled", true);
    });
    $("#yoo_btn").on('click', function() {
        $("#radio_choice_pop_199000").trigger("click");
        $(".checkout-period-btn").removeClass("checked");
        $(this).addClass("checked");
        $("input[name='radio_choice_dis']").val('0').prop("selected", true);
        $("input[name='radio_choice_dis']").val('0').prop("selected", true);
        $("input[name='radio_choice_dis'").val('1').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('2').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('3').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('4').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('5').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('6').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('7').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('8').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('9').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('10').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('11').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('12').prop("disabled", true);
        $("input[name='radio_choice_dis'").val('13').prop("disabled", false);
    });
    $("#a_btn").on('click', function() {

        $("#radio_choice_table_a").trigger("click");
        $(".checkout-table-btn").removeClass("checked");

        $("#radio_choice_opt_super_0").trigger("click");
        $("#radio_choice_opt_mate_0").trigger("click");
        //$("#radio_choice_opt_water_0").trigger("click");
        $("#radio_choice_opt_beef_0").trigger("click");
        //$("#radio_choice_opt_tenloin_0").trigger("click");
        //$("#radio_choice_opt_weekend_0").trigger("click");
        //$("#radio_choice_opt_care_0").trigger("click");

        //$("#radio_choice_opt_snack_0").trigger("click");
        //$("#radio_choice_opt_multipot_0").trigger("click");
        //$("#radio_choice_opt_pot_0").trigger("click");

        $(".base-opt-btn").removeClass("disabled checked");
        $("#super_btn").addClass("disabled");
        $("#mate_btn").addClass("disabled");
        $("#beef_btn").addClass("disabled");

        if ($("#radio_choice_table_a").prop("checked")) {
            $(this).addClass("checked");
        } else {
            $(this).removeClass("checked");
        }

    });
    $("#b_btn").on('click', function() {

        $("#radio_choice_table_b").trigger("click");
        $(".checkout-table-btn").removeClass("checked");

        $("#radio_choice_opt_super_0").trigger("click");
        $("#radio_choice_opt_mate_0").trigger("click");
        //$("#radio_choice_opt_water_0").trigger("click");
        $("#radio_choice_opt_beef_0").trigger("click");
        //$("#radio_choice_opt_tenloin_0").trigger("click");
        //$("#radio_choice_opt_weekend_0").trigger("click");
        //$("#radio_choice_opt_care_0").trigger("click");

        //$("#radio_choice_opt_snack_0").trigger("click");
        //$("#radio_choice_opt_multipot_0").trigger("click");
        //$("#radio_choice_opt_pot_0").trigger("click");

        $(".base-opt-btn").removeClass("disabled checked");
        $("#super_btn").addClass("disabled");
        $("#mate_btn").addClass("disabled");
        $("#beef_btn").addClass("disabled");

        if ($("#radio_choice_table_b").prop("checked")) {
            $(this).addClass("checked");
        } else {
            $(this).removeClass("checked");
        }

    });
    $("#c_btn").on('click', function() {

        $("#radio_choice_table_c").trigger("click");
        $(".checkout-table-btn").removeClass("checked");

        $("#radio_choice_opt_super_0").trigger("click");
        $("#radio_choice_opt_mate_0").trigger("click");
        //$("#radio_choice_opt_water_0").trigger("click");
        $("#radio_choice_opt_beef_15000").trigger("click");
        //$("#radio_choice_opt_tenloin_0").trigger("click");
        //$("#radio_choice_opt_weekend_0").trigger("click");
        //$("#radio_choice_opt_care_0").trigger("click");

        //$("#radio_choice_opt_snack_0").trigger("click");
        //$("#radio_choice_opt_multipot_0").trigger("click");
        //$("#radio_choice_opt_pot_0").trigger("click");

        $(".base-opt-btn").removeClass("disabled checked");
        $("#super_btn").addClass("disabled");
        $("#mate_btn").addClass("disabled");
        $("#beef_btn").addClass("disabled checked");

        if ($("#radio_choice_table_c").prop("checked")) {
            $(this).addClass("checked");
        } else {
            $(this).removeClass("checked");
        }

    });
    $("#d_btn").on('click', function() {

        $("#radio_choice_table_d").trigger("click");
        $(".checkout-table-btn").removeClass("checked");

        $("#radio_choice_opt_super_15000").trigger("click");
        $("#radio_choice_opt_mate_0").trigger("click");
        //$("#radio_choice_opt_water_0").trigger("click");
        $("#radio_choice_opt_beef_0").trigger("click");
        //$("#radio_choice_opt_tenloin_0").trigger("click");
        //$("#radio_choice_opt_weekend_0").trigger("click");
        //$("#radio_choice_opt_care_0").trigger("click");

        //$("#radio_choice_opt_snack_0").trigger("click");
        //$("#radio_choice_opt_multipot_0").trigger("click");
        //$("#radio_choice_opt_pot_0").trigger("click");

        $(".base-opt-btn").removeClass("disabled checked");
        $("#super_btn").addClass("disabled checked");
        $("#beef_btn").addClass("disabled");

        if ($("#radio_choice_table_d").prop("checked")) {
            $(this).addClass("checked");
        } else {
            $(this).removeClass("checked");
        }

    });
    $("#e_btn").on('click', function() {

        $("#radio_choice_table_e").trigger("click");
        $(".checkout-table-btn").removeClass("checked");

        $("#radio_choice_opt_super_0").trigger("click");
        $("#radio_choice_opt_mate_0").trigger("click");
        //$("#radio_choice_opt_water_0").trigger("click");
        $("#radio_choice_opt_beef_0").trigger("click");
        //$("#radio_choice_opt_tenloin_0").trigger("click");
        //$("#radio_choice_opt_weekend_0").trigger("click");
        //$("#radio_choice_opt_care_0").trigger("click");
        //$("#radio_choice_opt_snack_0").trigger("click");
        //$("#radio_choice_opt_multipot_0").trigger("click");
        //$("#radio_choice_opt_pot_0").trigger("click");

        $(".base-opt-btn").removeClass("disabled checked");

        if ($("#radio_choice_table_e").prop("checked")) {
            $(this).addClass("checked");
        } else {
            $(this).removeClass("checked");
        }

    });

    $("#f_btn").on('click', function() {

        $("#radio_choice_table_f").trigger("click");
        $(".checkout-table-btn").removeClass("checked");

        $("#radio_choice_opt_super_15000").trigger("click");
        $("#radio_choice_opt_mate_15000").trigger("click");
        //$("#radio_choice_opt_water_0").trigger("click");
        $("#radio_choice_opt_beef_15000").trigger("click");
        //$("#radio_choice_opt_tenloin_0").trigger("click");
        //$("#radio_choice_opt_weekend_0").trigger("click");
        $("#radio_choice_opt_care_15000").trigger("click");
        //$("#radio_choice_opt_snack_0").trigger("click");
        //$("#radio_choice_opt_multipot_0").trigger("click");
        //$("#radio_choice_opt_pot_0").trigger("click");
        $(".base-opt-btn").removeClass("disabled checked");
        $("#super_btn").addClass("disabled checked");
        $("#mate_btn").addClass("disabled checked");
        $("#beef_btn").addClass("disabled checked");
        $("#care_btn").addClass("disabled checked");

        if ($("#radio_choice_table_f").prop("checked")) {
            $(this).addClass("checked");
        } else {
            $(this).removeClass("checked");
        }

    });

    $("#super_btn").on('click', function() {
        if ($(this).hasClass("disabled")) {} else {
            if ($("#radio_choice_opt_super_15000").prop("checked")) {
                if ($("#radio_choice_table_a").prop("checked")) {
                    $("#radio_choice_opt_super_0").trigger("click");
                } else if ($("#radio_choice_table_b").prop("checked")) {
                    $("#radio_choice_opt_super_0").trigger("click");
                } else if ($("#radio_choice_table_c").prop("checked")) {
                    $("#radio_choice_opt_super_0").trigger("click");
                } else if ($("#radio_choice_table_d").prop("checked")) {
                    $("#radio_choice_opt_super_15000").trigger("click");
                } else if ($("#radio_choice_table_e").prop("checked")) {
                    $("#radio_choice_opt_super_0").trigger("click");
                } else if ($("#radio_choice_table_f").prop("checked")) {
                    $("#radio_choice_opt_super_0").trigger("click");
                }
                $(this).addClass("checked");
            } else {
                if ($("#radio_choice_opt_table_a").prop("checked")) {
                    $("#radio_choice_opt_super_0").trigger("click");
                } else if ($("#radio_choice_table_b").prop("checked")) {
                    $("#radio_choice_opt_super_0").trigger("click");
                } else if ($("#radio_choice_table_c").prop("checked")) {
                    $("#radio_choice_opt_super_0").trigger("click");
                } else if ($("#radio_choice_table_d").prop("checked")) {
                    $("#radio_choice_opt_super_15000").trigger("click");
                } else if ($("#radio_choice_table_e").prop("checked")) {
                    $("#radio_choice_opt_super_15000").trigger("click");
                } else if ($("#radio_choice_table_f").prop("checked")) {
                    $("#radio_choice_opt_super_0").trigger("click");
                }
                $(this).removeClass("checked");
            }
        }
        if ($("#radio_choice_opt_super_15000").prop("checked")) {
            $(this).addClass("checked");
        } else {
            $(this).removeClass("checked");
        }
    });
    $("#mate_btn").on('click', function() {
        if ($(this).hasClass("disabled")) {} else {
            if ($("#radio_choice_opt_mate_15000").is(":checked")) {
                if ($("#radio_choice_table_a").is(":checked")) {
                    $("#radio_choice_opt_mate_0").trigger("click");
                } else if ($("#radio_choice_table_b").is(":checked")) {
                    $("#radio_choice_opt_mate_0").trigger("click");
                } else if ($("#radio_choice_table_c").is(":checked")) {
                    $("#radio_choice_opt_mate_0").trigger("click");
                } else if ($("#radio_choice_table_d").is(":checked")) {
                    $("#radio_choice_opt_mate_0").trigger("click");
                } else if ($("#radio_choice_table_e").is(":checked")) {
                    $("#radio_choice_opt_mate_0").trigger("click");
                } else if ($("#radio_choice_table_f").is(":checked")) {
                    $("#radio_choice_opt_mate_0").trigger("click");
                }
            } else {
                if ($("#radio_choice_opt_table_a").is(":checked")) {
                    $("#radio_choice_opt_mate_0").trigger("click");
                } else if ($("#radio_choice_table_b").is(":checked")) {
                    $("#radio_choice_opt_mate_0").trigger("click");
                } else if ($("#radio_choice_table_c").is(":checked")) {
                    $("#radio_choice_opt_mate_0").trigger("click");
                } else if ($("#radio_choice_table_d").is(":checked")) {
                    $("#radio_choice_opt_mate_15000").trigger("click");
                } else if ($("#radio_choice_table_e").is(":checked")) {
                    $("#radio_choice_opt_mate_0").trigger("click");
                } else if ($("#radio_choice_table_f").is(":checked")) {
                    $("#radio_choice_opt_mate_15000").trigger("click");
                }
            }
        }
        if ($("#radio_choice_opt_mate_15000").prop("checked")) {
            $(this).addClass("checked");
        } else {
            $(this).removeClass("checked");
        }
    });
    $("#water_btn").on('click', function() {
        if ($(this).hasClass("disabled")) {} else {
            if ($("#radio_choice_opt_water_15000").is(":checked")) {
                $("#radio_choice_opt_water_0").trigger("click");
            } else {
                $("#radio_choice_opt_water_15000").trigger("click");
            }
        }
        if ($("#radio_choice_opt_water_15000").prop("checked")) {
            $(this).addClass("checked");
        } else {
            $(this).removeClass("checked");
        }
    });
    $("#tenloin_btn").on('click', function() {
        if ($(this).hasClass("disabled")) {} else {
            if ($("#radio_choice_opt_tenloin_15000").is(":checked")) {
                $("#radio_choice_opt_tenloin_0").trigger("click");
            } else {
                $("#radio_choice_opt_tenloin_15000").trigger("click");
            }
        }
        if ($("#radio_choice_opt_tenloin_15000").prop("checked")) {
            $(this).addClass("checked");
        } else {
            $(this).removeClass("checked");
        }
    });
    $("#care_btn").on('click', function() {
        if ($(this).hasClass("disabled")) {} else {
            if ($("#radio_choice_opt_care_15000").is(":checked")) {
                $("#radio_choice_opt_care_0").trigger("click");
            } else {
                $("#radio_choice_opt_care_15000").trigger("click");
            }
        }
        if ($("#radio_choice_opt_care_15000").prop("checked")) {
            $(this).addClass("checked");
        } else {
            $(this).removeClass("checked");
        }
    });

    $("#weekend_btn").on('click', function() {
        if ($(this).hasClass("disabled")) {} else {
            if ($("#radio_choice_opt_weekend_15000").is(":checked")) {
                $("#radio_choice_opt_weekend_0").trigger("click");
            } else {
                $("#radio_choice_opt_weekend_15000").trigger("click");
            }
        }
        if ($("#radio_choice_opt_weekend_15000").prop("checked")) {
            $(this).addClass("checked");
        } else {
            $(this).removeClass("checked");
        }
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

    $("#snacke_btn").on('click', function() {
        if ($(this).hasClass("disabled")) {} else {
            if ($("#radio_choice_opt_snacke_15000").is(":checked")) {
                $("#radio_choice_opt_snacke_0").trigger("click");
                
            } else {
                $("#radio_choice_opt_snacke_15000").trigger("click");
                $("#radio_choice_opt_snack_0").trigger("click");
            }
        }
        if ($("#radio_choice_opt_snacke_15000").prop("checked")) {
            $(this).addClass("checked");
        } else {
            $(this).removeClass("checked");
        }
    });

    $("#beef_btn").on('click', function() {

        if ($(this).hasClass("disabled")) {} else {
            if ($("#radio_choice_opt_beef_15000").is(":checked")) {
                if ($("#radio_choice_table_a").is(":checked")) {
                    $("#radio_choice_opt_beef_0").trigger("click");
                } else if ($("#radio_choice_table_b").is(":checked")) {
                    $("#radio_choice_opt_beef_0").trigger("click");
                } else if ($("#radio_choice_table_c").is(":checked")) {
                    $("#radio_choice_opt_beef_15000").trigger("click");
                } else if ($("#radio_choice_table_d").is(":checked")) {
                    $("#radio_choice_opt_beef_0").trigger("click");
                } else if ($("#radio_choice_table_e").is(":checked")) {
                    $("#radio_choice_opt_beef_0").trigger("click");
                } else if ($("#radio_choice_table_f").is(":checked")) {
                    $("#radio_choice_opt_beef_15000").trigger("click");
                }
            } else {
                if ($("#radio_choice_opt_table_a").is(":checked")) {
                    $("#radio_choice_opt_beef_0").trigger("click");
                } else if ($("#radio_choice_table_b").is(":checked")) {
                    $("#radio_choice_opt_beef_0").trigger("click");
                } else if ($("#radio_choice_table_c").is(":checked")) {
                    $("#radio_choice_opt_beef_15000").trigger("click");
                } else if ($("#radio_choice_table_d").is(":checked")) {
                    $("#radio_choice_opt_beef_0").trigger("click");
                } else if ($("#radio_choice_table_e").is(":checked")) {
                    $("#radio_choice_opt_beef_15000").trigger("click");
                } else if ($("#radio_choice_table_f").is(":checked")) {
                    $("#radio_choice_opt_beef_15000").trigger("click");
                }
            }
        }
        if ($("#radio_choice_opt_beef_15000").prop("checked")) {
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

	$("#selboxdirect").change(function(){
		var selboxdirect = $("#selboxdirect").val();
		$("#order_comments").val(selboxdirect);
	});

	$("#recommend").change(function(){
		var rocommendid = $("#recommend").val();
		$("#recommendid").val(rocommendid);
	});

</script>