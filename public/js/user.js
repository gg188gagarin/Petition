class User extends Base {

    init() {
        $(".search").on("click", function (e) {
            e.preventDefault();
            User.prototype.ajax(url, function (response) {
                window.history.pushState("data", "Title", url);
                $('.js-petition-content').html(response);
                User.prototype.initPager();
            });

        });
    }
}

let user = new User()


$( "form" ).on( "submit", function( event ) {
    event.preventDefault();
    console.log( $( this ).serialize() );
});