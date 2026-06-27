<?php
// Tự động kiểm tra để tránh lỗi nếu chưa chọn trang hiện tại
if (!isset($current_page)) {
    $current_page = 'dashboard';
}
if (!isset($base_url)) {
    $base_url = '../';
}
if (!isset($admin_base_url)) {
    $admin_base_url = '';
}
?>
<!-- Top sticky navigation header -->
<header class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top p-0 shadow-sm border-bottom border-secondary-subtle">
    <div class="container-fluid px-3 py-2">
        <!-- Logo / Brand -->
        <a class="navbar-brand d-flex align-items-center fw-bold text-success" href="<?php echo $admin_base_url; ?>dashboard.php">
            <span class="text-white me-1">Cozy</span>Stay <span class="badge bg-success bg-opacity-25 text-success small ms-2 border border-success-subtle px-2 py-1 fs-7">Admin</span>
        </a>
        
        <!-- Mobile Sidebar Toggle -->
        <button class="navbar-toggler border-0 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- User Profile & Log Out in Navbar (Desktop) -->
        <div class="d-none d-lg-flex align-items-center gap-3 ms-auto">
            <span class="text-light small"><i class="bi bi-person-circle me-1 text-success"></i> Xin chào, Admin</span>
            <a href="<?php echo $base_url; ?>index.php" class="btn btn-outline-light btn-sm text-decoration-none" target="_blank">
                <i class="bi bi-globe me-1"></i>Xem trang web
            </a>
            <a href="<?php echo $base_url; ?>pages/login.php?action=logout" class="btn btn-danger btn-sm text-decoration-none">
                <i class="bi bi-box-arrow-right me-1"></i>Đăng xuất
            </a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Navigation (Responsive Offcanvas) -->
        <nav id="sidebarMenu" class="col-lg-2 bg-dark text-white offcanvas-lg offcanvas-start min-vh-100 p-0 border-end border-secondary-subtle" tabindex="-1" aria-labelledby="sidebarMenuLabel">
            <div class="offcanvas-header bg-dark border-bottom border-secondary-subtle d-lg-none p-3">
                <h5 class="offcanvas-title text-success fw-bold" id="sidebarMenuLabel">CozyStay Admin</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
            </div>
            
            <div class="offcanvas-body d-flex flex-column p-0 py-3">
                <!-- Navigation links -->
                <ul class="nav flex-column mb-auto w-100">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'dashboard' ? 'active' : ''; ?>" href="<?php echo $admin_base_url; ?>dashboard.php">
                            <i class="bi bi-speedometer2 me-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'rooms' ? 'active' : ''; ?>" href="<?php echo $admin_base_url; ?>pages/rooms.php">
                            <i class="bi bi-door-open me-2"></i>Quản lý phòng
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'bookings' ? 'active' : ''; ?>" href="<?php echo $admin_base_url; ?>pages/bookings.php">
                            <i class="bi bi-calendar2-check me-2"></i>Quản lý đặt phòng
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'users' ? 'active' : ''; ?>" href="<?php echo $admin_base_url; ?>pages/users.php">
                            <i class="bi bi-people me-2"></i>Quản lý khách hàng
                        </a>
                    </li>
                </ul>
                
                <!-- Profile panel for mobile only -->
                <div class="d-lg-none border-top border-secondary-subtle p-3 mt-3">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <i class="bi bi-person-circle fs-4 text-success"></i>
                        <div>
                            <div class="fw-bold small">Admin CozyStay</div>
                            <div class="text-muted small fs-8">admin@cozystay.id.vn</div>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <a href="<?php echo $base_url; ?>index.php" class="btn btn-outline-light btn-sm" target="_blank">
                            <i class="bi bi-globe me-1"></i>Xem trang web
                        </a>
                        <a href="<?php echo $base_url; ?>pages/login.php?action=logout" class="btn btn-danger btn-sm">
                            <i class="bi bi-box-arrow-right me-1"></i>Đăng xuất
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- Main content column wrapper -->
        <main class="col-lg-10 px-md-4 py-4 ms-auto">
            
            <!-- Chừa sẵn Bootstrap Alert Components cho Backend thông báo -->
            <!-- PHP ALERT ERROR MESSAGE START -->
            <?php if (isset($error_msg) && !empty($error_msg)): ?>
                <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i><?php echo htmlspecialchars($error_msg); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <!-- PHP ALERT ERROR MESSAGE END -->

            <!-- PHP ALERT SUCCESS MESSAGE START -->
            <?php if (isset($success_msg) && !empty($success_msg)): ?>
                <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i><?php echo htmlspecialchars($success_msg); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <!-- PHP ALERT SUCCESS MESSAGE END -->
