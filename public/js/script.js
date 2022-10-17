let initPager = function () {
    $(".pages").on("click", "a", function (e) {
        e.preventDefault();
        let url = $(this).attr("href");
        window.history.pushState("data", "Title", url);
        $.ajax({
            url: url,
            contentType: 'json',
            type: 'GET',
            success: function (response) {
                $('.js-petition-content').html(response);
                initPager();
            }
        });
    });
};


$(document).ready(function () {
    $('.js-multiple').select2();
    initPager();
    $(".search").on("click", function (e) {
        e.preventDefault();
        if ($(".js-query").val() !== "") {
                let url = $('.searchForm').attr('action') + '?q=' + $(".js-query").val();
            window.history.pushState("data", "Title", url);
            $.ajax({
                url: url,
                contentType: 'json',
                type: 'GET',
                success: function (response) {
                    $('.js-petition-content').html(response);
                },
            });
        }
    });

    $(".js-search").on('click', (e) => {
        e.preventDefault();
        if ($(".js-multiple").val() !== "") {
            let url = $('.searchForm').attr('action') + '?mult=' + $(".js-multiple").val();
            console.log(url);
            window.history.pushState("data", "Title", url);

            $.ajax({
                url: url,
                contentType: 'json',
                type: 'GET',
                success: function (response) {
                    $('.js-petition-content').html(response);
                },

            });
        }
    })

});


