document.addEventListener("DOMContentLoaded", function () {
    // ------------------------------------------
    // CÁC HÀM PHỤ TRỢ HIỂN THỊ LỖI CHUẨN BOOTSTRAP 5
    // ------------------------------------------
    function showError(input, message) {
        input.classList.add("is-invalid");
        input.classList.remove("is-valid");
        let feedback = input.nextElementSibling;
        if (!feedback || !feedback.classList.contains("invalid-feedback")) {
            feedback = document.createElement("div");
            feedback.className = "invalid-feedback";
            input.parentNode.insertBefore(feedback, input.nextSibling);
        }
        feedback.textContent = message;
    }

    function showValid(input) {
        input.classList.remove("is-invalid");
        if (input.type !== "checkbox" && input.value.trim() !== "") {
            input.classList.add("is-valid");
        } else if (input.type === "checkbox" && input.checked) {
            input.classList.add("is-valid");
        } else {
            input.classList.remove("is-valid");
        }
        const feedback = input.nextElementSibling;
        if (feedback && feedback.classList.contains("invalid-feedback")) {
            feedback.remove();
        }
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^(0|\+84)[3|5|7|8|9][0-9]{8}$/;

    // ------------------------------------------
    // LOGIC RÀNG BUỘC KIỂM TRA CHO TỪNG TRƯỜNG NHẬP LIỆU
    // ------------------------------------------
    
    // Kiểm tra cho Form Đăng Nhập
    function validateLoginField(input) {
        if (input.id === "username") {
            if (!input.value.trim()) {
                showError(input, "Tên đăng nhập hoặc Email không được để trống.");
                return false;
            }
        } else if (input.id === "password") {
            if (!input.value.trim()) {
                showError(input, "Vui lòng nhập mật khẩu tài khoản.");
                return false;
            }
        }
        showValid(input);
        return true;
    }

    // Kiểm tra cho Form Đăng Ký
    function validateRegisterField(input) {
        const regPassword = document.getElementById("reg_password");
        
        if (input.id === "fullname") {
            if (!input.value.trim()) {
                showError(input, "Họ và tên không được để trống.");
                return false;
            }
        } 
        else if (input.id === "reg_username") {
            if (!input.value.trim()) {
                showError(input, "Tên đăng nhập không được để trống.");
                return false;
            } else if (input.value.trim().length < 3) {
                showError(input, "Tên đăng nhập phải chứa tối thiểu 3 ký tự.");
                return false;
            }
        } 
        else if (input.id === "reg_email") {
            if (!input.value.trim()) {
                showError(input, "Địa chỉ Email đăng ký không được để trống.");
                return false;
            } else if (!emailRegex.test(input.value.trim())) {
                showError(input, "Định dạng Email không chính xác (Ví dụ: tên@gmail.com).");
                return false;
            }
        } 
        else if (input.id === "reg_phone") {
            if (!input.value.trim()) {
                showError(input, "Số điện thoại liên hệ không được để trống.");
                return false;
            } else if (!phoneRegex.test(input.value.trim())) {
                showError(input, "Số điện thoại di động gồm 10 chữ số bắt đầu bằng số 0.");
                return false;
            }
        } 
        else if (input.id === "reg_password") {
            if (!input.value.trim()) {
                showError(input, "Mật khẩu đăng ký không được để trống.");
                return false;
            } else if (input.value.trim().length < 6) {
                showError(input, "Mật khẩu bảo mật phải chứa ít nhất 6 ký tự.");
                return false;
            }
            // Nếu ô xác nhận mật khẩu đã có chữ, bắt kiểm tra lại luôn khi đổi mật khẩu gốc
            const confirmPass = document.getElementById("confirm_password");
            if (confirmPass && confirmPass.value.trim()) {
                validateRegisterField(confirmPass);
            }
        } 
        else if (input.id === "confirm_password") {
            if (!input.value.trim()) {
                showError(input, "Vui lòng xác nhận lại mật khẩu vừa nhập.");
                return false;
            } else if (regPassword && input.value.trim() !== regPassword.value.trim()) {
                showError(input, "Mật khẩu xác nhận không trùng khớp.");
                return false;
            }
        }
        else if (input.id === "agreeTerm") {
            if (!input.checked) {
                showError(input, "Bạn bắt buộc phải tích chọn đồng ý điều khoản.");
                return false;
            }
        }
        showValid(input);
        return true;
    }

    // Kiểm tra cho Phiếu Đặt Phòng (bookingForm)
    function validateBookingField(input) {
        const checkInDate = document.getElementById("checkInDate");
        const checkOutDate = document.getElementById("checkOutDate");

        if (input.id === "guestName") {
            if (!input.value.trim()) {
                showError(input, "Họ và tên khách hàng không được để trống.");
                return false;
            }
        } 
        else if (input.id === "guestPhone") {
            if (!input.value.trim()) {
                showError(input, "Số điện thoại không được để trống.");
                return false;
            } else if (!phoneRegex.test(input.value.trim())) {
                showError(input, "Số điện thoại di động không hợp lệ (ví dụ: 0901234567, gồm 10 chữ số).");
                return false;
            }
        } 
        else if (input.id === "guestEmail") {
            if (!input.value.trim()) {
                showError(input, "Địa chỉ Email không được để trống.");
                return false;
            } else if (!emailRegex.test(input.value.trim())) {
                showError(input, "Định dạng Email không chính xác (ví dụ: nguyenan@gmail.com).");
                return false;
            }
        } 
        else if (input.id === "checkInDate") {
            if (!input.value) {
                showError(input, "Vui lòng lựa chọn ngày nhận phòng.");
                return false;
            } else {
                const checkIn = new Date(input.value);
                checkIn.setHours(0, 0, 0, 0);
                const today = new Date();
                today.setHours(0, 0, 0, 0);
                if (checkIn < today) {
                    showError(input, "Ngày nhận phòng không được là ngày trong quá khứ.");
                    return false;
                }
            }
            if (checkOutDate && checkOutDate.value) {
                validateBookingField(checkOutDate);
            }
        } 
        else if (input.id === "checkOutDate") {
            if (!input.value) {
                showError(input, "Vui lòng lựa chọn ngày trả phòng.");
                return false;
            } else {
                const checkOut = new Date(input.value);
                checkOut.setHours(0, 0, 0, 0);
                if (checkInDate && checkInDate.value) {
                    const checkIn = new Date(checkInDate.value);
                    checkIn.setHours(0, 0, 0, 0);
                    if (checkOut <= checkIn) {
                        showError(input, "Ngày trả phòng phải diễn ra sau ngày nhận phòng ít nhất 1 ngày.");
                        return false;
                    }
                }
            }
        } 
        else if (input.id === "termCheck") {
            if (!input.checked) {
                showError(input, "Bạn bắt buộc phải tích chọn đồng ý tuân thủ nội quy.");
                return false;
            }
        }
        showValid(input);
        return true;
    }

    // Kiểm tra cho Form Liên Hệ (contactForm)
    function validateContactField(input) {
        if (input.id === "floatingName") {
            if (!input.value.trim()) {
                showError(input, "Vui lòng nhập họ và tên của bạn.");
                return false;
            }
        } 
        else if (input.id === "floatingPhone") {
            if (!input.value.trim()) {
                showError(input, "Vui lòng cung cấp số điện thoại liên hệ.");
                return false;
            } else if (!phoneRegex.test(input.value.trim())) {
                showError(input, "Số điện thoại di động không hợp lệ (gồm 10 chữ số bắt đầu bằng số 0).");
                return false;
            }
        } 
        else if (input.id === "floatingEmail") {
            if (!input.value.trim()) {
                showError(input, "Vui lòng nhập địa chỉ Email.");
                return false;
            } else if (!emailRegex.test(input.value.trim())) {
                showError(input, "Địa chỉ Email không đúng cấu trúc (ví dụ: name@domain.com).");
                return false;
            }
        } 
        else if (input.id === "floatingMessage") {
            if (!input.value.trim()) {
                showError(input, "Vui lòng để lại nội dung chi tiết tin nhắn.");
                return false;
            }
        }
        showValid(input);
        return true;
    }

    // ------------------------------------------
    // LẮNG NGHE SỰ KIỆN KHI ĐANG GÕ (INPUT) HOẶC RỜI Ô (BLUR)
    // ------------------------------------------
    
    // 1. Áp dụng cho Form Đăng Nhập
    const loginForm = document.getElementById("loginForm");
    if (loginForm) {
        const loginInputs = loginForm.querySelectorAll("input:not([type='checkbox'])");
        
        loginInputs.forEach(input => {
            // Kiểm tra ngay khi người dùng đang gõ hoặc rê chuột ra ngoài ô nhập
            input.addEventListener("input", function () { validateLoginField(input); });
            input.addEventListener("blur", function () { validateLoginField(input); });
        });

        // Lớp bảo vệ cuối cùng khi nhấn nút Đăng Nhập
        loginForm.addEventListener("submit", function (e) {
            let isValid = true;
            loginInputs.forEach(input => {
                if (!validateLoginField(input)) { isValid = false; }
            });
            if (!isValid) { e.preventDefault(); }
        });
    }

    // 2. Áp dụng cho Form Đăng Ký
    const registerForm = document.getElementById("registerForm");
    if (registerForm) {
        const regInputs = registerForm.querySelectorAll("input");
        
        regInputs.forEach(input => {
            if (input.type === "checkbox") {
                input.addEventListener("change", function () { validateRegisterField(input); });
            } else {
                // Kiểm tra liên tục thời gian thực
                input.addEventListener("input", function () { validateRegisterField(input); });
                input.addEventListener("blur", function () { validateRegisterField(input); });
            }
        });

        // Lớp bảo vệ cuối cùng khi nhấn nút Đăng Ký
        registerForm.addEventListener("submit", function (e) {
            let isValid = true;
            regInputs.forEach(input => {
                if (!validateRegisterField(input)) { isValid = false; }
            });

            if (!isValid) {
                e.preventDefault();
                const firstInvalid = registerForm.querySelector(".is-invalid");
                if (firstInvalid) {
                    firstInvalid.scrollIntoView({ behavior: "smooth", block: "center" });
                    firstInvalid.focus();
                }
            }
        });
    }

    // 3. Áp dụng cho Phiếu Đặt Phòng (bookingForm)
    const bookingForm = document.getElementById("bookingForm");
    if (bookingForm) {
        const bookingInputs = bookingForm.querySelectorAll("input, select, textarea");
        
        bookingInputs.forEach(input => {
            if (input.type === "checkbox") {
                input.addEventListener("change", function () { validateBookingField(input); });
            } else if (input.type === "date" || input.tagName === "SELECT") {
                input.addEventListener("change", function () { validateBookingField(input); });
            } else {
                input.addEventListener("input", function () { validateBookingField(input); });
                input.addEventListener("blur", function () { validateBookingField(input); });
            }
        });

        bookingForm.addEventListener("submit", function (e) {
            let isValid = true;
            bookingInputs.forEach(input => {
                if (["guestName", "guestPhone", "guestEmail", "checkInDate", "checkOutDate", "termCheck"].includes(input.id)) {
                    if (!validateBookingField(input)) { isValid = false; }
                }
            });

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

    // 4. Áp dụng cho Form Liên Hệ (contactForm)
    const contactForm = document.getElementById("contactForm");
    if (contactForm) {
        const contactInputs = contactForm.querySelectorAll("input, select, textarea");
        
        contactInputs.forEach(input => {
            if (input.tagName === "SELECT") {
                input.addEventListener("change", function () { validateContactField(input); });
            } else {
                input.addEventListener("input", function () { validateContactField(input); });
                input.addEventListener("blur", function () { validateContactField(input); });
            }
        });

        contactForm.addEventListener("submit", function (e) {
            let isValid = true;
            contactInputs.forEach(input => {
                if (["floatingName", "floatingPhone", "floatingEmail", "floatingMessage"].includes(input.id)) {
                    if (!validateContactField(input)) { isValid = false; }
                }
            });

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