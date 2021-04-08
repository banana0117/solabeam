<?php
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
            'a' => '균형식단',
            'b' => '안전식단',
            'c' => '단백질식단',
            'd' => '다양식단',
            'e' => '내맘대로식단',
            'f' => '맞춤형식단',
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
//////옵션:슈퍼푸드1//////
///////////////////////
add_action('woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice_opt_super', 10, 1);
function bbloomer_checkout_radio_choice_opt_super()
{
    $chosen = WC()->session->get('radio_chosen_opt_super');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_opt_super') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;
    $args = array(
        'type' => 'radio',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            '0' => 'none',
            '15000' => '슈퍼푸드1',
        ),
        'default' => $chosen
    );

    woocommerce_form_field('radio_choice_opt_super', $args, $chosen);
}

add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_opt_super', 10, 1);
function bbloomer_checkout_radio_choice_set_session_opt_super($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_opt_super'])) {
        WC()->session->set('radio_chosen_opt_super', $output['radio_choice_opt_super']);
    }
}

///////////////////////
//////옵션:슈퍼푸드2//////
///////////////////////
add_action('woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice_opt_mate', 10, 1);
function bbloomer_checkout_radio_choice_opt_mate()
{
    $chosen = WC()->session->get('radio_chosen_opt_mate');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_opt_mate') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;

    $args = array(
        'type' => 'radio',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            '0' => 'none',
            '15000' => '슈퍼푸드2',
        ),
        'default' => $chosen
    );
    woocommerce_form_field('radio_choice_opt_mate', $args, $chosen);

}
add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_opt_mate', 10, 1);
function bbloomer_checkout_radio_choice_set_session_opt_mate($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_opt_mate'])) {
        WC()->session->set('radio_chosen_opt_mate', $output['radio_choice_opt_mate']);
    }
}
///////////////////////
//////옵션:고기추가///////
///////////////////////
add_action('woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice_opt_beef', 10, 1);
function bbloomer_checkout_radio_choice_opt_beef()
{
    $chosen = WC()->session->get('radio_chosen_opt_beef');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_opt_beef') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;

    $args = array(
        'type' => 'radio',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            '0' => 'none',
            '15000' => '고기추가',
        ),
        'default' => $chosen
    );

    woocommerce_form_field('radio_choice_opt_beef', $args, $chosen);

}
add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_opt_beef', 10, 1);

function bbloomer_checkout_radio_choice_set_session_opt_beef($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_opt_beef'])) {
        WC()->session->set('radio_chosen_opt_beef', $output['radio_choice_opt_beef']);
    }
}
///////////////////////
//////옵션:육수추가///////
///////////////////////
add_action('woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice_opt_water', 10, 1);
function bbloomer_checkout_radio_choice_opt_water()
{
    $chosen = WC()->session->get('radio_chosen_opt_water');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_opt_water') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;
    $args = array(
        'type' => 'radio',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            '0' => 'none',
            '15000' => '육수추가',
        ),
        'default' => $chosen
    );
    woocommerce_form_field('radio_choice_opt_water', $args, $chosen);

}
add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_opt_water', 10, 1);
function bbloomer_checkout_radio_choice_set_session_opt_water($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_opt_water'])) {
        WC()->session->set('radio_chosen_opt_water', $output['radio_choice_opt_water']);
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
//////옵션:주우말팩///////
///////////////////////
add_action('woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice_opt_weekend', 10, 1);
function bbloomer_checkout_radio_choice_opt_weekend()
{
    $chosen = WC()->session->get('radio_chosen_opt_weekend');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_opt_weekend') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;

    $args = array(
        'type' => 'radio',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            '0' => 'none',
            '15000' => '주말팩',
        ),
        'default' => $chosen
    );

    woocommerce_form_field('radio_choice_opt_weekend', $args, $chosen);

}
add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_opt_weekend', 10, 1);

function bbloomer_checkout_radio_choice_set_session_opt_weekend($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_opt_weekend'])) {
        WC()->session->set('radio_chosen_opt_weekend', $output['radio_choice_opt_weekend']);
    }
}
///////////////////////
//////옵션:케어케어///////
///////////////////////
add_action('woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice_opt_care', 10, 1);
function bbloomer_checkout_radio_choice_opt_care()
{
    $chosen = WC()->session->get('radio_chosen_opt_care');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_opt_care') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;

    $args = array(
        'type' => 'radio',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            '0' => 'none',
            '15000' => '케어프로그램',
        ),
        'default' => $chosen
    );

    woocommerce_form_field('radio_choice_opt_care', $args, $chosen);

}
add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_opt_care', 10, 1);

function bbloomer_checkout_radio_choice_set_session_opt_care($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_opt_care'])) {
        WC()->session->set('radio_chosen_opt_care', $output['radio_choice_opt_care']);
    }
}

///////////////////////
//////옵션:안심변경///////
///////////////////////
add_action('woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice_opt_tenloin', 10, 1);
function bbloomer_checkout_radio_choice_opt_tenloin()
{
    $chosen = WC()->session->get('radio_chosen_opt_tenloin');
    $chosen = empty($chosen) ? WC()->checkout->get_value('radio_choice_opt_tenloin') : $chosen;
    $chosen = empty($chosen) ? '0' : $chosen;

    $args = array(
        'type' => 'radio',
        'class' => array('form-row-wide', 'update_totals_on_change'),
        'options' => array(
            '0' => 'none',
            '15000' => '안심변경',
        ),
        'default' => $chosen
    );

    woocommerce_form_field('radio_choice_opt_tenloin', $args, $chosen);

}
add_action('woocommerce_checkout_update_order_review', 'bbloomer_checkout_radio_choice_set_session_opt_tenloin', 10, 1);

function bbloomer_checkout_radio_choice_set_session_opt_tenloin($posted_data)
{
    parse_str($posted_data, $output);
    if (isset($output['radio_choice_opt_tenloin'])) {
        WC()->session->set('radio_chosen_opt_tenloin', $output['radio_choice_opt_tenloin']);
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
            '0' => '패키지 선택하지 않음',
            '20' => '패키지',
            '30' => '패키지이',
        ),
        'default' => $chosen
    );

    echo '<div id="checkout-popup" class="js-checkout-popup">';
    echo '<div id="checkout-radio">';
    woocommerce_form_field('radio_choice_dis', $args, $chosen);
    echo '</div></div>';
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
    $radio_opt_super = WC()->session->get('radio_chosen_opt_super'); // 슈퍼푸드1
    $radio_opt_mate = WC()->session->get('radio_chosen_opt_mate'); // 슈퍼푸드2
    $radio_opt_beef = WC()->session->get('radio_chosen_opt_beef'); // 고기추가
    $radio_opt_water = WC()->session->get('radio_chosen_opt_water'); // 육수추가
    $radio_opt_tenloin = WC()->session->get('radio_chosen_opt_tenloin'); // 안심변경
    $radio_opt_weekend = WC()->session->get('radio_chosen_opt_weekend'); // 주말팩
    $radio_opt_care = WC()->session->get('radio_chosen_opt_care'); // 케어프로그램
    $radio_opt_multipot = WC()->session->get('radio_chosen_opt_multipot'); // 올인원냄비
    $radio_opt_pot = WC()->session->get('radio_chosen_opt_pot'); // 편수냄비
    $radioz = WC()->session->get('radio_chosen_dis');

    //시기별요금제추가
    if ($radio == "69000") {
        $period_label = "준비기이유식";
    } elseif ($radio == "89000") {
        $period_label = "초기이유식";
    } elseif ($radio == "169000") {
        $period_label = "중기이유식";
    } elseif ($radio == "239000") {
        $period_label = "후기이유식";
    } elseif ($radio == "249000") {
        $period_label = "완료기이유식";
    } elseif ($radio == "199000") {
        $period_label = "유아기";
    }
    //선택식단더하기
    if ($radio_table == "a") {
        $period_label .= ":균형식단";
    } elseif ($radio_table == "b") {
        $period_label .= ":안전식단";
    } elseif ($radio_table == "c") {
        $period_label .= ":단백질식단";
    } elseif ($radio_table == "d") {
        $period_label .= ":다양식단";
    } elseif ($radio_table == "e") {
        $period_label .= ":내맘대로식단";
    } elseif ($radio_table == "f") {
        $period_label .= ":맞춤형식단";
    }

    //옵션별요금
    if ($radio == "69000") {
        $super_pay = "0";
        $mate_pay = "0";
        $beef_pay = "0";
        $water_pay = "0";
        $tenloin_pay = "0";
        $weekend_pay = "0";
        $snack_pay = "0";
        $care_pay = "0";
    } elseif ($radio == "89000") {
        $super_pay = "15000";
        $mate_pay = "15000";
        $beef_pay = "15000";
        $water_pay = "20000";
        $tenloin_pay = "50000";
        $weekend_pay = "0";
        $snack_pay = "0";
        $care_pay = "35000";
    } elseif ($radio == "169000") {
        $super_pay = "25000";
        $mate_pay = "35000";
        $beef_pay = "19000";
        $water_pay = "40000";
        $tenloin_pay = "59000";
        $weekend_pay = "0";
        $snack_pay = "0";
        $care_pay = "45000";
    } elseif ($radio == "239000") {
        $super_pay = "35000";
        $mate_pay = "45000";
        $beef_pay = "29000";
        $water_pay = "60000";
        $tenloin_pay = "109000";
        $weekend_pay = "0";
        $snack_pay = "98000";
        $care_pay = "55000";
    } elseif ($radio == "249000") {
        $super_pay = "35000";
        $mate_pay = "45000";
        $beef_pay = "40000";
        $water_pay = "60000";
        $tenloin_pay = "109000";
        $weekend_pay = "0";
        $snack_pay = "98000";
        $care_pay = "55000";
    } elseif ($radio == "199000") {
        $super_pay = "15000";
        $mate_pay = "25000";
        $beef_pay = "25000";
        $water_pay = "0";
        $tenloin_pay = "0";
        $weekend_pay = "0";
        $snack_pay = "98000";
        $care_pay = "45000";
    }

    //패키지별할인//
    if ($radioz == '0') {
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

    if ($radioz == '3'){
        if ($radio == "69000") {
            $radio = 0;
        } elseif ($radio == "89000") {
            $radio = 0;
        } elseif ($radio == "169000") {
            $radio = 0;
        } elseif ($radio == "239000") {
            $radio = 0;
        } elseif ($radio == "249000") {
            $radio = 0;
        } elseif ($radio == "199000") {
            $radio = 0;
        }
    }

    //시기별식단//
    if ($radio) {
        $cart->add_fee($period_label, $radio);
    }

    //슈퍼푸드1추가금액//
    if ($radio_opt_super) {
        $cart->add_fee('슈퍼푸드1추가', $super_pay);
    }

    //슈퍼푸드2추가금액//
    if ($radio_opt_mate) {
        $cart->add_fee('슈퍼푸드2추가', $mate_pay);
    }

    //고기추가금액//
    if ($radio_opt_beef) {
        $beef_text = "고기추가";
        if ($radio_opt_tenloin) {
            $beef_pay = $beef_pay + $tenloin_pay;
            $beef_text .= ":안심변경";
        }
        $cart->add_fee('고기추가', $beef_pay);
    } else {
        //안심변경추가금액//
        if ($radio_opt_tenloin) {
            $cart->add_fee('안심변경', $tenloin_pay);
        }
    }

    //육수추가금액//
    if ($radio_opt_water) {
        $cart->add_fee('고기추가', $water_pay);
    }

    //간식추가금액//
    if ($radio_opt_snack) {
        $cart->add_fee('간식키트', $snack_pay);
    }

    //주말팩추가금액//
    if ($radio_opt_weekend) {
        $cart->add_fee('주말팩추가', $weekend_pay);
    }

    //케어추가금액//
    if ($radio_opt_care) {
        $cart->add_fee('케어프로그램', $care_pay);
    }

    //멀티팟금액//
    if ($radio_opt_multipot) {
        $cart->add_fee('올인원 냄비세트', $multipot_pay);
    }

    //편수냄비금액//
    if ($radio_opt_pot) {
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


    $discount_total = absint($totalfee) * (absint($radioz) / 100);


    if ($radioz) {
        $cart->add_fee('패키지할인', -$discount_total, false, 'standard');
    }
}

add_action('woocommerce_review_order_before_payment', 'banana_dodam_new_order_form', 35, 1);
function banana_dodam_new_order_form(){
    echo '
    <div>
    <div class="opt-pop js-opt-pop">
    </div>
    <div class="">
        <div class="">
            <p>추가옵션</p>
            <p>추가옵션?</p>
        </div>
        <div class="js-opt-pop-on">
            <div class="dim"></div>
            <div class="">
                <div class="">
                    <p>시기변경</p>
                </div>
                <div class="opt-btn">
                    <div class="flex">
                        <span id="jun_btn" class="checkout-period-btn">준비기</span>
                        <span id="cho_btn" class="checkout-period-btn">초기</span>
                        <span id="jung_btn" class="checkout-period-btn">중기</span>
                    </div>
                    <div class="flex">
                        <span id="hu_btn" class="checkout-period-btn">후기</span>
                        <span id="wan_btn" class="checkout-period-btn">완료기</span>
                        <span id="yoo_btn" class="checkout-period-btn">유아기</span>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="">
                    <p>식단변경</p>
                </div>
                <div class="opt-btn">
                    <div class="flex">
                        <span id="a_btn" class="checkout-table-btn">균형식단</span>
                        <span id="b_btn" class="checkout-table-btn">안전식단</span>
                    </div>
                    <div class="flex">
                        <span id="c_btn" class="checkout-table-btn">단백질식단</span>
                        <span id="d_btn" class="checkout-table-btn">다양식단</span>
                    </div>
                    <div class="flex">
                        <span id="e_btn" class="checkout-table-btn">내맘대로식단</span>
                    </div>
                    <div class="flex">
                        <span id="f_btn" class="checkout-table-btn">맞춤형식단</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="opt-btn">
            <div class="flex">
                <span id="super_btn" class="checkout-opt-btn base-opt-btn">슈퍼푸드1</span>
                <span id="mate_btn" class="checkout-opt-btn base-opt-btn">슈퍼푸드2</span>
                <span id="beef_btn" class="checkout-opt-btn base-opt-btn">고기추가</span>
            </div>
            <div class="flex">
                <span id="water_btn" class="checkout-opt-btn">육수추가</span>
                <span id="mega_btn" class="checkout-opt-btn">메가팩</span>
                <span id="weekend_btn" class="checkout-opt-btn">주말팩</span>
            </div>
            <div class="flex">
                <span id="care_btn" class="checkout-opt-btn">케어프로그램</span>
                <span id="tenloin_btn" class="checkout-opt-btn">한우안심변경</span>
            </div>
            <div class="flex">
                <span id="snack_btn" class="checkout-opt-btn">간식키트</span>
                <span id="multipot_btn" class="checkout-opt-btn">다기능냄비</span>
                <span id="pot_btn" class="checkout-opt-btn">편수냄비</span>
            </div>
        </div>
    </div>
</div>';
}