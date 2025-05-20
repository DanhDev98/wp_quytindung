<?php
/* Template Name: Trang Chủ*/
get_header(); ?>
<?php
$banner1 = get_field('banner_1');
$banner2 = get_field('banner_2');
$banner3 = get_field('banner_3');


// Chỉ lấy những ảnh đã có
$banners = array_filter([$banner1, $banner2, $banner3]);
?>

<!-- Carousel Start -->
<?php if (!empty($banners)): ?>
    <div class="container-fluid p-0 mb-6 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php foreach ($banners as $index => $img_url): ?>
                    <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="<?php echo $index; ?>"
                        class="<?php echo $index === 0 ? 'active' : ''; ?>" aria-label="Slide <?php echo $index + 1; ?>">
                        <img class="img-fluid" src="<?php echo esc_url($img_url); ?>" alt="Slide <?php echo $index + 1; ?>">
                    </button>
                <?php endforeach; ?>
            </div>
            <div class="carousel-inner">
                <?php foreach ($banners as $index => $img_url): ?>
                    <div class="carousel-item banner_img <?php echo $index === 0 ? 'active' : ''; ?>">
                        <img class="w-100 img-banner" src="<?php echo esc_url($img_url); ?>" alt="Slide <?php echo $index + 1; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- Carousel End -->


<!-- About Start -->
<?php
$about_img = get_field('about_image');
$about_title = get_field('about_title');
$about_desc = get_field('about_desc');
$benefit_1 = get_field('benefit_1');
$benefit_2 = get_field('benefit_2');
$benefit_3 = get_field('benefit_3');
$commitment = get_field('commitment_text');
?>
<div class="container-fluid pt-6 pb-6">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img">
                    <img class="img-fluid w-100" src="<?php echo esc_url($about_img); ?>" alt="Giới thiệu">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="display-6 text-uppercase mb-4"><?php echo esc_html($about_title); ?></h1>
                <p class="mb-4"><?php echo esc_html($about_desc); ?></p>
                <div class="row g-5 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-xl-square bg-light me-3">
                                <i class="fa fa-users-cog fa-2x text-primary"></i>
                            </div>
                            <h5 class="lh-base text-uppercase mb-0">Đội ngũ tư vấn tận tâm & giàu kinh nghiệm</h5>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-xl-square bg-light me-3">
                                <i class="fa fa-tachometer-alt fa-2x text-primary"></i>
                            </div>
                            <h5 class="lh-base text-uppercase mb-0">Dịch vụ tài chính linh hoạt, uy tín</h5>
                        </div>
                    </div>
                </div>
                <p><i class="fa fa-check-square text-primary me-3"></i><?php echo esc_html($benefit_1); ?></p>
                <p><i class="fa fa-check-square text-primary me-3"></i><?php echo esc_html($benefit_2); ?></p>
                <p><i class="fa fa-check-square text-primary me-3"></i><?php echo esc_html($benefit_3); ?></p>
                <div class="border border-5 border-primary p-4 text-center mt-4">
                    <h4 class="lh-base text-uppercase mb-0"><?php echo esc_html($commitment); ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Features Start -->
<!-- Features Start -->
<?php
$services = [];

for ($i = 1; $i <= 4; $i++) {
    $services[] = [
        'icon' => get_field("service_{$i}_icon") ?: '',
        'title' => get_field("service_{$i}_title") ?: "Tiêu đề box $i",
        'desc' => get_field("service_{$i}_desc") ?: "Mô tả ngắn cho dịch vụ $i",
        'link' => get_field("service_{$i}_link") ?: "#"
    ];
}
?>
<div class="container-fluid pt-6 pb-6">
    <div class="container pt-4">
        <div class="row g-0 feature-row wow fadeIn" data-wow-delay="0.1s">
            <?php
            $delay = 0.3;
            foreach ($services as $index => $service):
                ?>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="<?= number_format($delay, 1) ?>s">
                    <div class="feature-item border h-100">
                        <div class="feature-icon btn-xxl-square bg-primary mb-4 mt-n4">
                            <i class="fa <?= esc_attr($service['icon']) ?> fa-2x text-white"></i>
                        </div>
                        <div class="p-5 pt-0">
                            <h5 class="text-uppercase mb-3"><?= esc_html($service['title']) ?></h5>
                            <p><?= esc_html($service['desc']) ?></p>
                            <a class="position-relative text-body text-uppercase small d-flex justify-content-between"
                                href="<?= esc_url($service['link']) ?>">
                                <b class="bg-white pe-3">Read More</b>
                                <i class="bi bi-arrow-right bg-white ps-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                $delay += 0.1;
            endforeach;
            ?>
        </div>
    </div>
</div>
<!-- Features End -->




<!-- Features Start -->
<?php
$title = get_field('banner_title');
$desc = get_field('banner_description');
$bg = get_field('banner_background');
$customers = get_field('total_customers');
$transactions = get_field('total_transactions');
$exp = get_field('experience_percent');
$complete = get_field('completion_percent');
?>
<div class="container-fluid feature mt-6 mb-6 wow fadeIn" data-wow-delay="0.1s"
    style="background-image: url('<?php the_field('banner_background'); ?>'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row g-0 justify-content-end">
            <div class="col-lg-6 pt-5">
                <div class="mt-5">
                    <h1 class="display-6 text-white text-uppercase mb-4 wow fadeIn" data-wow-delay="0.3s">
                        <?php the_field('banner_title'); ?>
                    </h1>
                    <p class="text-light mb-4 wow fadeIn" data-wow-delay="0.4s">
                        <?php the_field('banner_description'); ?>
                    </p>
                    <div class="row g-4 pt-2 mb-4">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                            <div class="flex-column text-center border border-5 border-primary p-5">
                                <h1 class="text-white" data-toggle="counter-up">
                                    <?php the_field('total_customers'); ?>
                                </h1>
                                <p class="text-white text-uppercase mb-0">Khách hàng tin dùng</p>
                            </div>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="flex-column text-center border border-5 border-primary p-5">
                                <h1 class="text-white" data-toggle="counter-up">
                                    <?php the_field('total_transactions'); ?>
                                </h1>
                                <p class="text-white text-uppercase mb-0">Giao dịch thành công</p>
                            </div>
                        </div>
                    </div>
                    <div class="border border-5 border-primary border-bottom-0 p-5">
                        <div class="experience mb-4 wow fadeIn" data-wow-delay="0.6s">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-white text-uppercase">Kinh nghiệm</span>
                                <span class="text-white">
                                    <?php the_field('experience_percent'); ?>%
                                </span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar"
                                    style="width: <?php the_field('experience_percent'); ?>%;"
                                    aria-valuenow="<?php the_field('experience_percent'); ?>" aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                        <div class="experience wow fadeIn" data-wow-delay="0.7s">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-white text-uppercase">Hoàn thành</span>
                                <span class="text-white">
                                    <?php the_field('completion_percent'); ?>%
                                </span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar"
                                    style="width: <?php the_field('completion_percent'); ?>%;"
                                    aria-valuenow="<?php the_field('completion_percent'); ?>" aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div> <!-- end border box -->
                </div> <!-- end mt-5 -->
            </div> <!-- end col-lg-6 -->
        </div> <!-- end row -->
    </div> <!-- end container -->
</div> <!-- end container-fluid -->

<!-- Features End -->


<!-- Service Start -->
<div class="container-fluid service pt-6 pb-6">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-6 text-uppercase mb-5">Dịch vụ nổi bật</h1>
        </div>
        <div class="row g-4">
            <?php
            $args = array(
                'post_type' => 'dichvu',
                'posts_per_page' => 8, // Số lượng dịch vụ
            );
            $query = new WP_Query($args);
            if ($query->have_posts()):
                $delay = 0.1;
                while ($query->have_posts()):
                    $query->the_post();
                    ?>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                        <div class="service-item">
                            <div class="service-inner pb-5">
                                <?php if (has_post_thumbnail()): ?>
                                    <img class="img-fluid w-100" src="<?php the_post_thumbnail_url('medium'); ?>" alt="">
                                <?php endif; ?>
                                <div class="service-text px-5 pt-4">
                                    <h5 class="text-uppercase"><?php the_title(); ?></h5>
                                    <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
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

<!-- Service End -->

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



<!-- Team Start -->
<div class="container-fluid team pt-6 pb-6">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-6 text-uppercase mb-5">GẶP GỠ ĐỘI NGŨ CHUYÊN GIA TÀI CHÍNH CỦA CHÚNG TÔI</h1>
        </div>
        <div class="row g-4">
            <?php
            $team_query = new WP_Query(array(
                'post_type' => 'team',
                'posts_per_page' => 4
            ));
            while ($team_query->have_posts()):
                $team_query->the_post();
                $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                $facebook = get_field('facebook_url');
                $twitter = get_field('twitter_url');
                $linkedin = get_field('linkedin_url');
                $youtube = get_field('youtube_url');
                ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="<?= esc_url($image); ?>"
                                alt="<?= esc_attr(get_the_title()); ?>">
                            <div class="team-social">
                                <?php if ($facebook): ?>
                                    <a class="btn btn-square btn-dark mx-1" href="<?= esc_url($facebook); ?>"><i
                                            class="fab fa-facebook-f"></i></a>
                                <?php endif; ?>
                                <?php if ($twitter): ?>
                                    <a class="btn btn-square btn-dark mx-1" href="<?= esc_url($twitter); ?>"><i
                                            class="fab fa-twitter"></i></a>
                                <?php endif; ?>
                                <?php if ($linkedin): ?>
                                    <a class="btn btn-square btn-dark mx-1" href="<?= esc_url($linkedin); ?>"><i
                                            class="fab fa-linkedin-in"></i></a>
                                <?php endif; ?>
                                <?php if ($youtube): ?>
                                    <a class="btn btn-square btn-dark mx-1" href="<?= esc_url($youtube); ?>"><i
                                            class="fab fa-youtube"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-1"><?= get_the_title(); ?></h5>
                            <span><?php the_content(); ?></span>
                        </div>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
    </div>
</div>

<!-- Team End -->

<?php get_footer(); ?>