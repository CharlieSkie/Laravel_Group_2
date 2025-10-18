<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-indigo-500 via-blue-500 to-cyan-400 min-h-screen flex flex-col justify-between font-sans text-gray-800">

    <!-- Navbar -->
    <nav class="flex justify-between items-center px-8 py-6 bg-white/10 backdrop-blur-md shadow-sm">
        <div class="flex space-x-4">
            <a href="{{ route('login') }}" class="text-white hover:text-gray-200 font-medium transition">Login</a>
            <a href="{{ route('register') }}" class="text-white hover:text-gray-200 font-medium transition">Register</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="flex flex-col items-center text-center px-6 mt-10 md:mt-20">
        <div class="animate-fadeInUp space-y-6">
            <img src="{{ asset('images/logo.jpg') }}" 
                 alt="Logo" 
                 class="w-14 h-14 mx-auto rounded-full shadow-xl ring-4 ring-white/40 mb-4">

            <h1 class="text-4xl md:text-5xl font-extrabold text-white drop-shadow-lg">
                Seamless <span class="text-yellow-300">Online Booking</span>
            </h1>

            <p class="text-lg text-white/90 max-w-2xl mx-auto">
                Book what food like in our store.
            </p>

            <div class="mt-10">
                <a href="{{ route('login') }}" 
                   class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold px-10 py-3 rounded-full shadow-lg transition duration-400">
                   Get Started
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-6 mt-20 text-white/80 text-sm">
        
    </footer>

    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeInUp {
            animation: fadeInUp 1s ease-out;
        }
    </style>

</body>
</html>
