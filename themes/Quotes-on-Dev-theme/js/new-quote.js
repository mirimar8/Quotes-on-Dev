jQuery(function ($) {

    const $homeQuotes = $('.home-quotes');
    let quote = '';
    let comma = '';

    $('.new-quote-button').on('click', function (event) {
        event.preventDefault();
        $homeQuotes.text('');
        $.ajax({
            method: 'GET',
            url: qod_vars.rest_url + 'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', qod_vars.wpapi_nonce);
            }
        }).done(function (response) {
            if (response[0]._qod_quote_source_url !== '' && response[0]._qod_quote_source !== '') {
                quote = `<a class="quote-source-url" href="${response[0]._qod_quote_source_url}">
                <span class="quote-source">${response[0]._qod_quote_source} </span></a>`;
                comma = ',';
            } else if (response[0]._qod_quote_source_url === '' && response[0]._qod_quote_source !== '') {
                quote = `<span class="quote-source">${response[0]._qod_quote_source} </span>`;
                comma = ',';
            } else {
                quote = '';
                comma = '';
            }
            $homeQuotes.html(`<div class="quote-para">${response[0].content.rendered}</div>
            <div class="entry-meta">
                <div class="quote-author"> - ${response[0].title.rendered}</div>
                ${comma}${quote}
            </div>`);
            console.log(response[0]._qod_quote_source);



            // $homeQuotes.html(`< div class= "quote-para" > ${ response[0].content.rendered }</div >
            // <div class="entry-meta">
            //     <div class="quote-author"> - ${response[0].title.rendered}</div>
            // <span>,</span>
            //     <a class="quote-source-url" href="${response[0]._qod_quote_source_url}">
            //         <span class="quote-source">${response[0]._qod_quote_source} </span>
            //     </a>
            // </div > `);



            history.pushState(response, '', qod_vars.home_url + '/' + response[0].slug);
        });
    });

    const $quoteSubForm = $('.quote-submission-form');

    $quoteSubForm.on('submit', function (event) {
        event.preventDefault();

        const $author = $('#author').val();
        const $quote = $('#quote').val();
        const $source = $('#source').val();
        const $sourceUrl = $('#source-url').val();
        const $errorMessage = $('#error-message');
        const $successMessage = $('#success-message');


        if ($author === '' || $quote === '') {
            $quoteSubForm.trigger('reset');
            $errorMessage.fadeIn().html('The quote was not submitted. Please fill in the required fields.');
            setTimeout(function () {
                $errorMessage.fadeOut();
            }, 2000);

        } else {
            const data = {
                title: $author,
                content: $quote,
                _qod_quote_source: $source,
                _qod_quote_source_url: $sourceUrl,
                post_status: 'pending'
            };
            $.ajax({
                method: 'POST',
                url: qod_vars.rest_url + 'wp/v2/posts',
                data,
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-WP-Nonce', qod_vars.wpapi_nonce);
                }
            }).done(function () {
                $quoteSubForm.trigger('reset');
                $successMessage.fadeIn().html('The quote submitted successfully!');
                setTimeout(function () {
                    $successMessage.fadeOut();
                }, 2000);


            });
        }
    });
});
