<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milyuncoches.com</title>
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

            /* CAPA DE CONTRASTE OSCURA + LA IMAGEN (Ruta corregida para Laravel) */
            background-image:
                linear-gradient(to bottom, rgba(13, 14, 18, 0.75) 0%, rgba(13, 14, 18, 0.9) 100%),
                url('https://poronftkafxcbnvvsxco.supabase.co/storage/v1/object/public/fotos_pagina_disenio/fondo-main-view.png');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* Hace un efecto parallax espectacular al hacer scroll */
        }


        /* 1. Panel Superior (Navegación / Header) */
        .top-panel {
            width: 100%;
            height: 70px;
            background-color: #16181d;
            /* Gris oscuro a juego con el login */
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
            /* Gris secundario suave */
        }

        .user-welcome span {
            color: #ffffff;
            font-weight: 700;
        }

        /* Contenedor que agrupa el texto y la foto a la derecha */
        .user-menu {
            display: flex;
            align-items: center;
            gap: 14px;
            /* Espacio entre el texto de bienvenida y la foto */
        }

        /* Botón de Chat en el Panel Superior */
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

        .btn-chat:active {
            transform: translateY(1px);
        }

        .icon-chat {
            width: 20px;
            height: 20px;
        }

        /* Indicador o badge de mensajes no leídos (opcional) */
        .chat-badge {
            position: absolute;
            top: -3px;
            right: -3px;
            width: 10px;
            height: 10px;
            background-color: #ef4444;
            /* Rojo para alertas */
            border: 2px solid #16181d;
            border-radius: 50%;
        }



        /* Estilos del Botón Vender */
        .btn-vender {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background-color: #ffffff;
            /* Blanco limpio para destacar sobre el fondo oscuro */
            color: #16181d;
            /* Texto oscuro a juego con tu fondo secundario */
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
            /* Cambio sutil al pasar el cursor */
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(255, 255, 255, 0.15);
        }

        .btn-vender:active {
            transform: translateY(1px);
        }

        .icon-vender {
            width: 16px;
            height: 16px;
        }

        /* Ajuste al texto de bienvenida */
        .user-welcome {
            font-size: 15px;
            font-weight: 500;
            color: #9ca3af;
        }

        .user-welcome span {
            color: #ffffff;
            font-weight: 700;
        }

        /* Contenedor de la imagen (mantiene las dimensiones rígidas) */
        .user-avatar-container {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            /* Hace que todo sea perfectamente redondo */
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #23262d;
            /* Borde sutil a juego con el diseño oscuro */
            background-color: #1a1d24;
        }

        /* Imagen de usuario real */
        .user-avatar {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Evita que la foto se estire o deforme */
        }

        /* Foto por defecto (Avatar SVG) */
        .user-avatar-default {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #232730;
            /* Fondo gris para el icono por defecto */
        }

        .user-avatar-default svg {
            width: 20px;
            height: 20px;
            color: #9ca3af;
            /* Color del icono */
        }

        /* Contenedor de la estructura de abajo */
        .main-layout {
            display: flex;
            flex: 1;
            padding: 30px;
            gap: 24px;
            /* Espacio premium entre los paneles */
            max-width: 1600px;
            margin: 0 auto;
            width: 100%;
            box-sizing: border-box;
        }

        /* 2. Panel Izquierdo (Filtros de coches) */
        .left-panel {
            width: 300px;
            /* Ancho fijo ideal para barras de filtros */
            background-color: #16181d;
            border-radius: 20px;
            padding: 25px;
            box-sizing: border-box;
            border: 1px solid #23262d;
            align-self: flex-start;
            /* Evita que se estire innecesariamente hacia abajo */

            /* Animación suave al pasar el cursor (como el login) */
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .left-panel:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        /* --- ESTILOS DEL DESPLEGABLE --- */
        .filter-dropdown {
            border: 1px solid #23262d;
            border-radius: 12px;
            background-color: #1a1d24;
            margin-bottom: 15px;
            overflow: hidden;
        }

        /* Botón que activa el desplegable */
        .dropdown-trigger {
            width: 100%;
            background: none;
            border: none;
            padding: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #ffffff;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            text-align: left;
            user-select: none;
        }

        .dropdown-trigger:hover {
            background-color: #232730;
        }

        /* Icono de flecha */
        .dropdown-arrow {
            width: 16px;
            height: 16px;
            color: #9ca3af;
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Rotación de la flecha cuando está abierto */
        .filter-dropdown.active .dropdown-arrow {
            transform: rotate(180deg);
        }

        /* Contenido del desplegable (animado) */
        .dropdown-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            background-color: #16181d;
        }

        .filter-dropdown.active .dropdown-content {
            max-height: 200px;
            /* Altura máxima permitida antes de hacer scroll */
            border-top: 1px solid #23262d;
        }

        .checkbox-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
            padding: 16px;
        }

        /* Checkbox personalizado */
        .checkbox-container {
            display: flex;
            align-items: center;
            position: relative;
            padding-left: 30px;
            cursor: pointer;
            font-size: 14px;
            color: #9ca3af;
            user-select: none;
            transition: color 0.2s ease;
        }

        .checkbox-container:hover {
            color: #ffffff;
        }

        .checkbox-container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .checkmark {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            height: 18px;
            width: 18px;
            background-color: #1a1d24;
            border: 1px solid #2e333f;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .checkbox-container:hover input~.checkmark {
            border-color: #4b5563;
        }

        .checkbox-container input:checked~.checkmark {
            background-color: #ffffff;
            border-color: #ffffff;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .checkbox-container input:checked~.checkmark:after {
            display: block;
        }

        .checkbox-container .checkmark:after {
            left: 5px;
            top: 2px;
            width: 5px;
            height: 10px;
            border: solid #16181d;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        /* Botón de limpiar filtros */
        .btn-clear-filters {
            display: none;
            text-align: center;
            background-color: #232730;
            color: #ffffff;
            border: 1px solid #2e333f;
            padding: 10px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            margin-top: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
            width: 100%;
            box-sizing: border-box;
        }

        .btn-clear-filters:hover {
            background-color: #ef4444;
            border-color: #ef4444;
        }

        /* 3 ESTILOS DEL PANEL Y TARJETAS DE ANUNCIOS */
        .center-panel {
            width: 100%;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 24px;
        }

        .panel-header h2 {
            font-size: 24px;
            font-weight: 800;
            color: #ffffff;
        }

        .anuncios-count {
            font-size: 13px;
            color: #8e8e93;
            font-weight: 500;
        }

        .menu-anuncios {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .anuncio-card-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .anuncio-card {
            background-color: #16181d;
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 18px;
            overflow: hidden;
            display: grid;
            grid-template-columns: 280px 1fr;
            transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
        }

        .anuncio-card:hover {
            transform: translateY(-3px);
            border-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
        }

        /* FOTO PRINCIPAL Y BADGES */
        .anuncio-media {
            position: relative;
            width: 280px;
            height: 220px;
            min-height: 220px;
            max-height: 220px;
            background-color: #0d0e11;
            overflow: hidden;
            flex-shrink: 0;
        }

        .anuncio-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        }

        .anuncio-img-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #555;
            gap: 8px;
        }

        .anuncio-img-placeholder svg {
            width: 40px;
            height: 40px;
        }

        .anuncio-badge-precio {
            position: absolute;
            bottom: 12px;
            left: 12px;
            background: rgba(11, 12, 16, 0.85);
            backdrop-filter: blur(8px);
            color: #ffffff;
            font-weight: 800;
            font-size: 18px;
            padding: 6px 14px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        /* CONTENIDO */
        .anuncio-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .anuncio-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 12px;
        }

        .anuncio-titulo {
            font-size: 20px;
            font-weight: 800;
            color: #ffffff;
            margin: 0;
        }

        .anuncio-modelo {
            color: #a3a3a3;
            font-weight: 600;
        }

        .anuncio-location {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 13px;
            color: #999;
            white-space: nowrap;
        }

        .anuncio-location svg {
            width: 14px;
            height: 14px;
            color: #a3a3a3;
        }

        /* ESPECIFICACIONES */
        .anuncio-specs-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 14px;
        }

        .spec-item {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background-color: #0b0c10;
            border: 1px solid rgba(255, 255, 255, 0.06);
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            color: #d1d1d1;
        }

        .spec-item svg {
            width: 14px;
            height: 14px;
            color: #a3a3a3;
        }

        .anuncio-descripcion {
            font-size: 13px;
            color: #8e8e93;
            line-height: 1.5;
            margin-bottom: 16px;
        }

        /* FOOTER TARJETA */
        .anuncio-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding-top: 12px;
            margin-top: auto;
        }

        .anuncio-vendedor {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .autor-avatar-wrapper {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            overflow: hidden;
            background-color: #22252d;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .autor-avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .autor-avatar-wrapper svg {
            width: 16px;
            height: 16px;
            color: #8e8e93;
        }

        .vendedor-nombre {
            font-size: 13px;
            color: #aaa;
            font-weight: 500;
        }

        .btn-ver-mas {
            font-size: 13px;
            font-weight: 700;
            color: #ffffff;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: gap 0.2s ease;
        }

        .btn-ver-mas svg {
            width: 14px;
            height: 14px;
        }

        .anuncio-card:hover .btn-ver-mas {
            gap: 10px;
        }

        /* NO ANUNCIOS STATE */
        .no-anuncios {
            text-align: center;
            padding: 60px 20px;
            background-color: #16181d;
            border-radius: 20px;
            border: 1px dashed rgba(255, 255, 255, 0.1);
        }

        .no-anuncios-icon {
            width: 48px;
            height: 48px;
            color: #555;
            margin-bottom: 12px;
        }

        .no-anuncios h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .no-anuncios p {
            color: #777;
            font-size: 14px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .anuncio-card {
                grid-template-columns: 1fr;
            }

            .anuncio-media {
                height: 200px;
            }
        }



        /* Estilos de contenido temporal */
        h2 {
            font-size: 22px;
            font-weight: 700;
            margin-top: 0;
            margin-bottom: 15px;
            letter-spacing: -0.5px;
        }

        p {
            color: #9ca3af;
            font-size: 14px;
            line-height: 1.6;
        }

        /* Responsivo básico */
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

            @if($user)
            <!-- Botón de Chat (Solo para usuarios autenticados) -->
            <a href="{{ url('/app/chat') }}" class="btn-chat" title="Mensajes y Chats">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="icon-chat">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a.75.75 0 0 1-1.006-.994c.3-.615.65-1.282.883-1.892A8.21 8.21 0 0 1 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                </svg>
                <!-- Punto indicador (opcional si hay mensajes nuevos) -->
                <!-- <span class="chat-badge"></span> -->
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
                    <img src="{{ $user->profile_image }}"
                        alt="Foto de {{ $user->name }}"
                        class="user-avatar">
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

            <a href="{{ url('/login') }}" class="btn-vender">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="icon-vender">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Vender
            </a>

            <div class="user-welcome">
                Bienvenido, <span>Invitado</span>
            </div>

            <a href="{{ url('/login') }}">
                <div class="user-avatar-container">
                    <div class="user-avatar-default">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                </div>
            </a>

            @endif

        </div>

    </header>

    <!-- ESTRUCTURA INFERIOR -->
    <main class="main-layout">

        <!-- 2. PANEL IZQUIERDO (FILTROS) -->
        <aside class="left-panel">

            <h2>Filtros</h2>

            <form id="filterForm" action="{{ url('/app') }}" method="GET">

                <!-- Acordeón / Desplegable de Marcas -->
                <div class="filter-dropdown">

                    <button type="button" class="dropdown-trigger" onclick="toggleDropdown(this)">
                        <span>Marcas</span>

                        <svg class="dropdown-arrow"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m19.5 8.25-7.5 7.5-7.5-7.5" />

                        </svg>
                    </button>

                    <div class="dropdown-content">

                        <div class="checkbox-list">

                            <!-- Todas -->
                            <label class="checkbox-container">

                                <input
                                    type="checkbox"
                                    id="filter-all"
                                    {{ empty(request()->marca) ? 'checked' : '' }}>

                                <span class="checkmark"></span>

                                Todas

                            </label>

                            <hr style="border:0; border-top:1px solid #23262d; margin:4px 0;">

                            @foreach($marcas as $marca)

                            <label class="checkbox-container">

                                <input
                                    type="checkbox"
                                    name="marca[]"
                                    value="{{ $marca }}"
                                    class="marca-filter"
                                    {{ in_array($marca, request()->marca ?? []) ? 'checked' : '' }}>

                                <span class="checkmark"></span>

                                {{ $marca }}

                            </label>

                            @endforeach

                        </div>

                    </div>

                </div>

            </form>

        </aside>

        <!-- 3. PANEL CENTRAL (ANUNCIOS) -->
        <section class="center-panel">
            <div class="panel-header">
                <h2>Anuncios Recientes</h2>
                <span class="anuncios-count">{{ $anuncios->count() }} vehículos encontrados</span>
            </div>

            @if($anuncios->isNotEmpty())
            <div class="menu-anuncios">
                @foreach ($anuncios as $anuncio)
                <a href="{{ url('/app/anuncio/' . $anuncio->id) }}" class="anuncio-card-link">
                    <article class="anuncio-card">

                        <!-- CONTENEDOR FOTO PRINCIPAL -->
                        <div class="anuncio-media">
                            @if(!empty($anuncio->foto_principal))
                            <img src="{{ $anuncio->foto_principal }}"
                                alt="{{ $anuncio->marca }} {{ $anuncio->modelo }}"
                                class="anuncio-img"
                                loading="lazy">
                            @else
                            <!-- Placeholder si el anuncio no tiene fotos -->
                            <div class="anuncio-img-placeholder">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                                <span>Sin foto</span>
                            </div>
                            @endif

                            <div class="anuncio-badge-precio">
                                {{ number_format($anuncio->precio, 0, ',', '.') }} €
                            </div>
                        </div>

                        <!-- CONTENIDO DEL ANUNCIO -->
                        <div class="anuncio-content">

                            <div class="anuncio-top">
                                <h3 class="anuncio-titulo">
                                    {{ $anuncio->marca }} <span class="anuncio-modelo">{{ $anuncio->modelo }}</span>
                                </h3>
                                @if($anuncio->ciudad)
                                <span class="anuncio-location">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                    </svg>
                                    {{ $anuncio->ciudad }}
                                </span>
                                @endif
                            </div>

                            <!-- ETIQUETAS DE ESPECIFICACIONES -->
                            <div class="anuncio-specs-grid">
                                <div class="spec-item" title="Año">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                    </svg>
                                    <span>{{ $anuncio->anio }}</span>
                                </div>

                                <div class="spec-item" title="Kilómetros">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <span>{{ number_format($anuncio->kilometros ?? 0, 0, ',', '.') }} km</span>
                                </div>

                                <div class="spec-item" title="Combustible">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 1 9 3.603e-5a1 1 0 0 1 1.2 1.2c-.3 1.5.3 3.3 1.8 4.2 1.5.9 2.7 1.8 3.362-.214Z" />
                                    </svg>
                                    <span>{{ $anuncio->combustible }}</span>
                                </div>

                                <div class="spec-item" title="Transmisión">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 18H7.5M3.75 12h16.5" />
                                    </svg>
                                    <span>{{ $anuncio->transmision }}</span>
                                </div>
                            </div>

                            @if($anuncio->descripcion)
                            <p class="anuncio-descripcion">
                                {{ Str::limit($anuncio->descripcion, 90, '...') }}
                            </p>
                            @endif

                            <!-- FOOTER TARJETA -->
                            <div class="anuncio-footer">
                                <div class="anuncio-vendedor">
                                    <div class="autor-avatar-wrapper">
                                        @if($anuncio->foto_vendedor)
                                        <img src="{{ $anuncio->foto_vendedor }}" alt="{{ $anuncio->nombre_usuario }}" class="autor-avatar-img">
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                        </svg>
                                        @endif
                                    </div>
                                    <span class="vendedor-nombre">{{ $anuncio->nombre_usuario }}</span>
                                </div>

                                <span class="btn-ver-mas">
                                    Ver detalle
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </span>
                            </div>

                        </div>
                    </article>
                </a>
                @endforeach
            </div>
            @else
            <div class="no-anuncios">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="no-anuncios-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                <h3>No hay vehículos disponibles</h3>
                <p>Prueba a cambiar los filtros de búsqueda o sé el primero en publicar uno.</p>
            </div>
            @endif
        </section>

    </main>

</body>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        const form = document.getElementById('filterForm');
        const checkboxAll = document.getElementById('filter-all');
        const checkboxesMarcas = document.querySelectorAll('.marca-filter');

        // Cuando se pulsa "Todas"
        checkboxAll.addEventListener('change', () => {

            if (checkboxAll.checked) {

                // Desmarcamos todas las marcas
                checkboxesMarcas.forEach(cb => cb.checked = false);

                // Enviamos el formulario (mostrará todos los anuncios)
                form.submit();
            }

        });

        // Cuando se pulsa una marca
        checkboxesMarcas.forEach(checkbox => {

            checkbox.addEventListener('change', () => {

                const algunaMarcaActiva = Array.from(checkboxesMarcas).some(cb => cb.checked);

                if (algunaMarcaActiva) {
                    // Si hay alguna marca seleccionada, quitamos "Todas"
                    checkboxAll.checked = false;
                } else {
                    // Si no queda ninguna seleccionada, marcamos "Todas"
                    checkboxAll.checked = true;
                }

                // Enviamos el formulario automáticamente
                form.submit();

            });

        });

    });

    // Función para abrir/cerrar el desplegable
    function toggleDropdown(button) {

        const dropdown = button.parentElement;
        dropdown.classList.toggle('active');

    }
</script>

</html>