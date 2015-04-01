var index = {};

index.grid = function() {
    layout.title("Quản trị thông tin cơ bản");
    layout.breadcrumb([
        ["Trang chủ", "#index/grid"],
        ["Thông tin", "#home/grid"],
        ["Thông tin cơ bản"]
    ]);
    ajax({
        service: '/home/get',
        data: {id: 1},
        done: function(resp) {
            if (resp.success) {
                layout.container(Fly.template("/home/grid.tpl", resp));
            } else {
                alert("khong thanh cong");
                popup.msg(resp.message);
            }
        }
    });

};
index.edit = function(id) {
    ajax({
        service: '/home/get',
        data: {id: id},
        done: function(resp) {
            if (resp.success) {
                var respConvert = {};
                respConvert.data = {};
                $.each(resp.data, function(i){
                    if(this.key === 'EMAIL_CONTACT'){
                        respConvert.data.emailcontact = this.value;
                    }
                    if(this.key === 'ADMIN_EMAIL'){
                        respConvert.data.emailadmin = this.value;
                    }
                    if(this.key === 'SLOGAN'){
                        respConvert.data.slogan = this.value;
                    }
                    if(this.key === 'HOTLINE'){
                        respConvert.data.hotline = this.value;
                    }
                    if(this.key === 'PHONE'){
                        respConvert.data.phone = this.value;
                    }
                    if(this.key === 'FACEBOOK'){
                        respConvert.data.facebook = this.value;
                    }
                    if(this.key === 'YOUTUBE'){
                        respConvert.data.youtube = this.value;
                    }
                    if(this.key === 'TWITTER'){
                        respConvert.data.twitter = this.value;
                    }
                    if(this.key === 'BANK_INFO'){
                        respConvert.data.bank = this.value;
                    }
                    
                    
                });
                popup.open('popup-edit', 'Thay đổi thông tin', Fly.template('/home/add.tpl', respConvert), [
                    {
                        title: 'Cập nhật',
                        style: 'btn-success',
                        fn: function() {
                            ajaxSubmit({
                                service: '/home/change',
                                id: 'form-contact',
                                contentType: 'json',
                                loading: false,
                                done: function(rs) {
                                    if (rs.success) {
                                        location.reload();
                                    } else {
                                        popup.msg(rs.message);
                                    }
                                }
                            });
                            $('#popup-edit').removeAttr('style');
                            $('#popup-edit').attr('style', 'position: absolute;overflow: visible;display:block');
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
                setTimeout(function() {
                    editor("bank", {});
                });
            } else {
                popup.msg(resp.message);
            }
        }
    });
};