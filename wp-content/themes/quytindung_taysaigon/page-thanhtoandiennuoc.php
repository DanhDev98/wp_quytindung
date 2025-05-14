<?php
/* Template Name: Trang Thanh Toán Diện Nước*/
get_header();  // Gọi file header.php
?>

<!-- Banner -->
<section class="banner">
    <h1 class="wow fadeInUp" data-wow-delay="0.5s" style="">Thanh toán điện nước </h1>
    <p class="wow fadeInUp" data-wow-delay="0.7s">Thanh toán liền tay - Xong ngay lập tức!</p>
</section>

<!-- Nội dung -->
<section class="container py-5">
    <h2 class="mb-4 text-primary wow fadeInLeft" data-wow-delay="0.2s">💡 Thanh Toán Hóa Đơn Điện/Nước</h2>

    <div class="mb-4 p-3 border rounded shadow-sm bg-white wow fadeInRight" data-wow-delay="0.3s">
        <h5 class="text-danger fw-bold mb-3"><i class="bi bi-star-fill text-danger me-2"></i>ƯU ĐIỂM</h5>
        <ul>
            <li>Thủ tục thanh toán đơn giản, thuận tiện</li>
            <li>Thanh toán nhanh chóng, chính xác, an toàn</li>
        </ul>
    </div>

    <div class="mb-4 p-3 border rounded shadow-sm bg-white wow fadeInRight" data-wow-delay="0.3s">
        <h5 class="text-danger fw-bold mb-3"><i class="bi bi-star-fill text-danger me-2"></i>THỦ TỤC THANH TOÁN</h5>
        <p>Quý khách hàng mang theo Hóa đơn/Mã khách hàng kèm theo số tiền mặt cần thanh toán đến điểm giao dịch tại
            Trụ sở chính/Phòng giao dịch của <strong>QTDND Tây Sài Gòn</strong> .</p>
        <div class="d-flex justify-content-center wow fadeIn" data-wow-delay="0.5s">
            <img src="https://image.tinnhanhchungkhoan.vn/w660/Uploaded/2025/pwvolcvo/2019_03_12/dien_DJMW.jpg"
                class="img-fluid rounded" alt="Chuyển tiền" />
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
                    <h2 class="text-uppercase mb-4">Gửi thông tin hóa đơn</h2>
                    <div class="row g-3">
                        <div class="col-sm-12">
                            <div class="form-floating">
                                <input type="text" class="form-control border-0 bg-light" id="name"
                                    placeholder="Your Name">
                                <label for="name">Mã KH/Số hóa đơn</label>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="number" class="form-control border-0 bg-light" id="moneypay"
                                    placeholder="moneypay">
                                <label for="moneypay">Số tiền</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <select class="form-select border-0 bg-light" id="service">
                                    <option selected>Hóa đơn điện</option>
                                    <option value="">Hóa đơn nước</option>
                                </select>
                                <label for="service">Chọn dịch vụ</label>
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <button class="btn btn-primary w-100 py-3" type="submit">Gửi thông tin</button>
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