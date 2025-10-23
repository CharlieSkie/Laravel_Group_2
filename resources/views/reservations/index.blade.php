<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight:600; font-size:1.25rem; color:#2d3748;">Reservation List</h2>
    </x-slot>

    <div style="padding:2rem; max-width:1000px; margin:auto;">
        <h1 style="font-size:1.875rem; font-weight:700; color:#047857; text-align:center; margin-bottom:1.5rem;">
            📋 Your Table Reservations
        </h1>

        @if($reservations->count() > 0)
            <div style="overflow-x:auto;">
                <table style="width:100%; border-collapse:collapse; background-color:white; border-radius:8px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
                    <thead style="background-color:#16a34a; color:white;">
                        <tr>
                            <th style="padding:12px;">#</th>
                            <th style="padding:12px; text-align:left;">Name</th>
                            <th style="padding:12px; text-align:left;">Date</th>
                            <th style="padding:12px; text-align:left;">Time</th>
                            <th style="padding:12px; text-align:left;">Guests</th>
                            <th style="padding:12px; text-align:left;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                            <tr style="border-bottom:1px solid #e5e7eb;">
                                <td style="padding:12px; text-align:center;">{{ $loop->iteration }}</td>
                                <td style="padding:12px;">{{ $reservation->name }}</td>
                                <td style="padding:12px;">{{ \Carbon\Carbon::parse($reservation->date)->format('M d, Y') }}</td>
                                <td style="padding:12px;">{{ \Carbon\Carbon::parse($reservation->time)->format('h:i A') }}</td>
                                <td style="padding:12px;">{{ $reservation->guest_count }}</td>
                                <td style="padding:12px;">
                                    <span style="
                                        background-color:
                                            {{ $reservation->status === 'Approved' ? '#dcfce7' :
                                               ($reservation->status === 'Cancelled' ? '#fee2e2' : '#fef9c3') }};
                                        color:
                                            {{ $reservation->status === 'Approved' ? '#166534' :
                                               ($reservation->status === 'Cancelled' ? '#991b1b' : '#92400e') }};
                                        padding:4px 10px;
                                        border-radius:8px;
                                        font-weight:600;
                                    ">
                                        {{ $reservation->status }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p style="text-align:center; color:#6b7280;">You have no reservations yet.</p>
        @endif
    </div>
</x-app-layout>
