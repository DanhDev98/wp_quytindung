<?php
/* Template Name: Trang Thành viên*/
get_header();  // Gọi file header.php
?>
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<div class="container team-section wow fadeInUp" data-wow-delay="0.2s" data-aos="fade-up">
    <img src="https://tindungtaysaigon.com/quanly/img/logo/16017891741601547718Artboard%2012logo%20QTD%20chan%20trang.png"
        alt="Logo Quỹ" class="logo-top wow fadeInLeft" data-wow-delay="0.3s">
    <h2 class="wow fadeInLeft" data-wow-delay="0.4s">Danh sách thành viên trong Qũy tín dụng</h2>
    <p class="wow fadeInLeft" data-wow-delay="0.5s">Đội ngũ điều hành giàu kinh nghiệm của Quỹ Tín Dụng Tây Sài Gòn</p>

    <div class="row g-4 justify-content-center">
        <?php
        $team_query = new WP_Query(array(
            'post_type' => 'team',
            'posts_per_page' => -1 // Hiển thị tất cả thành viên
        ));

        $delay = 0; // Đếm delay cho animation AOS
        
        while ($team_query->have_posts()):
            $team_query->the_post();

            $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            // $role = get_the_content(); // Vai trò
            $email = get_field('email');
            $phone = get_field('phone-number');

            // Tạo độ trễ cho hiệu ứng AOS
            $delay += 100;
            if ($delay > 200)
                $delay = 0; // Reset sau 300ms
            ?>
            <div class="col-md-4 col-sm-6 wow fadeInLeft" data-wow-delay="0.3s" data-aos="zoom-in"
                data-aos-delay="<?= $delay ?>">
                <div class="team-card">
                    <img src="<?= esc_url($image); ?>" alt="<?= esc_attr(get_the_title()); ?>" class="team-image">
                    <div class="team-name"><?= esc_html(get_the_title()); ?></div>
                    <div class="team-role"><?= wp_strip_all_tags(get_the_content(), true); ?></div>

                    <?php if ($email): ?>
                        <div class="team-contact">📧 <?= esc_html($email); ?></div>
                    <?php endif; ?>
                    <?php if ($phone): ?>
                        <div class="team-hotline">📞 <?= esc_html($phone); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile;
        wp_reset_postdata(); ?>
    </div>

</div>
<?php
get_footer();  // Gọi file footer.php
?>