<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight:600; font-size:1.25rem; color:#2d3748;">{{ Auth::user()->name }}</h2>
    </x-slot>

    <div style="padding-top:3rem; text-align:center;">
        <h1 style="font-size:1.875rem; font-weight:700; color:#047857; min-height:2rem;">
            <span id="typingText"></span>
            <span id="cursor" style="display:inline-block; width:4px; background-color:#047857; margin-left:4px; animation:pulse 1s infinite;"></span>
        </h1>

        <!-- ✅ Food Section -->
        <div style="margin-top:2.5rem; display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:1.5rem; max-width:1200px; margin-left:auto; margin-right:auto;">
            @foreach($foods as $food)
                <div style="background-color:#fff; border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,0.1); overflow:hidden; transition:transform 0.3s;"
                     onmouseover="this.style.transform='scale(1.05)';"
                     onmouseout="this.style.transform='scale(1)'">
                    <img src="{{ asset('storage/'.$food->image) }}" alt="{{ $food->name }}" style="height:12rem; width:100%; object-fit:cover;">
                    <div style="padding:1rem; text-align:left;">
                        <h3 style="font-size:1.25rem; font-weight:700; color:#2d3748;">{{ $food->name }}</h3>
                        <p style="color:#6b7280; margin-top:0.5rem;">{{ Str::limit($food->description, 80) }}</p>
                        <p style="color:#16a34a; font-weight:600; margin-top:0.75rem;">₱{{ number_format($food->price, 2) }}</p>

                        <a href="{{ route('foods.show', $food->id) }}" 
                           style="display:inline-block; margin-top:1rem; background-color:#16a34a; color:#fff; padding:0.5rem 1rem; border-radius:8px; text-decoration:none; transition:background-color 0.3s;"
                           onmouseover="this.style.backgroundColor='#15803d';"
                           onmouseout="this.style.backgroundColor='#16a34a';">
                            View & Reserve
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- ✅ Floating Menu Button -->
    <div style="position:fixed; bottom:1.5rem; right:1.5rem;">
        <button id="menuBtn"
                style="background-color:#16a34a; color:#fff; border:none; border-radius:50%; width:3.5rem; height:3.5rem; box-shadow:0 4px 10px rgba(0,0,0,0.2); font-size:1.5rem; font-weight:700; display:flex; align-items:center; justify-content:center; cursor:pointer; transition:transform 0.3s, background-color 0.3s;"
                title="Open Menu"
                onmouseover="this.style.backgroundColor='#15803d'; this.style.transform='scale(1.1)';"
                onmouseout="this.style.backgroundColor='#16a34a'; this.style.transform='scale(1)';">
            🍽️
        </button>

        <!-- ✅ Hidden Pop-up Menu -->
        <div id="menuPopup" style="display:none; flex-direction:column; background-color:#fff; box-shadow:0 4px 10px rgba(0,0,0,0.15); border-radius:8px; margin-top:0.5rem; position:absolute; bottom:4rem; right:0; width:11rem; color:#374151; overflow:hidden;">
            <a href="{{ route('foods.index') }}" style="display:block; padding:0.5rem 1rem; text-decoration:none; color:inherit;" onmouseover="this.style.backgroundColor='#dcfce7';" onmouseout="this.style.backgroundColor='transparent';">🍛 View Foods</a>
            <a href="{{ route('dashboard') }}" style="display:block; padding:0.5rem 1rem; text-decoration:none; color:inherit;" onmouseover="this.style.backgroundColor='#dcfce7';" onmouseout="this.style.backgroundColor='transparent';">🏠 Dashboard</a>
            <a href="{{ route('reservations.index') }}" style="display:block; padding:0.5rem 1rem; text-decoration:none; color:inherit;" onmouseover="this.style.backgroundColor='#dcfce7';" onmouseout="this.style.backgroundColor='transparent';">📋 Reservation List</a> <!-- ✅ Added this line -->
            <a href="{{ route('profile.edit') }}" style="display:block; padding:0.5rem 1rem; text-decoration:none; color:inherit;" onmouseover="this.style.backgroundColor='#dcfce7';" onmouseout="this.style.backgroundColor='transparent';">👤 Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="width:100%; text-align:left; padding:0.5rem 1rem; border:none; background:none; color:#dc2626; cursor:pointer;" onmouseover="this.style.backgroundColor='#fee2e2';" onmouseout="this.style.backgroundColor='transparent';">🚪 Logout</button>
            </form>
        </div>
    </div>

    <!-- ✅ Typing Animation + Menu Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Typing effect
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

            // Floating menu toggle
            const menuBtn = document.getElementById('menuBtn');
            const menuPopup = document.getElementById('menuPopup');

            menuBtn.addEventListener('click', () => {
                menuPopup.style.display = menuPopup.style.display === 'none' || menuPopup.style.display === '' ? 'flex' : 'none';
            });

            document.addEventListener('click', (e) => {
                if (!menuBtn.contains(e.target) && !menuPopup.contains(e.target)) {
                    menuPopup.style.display = 'none';
                }
            });
        });

        // Pulse animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes pulse {
                0%, 100% { opacity: 1; }
                50% { opacity: 0; }
            }
        `;
        document.head.appendChild(style);
    </script>
</x-app-layout>
