var order = {};
order.additem = function() {
    var itemId = $("#selectitem").val();
    var id = order.getUrlParameter('id');
    ajax({
        service: '/order/additem',
        data: {id: id, itemId: itemId},
        loading: false,
        done: function(resp) {
            if (resp.success) {
                window.location.href = baseUrl + "dat-hang.html?id=" + resp.data;
            } else {
                popup.msg(resp.message);
            }
        }
    });
};
order.deleteitem = function(itemId) {
    var id = order.getUrlParameter('id');
    popup.confirm("Bạn có chắc chắn muốn xóa sản phẩm này không ?", function() {
        ajax({
            service: '/order/deleteitem',
            data: {id: id, itemId: itemId},
            loading: false,
            done: function(resp) {
                if (resp.success) {
                    if (resp.data == null || resp.data == '') {
                        window.location.href = baseUrl + "dat-hang.html";
                    } else {
                        window.location.href = baseUrl + "dat-hang.html?id=" + resp.data;
                    }
                } else {
                    popup.msg(resp.message);
                }
            }
        });
    });
};
order.checkout = function() {
    var des = '';
    var flag = true;
    if ($('a.g-title').text() != null && $('a.g-title').text() != '') {
        des = 'Mua sản phẩm ' + $('a.g-title').text() + ' với số lượng lần lượt là';
        $.each($('input[name=quantity]'), function() {
            if(!isNaN($(this).val())&& $(this).val()>0){
            des += ' ' + $(this).val();
        }else{
            popup.msg("Số lượng của sản phẩm phải là số và lớn hơn 0");
            flag = false;
            return false;
        }
        });
        if(!flag)
            return false;
    }
    des+=" "+$('td[data-price=price]').text();
    $('input[name=description]').val(des);
    ajaxSubmit({
        service: '/order/save',
        id: 'checkout',
        contentType: 'json',
        loading: true,
        done: function(rs) {
            if (rs.success) {
                popup.msg(rs.message, function() {
                    window.location.href = baseUrl;
                });
            } else {
                popup.msg(rs.message);
            }
        }
    });
}
order.getUrlParameter = function(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++)
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
        {
            return sParameterName[1];
        }
    }
}