var money = {};

money.grid = function () {
    layout.title("Quản trị Thông tin tiền tệ");
    layout.breadcrumb([
        ["Trang chủ", "#index/grid"],
        ["Money", "#money/grid"],
        ["Danh sách tiền tệ"]
    ]);

    var search = textUtils.hashParam();
    if (typeof search.page == 'undefined' || eval(search.page) <= 0) {
        search.page = 1;
    }
    if (typeof search.pageSize == 'undefined' || eval(search.page) <= 0) {
        search.pageSize = 100;
    }

    ajax({
        service: '/money/grid',
        data: search,
        done: function (resp) {
            if (resp.success) {
                layout.container(Fly.template("/money/grid.tpl", resp));
                setTimeout(function () {
                    viewUtils.initSearch("search");
                    $('input[data-search=createTime]').timeSelect();
                    $('input[data-search=createTimeTo]').timeSelect();
                    $('input[data-search=updateTime]').timeSelect();
                    $('input[data-search=updateTimeTo]').timeSelect();
                }, 300);
            } else {
                popup.msg(resp.message);
            }
        }
    });

};

money.remove = function (id) {
    popup.confirm("Bạn có muốn xóa loại tiền tệ này?", function () {
        ajax({
            service: '/money/remove',
            data: {id: id},
            loading: false,
            done: function (resp) {
                if (resp.success) {
                    $('tr[rel-data=' + id + ']').addClass('danger');
                    location.reload();
                } else {
                    alert("fal rooi nha ");
                    popup.msg(resp.message);
                }
            }
        });
    });
};

money.changeActive = function (id) {
    popup.confirm("Bạn có muốn hủy kích hoạt loại tiền tệ này?", function () {
        ajax({
            service: '/money/change-active',
            data: {id: id},
            loading: false,
            done: function (resp) {
                if (resp.success) {
                    $("div[data-key-active='" + id + "']").html('<label class="label label-' + (resp.data.active == 1 ? 'success' : 'danger') + '" >' + (resp.data.active == 1 ? 'Hoạt động' : 'Tạm khóa') + '</label><i onclick="money.changeActive(\'' + id + '\');" style="cursor: pointer; margin-left:5px" class="glyphicon glyphicon-' + (resp.data.active == 1 ? 'check' : 'unchecked') + '" />');
                } else {
                    alert("fal rooi nha ");
                    popup.msg(resp.message);
                }
            }
        });
    });
};

money.edit = function (id){
    var index = $("tr[data-key='" + id + "'] td:nth-child(1)").text();
    ajax({
        service: '/money/get',
        data: {id: id},
        loading: false,
        done: function(resp) {
            if (resp.success) {
                popup.open('popup-edit-money', 'Sửa Loại tiền.', Fly.template('/money/add.tpl', resp), [
                    {
                        title: 'Sửa',
                        style: 'btn-primary',
                        fn: function() {
                            ajaxSubmit({
                                service: '/money/add',
                                id: 'add-money',
                                contentType: 'json',
                                loading: false,
                                done: function(rs) {
                                    rs.data.index = index;
                                    if (rs.success) {
                                            var html = Fly.template('/money/tredit.tpl', rs);
//                                            $("tr[data-key='" + id + "']").empty().html(html).addClass('success');
                                            popup.close('popup-edit-money');
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
                        fn: function() {
                            popup.close('popup-edit-money');
                        }
                    }
                ]);
                setTimeout(function() {
                    $('input[data-info=startTime]').timeSelect();
                    $('input[data-info=endTime]').timeSelect();
                }, 300);
            } else {
                popup.msg(resp.message);
            }
        }
    });
};