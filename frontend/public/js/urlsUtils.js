var urlsUtils = {};
urlsUtils.newsBrowse = function(alias) {
        if (typeof alias == 'undefined' || alias == null) {
            return "tin-tuc.html";
        }
        return "tin-tuc/" +alias;
    }
