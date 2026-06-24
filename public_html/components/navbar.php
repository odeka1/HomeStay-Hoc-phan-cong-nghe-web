<?php
// Tự động kiểm tra để tránh lỗi cảnh báo nếu biến chưa được khai báo
if (!isset($base_url)) {
    $base_url = '';
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-success" href="<?php echo $base_url; ?>index.php">
            <span class="text-white">Cozy</span>Stay
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_url; ?>index.php">Trang Chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_url; ?>public_html/pages/about.php">Giới Thiệu</a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Phòng Nghỉ
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo $base_url; ?>public_html/pages/rooms.php">Tất Cả Phòng</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Phòng Đơn Standard</a></li>
                        <li><a class="dropdown-item" href="#">Phòng Đôi Deluxe</a></li>
                        <li><a class="dropdown-item" href="#">Phòng Gia Đình VIP</a></li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_url; ?>public_html/pages/gallery.php">Thư Viện Ảnh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_url; ?>public_html/pages/contact.php">Liên Hệ</a>
                </li>
            </ul>
            
            <form class="d-flex" role="search" action="<?php echo $base_url; ?>public_html/pages/rooms.php" method="GET">
                <input class="form-control me-2" type="search" name="search" placeholder="Tìm phòng nhanh..." aria-label="Search">
                <button class="btn btn-outline-success text-white border-white" type="submit">Tìm</button>
            </form>
        </div>
    </div>
</nav>