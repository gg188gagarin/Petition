class Petition extends Base {

    init() {
        $(".search").on("click", function (e) {
            e.preventDefault();
            let url = Petition.prototype.getUrlByForm('.searchForm');
            Petition.prototype.ajax(url, function (response) {
                window.history.pushState("data", "Title", url);
                $('.js-petition-content').html(response);
                Petition.prototype.initPager();
            });
        });
    }
}

let petition = new Petition()