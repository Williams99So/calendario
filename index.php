<?php
declare(strict_types=1);
date_default_timezone_set('America/Lima');

spl_autoload_register(function (string $clase): void {
    if (strncmp($clase, 'App\\', 4) !== 0) { return; }
    $ruta = __DIR__ . '/app/' . str_replace('\\', '/', substr($clase, 4)) . '.php';
    if (is_file($ruta)) { require $ruta; }
});
require __DIR__ . '/app/Core/Controller.php';

use App\Controllers\AdvientoController;

$c = new AdvientoController();
(($_GET['r'] ?? '') === 'dia') ? $c->dia() : $c->index();
