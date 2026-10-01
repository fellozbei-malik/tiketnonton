#!/bin/bash
set -e

echo "🚀 Starting application setup..."

# Install Composer dependencies
echo "📦 Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

# Install NPM dependencies (hanya untuk build, akan dihapus setelahnya)
echo "📦 Installing NPM dependencies untuk build..."

# Install dependencies di temporary location atau langsung
if [ -f "package-lock.json" ]; then
    npm ci --legacy-peer-deps 2>&1 || npm install --legacy-peer-deps
else
    npm install --legacy-peer-deps
fi

# Verify installation
if [ ! -f "node_modules/.bin/vite" ]; then
    echo "❌ Error: Vite tidak terinstall dengan benar"
    exit 1
fi

echo "✅ NPM dependencies berhasil diinstall"

# Build Vite assets for production
echo "🔨 Building Vite assets for production..."
npm run build

# Hapus node_modules setelah build selesai (tidak diperlukan di production)
echo "🧹 Menghapus node_modules (tidak diperlukan di production)..."
rm -rf node_modules package-lock.json 2>/dev/null || true
echo "✅ node_modules telah dihapus"

# Wait for database to be ready
echo "⏳ Waiting for database to be ready..."
sleep 5

# Run migrations
echo "🗄️  Running database migrations..."
php artisan migrate --force

echo "🗄️  Running database seeder..."
php artisan db:seed --force

# Cache configuration for production
echo "⚡ Caching configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "🗄️  Running Laravel Syslink..."
php artisan storage:link


# Change ownership of build assets to laravel user (if running as root)
if [ "$(id -u)" = "0" ]; then
    echo "🔐 Mengubah ownership build assets ke user laravel..."
    chown -R laravel:laravel /var/www/html/public/build 2>/dev/null || true
fi

# Start PHP development server
echo "✅ Starting PHP server..."
# If running as root, switch to laravel user
if [ "$(id -u)" = "0" ]; then
    # Try gosu first, fallback to su if gosu not available
    if command -v gosu >/dev/null 2>&1; then
        exec gosu laravel php artisan serve --host=0.0.0.0 --port=8000
    else
        exec su -s /bin/bash laravel -c "php artisan serve --host=0.0.0.0 --port=8000"
    fi
else
    exec php artisan serve --host=0.0.0.0 --port=8000
fi
