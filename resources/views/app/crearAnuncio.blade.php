<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Anuncio - Mil y un coches</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* BASE & RESET */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: #0b0c10;
            color: #ffffff;
            min-height: 100vh;
            padding-bottom: 60px;
        }

        /* 1. PANEL SUPERIOR */
        .top-panel {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background-color: #16181d;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 20px;
            font-weight: 800;
            letter-spacing: -0.5px;
            background: linear-gradient(90deg, #ffffff, #a3a3a3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-welcome {
            font-size: 14px;
            color: #a3a3a3;
        }

        .user-welcome span {
            color: #ffffff;
            font-weight: 600;
        }

        .user-avatar-container {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.1);
            background-color: #22252d;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-avatar {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-avatar-default svg {
            width: 20px;
            height: 20px;
            color: #a3a3a3;
        }

        /* 2. CONTENEDOR DEL FORMULARIO */
        .form-container {
            max-width: 850px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .form-header {
            margin-bottom: 32px;
        }

        .form-header h1 {
            font-size: 32px;
            font-weight: 800;
            letter-spacing: -0.5px;
            margin-bottom: 8px;
        }

        .form-header p {
            color: #a3a3a3;
            font-size: 15px;
        }

        /* SECCIONES DEL FORMULARIO */
        .form-section {
            background-color: #16181d;
            border: 1px solid rgba(255, 255, 255, 0.03);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #ffffff;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding-bottom: 12px;
        }

        /* GRID DE CAMPOS */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        label {
            font-size: 13px;
            font-weight: 600;
            color: #c1c1c1;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* INPUTS & SELECTS STYLE */
        input[type="text"],
        input[type="number"],
        select,
        textarea {
            background-color: #0b0c10;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: #ffffff;
            padding: 14px 16px;
            font-size: 15px;
            font-weight: 500;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            width: 100%;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.05);
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23a3a3a3'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 16px;
            padding-right: 40px;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        /* INPUT FILE CUSTOM */
        .file-upload-wrapper {
            position: relative;
            border: 2px dashed rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            background-color: #0b0c10;
            cursor: pointer;
            transition: border-color 0.2s ease;
        }

        .file-upload-wrapper:hover {
            border-color: rgba(255, 255, 255, 0.3);
        }

        .file-upload-wrapper input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .upload-icon {
            width: 32px;
            height: 32px;
            color: #a3a3a3;
            margin-bottom: 8px;
        }

        /* BOTÓN DE ACCIÓN */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 32px;
        }

        .btn-submit {
            background-color: #ffffff;
            color: #0b0c10;
            border: none;
            padding: 16px 32px;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.2s ease, background-color 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-submit:hover {
            background-color: #f3f4f6;
            transform: translateY(-2px);
        }

        .btn-submit:active {
            transform: translateY(1px);
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {

            .form-grid,
            .form-grid-3 {
                grid-template-columns: 1fr;
            }

            .form-group.full-width {
                grid-column: span 1;
            }

            .top-panel {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- 1. PANEL SUPERIOR -->
    <header class="top-panel">

        <div class="logo">Mil y un coches.</div>

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

    <!-- 2. CONTENEDOR PRINCIPAL -->
    <main class="form-container">

        <div class="form-header">
            <h1>Publica tu vehículo</h1>
            <p>Introduce las especificaciones y características de tu coche para encontrar comprador rápido.</p>
        </div>

        <!-- El formulario apunta al método store de tu controlador de anuncios -->
        <form action="{{ url('/app/crearAnuncio') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- SECCIÓN 1: INFORMACIÓN PRINCIPAL -->
            <section class="form-section">
                <h2 class="section-title">Información Principal</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <input type="text" id="marca" name="marca" placeholder="Ej: BMW, Audi, Volkswagen..." required>
                    </div>
                    <div class="form-group">
                        <label for="modelo">Modelo</label>
                        <input type="text" id="modelo" name="modelo" placeholder="Ej: Serie 3, Golf, Q5..." required>
                    </div>
                    <div class="form-group">
                        <label for="anio">Año de fabricación</label>
                        <input type="number" id="anio" name="anio" placeholder="Ej: 2020" min="1900" max="2027" required>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio (€)</label>
                        <input type="number" id="precio" name="precio" step="0.01" placeholder="Ej: 15400" required>
                    </div>
                </div>
            </section>

            <!-- SECCIÓN 2: CARACTERÍSTICAS TÉCNICAS -->
            <section class="form-section">
                <h2 class="section-title">Especificaciones Técnicas</h2>
                <div class="form-grid-3">
                    <div class="form-group">
                        <label for="kilometros">Kilómetros</label>
                        <input type="number" id="kilometros" name="kilometros" placeholder="Ej: 85000" required>
                    </div>
                    <div class="form-group">
                        <label for="combustible">Combustible</label>
                        <select id="combustible" name="combustible" required>
                            <option value="" disabled selected>Selecciona...</option>
                            <option value="Gasolina">Gasolina</option>
                            <option value="Diésel">Diésel</option>
                            <option value="Híbrido">Híbrido</option>
                            <option value="Híbrido Enchufable">Híbrido Enchufable</option>
                            <option value="Eléctrico">Eléctrico</option>
                            <option value="GLP / GNC">GLP / GNC</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="transmision">Transmisión</label>
                        <select id="transmision" name="transmision" required>
                            <option value="" disabled selected>Selecciona...</option>
                            <option value="Manual">Manual</option>
                            <option value="Automático">Automático</option>
                        </select>
                    </div>
                </div>

                <div class="form-grid-3" style="margin-top: 20px;">
                    <div class="form-group">
                        <label for="potencia">Potencia (CV)</label>
                        <input type="number" id="potencia" name="potencia" placeholder="Ej: 150" required>
                    </div>
                    <div class="form-group">
                        <label for="cilindrada">Cilindrada (cc)</label>
                        <input type="number" id="cilindrada" name="cilindrada" placeholder="Ej: 1995" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo_vehiculo">Tipo de Vehículo</label>
                        <select id="tipo_vehiculo" name="tipo_vehiculo" required>
                            <option value="" disabled selected>Selecciona...</option>
                            <option value="Berlina">Berlina</option>
                            <option value="SUV">SUV</option>
                            <option value="Compacto">Compacto</option>
                            <option value="Familiar">Familiar</option>
                            <option value="Cupé">Cupé</option>
                            <option value="Cabrio">Cabrio</option>
                            <option value="Monovolumen">Monovolumen</option>
                        </select>
                    </div>
                </div>

                <div class="form-grid-3" style="margin-top: 20px;">
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" id="color" name="color" placeholder="Ej: Negro Negro" required>
                    </div>
                    <div class="form-group">
                        <label for="puertas">Puertas</label>
                        <input type="number" id="puertas" name="puertas" min="2" max="5" placeholder="Ej: 5" required>
                    </div>
                    <div class="form-group">
                        <label for="plazas">Plazas</label>
                        <input type="number" id="plazas" name="plazas" min="1" max="9" placeholder="Ej: 5" required>
                    </div>
                </div>
            </section>

            <!-- SECCIÓN 3: UBICACIÓN -->
            <section class="form-section">
                <h2 class="section-title">Localización</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="comunidad">Comunidad Autónoma</label>
                        <select id="comunidad" name="provincia" required>
                            <option value="" selected>Selecciona una Comunidad...</option>
                            <option value="Andalucía">Andalucía</option>
                            <option value="Aragón">Aragón</option>
                            <option value="Asturias">Asturias, Principado de</option>
                            <option value="Baleares">Balears, Illes</option>
                            <option value="Canarias">Canarias</option>
                            <option value="Cantabria">Cantabria</option>
                            <option value="Castilla y León">Castilla y León</option>
                            <option value="Castilla-La Mancha">Castilla-La Mancha</option>
                            <option value="Cataluña">Cataluña</option>
                            <option value="Comunidad Valenciana">Comunidad Valenciana</option>
                            <option value="Extremadura">Extremadura</option>
                            <option value="Galicia">Galicia</option>
                            <option value="Madrid">Madrid, Comunidad de</option>
                            <option value="Murcia">Murcia, Región de</option>
                            <option value="Navarra">Navarra, Comunidad Foral de</option>
                            <option value="País Vasco">País Vasco</option>
                            <option value="La Rioja">La Rioja</option>
                            <option value="Ceuta">Ceuta, Ciudad Autónoma de</option>
                            <option value="Melilla">Melilla, Ciudad Autónoma de</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="provincia_select">Provincia</label>
                        <select id="provincia_select" name="ciudad" required>
                            <option value="" selected>Selecciona una Provincia...</option>
                            <!-- Las provincias se cargarán dinámicamente mediante JavaScript -->
                        </select>
                    </div>
                </div>
            </section>

            <!-- SECCIÓN 4: DETALLES ADICIONALES (NULLABLES) -->
            <section class="form-section">
                <h2 class="section-title">Galería y Detalles</h2>
                <div class="form-grid">

                    <!-- Foto Principal (Nullable en la migración -> Sin required) -->
                    <div class="form-group full-width">
                        <label>Foto Principal del Vehículo</label>
                        <div class="file-upload-wrapper">
                            <svg class="upload-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                            </svg>
                            <p style="font-size: 14px; color: #a3a3a3; font-weight: 500;">Haz clic para arrastrar o subir la imagen principal</p>
                            <input type="file" id="foto_principal" name="foto_principal" accept="image/*">
                        </div>
                    </div>

                    <!-- Descripción (Nullable en la migración -> Sin required) -->
                    <div class="form-group full-width">
                        <label for="descripcion">Descripción del Anuncio</label>
                        <textarea id="descripcion" name="descripcion" placeholder="Describe el estado del coche, mantenimientos al día, extras, equipamiento destacado..."></textarea>
                    </div>

                </div>
            </section>

            <!-- BOTONES FINALES -->
            <div class="form-actions">
                <button type="submit" class="btn-submit">
                    Publicar Anuncio
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" style="width: 18px; height: 18px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </button>
            </div>

        </form>

    </main>

</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Relación oficial de Comunidades Autónomas y sus Provincias en España
        const mapaRegiones = {
            "Andalucía": ["Almería", "Cádiz", "Córdoba", "Granada", "Huelva", "Jaén", "Málaga", "Sevilla"],
            "Aragón": ["Huesca", "Teruel", "Zaragoza"],
            "Asturias": ["Asturias"],
            "Baleares": ["Baleares"],
            "Canarias": ["Las Palmas", "Santa Cruz de Tenerife"],
            "Cantabria": ["Cantabria"],
            "Castilla y León": ["Ávila", "Burgos", "León", "Palencia", "Salamanca", "Segovia", "Soria", "Valladolid", "Zamora"],
            "Castilla-La Mancha": ["Albacete", "Ciudad Real", "Cuenca", "Guadalajara", "Toledo"],
            "Cataluña": ["Barcelona", "Girona", "Lleida", "Tarragona"],
            "Comunidad Valenciana": ["Alicante", "Castellón", "Valencia"],
            "Extremadura": ["Badajoz", "Cáceres"],
            "Galicia": ["A Coruña", "Lugo", "Ourense", "Pontevedra"],
            "Madrid": ["Madrid"],
            "Murcia": ["Murcia"],
            "Navarra": ["Navarra"],
            "País Vasco": ["Álava", "Bizkaia", "Gipuzkoa"],
            "La Rioja": ["La Rioja"],
            "Ceuta": ["Ceuta"],
            "Melilla": ["Melilla"]
        };

        const comunidadSelect = document.getElementById('comunidad');
        const provinciaSelect = document.getElementById('provincia_select');

        // Generar la lista completa de provincias al iniciar
        function cargarTodasLasProvincias() {
            const estadoActual = provinciaSelect.value;
            provinciaSelect.innerHTML = '<option value="">Selecciona una Provincia...</option>';

            Object.keys(mapaRegiones).forEach(comunidad => {
                mapaRegiones[comunidad].forEach(provincia => {
                    const option = document.createElement('option');
                    option.value = provincia;
                    option.textContent = provincia;
                    option.dataset.comunidad = comunidad; // Guardamos a qué CC.AA pertenece
                    provinciaSelect.appendChild(option);
                });
            });

            if (estadoActual) provinciaSelect.value = estadoActual;
        }

        // Inicializar el listado general
        cargarTodasLasProvincias();

        // Evento 1: Cuando cambia la Comunidad Autónoma
        comunidadSelect.addEventListener('change', function() {
            const comunidadSeleccionada = this.value;
            const provinciaActual = provinciaSelect.value;

            if (!comunidadSeleccionada) {
                // Si el usuario vuelve a poner "Selecciona una Comunidad...", restauramos todas las provincias
                cargarTodasLasProvincias();
                return;
            }

            // Filtrar y mostrar solo las provincias de la comunidad seleccionada
            provinciaSelect.innerHTML = '<option value="">Selecciona una Provincia...</option>';
            mapaRegiones[comunidadSeleccionada].forEach(provincia => {
                const option = document.createElement('option');
                option.value = provincia;
                option.textContent = provincia;
                option.dataset.comunidad = comunidadSeleccionada;
                provinciaSelect.appendChild(option);
            });

            // Si la provincia que estaba seleccionada pertenece a la nueva comunidad elegida, la mantenemos
            if (mapaRegiones[comunidadSeleccionada].includes(provinciaActual)) {
                provinciaSelect.value = provinciaActual;
            }
        });

        // Evento 2: Cuando cambia la Provincia
        provinciaSelect.addEventListener('change', function() {
            const opcionSeleccionada = this.options[this.selectedIndex];
            if (!opcionSeleccionada || !opcionSeleccionada.value) return;

            const comunidadAsociada = opcionSeleccionada.dataset.comunidad;

            // Si la comunidad autónoma actual no coincide con la de la provincia elegida, la cambiamos automáticamente
            if (comunidadSelect.value !== comunidadAsociada) {
                comunidadSelect.value = comunidadAsociada;

                // Re-renderizamos el select de provincias para que solo muestre las de la nueva CC.AA actual
                const provinciaGuardada = this.value;
                provinciaSelect.innerHTML = '<option value="">Selecciona una Provincia...</option>';
                mapaRegiones[comunidadAsociada].forEach(provincia => {
                    const option = document.createElement('option');
                    option.value = provincia;
                    option.textContent = provincia;
                    option.dataset.comunidad = comunidadAsociada;
                    if (provincia === provinciaGuardada) option.selected = true;
                    provinciaSelect.appendChild(option);
                });
            }
        });
    });
</script>

</html>