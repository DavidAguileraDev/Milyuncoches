<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $anuncio->marca }} {{ $anuncio->modelo }} - Milyuncoches</title>
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

        /* Panel Superior Estandarizado */
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
            position: relative;
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
            background-color: #1a1d24;
            color: #9ca3af;
            border: 1px solid #23262d;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.2s ease;
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

        /* Estructura de la Vista de Detalle */
        .detail-layout {
            display: grid;
            grid-template-columns: 1fr 380px;
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

        /* Contenedor de la Imagen Principal */
        .photo-container {
            position: relative;
            width: 100%;
            height: 450px;
            /* Definimos la altura aquí para que la mantenga con o sin imagen */
            overflow: hidden;
            border-radius: 18px;
            background-color: #1a1d24;
            /* Fondo por defecto */
        }

        .photo-main {
            width: 100%;
            height: 100%;
            /* Ocupa el 100% de los 450px del contenedor */
            object-fit: cover;
            display: block;
        }

        /* Estilos para la caja de sustitución cuando no hay imagen */
        .photo-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 12px;
            background-color: #1a1d24;
            border: 2px dashed #23262d;
            border-radius: 18px;
            color: #6b7280;
            font-size: 15px;
            font-weight: 600;
            box-sizing: border-box;
        }

        .photo-placeholder svg {
            width: 48px;
            height: 48px;
            color: #374151;
        }

        .photo-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 42px;
            height: 42px;
            border: none;
            border-radius: 50%;
            background: rgba(0, 0, 0, .45);
            color: white;
            font-size: 22px;
            cursor: pointer;
            transition: .2s;
            z-index: 5;
        }

        .photo-btn:hover {
            background: rgba(0, 0, 0, .75);
        }

        .photo-prev {
            left: 15px;
        }

        .photo-next {
            right: 15px;
        }

        .photo-dots {
            position: absolute;
            bottom: 15px;
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        .photo-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .4);
            transition: .2s;
        }

        .photo-dot.active {
            background: white;
        }

        .photo-placeholder {
            color: #4b5563;
            font-size: 16px;
            font-weight: 500;
            text-align: center;
        }

        .car-title {
            font-size: 36px;
            font-weight: 800;
            margin: 15px 0 15px 0;
            letter-spacing: -1px;
        }

        .car-title span {
            font-weight: 400;
            color: #9ca3af;
        }

        /* Bloque superior de etiquetas (Badges destacados) */
        .anuncio-specs {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 30px;
            border-bottom: 1px solid #232730;
            padding-bottom: 25px;
        }

        .spec-badge {
            display: inline-flex;
            align-items: center;
            background-color: #232730;
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 20px;
            border: 1px solid #2e333f;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            margin: 0 0 15px 0;
            color: #ffffff;
        }

        .car-description {
            color: #9ca3af;
            font-size: 15px;
            line-height: 1.7;
            margin: 0;
            white-space: pre-line;
        }

        /* Panel Lateral (Derecho) */
        .side-panel {
            background-color: #16181d;
            border-radius: 24px;
            border: 1px solid #23262d;
            padding: 30px;
            height: fit-content;
            position: sticky;
            top: 40px;
        }

        .price-tag {
            font-size: 36px;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 25px;
            letter-spacing: -0.5px;
        }

        /* Fila de características técnicas en tabla lateral */
        .quick-specs {
            display: flex;
            flex-direction: column;
            gap: 14px;
            margin-bottom: 30px;
        }

        .spec-row {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            padding-bottom: 12px;
            border-bottom: 1px solid #232730;
        }

        .spec-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .spec-label {
            color: #6b7280;
            font-weight: 500;
        }

        .spec-value {
            color: #ffffff;
            font-weight: 600;
        }

        /* Botón Premium */
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

        /* Vista Adaptativa */
        @media (max-width: 900px) {
            .detail-layout {
                grid-template-columns: 1fr;
            }

            .side-panel {
                position: static;
            }

            .photo-container {
                height: 320px;
            }
        }
    </style>
</head>

<body>

    <!-- MENÚ SUPERIOR ESTANDARIZADO -->
    <header class="top-panel">
        <a href="/app" class="logo">Mil y un coches.</a>
        <div class="user-menu">
            @if($user)
            <!-- Botón de Chat -->
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
            @else
            <!-- Botón Vender (Invitado) -->
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

    <!-- CUERPO DEL DETALLE -->
    <main class="detail-layout">

        <!-- COLUMNA IZQUIERDA: INFORMACIÓN PRINCIPAL -->
        <section class="main-info-panel">

            <!-- Comprobamos si tiene foto asignada -->
            <div class="photo-container">

                @if($anuncio->imagenes->isNotEmpty())

                <img
                    id="main-photo"
                    src="{{ $anuncio->imagenes->first()->ruta }}"
                    alt="{{ $anuncio->marca }} {{ $anuncio->modelo }}"
                    class="photo-main">

                <button class="photo-btn photo-prev" type="button">
                    &#10094;
                </button>

                <button class="photo-btn photo-next" type="button">
                    &#10095;
                </button>

                <div class="photo-dots">

                    @foreach($anuncio->imagenes as $imagen)
                    <span class="photo-dot {{ $loop->first ? 'active' : '' }}"></span>
                    @endforeach

                </div>

                @else

                <div class="photo-placeholder">
                    <span>Sin imagen disponible</span>
                </div>

                @endif

            </div>

            <h1 class="car-title">{{ $anuncio->marca }} <span>{{ $anuncio->modelo }}</span></h1>

            <!-- Badges de especificaciones destacadas -->
            <div class="anuncio-specs">
                <span class="spec-badge">{{ number_format($anuncio->kilometros, 0, ',', '.') }} km</span>
                <span class="spec-badge">{{ $anuncio->combustible }}</span>
                <span class="spec-badge">{{ $anuncio->transmision }}</span>
                <span class="spec-badge">{{ $anuncio->anio }}</span>
                <span class="spec-badge">{{ $anuncio->potencia }} CV</span>
            </div>

            <!-- Descripción del Vendedor -->
            @if($anuncio->descripcion)
            <h2 class="section-title">Descripción del vendedor</h2>
            <p class="car-description">{{ $anuncio->descripcion }}</p>
            @else
            <h2 class="section-title">Descripción</h2>
            <p class="car-description" style="font-style: italic; color: #4b5563;">
                El vendedor no ha añadido ninguna descripción detallada para este vehículo.
            </p>
            @endif
        </section>

        <!-- COLUMNA DERECHA: TARJETA DE PRECIO Y ESPECIFICACIONES -->
        <aside class="side-panel">
            <div class="price-tag">
                {{ number_format($anuncio->precio, 0, ',', '.') }} €
            </div>

            <div class="quick-specs">
                <!-- Ubicación combinada basada en la lógica de Provincia/Ciudad -->
                <div class="spec-row">
                    <span class="spec-label">Ubicación</span>
                    <span class="spec-value">{{ $anuncio->ciudad }}, {{ $anuncio->provincia }}</span>
                </div>
                <div class="spec-row">
                    <span class="spec-label">Carrocería</span>
                    <span class="spec-value">{{ $anuncio->tipo_vehiculo }}</span>
                </div>
                <div class="spec-row">
                    <span class="spec-label">Cilindrada</span>
                    <span class="spec-value">{{ number_format($anuncio->cilindrada, 0, ',', '.') }} cc</span>
                </div>
                <div class="spec-row">
                    <span class="spec-label">Color</span>
                    <span class="spec-value">{{ $anuncio->color }}</span>
                </div>
                <div class="spec-row">
                    <span class="spec-label">Puertas / Plazas</span>
                    <span class="spec-value">{{ $anuncio->puertas }} / {{ $anuncio->plazas }}</span>
                </div>
                <div class="spec-row">
                    <span class="spec-label">Estado</span>
                    <span class="spec-value" style="color: {{ $anuncio->estado === 'Disponible' ? '#10b981' : '#ef4444' }};">
                        {{ $anuncio->estado }}
                    </span>
                </div>
            </div>

            @if($user && $user->id != $anuncio->user_id)
            <!-- Botón de Acción -->
            <a href="{{ url('/app/chat/create/' . $anuncio->user_id) }}" class="btn-contact">
                Contactar con vendedor
            </a>

            @elseif($user->id != $anuncio->user_id)

            <!-- Botón de Acción -->
            <a href="{{ url('/login') }}" class="btn-contact">
                Contactar con vendedor
            </a>

            @endif
        </aside>

    </main>

</body>
<script>
    const fotos = [
        @foreach($anuncio -> imagenes as $imagen)
        "{{ $imagen->ruta }}",
        @endforeach
    ];

    let indice = 0;

    const imagen = document.getElementById("main-photo");
    const dots = document.querySelectorAll(".photo-dot");

    function actualizar() {

        imagen.src = fotos[indice];

        dots.forEach(dot => dot.classList.remove("active"));

        dots[indice].classList.add("active");
    }

    document.querySelector(".photo-next")?.addEventListener("click", () => {

        indice++;

        if (indice >= fotos.length) {
            indice = 0;
        }

        actualizar();

    });

    document.querySelector(".photo-prev")?.addEventListener("click", () => {

        indice--;

        if (indice < 0) {
            indice = fotos.length - 1;
        }

        actualizar();

    });
</script>

</html>