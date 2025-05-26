<?php
/* Template Name: Trang Biểu mẫu */
get_header();
?>

<div class="form-container">
    <h2 style="margin-top: 40px">BIỂU MẪU</h2>

    <?php
    $args = array(
        'post_type' => 'bieumau',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC'
    );
    $query = new WP_Query($args);
    if ($query->have_posts()):
        while ($query->have_posts()):
            $query->the_post();

            // Lấy ACF fields
            $name_file_1 = get_field('name_file1');
            $file_1 = get_field('file_1');
            $name_file_2 = get_field('name_file2');
            $file_2 = get_field('file_2');
            ?>

            <div class="form-item">
                <button class="form-title"><?php the_title(); ?></button>
                <div class="form-content">
                    <p>Tải mẫu:
                        <?php if ($file_1): ?>
                            <a href="<?= esc_url($file_1); ?>" download><?= esc_html($name_file_1); ?></a>
                        <?php endif; ?>

                        <?php if ($file_2): ?>
                            <?php if ($file_1): ?> | <?php endif; ?>
                            <a href="<?= esc_url($file_2); ?>" download><?= esc_html($name_file_2); ?></a>
                        <?php endif; ?>


                    </p>
                </div>


            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    else:
        echo '<p>Chưa có biểu mẫu nào.</p>';
    endif;
    ?>
</div>

<?php get_footer(); ?>