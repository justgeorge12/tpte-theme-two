#!/usr/bin/env bash
#
# Export the live `tpte` database into db/init/seed.sql so it can be committed
# and auto-loaded on a fresh `docker compose up`.
#
# Usage:  ./scripts/db-dump.sh
#
set -euo pipefail

# Resolve repo root (this script lives in <root>/scripts).
ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT"

SERVICE="db"
OUT="db/init/seed.sql"

# Ensure the db service is up.
if [ -z "$(docker compose ps -q "$SERVICE" 2>/dev/null)" ]; then
  echo "ERROR: the '$SERVICE' service is not running. Start it with 'docker compose up -d'." >&2
  exit 1
fi

mkdir -p db/init

echo "Dumping database 'tpte' -> $OUT ..."
# Run mysqldump INSIDE the container and read the password from the container's
# own environment ($MYSQL_ROOT_PASSWORD). This uses the exact password MySQL was
# started with, so it never mismatches due to host-side .env `$` interpolation.
docker compose exec -T "$SERVICE" sh -c \
  'exec mysqldump -u root -p"$MYSQL_ROOT_PASSWORD" \
     --databases tpte \
     --single-transaction \
     --no-tablespaces \
     --default-character-set=utf8mb4' \
  > "$OUT"

echo "Done. Review and commit $OUT"
