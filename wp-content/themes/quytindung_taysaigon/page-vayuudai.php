<?php
/* Template Name: Trang Vay ưu đãi*/
get_header();  // Gọi file header.php
?>

<header class="hero">
    <div class="overlay">
        <h1 class="wow fadeIn" data-wow-delay="0.3s">Vay Ưu Đãi Lãi Suất Thấp</h1>
        <p class="wow fadeIn" data-wow-delay="0.3s">Giải pháp tài chính nhanh chóng, dễ dàng, uy tín tại Tây Sài Gòn
        </p>
        <a href="#my-appoinment" class="btn btn-primary w-30% py-3 fs-5 wow fadeIn" data-wow-delay="0.3s"
            type="submit">Đăng ký vay
            ngay</a>
    </div>
</header>

<section class="benefits">
    <h2 class="wow fadeInLeft" data-wow-delay="0.3s">Tại sao chọn chúng tôi?</h2>
    <div class="cards">
        <div class="card wow fadeIn" data-wow-delay="0.2s">
            <img src="https://cdn-icons-png.flaticon.com/512/2920/2920322.png" alt="Lãi suất thấp">
            <h3>Lãi suất ưu đãi</h3>
            <p>Tối ưu chi phí vay, chỉ từ 0.9%/tháng</p>
        </div>
        <div class="card wow fadeIn" data-wow-delay="0.7s">
            <img src="https://cdn-icons-png.flaticon.com/512/3270/3270591.png" alt="Xét duyệt nhanh">
            <h3>Xét duyệt siêu tốc</h3>
            <p>Nhận tiền trong vòng 24h làm việc</p>
        </div>
        <div class="card wow fadeIn" data-wow-delay="1.2s">
            <img src="https://cdn-icons-png.flaticon.com/512/3233/3233263.png" alt="Hỗ trợ tận tâm">
            <h3>Hỗ trợ tận tâm</h3>
            <p>Đội ngũ tư vấn viên luôn sẵn sàng giúp bạn</p>
        </div>
    </div>
</section>

<!-- Appoinment Start -->
<div class="container-fluid appoinment mt-6 mb-6 py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container pt-5">
        <div class="row gy-5 gx-0">
            <div class="col-lg-6 pe-lg-5 wow fadeIn" data-wow-delay="0.3s">
                <h1 class="display-6 text-uppercase text-white mb-4">CHÚNG TÔI ĐỒNG HÀNH TÀI CHÍNH & PHÁT TRIỂN CỘNG
                    ĐỒNG
                </h1>
                <p class="text-white mb-5 wow fadeIn" data-wow-delay="0.4s">Giải pháp tài chính linh hoạt, nhanh
                    chóng và an toàn dành cho mọi thành viên.
                    Chúng tôi cam kết đồng hành cùng sự phát triển kinh tế địa phương thông qua các sản phẩm tín
                    dụng thiết thực, lãi suất hợp lý và dịch vụ tận tâm.</p>
                <div class="d-flex align-items-start wow fadeIn" data-wow-delay="0.5s">
                    <div class="btn-lg-square bg-white">
                        <i class="bi bi-geo-alt text-dark fs-3"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-white text-uppercase">ĐỊA CHỈ VĂN PHÒNG</h6>
                        <span class="text-white">2276 Vĩnh Lộc, Ấp 4, X. Vĩnh Lộc B, H. Bình Chánh</span>
                    </div>
                </div>
                <hr class="bg-body">
                <div class="d-flex align-items-start wow fadeIn" data-wow-delay="0.6s">
                    <div class="btn-lg-square bg-white">
                        <i class="bi bi-clock text-dark fs-3"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-white text-uppercase">THỜI GIAN LÀM VIỆC</h6>
                        <span class="text-white">Thứ 2 – Thứ 6: 7h30 – 17h00
                            Thứ 7: 7h30 – 11h30</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-n5 wow fadeIn" data-wow-delay="0.7s">
                <div class="bg-white p-5">
                    <h2 class="text-uppercase mb-4">ĐĂNG KÝ TƯ VẤN TRỰC TUYẾN</h2>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="text" class="form-control border-0 bg-light" id="name"
                                    placeholder="Your Name">
                                <label for="name">Họ và tên</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="email" class="form-control border-0 bg-light" id="mail"
                                    placeholder="Your Email">
                                <label for="mail">Email của bạn </label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="text" class="form-control border-0 bg-light" id="mobile"
                                    placeholder="Your Mobile">
                                <label for="mobile">Số điện thoại</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <select class="form-select border-0 bg-light" id="service">
                                    <option selected>Vay vốn cá nhân</option>
                                    <option value="">Gửi tiết kiệm</option>
                                    <option value="">Chuyển khoản nội bộ</option>
                                </select>
                                <label for="service">Chọn dịch vụ</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control border-0 bg-light" placeholder="Leave a message here"
                                    id="message" style="height: 130px"></textarea>
                                <label for="message">Nội dung bạn muốn gửi</label>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-primary w-100 py-3" type="submit">Đăng ký</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Appoinment End -->
<?php
get_footer();  // Gọi file footer.php
?>