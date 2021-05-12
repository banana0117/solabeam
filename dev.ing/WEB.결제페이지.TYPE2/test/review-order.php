<?php

/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 * 
 * 
 * Banana Version 0.1
 * 
 * 나도 처음 건드려보는 페이지
 * 주석을 왠만하면 달아놨지만 부족할 수도 있음
 * 가급적 html이나 class 명정도만 수정해서 사용하면 될듯
 * 
 * 필요한 부분에 class명을 넣고 사용하세요
 * 아래 스타일은 테스트를 위해서 넣어뒀는데 나중에 지우시면 됩니다
 * 
 * wp-content/plugins/woocommerce/template/checkout/ 에 덮어씌우면됩니다
 * 
 */

defined('ABSPATH') || exit;
?>

<div class="shop_table woocommerce-checkout-review-order-table">
    <div class="" style="padding:0 20px;">
        <div class="">
            <div class="checkout-title">
                <p>주문상품</p>
            </div>
        </div>
        <div id="meal_detail">
            <div class="flexed">
                <!--시기별사진-->
                <div class="flexibled detail-img">
                    <img id="period_img" src="/wp-content/themes/storefront-child/image/newcheckouttest.png">
                </div>
                <!--시기, 식단명, 가격등 -->
                <div class="flexibled detail-order">
                    <?php //건드리지마세용
                    foreach (WC()->cart->get_fees() as $fee) : ?>
                        <?php $fee_name[] = esc_html($fee->name); ?>
                        <?php $fee_price[] = esc_html($fee->total); ?>
                    <?php endforeach; ?>
                    <div class="period-title">
                        <p><?php echo $fee_name[0]; ?></p>
                        <span><?php echo number_format($fee_price[0]); ?>원</span>
                    </div>
                    <div class="deli-type">
                        <p id="deli-start"></p>
                    </div>
                    <div class="deli-type">
                        <p id="deli-end"></p>
                    </div>
                    <div class="deli-type">
                        <p id="deli-day"></p>
                    </div>
                </div>
            </div>
            <!--옵션라인-->
            <div class="opt-wrap">
                <?php
                $fee_name_count = count($fee_name);
                $discount_pay = 0;
                $opt_roop = 1;
                while ($opt_roop <= $fee_name_count) {
                    // 원하는 클래스명 추가해서 사용하면 됩니다.
                    if ($fee_name[$opt_roop] == "") {
                    } elseif (strpos($fee_name[$opt_roop], "할인") != false) {
                        $discount_pay = $fee_price[$opt_roop];
                    } else {
                        echo "<div class='opt-price'>";
                        echo "<p>+ <span>" . number_format($fee_price[$opt_roop]) . "</span> 원 " . $fee_name[$opt_roop] . "</p>";
                        echo "</div>";
                    }
                    $opt_roop++;
                }
                ?>
            </div>
            <div class="flexed total-prices">
                <?php
                $ft = 0;
                while ($ft <= $fee_name_count) {
                    $fee_all_total = $fee_all_total + $fee_price[$ft];
                    $ft++;
                }
                ?>
                <p class="flexibled left">상품 금액</p><p class="flexibled right"><span><?php echo number_format($fee_all_total) ?></span>원</p></span>
            </div>
            <div>
                <?php
                if ($discount_pay == "0") {
                } else {
                    echo '<div class="discount-price"><p>할인금액</p><span>';
                    echo number_format($discount_pay);
                    echo '원</span></div>';
                }
                ?>
            </div>
        </div>
        <div class="" id="etc_detail">
            <div class="flexed">
                <!--시기별사진-->
                <div class="flexibled detail-img">
                    <img id="etc_img" src="/wp-content/themes/storefront-child/image/newcheckouttest.png">
                </div>
                <!--시기, 식단명, 가격등 -->
                <div class="flexibled detail-order">
                    <?php //건드리지마세용
                    foreach (WC()->cart->get_fees() as $fee) : ?>
                        <?php $fee_names[] = esc_html($fee->name); ?>
                        <?php $fee_prices[] = esc_html($fee->total); ?>
                    <?php endforeach; ?>
                    <div class="period-title">
                        <p><?php echo $fee_names[0]; ?></p>
                        <span><?php echo number_format($fee_prices[0]); ?>원</span>
                    </div>
                    <div class="period-detail">
                        <p id="product_detail"></p>
                    </div>
                    <div class="checkout-counter">
                        <?php
                        $array = ['1', '2', '3', '4', '5', '6', '7', '8', '9'];

                        if (strpos($fee_name[0], "편수") != false) {
                            $array_s = ['19900', '39800', '59700', '79600', '99500', '119400', '139300', '159200', '179100'];
                        } elseif (strpos($fee_name[0], "세트") != false) {
                            $array_s = ['59000', '118000', '177000', '236000', '295000', '354000', '413000', '472000', '531000'];
                        } elseif (strpos($fee_name[0], "메이커") != false) {
                            $array_s = ['1', '2', '3', '4', '5', '6', '7', '8', '9'];
                        }

                        $key = array_search($fee_prices[0], $array_s);

                        $number = $array[$key];
                        ?>
                        <p class="minus" id="add_d">-</p>
                        <p class="counter" id="add"><?php echo $number ?></p>
                        <p class="plus" id="add_p">+</p>
                    </div>
                </div>
            </div>
            <div class="flexed total-prices">
                <p class="flexibled left">상품 금액</p><p class="flexibled right"><span><?php echo number_format($fee_prices[0]) ?></span>원</p>
            </div>
        </div>
    </div>
</div>
<?php
//건드리지마세용
foreach (WC()->cart->get_fees() as $fee) : ?>
    <?php $fee_name[] = esc_html($fee->name); ?>
<?php endforeach; ?>
<?php if (strpos($fee_name[0], "식단") != false || strpos($fee_name[0], "퍼스트") != false || strpos($fee_name[0], "플러스") != false) {
    echo '<script>$("#etc_detail").hide();</script>';
} else {
    echo '<script>$("#meal_detail").hide();</script>';
    echo '<script>
    $("#add_d").on("click", function() {
        var counters = $("#add").text();
        if (counters == 1) {
            $("#add").text("1");
            $("#radio_choice_opt_counter_1").trigger("click");
        } else if (counters == 2) {
            $("#add").text("1");
            $("#radio_choice_opt_counter_1").trigger("click");
        } else if (counters == 3) {
            $("#add").text("2");
            $("#radio_choice_opt_counter_2").trigger("click");
        } else if (counters == 4) {
            $("#add").text("3");
            $("#radio_choice_opt_counter_3").trigger("click");
        } else if (counters == 5) {
            $("#add").text("4");
            $("#radio_choice_opt_counter_4").trigger("click");
        } else if (counters == 6) {
            $("#add").text("5");
            $("#radio_choice_opt_counter_5").trigger("click");
        } else if (counters == 7) {
            $("#add").text("6");
            $("#radio_choice_opt_counter_6").trigger("click");
        } else if (counters == 8) {
            $("#add").text("7");
            $("#radio_choice_opt_counter_7").trigger("click");
        } else if (counters == 9) {
            $("#add").text("8");
            $("#radio_choice_opt_counter_8").trigger("click");
        }
    });
    $("#add_p").on("click", function() {
        var counters = $("#add").text();
        if (counters == 1) {
            $("#add").text("2");
            $("#radio_choice_opt_counter_2").trigger("click");
        } else if (counters == 2) {
            $("#add").text("3");
            $("#radio_choice_opt_counter_3").trigger("click");
        } else if (counters == 3) {
            $("#add").text("4");
            $("#radio_choice_opt_counter_4").trigger("click");
        } else if (counters == 4) {
            $("#add").text("5");
            $("#radio_choice_opt_counter_5").trigger("click");
        } else if (counters == 5) {
            $("#add").text("6");
            $("#radio_choice_opt_counter_6").trigger("click");
        } else if (counters == 6) {
            $("#add").text("7");
            $("#radio_choice_opt_counter_7").trigger("click");
        } else if (counters == 7) {
            $("#add").text("8");
            $("#radio_choice_opt_counter_8").trigger("click");
        } else if (counters == 8) {
            $("#add").text("9");
            $("#radio_choice_opt_counter_9").trigger("click");
        } else if (counters == 9) {
            alert("더 이상 추가할 수 없습니다.");
        }
    });
</script>';
}
?>

<?php //do_action('woocommerce_review_order_before_cart_contents'); 
?>
<?php //do_action('woocommerce_review_order_after_cart_contents'); 
?>
<?php //do_action('woocommerce_review_order_before_shipping'); 
?>
<?php //do_action('woocommerce_review_order_after_shipping'); 
?>
<?php //do_action('woocommerce_review_order_before_order_total'); 
?>
<?php //do_action('woocommerce_review_order_after_order_total'); 
?>