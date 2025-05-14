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

    <!-- Topbar Start -->
    <div class="container-fluid bg-primary text-white d-none d-lg-flex wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-2">
            <div class="d-flex align-items-center">
                <a href="<?php echo home_url(); ?>">
                    <img src="https://tindungtaysaigon.com/quanly/img/logo/16017891741601547718Artboard 12logo QTD chan trang.png"
                        alt="Logo" class="img-fluid" style="max-width: 80px; height: auto;">
                </a>
                <div class="ms-auto d-flex align-items-center">
                    <small class="ms-4"><i class="fa fa-map-marker-alt me-3"></i>2276 Vĩnh Lộc, Ấp 4, X. Vĩnh Lộc B, H.
                        Bình Chánh</small>
                    <small class="ms-4"><i class="fa fa-envelope me-3"></i>quytindungtaysaigon@gmail.com</small>
                    <small class="ms-4"><i class="fa fa-phone-alt me-3"></i>028.3765.6224</small>
                    <div class="ms-3 d-flex">
                        <a class="btn btn-sm-square btn-light text-primary ms-2" href="#"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-sm-square btn-light text-primary ms-2" href="#"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-sm-square btn-light text-primary ms-2" href="#"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0">
                <a href="<?php echo home_url(); ?>" class="navbar-brand d-lg-none">
                    <img src="https://tindungtaysaigon.com/quanly/img/logo/16017891741601547718Artboard 12logo QTD chan trang.png"
                        alt="Logo" class="img-fluid" style="max-width: 80px; height: auto;">
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="<?php echo home_url(); ?>" class="nav-item nav-link active">Trang chủ</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Dịch vụ</a>
                            <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                                <a href="<?php echo get_permalink(get_page_by_path('Chuyentiennhanh-page')); ?>"
                                    class="dropdown-item">Chuyển tiền nhanh</a>
                                <a href="<?php echo get_permalink(get_page_by_path('thanhtoandiennuoc-page')); ?>"
                                    class="dropdown-item">Thanh toán điện nước</a>
                                <a href="<?php echo get_permalink(get_page_by_path('bao-quan-tai-san-page')); ?>"
                                    class="dropdown-item">Bảo quản tài sản</a>
                                <a href="<?php echo get_permalink(get_page_by_path('trang-dang-ky-dich-vu')); ?>"
                                    class="dropdown-item">Đăng ký dịch vụ</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Vay vốn</a>
                            <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                                <a href="<?php echo get_permalink(get_page_by_path('trang-vay-uu-dai')); ?>"
                                    class="dropdown-item">Vay ưu đãi</a>
                                <a href="<?php echo get_permalink(get_page_by_path('trang-vay-tin-chap')); ?>"
                                    class="dropdown-item">Vay tín chấp</a>
                                <a href="<?php echo get_permalink(get_page_by_path('trang-cam-co-so-tiet-kiem')); ?>"
                                    class="dropdown-item">Vay cầm cố sổ gửi tiền tiết kiệm</a>
                                <a href="<?php echo get_permalink(get_page_by_path('trang-vay-the-chap-qsd-dat')); ?>"
                                    class="dropdown-item">Vay thế chấp quyền sử dụng đất</a>
                                <a href="<?php echo get_permalink(get_page_by_path('huong-dan-chuyen-khoan')); ?>"
                                    class="dropdown-item">Hướng dẫn chuyển khoản trả lãi, gốc</a>
                                <a href="<?php echo get_permalink(get_page_by_path('trang-dang-ky-dich-vu')); ?>"
                                    class="dropdown-item">Đăng ký vay vốn</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Gửi tiền tiết
                                kiệm</a>
                            <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                                <a href="<?php echo get_permalink(get_page_by_path('bang-lai-suat')); ?>"
                                    class="dropdown-item">Bảng lãi suất tiền gửi tiết kiệm</a>
                                <a href="<?php echo get_permalink(get_page_by_path('huong-dan-tra-cuu-tai-khoan')); ?>"
                                    class="dropdown-item">Hướng dẫn tra cứu tài khoản</a>
                                <a href="<?php echo get_permalink(get_page_by_path('trang-dang-ky-dich-vu')); ?>"
                                    class="dropdown-item">Đăng ký gửi tiền</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Thông tin</a>
                            <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                                <a href="<?php echo get_permalink(get_page_by_path('aboutus')); ?>"
                                    class="dropdown-item">Về quỹ tín dụng Tây Sài Gòn</a>
                                <a href="<?php echo get_permalink(get_page_by_path('gop-y')); ?>"
                                    class="dropdown-item">Góp ý</a>
                                <a href="<?php echo get_permalink(get_page_by_path('tuyen-dung')); ?>"
                                    class="dropdown-item">Tuyển dụng</a>
                                <a href="<?php echo get_permalink(get_page_by_path('thanh-vien')); ?>"
                                    class="dropdown-item">Thành viên</a>
                                <a href="<?php echo get_permalink(get_page_by_path('dieu-le')); ?>"
                                    class="dropdown-item">Điều lệ</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Hỗ trợ</a>
                            <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                                <a href="<?php echo get_permalink(get_page_by_path('cau-hoi-thuong-gap')); ?>" class="dropdown-item">Câu hỏi thường gặp</a>
                                <a href="<?php echo get_permalink(get_page_by_path('bieu-mau')); ?>" class="dropdown-item">Biểu mẫu</a>
                                <a href="<?php echo get_permalink(get_page_by_path('lien-he')); ?>" class="dropdown-item">Liên hệ</a>
                            </div>
                        </div>
                        <div class="nav-item ">
                            <a href="<?php echo get_permalink(get_page_by_path('tin-tuc')); ?>" class="nav-link ">Tin tức - Sự kiện</a>
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