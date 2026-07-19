<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milyuncoches - Dashboard</title>
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
                url('https://poronftkafxcbnvvsxco.supabase.co/storage/v1/object/public/anuncios/fondo-main-view.png');

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

        <a href="/app" class="logo">Mil y un coches.</a>

        <div class="user-menu">

            <!-- Botón Vender con lógica de sesión -->
            @if($user)
            <a href="{{ url('/app/vender') }}" class="btn-vender">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="icon-vender">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Vender
            </a>
            @else
            <a href="{{ url('/login') }}" class="btn-vender">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="icon-vender">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Vender
            </a>
            @endif

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
                                Publicado por <strong>{{ $anuncio->nombre_usuario }}</strong>
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