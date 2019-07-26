jQuery(function ($) {
    $(".new-quote-button").on("click", function (event) {
        event.preventDefault();
        $.ajax({
            method: "post",
            url: qod_vars.rest_url + "wp/v2/posts/" + qod_vars.post_id,
            // data: {
            //     comment_status: "closed"
            // },
            beforeSend: function (xhr) {
                xhr.setRequestHeader("X-WP-Nonce", qod_vars.wpapi_nonce);
            }
        }).done(function (response) {
            alert("A new Quote");
        });
    });

});