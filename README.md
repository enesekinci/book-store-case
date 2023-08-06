# My Laravel Bookstore API

Bu proje, Laravel kullanarak bir kitap mağazası REST API'sini oluşturmak için yapılmıştır. API, kitaplar ve yazarlar tablolarını yönetir ve kitapların listesini döndürür. API ayrıca cache yönetimi, log kaydı ve Telescope gibi bazı özellikleri de içerir.

## Özellikler

-   Kitaplar ve yazarlar tablolarını yönetir.
-   Kitaplar listesini direk iletişime geçerek döndürür.
-   Read request'leri cache üzerinden cevap döner (yazarlar tablosu ilişkisi ile birlikte).
-   Update request'leri sonrasında event kullanarak log tablosuna kayıt atar.
-   Delete request'leri işlemleri queue'ye gönderir.
-   Telescope, API'ye debugging ve performans izleme özelliği ekler.

## Gereksinimler

-   PHP 8.1 veya daha yeni sürümü
-   Composer (bağımlılıkların yüklenmesi için)
-   MySQL veritabanı

## Kurulum Scripti

Projenin kurulumunu otomatikleştirmek için `install.sh` adında bir bash scripti mevcuttur. Proje dosyalarınızı alıp, gerekli adımları gerçekleştirmek için aşağıdaki komutu çalıştırabilirsiniz:

```bash
./install.sh
```

##### veya aşağıdaki adımları takip edebilirsiniz:

## Kurulum

1. Proje dosyalarını bilgisayarınıza klonlayın ve proje dizinine gidin:

```bash
git clone https://github.com/kullanici_adi/my-laravel-bookstore.git && cd my-laravel-bookstore
```

2. Proje bağımlılıklarını yükleyin:

```bash
composer install
```

3. `.env` dosyasını oluşturun ve veritabanı bağlantı bilgilerinizi ayarlayın:

```bash
cp .env.example .env
php artisan key:generate
```

4. Veritabanını oluşturun ve tabloları göç ettirin:

```bash
php artisan migrate:fresh
```

5. Dummy data oluşturun:

```bash
php artisan db:seed
```

6. Projeyi başlatın:

```bash
php artisan serve
```

Proje şimdi http://127.0.0.1:8000 adresinde çalışıyor olmalıdır.

## Kullanım

API'nin kullanımı için endpoint'leri test edebilirsiniz. Örnekler:

| İşlem            | HTTP Metodu | Endpoint                                         |
| ---------------- | ----------- | ------------------------------------------------ |
| Kitaplar listesi | GET         | http://127.0.0.1:8000/api/books                  |
| Kitap detayı     | GET         | http://127.0.0.1:8000/api/books/{bookId}         |
| Kitap ekleme     | POST        | http://127.0.0.1:8000/api/books/store            |
| Kitap güncelleme | POST        | http://127.0.0.1:8000/api/books/update/{bookId}  |
| Kitap silme      | GET         | http://127.0.0.1:8000/api/books/destroy/{bookId} |
