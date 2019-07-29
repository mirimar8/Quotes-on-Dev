jQuery(function ($) {
    $(".new-quote-button").on("click", function (event) {
        event.preventDefault();
        $(".home-quotes").text('');
        $.ajax({
            method: "GET",
            url: qod_vars.rest_url + "wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1",
            beforeSend: function (xhr) {
                xhr.setRequestHeader("X-WP-Nonce", qod_vars.wpapi_nonce);
            }
        }).done(function (response) {
            console.log(response);
            $(".home-quotes").html(`<div class="quote-para">${response[0].content.rendered}</div> <div class="quote-author">${response[0].title.rendered}</div><div class="quote-source"> ${response[0]._qod_quote_source}</div> `);
            history.pushState(response, "", response[0].slug);
        });
    });

});