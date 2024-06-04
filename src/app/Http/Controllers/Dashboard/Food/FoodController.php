<?php

namespace App\Http\Controllers\Dashboard\Food;

use App\Models\Food;
use App\Models\CookingStep;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\FoodIngredient;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    //
    public function index(){
        return view('dashboard.food.index');
    }

    public function store(Request $request){
        try {
            DB::beginTransaction();
            $food = Food::create([
                'uuid' => Str::uuid(),
                'user_id' => 1,
                'name' => request('name'),
                'image' => request('image'),
            ]);

            foreach (request('cooking_step') as $step) {
                CookingStep::create([
                    'food_id' => $food->id,
                    'step' => $step['text']
                ]);
            }

            foreach (request('ingredients') as $ing) {
                FoodIngredient::create([
                    'food_id' => $food->id,
                    'ingredient_id' => $ing['ingredient_id'],
                    'amount' => $ing['amount'],
                    'unit' => $ing['unit']
                ]);
            }

            
            DB::commit();
            return response()->json([
                'status' => 'success',
                'data' => $food,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'failed',
                'message' => $th->getMessage(),
            ]);
        }
        



        return response()->json([
            'success'
        ]);
    }

    public function getFood()
    {
        $foods = Food::with('foodIngredients', 'foodIngredients.ingredient', 'cookingStep')->get();


        return response()->json($foods);
    }
}
