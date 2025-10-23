<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 600; font-size: 20px; color: #333;">
            Reserve Table for Food #{{ $id }}
        </h2>
    </x-slot>

    <div style="padding: 30px; background-color: #f9fafb; min-height: 80vh;">
        <div style="max-width: 600px; margin: 0 auto; background: white; border-radius: 12px; padding: 25px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            
            <h3 style="margin-bottom: 15px; color: #1f2937;">Reservation Form</h3>

            <form method="POST" action="#">
                @csrf
                <div style="margin-bottom: 15px;">
                    <label for="name" style="display:block; font-weight:500;">Full Name</label>
                    <input type="text" id="name" name="name" required
                           style="width:100%; padding:10px; border:1px solid #ccc; border-radius:8px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="email" style="display:block; font-weight:500;">Email</label>
                    <input type="email" id="email" name="email" required
                           style="width:100%; padding:10px; border:1px solid #ccc; border-radius:8px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="date" style="display:block; font-weight:500;">Reservation Date</label>
                    <input type="date" id="date" name="date" required
                           style="width:100%; padding:10px; border:1px solid #ccc; border-radius:8px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="time" style="display:block; font-weight:500;">Time</label>
                    <input type="time" id="time" name="time" required
                           style="width:100%; padding:10px; border:1px solid #ccc; border-radius:8px;">
                </div>

                <div style="text-align:right;">
                    <button type="submit"
                            style="background-color:#2563eb; color:white; padding:10px 18px; border:none; border-radius:8px; cursor:pointer;">
                        Confirm Reservation
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
