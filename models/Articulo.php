<?php

require_once __DIR__ . '/Conexion.php';

/**
 * Modelo: Articulo
 * Representa una noticia del periódico El Faro.
 * Arquitectura MVC — Capa Modelo → Conexion (PDO) → MySQL
 */
class Articulo {
    private int    $id;
    private string $titulo;
    private string $categoria;
    private string $resumen;
    private string $imagen;
    private string $fecha;
    private string $seccion;

    public function __construct(
        int $id,
        string $titulo,
        string $categoria,
        string $resumen,
        string $imagen,
        string $fecha,
        string $seccion
    ) {
        $this->id        = $id;
        $this->titulo    = $titulo;
        $this->categoria = $categoria;
        $this->resumen   = $resumen;
        $this->imagen    = $imagen;
        $this->fecha     = $fecha;
        $this->seccion   = $seccion;
    }

    public function getId(): int           { return $this->id; }
    public function getTitulo(): string    { return $this->titulo; }
    public function getCategoria(): string { return $this->categoria; }
    public function getResumen(): string   { return $this->resumen; }
    public function getImagen(): string    { return $this->imagen; }
    public function getFecha(): string     { return $this->fecha; }
    public function getSeccion(): string   { return $this->seccion; }

    /**
     * Obtiene artículos desde MySQL mediante procedimientos almacenados.
     */
    public static function getPorSeccion(string $seccion): array {
        $db = new Conexion();

        if ($seccion === 'home') {
            $filas = $db->consulta('CALL obtenerNoticias()');
        } else {
            $filas = $db->consulta('CALL obtenerNoticiasPorSeccion(?)', [$seccion]);
        }

        return array_map(fn(array $fila) => self::desdeFila($fila), $filas);
    }

    private static function desdeFila(array $fila): self {
        return new self(
            (int) $fila['id'],
            $fila['titulo'],
            $fila['categoria'],
            $fila['contenido'],
            $fila['imagen'],
            $fila['fecha'],
            $fila['seccion']
        );
    }
}
