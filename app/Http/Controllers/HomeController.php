<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Store;
use App\Product;
use App\Master;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $products = Product::all();
        $stores = Store::all();
        return view('landing')
                ->with('stores', $stores)
                ->with('products', $products);
    }

    public function store($id)
    {
        $storeInfo = Store::find($id);
        $stores = Store::all();
        $products = Master::with('product.category')->where('store_id', $id)->get();

        return view('store')
                ->with('storeInfo', $storeInfo)
                ->with('stores', $stores)
                ->with('products', $products);


    }
}
