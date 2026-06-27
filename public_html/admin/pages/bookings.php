<?php
$current_page = 'bookings';
$admin_base_url = '../';
$base_url = '../../';
include_once '../components/admin_header.php';
include_once '../components/admin_navbar.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
    <h1 class="h3 fw-bold text-dark mb-0">Quản Lý Đơn Đặt Phòng</h1>
</div>

<!-- Table showing bookings -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-0">
        <div class="table-responsive border-0 shadow-none">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3" style="width: 120px;">Mã đơn</th>
                        <th>Khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Phòng đặt</th>
                        <th>Nhận phòng</th>
                        <th>Trả phòng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th class="text-center pe-3" style="width: 180px;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP WHILE LOOP FOR BOOKINGS START -->
                    <!-- Dữ liệu mẫu (Mock data) 1 -->
                    <tr data-id="1082" data-guest-name="Nguyễn Văn A" data-phone="0912345678" data-email="nguyenvana@gmail.com" data-room-name="Phòng Đôi Deluxe 201" data-check-in="2026-06-28" data-check-out="2026-06-30" data-total-price="1800000" data-status="pending" data-notes="Cần thêm 1 xe máy tự lái từ chiều 28.">
                        <td class="ps-3 fw-bold">#BK-1082</td>
                        <td class="fw-bold">Nguyễn Văn A</td>
                        <td>0912345678</td>
                        <td>Phòng Đôi Deluxe 201</td>
                        <td>28/06/2026</td>
                        <td>30/06/2026</td>
                        <td class="fw-bold text-dark">1.800.000đ</td>
                        <td><span class="badge bg-warning text-dark px-2 py-1 fs-8">Pending</span></td>
                        <td class="text-center pe-3">
                            <button type="button" class="btn btn-sm btn-outline-success btn-status" data-bs-toggle="modal" data-bs-target="#changeStatusModal">
                                <i class="bi bi-gear-fill me-1"></i>Trạng thái
                            </button>
                        </td>
                    </tr>
                    
                    <!-- Dữ liệu mẫu (Mock data) 2 -->
                    <tr data-id="1081" data-guest-name="Trần Thị B" data-phone="0987654321" data-email="tranthib@gmail.com" data-room-name="Phòng Gia Đình VIP 301" data-check-in="2026-06-25" data-check-out="2026-06-27" data-total-price="3200000" data-status="confirmed" data-notes="Gia đình có bé nhỏ, chuẩn bị giúp nôi em bé.">
                        <td class="ps-3 fw-bold">#BK-1081</td>
                        <td class="fw-bold">Trần Thị B</td>
                        <td>0987654321</td>
                        <td>Phòng Gia Đình VIP 301</td>
                        <td>25/06/2026</td>
                        <td>27/06/2026</td>
                        <td class="fw-bold text-dark">3.200.000đ</td>
                        <td><span class="badge bg-success px-2 py-1 fs-8">Confirmed</span></td>
                        <td class="text-center pe-3">
                            <button type="button" class="btn btn-sm btn-outline-success btn-status" data-bs-toggle="modal" data-bs-target="#changeStatusModal">
                                <i class="bi bi-gear-fill me-1"></i>Trạng thái
                            </button>
                        </td>
                    </tr>
                    
                    <!-- Dữ liệu mẫu (Mock data) 3 -->
                    <tr data-id="1080" data-guest-name="Lê Hoàng C" data-phone="0905123456" data-email="lehoangc@gmail.com" data-room-name="Phòng Đơn Standard 102" data-check-in="2026-06-22" data-check-out="2026-06-23" data-total-price="450000" data-status="confirmed" data-notes="">
                        <td class="ps-3 fw-bold">#BK-1080</td>
                        <td class="fw-bold">Lê Hoàng C</td>
                        <td>0905123456</td>
                        <td>Phòng Đơn Standard 102</td>
                        <td>22/06/2026</td>
                        <td>23/06/2026</td>
                        <td class="fw-bold text-dark">450.000đ</td>
                        <td><span class="badge bg-success px-2 py-1 fs-8">Confirmed</span></td>
                        <td class="text-center pe-3">
                            <button type="button" class="btn btn-sm btn-outline-success btn-status" data-bs-toggle="modal" data-bs-target="#changeStatusModal">
                                <i class="bi bi-gear-fill me-1"></i>Trạng thái
                            </button>
                        </td>
                    </tr>
                    <!-- PHP WHILE LOOP FOR BOOKINGS END -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ==================================================== -->
<!-- MODAL: XEM & THAY ĐỔI TRẠNG THÁI ĐƠN HÀNG (STATUS MODAL) -->
<!-- ==================================================== -->
<div class="modal fade" id="changeStatusModal" tabindex="-1" aria-labelledby="changeStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold" id="changeStatusModalLabel"><i class="bi bi-info-circle-fill me-2"></i>Chi Tiết & Cập Nhật Trạng Thái</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="bookings.php" method="POST">
                <input type="hidden" name="action" value="update_status">
                <input type="hidden" id="status_booking_id" name="booking_id">
                
                <div class="modal-body">
                    <!-- Billing Summary -->
                    <div class="card bg-light border-0 p-3 mb-4 rounded-3">
                        <div class="row g-2">
                            <div class="col-6">
                                <span class="text-secondary small">Mã đơn đặt phòng:</span>
                                <div class="fw-bold text-dark" id="status_booking_id_text">#BK-0000</div>
                            </div>
                            <div class="col-6">
                                <span class="text-secondary small">Phòng nghỉ chọn:</span>
                                <div class="fw-bold text-success" id="status_room_name_text">Chưa cập nhật</div>
                            </div>
                            <div class="col-12"><hr class="my-1 border-secondary-subtle"></div>
                            <div class="col-6">
                                <span class="text-secondary small">Tên khách hàng:</span>
                                <div class="fw-bold text-dark" id="status_guest_name_text">Chưa cập nhật</div>
                            </div>
                            <div class="col-6">
                                <span class="text-secondary small">Số điện thoại / Email:</span>
                                <div class="fw-bold text-dark" id="status_contact_text">Chưa cập nhật</div>
                            </div>
                            <div class="col-6 mt-2">
                                <span class="text-secondary small">Thời gian lưu trú:</span>
                                <div class="fw-bold text-dark" id="status_stay_dates_text">Chưa cập nhật</div>
                            </div>
                            <div class="col-6 mt-2">
                                <span class="text-secondary small">Tổng tiền hóa đơn:</span>
                                <div class="fw-bold text-danger fs-6" id="status_price_text">0đ</div>
                            </div>
                            <div class="col-12 mt-2">
                                <span class="text-secondary small">Yêu cầu đặc biệt:</span>
                                <p class="text-dark small bg-white p-2 border rounded mb-0 text-break" id="status_notes_text">Không có ghi chú đặc biệt.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Edit Status Selection -->
                    <div class="mb-3">
                        <label for="booking_status" class="form-label small fw-bold text-secondary">Cập nhật trạng thái xử lý đơn *</label>
                        <select class="form-select text-dark" id="booking_status" name="status" required>
                            <option value="pending">Pending (Đang chờ xác nhận)</option>
                            <option value="confirmed">Confirmed (Đã duyệt & Đặt cọc thành công)</option>
                        </select>
                        <div class="form-text fs-8 text-muted mt-2">
                            Sau khi đổi trạng thái, hệ thống sẽ tự động cập nhật trong cơ sở dữ liệu.
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer bg-light border-top">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-success btn-sm fw-bold">Cập Nhật Trạng Thái</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once '../components/admin_footer.php';
?>
