var metaindex = {};
metaindex.config = function(id) {
    ajax({
        service: '/banner/getmetaindex',
        data: {id: id},
        loading:false,
        done: function(resp) {
            if (resp.success) {
                resp.id = id;
                popup.open('popup-metaitem', 'Cấu hình seo', Fly.template('/banner/config.tpl', resp), [
                    {
                        title: 'Cập nhật',
                        style: 'btn-success',
                        fn: function() {
                            ajaxSubmit({
                                service: '/banner/config',
                                id: 'form-config',
                                contentType: 'json',
                                loading:false,
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