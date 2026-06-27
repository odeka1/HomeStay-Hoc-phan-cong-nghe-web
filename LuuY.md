# HƯỚNG DẪN TÍCH HỢP BACKEND & CÁC CHỨC NĂNG DỰ ÁN COZYSTAY

Tài liệu này tổng hợp danh sách các chức năng chính, các tệp mã nguồn tương ứng và hướng dẫn chi tiết cho lập trình viên Backend PHP để đổ dữ liệu và xử lý nghiệp vụ.

---

## I. GIAO DIỆN QUẢN TRỊ (ADMIN CONTROL PANEL)

Thư mục quản trị nằm tại: `public_html/admin/`

### 1. Bố cục chung (Layout Components)

- **Header & Thư viện CSS:** [admin_header.php](public_html/admin/components/admin_header.php)
  - _Nhiệm vụ:_ Nối link CSS Bootstrap 5.3.3 và định nghĩa màu giao diện xám đen/xanh lá.
- **Chân trang & Thư viện JS:** [admin_footer.php](public_html/admin/components/admin_footer.php)
  - _Nhiệm vụ:_ Nối link Bootstrap Bundle JS và file [admin.js](public_html/assets/js/admin.js).
- **Thanh điều hướng & Sidebar:** [admin_navbar.php](public_html/admin/components/admin_navbar.php)
  - _Backend Lưu ý:_
    - Có sẵn khối hiển thị thông báo lỗi/thành công từ PHP ở dòng [97 đến 114](public_html/admin/components/admin_navbar.php#L97-L114). Backend chỉ cần thiết lập biến `$error_msg` hoặc `$success_msg`.
    - Tự động nhận diện tab đang chọn bằng biến `$current_page` để làm nổi bật Menu.

### 2. Trang chủ quản trị (Dashboard Overview)

- **Đường dẫn tệp:** [dashboard.php](public_html/admin/dashboard.php)
- **Backend Hướng dẫn:**
  - _Số liệu thống kê (Metrics):_ Thay thế các biến giả lập `$total_rooms`, `$total_bookings`, `$total_users`, `$monthly_revenue` ở dòng [7 đến 12](public_html/admin/dashboard.php#L7-L12) bằng các câu lệnh truy vấn SQL `COUNT` hoặc `SUM`.
  - _Danh sách đặt phòng mới nhất:_ Thực hiện vòng lặp cơ sở dữ liệu (Database Loop) giữa 2 thẻ ghi chú:
    - `<!-- PHP WHILE LOOP FOR RECENT BOOKINGS START -->` ở dòng [125](public_html/admin/dashboard.php#L125)
    - `<!-- PHP WHILE LOOP FOR RECENT BOOKINGS END -->` ở dòng [166](public_html/admin/dashboard.php#L166)

### 3. Quản lý phòng nghỉ (CRUD Rooms)

- **Đường dẫn tệp:** [rooms.php](public_html/admin/pages/rooms.php)
- **Backend Hướng dẫn:**
  - _Vòng lặp hiển thị danh sách phòng:_ Chèn vòng lặp SQL `SELECT * FROM rooms` giữa:
    - `<!-- PHP WHILE LOOP START -->` ở dòng [32](public_html/admin/pages/rooms.php#L32)
    - `<!-- PHP WHILE LOOP END -->` ở dòng [103](public_html/admin/pages/rooms.php#L103)
    - _Lưu ý quan trọng:_ Thẻ `<tr>` phải giữ nguyên các thuộc tính `data-id`, `data-name`, `data-type`, `data-price`, `data-description`, `data-image` để JavaScript có thể đọc và đẩy vào Modal khi nhấn Sửa/Xóa.
  - _Form Thêm Phòng (Add Modal):_ Bắt sự kiện `POST` với `action="add"`. Form bắt đầu từ dòng [112](public_html/admin/pages/rooms.php#L112). Các trường dữ liệu gửi lên:
    - `name="room_name"` (Văn bản)
    - `name="room_type"` (Tùy chọn: single / double / family)
    - `name="price"` (Số nguyên)
    - `name="description"` (Đoạn văn bản)
    - `name="room_image"` (Tệp tin tải lên)
  - _Form Sửa Phòng (Edit Modal):_ Bắt sự kiện `POST` với `action="edit"`. Form bắt đầu từ dòng [160](public_html/admin/pages/rooms.php#L160).
    - Cần kiểm tra xem tệp ảnh `room_image` có được tải lên không. Nếu không, giữ nguyên ảnh cũ trong DB.
    - ID phòng cần sửa lấy từ phần tử ẩn: `<input type="hidden" id="edit_room_id" name="room_id">`.
  - _Form Xóa Phòng (Delete Modal):_ Bắt sự kiện `POST` với `action="delete"`. Form bắt đầu từ dòng [209](public_html/admin/pages/rooms.php#L209).
    - ID phòng cần xóa lấy từ: `<input type="hidden" id="delete_room_id" name="room_id">`.

### 4. Quản lý đơn đặt phòng (Bookings Management)

- **Đường dẫn tệp:** [bookings.php](public_html/admin/pages/bookings.php)
- **Backend Hướng dẫn:**
  - _Vòng lặp hiển thị đơn đặt phòng:_ Vòng lặp cơ sở dữ liệu đặt giữa:
    - `<!-- PHP WHILE LOOP FOR BOOKINGS START -->` ở dòng [22](public_html/admin/pages/bookings.php#L22)
    - `<!-- PHP WHILE LOOP FOR BOOKINGS END -->` ở dòng [82](public_html/admin/pages/bookings.php#L82)
  - _Form Cập Nhật Trạng Thái (Status Modal):_ Bắt sự kiện `POST` với `action="update_status"`. Form bắt đầu từ dòng [90](public_html/admin/pages/bookings.php#L90).
    - ID hóa đơn cần cập nhật lấy từ: `<input type="hidden" id="status_booking_id" name="booking_id">`.
    - Tùy chọn trạng thái mới nhận từ trường: `name="status"` (giá trị gồm: `pending` hoặc `confirmed`).

### 5. Quản lý danh sách khách hàng

- **Đường dẫn tệp:** [users.php](public_html/admin/pages/users.php)
- **Backend Hướng dẫn:**
  - _Vòng lặp danh sách thành viên:_ Chèn vòng lặp `SELECT * FROM users` ở giữa:
    - `<!-- PHP WHILE LOOP FOR USERS START -->` ở dòng [21](public_html/admin/pages/users.php#L21)
    - `<!-- PHP WHILE LOOP FOR USERS END -->` ở dòng [54](public_html/admin/pages/users.php#L54)

---

## II. RÀNG BUỘC PHÍA MÁY KHÁCH & GIỮ DỮ LIỆU CŨ (CLIENT-SIDE)

Các trang giao diện người dùng (khách) nằm trong thư mục `public_html/` và `public_html/pages/`.

### 1. Ràng buộc dữ liệu phía Client (JavaScript Validation)

- **Đường dẫn tệp:** [validation.js](public_html/assets/js/validation.js)
  - _Nhiệm vụ:_ Kiểm tra tính hợp lệ của dữ liệu ngay khi người dùng đang nhập hoặc bấm nút hoàn tất (Submit). Ngăn chặn hành vi gửi form nếu có lỗi (`e.preventDefault()`), giúp tránh tải lại trang gây mất thông tin.
  - _Bao gồm các form:_ Đăng nhập, Đăng ký, Đăng ký lưu trú (Đặt phòng), và Gửi liên hệ.

### 2. Lưu giữ thông tin cũ khi trang bị tải lại (PHP Form State Retention)

Trong trường hợp dữ liệu vượt qua JS nhưng gặp lỗi khi kiểm tra ở Backend PHP, các trường nhập liệu đã được lập trình sẵn để giữ lại những gì khách hàng vừa gõ, tránh việc phải nhập lại từ đầu:

- **Trang Đăng Nhập:** [login.php](public_html/pages/login.php)
  - _Tên đăng nhập / Email:_ ở dòng [35](public_html/pages/login.php#L35)
- **Trang Đăng Ký:** [register.php](public_html/pages/register.php)
  - _Họ và tên:_ ở dòng [32](public_html/pages/register.php#L32)
  - _Tên đăng nhập:_ ở dòng [36](public_html/pages/register.php#L36)
  - _Email đăng ký:_ ở dòng [40](public_html/pages/register.php#L40)
  - _Số điện thoại:_ ở dòng [44](public_html/pages/register.php#L44)
- **Trang Phiếu Đặt Phòng:** [booking.php](public_html/pages/booking.php)
  - _Tên khách hàng:_ ở dòng [125](public_html/pages/booking.php#L125)
  - _Số điện thoại:_ ở dòng [130](public_html/pages/booking.php#L130)
  - _Email liên hệ:_ ở dòng [135](public_html/pages/booking.php#L135)
  - _Ngày nhận phòng / Ngày trả phòng:_ ở dòng [140](public_html/pages/booking.php#L140) và [145](public_html/pages/booking.php#L145)
  - _Số lượng khách (Dropdown):_ Giữ nguyên vị trí lựa chọn cũ ở dòng [149 đến 156](public_html/pages/booking.php#L149-L156).
  - _Yêu cầu đặc biệt (Textarea):_ Giữ văn bản trong ô nhập ở dòng [160](public_html/pages/booking.php#L160).
