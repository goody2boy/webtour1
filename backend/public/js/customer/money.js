var money = {};

money.grid = function() {
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
        done: function(resp) {
            if (resp.success) {
                layout.container(Fly.template("/money/grid.tpl", resp));
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