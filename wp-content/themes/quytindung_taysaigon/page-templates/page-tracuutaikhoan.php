<?php
/* Template Name: Trang Hướng dẫn tra cứu tài khoản*/
get_header();  // Gọi file header.php
?>
<div class="container py-5">
    <div id="tra-cuu-container" class="tra-cuu-wrapper"
        style="max-width:500px;margin:auto;padding:20px;border-radius:10px;background:#f9f9f9;box-shadow:0 0 10px rgba(0,0,0,0.1)">
        <h2 style="text-align:center;color:#333;">🔍 Tra Cứu Tài Khoản Tiết Kiệm</h2>
        <input type="text" id="mstk" placeholder="Nhập Mã Số Tài Khoản hoặc CCCD"
            style="width:100%;padding:10px;margin:10px 0;border:1px solid #ccc;border-radius:5px;" />
        <button onclick="traCuuTaiKhoan()"
            style="width:100%;padding:10px;background:#0073aa;color:white;border:none;border-radius:5px;cursor:pointer;">Tra
            cứu</button>
        <div id="tra-cuu-ket-qua" style="margin-top:20px;font-size:15px;"></div>
    </div>

</div>

<script>
    function traCuuTaiKhoan() {
        var input = document.getElementById('mstk').value;
        var resultDiv = document.getElementById('tra-cuu-ket-qua');
        resultDiv.innerHTML = "⏳ Đang tra cứu...";

        fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                'action': 'tra_cuu_tai_khoan',
                'query': input
            })
        })
            .then(response => response.text())
            .then(data => {
                resultDiv.innerHTML = data;
            })
            .catch(error => {
                resultDiv.innerHTML = "❌ Lỗi xảy ra: " + error;
            });
    }
</script>
<?php
get_footer();  // Gọi file footer.php
?>