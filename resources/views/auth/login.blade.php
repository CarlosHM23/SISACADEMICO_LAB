<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistema Académico UNDC</title>
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <style>
        :root {
            --ink: #27364a;
            --muted: #879cc1;
            --red: #c91f38;
            --red-hover: #b61931;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            background:
                linear-gradient(rgba(245, 247, 250, 0.86), rgba(245, 247, 250, 0.86)),
                radial-gradient(circle at 85% 12%, #edf1f7 0, transparent 24%);
            color: var(--ink);
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-page {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 14px;
            padding: 24px 16px;
        }

        .login-title {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .login-title h1 {
            margin: 0;
            font-size: clamp(26px, 2.5vw, 32px);
            font-weight: 600;
            line-height: 1.12;
            letter-spacing: 1.5px;
        }

        .login-title h1 span {
            display: block;
            margin-top: 8px;
            color: #48658f;
            font-size: clamp(23px, 2.2vw, 28px);
            font-weight: 300;
            letter-spacing: 2px;
        }

        .login-panel {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: min(410px, calc(100% - 32px));
            min-height: 0;
            padding: 18px 30px 24px;
            background: #fff;
            border-radius: 2px;
            box-shadow: 0 3px 14px rgba(25, 40, 64, 0.18);
            text-align: center;
        }

        .login-card img {
            display: block;
            width: 128px;
            height: 128px;
            object-fit: contain;
            margin: 0 auto 4px;
        }

        .login-card h2 {
            margin: 0 0 12px;
            color: #60748f;
            font-size: 20px;
            font-weight: 600;
        }

        .terms {
            max-width: 390px;
            margin: 12px auto 0;
            color: #5270a0;
            font-size: 14px;
            line-height: 1.55;
        }

        .terms a {
            color: #ed1737;
            text-decoration: none;
        }

        .credential-form {
            display: block;
            margin-top: 0;
            text-align: left;
        }

        .credential-form input[type="email"],
        .credential-form input[type="password"] {
            width: 100%;
            height: 42px;
            margin-bottom: 10px;
            padding: 0 13px;
            border: 1px solid #d7deea;
            border-radius: 4px;
            color: var(--ink);
            font: inherit;
        }

        .credential-form input:focus {
            border-color: #7187a7;
            outline: 3px solid rgba(113, 135, 167, 0.12);
        }

        .remember-row {
            display: flex;
            width: fit-content;
            align-items: center;
            gap: 7px;
            margin: 2px 0 12px;
            color: #60748f;
            font-size: 13px;
            cursor: pointer;
        }

        .remember-row input[type="checkbox"] {
            width: 14px;
            height: 14px;
            margin: 0;
            accent-color: var(--red);
            cursor: pointer;
        }

        .submit-button {
            width: 100%;
            height: 44px;
            border: 0;
            border-radius: 5px;
            background: var(--red);
            box-shadow: 0 2px 5px rgba(143, 22, 43, 0.20);
            color: #fff;
            font: inherit;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: background .16s ease, transform .16s ease;
        }

        .submit-button:hover {
            background: var(--red-hover);
            transform: translateY(-1px);
        }

        .error-message {
            margin: 10px 0 0;
            color: #c91f38;
            font-size: 14px;
        }

        @media (max-width: 900px) {
            .login-page {
                justify-content: center;
                gap: 18px;
                padding: 24px 16px;
            }

            .login-title {
                min-height: auto;
            }

            .login-panel {
                min-height: auto;
                width: 100%;
                justify-content: center;
            }

            .login-card {
                width: min(470px, 100%);
            }
        }

        @media (max-width: 480px) {
            .login-page {
                gap: 10px;
                padding: 16px 12px;
            }

            .login-title h1 { font-size: 22px; }
            .login-title h1 span { margin-top: 6px; font-size: 21px; }
            .login-card { width: 100%; padding: 16px 18px 20px; }
            .login-card img { width: 104px; height: 104px; }
            .login-card h2 { margin-bottom: 10px; font-size: 18px; }
            .credential-form input[type="email"],
            .credential-form input[type="password"] { height: 44px; }
            .terms { font-size: 13px; }
        }

        @media (max-height: 650px) {
            .login-page { justify-content: flex-start; }
            .login-card img { width: 96px; height: 96px; }
        }
    </style>
</head>
<body>
    <main class="login-page">
        <section class="login-title" aria-label="Título del sistema">
            <h1>
                SISTEMA ACADÉMICO
                <span>UNDC</span>
            </h1>
        </section>

        <section class="login-panel">
            <div class="login-card">
                <img src="{{ asset('img/logo.png') }}" alt="Logo UNDC">
                <h2>Inicia sesión</h2>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="error-message">{{ $error }}</p>
                    @endforeach
                @endif

                <form class="credential-form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" autocomplete="email" required>
                    <input type="password" name="password" placeholder="Contraseña" autocomplete="current-password" required>
                    <label class="remember-row">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        Recordarme
                    </label>
                    <button class="submit-button" type="submit">Iniciar sesión</button>
                </form>

                <p class="terms">
                    Al hacer clic en "Iniciar sesión", aceptas nuestros
                    <a href="#">términos y Condiciones</a> y la
                    <a href="#">Política de privacidad de los datos</a>.
                </p>
            </div>
        </section>
    </main>

</body>
</html>