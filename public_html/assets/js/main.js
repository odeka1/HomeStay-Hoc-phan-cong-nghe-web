document.addEventListener("DOMContentLoaded", function () {
    // 1. Khởi tạo đối tượng XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // 2. Tự động kiểm tra đường dẫn để chạy được ở cả trang chủ lẫn các trang con trong pages/
    var currentPath = window.location.pathname;
    var xmlUrl = "public_html/components/services.xml"; // Đường dẫn nếu đang đứng ở trang chủ index.php

    if (currentPath.includes("/pages/")) {
        xmlUrl = "../components/services.xml"; // Đường dẫn nếu đang đứng ở trong thư mục pages/
    }

    // Cấu hình yêu cầu GET gọi file XML của bạn
    xhr.open("GET", xmlUrl, true);

    // 3. Xử lý dữ liệu khi hệ thống đọc file XML thành công
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var xmlDoc = xhr.responseXML;
            var services = xmlDoc.getElementsByTagName("service");
            var htmlContent = '<div class="row">';

            // Vòng lặp duyệt qua từng dịch vụ trong file XML của bạn
            for (var i = 0; i < services.length; i++) {
                var id = services[i].getAttribute("id"); // Lấy mã ID đã chuẩn hóa
                var name = services[i].getElementsByTagName("name")[0].textContent;
                var price = services[i].getElementsByTagName("price")[0].textContent;
                var description = services[i].getElementsByTagName("description")[0].textContent;

                // Định dạng hiển thị tiền tệ VND (Ví dụ: 350000 thành 350.000đ)
                var formattedPrice = new Intl.NumberFormat('vi-VN').format(price) + 'đ';

                // Tạo cấu trúc card Bootstrap đẹp mắt, đồng bộ với CozyStay
                htmlContent += `
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100 shadow-sm border-0" style="border-radius: 12px; overflow: hidden;">
                            <div class="card-body bg-light">
                                <span class="badge bg-success mb-2">Mã: ${id}</span>
                                <h5 class="card-title fw-bold text-dark">${name}</h5>
                                <p class="card-text text-muted small mb-0">${description}</p>
                            </div>
                            <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center pb-3">
                                <span class="text-danger fw-bold fs-5">${formattedPrice}</span>
                                <button class="btn btn-outline-success btn-sm px-3 rounded-pill">Đặt kèm</button>
                            </div>
                        </div>
                    </div>
                `;
            }
            htmlContent += '</div>';

            // 4. Đổ dữ liệu vào vùng chứa HTML trên trang web
            var serviceContainer = document.getElementById("xml-services-container");
            if (serviceContainer) {
                serviceContainer.innerHTML = htmlContent;
            }
        }
    };

    // Gửi yêu cầu đi
    xhr.send();
});