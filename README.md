# Udaan Shiksha Foundation — Laravel NGO Portfolio Demo

A responsive multi-page education and child development NGO website concept for **PP DESIGN AND TECH**. The foundation is **fictional** and content is illustrative. **Do not represent this as a completed real-world client project**; label it as a concept/demo in your portfolio.

## What's included

- Custom brand identity and a colourful, responsive UI
- Home, About, Programs, Impact, Get Involved, and Contact pages
- Locally bundled SVG illustrations
- Contact, volunteering, partnership and support-interest enquiry forms
- Server-side validation, CSRF protection and rate limiting
- Admin sign-in and enquiry dashboard with filters/status updates
- Basic SEO metadata, semantic markup and mobile navigation
- No payment collection: all donation/support actions are **interest enquiries only**

## Local setup

Prerequisites: **PHP 8.2+**, Composer, and PHP SQLite extension (or configure MySQL in `.env`). This repository contains application source code, not the Composer `vendor/` directory.

```bash
composer install
cp .env.example .env
php artisan key:generate
# Set ADMIN_EMAIL and a unique ADMIN_PASSWORD with at least 12 characters in .env
# If using SQLite:
touch database/database.sqlite
php artisan migrate --seed
php artisan serve
```

Website: `http://localhost:8000` · Admin: `http://localhost:8000/admin/login`

**Important:** After updating the seeded admin password in `.env`, rerun `php artisan db:seed` (unless you have other users you need to preserve). Never commit `.env` or real passwords. For production set `APP_ENV=production`, `APP_DEBUG=false`, HTTPS, proper session/cookie settings, and an SMTP mail transport if needed.

### Hostinger shared hosting

1. Confirm the hosting plan supports PHP 8.2+, Composer (or deploy the installed `vendor/` folder), and access to the Laravel project folder outside `public_html`.
2. Set the domain document root to the Laravel **`public/`** directory. Do not expose the app root, `.env`, `storage/`, or `vendor/` as the document root.
3. Configure MySQL database credentials in `.env`, `APP_URL`, and the server-generated `APP_KEY`.
4. Run `php artisan migrate --force`, seed the admin securely and enable writable `storage/` and `bootstrap/cache/`.
5. Use `php artisan config:cache`, `php artisan route:cache`, `php artisan view:cache` after confirming production environment settings.
6. Ensure HTTPS and test the contact form, spam limits, admin login, and responsive layout.

## What to customise before a real NGO launch

Use the organisation's verified legal name, registration details, written-approved text/photos, addresses, contact methods, policies, and actual programmes/results. Add a privacy policy and consent disclosures for any real data collection. Integrate a verified donation gateway with compliance/reconciliation only after client approval.

## Files

- `resources/views/` — Laravel Blade views
- `public/assets/css/style.css` — responsive styles
- `public/assets/js/main.js` — mobile menu interaction
- `public/assets/img/` — custom SVG art
- `routes/web.php` — public, form and admin routes
- `app/Http/Controllers/` — page, enquiry and admin controllers
- `database/migrations/` — user and enquiry tables

## Notes

This is a demo application, not a deployed production NGO website. Run Composer install and configure the environment before using it. The version committed to GitHub includes the Laravel application and web assets; a standalone HTML preview is included separately in the original project archive.
