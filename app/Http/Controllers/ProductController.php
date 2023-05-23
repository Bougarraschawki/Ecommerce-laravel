<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // afficher la page des produits
    public function index(){
        $products = Product::all();
        $categories = Category::all();
        $reviews = Review::all();
        return view('admin.products.index')->with('products', $products)->with('categories', $categories)->with('reviews', $reviews);
    }

    // ajout du produit
    public function store(Request $request){

        $product = new Product();
        $product->category_id = $request->categorie;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qte = $request->qte;

        //! Upload Image
        $newname = uniqid(); // 451fkld21
        $image = $request->file('photo');
        $newname.= "." . $image->getClientOriginalExtension(); // 451fkld21.jpg
        $destinationPath = 'uploads';
        $image->move($destinationPath, $newname);

        $product->photo = $newname;

        if ($product->save()){
            return redirect()->back();
        }else {
            echo "error";
        }
    }

    // update du produit
    public function update(Request $request){

        $product = Product::find($request->id_product);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qte = $request->qte;

        ////! Upload Image
        if($request->file('photo')){
            // supprimer l'ancienne photo
            $file_path = public_path().'/uploads/'.$product->photo;
            unlink($file_path);

            //upload la nouvelle photo
            $newname = uniqid(); // 451fkld21
            $image = $request->file('photo');
            $newname.= "." . $image->getClientOriginalExtension(); // 451fkld21.jpg
            $destinationPath = 'uploads';
            $image->move($destinationPath, $newname);

            $product->photo = $newname;
        }
        
        if ($product->update()){
            return redirect()->back();
        }else {
            echo "error";
        }
    }

    // delete produit 
    public function destroy($id){

        $product = Product::find($id);

        $file_path = public_path().'/uploads/'.$product->photo;
        unlink($file_path);

        if($product->delete()){
            return redirect()->back();
        }else{
            echo 'error';
        }
    }

    public function searchProduct(Request $request){
        //dd($request); 
        $products = Product::where('name', 'LIKE', '%'.$request->product_name.'%')->get();
        $categories = Category::all();
        $reviews = Review::all();
        return view('admin.products.index')->with('products', $products)->with('categories', $categories)->with('reviews', $reviews);
    }
}
