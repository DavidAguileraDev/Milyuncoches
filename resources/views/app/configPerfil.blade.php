@php
use Illuminate\Support\Facades\Storage;
@endphp

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de {{ $user->name }} - Milyuncoches</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* Estilos Base - Modo Oscuro */
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #0d0e12;
            color: #ffffff;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* 1. Panel Superior */
        .top-panel {
            width: 100%;
            height: 70px;
            background-color: #16181d;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 40px;
            box-sizing: border-box;
            border-bottom: 1px solid #23262d;
        }

        .logo {
            font-size: 20px;
            font-weight: 800;
            letter-spacing: -0.5px;
            color: #ffffff;
            text-decoration: none;
        }

        .back-link {
            color: #9ca3af;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: #ffffff;
        }

        /* Estructura del Perfil */
        .profile-layout {
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 40px;
            max-width: 1100px;
            margin: 50px auto;
            padding: 0 20px;
            box-sizing: border-box;
        }

        /* COLUMNA IZQUIERDA: Tarjeta de información */
        .profile-card {
            background-color: #16181d;
            border-radius: 24px;
            border: 1px solid #23262d;
            padding: 40px 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            height: fit-content;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
        }

        /* Avatar grande con overlay */
        .large-avatar-container {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid #23262d;
            background-color: #1a1d24;
            margin-bottom: 20px;
            position: relative;
        }

        .large-avatar {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .large-avatar-default {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #232730;
        }

        .large-avatar-default svg {
            width: 55px;
            height: 55px;
            color: #9ca3af;
        }

        /* Datos de la tarjeta */
        .user-name {
            font-size: 22px;
            font-weight: 800;
            margin: 0 0 8px 0;
            letter-spacing: -0.5px;
        }

        .user-email {
            font-size: 14px;
            color: #9ca3af;
            margin: 0 0 25px 0;
            word-break: break-all;
        }

        .profile-meta {
            width: 100%;
            border-top: 1px solid #232730;
            padding-top: 20px;
            font-size: 13px;
            color: #6b7280;
        }

        /* Contenedor y Botón de Cerrar Sesión */
        .logout-container {
            width: 100%;
            margin-top: 30px;
            border-top: 1px solid #232730;
            padding-top: 25px;
        }

        .btn-logout {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            width: 100%;
            padding: 12px 0;
            background-color: transparent;
            color: #f87171;
            border: 1px solid #3f1d1d;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s, color 0.2s, border-color 0.2s;
        }

        .btn-logout:hover {
            background-color: #3f1d1d;
            color: #fca5a5;
            border-color: #f87171;
        }

        .btn-logout svg {
            width: 16px;
            height: 16px;
        }

        /* COLUMNA DERECHA: Formulario de ajustes */
        .profile-settings {
            background-color: #16181d;
            border-radius: 24px;
            border: 1px solid #23262d;
            padding: 40px;
            display: flex;
            flex-direction: column;
            gap: 40px;
        }

        .section-title {
            font-size: 24px;
            font-weight: 800;
            margin: 0;
            letter-spacing: -0.5px;
            border-bottom: 1px solid #232730;
            padding-bottom: 15px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            font-size: 12px;
            font-weight: 700;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .profile-input {
            width: 100%;
            padding: 10px 0px;
            border: none;
            border-bottom: 2px solid #4b5563;
            font-size: 16px;
            outline: none;
            background: transparent;
            color: #ffffff;
            transition: border-color .2s ease;
            box-sizing: border-box;
        }

        .profile-input:focus {
            border-bottom-color: #ffffff;
        }

        /* Estilo personalizado para el input de tipo file */
        .profile-file-input {
            color: #9ca3af;
            font-size: 14px;
            padding: 10px 0;
        }

        .profile-file-input::-webkit-file-upload-button {
            background: #23262d;
            border: 1px solid #374151;
            color: #ffffff;
            padding: 8px 16px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 600;
            margin-right: 10px;
            transition: background 0.2s;
        }

        .profile-file-input::-webkit-file-upload-button:hover {
            background: #374151;
        }

        /* Contenedores de botones individuales */
        .btn-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 15px;
        }

        .btn-save {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 180px;
            padding: 14px 0;
            border: none;
            border-radius: 30px;
            background-color: #ffffff;
            color: #0d0e12;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color .25s ease, transform .2s ease;
        }

        .btn-save:hover {
            background-color: #e5e7eb;
            transform: translateY(-2px);
        }

        .btn-save:active {
            transform: scale(.98);
        }

        /* Botón secundario para la foto */
        .btn-secondary {
            background-color: transparent;
            color: #ffffff;
            border: 1px solid #4b5563;
        }

        .btn-secondary:hover {
            background-color: #23262d;
            border-color: #ffffff;
        }

        .error {
            color: #ff4d4f;
            font-size: 13px;
            margin-top: 6px;
            margin-bottom: 0;
        }

        .success {
            color: rgb(115, 209, 87);
            font-size: 13px;
            margin-top: 6px;
            margin-bottom: 0;
        }

        /* Separador visual interno */
        .form-separator {
            border: 0;
            border-top: 1px solid #232730;
            margin: 10px 0;
        }

        @media (max-width: 800px) {
            .profile-layout {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <!-- MENÚ SUPERIOR -->
    <header class="top-panel">
        <a href="/app" class="logo">Mil y un coches.</a>
        <a href="/app/user/. {{$user->id}}" class="back-link">← Volver al Perfil</a>
    </header>

    <!-- CUERPO DE PERFIL -->
    <main class="profile-layout">

        <!-- COLUMNA IZQUIERDA: TARJETA DEL USUARIO -->
        <section class="profile-card">
            <div class="large-avatar-container">
                @if($user->profile_image)
                <!-- URL dinámica limpia desde S3/Supabase -->
                <img src="{{ $user->profile_image }}"
                    alt="Foto de {{ $user->name }}"
                    class="large-avatar">
                @else
                <div class="large-avatar-default">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </div>
                @endif
            </div>

            <h2 class="user-name">{{ $user->name }}</h2>
            <p class="user-email">{{ $user->email }}</p>

            <div class="profile-meta">
                Miembro desde: <strong>{{ $user->created_at ? $user->created_at->format('d/m/Y') : 'Reciente' }}</strong>
            </div>

            <!-- Boton para cerrar sesion -->
            <div class="logout-container">
                <form action="{{ url('/logout') }}" method="POST" style="width: 100%; margin: 0;">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                        </svg>
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </section>

        <!-- COLUMNA DERECHA: CONFIGURACIÓN DE DATOS -->
        <section class="profile-settings">
            <div>
                <h2 class="section-title" style="margin-bottom: 30px;">Ajustes de cuenta</h2>

                <!-- FORMULARIO 1: DATOS -->

                <form action="{{ url('/app/user/update-name') }}" method="POST">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Nombre Completo</label>

                            <div style="display:flex; gap:10px; align-items:center;">
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="profile-input"
                                    value="{{ old('name', $user->name) }}"
                                    required>

                                <button type="submit" class="btn-save">
                                    Guardar
                                </button>
                            </div>

                            @error('name')
                            <span class="error">{{ $message }}</span>
                            @enderror

                            @if(session('success') && session('success') !== 'Foto actualizada correctamente.')
                            <div class="success">
                                {{ session('success') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email">Dirección de Email</label>
                            <input type="email" name="email" id="email" class="profile-input" value="{{ old('email', $user->email) }}" required>
                        </div>
                    </div>
                </form>

                <!-- FORMULARIO 2: CONTRASEÑA -->
                <form action="{{ url('/app/changePassword') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="password">Nueva Contraseña</label>
                            <input type="password" name="password" id="password" class="profile-input" placeholder="••••••••">

                            @error('password')
                            <p class="error">{{ $message }}</p>
                            @enderror

                            @error('password_repeated')
                            <p class="error">{{ $message }}</p>
                            @enderror

                            @error('password_empty')
                            <p class="error">{{ $message }}</p>
                            @enderror

                            @if(session('success') && session('success') !== 'Foto actualizada correctamente.' && session('success') !== 'Nombre actualizado correctamente.')
                            <p class="success">{{ session('success') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="profile-input" placeholder="••••••••">
                        </div>
                    </div>

                    <div class="btn-container">
                        <button type="submit" class="btn-save">
                            Guardar cambios
                        </button>
                    </div>
                </form>
            </div>

            <hr class="form-separator">

            <!-- FORMULARIO 2: CAMBIAR FOTO DE PERFIL -->
            <div>
                <h2 class="section-title" style="margin-bottom: 25px;">Imagen de perfil</h2>

                <form action="{{ url('/app/user/profile-image') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="avatar">Selecciona una nueva imagen</label>
                        <input type="file" name="avatar" id="avatar" class="profile-file-input" accept="image/*" required>

                        @error('avatar')
                        <p class="error">{{ $message }}</p>
                        @enderror
                        @if(session('success') && request()->is('*/profile-image*') || session('success') == 'Foto actualizada correctamente.')
                        <p class="success">{{ session('success') }}</p>
                        @endif
                    </div>

                    <div class="btn-container">
                        <button type="submit" class="btn-save btn-secondary">
                            Actualizar foto
                        </button>
                    </div>
                </form>
            </div>
        </section>

    </main>

</body>

</html>