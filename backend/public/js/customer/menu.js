var menu = {};
menu.grid = function () {
    layout.title("Menu trang chủ");
    layout.breadcrumb([
        ["Trang chủ", "#index/grid"],
        ["Quản trị menu", "#menu/grid"]
    ]);

    var search = textUtils.hashParam();
    if (typeof search.page == 'undefined' || eval(search.page) <= 0) {
        search.page = 1;
    }
    if (typeof search.pageSize == 'undefined' || eval(search.page) <= 0) {
        search.pageSize = 100;
    }

    ajax({
        service: '/menu/grid',
        data: search,
        done: function (resp) {
            if (resp.success) {
                layout.container(Fly.template("/menu/grid.tpl", resp));
                setTimeout(function () {
                    viewUtils.initSearch("search");
                    $("input[data-search=startTime]").timeSelect();
                    $("input[data-search=endTime]").timeSelect();
                }, 300);

            } else {
                popup.msg(resp.message);
            }
        }
    });
};


menu.add = function () {
    popup.open('popup-add-menu', 'Thêm mới menu.', Fly.template('/menu/add.tpl'), [
        {
            title: 'Thêm mới',
            style: 'btn-primary',
            fn: function () {
                ajaxSubmit({
                    service: '/menu/change',
                    id: 'form-add-menu',
                    contentType: 'json',
                    loading: false,
                    done: function (rs) {
                        if (rs.success) {
                            popup.msg(rs.message, function () {
                                location.reload();
                            });
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
                popup.close('popup-add-menu');
            }
        }
    ]);

    setTimeout(function () {
        menu.drawlMenu();
    }, 300);
};

menu.drawlMenu = function (selected) {
    ajax({
        service: '/menu/grid',
        data: {},
        loading: false,
        done: function (resp) {
            if (resp.success) {
                var html = '<option value="0">-- Là menu gốc --</option>';
                $.each(resp.data, function () {
                    if (this.parentId == 0) {

                        html += '<option value="' + this.id + '" ' + (selected == this.id ? 'selected' : '') + ' >' + this.name + '</option>';
                    }
                });
                $("select[data-detail=parentId]").html(html);
            } else {
                popup.msg(resp.message);
            }
        }
    });
};

menu.remove = function (id) {
    popup.confirm("Bạn có chắc chắn muốn xóa menu này?", function () {
        ajax({
            service: '/menu/remove',
            data: {id: id},
            loading: false,
            done: function (resp) {
                if (resp.success) {
                    popup.msg(resp.message, function () {
                        $('tr[rel-data=' + id + ']').addClass('danger');
                    });
                } else {
                    popup.msg(resp.message);
                }
            }
        });
    });
};

menu.edit = function (id) {
    ajax({
        service: '/menu/get',
        data: {id: id},
        loading: false,
        done: function (resp) {
            if (resp.success) {
                popup.open('popup-add-menu', 'Thêm mới menu.', Fly.template('/menu/edit.tpl', resp), [
                    {
                        title: 'Cập nhật',
                        style: 'btn-primary',
                        fn: function () {
                            ajaxSubmit({
                                service: '/menu/change',
                                id: 'edit-menu',
                                contentType: 'json',
                                loading: false,
                                done: function (rs) {
                                    if (rs.success) {
                                        popup.msg(rs.message, function () {
                                            location.reload();
                                        });
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
                            popup.close('popup-add-menu');
                        }
                    }
                ]);
                setTimeout(function () {
                    menu.drawlMenu(resp.data.parentId);
                }, 300);
            } else {
                popup.msg(resp.message);
            }
        }
    });
};