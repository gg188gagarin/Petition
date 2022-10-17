// export class User extends Base {

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


        $(".js-search").on('click', (e) => {
            if ($(".js-multiple").val() !== "") {

                let url = $('.searchForm').attr('action') + '?mult=' + $(".js-multiple").val();
                console.log(url);
                window.history.pushState("data", "Title", url);
                $.ajax({
                    url: url,
                    contentType: 'json',
                    type: 'GET',
                    success: function (response) {
                        $('.js-user-content').html(response);
                    },
                });
            }
        })



    });




// }