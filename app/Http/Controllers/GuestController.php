<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Commande;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class GuestController extends Controller
{
    //
    
    public function home(){
        $products = Product::all();
        $categories = Category::all();
        return view('guest.home')->with('products', $products)->with('categories', $categories);
    }

    public function productDetails($id){
        $product = Product::find($id);
        $products = Product::where('id','!=',$id)->get();
        $categories = Category::all();
        return view('guest.product-details')->with('categories', $categories)->with('product', $product)->with('products', $products);
    }

    public function shop($id_category){
        $categorie = Category::find($id_category);
        //dd($categorie->name);
        $products = $categorie->products;
        $categories = Category::all();
        $title = "";
        return view('guest.shop')->with('categories', $categories)->with('products', $products)->with('categorie', $categorie)->with('message', $title);
    }

    public function search(Request $request){
        $products = Product::where('name', 'LIKE', '%' . $request->keywords . '%')->get();
        $categories = Category::all();
        $categorie = Category::find($request->categorie);
        $title = "";
        return view('guest.shop')->with('categories', $categories)->with('products', $products)->with('categorie', $categorie)->with('message', $title);
    }

    public function searchAll(Request $request){
        $products = Product::where('name', 'LIKE', '%' . $request->keywords . '%')->get();
        $categories = Category::all();
        return view('guest.home')->with('categories', $categories)->with('products', $products);
    }

    public function filter(Request $request){
        
        $categorie = Category::find($request->categorie);
        $categories = Category::all();
        

        if($request->price[0] == '0'){
            $title = "Tous les produits";
        }else if($request->price[0] == '1'){
            $title = "Produit entre 0TND et 100TND";
        }else if($request->price[0] == '2'){
            $title = "Produit entre 100TND et 200TND";
        }else if($request->price[0] == '3'){
            $title = "Produit entre 200TND et 300TND";
        }else if($request->price[0] == '4'){
            $title = "Produit entre 300TND et 400TND";
        }else if($request->price[0] == '5'){
            $title = "Produit entre 400TND et 500TND";
        }else if($request->price[0] == '6'){
            $title = "Produit entre 500TND et 1000TND";
        }else if($request->price[0] == '7'){
            $title = "Produit entre 1000TND et 5000TND";
        }else if($request->price[0] == '8'){
            $title = "Produit entre 5000TND et 10000TND";
        }

        $prices = $request->get('price', []);
        //dd($prices);

        $products = Product::where('category_id','=', $categorie->id)->where(function ($query) use ($prices) {
            if (count($prices) > 0) {
                foreach ($prices as $price) {
                    switch ($price) {
                        case 1:
                            $query->orWhereBetween('price', [0, 100]);
                            break;
                        case 2:
                            $query->orWhereBetween('price', [100, 200]);
                            break;
                        case 3:
                            $query->orWhereBetween('price', [200, 300]);
                            break;
                        case 4:
                            $query->orWhereBetween('price', [300, 400]);
                            break;
                        case 5:
                            $query->orWhereBetween('price', [400, 500]);
                            break;
                        case 6:
                            $query->orWhereBetween('price', [500, 1000]);
                            break;
                        case 7:
                            $query->orWhereBetween('price', [1000, 5000]);
                            break;
                        case 8:
                            $query->orWhereBetween('price', [5000, 10000]);
                            break;
                    }
                }
            }
        })->get();

        return view('guest.shop')->with('categories', $categories)->with('products', $products)->with('categorie', $categorie)->with('message', $title);
    }

    public function orderBy(Request $request){
        $categories = Category::all();
        $categorie = Category::find($request->categorie);
        
        if($request->dernier){
            $products = Product::where('category_id','=', $categorie->id)->orderBy('created_at', 'desc')->get();
            $title = "Produit le plus nouveau";
        }
        if($request->populaire){
            $products = Product::where('category_id','=', $categorie->id)->with(['reviews' => function ($query) {
                    $query->orderBy('rate', 'asc');
                }])->whereHas('reviews', function ($query) {
                    $query->whereNotNull('rate');
            })->get(); 
            
            //$products = Product::select('products.*')
            //    ->where('category_id','=', $categorie->id)
            //    ->join('reviews', 'products.id', '=', 'reviews.product_id')
            //    ->orderByRaw('CAST(reviews.rate AS DECIMAL(10, 2)) DESC')
            //->get();
            $title = "Produit le plus populaire";
        }
        return view('guest.shop')->with('categories', $categories)->with('products', $products)->with('categorie', $categorie)->with('message', $title);
    }
    
}
