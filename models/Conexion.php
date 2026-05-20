<?php

/**
 * Clase única de conexión PDO — El Faro
 * Arquitectura MVC + PDO (Semana 8)
 */
class Conexion {
    private string $host;
    private string $db;
    private string $user;
    private string $pass;
    private ?PDO $conn = null;

    public function __construct() {
        $config = require __DIR__ . '/../config/config.php';
        $this->host = $config['host'];
        $this->db   = $config['db'];
        $this->user = $config['user'];
        $this->pass = $config['pass'];
    }

    public function conectar(): PDO {
        if ($this->conn !== null) {
            return $this->conn;
        }

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4",
                $this->user,
                $this->pass
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            die('Error de conexión: ' . $e->getMessage());
        }
    }

    public function consulta(string $sql, array $parametros = []): array {
        $this->conectar();
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($parametros);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ejecutar(string $sql, array $parametros = []): bool {
        $this->conectar();
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($parametros);
    }

    public function ultimoId(): string {
        return $this->conn->lastInsertId();
    }
}
