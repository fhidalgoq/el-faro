# El Faro — Periódico Digital

Proyecto académico correspondiente a la **Actividad Sumativa 2: Uso de Frameworks**. Consiste en el rediseño y mejora del sitio web del periódico digital **El Faro**, migrando desde HTML5 + CSS propio a **Bootstrap 5.3**, incorporando nuevas secciones, componentes modernos y una estética renovada.

## 🛠️ Tecnologías utilizadas

- **HTML5** — estructura semántica
- **Bootstrap 5.3** — framework UI (vía CDN)
- **Bootstrap Icons 1.11** — iconografía (vía CDN)
- **CSS personalizado** — `assets/css/custom.css` sobre Bootstrap

## 📄 Páginas del sitio

| Página | Descripción |
|---|---|
| `index.html` | Portada con noticias destacadas, cards secundarias y multimedia |
| `deporte.html` | Sección de deportes |
| `negocios.html` | Sección de negocios y emprendimiento |
| `tecnologia.html` | Sección de tecnología e innovación |
| `cultura.html` | Sección de cultura y arte |

## ✅ Requisitos implementados (RQ)

| ID | Requisito | Implementación |
|---|---|---|
| RQ-01 | Nueva estética más moderna | Bootstrap 5.3, paleta de color personalizada, Bootstrap Icons |
| RQ-02 | Secciones mejor organizadas | Grid de Bootstrap, separación por secciones con `section` |
| RQ-03 | Acceso a otras secciones separadas del menú | Dropdown "Más secciones" en navbar con Tecnología y Cultura |
| RQ-04 | Vista de artículo más reciente de manera destacada | Card hero (`card-featured`) con imagen grande y CTA |
| RQ-05 | Vista de otros artículos más chicos | Grid de 3 cards pequeñas (`col-md-4`) |
| RQ-06 | Footer más grande | Footer de 4 columnas con links, redes sociales y boletín |
| RQ-07 | Sección superior de avisos | `alert alert-warning alert-dismissible` en todas las páginas |
| RQ-08 | Responsividad | Sistema de grid Bootstrap (`col-md`, `col-lg`, `navbar-toggler`) |
| RQ-09 | Framework UI | Bootstrap 5.3 vía CDN |

## 📁 Estructura del proyecto

```
el-faro/
│
├── index.html          — Inicio / Portada
├── deporte.html        — Sección Deporte
├── negocios.html       — Sección Negocios
├── tecnologia.html     — Sección Tecnología
├── cultura.html        — Sección Cultura
├── README.md
│
└── assets/
    ├── css/
    │   ├── styles.css      — Estilos originales (legado)
    │   └── custom.css      — Estilos personalizados sobre Bootstrap 5.3
    ├── img/
    │   ├── logo-el-faro.svg
    │   └── portada-video.svg
    └── media/
        ├── video-noticia.mp4
        └── audio-resumen.mp3
```

## 🚀 Cómo visualizar el sitio

Abre `index.html` directamente en un navegador o accede a la versión publicada en **GitHub Pages**:

> 🔗 URL: https://fhidalgoq.github.io/el-faro/

## 📚 Contexto académico

- **Institución:** Instituto Profesional AIEP
- **Asignatura:** Taller de Apps para Internet
- **Actividad:** Sumativa 2 — Uso de Frameworks (Semana 5)
- **Framework utilizado:** Bootstrap 5.3