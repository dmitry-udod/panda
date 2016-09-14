<?php

namespace App\Http\Controllers;

use App\Providers\ShopRepository;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ShopRepository $shop)
    {
        $this->shop = $shop;
    }

    /**
     * Show shops list
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = $this->shop->all()->paginate(50);

        return view('welcome', compact('shops'));
    }

    /**
     * Show shops list
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = $this->shop->find($id);

        return view('shops.show', compact('shop'));
    }
}
