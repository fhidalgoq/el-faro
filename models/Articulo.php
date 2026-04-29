<?php

/**
 * Modelo: Articulo
 * Representa una noticia del periódico El Faro.
 * Arquitectura MVC — Capa Modelo
 */
class Articulo {
    private int    $id;
    private string $titulo;
    private string $categoria;
    private string $resumen;
    private string $imagen;
    private string $fecha;
    private string $seccion;

    public function __construct(int $id, string $titulo, string $categoria, string $resumen, string $imagen, string $fecha, string $seccion) {
        $this->id        = $id;
        $this->titulo    = $titulo;
        $this->categoria = $categoria;
        $this->resumen   = $resumen;
        $this->imagen    = $imagen;
        $this->fecha     = $fecha;
        $this->seccion   = $seccion;
    }

    // Getters
    public function getId(): int        { return $this->id; }
    public function getTitulo(): string  { return $this->titulo; }
    public function getCategoria(): string { return $this->categoria; }
    public function getResumen(): string { return $this->resumen; }
    public function getImagen(): string  { return $this->imagen; }
    public function getFecha(): string   { return $this->fecha; }
    public function getSeccion(): string { return $this->seccion; }

    /**
     * Retorna un array de artículos filtrados por sección.
     * Datos de prueba estáticos (sin base de datos).
     */
    public static function getPorSeccion(string $seccion): array {
        $todos = [
            // HOME / GENERAL
            new Articulo(1,  'Municipio impulsa recuperación de espacios públicos con plan integral de mejoramiento urbano', 'Ciudad',    'Autoridades comunales anunciaron un plan con iluminación, áreas verdes y renovación de plazas.', 'https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?w=800&h=400&fit=crop', 'Hace 2 horas', 'home'),
            new Articulo(2,  'Feria científica escolar reúne proyectos de innovación',             'Educación', 'Estudiantes de distintas comunas exponen sus proyectos ante jurado especializado.',              'https://images.unsplash.com/photo-1564981797816-1043664bf78d?w=120&h=110&fit=crop',  'Hace 4 horas', 'home'),
            new Articulo(3,  'Campaña de invierno refuerza apoyo a personas mayores',              'Sociedad',  'Organizaciones vecinales entregan abrigos y alimentos en sectores vulnerables.',                'https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=120&h=110&fit=crop',  'Hace 6 horas', 'home'),
            new Articulo(4,  'Nuevas medidas sanitarias fortalecen prevención comunitaria',        'Salud',     'El ministerio amplía la campaña de vacunación estacional a todas las comunas del país.',         'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?w=120&h=110&fit=crop',  'Hace 8 horas', 'home'),
            new Articulo(5,  'Selección local prueba nuevas variantes tácticas',                   'Deporte',   'El cuerpo técnico convocó a jóvenes promesas para los próximos amistosos internacionales.',       'https://images.unsplash.com/photo-1579952363873-27f3bade9f55?w=400&h=180&fit=crop',  'Hace 3 horas', 'home'),
            new Articulo(6,  'Emprendimiento local expande ventas mediante comercio electrónico',   'Negocios',  'Una pyme sustentable aumentó su alcance comercial gracias a estrategia digital.',                'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=400&h=180&fit=crop',  'Hace 5 horas', 'home'),
            new Articulo(7,  'Centro de innovación abre convocatoria para proyectos tecnológicos', 'Tecnología','La iniciativa busca apoyar ideas escalables con mentorías y financiamiento.',                    'https://images.unsplash.com/photo-1518770660439-4636190af475?w=400&h=180&fit=crop',  'Hace 7 horas', 'home'),

            // DEPORTE
            new Articulo(8,  'Atleta nacional obtiene récord en campeonato metropolitano de medio fondo', 'Atletismo', 'La deportista consiguió una nueva marca personal consolidándose como figura emergente del circuito.', 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=800&h=380&fit=crop', 'Hace 1 hora',  'deporte'),
            new Articulo(9,  'Selección local prueba nuevas variantes tácticas en entrenamientos',       'Fútbol',    'El cuerpo técnico convocó a jóvenes promesas para los próximos amistosos internacionales.',         'https://images.unsplash.com/photo-1579952363873-27f3bade9f55?w=120&h=110&fit=crop', 'Hace 3 horas', 'deporte'),
            new Articulo(10, 'Club universitario inaugura moderno centro de entrenamiento',              'Infraestructura','El nuevo complejo incluye gimnasio, áreas de recuperación y canchas de alto estándar.',     'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=120&h=110&fit=crop', 'Hace 5 horas', 'deporte'),
            new Articulo(11, 'Competencia regional de ciclismo convoca a más de 400 participantes',      'Ciclismo',  'La carrera recorrerá 120 km por las comunas del sector norte de la región.',                        'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=120&h=110&fit=crop', 'Hace 9 horas', 'deporte'),
            new Articulo(12, 'Torneo regional arranca con ocho equipos confirmados',                     'Fútbol',    'La competencia promete altos niveles técnicos con equipos de distintas comunas.',                 'https://images.unsplash.com/photo-1556056504-5c7696c4c28d?w=400&h=180&fit=crop', 'Hace 4 horas', 'deporte'),
            new Articulo(13, 'Jóvenes nadadores clasifican a campeonato nacional juvenil',               'Natación',  'Cuatro deportistas locales obtuvieron cupo en la competencia más importante de la categoría.',    'https://images.unsplash.com/photo-1530549387789-4c1017266635?w=400&h=180&fit=crop', 'Hace 6 horas', 'deporte'),
            new Articulo(14, 'Liga comunal de básquetbol define a sus finalistas',                       'Básquetbol','Tras intensas semifinales, dos equipos disputarán el título del torneo esta semana.',             'https://images.unsplash.com/photo-1546519638-68e109498ffc?w=400&h=180&fit=crop', 'Hace 10 horas','deporte'),

            // NEGOCIOS
            new Articulo(15, 'Emprendimiento local expande ventas mediante comercio electrónico y estrategia digital', 'Emprendimiento','Una pyme de productos sustentables triplicó ventas con estrategia en redes sociales.', 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800&h=380&fit=crop', 'Hace 2 horas', 'negocios'),
            new Articulo(16, 'Centro de innovación abre convocatoria para proyectos tecnológicos',       'Innovación','La iniciativa apoya ideas escalables con mentorías y vinculación con inversionistas.',           'https://images.unsplash.com/photo-1553484771-371a605b060b?w=120&h=110&fit=crop', 'Hace 4 horas', 'negocios'),
            new Articulo(17, 'Comercios barriales fortalecen compras colaborativas en red',              'Economía',  'Negocios de barrio impulsan red de cooperación para optimizar costos de abastecimiento.',         'https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=120&h=110&fit=crop', 'Hace 6 horas', 'negocios'),
            new Articulo(18, 'Nueva plataforma fintech simplifica pagos entre pymes locales',            'Finanzas',  'La solución ya es utilizada por más de 200 empresas en la región metropolitana.',                  'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=120&h=110&fit=crop', 'Hace 8 horas', 'negocios'),
            new Articulo(19, 'Tres startups chilenas clasifican a aceleradora internacional',             'Startups',  'Las empresas destacaron en áreas de agroindustria, salud digital y movilidad sustentable.',      'https://images.unsplash.com/photo-1552664730-d307ca884978?w=400&h=180&fit=crop', 'Hace 3 horas', 'negocios'),
            new Articulo(20, 'Sector inmobiliario registra leve recuperación en el primer trimestre',    'Inmobiliario','Las ventas de viviendas nuevas aumentaron un 8% respecto al trimestre anterior.',              'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=400&h=180&fit=crop', 'Hace 5 horas', 'negocios'),
            new Articulo(21, 'Grandes empresas adoptan modelos de trabajo híbrido de manera definitiva', 'Empresas',  'El 67% de las compañías planea mantener el esquema mixto durante 2026.',                         'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=400&h=180&fit=crop', 'Hace 9 horas', 'negocios'),

            // TECNOLOGÍA
            new Articulo(22, 'Chile lidera adopción de inteligencia artificial en pymes de Latinoamérica', 'Inteligencia Artificial','Más del 40% de las pymes chilenas ya integran herramientas de IA, duplicando el promedio regional.', 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=800&h=380&fit=crop', 'Hace 1 hora', 'tecnologia'),
            new Articulo(23, 'Bootcamps de programación duplican matrícula en 2026',                     'Desarrollo','La demanda por habilidades digitales impulsa programas intensivos de formación tecnológica.',     'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=120&h=110&fit=crop', 'Hace 3 horas','tecnologia'),
            new Articulo(24, 'Gobierno refuerza protocolos de seguridad digital en servicios públicos',  'Ciberseguridad','Nuevos estándares de autenticación serán exigidos a partir del próximo semestre.',           'https://images.unsplash.com/photo-1563770660941-20978e870e26?w=120&h=110&fit=crop', 'Hace 5 horas','tecnologia'),
            new Articulo(25, 'Nuevas plataformas de datos transforman la toma de decisiones empresariales','Big Data', 'Las herramientas de análisis en tiempo real reducen los tiempos de decisión en un 60%.',        'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=120&h=110&fit=crop', 'Hace 7 horas','tecnologia'),
            new Articulo(26, 'Nueva generación de procesadores llega con mayor eficiencia energética',   'Hardware',  'Los fabricantes presentan chips con hasta un 35% de mejora en rendimiento por vatio.',            'https://images.unsplash.com/photo-1593642632559-0c6d3fc62b89?w=400&h=180&fit=crop', 'Hace 4 horas','tecnologia'),
            new Articulo(27, 'Universidad lanza laboratorio de robótica colaborativa abierto a estudiantes','Robótica','El espacio estará disponible para proyectos de investigación y competencias nacionales.',       'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=400&h=180&fit=crop', 'Hace 6 horas','tecnologia'),
            new Articulo(28, 'Sensores inteligentes optimizan el consumo de agua en comunas del norte',  'IoT',       'El proyecto piloto redujo el desperdicio hídrico en un 22% durante los primeros seis meses.',    'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=180&fit=crop', 'Hace 9 horas','tecnologia'),

            // CULTURA
            new Articulo(29, 'Festival Internacional de Cine de Santiago presenta programación histórica con más de 200 películas','Cine','La edición reúne producciones de 45 países con énfasis en el cine latinoamericano independiente.', 'https://images.unsplash.com/photo-1460881680858-30d872d5b530?w=800&h=380&fit=crop', 'Hace 2 horas','cultura'),
            new Articulo(30, 'Orquesta Sinfónica Nacional estrena temporada con obra inédita de compositor chileno','Música','La obra de un compositor contemporáneo será el centro de la temporada 2026 de la orquesta.',  'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=120&h=110&fit=crop', 'Hace 4 horas','cultura'),
            new Articulo(31, 'Feria del Libro de Santiago supera cifra récord de visitantes en su primera semana','Literatura','La primera semana del evento registró más de 80.000 visitantes, un 18% más que el año anterior.','https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=120&h=110&fit=crop', 'Hace 6 horas','cultura'),
            new Articulo(32, 'Muralistas locales transforman el centro histórico con obras de gran formato','Arte urbano','Veinte artistas participan en la intervención que cubrirá más de 2.000 m² de murales.',         'https://images.unsplash.com/photo-1578926288207-a90a5366759d?w=120&h=110&fit=crop', 'Hace 8 horas','cultura'),
            new Articulo(33, 'Museo Nacional de Bellas Artes inaugura muestra de artistas emergentes latinoamericanos','Artes Visuales','La exposición reúne obras de 30 artistas menores de 35 años seleccionados por jurado internacional.','https://images.unsplash.com/photo-1518998053901-5348d3961a04?w=400&h=180&fit=crop', 'Hace 3 horas','cultura'),
            new Articulo(34, 'Compañía de teatro independiente celebra 20 años con temporada especial en el GAM','Teatro','Cuatro obras repasan la historia del colectivo con elenco completo y producción renovada.',     'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=180&fit=crop', 'Hace 5 horas','cultura'),
            new Articulo(35, 'Edificio histórico del centro será restaurado con fondos del Consejo de la Cultura','Patrimonio','Las obras comenzarán en junio y el inmueble recuperará su aspecto original en 18 meses.',    'https://images.unsplash.com/photo-1514533450685-4493e01d1fdc?w=400&h=180&fit=crop', 'Hace 10 horas','cultura'),
        ];

        if ($seccion === 'home') return $todos;

        return array_values(array_filter($todos, fn($a) => $a->getSeccion() === $seccion));
    }
}
