<?php
$has_feedbacks = new WP_Query([
    'post_type' => 'feedbacks',
    'posts_per_page' => 1,
    'post_status' => 'publish',
]);

if ($has_feedbacks->have_posts()):
    ?>
    <!-- Testimonial Start -->
    <div class="container-fluid pt-6 pb-6">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-6 text-uppercase mb-5">Khách hàng nói gì về chúng tôi</h1>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="testimonial-img">
                        <?php
                        $avatar_query = new WP_Query([
                            'post_type' => 'feedback',
                            'posts_per_page' => 4,
                            'orderby' => 'rand',
                            'meta_query' => [
                                [
                                    'key' => 'feedback_avatar',
                                    'compare' => 'EXISTS',
                                ],
                            ],
                        ]);
                        if ($avatar_query->have_posts()):
                            while ($avatar_query->have_posts()):
                                $avatar_query->the_post();
                                $avatar = get_field('feedback_avatar');
                                if ($avatar):
                                    ?>
                                    <div class="animated flip infinite">
                                        <img class="img-fluid rounded-circle" src="<?php echo esc_url($avatar['url']); ?>"
                                            alt="<?php the_title_attribute(); ?>">
                                    </div>
                                    <?php
                                endif;
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="owl-carousel testimonial-carousel">
                        <?php
                        $testimonial_query = new WP_Query([
                            'post_type' => 'feedbacks',
                            'posts_per_page' => 6,
                            'orderby' => 'date',
                            'order' => 'DESC',
                        ]);
                        if ($testimonial_query->have_posts()):
                            while ($testimonial_query->have_posts()):
                                $testimonial_query->the_post();
                                $avatar = get_field('feedback_avatar');
                                $position = get_field('feedback_position');
                                $rating = intval(get_field('feedback_rating'));
                                $contact = get_field('feedback_contact');
                                $content = get_field('feedback_content');
                                ?>
                                <div class="testimonial-item">
                                    <div class="d-flex align-items-center mb-4">
                                        <?php if ($avatar): ?>
                                            <img class="img-fluid rounded-circle" style="width: 60px; height: 60px; object-fit: cover;"
                                                src="<?php echo esc_url($avatar['url']); ?>" alt="<?php the_title_attribute(); ?>">
                                        <?php endif; ?>
                                        <div class="ms-3">
                                            <div class="mb-2">
                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                    <i class="<?php echo ($i <= $rating) ? 'fas' : 'far'; ?> fa-star text-primary"></i>
                                                <?php endfor; ?>
                                            </div>
                                            <h5 class="text-uppercase"><?php the_title(); ?></h5>
                                            <?php if ($position): ?>
                                                <span><?php echo esc_html($position); ?></span><br>
                                            <?php endif; ?>
                                            <?php if ($contact): ?>
                                                <span class="mt-2"><strong><?php echo esc_html($contact); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <p class="fs-5"><?php echo esc_html($content); ?></p>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    <?php
endif;
?>





<!-- Newsletter Start -->
<div class="container-fluid newsletter mt-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container pb-5">
        <div class="bg-white p-5 mb-5">
            <div class="row g-5">
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="display-6 text-uppercase mb-4">Đăng ký nhận bản tin</h1>
                    <div class="d-flex">
                        <i class="far fa-envelope-open fa-3x text-primary me-4"></i>
                        <p class="fs-5 fst-italic mb-0">Cập nhật tin tức mới nhất từ Quỹ Tín Dụng – vay vốn ưu đãi,
                            thông tin lãi suất và chính sách hỗ trợ thành viên.</p>
                    </div>
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control border-0 bg-light" id="mail" placeholder="Your Email">
                        <label for="mail">Email của bạn</label>
                    </div>
                    <button class="btn btn-primary w-100 py-3" type="submit">Đăng ký ngay</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter End -->


<!-- Footer Start -->
<div class="container-fluid bg-dark footer py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h5 class="text-uppercase text-light mb-4">Trụ sở</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>2276 Vĩnh Lộc, Ấp 4, X. Vĩnh
                    Lộc B,
                    H. Bình Chánh, TP. HCM</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-primary me-3"></i>028.3765.6224</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>quytindungtaysaigon@gmail.com</p>
                <div class="d-flex pt-3">
                    <a class="btn btn-square btn-light me-2" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-light me-2" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-light me-2" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-light me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-uppercase text-light mb-4">Liên kết nhanh</h5>
                <a class="btn btn-link" href="">Về chúng tôi</a>
                <a class="btn btn-link" href="">Liên hệ với chúng tôi</a>
                <a class="btn btn-link" href="">Dịch vụ của chúng tôi</a>
                <a class="btn btn-link" href="">Điều khoản và điều kiện</a>
                <a class="btn btn-link" href="">Hỗ trợ</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-uppercase text-light mb-4">Giờ làm việc</h5>
                <p class="text-uppercase mb-0">Thứ 2 - Thứ 6</p>
                <p>09:00 sáng - 07:00 tối</p>
                <p class="text-uppercase mb-0">Thứ 7</p>
                <p>09:00 sáng - 12:00 trưa</p>
                <p class="text-uppercase mb-0">Chủ nhật</p>
                <p>Đóng cửa</p>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5 class="text-uppercase text-light mb-4">Thành viên</h5>
                <a class="btn btn-link" href="">Đại hội thành viên</a>
                <a class="btn btn-link" href="">Công bố thông tin</a>
                <a class="btn btn-link" href="">Báo cáo thường niên</a>
                <a class="btn btn-link" href="">Báo cáo tài chính</a>
                <a class="btn btn-link" href="">Điều lệ</a>
            </div>
            <!-- <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase text-light mb-4">Gallery</h5>
                    <div class="row g-1">
                        <div class="col-4">
                            <img class="img-fluid" src="img/service-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid" src="img/service-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid" src="img/service-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid" src="img/service-4.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid" src="img/service-5.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid" src="img/service-6.jpg" alt="">
                        </div>
                    </div>
                </div> -->
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Copyright Start -->
<div class="container-fluid text-body copyright py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; <a class="fw-semi-bold" href="#">BeOneTech</a>, All Right Reserved.
            </div>
            <div class="col-md-6 text-center text-md-end">
                Designed By <a class="fw-semi-bold" href="#">BeOneTech</a> Distributed by <a href="#"
                    target="_blank">ThemeCustomTemplete</a>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

<!-- Zalo Button -->
<a href="https://zalo.me/1363234381175033899" target="_blank" class="zalo-btn">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Icon_of_Zalo.svg/2048px-Icon_of_Zalo.svg.png"
        alt="Zalo CSKH">
</a>

<?php wp_footer(); ?>
</body>

</html>