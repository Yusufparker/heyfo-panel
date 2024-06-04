<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'name',
        'user_id',
        'image',
    ];

    public function foodIngredients(){
        return $this->hasMany(FoodIngredient::class,'food_id', 'id');
    }

    public function cookingStep(){
        return $this->hasMany(CookingStep::class,'food_id', 'id');
    }
}
