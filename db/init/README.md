# Database seed

Any `*.sql` (or `*.sql.gz` / `*.sh`) file placed in this directory is executed by the
MySQL container **once**, on the very first boot against an empty `db_data` volume
(this is the standard `docker-entrypoint-initdb.d` mechanism).

- `seed.sql` — the committed snapshot of the project database. This is what makes a
  fresh clone reproduce the full site (pages, the `tpte_event` post type, menus,
  options, etc.). **Commit this file.**
- `local-*.sql` — git-ignored scratch space for personal dumps you don't want to share.

## Regenerate the seed from your live database

With the stack running (`docker compose up -d`):

```bash
./scripts/db-dump.sh
```

This overwrites `db/init/seed.sql` with the current contents of the `tpte` database.
Commit the result so teammates pick up your changes.

## Re-seed your own machine from the committed seed

The seed only runs against an **empty** volume. To wipe and reload:

```bash
docker compose down -v   # WARNING: deletes the db_data volume (all local DB data)
docker compose up -d     # fresh DB, seed.sql is imported automatically
```

## Note on site URL

WordPress stores absolute URLs in the database. The seed is exported with the dev URL
(`http://localhost:${WP_PORT}`). If a teammate uses a different `WP_PORT`, run a
search-replace after import — see the root `README.md`.
