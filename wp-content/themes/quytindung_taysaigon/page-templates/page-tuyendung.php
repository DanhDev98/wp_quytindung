<?php
/* Template Name: Trang Tuyển dụng*/
get_header();  // Gọi file header.php
?>
<div class="text-center mx-auto wow fadeInUp mt-5 mb-3" data-wow-delay="0.1s" style="max-width: 600px;">
    <h1 class="display-6 text-uppercase ">Thông tin tuyển dụng</h1>
    <h1 class="display-6 text-uppercase fs-5 ">Thử thách mới - Trải nghiệm mới - Bạn có dám thử</h1>
</div>


<div class="d-flex flex-wrap justify-content-center container">
    <?php
    $job_query = new WP_Query([
        'post_type' => 'job',  // post type là job
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
    ]);

    $count = 0;
    while ($job_query->have_posts()):
        $job_query->the_post();
        $count++;

        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
        $registration_date = get_field('registration_date'); // ACF ngày đăng tuyển
        $expiration_date = get_field('expiration_date'); // ACF ngày hết hạn
    
        // Animation class + delay xen kẽ
        $animation_class = ($count % 2 === 1) ? 'fadeInLeft' : 'fadeInRight';
        $animation_delay = ($count % 2 === 1) ? '0.4s' : '0.6s';

        $company = get_the_title();  // lấy title cho company
        $job_name = get_the_content(); // lấy content cho h4 (tên công việc)
        ?>
        <div class="flip-container wow <?= $animation_class; ?>" data-wow-delay="<?= $animation_delay; ?>">
            <div class="job-box">
                <div class="job-front"
                    style="background-image: url('<?= esc_url($image_url); ?>'); background-size: contain; background-position: center center; background-repeat: no-repeat;">
                </div>
                <div class="job-back">
                    <div class="company"><?= esc_html($company); ?></div>
                    <h4 class="text-uppercase"><?= esc_html(strip_tags($job_name)); ?></h4>
                    <?php if ($registration_date): ?>
                        <p><strong>Ngày đăng tuyển:</strong> <?= esc_html($registration_date); ?></p>
                    <?php endif; ?>
                    <?php if ($expiration_date): ?>
                        <p><strong>Ngày hết hạn:</strong> <?= esc_html($expiration_date); ?></p>
                    <?php endif; ?>
                    <button type="button" class="btn btn-primary w-30% py-1 mt-2 apply-btn" data-bs-toggle="modal"
                        data-bs-target="#applyModal" data-job-company="<?= esc_attr(get_the_title()); ?>"
                        data-job-title="<?= esc_attr(wp_strip_all_tags(get_the_content())); ?>"
                        data-job-registration-date="<?= esc_attr($registration_date); ?>"
                        data-job-expiration-date="<?= esc_attr($expiration_date); ?>">
                        Nộp hồ sơ
                    </button>

                </div>
            </div>
        </div>
    <?php endwhile;
    wp_reset_postdata(); ?>
    <!-- Modal Nộp hồ sơ -->
    <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <form id="applyForm" method="post" enctype="multipart/form-data"
                action="<?= esc_url(admin_url('admin-post.php')); ?>" class="needs-validation" novalidate>
                <input type="hidden" name="action" value="nop_cv_submit">

                <div class="modal-content shadow-lg">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title w-100 text-center" id="applyModalLabel">Nộp hồ sơ ứng tuyển</h5>
                        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                            data-bs-dismiss="modal" aria-label="Đóng"></button>
                    </div>
                    <div class="modal-body px-4">
                        <!-- Thông tin vị trí tuyển dụng -->
                        <div class="mb-4 text-center">
                            <h4 class="mb-1 text-muted fw-semibold text-uppercase" id="modalCompany">Công ty:
                                <span></span>
                            </h4>
                            <h5 class="text-uppercase text-primary fw-bold mb-2" id="modalJobTitle">Vị trí:
                                <span></span>
                            </h5>
                            <p><strong>Ngày đăng tuyển:</strong> <span id="modalRegistrationDate"></span> |
                                <strong>Ngày hết hạn:</strong> <span id="modalExpirationDate"></span>
                            </p>
                        </div>

                        <!-- Hidden Inputs -->
                        <input type="hidden" name="job_title" id="job_title" value="">
                        <input type="hidden" name="job_company" id="job_company" value="">
                        <input type="hidden" name="job_registration_date" id="job_registration_date" value="">
                        <input type="hidden" name="job_expiration_date" id="job_expiration_date" value="">

                        <!-- Form Inputs -->
                        <div class="mb-3">
                            <label for="applicant_name" class="form-label">Họ và tên <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="applicant_name" name="applicant_name" required>
                            <div class="invalid-feedback">Vui lòng nhập họ và tên.</div>
                        </div>
                        <div class="mb-3">
                            <label for="applicant_email" class="form-label">Email <span
                                    class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="applicant_email" name="applicant_email"
                                required>
                            <div class="invalid-feedback">Vui lòng nhập email hợp lệ.</div>
                        </div>
                        <div class="mb-3">
                            <label for="applicant_phone" class="form-label">Số điện thoại <span
                                    class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="applicant_phone" name="applicant_phone"
                                pattern="[0-9]{9,15}" required>
                            <div class="invalid-feedback">Vui lòng nhập số điện thoại hợp lệ (9-15 chữ số).</div>
                        </div>
                        <div class="mb-3">
                            <label for="applicant_cv" class="form-label">Upload CV (PDF, DOC, DOCX) <span
                                    class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="applicant_cv" name="applicant_cv"
                                accept=".pdf,.doc,.docx" required>
                            <div class="invalid-feedback">Vui lòng tải lên file CV hợp lệ.</div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary px-4">Gửi hồ sơ</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>




<!-- JS Bootstrap validation và truyền dữ liệu vào modal -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('applyForm');

        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);

        const applyModal = document.getElementById('applyModal');
        applyModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;

            const jobTitle = button.getAttribute('data-job-title'); // Editor
            const jobCompany = button.getAttribute('data-job-company'); // Title
            const jobRegDate = button.getAttribute('data-job-registration-date');
            const jobExpDate = button.getAttribute('data-job-expiration-date');

            document.querySelector('#modalCompany span').textContent = jobCompany;
            document.querySelector('#modalJobTitle span').textContent = jobTitle;
            document.getElementById('modalRegistrationDate').textContent = jobRegDate;
            document.getElementById('modalExpirationDate').textContent = jobExpDate;

            // hidden
            document.getElementById('job_title').value = jobTitle;
            document.getElementById('job_company').value = jobCompany;
            document.getElementById('job_registration_date').value = jobRegDate;
            document.getElementById('job_expiration_date').value = jobExpDate;

            form.reset();
            form.classList.remove('was-validated');
        });
    });
</script>



<?php
get_footer();  // Gọi file footer.php
?>