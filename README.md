İlk Kurulum:<br>
Aşağıdaki adımları projenin kök dizininde çalıştırın.<br>
Bağımlılıkları yükleme<br>
    -composer install<br>
.env dosyasını oluşturma ve anahtar oluşturma<br>
    -cp .env.example .env <br>
    php artisan key:generate<br>
Veritabanını hazırlama<br>
phpmyadmin den forumproject isimli bir veritabanı oluşturun ve aşağıdaki iki kodu sırasıyla çalıştırın.<br>
    -php artisan migrate<br>
    -php artisan db:seed <br>
