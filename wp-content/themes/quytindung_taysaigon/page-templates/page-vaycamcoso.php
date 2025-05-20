<?php
/* Template Name: Trang Vay cầm cố sổ tiết kiệm*/
get_header();  // Gọi file header.php
?>
<div class="container my-5">
    <div class="highlight-section wow wobble" data-wow-delay="0.2s">
        <div class="row align-items-center wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-md-6">
                <img src="<?php the_field('image_url'); ?>" alt="Hình minh họa" class="img-fluid">
            </div>
            <div class="col-md-6 highlight-content">
                <h3 class="text-uppercase"><?php the_field('title'); ?></h3>
                <p><?php the_field('description'); ?></p>
                <ul class="text-start">
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
        </div>
    </div>


    <div class="section-title mt-5 wow fadeInRight" data-wow-delay="0.5s">* ƯU ĐIỂM</div>
    <div class="row g-4 mt-3">
        <?php for ($i = 1; $i <= 4; $i++) : ?>
        <div class="col-md-3">
            <div class="benefit-box wow tada" data-wow-delay="0.2s">
                <h6 class="fw-bold"><?php the_field('benefit_' . $i . '_title'); ?></h6>
                <p><?php the_field('benefit_' . $i . '_description'); ?></p>
            </div>
        </div>
        <?php endfor; ?>
    </div>


    <div class="section-title mb-3 wow fadeInRight" data-wow-delay="0.2s">* TIỆN ÍCH VỀ SẢN PHẨM</div>
    <ul class="wow flip" data-wow-delay="0.2s">
        <?php
    $product_utilities = get_field('product_utilities');
    if ($product_utilities) {
        $items = explode("\n", trim($product_utilities));
        foreach ($items as $item) {
            echo '<li>' . esc_html($item) . '</li>';
        }
    }
    ?>
    </ul>

    <div class="section-title mb-3 wow fadeInRight" data-wow-delay="0.2s">* ĐỐI TƯỢNG VAY VỐN</div>
    <ul class="wow flip" data-wow-delay="0.2s">
        <?php
    $loan_applicants = get_field('loan_applicants');
    if ($loan_applicants) {
        $items = explode("\n", trim($loan_applicants));
        foreach ($items as $item) {
            echo '<li>' . esc_html($item) . '</li>';
        }
    }
    ?>
    </ul>

    <div class="section-title mb-3 wow fadeInRight" data-wow-delay="0.5s">* THỦ TỤC VAY VỐN</div>
    <ul class="wow flip" data-wow-delay="0.2s">
        <?php
    $loan_procedures = get_field('loan_procedures');
    if ($loan_procedures) {
        $items = explode("\n", trim($loan_procedures));
        foreach ($items as $item) {
            echo '<li>' . esc_html($item) . '</li>';
        }
    }
    ?>
    </ul>
    <div class="d-flex justify-content-center wow fadeIn">
        <a href="#my-appoinment" class="btn btn-primary w-30% py-3" type="submit">Đăng ký vay ngay</a>
    </div>

</div>

<!-- Appoinment Start -->
<div class="container-fluid mt-6 mb-6 py-5 wow fadeIn"
    style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php the_field('appoinment_background'); ?>') left center no-repeat; background-size: cover;"
    data-wow-delay="0.1s" # id="my-appoinment">

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