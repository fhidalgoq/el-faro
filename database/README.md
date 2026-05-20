# Base de datos — El Faro

Script de creación de la base `elfaro` para la Sumativa 4 (MySQL + MVC).

## Contenido

| Archivo      | Descripción                                                           |
| ------------ | --------------------------------------------------------------------- |
| `elfaro.sql` | Script principal: BD, tablas, 35 noticias, procedimientos almacenados |

## Estructura de tablas

```
secciones (slug PK lógica)
    ↑ FK
noticias ── artículos del periódico (contenido = resumen en PHP)

usuarios ── registros de lectores (password_hash)
contactos ── mensajes del formulario
```

## Procedimientos almacenados

| Procedimiento                        | Uso                                        |
| ------------------------------------ | ------------------------------------------ |
| `obtenerNoticias()`                  | Todas las noticias (indicaciones semana 8) |
| `obtenerNoticiasPorSeccion(seccion)` | Filtro por sección (home, deporte, etc.)   |
| `insertarNoticia(titulo, contenido)` | Alta simple (indicaciones semana 8)        |
| `insertarNoticiaCompleta(...)`       | Alta con todos los campos del sitio        |

## Importar la base de datos

### Opción A — phpMyAdmin (XAMPP)

1. Iniciar **Apache** y **MySQL** en XAMPP.
2. Abrir http://localhost/phpmyadmin
3. Pestaña **Importar** → elegir `database/elfaro.sql` → **Continuar**.

### Opción B — Línea de comandos

```bash
mysql -u root -p < database/elfaro.sql
```

(Sin contraseña en XAMPP por defecto: `mysql -u root < database/elfaro.sql`)

## Verificar instalación

```sql
USE elfaro;
SELECT COUNT(*) FROM noticias;           -- debe devolver 35
CALL obtenerNoticiasPorSeccion('deporte');
```

## Credenciales (paso 2 — config.php)

| Parámetro | Valor por defecto   |
| --------- | ------------------- |
| host      | `localhost`         |
| db        | `elfaro`            |
| user      | `root`              |
| pass      | `` (vacío en XAMPP) |
