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

$order_id = $order->get_id();

$orderprice = $order->get_total();
$ordertotals = preg_replace("/[^0-9]/", "", $orderprice);

if ( wcs_order_contains_subscription( $order_id ) ) {
    $subid = $order_id + 1;

    $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

    $current_user = wp_get_current_user();
    $news_user_id = $current_user -> user_login;
    $new_user_day = get_post_meta( $subid, 'deliday', true );
    $new_user_date = get_post_meta ( $subid, 'dtwc_delivery_date', true);
    $newz_user_phone = get_post_meta ( $subid, '_shipping_phone', true );
    $new_user_phone = preg_replace("/[^0-9]/","",$newz_user_phone);
    $new_user_address_1 = get_post_meta ( $subid, '_shipping_address_1', true );
    $new_user_address_2 = get_post_meta ( $subid, '_shipping_address_2', true );
    $new_user_address = $new_user_address_1." ".$new_user_address_2 ;
    $new_user_postcode = get_post_meta ( $subid, '_shipping_postcode', true );
    $new_user_name = get_post_meta ( $subid, '_shipping_first_name', true );

    $message_query="SELECT post_excerpt FROM wp_posts WHERE ID = '$order_id'";
    $message_result = mysqli_query($mysqli,$message_query);
    $message_row = mysqli_fetch_array($message_result);
    $deli_message = $message_row[post_excerpt];

    $limitdate = date("Y-m-d",strtotime("+1 month", strtotime($new_user_date)));

    $new_user_status = "wc-processing";
    $normal_auth = 0;

    $order = new WC_Order( $order_id );
    foreach( $order->get_items() as $item_id => $item ){
        $product = $item->get_product();
        $product_id = $item->get_product_id();
        $product_names[] = $item->get_name();
    }
 for($ks=0; $ks<=10; $ks=$ks+1){
    if(strpos($product_names[$ks],"프리미엄") !== false ){
        $product_meta = "프리미엄";
    } 

    if(strpos($product_names[$ks],"베이직") !== false ){
        $product_meta = "베이직";
    } 
    if(strpos($product_names[$ks],"B") !== false ){
        $product_meta = "베이직";
    } 
    if(strpos($product_names[$ks],"P") !== false ){
        $product_meta = "프리미엄";
    } 

    if(strpos($product_names[$ks],"준비기") !== false ){
        $period_meta = "준비기";
    }

    if(strpos($product_names[$ks],"초기") !== false ){
        $period_meta = "초기";
    }

    if(strpos($product_names[$ks],"중기") !== false ){
        $period_meta = "중기";
    }

    if(strpos($product_names[$ks],"후기") !== false ){
        $period_meta = "후기";
    }

    if(strpos($product_names[$ks],"완료기") !== false ){
        $period_meta = "완료기";
    }

   if(strpos($product_names[$ks],"유아") !== false ){
        $period_meta = "유아기";
    }

    if(strpos($product_names[$ks],"슈퍼") !== false ){
        $opt_meta_1 = "슈퍼";
    }

    if(strpos($product_names[$ks],"육수") !== false ){
        $opt_meta_2 = "육수";
    }

    if(strpos($product_names[$ks],"한우") !== false ){
        $opt_meta_3 = "한우";
    }

    if(strpos($product_names[$ks],"케어") !== false ){
        $opt_meta_4 = "케어";
    }

    if(strpos($product_names[$ks],"배도") !== false ){
        $opt_meta_6 = "배도라지";
    }

    if(strpos($product_names[$ks],"간식") !== false ){
        $opt_meta_7 = "간식";
    }

    if(strpos($product_names[$ks],"모든") !== false ){
        $opt_meta_5 = "슈퍼육수한우케어배도라지간식";
    }

    if(strpos($product_names[$ks],"올인원이유식냄비") !== false ){
        $product_etc = "올인원이유식냄비";
        $product_qua = $quantity[0];
        $normal_auth = 1;
    }

    if(strpos($product_names[$ks],"도담밀이유식냄비") !== false ){
        $product_etc = "도담밀이유식냄비";
        $product_qua = $quantity[0];
        $normal_auth = 1;
    }

 }
    $opt_meta = $opt_meta_5.$opt_meta_4.$opt_meta_3.$opt_meta_2.$opt_meta_1.$opt_meta_6.$opt_meta_7;

    $new_user_query = "INSERT INTO userbase (userid, username, phone, address, delidate, deliday, postcode, membership, firstperiod, opt, limitday, message ) VALUES ('$news_user_id','$new_user_name','$new_user_phone','$new_user_address','$new_user_date', '$new_user_day', '$new_user_postcode','$product_meta', '$period_meta','$opt_meta','$limitdate','$deli_message')";
    mysqli_query($mysqli, $new_user_query);

    if (empty($product_etc)) {
        
    } else {
        $new_etc_query = "INSERT INTO normalorder (userid, username, phone, address, postcode, status, period, orderid,quantity) VALUES ('$news_user_id','$new_user_name','$new_user_phone','$new_user_address','$new_user_postcode','$new_user_status','$product_etc','$order_id','$product_qua')";
        mysqli_query($mysqli, $new_etc_query);
    }
    
    mysqli_close($mysqli);

} else {

    $subids = $order_id;

    $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

    $current_user = wp_get_current_user();
    $news_user_id = $current_user -> user_login;
    $new_user_day = get_post_meta( $subids, 'deliday', true );
    $new_user_date = get_post_meta ( $subids, 'dtwc_delivery_date', true);
    $newz_user_phone = get_post_meta ( $subids, '_shipping_phone', true );
    $new_user_phone = preg_replace("/[^0-9]/", "", $newz_user_phone);
    $new_user_address_1 = get_post_meta ( $subids, '_shipping_address_1', true );
    $new_user_address_2 = get_post_meta ( $subids, '_shipping_address_2', true );
    $new_user_address = $new_user_address_1." ".$new_user_address_2 ;
    $new_user_postcode = get_post_meta ( $subids, '_shipping_postcode', true );
    $new_user_name = get_post_meta ( $subids, '_shipping_first_name', true );

    $new_user_status = "wc-processing";

    $order = new WC_Order( $order_id );
    foreach( $order->get_items() as $item_id => $item ){
        $product = $item->get_product();
        $product_id = $item->get_product_id();
        $product_names[] = $item->get_name();
        $quantity[] = $item->get_quantity();
    }

    if(strpos($product_names[0],"준비기/초기") !== false ){
        $product_meta = "테스트팩 준비기/초기";
        $product_qua = $quantity[0];
    } elseif(strpos($product_names[0],"배도라지") !== false ) {
        $product_meta = "유기농 배도라지";
        $product_qua = $quantity[0];
    } elseif(strpos($product_names[0],"올인원냄비") !== false ) {
        $product_meta = "올인원냄비";
        $product_qua = $quantity[0];
    } elseif(strpos($product_names[0],"도담밀이유식냄비") !== false ) {
        $product_meta = "도담밀이유식냄비";
        $product_qua = $quantity[0];
    } else {
        $product_meta = "테스트팩 중기";
        $product_qua = $quantity[0];
    }

    $new_user_query = "INSERT INTO normalorder (userid, username, phone, address, postcode, status, period, orderid,quantity) VALUES ('$news_user_id','$new_user_name','$new_user_phone','$new_user_address','$new_user_postcode','$new_user_status','$product_meta','$order_id','$product_qua')";
    mysqli_query($mysqli, $new_user_query);

    mysqli_close($mysqli);
}

$worm_test = $_POST['worm_test'];

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
                "transaction_id": "<?php echo $order_id;?>",
                "affiliation": "<?php echo get_option( 'blogname' );?>",
                "value": "<?php echo $order->get_total();?>",
                "currency": "<?php echo get_woocommerce_currency();?>",
                "tax": "<?php echo $order->get_total_tax();?>",
                "shipping": "<?php echo $order->get_total_shipping();?>",
                "items": [
                    <?php
              // Item Details
              if ( sizeof( $order->get_items() ) > 0 ) {
                foreach( $order->get_items() as $item ) {
                  $product_cats = get_the_terms( $item['product_id'], 'product_cat' );
                    if ($product_cats) {
                      $cat = $product_cats[0];
                    } ?> {
                        "id": "<?php echo get_post_meta($item['product_id'], '_sku', true);?>",
                        "name": "<?php echo $item['name'].' / '.get_field('item_color',$item['product_id']);?>",
                        "list_name": "<?php echo get_option( 'blogname' );?>",
                        "brand": "dodammeal",
                        "category": "<?php echo $cat->name;?>",
                        "variant": "<?php echo get_field('item_color',$item['product_id']);?>",
                        "quantity": "<?php echo $item['qty'];?>",
                        "price": "<?php echo $item['line_subtotal'];?>"
                    },
                    <?php
              }
            } ?>
                ]
            });
        </script>