<?php get_header(); ?>

<div class="container pt-5">
    <!-- Hộp tìm kiếm -->
    <div class="search-box pb-2">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="d-flex w-100">
            <input type="search" name="s" class="form-control" placeholder="Tìm kiếm..."
                value="<?php echo get_search_query(); ?>" required>
            <button type="submit" class="btn btn-primary ms-2">Search</button>
        </form>
    </div>

    <!-- Tổng số kết quả -->
    <div class="results-count mb-4">
        <?php
        $total_results = $wp_query->found_posts;
        echo $total_results . ' kết quả được tìm thấy';
        ?>
    </div>

    <!-- Danh sách kết quả -->
    <div id="resultsList" class="pt-3">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="result-item d-flex gap-3 mb-4 border-bottom pb-3 align-items-start">
            <?php if (has_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title(); ?>" width="60"
                height="auto">
            <?php else : ?>
            <img src="https://dummyimage.com/60x30/cccccc/000&text=No+Img" alt="No image" width="60">
            <?php endif; ?>
            <div class="result-info">
                <a href="<?php the_permalink(); ?>"
                    class="fw-bold text-decoration-none text-primary"><?php the_title(); ?></a>
                <p class="mb-0 mt-1 text-muted" style="font-style: italic;">
                    <?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
            </div>
        </div>
        <?php endwhile; ?>

        <!-- Phân trang -->
        <div class="pagination mt-4 text-center">
            <?php
            echo paginate_links(array(
                'prev_text' => __('« Trước'),
                'next_text' => __('Tiếp »'),
            ));
            ?>
        </div>

        <?php else : ?>
        <p>Không tìm thấy kết quả phù hợp.</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>