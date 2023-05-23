<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Product;
use PDF;
use App\Models\LigneCommande;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    // create commande
    public function store(Request $request){
    
        // verfier si une commande est en cours pour ce client
        $commande = Commande::where('client_id', Auth::user()->id)->where('etat', 'en cours')->first();
        
        if($commande){ //! il existe une commande en cours
            // create Ligne commande

            // if produit deja existe dans la ligne de commande
            $existe = false;
            foreach($commande->lignecommandes as $lignec){
                if($lignec->product_id == $request->product_id){
                    $existe = true;
                    $lignec->qte += $request->qte;
                    $lignec->product->qte = $lignec->product->qte-$request->qte;

                    $lignec->product->update();

                    $lignec->update();
                }
            }

            if(!$existe){ 
                $Lcommande = new LigneCommande();
                $Lcommande->qte = $request->qte;
                $Lcommande->product_id = $request->product_id;
                $Lcommande->product->qte = $Lcommande->product->qte-$Lcommande->qte;
                $Lcommande->commande_id = $commande->id;

                $Lcommande->product->update();
                
                $Lcommande->save();
            }
            
            return redirect('/client/cart')->with('success', 'Produit est bien commandée');

        }else { //! il n'existe pas une commande en cours
            // create commande
            $commande = new Commande();
            $commande->client_id = Auth::user()->id;

            if($commande->save()){
                // create Ligne commande
                $Lcommande = new LigneCommande();
                $Lcommande->qte = $request->qte;
                $Lcommande->product_id = $request->product_id;
                $Lcommande->product->qte = $Lcommande->product->qte-$Lcommande->qte;
                $Lcommande->commande_id = $commande->id;
                
                $Lcommande->product->update();

                $Lcommande->save();

                return redirect('/client/cart')->with('success', 'Produit est bien commandée');

            }else {
                return redirect()->back()->with('error', 'Impossible de commander le produit');
            }
        }
    }

    public function ligneCommandeDestroy($id){
        $Lcommande = LigneCommande::find($id);
        $Lcommande->product->qte += $Lcommande->qte;
        $Lcommande->product->update();
        $Lcommande->delete();
        return redirect()->back()->with('success', 'Produit supprimer');
    }

    public function downloadPDF($id){
        $commande = Commande::find($id);
        $client = $commande->client->name;
        $pdf = PDF::loadView('admin.commandes.pdf', compact('commande'));
        return $pdf->download("Command $client.pdf");
    }
}
