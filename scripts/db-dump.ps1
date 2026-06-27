#!/usr/bin/env pwsh
#
# Export the live `tpte` database into db/init/seed.sql so it can be committed
# and auto-loaded on a fresh `docker compose up`.
#
# PowerShell equivalent of db-dump.sh.
# Usage:  .\scripts\db-dump.ps1
#
$ErrorActionPreference = 'Stop'

# Resolve repo root (this script lives in <root>/scripts).
$Root = Split-Path -Parent $PSScriptRoot
Set-Location $Root

$Service = 'db'
$Out = 'db/init/seed.sql'

# Ensure the db service is up.
if (-not (docker compose ps -q $Service 2>$null)) {
  Write-Error "the '$Service' service is not running. Start it with 'docker compose up -d'."
  exit 1
}

New-Item -ItemType Directory -Force -Path 'db/init' | Out-Null

Write-Host "Dumping database 'tpte' -> $Out ..."
# Run mysqldump INSIDE the container, reading the password from the container's
# own environment ($MYSQL_ROOT_PASSWORD) — the exact password MySQL started with,
# so it never mismatches due to host-side .env `$` interpolation.
#
# Force UTF-8 decoding (the DB holds Greek text), then write the file as UTF-8
# with NO BOM and LF line endings. This keeps the committed seed.sql byte-stable
# across machines and identical to what db-dump.sh produces.
$prevEnc = [Console]::OutputEncoding
[Console]::OutputEncoding = [System.Text.Encoding]::UTF8
try {
  $dump = docker compose exec -T $Service sh -c 'exec mysqldump -u root -p"$MYSQL_ROOT_PASSWORD" --databases tpte --single-transaction --no-tablespaces --default-character-set=utf8mb4'
} finally {
  [Console]::OutputEncoding = $prevEnc
}

if ($LASTEXITCODE -ne 0) {
  Write-Error "mysqldump failed (exit $LASTEXITCODE). $Out was left unchanged."
  exit $LASTEXITCODE
}

$text = ($dump -join "`n") + "`n"
[System.IO.File]::WriteAllText((Join-Path $Root $Out), $text, (New-Object System.Text.UTF8Encoding $false))

Write-Host "Done. Review and commit $Out"
