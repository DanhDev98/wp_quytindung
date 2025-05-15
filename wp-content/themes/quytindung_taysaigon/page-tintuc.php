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
        <!-- Tin lớn bên trái -->
        <div class="col-md-6">
            <div class="card card-left border-0">
                <img src="https://tindungtaysaigon.com/quanly/uploads/post/medium/6841732066886.jpeg"
                    class="card-img-top rounded" alt="Tin lớn" />
                <div class="card-body px-0">
                    <h4 class="card-title">Tiêu đề tin lớn nổi bật</h4>
                    <p>
                        Mô tả ngắn gọn về tin tức nổi bật này để thu hút người xem click
                        vào xem chi tiết. Đoạn văn này sẽ được rút gọn chỉ còn khoảng 20
                        từ bằng script phía dưới...
                    </p>
                    <a href="/chitietTintuc.html" class="btn btn-outline-danger btn-sm">Xem chi tiết</a>
                </div>
            </div>
        </div>

        <!-- Các tin nhỏ bên phải -->
        <div class="col-md-6 d-flex flex-column gap-3 justify-content-between">
            <!-- 4 tin ngắn -->
            <div class="d-flex small-news bg-white rounded p-2 shadow-sm">
                <img src="https://tindungtaysaigon.com/quanly/uploads/post/medium/7451746500283.jpg"
                    class="me-3 rounded" alt="" />
                <div>
                    <p class="small-news-title">Tin ngắn 1 - tiêu đề ngắn gọn</p>
                    <a href="#" class="text-danger small">Xem thêm</a>
                </div>
            </div>
            <div class="d-flex small-news bg-white rounded p-2 shadow-sm">
                <img src="https://tindungtaysaigon.com/quanly/uploads/post/medium/7451746500283.jpg"
                    class="me-3 rounded" alt="" />
                <div>
                    <p class="small-news-title">Tin ngắn 2 - tiêu đề ngắn gọn</p>
                    <a href="#" class="text-danger small">Xem thêm</a>
                </div>
            </div>
            <div class="d-flex small-news bg-white rounded p-2 shadow-sm">
                <img src="https://tindungtaysaigon.com/quanly/uploads/post/medium/7451746500283.jpg"
                    class="me-3 rounded" alt="" />
                <div>
                    <p class="small-news-title">Tin ngắn 3 - tiêu đề ngắn gọn</p>
                    <a href="#" class="text-danger small">Xem thêm</a>
                </div>
            </div>
            <div class="d-flex small-news bg-white rounded p-2 shadow-sm">
                <img src="https://tindungtaysaigon.com/quanly/uploads/post/medium/7451746500283.jpg"
                    class="me-3 rounded" alt="" />
                <div>
                    <p class="small-news-title">Tin ngắn 4 - tiêu đề ngắn gọn</p>
                    <a href="#" class="text-danger small">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Lọc theo năm -->
    <div class="filter-year">
        <h5>Lọc theo năm</h5>
        <select class="form-select form-select-sm" aria-label="Lọc theo năm">
            <option selected>Chọn năm</option>
            <option value="2025">2025</option>
            <option value="2024">2024</option>
            <option value="2023">2023</option>
            <option value="2022">2022</option>
        </select>
    </div>

    <!-- Tin tức khác (carousel 5 tin/slide) -->
    <h2 class="section-title">Tin tức khác</h2>
    <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- <div class="carousel-indicator">
            <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div> -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="row">
                    <!-- 5 tin mỗi slide -->
                    <div class="col-md-2">
                        <div class="card">
                            <img src="https://tindungtaysaigon.com/quanly/uploads/post/medium/7451746500283.jpg"
                                class="card-img-top" alt="..." />
                            <div class="card-body">
                                <h5 class="card-title">Tiêu đề tin 1</h5>
                                <p class="card-text">Nội dung tin tức sẽ tự động rút gọn...</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <img src="https://tindungtaysaigon.com/quanly/uploads/post/medium/7451746500283.jpg"
                                class="card-img-top" alt="..." />
                            <div class="card-body">
                                <h5 class="card-title">Tiêu đề tin 2</h5>
                                <p class="card-text">Tin tức khác mô tả ngắn gọn cho người đọc...</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <img src="https://tindungtaysaigon.com/quanly/uploads/post/medium/7451746500283.jpg"
                                class="card-img-top" alt="..." />
                            <div class="card-body">
                                <h5 class="card-title">Tiêu đề tin 3</h5>
                                <p class="card-text">Thông tin cần được trình bày rõ ràng ngắn gọn...</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <img src="https://tindungtaysaigon.com/quanly/uploads/post/medium/7451746500283.jpg"
                                class="card-img-top" alt="..." />
                            <div class="card-body">
                                <h5 class="card-title">Tiêu đề tin 4</h5>
                                <p class="card-text">Rút gọn nội dung hiển thị giúp tăng trải nghiệm...</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="..." />
                            <div class="card-body">
                                <h5 class="card-title">Tiêu đề tin 5</h5>
                                <p class="card-text">Chi tiết nội dung ở trang riêng, phần này chỉ tóm tắt...</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 (tương tự) -->
            <div class="carousel-item">
                <div class="row">
                    <!-- Lặp lại thêm 5 tin nữa -->
                    <div class="col-md-2">
                        <div class="card">
                            <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="..." />
                            <div class="card-body">
                                <h5 class="card-title">Tiêu đề tin 6</h5>
                                <p class="card-text">Tóm gọn giúp giao diện gọn gàng và dễ theo dõi hơn.</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                    <!-- Thêm các tin khác tương tự ở đây nếu muốn -->
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark rounded-circle"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark rounded-circle"></span>
        </button>
    </div>
</div>

<?php
get_footer();  // Gọi file footer.php
?>