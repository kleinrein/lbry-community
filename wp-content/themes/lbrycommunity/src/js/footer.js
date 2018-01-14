// ==== FOOTER ==== //

// A simple wrapper for all your custom jQuery that belongs in the footer
;(function ($) {
    $(function () {
        // Example integration: JavaScript-based human-readable timestamps
        if ($.timeago) {
            $('time').timeago();
        }

        // Full screen menu
        const navBtn = document.querySelector(".btn--nav")
        const navWrapper = document.querySelector(".menu-full-screen")

        $(navBtn).click(function () {
            console.log('clicked')
            const active = navBtn.className.indexOf('active') !== -1

            $(navBtn).toggleClass("active")
            $("body").toggleClass("full-menu-visible")

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
                })
                return;
            }

            $(navWrapper).toggleClass("active")

            anime({
                targets: navWrapper,
                scale: [1.2, 1],
                opacity: 1,
                duration: 400,
                elasticity: 40
            })
        });

        $(document).keypress(function(event) {
            if (event.keyCode === 27) {
                $(navBtn).trigger("click");
            };
        });

        // AOS
        AOS.init();
    });
}(jQuery));
