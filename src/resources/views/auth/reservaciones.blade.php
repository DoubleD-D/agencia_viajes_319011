<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reservaciones - Destino Travel</title>
  
  <style>
    /* Fondo con imagen + degradado */
    /* Nota: Usamos asset() para asegurar que cargue la imagen de fondo */
    body {
      background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.3)),
                  url("{{ asset('img/bg.jpg') }}") center/cover no-repeat;
      color: white;
      margin: 0;
      font-family: sans-serif; /* Agregué una fuente genérica por si acaso */
    }

    .contenedor-destinos {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 30px;
      padding: 100px 50px;
    }

    .destino {
      background: rgba(255, 255, 255, 0.15);
      border-radius: 20px;
      overflow: hidden;
      text-align: center;
      backdrop-filter: blur(10px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      transition: transform 0.4s ease, box-shadow 0.4s ease;
      cursor: pointer;
    }

    .destino:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
    }

    .destino img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      border-bottom: 3px solid #00a8b5;
    }

    .destino h3 {
      margin: 20px 0 10px;
      font-size: 1.6rem;
    }

    .destino p {
      padding: 0 15px 20px;
      font-size: 1rem;
    }

    /* Botón */
    .btn-volver {
      position: fixed;
      top: 20px;
      left: 20px;
      background: #00a8b5;
      padding: 10px 25px;
      border-radius: 30px;
      color: #fff;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
      z-index: 100; /* Para asegurar que quede encima */
    }

    .btn-volver:hover {
      background: #008a96;
      transform: scale(1.05);
    }
    
    /* Clase para la animación de salida */
    .fade-out {
        opacity: 0;
        transition: opacity 0.5s ease-out;
    }
  </style>
</head>
<body class="page-transition fade-in-page">
  
  <a href="{{ url('/') }}" class="btn-volver">← Inicio</a>

  <section class="contenedor-destinos">
    <div class="destino" onclick="abrirFormulario('Cancún')">
      <img src="{{ asset('img/cancun.jpg') }}" alt="Cancún">
      <h3>Cancún</h3>
      <p>Playas cristalinas, vida nocturna y una experiencia tropical inolvidable.</p>
      <h3>$300 x noche</h3>
    </div>

    <div class="destino" onclick="abrirFormulario('Acapulco')">
      <img src="{{ asset('img/acapulco.jpg') }}" alt="acapulco">
      <h3>Acapulco</h3>
      <p>Ruinas mayas junto al mar y una vibra bohemia única.</p>
      <h3>$150 x noche</h3>
    </div>

    <div class="destino" onclick="abrirFormulario('Los Cabos')">
      <img src="{{ asset('img/cabos.jpeg') }}" alt="Los Cabos">
      <h3>Los Cabos</h3>
      <p>El punto donde el desierto se une con el mar. Ideal para aventuras.</p>
      <h3>$250 x noche</h3>
    </div>

    <div class="destino" onclick="abrirFormulario('Chiapas')">
      <img src="{{ asset('img/chiapas.jpg') }}" alt="Chiapas">
      <h3>Chiapas</h3>
      <p>Tranquilidad, aguas turquesas y el mejor ambiente caribeño.</p>
      <h3>$230 x noche</h3>
    </div>

    <div class="destino" onclick="abrirFormulario('San luis potosi')">
        <img src="{{ asset('img/sanLuis.jpg') }}" alt="San luis potosi">
        <h3>San luis potosi</h3>
        <p>Un lindo lugar para los amantes de las aventuras y aguas dulces</p>
        <h3>$300 x noche</h3>
    </div>

    <div class="destino" onclick="abrirFormulario('Puerto vallarta')">
        <img src="{{ asset('img/puerto vallarta.jpg') }}" alt="Puerto vallarta">
        <h3>Puerto Vallarta</h3>
        <p>Una playa con lindos atardeceres y aventuras</p>
        <h3>$200 x noche</h3>
    </div>

  </section>

  <script>
    // Transición suave y redirección con destino
    function abrirFormulario(destino) {
      document.body.classList.add("fade-out");
      
      setTimeout(() => {
        // En Laravel, apuntamos a la ruta '/formulario'
        // encodeURIComponent es importante para espacios y caracteres especiales
        window.location.href = "{{ url('/formulario') }}?destino=" + encodeURIComponent(destino);
      }, 500);
    }
  </script>
</body>
</html>