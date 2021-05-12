<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if (!function_exists('chld_thm_cfg_locale_css')) :
    function chld_thm_cfg_locale_css($uri)
    {
        if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter('locale_stylesheet_uri', 'chld_thm_cfg_locale_css');


// YJ 다음우편번호검색
add_filter('woocommerce_checkout_fields', 'checkout_fields_postcode_lookup', 9999);
function checkout_fields_postcode_lookup($fields)
{
    $fields['billing']['billing_postcode']['label'] = '<label style="width:100%;">도로명주소</label><input type="button" id="billing_postcode_search" value="우편번호 검색" class="btn" onclick="openDaumPostcode();" style="display:inline-block; width:50%;">';
    return $fields;
}

//주소검색창불러오기
add_action('init', 'postcode_lookup_load');
function postcode_lookup_load()
{
    wp_enqueue_script('daum_postcode_woocommerce', '//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js', array(), null, false);
}

add_action('wp_enqueue_scripts', 'wp_enqueue_scripts_postcode_lookup');

//주소클릭시하단인풋에추가하는함수
function wp_enqueue_scripts_postcode_lookup()
{
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


        function openDaumPostcode5() {
            new daum.Postcode({
                oncomplete: function(data) {
                    document.getElementById('detail_new_postcode').value = data.zonecode;
                    document.getElementById('detail_new_post').value = data.address;
                    document.getElementById('detail_new_sidepost').focus();
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
function my_register_form_before()
{
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
function my_login_form_before()
{
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
function my_registration_hook($fields)
{
    $user = get_userdata($fields['ID']);
    wp_set_current_user($user->ID, $user->user_login);
    wp_set_auth_cookie($user->ID, false);
    do_action('wp_login', $user->user_login, $user);
}

function woocommerce_login_form($args = array())
{
    echo "<style>#login_form { display:none; } #wpmem_login{ display:none; }</style>";
    echo do_shortcode('[wpmem_form register]');
    echo do_shortcode('[wpmem_form login]');
}


//회원가입주소검색
add_filter('wpmem_register_form_rows', 'my_register_form_rows_filter', 10, 2);


function my_register_form_rows_filter($rows, $toggle)
{

    $rows['billing_postcode']['row_after'] = '<input type="button" value="우편번호 검색" onclick="openDaumPostcode()" style="display:inline-block; width:50%; float:left; margin-bottom:10px; margin-top:-13px;">';

    return $rows;
}

//마이페이지 - 상단 편집
add_filter('woocommerce_account_menu_items', 'my_woocommerce_account_menu_items', 10, 1);
function my_woocommerce_account_menu_items($items)
{
    $items = array(
        //'edit-account'    => __( '내 프로필', 'woocommerce' ),
        'dashboard'       => __('내 프로필', 'woocommerce'),
        'orders'          => __('내 주문', 'woocommerce'),
        'subscriptions' => __('정기배송', 'woocommerce'),
        //'downloads'       => __( 'Downloads', 'woocommerce' ),
        //'edit-address'    => __( 'Addresses', 'woocommerce' ),
        //'payment-methods' => __( '결제방법', 'woocommerce' ),
        'customercenter' => '고객센터',
        //'customer-logout' => __( 'Logout', 'woocommerce' ),
    );
    return $items;
}


//마이페이지 내 주문
function new_orders_columns($columns = array())
{

    // Hide the columns
    if (isset($columns['order-total'])) {
        // Unsets the columns which you want to hide
        unset($columns['order-number']);
        unset($columns['order-date']);
        unset($columns['order-status']);
        unset($columns['order-total']);
        unset($columns['order-actions']);
    }

    // Add new columns
    //$columns['order-number'] = __( '넘버', 'woocommerce' );
    $columns['order-date'] = __('주문일', 'woocommerce');
    $columns['order-total'] = __('주문금액', 'woocommerce');
    $columns['order-status'] = __('결과', 'woocommerce');
    $columns['order-actions'] = __('&nbsp;', 'woocommerce');

    return $columns;
}
add_filter('woocommerce_account_orders_columns', 'new_orders_columns');


function my_wp_zapier_send_meta($array, $user, $order_id)
{

    $dtwc_delivery_date = get_order_meta($order_id, 'dtwc_delivery_date', true);
    // $meta_key = get_order_meta( $order_id, 'dtwc_delivery_date', true );

    // Add data to the array we are sending to Zapier or another service/webhook.
    $array['dtwc_delivery_date'] = $dtwc_delivery_date;

    return $array;
}
add_filter('wpzp_send_data_profile_update_array', 'my_wp_zapier_send_meta', 10, 3);

function book_cpt_columns($columns)
{

    $new_columns = array(
        'dtwc_delivery_date' => __('dtwc_delivery_date', 'storefront'),
    );
    return array_merge($columns, $new_columns);
}
add_filter('manage_shop_subscription_posts_columns', 'book_cpt_columns');


add_action('woocommerce_order_status_changed', 'your_function', 99, 3);

function your_function($order_id, $old_status, $new_status)
{
    if ($new_status == "completed") {
        $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
        $change_normal_query = "UPDATE normalorder SET status = 'complete' WHERE orderid = '$order_id'";
        mysqli_query($mysqli, $change_normal_query);
    }
}


add_filter('auth_cookie_expiration', 'keep_me_logged_in_for_1_year');
function keep_me_logged_in_for_1_year($expirein)
{

    return 31556926; // 1 year in seconds
}

// 이 부분은 storefront-child/functions.php 에 맨밑에 붙여넣기 하면됩니다
// 맨 밑에 html 부분 편집해서 결제페이지 모양을 만들면 됩니다

///////////////////////
///////시기선택부분///////
///////////////////////
add_action('woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice_pop', 10, 1);
function bbloomer_checkout_radio_choice_pop()
{
    $chosen = WC()->session->get('radio_chosen_pop');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_pop') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;

    $args = array(
        'type' => 'radio',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            '0' => '논',
            '69000' => '준비기',
            '89000' => '초기',
            '169000' => '중기',
            '239000' => '후기',
            '249000' => '완료기',
            '199000' => '유아기',
        ),
        'default' => $chosen
    );
    //식단선택 팝업의 시작
    echo "<div>";
    woocommerce_form_field('radio_choice_pop', $args, $chosen);
}
add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_pop', 10, 1);

function bbloomer_checkout_radio_choice_set_session_pop($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_pop'])) {
        WC()->session->set('radio_chosen_pop', $output['radio_choice_pop']);
    }
}
///////////////////////
///////식단선택부분///////
///////////////////////
add_action('woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice_table', 10, 1);

function bbloomer_checkout_radio_choice_table()
{
    $chosen = WC()->session->get('radio_chosen_table');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_table') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;
    $args = array(
        'type' => 'radio',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            '0' => '논',
            '3' => '퍼스트',
            '1' => '기본식단',
            '2' => '추가식단',
        ),
        'default' => $chosen
    );
    woocommerce_form_field('radio_choice_table', $args, $chosen);
}
add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_table', 10, 1);

function bbloomer_checkout_radio_choice_set_session_table($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_table'])) {
        WC()->session->set('radio_chosen_table', $output['radio_choice_table']);
    }
}


///////////////////////
//////옵션:간식추가///////
///////////////////////
add_action('woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice_opt_snack', 10, 1);
function bbloomer_checkout_radio_choice_opt_snack()
{
    $chosen = WC()->session->get('radio_chosen_opt_snack');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_opt_snack') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;

    $args = array(
        'type' => 'radio',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            '0' => 'none',
            '15000' => '간식키트',
        ),
        'default' => $chosen
    );
    woocommerce_form_field('radio_choice_opt_snack', $args, $chosen);
}
add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_opt_snack', 10, 1);

function bbloomer_checkout_radio_choice_set_session_opt_snack($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_opt_snack'])) {
        WC()->session->set('radio_chosen_opt_snack', $output['radio_choice_opt_snack']);
    }
}

///////////////////////
//////추가:멀티냄비//////
///////////////////////
add_action('woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice_opt_multipot', 10, 1);
function bbloomer_checkout_radio_choice_opt_multipot()
{
    $chosen = WC()->session->get('radio_chosen_opt_multipot');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_opt_multipot') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;
    $args = array(
        'type' => 'radio',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            '0' => 'none',
            '15000' => '올인원 냄비세트',
        ),
        'default' => $chosen
    );
    woocommerce_form_field('radio_choice_opt_multipot', $args, $chosen);
}
add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_opt_multipot', 10, 1);
function bbloomer_checkout_radio_choice_set_session_opt_multipot($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_opt_multipot'])) {
        WC()->session->set('radio_chosen_opt_multipot', $output['radio_choice_opt_multipot']);
    }
}

///////////////////////
//////추가:편수냄비///////
///////////////////////
add_action('woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice_opt_pot', 10, 1);
function bbloomer_checkout_radio_choice_opt_pot()
{
    $chosen = WC()->session->get('radio_chosen_opt_pot');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_opt_pot') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;
    $args = array(
        'type' => 'radio',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            '0' => 'none',
            '15000' => '이유식 편수냄비',
        ),
        'default' => $chosen
    );
    woocommerce_form_field('radio_choice_opt_pot', $args, $chosen);
    echo "</div>";
}
add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_opt_pot', 10, 1);
function bbloomer_checkout_radio_choice_set_session_opt_pot($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_opt_pot'])) {
        WC()->session->set('radio_chosen_opt_pot', $output['radio_choice_opt_pot']);
    }
}

///////////////////////
//////추가:이메이커///////
///////////////////////
add_action('woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice_opt_maker', 10, 1);
function bbloomer_checkout_radio_choice_opt_maker()
{
    $chosen = WC()->session->get('radio_chosen_opt_maker');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_opt_maker') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;
    $args = array(
        'type' => 'radio',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            '0' => 'none',
            '15000' => '이유식메이커',
        ),
        'default' => $chosen
    );
    woocommerce_form_field('radio_choice_opt_maker', $args, $chosen);
}
add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_opt_maker', 10, 1);
function bbloomer_checkout_radio_choice_set_session_opt_maker($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_opt_maker'])) {
        WC()->session->set('radio_chosen_opt_maker', $output['radio_choice_opt_maker']);
    }
}

///////////////////////
//////추가:이메이커///////
///////////////////////
add_action('woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice_opt_counter', 10, 1);
function bbloomer_checkout_radio_choice_opt_counter()
{
    $chosen = WC()->session->get('radio_chosen_opt_counter');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_opt_counter') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;
    $args = array(
        'type' => 'radio',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            '0' => 'none',
            '1' => '1',
            '2' => '1',
            '3' => '1',
            '4' => '1',
            '5' => '1',
            '6' => '1',
            '7' => '1',
            '8' => '1',
            '9' => '1',
        ),
        'default' => $chosen
    );
    woocommerce_form_field('radio_choice_opt_counter', $args, $chosen);
}
add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_opt_counter', 10, 1);
function bbloomer_checkout_radio_choice_set_session_opt_counter($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_opt_counter'])) {
        WC()->session->set('radio_chosen_opt_counter', $output['radio_choice_opt_counter']);
    }
}

//패키지부분
add_action('woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice_dis', 36, 1);

function bbloomer_checkout_radio_choice_dis()
{
    $chosen = WC()->session->get('radio_chosen_dis');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_dis') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;

    $args = array(
        'type' => 'select',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            '0' => '선택하지않음',
            '1' => '준비기~후기까지(8개월/5%)',
            '2' => '초기~후기까지(7개월/5%)',
            '3' => '중기~유아식까지(7개월/5%)',
        ),
        'default' => $chosen
    );

    echo '<div id="checkout-select" class="basic-only checkout-boxes">';
    echo '<div class="checkout-title"><p>주문일정</p></div>';
    woocommerce_form_field('radio_choice_dis', $args, $chosen);
    echo '</div>';
    //추천인 아이디는 여기
    echo '<div class="checkout-recos checkout-boxes"><div class="checkout-title"><p>추천인 아이디</p></div><div class="recos"><input type="text" id="recommend"></div><p class="reco-notice">* 추천인 할인은 첫 4주간만 적용됩니다.</p></div>';
}

add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_dis');

function bbloomer_checkout_radio_choice_set_session_dis($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_dis'])) {
        WC()->session->set('radio_chosen_dis', $output['radio_choice_dis']);
    }
}

//적립금부분
add_action('woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice_point', 38, 1);

function bbloomer_checkout_radio_choice_point()
{
    $chosen = WC()->session->get('radio_chosen_point');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_point') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;

    $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
    $current_user = wp_get_current_user();
    $news_user_id = $current_user->user_login;

    $pointz = 0;
    $query = "SELECT * FROM pointlog WHERE userid = '$news_user_id'";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_array($result)) {
        $pointz = $pointz + $row[points];
    }

    $args = array(
        'type' => 'number',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'custom_attributes' => array(
            'min'       =>  0,
            'max'       =>  $pointz,
        ),
        'default' => $chosen
    );

    echo '<div class="checkout-points checkout-boxes">';
    echo '<div class="checkout-title"><p>할인정보</p></div>';
    echo '<div class="flexed" style="padding-bottom:10px;"><p style="text-align:left;">적립금사용하기</p><p style="text-align:right;">(보유 : <span>' . $pointz . '</span>P)</p></div>';
    woocommerce_form_field('radio_choice_point', $args, $chosen);
    echo '<script>
    $( "#radio_choice_point" ).change(function() {
        var max = ' . $pointz . ';
        var min = 0;
        if ($(this).val() > max)
        {
            $(this).val(max);
        }
        else if ($(this).val() < min)
        {
            $(this).val(min);
        }       
      });</script>
      ';
    echo '</div>';
}

add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_point');

function bbloomer_checkout_radio_choice_set_session_point($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_point'])) {
        WC()->session->set('radio_chosen_point', $output['radio_choice_point']);
    }
}


////////////////////////
//////계산 및 금액추가//////
////////////////////////

add_action('woocommerce_cart_calculate_fees', 'bbloomer_checkout_radio_choice_fee', 20, 1);

function bbloomer_checkout_radio_choice_fee($cart)
{

    if (is_admin() && !defined('DOING_AJAX')) return;


    $radio = WC()->session->get('radio_chosen_pop'); // 시기 가져오기
    $radio_table = WC()->session->get('radio_chosen_table'); // 식단

    $radio_opt_snack = WC()->session->get('radio_chosen_opt_snack'); // 간식
    $radio_opt_counter = WC()->session->get('radio_chosen_opt_counter'); // 기타상품카운터
    $radio_opt_multipot = WC()->session->get('radio_chosen_opt_multipot'); // 올인원냄비
    $radio_opt_pot = WC()->session->get('radio_chosen_opt_pot'); // 편수냄비
    $radioz = WC()->session->get('radio_chosen_dis');

    $pointly = WC()->session->get('radio_chosen_point');
    $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
    $current_user = wp_get_current_user();
    $news_user_id = $current_user->user_login;
    $pointz = 0;
    $query = "SELECT * FROM pointlog WHERE userid = '$news_user_id'";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_array($result)) {
        $pointz = $pointz + $row[points];
    }


    //선택식단더하기
    if ($radio_table == "1") {
        //$period_label = "도담밀";
        $dis_per = "0";
        //시기별요금제추가
        if ($radio == "69000") {
            $period_label = "준비기";
            $period_pay = "69000";
            $water_pay = "0";
            $beef_pay = "0";
            $super_pay = "0";
            $snack_pay = "0";
        } elseif ($radio == "89000") {
            $period_label = "초기";
            $period_pay = "89000";
            $water_pay = "15000";
            $beef_pay = "10000";
            $super_pay = "0";
            $snack_pay = "0";
        } elseif ($radio == "169000") {
            $period_label = "중기";
            $period_pay = "169000";
            $water_pay = "40000";
            $beef_pay = "19000";
            $super_pay = "10000";
            $snack_pay = "98000";
        } elseif ($radio == "239000") {
            $period_label = "후기";
            $period_pay = "239000";
            $water_pay = "60000";
            $beef_pay = "29000";
            $super_pay = "20000";
            $snack_pay = "98000";
        } elseif ($radio == "249000") {
            $period_label = "유아식준비기";
            $period_pay = "249000";
            $water_pay = "60000";
            $beef_pay = "40000";
            $snack_pay = "98000";
            $super_pay = "20000";
        } elseif ($radio == "199000") {
            $period_label = "유아기";
            $period_pay = "199000";
            $water_pay = "0";
            $beef_pay = "25000";
            $super_pay = "20000";
            $snack_pay = "98000";
        }

        if ($radioz == '1') { // 준후패키지
            $disopt = "5";
            $period_pay = "1382000";
            $super_pay = "130000";
            $beef_pay = "159000";
            $water_pay = "300000";
            $snack_pay = "588000";
        } elseif ($radioz == '2') {
            $disopt = "5";
            $period_pay = "1313000";
            $super_pay = "130000";
            $beef_pay = "159000";
            $water_pay = "300000";
            $snack_pay = "588000";
        } elseif ($radioz == '3') {
            $disopt = "5";
            $period_pay = "1473000";
            $super_pay = "140000";
            $beef_pay = "184000";
            $water_pay = "360000";
            $snack_pay = "686000";
        } else {
        }

        $period_label .= " 도담 식단";

    } elseif ($radio_table == "2") {
        
        $dis_per = "0";
        //시기별요금제추가
        if ($radio == "69000") {
            $period_label = "준비기";
            $period_pay = "69000";
            $water_pay = "0";
            $beef_pay = "0";
            $snack_pay = "0";
            $super_pay = "0";
        } elseif ($radio == "89000") {
            $period_label = "초기";
            $period_pay = "89000";
            $water_pay = "15000";
            $beef_pay = "10000";
            $super_pay = "0";
            $snack_pay = "0";
        } elseif ($radio == "169000") {
            $period_label = "중기";
            $period_pay = "169000";
            $water_pay = "40000";
            $beef_pay = "19000";
            $snack_pay = "98000";
            $super_pay = "10000";
        } elseif ($radio == "239000") {
            $period_label = "후기";
            $period_pay = "239000";
            $water_pay = "60000";
            $beef_pay = "29000";
            $super_pay = "20000";
            $snack_pay = "98000";
        } elseif ($radio == "249000") {
            $period_label = "유아식준비기";
            $period_pay = "249000";
            $water_pay = "60000";
            $beef_pay = "40000";
            $super_pay = "20000";
            $snack_pay = "98000";
        } elseif ($radio == "199000") {
            $period_label = "유아기";
            $period_pay = "199000";
            $water_pay = "0";
            $beef_pay = "25000";
            $super_pay = "20000";
            $snack_pay = "98000";
        }

        if ($radioz == '1') { // 준후패키지
            $disopt = "5";
            $period_pay = "1382000";
            $super_pay = "130000";
            $beef_pay = "159000";
            $water_pay = "300000";
            $snack_pay = "588000";
        } elseif ($radioz == '2') {
            $disopt = "5";
            $period_pay = "1313000";
            $super_pay = "130000";
            $beef_pay = "159000";
            $water_pay = "300000";
            $snack_pay = "588000";
        } elseif ($radioz == '3') {
            $disopt = "5";
            $period_pay = "1473000";
            $super_pay = "140000";
            $beef_pay = "184000";
            $water_pay = "360000";
            $snack_pay = "686000";
        } else {
        }

        $period_label .= " 플러스 식단";

    } else {
        
        if ($radio == "69000") {
            $period_label = "준비기";
            $period_pay = "429000";
            $dis_per = "26";
            $snack_pay = "0";
        } elseif ($radio == "89000") {
            $period_label = "초기";
            $period_pay = "429000";
            $dis_per = "23";
            $snack_pay = "0";
        } elseif ($radio == "169000") {
            $period_label = "중기";
            $period_pay = "429000";
            $dis_per = "19";
            $snack_pay = "98000";
        } elseif ($radio == "239000") {
            $period_label = "후기";
            $period_pay = "429000";
            $dis_per = "12";
            $snack_pay = "98000";
        } elseif ($radio == "249000") {
            $period_label = "유아식준비기";
            $period_pay = "429000";
            $dis_per = "9";
            $snack_pay = "98000";
        } elseif ($radio == "199000") {
            $period_label = "유아기";
            $period_pay = "429000";
            $dis_per = "19";
            $snack_pay = "98000";
        }

        $period_label .= " 퍼스트";

    }

    //패키지별할인//
    if ($radioz != true || $radioz == '0') {
        $selectedproduct = 7634;
        $selectedproducts = 7653;
        $product_cart_id = $cart->generate_cart_id($selectedproduct);
        if (!$cart->find_product_in_cart($product_cart_id)) {
            $cart->empty_cart();
            $cart->add_to_cart($selectedproduct);
        }
    } else {
        $selectedproduct = 7653;
        $selectedproducts = 7634;
        $product_cart_id = $cart->generate_cart_id($selectedproduct);
        if (!$cart->find_product_in_cart($product_cart_id)) {
            $cart->empty_cart();
            $cart->add_to_cart($selectedproduct);
        }
    }

    if ($selectedproduct == "7634") {
        $period_label .= " / 4주";
    }
    //시기별식단//
    if ($radio) {
        $cart->add_fee($period_label, $period_pay);
    }

    if ($radio_table == "2") {
        $cart->add_fee('육수더하기', $water_pay);
        $cart->add_fee('고기더하기', $beef_pay);
        $cart->add_fee('재료더하기', $super_pay);
    }

    //간식추가금액//
    if ($radio_opt_snack) {
        $cart->add_fee('간식키트', $snack_pay);
    }


    //멀티팟금액//
    if ($radio_opt_multipot) {
        $multipot_pay = "59000";
        if ($radio_opt_counter) {
            $multipot_pay = absint($multipot_pay) * absint($radio_opt_counter);
        }

        $cart->add_fee('올인원 냄비세트', $multipot_pay);
    }

    //편수냄비금액//
    if ($radio_opt_pot) {
        $pot_pay = "19900";
        if ($radio_opt_counter) {
            $pot_pay = absint($pot_pay) * absint($radio_opt_counter);
        }

        $cart->add_fee('이유식 편수냄비', $pot_pay);
    }

    //패키지계산
    $fee_object = $cart->fees_api();
    $allfeedata = $fee_object->get_fees();
    $totalfee = array_sum(array_column($allfeedata, 'amount'));

    if ($radio_opt_multipot) {
        $totalfee = absint($totalfee) - absint($multipot_pay);
    }

    if ($radio_opt_pot) {
        $totalfee = absint($totalfee) - absint($pot_pay);
    }
    if ($radio_opt_snack) {
        $totalfee = absint($totalfee) - absint($snack_pay);
    }



    if ($radio_table == "3") {

        if ($radio == "69000") {
            $dis_con = "110000";
        } elseif ($radio == "89000") {
            $dis_con = "100000";
        } elseif ($radio == "169000") {
            $dis_con = "80000";
        } elseif ($radio == "239000") {
            $dis_con = "50000";
        } elseif ($radio == "249000") {
            $dis_con = "40000";
        } elseif ($radio == "199000") {
            $dis_con = "80000";
        }

        //$mem_discount = absint($period_pay) - absint($dis_con);
        $cart->add_fee('멤버십할인', -$dis_con, false, 'standard');
    }

    if ($pointly) {

        if ($pointly >= $pointz) {
            $pointly = $pointz;
        }

        $cart->add_fee('적립금할인', -$pointly, false, 'standard');
    }

    if ($radioz) {
        $discount_total = absint($totalfee) * (absint($disopt) / 100);
        $cart->add_fee('패키지할인', -$discount_total, false, 'standard');
    }
}

add_action('woocommerce_review_order_before_payment', 'banana_dodam_new_order_form', 35, 1);
function banana_dodam_new_order_form()
{
    echo '
    <div class="checkout-custom-form checkout-boxes" id="meal_kit_form" style="padding-top:30px;">
    <!--이유식선택시뜨는것들-->
    <div class="checkout-custom-wrap">
    <div class="checkout-slide-box" id="checkout-slide">
        <p>주문내역 변경하기</p>
    </div>
    <div class="checkout-slide-down">
        <div class="">
            <div class="flexed opt-parts">
                <p class="flexibled">서비스 변경</p>
                <p class="flexibled opt-pop-btn" id="table-btns">식단은?</p>
            </div>
            <div class="flexed">
                <span id="basic_a_btn" style="margin-right:6px;" class="checkout-membership-btn checkout-btns flexibled">도담식단</span>
                <span id="basic_b_btn" style="margin-left:6px;" class="checkout-membership-btn checkout-btns flexibled">도담플러스식단</span>
            </div>
            <div>
                <span id="prm_btn" class="checkout-membership-btn checkout-btns">도담퍼스트</span>
            </div>
        </div>
        <div class="" style="padding-bottom:30px;">
            <div class="opt-parts">
                <p>시기변경</p>
            </div>
            <div class="flexed">
                <span id="jun_btn" style="margin-right:6px;"class="flexibled checkout-period-btn checkout-btns">준비기<br>4~5M</span>
                <span id="cho_btn"style="margin-left:6px;" class="flexibled checkout-period-btn checkout-btns">초기<br>6~7M</span>
                </div>
                <div class="flexed">
                <span id="jung_btn"style="margin-right:6px;" class="flexibled checkout-period-btn checkout-btns">중기<br>7~10M</span>
                <span id="hu_btn"style="margin-left:6px;" class="flexibled checkout-period-btn checkout-btns">후기<br>10~13M</span>
                </div>
                <div class="flexed">
                <span id="wan_btn"style="margin-right:6px;" class="flexibled checkout-period-btn checkout-btns">유아식준비기<br>13~14M</span>
                <span id="yoo_btn"style="margin-left:6px;" class="flexibled checkout-period-btn checkout-btns">유아기<br>14M~</span>
            </div>
        </div>
    </div>
    </div>

    <div class="">
        <div class="flexed opt-parts">
            <p class="flexibled">추가옵션</p>
            <p class="flexibled opt-pop-btn" id="etc-btns">추가옵션?</p>
        </div>
        <div class="flexed">
            <span id="snack_btn" style="margin-right:6px;" class="flexibled checkout-opt-btn checkout-btns">간식키트</span>
            <span id="set_btn" style="margin-right:6px; margin-left:6px;" class="flexibled checkout-opt-btn checkout-btns">올인원냄비세트</span>
            <span id="pot_btn" style="margin-left:6px;" class="flexibled checkout-opt-btn checkout-btns">이유식냄비16cm</span>
            <!--<span id="" class="flexibled checkout-opt-btn checkout-btns">이유식메이커</span>-->
        </div>
    </div>
</div>';

echo '

<div class="table-pop del-pop">
	<div class="popup">
		<div class="del-pop-title">
			<div class="del-pop-title-img">
			</div>
			<div class="del-pop-title-text">
				<p>옵션추가하기</p>
				<img class="js-deli-closed" src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="Arrow1">
			</div>
		</div>
        <div class="">
        </div>
	</div>
</div>

<div class="etc-pop del-pop">
	<div class="popup">
		<div class="del-pop-title">
			<div class="del-pop-title-img">
			</div>
			<div class="del-pop-title-text">
				<p>추가옵션</p>
				<img class="js-deli-closed" src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="Arrow1">
			</div>
		</div>
        <div class="">
        </div>
	</div>
</div>



';

}
