<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.pages.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.pages.product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpg,png',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'description' => 'required',
            'short_description' => 'required',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imageName,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'description' => $request->description,
            'short_description' => $request->short_description
        ]);

        return redirect()->route('product.index')->with('msg', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('backend.pages.product.edit', ['categories' => $categories, 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'description' => 'required',
            'short_description' => 'required',
        ]);

        $product = Product::find($id);

        if ($request->image) {
            unlink('images/' . $product->image);
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = $product->image;
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $imageName;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->save();

        return redirect()->route('product.index')->with('msg', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        unlink('images/' . $product->image);
        $product->delete();
        return redirect()->route('product.index')->with('msg', 'Product Deleted Successfully');
    }

    public function loadSub(Request $request, $id)
    {
        $subcategories = Subcategory::where('category_id', $id)->pluck('name', 'id');
        return response()->json($subcategories);
    }
}
