<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | SPI</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f6fb;
            color: #1e293b;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: #ffffff;
            padding: 40px;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 30px rgba(15, 64, 112, 0.08);
        }

        .logo {
            width: 200px;
            height: 200px;
            margin: 0 auto 4px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #0075db;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #334155;
        }

        .form-group input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
            transition: 0.2s;
        }

        .form-group input:focus {
            border-color: #0f4c81;
            box-shadow: 0 0 0 3px rgba(15, 76, 129, 0.1);
        }

        .error {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
            padding: 10px 12px;
            border-radius: 7px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .success-msg {
            background: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
            padding: 10px 12px;
            border-radius: 7px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: #64748b;
        }

        .register-link a {
            color: #0088ff;
            font-weight: 600;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #0088ff;
            color: white;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover {
            background: #0560b0;
        }

        .footer {
            text-align: center;
            margin-top: 24px;
            font-size: 12px;
            color: #94a3b8;
        }
    </style>
</head>

<body>

    <div class="login-container">

        <div class="login-card">

            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo SPI">
            </div>

            <div class="header">
                <h1>Silakan Login Ke Unit Satuan Pengawas Internal</h1>
            </div>

            @if (session('success'))
                <div class="success-msg">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>

                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Masukkan email" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>

                    <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                </div>

                <button type="submit">
                    Masuk
                </button>

            </form>

            <div class="register-link">
                Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
            </div>

            <div class="footer">
                © {{ date('Y') }} Satuan Pengawas Internal
            </div>

        </div>

    </div>

</body>

</html>