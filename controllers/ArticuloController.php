<?php

require_once 'models/Articulo.php';

class ArticuloController
{

    private array $secciones = [
        'home' => [
            'titulo' => 'Inicio',
            'meta' => 'Portada del periódico digital El Faro. Noticias de actualidad, deporte y negocios.',
            'tagline' => 'Informando con veracidad y compromiso.',
            'aviso' => '<b>Última hora:</b> Municipio anuncia plan integral de mejoramiento urbano para el sector oriente.',
        ],
        'deporte' => [
            'titulo' => 'Deporte',
            'meta' => 'Sección de deportes del periódico digital El Faro.',
            'tagline' => 'Toda la actualidad deportiva, en tiempo real.',
            'aviso' => '<b>Deportes:</b> Atleta nacional bate récord en campeonato metropolitano.',
        ],
        'negocios' => [
            'titulo' => 'Negocios',
            'meta' => 'Sección de negocios y emprendimiento del periódico digital El Faro.',
            'tagline' => 'Economía, emprendimiento y desarrollo empresarial al día.',
            'aviso' => '<b>Economía:</b> Banco Central mantiene tasa de interés en reunión de abril.',
        ],
        'tecnologia' => [
            'titulo' => 'Tecnología',
            'meta' => 'Sección de tecnología e innovación del periódico digital El Faro.',
            'tagline' => 'Innovación, ciencia y mundo digital al día.',
            'aviso' => '<b>Tecnología:</b> Nueva ley de protección de datos personales entra en vigencia.',
        ],
        'cultura' => [
            'titulo' => 'Cultura',
            'meta' => 'Sección de cultura y arte del periódico digital El Faro.',
            'tagline' => 'Arte, cine, música y patrimonio cultural al alcance de todos.',
            'aviso' => '<b>Cultura:</b> Festival Internacional de Cine de Santiago anuncia programación oficial.',
        ],
    ];

    public function cargar(string $seccion): void
    {
        $cfg = $this->secciones[$seccion];
        $articulos = Articulo::getPorSeccion($seccion);

        render("views/{$seccion}/index.php", [
            'paginaActiva' => $seccion,
            'tituloPagina' => $cfg['titulo'],
            'metaDesc' => $cfg['meta'],
            'taglinePagina' => $cfg['tagline'],
            'avisoTexto' => $cfg['aviso'],
            'destacado' => $articulos[0] ?? null,
            'secundarios' => array_slice($articulos, 1, 3),
            'masArticulos' => array_slice($articulos, 4, 3),
        ]);
    }
}
