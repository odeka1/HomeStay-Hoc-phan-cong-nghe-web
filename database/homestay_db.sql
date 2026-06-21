-- Khởi tạo Database nếu chưa có
CREATE DATABASE IF NOT EXISTS `homestay_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `homestay_db`;

-- Khởi tạo bảng danh sách phòng nghỉ (rooms)
CREATE TABLE IF NOT EXISTS `rooms` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `room_name` VARCHAR(255) NOT NULL,
    `room_type` VARCHAR(50) NOT NULL,
    `price` DECIMAL(10, 2) NOT NULL,
    `image_name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Chèn thử dữ liệu mẫu (để kiểm tra xem giao diện có nhận đúng ảnh cục bộ không)
INSERT INTO `rooms` (`room_name`, `room_type`, `price`, `image_name`, `description`) VALUES
('Phòng Đơn Standard', 'single', 500000.00, 'room1.jpg', 'Phòng tiêu chuẩn dành cho 1-2 người với không gian ấm cúng, cửa sổ thông thoáng nhìn ra sân vườn.'),
('Phòng Đôi Deluxe', 'double', 850000.00, 'room2.jpg', 'Diện tích rộng rãi, trang bị giường đôi cỡ lớn, minibar và ban công riêng ngắm hoàng hôn cực chill.'),
('Phòng Gia Đình VIP', 'family', 1500000.00, 'room3.jpg', 'Không gian căn hộ mini gồm 2 giường đôi, bếp nấu ăn riêng, sức chứa lên đến 4-5 người lớn.');


CREATE TABLE IF NOT EXISTS `bookings` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `room_id` INT NOT NULL,
    `guest_name` VARCHAR(255) NOT NULL,
    `guest_phone` VARCHAR(50) NOT NULL,
    `guest_email` VARCHAR(255) NOT NULL,
    `check_in` DATE NOT NULL,
    `check_out` DATE NOT NULL,
    `guest_count` INT NOT NULL,
    `booking_notes` TEXT,
    `status` VARCHAR(50) DEFAULT 'Chờ xử lý',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`room_id`) REFERENCES `rooms`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


