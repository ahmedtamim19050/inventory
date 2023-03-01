<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Product;
use Dotenv\Validator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('home', compact('products'));
    }
    public function productStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required',],

        ]);
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        return redirect()->back()->with('success', 'Products create succesfull');
    }
    public function productEdit(Request $request)
    {
        $product = Product::where('id', $request->product_id)->firstOrFail();
        $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required',],

        ]);
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        return redirect()->back()->with('success', 'Products edit succesfull');
    }
    public function productDelete(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'Products Delete succesfull');
    }
    public function histories(Product $product)
    {
        $products = $product->products;
        return view('histories', compact('products', 'product'));
    }
    public function historyStore(Product $product, Request $request)
    {

        $request->validate([
            'status' => ['required', 'string'],
            'quantity' => ['required',],

        ]);

   
        if ($request->status == 1) {
            $product->update([
                'quantity' => $product->quantity + $request->quantity,
            ]);
        History::create([
            'status' => $request->status,
            'quantity' => $request->quantity,
            'product_id' => $product->id,
        ]);
        }
        if ($request->status == 2 || $request->status == 3 || $request->status == 4) {
            if ($product->quantity >= $request->quantity) {

                $product->update([
                    'quantity' => $product->quantity - $request->quantity,
                ]);
                History::create([
                    'status' => $request->status,
                    'quantity' => $request->quantity,
                    'product_id' => $product->id,
                ]);
            } else {
                return redirect()->back()->with('error', 'Products not enough quantity');
            }
        }



        return redirect()->back()->with('success', 'History Create succesfull');
    }
    public function historyDelete(History $history)
    {
        $product=Product::where('id',$history->product_id)->firstOrFail();
        if ($history->status == 2 || $history->status == 3) {
               
            $product->update([
                'quantity' => $product->quantity + $history->quantity,
            ]);
        }
        else{
            $product->update([
                'quantity' => $product->quantity - $history->quantity,
            ]);
        }
        $history->delete();
        return redirect()->back()->with('success', 'History Delete succesfull');
     
    }
}
