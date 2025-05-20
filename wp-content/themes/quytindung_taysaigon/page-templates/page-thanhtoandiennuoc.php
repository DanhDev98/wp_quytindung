<?php
/* Template Name: Trang Thanh Toán Diện Nước*/
get_header();  // Gọi file header.php
?>

<!-- Banner -->
<section class="banner">
    <h1 class="wow fadeInUp" data-wow-delay="0.5s">
        <?php the_field('billpay_banner_title'); ?>
    </h1>
    <p class="wow fadeInUp" data-wow-delay="0.7s">
        <?php the_field('billpay_banner_subtitle'); ?>
    </p>
</section>

<!-- Nội dung -->
<section class="container py-5">
    <h2 class="mb-4 text-primary wow fadeInLeft" data-wow-delay="0.2s">
        <?php the_field('billpay_section_title'); ?>
    </h2>

    <!-- Ưu điểm -->
    <div class="mb-4 p-3 border rounded shadow-sm bg-white wow fadeInRight" data-wow-delay="0.3s">
        <h5 class="text-danger fw-bold mb-3 text-uppercase">
            <i class="bi bi-star-fill text-danger me-2"></i>
            ưu điểm
        </h5>
        <ul>
            <?php if(get_field('billpay_advantage_1')): ?><li><?php the_field('billpay_advantage_1'); ?></li><?php endif; ?>
            <?php if(get_field('billpay_advantage_2')): ?><li><?php the_field('billpay_advantage_2'); ?></li><?php endif; ?>
            <!-- <?php if(get_field('billpay_advantage_3')): ?><li><?php the_field('billpay_advantage_3'); ?></li><?php endif; ?> -->
        </ul>
    </div>

    <!-- Thủ tục -->
    <div class="mb-4 p-3 border rounded shadow-sm bg-white wow fadeInRight" data-wow-delay="0.3s">
        <h5 class="text-danger fw-bold mb-3 text-uppercase">
            <i class="bi bi-star-fill text-danger me-2"></i>
            thủ tục thanh toán
        </h5>
        <p><?php the_field('billpay_procedure_content'); ?></p>
        <div class="d-flex justify-content-center wow fadeIn" data-wow-delay="0.5s">
            <img src="<?php the_field('billpay_procedure_image'); ?>" class="img-fluid rounded" alt="Thanh toán điện nước" />
        </div>
    </div>
</section>


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
                 <div class="bg-white p-5">
                     <?php echo do_shortcode('[contact-form-7 id="f2297e9" title="Form thông tin hóa đơn điện nước"]'); ?>
                 </div>
</div>

            <!-- End cột form -->
        </div>
    </div>
</div>
<!-- Appoinment End -->


<?php
get_footer();  // Gọi file footer.php
?>