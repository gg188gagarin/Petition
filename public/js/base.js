class Base {
    constructor() {
        if (this.constructor === Base)
            throw new Error('Abstract class cannot be Instantiated');
        $(document).ready(() => {
            this.init();
            this.initBase();
        });
    }

    init() {

    }

    getUrlByForm(selector) {
        console.log('selector', selector);
        let url = $(selector).attr('action') + '?' + $("form").serialize();
        return url;
    }

    initPager() {
        $(".pages").on("click", "a", function (e) {
            e.preventDefault();
            let url = $(this).attr("href");

            Base.prototype.ajax(url, function (response) {
                window.history.pushState("data", "Title", url);
                $('.js-petition-content').html(response);
                console.log(this);
                Base.prototype.initPager(); //todo check prototype
            });

        });
    };

    ajax(url, callback) {
        console.log('url', url);
        $.ajax({
            url: url,
            contentType: 'json',
            type: 'GET',
            success: callback,
            error: function (response) {
                console.log('response', response);
                alert(response.code);
            },
        });
    }

    initBase() {
        $('.js-multiple').select2();
        console.log('Base');
        this.initPager();
    }

}