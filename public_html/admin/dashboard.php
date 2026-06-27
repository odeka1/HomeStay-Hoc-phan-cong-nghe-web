<?php
$current_page = 'dashboard';
$admin_base_url = '';
$base_url = '../';
include_once 'components/admin_header.php';
include_once 'components/admin_navbar.php';

// Mock values for dashboard metrics - backend developers will replace these with database queries
$total_rooms = 15;
$total_bookings = 142;
$total_users = 87;
$monthly_revenue = 45780000;
?>

<div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
    <h1 class="h3 fw-bold text-dark mb-0">Dashboard Overview</h1>
    <span class="text-secondary small"><i class="bi bi-clock me-1"></i> Hôm nay: <?php echo date('d/m/Y'); ?></span>
</div>

<!-- Grid of Metric Cards -->
<div class="row g-4 mb-4">
    <!-- Total Rooms Metric Card -->
    <div class="col-12 col-sm-6 col-xxl-3">
        <div class="card card-metric shadow-sm h-100 border-start border-success border-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted text-uppercase fs-8 fw-bold mb-1">Tổng Số Phòng</h6>
                        <span class="h3 fw-bold mb-0 text-dark"><?php echo $total_rooms; ?></span>
                    </div>
                    <div class="bg-success bg-opacity-10 text-success p-3 rounded-circle">
                        <i class="bi bi-door-open fs-3"></i>
                    </div>
                </div>
                <div class="mt-2 text-secondary fs-8">
                    <a href="<?php echo $admin_base_url; ?>pages/rooms.php" class="text-decoration-none text-success">Xem chi tiết <i class="bi bi-arrow-right fs-9"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Total Bookings Metric Card -->
    <div class="col-12 col-sm-6 col-xxl-3">
        <div class="card card-metric shadow-sm h-100 border-start border-primary border-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted text-uppercase fs-8 fw-bold mb-1">Tổng Đơn Đặt</h6>
                        <span class="h3 fw-bold mb-0 text-dark"><?php echo $total_bookings; ?></span>
                    </div>
                    <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle">
                        <i class="bi bi-calendar2-check fs-3"></i>
                    </div>
                </div>
                <div class="mt-2 text-secondary fs-8">
                    <a href="<?php echo $admin_base_url; ?>pages/bookings.php" class="text-decoration-none text-primary">Xem chi tiết <i class="bi bi-arrow-right fs-9"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Total Active Users Metric Card -->
    <div class="col-12 col-sm-6 col-xxl-3">
        <div class="card card-metric shadow-sm h-100 border-start border-info border-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted text-uppercase fs-8 fw-bold mb-1">Khách Hàng Đăng Ký</h6>
                        <span class="h3 fw-bold mb-0 text-dark"><?php echo $total_users; ?></span>
                    </div>
                    <div class="bg-info bg-opacity-10 text-info p-3 rounded-circle">
                        <i class="bi bi-people fs-3"></i>
                    </div>
                </div>
                <div class="mt-2 text-secondary fs-8">
                    <a href="<?php echo $admin_base_url; ?>pages/users.php" class="text-decoration-none text-info">Xem chi tiết <i class="bi bi-arrow-right fs-9"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Monthly Revenue Metric Card -->
    <div class="col-12 col-sm-6 col-xxl-3">
        <div class="card card-metric shadow-sm h-100 border-start border-danger border-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted text-uppercase fs-8 fw-bold mb-1">Doanh Thu Tháng Này</h6>
                        <span class="h3 fw-bold mb-0 text-dark"><?php echo number_format($monthly_revenue, 0, ',', '.'); ?>đ</span>
                    </div>
                    <div class="bg-danger bg-opacity-10 text-danger p-3 rounded-circle">
                        <i class="bi bi-currency-dollar fs-3"></i>
                    </div>
                </div>
                <div class="mt-2 text-secondary fs-8">
                    <span class="text-success fw-bold"><i class="bi bi-graph-up me-1"></i>+12.5%</span> so với tháng trước
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Bookings Section -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-clock-history me-2 text-success"></i>Đơn Đặt Phòng Mới Nhất</h5>
        <a href="<?php echo $admin_base_url; ?>pages/bookings.php" class="btn btn-sm btn-outline-success">Xem tất cả đơn đặt</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive border-0 shadow-none rounded-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Mã đơn</th>
                        <th>Khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Phòng nghỉ</th>
                        <th>Nhận phòng</th>
                        <th>Trả phòng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th class="text-center pe-3">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP WHILE LOOP FOR RECENT BOOKINGS START -->
                    <!-- Dữ liệu mẫu (Mock data) -->
                    <tr>
                        <td class="ps-3 fw-bold">#BK-1082</td>
                        <td>Nguyễn Văn A</td>
                        <td>0912345678</td>
                        <td>Phòng Đôi Deluxe 201</td>
                        <td>28/06/2026</td>
                        <td>30/06/2026</td>
                        <td class="fw-bold text-dark">1.800.000đ</td>
                        <td><span class="badge bg-warning text-dark px-2 py-1 fs-8">Pending</span></td>
                        <td class="text-center pe-3">
                            <a href="<?php echo $admin_base_url; ?>pages/bookings.php" class="btn btn-sm btn-light border"><i class="bi bi-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3 fw-bold">#BK-1081</td>
                        <td>Trần Thị B</td>
                        <td>0987654321</td>
                        <td>Phòng Gia Đình VIP 301</td>
                        <td>25/06/2026</td>
                        <td>27/06/2026</td>
                        <td class="fw-bold text-dark">3.200.000đ</td>
                        <td><span class="badge bg-success px-2 py-1 fs-8">Confirmed</span></td>
                        <td class="text-center pe-3">
                            <a href="<?php echo $admin_base_url; ?>pages/bookings.php" class="btn btn-sm btn-light border"><i class="bi bi-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3 fw-bold">#BK-1080</td>
                        <td>Lê Hoàng C</td>
                        <td>0905123456</td>
                        <td>Phòng Đơn Standard 102</td>
                        <td>22/06/2026</td>
                        <td>23/06/2026</td>
                        <td class="fw-bold text-dark">450.000đ</td>
                        <td><span class="badge bg-success px-2 py-1 fs-8">Confirmed</span></td>
                        <td class="text-center pe-3">
                            <a href="<?php echo $admin_base_url; ?>pages/bookings.php" class="btn btn-sm btn-light border"><i class="bi bi-eye"></i></a>
                        </td>
                    </tr>
                    <!-- PHP WHILE LOOP FOR RECENT BOOKINGS END -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include_once 'components/admin_footer.php';
?>
