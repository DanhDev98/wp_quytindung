<!-- sidebar.php -->


<aside class="sidebar bg-white rounded shadow-sm p-3">
    <h5 class="mb-4 text-danger border-bottom pb-2">📌 Tin nổi bật</h5>
    <?php
    $sidebar_args = array(
        'post_type'      => 'post',
        'posts_per_page' => 5,
        'orderby'        => 'comment_count', // Sắp xếp theo số bình luận
    );
    $sidebar_query = new WP_Query($sidebar_args);
    if ($sidebar_query->have_posts()):
        while ($sidebar_query->have_posts()):
            $sidebar_query->the_post();
    ?>
    <div class="d-flex mb-3 featured-item hover-shadow">
        <?php if (has_post_thumbnail()): ?>
        <a href="<?php the_permalink(); ?>" class="me-3">
            <?php the_post_thumbnail('thumbnail', ['class' => 'rounded', 'style' => 'width: 80px; height: 80px; object-fit: cover;']); ?>
        </a>
        <?php endif; ?>
        <div>
            <h6 class="mb-1 title-limit"><a href="<?php the_permalink(); ?>"
                    class="text-dark text-decoration-none"><?php the_title(); ?></a></h6>
            <small class="text-muted"><?php echo get_the_date('d/m/Y'); ?></small>
        </div>
    </div>
    <?php
        endwhile;
        wp_reset_postdata();
    else:
        echo '<p>Không có bài viết nổi bật.</p>';
    endif;
    ?>
</aside>