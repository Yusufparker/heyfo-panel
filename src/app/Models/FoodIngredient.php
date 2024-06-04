<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodIngredient extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'food_id',
        'ingredient_id',
        'amount',
        'unit'
    ];

    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id', 'id');
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'ingredient_id', 'id');
    }

   
}
