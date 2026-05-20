# El Faro — Periódico Digital

Aplicación web del periódico digital **El Faro**, desarrollada como proyecto académico del curso **Taller de Apps para Internet (AIEP)**. El sitio evolucionó desde HTML estático + Bootstrap hacia una aplicación dinámica con **PHP 8**, patrón **MVC**, **POO**, **MySQL** y mejoras de **usabilidad / UX** (Sumativa 4).

## Descripción

El Faro publica noticias por secciones (Inicio, Deporte, Negocios, Tecnología, Cultura), permite el **registro de lectores**, el envío de **mensajes de contacto** y mantiene al usuario identificado tras registrarse mediante **sesión PHP**.

## Tecnologías

| Capa | Tecnología |
|------|------------|
| Backend | PHP 8 (sin frameworks) |
| Base de datos | MySQL 8 / MariaDB |
| Acceso a datos | PDO, sentencias preparadas, procedimientos almacenados |
| Frontend | HTML5, Bootstrap 5.3, Bootstrap Icons 1.11 (CDN) |
| Estilos | `assets/css/custom.css` |
| Sesión | `$_SESSION` vía clase `Auth` |

## Requisitos

- PHP 8+ con extensión **pdo_mysql**
- Servidor MySQL en ejecución (recomendado: **XAMPP**)
- Navegador web moderno

## Instalación y ejecución

### 1. Base de datos

Importar el script en phpMyAdmin o por consola:

```bash
mysql -u root -p < database/elfaro.sql
```

Detalle de tablas y procedimientos: ver `database/README.md`.

### 2. Configuración

Editar credenciales en `config/config.php`:

```php
return [
    'host' => 'localhost',
    'db'   => 'elfaro',
    'user' => 'root',  //root por defecto
    'pass' => '',  // contraseña de MySQL si aplica
];
```

### 3. Servidor local

Desde la raíz del proyecto (`el-faro/`):

```bash
# Windows — PHP de XAMPP (recomendado):
C:\xampp\php\php.exe -S localhost:8000

# Si PHP del sistema tiene pdo_mysql habilitado:
php -S localhost:8000
```

Abrir: **http://localhost:8000**

### 4. Prueba de conexión (opcional)

```bash
C:\xampp\php\php.exe database/test_conexion.php
```

## Rutas del sitio

Todas las rutas usan `index.php` con el parámetro `?page=`:

| URL | Descripción |
|-----|-------------|
| `http://localhost:8000` | Inicio / portada |
| `?page=deporte` | Sección Deporte |
| `?page=negocios` | Sección Negocios |
| `?page=tecnologia` | Sección Tecnología |
| `?page=cultura` | Sección Cultura |
| `?page=contacto` | Formulario de contacto |
| `?page=registro` | Registro de usuario |
| `?page=logout` | Cerrar sesión |

## Arquitectura MVC + PDO

```
Vista  →  Controlador  →  Modelo  →  Conexion (PDO)  →  MySQL
```

### Modelos (`models/`)

| Clase | Responsabilidad |
|-------|-----------------|
| `Conexion` | Conexión única PDO: `conectar()`, `consulta()`, `ejecutar()` |
| `Articulo` | Noticias desde BD vía `CALL obtenerNoticias()` / `obtenerNoticiasPorSeccion(?)` |
| `Usuario` | Validación, registro e inserción en tabla `usuarios` |
| `Contacto` | Validación e inserción en tabla `contactos` |
| `Auth` | Sesión del lector: login tras registro, nombre en header, logout |

### Controladores (`controllers/`)

| Clase | Métodos principales |
|-------|---------------------|
| `ArticuloController` | `cargar($seccion)` — portada y secciones de noticias |
| `UsuarioController` | `mostrar()`, `procesar()` — registro con sesión automática |
| `ContactoController` | `mostrar()`, `procesar()` — contacto con precarga si hay sesión |

### Vistas (`views/`)

- `layout/header.php` — Topbar, navbar, estado de sesión (nombre o «Registrarse»)
- `layout/footer.php` — Pie de página
- `helpers.php` — `render()`, `badgeClass()`
- `home/`, `deporte/`, `negocios/`, `tecnologia/`, `cultura/` — Secciones de noticias
- `_seccion.php` — Plantilla compartida de sección
- `contacto/`, `usuario/` — Formularios y confirmaciones

## Base de datos (`elfaro`)

| Tabla | Uso |
|-------|-----|
| `secciones` | Catálogo de secciones (slug: home, deporte, …) |
| `noticias` | Artículos del periódico (35 registros iniciales) |
| `usuarios` | Lectores registrados (`password_hash`) |
| `contactos` | Mensajes del formulario |

### Procedimientos almacenados

| Procedimiento | Descripción |
|---------------|-------------|
| `obtenerNoticias()` | Lista todas las noticias |
| `obtenerNoticiasPorSeccion(seccion)` | Filtra por sección |
| `insertarNoticia(titulo, contenido)` | Alta simple de noticia |
| `insertarNoticiaCompleta(...)` | Alta con todos los campos |

### Mapeo PHP ↔ MySQL

| Modelo PHP | Columna MySQL |
|------------|---------------|
| `Articulo::$resumen` | `noticias.contenido` |
| `Articulo::$seccion` | `noticias.seccion` |
| Contraseña (hash) | `usuarios.password_hash` |

## Mejoras UX (Sumativa 4)

1. **Sesión tras registro** — Al crear cuenta, el usuario permanece logeado; el header muestra su nombre y la opción «Salir» en lugar de «Registrarse».
2. **Contacto asistido** — Si hay sesión activa, el formulario precarga nombre y correo; validación HTML5 con feedback visual en campos (clase `.form-ux`).

Informe de análisis y propuestas: `docs/INFORME_UX_SUMATIVA4.md`.

## Estructura del proyecto

```
el-faro/
├── index.php                 # Router principal
├── README.md
├── config/
│   └── config.php            # Credenciales MySQL
├── database/
│   ├── elfaro.sql            # Script BD + datos + procedimientos
│   ├── README.md
│   ├── test_conexion.php
│   └── generar_elfaro_sql.php
├── docs/
│   └── INFORME_UX_SUMATIVA4.md
├── models/
│   ├── Conexion.php
│   ├── Articulo.php
│   ├── Usuario.php
│   ├── Contacto.php
│   └── Auth.php
├── controllers/
│   ├── ArticuloController.php
│   ├── ContactoController.php
│   └── UsuarioController.php
├── views/
│   ├── helpers.php
│   ├── _seccion.php
│   ├── layout/
│   ├── home/
│   ├── deporte/
│   ├── negocios/
│   ├── tecnologia/
│   ├── cultura/
│   ├── contacto/
│   └── usuario/
└── assets/
    ├── css/custom.css
    └── img/
```

## Conceptos implementados

**POO**

- Clases con propiedades `private`, constructores, getters/setters
- Métodos `static` para validaciones y acceso a datos

**Seguridad**

- Sentencias preparadas (prevención de inyección SQL)
- `htmlspecialchars()` en salida de formularios
- `password_hash()` para contraseñas de usuario

**Accesibilidad**

- Enlace «Saltar al contenido principal»
- Etiquetas ARIA en navbar y alertas
- Estructura semántica HTML5

## Contexto académico

| Campo | Valor |
|-------|-------|
| Institución | Instituto Profesional AIEP |
| Asignatura | Taller de Apps para Internet |
| Evolución | Sumativa 3 (MVC + POO) → Sumativa 4 (UX + MySQL + mejoras de interfaz) |
| Semanas de referencia | S7 (BD), S8 (PDO), S9 (Usabilidad) |

## Licencia y uso

Proyecto con fines académicos. No redistribuir sin autorización del autor y de la institución.
