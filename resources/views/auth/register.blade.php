<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Paradise Restaurant</title>
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
        .register-container {
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
        .register-container h1 {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(45deg, #ffb347, #ff8c00, #ff6600);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 15px;
        }
        .register-container p {
            color: #ffe8c2;
            margin-bottom: 25px;
            font-size: 1rem;
        }
        .form-group { text-align: left; margin-bottom: 18px; }
        .form-group label { color: #fff3e0; display: block; margin-bottom: 6px; }
        .form-group input {
            width: 100%; padding: 12px 15px; border: none;
            border-radius: 8px; font-size: 1rem;
            background: rgba(255, 255, 255, 0.12); color: #fff; outline: none; transition: 0.3s;
        }
        .form-group input:focus {
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 0 15px rgba(255,165,0,0.6);
        }
        .btn {
            width: 100%; padding: 12px;
            background: linear-gradient(45deg, #ffb347, #ff8c00);
            border: none; border-radius: 30px;
            font-weight: 600; color: #fff;
            cursor: pointer; transition: 0.3s; margin-top: 10px;
        }
        .btn:hover {
            background: linear-gradient(45deg, #ffd480, #ff9c33);
            box-shadow: 0 0 30px rgba(255,165,0,0.5);
            transform: translateY(-2px);
        }
        .footer-text { margin-top: 25px; color: #fff3e0; }
        .footer-text a { color: #ffd480; font-weight: 600; text-decoration: none; }
        .footer-text a:hover { text-decoration: underline; }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="register-container">
        <h1>Create Account 🍱</h1>
        <p>Join us and reserve your dining experience!</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input id="name" type="text" name="name" required placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" required placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required placeholder="Enter your password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="Confirm your password">
            </div>
            <button type="submit" class="btn">Register</button>
        </form>

        <div class="footer-text">
            <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
        </div>
    </div>
</body>
</html>
