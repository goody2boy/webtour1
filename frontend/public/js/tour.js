tour = {};
tour.init = function () {
    $("#money-select").change(function () {
        alert('change');
        tour.changeMoney();
    });
};
tour.changeMoney = function () {
    $("#table-price tbody tr").children().hide();
    var select = $("#money-select option:selected").text();
    $("#price_" + select).children().show();
    $("#price_" + select).show();
};
tour.calculateMoney = function (tourId, numAdult) {
    ajax({
        service: '/order/calculate-price',
        data: {tourId: tourId, numAdult: numAdult},
        done: function (resp) {
            if (resp.success) {
                popup.msg("thanh cong" + resp.data);
            } else {
                popup.msg("that bai" + resp.data);
            }
        }
    });
} 