$(document).ready(function () {
    //Documentation http://www.daterangepicker.com/

    var obj_dates = $('input[name="dates"]');
    var local_date = 'DD/MM/YYYY';

    moment.locale('fr');
    obj_dates.daterangepicker({
        "opens": "center",
        "minDate": moment().format(local_date),
        "applyButtonClasses": "btn-default",
        "autoApply": true,
        "autoUpdateInput": false,
        "isInvalidDate": function (date) {
            var invalid = false;
            $.each(dates, function (key, value) {
                if (dateCheck(value[0], value[1], date.format(local_date))) {
                    invalid = true;
                }
            });
            return invalid
        },
    });

    obj_dates.off('apply.daterangepicker').on('apply.daterangepicker', function (ev, picker) {
        var fDate, lDate, cDate;
        var invalid = false;
        fDate = picker.startDate.format(local_date);
        lDate = picker.endDate.format(local_date);

        $.each(dates, function (key, value) {
            if (dateCheck(fDate, lDate, value[0]) || dateCheck(fDate, lDate, value[1])) {
                invalid = true;
            }
        });

        if (!invalid) {
            $(obj_dates).val(fDate + ' - ' + lDate);
        }
    });

    function dateCheck(from, to, check) {
        var fDate, lDate, cDate;
        fDate = moment(from, local_date).toDate();
        lDate = moment(to, local_date).toDate();
        cDate = moment(check, local_date).toDate();

        if ((cDate <= lDate && cDate >= fDate)) {
            return true;
        }
        return false;
    }
});
