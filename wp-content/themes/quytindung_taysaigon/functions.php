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

add_filter( 'http_request_timeout', function( $timeout ) {
    return 30; // tăng thời gian timeout lên 30 giây
});

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
     wp_enqueue_script(
        'zalo-sdk', 
        'https://sp.zalo.me/plugins/sdk.js', 
        array(), 
        null, 
        true // Chèn vào footer
    );
}
add_action('wp_enqueue_scripts', 'tinds_enqueue_scripts');
add_theme_support('post-thumbnails');

add_action('wp_ajax_submit_feedback', 'handle_submit_feedback');
add_action('wp_ajax_nopriv_submit_feedback', 'handle_submit_feedback');

function handle_submit_feedback()
{
    $name     = sanitize_text_field($_POST['name']);
    $contact  = sanitize_text_field($_POST['contact']);
    $position = sanitize_text_field($_POST['position']);
    $rating   = intval($_POST['rating']);
    $message  = sanitize_textarea_field($_POST['message']);

    // Ảnh avatar ngẫu nhiên (dạng URL)
    $avatars = [
        get_template_directory_uri() . '/assets/img/testimonial-1.jpg',
        get_template_directory_uri() . '/assets/img/testimonial-2.jpg',
        get_template_directory_uri() . '/assets/img/testimonial-3.jpg',
        get_template_directory_uri() . '/assets/img/testimonial-4.jpg',
    ];
    $random_avatar = $avatars[array_rand($avatars)];

    // Tạo bài viết mới cho feedback
    $post_id = wp_insert_post([
        'post_type'   => 'feedback',
        'post_status' => 'publish',
        'post_title'  => $name,
    ]);

    if ($post_id) {
        update_field('feedback_contact', $contact, $post_id);
        update_field('feedback_position', $position, $post_id);
        update_field('feedback_rating', $rating, $post_id);
        update_field('feedback_content', $message, $post_id);
        update_field('feedback_avatar', $random_avatar, $post_id); // Lưu ảnh URL
        echo "success";
    } else {
        echo "error";
    }

    wp_die();
}


add_action('template_redirect', function () {
    if (isset($_POST['submit_newsletter'])) {
        $email = sanitize_email($_POST['custom_newsletter_email']);

        if (is_email($email)) {
            try {
                $mailpoet_api = \MailPoet\API\API::MP('v1');

                try {
                    // Kiểm tra xem subscriber đã tồn tại chưa
                    $subscriber = $mailpoet_api->getSubscriber($email);

                    // Nếu có → thêm vào list nếu chưa có
                    $mailpoet_api->subscribeToLists($subscriber['id'], [4]);
                } catch (Exception $e) {
                    // Nếu không tồn tại → thêm mới
                    $mailpoet_api->addSubscriber([
                        'email' => $email,
                        'lists' => [4],
                        'first_name' => '',
                        'last_name' => ''
                    ]);
                    // Kiểm tra xem subscriber đã tồn tại chưa
                    $subscriber = $mailpoet_api->getSubscriber($email);

                    // Nếu có → thêm vào list nếu chưa có
                    $mailpoet_api->subscribeToLists($subscriber['id'], [4]);

                }

                wp_redirect(home_url('/thank-you/'));
                exit;
            } catch (Exception $e) {
                error_log('MailPoet error: ' . $e->getMessage());
            }
        }
    }
});

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => 'Cài đặt Topbar',
        'menu_title'    => 'Topbar',
        'menu_slug'     => 'topbar-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}












