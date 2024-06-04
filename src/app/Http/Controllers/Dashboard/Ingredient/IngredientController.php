<?php

namespace App\Http\Controllers\Dashboard\Ingredient;

use App\Models\Ingredient;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IngredientController extends Controller
{
    //
    public function getIngredient()
    {
        $ingredients = Ingredient::orderBy('name')->get();
        return response()->json($ingredients);
    }

    public function store(Request $request){
        
        try {
            $ingredient = strtolower(request('ingredient'));
            if(!$ingredient){
                return response()->json([
                    'status' => 'error',
                    'msg' => 'Kolom tidak boleh kosong!',
                ], 400);
            }

            // Cek apakah ingredient sudah ada di database
            $existingIngredient = Ingredient::where('name', $ingredient)->first();
            if ($existingIngredient) {
                return response()->json([
                    'status' => 'error',
                    'msg' => 'Bahan sudah ada di database',
                ], 400);
            }

            Ingredient::create([
                'uuid'=> Str::uuid(),
                'name' => $ingredient
                
            ]);
            return response()->json([
                'status'=> 'success',
                'msg' => 'Tambah Data Berhasil'

            ]
            );
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }
}
