<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class PredictController extends Controller
{
    //
    public function predict(Request $request)
    {
        $client = new Client();

        try {
            $response = $client->post('http://34.124.131.216:5000/predict', [
                'multipart' => [
                    [
                        'name'     => 'image',
                        'contents' => file_get_contents($request->file('image')->path()),
                        'filename' => $request->file('image')->getClientOriginalName(),
                    ],
                ],
            ]);

            // Ambil data respons dari server Flask
            $responseData = json_decode($response->getBody(), true);
            $predictedIngredientNames = $responseData['objects'];
            $foods = Food::whereHas('foodIngredients', function ($query) use ($predictedIngredientNames) {
                $query->whereHas('ingredient', function ($query) use ($predictedIngredientNames) {
                    $query->whereIn('name', $predictedIngredientNames);
                });
            })->with('foodIngredients', 'foodIngredients.ingredient')->get();

            // Proses data makanan untuk menemukan bahan yang sesuai dan tidak sesuai
            $result = [];
            foreach ($foods as $food) {
                $matchedIngredients = [];
                $unmatchedIngredients = [];

                foreach ($food->foodIngredients as $foodIngredient) {
                    $ingredientName = $foodIngredient->ingredient->name;

                    if (in_array($ingredientName, $predictedIngredientNames)) {
                        $matchedIngredients[] = $ingredientName;
                    } else {
                        $unmatchedIngredients[] = $ingredientName;
                    }
                }

                if (!empty($matchedIngredients)) {
                    $result[] = [
                        'id' => $food->id,
                        'uuid' => $food->uuid,
                        'name' =>  $food->name,
                        'image_url' => $food->image,
                        'matched_ingredients' => $matchedIngredients,
                        'unmatched_ingredients' => $unmatchedIngredients,
                    ];
                }
            }

            return response()->json([
                'predict_result' => $predictedIngredientNames ,
                'data' => $result
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    
    

}

