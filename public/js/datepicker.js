$(document).ready(function () {
    const urlParams = new URLSearchParams(window.location.search);
    const urlStartDate = urlParams.get('startDate');
    const urlEndDate = urlParams.get('endDate');

    const timezoneOffset = moment().utcOffset() / 60 * -1;

    const startDate = urlStartDate ? moment(urlStartDate).subtract(timezoneOffset, "hours").format("YYYY-MM-DD HH:mm:ss") : null;
    const endDate = urlEndDate ? moment(urlEndDate).subtract(timezoneOffset, "hours").format("YYYY-MM-DD HH:mm:ss") : null;

    const defaultDate = moment().format("YYYY-MM-DD");
    const defaultDateWithTime = moment().format("YYYY-MM-DD HH:mm:ss");

    const datepickerInitialStartDate = startDate ?? defaultDate;
    const datepickerInitialEndDate = endDate ?? defaultDate;
    const datepickerInitialDateSingleWithTime = defaultDateWithTime;

    const opens = 'left';
    const drops = 'down';

    // Date range picker
    $(".daterangepickerinput").daterangepicker({
        showDropdowns: true,
        autoApply: true,
        locale: {
            format: "YYYY/MM/DD",
            fromLabel: "From",
            toLabel: "To",
            customRangeLabel: "Custom",
            firstDay: 1,
        },
        ranges: {
            Today: [moment(), moment()],
            Yesterday: [
                moment().subtract(1, "days"),
                moment().subtract(1, "days"),
            ],
            "Last 7 Days": [moment().subtract(6, "days"), moment()],
            "Last 30 Days": [moment().subtract(29, "days"), moment()],
            "This Month": [moment().startOf("month"), moment().endOf("month")],
            "Last Month": [
                moment().subtract(1, "month").startOf("month"),
                moment().subtract(1, "month").endOf("month"),
            ],
        },
        startDate: datepickerInitialStartDate,
        endDate: datepickerInitialEndDate,
        opens: opens,
        drops: drops,
    });

    // Single date picker
    $(".datesinglepickerinput").daterangepicker({
        showDropdowns: true,
        autoApply: true,
        locale: {
            format: "YYYY/MM/DD",
            firstDay: 1,
        },
        singleDatePicker: true,
        startDate: datepickerInitialStartDate,
        endDate: datepickerInitialStartDate,
        opens: opens,
        drops: drops,
    });

    // Single date picker with time
    $(".datesinglepickerwithtimeinput").daterangepicker({
        showDropdowns: true,
        autoApply: true,
        locale: {
            format: "YYYY/MM/DD HH:mm:ss",
            firstDay: 1,
        },
        singleDatePicker: true,
        timePicker: true,
        timePicker24Hour: true,
        startDate: datepickerInitialDateSingleWithTime,
        endDate: datepickerInitialDateSingleWithTime,
        opens: opens,
        drops: drops,
    });
});
