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
 */

defined('ABSPATH') || exit;
?>
<!--이건나중에 지우세용-->
<style>
    .opt-btn .flex {
        display: flex;
    }

    .opt-btn .flex span {
        justify-content: space-between;
        width: 100%;
        display: block;
        text-align:center;
        margin:5px;
        padding:5px 0;
        border-radius:5px;
        border:1px solid #a6a6a6;
    }

    .opt-btn .flex span.checked {
        background-color: blue !important;
    }

    .opt-btn .flex span.disabled {
        background-color: gray;
    }



</style>

<div class="shop_table woocommerce-checkout-review-order-table">
    <div>
        <div class="">
            <div class="">
                <p>주문상품</p>
            </div>
            <div class="">
                <p>변경</p>
            </div>
        </div>
        <div class="">
            <!--시기별사진-->
            <div class="">
                <img src="">
            </div>
            <!--시기, 식단명, 가격등 -->
            <div class="">
                <?php //건드리지마세용
                foreach (WC()->cart->get_fees() as $fee) : ?>
                    <?php $fee_name[] = esc_html($fee->name); ?>
                    <?php $fee_price[] = esc_html($fee->total); ?>
                <?php endforeach; ?>
                <div class="">
                    <span><?php echo number_format($fee_price[0]); ?></span>
                    <p><?php echo $fee_name[0]; ?></p>
                </div>
                <div class="">
                    <p id="deli-start"></p>
                </div>
                <div class="">
                    <p id="deli-end"></p>
                </div>
                <div class="">
                    <p id="deli-day"></p>
                </div>
            </div>
            <!--옵션라인-->
            <div class="">
                <?php
                $fee_name_count = count($fee_name);
                $opt_roop = 1;
                while ($opt_roop <= $fee_name_count) {
                    // 원하는 클래스명 추가해서 사용하면 됩니다.
                    echo "<div class=''>";
                    echo "<p>+ <span>" . number_format($fee_price[$opt_roop]) . "</span> 원 " . $fee_name[$opt_roop] . "</p>";
                    echo "</div>";
                    $opt_roop++;
                }
                ?>
            </div>
            <div class="">
                <?php
                $ft = 0;
                while ($ft <= $fee_name_count) {
                    $fee_all_total = $fee_all_total + $fee_price[$ft];
                    $ft++;
                }
                ?>
                <p><?php echo number_format($fee_all_total) ?>
            </div>
        </div>
    </div>
</div>


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