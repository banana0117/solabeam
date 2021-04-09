<script type="text/javascript" src="/wp-content/themes/storefront-child/jquery/jquery-3.4.1.min.js"></script>

<?php

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

$meta_name = $user_info_row[username];
$meta_tables = $user_info_row[tables];
$meta_super = $user_info_row[super];
$meta_mate = $user_info_row[mate];
$meta_beef = $user_info_row[beef];
$meta_tenloin = $user_info_row[tenloin];
$meta_water = $user_info_row[water];
$meta_weekend = $user_info_row[weekend];
$meta_care = $user_info_row[care];
$meta_snack = $user_info_row[snack];
$meta_safe = $user_info_row[safe];
$meta_nowperiod = $user_info_row[periodstr];

array_push($meta_name,$period_str);
array_push($meta_super,$table_str);
array_push($meta_mate,$table_str);
array_push($meta_tables,$table_str);
array_push($meta_beef,$table_str);
array_push($meta_tenloin,$table_str);
array_push($meta_safe,$table_str);

array_push($meta_care,$sidestr);
array_push($meta_weekend,$sidestr);
array_push($meta_water,$sidestr);
array_push($meta_snack,$sidestr);

if(in_array("Z",$period_str)){
    $period = "준비기";
} elseif (in_array("X",$period_str)){
    $period = "초기";
} elseif (in_array("T",$period_str)){
    $period = "중기";
} elseif (in_array("H",$period_str)){
    $period = "후기";
} elseif (in_array("W",$period_str)){
    $period = "완료기";
} elseif (in_array("Y",$period_str)){
    $period = "유아기";
} 

if(in_array("U", $table_str)){
    $table = "U"; // 균형
} elseif(in_array("I", $table_str)){
    $table = "I"; // 내맘
} elseif(in_array("J", $table_str)){
    $table = "J"; // 단백
} elseif(in_array("D", $table_str)){
    $table = "D"; // 다양
} elseif(in_array("Q", $table_str)){
    $table = "Q"; // 맞춤
} elseif(in_array("E", $table_str)){
    $table = "E"; // 안전
}


if(in_array("S",$table_str)){

    if(in_array("S",$table_str)){
    $super = 1;
} else {
    $super = 0;
}

if(in_array("Z",$table_str)){
    $mate = 1;
} else {
    $mate = 0;
}

if(in_array("A",$table_str)){
    $beef = 1;
} else {
    $beef = 0;
}

if(in_array("B",$table_str)){
    $tenloin = 1;
} else {
    $tenloin = 0;
}

if(in_array("R",$side_str)){
    $water = 1;
} else {
    $water = 0;
}

if(in_array("D",$side_str)){
    $weekend = 1;
} else {
    $weekend = 0;
}

if(in_array("C",$side_str)){
    $care = 1;
} else {
    $care = 0;
}

if(in_array("K",$side_str)){
    $snack = 1;
} else {
    $snack = 0;
}

if(in_array("P",$side_str)){
    $mega = 1;
} else {
    $mega = 0;
}

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
        </div>
        <div>
            <p>지금 현재시기는?</p>
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
            <label for="period_wan">완료기</label>
            <input type="radio" name="period" id="period_yoo" value="Y">
            <label for="period_yoo">유아기</label>
        </div>
        <div>
            <p>현재 식단은?</p>
        </div>
        <div class="">
            <input type="radio" name="table" id="table_1" value="U">
            <label for="table_1">균형식단</label>
            <input type="radio" name="table" id="table_2" value="E">
            <label for="table_2">안전식단</label>
            <input type="radio" name="table" id="table_3" value="J">
            <label for="table_3">단백질식단</label>
            <input type="radio" name="table" id="table_4" value="D">
            <label for="table_4">다양다양식단</label>
            <input type="radio" name="table" id="table_5" value="I">
            <label for="table_5">내맘대로식단</label>
            <input type="radio" name="table" id="table_6" value="Q">
            <label for="table_6">맞춤형식단</label>
        </div>

        <div>
            <p>이런옵션은 어떤가요?</p>
        </div>
        <div class="">
            <input type="checkbox" name="opt[]" id="opt_super" value="S">
            <label for="opt_super"></label>
            <input type="checkbox" name="opt[]" id="opt_mate" value="Q">
            <label for="opt_mate"></label>
            <input type="checkbox" name="opt[]" id="opt_beef" value="H">
            <label for="opt_beef"></label>
            <input type="checkbox" name="opt[]" id="opt_tenloin" value="B">
            <label for="opt_tenloin"></label>
            <input type="checkbox" name="opts[]" id="opt_water" value="W">
            <label for="opt_water"></label>
            <input type="checkbox" name="opts[]" id="opt_weekend" value="E">
            <label for="opt_weekend"></label>
            <input type="checkbox" name="opts[]" id="opt_care" value="R">
            <label for="opt_care"></label>
            <input type="checkbox" name="opts[]" id="opt_snack" value="K">
            <label for="opt_snack"></label>
            <input type="checkbox" name="opts[]" id="opt_mega" value="P">
            <label for="opt_mega"></label>
        </div>
    </div>
</form>

<script>
    var period = <?php echo $period ?>;
    var supers = <?php echo $super ?>;
    var mate = <?php echo $mate ?>;
    var beef = <?php echo $beef ?>;
    var tenloin = <?php echo $tenloin ?>;
    var water = <?php echo $water ?>;
    var weekend = <?php echo $weekend ?>;
    var care = <?php echo $care ?>;
    var tables = <?php echo $table ?>;
    var snack = <?php echo $snack ?>;
    var mega = <?php echo $mega ?>;

    if (period == "X") {
        $("#period_cho").prop('checked', true);

        var period_pay = "89000";
        var super_pay = "15000";
        var mate_pay = "25000";
        var beef_pay = "15000";
        var tenloin_pay = "50000";
        var water_pay = "20000";
        var weekend_pay = "0";
        var care_pay = "35000";
        var snack_pay = "0";
        var mega_pay = "0";

    } else if (period == "Z") {
        $("#period_jun").prop('checked', true);

        var period_pay = "69000";
        var super_pay = "0";
        var mate_pay = "0";
        var beef_pay = "0";
        var tenloin_pay = "0";
        var water_pay = "0";
        var weekend_pay = "0";
        var care_pay = "0";
        var snack_pay = "0";
        var mega_pay = "0";

    } else if (period == "T") {
        $("#period_jung").prop('checked', true);

        var period_pay = "169000";
        var super_pay = "25000";
        var mate_pay = "35000";
        var beef_pay = "19000";
        var tenloin_pay = "59000";
        var water_pay = "40000";
        var weekend_pay = "30000";
        var care_pay = "45000";
        var snack_pay = "98000";
        var mega_pay = "0";

    } else if (period == "H") {
        $("#period_hu").prop('checked', true);

        var period_pay = "239000";
        var super_pay = "35000";
        var mate_pay = "45000";
        var beef_pay = "29000";
        var tenloin_pay = "109000";
        var water_pay = "60000";
        var weekend_pay = "40000";
        var care_pay = "55000";
        var snack_pay = "98000";
        var mega_pay = "0";

    } else if (period == "W") {
        $("#period_wan").prop('checked', true);

        var period_pay = "249000";
        var super_pay = "35000";
        var mate_pay = "45000";
        var beef_pay = "40000";
        var tenloin_pay = "109000";
        var water_pay = "60000";
        var weekend_pay = "45000";
        var care_pay = "55000";
        var snack_pay = "98000";
        var mega_pay = "0";

    } else {
        $("#period_yoo").prop('checked', true);

        var period_pay = "199000";
        var super_pay = "15000";
        var mate_pay = "25000"
        var beef_pay = "25000";
        var tenloin_pay = "109000";
        var water_pay = "0";
        var weekend_pay = "35000";
        var care_pay = "45000";
        var snack_pay = "98000";
        var mega_pay = "0";

    }

    if (tables == "U") {
        $("#table_1").prop('checked', true);
    } else if (tables == "E") {
        $("#table_2").prop('checked', true);
    } else if (tables == "J") {
        $("#table_3").prop('checked', true);
    } else if (tables == "D") {
        $("#table_4").prop('checked', true);
    } else if (tables == "I") {
        $("#table_5").prop('checked', true);
    } else if (tables == "Q") {
        $("#table_6").prop('checked', true);
    }

    if (supers == "1") {
        $("#opt_super").prop('checked', true);
    }
    if (mate == "1") {
        $("#opt_mate").prop('checked', true);
    }
    if (beef == "1") {
        $("#opt_beef").prop('checked', true);
    }
    if (tenloin == "1") {
        $("#opt_tenloin").prop('checked', true);
    }
    if (water == "1") {
        $("#opt_water").prop('checked', true);
    }
    if (weekend == "1") {
        $("#opt_weekend").prop('checked', true);
    }
    if (care == "1") {
        $("#opt_care").prop('checked', true);
    }

    if (snack == "1") {
        $("#opt_snack").prop('checked', true);
    }

    if (mega == "1") {
        $("#opt_mega").prop('checked', true);
    }



    $("input[name=table").click(function() {

        $("input[name=opt]").prop('checked', false);

        var click_table = $(this).val();

        if (click_table == "1") {
            $("#opt_super").prop('disabled', true);
            $("#opt_mate").prop('disabled', true);
            $("#opt_beef").prop('disabled', true);
        } else if (click_table == "2") {
            $("#opt_super").prop('disabled', true);
            $("#opt_mate").prop('disabled', true);
            $("#opt_beef").prop('disabled', true);
        } else if (click_table == "3") {
            $("#opt_super").prop('checked', true);
            $("#opt_super").prop('disabled', true);
            $("#opt_mate").prop('disabled', true);
            $("#opt_beef").prop('disabled', true);
        } else if (click_table == "4") {
            $("#opt_beef").prop('checked', true);
            $("#opt_super").prop('disabled', true);
            $("#opt_mate").prop('disabled', true);
            $("#opt_beef").prop('disabled', true);
        }
        
    });

    var allpay = 

    $("input").change(function(){
        $("#allpay").html(allpay);
    });

</script>