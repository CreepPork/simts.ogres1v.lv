// Select all links with hashes
$('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .click(function (event) {
        // On-page links
        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            &&
            location.hostname == this.hostname
        ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();

                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000, function () {
                    // Set focus to parent element that is the container
                    var targetContainer = $(target.closest('.container'));
                    targetContainer.addClass('container-selected').focus();

                    setTimeout(() => {
                        // Remove the focus from the container and set it to the actual target
                        // for accessibility reasons
                        targetContainer.blur();
                        target.focus();

                        // After the transition has completed then remove the class
                        setTimeout(() => {
                            targetContainer.removeClass('container-selected');
                        }, 250);
                    }, 500);
                });
            }
        }
    });
