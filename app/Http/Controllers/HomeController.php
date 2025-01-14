<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['categories'] = Category::all();
        $data['dishes'] = Product::all();
        $data['banner']=Setting::first();
        return view("home.home", $data);
    }
}
