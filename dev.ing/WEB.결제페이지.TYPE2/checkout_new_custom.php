<?php

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

    echo '<div id="checkout-select" class="basic-only">';
    woocommerce_form_field('radio_choice_dis', $args, $chosen);
    echo '</div>';
    //추천인 아이디는 여기
    echo '<div class=""><div class=""><p>추천인 아이디</p></div><div class=""><input type="text" id="recommend"></div></div>';
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

    echo '<div>';
    woocommerce_form_field('radio_choice_point', $args, $chosen);
    echo '<p>보유중 적립금 '.$pointz.'</p>';
    echo '<script>
    $( "#radio_choice_point" ).change(function() {
        var max = '.$pointz.';
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
//        $period_label = "도담밀";
        $period_label = "도담식단";
        $dis_per = "0";
        //시기별요금제추가
        if ($radio == "69000") {
            $period_label .= ":준비기이유식";
            $period_pay = "69000";
            $water_pay = "0";
            $beef_pay = "0";
            $super_pay = "0";
            $snack_pay = "0";
        } elseif ($radio == "89000") {
            $period_label .= ":초기이유식";
            $period_pay = "89000";
            $water_pay = "15000";
            $beef_pay = "10000";
            $super_pay = "0";
            $snack_pay = "0";
        } elseif ($radio == "169000") {
            $period_label .= ":중기이유식";
            $period_pay = "169000";
            $water_pay = "40000";
            $beef_pay = "19000";
            $super_pay = "10000";
            $snack_pay = "98000";
        } elseif ($radio == "239000") {
            $period_label .= ":후기이유식";
            $period_pay = "239000";
            $water_pay = "60000";
            $beef_pay = "29000";
            $super_pay = "20000";
            $snack_pay = "98000";
        } elseif ($radio == "249000") {
            $period_label .= ":완료기이유식";
            $period_pay = "249000";
            $water_pay = "60000";
            $beef_pay = "40000";
            $snack_pay = "98000";
            $super_pay = "20000";
        } elseif ($radio == "199000") {
            $period_label .= ":유아기유아식";
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
    } elseif ($radio_table == "2") {
        $period_label = "도담플러스식단";
        $dis_per = "0";
        //시기별요금제추가
        if ($radio == "69000") {
            $period_label .= ":준비기이유식";
            $period_pay = "69000";
            $water_pay = "0";
            $beef_pay = "0";
            $snack_pay = "0";
            $super_pay = "0";
        } elseif ($radio == "89000") {
            $period_label .= ":초기이유식";
            $period_pay = "89000";
            $water_pay = "15000";
            $beef_pay = "10000";
            $super_pay = "0";
            $snack_pay = "0";
        } elseif ($radio == "169000") {
            $period_label .= ":중기이유식";
            $period_pay = "169000";
            $water_pay = "40000";
            $beef_pay = "19000";
            $snack_pay = "98000";
            $super_pay = "10000";
        } elseif ($radio == "239000") {
            $period_label .= ":후기이유식";
            $period_pay = "239000";
            $water_pay = "60000";
            $beef_pay = "29000";
            $super_pay = "20000";
            $snack_pay = "98000";
        } elseif ($radio == "249000") {
            $period_label .= ":완료기이유식";
            $period_pay = "249000";
            $water_pay = "60000";
            $beef_pay = "40000";
            $super_pay = "20000";
            $snack_pay = "98000";
        } elseif ($radio == "199000") {
            $period_label .= ":유아기유아식";
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
    } else {
        $period_label = "도담퍼스트";
        if ($radio == "69000") {
            $period_label .= ":준비기이유식";
            $period_pay = "429000";
            $dis_per = "26";
            $snack_pay = "0";
        } elseif ($radio == "89000") {
            $period_label .= ":초기이유식";
            $period_pay = "429000";
            $dis_per = "23";
            $snack_pay = "0";
        } elseif ($radio == "169000") {
            $period_label .= ":중기이유식";
            $period_pay = "429000";
            $dis_per = "19";
            $snack_pay = "98000";
        } elseif ($radio == "239000") {
            $period_label .= ":후기이유식";
            $period_pay = "429000";
            $dis_per = "12";
            $snack_pay = "98000";
        } elseif ($radio == "249000") {
            $period_label .= ":유아식준비기";
            $period_pay = "429000";
            $dis_per = "9";
            $snack_pay = "98000";
        } elseif ($radio == "199000") {
            $period_label .= ":유아기유아식";
            $period_pay = "429000";
            $dis_per = "19";
            $snack_pay = "98000";
        }
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

    if($selectedproduct == "7634"){
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

    if($pointly){

        if($pointly >= $pointz){
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
    <style>
    .flex {padding:10px 0;}
    .flex span {padding:5px; border:1px solid #666; margin:2px;}
    .flex span.checked {background-color:yellow;}
    </style>
    <div class="checkout-custom-form" id="meal_kit_form">
    <!--이유식선택시뜨는것들-->
    <div class="">
        <p>주문내역 변경하기</p>
    </div>
    <div class="">
        <div class="">
            <div class="">
                <p>서비스 변경</p>
                <p>베이직?프리미엄?</p>
            </div>
            <div class="flex">
                <span id="basic_a_btn" class="checkout-membership-btn">도담식단</span>
                <span id="basic_b_btn" class="checkout-membership-btn">도담플러스식단</span>
                <span id="prm_btn" class="checkout-membership-btn">도담퍼스트</span>
            </div>
        </div>

        <div class="">
            <div class="">
                <p>시기변경</p>
            </div>
            <div class="flex">
                <span id="jun_btn" class="checkout-period-btn">준비기 4~5M</span>
                <span id="cho_btn" class="checkout-period-btn">초기 6~7M</span>
                <span id="jung_btn" class="checkout-period-btn">중기 7~10M</span>
                </div>
                <div class="flex">
                <span id="hu_btn" class="checkout-period-btn">후기 10~135M</span>
                <span id="wan_btn" class="checkout-period-btn">유아식준비기 13~14M</span>
                <span id="yoo_btn" class="checkout-period-btn">유아기 14M~</span>
            </div>
        </div>
    </div>

    <div class="">
        <div class="">
            <p>추가옵션</p>
        </div>
        <div class="flex">
            <span id="snack_btn" class="checkout-opt-btn">간식키트</span>
            <span id="set_btn" class="checkout-opt-btn">올인원냄비세트</span>
            <span id="pot_btn" class="checkout-opt-btn">이유식냄비16cm</span>
            <!--<span id="" class="checkout-opt-btn">이유식메이커</span>-->
        </div>
    </div>
</div>';
}
