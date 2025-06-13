# Página Roco PHP - Versión Dockerizada

Esta es la versión dockerizada de la aplicación PHP que no requiere XAMPP para funcionar.

## Requisitos Previos

- Docker
- Docker Compose

## Instrucciones de Uso

### 1. Iniciar la aplicación

Para iniciar la aplicación, ejecuta el siguiente comando en la terminal desde el directorio del proyecto:

```bash
docker-compose up -d
```

### 2. Acceder a la aplicación

Una vez que los contenedores estén ejecutándose, puedes acceder a la aplicación en:

- **Aplicación web**: http://localhost:8080
- **Base de datos MySQL**: localhost:3306

### 3. Credenciales de la base de datos

- **Host**: localhost (o `db` desde dentro del contenedor)
- **Puerto**: 3306
- **Base de datos**: 2dosemestreglobalprogramacion
- **Usuario**: roco_user
- **Contraseña**: roco_password
- **Usuario root**: root
- **Contraseña root**: root

### 4. Credenciales de la aplicación

La base de datos viene pre-poblada con los siguientes usuarios:

**Administrador:**
- Email: admin@gmail.com
- Contraseña: Admin12345

**Cliente:**
- Email: hola@gmail
- Contraseña: Soyhomero1

### 5. Comandos útiles

**Ver logs de los contenedores:**
```bash
docker-compose logs -f
```

**Detener la aplicación:**
```bash
docker-compose down
```

**Detener y eliminar volúmenes (esto eliminará la base de datos):**
```bash
docker-compose down -v
```

**Reconstruir los contenedores:**
```bash
docker-compose up -d --build
```

### 6. Estructura de contenedores

- **roco_php_app**: Contenedor con Apache y PHP 8.2
- **roco_mysql**: Contenedor con MySQL 8.0

### 7. Volúmenes

Los datos de la base de datos se almacenan en un volumen Docker llamado `mysql_data`, por lo que los datos persistirán entre reinicios de los contenedores.

### 8. Solución de problemas

Si tienes problemas para conectarte a la base de datos, asegúrate de que:
1. Los contenedores estén ejecutándose: `docker-compose ps`
2. No haya conflictos de puertos en el puerto 3306 o 8080
3. Docker esté ejecutándose correctamente

Para reiniciar todo desde cero:
```bash
docker-compose down -v
docker-compose up -d --build
```

## Ventajas de esta configuración

- ✅ No requiere XAMPP
- ✅ Configuración aislada y reproducible
- ✅ Fácil de desplegar en cualquier sistema
- ✅ Base de datos pre-poblada automáticamente
- ✅ Persistencia de datos
- ✅ Configuración de red aislada 