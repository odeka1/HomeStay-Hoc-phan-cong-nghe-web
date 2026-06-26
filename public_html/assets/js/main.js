document.addEventListener("DOMContentLoaded", function () {
    // 1. Khởi tạo đối tượng XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // 2. Xác định đường dẫn động đến file services.xml dựa theo trang hiện tại
    var currentPath = window.location.pathname;
    var xmlUrl = "components/services.xml"; // Trang chủ index.php

    if (currentPath.includes("/pages/")) {
        xmlUrl = "../components/services.xml"; // Các trang trong thư mục pages/ (ví dụ rooms.php)
    }

    xhr.open("GET", xmlUrl, true);

    // 3. Xử lý dữ liệu XML khi tải thành công
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var xmlDoc = xhr.responseXML;
            
            // Tiếp cận phần tử gốc <services>
            var root = xmlDoc.documentElement; 
            
            // Khởi tạo chuỗi HTML dạng Bảng (Table Bootstrap)
            var tableContent = `
                <div class="table-responsive shadow-sm rounded-3">
                    <table class="table table-bordered table-hover align-middle mb-0 bg-white">
                        <thead class="table-success text-uppercase">
                            <tr>
                                <th scope="col" style="width: 10%;">Mã DV</th>
                                <th scope="col" style="width: 25%;">Tên Dịch Vụ</th>
                                <th scope="col" style="width: 15%;">Giá Tiền</th>
                                <th scope="col">Mô Tả Chi Tiết</th>
                                <th scope="col" style="width: 15%;" class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
            `;

            // DÙNG XML DOM: Lấy phần tử con đầu tiên của <services> (đây là một thẻ <service>)
            var serviceNode = root.firstChild;

            // Duyệt qua tất cả các nút con bằng vòng lặp Node Sibling
            while (serviceNode) {
                // Kiểm tra chắc chắn nút đó là một ELEMENT_NODE (nodeType === 1, tránh đọc nhầm khoảng trắng/xuống dòng)
                if (serviceNode.nodeType === 1) {
                    
                    // Lấy thuộc tính id từ thẻ <service>
                    var id = serviceNode.getAttribute("id"); 
                    var name = "", price = "", description = "";

                    // Tiếp cận các node con bên trong <service> bằng cách đi từ đứa con đầu tiên (firstChild)
                    var childNode = serviceNode.firstChild;
                    
                    while (childNode) {
                        if (childNode.nodeType === 1) {
                            // Dùng nodeName để phân loại dữ liệu
                            if (childNode.nodeName === "name") {
                                name = childNode.textContent;
                            } else if (childNode.nodeName === "price") {
                                price = childNode.textContent;
                            } else if (childNode.nodeName === "description") {
                                description = childNode.textContent;
                            }
                        }
                        // Di chuyển sang nút con kế tiếp (thẻ anh em tiếp theo như từ <name> sang <price>)
                        childNode = childNode.nextSibling;
                    }

                    // Định dạng giá tiền tệ VND
                    var formattedPrice = new Intl.NumberFormat('vi-VN').format(price) + 'đ';

                    // Cộng dồn từng dòng (tr) vào bảng dữ liệu
                    tableContent += `
                        <tr>
                            <td><span class="badge bg-secondary px-2 py-1">${id}</span></td>
                            <td class="fw-bold text-dark">${name}</td>
                            <td class="text-danger fw-bold">${formattedPrice}</td>
                            <td class="text-muted small">${description}</td>
                            <td class="text-center">
                                <button class="btn btn-success btn-sm rounded-pill px-3">Chọn</button>
                            </td>
                        </tr>
                    `;
                }
                // DÙNG XML DOM: Di chuyển sang thẻ <service> kế tiếp trong danh sách
                serviceNode = serviceNode.nextSibling;
            }

            tableContent += `
                        </tbody>
                    </table>
                </div>
            `;

            // 4. Tìm vùng chứa trên giao diện web và đổ bảng dữ liệu vào không cần load lại trang
            var serviceTableContainer = document.getElementById("xml-services-table-container");
            if (serviceTableContainer) {
                serviceTableContainer.innerHTML = tableContent;
            }
        }
    };

    xhr.send();

    // ==========================================
    // KHU VỰC KIỂM TRA DỮ LIỆU ĐẦU VÀO (VALIDATION FORM)
    // ==========================================

    // Hàm phụ hiển thị lỗi sử dụng class Bootstrap 5
    function showError(input, message) {
        input.classList.add("is-invalid");
        input.classList.remove("is-valid");
        
        let feedback = input.nextElementSibling;
        // Nếu input nằm trong form-floating, hoặc phần tử tiếp theo không phải invalid-feedback
        if (!feedback || !feedback.classList.contains("invalid-feedback")) {
            feedback = document.createElement("div");
            feedback.className = "invalid-feedback";
            input.parentNode.insertBefore(feedback, input.nextSibling);
        }
        feedback.textContent = message;
    }

    // Hàm phụ xóa hiển thị lỗi
    function clearError(input) {
        input.classList.remove("is-invalid");
        if (input.hasAttribute("required") && input.value.trim() !== "") {
            input.classList.add("is-valid");
        } else {
            input.classList.remove("is-valid");
        }
        
        const feedback = input.nextElementSibling;
        if (feedback && feedback.classList.contains("invalid-feedback")) {
            feedback.remove();
        }
    }

    // Cài đặt lắng nghe thay đổi của input để xóa lỗi thời gian thực (Real-time UX)
    function setupRealTimeValidation(form) {
        const inputs = form.querySelectorAll("input, textarea, select");
        inputs.forEach(input => {
            input.addEventListener("input", function () {
                clearError(input);
            });
            input.addEventListener("change", function () {
                clearError(input);
            });
        });
    }

    // Các biểu thức chính quy (Regex) kiểm tra định dạng
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^(0|\+84)[3|5|7|8|9][0-9]{8}$/;

    // 1. Kiểm tra Dữ Liệu Cho Phiếu Đặt Phòng (bookingForm)
    const bookingForm = document.getElementById("bookingForm");
    if (bookingForm) {
        setupRealTimeValidation(bookingForm);
        
        bookingForm.addEventListener("submit", function (e) {
            let isValid = true;
            
            const guestName = document.getElementById("guestName");
            const guestPhone = document.getElementById("guestPhone");
            const guestEmail = document.getElementById("guestEmail");
            const checkInDate = document.getElementById("checkInDate");
            const checkOutDate = document.getElementById("checkOutDate");
            const termCheck = document.getElementById("termCheck");

            // Kiểm tra Họ tên
            if (!guestName.value.trim()) {
                showError(guestName, "Họ và tên khách hàng không được để trống.");
                isValid = false;
            } else {
                clearError(guestName);
            }

            // Kiểm tra Số điện thoại di động
            if (!guestPhone.value.trim()) {
                showError(guestPhone, "Số điện thoại không được để trống.");
                isValid = false;
            } else if (!phoneRegex.test(guestPhone.value.trim())) {
                showError(guestPhone, "Số điện thoại di động không hợp lệ (ví dụ: 0901234567, gồm 10 chữ số).");
                isValid = false;
            } else {
                clearError(guestPhone);
            }

            // Kiểm tra Email liên hệ
            if (!guestEmail.value.trim()) {
                showError(guestEmail, "Địa chỉ Email không được để trống.");
                isValid = false;
            } else if (!emailRegex.test(guestEmail.value.trim())) {
                showError(guestEmail, "Định dạng Email không chính xác (ví dụ: nguyenan@gmail.com).");
                isValid = false;
            } else {
                clearError(guestEmail);
            }

            // Kiểm tra Ngày Nhận / Trả Phòng
            let checkIn = null;
            let checkOut = null;

            if (!checkInDate.value) {
                showError(checkInDate, "Vui lòng lựa chọn ngày nhận phòng.");
                isValid = false;
            } else {
                checkIn = new Date(checkInDate.value);
                checkIn.setHours(0, 0, 0, 0);
                const today = new Date();
                today.setHours(0, 0, 0, 0);
                
                if (checkIn < today) {
                    showError(checkInDate, "Ngày nhận phòng không được là ngày trong quá khứ.");
                    isValid = false;
                } else {
                    clearError(checkInDate);
                }
            }

            if (!checkOutDate.value) {
                showError(checkOutDate, "Vui lòng lựa chọn ngày trả phòng.");
                isValid = false;
            } else {
                checkOut = new Date(checkOutDate.value);
                checkOut.setHours(0, 0, 0, 0);
                
                if (checkIn && checkOut <= checkIn) {
                    showError(checkOutDate, "Ngày trả phòng phải diễn ra sau ngày nhận phòng ít nhất 1 ngày.");
                    isValid = false;
                } else {
                    clearError(checkOutDate);
                }
            }

            // Kiểm tra ô cam kết điều khoản
            if (termCheck && !termCheck.checked) {
                showError(termCheck, "Bạn bắt buộc phải tích chọn đồng ý tuân thủ nội quy.");
                isValid = false;
            } else if (termCheck) {
                clearError(termCheck);
            }

            // Ngăn chặn submit nếu có lỗi và tự động scroll/focus trường lỗi đầu tiên
            if (!isValid) {
                e.preventDefault();
                const firstInvalid = bookingForm.querySelector(".is-invalid");
                if (firstInvalid) {
                    firstInvalid.scrollIntoView({ behavior: "smooth", block: "center" });
                    firstInvalid.focus();
                }
            }
        });
    }

    // 2. Kiểm tra Dữ Liệu Cho Form Liên Hệ (contactForm)
    const contactForm = document.getElementById("contactForm");
    if (contactForm) {
        setupRealTimeValidation(contactForm);

        contactForm.addEventListener("submit", function (e) {
            let isValid = true;

            const nameInput = document.getElementById("floatingName");
            const phoneInput = document.getElementById("floatingPhone");
            const emailInput = document.getElementById("floatingEmail");
            const messageInput = document.getElementById("floatingMessage");

            // Kiểm tra tên liên hệ
            if (!nameInput.value.trim()) {
                showError(nameInput, "Vui lòng nhập họ và tên của bạn.");
                isValid = false;
            } else {
                clearError(nameInput);
            }

            // Kiểm tra số điện thoại
            if (!phoneInput.value.trim()) {
                showError(phoneInput, "Vui lòng cung cấp số điện thoại liên hệ.");
                isValid = false;
            } else if (!phoneRegex.test(phoneInput.value.trim())) {
                showError(phoneInput, "Số điện thoại di động không hợp lệ (gồm 10 chữ số bắt đầu bằng số 0).");
                isValid = false;
            } else {
                clearError(phoneInput);
            }

            // Kiểm tra email
            if (!emailInput.value.trim()) {
                showError(emailInput, "Vui lòng nhập địa chỉ Email.");
                isValid = false;
            } else if (!emailRegex.test(emailInput.value.trim())) {
                showError(emailInput, "Địa chỉ Email không đúng cấu trúc (ví dụ: name@domain.com).");
                isValid = false;
            } else {
                clearError(emailInput);
            }

            // Kiểm tra tin nhắn
            if (!messageInput.value.trim()) {
                showError(messageInput, "Vui lòng để lại nội dung chi tiết tin nhắn.");
                isValid = false;
            } else {
                clearError(messageInput);
            }

            // Ngăn chặn submit nếu có lỗi
            if (!isValid) {
                e.preventDefault();
                const firstInvalid = contactForm.querySelector(".is-invalid");
                if (firstInvalid) {
                    firstInvalid.scrollIntoView({ behavior: "smooth", block: "center" });
                    firstInvalid.focus();
                }
            }
        });
    }
});