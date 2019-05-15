<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use App\Product;
use App\Store;
use App\Master;
use App\Price;

class ProductController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:admin');
   
    }
    public function index()
    {

    	$products = Product::all();
    	return view('admin.product.list')
    			->with('products', $products);
    }

    public function create()
    {
    	$category = Category::all();
    	return view('admin.product.add')
    			->with('category', $category);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.product.edit')
                ->with('product', $product)
                ->with('category', $category);
    }

    public function store(Request $request)
    {
        $stores = Store::all();

    	$product = Product::create([
    		'name' => $request->name,
    		'size' => $request->size,
    		'cat_id' => $request->category,
    		'srp' => $request->srp,
    		'timestamp' => ''
    	]);

        foreach($stores as $store){
            Master::create([
                'price' => '',
                'product_id' => $product->id,
                'store_id' => $store->id,
                'timestamp' => ''
            ]);
        }

        Price::create([
            'price' => $request->srp,
            'product_id' => $product->id,
            'timestamp' => time()
        ]);

    	return redirect()->back()->with('success', 'Product has been added.');
    }

    public function update(Request $request, $id)
    {
        $update = Product::find($id);

        if($update->srp != $request->srp){
            $update->lsrp =  $update->srp;
            $update->srp = $request->srp;
            $update->timestamp = time();
        }

        $update->name = $request->name;
        $update->size = $request->size;
        $update->cat_id = $request->category;

        $update->save();

        Price::create([
            'price' => $request->srp,
            'product_id' => $update->id,
            'timestamp' => time()
        ]);

        return redirect('/admin/product/')->with('success', 'Product has been updated.');
    }

    public function massive()
    {
        $products = Product::all();
        return view('admin.product.update')
                ->with('products', $products);
    }

    public function massiveUpdate(Request $request)
    {
        $products = array_combine($request->pid, $request->product);

        foreach($products as $x => $y){
            if($y !== null){

                $update = Product::find($x);
                $update->lsrp = $update->srp;
                $update->srp = $y;
                $update->timestamp = time();
                $update->save();

                Price::create([
                    'price' => $y,
                    'product_id' => $x,
                    'timestamp' => time()
                ]);
            }
        }

        return redirect('/admin/product/')->with('success', 'Product SRP has been updated.');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        Master::where('product_id', $id)->delete();

        return redirect()->back()->with('success', 'Product has been deleted!');
    }

    public function graph($id)
    {
        $product = Product::find($id);
        $prices = Price::where('product_id', $id)->orderBy('id', 'desc')->take(5)->get()->reverse();

        return view('admin.product.graph')
                ->with('product', $product)
                ->with('prices', $prices);
    }
}
