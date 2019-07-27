jQuery(function ($) {
    $(".new-quote-button").on("click", function (event) {
        event.preventDefault();
        $(".post").text('');
        $.ajax({
            method: "GET",
            url: qod_vars.rest_url + "wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1",
            beforeSend: function (xhr) {
                xhr.setRequestHeader("X-WP-Nonce", qod_vars.wpapi_nonce);
            }
        }).done(function (response) {
            console.log(response);
            console.log(response[0].title.rendered);
            console.log(response[0].content.rendered);
            $(".post").html(`<div class="content" ${response[0].content.rendered} ${response[0].title.rendered} ${response[0]._qod_quote_source} </div>`);
            history.pushState(response, "", response[0].link);
        });
    });

});