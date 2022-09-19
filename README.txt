.env -> masukan gmail dan password gmail
.env -> ubah APP_DEBUG menjadi 'true' jika ingin menampilkan pesan error

buka link berikut untuk konfigurasi email, 
agar bisa mengirimkan notifikasi dari sistem

Turn on "Allow less secure apps" go to this link
https://myaccount.google.com/security#connectedapps

Go to https://accounts.google.com/UnlockCaptcha , 
and click continue and unlock your account for access through other media/sites.

note : di browser pastikan email yang di konfigurasi adalah
email yang di tulis pada file .env
===============================
setelah melakukan konfigurasi di atas

sebelum menjalankan projek laravel, eksekusi perintah berikut:
php artisan config:clear
php artisan cache:clear
php artisan serve