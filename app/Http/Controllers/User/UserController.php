<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Store;
use App\Product;
use App\Master;
use App\Comment;

use Auth;

class UserController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth');
	}

    public function store($id)
    {
    	if($id == 0){

    		$products = Product::all();
        	$stores = Store::all();
        	return view('user.store')
                ->with('id', $id)
                ->with('stores', $stores)
                ->with('products', $products);

    	}else{


    		$products = Master::with('product.category')->where('store_id', $id)->get();
    		$storeInfo = Store::find($id);
        	$stores = Store::all();
        	return view('user.store')
                ->with('id', $id)
                ->with('storeInfo', $storeInfo)
                ->with('stores', $stores)
                ->with('products', $products);


    	}
    	
    }

    public function commentBox()
    {
        $comments = Comment::where('user_id', Auth::user()->id)->paginate(12);
        return view('user.comment')
                ->with('comments', $comments);
    }

    public function comment(Request $request)
    {
    	Comment::create([
    		'comment' => $request->comment,
    		'user_id' => Auth::user()->id,
    		'timestamp' => time()
    	]);

    	return redirect()->back()->with('success', 'Your comment has been posted.');
    }

    public function commentDelete($id)
    {
        Comment::find($id)->delete();

        return redirect()->back()->with('success', 'Comment has been deleted.');
    }
}
