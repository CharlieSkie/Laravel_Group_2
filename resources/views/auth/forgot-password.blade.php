<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Food Reservation</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            width: 100%;
            font-family: "Poppins", sans-serif;
            background: url('{{ asset('images/restaurant-bg1.jpg') }}') center/cover no-repeat;
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

        .forgot-container {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            padding: 50px 60px;
            text-align: center;
            color: #fff;
            width: 420px;
            box-shadow: 0 0 40px rgba(255,165,0,0.25);
            animation: fadeIn 1.2s ease-in-out;
        }

        .forgot-container h1 {
            font-size: 2.2rem;
            font-weight: 700;
            background: linear-gradient(45deg, #ffb347, #ff8c00, #ff6600);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 15px;
        }

        .forgot-container p {
            color: #ffe8c2;
            margin-bottom: 25px;
            font-size: 1rem;
        }

        .form-group {
            text-align: left;
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
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
            border: none;
            border-radius: 30px;
            font-weight: 600;
            color: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn:hover {
            background: linear-gradient(45deg, #ffd480, #ff9c33);
            box-shadow: 0 0 30px rgba(255,165,0,0.5);
            transform: translateY(-2px);
        }

        .footer-text {
            margin-top: 25px;
            color: #fff3e0;
            font-size: 0.95rem;
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
            .forgot-container {
                width: 90%;
                padding: 40px 30px;
            }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>

    <div class="forgot-container">
        <h1>Forgot Password 🍱</h1>
        <p>No worries! Enter your email and we’ll send you a reset link.</p>

        <!-- Session Status -->
        @if (session('status'))
            <p style="color:#ffd480; background:rgba(255,255,255,0.1); padding:8px 10px; border-radius:8px;">
                {{ session('status') }}
            </p>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus placeholder="Enter your registered email">
                @error('email')
                    <p style="color:#ffaaaa; font-size:0.9rem; margin-top:5px;">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn">Send Password Reset Link</button>
        </form>

        <div class="footer-text">
            <p>Remembered your password? <a href="{{ route('login') }}">Back to Login</a></p>
        </div>
    </div>
</body>
</html>
