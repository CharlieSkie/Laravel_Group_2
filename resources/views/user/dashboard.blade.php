<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">{{ Auth::user()->name }}</h2>
    </x-slot>

    <div class="py-12 text-center">
        <h1 class="text-3xl font-bold text-green-700 min-h-[2rem]">
            <span id="typingText"></span>
            <span id="cursor" class="inline-block w-1 bg-green-700 ml-1 animate-pulse"></span>
        </h1>

        <!-- Food Section -->
        <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
            @foreach($foods as $food)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:scale-105 transition transform">
                    <img src="{{ asset('storage/'.$food->image) }}" alt="{{ $food->name }}" class="h-48 w-full object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-bold text-gray-800">{{ $food->name }}</h3>
                        <p class="text-gray-500 mt-2">{{ Str::limit($food->description, 80) }}</p>
                        <p class="text-green-600 font-semibold mt-3">₱{{ number_format($food->price, 2) }}</p>

                        <a href="{{ route('foods.show', $food->id) }}" 
                           class="inline-block mt-4 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                            View & Reserve
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- ✅ Floating Menu Button -->
    <div class="fixed bottom-6 right-6">
        <button id="menuBtn" 
                class="bg-green-600 text-white rounded-full shadow-lg w-14 h-14 flex items-center justify-center text-2xl font-bold hover:bg-green-700 hover:scale-110 transition-transform duration-300"
                title="Open Menu">
            🍽️
        </button>

        <!-- ✅ Hidden Pop-up Menu -->
        <div id="menuPopup" class="hidden flex-col bg-white shadow-xl rounded-lg mt-2 absolute bottom-16 right-0 w-44 text-gray-700">
            <a href="{{ route('foods.index') }}" class="block px-4 py-2 hover:bg-green-100">🍛 View Foods</a>
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-green-100">🏠 Dashboard</a>
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-green-100">👤 Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-red-100 text-red-600">🚪 Logout</button>
            </form>
        </div>
    </div>

    <!-- ✅ Typing Animation + Menu Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // ✨ Typing effect
            const text = "Check out our delicious menu below!";
            const typingElement = document.getElementById("typingText");
            const cursor = document.getElementById("cursor");
            let index = 0;
            let isDeleting = false;

            function typeLoop() {
                if (!isDeleting && index <= text.length) {
                    typingElement.textContent = text.substring(0, index);
                    index++;
                } else if (isDeleting && index >= 0) {
                    typingElement.textContent = text.substring(0, index);
                    index--;
                }

                let speed = isDeleting ? 50 : 80;
                if (index === text.length) {
                    isDeleting = true;
                    speed = 1500;
                } else if (index === 0 && isDeleting) {
                    isDeleting = false;
                    speed = 1000;
                }

                cursor.style.opacity = cursor.style.opacity === "0" ? "1" : "0";
                setTimeout(typeLoop, speed);
            }
            typeLoop();

            // 🍽️ Floating menu toggle
            const menuBtn = document.getElementById('menuBtn');
            const menuPopup = document.getElementById('menuPopup');

            menuBtn.addEventListener('click', () => {
                menuPopup.classList.toggle('hidden');
            });

            // Close menu if click outside
            document.addEventListener('click', (e) => {
                if (!menuBtn.contains(e.target) && !menuPopup.contains(e.target)) {
                    menuPopup.classList.add('hidden');
                }
            });
        });
    </script>
</x-app-layout>
