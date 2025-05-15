## 🚀 Command yang Diperlukan

Berikut adalah daftar perintah yang perlu dijalankan untuk mengatur dan menjalankan proyek ini secara lokal:

```bash
composer install
composer require setasign/fpdi
composer require setasign/fpdf

php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan db:seed --class=UserSeeder
php artisan storage:link

php artisan serve

