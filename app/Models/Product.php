<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function reviews(){
        return $this->hasMany(Review::class, 'product_id', 'id');
    }

    public function ligneCommande(){
        return $this->hasMany(ligneCommande::class, 'product_id', 'id');
    }
    
}
