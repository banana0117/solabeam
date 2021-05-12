<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

    <div class="woocommerce-order">

        <?php
    if ( $order ) :

        do_action( 'woocommerce_before_thankyou', $order->get_id() );
        ?>

            <?php if ( $order->has_status( 'failed' ) ) : ?>

            <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed">
                <?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?>
            </p>

            <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
                <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay">
                    <?php esc_html_e( 'Pay', 'woocommerce' ); ?>
                </a>
                <?php if ( is_user_logged_in() ) : ?>
                <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay">
                    <?php esc_html_e( 'My account', 'woocommerce' ); ?>
                </a>
                <?php endif; ?>
            </p>

            <?php else : ?>
            <?php $order_id = $order->get_id();
        $delivery_date_meta = get_post_meta( $order_id, 'dtwc_delivery_date', true );
        $delivery_date = date( apply_filters( 'dtwc_date_format', 'M j, Y' ), strtotime( $delivery_date_meta ) ); ?>
            <img src="/wp-content/themes/storefront-child/image/dodam-c-logo.png" style="width:48%; padding-bottom:5px;">
            <p class="thank_welcome" style="text-align:center;">
                <?php echo $order->get_formatted_billing_full_name(); ?>님의 멤버십 가입을 환영합니다.</p>

            <div class="order-thankyou-custom">
                <div class="thankyou_flex">
                    <div class="thankyou-custom">
                        <?php esc_html_e( '주문번호', 'woocommerce' ); ?>
                    </div>
                    <div class="thankyou-custom thankyou-custom-right">
                        <b><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></b>
                    </div>
                </div>
                <div class="thankyou_flex">
                    <div class="thankyou-custom">
                        <?php esc_html_e( '결제일', 'woocommerce' ); ?>
                    </div>
                    <div class="thankyou-custom thankyou-custom-right">
                        <b><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></b>
                    </div>
                </div>

                <div class="thankyou_flex">
                    <div class="thankyou-custom">
                        <?php esc_html_e( '결제금액', 'woocommerce' ); ?>
                    </div>
                    <div class="thankyou-custom thankyou-custom-right">
                        <b><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></b>
                    </div>
                </div>

                <div class="thankyou_flex">
                    <div class="thankyou-custom">
                        <?php esc_html_e( '첫배송 출발일', 'woocommerce' ); ?>
                    </div>
                    <div class="thankyou-custom thankyou-custom-right">
                        <b><?php echo $delivery_date // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></b>
                    </div>
                </div>

                <?php if ( $order->get_payment_method_title() ) : ?>
                <div class="thankyou_flex">
                    <div class="thankyou-custom">
                        <?php esc_html_e( '결제방법', 'woocommerce' ); ?>
                    </div>
                    <div class="thankyou-custom thankyou-custom-right">
                        <b><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></b>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <div class="order-thankyou-btn" style="text-align:center;">
                <div class="order-thankyou-message" style="text-align:center; margin-bottom:15px;">
                    <b>멤버십 가입에 감사드립니다!</b>
                    <p>멤버십 가입 고객님들은 아래 링크를 통해<br>사전 설문조사에 참여해주세요!</p>
                </div>
                <!--사용설명서 보러가기-->
                <div class="">
                    <a class="sub_order_button atagsub whitebtn" href="/dodamguide" style="margin-top:10px; margin:0 auto; margin-bottom:10px; display:block; text-align:center; font-size:1rem; font-weight:bold; border:1px solid #254f3d; color:#254f3d; background-color:#fff;">도담밀 이용안내 보러가기</a>
                </div>
                <!--사전설문조사 하러가기-->
                <div class="">
                    <a class="sub_order_button atagsub" href="https://forms.monday.com/forms/8ccc24c7e5fb11e41325f294a9436f32" style="margin-top:10px; margin:0 auto; margin-bottom:30px; color:#427AC7; display:block; text-align:center; font-size:1rem; border:2px solid #427AC7; font-weight:bold;">사전 설문조사 하러가기</a>
                </div>
            </div>

            <?php add_action( 'woocommerce_order_details_after_order_table_items', 'dtwc_add_delivery_info_to_order_received_page', 10 , 1 ); ?>

            <?php endif; ?>
            <?php else : ?>

            <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
                <?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </p>

            <?php endif; ?>

    </div>

<?php

/*

    Banana ver 0.1

    * plugins/woocommerce/tmplate/checkout/thankyou.php 에 밑에 변경하면됨
    * 기존에 개판쳐놓은거 지우고 하면됩니다

    * 디비 연결이 끊기면 답이없긴한데, 조금 손봐야할 부분이 있을지도 모름

    * 2021.04.19 이지키트 추가함
    * 2021.04.29 리뉴얼됨

*/


$order_id = $order->get_id();

if (wcs_order_contains_subscription($order_id)) { // 주문내역에 정기배송 상품이 있을경우   
    $subid = $order_id + 1;
    $news = 1;
} else {
    $subid = $order_id;
    $news = 2;
}

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$tooday = date("Y-m-d");

$active_check = get_post_meta($subid, '_billing_phone', true);
if (empty($active_check) || $active_check == "") {
    $subid = $subid + 1;
}

$current_user = wp_get_current_user();
$news_user_id = $current_user->user_login;
$new_user_day = get_post_meta($subid, 'deliday', true);
$new_user_date = get_post_meta($subid, 'dtwc_delivery_date', true);
$newz_user_phone = get_post_meta($subid, '_billing_phone', true);
$new_user_phone = preg_replace("/[^0-9]/", "", $newz_user_phone);
$new_user_address_1 = get_post_meta($subid, '_billing_address_1', true);
$new_user_address_2 = get_post_meta($subid, '_billing_address_2', true);
$new_user_address = $new_user_address_1 . " " . $new_user_address_2;
$new_user_postcode = get_post_meta($subid, '_billing_postcode', true);
$new_user_name = get_post_meta($subid, '_billing_first_name', true);
$get_post_day = get_post_meta($subid, 'deliday', true);

$message_query = "SELECT post_excerpt FROM wp_posts WHERE ID = '$order_id'";
$message_result = mysqli_query($mysqli, $message_query);
$message_row = mysqli_fetch_array($message_result);
$deli_message = $message_row[post_excerpt];

$limitdate = date("Y-m-d", strtotime("+1 month", strtotime($new_user_date)));
$next_payday = date("Y-m-d", strtotime("+4 weeks", strtotime($new_user_date)));
$next_paydays = date("Y-m-d", strtotime("-3 days", strtotime($next_payday)));

$reco_query = "SELECT meta_value FROM wp_postmeta WHERE post_id = '$subid' AND meta_key = 'recommedid'";
$reco_result = mysqli_query($mysqli, $reco_query);
$reco_row = mysqli_fetch_array($reco_result);
$reco_id = $reco_row[meta_value];

$dip = 0;

$fee_option_query = "SELECT * FROM wp_woocommerce_order_items WHERE order_id = '$subid' AND order_item_type = 'fee'";
$fee_option_result = mysqli_query($mysqli, $fee_option_query);
while ($fee_option_row = mysqli_fetch_array($fee_option_result)) {

    $select_opts[] = $fee_option_row[order_item_name];
    $select_opts_nums[] = $fee_option_row[order_itme_id];
}

if (in_array("적립금할인", $select_opts)) {

    $pointly_query = "SELECT * FROM wp_woocommerce_order_items WHERE order_id = '$subid' AND order_item_name = '적립금할인'";
    $pointly_result = mysqli_query($mysqli, $pointly_query);
    $pointly_row = mysqli_fetch_array($pointly_result);

    $pointly_item_id = $pointly_row[order_item_id];

    $point_log_search = "SELECT * FROM wp_woocommerce_order_itemmeta WHERE order_item_id = '$pointly_item_id' AND meta_key = '_fee_amount'";
    $point_log_result = mysqli_query($mysqli, $point_log_search);
    $point_log_row = mysqli_fetch_array($point_log_result);

    $point_log_data = $point_log_row[meta_value];

    $log_day = date("Y-m-d");

    $point_log_add = "INSERT INTO `pointlog` (`dates`, `userid`, `type`, `used`, `points`) VALUES ('$log_day','$news_user_id','차감','결제할인','$point_log_data')";
    mysqli_query($mysqli, $point_log_add);
}

if ($news == '1') {

    $kmk = 0;
    $kmk_count = count($select_opts_nums);

    while ($kmk <= $kmk_count) {
        $pointly_new_query = "SELECT * FROM wp_woocommerce_order_items WHERE order_item_id = '$select_opts_nums[$kmk]' AND meta_key = '_fee_amount'";
        $pointly_new_result = mysqli_query($mysqli, $pointly_new_query);
        $pointly_new_row = mysqli_fetch_array($pointly_new_result);

        $pointz = $pointz + $pointly_new_row[meta_value];

        $kmk++;
    }

    $numorders = 0;
    $numorders = wc_get_customer_order_count($current_user->ID);

    $args = array(
        'customer_id' => $current_user->ID,
        'post_status' => 'cancelled',
        'post_type' => 'shop_order',
        'return' => 'ids'
    );
    $numorders_cancelled = 0;
    $numorders_cancelled = count(wc_get_orders($args));

    $num_not_cancelled = $numorders - $numorders_cancelled;

    if ($num_not_cancelled <= 1) {
        $perz = 0.005;
    } elseif ($num_not_cancelled <= 3) {
        $perz = 0.01;
    } elseif ($num_not_cancelled <= 6) {
        $perz = 0.02;
    } elseif ($num_not_cancelled <= 9) {
        $perz = 0.03;
    } elseif ($num_not_cancelled <= 12) {
        $perz = 0.04;
    } elseif ($num_not_cancelled <= 15) {
        $perz = 0.05;
    } elseif ($num_not_cancelled <= 18) {
        $perz = 0.1;
    } else {
        $perz = 0.005;
    }

    $point_per = $pointz * $perz;

    $point_log_addz = "INSERT INTO `pointlog` (`dates`, `userid`, `type`, `used`, `points`) VALUES ('$log_day','$news_user_id','추가','결제하기','$point_per')";
    mysqli_query($mysqli, $point_log_addz);
}

$select_text = implode("/", $select_opts);

$opts_count = count($select_opts);
$loop = 0;

$period_opt = array();
$table_opt = array();
$side_opt = array();

$sample_text = "도담 ";
$sample_text .= $select_text;

if (strpos($sample_text, "준비기") != false) {
    array_push($period_opt, "Z");
    $choice_period = "준비기";
    $pkg_counter = 1;
} elseif (strpos($sample_text, "초기") != false) {
    array_push($period_opt, "X");
    $choice_period = "초기";
    $pkg_counter = 1;
} elseif (strpos($sample_text, "중기") != false) {
    array_push($period_opt, "T");
    $choice_period = "중기";
    $pkg_counter = 3;
} elseif (strpos($sample_text, "후기") != false) {
    array_push($period_opt, "H");
    $choice_period = "후기";
    $pkg_counter = 3;
} elseif (strpos($sample_text, "유아식준비기") != false) {
    array_push($period_opt, "W");
    $choice_period = "유아식준비기";
    $pkg_counter = 1;
} elseif (strpos($sample_text, "유아기") != false) {
    array_push($period_opt, "Y");
    $choice_period = "유아기";
    $pkg_counter = 12;
}



if (strpos($select_text, "플러스") != false) {
    array_push($table_opt, "B");
    $table_box = "플러스";
} elseif (strpos($select_text, "퍼스트") != false) {
    array_push($table_opt, "P");
    $table_box = "퍼스트";
    $news = "3";
} elseif (strpos($select_text, "도담") != false) {
    array_push($table_opt, "A");
    $table_box = "기본";
}

if (strpos($select_text, "간식") != false) {
    array_push($side_opt, "K");
    $option_box = "간식";
}

if (strpos($select_text, "편수") != false) {
    $products = "이유식편수냄비";
    $normal_order = "INSERT INTO normalorder (userid, username, phone, address, postcode, status, period, orderid, quantity) VALUES ('$userid', '$new_user_name', '$new_user_phone','$new_user_address','$new_user_postcode','wc-processing','$products','$order_id','1')";
    mysqli_query($mysqli, $normal_order);
}

if (strpos($select_text, "체험") != false) {
}

if (strpos($select_text, "세트") != false) {
    $products = "이유식편수냄비";
    $normal_order = "INSERT INTO normalorder (userid, username, phone, address, postcode, status, period, orderid, quantity) VALUES ('$userid', '$new_user_name', '$new_user_phone','$new_user_address','$new_user_postcode','wc-processing','$products','$order_id','1')";
    mysqli_query($mysqli, $normal_order);
}

if (strpos($select_text, "메이커") != false) {
    $products = "이유식편수냄비";
    $normal_order = "INSERT INTO normalorder (userid, username, phone, address, postcode, status, period, orderid, quantity) VALUES ('$userid', '$new_user_name', '$new_user_phone','$new_user_address','$new_user_postcode','wc-processing','$products','$order_id','1')";
    mysqli_query($mysqli, $normal_order);
}



$period_str = implode("", $period_opt);
$table_str = implode("/", $table_opt);
$side_str = implode("/", $side_opt);

$total_opt = $period_str . $table_str . $side_str;

$new_user_query = "INSERT INTO userbase(userid, username,phone,address,firstperiod,membership,opt,delidate,deliday,postcode,message,limitday,nextpayment,nowperiod,recommend,tables,news,periodstr,tablestr,sidestr) VALUES ('$news_user_id','$new_user_name','$new_user_phone','$new_user_address','$choice_period','$table_box','$option_box','$new_user_date','$new_user_day','$new_user_postcode','$deli_message','$limitdate','$next_paydays','$choice_period','$reco_id','$table_box','$news','$period_str','$table_str','$side_str')";
mysqli_query($mysqli, $new_user_query);


$next_payday[0] = date("Y-m-d", strtotime($new_user_date));
$next_payday[1] = date("Y-m-d", strtotime("+7 days", strtotime($new_user_date)));
$next_payday[2] = date("Y-m-d", strtotime("+14 days", strtotime($new_user_date)));
$next_payday[3] = date("Y-m-d", strtotime("+21 days", strtotime($new_user_date)));
$next_post_circle = date("Y-m-d", strtotime("+28 days", strtotime($new_user_date)));

if ($news == "2") {
    $update_news_query = "UPDATE userbase SET `nextpayment`='$next_payday[2]',`nextdeliday` = '$next_post_circle', `pkg` = '$pkg_counter' WHERE userid = '$news_user_id'";
    mysqli_query($mysqli, $update_news_query);
} else {
    $update_subid_query = "UPDATE userbase SET `nextpayment`='$next_payday[2]',`nextdeliday` = '$next_post_circle', `subid` = '$subid' WHERE userid = '$news_user_id'";
    mysqli_query($mysqli, $update_subid_query);
}

while ($np <= 3) {
    $next_postdays = $next_payday[$np];
    $next_postday = "SELECT * FROM tablebase where based = 'default'";
    $next_postday_result = mysqli_query($mysqli, $next_postday);
    while ($next_postday_row = mysqli_fetch_array($next_postday_result)) {
        $testday[$np] = $next_postday_row[$next_postdays];
    }
    $np++;
}

if (in_array("B", $table_opt)) {
    $current_water = "육수팩1";
} else {
    $current_water = "";
}

if ($get_post_day == "월") {
    $get_post_num = 0;
} elseif ($get_post_day == "화") {
    $get_post_num = 1;
} elseif ($get_post_day == "수") {
    $get_post_num = 2;
} elseif ($get_post_day == "목") {
    $get_post_num = 3;
} elseif ($get_post_day == "금") {
    $get_post_num = 4;
}


for ($qs = 1; $qs <= 6; $qs = $qs + 1) {

    $insert_user = $news_user_id . "-" . $qs;
    $shick_insert_query = "INSERT INTO `shicktest` (userid, name, deilday, opt, period, memo, water, delinum) VALUES ('$insert_user','$new_user_name','$get_post_day','$option_box','$choice_period','','$current_water','$get_post_num')";
    mysqli_query($mysqli, $shick_insert_query);
}

//if (in_array("D", $side_opt)) {
//    $insert_user = $news_user_id . "-7";
//    $weekend_insert_query = "INSERT INTO `shicktest` (userid, name, deilday, opt, period, memo, water, delinum) VALUES ('$insert_user','$new_user_name','$get_post_day','$total_opt','$choice_period','','$current_water','$get_post_num')";
//    mysqli_query($mysqli, $weekend_insert_query);
//} else {
//}

if (in_array("Z", $period_opt)) {
    $ns = 0;
    for ($qs = 1; $qs <= 4; $qs = $qs + 3) {

        $loades_menu[1] = "쌀미음";
        $loades_menu[4] = "찹쌀미음";

        $insert_user = $news_user_id . "-" . $qs;

        $update_query = "UPDATE `shicktest` SET `$next_payday[$ns]`='$load_menu[$qs]' where userid = '$insert_user'";
        mysqli_query($mysqli, $update_query);
    }

    $ns = 1;

    while ($ns <= 3) {
        for ($qs = 1; $qs <= 6; $qs = $qs + 1) {

            $load_codes = $table_code . "-" . $qs;
            $load_query = "SELECT * FROM tablelist WHERE periods = '$period_str' AND options = '$table_str' AND codes LIKE '%-$qs'";
            $load_result = mysqli_query($mysqli, $load_query);
            $load_row = mysqli_fetch_array($load_result);
            $load_menu[$qs] = $load_row[$testday[$ns]];

            $insert_user = $news_user_id . "-" . $qs;

            $update_query = "UPDATE `shicktest` SET `$next_payday[$ns]`='$load_menu[$qs]' where userid = '$insert_user'";
            mysqli_query($mysqli, $update_query);
        }
        $ns++;
    }
} elseif (in_array("X", $period_opt)) {
    $ns = 0;
    for ($qs = 1; $qs <= 4; $qs = $qs + 3) {

        $loades_menu[1] = "한우미음";
        $loades_menu[4] = "닭고기미음";

        $insert_user = $news_user_id . "-" . $qs;

        $update_query = "UPDATE `shicktest` SET `$next_payday[$ns]`='$load_menu[$qs]' where userid = '$insert_user'";
        mysqli_query($mysqli, $update_query);
    }

    $ns = 1;

    while ($ns <= 3) {
        for ($qs = 1; $qs <= 6; $qs = $qs + 1) {

            $load_query = "SELECT * FROM tablelist WHERE periods = '$period_str' AND options = '$table_str' AND codes LIKE '%-$qs'";
            $load_result = mysqli_query($mysqli, $load_query);
            $load_row = mysqli_fetch_array($load_result);
            $load_menu[$qs] = $load_row[$testday[$ns]];

            $insert_user = $news_user_id . "-" . $qs;

            $update_query = "UPDATE `shicktest` SET `$next_payday[$ns]`='$load_menu[$qs]' WHERE userid = '$insert_user'";
            mysqli_query($mysqli, $update_query);
        }

        $ns++;
    }
} else {
    $ns = 0;
    while ($ns <= 3) {
        for ($qs = 1; $qs <= 6; $qs = $qs + 1) {

            $load_query = "SELECT * FROM tablelist WHERE periods = '$period_str' AND options = '$table_str' AND codes LIKE '%-$qs'";
            $load_result = mysqli_query($mysqli, $load_query);
            $load_row = mysqli_fetch_array($load_result);
            $load_menu[$qs] = $load_row[$testday[$ns]];

            $insert_user = $news_user_id . "-" . $qs;

            $update_query = "UPDATE `shicktest` SET `$next_payday[$ns]`='$load_menu[$qs]' WHERE userid = '$insert_user'";
            mysqli_query($mysqli, $update_query);
        }

        $ns++;
    }
}

if (in_array("K", $side_opt)) {

    for ($qs = 1; $qs <= 2; $qs = $qs + 1) {

        $insert_user = $news_user_id . "-" . $qs;
        $snack_insert_query = "INSERT INTO `shicktest` (userid, name, deilday, opt, period, memo, water, delinum) VALUES ('$insert_user','$new_user_name','$get_post_day','$total_opt','$choice_period','','','$get_post_num')";
        mysqli_query($mysqli, $snack_insert_query);
    }

    $ns = 0;

    while ($ns <= 3) {
        for ($qs = 1; $qs <= 2; $qs = $qs + 1) {

            $snack_load_query = "SELECT * FROM tablelist WHERE periods = '$period_str' AND snack = '$snack' AND codes LIKE '%-$qs'";
            $snack_load_result = mysqli_query($mysqli, $snack_load_query);
            $snack_load_row = mysqli_fetch_array($snack_load_result);

            $snack_menu[$qs] = $snack_load_row[$testday[$ns]];

            $insert_user = $news_user_id . "-" . $qs;
            $snack_update_query = "UPDATE `snacktable` SET `$next_payday[$ns]` = '$snack_menu[$qs]' WHERE userid = '$insert_user'";
            mysqli_query($mysqli, $snack_update_query);
        }
        $ns++;
    }
}

require_once "TKakaoNotificationTalk.php";

$key = "MTQ0MjAtMTYxNTg4MTMyOTgxMi1kMzVjNGM2NS00NGZhLTQ5NTAtOWM0Yy02NTQ0ZmE5OTUwMDA="; // 구매 시 발급받은 Key의 코드값 (헤더 “x-waple-authorization”의 값으로 설정하는 값을 말한다.)
$clientId = "olivejnainc"; // {client_id} 는 API스토어에 가입한 후 해당 API를 사용(구매) 신청한 ID.
$defaultCallBack = "0518055957"; // 발신자 전화번호
$knt = new TKakaoNotificationTalk\TKakaoNotificationTalk($key, $clientId, $defaultCallBack);

if ($news == "1") {
    $body = [
        "phone" => $new_user_phone,
        "callback" => "0518055957", // 발신번호 발신자번호등록 기능으로 먼저 등록해야 메시지발송이 가능합니다.
        "reqdate" => "", // 예약발송시 다음과같은 형식으로 일시를 지정한다. "20160517000000", 비워두면 즉시발송.
        "msg" => "환영합니다!
$new_user_name 님의 첫 식단이 정상적으로 결제되었습니다.
        
▶결제일: $tooday
▶식단명: $choice_period 도담 $table_box 식단
▶배송지정일: $new_user_date
        
*도담밀 이용을 위해 아래 버튼을 클릭해서 사전 설문조사를 진행해주세요.
*이유식 진단 서비스를 이용하셨다면 사전 설문조사는 참여하지 않으셔도 된답니다.
        
*앞으로 매주 지정 요일에 도담밀 아기 식단 밀키트가 문앞까지 배송됩니다. 
*가입 시 선택한 요일은 배송 출발 날짜이며, 1~2일 내로 수령하실 수 있어요.
*매주 출발하는 식단과 레시피는 식단 확인 페이지에서 확인할 수 있어요. 
*도담가이드 페이지를 꼭 확인하고 도담밀을 알차게 이용해 보세요!
        
*궁금한 사항은 언제든 홈페이지 또는 고객센터로 문의 주시기 바랍니다.
        
▶고객센터: 051-805-5957", // 변수부분을 제외하고 템플릿내용 동일해야합니다.
        "template_code" => "DN0001", // 미리 APISTORE 카카오 알림톡 템플릿으로 등록승인된 템플릿의 코드값
        "btn_types" => "웹링크,웹링크",
        "btn_txts" => "사전설문조사,도담가이드",
        "btn_urls1" => "https://dodammeal.com/login/?redirect_to=/con3survey-02, https://dodammeal.com/con3guide",
        "btn_urls2" => "https://dodammeal.com/login/?redirect_to=/con3survey-02, https://dodammeal.com/con3guide",
    ];
} elseif ($news == "2") {
    $body = [
        "phone" => $new_user_phone,
        "callback" => "0518055957", // 발신번호 발신자번호등록 기능으로 먼저 등록해야 메시지발송이 가능합니다.
        "reqdate" => "", // 예약발송시 다음과같은 형식으로 일시를 지정한다. "20160517000000", 비워두면 즉시발송.
        "msg" => "환영합니다!
$new_user_name 님의 첫 식단이 정상적으로 결제되었습니다.
        
▶결제일: $tooday
▶식단명: $choice_period 도담 $table_box 식단
▶배송지정일: $new_user_date
        
*도담밀 이용을 위해 아래 버튼을 클릭해서 사전 설문조사를 진행해주세요.
*이유식 진단 서비스를 이용하셨다면 사전 설문조사는 참여하지 않으셔도 된답니다.
        
*앞으로 매주 지정 요일에 도담밀 아기 식단 밀키트가 문앞까지 배송됩니다. 
*가입 시 선택한 요일은 배송 출발 날짜이며, 1~2일 내로 수령하실 수 있어요.
*매주 출발하는 식단과 레시피는 식단 확인 페이지에서 확인할 수 있어요. 
*도담가이드 페이지를 꼭 확인하고 도담밀을 알차게 이용해 보세요!
        
*궁금한 사항은 언제든 홈페이지 또는 고객센터로 문의 주시기 바랍니다.
        
▶고객센터: 051-805-5957", // 변수부분을 제외하고 템플릿내용 동일해야합니다.
        "template_code" => "DN0001", // 미리 APISTORE 카카오 알림톡 템플릿으로 등록승인된 템플릿의 코드값
        "btn_types" => "웹링크,웹링크",
        "btn_txts" => "사전설문조사,도담가이드",
        "btn_urls1" => "https://dodammeal.com/login/?redirect_to=/con3survey-02, https://dodammeal.com/con3guide",
        "btn_urls2" => "https://dodammeal.com/login/?redirect_to=/con3survey-02, https://dodammeal.com/con3guide",
    ];
} elseif ($news == "3") {
    $body = [
        "phone" => $new_user_phone,
        "callback" => "0518055957", // 발신번호 발신자번호등록 기능으로 먼저 등록해야 메시지발송이 가능합니다.
        "reqdate" => "", // 예약발송시 다음과같은 형식으로 일시를 지정한다. "20160517000000", 비워두면 즉시발송.
        "msg" => "환영합니다!
$new_user_name 님의 첫 식단이 정상적으로 결제되었습니다.
        
▶결제일: $tooday
▶식단명: $choice_period 도담 $table_box
▶배송지정일: $new_user_date
        
*도담밀 이용을 위해 아래 버튼을 클릭해서 사전 설문조사를 진행해주세요.
*이유식 진단 서비스를 이용하셨다면 사전 설문조사는 참여하지 않으셔도 된답니다.
        
*앞으로 매주 지정 요일에 도담밀 아기 식단 밀키트가 문앞까지 배송됩니다. 
*가입 시 선택한 요일은 배송 출발 날짜이며, 1~2일 내로 수령하실 수 있어요.
*매주 출발하는 식단과 레시피는 식단 확인 페이지에서 확인할 수 있어요. 
*도담가이드 페이지를 꼭 확인하고 도담밀을 알차게 이용해 보세요!
        
*궁금한 사항은 언제든 홈페이지 또는 고객센터로 문의 주시기 바랍니다.
        
▶고객센터: 051-805-5957", // 변수부분을 제외하고 템플릿내용 동일해야합니다.
        "template_code" => "DN0001", // 미리 APISTORE 카카오 알림톡 템플릿으로 등록승인된 템플릿의 코드값
        "btn_types" => "웹링크,웹링크",
        "btn_txts" => "사전설문조사,도담가이드",
        "btn_urls1" => "https://dodammeal.com/login/?redirect_to=/con3survey-02, https://dodammeal.com/con3guide",
        "btn_urls2" => "https://dodammeal.com/login/?redirect_to=/con3survey-02, https://dodammeal.com/con3guide",
    ];
}

$response = $knt->postMessage($body);

if ($response->body->result_message == "OK") {

    echo "<script>console.log(" . $response->body->cmid . ")</script>";
} else {
    // ERROR 발송 실패.
    echo "<script>console.log(" . $response->body->result_message . ")</script>";
    echo "<script>console.log(" . $response->body->result_code . ")</script>";
}


?>

<script type="text/javascript" src="http://wcs.naver.net/wcslog.js"></script>
<script type="text/javascript">
    var _nasa = {};
    _nasa["cnv"] = wcs.cnv("1", "<?php echo $ordertotals ?>"); // 샘플에서 0 으로 나와있는 부분은 주문결제완료금액 변수 지정
</script>

<script type="text/javascript" src="//wcs.naver.net/wcslog.js"></script>
<script type="text/javascript">
    if (!wcs_add) var wcs_add = {};
    wcs_add["wa"] = "s_8534b347ea4";
    if (!_nasa) var _nasa = {};
    wcs.inflow("dodammeal.com")
    wcs_do(_nasa);
</script>

<input type="hidden" name="worm_test" value="<?php echo $worm_test ?>">


<script type="text/javascript">
    gtag('event', 'purchase', {
        "transaction_id": "<?php echo $order_id; ?>",
        "affiliation": "<?php echo get_option('blogname'); ?>",
        "value": "<?php echo $order->get_total(); ?>",
        "currency": "<?php echo get_woocommerce_currency(); ?>",
        "tax": "<?php echo $order->get_total_tax(); ?>",
        "shipping": "<?php echo $order->get_total_shipping(); ?>",
        "items": [
            <?php
            // Item Details
            if (sizeof($order->get_items()) > 0) {
                foreach ($order->get_items() as $item) {
                    $product_cats = get_the_terms($item['product_id'], 'product_cat');
                    if ($product_cats) {
                        $cat = $product_cats[0];
                    } ?> {
                        "id": "<?php echo get_post_meta($item['product_id'], '_sku', true); ?>",
                        "name": "<?php echo $item['name'] . ' / ' . get_field('item_color', $item['product_id']); ?>",
                        "list_name": "<?php echo get_option('blogname'); ?>",
                        "brand": "dodammeal",
                        "category": "<?php echo $cat->name; ?>",
                        "variant": "<?php echo get_field('item_color', $item['product_id']); ?>",
                        "quantity": "<?php echo $item['qty']; ?>",
                        "price": "<?php echo $item['line_subtotal']; ?>"
                    },
            <?php
                }
            } ?>
        ]
    });
</script>