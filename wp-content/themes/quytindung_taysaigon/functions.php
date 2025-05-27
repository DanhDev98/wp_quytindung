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








// tạo acf tài khoản
// 1. Thêm menu vào admin
add_action('admin_menu', function () {
    add_menu_page('Import Tài Khoản', 'Import Tài Khoản', 'manage_options', 'import-tai-khoan', 'render_import_form');
});


function render_import_form() {
    ?>
<div class="wrap">
    <h1>Import Tài Khoản từ CSV</h1>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="import_file" accept=".csv" required>
        <?php submit_button('Import'); ?>
    </form>
</div>
<?php

    if (isset($_FILES['import_file'])) {
        $file = $_FILES['import_file']['tmp_name'];
        handle_csv_import($file);
    }
}
function handle_csv_import($file) {
    if (!file_exists($file)) {
        echo "<div class='notice notice-error'><p>Không tìm thấy file.</p></div>";
        return;
    }

    if (($handle = fopen($file, "r")) !== FALSE) {
        $row = 0;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if ($row === 0) { $row++; continue; }

            $mstk      = sanitize_text_field($data[1]);
            $cccd      = sanitize_text_field($data[21]); // ✅ đúng index
            $sodu      = sanitize_text_field($data[9]);
            $gocbandau = sanitize_text_field($data[8]);
            $ngaygui   = sanitize_text_field($data[5]);
            $ngaydh    = sanitize_text_field($data[6]);
            $laisuat   = sanitize_text_field($data[7]);
            $tenkhachhang = sanitize_text_field($data[19]);
               
            // Tìm bài viết đã có theo mstk
            $existing_posts = get_posts([
                'post_type'   => 'sotaikhoan',
                'meta_key'    => 'mstk',
                'meta_value'  => $mstk,
                'post_status' => 'publish',
                'numberposts' => 1,
            ]);

            if (!empty($existing_posts)) {
                // Nếu tồn tại thì update
                $post_id = $existing_posts[0]->ID;

                wp_update_post([
                    'ID'         => $post_id,
                    'post_title' => $mstk,
                ]);
            } else {
                // Nếu chưa có thì tạo mới
                    $post_id = wp_insert_post([
                        'post_title'   => $mstk,
                        'post_content' => $tenkhachhang,
                        'post_type'    => 'sotaikhoan',
                        'post_status'  => 'publish',
                    ]);
                }

            if ($post_id && !is_wp_error($post_id)) {
                update_field('mstk', $mstk, $post_id);
                update_field('cccd', $cccd, $post_id);
                update_field('sodu', $sodu, $post_id);
                update_field('gocbandau', $gocbandau, $post_id);
                update_field('ngaygui', $ngaygui, $post_id);
                update_field('ngaydh', $ngaydh, $post_id);
                update_field('laisuat', $laisuat, $post_id);
                update_field('ten_khach_hang', $tenkhachhang, $post_id);
            }
        }
        fclose($handle);

        echo "<div class='notice notice-success'><p>Import thành công!</p></div>";
    }
}

// tra cứu tk
add_action('wp_ajax_tra_cuu_tai_khoan', 'handle_tra_cuu_tai_khoan');
add_action('wp_ajax_nopriv_tra_cuu_tai_khoan', 'handle_tra_cuu_tai_khoan');

function handle_tra_cuu_tai_khoan() {
    // Kiểm tra đầu vào
    $input = isset($_POST['query']) ? sanitize_text_field($_POST['query']) : '';
    if (empty($input)) {
        echo "⚠️ Vui lòng nhập thông tin!";
        wp_die();
    }

    // Truy vấn bài viết theo MSTK hoặc CCCD
    $args = [
        'post_type'   => 'sotaikhoan',
        'post_status' => 'publish',
        'meta_query'  => [
            'relation' => 'OR',
            [
                'key'     => 'mstk',
                'value'   => $input,
                'compare' => '='
            ],
            [
                'key'     => 'cccd',
                'value'   => $input,
                'compare' => '='
            ]
        ]
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            // Lấy dữ liệu từ custom fields
            $mstk        = get_field('mstk');
            $cccd        = get_field('cccd');
            $sodu        = get_field('sodu');
            $gocbandau   = get_field('gocbandau');
            $ngaygui     = get_field('ngaygui');
            $ngaydh      = get_field('ngaydh');
            $laisuat     = get_field('laisuat');
            $ten_khach   = get_field('ten_khach_hang'); // Tên đúng từ ACF
            $post_title  = get_the_title(); // fallback nếu tên khách hàng không có

            // Hiển thị kết quả
            echo "<div style='padding:15px;background:#fff;border-radius:10px;border:1px solid #ddd;margin-bottom:15px'>";
            echo "<strong>Khách hàng:</strong> " . esc_html($ten_khach ?: $post_title) . "<br>";
            echo "<strong>MSTK:</strong> " . esc_html($mstk) . "<br>";
            echo "<strong>CCCD:</strong> " . esc_html($cccd) . "<br>";
            echo "<strong>Số dư:</strong> " . number_format((float)$sodu) . " VND<br>";
            echo "<strong>Gốc ban đầu:</strong> " . number_format((float)$gocbandau) . " VND<br>";
            echo "<strong>Ngày gửi:</strong> " . esc_html($ngaygui) . "<br>";
            echo "<strong>Ngày đáo hạn:</strong> " . esc_html($ngaydh) . "<br>";
            echo "<strong>Lãi suất:</strong> " . esc_html($laisuat) . " %<br>";
            echo "</div>";
        }
    } else {
        echo "❌ Không tìm thấy tài khoản nào khớp với thông tin bạn nhập.";
    }

    wp_die();
}

// filter news by year
add_action('wp_ajax_filter_news_by_year', 'filter_news_by_year_callback');
add_action('wp_ajax_nopriv_filter_news_by_year', 'filter_news_by_year_callback');

function filter_news_by_year_callback() {
    $year = isset($_POST['year']) ? intval($_POST['year']) : 0;

    $args = [
        'post_type' => 'post',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
    ];

    if ($year) {
        $args['date_query'] = [
            ['year' => $year]
        ];
    }

    $query = new WP_Query($args);

    echo '<div class="carousel-inner">';

    if ($query->have_posts()) {
        $posts = $query->posts;
        $chunks = array_chunk($posts, 4);

        foreach ($chunks as $index => $chunk) {
            echo '<div class="carousel-item ' . ($index === 0 ? 'active' : '') . '">';
            echo '<div class="row news">';
            foreach ($chunk as $post) {
                setup_postdata($post);
                echo '<div class="col-md-2">';
                echo '<div class="card news-item-card h-100">';
                if (has_post_thumbnail($post->ID)) {
                    echo '<a href="' . get_permalink($post->ID) . '">';
                    echo get_the_post_thumbnail($post->ID, 'medium', ['class' => 'card-img-top']);
                    echo '</a>';
                } else {
                    echo '<img src="https://via.placeholder.com/400x250" class="card-img-top" alt="No image">';
                }
                echo '<div class="card-body d-flex flex-column">';
                echo '<h6 class="card-title">' . get_the_title($post->ID) . '</h6>';
                echo '<p class="card-text small">' . wp_trim_words(get_the_excerpt($post->ID), 15, '...') . '</p>';
                echo '<a href="' . get_permalink($post->ID) . '" class="btn btn-sm btn-outline-primary mt-auto">Xem thêm</a>';
                echo '</div></div></div>';
            }
            wp_reset_postdata();
            echo '</div></div>';
        }
    } else {
        echo '<div class="carousel-item active">';
        echo '<p class="text-center p-4">Không có bài tin tức nào cho năm ' . esc_html($year) . '.</p>';
        echo '</div>';
    }

    echo '</div>';

    wp_die();
}

function enqueue_filter_news_scripts() {
    wp_enqueue_script('jquery');

    // Nếu Bootstrap JS chưa được enqueue thì thêm dòng dưới:
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', [], '5.3.0', true);

    wp_enqueue_script('filter-news', get_template_directory_uri() . '/js/filter-news.js', ['jquery', 'bootstrap-js'], '1.0', true);

    wp_localize_script('filter-news', 'my_ajax_obj', [
        'ajax_url' => admin_url('admin-ajax.php'),
    ]);
}
add_action('wp_enqueue_scripts', 'enqueue_filter_news_scripts');