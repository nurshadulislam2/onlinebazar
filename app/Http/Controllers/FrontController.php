<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->take(6)->get();
        return view('frontend.pages.home', compact('products'));
    }

    public function product($id)
    {
        $product = Product::find($id);
        $category = $product->category_id;
        $relateds = Product::orderBy('id', 'desc')->where('category_id', $category)->take(4)->get();
        return view('frontend.pages.product', compact('product', 'relateds'));
    }

    public function category($id)
    {
        $category = Category::find($id);
        $subcategories = Subcategory::where('category_id', $id)->get();
        return view('frontend.pages.category', compact('subcategories', 'category'));
    }

    public function subcategory($id)
    {
        $products = Product::where('subcategory_id', $id)->get();
        return view('frontend.pages.subcategory', compact('products'));
    }
}
