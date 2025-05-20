<?php
/* Template Name: Trang Bảng lãi suất*/
get_header();  // Gọi file header.php
?>
<div class="container">
    <div class="container">
        <div class="text-center mb-4">
            <img src="https://th.bing.com/th/id/R.c0fe1474aa2e8de2b5631d6b1ef4f029?rik=Wgja8Nk%2fvfx%2bvg&riu=http%3a%2f%2fwww.newssails.com%2fimages%2fNewssails-1662617632.jpg&ehk=yyoFFBDH2BvFEmsWSAWVFyK04wiqHq3NG6SAGclkbLE%3d&risl=&pid=ImgRaw&r=0"
                class="header-image wow fadeInUp" data-wow-delay="0.2s" src="" alt="Banner QTD Tây Sài Gòn">
        </div>

        <div class="text-center">
            <span class="note-bar wow fadeInUp" data-wow-delay="0.2s">
                <?php the_field('interest_table_note'); ?>
            </span>
        </div>

        <div class="table-section mt-3 text-center">
            <img src="https://tindungtaysaigon.com/quanly/img/logo/16017891741601547718Artboard%2012logo%20QTD%20chan%20trang.png"
                alt="Logo QTD Tây Sài Gòn" style="width: 80px; margin-bottom: 10px;">

            <div class="table-title wow fadeInUp" data-wow-delay="0.2s">
                QUỸ TÍN DỤNG NHÂN DÂN TÂY SÀI GÒN
            </div>

            <div class="sub-info mb-3 wow fadeInUp" data-wow-delay="0.3s">
                Địa chỉ: 2276 Vĩnh Lộc, Ấp 4, X. Vĩnh Lộc B, H. Bình Chánh, TP HCM<br>
                Điện thoại: 028.3765.6224
            </div>

            <table class="table table-bordered interest-table wow swing" data-wow-delay="0.3s">
                <thead>
                    <tr>
                        <th>KỲ HẠN</th>
                        <th>LÃI SUẤT ÁP DỤNG<br>(% NĂM)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 1; $i <= 5; $i++): 
                $term = get_field("interest_term_$i");
                $rate = get_field("interest_rate_$i");
                if ($term && $rate): ?>
                    <tr>
                        <td><?php echo esc_html($term); ?></td>
                        <td><?php echo esc_html($rate); ?></td>
                    </tr>
                    <?php endif; endfor; ?>
                </tbody>
            </table>

            <div class="footer-note">
                <?php the_field('interest_table_footer'); ?>
            </div>
        </div>

    </div>
</div>
<?php
get_footer();  // Gọi file footer.php
?>