<?php
/* Template Name: Trang Liên hệ */
get_header();  // Gọi file header.php
?>

<!-- Contact Start -->
    <div class=" pb-6">
        <div class="container-fluid appoinment py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container pt-5">
                <div class="row gy-5 gx-0">
                    <div class="col-lg-6 pe-lg-5 wow fadeIn" data-wow-delay="0.3s">
                        <h1 class="display-6 text-uppercase text-white mb-4">Bạn Có Thắc Mắc? Hãy Liên Hệ Với Chúng Tôi
                        </h1>
                        <p class="text-white mb-5 wow fadeIn" data-wow-delay="0.4s">Biểu mẫu liên hệ hiện đang được nâng
                            cấp. Để được hỗ trợ nhanh chóng, vui lòng liên hệ trực tiếp qua các kênh bên dưới. Chúng tôi
                            luôn sẵn sàng lắng nghe và hỗ trợ bạn.</p>
                        <div class="d-flex align-items-start wow fadeIn" data-wow-delay="0.5s">
                            <div class="btn-lg-square bg-white">
                                <i class="bi bi-envelope-at text-dark fs-3"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-white text-uppercase">Email của chúng tôi</h6>
                                <span class="text-white">quytindungtaysaigon@gmail.com
                                </span>
                            </div>
                        </div>
                        <hr class="bg-body">
                        <div class="d-flex align-items-start wow fadeIn" data-wow-delay="0.6s">
                            <div class="btn-lg-square bg-white">
                                <i class="bi bi-telephone text-dark fs-3"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-white text-uppercase">Gọi cho chúng tôi</h6>
                                <span class="text-white">028.3765.6224</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-n5 wow fadeIn" data-wow-delay="0.7s">
                        <div class="bg-white p-5">
                            <h2 class="text-uppercase mb-4">Liên hệ cho chúng tôi</h2>
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
                                        <label for="mail">Email của bạn</label>
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
                                        <input type="text" class="form-control border-0 bg-light" id="subject"
                                            placeholder="Subject">
                                        <label for="subject">Bạn muốn tư vấn gì</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0 bg-light"
                                            placeholder="Leave a message here" id="message"
                                            style="height: 130px"></textarea>
                                        <label for="message">Nội dung muốn tư vấn</label>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Gửi ngay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid px-0 wow fadeInUp" data-wow-delay="0.5s">
            <iframe class="w-100 h-100"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9320.965668922432!2d106.57776404648793!3d10.812588940688695!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b34d6a4ed5f%3A0x446bdeb7d85efa92!2zMjI3NiDEkC4gVsSpbmggTOG7mWMsIFbEqW5oIEzhu5ljIEIsIELDrG5oIENow6FuaCwgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2sus!4v1746605356305!5m2!1sen!2sus"
                frameborder="0" style="min-height: 500px; border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
        </div>
    </div>
    <!-- Contact End -->

<?php get_footer();  // Gọi file footer.php ?>