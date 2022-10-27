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
        let url = $(selector).attr('action') + '?' + $("form").serialize();
        return url;
    }

    initPager() {
        $(".pages").on("click", "a", function (e) {
            e.preventDefault();
            let url = $(this).attr("href");
            console.log('1');
            window.history.pushState("data", "Title", url);
            console.log('2');
            $.ajax({
                url: url,
                contentType: 'json',
                type: 'GET',
                success: function (response) {
                    console.log('123');

                    $('.js-petition-content').html(response);
                    console.log(this);
                    Base.prototype.initPager(); //todo check prototype
                }
            });
        });
    };

    ajax(url, callback) {
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
        this.initPager();
    }

}