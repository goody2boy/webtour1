var order = {};

order.grid = function () {
    layout.title("Quản trị Thông tin tour");
    layout.breadcrumb([
        ["Trang chủ", "#index/grid"],
        ["Tour", "#tour/grid"],
        ["Danh sách tour"]
    ]);

    var search = textUtils.hashParam();
    if (typeof search.page === 'undefined' || eval(search.page) <= 0) {
        search.page = 1;
    }
    if (typeof search.pageSize === 'undefined' || eval(search.page) <= 0) {
        search.pageSize = 100;
    }

    ajax({
        service: '/tour/grid',
        data: search,
        done: function (resp) {
            if (resp.success) {
                layout.container(Fly.template("/tour/grid.tpl", resp));
                setTimeout(function () {
                    viewUtils.initSearch("search");
                    $('input[data-search=createTime]').timeSelect();
                    $('input[data-search=createTimeTo]').timeSelect();
                    $('input[data-search=updateTime]').timeSelect();
                    $('input[data-search=updateTimeTo]').timeSelect();
                }, 300);
                ajax({
                    service: '/city/get-all',
                    data: '',
                    done: function (resp) {
                        if (resp.success) {
                            var selectHtml = '<option value="" >--Chọn Thành phố--</option>';
                            $.each(resp.data, function (i) {
                                selectHtml += '<option value="' + this.id + '" >' + this.name + '</option>';
                            });
                            $('select[data-search=city]').html(selectHtml);
                        } else {
                            popup.msg(resp.message);
                        }
                    }
                });
                ajax({
                    service: '/category/get-all',
                    data: '',
                    done: function (resp) {
                        if (resp.success) {
                            var selectHtml = '<option value="" >--Chọn Tour Type--</option>';
                            $.each(resp.data, function (i) {
                                selectHtml += '<option value="' + this.id + '" >' + this.name + '</option>';
                            });
                            $('select[data-search=tourType]').html(selectHtml);
                        } else {
                            popup.msg(resp.message);
                        }
                    }
                });
                setTimeout(function () {
                    editor("descriptionText", {});
                });
            } else {
                popup.msg(resp.message);
            }
        }
    });

};

order.remove = function (id) {
    popup.confirm("Bạn có muốn xóa Tour này?", function () {
        ajax({
            service: '/tour/remove',
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
    var index = $("tr[data-key='" + id + "'] td:nth-child(1)").text();
    ajax({
        service: '/tour/get',
        data: {id: id},
        loading: false,
        done: function (resp) {
            if (resp.success) {
                console.log("gia tri resp");
                console.log(resp);
                popup.open('popup-edit-tour', 'Sửa thông tin Tour.', Fly.template('/tour/add.tpl', resp), [
                    {
                        title: 'Sửa',
                        style: 'btn-primary',
                        fn: function () {
                            ajaxSubmit({
                                service: '/tour/add',
                                id: 'add-tour',
                                contentType: 'json',
                                loading: false,
                                done: function (rs) {
                                    rs.data.index = index;
                                    if (rs.success) {
                                        var html = Fly.template('/tour/tredit.tpl', rs);
//                                            $("tr[data-key='" + id + "']").empty().html(html).addClass('success');
                                        popup.close('popup-edit-tour');
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
                ], "modal-lg");
                setTimeout(function () {
                    $('input[data-info=startTime]').timeSelect();
                    $('input[data-info=endTime]').timeSelect();
                }, 300);
                ajax({
                    service: '/city/get-all',
                    data: '',
                    done: function (resp1) {
                        if (resp1.success) {
                            var selectHtml = '<option value="" >--Chọn Thành phố--</option>';
                            $.each(resp1.data, function (i) {
                                selectHtml += '<option ' + (this.id === resp.data.id ? 'selected' : '') + ' value="' + this.id + '" >' + this.name + '</option>';
                            });
                            $('select[data-update=city_id]').html(selectHtml);
                        } else {
                            popup.msg(resp1.message);
                        }
                    }
                });
                ajax({
                    service: '/category/get-all',
                    data: '',
                    done: function (resp1) {
                        if (resp1.success) {
                            var selectHtml = '<option value="" >--Chọn Tour Type--</option>';
                            $.each(resp1.data, function (i) {
                                selectHtml += '<option value="' + this.id + '" >' + this.name + '</option>';
                            });
                            $('select[data-update=tourType]').html(selectHtml);
                            var gotCateIds = resp.data.category_ids;
                            var selectedArr = gotCateIds.substring(0, gotCateIds.length - 1).split(",");
                            $('select[data-update=tourType]').val(selectedArr);
                        } else {
                            popup.msg(resp1.message);
                        }
                    }
                });
            } else {
                popup.msg(resp.message);
            }
        }
    });
};

order.showPrice = function (id) {
    ajax({
        service: '/tour/get-price',
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