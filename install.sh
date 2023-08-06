#!/bin/bash

echo -e "\e[34mProjeyi ayağa kaldırma işlemi başlatılıyor...\e[0m"

# storage klasörünü oluşturun (eğer yoksa)
if [ ! -d "storage" ]; then
    mkdir storage
fi

# storage klasörü içindeki alt klasörlerin izinlerini ayarlayın
chmod -R 775 storage/bootstrap/cache
chmod -R 775 storage/framework/cache
chmod -R 775 storage/framework/sessions
chmod -R 775 storage/framework/views
chmod -R 775 storage/logs

# .env dosyasını oluşturun (eğer yoksa)
if [ ! -f ".env" ]; then
    cp .env.example .env
    php artisan key:generate
fi

composer install

# .env dosyasını oluşturun (eğer yoksa)
if [ ! -f ".env" ]; then
    cp .env.example .env
    php artisan key:generate
fi

php artisan migrate:fresh

php artisan db:seed

php artisan serve

echo -e "\e[32mProjeyi ayağa kaldırma işlemi tamamlandı.\e[0m"
