// Scripts
$(function () {
    // Page home
    var basicTimeline = anime.timeline();

    basicTimeline
        .add({
            targets: '.section-intro h1',
            scale: [0.5, 1],
            opacity: [0, 1],
            delay: 800,
            duration: 1200,
            elasticity: 40,
            easing: 'easeOutExpo'
        })
        .add({
            targets: '.section-intro h3',
            scale: [0.2, 1],
            opacity: [0, 1],
            offset: '-=1800',
            delay: 800,
            duration: 1200,
            elasticity: 40
        })
        .add({
            targets: '.btn--primary',
            scale: [0.8, 1],
            opacity: [0, 1],
            offset: '-=1500',
            delay: 800,
            duration: 1000
        })
        .add({
            targets: '.btn--secondary',
            scale: [0.8, 1],
            opacity: [0, 1],
            offset: '-=1500',
            delay: 800,
            duration: 1000
        });

    // Full screen menu
    const navBtn = document.querySelector(".btn--nav");
    const navWrapper = document.querySelector(".menu-full-screen");
    const imgHeader = document.querySelector(".img-header");

    $(navBtn).click(function () {
        const active = navBtn.className.indexOf('active') !== -1;

        $(navBtn).toggleClass("active");
        $("body").toggleClass("full-menu-visible");

        if (active) {
            $(imgHeader).toggleClass("active");
            anime({
                targets: navWrapper,
                scale: [1, 1.2],
                opacity: 0,
                duration: 500,
                elasticity: 60,
                complete: function () {
                    $(navWrapper).toggleClass("active");
                }
            });
            return;
        }

        $(navWrapper).toggleClass("active");
        $(imgHeader).toggleClass("active");

        anime({
            targets: navWrapper,
            scale: [1.2, 1],
            opacity: 1,
            duration: 400,
            elasticity: 80
        })
    });

    $(document).keypress(function (event) {
        if (event.keyCode === 27) {
            $(navBtn).trigger("click");
        }
    });

    // Scroll down
    $(".scroll-down").click(function () {
        var target = $(this).data("scroll");
        console.log(target);
        $(target).velocity('scroll', {
            duration: 500,
            offset: -40,
            easing: 'ease-in-out'
        });
    });

    // AOS
    AOS.init();
});