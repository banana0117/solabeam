<?php

/*

    * 사용자 정보를 받아와서 시기변경을 해주는 페이지, 템플릿으로 만들어서 
    * /periodchange 라는 링크로 만들어주면 됨
    * submit 만들어서 form>action 을 3week_period_action.php 파일을 템플릿으로 사용한 시기변경 완료 페이지로 액션을 걸어주면 됩니다
    * submit 꼭 추가해야함!!

    * 실사용시 userid 에 banana 되어있는걸 삭제하고 진행하면됨
    * 위에 if문의 주석 제거하고 사용
*/

//if( current_user_can( 'subscriber' ) ){
//$userid = get_user_meta( $current_user -> ID, 'username', true );
//$username = get_user_meta( $current_user -> ID, 'first_name', true );
//
//}
//else
//{ 
//echo "<script>alert('로그인 하지 않았거나, 대상자가 아닙니다.');location.href='/';</script>";
//}

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$userid = "banana";

$user_info_query = "SELECT * FROM userbase WHERE userid = '$userid'";
$user_info_result = mysqli_query($mysqli, $user_info_query);
$user_info_row = mysqli_fetch_array($deli_data_result);

$period_str = array();
$table_str = array();
$side_str = array();

$meta_name = $user_info_row[periodstr];
$meta_tables = $user_info_row[tablestr];

$meta_snack = $user_info_row[sidestr];

$meta_nowperiod = $user_info_row[periodstr];

array_push($meta_nowperiod, $period_str);

array_push($meta_tables, $table_str);

array_push($meta_snack, $sidestr);

if (in_array("Z", $period_str)) {
    $period = "준비기";
} elseif (in_array("X", $period_str)) {
    $period = "초기";
} elseif (in_array("T", $period_str)) {
    $period = "중기";
} elseif (in_array("H", $period_str)) {
    $period = "후기";
} elseif (in_array("W", $period_str)) {
    $period = "유아식준비기";
} elseif (in_array("Y", $period_str)) {
    $period = "유아기";
}

if (in_array("A", $table_str)) {
    $table = "균형"; // 균형
} elseif (in_array("B", $table_str)) {
    $table = "더하기"; // 내맘
} elseif (in_array("P", $table_str)) {
    $table = "퍼스트"; // 단백
}


if (in_array("K", $side_str)) {
    $snack = 1;
} else {
    $snack = 0;
}

$baby_name_query = "SELECT * FROM research WHERE userid = '$userid'";
$baby_name_result = mysqli_query($mysqli, $baby_name_result);
$baby_name_row = mysqli_fetch_array($baby_name_result);

$baby_name = $baby_name_row[babyname];

?>

<style>
    input[type="radio"]:checked+label {
        background-color: #666;
    }
</style>

<form method="POST" action="">
    <div>
        <div class="">
            <p><?php echo $meta_name ?>님의<br>지금이유식은?</p>
            <p>도담밀 <?php echo $table ?> <?php echo $period ?> 식단</p>
        </div>
        <div>
            <p>지금 시기 선택하기</p>
        </div>
        <div class="">
            <input type="radio" name="period" id="period_jun" value="Z">
            <label for="period_jun">준비기</label>
            <input type="radio" name="period" id="period_cho" value="X">
            <label for="period_cho">초기</label>
            <input type="radio" name="period" id="period_jung" value="T">
            <label for="period_jung">중기</label>
            <input type="radio" name="period" id="period_hu" value="H">
            <label for="period_hu">후기</label>
            <input type="radio" name="period" id="period_wan" value="W">
            <label for="period_wan">유아식준비기</label>
            <input type="radio" name="period" id="period_yoo" value="Y">
            <label for="period_yoo">유아기</label>
        </div>
        <div>
            <p>지금 식단 선택하기</p>
        </div>
        <div class="">
            <input type="radio" name="table" id="table_1" value="A">
            <label for="table_1">균형식단</label>
            <input type="radio" name="table" id="table_2" value="B">
            <label for="table_2">더하기식단</label>
        </div>

        <div>
            <p>추가옵션</p>
            <p>추가옵션?</p>
        </div>
        <div class="">
            <input type="checkbox" name="opt" id="opt_snack" value="K">
            <label for="opt_snack">간식키트</label>
        </div>
        <div class="">
            <p>선택하신 시기, 식단, 옵션을 바탕으로 다음 번 결제가 이루어 집니다.</p>
        </div>
    </div>

    <div>
    <div class="">
        <p><span><?php echo $baby_name ?></span>이를 위한</p>
        <p>도담밀 <p id="newmem"></p> <p id="newperi"></p> 식단 / 4주</p>
    </div>

    <div class="" id="snack_pop">
        <p>+ 간식키트</p>
    </div>

    </div>


    <div class="">
        <div class="">
            <p>최종 결제금액</p>
            <p id="allpay"></p>
            <p>원</p>
        </div>
        <div class="" id="a_cart">
            <div class="">
                <p>상품금액</p>
                <p id="aprepay"></p>
            </div>
            <div class="" id="snack_pay_a">
                <p id="snacks_a"></p>
                <p>ㄴ 간식키트</p>
            </div>
            <div class="">
                <p>배송비</p>
                <p>10,000원</p>
            </div>
        </div>
        <div class="" id="b_cart">
            <div class="">
                <p>상품금액</p>
                <p id="bprepay"></p>
            </div>
            <div class="">
                <p>옵션금액</p>
                <p id="water_pay"></p>
                <p>ㄴ 육수더하기</p>
                <p id="hanwoo_pay"></p>
                <p>ㄴ 한우더하기</p>
                <p id="super_pay"></p>
                <p>ㄴ 슈퍼푸드더하기</p>
            </div>
            <div class="" id="snack_pay_b">
                <p id="snacks_b">+ 98,000원</p>
                <p>ㄴ 간식키트</p>
            </div>
            <div class="">
                <p>배송비</p>
                <p>10,000원</p>
            </div>
        </div>
    </div>


</form>



<script>
    var period = <?php echo $period ?>;
    var tables = <?php echo $table ?>;
    var snack = <?php echo $snack ?>;


    if (period == "초기") {
        $("#period_cho").prop('checked', true);

    } else if (period == "준비기") {
        $("#period_jun").prop('checked', true);

    } else if (period == "중기") {
        $("#period_jung").prop('checked', true);

    } else if (period == "후기") {
        $("#period_hu").prop('checked', true);

    } else if (period == "유아식준비기") {
        $("#period_wan").prop('checked', true);

    } else {
        $("#period_yoo").prop('checked', true);
    }

    if (tables == "A") {
        $("#table_1").prop('checked', true);
    } else if (tables == "B") {
        $("#table_2").prop('checked', true);
    }

    if (snack == "1") {
        $("#opt_snack").prop('checked', true);
    }

    week_period_change();

    function week_period_change() {

        period = $("input[name='period']:checked").val();
        tables = $("input[name='table']:checked").val();
        snack = $("#opt_snack:checked").val();

        if (period == "X") {
            $("#newperi").html("초기");
            if (tables == "A") {
                var period_pay = "89000";
                var snack_pay = "0";
                $("#newmem").html("균형");
            } else {
                $("#newmem").html("더하기");
                var period_pay = "114000";
                var snack_pay = "0";

                $("#water_pay").html("포함되지 않음");
                $("#hanwoo_pay").html("포함되지 않음");
                $("#super_pay").html("포함되지 않음");
            }

        } else if (period == "Z") {
            $("#newperi").html("준비기");
            if (tables == "A") {
                var period_pay = "69000";
                var snack_pay = "0";
                $("#newmem").html("균형");
            } else {
                $("#newmem").html("더하기");
                var period_pay = "69000";
                var snack_pay = "0";
                $("#water_pay").html("포함되지 않음");
                $("#hanwoo_pay").html("+ 15,000원");
                $("#super_pay").html("+ 10,000원");
            }

        } else if (period == "T") {
            $("#newperi").html("중기");
            if (tables == "A") {
                var period_pay = "169000";
                var snack_pay = "0";
                $("#newmem").html("균형");
            } else {
                $("#newmem").html("더하기");
                var period_pay = "169000";
                var snack_pay = "0";
                $("#water_pay").html("+ 40,000원");
                $("#hanwoo_pay").html("+ 19,000원");
                $("#super_pay").html("+ 10,000원");
            }
        } else if (period == "H") {
            $("#newperi").html("후기");
            if (tables == "A") {
                var period_pay = "239000";
                var snack_pay = "0";
                $("#newmem").html("균형");
            } else {
                $("#newmem").html("더하기");
                var period_pay = "239000";
                var snack_pay = "0";
                $("#water_pay").html("+ 60,000원");
                $("#hanwoo_pay").html("+ 29,000원");
                $("#super_pay").html("+ 20,000원");
            }
        } else if (period == "W") {
            $("#newperi").html("유아식준비기");
            if (tables == "A") {
                var period_pay = "249000";
                var snack_pay = "0";
                $("#newmem").html("균형");
            } else {
                $("#newmem").html("더하기");
                var period_pay = "249000";
                var snack_pay = "0";
                $("#water_pay").html("+ 60,000원");
                $("#hanwoo_pay").html("+ 40,000원");
                $("#super_pay").html("+ 20,000원");
            }
        } else {
            $("#newperi").html("유아기");
            if (tables == "A") {
                var period_pay = "199000";
                var snack_pay = "0";
                $("#newmem").html("균형");
            } else {
                $("#newmem").html("더하기");
                var period_pay = "199000";
                var snack_pay = "0";
                $("#water_pay").html("포함되지 않음");
                $("#hanwoo_pay").html("+ 25,000원");
                $("#super_pay").html("+ 20,000원");
            }
        }

        if ($("#opt_snack").is(":checked")) {
            snack_pay = snack_pay;
            $("#snack_pop").show();
            
            if(tables =="A"){
                $("#snack_pay_a").show();
                $("#snacks_a").html('+ 98,000원');
                
            } else{
                $("#snack_pay_b").show();
                $("#snacks_b").html('+ 98,000원');
            }

        } else {
            snack_pay = 0;
            $("#snack_pop").hide();

            if(tables =="A"){
                $("#snack_pay_a").hide();
                $("#snacks_a").html('');
            } else{
                $("#snack_pay_b").hide();
                $("#snacks_b").html('');
            }

        }

        var sum1 = parseInt(period_pay);
        var sum8 = parseInt(snack_pay);


        var allpay = sum1 + sum8;

        $("#a_cart").html(allpay);
        $("#b_cart").html(allpay);

    }

    $("input[type=radio]").click(function() {
        week_period_change();
    });

    $("input[type=checkbox]").click(function() {
        week_period_change();
    });
</script>