var user = {};
user.grid = function() {
    layout.title("User Grid");
    layout.breadcrumb([
        ["Dashboad", "#index/grid"],
        ["Người dùng", "#user/grid"],
        ["Danh sách ngừoi dùng"]
    ]);

    var search = textUtils.hashParam();
    if (typeof search.page == 'undefined' || eval(search.page) <= 0) {
        search.page = 1;
    }
    if (typeof search.pageSize == 'undefined' || eval(search.page) <= 0) {
        search.pageSize = 100;
    }

    ajax({
        service: '/user/grid',
        data: search,
        done: function(resp) {
            if (resp.success) {
                layout.container(Fly.template("/user/grid.tpl", resp));
                setTimeout(function() {
                    viewUtils.initSearch("search");
                    $("input[data-search=createTimeTo]").timeSelect();
                    $("input[data-search=createTimeFrom]").timeSelect();
                }, 300);

            } else {
                popup.msg(resp.message);
            }
        }
    });

};

user.changeActive = function(id) {
    ajax({
        service: '/user/changeactive',
        data: {id: id},
        loading: false,
        done: function(resp) {
            if (resp.success) {
                $("td[data-id='" + id + "']").html('<label class="label label-' + (resp.data.active == 1 ? 'success' : 'danger') + '" >' + (resp.data.active == 1 ? 'Hoạt động' : 'Tạm khóa') + '</label><i onclick="user.changeActive(\'' + id + '\');" style="cursor: pointer" class="pull-right glyphicon glyphicon-' + (resp.data.active == 1 ? 'check' : 'unchecked') + '" />');
                $("tr[data-key='" + id + "']").addClass("success");
            } else {
                popup.msg(resp.message);
            }
        }
    });
};

user.detail = function(id) {
    ajax({
        service: '/user/get',
        data: {id: id},
        loading: true,
        done: function(resp) {
            if (resp.success) {
                popup.open('popup-edit-news', 'Thông tin người dùng', Fly.template('/user/detail.tpl', resp));
            } else {
                popup.msg(resp.message);
            }
        }
    });
}