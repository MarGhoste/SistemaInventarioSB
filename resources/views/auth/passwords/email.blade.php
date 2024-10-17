<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/bolivaricono.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/cssInicioSesion.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/cssCuadroModal.css') }}" />
    <title>SB Inventario / Recuperar Contraseña</title>
</head>
<body style="background-image: url('{{ asset('assets/img/fondoinventario1.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-color: #001f3f;">
    <div class="container2">
        <h1 class="text-center">INVENTARIO SIMON BOLIVAR 2023</h1>
        <img src="{{ asset('assets/img/bolivaricono.png') }}" alt="ICONODELBOLIVAR" class="imagen-titulo">
    </div>
    <div class="container">
        <div class="icon">
            <img src="{{ asset('assets/img/recuperar.png') }}" alt="Icono Recuperar Contraseña" />
        </div>
        <h1>Recuperar Contraseña</h1>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" placeholder="Introduce tu correo" required />

            <button type="submit">Enviar Enlace de Recuperación</button>
        </form>

        <p><a href="{{ route('login') }}" class="password-link">Volver al Inicio de Sesión</a></p>
    </div>
</body>
</html>
