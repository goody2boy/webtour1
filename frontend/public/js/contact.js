var contact = {};
contact.add = function() {
    ajaxSubmit({
        service: '/contact/save',
        id: 'form-contact',
        contentType: 'json',
        drawl: true,
        done: function(rs) {
            if (rs.success) {
                popup.msg(rs.message);
                $('input[name=name]').val('');
                $('input[name=email]').val('');
                $('textarea[name=content]').val('');
            } else {
                var msg = "";
                $.each(rs.data, function() {
                    msg += this + '<br/>'
                    popup.msg(msg);
                });
            }
        }
    });
};
