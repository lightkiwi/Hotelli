$(document).ready(function () {
    //Documentation http://www.daterangepicker.com/

    $('input[name="dates"]').daterangepicker({
        "linkedCalendars": false,
        "showCustomRangeLabel": false,
        "alwaysShowCalendars": true,
        "startDate": "09/03/2018",
        "endDate": "09/09/2018",
        "opens": "center",
        "applyButtonClasses": "btn-default"
    }, function (start, end, label) {
        console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
    });
});
