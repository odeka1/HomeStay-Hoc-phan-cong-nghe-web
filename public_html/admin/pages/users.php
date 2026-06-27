<?php
$current_page = 'users';
$admin_base_url = '../';
$base_url = '../../';
include_once '../components/admin_header.php';
include_once '../components/admin_navbar.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
    <h1 class="h3 fw-bold text-dark mb-0">Quản Lý Khách Hàng</h1>
</div>

<!-- Table listing users -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-0">
        <div class="table-responsive border-0 shadow-none">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3" style="width: 120px;">Mã tài khoản</th>
                        <th>Tên đăng nhập</th>
                        <th>Họ và tên</th>
                        <th>Địa chỉ Email</th>
                        <th>Số điện thoại</th>
                        <th>Ngày đăng ký</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP WHILE LOOP FOR USERS START -->
                    <!-- Dữ liệu mẫu (Mock data) 1 -->
                    <tr>
                        <td class="ps-3 fw-bold">#US-0087</td>
                        <td class="fw-bold">nguyenvana</td>
                        <td>Nguyễn Văn A</td>
                        <td>nguyenvana@gmail.com</td>
                        <td>0912345678</td>
                        <td>25/06/2026</td>
                        <td><span class="badge bg-success px-2 py-1 fs-8">Active</span></td>
                    </tr>
                    
                    <!-- Dữ liệu mẫu (Mock data) 2 -->
                    <tr>
                        <td class="ps-3 fw-bold">#US-0086</td>
                        <td class="fw-bold">tranthib</td>
                        <td>Trần Thị B</td>
                        <td>tranthib@gmail.com</td>
                        <td>0987654321</td>
                        <td>23/06/2026</td>
                        <td><span class="badge bg-success px-2 py-1 fs-8">Active</span></td>
                    </tr>
                    
                    <!-- Dữ liệu mẫu (Mock data) 3 -->
                    <tr>
                        <td class="ps-3 fw-bold">#US-0085</td>
                        <td class="fw-bold">lehoangc</td>
                        <td>Lê Hoàng C</td>
                        <td>lehoangc@gmail.com</td>
                        <td>0905123456</td>
                        <td>20/06/2026</td>
                        <td><span class="badge bg-danger px-2 py-1 fs-8">Banned</span></td>
                    </tr>
                    <!-- PHP WHILE LOOP FOR USERS END -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include_once '../components/admin_footer.php';
?>
