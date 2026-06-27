#!/usr/bin/env bash
#
# Import db/init/seed.sql into the running `tpte` database.
# Use this to sync your local DB to a checkpoint a collaborator committed.
#
# Usage:  ./scripts/db-restore.sh
#
set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT"

SERVICE="db"
SEED="db/init/seed.sql"

if [ ! -f "$SEED" ]; then
  echo "ERROR: $SEED not found. Nothing to restore." >&2
  exit 1
fi

if [ -z "$(docker compose ps -q "$SERVICE" 2>/dev/null)" ]; then
  echo "ERROR: the '$SERVICE' service is not running. Start it with 'docker compose up -d'." >&2
  exit 1
fi

echo "Restoring '$SEED' into the running database ..."
docker compose exec -T "$SERVICE" sh -c \
  'exec mysql -u root -p"$MYSQL_ROOT_PASSWORD"' \
  < "$SEED"

echo "Done. Your local DB now matches the committed checkpoint."