option = {};
option.grid = function() {
    layout.title("Quản trị thông tin cơ bản");
    layout.breadcrumb([
        ["Trang chủ", "#index/grid"],
        ["Option", "#option/grid"],
        ["Danh sách thông tin cơ bản"]
    ]);

    var search = textUtils.hashParam();
    if (typeof search.page == 'undefined' || eval(search.page) <= 0) {
        search.page = 1;
    }
    if (typeof search.pageSize == 'undefined' || eval(search.page) <= 0) {
        search.pageSize = 100;
    }
    ajax({
        service: '/option/grid',
        data: search,
        loading: true,
        done: function(resp) {
            if (resp.success) {
                layout.container(Fly.template("/option/grid.tpl", resp));
                setTimeout(function() {
                    viewUtils.initSearch("search");
                }, 300);

            } else {
                popup.msg(resp.message);
            }
        }
    });
};
option.changeActive = function(id) {
    ajax({
        service: '/option/changeactive',
        data: {id: id},
        loading: false,
        done: function(resp) {
            if (resp.success) {
                $("div[data-key-active='" + id + "']").html('<label class="label label-' + (resp.data.auto_load == 1 ? 'success' : 'danger') + '" >' + (resp.data.auto_load == 1 ? 'Hiển thị' : 'Tạm khóa') + '</label><i onclick="option.changeActive(\'' + id + '\');" style="cursor: pointer; margin-left:5px" class="glyphicon glyphicon-' + (resp.data.auto_load == 1 ? 'check' : 'unchecked') + '" />');
            } else {
                popup.msg(resp.message);
            }
        }
    });
};

option.remove = function(id) {
    popup.confirm("Bạn có chắc chắn muốn thông tin này?", function() {
        ajax({
            service: '/option/remove',
            data: {id: id},
            loading: false,
            done: function(resp) {
                if (resp.success) {
                    $('tr[rel-data=' + id + ']').addClass('danger');
                } else {
                    popup.msg(resp.message);
                }
            }
        });
    });
};

option.add = function() {
    popup.open('popup-add-banner', 'Thêm mới thông tin.', Fly.template('/option/add.tpl'), [
        {
            title: 'Thêm mới',
            style: 'btn-primary',
            loading: false,
            fn: function() {
                ajaxSubmit({
                    service: '/option/add',
                    id: 'add-banner',
                    contentType: 'json',
                    loading: false,
                    done: function(rs) {
                        if (rs.success) {
                            rs.next = $('tr[rel-data]').length;
                            var html = Fly.template('/option/tradd.tpl', rs);
                            $('#mytable tbody[rel-data="bodydata"]').prepend(html);
                            popup.close('popup-add-banner');
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
                popup.close('popup-add-banner');
            }
        }
    ]);
};

option.edit = function(id) {
    var index = $("tr[rel-data='" + id + "'] td:nth-child(1)").text();
    ajax({
        service: '/option/get',
        data: {id: id},
        loading: false,
        done: function(resp) {
            if (resp.success) {
                popup.open('popup-edit-banner', 'Sửa thông tin.', Fly.template('/option/add.tpl', resp), [
                    {
                        title: 'Sửa',
                        style: 'btn-primary',
                        fn: function() {
                            ajaxSubmit({
                                service: '/option/add',
                                id: 'add-banner',
                                contentType: 'json',
                                loading: false,
                                done: function(rs) {
                                    rs.data.index = index.trim();
                                    if (rs.success) {
                                        console.log(rs);
                                        var html = Fly.template('/option/tredit.tpl', rs);
                                        $("tr[rel-data='" + id + "']").empty().html(html).addClass('success');
                                        popup.close('popup-edit-banner');
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
                            popup.close('popup-edit-banner');
                        }
                    }
                ]);
                if (resp.data.key == 'BANK_INFO') {
                    setTimeout(function() {
                        editor("value", {});
                    });
                }
            } else {
                popup.msg(resp.message);
            }
        }
    });
};