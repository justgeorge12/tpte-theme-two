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

# Load env (DB_ROOT_PASSWORD etc.).
if [[ -f .env ]]; then
  set -a
  # shellcheck disable=SC1091
  source .env
  set +a
else
  echo "ERROR: .env not found. Copy .env.example to .env first." >&2
  exit 1
fi

CONTAINER="tpte_container"
OUT="db/init/seed.sql"

if ! docker ps --format '{{.Names}}' | grep -qx "$CONTAINER"; then
  echo "ERROR: container '$CONTAINER' is not running. Start it with 'docker compose up -d'." >&2
  exit 1
fi

mkdir -p db/init

echo "Dumping database 'tpte' from '$CONTAINER' -> $OUT ..."
docker exec "$CONTAINER" \
  mysqldump \
    -u root -p"${DB_ROOT_PASSWORD}" \
    --databases tpte \
    --single-transaction \
    --no-tablespaces \
    --default-character-set=utf8mb4 \
  > "$OUT"

echo "Done. Review and commit $OUT"
