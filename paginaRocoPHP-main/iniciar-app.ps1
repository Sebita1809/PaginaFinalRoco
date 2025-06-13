# Script para iniciar la aplicación Roco PHP
Write-Host "=== Iniciando Página Roco PHP ===" -ForegroundColor Green

# Verificar si Docker está ejecutándose
Write-Host "Verificando Docker..." -ForegroundColor Yellow
try {
    docker version | Out-Null
    Write-Host "✓ Docker está ejecutándose" -ForegroundColor Green
} catch {
    Write-Host "✗ Docker no está ejecutándose. Por favor, inicia Docker Desktop." -ForegroundColor Red
    exit 1
}

# Verificar si Docker Compose está disponible
Write-Host "Verificando Docker Compose..." -ForegroundColor Yellow
try {
    docker-compose version | Out-Null
    Write-Host "✓ Docker Compose está disponible" -ForegroundColor Green
} catch {
    Write-Host "✗ Docker Compose no está disponible." -ForegroundColor Red
    exit 1
}

# Construir e iniciar los contenedores
Write-Host "Construyendo e iniciando contenedores..." -ForegroundColor Yellow
docker-compose up -d --build

# Esperar un momento para que los servicios se inicien
Write-Host "Esperando que los servicios se inicien..." -ForegroundColor Yellow
Start-Sleep -Seconds 10

# Verificar el estado de los contenedores
Write-Host "Verificando estado de los contenedores..." -ForegroundColor Yellow
docker-compose ps

Write-Host "`n=== Aplicación iniciada exitosamente ===" -ForegroundColor Green
Write-Host "🌐 Accede a la aplicación en: http://localhost:8080" -ForegroundColor Cyan
Write-Host "🗄️  Base de datos MySQL en: localhost:3306" -ForegroundColor Cyan
Write-Host "`nCredenciales de la aplicación:" -ForegroundColor Yellow
Write-Host "  Admin: admin@gmail.com / Admin12345" -ForegroundColor White
Write-Host "  Cliente: hola@gmail / Soyhomero1" -ForegroundColor White
Write-Host "`nPara ver los logs: docker-compose logs -f" -ForegroundColor Gray
Write-Host "Para detener: docker-compose down" -ForegroundColor Gray 