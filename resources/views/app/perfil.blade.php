<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milyuncoches - Perfil de {{ $user->name }}</title>
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
            min-height: 100vh;
            color: #ffffff;
            background-image:
                linear-gradient(to bottom, rgba(13, 14, 18, 0.75) 0%, rgba(13, 14, 18, 0.9) 100%),
                url('https://poronftkafxcbnvvsxco.supabase.co/storage/v1/object/public/fotos_pagina_disenio/fondo-main-view.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
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
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 20px;
            font-weight: 800;
            letter-spacing: -0.5px;
            color: #ffffff;
            text-decoration: none;
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
            background-color: #1a1d24;
            color: #9ca3af;
            border: 1px solid #23262d;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.2s ease;
            position: relative;
        }

        .btn-chat:hover {
            background-color: #232730;
            color: #ffffff;
            border-color: #2e333f;
            transform: translateY(-1px);
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
            transition: transform 0.2s ease, background-color 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.1);
        }

        .btn-vender:hover {
            background-color: #f3f4f6;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(255, 255, 255, 0.15);
        }

        .icon-vender,
        .icon-chat {
            width: 18px;
            height: 18px;
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

        /* Estructura Layout */
        .main-layout {
            display: flex;
            flex: 1;
            padding: 30px;
            gap: 24px;
            max-width: 1600px;
            margin: 0 auto;
            width: 100%;
            box-sizing: border-box;
        }

        /* 2. Panel Izquierdo (Tarjeta de Perfil) */
        .left-panel {
            width: 320px;
            background-color: #16181d;
            border-radius: 20px;
            padding: 30px 25px;
            box-sizing: border-box;
            border: 1px solid #23262d;
            align-self: flex-start;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .left-panel:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .profile-avatar-wrapper {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid #2e333f;
            background-color: #1a1d24;
            margin-bottom: 18px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }

        .profile-avatar-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-name {
            font-size: 22px;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 4px 0;
            letter-spacing: -0.5px;
        }

        .profile-email {
            font-size: 13px;
            color: #9ca3af;
            margin: 0 0 20px 0;
            word-break: break-all;
        }

        .profile-stats {
            width: 100%;
            background-color: #1a1d24;
            border: 1px solid #23262d;
            border-radius: 14px;
            padding: 16px;
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .stat-value {
            font-size: 18px;
            font-weight: 800;
            color: #ffffff;
        }

        .stat-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6b7280;
            font-weight: 600;
            margin-top: 2px;
        }

        .stat-divider {
            width: 1px;
            background-color: #2e333f;
        }

        .profile-actions {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn-action-secondary {
            width: 100%;
            background-color: #232730;
            color: #ffffff;
            border: 1px solid #2e333f;
            padding: 12px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s ease;
            box-sizing: border-box;
        }

        .btn-action-secondary:hover {
            background-color: #2e333f;
            border-color: #4b5563;
        }

        /* 3. Panel Central (Anuncios Publicados) */
        .center-panel {
            flex: 1;
            background-color: #16181d;
            border-radius: 20px;
            padding: 25px;
            box-sizing: border-box;
            border: 1px solid #23262d;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .center-panel:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #23262d;
        }

        .section-header h2 {
            font-size: 20px;
            font-weight: 800;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .ads-count-badge {
            background-color: #232730;
            color: #9ca3af;
            font-size: 12px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
            border: 1px solid #2e333f;
        }

        /* Tarjetas de Anuncio */
        .menu-anuncios {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            width: 100%;
        }

        .anuncio-link {
            text-decoration: none;
            color: inherit;
            display: block;
            height: 100%;
        }

        .anuncio-card {
            background-color: #1a1d24;
            border: 1px solid #282c35;
            border-radius: 16px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.3s ease;
        }

        .anuncio-card:hover {
            transform: translateY(-5px);
            border-color: #4b5563;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
        }

        /* Contenedor e Imagen Principal del Anuncio */
        .anuncio-image-wrapper {
            width: 100%;
            height: 180px;
            overflow: hidden;
            background-color: #121418;
            position: relative;
        }

        .anuncio-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .anuncio-card:hover .anuncio-img {
            transform: scale(1.05);
        }

        .anuncio-image-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #4b5563;
            gap: 6px;
            background-color: #14161b;
        }

        .anuncio-image-placeholder svg {
            width: 32px;
            height: 32px;
        }

        .anuncio-image-placeholder span {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .anuncio-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .anuncio-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 12px;
            gap: 10px;
        }

        .anuncio-header h2 {
            font-size: 17px;
            font-weight: 700;
            color: #ffffff;
            margin: 0;
            line-height: 1.2;
            letter-spacing: -0.3px;
        }

        .anuncio-header h2 span {
            font-weight: 400;
            color: #9ca3af;
        }

        .anuncio-precio {
            font-size: 16px;
            font-weight: 800;
            color: #ffffff;
            white-space: nowrap;
        }

        .anuncio-specs {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-bottom: 14px;
        }

        .spec-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background-color: #232730;
            color: #9ca3af;
            font-size: 11.5px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
            border: 1px solid #2e333f;
        }

        .anuncio-descripcion {
            font-size: 13px;
            color: #9ca3af;
            line-height: 1.5;
            margin: 0 0 16px 0;
        }

        .anuncio-footer {
            border-top: 1px solid #232730;
            padding-top: 12px;
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .anuncio-autor {
            font-size: 12px;
            color: #6b7280;
        }

        .anuncio-autor strong {
            color: #9ca3af;
        }

        /* Alineación en el pie del anuncio */
        .anuncio-footer-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Formulario para eliminar */
        .delete-form {
            margin: 0;
            padding: 0;
            display: flex;
        }

        /* Botón de eliminar integrado */
        .btn-delete-anuncio {
            background-color: transparent;
            border: 1px solid #2e333f;
            color: #9ca3af;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-delete-anuncio svg {
            width: 16px;
            height: 16px;
        }

        .btn-delete-anuncio:hover {
            background-color: rgba(239, 68, 68, 0.15);
            border-color: #ef4444;
            color: #ef4444;
            transform: scale(1.05);
        }

        .anuncio-autor-avatar {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #232730;
            border: 1px solid #2e333f;
            flex-shrink: 0;
        }

        .autor-avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .anuncio-autor-avatar svg {
            width: 14px;
            height: 14px;
            color: #6b7280;
        }

        .no-anuncios {
            text-align: center;
            padding: 60px 20px;
        }

        .no-anuncios h2 {
            font-size: 18px;
            color: #ffffff;
            margin-bottom: 8px;
        }

        .no-anuncios p {
            color: #6b7280;
            margin: 0;
            font-size: 14px;
        }

        /* ESTILOS DEL MODAL DE CONFIRMACIÓN PERSONALIZADO */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.75);
            backdrop-filter: blur(4px);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.2s ease, visibility 0.2s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-container {
            background-color: #16181d;
            border: 1px solid #23262d;
            border-radius: 20px;
            padding: 28px;
            width: 90%;
            max-width: 420px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
            transform: scale(0.9);
            transition: transform 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .modal-overlay.active .modal-container {
            transform: scale(1);
        }

        .modal-icon {
            width: 52px;
            height: 52px;
            background-color: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px auto;
        }

        .modal-icon svg {
            width: 26px;
            height: 26px;
        }

        .modal-title {
            font-size: 19px;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 8px 0;
        }

        .modal-description {
            font-size: 14px;
            color: #9ca3af;
            margin: 0 0 24px 0;
            line-height: 1.5;
        }

        .modal-actions {
            display: flex;
            gap: 12px;
        }

        .btn-modal {
            flex: 1;
            padding: 12px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            border: none;
            transition: all 0.2s ease;
        }

        .btn-modal-cancel {
            background-color: #232730;
            color: #ffffff;
            border: 1px solid #2e333f;
        }

        .btn-modal-cancel:hover {
            background-color: #2e333f;
        }

        .btn-modal-confirm {
            background-color: #ef4444;
            color: #ffffff;
        }

        .btn-modal-confirm:hover {
            background-color: #dc2626;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        @media (max-width: 900px) {
            .main-layout {
                flex-direction: column;
            }

            .left-panel {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- 1. PANEL SUPERIOR -->
    <header class="top-panel">
        <a href="/app" class="logo">Mil y un coches.</a>

        <div class="user-menu">
            @if(Auth::check())
            <a href="{{ url('/app/chat') }}" class="btn-chat" title="Mensajes y Chats">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="icon-chat">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a.75.75 0 0 1-1.006-.994c.3-.615.65-1.282.883-1.892A8.21 8.21 0 0 1 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                </svg>
            </a>

            <a href="{{ url('/app/vender') }}" class="btn-vender">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="icon-vender">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Vender
            </a>

            <div class="user-welcome">
                Bienvenido, <span>{{ Auth::user()->name }}</span>
            </div>

            <a href="{{ url('/app/user/' . Auth::user()->id) }}">
                <div class="user-avatar-container">
                    @if(Auth::user()->profile_image)
                    <img src="{{ Auth::user()->profile_image }}" alt="Foto de {{ Auth::user()->name }}" class="user-avatar">
                    @else
                    <div class="user-avatar-default">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                    @endif
                </div>
            </a>
            @else
            <a href="{{ url('/login') }}" class="btn-vender">Vender</a>
            <div class="user-welcome">Bienvenido, <span>Invitado</span></div>
            @endif
        </div>
    </header>

    <!-- ESTRUCTURA PRINCIPAL -->
    <main class="main-layout">

        <!-- 2. PANEL IZQUIERDO: DETALLES DEL USUARIO -->
        <aside class="left-panel">
            <div class="profile-avatar-wrapper">
                @if($user->profile_image)
                <img src="{{ $user->profile_image }}" alt="Foto de {{ $user->name }}">
                @else
                <div class="user-avatar-default" style="width: 100%; height: 100%;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 48px; height: 48px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </div>
                @endif
            </div>

            <h1 class="profile-name">{{ $user->name }}</h1>
            <p class="profile-email">{{ $user->email }}</p>

            <div class="profile-stats">
                <div class="stat-item">
                    <span class="stat-value">{{ $anuncios->count() }}</span>
                    <span class="stat-label">Anuncios</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <span class="stat-value">{{ $user->created_at ? $user->created_at->format('Y') : '2024' }}</span>
                    <span class="stat-label">Miembro</span>
                </div>
            </div>

            <div class="profile-actions">
                @if(Auth::id() === $user->id)
                <a href="{{ url('/app/user/' . $user->id . '/config') }}" class="btn-action-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 16px; height: 16px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    ConfigPerfil
                </a>
                @else
                <a href="{{ url('/app/chat/' . $user->id) }}" class="btn-action-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 16px; height: 16px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a.75.75 0 0 1-1.006-.994c.3-.615.65-1.282.883-1.892A8.21 8.21 0 0 1 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                    </svg>
                    Contactar
                </a>
                @endif
            </div>
        </aside>

        <!-- 3. PANEL CENTRAL: ANUNCIOS DEL USUARIO -->
        <section class="center-panel">
            <div class="section-header">
                <h2>Vehículos Publicados</h2>
                <span class="ads-count-badge">{{ $anuncios->count() }} {{ $anuncios->count() === 1 ? 'anuncio' : 'anuncios' }}</span>
            </div>

            @if($anuncios->isNotEmpty())
            <div class="menu-anuncios">
                @foreach ($anuncios as $anuncio)
                <div class="anuncio-card-container">
                    <a href="{{ url('/app/anuncio/' . $anuncio->id) }}" class="anuncio-link">
                        <div class="anuncio-card">
                            
                            <!-- Foto principal del anuncio -->
                            <div class="anuncio-image-wrapper">
                                @if($anuncio->foto_principal)
                                    <img src="{{ $anuncio->foto_principal }}" alt="{{ $anuncio->marca }} {{ $anuncio->modelo }}" class="anuncio-img">
                                @else
                                    <div class="anuncio-image-placeholder">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span>Sin Imagen</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Contenido de la tarjeta -->
                            <div class="anuncio-content">
                                <div class="anuncio-header">
                                    <h2>{{ $anuncio->marca }} <span>{{ $anuncio->modelo }}</span></h2>
                                    <div class="anuncio-precio">
                                        {{ number_format($anuncio->precio, 0, ',', '.') }} €
                                    </div>
                                </div>

                                <!-- Especificaciones técnicas -->
                                <div class="anuncio-specs">
                                    @if($anuncio->combustible)
                                    <span class="spec-badge">{{ $anuncio->combustible }}</span>
                                    @endif
                                    @if($anuncio->transmision)
                                    <span class="spec-badge">{{ $anuncio->transmision }}</span>
                                    @endif
                                    @if($anuncio->anio)
                                    <span class="spec-badge">{{ $anuncio->anio }}</span>
                                    @endif
                                </div>

                                @if($anuncio->descripcion)
                                <p class="anuncio-descripcion">
                                    {{ Str::limit($anuncio->descripcion, 90, '...') }}
                                </p>
                                @endif

                                <div class="anuncio-footer">
                                    <span class="anuncio-autor">
                                        Publicado por <strong>{{ $user->name }}</strong>
                                    </span>

                                    <div class="anuncio-footer-right">
                                        <!-- Botón de Eliminar (Llama al modal personalizado) -->
                                        @if(Auth::id() === $user->id)
                                        <form id="delete-form-{{ $anuncio->id }}" action="{{ url('/app/eliminarAnuncio/' . $anuncio->id) }}" method="POST" class="delete-form">
                                            @csrf
                                            <button type="button"
                                                class="btn-delete-anuncio"
                                                title="Eliminar anuncio"
                                                onclick="event.stopPropagation(); event.preventDefault(); openDeleteModal({{ $anuncio->id }}, '{{ addslashes($anuncio->marca) }} {{ addslashes($anuncio->modelo) }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                        @endif

                                        <div class="anuncio-autor-avatar">
                                            @if($user->profile_image)
                                            <img src="{{ $user->profile_image }}" alt="Foto de {{ $user->name }}" class="autor-avatar-img">
                                            @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                            </svg>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            @else
            <div class="no-anuncios">
                <h2>Este usuario aún no tiene anuncios publicados.</h2>
                <p>Cuando publique un vehículo en venta, aparecerá aquí.</p>
            </div>
            @endif
        </section>

    </main>

    <!-- MODAL DE CONFIRMACIÓN PERSONALIZADO -->
    <div id="deleteModal" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
            </div>
            <h3 class="modal-title">¿Eliminar anuncio?</h3>
            <p class="modal-description">
                ¿Estás seguro de que deseas eliminar el anuncio <strong id="modalCarTitle" style="color: #ffffff;"></strong>? Esta acción no se puede deshacer.
            </p>
            <div class="modal-actions">
                <button type="button" class="btn-modal btn-modal-cancel" onclick="closeDeleteModal()">Cancelar</button>
                <button type="button" class="btn-modal btn-modal-confirm" onclick="confirmDelete()">Eliminar</button>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT PARA CONTROLAR EL MODAL -->
    <script>
        let formToSubmit = null;

        function openDeleteModal(anuncioId, carTitle) {
            formToSubmit = document.getElementById('delete-form-' + anuncioId);
            document.getElementById('modalCarTitle').innerText = carTitle;
            document.getElementById('deleteModal').classList.add('active');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('active');
            formToSubmit = null;
        }

        function confirmDelete() {
            if (formToSubmit) {
                formToSubmit.submit();
            }
        }

        // Cerrar modal al hacer clic fuera de él
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });
    </script>

</body>

</html>