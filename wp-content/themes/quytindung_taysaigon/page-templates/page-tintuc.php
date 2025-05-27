<?php
/* Template Name: Trang Tin tức và sư kiện*/
get_header();  // Gọi file header.php
?>
<div class="container py-5">
    <!-- Banner -->
    <div class="mb-4">
        <img src="https://tindungtaysaigon.com/quanly/uploads/post/medium/7451746500283.jpg" class="w-100 rounded-3"
            alt="Banner" />
    </div>

    <!-- Tin tức mới nhất -->
    <h2 class="section-title">Tin tức mới nhất</h2>
    <div class="row news-featured mb-5">
        <?php
    // Lấy bài viết mới nhất từ chuyên mục 'tin-moi-nhat'
    $args_featured = array(
        'post_type'      => 'post',
        'posts_per_page' => 1,
        'category_name'  => 'tin-moi-nhat',
    );
    $featured_query = new WP_Query($args_featured);

    if ($featured_query->have_posts()):
        $featured_query->the_post();
        $featured_id = get_the_ID(); // Lưu ID để không bị trùng ở danh sách bên phải
        ?>
        <!-- Tin lớn bên trái -->
        <div class="col-md-6">
            <div class="card card-left border-0">
                <?php if (has_post_thumbnail()): ?>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('large', ['class' => 'card-img-top rounded', 'alt' => get_the_title()]); ?>
                </a>
                <?php endif; ?>
                <div class="card-body px-0">
                    <h4 class="card-title"><?php the_title(); ?></h4>
                    <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-outline-danger btn-sm">Xem chi tiết</a>
                </div>
            </div>
        </div>
        <?php endif; wp_reset_postdata(); ?>

        <!-- Các tin nhỏ bên phải -->
        <div class="col-md-6">
            <div class="scrollable-tin d-flex flex-column gap-3 overflow-auto" style="max-height: 500px;">
                <?php
            // Lấy 6 bài viết mới khác, loại trừ bài nổi bật
            $args_others = array(
                'post_type'      => 'post',
                'posts_per_page' => 6,
                'post__not_in'   => [$featured_id ?? 0], // Tránh trùng với tin nổi bật
                'orderby'        => 'date',
                'order'          => 'DESC',
            );
            $news_query = new WP_Query($args_others);
            if ($news_query->have_posts()):
                while ($news_query->have_posts()):
                    $news_query->the_post();
                    ?>
                <div class="d-flex small-news bg-white rounded p-2 shadow-sm">
                    <?php if (has_post_thumbnail()): ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('thumbnail', ['class' => 'me-3 rounded', 'alt' => get_the_title()]); ?>
                    </a>
                    <?php endif; ?>
                    <div>
                        <p class="small-news-title mb-1"><?php the_title(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="text-danger small">Xem thêm</a>
                    </div>
                </div>
                <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p>Không có tin tức nào.</p>';
            endif;
            ?>
            </div>
        </div>
    </div>


    <!-- Bộ lọc theo năm -->
    <div class="filter-year mb-4">
        <h5>Lọc theo năm</h5>
        <select id="year-filter" class="form-select form-select-sm">
            <option value="">Chọn năm</option>
            <?php
    $current_year = date('Y');
    for ($i = $current_year; $i >= 2022; $i--) {
      echo "<option value='$i'>$i</option>";
    }
    ?>
        </select>
    </div>

    <!-- Kết quả tin tức sẽ thay đổi ở đây -->
    <div id="news-results">
        <p>Vui lòng chọn năm để hiển thị tin tức.</p>
    </div>


    <!-- Tin tức khác (carousel 4 tin/slide) -->
    <h2 class="section-title">Tin tức khác</h2>
    <div id="newsCarousel" class="carousel slide" ">
        <div class=" carousel-inner">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1, // Lấy tất cả bài viết
            'orderby' => 'date',
            'order' => 'DESC'
        );
        $query = new WP_Query($args);
        if ($query->have_posts()):
            $posts = $query->posts;
            $chunks = array_chunk($posts, 4);
            foreach ($chunks as $index => $chunk):
        ?>
        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
            <div class="row news">
                <?php foreach ($chunk as $post):
                    setup_postdata($post); ?>
                <div class="col-md-2  ">
                    <div class="card news-item-card h-100">
                        <?php if (has_post_thumbnail()): ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                        </a>
                        <?php else: ?>
                        <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="No image">
                        <?php endif; ?>
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title"><?php the_title(); ?></h6>
                            <p class="card-text small"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary mt-auto">Xem
                                thêm</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        </div>
        <?php endforeach; endif; ?>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-dark rounded-circle"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-dark rounded-circle"></span>
    </button>
</div>

</div>
<script>
jQuery(document).ready(function($) {
    $('#year-filter').on('change', function() {
        var year = $(this).val();

        $.ajax({
            url: my_ajax_obj.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_news_by_year',
                year: year
            },
            success: function(response) {
                // Thay thế phần carousel-inner bằng kết quả trả về
                $('#newsCarousel .carousel-inner').replaceWith(response);

                // Khởi tạo lại carousel Bootstrap 5
                var carouselEl = document.querySelector('#newsCarousel');
                var carousel = bootstrap.Carousel.getInstance(carouselEl);

                if (carousel) {
                    carousel.dispose();
                }

                new bootstrap.Carousel(carouselEl, {
                    interval: false
                });
            },
            error: function() {
                alert('Lỗi khi tải tin tức.');
            }
        });
    });
});
</script>


<?php
get_footer();  // Gọi file footer.php
?>