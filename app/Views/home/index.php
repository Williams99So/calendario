<?php use function App\Core\e; ?>
<header class="cabecera">
    <p class="mini">diciembre <?= e((string) $config['anio']) ?></p>
    <h1>Una puerta cada día,<br><?= e($config['nombre']) ?></h1>
    <?php if ($faltan > 0): ?>
        <p class="aviso">Todavía no empieza. Faltan <strong><?= $faltan ?></strong> <?= $faltan === 1 ? 'día' : 'días' ?> para abrir la primera.</p>
    <?php elseif ($hoy > 0 && $hoy < 24): ?>
        <p class="aviso">Hoy toca la puerta <strong><?= $hoy ?></strong>. Las anteriores siguen abiertas.</p>
    <?php else: ?>
        <p class="aviso">Ya están todas abiertas. Puedes volver a leerlas cuando quieras.</p>
    <?php endif; ?>
    <?php if ($simulado): ?><p class="prueba">modo prueba: estás viendo otra fecha</p><?php endif; ?>
</header>

<main class="tablero" data-prueba="<?= e($prueba) ?>">
    <?php foreach ($puertas as $p): ?>
        <button class="puerta <?= $p['abierta'] ? 'disponible' : 'cerrada' ?> <?= $p['n'] === $hoy && $faltan === 0 ? 'hoy' : '' ?>"
                data-n="<?= $p['n'] ?>" data-fecha="<?= e($p['fecha']) ?>" type="button"
                aria-label="Puerta <?= $p['n'] ?>">
            <span class="num"><?= $p['n'] ?></span>
            <span class="costura"></span>
        </button>
    <?php endforeach; ?>
</main>

<p class="pie">hecho por mí, para ti<?= !empty($config['tuNombre']) ? ' · ' . e($config['tuNombre']) : '' ?></p>

<div id="aviso-cerrada" class="toast" hidden></div>

<div id="carta" class="carta-fondo" hidden>
    <article class="carta">
        <span class="cinta"></span>
        <span class="carta-icono"></span>
        <button class="cerrar" aria-label="Cerrar">×</button>
        <p class="carta-fecha"></p>
        <h2 class="carta-titulo"></h2>
        <img class="carta-foto" alt="" hidden>
        <div class="carta-texto"></div>
        <audio class="carta-audio" controls hidden></audio>
    </article>
</div>
