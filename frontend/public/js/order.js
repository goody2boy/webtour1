var order = {};
order.usePromoCode = function () {
    var promo_code = $('input[name=promo_code]').val();
    alert(promo_code);
//    ajax({
//        service: '/order/get-promotion',
//        data: {code: promo_code},
//        type: 'post',
//        contentType: 'json',
//        loading: true,
//        done: function (resp) {
//            if (resp.success) {
//                var total_price = $('#total-price').val();
//                var dis_price =
//                        $('#discount-price').val('-$' + dis_price);
//            } else {
//                popup.msg(resp.message);
//            }
//        }
//    });
};