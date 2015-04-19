var user = {};
user.init = function() {
    user.loadCity($('select[name=countryId]').val(), cityId);
};

user.loadCity = function(countryId, id) {
    var html = '<option value="">Chose</option>';
    $.each(cities, function() {
        if (this.country_id == countryId) {
            if (this.id == id) {
                html += '<option selected value="' + this.id + '">' + this.name + '</option>';
            } else {
                html += '<option value="' + this.id + '">' + this.name + '</option>';

            }
        }
    });
    $('select[name=cityId]').html(html);
};

user.register = function() {
    ajaxSubmit({
        service: '/user/register',
        id: 'form-register',
        contentType: 'json',
        done: function(rs) {
            if (rs.success) {
                popup.msg(rs.message);
                window.location.href = baseUrl + 'login.html'
            } else {
                popup.msg(rs.message);
            }
        }
    });
};
user.profile = function() {
    ajaxSubmit({
        service: '/user/profile',
        id: 'form-profile',
        contentType: 'json',
        done: function(rs) {
            if (rs.success) {
                popup.msg(rs.message);
                location.reload();
            } else {
                popup.msg(rs.message);
            }
        }
    });
};
user.changepass = function() {
    ajaxSubmit({
        service: '/user/changepassword',
        id: 'form-pass',
        contentType: 'json',
        done: function(rs) {
            if (rs.success) {
                popup.msg(rs.message);
                window.location.href = baseUrl+'profile.html'
            } else {
                popup.msg(rs.message);
            }
        }
    });
};
user.login = function() {
    var account = $('input[name=account]').val();
    if (account == null || account == '') {
        popup.msg("Account requierd");
        return;
    }
    var pass = $('input[name=password]').val();
    if (pass == null || pass == '') {
        popup.msg("Password requierd");
        return;
    }
    ajax({
        service: '/user/login',
        data: {account: account, pass: pass},
        contentType: 'json',
        type: 'post',
        done: function(rs) {
            if (rs.success) {
                location.reload();

            } else {
                popup.msg(rs.message);
            }
        }
    });
};