document.addEventListener("DOMContentLoaded", function () {
    // ==========================================
    // QUẢN LÝ PHÒNG NGHỈ (ROOMS CRUD INTERACTION)
    // ==========================================

    // 1. Khi bấm nút Sửa Phòng (Edit Room)
    const editButtons = document.querySelectorAll(".btn-edit");
    editButtons.forEach(button => {
        button.addEventListener("click", function () {
            // Lấy dòng <tr> chứa thông tin phòng tương ứng
            const row = this.closest("tr");
            
            // Đọc dữ liệu từ data attributes
            const id = row.getAttribute("data-id");
            const name = row.getAttribute("data-name");
            const type = row.getAttribute("data-type");
            const price = row.getAttribute("data-price");
            const description = row.getAttribute("data-description");
            const image = row.getAttribute("data-image");

            // Điền dữ liệu vào các ô nhập của Modal Sửa
            document.getElementById("edit_room_id").value = id;
            document.getElementById("edit_room_name").value = name;
            document.getElementById("edit_room_type").value = type;
            document.getElementById("edit_price").value = price;
            document.getElementById("edit_description").value = description;

            // Xử lý hiển thị ảnh hiện tại
            const previewImg = document.getElementById("edit_image_preview");
            if (previewImg) {
                // Xác định đường dẫn tương đối tùy theo vị trí chạy
                let imgPath = "../assets/images/rooms/" + image;
                if (window.location.pathname.includes("/admin/pages/")) {
                    imgPath = "../../assets/images/rooms/" + image;
                }
                previewImg.src = imgPath;
            }
        });
    });

    // 2. Khi bấm nút Xóa Phòng (Delete Room)
    const deleteButtons = document.querySelectorAll(".btn-delete");
    deleteButtons.forEach(button => {
        button.addEventListener("click", function () {
            const row = this.closest("tr");
            const id = row.getAttribute("data-id");
            const name = row.getAttribute("data-name");

            // Điền thông tin vào Modal Xác nhận xóa
            document.getElementById("delete_room_id").value = id;
            document.getElementById("delete_room_name_text").textContent = '"' + name + '"';
        });
    });

    // ==========================================
    // QUẢN LÝ ĐƠN ĐẶT PHÒNG (BOOKINGS MANAGEMENT INTERACTION)
    // ==========================================

    // 3. Khi bấm nút Trạng thái Đơn đặt phòng (Change Status / View Details)
    const statusButtons = document.querySelectorAll(".btn-status");
    statusButtons.forEach(button => {
        button.addEventListener("click", function () {
            const row = this.closest("tr");
            
            // Đọc toàn bộ thuộc tính dữ liệu từ thẻ tr
            const id = row.getAttribute("data-id");
            const guestName = row.getAttribute("data-guest-name");
            const phone = row.getAttribute("data-phone");
            const email = row.getAttribute("data-email");
            const roomName = row.getAttribute("data-room-name");
            const checkIn = row.getAttribute("data-check-in");
            const checkOut = row.getAttribute("data-check-out");
            const totalPrice = row.getAttribute("data-total-price");
            const status = row.getAttribute("data-status");
            const notes = row.getAttribute("data-notes");

            // Định dạng ngày hiển thị dd/mm/yyyy
            const formatDate = (dateStr) => {
                if (!dateStr) return "Chưa cập nhật";
                const d = new Date(dateStr);
                return (!isNaN(d.getTime())) ? d.toLocaleDateString("vi-VN") : dateStr;
            };

            // Định dạng tiền tệ hiển thị
            const formatPrice = (priceVal) => {
                return new Intl.NumberFormat('vi-VN').format(priceVal) + 'đ';
            };

            // Điền thông tin văn bản hiển thị lên bảng tóm tắt
            document.getElementById("status_booking_id").value = id;
            document.getElementById("status_booking_id_text").textContent = "#BK-" + id;
            document.getElementById("status_room_name_text").textContent = roomName;
            document.getElementById("status_guest_name_text").textContent = guestName;
            document.getElementById("status_contact_text").textContent = phone + " / " + email;
            document.getElementById("status_stay_dates_text").textContent = formatDate(checkIn) + " - " + formatDate(checkOut);
            document.getElementById("status_price_text").textContent = formatPrice(totalPrice);
            
            // Xử lý hiển thị ghi chú của khách hàng
            const notesText = document.getElementById("status_notes_text");
            if (notesText) {
                notesText.textContent = notes ? notes : "Không có yêu cầu đặc biệt nào đi kèm.";
            }

            // Chọn đúng tùy chọn trạng thái hiện tại trong Select Dropdown
            const statusSelect = document.getElementById("booking_status");
            if (statusSelect) {
                statusSelect.value = status;
            }
        });
    });
});
