<?php
// Cấu hình đường dẫn lùi lại 1 cấp thư mục để nhận đúng tài nguyên từ gốc public_html/
$base_url = '../';

// Nhúng các thành phần giao diện hệ thống
include_once '../components/header.php';
include_once '../components/navbar.php';

// MOCKUP BACKEND: Khởi tạo biến thông báo để người làm backend dễ dàng truyền câu lệnh echo
$error_message = ''; // Ví dụ: "Tài khoản hoặc mật khẩu không chính xác!"
?>

<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-4">
            
            <div class="card border-0 shadow rounded-4 p-4">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-success"><span class="text-dark">Cozy</span>Stay</h3>
                        <p class="text-muted small">Đăng nhập để trải nghiệm dịch vụ tốt nhất</p>
                    </div>

                    <?php if (!empty($error_message)): ?>
                        <div class="alert alert-danger small py-2 alert-dismissible fade show" role="alert">
                            ⚠️ <?php echo $error_message; ?>
                            <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form action="login.php" method="POST" id="loginForm" novalidate>
                        
                        <div class="mb-3">
                            <label for="username" class="form-label small fw-bold text-secondary">Tên đăng nhập hoặc Email</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tài khoản của bạn" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" required autofocus>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label small fw-bold text-secondary">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                        </div>

                        <div class="mb-4 form-check d-flex justify-content-between align-items-center p-0 m-0">
                            <div>
                                <input type="checkbox" class="form-check-input ms-0 me-2" id="rememberMe" name="remember_me">
                                <label class="form-check-label small text-muted" for="rememberMe">Ghi nhớ tôi</label>
                            </div>
                            <a href="#" class="text-decoration-none small text-success">Quên mật khẩu?</a>
                        </div>

                        <button type="submit" class="btn btn-success fw-bold w-100 py-2 shadow-sm">Đăng Nhập</button>
                    </form>
                    
                    <div class="text-center mt-4">
                        <p class="small text-muted">Chưa có tài khoản? <a href="register.php" class="text-decoration-none text-success fw-bold">Đăng ký ngay</a></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
// Nhúng chân trang hệ thống
include_once '../components/footer.php';
?>