İlk Kurulum:<br>
Aşağıdaki adımları projenin kök dizininde çalıştırın.
Bağımlılıkları yükleme
    -composer install
.env dosyasını oluşturma ve anahtar oluşturma
    -cp .env.example .env 
    php artisan key:generate
Veritabanını hazırlama
phpmyadmin den forumproject isimli bir veritabanı oluşturun ve aşağıdaki iki kodu sırasıyla çalıştırın.
    -php artisan migrate
    -php artisan db:seed 
