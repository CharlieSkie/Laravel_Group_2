<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of all foods (for dashboard).
     */
    public function index()
    {
        $foods = Food::all();
        return view('menu', compact('foods')); // Pass food data to dashboard
    }

    /**
     * Display a specific food item.
     */
    public function show($id)
    {
        $food = Food::findOrFail($id);
        return view('foods.show', compact('food'));
    }

    /**
     * Display all foods for the Menu List Dashboard.
     */
    public function menu()
    {
        $foods = Food::all();
        return view('menu', compact('foods')); // 👈 points to resources/views/menu.blade.php
    }
}
