<?php
$base_url = '../../';
include_once '../components/header.php';
include_once '../components/navbar.php';
?>

<!-- Tiêu đề trang Giới Thiệu -->
<div class="bg-light py-5 mb-5 shadow-sm">
    <div class="container text-center">
        <h1 class="fw-bold text-success display-5">Giới Thiệu Về CozyStay</h1>
        <p class="lead text-muted mb-0">Hành trình kiến tạo không gian nghỉ dưỡng xanh và ấm áp</p>
    </div>
</div>

<div class="container my-5">
    <!-- Khối 1: Câu chuyện thương hiệu -->
    <div class="row align-items-center g-5 mb-5">
        <div class="col-12 col-md-6">
            <h3 class="fw-bold text-dark mb-3">Câu Chuyện Của Chúng Tôi</h3>
            <p class="text-secondary justify-content-">CozyStay được thành lập bởi một nhóm sinh viên đam mê công nghệ và du lịch với mong muốn mang lại giải pháp đặt phòng homestay nhanh chóng, minh bạch và tiện lợi nhất. Chúng tôi không chỉ cung cấp chỗ ở, mà còn mang đến trải nghiệm sống bản địa đích thực.</p>
            <p class="text-secondary">Mọi căn phòng tại CozyStay đều được kiểm duyệt kỹ lưỡng về độ an toàn, tiện nghi và phong cách thiết kế trước khi đưa lên nền tảng website phục vụ du khách.</p>
        </div>
        <div class="col-12 col-md-6">
            <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?q=80&w=800" class="img-fluid rounded shadow" alt="Về chúng tôi">
        </div>
    </div>

    <!-- Khối 2: Câu hỏi thường gặp sử dụng Accordion (Collapse) -->
    <div class="row my-5 pt-4">
        <div class="col-12">
            <h3 class="fw-bold text-dark text-center mb-4">Các Câu Hỏi Thường Gặp (FAQ)</h3>
            <div class="accordion shadow-sm" id="faqAccordion">
                
                <!-- Câu 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeadingOne">
                        <button class="accordion-button fw-bold text-success" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="true" aria-controls="faqCollapseOne">
                            Thời gian nhận phòng (Check-in) và trả phòng (Check-out) là khi nào?
                        </button>
                    </h2>
                    <div id="faqCollapseOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-secondary">
                            Thời gian nhận phòng tiêu chuẩn là từ **14:00** và thời gian trả phòng là trước **12:00** ngày hôm sau. Nếu bạn muốn check-in sớm hoặc check-out muộn, vui lòng ghi chú trong phiếu đặt phòng để chúng tôi sắp xếp tùy theo lượng phòng trống.
                        </div>
                    </div>
                </div>

                <!-- Câu 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeadingTwo">
                        <button class="accordion-button collapsed fw-bold text-success" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">
                            Tôi có thể hủy lịch đặt phòng đã xác nhận không?
                        </button>
                    </h2>
                    <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-secondary">
                            Có. Bạn có thể hủy phòng miễn phí trước ngày nhận phòng ít nhất 48 giờ. Các trường hợp hủy muộn sau thời gian này có thể phải chịu phí phạt tương đương 50% tiền phòng đêm đầu tiên.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
include_once '../components/footer.php';
?>