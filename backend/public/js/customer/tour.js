var tour = {};

tour.grid = function () {
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

tour.remove = function (id) {
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

tour.changeActive = function (id) {
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

tour.editDetail = function (id) {
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
                                    if (rs.success) {
                                        $("tr[data-key='" + id + "']").addClass('success');
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

tour.showPrice = function (id) {
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

tour.editPrice = function (id) {
    ajax({
        service: '/tour/get-price',
        data: {id: id},
        loading: false,
        done: function (resp) {
            if (resp.success) {
                popup.open('popup-edit-price', 'Sửa giá Tour.', Fly.template('/tour/priceedit.tpl', resp), [
                    {
                        title: 'Xác nhận',
                        style: 'btn-private',
                        fn: function () {
                            var price_1 = $('input[name=price_1]').val();
                            var price_2 = $('input[name=price_2]').val();
                            var price_3 = $('input[name=price_3]').val();
                            var price_4 = $('input[name=price_4]').val();
                            var price_5 = $('input[name=price_5]').val();
                            var price_6 = $('input[name=price_6]').val();
                            ajax({
                                service: '/tour/edit-price',
                                data: {id: id, price_1: price_1, price_2: price_2, price_3: price_3, price_4: price_4, price_5: price_5, price_6: price_6},
                                contentType: 'json',
                                type: 'post',
                                loading: false,
                                done: function (resp1) {
                                    if (resp1.success) {
                                        console.log("gia tri resp");
                                        console.log(resp1);
                                        popup.close('popup-edit-price');
                                    } else {
                                        console.log(resp1);
                                        popup.msg(resp1.message);
                                    }
                                }
                            });
                        }
                    },
                    {
                        title: 'Hủy',
                        style: 'btn-default',
                        fn: function () {
                            popup.close('popup-edit-price');
                        }
                    }
                ], "modal-lg");
            }
        }
    });
};
tour.add = function () {
    popup.open('popup-edit-tour', 'Thêm Tour mới.', Fly.template('/tour/add.tpl', null), [
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
                        if (rs.success) {
                            $("tr[data-key='" + id + "']").addClass('success');
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
                    selectHtml += '<option ' + ' value="' + this.id + '" >' + this.name + '</option>';
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
            } else {
                popup.msg(resp1.message);
            }
        }
    });
};
tour.addLocation = function (){
  $('#location-table').addClass('col-sm-6');
  $('#location-editPnl').addClass('col-sm-6');
  htmlform = Fly.template('/tour/editlocationform.tpl', null);
  $('#location-editPnl').html(htmlform);
  
};
tour.editLocation = function (id) {
    ajax({
        service: '/tour/get-location',
        data: {id: id},
        loading: false,
        done: function (resp) {
            if (resp.success) {
                console.log("gia tri resp locations");
                console.log(resp);
                popup.open('popup-edit-tourlocation', 'Xem các địa điểm trong tour.', Fly.template('/tour/editlocation.tpl', resp), [
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