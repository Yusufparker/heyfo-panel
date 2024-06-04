<?php

namespace App\Imports;

use App\Models\CookingStep;
use App\Models\Food;
use App\Models\FoodIngredient;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\PersistRelations;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FoodImport implements ToModel, PersistRelations, WithHeadingRow
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        //Food
        $food = Food::create([
            "uuid" => Str::uuid(),
            "user_id" => Auth::user()->id,
            "name" => $row['name'],
            "image" => $row['image']
        ]);


        $ingredients = explode(',', $row['ingredients']);
        $steps = explode(',', $row['steps']);

        // ingredients
        foreach ($ingredients as $ingredientName) {
            // Cari atau buat bahan baru
            $ingredient = Ingredient::firstOrCreate(
                ['name' => strtolower($ingredientName)],
                ['uuid' => Str::uuid()]
            );

            // Buat relasi antara makanan dan bahan
            FoodIngredient::create([
                'food_id' => $food->id,
                'ingredient_id' => $ingredient->id,
                'amount' => null,
                'unit' => null
            ]);
        }

        //steps
        foreach ($steps as $step) {
            CookingStep::create([
                'food_id' => $food->id,
                'step' => $step

            ]);
        }

    }
}


