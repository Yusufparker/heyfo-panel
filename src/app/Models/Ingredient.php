<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'name',
        'image'
    ];

    public function foodIngredients()
    {
        return $this->hasMany(FoodIngredient::class, 'id_ingredient', 'id');
    }
}
