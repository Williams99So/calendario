<?php
namespace App\Models;

use DateTimeImmutable;
use DateTimeZone;

/** Lógica de fechas: qué puertas están abiertas hoy. */
class Calendario
{
    public const DIAS = 24;

    private DateTimeZone $zona;
    private int $anio;
    private DateTimeImmutable $hoy;
    public bool $simulado = false;

    public function __construct(array $config)
    {
        $this->zona = new DateTimeZone($config['zona']);
        $this->anio = (int) $config['anio'];
        $this->hoy  = new DateTimeImmutable('today', $this->zona);

        // Modo prueba (solo con la clave correcta)
        $clave = (string) ($_GET['probar'] ?? '');
        $fecha = (string) ($_GET['hoy'] ?? '');
        if ($clave !== '' && hash_equals((string) $config['clave_prueba'], $clave)
            && preg_match('/^\d{4}-\d{2}-\d{2}$/', $fecha)) {
            $this->hoy = new DateTimeImmutable($fecha, $this->zona);
            $this->simulado = true;
        }
    }

    public function fechaPuerta(int $n): DateTimeImmutable
    {
        return new DateTimeImmutable(sprintf('%d-12-%02d', $this->anio, $n), $this->zona);
    }

    public function desbloqueada(int $n): bool
    {
        return $n >= 1 && $n <= self::DIAS && $this->hoy >= $this->fechaPuerta($n);
    }

    /** Número de la puerta de hoy (0 si aún no empieza, 24 si ya pasó diciembre). */
    public function puertaDeHoy(): int
    {
        $ultima = 0;
        for ($i = 1; $i <= self::DIAS; $i++) {
            if ($this->desbloqueada($i)) { $ultima = $i; }
        }
        return $ultima;
    }

    public function diasParaEmpezar(): int
    {
        $dif = $this->hoy->diff($this->fechaPuerta(1));
        return $dif->invert ? 0 : (int) $dif->days;
    }

    public function etiquetaFecha(int $n): string
    {
        return $n . ' de diciembre';
    }

    public function queryPrueba(): string
    {
        return $this->simulado
            ? '&probar=' . rawurlencode((string) $_GET['probar']) . '&hoy=' . rawurlencode((string) $_GET['hoy'])
            : '';
    }
}
