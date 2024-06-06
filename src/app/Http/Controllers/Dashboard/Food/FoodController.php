<?php

namespace App\Http\Controllers\Dashboard\Food;

use App\Models\Food;
use App\Models\CookingStep;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\FoodIngredient;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Imports\FoodImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

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
                'user_id' => Auth::user()->id,
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


    

    public function importFood(Request $request)
    {
        try {
            if (!$request->hasFile('excel')) {
                return response()->json([
                    "status" => "failed",
                    "msg" => "No file uploaded"
                ], 400);
            }

            $file = $request->file('excel');

            Excel::import(new FoodImport, $file);

            return response()->json([
                "status" => 'success',
                "msg" => "Import data berhasil",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "failed",
                "msg" => $th->getMessage()
            ], 500);
        }
    }


}
