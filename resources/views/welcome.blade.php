<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="
  margin:0;
  font-family:'Poppins', sans-serif;
  min-height:100vh;
  display:flex;
  flex-direction:column;
  justify-content:space-between;
  color:#f8fafc;
  background:url('{{ asset('images/background.jpg') }}') center/cover no-repeat fixed;
  position:relative;
  overflow:hidden;
">

  <!-- Transparent overlay for readability -->
  <div style="
    position:absolute;
    inset:0;
    background:rgba(0,0,0,0.6);
    backdrop-filter:blur(10px);
    -webkit-backdrop-filter:blur(10px);
    z-index:0;
  "></div>

  <!-- Content Wrapper -->
  <div style="position:relative; z-index:1;">

    <!-- Navbar -->
    <nav style="
      display:flex;
      justify-content:space-between;
      align-items:center;
      padding:15px 40px;
      background:rgba(255,255,255,0.08);
      backdrop-filter:blur(20px);
      -webkit-backdrop-filter:blur(20px);
      border-bottom:1px solid rgba(255,255,255,0.15);
      box-shadow:0 4px 20px rgba(0,0,0,0.2);
      position:sticky;
      top:0;
      z-index:10;
    ">
      
      <!-- Logo + Brand -->
      <div style="display:flex; align-items:center; gap:12px;">
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="logo-img">
        <span style="color:white; font-size:22px; font-weight:600;">FoodieReserve</span>
      </div>

      <!-- Navigation Links -->
      <div style="display:flex; gap:30px;">
        <a href="{{ route('login') }}" class="nav-btn">Login</a>
        <a href="{{ route('register') }}" class="nav-btn">Register</a>
      </div>
    </nav>

    <!-- Hero Section -->
    <section style="
      text-align:center;
      padding:140px 20px 80px;
      position:relative;
    ">
      <div style="animation: fadeInUp 1s ease-out;">
        <h1 style="
          font-size:52px;
          font-weight:800;
          color:white;
          text-shadow:0 0 25px rgba(0,0,0,0.4);
          margin-bottom:25px;
        ">
          Seamless <span style="color:#fde047;">Online Booking</span>
        </h1>
        <p style="
          color:rgba(255,255,255,0.85);
          font-size:18px;
          max-width:600px;
          margin:0 auto 50px;
        ">
          Reserve your favorite meals anytime, anywhere — beautifully simple and fast.
        </p>
        <a href="{{ route('login') }}" class="hero-btn">Get Started</a>
      </div>

      <div style="
        position:absolute;
        left:50%;
        transform:translateX(-50%);
        bottom:-50px;
        background:rgba(255,255,255,0.1);
        backdrop-filter:blur(10px);
        padding:20px 40px;
        border-radius:20px;
        border:1px solid rgba(255,255,255,0.15);
        color:rgba(255,255,255,0.9);
        font-size:14px;
        box-shadow:0 4px 20px rgba(0,0,0,0.25);
      ">
        🌟 Experience modern dining — your reservation, simplified.
      </div>
    </section>

    <!-- Footer -->
    <footer style="
      text-align:center;
      padding:30px 0;
      color:rgba(255,255,255,0.7);
      font-size:14px;
    ">
      &copy; {{ date('Y') }} FoodieReserve. All rights reserved.
    </footer>
  </div>

  <!-- Styles -->
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .logo-img {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid rgba(255,255,255,0.4);
      transition: transform 0.4s ease, box-shadow 0.4s ease;
      cursor: pointer;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }

    .logo-img:hover {
      transform: scale(1.2) rotate(-3deg);
      box-shadow: 0 0 25px rgba(255,255,255,0.7);
    }

    .nav-btn {
      color: rgba(255,255,255,0.9);
      text-decoration: none;
      font-weight: 500;
      font-size: 16px;
      position: relative;
      transition: all 0.3s ease;
    }

    .nav-btn::after {
      content: "";
      position: absolute;
      left: 0;
      bottom: -4px;
      width: 0%;
      height: 2px;
      background: #fde047;
      transition: width 0.3s ease;
    }

    .nav-btn:hover::after {
      width: 100%;
    }

    .nav-btn:hover {
      color: #fde047;
    }

    .hero-btn {
      background: linear-gradient(90deg, #fde047, #facc15);
      color: #111827;
      font-weight: 600;
      padding: 14px 38px;
      border-radius: 40px;
      text-decoration: none;
      box-shadow: 0 6px 15px rgba(0,0,0,0.25);
      transition: all 0.4s ease;
      display: inline-block;
    }

    .hero-btn:hover {
      transform: translateY(-4px) scale(1.05);
      box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    }

    .hero-btn:active {
      transform: translateY(0);
      box-shadow: 0 5px 10px rgba(0,0,0,0.2);
    }
  </style>
</body>
</html>
