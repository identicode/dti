<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use App\Store;
use App\User;
use App\Comment;

class DashboardController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth:admin');
	}
	
    public function index()
    {
    	$count['product'] = Product::count();
        $count['store'] = Store::count();
        $count['user'] = User::count();
    	$count['comment'] = Comment::count();
    	$products = Product::all();
    	return view('admin.dashboard')
    			->with('count', $count)
    			->with('products', $products);
    }
}
