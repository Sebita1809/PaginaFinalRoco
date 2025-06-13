# Script para detener la aplicación Roco PHP
Write-Host "=== Deteniendo Página Roco PHP ===" -ForegroundColor Yellow

# Detener los contenedores
Write-Host "Deteniendo contenedores..." -ForegroundColor Yellow
docker-compose down

Write-Host "✓ Aplicación detenida exitosamente" -ForegroundColor Green
Write-Host "Los datos de la base de datos se han preservado." -ForegroundColor Cyan
Write-Host "`nPara eliminar también los datos de la base de datos:" -ForegroundColor Gray
Write-Host "  docker-compose down -v" -ForegroundColor Gray 