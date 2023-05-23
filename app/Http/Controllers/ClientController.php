<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Review;
use App\Models\Category;
use App\Models\Commande;
use App\Models\Product;




class ClientController extends Controller
{
    // retourner le dashboard client
    public function dashboard(){
        $commandesEncours = Commande::where('client_id', Auth::user()->id)->where('etat', 'en cours')->get();
        $commandesPayee = Commande::where('client_id', Auth::user()->id)->where('etat', 'payee')->get();
        return view('client.dashboard')->with('commandesEncours', $commandesEncours)->with('commandesPayee', $commandesPayee);
    }

    public function profil(){
        return view('client.profil');
    }

    public function updateProfil(Request $request){
        Auth::user()->name = $request->name;
        Auth::user()->email = $request->email;
        if($request->password){ // if mot de passe contient un nouveau valeur
            Auth::user()->password = Hash::make($request->password);
        }
        Auth::user()->update();
        return redirect('/client/profil')->with('success', 'Votre profile a été modifié avec succès');
    }

    public function addReview(Request $request){
        $review = new Review();
        $review->rate = $request->rate;
        $review->product_id = $request->product_id;
        $review->content = $request->content;
        $review->user_id = Auth::user()->id;

        $review->save();

        return redirect()->back();
    }

    public function cart(){
        $categories = Category::all();
        // récuperer la commande en cours pour ce client
        $commande = Commande::where('client_id', Auth::user()->id)->where('etat', 'en cours')->first();
        //dd($commande->lignecommandes);
        return view('guest.cart')->with('categories', $categories)->with('commande', $commande);
    }

    public function checkout(Request $request){
        $commande = Commande::find($request->commande);
        $commande->etat = "payee"; 
        $commande->update();
        return redirect('/client/commandes')->with('success', 'Commande payee avec succes ...');
    }

    public function mesCommandes(){
        return view('client.commandes');
    }

    public function pageBlockage(){
        return view('client.blockage');
    }

    public function deleteCommande($id){
        $commande = Commande::where('client_id', Auth::user()->id)->where('etat', 'en cours');

        if($commande->delete()){
            return redirect()->back();
        }else{
            echo 'error';
        }
    }
}
