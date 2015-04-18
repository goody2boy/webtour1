tour = {};
tour.changeMoney = function () {
    $("#table-price tbody tr").children().hide();
    var select = $("#money-select option:selected").text();
    $("#price_" + select).children().show();
    $("#price_" + select).show();
};
tour.calculateMoney = function (tourId) {
    $(".order-loading").show();
    var numAdult = $("#num-adult").val();
    ajax({
        service: '/order/calculate-price',
        data: {tourId: tourId, numAdult: numAdult},
        loading: false,
        done: function (resp) {
            if (resp.success) {
                $("#order-form").children().hide();
                var dateorder = $('input[name=dateorder]').val();
                var numNoChild = $("#num-nochild").val();
                var numChild = $("#num-child").val();
                var data = {
                    dateorder: dateorder,
                    tourId: tourId,
                    adult: numAdult,
                    nochild: numNoChild,
                    child: numChild,
                    price: resp.data
                };
                resp.data = data;
                tour.ShowTotalFee(resp);
                $(".order-loading").hide();
            } else {
                popup.msg("that bai" + resp.data);
            }
        }
    });

};

tour.ShowTotalFee = function (data) {
    $("#order-form").html("");
    var htmlForm = Fly.template("/order/totalfee.tpl", data);
    $("#order-form").html(htmlForm);
};

tour.ShowBookingInput = function (tourId) {
    var data = {tourId: tourId};
    var input = {};
    input.data = data;
    $("#order-form").html("");
    var htmlForm = Fly.template("/order/bookinginput.tpl", input);
    $("#order-form").html(htmlForm);
};

tour.submitOrder = function (tourId, numAdult, numNoChild, numChild, date) {
    $(".order-loading").show();
//    var numAdult = $("#num-adult").val();
//    var dateorder = $('input[name=dateorder]').val();
//    var numNoChild = $("#num-nochild").val();
//    var numChild = $("#num-child").val();
    ajax({
        service: '/order/submitorder',
        data: {tourId: tourId, numAdult: numAdult, numNoChild: numNoChild, numChild: numChild, date: date},
        loading: false,
        done: function (resp) {
            if (resp.success) {
                $(".order-loading").hide();
                window.location.replace(baseUrl + "checkout.html");
            } else {
                popup.msg("that bai" + resp.data);
            }
        }
    });
};