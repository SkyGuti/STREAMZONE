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

6. Abrir el proyecto en el navegador:

http://localhost/streamzone/registrar_usuario.html

## Funcionalidades

- Registro de usuario.
- Inicio de sesión.
- Manejo de sesión con $\_SESSION.
- Acceso a zona privada.
- Actualización de datos personales.
- Cambio de contraseña.
- Cierre de sesión.

## Archivos principales

- conexion.php: conexión a la base de datos.
- registrar_usuario.html: formulario de registro.
- guardar_usuario.php: guarda el usuario registrado.
- login.php: formulario de inicio de sesión.
- validar_login.php: valida las credenciales.
- inicio.php: página principal privada.
- mi_cuenta.php: perfil del usuario.
- actualizar_perfil.php: actualiza los datos.
- cambiar_password.php: formulario de cambio de contraseña.
- guardar_password.php: guarda la nueva contraseña.
- logout.php: cierra la sesión.
- estilos.css: estilos del sistema.

## Seguridad aplicada

- Uso de password_hash() para cifrar contraseñas.
- Uso de password_verify() para verificar contraseñas.
- Validación de campos vacíos.
- Validación de correo electrónico.
- Control de acceso mediante sesiones.
