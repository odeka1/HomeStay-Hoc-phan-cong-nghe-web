<?php
// Cấu hình đường dẫn lùi lại 1 cấp thư mục để nhận đúng tài nguyên gốc
$base_url = '../';

// Nhúng các thành phần giao diện hệ thống
include_once '../components/header.php';
include_once '../components/navbar.php';

// Nhúng kết nối cơ sở dữ liệu MySQL
include_once '../components/database.php';

// 1. KHỞI TẠO CÂU LỆNH TRUY VẤN MẶC ĐỊNH
$sql = "SELECT * FROM rooms WHERE 1=1";

// 2. XỬ LÝ BỘ LỌC TÌM KIẾM NHANH TỪ NAVBAR (Nếu có)
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $sql .= " AND (room_name LIKE '%$search%' OR description LIKE '%$search%')";
}

// 3. XỬ LÝ BỘ LỌC THEO LOẠI PHÒNG TỪ SIDEBAR (Nếu có)
if (isset($_GET['room_type']) && !empty($_GET['room_type'])) {
    $room_type = $conn->real_escape_string($_GET['room_type']);
    $sql .= " AND room_type = '$room_type'";
}

// 4. XỬ LÝ BỘ LỌC THEO GIÁ TIỀN TỪ SIDEBAR (Nếu có)
if (isset($_GET['price_range']) && !empty($_GET['price_range'])) {
    $price_range = intval($_GET['price_range']);
    if ($price_range == 500) {
        $sql .= " AND price <= 500000";
    } elseif ($price_range == 1000) {
        $sql .= " AND price <= 1000000";
    } elseif ($price_range == 2000) {
        $sql .= " AND price <= 2000000";
    }
}

// Sắp xếp theo phòng mới nhất lên đầu
$sql .= " ORDER BY id DESC";
$result = $conn->query($sql);
?>

<div class="bg-light py-5 mb-5 shadow-sm">
    <div class="container text-center">
        <h1 class="fw-bold text-success display-5">Danh Sách Phòng Nghỉ</h1>
        <p class="lead text-muted mb-0">Tìm kiếm và lựa chọn không gian nghỉ dưỡng phù hợp nhất với bạn</p>
        <?php if (isset($_GET['search']) && !empty($_GET['search'])): ?>
            <span class="badge bg-success mt-2">Kết quả tìm kiếm cho: "<?php echo htmlspecialchars($_GET['search']); ?>"</span>
        <?php endif; ?>
    </div>
</div>

<div class="container my-5">
    <div class="row g-4">
        
        <div class="col-12 col-lg-3">
            <div class="card border-0 shadow-sm p-4 sticky-top" style="top: 90px; z-index: 10;">
                <h5 class="fw-bold text-dark mb-3">Bộ Lọc Tìm Kiếm</h5>
                <form action="rooms.php" method="GET">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Loại phòng:</label>
                        <select class="form-select form-select-sm" name="room_type">
                            <option value="">-- Tất cả loại phòng --</option>
                            <option value="single" <?php echo (isset($_GET['room_type']) && $_GET['room_type'] == 'single') ? 'selected' : ''; ?>>Phòng Đơn</option>
                            <option value="double" <?php echo (isset($_GET['room_type']) && $_GET['room_type'] == 'double') ? 'selected' : ''; ?>>Phòng Đôi</option>
                            <option value="family" <?php echo (isset($_GET['room_type']) && $_GET['room_type'] == 'family') ? 'selected' : ''; ?>>Phòng Gia Đình</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-secondary">Mức giá tối đa:</label>
                        <select class="form-select form-select-sm" name="price_range">
                            <option value="">-- Tất cả mức giá --</option>
                            <option value="500" <?php echo (isset($_GET['price_range']) && $_GET['price_range'] == '500') ? 'selected' : ''; ?>>Dưới 500.000đ</option>
                            <option value="1000" <?php echo (isset($_GET['price_range']) && $_GET['price_range'] == '1000') ? 'selected' : ''; ?>>Dưới 1.000.000đ</option>
                            <option value="2000" <?php echo (isset($_GET['price_range']) && $_GET['price_range'] == '2000') ? 'selected' : ''; ?>>Dưới 2.000.000đ</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm w-100 fw-bold">Áp Dụng Lọc</button>
                    <?php if(isset($_GET['room_type']) || isset($_GET['price_range']) || isset($_GET['search'])): ?>
                        <a href="rooms.php" class="btn btn-link btn-sm w-100 text-secondary text-decoration-none mt-2">Xóa bộ lọc</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <div class="col-12 col-lg-9">
            <div class="row g-4">
                
                <?php
                // Kiểm tra số lượng dòng dữ liệu trả về từ câu lệnh truy vấn có bộ lọc
                if ($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col-12 col-md-6">
                            <div class="card h-100 shadow-sm border-0">
                                <img src="../assets/images/rooms/<?php echo $row['image_name']; ?>" class="card-img-top img-fluid" alt="<?php echo $row['room_name']; ?>" style="height: 200px; object-fit: cover;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold"><?php echo $row['room_name']; ?></h5>
                                    <p class="card-text text-muted small flex-grow-1"><?php echo $row['description']; ?></p>
                                    <div class="d-flex justify-content-between align-items-center mt-3 border-top pt-2">
                                        <span class="text-danger fw-bold"><?php echo number_format($row['price'], 0, ',', '.'); ?>đ / đêm</span>
                                        <a href="booking.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-success btn-sm fw-bold">Đặt Phòng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    // Hiển thị thông báo nếu không tìm thấy phòng nào khớp với bộ lọc dữ liệu
                    echo '<div class="col-12 text-center py-5">
                            <img src="https://cdn-icons-png.flaticon.com/512/6134/6134065.png" style="max-height: 100px;" class="mb-3 opacity-50">
                            <p class="text-muted fw-bold">Không tìm thấy phòng nghỉ nào phù hợp với tiêu chí của bạn.</p>
                          </div>';
                }
                
                // Giải phóng bộ nhớ kết nối
                $conn->close();
                ?>

            </div>
        </div>

    </div>
</div>

<?php
// Nhúng chân trang hệ thống
include_once '../components/footer.php';
?>