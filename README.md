# El Faro — Periódico Digital

Proyecto académico correspondiente a la **Actividad Sumativa 3: PHP + MVC + POO**. Consiste en la migración del sitio web del periódico digital **El Faro** desde HTML5 + Bootstrap estático hacia una aplicación web dinámica construida con **PHP 8 puro**, implementando el patrón **MVC (Modelo-Vista-Controlador)** y **Programación Orientada a Objetos (POO)**.

## 🛠️ Tecnologías utilizadas

- **PHP 8** — lógica de servidor, MVC y POO (sin frameworks externos)
- **HTML5** — estructura semántica en las vistas
- **Bootstrap 5.3** — framework UI (vía CDN)
- **Bootstrap Icons 1.11** — iconografía (vía CDN)
- **CSS personalizado** — `assets/css/custom.css`

## 🚀 Cómo ejecutar el sitio

Requiere **PHP 8** instalado. Desde la raíz del proyecto:

```bash
php -S localhost:8000
```

Luego abrir en el navegador: **http://localhost:8000**

## 📄 Rutas del sitio

Todas las rutas pasan por `index.php` usando el parámetro `?page=`:

| URL | Sección |
|---|---|
| `http://localhost:8000` | Inicio / Portada |
| `http://localhost:8000?page=deporte` | Deporte |
| `http://localhost:8000?page=negocios` | Negocios |
| `http://localhost:8000?page=tecnologia` | Tecnología |
| `http://localhost:8000?page=cultura` | Cultura |
| `http://localhost:8000?page=contacto` | Formulario de Contacto |
| `http://localhost:8000?page=registro` | Registro de Usuario |

## 🏗️ Arquitectura MVC

### Modelos (`models/`)
| Clase | Descripción |
|---|---|
| `Articulo` | Representa una noticia. Proporciona artículos por sección con datos estáticos de prueba. |
| `Usuario` | Representa un lector registrado. Incluye validación de campos y hash de contraseña. |
| `Contacto` | Representa un mensaje del formulario de contacto. Incluye validación de campos. |

### Controladores (`controllers/`)
| Clase | Descripción |
|---|---|
| `ArticuloController` | Carga cualquier sección de noticias mediante un único método `cargar($seccion)`. |
| `ContactoController` | Muestra el formulario de contacto y procesa el POST con validación. |
| `UsuarioController` | Muestra el formulario de registro y procesa el POST con validación. |

### Vistas (`views/`)
| Ruta | Descripción |
|---|---|
| `layout/header.php` | Cabecera compartida: barra de avisos, topbar y navbar con enlace activo dinámico. |
| `layout/footer.php` | Pie de página compartido: links, redes sociales y CTA de registro. |
| `helpers.php` | Funciones compartidas: `badgeClass()` y `render()`. |
| `home/index.php` | Vista de portada con noticias destacadas. |
| `_seccion.php` | Plantilla genérica reutilizada por Deporte, Negocios, Tecnología y Cultura. |
| `contacto/form.php` | Formulario de contacto con manejo de errores. |
| `contacto/confirmacion.php` | Confirmación de mensaje enviado. |
| `usuario/registro.php` | Formulario de registro con validación. |
| `usuario/confirmacion.php` | Confirmación de cuenta creada. |

## 📁 Estructura del proyecto

```
el-faro/
│
├── index.php               — Router principal (punto de entrada único)
├── README.md
│
├── models/
│   ├── Articulo.php        — Entidad: Artículo de noticias
│   ├── Usuario.php         — Entidad: Usuario / Lector
│   └── Contacto.php        — Entidad: Mensaje de contacto
│
├── controllers/
│   ├── ArticuloController.php
│   ├── ContactoController.php
│   └── UsuarioController.php
│
├── views/
│   ├── helpers.php         — Funciones compartidas (badgeClass, render)
│   ├── _seccion.php        — Plantilla genérica de sección de noticias
│   ├── layout/
│   │   ├── header.php
│   │   └── footer.php
│   ├── home/
│   │   └── index.php
│   ├── deporte/
│   │   └── index.php
│   ├── negocios/
│   │   └── index.php
│   ├── tecnologia/
│   │   └── index.php
│   ├── cultura/
│   │   └── index.php
│   ├── contacto/
│   │   ├── form.php
│   │   └── confirmacion.php
│   └── usuario/
│       ├── registro.php
│       └── confirmacion.php
│
└── assets/
    └── css/
        └── custom.css      — Estilos personalizados sobre Bootstrap
```

## ✅ Conceptos POO implementados

- **Clases** con propiedades privadas (`private`)
- **Constructores** (`__construct`)
- **Getters y Setters** para encapsulamiento
- **Métodos estáticos** (`static`) para validaciones y consultas de datos
- **Visibilidad** `public` / `private` en todos los métodos

## 📚 Contexto académico

- **Institución:** Instituto Profesional AIEP
- **Asignatura:** Taller de Apps para Internet
- **Actividad:** Sumativa 3 — PHP + MVC + POO (Semana 6)