-- ============================================================
-- El Faro — Base de datos MySQL
-- Actividad Sumativa 4 | Taller de Apps para Internet (AIEP)
-- ============================================================
-- Importar en phpMyAdmin o: mysql -u root -p < database/elfaro.sql
-- ============================================================

DROP DATABASE IF EXISTS elfaro;
CREATE DATABASE elfaro
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE elfaro;

-- ------------------------------------------------------------
-- Tabla: secciones (catálogo de secciones del periódico)
-- ------------------------------------------------------------
CREATE TABLE secciones (
    id          INT          NOT NULL AUTO_INCREMENT,
    slug        VARCHAR(50)  NOT NULL,
    nombre      VARCHAR(100) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY uk_secciones_slug (slug)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO secciones (slug, nombre) VALUES
    ('home',       'Inicio'),
    ('deporte',    'Deporte'),
    ('negocios',   'Negocios'),
    ('tecnologia', 'Tecnología'),
    ('cultura',    'Cultura');

-- ------------------------------------------------------------
-- Tabla: noticias (artículos del periódico)
-- Campo contenido = resumen del artículo (compatible con PA del curso)
-- ------------------------------------------------------------
CREATE TABLE noticias (
    id          INT           NOT NULL AUTO_INCREMENT,
    titulo      VARCHAR(255)  NOT NULL,
    contenido   TEXT          NOT NULL,
    categoria   VARCHAR(100)  NOT NULL DEFAULT 'General',
    imagen      VARCHAR(500)  NOT NULL DEFAULT '',
    fecha       VARCHAR(50)   NOT NULL DEFAULT 'Recién publicado',
    seccion     VARCHAR(50)   NOT NULL DEFAULT 'home',
    creado_en   TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY idx_noticias_seccion (seccion),
  CONSTRAINT fk_noticias_seccion
    FOREIGN KEY (seccion) REFERENCES secciones (slug)
    ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO noticias (id, titulo, contenido, categoria, imagen, fecha, seccion) VALUES
(1, 'Municipio impulsa recuperación de espacios públicos con plan integral de mejoramiento urbano', 'Autoridades comunales anunciaron un plan con iluminación, áreas verdes y renovación de plazas.', 'Ciudad', 'https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?w=800&h=400&fit=crop', 'Hace 2 horas', 'home'),
(2, 'Feria científica escolar reúne proyectos de innovación', 'Estudiantes de distintas comunas exponen sus proyectos ante jurado especializado.', 'Educación', 'https://images.unsplash.com/photo-1564981797816-1043664bf78d?w=120&h=110&fit=crop', 'Hace 4 horas', 'home'),
(3, 'Campaña de invierno refuerza apoyo a personas mayores', 'Organizaciones vecinales entregan abrigos y alimentos en sectores vulnerables.', 'Sociedad', 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=120&h=110&fit=crop', 'Hace 6 horas', 'home'),
(4, 'Nuevas medidas sanitarias fortalecen prevención comunitaria', 'El ministerio amplía la campaña de vacunación estacional a todas las comunas del país.', 'Salud', 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?w=120&h=110&fit=crop', 'Hace 8 horas', 'home'),
(5, 'Selección local prueba nuevas variantes tácticas', 'El cuerpo técnico convocó a jóvenes promesas para los próximos amistosos internacionales.', 'Deporte', 'https://images.unsplash.com/photo-1579952363873-27f3bade9f55?w=400&h=180&fit=crop', 'Hace 3 horas', 'home'),
(6, 'Emprendimiento local expande ventas mediante comercio electrónico', 'Una pyme sustentable aumentó su alcance comercial gracias a estrategia digital.', 'Negocios', 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=400&h=180&fit=crop', 'Hace 5 horas', 'home'),
(7, 'Centro de innovación abre convocatoria para proyectos tecnológicos', 'La iniciativa busca apoyar ideas escalables con mentorías y financiamiento.', 'Tecnología', 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=400&h=180&fit=crop', 'Hace 7 horas', 'home'),
(8, 'Atleta nacional obtiene récord en campeonato metropolitano de medio fondo', 'La deportista consiguió una nueva marca personal consolidándose como figura emergente del circuito.', 'Atletismo', 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=800&h=380&fit=crop', 'Hace 1 hora', 'deporte'),
(9, 'Selección local prueba nuevas variantes tácticas en entrenamientos', 'El cuerpo técnico convocó a jóvenes promesas para los próximos amistosos internacionales.', 'Fútbol', 'https://images.unsplash.com/photo-1579952363873-27f3bade9f55?w=120&h=110&fit=crop', 'Hace 3 horas', 'deporte'),
(10, 'Club universitario inaugura moderno centro de entrenamiento', 'El nuevo complejo incluye gimnasio, áreas de recuperación y canchas de alto estándar.', 'Infraestructura', 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=120&h=110&fit=crop', 'Hace 5 horas', 'deporte'),
(11, 'Competencia regional de ciclismo convoca a más de 400 participantes', 'La carrera recorrerá 120 km por las comunas del sector norte de la región.', 'Ciclismo', 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=120&h=110&fit=crop', 'Hace 9 horas', 'deporte'),
(12, 'Torneo regional arranca con ocho equipos confirmados', 'La competencia promete altos niveles técnicos con equipos de distintas comunas.', 'Fútbol', 'https://images.unsplash.com/photo-1556056504-5c7696c4c28d?w=400&h=180&fit=crop', 'Hace 4 horas', 'deporte'),
(13, 'Jóvenes nadadores clasifican a campeonato nacional juvenil', 'Cuatro deportistas locales obtuvieron cupo en la competencia más importante de la categoría.', 'Natación', 'https://images.unsplash.com/photo-1530549387789-4c1017266635?w=400&h=180&fit=crop', 'Hace 6 horas', 'deporte'),
(14, 'Liga comunal de básquetbol define a sus finalistas', 'Tras intensas semifinales, dos equipos disputarán el título del torneo esta semana.', 'Básquetbol', 'https://images.unsplash.com/photo-1546519638-68e109498ffc?w=400&h=180&fit=crop', 'Hace 10 horas', 'deporte'),
(15, 'Emprendimiento local expande ventas mediante comercio electrónico y estrategia digital', 'Una pyme de productos sustentables triplicó ventas con estrategia en redes sociales.', 'Emprendimiento', 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800&h=380&fit=crop', 'Hace 2 horas', 'negocios'),
(16, 'Centro de innovación abre convocatoria para proyectos tecnológicos', 'La iniciativa apoya ideas escalables con mentorías y vinculación con inversionistas.', 'Innovación', 'https://images.unsplash.com/photo-1553484771-371a605b060b?w=120&h=110&fit=crop', 'Hace 4 horas', 'negocios'),
(17, 'Comercios barriales fortalecen compras colaborativas en red', 'Negocios de barrio impulsan red de cooperación para optimizar costos de abastecimiento.', 'Economía', 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=120&h=110&fit=crop', 'Hace 6 horas', 'negocios'),
(18, 'Nueva plataforma fintech simplifica pagos entre pymes locales', 'La solución ya es utilizada por más de 200 empresas en la región metropolitana.', 'Finanzas', 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=120&h=110&fit=crop', 'Hace 8 horas', 'negocios'),
(19, 'Tres startups chilenas clasifican a aceleradora internacional', 'Las empresas destacaron en áreas de agroindustria, salud digital y movilidad sustentable.', 'Startups', 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=400&h=180&fit=crop', 'Hace 3 horas', 'negocios'),
(20, 'Sector inmobiliario registra leve recuperación en el primer trimestre', 'Las ventas de viviendas nuevas aumentaron un 8% respecto al trimestre anterior.', 'Inmobiliario', 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=400&h=180&fit=crop', 'Hace 5 horas', 'negocios'),
(21, 'Grandes empresas adoptan modelos de trabajo híbrido de manera definitiva', 'El 67% de las compañías planea mantener el esquema mixto durante 2026.', 'Empresas', 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=400&h=180&fit=crop', 'Hace 9 horas', 'negocios'),
(22, 'Chile lidera adopción de inteligencia artificial en pymes de Latinoamérica', 'Más del 40% de las pymes chilenas ya integran herramientas de IA, duplicando el promedio regional.', 'Inteligencia Artificial', 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=800&h=380&fit=crop', 'Hace 1 hora', 'tecnologia'),
(23, 'Bootcamps de programación duplican matrícula en 2026', 'La demanda por habilidades digitales impulsa programas intensivos de formación tecnológica.', 'Desarrollo', 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=120&h=110&fit=crop', 'Hace 3 horas', 'tecnologia'),
(24, 'Gobierno refuerza protocolos de seguridad digital en servicios públicos', 'Nuevos estándares de autenticación serán exigidos a partir del próximo semestre.', 'Ciberseguridad', 'https://images.unsplash.com/photo-1563770660941-20978e870e26?w=120&h=110&fit=crop', 'Hace 5 horas', 'tecnologia'),
(25, 'Nuevas plataformas de datos transforman la toma de decisiones empresariales', 'Las herramientas de análisis en tiempo real reducen los tiempos de decisión en un 60%.', 'Big Data', 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=120&h=110&fit=crop', 'Hace 7 horas', 'tecnologia'),
(26, 'Nueva generación de procesadores llega con mayor eficiencia energética', 'Los fabricantes presentan chips con hasta un 35% de mejora en rendimiento por vatio.', 'Hardware', 'https://images.unsplash.com/photo-1593642632559-0c6d3fc62b89?w=400&h=180&fit=crop', 'Hace 4 horas', 'tecnologia'),
(27, 'Universidad lanza laboratorio de robótica colaborativa abierto a estudiantes', 'El espacio estará disponible para proyectos de investigación y competencias nacionales.', 'Robótica', 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=400&h=180&fit=crop', 'Hace 6 horas', 'tecnologia'),
(28, 'Sensores inteligentes optimizan el consumo de agua en comunas del norte', 'El proyecto piloto redujo el desperdicio hídrico en un 22% durante los primeros seis meses.', 'IoT', 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=180&fit=crop', 'Hace 9 horas', 'tecnologia'),
(29, 'Festival Internacional de Cine de Santiago presenta programación histórica con más de 200 películas', 'La edición reúne producciones de 45 países con énfasis en el cine latinoamericano independiente.', 'Cine', 'https://images.unsplash.com/photo-1460881680858-30d872d5b530?w=800&h=380&fit=crop', 'Hace 2 horas', 'cultura'),
(30, 'Orquesta Sinfónica Nacional estrena temporada con obra inédita de compositor chileno', 'La obra de un compositor contemporáneo será el centro de la temporada 2026 de la orquesta.', 'Música', 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=120&h=110&fit=crop', 'Hace 4 horas', 'cultura'),
(31, 'Feria del Libro de Santiago supera cifra récord de visitantes en su primera semana', 'La primera semana del evento registró más de 80.000 visitantes, un 18% más que el año anterior.', 'Literatura', 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=120&h=110&fit=crop', 'Hace 6 horas', 'cultura'),
(32, 'Muralistas locales transforman el centro histórico con obras de gran formato', 'Veinte artistas participan en la intervención que cubrirá más de 2.000 m² de murales.', 'Arte urbano', 'https://images.unsplash.com/photo-1578926288207-a90a5366759d?w=120&h=110&fit=crop', 'Hace 8 horas', 'cultura'),
(33, 'Museo Nacional de Bellas Artes inaugura muestra de artistas emergentes latinoamericanos', 'La exposición reúne obras de 30 artistas menores de 35 años seleccionados por jurado internacional.', 'Artes Visuales', 'https://images.unsplash.com/photo-1518998053901-5348d3961a04?w=400&h=180&fit=crop', 'Hace 3 horas', 'cultura'),
(34, 'Compañía de teatro independiente celebra 20 años con temporada especial en el GAM', 'Cuatro obras repasan la historia del colectivo con elenco completo y producción renovada.', 'Teatro', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=180&fit=crop', 'Hace 5 horas', 'cultura'),
(35, 'Edificio histórico del centro será restaurado con fondos del Consejo de la Cultura', 'Las obras comenzarán en junio y el inmueble recuperará su aspecto original en 18 meses.', 'Patrimonio', 'https://images.unsplash.com/photo-1514533450685-4493e01d1fdc?w=400&h=180&fit=crop', 'Hace 10 horas', 'cultura');

-- ------------------------------------------------------------
-- Tabla: usuarios (registro de lectores)
-- ------------------------------------------------------------
CREATE TABLE usuarios (
    id            INT           NOT NULL AUTO_INCREMENT,
    nombre        VARCHAR(150)  NOT NULL,
    email         VARCHAR(150)  NOT NULL,
    password_hash VARCHAR(255)  NOT NULL,
    fecha_registro DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY uk_usuarios_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- Tabla: contactos (mensajes del formulario de contacto)
-- ------------------------------------------------------------
CREATE TABLE contactos (
    id         INT           NOT NULL AUTO_INCREMENT,
    nombre     VARCHAR(150)  NOT NULL,
    email      VARCHAR(150)  NOT NULL,
    asunto     VARCHAR(200)  NOT NULL,
    mensaje    TEXT          NOT NULL,
    creado_en  TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- Procedimientos almacenados (Semana 8 / indicaciones1.txt)
-- ------------------------------------------------------------
DELIMITER //

CREATE PROCEDURE obtenerNoticias()
BEGIN
    SELECT id, titulo, contenido, categoria, imagen, fecha, seccion, creado_en
    FROM noticias
    ORDER BY id ASC;
END //

CREATE PROCEDURE obtenerNoticiasPorSeccion(IN p_seccion VARCHAR(50))
BEGIN
    SELECT id, titulo, contenido, categoria, imagen, fecha, seccion, creado_en
    FROM noticias
    WHERE seccion = p_seccion
    ORDER BY id ASC;
END //

CREATE PROCEDURE insertarNoticia(
    IN p_titulo   VARCHAR(255),
    IN p_contenido TEXT
)
BEGIN
    INSERT INTO noticias (titulo, contenido, categoria, imagen, fecha, seccion)
    VALUES (p_titulo, p_contenido, 'General', '', 'Recién publicado', 'home');
END //

CREATE PROCEDURE insertarNoticiaCompleta(
    IN p_titulo     VARCHAR(255),
    IN p_contenido  TEXT,
    IN p_categoria  VARCHAR(100),
    IN p_imagen     VARCHAR(500),
    IN p_fecha      VARCHAR(50),
    IN p_seccion    VARCHAR(50)
)
BEGIN
    INSERT INTO noticias (titulo, contenido, categoria, imagen, fecha, seccion)
    VALUES (p_titulo, p_contenido, p_categoria, p_imagen, p_fecha, p_seccion);
END //

DELIMITER ;
