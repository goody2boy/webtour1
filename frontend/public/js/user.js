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
                window.location.href = baseUrl + 'profile.html'
            } else {
                popup.msg(rs.message);
            }
        }
    });
};
user.login = function() {
    ajaxSubmit({
        service: '/user/login',
        id: 'form-login',
        contentType: 'json',
        done: function(rs) {
            if (rs.success) {
                window.location.href = baseUrl;
            } else {
                $('div#error').removeClass('hide')
                $('div#error div').text(rs.message);
            }
        }
    });
};
user.forgot = function() {
    ajaxSubmit({
        service: '/user/forgot',
        id: 'form-forgot',
        contentType: 'json',
        done: function(rs) {
            if (rs.success) {
                popup.msg(rs.message);
            } else {
                popup.msg(rs.message);
            }
        }
    });
};