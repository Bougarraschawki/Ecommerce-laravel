<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // afficher la page des categories
    public function index(){
        $categories = Category::all();
        $reviews = Review::all();
        return view('admin.categories.index')->with('categories', $categories)->with('reviews', $reviews);
    }

    // add categorie 
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;

        if($category->save()){
            return redirect()->back();  
        }else{
            echo 'error';
        }
          
    } 

    // update categorie 
    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $id = $request->id_category;
        $category = Category::find($id);

        $category->name = $request->name;
        $category->description = $request->description;

        if($category->update()){
            return redirect()->back();  
        }else{
            echo 'error';
        }
        
    }

    // delete categorie 
    public function destroy($id){
        $categorie = Category::find($id);

        if($categorie->delete()){
            return redirect()->back();
        }else{
            echo 'error';
        }
    }
}
