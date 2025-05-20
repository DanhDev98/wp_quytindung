<?php
/* Template Name: Trang Hướng dẫn tra cứu tài khoản*/
get_header();  // Gọi file header.php
?>
<div class="container py-5">
    <img src="https://quytindungthaihoa.vn/wp-content/uploads/2020/09/unnamed-13-768x804.jpg" alt="Tra cứu"
        class="image-banner mx-auto d-block wow fadeInDown" data-wow-delay="0.7s" style="">
    <div class="guide-box text-center wow fadeInUp" data-wow-delay="0.7s">
        <div class="guide-title"><i class="fas fa-search-dollar icon-box"></i> HƯỚNG DẪN</div>
        <div class="guide-subtitle">Tra cứu tiền gửi tiết kiệm</div>

        <?php for ($i = 1; $i <= 3; $i++): 
    $title = get_field("sms_title_$i");
    $cmd = get_field("sms_command_$i");
    if ($title && $cmd): ?>
        <div class="instruction">
            <i class="fas fa-star text-warning"></i> <strong><?php echo esc_html($title); ?>:</strong><br>
            <span class="cmd"><?php echo esc_html($cmd); ?></span> → Gửi
            <strong><?php the_field('sms_number'); ?></strong>
        </div>
        <?php endif; endfor; ?>

        <?php if (get_field('sms_number')): ?>
        <div class="mt-4 footer-number">
            ✨ GỬI ĐẾN TỔNG ĐÀI: <span style="color: #ffc107"><?php the_field('sms_number'); ?></span>
        </div>
        <?php endif; ?>

    </div>
</div>
<?php
get_footer();  // Gọi file footer.php
?>