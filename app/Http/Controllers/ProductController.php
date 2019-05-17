<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;

class ProductController extends Controller
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
     * @return \Illuminate\Controller\Support\Rendrable
     */
    public function index()
    {
        $products=Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return view('products.show', compact('product'));
        } else {
            return redirect('/products')->with('erors', 'Produk tidak ada');
        }
    }
    public function image($imageName)
    {
        $filePath = storage_path(public_path().'/images', $imageName);
        return Image::make($filePath)->response();
    }
}