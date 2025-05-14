<?php
/* Template Name: Trang Góp ý*/
get_header();  // Gọi file header.php
?>
<div class="feedback-section shadow wow fadeInUp" data-wow-delay="0.2s">
    <!-- Header -->
    <div class="feedback-header">
        <img src="https://tindungtaysaigon.com/quanly/img/logo/16017891741601547718Artboard%2012logo%20QTD%20chan%20trang.png"
            alt="Logo Quỹ" class="logo wow fadeInLeft" data-wow-delay="0.2s" />
        <h2 class="wow fadeInLeft" data-wow-delay="0.2s">Góp Ý & Phản Hồi</h2>
        <p class="wow fadeInLeft" data-wow-delay="0.3s">Quý khách vui lòng để lại ý kiến, chúng tôi luôn lắng nghe!
        </p>
    </div>

    <!-- Body -->
    <div class="feedback-body">
        <div class="row">
            <div class="col-md-6" data-aos="fade-right">
                <img src="https://cdn-icons-png.flaticon.com/512/4712/4712035.png" alt="Feedback"
                    class="feedback-image wow fadeInLeft" data-wow-delay="0.4s" />
            </div>

            <div class="col-md-6" data-aos="fade-left">
                <form id="feedbackForm">
                    <div class="mb-3 wow fadeInRight" data-wow-delay="0.2s">
                        <label for="name" class="form-label">Họ và Tên</label>
                        <input type="text" class="form-control" id="name" required placeholder="Nguyễn Văn A">
                    </div>
                    <div class="mb-3 wow fadeInRight" data-wow-delay="0.3s">
                        <label for="contact" class="form-label">Email hoặc SĐT</label>
                        <input type="text" class="form-control" id="contact" required
                            placeholder="example@gmail.com / 0909xxxxxx">
                    </div>
                    <div class="mb-3 wow fadeInRight" data-wow-delay="0.4s">
                        <label for="type" class="form-label">Loại góp ý</label>
                        <select class="form-select" id="type" required>
                            <option value="">-- Chọn loại --</option>
                            <option value="Khen ngợi">Khen ngợi</option>
                            <option value="Phản ánh">Phản ánh</option>
                            <option value="Hỗ trợ">Yêu cầu hỗ trợ</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </div>
                    <div class="mb-3 wow fadeInRight" data-wow-delay="0.45s">
                        <label class="form-label d-block">Đánh giá</label>
                        <div id="starRating" class="star-rating">
                            <i class="star bi bi-star-fill" data-value="1"></i>
                            <i class="star bi bi-star-fill" data-value="2"></i>
                            <i class="star bi bi-star-fill" data-value="3"></i>
                            <i class="star bi bi-star-fill" data-value="4"></i>
                            <i class="star bi bi-star-fill" data-value="5"></i>
                        </div>
                        <input type="hidden" id="rating" name="rating" value="0" />
                    </div>

                    <div class="mb-3 wow fadeInRight" data-wow-delay="0.5s">
                        <label for="message" class="form-label">Nội dung góp ý</label>
                        <textarea class="form-control" id="message" rows="4" required
                            placeholder="Viết nội dung góp ý tại đây..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-submit w-100 wow fadeInUp" data-wow-delay="0.5s">Gửi Ý
                        Kiến</button>
                </form>

                <div id="successMessage" class="alert alert-success mt-3 text-center">
                    🎉 Gửi góp ý thành công! Cảm ơn bạn đã chia sẻ với chúng tôi.
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();  // Gọi file footer.php
?>