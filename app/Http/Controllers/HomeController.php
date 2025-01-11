<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['categories'] = Category::all();
        $data['dishes'] = Product::all();
        return view("home.home", $data);
    }
}
