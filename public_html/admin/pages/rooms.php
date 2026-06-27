<?php
$current_page = 'rooms';
$admin_base_url = '../';
$base_url = '../../';
include_once '../components/admin_header.php';
include_once '../components/admin_navbar.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
    <h1 class="h3 fw-bold text-dark mb-0">Quản Lý Phòng Nghỉ</h1>
    <button class="btn btn-success fw-bold btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#addRoomModal">
        <i class="bi bi-plus-circle me-1"></i>Thêm phòng mới
    </button>
</div>

<!-- Table showing room details -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-0">
        <div class="table-responsive border-0 shadow-none">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3" style="width: 80px;">ID</th>
                        <th style="width: 120px;">Hình ảnh</th>
                        <th>Tên phòng</th>
                        <th style="width: 150px;">Loại phòng</th>
                        <th style="width: 150px;">Giá / Đêm</th>
                        <th>Mô tả</th>
                        <th class="text-center pe-3" style="width: 150px;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP WHILE LOOP START -->
                    <!-- Dữ liệu mẫu (Mock data) 1 -->
                    <tr data-id="1" data-name="Phòng Đơn Standard 101" data-type="single" data-price="450000" data-description="Phòng đơn tiêu chuẩn, thoáng mát, đầy đủ tiện nghi cơ bản cho khách đơn lẻ." data-image="room1.jpg">
                        <td class="ps-3 fw-bold">1</td>
                        <td>
                            <img src="<?php echo $base_url; ?>assets/images/rooms/room1.jpg" alt="Phòng Đơn Standard 101" class="img-thumbnail" style="width: 80px; height: 50px; object-fit: cover;" onerror="this.src='https://placehold.co/100x60?text=Room+1'">
                        </td>
                        <td class="fw-bold">Phòng Đơn Standard 101</td>
                        <td><span class="badge bg-secondary px-2 py-1">Single</span></td>
                        <td class="text-danger fw-bold">450.000đ</td>
                        <td class="text-muted small text-truncate" style="max-width: 250px;">Phòng đơn tiêu chuẩn, thoáng mát, đầy đủ tiện nghi cơ bản cho khách đơn lẻ.</td>
                        <td class="text-center pe-3">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-primary btn-edit" data-bs-toggle="modal" data-bs-target="#editRoomModal" title="Sửa thông tin">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-delete" data-bs-toggle="modal" data-bs-target="#deleteRoomModal" title="Xóa phòng">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Dữ liệu mẫu (Mock data) 2 -->
                    <tr data-id="2" data-name="Phòng Đôi Deluxe 201" data-type="double" data-price="900000" data-description="Phòng đôi hạng sang rộng rãi, giường cỡ lớn, ban công ngắm cảnh núi non yên bình." data-image="room2.jpg">
                        <td class="ps-3 fw-bold">2</td>
                        <td>
                            <img src="<?php echo $base_url; ?>assets/images/rooms/room2.jpg" alt="Phòng Đôi Deluxe 201" class="img-thumbnail" style="width: 80px; height: 50px; object-fit: cover;" onerror="this.src='https://placehold.co/100x60?text=Room+2'">
                        </td>
                        <td class="fw-bold">Phòng Đôi Deluxe 201</td>
                        <td><span class="badge bg-primary px-2 py-1">Double</span></td>
                        <td class="text-danger fw-bold">900.000đ</td>
                        <td class="text-muted small text-truncate" style="max-width: 250px;">Phòng đôi hạng sang rộng rãi, giường cỡ lớn, ban công ngắm cảnh núi non yên bình.</td>
                        <td class="text-center pe-3">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-primary btn-edit" data-bs-toggle="modal" data-bs-target="#editRoomModal" title="Sửa thông tin">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-delete" data-bs-toggle="modal" data-bs-target="#deleteRoomModal" title="Xóa phòng">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Dữ liệu mẫu (Mock data) 3 -->
                    <tr data-id="3" data-name="Phòng Gia Đình VIP 301" data-type="family" data-price="1600000" data-description="Căn hộ gia đình siêu VIP, gồm 2 phòng ngủ kết nối, bếp nấu riêng, thiết kế phong cách gỗ ấm áp." data-image="room3.jpg">
                        <td class="ps-3 fw-bold">3</td>
                        <td>
                            <img src="<?php echo $base_url; ?>assets/images/rooms/room3.jpg" alt="Phòng Gia Đình VIP 301" class="img-thumbnail" style="width: 80px; height: 50px; object-fit: cover;" onerror="this.src='https://placehold.co/100x60?text=Room+3'">
                        </td>
                        <td class="fw-bold">Phòng Gia Đình VIP 301</td>
                        <td><span class="badge bg-success px-2 py-1">Family</span></td>
                        <td class="text-danger fw-bold">1.600.000đ</td>
                        <td class="text-muted small text-truncate" style="max-width: 250px;">Căn hộ gia đình siêu VIP, gồm 2 phòng ngủ kết nối, bếp nấu riêng, thiết kế phong cách gỗ ấm áp.</td>
                        <td class="text-center pe-3">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-primary btn-edit" data-bs-toggle="modal" data-bs-target="#editRoomModal" title="Sửa thông tin">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-delete" data-bs-toggle="modal" data-bs-target="#deleteRoomModal" title="Xóa phòng">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- PHP WHILE LOOP END -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ==================================================== -->
<!-- MODAL: THÊM PHÒNG MỚI (ADD ROOM MODAL) -->
<!-- ==================================================== -->
<div class="modal fade" id="addRoomModal" tabindex="-1" aria-labelledby="addRoomModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold" id="addRoomModalLabel"><i class="bi bi-plus-circle me-2"></i>Thêm Phòng Nghỉ Mới</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="rooms.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add">
                
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="add_room_name" class="form-label small fw-bold text-secondary">Tên phòng nghỉ *</label>
                        <input type="text" class="form-control text-dark" id="add_room_name" name="room_name" placeholder="Ví dụ: Phòng đơn Cozy 101" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="add_room_type" class="form-label small fw-bold text-secondary">Loại phòng nghỉ *</label>
                        <select class="form-select" id="add_room_type" name="room_type" required>
                            <option value="" disabled selected>-- Chọn loại phòng --</option>
                            <option value="single">Single (Phòng đơn tiêu chuẩn)</option>
                            <option value="double">Double (Phòng đôi sang trọng)</option>
                            <option value="family">Family (Phòng gia đình tiện nghi)</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="add_price" class="form-label small fw-bold text-secondary">Đơn giá thuê / đêm (VNĐ) *</label>
                        <input type="number" class="form-control text-dark" id="add_price" name="price" placeholder="Ví dụ: 500000" min="1000" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="add_description" class="form-label small fw-bold text-secondary">Mô tả đặc điểm phòng nghỉ *</label>
                        <textarea class="form-control text-dark" id="add_description" name="description" placeholder="Nhập mô tả về diện tích, giường, tiện ích đi kèm..." style="height: 100px;" required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="add_room_image" class="form-label small fw-bold text-secondary">Hình ảnh đại diện phòng nghỉ *</label>
                        <input type="file" class="form-control" id="add_room_image" name="room_image" accept="image/*" required>
                        <div class="form-text fs-8 text-muted">Hỗ trợ định dạng JPG, PNG, WEBP. Dung lượng tối đa 2MB.</div>
                    </div>
                </div>
                
                <div class="modal-footer bg-light border-top">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-success btn-sm fw-bold">Hoàn Tất Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ==================================================== -->
<!-- MODAL: SỬA THÔNG TIN PHÒNG (EDIT ROOM MODAL) -->
<!-- ==================================================== -->
<div class="modal fade" id="editRoomModal" tabindex="-1" aria-labelledby="editRoomModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold" id="editRoomModalLabel"><i class="bi bi-pencil-square me-2"></i>Cập Nhật Phòng Nghỉ</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="rooms.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" id="edit_room_id" name="room_id">
                
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_room_name" class="form-label small fw-bold text-secondary">Tên phòng nghỉ *</label>
                        <input type="text" class="form-control text-dark" id="edit_room_name" name="room_name" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="edit_room_type" class="form-label small fw-bold text-secondary">Loại phòng nghỉ *</label>
                        <select class="form-select" id="edit_room_type" name="room_type" required>
                            <option value="single">Single (Phòng đơn tiêu chuẩn)</option>
                            <option value="double">Double (Phòng đôi sang trọng)</option>
                            <option value="family">Family (Phòng gia đình tiện nghi)</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="edit_price" class="form-label small fw-bold text-secondary">Đơn giá thuê / đêm (VNĐ) *</label>
                        <input type="number" class="form-control text-dark" id="edit_price" name="price" min="1000" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="edit_description" class="form-label small fw-bold text-secondary">Mô tả đặc điểm phòng nghỉ *</label>
                        <textarea class="form-control text-dark" id="edit_description" name="description" style="height: 100px;" required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="edit_room_image" class="form-label small fw-bold text-secondary">Thay đổi hình ảnh (Không bắt buộc)</label>
                        <input type="file" class="form-control mb-2" id="edit_room_image" name="room_image" accept="image/*">
                        <div class="form-text fs-8 text-muted mb-2">Để trống nếu muốn giữ nguyên ảnh cũ.</div>
                        <div id="edit_image_preview_container">
                            <span class="fs-8 text-muted d-block mb-1">Ảnh hiện tại:</span>
                            <img id="edit_image_preview" src="" class="img-thumbnail" style="max-height: 80px; object-fit: cover;">
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer bg-light border-top">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary btn-sm fw-bold">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ==================================================== -->
<!-- MODAL: XÁC NHẬN XÓA PHÒNG (DELETE ROOM CONFIRMATION MODAL) -->
<!-- ==================================================== -->
<div class="modal fade" id="deleteRoomModal" tabindex="-1" aria-labelledby="deleteRoomModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-danger text-white py-2">
                <h6 class="modal-title fw-bold" id="deleteRoomModalLabel"><i class="bi bi-trash-fill me-2"></i>Xóa Phòng Nghỉ?</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="rooms.php" method="POST">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" id="delete_room_id" name="room_id">
                
                <div class="modal-body text-center py-4">
                    <i class="bi bi-exclamation-octagon text-danger fs-1 mb-2 d-block"></i>
                    <p class="mb-1 text-dark fw-bold">Bạn có chắc chắn muốn xóa?</p>
                    <p class="text-secondary small mb-0">Hành động này sẽ xóa vĩnh viễn thông tin phòng <strong id="delete_room_name_text" class="text-dark"></strong> ra khỏi hệ thống.</p>
                </div>
                
                <div class="modal-footer bg-light border-top py-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-danger btn-sm fw-bold">Xác Nhận Xóa</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once '../components/admin_footer.php';
?>
