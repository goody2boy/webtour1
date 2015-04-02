country = {};
country.grid = function() {
    layout.title("Quản trị quốc gia");
    layout.breadcrumb([
        ["Trang chủ", "#index/grid"],
        ["Quốc gia", "#country/grid"],
        ["Quản lý quốc gia"]
    ]);

    ajax({
        service: '/country/grid',
        loading: true,
        done: function(resp) {
            if (resp.success) {
                layout.container(Fly.template("/country/grid.tpl", resp));
            } else {
                popup.msg(resp.message);
            }
        }
    });
};

country.add = function() {
    popup.open('popup-add-city', 'Thêm mới đất nước.', Fly.template('/country/add.tpl'), [
        {
            title: 'Thêm mới',
            style: 'btn-primary',
            loading: false,
            fn: function() {
                ajaxSubmit({
                    service: '/country/add',
                    id: 'add-city',
                    contentType: 'json',
                    loading: false,
                    done: function(rs) {
                        if (rs.success) {
                            popup.close('popup-add-city');
                            rs.next = $('tr[rel-data]').length;
                            rs.edit = false;
                            var td = $('tr[rel-data]').get(eval(0));
                            $(td).before(Fly.template('/country/tr.tpl', rs));
                            $('tr[rel-data=' + rs.data.id + ']').addClass('success');
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
                popup.close('popup-add-city');
            }
        }
    ]);
};

country.edit = function(id) {
    var index = $("tr[rel-data='" + id + "'] td:nth-child(1)").text();
    ajax({
        service: '/country/get',
        loading: false,
        data: {id: id},
        done: function(resp) {
            if (resp.success) {
                popup.open('popup-edit-city', 'Sửa quốc gia.', Fly.template('/country/add.tpl', resp), [
                    {
                        title: 'Sửa',
                        style: 'btn-primary',
                        loading: false,
                        fn: function() {
                            ajaxSubmit({
                                service: '/country/add',
                                id: 'add-city',
                                contentType: 'json',
                                loading: false,
                                done: function(rs) {
                                    if (rs.success) {
                                        rs.next = index - 1;
                                        rs.edit = true;
                                        popup.close('popup-edit-city');
                                        $('tr[rel-data=' + rs.data.id + ']').empty().html(Fly.template('/country/tr.tpl', rs)).addClass('success');
                                        ;
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
                            popup.close('popup-edit-city');
                        }
                    }
                ]);
            } else {
                popup.msg(resp.message);
            }
        }
    });
};

country.remove = function(id) {
    popup.confirm("Bạn có chắc chắn muốn xóa quốc gia này ?", function() {
        ajax({
            service: '/country/remove',
            data: {id: id},
            loading: false,
            done: function(resp) {
                if (resp.success) {
                    $('tr[rel-data=' + id + ']').remove();
                } else {
                    popup.msg(resp.message);
                }
            }
        });
    });
};

country.getCity = function(id) {
    ajax({
        service: '/country/getbycountryid',
        data: {id: id},
        loading: false,
        done: function(resp) {
            if (resp.success) {
                resp.data.country_id = id;
                popup.open('popup-district', 'Danh sách thành phố', Fly.template('/country/city.tpl', resp), [
                    {
                        title: 'Hủy',
                        style: 'btn-default',
                        fn: function() {
                            popup.close('popup-district');
                        }
                    }
                ]);
            } else {
                popup.msg(resp.message);
            }
        }
    });

};

country.addCity = function(countryId) {
    data = {};
    data.country_id = countryId;
    popup.open('popup-add-district', 'Thêm mới thành phố', Fly.template('/country/addcity.tpl', data), [
        {
            title: 'Thêm mới',
            style: 'btn-primary',
            loading: false,
            fn: function() {
                ajaxSubmit({
                    service: '/country/addcity',
                    id: 'add-district',
                    contentType: 'json',
                    loading: false,
                    done: function(rs) {
                        if (rs.success) {
                            popup.close('popup-add-district');
                            rs.index = $('tr[data-key]').length;
                            rs.edit = false;
                            var td = $('tr[data-key]').get(eval(0));
                            $(td).before(Fly.template('/country/trcity.tpl', rs));
                            $('tr[data-key=' + rs.data.id + ']').addClass('success');

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
                popup.close('popup-add-district');
            }
        }
    ]);
};
country.editCity = function(id) {
    var index = $("tr[data-key='" + id + "'] td:nth-child(1)").text();
    ajax({
        service: '/country/getcityid',
        loading: false,
        data: {id: id},
        done: function(resp) {
            if (resp.success) {
                popup.open('popup-edit-district', 'Sửa thành phố.', Fly.template('/country/addcity.tpl', resp), [
                    {
                        title: 'Sửa',
                        style: 'btn-primary',
                        loading: false,
                        fn: function() {
                            ajaxSubmit({
                                service: '/country/addcity',
                                id: 'add-district',
                                contentType: 'json',
                                loading: false,
                                done: function(rs) {
                                    if (rs.success) {
                                        rs.index = index - 1;
                                        rs.edit = true;
                                        popup.close('popup-edit-district');
                                        $('tr[data-key=' + rs.data.id + ']').empty().html(Fly.template('/country/trcity.tpl', rs)).addClass('success');

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
                            popup.close('popup-edit-district');
                        }
                    }
                ]);
            } else {
                popup.msg(resp.message);
            }
        }
    });
};

country.removeCity = function(id) {
    popup.confirm("Bạn có chắc chắn muốn xóa thành phố này ?", function() {
        ajax({
            service: '/country/removecity',
            data: {id: id},
            loading: false,
            done: function(resp) {
                if (resp.success) {
                    $('tr[data-key=' + id + ']').remove();
                } else {
                    popup.msg(resp.message);
                }
            }
        });
    });
};