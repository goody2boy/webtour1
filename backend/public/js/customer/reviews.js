var reviews = {};

reviews.grid = function() {
    layout.title("Quản trị ý kiến khách hàng");
    layout.breadcrumb([
        ["Trang chủ", "#index/grid"],
        ["Ý kiến khách hàng", "#reviews/grid"],
        ["Danh sách ý kiến khách hàng"]
    ]);

    var search = textUtils.hashParam();
    if (typeof search.page == 'undefined' || eval(search.page) <= 0) {
        search.page = 1;
    }
    if (typeof search.pageSize == 'undefined' || eval(search.page) <= 0) {
        search.pageSize = 100;
    }

    ajax({
        service: '/reviews/grid',
        data: search,
        done: function(resp) {
            if (resp.success) {
                layout.container(Fly.template("/reviews/grid.tpl", resp));
                setTimeout(function() {
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

reviews.changeActive = function(id) {
    ajax({
        service: '/reviews/changeactive',
        data: {id: id},
        loading: false,
        done: function(resp) {
            if (resp.success) {
                $("div[data-key='" + id + "']").html('<label class="label label-' + (resp.data.active == 1 ? 'success' : 'danger') + '" >' + (resp.data.active == 1 ? 'Hoạt động' : 'Tạm khóa') + '</label><i onclick="reviews.changeActive(\'' + id + '\');" style="cursor: pointer" class="pull-right glyphicon glyphicon-' + (resp.data.active == 1 ? 'check' : 'unchecked') + '" />');
                $("tr[data-key='" + id + "']").addClass("success");
            } else {
                popup.msg(resp.message);
            }
        }
    });
};
reviews.changeHome = function(id) {
    ajax({
        service: '/reviews/changehome',
        data: {id: id},
        loading: false,
        done: function(resp) {
            if (resp.success) {
                $("div[data-key-home='" + id + "']").html('<label class="label label-' + (resp.data.home == 1 ? 'success' : 'danger') + '" >' + (resp.data.home == 1 ? 'Hiển thị' : 'Tạm khóa') + '</label><i onclick="reviews.changeHome(\'' + id + '\');" style="cursor: pointer" class="pull-right glyphicon glyphicon-' + (resp.data.home == 1 ? 'check' : 'unchecked') + '" />');
                $("tr[data-key='" + id + "']").addClass("success");
            } else {
                popup.msg(resp.message);
            }
        }
    });
};
reviews.remove = function(id) {
    popup.confirm("Bạn có chắc chắn muốn xóa ý kiến này không ?", function() {
        ajax({
            service: '/reviews/remove',
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
reviews.add = function() {
    popup.open('popup-add', 'Tạo mới ý kiến', Fly.template('/reviews/add.tpl', null), [
        {
            title: 'Tạo mới',
            style: 'btn-success',
            fn: function() {
                ajaxSubmit({
                    service: '/reviews/change',
                    id: 'form-add',
                    contentType: 'json',
                    done: function(rs) {
                        if (rs.success) {
                            popup.close('popup-add');
                            rs.next = $('tr[data-key]').length;
                            rs.edit = false;
                            var td = $('tr[data-key]').get(eval(0));
                            $(td).after(Fly.template('/reviews/tr.tpl', rs));
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
reviews.edit = function(id) {
    ajax({
        service: '/reviews/get',
        data: {id: id},
        done: function(resp) {
            if (resp.success) {
                popup.open('popup-edit', 'Sửa thông tin ý kiến', Fly.template('/reviews/edit.tpl', resp), [
                    {
                        title: 'Cập nhật',
                        style: 'btn-success',
                        fn: function() {
                            ajaxSubmit({
                                service: '/reviews/change',
                                id: 'form-edit',
                                contentType: 'json',
                                loading: false,
                                done: function(rs) {
                                    if (rs.success) {
                                        popup.close('popup-edit');
                                        rs.next = $('tr[data-key').index($('tr[data-key="' + rs.data.id + '"]'));
                                        rs.edit = true;
                                        $('tr[data-key="' + rs.data.id + '"]').html(Fly.template('/reviews/tr.tpl', rs));
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
