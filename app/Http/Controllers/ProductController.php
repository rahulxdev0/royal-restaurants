<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view("admin.manageProduct");
    }

    public function insert(Request $request){
        return view("admin.insertProduct");
    }
}
