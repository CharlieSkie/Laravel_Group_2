<nav x-data="{ open: false }" style="background-color:#ffffff; border-bottom:1px solid #e5e7eb; box-shadow:0 2px 6px rgba(0,0,0,0.05); position:relative; z-index:100;">
    <div style="max-width:1200px; margin:0 auto; padding:0 1.5rem;">
        <div style="display:flex; justify-content:space-between; align-items:center; height:4rem;">

            <!-- Logo + Links -->
            <div style="display:flex; align-items:center;">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" style="display:flex; align-items:center; text-decoration:none;">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="width:36px; height:36px; border-radius:50%; transition:transform 0.3s;">
                </a>

                <!-- Desktop Links -->
                <div style="display:flex; gap:1.5rem; margin-left:2rem;" class="nav-links">
                    <a href="{{ route('dashboard') }}" style="text-decoration:none; color:#374151; font-weight:500;">🏠 Dashboard</a>
                    <a href="{{ route('menu') }}" style="text-decoration:none; color:#374151; font-weight:500;">🍛 Menu</a>
                    <a href="{{ route('reservations.index') }}" style="text-decoration:none; color:#374151; font-weight:500;">📅 Reservations</a>
                </div>
            </div>

            <!-- Right Section -->
            <div style="display:flex; align-items:center; gap:1rem; position:relative;">

                <!-- User Dropdown -->
                <div style="position:relative;">
                    <button @click="open = !open" style="background:none; border:none; cursor:pointer; display:flex; align-items:center; font-weight:500; color:#374151;">
                        {{ Auth::user()->name }}
                        <svg style="width:16px; height:16px; margin-left:4px; fill:currentColor;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.away="open = false" style="position:absolute; right:0; margin-top:8px; background:#fff; border:1px solid #e5e7eb; border-radius:8px; box-shadow:0 4px 10px rgba(0,0,0,0.1); width:180px; overflow:hidden; z-index:50;">
                        <a href="{{ route('profile.edit') }}" style="display:block; padding:0.75rem 1rem; color:#374151; text-decoration:none; font-size:0.95rem; transition:background-color 0.3s;" onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='transparent'">👤 Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" style="display:block; width:100%; text-align:left; padding:0.75rem 1rem; border:none; background:none; color:#dc2626; font-size:0.95rem; cursor:pointer;" onmouseover="this.style.backgroundColor='#fee2e2'" onmouseout="this.style.backgroundColor='transparent'">🚪 Logout</button>
                        </form>
                    </div>
                </div>

                <!-- Floating Hamburger Menu Icon -->
                <button id="hamburger-btn" style="background:none; border:none; cursor:pointer; display:block; padding:4px; transition:transform 0.3s ease;">
                    <svg id="hamburger-icon" style="width:26px; height:26px; color:#374151;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" style="display:none; flex-direction:column; background-color:#fff; border-top:1px solid #e5e7eb; padding:1rem; transition:all 0.3s ease;">
        <a href="{{ route('dashboard') }}" style="padding:0.5rem 0; color:#374151; text-decoration:none;">🏠 Dashboard</a>
        <a href="{{ route('menu') }}" style="padding:0.5rem 0; color:#374151; text-decoration:none;">🍛 Menu</a>
        <a href="{{ route('reservations.index') }}" style="padding:0.5rem 0; color:#374151; text-decoration:none;">📅 Reservations</a>
        <a href="{{ route('profile.edit') }}" style="padding:0.5rem 0; color:#374151; text-decoration:none;">👤 Profile</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="padding:0.5rem 0; border:none; background:none; color:#dc2626; text-align:left; cursor:pointer;">🚪 Logout</button>
        </form>
    </div>

    <!-- Toggle Script -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const btn = document.getElementById("hamburger-btn");
            const menu = document.getElementById("mobile-menu");

            btn.addEventListener("click", () => {
                const isVisible = menu.style.display === "flex";
                menu.style.display = isVisible ? "none" : "flex";
                btn.style.transform = isVisible ? "rotate(0deg)" : "rotate(90deg)";
            });
        });
    </script>
</nav>
