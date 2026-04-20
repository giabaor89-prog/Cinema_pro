🎬 WEBSITE ĐẶT VÉ XEM PHIM ONLINE - CINEMA PRO

📌 Mô tả hệ thống
Cinema Pro là hệ thống website đặt vé xem phim online với giao diện hiện đại, cho phép:

Người dùng:
- Xem danh sách phim
- Tìm kiếm phim
- Xem lịch chiếu
- Đặt vé online
- Xem vé đã đặt (Vé của tôi)
- Đăng ký / đăng nhập

Admin:
- Quản lý phim
- Quản lý lịch chiếu
- Quản lý người dùng
- Quản lý vé
- Dashboard thống kê

⚙️ Công nghệ sử dụng
- Backend: Laravel (PHP)
- Frontend: HTML, CSS, JavaScript, TailwindCSS
- Database: MySQL
- Server: Laragon / XAMPP

🚀 Hướng dẫn cài đặt

1. Clone project
git clone <link_project>

2. Cài thư viện
composer install

3. Tạo file môi trường
cp .env.example .env

4. Cấu hình database
DB_DATABASE=cinema
DB_USERNAME=root
DB_PASSWORD=

5. Tạo database: cinema

6. Chạy migrate
php artisan migrate --seed

7. Generate key
php artisan key:generate

8. Chạy server
php artisan serve

👉 Truy cập: http://127.0.0.1:8000

🔑 Tài khoản

Admin:
- admin@gmail.com / 123456

User:
- user@gmail.com / 123456

📂 Chức năng

Người dùng:
- Xem phim
- Đặt vé
- Xem vé

Admin:
- Quản lý phim
- Quản lý lịch chiếu
- Quản lý người dùng
- Quản lý vé

📝 Ghi chú
- Lỗi thư viện: composer install
- Lỗi key: php artisan key:generate
- Lỗi DB: kiểm tra .env

📌 Yêu cầu
- PHP >= 8
- Composer
- MySQL
- Laragon / XAMPP

✨ Hoàn thành bởi: Cinema Pro Team

