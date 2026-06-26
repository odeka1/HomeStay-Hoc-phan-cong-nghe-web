<?php
// Cấu hình đường dẫn lùi lại 1 cấp thư mục để nhận đúng CSS/JS gốc
$base_url = '../';

// Nhúng các thành phần giao diện hệ thống
include_once '../components/header.php';
include_once '../components/navbar.php';
?>

<div class="bg-light py-5 mb-5 shadow-sm">
    <div class="container text-center">
        <h1 class="fw-bold text-success display-5">Liên Hệ Với Chúng Tôi</h1>
        <p class="lead text-muted mb-0">CozyStay luôn sẵn sàng lắng nghe và hỗ trợ giải đáp mọi thắc mắc của bạn</p>
    </div>
</div>

<div class="container my-5">
    <div class="row g-5">
        
        <div class="col-12 col-lg-5">
            <h4 class="fw-bold text-dark mb-4 border-start border-4 border-success ps-2">Thông Tin Nhóm Dự Án</h4>
            <div class="mb-4">
                <p class="mb-2 fw-bold text-secondary">📍 Địa chỉ trụ sở:</p>
                <p class="text-dark">Khu Đô Thị Đại Học, Phường An Khánh, Quận Ninh Kiều, TP. Cần Thơ</p>
            </div>
            <div class="mb-4">
                <p class="mb-2 fw-bold text-secondary">📞 Đường dây nóng hỗ trợ:</p>
                <p class="text-dark">0123 456 789 (Hỗ trợ 24/7)</p>
            </div>
            <div class="mb-4">
                <p class="mb-2 fw-bold text-secondary">✉️ Hòm thư điện tử:</p>
                <p class="text-dark">support@cozystay.id.vn</p>
            </div>
            
            <div class="mt-4 pt-2">
                <h5 class="fw-bold text-dark mb-3">Vị trí trên bản đồ</h5>
                <div class="ratio ratio-16x9 rounded shadow-sm overflow-hidden">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.841518408643!2d105.74465497587786!3d10.029933690076878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0895a51d6071b%3A0x26fca32f3f80c2f!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBGUFQgQ-G6p24gVGjGoQ!5e0!3m2!1svi!2s!4v1710000000000!5m2!1svi!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-7">
            <div class="card border-0 shadow-sm p-4 p-md-5">
                <h4 class="fw-bold text-dark mb-2">Gửi Tin Nhắn Cho Chúng Tôi</h4>
                <p class="text-muted small mb-4">Hãy để lại thông tin, đội ngũ tư vấn viên của CozyStay sẽ liên hệ lại với bạn trong vòng 24 giờ làm việc.</p>
                
                <form action="contact.php" method="POST" id="contactForm" novalidate>
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName" placeholder="Nguyễn Văn A" required>
                                <label for="floatingName">Họ và tên của bạn</label>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-floating">
                                <input type="tel" class="form-control" id="floatingPhone" placeholder="0901234567" required>
                                <label for="floatingPhone">Số điện thoại</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com" required>
                                <label for="floatingEmail">Địa chỉ Email</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSubject" aria-label="Floating label select support">
                                    <option value="1" selected>Tư vấn đặt phòng nghỉ</option>
                                    <option value="2">Phản hồi về chất lượng dịch vụ</option>
                                    <option value="3">Hợp tác kinh doanh Homestay</option>
                                    <option value="4">Các vấn đề khác</option>
                                </select>
                                <label for="floatingSubject">Bạn cần hỗ trợ về vấn đề gì?</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" id="floatingMessage" placeholder="Leave a comment here" style="height: 150px" required></textarea>
                                <label for="floatingMessage">Nội dung chi tiết lời nhắn...</label>
                            </div>
                        </div>

                        <div class="col-12 pt-2">
                            <button class="btn btn-success fw-bold px-4 py-2 shadow-sm" type="submit">Gửi Lời Nhắn</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?php
// Nhúng chân trang hệ thống
include_once '../components/footer.php';
?>