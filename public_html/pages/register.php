<?php
$base_url = '../';
include_once '../components/header.php';
include_once '../components/navbar.php';

// MOCKUP BACKEND: Biến thông báo lỗi hoặc thành công để backend bốc dữ liệu
$alert_message = '';
$alert_type = 'danger'; // 'danger' cho lỗi, 'success' cho đăng ký thành công
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-7 col-xl-6">
            
            <div class="card border-0 shadow rounded-4 p-4 p-md-5">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-success">Tạo Tài Khoản Mới</h3>
                        <p class="text-muted small">Hãy điền thông tin bên dưới để trở thành thành viên của CozyStay</p>
                    </div>

                    <?php if (!empty($alert_message)): ?>
                        <div class="alert alert-<?php echo $alert_type; ?> small py-2 shadow-sm" role="alert">
                            <?php echo $alert_message; ?>
                        </div>
                    <?php endif; ?>

                    <form action="register.php" method="POST" id="registerForm" novalidate>
                        <div class="row g-3">
                            
                            <div class="col-12 col-md-6">
                                <label for="fullname" class="form-label small fw-bold text-secondary">Họ và tên *</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nguyễn Văn A" value="<?php echo isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : ''; ?>" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="reg_username" class="form-label small fw-bold text-secondary">Tên đăng nhập *</label>
                                <input type="text" class="form-control" id="reg_username" name="username" placeholder="user123" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="reg_email" class="form-label small fw-bold text-secondary">Địa chỉ Email *</label>
                                <input type="email" class="form-control" id="reg_email" name="email" placeholder="name@example.com" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="reg_phone" class="form-label small fw-bold text-secondary">Số điện thoại *</label>
                                <input type="tel" class="form-control" id="reg_phone" name="phone" placeholder="0901234567" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="reg_password" class="form-label small fw-bold text-secondary">Mật khẩu *</label>
                                <input type="password" class="form-control" id="reg_password" name="password" placeholder="Tối thiểu 6 ký tự" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="confirm_password" class="form-label small fw-bold text-secondary">Xác nhận mật khẩu *</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
                            </div>

                            <div class="col-12 my-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="agreeTerm" name="agree_term" required checked>
                                    <label class="form-check-label small text-muted" for="agreeTerm">
                                        Tôi đồng ý với chính sách bảo mật và điều khoản sử dụng nền tảng website của CozyStay.
                                    </label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-success fw-bold w-100 py-2 shadow-sm">Đăng Ký Tài Khoản</button>
                            </div>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <p class="small text-muted">Đã có tài khoản rồi? <a href="login.php" class="text-decoration-none text-success fw-bold">Đăng nhập tại đây</a></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include_once '../components/footer.php';
?>