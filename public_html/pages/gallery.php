<?php
$base_url = '../';
include_once '../components/header.php';
include_once '../components/navbar.php';
?>

<!-- Tiêu đề trang Thư Viện Ảnh -->
<div class="bg-light py-5 mb-5 shadow-sm">
    <div class="container text-center">
        <h1 class="fw-bold text-success display-5">Thư Viện Hình Ảnh</h1>
        <p class="lead text-muted mb-0">Khám phá từng góc nhỏ bình yên và các khoảnh khắc đáng nhớ tại CozyStay</p>
    </div>
</div>

<div class="container my-5">
    <!-- Bộ lưới hình ảnh Responsive Grid (12 cột) -->
    <div class="row g-4">
        
        <!-- Ảnh 1 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card border-0 overflow-hidden shadow-sm h-100">
                <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=600" class="img-fluid gallery-img" alt="Góc đọc sách" style="height: 250px; object-fit: cover; transition: transform 0.3s ease;">
            </div>
        </div>

        <!-- Ảnh 2 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card border-0 overflow-hidden shadow-sm h-100">
                <img src="https://images.unsplash.com/photo-1505691938895-1758d7feb511?q=80&w=600" class="img-fluid gallery-img" alt="Phòng ngủ ấm cúng" style="height: 250px; object-fit: cover; transition: transform 0.3s ease;">
            </div>
        </div>

        <!-- Ảnh 3 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card border-0 overflow-hidden shadow-sm h-100">
                <img src="https://images.unsplash.com/photo-1554995207-c18c203602cb?q=80&w=600" class="img-fluid gallery-img" alt="Phòng khách sinh hoạt chung" style="height: 250px; object-fit: cover; transition: transform 0.3s ease;">
            </div>
        </div>

        <!-- Ảnh 4 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card border-0 overflow-hidden shadow-sm h-100">
                <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?q=80&w=600" class="img-fluid gallery-img" alt="Toàn cảnh khuôn viên ngoài trời" style="height: 250px; object-fit: cover; transition: transform 0.3s ease;">
            </div>
        </div>

        <!-- Ảnh 5 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card border-0 overflow-hidden shadow-sm h-100">
                <img src="https://images.unsplash.com/photo-1533090161767-e6ffed986c88?q=80&w=600" class="img-fluid gallery-img" alt="Bàn ăn trang nhã" style="height: 250px; object-fit: cover; transition: transform 0.3s ease;">
            </div>
        </div>

        <!-- Ảnh 6 -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card border-0 overflow-hidden shadow-sm h-100">
                <img src="https://images.unsplash.com/photo-1484154218962-a197022b5858?q=80&w=600" class="img-fluid gallery-img" alt="Khu vực bếp nấu tiện lợi" style="height: 250px; object-fit: cover; transition: transform 0.3s ease;">
            </div>
        </div>

    </div>
</div>

<?php
include_once '../components/footer.php';
?>