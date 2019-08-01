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


    $(".quote-submission-form").on("submit", function (event) {
        event.preventDefault();

        $author = $("#author").val();
        $quote = $("#quote").val();
        $source = $("#source").val();
        $sourceUrl = $("#source-url").val();

        if ($author == '' || $quote == '' || $source == '' || $sourceUrl == '') {
            $('#error-message').html("The quote wasn't submitted. Please fill in the required fields.");

        } else {
            // $('#error-message').html('');
            const data = {
                title: $("#author").val(),
                content: $("#quote").val(),
                _qod_quote_source: $("#source").val(),
                _qod_quote_source_url: $("#source-url").val(),
                post_status: "publish"
            }
            $.ajax({
                method: "POST",
                url: qod_vars.rest_url + "wp/v2/posts",
                data,
                beforeSend: function (xhr) {
                    xhr.setRequestHeader("X-WP-Nonce", qod_vars.wpapi_nonce);
                }
                // success: function (data) {
                //     $(".quote-submission-form").trigger('reset');
                //     $('#success-message').html("Quote submitted successfully!");
                // }
            }).done(function (data) {
                console.log("posted");
                $(".quote-submission-form").trigger('reset');
                $('#success-message').fadeIn().html("Quote submitted successfully!");

            });
        };
    });
});
