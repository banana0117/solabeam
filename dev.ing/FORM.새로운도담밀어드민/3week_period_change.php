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

$meta_name = $user_info_row[username];
$meta_tables = $user_info_row[tables];
$meta_super = $user_info_row[super];
$meta_mate = $user_info_row[mate];
$meta_beef = $user_info_row[beef];
$meta_tenloin = $user_info_row[tenloin];
$meta_water = $user_info_row[water];
$meta_weekend = $user_info_row[weekend];
$meta_care = $user_info_row[care];
$meta_nowperiod = $user_info_row[nowperiod];

if (strpos($meta_tables, "T") !== false) {
    $period = "중기";
} elseif (strpos($meta_tables, "H") !== false) {
    $period = "후기";
} elseif (strpos($meta_tables, "W") !== false) {
    $period = "완료기";
} elseif (strpos($meta_tables, "Y") !== false) {
    $period = "유아기";
} elseif (strpos($meta_tables, "Z") !== false) {
    $period = "준비기";
} elseif (strpos($meta_tables, "X") !== false) {
    $period = "초기";
}

if (strpos($meta_tables, "N")) {
    $table = "1"; // 균형
} elseif (strpos($meta_tables, "S")) {
    $table = "2"; // 안전
} elseif (strpos($meta_tables, "C")) {
    $table = "3"; // 다양
} elseif (strpos($meta_tables, "M")) {
    $table = "4"; // 단백질
}


if (empty($meta_super)) {
    $super = 0;
} else {
    $super = 1;
}

if (empty($meta_mate)) {
    $mate = 0;
} else {
    $mate = 1;
}

if (empty($meta_beef)) {
    $beef = 0;
} else {
    $beef = 1;
}

if (empty($meta_tenloin)) {
    $tenloin = 0;
} else {
    $tenloin = 1;
}

if (empty($meta_water)) {
    $water = 0;
} else {
    $water = 1;
}

if (empty($meta_weekend)) {
    $weekend = 0;
} else {
    $weekend = 1;
}

if (empty($meta_care)) {
    $care = 0;
} else {
    $care = 1;
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
            <input type="radio" name="table" id="table_1" value="1">
            <label for="table_1">식단1</label>
            <input type="radio" name="table" id="table_2" value="2">
            <label for="table_2">식단2</label>
            <input type="radio" name="table" id="table_3" value="3">
            <label for="table_3">식단3</label>
            <input type="radio" name="table" id="table_4" value="4">
            <label for="table_4">식단4</label>
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

    if (period == "초기") {
        $("#period_cho").prop('checked', true);
    } else if (period == "준비기") {
        $("#period_jun").prop('checked', true);
    } else if (period == "중기") {
        $("#period_jung").prop('checked', true);
    } else if (period == "후기") {
        $("#period_hu").prop('checked', true);
    } else if (period == "완료기") {
        $("#period_wan").prop('checked', true);
    } else {
        $("#period_yoo").prop('checked', true);
    }

    if (tables == "1") {
        $("#table_1").prop('checked', true);
    } else if (tables == "2") {
        $("#table_2").prop('checked', true);
    } else if (tables == "3") {
        $("#table_3").prop('checked', true);
    } else if (tables == "4") {
        $("#table_4").prop('checked', true);
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
</script>