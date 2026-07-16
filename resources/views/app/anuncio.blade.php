<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $anuncio->marca }} {{ $anuncio->modelo }} - Milyuncoches</title>
    <style>
        /* Estilos Base - Modo Oscuro */
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #0d0e12;
            color: #ffffff;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Panel Superior (A juego con la Home) */
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

        /* Contenedor del Detalle */
        .detail-layout {
            display: grid;
            grid-template-columns: 1fr 380px;
            /* Columna de info principal y columna lateral de precio/acción */
            gap: 30px;
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            box-sizing: border-box;
        }

        /* Panel Principal (Izquierdo) */
        .main-info-panel {
            background-color: #16181d;
            border-radius: 24px;
            border: 1px solid #23262d;
            padding: 40px;
        }

        /* Placeholder para futura Foto */
        .photo-placeholder {
            width: 100%;
            height: 400px;
            background-color: #1a1d24;
            border-radius: 16px;
            border: 1px solid #2e333f;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #4b5563;
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 30px;
        }

        .car-title {
            font-size: 36px;
            font-weight: 800;
            margin: 0 0 10px 0;
            letter-spacing: -1px;
        }

        .car-title span {
            font-weight: 400;
            color: #9ca3af;
        }

        .car-publisher {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 30px;
            border-bottom: 1px solid #232730;
            padding-bottom: 15px;
        }

        .car-publisher strong {
            color: #9ca3af;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            margin: 0 0 15px 0;
            color: #ffffff;
        }

        /* Contenedor de Etiquetas técnicas (Badges) */
        .anuncio-specs {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 20px; /* Aumentamos el espacio inferior */
            border-bottom: 1px solid #232730; /* La línea sutil idéntica al panel derecho */
            padding-bottom: 20px; /* Espacio entre las etiquetas y la línea */
        }

        .spec-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background-color: #232730;
            color: #9ca3af;
            font-size: 12px;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 20px;
            border: 1px solid #2e333f;
        }

        .spec-badge svg {
            color: #9ca3af;
        }

        .car-description {
            color: #9ca3af;
            font-size: 15px;
            line-height: 1.7;
            margin: 0;
        }

        /* Panel Lateral (Derecho - Compra/Precio) */
        .side-panel {
            background-color: #16181d;
            border-radius: 24px;
            border: 1px solid #23262d;
            padding: 30px;
            height: fit-content;
            position: sticky;
            top: 100px;
            /* Se queda fijo al hacer scroll */
        }

        .price-tag {
            font-size: 32px;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 25px;
        }

        /* Características rápidas */
        .quick-specs {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 30px;
        }

        .spec-row {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            padding-bottom: 10px;
            border-bottom: 1px solid #232730;
        }

        .spec-label {
            color: #6b7280;
            font-weight: 500;
        }

        .spec-value {
            color: #ffffff;
            font-weight: 600;
        }

        /* Botón de acción estilo premium (blanco minimalista) */
        .btn-contact {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 16px 0;
            background-color: #ffffff;
            color: #0d0e12;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.25s ease, transform 0.2s ease;
            box-sizing: border-box;
        }

        .btn-contact:hover {
            background-color: #e5e7eb;
            transform: translateY(-2px);
        }

        .btn-contact:active {
            transform: scale(0.98);
        }

        /* Responsivo básico */
        @media (max-width: 900px) {
            .detail-layout {
                grid-template-columns: 1fr;
            }

            .side-panel {
                position: static;
            }
        }

    </style>
</head>

<body>

    <!-- MENÚ SUPERIOR -->
    <header class="top-panel">
        <a href="/app" class="logo">Mil y un coches.</a>
        <div class="user-menu">

            @if($user)

            <div class="user-welcome">
                Bienvenido, <span>{{ $user->name }}</span>
            </div>

            <a href="{{ url('/app/user/' . $user->id) }}">
                <div class="user-avatar-container">

                    @if($user->profile_image)

                    <img src="{{ asset('storage/' . $user->profile_image) }}"
                        alt="Foto de {{ $user->name }}"
                        class="user-avatar">

                    @else

                    <div class="user-avatar-default">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>

                    @endif

                </div>
            </a>

            @else

            <div class="user-welcome">
                Bienvenido, <span>Invitado</span>
            </div>

            <a href="{{ url('/login') }}">
                <div class="user-avatar-container">

                    <div class="user-avatar-default">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>

                </div>
            </a>

            @endif

        </div>
    </header>

    <!-- CUERPO DEL DETALLE -->
    <main class="detail-layout">

        <!-- COLUMNA IZQUIERDA: INFORMACIÓN PRINCIPAL -->
        <section class="main-info-panel">
            <!-- Zona reservada para la futura imagen -->
            <div class="photo-placeholder">
                [ Zona de Imagen - Próximamente ]
            </div>

            <h1 class="car-title">{{ $anuncio->marca }} <span>{{ $anuncio->modelo }}</span></h1>

            <!-- Etiquetas de especificaciones técnicas -->

            <div class="anuncio-specs">
                <span class="spec-badge">

                    {{ $anuncio->combustible }}
                </span>
                <span class="spec-badge">

                    {{ $anuncio->transmision }}
                </span>
                <span class="spec-badge">

                    {{ $anuncio->anio }}
                </span>
            </div>

            @if($anuncio->descripcion)
            <h2 class="section-title">Descripción del vendedor</h2>
            <p class="car-description">
                {{ $anuncio->descripcion }}
            </p>
            @else
            <h2 class="section-title">Descripción</h2>
            <p class="car-description" style="font-style: italic;">
                El vendedor no ha añadido ninguna descripción detallada para este vehículo.
            </p>
            @endif
        </section>

        <!-- COLUMNA DERECHA: TARJETA DE PRECIO Y ACCIÓN -->
        <aside class="side-panel">
            <div class="price-tag">
                {{ number_format($anuncio->precio, 0, ',', '.') }} €
            </div>

            <div class="quick-specs">
                <div class="spec-row">
                    <span class="spec-label">Vendedor</span>
                    <span class="spec-value">{{ $anuncio->nombre_usuario }}</span>
                </div>
                
                <!--Añadir atr disponible en la base de datos-->
                <div class="spec-row">
                    <span class="spec-label">Estado</span>
                    <span class="spec-value" style="color: #10b981;">Disponible</span>
                </div>
            </div>

            <a href="#" class="btn-contact">
                Contactar con vendedor
            </a>
        </aside>

    </main>

</body>

</html>