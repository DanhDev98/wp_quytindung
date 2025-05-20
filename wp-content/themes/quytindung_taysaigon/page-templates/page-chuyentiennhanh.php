<?php
/* Template Name: Trang Chuyển tiền nhanh*/
get_header();  // Gọi file header.php
?>

<!-- Banner -->
<section class="banner">
    <h1 class="wow fadeIn" data-wow-delay="0.5s">
        <?php the_field('banner_title'); ?>
    </h1>
    <p class="wow fadeIn" data-wow-delay="0.7s">
        <?php the_field('banner_subtitle'); ?>
    </p>
    <img class="img-chuyentien wow fadeIn" data-wow-delay="1s"
        src="<?php the_field('banner_image'); ?>" 
        alt="Banner Image" width="150" class="mt-4">
</section>

<!-- Nội dung -->
<div class="container py-5">

    <!-- Tiện ích -->
    <h4 class="section-title wow fadeInRight" data-wow-delay="0.2s">
        <?php the_field('section_1_title'); ?>
    </h4>
    <div class="card chuyentiennhanh shadow-sm p-4 mt-3 card-3d wow fadeIn" data-wow-delay="0.4s">
        <ul>
            <?php if(get_field('benefit_1')): ?><li><?php the_field('benefit_1'); ?></li><?php endif; ?>
            <?php if(get_field('benefit_2')): ?><li><?php the_field('benefit_2'); ?></li><?php endif; ?>
            <?php if(get_field('benefit_3')): ?><li><?php the_field('benefit_3'); ?></li><?php endif; ?>
            <?php if(get_field('benefit_4')): ?><li><?php the_field('benefit_4'); ?></li><?php endif; ?>
        </ul>
    </div>

    <!-- Thủ tục -->
    <h4 class="section-title wow fadeInRight" data-wow-delay="0.4s">
        <?php the_field('section_2_title'); ?>
    </h4>
    <div class="card chuyentiennhanh shadow-sm p-4 mt-3 card-3d wow fadeInRight" data-wow-delay="0.5s">
        <p>
            <?php the_field('procedure_text'); ?>
        </p>
        <img src="<?php the_field('procedure_image'); ?>" class="img-fluid rounded" alt="Chuyển tiền" />
    </div>

</div>



<?php
get_footer();  // Gọi file footer.php
?>