<?php
/* Template Name: Trang Vay tín chấp*/
get_header();  // Gọi file header.php
?>

<!-- Service Start -->
<div class="container-fluid service pt-2 pb-2 mt-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-6 text-uppercase ">Vay tín chấp</h1>
            <h1 class="display-6 text-uppercase fs-5 ">Giải pháp tài chính linh hoạt - Không cần thế chấp</h1>
        </div>

        <div class="section wow fadeIn">
            <h2>Điều kiện vay</h2>
            <ul>
                <li>Công dân Việt Nam từ 20 đến 60 tuổi</li>
                <li>Có thu nhập ổn định hàng tháng</li>
                <li>Hộ khẩu hoặc tạm trú tại TP. HCM hoặc vùng lân cận</li>
                <li>Không cần tài sản đảm bảo</li>
            </ul>
        </div>

        <div class="section wow fadeIn">
            <h2>Hồ sơ cần chuẩn bị</h2>
            <ul>
                <li>CMND/CCCD</li>
                <li>Sổ hộ khẩu hoặc giấy tạm trú (KT3)</li>
                <li>Sao kê lương hoặc bảng lương 3 tháng gần nhất</li>
                <li>Hợp đồng lao động (nếu có)</li>
            </ul>
        </div>

        <div class="section wow fadeIn">
            <h2>Lợi ích khi vay tại chúng tôi</h2>
            <ul>
                <li>Xét duyệt nhanh chỉ trong 24h</li>
                <li>Hạn mức vay từ 10 đến 100 triệu đồng</li>
                <li>Kỳ hạn linh hoạt từ 6 đến 36 tháng</li>
                <li>Lãi suất ưu đãi, cạnh tranh</li>
                <li>Không phí ẩn – minh bạch tuyệt đối</li>
            </ul>
        </div>
        <div class="d-flex justify-content-center wow fadeIn">
            <a href="<?php echo get_permalink(get_page_by_path('trang-dang-ky-dich-vu')); ?>"
                class="btn btn-primary w-30% py-3 " type="submit">Liên lạc ngay</a>
        </div>


    </div>
</div>
<!-- Service End -->
<?php
get_footer();  // Gọi file footer.php
?>