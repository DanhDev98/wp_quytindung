<?php
// Đăng ký menu footer
function quytindungtaysaigon_setup()
{
    // Đăng ký menu cho footer
    register_nav_menus(array(
        'primary' => 'Menu chính',
        'footer_menu' => 'Menu chân trang',
    ));
}
add_action('after_setup_theme', 'quytindungtaysaigon_setup');

function tinds_enqueue_assets()
{
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@700;800&display=swap', array(), null);

    // Icon Fonts
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css', array(), '5.10.0');
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css', array(), '1.10.4');

    // Libraries
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/lib/animate/animate.min.css');
    wp_enqueue_style('owlcarousel', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.carousel.min.css');
    wp_enqueue_style('slide', get_template_directory_uri() . '/assets/lib/slide/slide.css');

    // Bootstrap
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');

    // Main style
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css');

    // Favicon (nên thêm vào header.php, không dùng wp_enqueue_style)
}
add_action('wp_enqueue_scripts', 'tinds_enqueue_assets');



function tinds_enqueue_scripts()
{
    // jQuery từ Google CDN (nếu bạn không dùng jQuery mặc định của WP)
    wp_enqueue_script('jquery-cdn', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js', array(), '3.6.1', true);

    // Bootstrap bundle
    wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js', array('jquery-cdn'), '5.0.0', true);

    // Library scripts
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/lib/wow/wow.min.js', array(), null, true);
    wp_enqueue_script('easing', get_template_directory_uri() . '/assets/lib/easing/easing.min.js', array(), null, true);
    wp_enqueue_script('waypoints', get_template_directory_uri() . '/assets/lib/waypoints/waypoints.min.js', array(), null, true);
    wp_enqueue_script('counterup', get_template_directory_uri() . '/assets/lib/counterup/counterup.min.js', array('jquery-cdn'), null, true);
    wp_enqueue_script('owlcarousel', get_template_directory_uri() . '/assets/lib/owlcarousel/owl.carousel.min.js', array('jquery-cdn'), null, true);

    // Main JS
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery-cdn'), null, true);
    wp_enqueue_script('cauhoi', get_template_directory_uri() . '/assets/js/cauhoi.js', array('jquery-cdn'), null, true);
}
add_action('wp_enqueue_scripts', 'tinds_enqueue_scripts');





// Các đoạn code khác của bạn ở đây