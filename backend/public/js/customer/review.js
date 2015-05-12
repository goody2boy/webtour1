var review = {};

review.grid = function () {
    layout.title("Quản trị Review");
    layout.breadcrumb([
        ["Trang chủ", "#index/grid"],
        ["Money", "#review/grid"],
        ["Danh sách Review"]
    ]);

    var search = textUtils.hashParam();
    if (typeof search.page == 'undefined' || eval(search.page) <= 0) {
        search.page = 1;
    }
    if (typeof search.pageSize == 'undefined' || eval(search.page) <= 0) {
        search.pageSize = 100;
    }

    ajax({
        service: '/review/grid',
        data: search,
        done: function (resp) {
            if (resp.success) {
                layout.container(Fly.template("/review/grid.tpl", resp));
                setTimeout(function () {
                    viewUtils.initSearch("search");
                    $('input[data-search=submit_timeFrom]').timeSelect();
                    $('input[data-search=submit_timeTo]').timeSelect();
                }, 300);
                ajax({
                    service: '/user/getall',
                    data: '',
                    done: function (resp) {
                        if (resp.success) {
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
            } else {
                popup.msg(resp.message);
            }
        }
    });

};

review.remove = function (id) {
    popup.confirm("Bạn có muốn xóa loại tiền tệ này?", function () {
        ajax({
            service: '/review/remove',
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

review.changeActive = function (id) {
    popup.confirm("Bạn có muốn hủy kích hoạt loại tiền tệ này?", function () {
        ajax({
            service: '/review/change-active',
            data: {id: id},
            loading: false,
            done: function (resp) {
                if (resp.success) {
                    $("div[data-key-active='" + id + "']").html('<label class="label label-' + (resp.data.active == 1 ? 'success' : 'danger') + '" >' + (resp.data.active == 1 ? 'Hoạt động' : 'Tạm khóa') + '</label><i onclick="review.changeActive(\'' + id + '\');" style="cursor: pointer; margin-left:5px" class="glyphicon glyphicon-' + (resp.data.active == 1 ? 'check' : 'unchecked') + '" />');
                } else {
                    alert("fal rooi nha ");
                    popup.msg(resp.message);
                }
            }
        });
    });
};

review.edit = function (id){
    var index = $("tr[data-key='" + id + "'] td:nth-child(1)").text();
    ajax({
        service: '/review/get',
        data: {id: id},
        loading: false,
        done: function(resp) {
            if (resp.success) {
                popup.open('popup-edit-review', 'Sửa Loại tiền.', Fly.template('/review/add.tpl', resp), [
                    {
                        title: 'Sửa',
                        style: 'btn-primary',
                        fn: function() {
                            ajaxSubmit({
                                service: '/review/add',
                                id: 'add-review',
                                contentType: 'json',
                                loading: false,
                                done: function(rs) {
                                    rs.data.index = index;
                                    if (rs.success) {
                                            var html = Fly.template('/review/tredit.tpl', rs);
//                                            $("tr[data-key='" + id + "']").empty().html(html).addClass('success');
                                            popup.close('popup-edit-review');
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
                            popup.close('popup-edit-review');
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