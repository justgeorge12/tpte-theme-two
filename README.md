# TPTE — WordPress (Dockerized)

Local development environment for the TPTE site: WordPress + MySQL + phpMyAdmin,
orchestrated with Docker Compose. The custom theme lives in
`wp-content/themes/tpte`.

## Prerequisites

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) (includes Docker Compose v2)
- Git
- Node.js 18+ (only if you build theme assets — see [Theme assets](#theme-assets))

## Quick start

```bash
# 1. Clone
git clone <repo-url> tpte
cd tpte

# 2. Create your local env file from the template, then edit the passwords
cp .env.example .env

# 3. Boot the stack
docker compose up -d
```

Then open:

| Service     | URL                          | Notes                              |
|-------------|------------------------------|------------------------------------|
| WordPress   | http://localhost:4001        | `WP_PORT` in `.env`                |
| phpMyAdmin  | http://localhost:8081        | `PMA_PORT` in `.env`               |
| MySQL       | `127.0.0.1:3316`             | `DB_PORT` in `.env` (host access)  |

> The database is seeded automatically on the **first** boot from
> `db/init/seed.sql` (if present). See [Database](#database).

## Environment variables

All config is in `.env` (git-ignored). `.env.example` is the committed template —
keep them in sync when you add a variable.

| Variable           | Purpose                              |
|--------------------|--------------------------------------|
| `DB_USER`          | App DB user                          |
| `DB_PASSWORD`      | App DB user password                 |
| `DB_ROOT_PASSWORD` | MySQL root password                  |
| `DB_PORT`          | Host port mapped to MySQL `:3306`    |
| `WP_PORT`          | Host port mapped to WordPress `:80`  |
| `PMA_PORT`         | Host port mapped to phpMyAdmin `:80` |

## Database

WordPress content (pages, the `tpte_event` custom post type, menus, options)
lives in the database, **not** in the files. To make a clone reproduce the real
site, the database is committed as a SQL seed.

- **Seed file:** `db/init/seed.sql` — auto-imported by MySQL on the first boot
  against an empty `db_data` volume.
- **Export the current DB to the seed** (stack must be running):

  ```bash
  ./scripts/db-dump.sh      # writes db/init/seed.sql — commit the result
  ```

- **Re-seed your machine** (wipes local DB, reloads from `seed.sql`):

  ```bash
  docker compose down -v    # deletes the db_data volume — destructive
  docker compose up -d
  ```

See `db/init/README.md` for details.

### Site URL after import

WordPress stores absolute URLs in the DB. If your `WP_PORT` differs from the one
the seed was exported with, fix the URLs (using the `wordpress` container's
bundled WP-CLI):

```bash
docker compose exec -u www-data wordpress \
  wp search-replace 'http://localhost:OLD_PORT' 'http://localhost:NEW_PORT' --skip-columns=guid
```

## Theme assets

The theme uses a webpack/Sass build. Asset sources live in
`wp-content/themes/tpte`.

```bash
cd wp-content/themes/tpte
npm install
npm run build      # or: npm run dev / watch — see package.json "scripts"
```

`node_modules` is git-ignored; `package-lock.json` is committed for reproducible
installs.

## Common commands

```bash
docker compose up -d          # start
docker compose down           # stop (keeps the DB volume)
docker compose down -v        # stop AND delete the DB volume (destructive)
docker compose logs -f wordpress
docker compose exec -u www-data wordpress wp --info   # WP-CLI inside the container
```

## Versions (pinned for reproducibility)

| Image      | Tag                       |
|------------|---------------------------|
| WordPress  | `6.9-php8.3-apache`       |
| MySQL      | `8.0`                     |
| phpMyAdmin | `5.2`                     |

PHP upload limits are raised via `uploads.ini` (mounted into the WordPress
container).
