(function($) {
    "use strict";



    if ($(".range-slider-month").length) {

    }

    if ($(".range-slider-count").length) {

    }

    if ($(".scroll-to-target").length) {
        $(".scroll-to-target").on("click", function() {
            var target = $(this).attr("data-target");
            // animate
            $("html, body").animate({
                    scrollTop: $(target).offset().top
                },
                1000
            );

            return false;
        });
    }


    if ($(".img-popup").length) {
        var groups = {};
        $(".img-popup").each(function() {
            var id = parseInt($(this).attr("data-group"), 10);

            if (!groups[id]) {
                groups[id] = [];
            }

            groups[id].push(this);
        });

        $.each(groups, function() {
            $(this).magnificPopup({
                type: "image",
                closeOnContentClick: true,
                closeBtnInside: false,
                gallery: {
                    enabled: true
                }
            });
        });
    }


    if ($(".mobile-nav__container").length) {
        let navContent = document.querySelector(".main-menu").innerHTML;
        let mobileNavContainer = document.querySelector(".mobile-nav__container");
        mobileNavContainer.innerHTML = navContent;
    }
    if ($(".sticky-header__content").length) {
        let navContent = document.querySelector(".main-menu").innerHTML;
        let mobileNavContainer = document.querySelector(".sticky-header__content");
        mobileNavContainer.innerHTML = navContent;
    }

    if ($(".mobile-nav__container .main-menu__list").length) {
        let dropdownAnchor = $(
            ".mobile-nav__container .main-menu__list .dropdown > a"
        );
        dropdownAnchor.each(function() {
            let self = $(this);
            let toggleBtn = document.createElement("BUTTON");
            toggleBtn.setAttribute("aria-label", "dropdown toggler");
            toggleBtn.innerHTML = "<i class='fa fa-angle-down'></i>";
            self.append(function() {
                return toggleBtn;
            });
            self.find("button").on("click", function(e) {
                e.preventDefault();
                let self = $(this);
                self.toggleClass("expanded");
                self.parent().toggleClass("expanded");
                self.parent().parent().children("ul").slideToggle();
            });
        });
    }

    if ($(".mobile-nav__toggler").length) {
        $(".mobile-nav__toggler").on("click", function(e) {
            e.preventDefault();
            $(".mobile-nav__wrapper").toggleClass("expanded");
        });
    }
 
    if ($(".odometer").length) {
        $(".odometer").appear(function(e) {
            var odo = $(".odometer");
            odo.each(function() {
                var countNumber = $(this).attr("data-count");
                $(this).html(countNumber);
            });
        });
    }

    if ($(".wow").length) {
        var wow = new WOW({
            boxClass: "wow", // animated element css class (default is wow)
            animateClass: "animated", // animation css class (default is animated)
            mobile: true, // trigger animations on mobile devices (default is true)
            live: true // act on asynchronously loaded content (default is true)
        });
        wow.init();
    }

    if ($("#donate-amount__predefined").length) {
        let donateInput = $("#donate-amount");
        $("#donate-amount__predefined")
            .find("li")
            .on("click", function(e) {
                e.preventDefault();
                let amount = $(this).find("a").text();
                donateInput.val(amount);
                $("#donate-amount__predefined").find("li").removeClass("active");
                $(this).addClass("active");
            });
    }

    $("#accordion .collapse").on("shown.bs.collapse", function() {
        $(this).prev().addClass("active");
        $(this).prev().parent().addClass("active");
    });

    $("#accordion .collapse").on("hidden.bs.collapse", function() {
        $(this).prev().removeClass("active");
        $(this).prev().parent().removeClass("active");
    });

    $("#accordion").on("hide.bs.collapse show.bs.collapse", (e) => {
        $(e.target).prev().find("i:last-child").toggleClass("fa-plus fa-minus");
    });

    // window load event

    $(window).on("load", function() {
        if ($(".preloader").length) {
            $(".preloader").fadeOut();
        }

        // swiper slider
        const swiperElm = document.querySelectorAll(".thm-swiper__slider");
        swiperElm.forEach(function(swiperelm) {
            const swiperOptions = JSON.parse(swiperelm.dataset.swiperOptions);
            let thmSwiperSlider = new Swiper(swiperelm, swiperOptions);
        });
    });

    // window load event

    $(window).on("scroll", function() {
        if ($(".stricked-menu").length) {
            var headerScrollPos = 130;
            var stricky = $(".stricked-menu");
            if ($(window).scrollTop() > headerScrollPos) {
                stricky.addClass("stricky-fixed");
            } else if ($(this).scrollTop() <= headerScrollPos) {
                stricky.removeClass("stricky-fixed");
            }
        }
        if ($(".scroll-to-top").length) {
            var strickyScrollPos = 100;
            if ($(window).scrollTop() > strickyScrollPos) {
                $(".scroll-to-top").fadeIn(500);
            } else if ($(this).scrollTop() <= strickyScrollPos) {
                $(".scroll-to-top").fadeOut(500);
            }
        }
    });
})(jQuery);


$('#close-icon').click(function() {
    $('#fixed-footer-main').removeClass('fixed-footer', 1000);
});

$(window).scroll(function() {
    if ($(this).scrollTop() > 250) {
        $('#fixed-footer-main').addClass("fixed-footer");
    } else {
        $('#fixed-footer-main').removeClass("fixed-footer");
    }
});

$(window).scroll(function() {
    if ($(this).scrollTop() > 250) {
        $('#whatsapp-new').addClass("whatsapp");
    } else {
        $('#whatsapp-new').removeClass("whatsapp");
    }
});

$(function() {
    $('marquee').mouseover(function() {
        $(this).attr('scrollamount', 0);
    }).mouseout(function() {
        $(this).attr('scrollamount', 5);
    });
});

$('.left-side').click(function(){
    $('#model-complaint-board').fadeIn("slow");
});

$('.modal-close').click(function(){
    $('#model-complaint-board').fadeOut();
    
});


$('.left-side').click(function(){
    $('body').addClass("over-hide");
});


$('.modal-close').click(function(){
    $('body').removeClass("over-hide")
});

$('#excel-slider-top').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    dots:false,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 5
        }
    }
});

function showDiv(divId, element)
{
    document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
}