# Test Allport

Aplicacion web en PHP para aplicar y administrar un test de aptitudes tipo Allport. El proyecto usa Apache/PHP, MySQL 8 y phpMyAdmin mediante Docker Compose.

## Requisitos

- Docker Desktop
- Docker Compose

## Servicios

El archivo `docker-compose.yml` define tres servicios:

- `apache`: aplicacion PHP servida en `http://localhost:8080`
- `mysql`: base de datos MySQL 8, expuesta en el puerto `3306`
- `phpmyadmin`: administrador de base de datos en `http://localhost:8081`

Credenciales configuradas:

- MySQL root: usuario `root`, contrasena `root`
- MySQL usuario app: usuario `user`, contrasena `password`
- Base de datos: `test-allport`

La conexion de la aplicacion se configura en `connection.php`.

## Ejecutar el proyecto

Desde la carpeta del proyecto:

```powershell
docker-compose up -d --build
```

Despues abre:

- Aplicacion: `http://localhost:8080`
- phpMyAdmin: `http://localhost:8081`

Para detener los contenedores:

```powershell
docker-compose down
```

## Base de datos

El proyecto contiene estos archivos SQL:

- `Localhost Docker.session.sql`: dump principal de la base `test-allport`. Incluye creacion de tablas e inserts para aptitudes, opciones, preguntas y alumnos.
- `datos.sql`: inserts de alumnos exportados desde otra base. Este archivo no crea tablas y contiene inserts con nombre de tabla vacio, por lo que debe revisarse antes de importarlo.

Tablas principales del dump:

- `alumnos-test`
- `aptitudes-test`
- `opciones-test`
- `preguntas-test`

Nota: las tablas y algunos campos usan guiones (`-`). En MySQL son validos si se escriben entre backticks, por ejemplo:

```sql
SELECT * FROM `alumnos-test`;
```

## Importar el dump

El `docker-compose.yml` actual crea la base `test-allport`, pero no importa automaticamente ningun `.sql`.

Opcion recomendada con phpMyAdmin:

1. Levanta los servicios con `docker-compose up -d --build`.
2. Entra a `http://localhost:8081`.
3. Inicia sesion con usuario `root` y contrasena `root`.
4. Selecciona la base `test-allport`.
5. Usa la pestana Importar y carga `Localhost Docker.session.sql`.

Opcion por terminal:

```powershell
docker-compose exec -T mysql mysql -u root -proot test-allport < "Localhost Docker.session.sql"
```

## Reiniciar la base de datos

Si quieres borrar los datos actuales y empezar con una base limpia:

```powershell
docker-compose down
docker volume rm final-test-allport_mysql_data
docker-compose up -d --build
```

Si Docker muestra otro nombre de volumen, revisalo con:

```powershell
docker volume ls
```

## Estructura del proyecto

- `login.php`: inicio de sesion
- `home_admi.php`: pantalla principal para administrador
- `home_alumnos.php`: pantalla principal para alumnos
- `crud_alumnos.php`: administracion de alumnos
- `crud_maestros.php`: administracion de maestros
- `test1.php` y `test2.php`: pantallas del test
- `dashboard_final.php`: resultados o tablero final
- `connection.php`: conexion a MySQL
- `css/`: hojas de estilo
- `imagenes/`: imagenes usadas por la interfaz
- `Dockerfile`: imagen PHP/Apache con extensiones MySQL
- `docker-compose.yml`: servicios de Docker

## Notas de mantenimiento

- Conviene renombrar tablas y columnas para usar guiones bajos en lugar de guiones, por ejemplo `alumnos_test` en vez de `alumnos-test`.
- `datos.sql` necesita limpieza antes de importarse porque sus sentencias `INSERT INTO `` (...)` no indican tabla destino.
- Si este proyecto se publica o se usa fuera de entorno local, cambia las contrasenas por variables de entorno y evita guardar datos sensibles en archivos versionados.
