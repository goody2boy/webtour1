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
    ajax({
        service: '/order/submitorder',
        data: {tourId: tourId, numAdult: numAdult, numNoChild: numNoChild, numChild: numChild, date: date},
        loading: false,
        done: function (resp) {
            if (resp.success) {
                $(".order-loading").hide();
                window.location.replace(baseUrl + "checkout.html");
            } else {
                if (resp.data === 'NO_LOGIN') {
                    popup.msg("You are not login . Please login to order this tour.");
                    setTimeout(function () {
                        window.location.replace(baseUrl + "login.html");
                    }, 5000);
                } else {
                    popup.msg("Có lỗi xảy ra trong quá trình truyền dữ liệu. ");
                }
            }
        }
    });
};

tour.showPopImage = function (tourId) {
    ajax({
        service: '/tour/get-tour-img',
        data: {id: tourId},
        loading: false,
        type: 'post',
        contentType: 'json',
        done: function (resp) {
            if (resp.success) {
                console.log(resp);
                popupHTML = Fly.template('/diary/popup-img-tour.tpl', resp);
                $('#tour-popup').html(popupHTML);
                $('#overlay-pop').click(function () {
                    $('#tour-popup').children().hide();
                });
                $('#close-pop-btn').click(function () {
                    $('#tour-popup').children().hide();
                });
                $('#tour-popup').children().show();
            } else {
                popup.msg('Tour bạn chọn không có ảnh');
            }
        }
    });
};