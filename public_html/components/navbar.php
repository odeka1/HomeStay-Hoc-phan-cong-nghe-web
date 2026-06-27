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
                    <a class="nav-link" href="<?php echo $base_url; ?>pages/about.php">Giới Thiệu</a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Phòng Nghỉ
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo $base_url; ?>pages/rooms.php">Tất Cả Phòng</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?php echo $base_url; ?>pages/rooms.php?room_type=single">Phòng Đơn Standard</a></li>
                        <li><a class="dropdown-item" href="<?php echo $base_url; ?>pages/rooms.php?room_type=double">Phòng Đôi Deluxe</a></li>
                        <li><a class="dropdown-item" href="<?php echo $base_url; ?>pages/rooms.php?room_type=family">Phòng Gia Đình VIP</a></li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_url; ?>pages/gallery.php">Thư Viện Ảnh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_url; ?>pages/contact.php">Liên Hệ</a>
                </li>
            </ul>
            
            <form class="d-flex" role="search" action="<?php echo $base_url; ?>pages/rooms.php" method="GET">
                <input class="form-control me-2" type="search" name="search" placeholder="Tìm phòng nhanh..." aria-label="Search">
                <button class="btn btn-outline-success text-white border-white" type="submit">Tìm</button>
            </form>

            <div class="d-flex align-items-center gap-3 ms-lg-3 mt-3 mt-lg-0">
                <?php
                // 🔴 BACKEND: Giả định trạng thái đăng nhập để test giao diện
                $is_logged_in = false; // Đổi sang 'true' để xem giao diện sau khi đăng nhập thành công
                $session_username = "Nguyễn Văn A"; 
                ?>

                <?php if ($is_logged_in == false): ?>
                    <a href="<?php echo $base_url; ?>pages/login.php" class="btn btn-link link-light text-decoration-none small px-2">Đăng Nhập</a>
                    <a href="<?php echo $base_url; ?>pages/register.php" class="btn btn-success btn-sm fw-bold px-3 py-1.5 rounded-pill">Đăng Ký</a>
                <?php else: ?>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white small fw-bold" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            👋 Xin chào, <?php echo $session_username; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                            <li><a class="dropdown-item small" href="#">Lịch sử đặt phòng</a></li>
                            <li><a class="dropdown-item small" href="#">Cập nhật hồ sơ</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item small text-danger fw-bold" href="<?php echo $base_url; ?>pages/login.php?action=logout">Đăng Xuất</a></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</nav>