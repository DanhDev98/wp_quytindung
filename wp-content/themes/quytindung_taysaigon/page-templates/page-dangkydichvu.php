<?php
/* Template Name: Trang Đăng ký các dịch vụ*/
get_header();  // Gọi file header.php
?>
<!-- Appoinment Start -->
<div class="container-fluid mt-6 mb-6 py-5 wow fadeIn" 
     style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php the_field('appoinment_background'); ?>') left center no-repeat; background-size: cover;" 
     data-wow-delay="0.1s">

    <div class="container pt-5">
        <div class="row gy-5 gx-0">
            <!-- Cột Thông tin -->
            <div class="col-lg-6 pe-lg-5 wow fadeIn" data-wow-delay="0.3s">
                <h1 class="display-6 text-uppercase text-white mb-4">
                    <?php the_field('heading_title'); ?>
                </h1>

                <p class="text-white mb-5 wow fadeIn" data-wow-delay="0.4s">
                    <?php the_field('heading_description'); ?>
                </p>

                <!-- Địa chỉ văn phòng -->
                <div class="d-flex align-items-start wow fadeIn" data-wow-delay="0.5s">
                    <div class="btn-lg-square bg-white">
                        <i class="bi bi-geo-alt text-dark fs-3"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-white text-uppercase">ĐỊA CHỈ VĂN PHÒNG</h6>
                        <span class="text-white"><?php the_field('office_address'); ?></span>
                    </div>
                </div>

                <hr class="bg-body">

                <!-- Thời gian làm việc -->
                <div class="d-flex align-items-start wow fadeIn" data-wow-delay="0.6s">
                    <div class="btn-lg-square bg-white">
                        <i class="bi bi-clock text-dark fs-3"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-white text-uppercase">THỜI GIAN LÀM VIỆC</h6>
                        <span class="text-white"><?php the_field('office_hours'); ?></span>
                    </div>
                </div>
            </div>

            <!-- Cột Form -->
            <div class="col-lg-6 mb-n5 wow fadeIn" data-wow-delay="0.7s">
    <?php echo do_shortcode('[contact-form-7 id="a20e42f" title="Form Đăng ký tư vấn"]'); ?>
</div>

            <!-- End cột form -->
        </div>
    </div>
</div>
<!-- Appoinment End -->


<!-- News start -->
<div class="container-fluid service pt-6 pb-6">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-6 text-uppercase mb-5">Tin tức và sự kiện</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <div class="service-inner pb-5">
                        <img class="img-fluid w-100"
                            src="<?php echo get_template_directory_uri(); ?> /assets/img/daihoidaibieu.png" alt="">
                        <div class="service-text px-5 pt-4">
                            <h5 class="text-uppercase fs-6">ĐẠI HỘI ĐẠI BIỂU THÀNH VIÊN 2024 NHIỆM KỲ 2023-2027 DIỄN
                                RA
                                TỐT ĐẸP</h4>
                                <p>Hỗ trợ khách hàng tiếp cận nguồn vốn với lãi suất cạnh tranh, thủ tục đơn giản và
                                    giải ngân nhanh chóng.
                                </p>
                        </div>
                        <a class="btn btn-light px-3" href="">Read More<i
                                class="bi bi-chevron-double-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-item">
                    <div class="service-inner pb-5">
                        <img class="img-fluid w-100"
                            src="<?php echo get_template_directory_uri(); ?> /assets/img/nghile30_4.png" alt="">
                        <div class="service-text px-5 pt-4">
                            <h5 class="text-uppercase fs-6">LỊCH NGHỈ LỄ NGÀY GIẢI PHÓNG MIỀN NAM- QUỐC TẾ LAO ĐỘNG
                                30/4
                                - 01/05</h4>
                                <p>Quỹ tín dụng Nhân dân Tây Sài Gòn xin trân trọng thông báo đến ....
                                </p>
                        </div>
                        <a class="btn btn-light px-3" href="">Read More<i
                                class="bi bi-chevron-double-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item">
                    <div class="service-inner pb-5">
                        <img class="img-fluid w-100"
                            src="<?php echo get_template_directory_uri(); ?> /assets/img/thongbaolai.png" alt="">
                        <div class="service-text px-5 pt-4">
                            <h5 class="text-uppercase fs-6">THÔNG BÁO LÃI SUẤT TIỀN GỬI TIẾT KIỆM TỪ NGÀY
                                01/04/2025
                                </h4>
                                <p>Qũy Tây Sài Gòn xin trân trọng thông báo đến quý khách hàng bảng L&Atild....
                                </p>
                        </div>
                        <a class="btn btn-light px-3" href="">Read More<i
                                class="bi bi-chevron-double-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="service-item">
                    <div class="service-inner pb-5">
                        <img class="img-fluid w-100"
                            src="<?php echo get_template_directory_uri(); ?> /assets/img/gioto.png" alt="">
                        <div class="service-text px-5 pt-4">
                            <h5 class="text-uppercase fs-6">LỊCH NGHỈ LỄ GIỖ TỔ HÙNG VƯƠNG 10/03 NĂM 2025</h4>
                                <p>THÔNG BÁO V/v: Lịch nghỉ Giỗ Tổ Hùng Vương 2025 (10/3 âm lịch) Quỹ t&iacu....
                                </p>
                        </div>
                        <a class="btn btn-light px-3" href="">Read More<i
                                class="bi bi-chevron-double-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- News End -->

<?php
get_footer();  // Gọi file footer.php
?>