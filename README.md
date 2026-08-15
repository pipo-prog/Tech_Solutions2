# EVALUACIÓN SUMATIVA - UNIDAD N° 2
**ALUMNOS:** CAMILA BELTRAN, FELIPE GONZALEZ

**ASIGNATURA:** DESARROLLO DE SOFTWARE WEB I 

**SECCION:** 50  

---

# Tech Solutions - Plataforma de Gestión de Proyectos

Este proyecto corresponde al sistema modernizado de gestión de proyectos para **Tech Solutions**, desarrollado con el framework moderno **Laravel 11** y **PHP 8.3**, utilizando una base de datos relacional y vistas premium con diseño en modo oscuro.

Esta versión implementa la totalidad de los requerimientos exigidos en la Autenticación y Relaciones de Base de Datos.

---

## Características Principales

### 1. Módulo de Autenticación Completo
Se implementó un controlador personalizado de sesión (`AuthController`) con las siguientes funciones:
* **Registro de Usuarios:** Permite la creación de nuevas cuentas en el sistema. Almacena la contraseña de forma segura utilizando el cifrado **Bcrypt** en la base de datos.
* **Inicio de Sesión (Login):** Valida las credenciales ingresadas (`correo` y `clave`) comparándolas contra la base de datos mediante el sistema de autenticación de Laravel.
* **Cierre de Sesión (Logout):** Invalida de forma segura la sesión activa del usuario y regenera los tokens CSRF.
* **Protección de Rutas:** Se aplicó el middleware `auth` a todo el módulo de gestión de proyectos. Si un usuario no está autenticado, el sistema lo redirige automáticamente a la vista de login. Las vistas de login y registro están protegidas con el middleware `guest` para evitar accesos redundantes de usuarios ya autenticados.

### 2. Relaciones en la Base de Datos (1:N)
Se actualizaron los esquemas de migración y los modelos para establecer la vinculación de registros:
* **Usuario (Modelo `Usuario`):** Mapeado a la tabla `usuarios`. Tiene una relación `hasMany` hacia los proyectos (`proyectos()`).
* **Proyecto (Modelo `Proyecto`):** Mapeado a la tabla `proyectos`. Cuenta ahora con la columna `created_by` (llave foránea constrained a `usuarios(id)` con eliminación en cascada) y define la relación inversa `belongsTo` hacia el creador (`creador()`).
* **Asociación Automática:** Al crear un nuevo proyecto, el sistema asocia de forma automática el ID del usuario en sesión (`Auth::id()`) al campo `created_by`.

### 3. Interfaz Premium (UI/UX)
* Estilizada en modo oscuro con fondos degradados profundos, paneles translúcidos con efecto *glassmorphism* e interacciones fluidas.
* **Barra de Navegación Dinámica:** Visible únicamente para usuarios logueados, mostrando el nombre del usuario en sesión y un botón de cierre de sesión.
* **Conversión Financiera en Detalle:** En la vista de detalles de cada proyecto, el sistema calcula de forma dinámica la equivalencia del presupuesto en **UF (Unidades de Fomento)**.

### 4. Componente UF del Día (`UfValue`)
* Componente Blade reutilizable que consume la API en tiempo real de `mindicador.cl`.
* Implementa **Caché** por 1 hora para optimizar el rendimiento y evitar llamadas excesivas al servicio externo.
* Diseñado con control de excepciones (`try-catch`) para que, ante cualquier fallo de internet o del servicio externo, simule y retorne un valor UF por defecto, garantizando la estabilidad operativa del sistema.

---

## Requisitos del Entorno
* **PHP:** versión 8.2 o superio
* **Composer:** versión 2.0 o superior
* **Base de Datos:** MySQL / MariaDB (o SQLite para pruebas rápidas)

---

## Configuración e Instalación

### 1. Clonación y Variables de Entorno (.env)
El proyecto cuenta con la configuración de credenciales de base de datos MySQL oficial requerida para la entrega en el archivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=desarrollo_software_1
DB_USERNAME=root
DB_PASSWORD=desarrollo_software_1
```

*(Asegúrate de crear previamente la base de datos `desarrollo_software_1` en tu servidor MySQL local).*

### 2. Instalación de Dependencias
Ejecuta en tu consola dentro de la carpeta del proyecto para instalar los paquetes de Laravel:
```bash
composer install
```

### 3. Ejecución de Migraciones y Semillas (Seeders)
Este comando creará el esquema de tablas en tu base de datos y la poblará con datos estáticos de prueba (incluyendo el usuario semilla y los proyectos asociados a él):
```bash
php artisan migrate:fresh --seed
```

### 4. Levantar el Servidor de Desarrollo
Para arrancar el servidor local de Laravel, ejecuta:
```bash
php artisan serve
```
El sistema estará disponible en tu navegador en: **`http://localhost:8000`**

---

## Credenciales del Usuario
Puedes iniciar sesión directamente usando las credenciales por defecto insertadas por el Seeder del proyecto:
* **Correo:** `camila@techsolutions.cl`
* **Contraseña:** `desarrollo_software_1`

---

## Estructura del Código Creado/Modificado
* **Rutas:** [routes/web.php](routes/web.php)
* **Controlador de Acceso:** [app/Http/Controllers/AuthController.php](app/Http/Controllers/AuthController.php)
* **Controlador de Proyectos:** [app/Http/Controllers/ProyectoController.php](app/Http/Controllers/ProyectoController.php)
* **Modelos:**
  * [app/Models/Usuario.php](app/Models/Usuario.php)
  * [app/Models/Proyecto.php](app/Models/Proyecto.php)
* **Migraciones:**
  * `database/migrations/0001_01_01_000000_create_usuarios_table.php`
  * `database/migrations/2026_07_26_152830_create_proyectos_table.php`
* **Vistas:**
  * Login: [resources/views/auth/login.blade.php](resources/views/auth/login.blade.php)
  * Registro: [resources/views/auth/register.blade.php](resources/views/auth/register.blade.php)
  * Layout: [resources/views/layouts/app.blade.php](resources/views/layouts/app.blade.php)
