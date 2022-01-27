<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class BarberController extends Controller
{
    public function store(Request $request, Shop $shop)
    {
        $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2'
        ]);

        $barber = $shop->barbers()->create($request->only('first_name', 'last_name'));

        return back()->with('msg', ['success', 'Your information registered successfully.']);
    }
}
