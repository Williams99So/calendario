<?php
namespace App\Core;

abstract class Controller
{
    protected array $config;

    public function __construct()
    {
        $this->config = require dirname(__DIR__, 2) . '/config/config.php';
    }

    protected function view(string $vista, array $datos = []): void
    {
        $base = dirname(__DIR__) . '/Views/';
        $config = $this->config;
        extract($datos, EXTR_SKIP);
        ob_start();
        require $base . $vista . '.php';
        $contenido = ob_get_clean();
        require $base . 'layouts/main.php';
    }

    protected function json(array $datos, int $codigo = 200): void
    {
        http_response_code($codigo);
        header('Content-Type: application/json; charset=utf-8');
        header('Cache-Control: no-store');
        echo json_encode($datos, JSON_UNESCAPED_UNICODE);
    }
}

function e(?string $s): string
{
    return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
}
