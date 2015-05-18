var order = {};
order.usePromoCode = function (orderId, total_price) {
    var promo_code = $('input[name=promo_code]').val();
    alert(promo_code);
    ajax({
        service: '/order/get-promotion',
        data: {code: promo_code, orderId: orderId},
        type: 'post',
        contentType: 'json',
        loading: true,
        done: function (resp) {
            if (resp.success) {
                var price = resp.data;
                $('#discount-price').html('-$' + (price));
                $('#total-price').html('-$' + (total_price - price));
            } else {
                popup.msg(resp.message);
            }
        }
    });
};
order.submitOrder = function (orderId) {
    if ($('input[name=check_term]').is(":checked")) {
        popup.msg("OK");
        var method = $('input[name=rd_payment]').val();
        var promo_code = $('input[name=promo_code]').val();
        ajax({
            service: '/order/checkout',
            data: {orderId: orderId, promoCode: promo_code, method: method},
            loading: false,
            done: function (resp) {
                if (resp.success) {
                    if(resp.data.payment_method === "PAYPAL"){
                        window.location.replace(baseUrl + "checkout-"+ resp.data.id +".html");
                    }else if(resp.data.payment_method === "MASTER_CARD"){
                        window.location.replace(baseUrl + "checkout-"+ resp.data.id +".html");
                    }else if(resp.data.payment_method === "LATER"){
                        window.location.replace(baseUrl + "checkout-"+ resp.data.id +".html");
                    }
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
    } else {
        popup.msg("Bạn chưa đồng ý với điều khoản của chúng tôi.");
    }
};