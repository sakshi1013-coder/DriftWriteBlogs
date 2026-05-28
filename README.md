# DriftWrite Blogs

<p align="center">
  <img src="public/images/default-blog.jpg" alt="DriftWrite Blogs" width="600" style="border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.15)">
</p>

A premium, high-performance, full-stack **Blog Management System** designed for writers and curators, built with **Laravel 11**, **MySQL**, **jQuery/AJAX**, and a corporate blue & white professional theme.

🌐 **GitHub Repository**: [https://github.com/sakshi1013-coder/DriftWriteBlogs.git](https://github.com/sakshi1013-coder/DriftWriteBlogs.git)

---

## ✨ Features

### 🌟 Premium Features (New!)
* **💾 Save Draft Option**: Save blogs directly as draft edits immediately, automatically hiding them from public listings while remaining fully manageable by admins on the dashboard.
* **🔖 Client-Side Bookmarks**: Bookmark blogs offline using standard browser `localStorage` integration. Filter and read saved posts on a dedicated Bookmark Category tab immediately.
* **⚡ Top Loader Progress Bar**: A sleek, animated, high-performance loading progress indicator matching the look and feel of modern publishing applications like Vercel and Medium.

### 🎨 User-Facing Frontend
* 💎 **Sleek White & Blue Palette** inspired by corporate job portals.
* 📱 **Fully Responsive Layout** — beautifully adapted for laptops, tablets, and mobile screens.
* 🔍 **Debounced AJAX Search** — live searching of guides and exams within 350ms of typing.
* 🏷️ **Dynamic AJAX Category Filter** — seamless selection of Admit Cards, Results, Recruitment, Syllabus, and Answer Keys.
* 📅 **Monthly Date Filter** — filter published articles by year and month.
* 🔗 **Integrated Share Sheet** — share posts instantly via Twitter/𝕏, WhatsApp, or copy URL to clipboard.

### 🔐 Admin Panel (`/admin`)
* 🚪 **Secure Admin Auth** with clean modern lock screens.
* 📊 **Dashboard Stats Overview** — count total posts, drafts, and categories.
* ✍️ **Quill.js Rich Text Editor** — beautiful drag-and-drop links, code-blocks, bold text, headers, and color tools.
* 🖼️ **File Upload Dropzone** — live image validation, size limit checks (max 2MB), and immediate previewing.
* 🔧 **Fully Protected Middleware** — solid role validation checks secure all endpoints.

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| **Backend** | PHP 8.2 + Laravel 11 |
| **Database** | MySQL 8.x |
| **Frontend** | Blade Templates + Vanilla CSS Grid/Flexbox |
| **Rich Text Editor** | Quill.js v1.3.7 |
| **Client-Side Framework** | jQuery 3.7 + Custom AJAX Engines |
| **Icons & Fonts** | Modern SVG Vectors + Outfit/Inter Typography |

---

## 🔑 Admin Credentials

| Parameter | Value |
|---|---|
| **Login Route** | `/admin/login` |
| **Admin Email** | `admin@jobyaari.com` |
| **Admin Password** | `admin@1013` |

---

## 📦 Local Development Setup

### Prerequisites
- **PHP** 8.2 or higher
- **Composer** (Dependency manager)
- **MySQL** 8.x or higher
- **Git**

### Installation

```bash
# 1. Clone the repository
git clone https://github.com/sakshi1013-coder/DriftWriteBlogs.git
cd DriftWriteBlogs

# 2. Install backend dependencies
composer install

# 3. Create env file
cp .env.example .env

# 4. Configure database settings inside .env
# DB_DATABASE=jobyaari_blog
# DB_USERNAME=root
# DB_PASSWORD=your_password

# 5. Generate secure key
php artisan key:generate

# 6. Create database in MySQL (locally)
mysql -u root -p -e "CREATE DATABASE jobyaari_blog CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# 7. Run Migrations and Seed static category/admin records
php artisan migrate:fresh --seed

# 8. Link storage folder
php artisan storage:link

# 9. Launch development server
php artisan serve
```

🌐 Open [http://localhost:8000](http://localhost:8000)

---

## 🌐 How to Deploy This Project

You can deploy this Laravel + MySQL application to **Railway**, **Render**, or **Docker** quickly.

### Option A: Railway (Highly Recommended)
Railway automatically manages environment files and builds.
1. Sign in to [Railway.app](https://railway.app/).
2. Click **New Project** → **Deploy from GitHub Repo**.
3. Select your repository `DriftWriteBlogs`.
4. Click **Add Plugin** → **MySQL** to link a managed database.
5. Add the following **Variables** under your service Settings:
   * `APP_KEY` (Generate locally using `php artisan key:generate` and paste here)
   * `APP_ENV` = `production`
   * `APP_DEBUG` = `false`
   * `DB_CONNECTION` = `mysql`
   * `DB_HOST` = `${{MYSQL_PRIVATE_URL}}` (Provided by Railway)
   * `DB_PORT` = `${{MYSQLPORT}}`
   * `DB_DATABASE` = `${{MYSQLDATABASE}}`
   * `DB_USERNAME` = `${{MYSQLUSER}}`
   * `DB_PASSWORD` = `${{MYSQLPASSWORD}}`
6. Set the **Custom Build Command** or let Railway run the default Nixpack setup.
7. Set your **Start Command**: `php artisan serve --host=0.0.0.0 --port=${{PORT}}`

### Option B: Render.com (Using Docker or Web Service)
Render is an excellent free hosting platform.
1. Push code to your GitHub repository.
2. Sign in to [Render.com](https://render.com/) and click **New** → **Web Service**.
3. Connect your repository.
4. Select **Docker** or **PHP/Web** runtime.
5. Define **Build Command**:
   ```bash
   composer install --no-dev --optimize-autoloader && php artisan config:cache && php artisan route:cache && php artisan view:cache && php artisan storage:link
   ```
6. Define **Start Command**:
   ```bash
   php artisan serve --host=0.0.0.0 --port=10000
   ```
7. Click **Add Database** on Render to provision a PostgreSQL or MySQL instance, and bind the credential parameters in your **Environment Variables** tab.
8. Click **Deploy**!

---

## 📁 Project Directory Map

```
DriftWriteBlogs/
├── app/
│   ├── Http/Controllers/
│   │   ├── BlogController.php          # Public routing, AJAX querying
│   │   └── Admin/
│   │       ├── AuthController.php      # Secure authentication
│   │       └── BlogAdminController.php # Post management (CRUD, drafts)
│   └── Models/
│       ├── Blog.php                    # With scoped filters & custom accessors
│       └── Category.php
├── database/
│   ├── migrations/                    # Tables (categories, blogs, users)
│   └── seeders/                       # Default system records (Admin, Categories, Blogs)
├── public/
│   ├── css/
│   │   ├── style.css                  # Main user layout CSS (white/blue professional)
│   │   └── admin.css                  # Admin dashboard panel styling
│   └── js/
│       ├── filter.js                  # Dynamic AJAX Search/Loader/Bookmark engine
│       └── admin-form.js              # Live image review, Quill configs
└── resources/views/
    ├── layouts/app.blade.php          # Main public layout (logo, centered menu)
    ├── blogs/
    │   ├── index.blade.php            # Sidebar filtering, main index
    │   ├── show.blade.php             # Full guide display, bookmarking action
    │   └── partials/
    │       ├── card.blade.php         # Blog card template
    │       └── pagination.blade.php   # Custom AJAX numbering
    └── admin/                         # Authentication & dashboard layout
```

---

## 📄 License

This project is licensed under the MIT License - see the LICENSE file for details.
