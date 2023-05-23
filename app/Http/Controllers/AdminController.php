<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Commande;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;


class AdminController extends Controller
{
    // retourner le dashboard admin
    public function dashboard(){
        $commandesEncours = Commande::where('etat', 'en cours')->get();
        $commandesPayee = Commande::where('etat', 'payee')->get();
        $commandes = Commande::all();
        $clients = User::where('role', 'user')->get();
        $products = Product::all();
        $categories = Category::all();
        $productsHorsStock = Product::where('qte', 0)->get();
        $reviews = Review::all();
        return view('admin.dashboard')->with('products', $products)->with('commandesEncours', $commandesEncours)
                                      ->with('commandesPayee', $commandesPayee)->with('clients', $clients)
                                      ->with('categories', $categories)->with('commandes', $commandes)->with('productsHorsStock', $productsHorsStock)->with('reviews', $reviews);
    }

    public function profil(){
        $reviews = Review::all();
        return view('admin.profil')->with('reviews', $reviews);
    }

    public function updateProfil(Request $request){
        Auth::user()->name = $request->name;
        Auth::user()->email = $request->email;
        if($request->password){ // if mot de passe contient un nouveau valeur
            Auth::user()->password = Hash::make($request->password);
        }
        Auth::user()->update();
        return redirect('/admin/profil')->with('success', 'Votre profile a été modifié avec succès');
    }

    public function clients(){
        $clients = User::where('role', 'user')->get();
        $reviews = Review::all();
        return view('admin.clients.index')->with('clients', $clients)->with('reviews', $reviews);
    }

    public function blockUser($id){
        $client = User::find($id);
        $client->is_active = false;
        $client->update();
        return redirect()->back()->with('success', 'Client a été Bloqué avec succès');
    }

    public function activeUser($id){
        $client = User::find($id);
        $client->is_active = true;
        $client->update();
        return redirect()->back()->with('success', 'Client a été Activé avec succès');
    }

    public function commandes(){
        $commandes = Commande::all();
        $reviews = Review::all();
        return view('admin.commandes.index')->with('commandes', $commandes)->with('reviews', $reviews);
    }

    public function searchClient(Request $request){
        $clients = User::where('role', 'user')->where('name', 'LIKE', '%'.$request->client_name.'%')->get();
        $reviews = Review::all();
        return view('admin.clients.index')->with('clients', $clients)->with('reviews', $reviews);
    }

    public function searchCategorie(Request $request){
        $categories = Category::where('name', 'LIKE', '%'.$request->categorie_name.'%')->get();
        $reviews = Review::all();
        return view('admin.categories.index')->with('categories', $categories)->with('reviews', $reviews);    
    }

    public function searchCommande(Request $request){
        $commandes = Commande::where('created_at', 'LIKE', '%'.$request->search.'%')->get();
        $reviews = Review::all();
        return view('admin.commandes.index')->with('commandes', $commandes)->with('reviews', $reviews);    
    }

    public function deleteCommande($id){
        $commande = Commande::find($id);

        if($commande->delete()){
            return redirect()->back();
        }else{
            echo 'error';
        }
    }

    public function reviews(){
        $reviews = Review::all();
        return view('includes.admin.nav')->with('reviews', $reviews);
    }
}
