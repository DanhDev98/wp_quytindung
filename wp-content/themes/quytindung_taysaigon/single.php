<?php get_header(); ?>

<div class="container py-5 single-post-page">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Trang chủ</a></li>
            <li class="breadcrumb-item">
                <a href="<?php echo get_permalink(get_page_by_path('tin-tuc')); ?>">Tin tức</a>
            </li>

            <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
        </ol>
    </nav>

    <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <div class="row">
        <div class="col-lg-8">
            <article class="mb-5">
                <h1 class="mb-3"><?php the_title(); ?></h1>
                <div class="mb-3 text-muted small">
                    <span>Đăng ngày <?php echo get_the_date('d/m/Y'); ?></span> |
                    <span>Chuyên mục: <?php the_category(', '); ?></span>
                </div>

                <?php if (has_post_thumbnail()): ?>
                <div class="mb-4">
                    <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded']); ?>
                </div>
                <?php endif; ?>

                <div class="post-content mb-4">
                    <?php the_content(); ?>
                </div>

                <?php if (get_the_tags()): ?>
                <div class="tags mb-4">
                    <strong>Tags:</strong>
                    <?php the_tags('', ', ', ''); ?>
                </div>
                <?php endif; ?>
            </article>

            <!-- Bài viết liên quan -->
            <div class="related-posts">
                <h4 class="mb-4">Bài viết liên quan</h4>
                <div class="row">
                    <?php
                        $related_args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => 3,
                            'post__not_in'   => [get_the_ID()],
                            'category__in'   => wp_get_post_categories(get_the_ID()),
                        );
                        $related_query = new WP_Query($related_args);
                        if ($related_query->have_posts()):
                            while ($related_query->have_posts()):
                                $related_query->the_post();
                        ?>
                    <div class="col-md-4 mb-3">
                        <div class="card h-100">
                            <?php if (has_post_thumbnail()): ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                            </a>
                            <?php endif; ?>
                            <div class="card-body">
                                <h6 class="card-title"><?php the_title(); ?></h6>
                                <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                    <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>