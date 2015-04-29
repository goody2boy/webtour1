var order = {};

order.grid = function () {
    layout.title("Quản trị Thông tin order");
    layout.breadcrumb([
        ["Trang chủ", "#index/grid"],
        ["Tour", "#order/grid"],
        ["Danh sách order"]
    ]);

    var search = textUtils.hashParam();
    if (typeof search.page === 'undefined' || eval(search.page) <= 0) {
        search.page = 1;
    }
    if (typeof search.pageSize === 'undefined' || eval(search.page) <= 0) {
        search.pageSize = 100;
    }

    ajax({
        service: '/order/grid',
        data: search,
        loading: true,
        done: function (resp) {
            if (resp.success) {
                console.log('order : ');
                console.log(resp);
                layout.container(Fly.template("/order/grid.tpl", resp));
                setTimeout(function () {
                    viewUtils.initSearch("search");
                    $('input[data-search=create_timeFrom]').timeSelect();
                    $('input[data-search=create_timeTo]').timeSelect();
                    $('input[data-search=date_departureFrom]').timeSelect();
                    $('input[data-search=date_departureTo]').timeSelect();
                }, 300);
                ajax({
                    service: '/user/getall',
                    data: '',
                    done: function (resp) {
                        if (resp.success) {
                            console.log(resp);
                            var selectHtml = '<option value="" >--Chọn User--</option>';
                            $.each(resp.data, function (i) {
                                selectHtml += '<option value="' + this.id + '" >' + this.username + '</option>';
                            });
                            $('select[data-search=user_id]').html(selectHtml);
                        } else {
                            popup.msg(resp.message);
                        }
                    }
                });
                ajax({
                    service: '/tour/getall',
                    data: '',
                    done: function (resp) {
                        if (resp.success) {
                            console.log(resp);
                            var selectHtml = '<option value="" >--Chọn Tour--</option>';
                            $.each(resp.data, function (i) {
                                selectHtml += '<option value="' + this.id + '" >' + this.code + ' - ' + this.title + '</option>';
                            });
                            $('select[data-search=tour_id]').html(selectHtml);
                        } else {
                            popup.msg(resp.message);
                        }
                    }
                });
            } else {
                popup.msg(resp.message);
            }
        }
    });
};

order.remove = function (id) {
    popup.confirm("Bạn có muốn xóa Order này?", function () {
        ajax({
            service: '/order/remove',
            data: {id: id},
            loading: false,
            done: function (resp) {
                if (resp.success) {
                    popup.msg(resp.message);
                    $('tr[rel-data=' + id + ']').addClass('danger');
                    location.reload();
                } else {
                    popup.msg(resp.message);
                }
            }
        });
    });
};

order.changeActive = function (id) {
    var textMsg = "Bạn có muốn hủy kích hoạt tour này?";
    if ($("div[data-key-active='" + id + "'] label").attr('class').search('danger') >= 0) {
        textMsg = "Bạn có muốn kích hoạt tour này?";
    }
    popup.confirm(textMsg, function () {
        ajax({
            service: '/tour/change-active',
            data: {id: id},
            loading: false,
            done: function (resp) {
                if (resp.success) {
                    $("div[data-key-active='" + id + "']").html('<label class="label label-' + (resp.data.status == 1 ? 'success' : 'danger') + '" >' + (resp.data.status == 1 ? 'Hoạt động' : 'Tạm khóa') + '</label><i onclick="tour.changeActive(\'' + id + '\');" style="cursor: pointer; margin-left:5px" class="glyphicon glyphicon-' + (resp.data.status == 1 ? 'check' : 'unchecked') + '" />');
                } else {
                    popup.msg(resp.message);
                }
            }
        });
    });
};

order.edit = function (id) {
//    popup.msg("Chức năng chưa hoàn thiện.");
    var index = $("tr[data-key='" + id + "'] td:nth-child(1)").text();
    ajax({
        service: '/order/get',
        data: {id: id},
        loading: false,
        done: function (resp) {
            if (resp.success) {
                console.log("gia tri resp");
                console.log(resp);
                popup.open('popup-edit-tour', 'Sửa thông tin Order.', Fly.template('/order/add.tpl', resp), [
                    {
                        title: 'Sửa',
                        style: 'btn-primary',
                        fn: function () {
                            ajaxSubmit({
                                service: '/order/edit',
                                id: 'edit-order',
                                contentType: 'json',
                                loading: false,
                                done: function (rs) {
                                    rs.data.index = index;
                                    if (rs.success) {
                                        var html = Fly.template('/tour/tredit.tpl', rs);
//                                            $("tr[data-key='" + id + "']").empty().html(html).addClass('success');
                                        popup.close('popup-edit-tour');
                                        location.reload();
                                    } else {
                                        popup.msg(rs.message);
                                    }
                                }
                            });
                        }
                    },
                    {
                        title: 'Hủy',
                        style: 'btn-default',
                        fn: function () {
                            popup.close('popup-edit-tour');
                        }
                    }
                ]);
                setTimeout(function () {
                    $('input[data-search=date_departure]').timeSelect();
                }, 300);
            } else {
                popup.msg(resp.message);
            }
        }
    });
};

order.showPrice = function (id) {
    ajax({
        service: '/order/get-price',
        data: {id: id},
        loading: false,
        done: function (resp) {
            if (resp.success) {
                console.log("gia tri resp");
                console.log(resp);
                popup.open('popup-show-price', 'Xem thông tin giá Tour.', Fly.template('/tour/pricetable.tpl', resp), [
                    {
                        title: 'ẩn',
                        style: 'btn-default',
                        fn: function () {
                            popup.close('popup-show-price');
                        }
                    }
                ], "modal-lg");
            }
        }
    });
};