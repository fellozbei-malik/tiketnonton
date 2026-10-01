# 📦 Install Imagick untuk Multiple PHP Versions

## 🔍 Detected Setup
- Laravel requires: PHP ^8.2
- Available PHP versions: 8.2, 8.3, 8.4, 8.5
- Current CLI PHP: 8.4
- Imagick Status: ❌ Not installed

---

## ✅ Solution: Install Imagick untuk Semua Versi PHP

Karena tidak tahu pasti versi PHP mana yang digunakan web server, install untuk **PHP 8.2 dan 8.3**:

### **Quick Install (All Versions)** 🚀

```bash
# Install imagick untuk PHP 8.2
sudo apt update
sudo apt install -y imagemagick php8.2-imagick

# Install imagick untuk PHP 8.3
sudo apt install -y php8.3-imagick

# Optional: Install untuk PHP 8.4 juga
sudo apt install -y php8.4-imagick
```

### **Restart Services** 🔄

```bash
# Restart semua PHP-FPM services
sudo systemctl restart php8.2-fpm 2>/dev/null || true
sudo systemctl restart php8.3-fpm 2>/dev/null || true
sudo systemctl restart php8.4-fpm 2>/dev/null || true

# Restart Apache (jika menggunakan Apache)
sudo systemctl restart apache2 2>/dev/null || true

# Restart Nginx (jika menggunakan Nginx)
sudo systemctl restart nginx 2>/dev/null || true
```

---

## 🧪 Verify Installation

### Check untuk setiap versi PHP:

```bash
# PHP 8.2
php8.2 -m | grep imagick

# PHP 8.3
php8.3 -m | grep imagick

# PHP 8.4
php8.4 -m | grep imagick
```

Semuanya harus output: `imagick`

---

## 🔍 Cek PHP Version yang Digunakan Web Server

### Method 1: Buat file phpinfo

```bash
echo "<?php phpinfo();" > /home/fellozbei/development/tiketnonton/public/info.php
```

Kemudian akses: `http://localhost:8000/info.php` atau `http://127.0.0.1:8000/info.php`

Cari:
- **PHP Version** (di bagian atas)
- **imagick** (cari di halaman dengan Ctrl+F)

**PENTING**: Hapus file ini setelah selesai:
```bash
rm /home/fellozbei/development/tiketnonton/public/info.php
```

---

### Method 2: Check Laravel logs

Jika ada error imagick, cek di:
```bash
tail -f /home/fellozbei/development/tiketnonton/storage/logs/laravel.log
```

Error message biasanya akan mention versi PHP yang digunakan.

---

### Method 3: Check PHP-FPM yang running

```bash
ps aux | grep php-fpm
```

Akan menunjukkan versi PHP-FPM mana yang sedang berjalan.

---

## 🎯 Set Default PHP Version (Optional)

Jika ingin set default PHP CLI ke versi tertentu:

### Set ke PHP 8.2:
```bash
sudo update-alternatives --set php /usr/bin/php8.2
```

### Set ke PHP 8.3:
```bash
sudo update-alternatives --set php /usr/bin/php8.3
```

### Verify:
```bash
php -v
```

---

## 🔧 Troubleshooting

### Error: Package not found

Jika paket tidak ditemukan, tambah repository:

```bash
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt install php8.2-imagick php8.3-imagick
```

---

### Install via PECL (Alternative)

Jika apt package tidak tersedia:

```bash
# Untuk PHP 8.2
sudo apt install php8.2-dev
sudo pecl8.2 install imagick
echo "extension=imagick.so" | sudo tee /etc/php/8.2/mods-available/imagick.ini
sudo phpenmod -v 8.2 imagick

# Untuk PHP 8.3
sudo apt install php8.3-dev
sudo pecl8.3 install imagick
echo "extension=imagick.so" | sudo tee /etc/php/8.3/mods-available/imagick.ini
sudo phpenmod -v 8.3 imagick
```

---

## 🧹 Clear Laravel Cache

Setelah install imagick:

```bash
cd /home/fellozbei/development/tiketnonton
php artisan config:clear
php artisan cache:clear
php artisan optimize:clear
php artisan view:clear
```

---

## 💡 Alternative: Use GD Instead

Jika masih bermasalah, gunakan GD:

```bash
# Install GD untuk semua versi
sudo apt install php8.2-gd php8.3-gd php8.4-gd

# Update .env
echo "IMAGE_DRIVER=gd" >> .env

# Clear cache
php artisan config:clear
```

Lalu update config (jika menggunakan Intervention Image):

Edit `config/image.php`:
```php
'driver' => env('IMAGE_DRIVER', 'gd'),
```

---

## ✅ Complete Installation Command

Copy paste semua command ini:

```bash
# Install imagick untuk semua versi PHP
sudo apt update && \
sudo apt install -y imagemagick php8.2-imagick php8.3-imagick php8.4-imagick && \
sudo systemctl restart php8.2-fpm 2>/dev/null || true && \
sudo systemctl restart php8.3-fpm 2>/dev/null || true && \
sudo systemctl restart php8.4-fpm 2>/dev/null || true && \
sudo systemctl restart apache2 2>/dev/null || true && \
sudo systemctl restart nginx 2>/dev/null || true && \
echo "Checking imagick installation..." && \
echo "PHP 8.2:" && php8.2 -m | grep imagick && \
echo "PHP 8.3:" && php8.3 -m | grep imagick && \
echo "PHP 8.4:" && php8.4 -m | grep imagick && \
echo "✅ Installation complete!"
```

---

## 📝 What This Fixes

- ✅ Image uploads and processing
- ✅ Thumbnail generation with Intervention Image
- ✅ QR Code generation (SimpleSoftware QR Code)
- ✅ PDF generation with images (DomPDF)
- ✅ Image manipulation (resize, crop, etc.)

---

## 🎯 Next Steps

1. **Install imagick** dengan command di atas
2. **Verify** dengan `php8.x -m | grep imagick`
3. **Restart services** 
4. **Test aplikasi** Laravel Anda
5. **Clear cache** Laravel
6. **Delete phpinfo file** jika sudah buat

---

## 📱 Need Help?

Jika masih error setelah install:

1. Check Laravel logs: `tail -f storage/logs/laravel.log`
2. Check PHP-FPM logs: `tail -f /var/log/php8.x-fpm.log`
3. Check Apache/Nginx error logs
4. Try GD alternative (lebih mudah, performa hampir sama)
