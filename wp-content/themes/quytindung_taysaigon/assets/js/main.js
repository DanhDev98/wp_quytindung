(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();


    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.sticky-top').addClass('shadow-sm').css('top', '0px');
        } else {
            $('.sticky-top').removeClass('shadow-sm').css('top', '-100px');
        }
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Experience
    $('.experience').waypoint(function () {
        $('.progress .progress-bar').each(function () {
            $(this).css("width", $(this).attr("aria-valuenow") + '%');
        });
    }, { offset: '80%' });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


    // Modal Video
    var $videoSrc;
    $('.btn-play').click(function () {
        $videoSrc = $(this).data("src");
    });
    console.log($videoSrc);
    $('#videoModal').on('shown.bs.modal', function (e) {
        $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
    })
    $('#videoModal').on('hide.bs.modal', function (e) {
        $("#video").attr('src', $videoSrc);
    })


    // Testimonial carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        loop: true,
        dots: false,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ]
    });

    // star
    const stars = document.querySelectorAll('#starRating .star');
    const ratingInput = document.getElementById('rating');

    let currentRating = 0;

    stars.forEach((star, index) => {
        star.addEventListener('click', () => {
            currentRating = index + 1;
            ratingInput.value = currentRating;
            highlightStars(currentRating);
        });

        star.addEventListener('mouseover', () => {
            highlightStars(index + 1);
        });

        star.addEventListener('mouseout', () => {
            highlightStars(currentRating);
        });
    });

    // document.addEventListener('DOMContentLoaded', function () {
    //     const btn = document.getElementById('zalo-popup-btn');
    //     const widget = document.querySelector('.zalo-chat-widget');

    //     btn.addEventListener('click', function () {
    //         if (widget.style.display === 'none') {
    //             widget.style.display = 'block';
    //         } else {
    //             widget.style.display = 'none';
    //         }
    //     });
    // });




    function highlightStars(rating) {
        stars.forEach((star, i) => {
            star.classList.toggle('selected', i < rating);
        });
    };

    // tintuc
    // document.addEventListener("DOMContentLoaded", function () {
    //     const wordLimit = 20;
    //     const paragraphs = document.querySelectorAll("p");

    //     paragraphs.forEach(p => {
    //         const words = p.innerText.trim().split(/\s+/);
    //         if (words.length > wordLimit) {
    //             const truncated = words.slice(0, wordLimit).join(" ") + "...";
    //             p.innerText = truncated;
    //         }
    //     });
    // });

    // dieule img
    const container = document.getElementById("pages");
    const imageUrls = [
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-1.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-2.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-3.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-4.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-5.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-6.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-7.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-8.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-9.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-10.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-11.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-12.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-13.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-14.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-15.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-16.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-17.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-18.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-19.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-20.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-21.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-22.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-23.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-24.jpg',
        'https://quanly.thinhtrigroup.com/uploads/content/images/dieu-le-quy-tin-dung-tay-sai-gon-25.jpg'
    ];

    imageUrls.forEach((url, index) => {
        const div = document.createElement("div");
        div.className = "page";

        const img = document.createElement("img");
        img.src = url;
        img.alt = `Điều lệ trang ${index + 1}`;

        div.appendChild(img);
        container.appendChild(div);
    });






})(jQuery);

