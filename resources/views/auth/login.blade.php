<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Paradise Restaurant</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            width: 100%;
            font-family: "Poppins", sans-serif;
            background: url('{{ asset('images/restaurant-bg.jpg') }}') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.35);
            z-index: 1;
        }

        .login-container {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            padding: 50px 60px;
            text-align: center;
            color: #fff;
            width: 400px;
            box-shadow: 0 0 40px rgba(255,165,0,0.25);
            animation: fadeIn 1.2s ease-in-out;
        }

        .login-container h1 {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(45deg, #ffb347, #ff8c00, #ff6600);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
        }

        .login-container p {
            color: #ffe8c2;
            margin-bottom: 25px;
            font-size: 1rem;
        }

        .alert {
            background: rgba(255, 77, 77, 0.15);
            border: 1px solid rgba(255, 77, 77, 0.4);
            color: #ffaaaa;
            padding: 10px 15px;
            border-radius: 10px;
            font-size: 0.95rem;
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group {
            text-align: left;
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 0.95rem;
            color: #fff3e0;
            margin-bottom: 6px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            outline: none;
            transition: 0.3s;
        }

        .form-group input:focus {
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 0 15px rgba(255,165,0,0.6);
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(45deg, #ffb347, #ff8c00);
            color: #fff;
            border: none;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
            margin-top: 10px;
        }

        .btn:hover {
            background: linear-gradient(45deg, #ffd480, #ff9c33);
            box-shadow: 0 0 30px rgba(255,165,0,0.5);
            transform: translateY(-2px);
        }

        .forgot-link {
            display: block;
            text-align: right;
            font-size: 0.9rem;
            color: #ffd480;
            text-decoration: none;
            margin-top: 8px;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .footer-text {
            margin-top: 25px;
            font-size: 0.95rem;
            color: #fff3e0;
        }

        .footer-text a {
            color: #ffd480;
            text-decoration: none;
            font-weight: 600;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 480px) {
            .login-container {
                width: 90%;
                padding: 40px 30px;
            }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>

    <div class="login-container">
        <h1>Welcome Back 🍜</h1>
        <p>Log in to manage your food reservations and orders.</p>

        <!-- Error Alert -->
        @if ($errors->any())
            <div class="alert">
                <strong>⚠️ Invalid login details!</strong>
                <ul style="margin:5px 0 0 20px; padding:0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" required placeholder="Enter your email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required placeholder="Enter your password">
            </div>

            <a href="{{ route('password.request') }}" class="forgot-link">Forgot your password?</a>

            <button type="submit" class="btn">Log In</button>
        </form>

        <div class="footer-text">
            <p>Don’t have an account? <a href="{{ route('register') }}">Register here</a></p>
        </div>
    </div>
</body>
</html>
