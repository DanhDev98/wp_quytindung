<?php
/* Template Name: Trang Vay ưu đãi*/
get_header();  // Gọi file header.php
?>

<!-- Header Hero Vay Ưu Đãi -->
 <?php
$background_image = get_field('loan_hero_background');
?>
<header class="hero" style="background: url('<?php echo esc_url($background_image); ?>') center/cover no-repeat;">
    <div class="overlay">
        <h1 class="wow fadeIn" data-wow-delay="0.3s"><?php the_field('loan_hero_title'); ?></h1>
        <p class="wow fadeIn" data-wow-delay="0.3s"><?php the_field('loan_hero_subtitle'); ?></p>
        <a href="#my-appoinment" class="btn btn-primary w-30% py-3 fs-5 wow fadeIn" data-wow-delay="0.3s" type="submit">
            <?php the_field('loan_hero_cta'); ?>
        </a>
    </div>
</header>


<!-- Lợi ích -->
<section class="benefits">
    <h2 class="wow fadeInLeft" data-wow-delay="0.3s"><?php the_field('loan_benefits_title'); ?></h2>
    <div class="cards">

        <!-- Benefit 1 -->
        <div class="card wow fadeIn" data-wow-delay="0.2s">
            <img src="https://cdn-icons-png.flaticon.com/512/2920/2920322.png" alt="Lãi suất thấp">
            <h3><?php the_field('benefit_1_title'); ?></h3>
            <p><?php the_field('benefit_1_desc'); ?></p>
        </div>

        <!-- Benefit 2 -->
        <div class="card wow fadeIn" data-wow-delay="0.7s">
            <img src="https://cdn-icons-png.flaticon.com/512/3270/3270591.png" alt="Xét duyệt nhanh">
            <h3><?php the_field('benefit_2_title'); ?></h3>
            <p><?php the_field('benefit_2_desc'); ?></p>
        </div>

        <!-- Benefit 3 -->
        <div class="card wow fadeIn" data-wow-delay="1.2s">
            <img src="https://cdn-icons-png.flaticon.com/512/3233/3233263.png" alt="Hỗ trợ tận tâm">
            <h3><?php the_field('benefit_3_title'); ?></h3>
            <p><?php the_field('benefit_3_desc'); ?></p>
        </div>

    </div>
</section>


<!-- Appoinment Start -->
<div class="container-fluid mt-6 mb-6 py-5 wow fadeIn" 
     style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php the_field('appoinment_background'); ?>') left center no-repeat; background-size: cover;" 
     data-wow-delay="0.1s"#
     id="my-appoinment">

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
<?php
get_footer();  // Gọi file footer.php
?>