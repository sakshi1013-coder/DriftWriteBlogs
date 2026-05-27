# JobYaari – Blog Management System

<p align="center">
  <img src="public/images/default-blog.jpg" alt="JobYaari" width="600">
</p>

A full-stack **Blog Management System** for government job news, built with **Laravel 11**, **MySQL**, **jQuery/AJAX**, and a premium dark-mode UI.

🌐 **Live Demo**: [https://jobyaari-blog.onrender.com](https://jobyaari-blog.onrender.com)
🔐 **Admin Panel**: [https://jobyaari-blog.onrender.com/admin/login](https://jobyaari-blog.onrender.com/admin/login)

---

## 🚀 Features

### User-Facing Frontend
- 🎨 **Premium Dark UI** with glassmorphism, animated gradients & hover effects
- 📱 **Fully Responsive** — works on mobile, tablet, and desktop
- 🔍 **AJAX Search** — debounced live search without page reload
- 🏷️ **AJAX Category Filter** — filter by Admit Card, Result, Syllabus, etc.
- 📅 **AJAX Date Filter** — filter blogs by month/year
- 📖 **Blog Detail Page** — full article with share buttons (Twitter, WhatsApp, Copy)
- 🔗 **Related Posts** in sidebar
- 🧩 **Category Quick Links**

### Admin Panel (`/admin`)
- 🔐 **Secure Login** with email/password authentication
- 📊 **Dashboard** with stats (total posts, published, categories, drafts)
- ✍️ **Create Blog** — title, content, short description, category, image upload, publish date
- ✏️ **Edit Blog** — pre-filled form with current image preview
- 🗑️ **Delete Blog** — with confirmation dialog
- 🖼️ **Image Upload** with drag & drop + live preview (max 2MB)

### Technical
- ⚡ **AJAX Filtering** with jQuery — no page reload, smooth animations
- 🗃️ **MySQL Database** with proper foreign keys
- 🌱 **Database Seeding** — 6 categories + 10 sample blogs + admin user
- 🔒 **Middleware Protection** on all admin routes

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP 8.2 + Laravel 11 |
| Database | MySQL 8.x |
| Frontend | Blade Templates + Vanilla CSS |
| JavaScript | jQuery 3.7 + AJAX |
| Fonts | Google Fonts (Inter + Outfit) |
| Deployment | Render.com (Docker) |

---

## 📦 Local Setup

### Prerequisites
- PHP 8.2+
- Composer
- MySQL 8.x
- Git

### Installation Steps

```bash
# 1. Clone the repository
git clone https://github.com/YOUR_USERNAME/jobyaari-blog.git
cd jobyaari-blog

# 2. Install PHP dependencies
composer install

# 3. Copy and configure environment
cp .env.example .env

# 4. Edit .env — set your MySQL credentials
nano .env
# DB_DATABASE=jobyaari_blog
# DB_USERNAME=root
# DB_PASSWORD=your_password

# 5. Generate app key
php artisan key:generate

# 6. Create the database in MySQL
mysql -u root -p -e "CREATE DATABASE jobyaari_blog CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# 7. Run migrations and seed data
php artisan migrate:fresh --seed

# 8. Create storage symlink for images
php artisan storage:link

# 9. Start the development server
php artisan serve
```

🌐 Open [http://localhost:8000](http://localhost:8000)

---

## 🔑 Admin Credentials

| Field | Value |
|---|---|
| URL | `/admin/login` |
| Email | `admin@jobyaari.com` |
| Password | `Admin@123` |

---

## 🗂️ Database Schema

### `categories`
| Column | Type |
|---|---|
| id | bigint PK |
| name | varchar(100) |
| slug | varchar(120) UNIQUE |
| color | varchar(30) |

### `blogs`
| Column | Type |
|---|---|
| id | bigint PK |
| title | varchar(255) |
| slug | varchar(280) UNIQUE |
| short_description | text |
| content | longtext |
| image | varchar(255) nullable |
| category_id | FK → categories |
| published_at | date |
| is_published | boolean |

---

## 🌐 AJAX Filter Architecture

```
User interacts (category/date/search)
        ↓
jQuery captures event (debounced 350ms)
        ↓
$.ajax GET /ajax/filter?category=result&date=2024-01&search=exam
        ↓
Laravel BlogController::filter() queries MySQL
        ↓
Returns JSON: { html: "...", total: N, currentPage: P, lastPage: L }
        ↓
jQuery replaces #blog-grid with animated card injection
        ↓
Smooth staggered fade-in animation
```

---

## 📁 Project Structure

```
jobyaari-blog/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── BlogController.php          # Public + AJAX filter
│   │   │   └── Admin/
│   │   │       ├── AuthController.php      # Admin login/logout
│   │   │       └── BlogAdminController.php # Admin CRUD
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       ├── Blog.php       # With scopes + helpers
│       └── Category.php
├── database/
│   ├── migrations/        # 3 migration files
│   └── seeders/           # Category + Admin + Blog seeders
├── public/
│   ├── css/
│   │   ├── style.css      # 600+ lines premium CSS
│   │   └── admin.css
│   ├── js/
│   │   ├── filter.js      # AJAX filter engine
│   │   ├── main.js
│   │   └── admin-form.js
│   └── images/
├── resources/views/
│   ├── layouts/app.blade.php
│   ├── blogs/
│   │   ├── index.blade.php
│   │   ├── show.blade.php
│   │   └── partials/
│   └── admin/
│       ├── login.blade.php
│       ├── dashboard.blade.php
│       ├── layouts/dashboard.blade.php
│       └── blogs/ (index, create, edit)
└── routes/web.php
```

---

## 📦 Deployment (Render.com)

1. Push code to GitHub
2. Go to [render.com](https://render.com) → New → Web Service
3. Connect your GitHub repo
4. Set build command: `composer install && php artisan migrate --force && php artisan db:seed --force && php artisan storage:link`
5. Set start command: `php artisan serve --host=0.0.0.0 --port=10000`
6. Add environment variables from `.env`
7. Deploy!

---

## 👤 Author

Built as a **JobYaari Developer Assessment** for the PHP/Laravel Developer Intern role.

---

## 📄 License

MIT License
