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