<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milyuncoches - Chats</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* Estilos Base - Modo Oscuro */
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            height: 100vh;
            color: #ffffff;
            background-image:
                linear-gradient(to bottom, rgba(13, 14, 18, 0.85) 0%, rgba(13, 14, 18, 0.95) 100%),
                url('https://poronftkafxcbnvvsxco.supabase.co/storage/v1/object/public/anuncios/fondo-main-view.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            overflow: hidden;
            /* Mantiene la pantalla fija para evitar scroll doble en el chat */
        }

        /* 1. Panel Superior (Navegación / Header) */
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
            flex-shrink: 0;
            z-index: 100;
        }

        .logo {
            font-size: 20px;
            font-weight: 800;
            letter-spacing: -0.5px;
            color: #ffffff;
            text-decoration: none;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .btn-chat {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 33px;
            background-color: #232730;
            color: #ffffff;
            border: 1px solid #2e333f;
            border-radius: 12px;
            text-decoration: none;
        }

        .btn-vender {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background-color: #ffffff;
            color: #16181d;
            text-decoration: none;
            padding: 8px 18px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            transition: transform 0.2s ease, background-color 0.2s ease;
        }

        .btn-vender:hover {
            background-color: #f3f4f6;
            transform: translateY(-1px);
        }

        .icon-vender,
        .icon-chat {
            width: 18px;
            height: 18px;
        }

        .user-welcome {
            font-size: 15px;
            font-weight: 500;
            color: #9ca3af;
        }

        .user-welcome span {
            color: #ffffff;
            font-weight: 700;
        }

        .user-avatar-container {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #23262d;
            background-color: #1a1d24;
        }

        .user-avatar {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-avatar-default {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #232730;
        }

        .user-avatar-default svg {
            width: 20px;
            height: 20px;
            color: #9ca3af;
        }

        /* 2. Contenedor Principal del Chat */
        .chat-layout {
            display: flex;
            flex: 1;
            padding: 25px 30px;
            gap: 20px;
            max-width: 1600px;
            margin: 0 auto;
            width: 100%;
            box-sizing: border-box;
            height: calc(100vh - 70px);
        }

        /* Lateral Izquierdo: Lista de Chats */
        .chats-sidebar {
            width: 360px;
            background-color: #16181d;
            border-radius: 20px;
            border: 1px solid #23262d;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .chats-header {
            padding: 20px;
            border-bottom: 1px solid #23262d;
        }

        .chats-header h2 {
            font-size: 20px;
            font-weight: 700;
            margin: 0 0 6px 0;
            letter-spacing: -0.5px;
        }

        .chats-header p {
            color: #9ca3af;
            font-size: 13px;
            margin: 0;
        }

        .chats-list {
            flex: 1;
            overflow-y: auto;
            padding: 12px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        /* Tarjeta / Item de la lista de chats */
        .chat-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 14px;
            background-color: #1a1d24;
            border: 1px solid #23262d;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            transition: all 0.2s ease;
        }

        .chat-item:hover,
        .chat-item.active {
            background-color: #232730;
            border-color: #374151;
            transform: translateX(2px);
        }

        .chat-item-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background-color: #2e333f;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            overflow: hidden;
            /* Garantiza el recorte circular */
        }

        /* Ajuste de avatar dentro de la lista lateral */
        .chat-item-avatar .user-avatar {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .chat-item-avatar svg {
            width: 22px;
            height: 22px;
            color: #9ca3af;
        }

        .chat-item-info {
            flex: 1;
            min-width: 0;
        }

        .chat-item-title {
            font-size: 14px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 3px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .chat-item-preview {
            font-size: 12.5px;
            color: #9ca3af;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Panel Derecho: Área del Chat Activo */
        .chat-main {
            flex: 1;
            background-color: #16181d;
            border-radius: 20px;
            border: 1px solid #23262d;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .chat-main-header {
            padding: 18px 24px;
            border-bottom: 1px solid #23262d;
            background-color: #1a1d24;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .chat-main-header h3 {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
        }

        .chat-main-header p {
            margin: 2px 0 0 0;
            font-size: 12px;
            color: #9ca3af;
        }

        /* Zona de mensajes */
        .chat-messages {
            flex: 1;
            padding: 24px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        /* Estilo mejorado y centrado para la fecha del chat */
        .fecha-creacion {
            align-self: center;
            background-color: #232730;
            color: #9ca3af;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.5px;
            padding: 4px 14px;
            border-radius: 20px;
            border: 1px solid #2e333f;
            margin: 8px 0 16px 0;
            text-transform: uppercase;
        }

        /* Modificación de la burbuja para posicionar elementos y dar espacio a la hora */
        .message-bubble {
            max-width: 65%;
            padding: 10px 14px 8px 14px;
            border-radius: 16px;
            font-size: 14px;
            line-height: 1.4;
            position: relative;
            display: flex;
            flex-direction: column;
            word-break: break-word;
        }

        /* Alineación e integración del texto */
        .message-text {
            margin-bottom: 2px;
        }

        /* Estilos de la hora */
        .message-time {
            font-size: 10px;
            align-self: flex-end;
            margin-top: 2px;
            margin-bottom: -2px;
            user-select: none;
            line-height: 1;
        }

        /* Colores de la hora según el tipo de mensaje */
        .message-received .message-time {
            color: #9ca3af;
            /* Gris claro para fondo oscuro */
        }

        .message-sent .message-time {
            color: #6b7280;
            /* Gris medio para fondo blanco */
        }

        .message-received {
            align-self: flex-start;
            background-color: #232730;
            color: #ffffff;
            border-bottom-left-radius: 4px;
            border: 1px solid #2e333f;
        }

        .message-sent {
            align-self: flex-end;
            background-color: #ffffff;
            color: #16181d;
            font-weight: 500;
            border-bottom-right-radius: 4px;
        }

        /* Formulario para escribir mensaje */
        .chat-input-area {
            padding: 18px 24px;
            border-top: 1px solid #23262d;
            background-color: #1a1d24;
        }

        .chat-form {
            display: flex;
            gap: 12px;
        }

        .chat-input {
            flex: 1;
            background-color: #16181d;
            border: 1px solid #282c35;
            border-radius: 12px;
            padding: 12px 16px;
            color: #ffffff;
            font-family: inherit;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s ease;
        }

        .chat-input:focus {
            border-color: #4b5563;
        }

        .btn-send {
            background-color: #ffffff;
            color: #16181d;
            border: none;
            border-radius: 12px;
            padding: 0 20px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        .btn-send:hover {
            background-color: #f3f4f6;
            transform: translateY(-1px);
        }

        /* Responsive */
        @media (max-width: 900px) {
            .chat-layout {
                flex-direction: column;
                height: auto;
                overflow: visible;
            }

            .chats-sidebar {
                width: 100%;
                height: 300px;
            }

            body {
                overflow: auto;
                height: auto;
            }
        }
    </style>
</head>

<body>

    <!-- 1. PANEL SUPERIOR -->
    <header class="top-panel">
        <a href="/app" class="logo">Mil y un coches.</a>

        <div class="user-menu">
            @if($user)
            <!-- Botón Chat activo -->
            <a href="{{ url('/app/chat') }}" class="btn-chat" title="Mensajes">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="icon-chat">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a.75.75 0 0 1-1.006-.994c.3-.615.65-1.282.883-1.892A8.21 8.21 0 0 1 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                </svg>
            </a>

            <!-- Botón Vender -->
            <a href="{{ url('/app/vender') }}" class="btn-vender">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="icon-vender">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Vender
            </a>

            <div class="user-welcome">
                Bienvenido, <span>{{ $user->name }}</span>
            </div>

            <a href="{{ url('/app/user/' . $user->id) }}">
                <div class="user-avatar-container">
                    @if($user->profile_image)
                    <img src="{{ $user->profile_image }}" alt="Foto de {{ $user->name }}" class="user-avatar">
                    @else
                    <div class="user-avatar-default">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                    @endif
                </div>
            </a>
            @endif
        </div>
    </header>

    <!-- 2. ESTRUCTURA DEL CHAT -->
    <main class="chat-layout">

        <!-- PANEL IZQUIERDO: LISTA DE CONVERSACIONES -->
        <aside class="chats-sidebar">
            <div class="chats-header">
                <h2>Tus Mensajes</h2>
                <p>Aquí aparecerán todas tus conversaciones.</p>
            </div>

            <div class="chats-list">

                @forelse($chats as $chat)

                @php
                $otroUsuario = $chat->user1_id == $user->id
                ? $chat->user2
                : $chat->user1;

                $anuncio = $chat->anuncio;
                @endphp

                <a href="{{ url('/app/chat/' . $chat->id) }}"
                    class="chat-item {{ $chatSeleccionado && $chatSeleccionado->id == $chat->id ? 'active' : '' }}">

                    <div class="chat-item-avatar">

                        @if($anuncio->foto_principal)
                        <img src="{{ $anuncio->foto_principal }}"
                            alt="{{ $anuncio->marca }} {{ $anuncio->modelo }}"
                            class="user-avatar">
                        @else
                        <div class="user-avatar-default">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 18.75h10.5M7.5 6.75h9m-10.5 6h12" />
                            </svg>
                        </div>
                        @endif

                    </div>

                    <div class="chat-item-info">

                        <div class="chat-item-title">
                            {{ $anuncio->marca }} {{ $anuncio->modelo }}
                        </div>

                        <div class="chat-item-user" style=" font-size:12px;color:#9ca3af;margin-bottom:4px;">
                            {{ $otroUsuario->name }}
                        </div>

                        <div class="chat-item-preview">

                            @if($chat->mensajes->isNotEmpty())

                            @if($chat->mensajes->last()->user_id == $user->id)
                            <strong>Tú:</strong>
                            @endif

                            {{ Str::limit($chat->mensajes->last()->mensaje, 35) }}

                            @else

                            Aún no hay mensajes.

                            @endif

                        </div>

                    </div>

                </a>

                @empty

                <div class="chat-item-empty">
                    Todavía no tienes conversaciones.
                </div>

                @endforelse

            </div>
        </aside>

        <!-- PANEL DERECHO: ÁREA DE CONVERSACIÓN -->
        <section class="chat-main">

            <!-- Encabezado del chat activo -->
            <div class="chat-main-header">

                @if($chatSeleccionado)

                @php
                $otroUsuario = $chatSeleccionado->user1_id == $user->id
                ? $chatSeleccionado->user2
                : $chatSeleccionado->user1;
                @endphp

                <div class="user-avatar-container">
                    @if($otroUsuario->profile_image)
                    <img src="{{ $otroUsuario->profile_image }}" alt="{{ $otroUsuario->name }}" class="user-avatar">
                    @else
                    <div class="user-avatar-default">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                    @endif
                </div>

                <div>
                    <h3>{{ $otroUsuario->name }}</h3>
                    <p>Conversación con {{ $otroUsuario->name }}</p>
                </div>

                @else

                <div class="user-avatar-container">
                    <div class="user-avatar-default">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                </div>

                <div>
                    <h3>Ningún chat seleccionado</h3>
                    <p>Selecciona una conversación para empezar a chatear.</p>
                </div>

                @endif

            </div>

            <!-- Burbujas de mensajes -->
            <div class="chat-messages">

                @if($chatSeleccionado)

                @php
                $ultimoMensaje = null;
                @endphp



                @forelse($chatSeleccionado->mensajes as $mensaje)

                @if($ultimoMensaje === null || $ultimoMensaje->created_at->diffInHours($mensaje->created_at) >= 1)
                <h3 class="fecha-creacion">
                    {{ $mensaje->created_at->format('d/m/Y H:i') }}
                </h3>
                @endif

                <div class="message-bubble {{ $mensaje->user_id == $user->id ? 'message-sent' : 'message-received' }}">
                    <span class="message-text">{{ $mensaje->mensaje }}</span>
                    <span class="message-time">{{ $mensaje->created_at->format('H:i') }}</span>
                </div>

                @php
                $ultimoMensaje = $mensaje;
                @endphp

                @empty

                <p>Aún no hay mensajes en esta conversación.</p>

                @endforelse

                @else

                <h1>Todavía no has iniciado una conversación con alguien</h1>

                @endif

            </div>

            <!-- Entrada de texto -->

            @if($chatSeleccionado)

            <div class="chat-input-area">
                <form class="chat-form" action="/app/chat/{{ $chatSeleccionado->id }}/send" method="POST">

                    @csrf

                    <input
                        type="text"
                        name="mensaje"
                        class="chat-input"
                        placeholder="Aquí escribirás tu mensaje para enviar..."
                        autocomplete="off"
                        required>

                    <button type="submit" class="btn-send">
                        Enviar
                    </button>

                </form>
            </div>
            @endif

        </section>

    </main>

</body>

</html>