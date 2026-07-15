<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milyuncoches - Dashboard</title>
    <style>
        /* Estilos Base - Modo Oscuro */
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
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
                url('/images/fondo-main-view.png');
            /* <-- Quitamos "/public" */

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

        /* 3. Panel Central (Anuncios de coches) */
        .center-panel {
            flex: 1;
            /* Ocupa todo el espacio restante automáticamente */
            background-color: #16181d;
            border-radius: 20px;
            padding: 25px;
            box-sizing: border-box;
            border: 1px solid #23262d;

            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .center-panel:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        /* Contenedor Grid que organiza las tarjetas */
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
        }

        /* Tarjeta minimalista de Anuncio */
        .anuncio-card {
            background-color: #1a1d24;
            /* Un tono ligeramente más claro que el contenedor central para crear capas */
            border: 1px solid #282c35;
            border-radius: 16px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                border-color 0.3s ease;
        }


        /* Efecto de elevación interactivo */
        .anuncio-card:hover {
            transform: translateY(-5px);
            border-color: #4b5563;
            /* El borde se ilumina sutilmente */
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
        }

        /* Encabezado del anuncio */
        .anuncio-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 14px;
            gap: 10px;
        }

        .anuncio-header h2 {
            font-size: 18px;
            font-weight: 700;
            color: #ffffff;
            margin: 0;
            line-height: 1.2;
            letter-spacing: -0.3px;
        }

        .anuncio-header h2 span {
            font-weight: 400;
            color: #9ca3af;
            /* Modelo en un tono más suave */
        }

        /* Precio destacado en blanco puro */
        .anuncio-precio {
            font-size: 16px;
            font-weight: 800;
            color: #ffffff;
            white-space: nowrap;
        }

        /* Contenedor de Etiquetas técnicas (Badges) */
        .anuncio-specs {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 16px;
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

        /* Descripción del coche */
        .anuncio-descripcion {
            font-size: 13.5px;
            color: #9ca3af;
            line-height: 1.5;
            margin: 0 0 20px 0;
        }

        /* Pie de la tarjeta */
        .anuncio-footer {
            border-top: 1px solid #232730;
            padding-top: 14px;
            margin-top: auto;
            /* Empuja el footer siempre abajo si una tarjeta tiene menos texto */
        }

        .anuncio-autor {
            font-size: 12px;
            color: #6b7280;
        }

        .anuncio-autor strong {
            color: #9ca3af;
        }

        /* Estilo para cuando no hay anuncios */
        .no-anuncios {
            text-align: center;
            padding: 40px 20px;
        }

        .no-anuncios h2 {
            font-size: 20px;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .no-anuncios p {
            color: #6b7280;
            margin: 0;
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
        <div class="logo">Mil y un coches.</div>
        <div class="user-menu">
            <div class="user-welcome">
                Bienvenido, <span>{{ $user->name }}</span>
            </div>

            <!-- Foto de perfil con fallback -->
            <a href="{{ url('/app/user/' . $user->id) }}">
                <div class="user-avatar-container">
                    @if($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Foto de {{ $user->name }}" class="user-avatar">
                    @else
                    <!-- Avatar genérico SVG minimalista si la foto es nula -->
                    <div class="user-avatar-default">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                    @endif
                </div>
            </a>
        </div>
    </header>

    <!-- ESTRUCTURA INFERIOR -->
    <main class="main-layout">

        <!-- 2. PANEL IZQUIERDO (FILTROS) -->
        <aside class="left-panel">
            <h2>Filtros</h2>
            <p>Aquí colocaremos los filtros de búsqueda especiales más adelante (marca, modelo, año, precio, combustible...).</p>
        </aside>

        <!-- 3. PANEL CENTRAL (ANUNCIOS) -->
        <section class="center-panel">
            <h2>Anuncios Recientes</h2>
            <p>Aquí se cargarán de forma dinámica las tarjetas con las fotos, precios y detalles de cada uno de los coches disponibles en la plataforma.</p>

            @if($anuncios->isNotEmpty())
            <div class="menu-anuncios">
                @foreach ($anuncios as $anuncio)

                <a href="{{ url('/app/anuncio/' . $anuncio->id) }}" class="anuncio-link">
                    <div class="anuncio-card">
                        <div class="anuncio-header">
                            <h2>{{ $anuncio->marca }} <span>{{ $anuncio->modelo }}</span></h2>
                            <div class="anuncio-precio">
                                {{ number_format($anuncio->precio, 0, ',', '.') }} €
                            </div>
                        </div>

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
                        <p class="anuncio-descripcion">
                            {{ Str::limit($anuncio->descripcion, 100, '...') }}
                        </p>
                        @endif

                        <div class="anuncio-footer">
                            <span class="anuncio-autor">
                                Publicado por <strong>{{ $user->name }}</strong>
                            </span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            @else
            <div class="no-anuncios">
                <h2>No hay anuncios disponibles en este momento.</h2>
                <p>¡Vuelve a pasarte más tarde o publica el tuyo!</p>
            </div>
            @endif

        </section>

    </main>

</body>

</html>