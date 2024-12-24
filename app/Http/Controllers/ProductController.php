<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $data['products'] = Product::all();
        return view("admin.manageProduct", $data);
    }

    public function insert(Request $request){
        $data['categories'] = Category::all();
        return view("admin.insertProduct", $data);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'isVeg' => 'required|boolean',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0|lt:price',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // dd($request->all());

        // Handle the file upload
        $imagePath = $request->file('image')->store('products', 'public');

        // Create the product record
        $product = new Product();
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->isVeg = $request->input('isVeg');
        $product->price = $request->input('price');
        $product->discount_price = $request->input('discount_price') ?? null;
        $product->category_id = $request->input('category_id');
        $product->image = $imagePath;
        $product->save();

        // Redirect with a success message
        return redirect()->back()->with('success', 'Product added successfully!');
    }

}
