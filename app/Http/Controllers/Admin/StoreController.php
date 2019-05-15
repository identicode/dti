<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Store;
use App\Master;
use App\Product;

class StoreController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();
        return view('admin.store.list')
                ->with('stores', $stores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = Product::all();

        $store = Store::create([
            'name' => $request->store,
            'address' => $request->address
        ]);

        foreach($products as $product){
            Master::create([
                'price' => '',
                'product_id' => $product->id,
                'store_id' => $store->id,
                'timestamp' => ''
            ]);
        }

        return redirect()->back()->with('success', 'Store has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Master::with('product.category')->where('store_id', $id)->get();
        $store = Store::find($id);

        return view('admin.store.view')
                ->with('store', $store)
                ->with('products', $products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Master::with('product.category')->where('store_id', $id)->get();
        $store = Store::find($id);

        return view('admin.store.update')
                ->with('store', $store)
                ->with('products', $products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $update = Store::find($request->sid);
        $update->name = $request->name;
        $update->save();

        return redirect()->back()->with('success', 'Store has been updated');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePrice(Request $request)
    {
        $products = array_combine($request->pid, $request->product);

        foreach($products as $prd_id => $prd_price)
        {
            if($prd_price !== null){
                $update = Master::where('product_id', $prd_id)
                        ->where('store_id', $request->store_id)
                        ->update(['price' => $prd_price]);
                
            }
        }

        return redirect('/admin/store/show/'.$request->store_id)->with('success', 'Product list has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Master::where('store_id', $id)->delete();
        Store::find($id)->delete();

        return redirect()->back()->with('success', 'Store has been deleted.');
    }
}
