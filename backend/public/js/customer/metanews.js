var metanews = {};
metanews.config = function(id) {
    ajax({
        service: '/news/getmetanews',
        data: {id: id},
        loading: false,
        done: function(resp) {
            if (resp.success) {
                resp.id = id;
                popup.open('popup-metaitem', 'Cấu hình seo', Fly.template('/news/config.tpl', resp), [
                    {
                        title: 'Cập nhật',
                        style: 'btn-success',
                        fn: function() {
                            ajaxSubmit({
                                service: '/news/config',
                                id: 'form-config',
                                contentType: 'json',
                                loading: false,
                                done: function(rs) {
                                    if (rs.success) {
                                        popup.msg(rs.message,function(){
                                        popup.close('popup-metaitem');
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
                        fn: function() {
                            popup.close('popup-metaitem');
                        }
                    }
                ]);
            } else {
                popup.msg(resp.message);
            }
        }
    });
};