<x-guest-layout>
    <!-- Usamos tu clase .header para tener el fondo y el tamaño completo -->
    <header class="header" style="flex-direction: column; justify-content: center;">
        
        <!-- TU MENÚ (Copiado de tu index.html) -->
        <div class="menu container">
            <a href="/" class="logo">Destino</a>
            <nav class="navbar">
                <ul>
                    <li><a href="/">Inicio</a></li>
                    <li><a href="#">Reservaciones</a></li>
                    <li><a href="{{ route('login') }}" style="color: #099FA6;">Login</a></li>
                    <li><a href="{{ route('register') }}">Registro</a></li>
                </ul>
            </nav>
            <div class="icons">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
            </div>
        </div>

        <!-- AQUÍ EMPIEZA EL FORMULARIO DE LARAVEL -->
        <div class="login-container">
            <h1 class="login-title">Bienvenido</h1>

            <!-- Muestra errores (si la contraseña está mal) -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf <!-- ¡IMPORTANTE! Token de seguridad -->

                <!-- Email -->
                <div style="text-align: left;">
                    <label style="color: white; font-weight: 500;">Correo Electrónico</label>
                    <input class="custom-input" type="email" name="email" required autofocus placeholder="correo@ejemplo.com">
                    <x-input-error :messages="$errors->get('email')" style="color: #ffcccc; margin-top: 5px;" />
                </div>

                <!-- Contraseña -->
                <div style="text-align: left; margin-top: 15px;">
                    <label style="color: white; font-weight: 500;">Contraseña</label>
                    <input class="custom-input" type="password" name="password" required placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password')" style="color: #ffcccc; margin-top: 5px;" />
                </div>

                <!-- Botón de Entrar (Usando tu clase .btn-1) -->
                <div style="margin-top: 30px;">
                    <button class="btn-1" style="border: none; cursor: pointer; width: 100%; font-size: 16px;">
                        Iniciar Sesión
                    </button>
                </div>

                <!-- Link de Registro -->
                <div style="margin-top: 20px;">
                    <a href="{{ route('register') }}" style="color: white; font-size: 14px; text-decoration: underline;">
                        ¿No tienes cuenta? Regístrate aquí
                    </a>
                </div>
            </form>
        </div>
    </header>
</x-guest-layout>