<?php
// Cấu hình đường dẫn lùi lại 1 cấp thư mục để nhận đúng tài nguyên gốc
$base_url = '../../';

// Nhúng các thành phần giao diện hệ thống
include_once '../components/header.php';
include_once '../components/navbar.php';

// Nhúng kết nối cơ sở dữ liệu MySQL
include_once '../components/database.php';

// Tạm thời lấy ID phòng từ URL để hiển thị thông tin phòng (Mặc định là phòng 1 nếu không có ID)
$room_id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Biến lưu trữ thông báo phản hồi cho người dùng
$alert_message = '';
$alert_type = '';

// --- XỬ LÝ KHI NGƯỜI DÙNG NHẤN NÚT GỬI FORM (POST REQUEST) ---
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Thu thập và làm sạch dữ liệu đầu vào để chống tấn công SQL Injection
    $room_id = intval($_POST['room_id']);
    $guest_name = $conn->real_escape_string($_POST['guest_name']);
    $guest_phone = $conn->real_escape_string($_POST['guest_phone']);
    $guest_email = $conn->real_escape_string($_POST['guest_email']);
    $check_in = $conn->real_escape_string($_POST['check_in']);
    $check_out = $conn->real_escape_string($_POST['check_out']);
    $guest_count = intval($_POST['guest_count']);
    $booking_notes = $conn->real_escape_string($_POST['booking_notes']);

    // Kiểm tra tính hợp lệ cơ bản (Validation)
    if (empty($guest_name) || empty($guest_phone) || empty($guest_email) || empty($check_in) || empty($check_out)) {
        $alert_message = 'Vui lòng điền đầy đủ các trường thông tin bắt buộc (*).';
        $alert_type = 'danger';
    } else {
        // Thực hiện câu lệnh INSERT dữ liệu vào bảng bookings
        $sql_insert = "INSERT INTO bookings (room_id, guest_name, guest_phone, guest_email, check_in, check_out, guest_count, booking_notes) 
                       VALUES ('$room_id', '$guest_name', '$guest_phone', '$guest_email', '$check_in', '$check_out', '$guest_count', '$booking_notes')";
        
        if ($conn->query($sql_insert) === TRUE) {
            $alert_message = '🎉 <strong>Đặt phòng thành công!</strong> Đơn đặt phòng của bạn đã được ghi nhận, chúng tôi sẽ liên hệ sớm nhất để xác nhận.';
            $alert_type = 'success';
        } else {
            $alert_message = 'Đã có lỗi xảy ra trong quá trình lưu dữ liệu: ' . $conn->error;
            $alert_type = 'danger';
        }
    }
}

// Lấy thông tin phòng từ DB để hiển thị lên Card tóm tắt hóa đơn
$sql_room = "SELECT * FROM rooms WHERE id = $room_id";
$result_room = $conn->query($sql_room);

$mock_room_name = "Phòng nghỉ CozyStay";
$mock_room_price = 0;
$room_image = 'room1.jpg';

if ($result_room && $result_room->num_rows > 0) {
    $room_data = $result_room->fetch_assoc();
    $mock_room_name = $room_data['room_name'];
    $mock_room_price = $room_data['price'];
    $room_image = $room_data['image_name'];
}
?>

<div class="bg-light py-5 mb-4 shadow-sm">
    <div class="container text-center">
        <h1 class="fw-bold text-success display-5">Phiếu Đặt Phòng Trực Tuyến</h1>
        <p class="lead text-muted mb-0">Chỉ một vài bước đơn giản để sở hữu không gian nghỉ dưỡng lý tưởng tại CozyStay</p>
    </div>
</div>

<div class="container my-5">
    <?php if (!empty($alert_message)): ?>
        <div class="alert alert-<?php echo $alert_type; ?> alert-dismissible fade show shadow-sm" role="alert">
            <?php echo $alert_message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row g-4">
        
        <div class="col-12 col-lg-4 order-lg-2">
            <div class="card border-0 shadow-sm sticky-top" style="top: 90px; z-index: 10;">
                <div class="card-header bg-success text-white fw-bold py-3">
                    Thông Tin Phòng Chọn
                </div>
                <img src="../assets/images/rooms/<?php echo $room_image; ?>" class="card-img-top img-fluid" alt="Ảnh phòng đặt" style="height: 180px; object-fit: cover;">
                
                <div class="card-body">
                    <h5 class="fw-bold text-dark mb-2"><?php echo $mock_room_name; ?></h5>
                    <p class="text-muted small mb-3">Hệ thống đã tự động giữ vị trí phòng này cho bạn trên hóa đơn tạm tính.</p>
                    
                    <hr class="text-secondary">
                    
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-secondary small">Đơn giá định kỳ:</span>
                        <span class="fw-bold text-dark"><?php echo number_format($mock_room_price, 0, ',', '.'); ?>đ / đêm</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-secondary small">Dịch vụ đi kèm:</span>
                        <span class="text-success small fw-bold">Miễn phí Wifi & Nước uống</span>
                    </div>
                    
                    <hr class="text-secondary">
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-dark">Tổng chi phí tạm tính:</span>
                        <span class="text-danger fw-bold fs-5"><?php echo number_format($mock_room_price, 0, ',', '.'); ?>đ</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-8 order-lg-1">
            <div class="card border-0 shadow-sm p-4 p-md-5">
                <h4 class="fw-bold text-dark mb-4">Thông Tin Đăng Ký Lưu Trú</h4>
                
                <form action="booking.php?id=<?php echo $room_id; ?>" method="POST" id="bookingForm">
                    <input type="hidden" name="room_id" value="<?php echo $room_id; ?>">

                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <label for="guestName" class="form-label small fw-bold text-secondary">Họ và tên khách hàng *</label>
                            <input type="text" class="form-control" id="guestName" name="guest_name" placeholder="Nhập tên người đại diện nhận phòng" required>
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="guestPhone" class="form-label small fw-bold text-secondary">Số điện thoại di động *</label>
                            <input type="tel" class="form-control" id="guestPhone" name="guest_phone" placeholder="Nhập số điện thoại để xác nhận đơn" required>
                        </div>

                        <div class="col-12">
                            <label for="guestEmail" class="form-label small fw-bold text-secondary">Địa chỉ Email liên hệ *</label>
                            <input type="email" class="form-control" id="guestEmail" name="guest_email" placeholder="Ví dụ: nguyenvana@gmail.com" required>
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="checkInDate" class="form-label small fw-bold text-secondary">Ngày nhận phòng (Check-in) *</label>
                            <input type="date" class="form-control" id="checkInDate" name="check_in" required>
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="checkOutDate" class="form-label small fw-bold text-secondary">Ngày trả phòng (Check-out) *</label>
                            <input type="date" class="form-control" id="checkOutDate" name="check_out" required>
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="guestCount" class="form-label small fw-bold text-secondary">Số lượng khách lưu trú *</label>
                            <select class="form-select" id="guestCount" name="guest_count">
                                <option value="1" selected>1 Người lớn</option>
                                <option value="2">2 Người lớn</option>
                                <option value="3">3 Người lớn + 1 Trẻ em</option>
                                <option value="4">Cả gia đình (Bốn người trở lên)</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="bookingNotes" class="form-label small fw-bold text-secondary">Yêu cầu đặc biệt bổ sung (Không bắt buộc)</label>
                            <textarea class="form-control" id="bookingNotes" name="booking_notes" placeholder="Ví dụ: Giờ check-in dự kiến, thuê thêm xe máy, chuẩn bị bếp nướng BBQ..." style="height: 100px"></textarea>
                        </div>

                        <div class="col-12 my-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="termCheck" required checked>
                                <label class="form-check-label small text-muted" for="termCheck">
                                    Tôi cam kết các thông tin khai báo trên là chính xác và đồng ý tuân thủ nội quy lưu trú của Homestay.
                                </label>
                            </div>
                        </div>

                        <div class="col-12 d-flex gap-2">
                            <button class="btn btn-success fw-bold px-4 py-2 shadow-sm" type="submit">Xác Nhận Đặt Phòng</button>
                            <a href="rooms.php" class="btn btn-outline-secondary px-4 py-2">Quay Lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?php
// Đóng kết nối DB
$conn->close();

// Nhúng chân trang hệ thống
include_once '../components/footer.php';
?>