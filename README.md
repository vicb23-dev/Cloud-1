# 📒 Agenda Telefónica (PHP + MySQL)

Proyecto de ejemplo para aprender a crear una aplicación web CRUD en OCI
(Crear, Leer, Actualizar y Eliminar) con **PHP** y **MySQL**.
Deberán realizar un Fork de este repositorio en su cuenta personal de GitHub.
Y deberan crear un archivo Bash para la sincronizacion de la estrucutura de carpetas con el servidor.

## Funcionalidades

- Listar todos los contactos
- Buscar por nombre, apellidos o teléfono
- Agregar un contacto nuevo
- Editar un contacto existente
- Eliminar un contacto (con confirmación)

## Requisitos
- VM en Oracle Cloud
- Sistema Operativo Oracle Linux
- Servidor web **Apache**
- **PHP 7.4** o superior con la extensión `pdo_mysql`
- **MySQL 5.7+** o **MariaDB 10.3+**



> `sudo apt install apache2 php libapache2-mod-php php-mysql mysql-server`

## Estructura del proyecto

```
agenda/
├── index.php            # Lista y búsqueda de contactos
├── agregar.php          # Formulario para agregar
├── editar.php           # Formulario para editar
├── eliminar.php         # Elimina un contacto
├── config.php           # Datos de conexión a MySQL
├── css/
│   └── estilos.css      # Estilos de la aplicación
├── includes/
│   ├── conexion.php     # Conexión PDO y función e() para escapar HTML
│   ├── validar.php      # Validación de los datos del formulario
│   ├── formulario.php   # Formulario compartido (agregar / editar)
│   ├── header.php       # Encabezado HTML
│   └── footer.php       # Pie de página HTML
└── database/
    └── agenda.sql       # Script de instalación de la base de datos
```

## Instalación

### 1. Copiar el proyecto al servidor

Utilizar un Bash para la sincronizacion de archivos

```bash
# Linux


### 2. Instalar la base de datos

El archivo `database/agenda.sql` crea la base de datos `agenda`, el usuario
`agenda_user`, la tabla `contactos` y algunos contactos de ejemplo.

**Opción A: desde la terminal**

```bash
mysql -u root -p < database/agenda.sql
```

**Opción B: desde phpMyAdmin**

1. Entrar a `http://IP/phpmyadmin`
2. Ir a la pestaña **Importar**
3. Seleccionar el archivo `database/agenda.sql` y pulsar **Continuar**

### 3. Revisar la configuración

Abrir `config.php` y verificar que los datos coincidan con los del script SQL:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'agenda');
define('DB_USER', 'agenda_user');
define('DB_PASS', 'Agenda2026!');
```

> ⚠️ Si cambia la contraseña en `agenda.sql`, cámbiela también en `config.php`.

### 4. Abrir la aplicación

```
http://IP/agenda/
```

## Tabla `contactos`

| Campo            | Tipo          | Descripción                |
|------------------|---------------|----------------------------|
| `id`             | INT (PK, AI)  | Identificador              |
| `nombre`         | VARCHAR(50)   | Obligatorio                |
| `apellidos`      | VARCHAR(80)   | Obligatorio                |
| `telefono`       | VARCHAR(20)   | Obligatorio                |
| `email`          | VARCHAR(100)  | Opcional                   |
| `direccion`      | VARCHAR(150)  | Opcional                   |
| `fecha_registro` | TIMESTAMP     | Se asigna automáticamente  |

## Conceptos que se practican

- Conexión a MySQL con **PDO**
- **Consultas preparadas** para evitar inyección SQL
- Escapar la salida con `htmlspecialchars()` para evitar XSS
- Validación de formularios en el servidor
- Patrón **POST / Redirect / GET** después de guardar
- Reutilizar código con `require` (encabezado, pie y formulario)


## Nota

Este es un proyecto **educativo**. Antes de usarlo en un servidor público,
cambie la contraseña de la base de datos y agregue autenticación de usuarios.
