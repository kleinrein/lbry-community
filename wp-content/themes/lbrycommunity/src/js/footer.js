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
            const active = navBtn.className.indexOf('active') !== -1

            $(navBtn).toggleClass("active")
            $(navWrapper).toggleClass("active")

            navWrapper.velocity({
                scale: 1
            }, {
                complete: function () {

                }
            })
        });
    });
}(jQuery));
