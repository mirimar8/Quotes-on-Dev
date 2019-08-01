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
            $(".home-quotes").html(`<div class="quote-para">${response[0].content.rendered}</div> <div class="quote-author">${response[0].title.rendered}</div><span class="quote-source"> ${response[0]._qod_quote_source}</span> `);
            history.pushState(response, "", response[0].slug);
        });
    });

    $quoteSubForm = $(".quote-submission-form");

    $quoteSubForm.on("submit", function (event) {
        event.preventDefault();

        $author = $("#author").val();
        $quote = $("#quote").val();
        $source = $("#source").val();
        $sourceUrl = $("#source-url").val();
        $errorMessage = $('#error-message');
        $successMessage = $('#success-message');


        if ($author == '' || $quote == '') {
            $quoteSubForm.trigger('reset');
            $errorMessage.fadeIn().html("The quote wasn't submitted. Please fill in the required fields.");
            setTimeout(function () {
                $errorMessage.fadeOut();
            }, 2000);

        } else {
            const data = {
                title: $author,
                content: $quote,
                _qod_quote_source: $source,
                _qod_quote_source_url: $sourceUrl,
                post_status: "pending"
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
                $quoteSubForm.trigger('reset');
                $successMessage.fadeIn().html("Quote submitted successfully!");
                setTimeout(function () {
                    $successMessage.fadeOut();
                }, 2000);


            });
        };
    });
});
