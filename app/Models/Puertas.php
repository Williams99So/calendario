<?php
namespace App\Models;

/**
 * Contenido de cada puerta. EDITA LOS TEXTOS a tu manera: suenan mejor si los dices como tú hablas.
 * tipo: mensaje | cupon | plan | foto
 * foto: archivo dentro de img/ (opcional) · audio: audio/diaN.mp3 se muestra solo si el archivo existe
 */
class Puertas
{
    public static function todas(): array
    {
        return [
            1 => ['tipo' => 'mensaje', 'titulo' => 'Empezamos',
                'texto' => ['Ya es diciembre. Quería que lo empezaras sabiendo algo: me haces bien. Así de simple.',
                            'Cada día hasta Navidad vas a encontrar algo mío acá. Unas cosas serán bonitas, otras medio tontas, pero todas pensadas en ti.']],

            2 => ['tipo' => 'mensaje', 'titulo' => 'Una razón',
                'texto' => ['Hoy te cuento una cosa que me encanta de ti: cómo te ríes cuando algo te da vergüenza y quieres que no se note. Se nota, y es lo mejor.']],

            3 => ['tipo' => 'cupon', 'titulo' => 'Tú eliges', 'icono' => '👑',
                'texto' => ['Esta semana tú eliges la película o serie que vemos, y yo no me quejo de cuál sea. Palabra.']],

            4 => ['tipo' => 'plan', 'titulo' => 'Cena juntos',
                'texto' => ['Hoy toca videollamada con cena. Tú me dices qué vas a comer y yo pido o cocino lo mismo.',
                            'Tú escoges la hora. Avísame qué te provoca.']],

            5 => ['tipo' => 'mensaje', 'titulo' => 'Escúchame un ratito',
                'texto' => ['Hoy me tocaba decírtelo con voz y no escribiendo.',
                            'Si abajo no te aparece el audio, avísame y te lo mando por WhatsApp.']],

            6 => ['tipo' => 'plan', 'titulo' => 'Nuestro recuerdo',
                'texto' => ['Cuéntame cuál es tu recuerdo favorito de nosotros dos, y yo te cuento el mío.',
                            'Veamos si coincidimos.']],

            7 => ['tipo' => 'cupon', 'titulo' => 'Hoy manda la princesa', 'icono' => '👑',
                'texto' => ['Vale por una videollamada donde tú decides todo: qué hacemos, de qué hablamos y cuándo nos despedimos. Yo obedezco.']],

            8 => ['tipo' => 'foto', 'titulo' => 'Esta foto', 'foto' => 'amor1.jpg', 'icono' => '🦄',
                'texto' => ['No hay mucho que explicar. Vi esta foto y me acordé de lo mucho que te extraño.']],

            9 => ['tipo' => 'cupon', 'titulo' => 'Abrazo de oso', 'icono' => '🧸',
                'texto' => ['Vale por un abrazo de cinco minutos el día que por fin nos veamos. Nadie suelta primero.']],

            10 => ['tipo' => 'plan', 'titulo' => 'Noche de película', 'icono' => '🌼',
                'texto' => ['Peli en videollamada, las dos al mismo tiempo. Puede ser Enredados, Sofía o la que tú quieras.',
                            'Yo llevo las ganas de verte, tú elige el día.']],

            11 => ['tipo' => 'mensaje', 'titulo' => 'Canciones',
                'texto' => ['Armé una lista de canciones que me hacen pensar en ti. Te la paso por mensaje hoy mismo.',
                            'Escúchala con calma y dime cuál te gustó más.']],

            12 => ['tipo' => 'mensaje', 'titulo' => 'Lo que admiro', 'icono' => '🖤',
                'texto' => ['Hay algo tuyo que admiro mucho: no te dejas vencer. Ni por los días malos ni por lo que digan los demás.',
                            'A veces no lo ves, pero yo sí, y es de lo que más me gusta de ti.']],

            13 => ['tipo' => 'plan', 'titulo' => 'Preguntas',
                'texto' => ['Hoy jugamos a las preguntas. Yo te hago cinco y tú me haces cinco. Valen las tontas.',
                            'El que se ría primero pierde algo. Ya veremos qué.']],

            14 => ['tipo' => 'foto', 'titulo' => 'Cara de misterio', 'foto' => 'amor2.jpg', 'icono' => '🌈',
                'texto' => ['Guardé esta foto porque tienes cara de estar pensando algo y no me lo vas a decir.']],

            15 => ['tipo' => 'cupon', 'titulo' => 'Beso sin vencimiento',
                'texto' => ['Vale por un beso largo cuando nos veamos. No vence nunca, aunque falte tiempo, y lo cobras cuando quieras.']],

            16 => ['tipo' => 'mensaje', 'titulo' => 'Lista de planes',
                'texto' => ['Cosas que quiero hacer contigo cuando estemos juntos: comer sin apuro, caminar sin rumbo, ver una peli abrazados, y que me lleves a tu lugar favorito.',
                            'Agrega tus ideas por mensaje y armamos la lista juntos.']],

            17 => ['tipo' => 'plan', 'titulo' => 'Dibujémonos',
                'texto' => ['Hoy tú me dibujas a mí y yo te dibujo a ti, cinco minutos, sin hacer trampa. Después nos mandamos el resultado.',
                            'Va a salir horrible y justamente por eso va a estar bonito.']],

            18 => ['tipo' => 'mensaje', 'titulo' => 'Hechicera', 'icono' => '🔮',
                'texto' => ['Desde que estás en mi vida todo me parece un poquito más fácil. No sé qué hiciste, pero funcionó.']],

            19 => ['tipo' => 'foto', 'titulo' => 'Mi princesa', 'foto' => 'amor3.jpg', 'icono' => '👑',
                'texto' => ['Quería que hoy vieras cómo te veo yo.']],

            20 => ['tipo' => 'cupon', 'titulo' => 'La primera salida',
                'texto' => ['Vale por la primera salida el día que nos veamos: tú eliges el lugar y yo me encargo de que sea un buen día. Aunque falte tiempo, este cupón te espera.']],

            21 => ['tipo' => 'mensaje', 'titulo' => 'Una promesa',
                'texto' => ['Para el próximo año te prometo escucharte más, cuidar lo nuestro aunque estemos lejos y no dejar que la distancia me gane en los días difíciles.']],

            22 => ['tipo' => 'mensaje', 'titulo' => 'Si estás cansada', 'icono' => '💫',
                'texto' => ['Sé que cargas muchas cosas y que a veces no lo cuentas. Si hoy estás cansada, descansa.',
                            'Yo te acompaño desde acá, aunque sea con un mensaje.']],

            23 => ['tipo' => 'foto', 'titulo' => 'Ya falta menos', 'foto' => 'amor5.jpg',
                'texto' => ['Mañana cerramos el calendario. Sé que todavía falta para vernos y que a veces pesa, pero cada día que pasa es uno menos, y yo no me rindo.']],

            24 => ['tipo' => 'mensaje', 'titulo' => 'Para cerrar', 'foto' => 'amor6.jpg',
                'texto' => ['Gracias por abrir cada puerta, aunque a veces fueran cosas simples.',
                            'Lo que quiero que te lleves de este diciembre es esto: pienso en ti todos los días y quiero que algún día lo pasemos juntos.',
                            'Feliz Navidad, mi niña. Te amo muchísimo.']],
        ];
    }

    public static function una(int $n): ?array
    {
        $p = self::todas()[$n] ?? null;
        if ($p === null) { return null; }
        $audio = "audio/dia{$n}.mp3";
        $p['audio'] = is_file(dirname(__DIR__, 2) . '/' . $audio) ? $audio : null;
        $p['foto']  = $p['foto'] ?? null;
        $p['icono'] = $p['icono'] ?? null;
        return $p;
    }
}
