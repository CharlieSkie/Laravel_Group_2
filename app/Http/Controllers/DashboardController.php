<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Food;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            return view('admin.dashboard');
        }

        //  Temporary sample menu 
        if (Food::count() === 0) {
            $foods = [
                (object)[
                    'id' => 1,
                    'name' => 'Beef Steak',
                    'description' => 'Juicy beef steak served with garlic rice and gravy.',
                    'price' => 250,
                    'image' => 'https://images.unsplash.com/photo-1606756790138-9b5a22d38d4e?auto=format&fit=crop&w=600&q=80'
                ],
                (object)[
                    'id' => 2,
                    'name' => 'Chicken Adobo',
                    'description' => 'Classic Filipino adobo with soy sauce and vinegar flavor.',
                    'price' => 180,
                    'image' => 'https://images.unsplash.com/photo-1604908177225-dc2f4a6e0b4c?auto=format&fit=crop&w=600&q=80'
                ],
                (object)[
                    'id' => 3,
                    'name' => 'Pork Sinigang',
                    'description' => 'Tamarind-based soup with tender pork and vegetables.',
                    'price' => 200,
                    'image' => 'https://images.unsplash.com/photo-1627308595229-7830a5c91f9f?auto=format&fit=crop&w=600&q=80'
                ],
                (object)[
                    'id' => 4,
                    'name' => 'Carbonara',
                    'description' => 'Creamy pasta topped with bacon and parmesan cheese.',
                    'price' => 220,
                    'image' => 'https://images.unsplash.com/photo-1603133872878-684f208fb84b?auto=format&fit=crop&w=600&q=80'
                ],
                (object)[
                    'id' => 5,
                    'name' => 'Cheeseburger',
                    'description' => 'Grilled burger with melted cheese, lettuce, and tomato.',
                    'price' => 150,
                    'image' => 'https://images.unsplash.com/photo-1550547660-d9450f859349?auto=format&fit=crop&w=600&q=80'
                ],
                (object)[
                    'id' => 6,
                    'name' => 'Halo-Halo',
                    'description' => 'A refreshing Filipino dessert with shaved ice and sweet toppings.',
                    'price' => 120,
                    'image' => 'https://images.unsplash.com/photo-1625943554168-1e1a3c7b21b8?auto=format&fit=crop&w=600&q=80'
                ],
            ];
        } else {
            $foods = Food::all();
        }

        //  Pass user dashboard view
        return view('user.dashboard', compact('foods'));
    }
}
