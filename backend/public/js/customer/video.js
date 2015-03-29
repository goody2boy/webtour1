var video = {};

video.grid = function() {
    layout.title("Quản trị video");
    layout.breadcrumb([
        ["Trang chủ", "#index/grid"],
        ["Video", "#video/grid"],
        ["Danh sách video"]
    ]);

    var search = textUtils.hashParam();
    if (typeof search.page == 'undefined' || eval(search.page) <= 0) {
        search.page = 1;
    }
    if (typeof search.pageSize == 'undefined' || eval(search.page) <= 0) {
        search.pageSize = 100;
    }

    ajax({
        service: '/video/grid',
        data: search,
        done: function(resp) {
            if (resp.success) {
                layout.container(Fly.template("/video/grid.tpl", resp));
                setTimeout(function() {
                    viewUtils.initSearch("search");
                }, 300);
            } else {
                popup.msg(resp.message);
            }
        }
    });

};

video.changeActive = function(id) {
    ajax({
        service: '/video/changeactive',
        data: {id: id},
        loading: false,
        done: function(resp) {
            if (resp.success) {
                $("div[data-key='" + id + "']").html('<label class="label label-' + (resp.data.active == 1 ? 'success' : 'danger') + '" >' + (resp.data.active == 1 ? 'Hoạt động' : 'Tạm khóa') + '</label><i onclick="video.changeActive(\'' + id + '\');" style="cursor: pointer" class="pull-right glyphicon glyphicon-' + (resp.data.active == 1 ? 'check' : 'unchecked') + '" />');
                $("tr[data-key='" + id + "']").addClass("success");
            } else {
                popup.msg(resp.message);
            }
        }
    });
};
video.changeHome = function(id) {
    ajax({
        service: '/video/changehome',
        data: {id: id},
        loading: false,
        done: function(resp) {
            if (resp.success) {
                $("div[data-key-home='" + id + "']").html('<label class="label label-' + (resp.data.home == 1 ? 'success' : 'danger') + '" >' + (resp.data.home == 1 ? 'Hiển thị' : 'Tạm khóa') + '</label><i onclick="video.changeHome(\'' + id + '\');" style="cursor: pointer" class="pull-right glyphicon glyphicon-' + (resp.data.home == 1 ? 'check' : 'unchecked') + '" />');
                $("tr[data-key='" + id + "']").addClass("success");
            } else {
                popup.msg(resp.message);
            }
        }
    });
};
video.remove = function(id) {
    popup.confirm("Bạn có chắc chắn muốn xóa video này không ?", function() {
        ajax({
            service: '/video/remove',
            data: {id: id},
            done: function(resp) {
                if (resp.success) {
                    $("tr[data-key='" + id + "']").addClass("danger");
                } else {
                    popup.msg(resp.message);
                }
            }
        });
    });
};
video.add = function() {
    popup.open('popup-add', 'Tạo mới video', Fly.template('/video/add.tpl', null), [
        {
            title: 'Tạo mới',
            style: 'btn-success',
            fn: function() {
                ajaxSubmit({
                    service: '/video/change',
                    id: 'form-add',
                    contentType: 'json',
                    done: function(rs) {
                        if (rs.success) {
                            popup.close('popup-add');
                            rs.next = $('tr[data-key]').length;
                            rs.edit = false;
                            var td = $('tr[data-key]').get(eval(0));
                            $(td).after(Fly.template('/video/tr.tpl', rs));
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
                popup.close('popup-add');
            }
        }
    ]);
};
video.edit = function(id) {
    ajax({
        service: '/video/get',
        data: {id: id},
        done: function(resp) {
            if (resp.success) {
                popup.open('popup-edit', 'Sửa thông tin video', Fly.template('/video/edit.tpl', resp), [
                    {
                        title: 'Cập nhật',
                        style: 'btn-success',
                        fn: function() {
                            ajaxSubmit({
                                service: '/video/change',
                                id: 'form-edit',
                                contentType: 'json',
                                loading: false,
                                done: function(rs) {
                                    if (rs.success) {
                                        popup.close('popup-edit');
                                        rs.next = $('tr[data-key').index($('tr[data-key="' + rs.data.id + '"]'));
                                        rs.edit = true;
                                        $('tr[data-key="' + rs.data.id + '"]').html(Fly.template('/video/tr.tpl', rs));
                                        $('tr[data-key="' + rs.data.id + '"]').addClass('success');
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
                            popup.close('popup-edit');
                        }
                    }
                ]);
            } else {
                popup.msg(resp.message);
            }
        }
    });
};

video.changePosition = function(id) {
    var position = $('input[rel-data="' + id + '"]').val();
    if (position == '' || position == null) {
        popup.msg("Bạn phải nhập vị trí hiển thị!");
        return;
    }
    if (isNaN(position)) {
        popup.msg("Vị trí hiển thị phải là số !");
        return;
    }
    ajax({
        service: '/video/changeposition',
        data: {id: id, position: position},
        loading: false,
        done: function(resp) {
            if (resp.success) {
                $('tr[data-key="' + id + '"]').addClass("info");
            } else {
                popup.msg(resp.message);
            }
        }
    });
};
