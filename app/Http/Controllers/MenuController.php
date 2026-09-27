<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;

class MenuController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        abort_unless($restaurant->is_active, 404);

        $restaurant->load([
            'categories' => function ($query) {
                $query
                    ->where('is_active', true)
                    ->orderBy('sort_order')
                    ->with([
                        'menuItems' => function ($query) {
                            $query
                                ->where('is_available', true)
                                ->orderBy('sort_order');
                        },
                    ]);
            },
        ]);

        return view('menu.index', [
            'restaurant' => $restaurant,
        ]);
    }
}
