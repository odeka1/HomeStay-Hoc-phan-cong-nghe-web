<?php
// Khai báo đường dẫn gốc
$base_url = '../';

// Nhúng các thành phần giao diện hệ thống
include_once 'components/header.php';
include_once 'components/navbar.php';
include_once 'components/database.php';

// Thực hiện câu lệnh truy vấn lấy ra 3 phòng nghỉ mới nhất từ DB
$sql = "SELECT * FROM rooms ORDER BY id DESC LIMIT 3";
$result = $conn->query($sql);
?>

<!-- Khu vực Banner chuyển động (Carousel) -->
<div id="homestayCarousel" class="carousel slide carousel-fade shadow" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#homestayCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#homestayCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#homestayCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="5000">
            <img src="<?php echo $base_url; ?>public_html/assets/images/banner1.jpg" class="d-block w-100 img-fluid" alt="Không gian Homestay 1" style="height: 500px; object-fit: cover;">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                <h2 class="fw-bold text-white">Không Gian Yên Bình & Thơ Mộng</h2>
                <p>Nơi gác lại những lo toan để tận hưởng trọn vẹn kỳ nghỉ của bạn.</p>
            </div>
        </div>
        
        <div class="carousel-item" data-bs-interval="5000">
            <img src="<?php echo $base_url; ?>public_html/assets/images/banner2.jpg" class="d-block w-100 img-fluid" alt="Không gian Homestay 2" style="height: 500px; object-fit: cover;">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                <h2 class="fw-bold text-white">Phòng Nghỉ Đầy Đủ Tiện Nghi</h2>
                <p>Thiết kế tinh tế mang lại cảm giác ấm cúng như chính ngôi nhà của bạn.</p>
            </div>
        </div>
        
        <div class="carousel-item" data-bs-interval="5000">
            <img src="<?php echo $base_url; ?>public_html/assets/images/banner3.jpg" class="d-block w-100 img-fluid" alt="Không gian Homestay 3" style="height: 500px; object-fit: cover;">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                <h2 class="fw-bold text-white">Trải Nghiệm Dịch Vụ Chu Đáo</h2>
                <p>Hỗ trợ đặt tiệc nướng BBQ ngoài trời và các tour khám phá bản địa.</p>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#homestayCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#homestayCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<main class="container my-5">
    <div class="row">
        <div class="col-12 text-center py-4">
            <h1 class="display-5 fw-bold text-success">Chào mừng đến với CozyStay</h1>
            <p class="lead text-muted">Hệ thống đặt phòng và quản lý Homestay trực tuyến tiện lợi, chuẩn responsive.</p>
            <hr class="my-3 w-25 mx-auto">
        </div>
    </div>

    <!-- KHU VỰC DANH SÁCH PHÒNG LẤY TỪ DATABASE -->
    <div class="row g-4 mt-2">
        <div class="col-12">
            <h3 class="fw-bold text-dark border-start border-4 border-success ps-2 mb-4">Phòng Nghỉ Nổi Bật</h3>
        </div>

        <?php
        // Kiểm tra xem database có dữ liệu phòng nào không
        if ($result->num_rows > 0) {
            // Vòng lặp tự động bóc tách từng hàng dữ liệu biến thành thẻ Card[cite: 1]
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <!-- Đường dẫn ảnh tự động nối chuỗi với tên file lưu trong DB -->
                        <img src="<?php echo $base_url; ?>public_html/assets/images/rooms/<?php echo $row['image_name']; ?>" class="card-img-top img-fluid" alt="<?php echo $row['room_name']; ?>" style="height: 230px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold"><?php echo $row['room_name']; ?></h5>
                            <p class="card-text text-muted flex-grow-1"><?php echo $row['description']; ?></p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <!-- Định dạng lại hiển thị tiền tệ cho đẹp mắt -->
                                <span class="text-danger fw-bold fs-5"><?php echo number_format($row['price'], 0, ',', '.'); ?>đ / đêm</span>
                                <a href="<?php echo $base_url; ?>public_html/pages/booking.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Đặt Ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            // Trường hợp DB trống trống trơn chưa có dữ liệu
            echo '<div class="col-12 text-center"><p class="text-muted">Hiện tại hệ thống chưa cập nhật phòng nghỉ nào.</p></div>';
        }
        
        // Đóng kết nối sau khi xử lý xong dữ liệu để tối ưu tài nguyên hệ thống
        $conn->close();
        ?>
    </div>
</main>

<?php
// Nhúng phần khung chân giao diện
include_once 'components/footer.php';
?>