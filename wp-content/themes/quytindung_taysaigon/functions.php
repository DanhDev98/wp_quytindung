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

add_filter('http_request_timeout', function ($timeout) {
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
    $name = sanitize_text_field($_POST['name']);
    $contact = sanitize_text_field($_POST['contact']);
    $position = sanitize_text_field($_POST['position']);
    $rating = intval($_POST['rating']);
    $message = sanitize_textarea_field($_POST['message']);

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
        'post_type' => 'feedback',
        'post_status' => 'publish',
        'post_title' => $name,
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
        'page_title' => 'Cài đặt Topbar',
        'menu_title' => 'Topbar',
        'menu_slug' => 'topbar-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

// form tuyển dụng 
add_action('admin_post_nopriv_nop_cv_submit', 'handle_cv_form_submission');
add_action('admin_post_nop_cv_submit', 'handle_cv_form_submission');

function handle_cv_form_submission()
{
    $name = sanitize_text_field($_POST['applicant_name']);
    $email = sanitize_email($_POST['applicant_email']);
    $phone = sanitize_text_field($_POST['applicant_phone']);

    $job_title = sanitize_text_field($_POST['job_title']);
    $job_company = sanitize_text_field($_POST['job_company']);
    $reg_date = sanitize_text_field($_POST['job_registration_date']);
    $exp_date = sanitize_text_field($_POST['job_expiration_date']);

    // Cần include nếu chưa có
    if (!function_exists('media_handle_upload')) {
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/media.php');
    }

    // Tạo bài viết trước
    $post_id = wp_insert_post([
        'post_type' => 'cv',
        'post_title' => $name . ' - ' . $job_title,
        'post_status' => 'publish',
    ]);

    if ($post_id && !empty($_FILES['applicant_cv']['name'])) {
        // Upload file và gán vào thư viện Media
        $attachment_id = media_handle_upload('applicant_cv', $post_id);

        if (!is_wp_error($attachment_id)) {
            // Gán attachment vào field ACF (phải là kiểu File)
            update_field('cv_file_url', $attachment_id, $post_id);
        } else {
            wp_die('Lỗi upload CV: ' . $attachment_id->get_error_message());
        }

        // Lưu các trường ACF khác
        update_field('applicant_name', $name, $post_id);
        update_field('applicant_email', $email, $post_id);
        update_field('applicant_phone', $phone, $post_id);
        update_field('job_title', $job_title, $post_id);
        update_field('job_company', $job_company, $post_id);
        update_field('job_registration_date', $reg_date, $post_id);
        update_field('job_expiration_date', $exp_date, $post_id);

        // Redirect sau khi gửi thành công
        wp_redirect(home_url('/thanks-for-submit/'));
        exit;
    } else {
        wp_die('Không thể tạo bài viết hoặc chưa có file CV');
    }
}

// tra cứu tk
add_action('wp_ajax_tra_cuu_tai_khoan', 'handle_tra_cuu_tai_khoan');
add_action('wp_ajax_nopriv_tra_cuu_tai_khoan', 'handle_tra_cuu_tai_khoan');

function handle_tra_cuu_tai_khoan()
{
    $input = sanitize_text_field($_POST['query']);
    if (!$input) {
        echo "⚠️ Vui lòng nhập thông tin!";
        wp_die();
    }

    // Tìm post với meta_key là mstk hoặc cccd
    $args = [
        'post_type' => 'sotaikhoan', // Tên post type bạn dùng
        'post_status' => 'publish',
        'meta_query' => [
            'relation' => 'OR',
            [
                'key' => 'mstk',
                'value' => $input,
                'compare' => '='
            ],
            [
                'key' => 'cccd',
                'value' => $input,
                'compare' => '='
            ]
        ]
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            echo "<div style='padding:15px;background:#fff;border-radius:10px;border:1px solid #ddd'>";
            echo "<strong>Khách hàng:</strong> " . get_the_title() . "<br>";
            echo "<strong>MSTK:</strong> " . get_field('mstk') . "<br>";
            echo "<strong>CCCD:</strong> " . get_field('cccd') . "<br>";
            echo "<strong>Số dư:</strong> " . number_format(get_field('sodu')) . " VND<br>";
            echo "<strong>Gốc ban đầu:</strong> " . number_format(get_field('gocbandau')) . " VND<br>";
            echo "<strong>Ngày gửi:</strong> " . get_field('ngaygui') . "<br>";
            echo "<strong>Ngày đáo hạn:</strong> " . get_field('ngaydh') . "<br>";
            echo "<strong>Lãi suất:</strong> " . get_field('laisuat') . " %<br>";
            echo "</div>";
        }
    } else {
        echo "❌ Không tìm thấy tài khoản nào khớp với thông tin bạn nhập.";
    }

    wp_die();
}