<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <?php 
$front_page_id = get_option('page_on_front');

// Lấy dữ liệu ACF từ trang chủ
$logo = get_field('topbar_logo', $front_page_id);
$address = get_field('topbar_address', $front_page_id);
$email = get_field('topbar_email', $front_page_id);
$phone = get_field('topbar_phone', $front_page_id);
$facebook = get_field('topbar_facebook', $front_page_id);
$twitter = get_field('topbar_twitter', $front_page_id);
$linkedin = get_field('topbar_linkedin', $front_page_id);

// Lấy URL ảnh logo nếu có
?>

<!-- Topbar Start -->
<div class="container-fluid bg-primary text-white d-none d-lg-flex wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-2">
        <div class="d-flex align-items-center">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo esc_url($logo); ?>" alt="Logo" class="img-fluid" style="max-width: 80px; height: auto;">
            </a>
            <div class="ms-auto d-flex align-items-center">
                <?php if ($address): ?>
                <small class="ms-4"><i class="fa fa-map-marker-alt me-3"></i><?php echo esc_html($address); ?></small>
                <?php endif; ?>

                <?php if ($email): ?>
                <small class="ms-4"><i class="fa fa-envelope me-3"></i><?php echo esc_html($email); ?></small>
                <?php endif; ?>

                <?php if ($phone): ?>
                <small class="ms-4"><i class="fa fa-phone-alt me-3"></i><?php echo esc_html($phone); ?></small>
                <?php endif; ?>

                <div class="ms-3 d-flex">
                    <?php if ($facebook): ?>
                    <a class="btn btn-sm-square btn-light text-primary ms-2" href="<?php echo esc_url($facebook); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <?php endif; ?>
                    <?php if ($twitter): ?>
                    <a class="btn btn-sm-square btn-light text-primary ms-2" href="<?php echo esc_url($twitter); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                    <?php endif; ?>
                    <?php if ($linkedin): ?>
                    <a class="btn btn-sm-square btn-light text-primary ms-2" href="<?php echo esc_url($linkedin); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<?php $current_slug = get_post_field('post_name', get_post()); ?>
<div class="container-fluid bg-white sticky-top wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0">
            <a href="<?php echo home_url(); ?>" class="navbar-brand d-lg-none">
                <img src="https://tindungtaysaigon.com/quanly/img/logo/16017891741601547718Artboard 12logo QTD chan trang.png"
                    alt="Logo" class="img-fluid" style="max-width: 80px; height: auto;">
            </a>
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="<?php echo home_url(); ?>" class="nav-item nav-link <?php if (is_front_page()) echo 'active'; ?>">Trang chủ</a>

                    <!-- Dịch vụ -->
                    <?php
                        $dv_pages = ['chuyentiennhanh', 'thanhtoandiennuoc-page', 'bao-quan-tai-san-page', 'trang-dang-ky-dich-vu'];
                        $dv_active = in_array($current_slug, $dv_pages);
                    ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?php if ($dv_active) echo 'active'; ?>" data-bs-toggle="dropdown">Dịch vụ</a>
                        <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                            <a href="<?php echo get_permalink(get_page_by_path('chuyentiennhanh')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'chuyentiennhanh') echo 'active'; ?>">Chuyển tiền nhanh</a>
                            <a href="<?php echo get_permalink(get_page_by_path('thanhtoandiennuoc-page')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'thanhtoandiennuoc-page') echo 'active'; ?>">Thanh toán điện nước</a>
                            <a href="<?php echo get_permalink(get_page_by_path('bao-quan-tai-san-page')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'bao-quan-tai-san-page') echo 'active'; ?>">Bảo quản tài sản</a>
                            <a href="<?php echo get_permalink(get_page_by_path('trang-dang-ky-dich-vu')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'trang-dang-ky-dich-vu') echo 'active'; ?>">Đăng ký dịch vụ</a>
                        </div>
                    </div>

                    <!-- Vay vốn -->
                    <?php
                        $vay_pages = ['trang-vay-uu-dai', 'trang-vay-tin-chap', 'trang-cam-co-so-tiet-kiem', 'trang-vay-the-chap-qsd-dat', 'huong-dan-chuyen-khoan', 'dang-ky-vay-von'];
                        $vay_active = in_array($current_slug, $vay_pages);
                    ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?php if ($vay_active) echo 'active'; ?>" data-bs-toggle="dropdown">Vay vốn</a>
                        <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                            <a href="<?php echo get_permalink(get_page_by_path('trang-vay-uu-dai')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'trang-vay-uu-dai') echo 'active'; ?>">Vay ưu đãi</a>
                            <a href="<?php echo get_permalink(get_page_by_path('trang-vay-tin-chap')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'trang-vay-tin-chap') echo 'active'; ?>">Vay tín chấp</a>
                            <a href="<?php echo get_permalink(get_page_by_path('trang-cam-co-so-tiet-kiem')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'trang-cam-co-so-tiet-kiem') echo 'active'; ?>">Vay cầm cố sổ gửi tiền tiết kiệm</a>
                            <a href="<?php echo get_permalink(get_page_by_path('trang-vay-the-chap-qsd-dat')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'trang-vay-the-chap-qsd-dat') echo 'active'; ?>">Vay thế chấp quyền sử dụng đất</a>
                            <a href="<?php echo get_permalink(get_page_by_path('huong-dan-chuyen-khoan')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'huong-dan-chuyen-khoan') echo 'active'; ?>">Hướng dẫn chuyển khoản</a>
                            <a href="<?php echo get_permalink(get_page_by_path('dang-ky-vay-von')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'dang-ky-vay-von') echo 'active'; ?>">Đăng ký vay vốn</a>
                        </div>
                    </div>

                    <!-- Gửi tiền tiết kiệm -->
                    <?php
                        $gt_pages = ['bang-lai-suat', 'huong-dan-tra-cuu-tai-khoan', 'dang-ky-gui-tien'];
                        $gt_active = in_array($current_slug, $gt_pages);
                    ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?php if ($gt_active) echo 'active'; ?>" data-bs-toggle="dropdown">Gửi tiền tiết kiệm</a>
                        <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                            <a href="<?php echo get_permalink(get_page_by_path('bang-lai-suat')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'bang-lai-suat') echo 'active'; ?>">Bảng lãi suất</a>
                            <a href="<?php echo get_permalink(get_page_by_path('huong-dan-tra-cuu-tai-khoan')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'huong-dan-tra-cuu-tai-khoan') echo 'active'; ?>">Tra cứu tài khoản</a>
                            <a href="<?php echo get_permalink(get_page_by_path('dang-ky-gui-tien')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'dang-ky-gui-tien') echo 'active'; ?>">Đăng ký gửi tiền</a>
                        </div>
                    </div>

                    <!-- Thông tin -->
                    <?php
                        $tt_pages = ['aboutus', 'gop-y', 'tuyen-dung', 'thanh-vien', 'dieu-le'];
                        $tt_active = in_array($current_slug, $tt_pages);
                    ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?php if ($tt_active) echo 'active'; ?>" data-bs-toggle="dropdown">Thông tin</a>
                        <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                            <a href="<?php echo get_permalink(get_page_by_path('aboutus')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'aboutus') echo 'active'; ?>">Về quỹ tín dụng</a>
                            <a href="<?php echo get_permalink(get_page_by_path('gop-y')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'gop-y') echo 'active'; ?>">Góp ý</a>
                            <a href="<?php echo get_permalink(get_page_by_path('tuyen-dung')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'tuyen-dung') echo 'active'; ?>">Tuyển dụng</a>
                            <a href="<?php echo get_permalink(get_page_by_path('thanh-vien')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'thanh-vien') echo 'active'; ?>">Thành viên</a>
                            <a href="<?php echo get_permalink(get_page_by_path('dieu-le')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'dieu-le') echo 'active'; ?>">Điều lệ</a>
                        </div>
                    </div>

                    <!-- Hỗ trợ -->
                    <?php
                        $ht_pages = ['cau-hoi-thuong-gap', 'bieu-mau', 'lien-he'];
                        $ht_active = in_array($current_slug, $ht_pages);
                    ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?php if ($ht_active) echo 'active'; ?>" data-bs-toggle="dropdown">Hỗ trợ</a>
                        <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                            <a href="<?php echo get_permalink(get_page_by_path('cau-hoi-thuong-gap')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'cau-hoi-thuong-gap') echo 'active'; ?>">Câu hỏi thường gặp</a>
                            <a href="<?php echo get_permalink(get_page_by_path('bieu-mau')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'bieu-mau') echo 'active'; ?>">Biểu mẫu</a>
                            <a href="<?php echo get_permalink(get_page_by_path('lien-he')); ?>"
                                class="dropdown-item <?php if ($current_slug == 'lien-he') echo 'active'; ?>">Liên hệ</a>
                        </div>
                    </div>

                    <!-- Tin tức -->
                    <div class="nav-item">
                        <a href="<?php echo get_permalink(get_page_by_path('tin-tuc')); ?>" 
                           class="nav-link <?php if ($current_slug == 'tin-tuc') echo 'active'; ?>">
                           Tin tức - Sự kiện
                        </a>
                    </div>
                </div>
                <div class="ms-auto d-none d-lg-block">
                    <a href="#" class="btn btn-primary py-2 px-3"><i class="fas fa-search"></i></a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
