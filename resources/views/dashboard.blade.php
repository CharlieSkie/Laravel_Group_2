<x-app-layout>
    <x-slot name="header">
        <h2 style="
            font-weight: 700;
            font-size: 28px;
            color: #1f2937;
            text-align: center;
            margin-top: 20px;
            letter-spacing: 0.5px;
        ">
            {{ __('🏖️ Dashboard') }}
        </h2>
    </x-slot>

    <div style="
        background: #f3f4f6;
        min-height: 100vh;
        padding: 60px 20px;
        display: flex;
        justify-content: center;
    ">
        <div style="
            width: 100%;
            max-width: 1100px;
            display: flex;
            flex-direction: column;
            gap: 32px;
        ">

            <!-- Welcome Card -->
            <div style="
                background: white;
                border-radius: 16px;
                box-shadow: 0 6px 18px rgba(0,0,0,0.08);
                padding: 32px;
                transition: all 0.3s ease;
                text-align: center;
            "
            onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 10px 24px rgba(0,0,0,0.12)';"
            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 18px rgba(0,0,0,0.08)';">
                <h3 style="font-size: 22px; font-weight: 600; color: #111827; margin-bottom: 10px;">
                    👋 Welcome Back, {{ Auth::user()->name }}!
                </h3>
                <p style="color: #6b7280; font-size: 16px; margin-bottom: 0;">
                    {{ __("You're successfully logged in to your dashboard.") }}
                </p>
            </div>

            <!-- Stats Cards Row -->
            <div style="
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
                gap: 24px;
            ">
                <!-- Card 1 -->
                <div style="
                    background: white;
                    border-radius: 14px;
                    box-shadow: 0 6px 16px rgba(0,0,0,0.08);
                    padding: 24px;
                    text-align: center;
                    transition: all 0.3s ease;
                "
                onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 20px rgba(0,0,0,0.12)';"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 16px rgba(0,0,0,0.08)';">
                    <div style="font-size: 32px;">🏨</div>
                    <h4 style="font-size: 18px; font-weight: 600; color: #1f2937; margin-top: 8px;">Active Bookings</h4>
                    <p style="font-size: 16px; color: #6b7280; margin-top: 4px;">12 current reservations</p>
                </div>

                <!-- Card 2 -->
                <div style="
                    background: white;
                    border-radius: 14px;
                    box-shadow: 0 6px 16px rgba(0,0,0,0.08);
                    padding: 24px;
                    text-align: center;
                    transition: all 0.3s ease;
                "
                onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 20px rgba(0,0,0,0.12)';"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 16px rgba(0,0,0,0.08)';">
                    <div style="font-size: 32px;">💰</div>
                    <h4 style="font-size: 18px; font-weight: 600; color: #1f2937; margin-top: 8px;">Total Revenue</h4>
                    <p style="font-size: 16px; color: #6b7280; margin-top: 4px;">₱45,230 this month</p>
                </div>

                <!-- Card 3 -->
                <div style="
                    background: white;
                    border-radius: 14px;
                    box-shadow: 0 6px 16px rgba(0,0,0,0.08);
                    padding: 24px;
                    text-align: center;
                    transition: all 0.3s ease;
                "
                onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 20px rgba(0,0,0,0.12)';"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 16px rgba(0,0,0,0.08)';">
                    <div style="font-size: 32px;">⭐</div>
                    <h4 style="font-size: 18px; font-weight: 600; color: #1f2937; margin-top: 8px;">Customer Feedback</h4>
                    <p style="font-size: 16px; color: #6b7280; margin-top: 4px;">4.8 / 5 average rating</p>
                </div>
            </div>

            <!-- Extra Info Card -->
            <div style="
                background: white;
                border-radius: 16px;
                box-shadow: 0 6px 18px rgba(0,0,0,0.08);
                padding: 28px;
                text-align: left;
                transition: all 0.3s ease;
            "
            onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 10px 24px rgba(0,0,0,0.12)';"
            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 18px rgba(0,0,0,0.08)';">
                <h4 style="font-size: 20px; font-weight: 600; color: #111827; margin-bottom: 10px;">
                    📊 Recent Activity
                </h4>
            </div>

        </div>
    </div>
</x-app-layout>
