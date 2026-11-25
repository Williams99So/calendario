(function () {
  'use strict';
  var tablero = document.querySelector('.tablero');
  var extra = tablero.dataset.prueba || '';
  var fondo = document.getElementById('carta');
  var aviso = document.getElementById('aviso-cerrada');
  var KEY = 'adviento_vistas';
  var vistas = [];
  try { vistas = JSON.parse(localStorage.getItem(KEY) || '[]'); } catch (e) {}

  function marcar() {
    vistas.forEach(function (n) {
      var b = tablero.querySelector('[data-n="' + n + '"].disponible');
      if (b) b.classList.add('vista');
    });
  }
  marcar();

  function toast(msg) {
    aviso.textContent = msg; aviso.hidden = false;
    clearTimeout(toast.t); toast.t = setTimeout(function () { aviso.hidden = true; }, 2800);
  }

  function abrir(datos) {
    var c = fondo.querySelector('.carta');
    c.querySelector('.carta-fecha').textContent = datos.fecha;
    c.querySelector('.carta-titulo').textContent = datos.titulo;
    c.querySelector('.carta-icono').textContent = datos.icono || '';

    var cont = c.querySelector('.carta-texto');
    cont.innerHTML = '';
    if (datos.tipo === 'cupon') {
      var t = document.createElement('span'); t.className = 'ticket'; t.textContent = 'cupón para canjear';
      cont.appendChild(t);
    }
    datos.texto.forEach(function (par) {
      var p = document.createElement('p'); p.textContent = par; cont.appendChild(p);
    });

    var img = c.querySelector('.carta-foto');
    if (datos.foto) { img.src = 'img/' + datos.foto; img.hidden = false; } else { img.hidden = true; }

    var au = c.querySelector('.carta-audio');
    if (datos.audio) { au.src = datos.audio; au.hidden = false; } else { au.pause(); au.removeAttribute('src'); au.hidden = true; }

    fondo.hidden = false;
    c.scrollTop = 0;
  }

  function cerrar() {
    fondo.hidden = true;
    var au = fondo.querySelector('.carta-audio'); au.pause();
  }
  fondo.addEventListener('click', function (e) { if (e.target === fondo) cerrar(); });
  fondo.querySelector('.cerrar').addEventListener('click', cerrar);
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape') cerrar(); });

  tablero.addEventListener('click', function (e) {
    var b = e.target.closest('.puerta'); if (!b) return;
    var n = b.dataset.n;
    fetch('index.php?r=dia&n=' + n + extra, { cache: 'no-store' })
      .then(function (r) { return r.json(); })
      .then(function (d) {
        if (!d.ok) {
          b.classList.remove('tiembla'); void b.offsetWidth; b.classList.add('tiembla');
          toast(d.mensaje); return;
        }
        abrir(d);
        b.classList.add('vista');
        if (vistas.indexOf(+n) < 0) {
          vistas.push(+n);
          try { localStorage.setItem(KEY, JSON.stringify(vistas)); } catch (e) {}
        }
      })
      .catch(function () { toast('No se pudo abrir, intenta de nuevo.'); });
  });
})();
