<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $req){
        if($req->isMethod("post")){
            $data = $req->validate([
                'cat_title' => 'required|max:255',
                'description' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if($req->hasFile('image')){
                $image = $req->file('image');
                $imageName = time().'.'.$image->extension();
                $image->move(public_path('images'), $imageName);
                $data['image'] = $imageName;
            }
    
            Category::create($data);
            return redirect()->route("admin.category")->with("msg", "Category added successfully");
        }
        $data['categories'] = Category::all();
        return view('admin.manageCategory', $data);
    }

    public function deleteCategory(Request $req){
        $id = $req->cat_id;

        $record = Category::findOrFail($id);
        $record->delete();

        return redirect()->route("admin.category")->with("msg", "Category deleted successfully");
    }

    public function updateCategory(Request $req, $id){
        if($req->isMethod("post")){
            $data = $req->validate([
                'cat_title' => 'required|max:255',
            ]);
    
            Category::findOrFail($id)->update($data);
            return redirect()->route("admin.category")->with("msg", "Category update successfully");
        }
        $data['categories'] = Category::all();
        return view('admin.manageCategory', $data);
    }

}
