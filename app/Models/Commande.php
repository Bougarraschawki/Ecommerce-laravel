<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    public function lignecommandes(){
        return $this->hasMany(Lignecommande::class, 'commande_id', 'id');
    }

    public function client(){
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    public function getTotal(){
        $total = 0;
        // liste des lignes de commande
        foreach ($this->lignecommandes as $Lcommande){
            $total += $Lcommande->product->price * $Lcommande->qte;
        }
        return $total;
    }
}
