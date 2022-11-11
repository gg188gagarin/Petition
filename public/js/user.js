class User extends Base {

    init() {
        $(".search").on("click", function (e) {
            e.preventDefault();
            console.log('User');
            let url = User.prototype.getUrlByForm('.searchFormU');
            User.prototype.ajax(url, function (response) {
                window.history.pushState("data", "Title", url);
                $('.js-user-content').html(response);
                User.prototype.initPager();
            });
        });
    }
}

let user = new User()

