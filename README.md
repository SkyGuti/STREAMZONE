# StreamZone

Sistema web básico de autenticación y perfil de usuario desarrollado con PHP, MySQL y HTML/CSS.

## Descripción

StreamZone es una plataforma básica de streaming que permite al usuario registrarse, iniciar sesión, acceder a una zona privada, actualizar sus datos personales, cambiar su contraseña y cerrar sesión.

## Requisitos

- XAMPP
- Apache
- MySQL
- PHP 7 o superior
- Navegador web

## Instalación

1. Copiar la carpeta del proyecto dentro de la carpeta `htdocs` de XAMPP.
2. Iniciar Apache y MySQL desde el panel de XAMPP.
3. Abrir phpMyAdmin.
4. Crear una base de datos llamada `streamzone_db`.
5. Ejecutar el siguiente SQL:

```sql
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cedula VARCHAR(20) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```
