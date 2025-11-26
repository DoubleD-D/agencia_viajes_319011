<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Agencia de Viajes') }}</title>

    <!-- 1. Fuentes (Roboto y Playfair) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Playfair+Display:wght@700;900&display=swap">
    
    <!-- 2. Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- 3. TUS ESTILOS PERSONALIZADOS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Estilos extra para el formulario de Login especificamente -->
    <style>
        .login-card {
            background: rgba(255, 255, 255, 0.1); /* Fondo cristal */
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 15px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            border: 1px solid rgba(255,255,255,0.2);
            text-align: center;
        }
        .login-input {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background: rgba(255,255,255,0.9);
        }
        .login-label {
            color: white;
            text-align: left;
            display: block;
            margin-top: 10px;
            font-weight: 500;
        }
        .login-title {
            font-family: 'Playfair Display', serif;
            color: white;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Aquí se inyecta el contenido del Login -->
    {{ $slot }}
</body>
</html>