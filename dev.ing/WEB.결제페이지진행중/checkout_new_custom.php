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
    echo '<p>주문 일정 </p>'
    woocommerce_form_field('radio_choice_dis', $args, $chosen);
    echo '</div>';
    //추천인 아이디는 여기
    echo '<div class="checkid"><div class="checkid-inner"><p>추천인 아이디</p></div><div class="recommend-text"><input type="text" id="recommend"></div></div>';
}

add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_dis');

function bbloomer_checkout_radio_choice_set_session_dis($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_dis'])) {
        WC()->session->set('radio_chosen_dis', $output['radio_choice_dis']);
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


    //선택식단더하기
    if ($radio_table == "1") {
        $period_label = "도담밀";
        $period_label .= ":균형식단";
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
        $period_label = "도담밀";
        $period_label .= ":더하기식단";
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
    <div class="checkout-title">
        <p>주문내역 변경하기</p>
    </div>
    <div class="checkout-container">
        <div class="checkout-inner">
            <div class="checkout-inner-title">
                <p>서비스 변경</p>
                <p class="checkout-pop">베이직?프리미엄?</p>
            </div>
            <div class="flex checkout-flex">
                <span id="basic_a_btn" class="checkout-membership-btn">균형식단</span>
                <span id="basic_b_btn" class="checkout-membership-btn">더하기식단</span>
                <span id="prm_btn" class="checkout-membership-btn">퍼스트클래스</span>
            </div>
        </div>                     

        <div class="checkout-time">
            <div class="checkout-time-title">
                <p>시기변경</p>
            </div>
            <div class="flex checkout-flex">
                <span id="jun_btn" class="checkout-period-btn">준비기 4~5M</span>
                <span id="cho_btn" class="checkout-period-btn">초기 6~7M</span>
                <span id="jung_btn" class="checkout-period-btn">중기 7~10M</span>
                <span id="hu_btn" class="checkout-period-btn">후기 10~135M</span>
                <span id="wan_btn" class="checkout-period-btn">유아식준비기 13~14M</span>
                <span id="yoo_btn" class="checkout-period-btn">유아기 14M~</span>
            </div>
        </div>

        </div>		 
		<!-- 팝업 -->
			<div class="change-popup good">
			<div class="change-popup-container">
				<div class="ch-pop-title">
					<p>옵션 추가하기</p>
					<div class="ch-pop-title-img">
						<img src="/wp-content/themes/storefront-child/con3/image/Frame.png" alt="Arrow1">
					</div>
				</div>
				<div class="ch-pop-contents ps20">
					<div class="ch-kit">
						<div class="ch-kit-img">
							<img src="/wp-content/themes/storefront-child/con3/image/change-op01.png" alt="간식키트">
						</div>
						<div class="ch-kit-text">
							<span>간식키트</span>
							<span>매주 1회 배송 / 메뉴 2팩</span>
							<p>부족한 영양분을 채우고 먹는 즐거움을 배우는 간식을 도담밀 간식키트로 직접 만들어 주세요.</p>
						</div>
					</div>
					<div class="ch-kit">
						<div class="ch-kit-img">
							<img src="/wp-content/themes/storefront-child/con3/image/change-op02.png" alt="간식이지키트">
						</div>
						<div class="ch-kit-text">
							<span>간식이지키트</span>
							<span>매주 1회 배송 / 메뉴 2팩</span>
							<p>누구나 쉽고 편하게 홈메이드 간식을 만들 수 있도록 기본 간식 키트보다 더 쉬운 레시피로 구성되어 있어요.</p>
						</div>
					</div>
					<div class="ch-kit">
						<div class="ch-kit-img">
							<img src="/wp-content/themes/storefront-child/con3/image/change-op03.png" alt="올인원 냄비 세트">
						</div>
						<div class="ch-kit-text">
							<span>올인원 냄비 세트</span>
							<span>핑크컬러</span>
							<p>통5중 304스테인리스 소재로 만든 다기능 프리미엄 이유식냄비로 안심하고 우리 아기 이유식을 만들어 주세요.</p>
						</div>
					</div>
					<div class="ch-kit">
						<div class="ch-kit-img">
							<img src="/wp-content/themes/storefront-child/con3/image/change-op04.png" alt="이유식">
						</div>
						<div class="ch-kit-text">
							<span>도담밀 이유식 냄비 16cm</span>
							<span></span>
							<p>통5중 304 스테인리스 소재로 만든 16cm 이유식용 냄비로 안전은 기본! 가볍고 편리한 사용이 가능합니다.</p>
						</div>
					</div>
					<div class="ch-kit">
						<div class="ch-kit-img">
							<img src="/wp-content/themes/storefront-child/con3/image/change-op05.png" alt="웰컴">
						</div>
						<div class="ch-kit-text">
							<span>도담밀 웰컴 키트</span>
							<span></span>
							<p>특정 재료 거부가 발생하거나, 변비, 감기 등 다양한 증상이 생겼을 때, 영양을 유지하면서 아기의 상황에 맞춰 식단을 변경할 수 있는 옵션</p>
						</div>
					</div>
					<div class="ch-kit">
						<div class="ch-kit-img">
							<img src="/wp-content/themes/storefront-child/con3/image/change-op06.png" alt="메이커">
						</div>
						<div class="ch-kit-text">
							<span>도담밀 이유식 메이커</span>
							<span></span>
							<p>특정 재료 거부가 발생하거나, 변비, 감기 등 다양한 증상이 생겼을 때, 영양을 유지하면서 아기의 상황에 맞춰 식단을 변경할 수 있는 옵션</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	<div class="checkout-opt">
		<div class="checkout-opt-title">
			<p>추가옵션</p>
			<p class="checkout-opt-pop>추가옵션?></p>
		</div>
		<div class="flex checkout-opt-flex">
			<span id="snack_btn" class="checkout-opt-btn">간식키트</span>
			<span id="set_btn" class="checkout-opt-btn">올인원냄비세트</span>
			<span id="pot_btn" class="checkout-opt-btn">이유식냄비16cm</span>
			<!--<span id="" class="checkout-opt-btn">이유식메이커</span>-->
		</div>
	</div>
</div>';
}
