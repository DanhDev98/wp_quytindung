<?php
/* Template Name: Trang Bảo quản tài sản*/
get_header();  // Gọi file header.php
?>
<!-- Banner Bảo Quản Tài Sản -->
<div class="position-relative wow fadeIn" data-wow-delay="0.5s">
    <div class="title-3d position-absolute top-50 start-50 translate-middle wow fadeIn" data-wow-delay="0.5s"
        style="z-index: 200;">
        <?php the_field('asset_banner_title'); ?>
    </div>
    <img src="<?php the_field('asset_banner_image'); ?>" alt="Bảo quản tài sản" class="w-100 about-img header-image">
</div>

<div class="container">

    <!-- Giới thiệu -->
    <div class="glass-box wow fadeInRight" data-wow-delay="0.5s">
        <div class="section-title wow fadeInRight" data-wow-delay="0.5s">
            <?php the_field('asset_intro_title'); ?>
        </div>
        <p class="wow fadeInRight" data-wow-delay="0.5s">
            <?php the_field('asset_intro_content'); ?>
        </p>
    </div>

    <!-- Tài sản được bảo quản -->
    <div class="glass-box wow fadeInRight" data-wow-delay="0.5s">
        <div class="section-title wow fadeInRight" data-wow-delay="0.5s">
            <?php the_field('asset_types_title'); ?>
        </div>
        <ul class="wow fadeInRight" data-wow-delay="0.5s">
            <?php if (get_field('asset_type_1')) : ?><li><?php the_field('asset_type_1'); ?></li><?php endif; ?>
            <?php if (get_field('asset_type_2')) : ?><li><?php the_field('asset_type_2'); ?></li><?php endif; ?>
            <?php if (get_field('asset_type_3')) : ?><li><?php the_field('asset_type_3'); ?></li><?php endif; ?>
        </ul>
    </div>

    <!-- Lợi ích -->
    <div class="glass-box wow fadeInRight" data-wow-delay="0.5s">
        <div class="section-title wow fadeInRight" data-wow-delay="0.5s">
            <?php the_field('asset_benefits_title'); ?>
        </div>
        <ul class="wow fadeInRight" data-wow-delay="0.5s">
            <?php if (get_field('asset_benefit_1')) : ?><li><?php the_field('asset_benefit_1'); ?></li><?php endif; ?>
            <?php if (get_field('asset_benefit_2')) : ?><li><?php the_field('asset_benefit_2'); ?></li><?php endif; ?>
            <?php if (get_field('asset_benefit_3')) : ?><li><?php the_field('asset_benefit_3'); ?></li><?php endif; ?>
            <?php if (get_field('asset_benefit_4')) : ?><li><?php the_field('asset_benefit_4'); ?></li><?php endif; ?>
        </ul>
    </div>

</div>

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
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4,
                'orderby' => 'date',
                'order' => 'DESC',
            );
            $query = new WP_Query($args);
            if ($query->have_posts()):
                $delay = 0.1;
                while ($query->have_posts()):
                    $query->the_post(); ?>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                <div class="service-item">
                    <div class="service-inner pb-5">
                        <?php if (has_post_thumbnail()): ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium', ['class' => 'img-fluid w-100']); ?>
                        </a>
                        <?php endif; ?>
                        <div class="service-text px-5 pt-4">
                            <h5 class="text-uppercase fs-6">
                                <a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a>
                            </h5>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                        </div>
                        <a class="btn btn-light px-3" href="<?php the_permalink(); ?>">
                            Read More<i class="bi bi-chevron-double-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php
                    $delay += 0.1;
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</div>

<!-- News End -->


<?php
get_footer();  // Gọi file footer.php
?>