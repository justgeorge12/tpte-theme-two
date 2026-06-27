#!/usr/bin/env pwsh
#
# Import db/init/seed.sql into the running `tpte` database.
# Use this to sync your local DB to a checkpoint a collaborator committed.
#
# PowerShell equivalent of db-restore.sh.
# Usage:  .\scripts\db-restore.ps1
#
$ErrorActionPreference = 'Stop'

$Root = Split-Path -Parent $PSScriptRoot
Set-Location $Root

$Service = 'db'
$Seed = 'db/init/seed.sql'

if (-not (Test-Path $Seed)) {
  Write-Error "$Seed not found. Nothing to restore."
  exit 1
}

if (-not (docker compose ps -q $Service 2>$null)) {
  Write-Error "the '$Service' service is not running. Start it with 'docker compose up -d'."
  exit 1
}

Write-Host "Restoring '$Seed' into the running database ..."
# PowerShell has no `<` input redirection, so stream the file in via the pipeline.
# Read it as UTF-8 and send stdin as UTF-8 so Greek text survives the round trip.
$prevIn = [Console]::InputEncoding
[Console]::InputEncoding = [System.Text.Encoding]::UTF8
try {
  Get-Content -Raw -Encoding UTF8 $Seed | docker compose exec -T $Service sh -c 'exec mysql -u root -p"$MYSQL_ROOT_PASSWORD"'
} finally {
  [Console]::InputEncoding = $prevIn
}

if ($LASTEXITCODE -ne 0) {
  Write-Error "mysql import failed (exit $LASTEXITCODE)."
  exit $LASTEXITCODE
}

Write-Host "Done. Your local DB now matches the committed checkpoint."