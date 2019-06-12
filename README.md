![malasCI](https://raw.github.com/maalas/media/master/logo/malasCI/banner.png)

---

> ⚠ ALERT!. PLEASE NOTE THAT THIS PROJECTS IS ON HALT AND NOT READY TO USE ⚠

> I plan to move this project to new repository and group it together with my other PHP Library that I created through my journey as a Fullstack Web Developer. I plan to move this project here 👉 [Maalas](https://github.com/maalas).

---

malasCI adalah sebuah paket library yang saya buat karena pedihnya lingkungan pekerjaan sebagai web developer akibat dari atasan atasan yang selalu menghardik kerja cepat 😢. Jadi saya berinisiatif untuk membuat framework CI menjadi lebih powerfull. Dan sekarang saya menjadi lebih sengsara akibat semakin cepat pekerjaan saya semakin banyak dikasih proyek. 😅.

malasCI is a packed library that I made to make my life easier as web developer. It's based on CodeIgniter that we ❤️ so much. For full detailed information about the Library I add please refer to Library list section bellow. Happy Code 😄.

# Library List

- [RedBean PHP ORM](https://redbeanphp.com)
- [Respect/Validation](https://github.com/Respect/Validation)
- [PHPMailer](https://github.com/PHPMailer/PHPMailer)
- [PHPSpreadsheet](https://github.com/PHPOffice/phpspreadsheet/)
- [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv)
- [Twig](https://twig.symfony.com)

# Installation

Untuk mulai membuat project dengan malasCI, silakan clone repositori ini atau fork untuk melakukan penyesuain sesuka kamu. malasCI menggunakan composer untuk mengatur dependensi yang dibutuhkan. Jadi jangan lupa untuk melakukan install ya 😏.

To start code with malasCI, clone or fork this repository. malasCI use composer so don't forget to install composer and dependency 😏.

```sh
# untuk melakukan cloning github gunakan command dibawah ini:
# clone this repo first to start code your projects
git clone https://github.com/ariomoklo/malasCI.git

# kemudian mulai install composer dependensi
# then install the composer requirements
cd malasCI/application
composer install
```

Jangan lupa untuk mengubah konfigurasi autoload composer pada CodeIgniter di application/config/config.php.

Do not forget to change composer autoloading in CodeIgniter at application/config/config.php.

```php
/*
|--------------------------------------------------------------------------
| Composer auto-loading
|--------------------------------------------------------------------------
| ...
*/
$config['composer_autoload'] = TRUE;
```
