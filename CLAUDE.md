# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a custom WordPress theme (`tpte`) for the Department of Cultural Technology and Communication (Τμήμα Πολιτισμικής Τεχνολογίας και Επικοινωνίας) at the University of the Aegean. The theme is based on the `_s` (Underscores) starter theme and is developed locally via Docker.

## Local Development Environment

The site runs in Docker. Start/stop with:
```sh
docker compose up -d
docker compose down
```

Services (ports configured in `.env`):
- WordPress: `http://localhost:4001` (`WP_PORT=4001`)
- phpMyAdmin: `http://localhost:8081` (`PMA_PORT=8081`)
- MySQL: port `3316` (`DB_PORT=3316`)

WordPress core files (`wp-admin/`, `wp-includes/`) are **not** bind-mounted — only `wp-content/` is. Theme edits in `wp-content/themes/tpte/` are reflected immediately.

## Theme Asset Pipeline

The theme lives at `wp-content/themes/tpte/`. Run these from that directory:

```sh
npm run dev        # watch SCSS + JS in parallel (development)
npm run build      # production build (minified)
npm run watch      # alias for dev
npm run lint:scss  # stylelint SCSS
npm run lint:js    # eslint JS
```

SCSS source → `assets/scss/` (main entry: `assets/scss/main.scss`)  
Compiled CSS → `assets/css/main.css`  
JS source → `assets/js/src/`  
Compiled JS → `assets/js/main.min.js` (via webpack)

Page-specific CSS files (`programme.css`, `department-info.css`, etc.) are hand-authored directly in `assets/css/` — they are **not** compiled from SCSS.

## PHP Linting

From `wp-content/themes/tpte/`:
```sh
composer lint:php   # syntax check all PHP files
composer lint:wpcs  # WordPress coding standards check
```

## Database Management

Seed the DB from the running container (generates `db/init/seed.sql`):
- **PowerShell**: `.\scripts\db-dump.ps1`
- **Bash**: `./scripts/db-dump.sh`

Restore from seed:
- **PowerShell**: `.\scripts\db-restore.ps1`
- **Bash**: `./scripts/db-restore.sh`

The `db/init/seed.sql` file is auto-loaded by MySQL on **first boot** (empty volume only). To reload a fresh DB from seed, remove the Docker volume: `docker compose down -v && docker compose up -d`.

## Theme Architecture

### Key PHP Files

| File | Purpose |
|------|---------|
| `functions.php` | Theme setup, asset enqueueing, feature registration |
| `inc/post-types.php` | Custom post types (`tpte_event`) and their meta boxes |
| `inc/class-mega-menu-walker.php` | Custom Walker for the mega menu |
| `inc/template-tags.php` | Reusable template helper functions |
| `front-page.php` | Homepage template (large file ~40KB) |
| `page-university-undergrad-programme.php` | Undergraduate programme page |
| `page-university-about.php` | About page |
| `page-quality-assurance.php` | Quality assurance page |
| `page-department-info.php` | Department info page |
| `page-undergrad-gen.php` | Generic undergraduate page |
| `page-undergrad-section.php` | Undergraduate section sub-page |

### Template Parts (`template-parts/`)

Reusable partials loaded via `get_template_part()`:
- `content-event-card.php` / `content-event-row.php` — event display variants
- `content-blog-card.php` / `content-blog-list-item.php` — blog display variants
- `sidebar-undergrad.php` — sidebar for undergraduate programme pages
- `sidebar-blog.php` — sidebar for blog/news pages

### Custom Post Type: `tpte_event`

Registered in `inc/post-types.php`. Meta fields stored as post meta:
- `_event_start_date`, `_event_start_time`, `_event_end_date`, `_event_end_time`
- `_event_location`, `_event_attendees`, `_event_about`, `_event_cover_topics`, `_event_video_url`

### Navigation Menus

Registered menus: `menu-1` (Primary), `menu-top` (Top Bar), `menu-footer-1`, `menu-footer-2`, `menu-social`.

### Asset Versioning

In `functions.php`, `TPTE_VERSION` uses `filemtime(__FILE__)` when `WP_DEBUG` is true, ensuring CSS/JS cache-busting during development. This constant replaces `_S_VERSION` (kept for backward compatibility).

### Third-Party Libraries (pre-bundled in `assets/`)

Bootstrap 5, Swiper, Font Awesome Pro, Animate.css, Flatpickr, Magnific Popup, Isotope, ApexCharts, Select2, Slick — all vendor files are committed directly; no CDN dependencies.

## Design Reference

Reference HTML mockups (scraped from the real department site) live in the theme root:
- `university-about.html`, `university-leadership.html`, etc.
- `context/Προπτυχιακές Σπουδές...html` — undergraduate studies reference (Greek)

These are design references only; they are not served by WordPress.
