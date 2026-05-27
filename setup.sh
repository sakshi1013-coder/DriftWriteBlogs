#!/bin/bash

# JobYaari – Database Setup Script
# Run this after entering your MySQL password in .env

echo "🚀 JobYaari Setup Script"
echo "========================"

# Load DB credentials from .env
export $(grep -E '^DB_' .env | xargs)

echo "📦 Creating database: $DB_DATABASE"
mysql -u "$DB_USERNAME" -p"$DB_PASSWORD" -e "CREATE DATABASE IF NOT EXISTS \`$DB_DATABASE\` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;" 2>&1

if [ $? -ne 0 ]; then
    echo ""
    echo "❌ Failed to connect to MySQL."
    echo "   Please update DB_PASSWORD in your .env file first."
    echo "   Then run: bash setup.sh"
    exit 1
fi

echo "✅ Database created successfully"

echo "🔄 Running migrations..."
php artisan migrate:fresh --seed

echo "🔗 Creating storage symlink..."
php artisan storage:link

echo ""
echo "✅ Setup complete!"
echo ""
echo "🌐 Start the server:  php artisan serve"
echo "🔑 Admin URL:         http://localhost:8000/admin/login"
echo "📧 Admin Email:       admin@jobyaari.com"
echo "🔐 Admin Password:    Admin@123"
echo ""
