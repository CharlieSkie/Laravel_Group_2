<?php

namespace App\Http\Controllers;

use App\Models\Food; // if you want to show food items
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        //  fetch foods to show in the menu
        $foods = Food::all();
        return view('menu.index', compact('foods'));
    }
}
