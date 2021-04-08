$("input[name='radio_choice_pop']").hide();
$("input[name='radio_choice_table']").hide();

$("input[name='radio_choice_pop']").each(function() {
    var labelID = $(this).attr("id");
    $("label[for=" + labelID + "]").hide();
});

$("input[name='radio_choice_table']").each(function() {
    var labelID = $(this).attr("id");
    $("label[for=" + labelID + "]").hide();
});


$("#radio_choice_opt_super_0").hide();
$("#radio_choice_opt_mate_0").hide();
$("#radio_choice_opt_water_0").hide();
$("#radio_choice_opt_beef_0").hide();
$("#radio_choice_opt_tenloin_0").hide();
$("#radio_choice_opt_weekend_0").hide();
$("#radio_choice_opt_care_0").hide();
$("#radio_choice_opt_snack_0").hide();
$("#radio_choice_opt_multipot_0").hide();
$("#radio_choice_opt_pot_0").hide();

$("label[for=radio_choice_opt_super_0]").hide();
$("label[for=radio_choice_opt_mate_0]").hide();
$("label[for=radio_choice_opt_water_0]").hide();
$("label[for=radio_choice_opt_beef_0]").hide();
$("label[for=radio_choice_opt_tenloin_0]").hide();
$("label[for=radio_choice_opt_weekend_0]").hide();
$("label[for=radio_choice_opt_care_0]").hide();
$("label[for=radio_choice_opt_snack_0]").hide();

$("label[for=radio_choice_opt_multipot_0]").hide();
$("label[for=radio_choice_opt_pot_0]").hide();

$("#radio_choice_opt_super_15000").hide();
$("#radio_choice_opt_mate_15000").hide();
$("#radio_choice_opt_water_15000").hide();
$("#radio_choice_opt_beef_15000").hide();
$("#radio_choice_opt_tenloin_15000").hide();
$("#radio_choice_opt_weekend_15000").hide();
$("#radio_choice_opt_care_15000").hide();
$("#radio_choice_opt_snack_15000").hide();
$("label[for=radio_choice_opt_super_15000]").hide();
$("label[for=radio_choice_opt_mate_15000]").hide();
$("label[for=radio_choice_opt_water_15000]").hide();
$("label[for=radio_choice_opt_beef_15000]").hide();
$("label[for=radio_choice_opt_tenloin_15000]").hide();
$("label[for=radio_choice_opt_weekend_15000]").hide();
$("label[for=radio_choice_opt_care_15000]").hide();
$("label[for=radio_choice_opt_snack_15000]").hide();
$("#radio_choice_opt_pot_15000").hide();
$("#radio_choice_opt_multipot_15000").hide();
$("label[for=radio_choice_opt_pot_15000]").hide();
$("label[for=radio_choice_opt_multipot_15000]").hide();

$("#jun_btn").on('click', function() {
    $("#radio_choice_pop_69000").prop("checked", true);
    $(".checkout-period-btn").removeClass("checked");
    $(this).addClass("checked");
});
$("#cho_btn").on('click', function() {
    $("#radio_choice_pop_89000").prop("checked", true);
    $(".checkout-period-btn").removeClass("checked");
    $(this).addClass("checked");
});
$("#jung_btn").on('click', function() {
    $("#radio_choice_pop_169000").prop("checked", true);
    $(".checkout-period-btn").removeClass("checked");
    $(this).addClass("checked");
});
$("#hu_btn").on('click', function() {
    $("#radio_choice_pop_239000").prop("checked", true);
    $(".checkout-period-btn").removeClass("checked");
    $(this).addClass("checked");
});
$("#wan_btn").on('click', function() {
    $("#radio_choice_pop_249000").prop("checked", true);
    $(".checkout-period-btn").removeClass("checked");
    $(this).addClass("checked");
});
$("#yoo_btn").on('click', function() {
    $("#radio_choice_pop_199000").prop("checked", true);
    $(".checkout-period-btn").removeClass("checked");
    $(this).addClass("checked");
});

//식단테마선택시 변경점
$("#a_btn").on('click', function() {

    $("#radio_choice_opt_super_0").prop("checked", true);
    $("#radio_choice_opt_mate_0").prop("checked", true);
    $("#radio_choice_opt_water_0").prop("checked", true);
    $("#radio_choice_opt_beef_0").prop("checked", true);
    $("#radio_choice_opt_tenloin_0").prop("checked", true);
    $("#radio_choice_opt_weekend_0").prop("checked", true);
    $("#radio_choice_opt_care_0").prop("checked", true);

    $(".checkout-opt-btn").removeClass("disabled checked");

    $("#super_btn").addClass("disabled");
    $("#mate_btn").addClass("disabled");
    $("#beef_btn").addClass("disabled");

});

$("#b_btn").on('click', function() {


    $("#radio_choice_opt_super_0").prop("checked", true);
    $("#radio_choice_opt_mate_0").prop("checked", true);
    $("#radio_choice_opt_water_0").prop("checked", true);
    $("#radio_choice_opt_beef_0").prop("checked", true);
    $("#radio_choice_opt_tenloin_0").prop("checked", true);
    $("#radio_choice_opt_weekend_0").prop("checked", true);
    $("#radio_choice_opt_care_0").prop("checked", true);

    $(".checkout-opt-btn").removeClass("disabled checked");

    $("#super_btn").addClass("disabled");
    $("#mate_btn").addClass("disabled");
    $("#beef_btn").addClass("disabled");

});

$("#c_btn").on('click', function() {


    $("#radio_choice_opt_super_0").prop("checked", true);
    $("#radio_choice_opt_mate_0").prop("checked", true);
    $("#radio_choice_opt_water_0").prop("checked", true);
    $("#radio_choice_opt_beef_15000").prop("checked", true);
    $("#radio_choice_opt_tenloin_0").prop("checked", true);
    $("#radio_choice_opt_weekend_0").prop("checked", true);
    $("#radio_choice_opt_care_0").prop("checked", true);

    $(".checkout-opt-btn").removeClass("disabled checked");

    $("#super_btn").addClass("disabled");
    $("#mate_btn").addClass("disabled");
    $("#beef_btn").addClass("disabled checked");

});

$("#d_btn").on('click', function() {


    $("#radio_choice_opt_super_15000").prop("checked", true);
    $("#radio_choice_opt_mate_0").prop("checked", true);
    $("#radio_choice_opt_water_0").prop("checked", true);
    $("#radio_choice_opt_beef_0").prop("checked", true);
    $("#radio_choice_opt_tenloin_0").prop("checked", true);
    $("#radio_choice_opt_weekend_0").prop("checked", true);
    $("#radio_choice_opt_care_0").prop("checked", true);

    $(".checkout-opt-btn").removeClass("disabled checked");

    $("#super_btn").addClass("disabled checked");
    $("#beef_btn").addClass("disabled");

});

$("#e_btn").on('click', function() {


    $("#radio_choice_opt_super_0").prop("checked", true);
    $("#radio_choice_opt_mate_0").prop("checked", true);
    $("#radio_choice_opt_water_0").prop("checked", true);
    $("#radio_choice_opt_beef_0").prop("checked", true);
    $("#radio_choice_opt_tenloin_0").prop("checked", true);
    $("#radio_choice_opt_weekend_0").prop("checked", true);
    $("#radio_choice_opt_care_0").prop("checked", true);

});

$("#f_btn").on('click', function() {


    $("#radio_choice_opt_super_15000").prop("checked", true);
    $("#radio_choice_opt_mate_15000").prop("checked", true);
    $("#radio_choice_opt_water_0").prop("checked", true);
    $("#radio_choice_opt_beef_15000").prop("checked", true);
    $("#radio_choice_opt_tenloin_0").prop("checked", true);
    $("#radio_choice_opt_weekend_0").prop("checked", true);
    $("#radio_choice_opt_care_15000").prop("checked", true);

    $(".checkout-opt-btn").removeClass("disabled checked");

    $("#super_btn").addClass("disabled checked");
    $("#mate_btn").addClass("disabled checked");
    $("#beef_btn").addClass("disabled checked");
    $("#care_btn").addClass("disabled checked");

});

$("#super_btn").on('click', function() {

    if ($(this).hasClass("disabled")) {

    } else {

        if ($("#radio_choice_opt_super_15000").prop("checked")) {
            if ($("#radio_choice_table_a").prop("checked")) {
                $("#radio_choice_opt_super_0").prop("checked", true);
            } else if ($("#radio_choice_table_b").prop("checked")) {
                $("#radio_choice_opt_super_0").prop("checked", true);
            } else if ($("#radio_choice_table_c").prop("checked")) {
                $("#radio_choice_opt_super_0").prop("checked", true);
            } else if ($("#radio_choice_table_d").prop("checked")) {
                $("#radio_choice_opt_super_15000").prop("checked", true);
            } else if ($("#radio_choice_table_e").prop("checked")) {
                $("#radio_choice_opt_super_0").prop("checked", true);
            } else if ($("#radio_choice_table_f").prop("checked")) {
                $("#radio_choice_opt_super_0").prop("checked", true);
            }

            $(this).addClass("checked");

        } else {
            if ($("#radio_choice_opt_table_a").prop("checked")) {
                $("#radio_choice_opt_super_0").prop("checked", true);
            } else if ($("#radio_choice_table_b").prop("checked")) {
                $("#radio_choice_opt_super_0").prop("checked", true);
            } else if ($("#radio_choice_table_c").prop("checked")) {
                $("#radio_choice_opt_super_0").prop("checked", true);
            } else if ($("#radio_choice_table_d").prop("checked")) {
                $("#radio_choice_opt_super_15000").prop("checked", true);
            } else if ($("#radio_choice_table_e").prop("checked")) {
                $("#radio_choice_opt_super_15000").prop("checked", true);
            } else if ($("#radio_choice_table_f").prop("checked")) {
                $("#radio_choice_opt_super_0").prop("checked", true);
            }

            $(this).removeClass("checked");

        }

    }
    if ($("#radio_choice_opt_super_15000").prop("checked")) {
        $(this).addClass("checked");
    } else {
        $(this).removeClass("checked");
    }
});

$("#mate_btn").on('click', function() {
    if ($(this).hasClass("disabled")) {

    } else {

        if ($("#radio_choice_opt_mate_15000").is(":checked")) {
            if ($("#radio_choice_table_a").is(":checked")) {
                $("#radio_choice_opt_mate_0").prop("checked", true);
            } else if ($("#radio_choice_table_b").is(":checked")) {
                $("#radio_choice_opt_mate_0").prop("checked", true);
            } else if ($("#radio_choice_table_c").is(":checked")) {
                $("#radio_choice_opt_mate_0").prop("checked", true);
            } else if ($("#radio_choice_table_d").is(":checked")) {
                $("#radio_choice_opt_mate_0").prop("checked", true);
            } else if ($("#radio_choice_table_e").is(":checked")) {
                $("#radio_choice_opt_mate_0").prop("checked", true);
            } else if ($("#radio_choice_table_f").is(":checked")) {
                $("#radio_choice_opt_mate_0").prop("checked", true);
            }
        } else {
            if ($("#radio_choice_opt_table_a").is(":checked")) {
                $("#radio_choice_opt_mate_0").prop("checked", true);
            } else if ($("#radio_choice_table_b").is(":checked")) {
                $("#radio_choice_opt_mate_0").prop("checked", true);
            } else if ($("#radio_choice_table_c").is(":checked")) {
                $("#radio_choice_opt_mate_0").prop("checked", true);
            } else if ($("#radio_choice_table_d").is(":checked")) {
                $("#radio_choice_opt_mate_15000").prop("checked", true);
            } else if ($("#radio_choice_table_e").is(":checked")) {
                $("#radio_choice_opt_mate_0").prop("checked", true);
            } else if ($("#radio_choice_table_f").is(":checked")) {
                $("#radio_choice_opt_mate_15000").prop("checked", true);
            }
        }
    }
    if ($("#radio_choice_opt_mate_15000").prop("checked")) {
        $(this).addClass("checked");
    } else {
        $(this).removeClass("checked");
    }
});

$("#water_btn").on('click', function() {
    if ($(this).hasClass("disabled")) {} else {
        if ($("#radio_choice_opt_water_15000").is(":checked")) {
            $("#radio_choice_opt_water_0").prop("checked", true);
        } else {
            $("#radio_choice_opt_water_15000").prop("checked", true);
        }
    }
    if ($("#radio_choice_opt_water_15000").prop("checked")) {
        $(this).addClass("checked");
    } else {
        $(this).removeClass("checked");
    }
});

$("#tenloin_btn").on('click', function() {
    if ($(this).hasClass("disabled")) {} else {
        if ($("#radio_choice_opt_tenloin_15000").is(":checked")) {
            $("#radio_choice_opt_tenloin_0").prop("checked", true);
        } else {
            $("#radio_choice_opt_tenloin_15000").prop("checked", true);
        }
    }
    if ($("#radio_choice_opt_tenloin_15000").prop("checked")) {
        $(this).addClass("checked");
    } else {
        $(this).removeClass("checked");
    }
});

$("#care_btn").on('click', function() {
    if ($(this).hasClass("disabled")) {} else {
        if ($("#radio_choice_opt_care_15000").is(":checked")) {
            $("#radio_choice_opt_care_0").prop("checked", true);
        } else {
            $("#radio_choice_opt_care_15000").prop("checked", true);
        }
    }
    if ($("#radio_choice_opt_care_15000").prop("checked")) {
        $(this).addClass("checked");
    } else {
        $(this).removeClass("checked");
    }
});


$("#weekend_btn").on('click', function() {

    if ($(this).hasClass("disabled")) {

    } else {
        if ($("#radio_choice_opt_weekend_15000").is(":checked")) {
            $("#radio_choice_opt_weekend_0").prop("checked", true);
        } else {
            $("#radio_choice_opt_weekend_15000").prop("checked", true);
        }
    }
    if ($("#radio_choice_opt_weekend_15000").prop("checked")) {
        $(this).addClass("checked");
    } else {
        $(this).removeClass("checked");
    }
});


$("#snack_btn").on('click', function() {
    if ($(this).hasClass("disabled")) {} else {
        if ($("#radio_choice_opt_snack_15000").is(":checked")) {
            $("#radio_choice_opt_snack_0").prop("checked", true);
        } else {
            $("#radio_choice_opt_snack_15000").prop("checked", true);
        }
    }
    if ($("#radio_choice_opt_snack_15000").prop("checked")) {
        $(this).addClass("checked");
    } else {
        $(this).removeClass("checked");
    }

});


$("#beef_btn").on('click', function() {


    if ($(this).hasClass("disabled")) {

    } else {
        if ($("#radio_choice_opt_beef_15000").is(":checked")) {
            if ($("#radio_choice_table_a").is(":checked")) {
                $("#radio_choice_opt_beef_0").prop("checked", true);
            } else if ($("#radio_choice_table_b").is(":checked")) {
                $("#radio_choice_opt_beef_0").prop("checked", true);
            } else if ($("#radio_choice_table_c").is(":checked")) {
                $("#radio_choice_opt_beef_15000").prop("checked", true);
            } else if ($("#radio_choice_table_d").is(":checked")) {
                $("#radio_choice_opt_beef_0").prop("checked", true);
            } else if ($("#radio_choice_table_e").is(":checked")) {
                $("#radio_choice_opt_beef_0").prop("checked", true);
            } else if ($("#radio_choice_table_f").is(":checked")) {
                $("#radio_choice_opt_beef_15000").prop("checked", true);
            }
        } else {
            if ($("#radio_choice_opt_table_a").is(":checked")) {
                $("#radio_choice_opt_beef_0").prop("checked", true);
            } else if ($("#radio_choice_table_b").is(":checked")) {
                $("#radio_choice_opt_beef_0").prop("checked", true);
            } else if ($("#radio_choice_table_c").is(":checked")) {
                $("#radio_choice_opt_beef_15000").prop("checked", true);
            } else if ($("#radio_choice_table_d").is(":checked")) {
                $("#radio_choice_opt_beef_0").prop("checked", true);
            } else if ($("#radio_choice_table_e").is(":checked")) {
                $("#radio_choice_opt_beef_15000").prop("checked", true);
            } else if ($("#radio_choice_table_f").is(":checked")) {
                $("#radio_choice_opt_beef_15000").prop("checked", true);
            }
        }
    }

    if ($("#radio_choice_opt_beef_15000").prop("checked")) {
        $(this).addClass("checked");
    } else {
        $(this).removeClass("checked");
    }

});

$("#multipot_btn").on('click', function() {
    if ($(this).hasClass("disabled")) {} else {
        if ($("#radio_choice_opt_multipot_15000").is(":checked")) {
            $("#radio_choice_opt_multipot_0").prop("checked", true);
        } else {
            $("#radio_choice_opt_multipot_15000").prop("checked", true);
        }
    }
    if ($("#radio_choice_opt_multipot_15000").prop("checked")) {
        $(this).addClass("checked");
    } else {
        $(this).removeClass("checked");
    }

});

$("#pot_btn").on('click', function() {
    if ($(this).hasClass("disabled")) {} else {
        if ($("#radio_choice_opt_pot_15000").is(":checked")) {
            $("#radio_choice_opt_pot_0").prop("checked", true);
        } else {
            $("#radio_choice_opt_pot_15000").prop("checked", true);
        }
    }
    if ($("#radio_choice_opt_pot_15000").prop("checked")) {
        $(this).addClass("checked");
    } else {
        $(this).removeClass("checked");
    }

});


$("#dtwc_delivery_date").change(function() {

    var date = $("#dtwc_delievery_date").val();
    var newdate = $("#dtwc_delievery_date").val();
    var todate = $("#dtwc_delievery_date").val();
    var week = new Array('일', '월', '화', '수', '목', '금', '토');
    var today = new Date(date).getDay();
    var todays = todate.setDate(todate.getDate() + 1);
    var todayss = new Date(todays).getDay();
    var day = week[today];
    var days = week[todayss];

    date = new Date(date);
    var yyyy = date.getFullYear();
    var mm = date.getMonth();
    var dd = date.getDate();

    newdate.setDate(newdate.getDate() + 21);

    var yyyys = newdate.getFullYear();
    var mms = newdate.getMonth();
    var dds = newdate.getDate();

    $("#deli-start").html(yyyy + '.' + mm + '.' + dd + '(' + day + ') 첫 발송');
    $("#deli-end").html(yyyys + '.' + mms + '.' + dds + '(' + day + ') 종료');
    $("#deli-day").html('매주 ' + day + '요일 발송 매주 ' + days + '요일 수령');
});