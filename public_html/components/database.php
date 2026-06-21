<?php
// Cấu hình thông số kết nối cơ sở dữ liệu trên XAMPP
$db_host = 'localhost';
$db_user = 'root';     // Tài khoản mặc định của XAMPP
$db_pass = '';         // Mật khẩu mặc định của XAMPP là rỗng
$db_name = 'homestay_db'; // Tên database sẽ tạo trên phpMyAdmin

// Khởi tạo kết nối
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Kiểm tra kết nối xem có thành công không
if ($conn->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Cấu hình định dạng chữ tiếng Việt có dấu luôn hiển thị đúng
$conn->set_charset("utf8mb4");
?>