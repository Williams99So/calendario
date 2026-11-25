<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Calendario;
use App\Models\Puertas;

class AdvientoController extends Controller
{
    public function index(): void
    {
        $cal = new Calendario($this->config);
        $puertas = [];
        for ($n = 1; $n <= Calendario::DIAS; $n++) {
            $puertas[] = [
                'n'      => $n,
                'abierta'=> $cal->desbloqueada($n),
                'fecha'  => $cal->etiquetaFecha($n),
            ];
        }
        $this->view('home/index', [
            'puertas' => $puertas,
            'hoy'     => $cal->puertaDeHoy(),
            'faltan'  => $cal->diasParaEmpezar(),
            'prueba'  => $cal->queryPrueba(),
            'simulado'=> $cal->simulado,
        ]);
    }

    /** Devuelve el contenido de una puerta SOLO si ya le toca abrirse. */
    public function dia(): void
    {
        $cal = new Calendario($this->config);
        $n = (int) ($_GET['n'] ?? 0);

        if (!$cal->desbloqueada($n)) {
            $this->json(['ok' => false, 'mensaje' => 'Todavía no, ' . $this->config['nombre']
                . '. Esta puerta se abre el ' . $cal->etiquetaFecha($n) . '.'], 403);
            return;
        }
        $this->json(['ok' => true, 'n' => $n, 'fecha' => $cal->etiquetaFecha($n)] + Puertas::una($n));
    }
}
