<?php
/* Template Name: Trang Hướng dẫn chuyển khoản*/
get_header();  // Gọi file header.php
?>
<!-- content huong dan -->
<div class="container py-5 ">
    <div class="guide-header wow lightSpeedIn" data-wow-delay="0.2s">
        <img src="https://timo.vn/wp-content/uploads/cach-lay-tien-chuyen-khoan-nham-tai-viet-nam.jpg"
            alt="Chuyển khoản">
        <div class="title-section">
            <span>📌</span> HƯỚNG DẪN CHUYỂN KHOẢN
        </div>
    </div>

    <div class="bank-info text-center wow fadeInUp" data-wow-delay="0.4s">
        <div class="p-4">
            <img src="https://tindungtaysaigon.com/quanly/img/logo/16017891741601547718Artboard%2012logo%20QTD%20chan%20trang.png"
                width="80" class="mb-2" alt="Logo Quỹ">
            <h5 class="guide-title">HƯỚNG DẪN<br>CHUYỂN KHOẢN TRẢ LÃI, GỐC</h5>

            <div class="mt-4 text-start bank-transfer-box p-4 rounded shadow-sm bg-light">
                <p class="label mb-2 fw-bold">
                    <span class="icon me-2">⭐</span> NỘI DUNG CHUYỂN KHOẢN
                </p>
                <p class="section-note fst-italic text-danger">
                    <?php the_field('transfer_note'); ?>
                </p>

                <p class="label mt-4 mb-2 fw-bold">
                    <span class="icon me-2">🔁</span> CHUYỂN VỀ MỘT TRONG HAI TÀI KHOẢN SAU
                </p>

                <div class="bank-account mb-3">
                    <span class="highlight d-block fw-bold text-primary">➤ <?php the_field('bank_1_number'); ?></span>
                    <span><?php the_field('bank_1_name'); ?></span>
                </div>

                <div class="bank-account">
                    <span class="highlight d-block fw-bold text-primary">➤ <?php the_field('bank_2_number'); ?></span>
                    <span><?php the_field('bank_2_name'); ?></span>
                </div>
            </div>

        </div>

        <img src="https://t3.ftcdn.net/jpg/02/14/94/78/360_F_214947872_0buOruh9TiFyu9S3BT1sH6Bhvj6R2v0s.jpg"
            alt="footer" class="footer-img wow fadeInRight" data-wow-delay="0.6s">
    </div>
</div>
<!-- end content huong dan -->

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