<?php
/* Template Name: Trang Vay tín chấp*/
get_header();  // Gọi file header.php
?>

<div class="container-fluid service pt-2 pb-2 mt-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-6 text-uppercase "><?php the_field('main_title'); ?></h1>
            <h1 class="display-6 text-uppercase fs-5 "><?php the_field('subtitle'); ?></h1>
        </div>

        <div class="section wow fadeIn">
            <h2><?php the_field('condition_title'); ?></h2>
            <ul>
                <?php 
                $conditions = get_field('conditions');
                if ($conditions) {
                    $items = explode("\n", trim($conditions));
                    foreach ($items as $item) {
                        echo '<li>' . esc_html($item) . '</li>';
                    }
                }
                ?>
            </ul>
        </div>

        <div class="section wow fadeIn">
            <h2><?php the_field('document_title'); ?></h2>
            <ul>
                <?php 
                $documents = get_field('documents');
                if ($documents) {
                    $items = explode("\n", trim($documents));
                    foreach ($items as $item) {
                        echo '<li>' . esc_html($item) . '</li>';
                    }
                }
                ?>
            </ul>
        </div>

        <div class="section wow fadeIn">
            <h2><?php the_field('benefit_title'); ?></h2>
            <ul>
                <?php 
                $benefits = get_field('benefits');
                if ($benefits) {
                    $items = explode("\n", trim($benefits));
                    foreach ($items as $item) {
                        echo '<li>' . esc_html($item) . '</li>';
                    }
                }
                ?>
            </ul>
        </div>

        <div class="d-flex justify-content-center wow fadeIn">
            <a href="#my-appoinment" class="btn btn-primary w-30% py-3" type="submit">Liên lạc ngay</a>
        </div>
    </div>
</div>
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