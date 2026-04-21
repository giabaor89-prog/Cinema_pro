# 🎬 CINEMA PRO WEBSITE ĐẶT VÉ XEM PHIM ONLINE

## 📌 1. Giới thiệu hệ thống

Cinema Pro là hệ thống website đặt vé xem phim online, cho phép người dùng dễ dàng tìm kiếm phim, xem lịch chiếu và đặt vé trực tuyến.

Hệ thống được xây dựng nhằm mô phỏng hoạt động của một rạp chiếu phim thực tế, giúp nâng cao trải nghiệm người dùng và hỗ trợ quản lý hiệu quả.

---

## 🎯 2. Mục tiêu hệ thống

* Xây dựng website đặt vé phim trực tuyến
* Tối ưu trải nghiệm người dùng
* Quản lý phim, lịch chiếu và vé
* Áp dụng mô hình MVC (Laravel)

---

## 🚀 3. Chức năng hệ thống

### 👤 Người dùng

* Xem danh sách phim
* Tìm kiếm phim
* Xem chi tiết phim
* Xem lịch chiếu
* Đặt vé online
* Xem vé đã đặt (**Vé của tôi**)
* Đăng ký / đăng nhập

---

### 🔐 Quản trị viên (Admin)

* Dashboard thống kê
* Quản lý phim
* Quản lý lịch chiếu
* Quản lý người dùng
* Quản lý vé

---

## 🔐 4. Phân quyền hệ thống

| Vai trò | Quyền                    |
| ------- | ------------------------ |
| User    | Xem phim, đặt vé, xem vé |
| Admin   | Quản lý toàn bộ hệ thống |

---

## ⚙️ 5. Công nghệ sử dụng

* Backend: Laravel (PHP)
* Frontend: HTML, CSS, JavaScript, TailwindCSS
* Database: MySQL
* Server: Laragon / XAMPP

---

## 📊 6. Cấu trúc cơ sở dữ liệu

* users
* movies
* showtimes
* bookings
* tickets

---


## 🗄️ 7. ERD (Mô tả)

* User có nhiều Booking
* Booking có nhiều Ticket
* Movie có nhiều Showtime
* Showtime liên kết với Ticket

---

## 🔄 8. Sequence (Đặt vé)

1. User chọn phim
2. Chọn lịch chiếu
3. Chọn ghế
4. Xác nhận đặt vé
5. Lưu vào database
6. Hiển thị vé

---

## 🛠️ 9. Hướng dẫn cài đặt

### Bước 1: Clone project

```bash
git clone https://github.com/giabaor89-prog/Cinema_pro.git
cd Cinema_pro
```

### Bước 2: Cài thư viện

```bash
composer install
```

### Bước 3: Cài frontend

```bash
npm install
npm run dev
```

### Bước 4: Tạo file môi trường

```bash
cp .env.example .env
php artisan key:generate
```

### Bước 5: Cấu hình database

```env
DB_DATABASE=Qlyverapphim
DB_USERNAME=root
DB_PASSWORD=
```

### Bước 6: Chạy migrate

```bash
php artisan migrate --seed
```

### Bước 7: Link storage

```bash
php artisan storage:link
```

### Bước 8: Chạy server

```bash
php artisan serve
```

👉 Truy cập: http://127.0.0.1:8000

---

## 🔑 10. Tài khoản demo

### Admin

* Email: [giabaor89@gmail.com](giabaor89@gmail.com)
* Password: Gbao2005#

### User

* Email: [nguoidung23@gmail.com](nguoidung23@gmail.com)
* Password: 123456789

---

## ✨ 11. Điểm nổi bật

* Giao diện hiện đại (TailwindCSS)
* Đặt vé nhanh chóng
* Phân quyền rõ ràng
* Dashboard thống kê
* Hệ thống MVC chuẩn Laravel

---

## 🛠️ 12. Xử lý lỗi thường gặp

* Lỗi thư viện → composer install
* Lỗi giao diện → npm run dev
* Lỗi key → php artisan key:generate
* Lỗi database → kiểm tra .env
* Lỗi ảnh → php artisan storage:link

---

## 📌 13. Yêu cầu hệ thống

* PHP >= 8.x
* Composer
* Node.js
* MySQL
* Laragon / XAMPP

---

## 📂 14. Cấu trúc thư mục

* app/
* resources/views/
* routes/
* database/
* diagrams/

---


## 📜 15. Kết luận

Cinema Pro là một hệ thống hoàn chỉnh mô phỏng nền tảng đặt vé xem phim online, giúp nâng cao kỹ năng lập trình web và quản lý hệ thống.

---

✨ **Cinema Pro - Hệ thống đặt vé phim hiện đại**
