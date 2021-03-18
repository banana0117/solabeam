<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

// END ENQUEUE PARENT ACTION


//add_filter('add_to_cart_redirect', 'themeprefix_add_to_cart_redirect');
//function themeprefix_add_to_cart_redirect() {
//global $woocommerce;
//$cart_url = $woocommerce->cart->get_cart_url();
//return $cart_url;
//}


// YJ 다음우편번호검색
add_filter( 'woocommerce_checkout_fields' , 'checkout_fields_postcode_lookup' ,9999);
function checkout_fields_postcode_lookup( $fields ) {
$fields['billing']['billing_postcode']['label'] = '<label style="width:100%;">도로명주소</label><input type="button" id="billing_postcode_search" value="우편번호 검색" class="btn" onclick="openDaumPostcode();" style="display:inline-block; width:50%;">';
return $fields; }

//주소검색창불러오기
add_action('init','postcode_lookup_load');
function postcode_lookup_load() {
wp_enqueue_script('daum_postcode_woocommerce', '//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js',array(),null,false);
}

add_action( 'wp_enqueue_scripts', 'wp_enqueue_scripts_postcode_lookup' );

//주소클릭시하단인풋에추가하는함수
function wp_enqueue_scripts_postcode_lookup() {
?>
<script type="text/javascript">
    //주소넣기
    function openDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                document.getElementById('billing_postcode').value = data.zonecode;
                document.getElementById('billing_address_1').value = data.address;
                document.getElementById('billing_address_2').focus();
            }
        }).open();
    }

    function openDaumPostcode2() {
        new daum.Postcode({
            oncomplete: function(data) {
                document.getElementById('shipping_postcode').value = data.zonecode;
                document.getElementById('shipping_address_1').value = data.address;
                document.getElementById('shipping_address_2').focus();
            }
        }).open();
    }

function openDaumPostcode3() {
        new daum.Postcode({
            oncomplete: function(data) {
                document.getElementById('addpostcode').value = data.zonecode;
                document.getElementById('addaddress_1').value = data.address;
                document.getElementById('addaddress_2').focus();
            }
        }).open();
    }
</script>
<?php
}

// YJ 로그인회원가입폼//
add_filter('wpmem_register_form_before', 'my_register_form_before');
function my_register_form_before(){
	$str = '<style>
.entry-title { display:none; }
.entry-content { padding-top:50px; }
</style>

<div class="user_form regi_form" id="regi_form">
    <div id="newmem_reg1" class="member_active new_member newmem_reg1">회원가입</div>
    <div class="divider"></div>
    <div id="newmem_login1" class="new_member newmem_login1">로그인</div>
</div>';
return $str;
}

add_filter('wpmem_login_form_before', 'my_login_form_before');
function my_login_form_before(){
$str = '<style>
.entry-title { display:none; }
.entry-content { padding-top:50px; }
</style>


<div class="user_form regi_form" id="login_form">
    <div id="newmem_reg2" class="new_member newmem_reg2">회원가입</div>
    <div class="divider"></div>
    <div id="newmem_login2" class="member_active new_member newmem_login2">로그인</div>
</div>';
return $str;
}

add_action('wpmem_post_register_data', 'my_registration_hook', 1);
function my_registration_hook($fields){
$user = get_userdata($fields['ID']);
wp_set_current_user($user->ID, $user->user_login);
wp_set_auth_cookie($user->ID, false);
do_action('wp_login', $user->user_login, $user);
}

function woocommerce_login_form( $args = array() ) {
echo "<style>#login_form { display:none; } #wpmem_login{ display:none; }</style>";
echo do_shortcode( '[wpmem_form register]' );
echo do_shortcode( '[wpmem_form login]' );
}

//add_action( 'wpmem_register_redirect','my_reg_redirect' );
//function my_reg_redirect( $url )
//{
//wp_redirect( 'https://dodammeal.com' );
//exit();
//}

//add_action( 'wpmem_register_redirect','my_reg_redirect' );
//function my_reg_redirect( $url ){
//    if (!is_user_logged_in() && !is_home()){
//        $redirect = home_url() . '/wp-login.php?redirect_to=' . urlencode( $_SERVER['HTTP_REFERER'] );
//        wp_redirect( $redirect );
//        exit();
//    }
//}

//add_action( 'wpmem_login_redirect','my_login_redirect', 999 );
//function my_login_redirect( $redirect_to )
//{
//$firstpage = (isset($_SERVER['HTTP_REFERER'])) ? $originpage = $_SERVER['HTTP_REFERER'] : $originpage = '/dodamis';
//wp_redirect( $originpage );
//exit();
//}


//add_filter( 'wpmem_login_redirect', 'my_login_redirect', 999 );
//function my_login_redirect( $redirect_to, $user_id ) {
//   $ref = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : '';
//  if (!empty($ref)) {
//     $path = parse_url($ref, PHP_URL_PATH);

//        if ( null === $path || '/' == $path || '' == $path ) {
//          return '/';
//       }
//  }
//    return '/checkout';
//}


// 체크아웃 //
//add_filter('woocommerce_before_checkout_form', 'my_before_checkout_form');
//function my_before_checkout_form(){
//$str = '<div class="index_title"><h3 class="index_top_title">결제하기</h3></div>';
//return $str;
//}

add_action( 'woocommerce_before_checkout_billing_form', 'my_checkout_billing_form' );

function my_checkout_billing_form( $checkout ) {

    echo '<div style="margin-bottom:20px;"><p style="font-size:16px; font-weight:bold; color:#333; padding-left:20px;">' . __('주문 고객 정보') . '</p></div>';

}

//회원가입주소검색
add_filter( 'wpmem_register_form_rows', 'my_register_form_rows_filter', 10, 2 );


function my_register_form_rows_filter( $rows, $toggle ) {

$rows['billing_postcode']['row_after'] = '<input type="button" value="우편번호 검색" onclick="openDaumPostcode()" style="display:inline-block; width:50%; float:left; margin-bottom:10px; margin-top:-13px;">';

return $rows;

}

//마이페이지 - 상단 편집
add_filter('woocommerce_account_menu_items','my_woocommerce_account_menu_items',10,1);
function my_woocommerce_account_menu_items($items){
	$items = array(
		//'edit-account'    => __( '내 프로필', 'woocommerce' ),
		'dashboard'       => __( '내 프로필', 'woocommerce' ),
		'orders'          => __( '내 주문', 'woocommerce' ),
		'subscriptions' => __( '정기배송', 'woocommerce' ),
		//'downloads'       => __( 'Downloads', 'woocommerce' ),
		//'edit-address'    => __( 'Addresses', 'woocommerce' ),
		//'payment-methods' => __( '결제방법', 'woocommerce' ),
		'customercenter' => '고객센터',
		//'customer-logout' => __( 'Logout', 'woocommerce' ),
	);
return $items;
}


//마이페이지 - 대시보드 편집
add_action( 'woocommerce_account_dashboard', 'action_woocommerce_account_dashboard' , 10, 1);
function action_woocommerce_account_dashboard() {

//$postcode = get_user_meta( $current_user -> ID, 'billing_postcode', true );

//echo '<p>테스트임니다</p> <a href="/myaccount/edit-account">fafaf</a>';


}

//마이페이지 내 주문
function new_orders_columns( $columns = array() ) {

    // Hide the columns
    if( isset($columns['order-total']) ) {
        // Unsets the columns which you want to hide
        unset( $columns['order-number'] );
        unset( $columns['order-date'] );
        unset( $columns['order-status'] );
        unset( $columns['order-total'] );
        unset( $columns['order-actions'] );
    }

    // Add new columns
    //$columns['order-number'] = __( '넘버', 'woocommerce' );
    $columns['order-date'] = __( '주문일', 'woocommerce' );
    $columns['order-total'] = __( '주문금액', 'woocommerce' );
    $columns['order-status'] = __( '결과', 'woocommerce' );
    $columns['order-actions'] = __( '&nbsp;', 'woocommerce' );

    return $columns;
}
add_filter( 'woocommerce_account_orders_columns', 'new_orders_columns' );


//디비연동
//add_action('init','my_db_test');
//function my_db_test(){
//$mydb = new wpdb('yjtest','Goyo5713**','yjtest','192.168.0.68');
//$result = $mydb->get_results("select~");
//print_r($results);
//}


 function my_wp_zapier_send_meta( $array, $user, $order_id ) {

	$dtwc_delivery_date = get_order_meta( $order_id, 'dtwc_delivery_date', true );
	// $meta_key = get_order_meta( $order_id, 'dtwc_delivery_date', true );

	// Add data to the array we are sending to Zapier or another service/webhook.
	$array['dtwc_delivery_date'] = $dtwc_delivery_date;

	return $array;
}
add_filter( 'wpzp_send_data_profile_update_array', 'my_wp_zapier_send_meta', 10, 3 );

function book_cpt_columns($columns) {

	$new_columns = array(
		'dtwc_delivery_date' => __('dtwc_delivery_date', 'storefront'),
	);
    return array_merge($columns, $new_columns);
}
add_filter('manage_shop_subscription_posts_columns' , 'book_cpt_columns');


add_action( 'woocommerce_order_status_changed', 'your_function', 99, 3 );

function your_function( $order_id, $old_status, $new_status ){
    if( $new_status == "completed" ) {
$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
$change_normal_query = "UPDATE normalorder SET status = 'complete' WHERE orderid = '$order_id'";
mysqli_query($mysqli,$change_normal_query);
    }
}


add_filter( 'auth_cookie_expiration', 'keep_me_logged_in_for_1_year' );function keep_me_logged_in_for_1_year( $expirein ) {

return 31556926; // 1 year in seconds
}

    add_action( 'woocommerce_thankyou', 'sbl_wc_ga_integration' );
    function sbl_wc_ga_integration( $order_id ) {
      $order = new WC_Order( $order_id ); ?>
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
                    } ?>
                    {
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
    <?php
    }


