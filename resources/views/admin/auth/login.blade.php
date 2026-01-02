<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Admin Login — Danova</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #2F6FED;
            --primary-hover: #1F5FDD;
            --black: #1A1A1A;
            --dark-gray: #2A2A2A;
            --medium-gray: #6B6B6B;
            --light-gray: #E8E8E8;
            --bg-gray: #F5F5F5;
            --white: #FFFFFF;
            --error-bg: #FEF2F2;
            --error-border: #FECACA;
            --error-text: #991B1B;
            --radius: 16px;
            --radius-sm: 12px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Lexend', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background: linear-gradient(135deg, #f0f4ff 0%, var(--bg-gray) 100%);
            color: var(--black);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            line-height: 1.6;
        }

        .card {
            width: 100%;
            max-width: 440px;
            background: var(--white);
            border: 1px solid var(--light-gray);
            border-radius: var(--radius);
            padding: 40px 32px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 32px;
        }

        .logo {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--primary) 0%, #5A8FFF 100%);
            color: var(--white);
            font-weight: 900;
            font-size: 24px;
            flex-shrink: 0;
            overflow: hidden;
        }

        .logo.has-image {
            background: var(--white);
            border: 1px solid var(--light-gray);
            color: var(--black);
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 8px;
            display: block;
        }

        .brand-text h1 {
            font-size: 20px;
            font-weight: 700;
            color: var(--black);
            margin-bottom: 4px;
        }

        .muted {
            color: var(--medium-gray);
            font-size: 13px;
            line-height: 1.5;
        }

        .field {
            margin-bottom: 20px;
        }

        label {
            font-size: 13px;
            font-weight: 600;
            color: var(--dark-gray);
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--light-gray);
            border-radius: var(--radius-sm);
            font-family: inherit;
            font-size: 14px;
            background: var(--white);
            color: var(--black);
            transition: all 0.2s ease;
        }

        input[type="text"]:hover,
        input[type="password"]:hover {
            border-color: #D1D5DB;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(47, 111, 237, 0.1);
        }

        .btn {
            display: inline-flex;
            width: 100%;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 14px 24px;
            border-radius: var(--radius-sm);
            border: none;
            background: var(--primary);
            color: var(--white);
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            margin-top: 8px;
            transition: all 0.2s ease;
        }

        .btn:hover:not(:disabled) {
            background: var(--primary-hover);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(47, 111, 237, 0.3);
        }

        .btn:active:not(:disabled) {
            transform: translateY(0);
        }

        .btn:disabled {
            background: var(--light-gray);
            color: var(--medium-gray);
            cursor: not-allowed;
        }

        .errors {
            background: var(--error-bg);
            border: 1px solid var(--error-border);
            color: var(--error-text);
            border-radius: var(--radius-sm);
            padding: 14px 16px;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 500;
        }

        *:focus-visible {
            outline: 3px solid rgba(47, 111, 237, 0.5);
            outline-offset: 2px;
        }

        @media (max-width: 480px) {
            .card {
                padding: 32px 24px;
            }

            .brand-text h1 {
                font-size: 18px;
            }

            .logo {
                width: 44px;
                height: 44px;
                font-size: 22px;
            }
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="brand">
            <div class="logo {{ !empty($siteSettings['header_logo']) ? 'has-image' : '' }}">
                @if(!empty($siteSettings['header_logo']))
                <img src="{{ asset('storage/' . $siteSettings['header_logo']) }}" alt="Danova" />
                @else
                D
                @endif
            </div>
            <div class="brand-text">
                <h1>Danova Admin</h1>
                <div class="muted">Login untuk mengelola konten landing page</div>
            </div>
        </div>

        @if ($errors->has('login'))
        <div class="errors">
            {{ $errors->first('login') }}
        </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <div class="field">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" autocomplete="username" required />
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" autocomplete="current-password" required />
            </div>

            <button class="btn" type="submit" {{ $isConfigured ? '' : 'disabled' }}>
                Login
            </button>
        </form>
    </div>
</body>

</html>