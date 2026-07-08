<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MilYUnCoches</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #0d0e12;
            /* Fondo de pantalla oscuro profundo */
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

        /* Título superior de bienvenida */
        .welcome-title {
            font-size: 50px;
            /* Ajustado ligeramente de 60px para mejorar balance */
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 24px;
            text-align: center;
            letter-spacing: -1px;
        }

        .login-container {
            width: 350px;
            padding: 35px;
            display: flex;
            flex-direction: column;
            margin-top: 130px;


            background-color: #16181d;
            /* Contenedor gris oscuro minimalista */
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
            /* Sombra suave profunda */

            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .login-container:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        h1 {
            font-size: 36px;
            font-weight: 800;
            margin-top: 0;
            margin-bottom: 35px;
            color: #ffffff;
            /* Texto principal en blanco */
            letter-spacing: -1px;
        }

        .form-group {
            margin-bottom: 30px;
        }

        /* Checkbox personalizado estilo oscuro */
        .remember-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            color: #9ca3af;
            /* Gris claro secundario */
            font-weight: 500;
        }

        .remember-container input[type="checkbox"] {
            width: 18px;
            height: 18px;
            border: 2px solid #4b5563;
            border-radius: 4px;
            cursor: pointer;
            appearance: none;
            -webkit-appearance: none;
            outline: none;
            position: relative;
            background: transparent;
        }

        .remember-container input[type="checkbox"]:checked {
            background-color: #ffffff;
            border-color: #ffffff;
        }

        .remember-container input[type="checkbox"]:checked::before {
            content: "✓";
            color: #16181d;
            /* Check negro sobre fondo blanco */
            position: absolute;
            font-size: 12px;
            font-weight: bold;
            top: -1px;
            left: 3px;
        }

        .password-help {
            display: block;
            margin-bottom: 30px;
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            transition: opacity 0.2s;
        }

        .password-help:hover {
            opacity: 0.8;
        }

        .register-text {
            margin-top: 40px;
            font-size: 14px;
            color: #9ca3af;
            line-height: 1.5;
        }

        .register-text a {
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
            border-bottom: 2px solid #ffffff;
            display: inline-block;
            margin-top: 4px;
            transition: opacity 0.2s;
        }

        .register-text a:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>

    <div>
        <h1 class="welcome-title">Bienvenido a Mil y un coches!</h1>
    </div>

    <div class="login-container">
        <h1>Iniciar sesión.</h1>

        <form action="{{ url('/login') }}" method="POST">
            @csrf

            <div class="form-group">
                <x-input-auth
                    type="email"
                    name="email"
                    placeholder="Email *"
                    required />
            </div>

            <div class="form-group">
                <x-input-auth
                    type="password"
                    name="password"
                    placeholder="Password *"
                    required />
            </div>

            <div class="remember-container">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>

            <a href="#" class="password-help">Password Help?</a>

            <x-btn-auth type="submit">
                Iniciar sesión
            </x-btn-auth>
        </form>

        <div class="register-text">
            Don't have an account?<br>
            <a href="/register">Create One Now</a>
        </div>
    </div>

</body>

</html>