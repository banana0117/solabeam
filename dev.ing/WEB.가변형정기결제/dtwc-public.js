// 이거는 FTP에 wp-content/plugins/delievery-times-for-woocommerce/public/js 에 덮어쓰시면 됩니다 다른 수정할 건 없어요

jQuery(document).ready(function($) {
    var deliveryDays = dtwc_settings.deliveryDays;
    var weekDays = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
    var deliveryTimes = dtwc_settings.deliveryTimes;
    var prepDays = dtwc_settings.minDate;

    function minutes_with_leading_zeros(dt) {
        return (dt.getMinutes() < 10 ? '0' : '') + dt.getMinutes();
    }

    function hours_with_leading_zeros(dt) {
        return (dt.getHours() < 10 ? '0' : '') + dt.getHours();
    }

    var d = new Date();
    var curr_hour = hours_with_leading_zeros(d);
    var curr_min = minutes_with_leading_zeros(d);
    var currentTime = curr_hour + ":" + curr_min;

    if (0 == prepDays) {
        if (deliveryTimes.some(el => el > currentTime)) {
            var minDate = $.datepicker.formatDate('yy-mm-dd', new Date());
        } else {
            var minDate = new Date((new Date()).valueOf() + 1000 * 3600 * 24);
            var minDate = $.datepicker.formatDate('yy-mm-dd', minDate);
        }
    } else {
        var minDate = dtwc_settings.minDate;
    }

    $('#dtwc_delivery_date').datepicker({
        minDate: minDate,
        maxDate: dtwc_settings.maxDays,
        showAnim: 'fadeIn',
        dateFormat: 'yy-mm-dd',
        dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
        firstDay: dtwc_settings.firstDay,
        beforeShowDay: function(date) {
            var currentWeekday = weekDays[date.getDay()];
            if (currentWeekday in deliveryDays) {
                // So enable the date here by returning an array.
                return [true, "dtwc_date_available", "This date is available"];
            }
            return [false, "dtwc_date_unavailable", "This date is unavailable"];

        }

    });
});

jQuery(document).ready(function($) {
    $('#dtwc_delivery_date').change(function() {
        var chosenDate = $(this).val();
        //바나나
        var date = chosenDate;
        d = new Date(date);

        var yyyy = d.getFullYear();
        var mm = d.getMonth() + 1;
        var dd = d.getDate();
        var label = d.getDay();
        var week = new Array('일', '월', '화', '수', '목', '금', '토');

        var todayz = new Date(d).getDay();
        var daylabel = week[todayz];

        $("#deli-start").html(yyyy + '.' + mm + '.' + dd + '(' + daylabel + ') 첫 발송');

        var b = new Date(date);
        b.setDate(b.getDate() + 1);

        var todays = new Date(b).getDay();
        var todaylabel = week[todays];

        d.setDate(d.getDate() + 21);
        yyyy = d.getFullYear();
        mm = d.getMonth() + 1;
        dd = d.getDate();

        $("#deli-end").html(yyyy + '.' + mm + '.' + dd + '(' + daylabel + ') 마지막 발송');
        $("#deli-day").html('매주 ' + daylabel + '요일 발송 매주 ' + todaylabel + '요일 수령');

        //바나나
        var today = $.datepicker.formatDate('yy-mm-dd', new Date());

        var x = 30; // minutes interval
        var times = []; // time array
        var tt = 0; // start time

        // Create times array.
        for (var i = 0; tt < 24 * 60; i++) {
            var hh = Math.floor(tt / 60);
            var mm = (tt % 60);
            // Time added to array.
            times[i] = ('0' + (hh % 12)).slice(-2) + ':' + ('0' + mm).slice(-2);
            // Add 30 minutes to time.
            tt = tt + x;
        }

        // Delivery date is today.
        if (today === chosenDate) {

            var deliveryTimes = dtwc_settings.deliveryTimes;
            var result = [];

            for (var t in deliveryTimes) {
                result.push(deliveryTimes[t]);
            }

            // Loop through times.
            result.forEach(dateCheck);
        }

        // Chosen date is AFTER today.
        if (today < chosenDate) {

            var deliveryTimes = dtwc_settings.deliveryTimes;
            var result = [];

            for (var t in deliveryTimes) {
                result.push(deliveryTimes[t]);
            }

            // Loop through times.
            result.forEach(resetTimes);
        }

        // Prep time check.
        function dateCheck(item) {
            // Update delivery times if selected date is today.
            if (item <= dtwc_settings.prepTime) {
                // Remove specific time from available options.
                $("#dtwc_delivery_time option[value='" + item + "']").hide();
            } else {
                // Add specific times to available options.
                $("#dtwc_delivery_time option[value='" + item + "']").show();
            }
        }

        // Delivery times reset.
        function resetTimes(item) {
            $("#dtwc_delivery_time option[value='" + item + "']").show();
        }

    });
});