<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulario de Reserva</title>
  <style>
    body {
      /* Usamos asset() para que encuentre la imagen sin importar la ruta */
      background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.3)),
                  url("{{ asset('img/bg.jpg') }}") center/cover no-repeat;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 40px;
      margin: 0;
      font-family: sans-serif;
    }

    .formulario {
      background: rgba(255,255,255,0.1);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 40px;
      width: 100%;
      max-width: 500px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    }

    .formulario h2 {
      text-align: center;
      margin-bottom: 20px;
      font-size: 2rem;
    }

    .formulario input,
    .formulario textarea {
      width: 100%;
      padding: 12px;
      margin: 8px 0;
      border-radius: 10px;
      border: 1px solid transparent; /* Ajuste visual */
      border: none;
      font-size: 1rem;
      box-sizing: border-box; /* Para evitar desbordes */
    }

    .formulario button {
      width: 100%;
      background: #00a8b5;
      border: none;
      color: #fff;
      padding: 15px;
      font-size: 1.1rem;
      border-radius: 30px;
      cursor: pointer;
      margin-top: 10px;
      transition: 0.3s;
    }

    .formulario button:hover {
      background: #008a96;
      transform: scale(1.05);
    }

    .btn-volver {
      position: absolute;
      top: 20px;
      left: 20px;
      background: #00a8b5;
      padding: 10px 25px;
      border-radius: 30px;
      color: #fff;
      text-decoration: none;
      font-weight: bold;
      z-index: 10;
    }

    .campo-fecha {
      margin-bottom: 15px; 
      position: relative;
    }

    /* Pequeño ajuste para el placeholder de fecha */
    input[type="date"] {
        color: #333; /* O el color que prefieras para el texto de fecha */
    }
  </style>
</head>
<body class="page-transition fade-in-page">
  
  <a href="{{ route('reservaciones') }}" class="btn-volver">← Regresar</a>

  <form class="formulario" method="POST" action="">
    @csrf

    <h2 id="tituloDestino">Reserva tu viaje</h2>

    <input type="hidden" name="destino" id="inputDestino">

    <input type="text" name="nombre" placeholder="Nombre completo" required>
    <input type="email" name="email" placeholder="Correo electrónico" required>
    
    <div class="campo-fecha">
        <input type="text" name="fecha_ida" id="fechaIda" placeholder="Fecha de IDA (dd/mm/aaaa)" 
               onfocus="(this.type='date')" onblur="(this.type='text')" 
               onchange="actualizarFechaRegresoMin()" required>
    </div>
    
    <div class="campo-fecha">
        <input type="text" name="fecha_regreso" id="fechaRegreso" placeholder="Fecha de REGRESO (dd/mm/aaaa)" 
               onfocus="(this.type='date')" onblur="(this.type='text')" required>
    </div>

    <textarea name="comentarios" rows="4" placeholder="Comentarios o solicitudes especiales"></textarea>
    
    <button type="submit">Confirmar Reserva</button>
  </form>

  <script>
    // Obtener parámetros de la URL
    const params = new URLSearchParams(window.location.search);
    const destino = params.get("destino");
    
    // Lógica para mostrar el destino
    if (destino) {
      document.getElementById("tituloDestino").textContent = `Reserva para ${destino}`;
      // También asignamos el valor al input oculto para enviarlo al servidor
      document.getElementById("inputDestino").value = destino;
    } else {
        document.getElementById("tituloDestino").textContent = "Reserva tu viaje";
    }

    function actualizarFechaRegresoMin() {
      const fechaIdaInput = document.getElementById('fechaIda');
      const fechaRegresoInput = document.getElementById('fechaRegreso');
      
      const fechaIdaValor = fechaIdaInput.value;
      if (fechaIdaValor) {
        fechaRegresoInput.min = fechaIdaValor;
        
        if (fechaRegresoInput.value && fechaRegresoInput.value < fechaIdaValor) {
            fechaRegresoInput.value = '';
        }
      }
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        const today = new Date().toISOString().split('T')[0];
        const fechaIda = document.getElementById('fechaIda');
        if(fechaIda) {
            fechaIda.min = today;
        }
    });
  </script>
</body>
</html>