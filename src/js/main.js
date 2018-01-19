;(function ($) {
    $(function () {
        // Page home
        var basicTimeline = anime.timeline();

        basicTimeline
            .add({
                targets: '.section-intro h1',
                scale: [0.5, 1],
                opacity: [0, 1],
                delay: 800,
                duration: 1500,
                elasticity: 40,
                easing: 'easeOutExpo'
            })
            .add({
                targets: '.section-intro h3',
                scale: [0.2, 1],
                opacity: [0, 1],
                offset: '-=1600',
                delay: 800,
                duration: 1500,
                elasticity: 40
            });

        // Full screen menu
        const navBtn = document.querySelector(".btn--nav");
        const navWrapper = document.querySelector(".menu-full-screen");

        $(navBtn).click(function () {
            console.log('clicked');
            const active = navBtn.className.indexOf('active') !== -1;

            $(navBtn).toggleClass("active");
            $("body").toggleClass("full-menu-visible");

            if (active) {
                anime({
                    targets: navWrapper,
                    scale: [1, 1.2],
                    opacity: 0,
                    duration: 500,
                    elasticity: 40,
                    complete: function () {
                        $(navWrapper).toggleClass("active")
                    }
                });
                return;
            }

            $(navWrapper).toggleClass("active");

            anime({
                targets: navWrapper,
                scale: [1.2, 1],
                opacity: 1,
                duration: 400,
                elasticity: 40
            })
        });

        $(document).keypress(function (event) {
            if (event.keyCode === 27) {
                $(navBtn).trigger("click");
            }
        });

        // AOS
        AOS.init();

        // Select all links with hashes
        $('a[href*="#"]')
        // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
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
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            }
                            ;
                        });
                    }
                }
            });
    });
}(jQuery));