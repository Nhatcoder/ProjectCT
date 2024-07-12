## Cách chạy dự án

1. Clone dự án về máy tính bằng lệnh `git clone https://github.com/Nhatcoder/ProjectCT.git`
2. Cài đặt các gói cần thiết bằng lệnh `composer install`
3. Cập nhật các gói bằng lệnh `composer update`
4. Đổi tên file `.env.example` thành `.env` và sửa các thông số cần thiết
5. Tạo key cho dự án bằng lệnh `php artisan key:generate`
6. Tạo bảng trong database bằng lệnh `php artisan migrate`
7. Thêm dữ liệu mẫu vào database bằng lệnh `php artisan db:seed`
8. Tạo symbolic link `php artisan storage:link`
9. Chạy dự án bằng lệnh `php artisan serve`

