<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();

        return view('shops.index', compact('shops'));
    }

    public function create()
    {
        return view('shops.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'lat' => 'required',
            'lng' => 'required',
        ]);

        $shop = Shop::create($request->only('name', 'lat', 'lng'));

        return back()->with('msg', ['success', 'Barbershop registered successfully.']);
    }

    public function show(Shop $shop)
    {
        $shop->load('barbers');

        return view('shops.show', compact('shop'));
    }
}
