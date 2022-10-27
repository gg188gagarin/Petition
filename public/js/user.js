class User extends Base {

    init() {
        $(".search").on("click", function (e) {
            e.preventDefault();
            let url = User.prototype.getUrlByForm('.searchForm');
            User.prototype.ajax(url, function (response) {
                window.history.pushState("data", "Title", url);
                $('.js-petition-content').html(response);
                User.prototype.initPager();
            });
        });
    }
}

let user = new User()

