<?php
/* Template Name: Trang Câu hỏi thường gặp */
get_header();  // Gọi file header.php
?>

<div class="faq-banner container wow fadeIn" data-wow-delay="0.1s">
    <img src="https://inleminh.com/wp-content/uploads/2019/07/faq.png"
        alt="Câu hỏi thường gặp - Quỹ Tín Dụng Tây Sài Gòn" />
</div>

<div class="faq-container">
    <h1 class="wow fadeInUp" data-wow-delay="0.5s">CÂU HỎI THƯỜNG GẶP</h1>

    <?php
    $args = array(
        'post_type' => 'flag',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
    );
    $faq_query = new WP_Query($args);

    if ($faq_query->have_posts()):
        while ($faq_query->have_posts()):
            $faq_query->the_post();
            $answer = get_field('faq_answer'); // ACF field bạn tạo tên là 'faq_answer'
            ?>
            <div class="faq-item wow fadeInLeft" data-wow-delay="0.3s">
                <button class="faq-question"><?php the_title(); ?></button>
                <div class="faq-answer">
                    <?php echo get_field('faq_answer', false, false); ?>
                </div>

            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    else:
        echo '<p>Chưa có câu hỏi nào được đăng.</p>';
    endif;
    ?>
</div>

<?php
get_footer();  // Gọi file footer.php
?>