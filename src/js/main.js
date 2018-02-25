// Scripts
$(function () {
    const navBtn = document.querySelector(".btn--nav");
    const navWrapper = document.querySelector(".menu-full-screen");
    const imgHeader = document.querySelector(".img-header");

    homePageAnimation();

    $(navBtn).click(function (e) { toggleFullMenu(e); });

    $(document).keypress(function (event) {
        if (event.keyCode === 27) {
            $(navBtn).trigger("click");
        }
    });

    $(".scroll-down").click(function () { hotKeys($(this)) });


    const instance = basicScroll.create({
        elem: document.querySelector('.btn--nav'),
        from: 'top-top',
        to: 'middle-top',
        props: {
            '--opacity': {
                from: .0,
                to: 1
            },
            '--tranY': {
                from: 0,
                to: '10px'
            }
        }
    });
    instance.start();

    AOS.init();

    function homePageAnimation() {
        var basicTimeline = anime.timeline();

        basicTimeline
            .add({
                targets: '.section-intro #page-intro-title',
                scale: [0.5, 1],
                opacity: [0, 1],
                delay: 600,
                duration: 1200,
                elasticity: 40,
                easing: 'easeOutExpo'
            })
            .add({
                targets: '.section-intro #page-intro-text',
                scale: [0.2, 1],
                opacity: [0, 1],
                offset: '-=1600',
                delay: 600,
                duration: 1200,
                elasticity: 40
            })
            .add({
                targets: '.btn--primary',
                scale: [0.8, 1],
                opacity: [0, 1],
                offset: '-=1500',
                delay: 600,
                duration: 1000
            })
            .add({
                targets: '.btn--secondary',
                scale: [0.8, 1],
                opacity: [0, 1],
                offset: '-=1500',
                delay: 600,
                duration: 1000
            });
    }

    function toggleFullMenu(e) {
        const active = navBtn.className.indexOf('active') !== -1;

        $(navBtn).toggleClass("active");
        $("html").toggleClass("full-menu-visible");

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

            return
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
    }

    function hotKeys(that) {
        var target = that.data("scroll");
        $(target).velocity('scroll', {
            duration: 500,
            offset: -40,
            easing: 'ease-in-out'
        });
    }
});