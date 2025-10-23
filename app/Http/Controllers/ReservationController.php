<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    /**
     * Show all reservations (for admin or user view)
     */
    public function index()
    {
        $reservations = Reservation::latest()->get();
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show reservation form for a specific food item
     */
    public function create($id)
    {
        // Pass the food ID to the reservation view
        return view('reserve', ['id' => $id]);
    }
}
