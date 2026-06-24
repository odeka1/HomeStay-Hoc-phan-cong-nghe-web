<?php
if (!isset($base_url)) {
    $base_url = '';
}
?>
<footer class="bg-dark text-white pt-5 pb-3 mt-5 border-top border-4 border-success">
    <div class="container">
        <div class="row g-4">
            <div class="col-12 col-md-4">
                <h5 class="fw-bold text-success mb-3">CozyStay</h5>
                <p class="small text-white-50">Nền tảng website cung cấp dịch vụ đặt phòng Homestay trực tuyến tiện lợi, mang lại không gian nghỉ dưỡng ấm cúng và lý tưởng.</p>
                <div class="d-flex align-items-center mt-3">
                    <img src="<?php echo $base_url; ?>public_html/assets/images/logo.png" alt="Logo CozyStay" class="img-fluid bg-light p-2 rounded shadow-sm" style="max-height: 50px;" onerror="this.src='https://placehold.co/150x50?text=Logo+Nhom'">
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <h5 class="fw-bold text-white mb-3">Liên Kết Nhanh</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="<?php echo $base_url; ?>index.php" class="link-light text-white-50 text-decoration-none custom-hover">Trang Chủ</a></li>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>public_html/pages/about.php" class="link-light text-white-50 text-decoration-none custom-hover">Giới Thiệu</a></li>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>public_html/pages/rooms.php" class="link-light text-white-50 text-decoration-none custom-hover">Phòng Nghỉ</a></li>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>public_html/pages/gallery.php" class="link-light text-white-50 text-decoration-none custom-hover">Thư Viện Ảnh</a></li>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>public_html/pages/contact.php" class="link-light text-white-50 text-decoration-none custom-hover">Liên Hệ</a></li>
                </ul>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <h5 class="fw-bold text-white mb-3">Thông Tin Liên Hệ</h5>
                <p class="small text-white-50 mb-2">📍 Địa chỉ: Khu Đô Thị Đại Học, TP. Cần Thơ</p>
                <p class="small text-white-50 mb-2">📞 Điện thoại: 0123 456 789</p>
                <p class="small text-white-50 mb-2">✉️ Email: contact@cozystay.id.vn</p>
            </div>
        </div>

        <hr class="bg-secondary my-4">

        <div class="row">
            <div class="col-12 text-center">
                <p class="small text-white-50 mb-0">&copy; 2026 CozyStay. Bài tập cuối môn xây dựng bởi Nhóm Sinh Viên.</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="<?php echo $base_url; ?>public_html/assets/js/main.js"></script>
</body>
</html>