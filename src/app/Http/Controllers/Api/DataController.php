<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleDetailResource;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\FoodDetailResource;
use App\Http\Resources\FoodResource;
use App\Models\Food;

class DataController extends Controller
{
    //
    public function getArticles()
    {
        $articles = Article::with('user')->get();
        return ArticleResource::collection($articles);
    }

    public function getArticleByUuid($uuid)
    {
        $article = Article::where('uuid', $uuid)->first();
        if (!$article) {
            return response()->json(['message' => 'Article not found'], 404);
        }
        return new ArticleDetailResource($article);
    }
    
    public function getFoods(){
        $foods = Food::all();
        return FoodResource::collection($foods);
    }
    
    public function getFoodByUuid($uuid){
        $food = Food::where('uuid', $uuid)->with('foodIngredients')->first();
        if(!$food){
            return response()->json(['message' => 'Food not found'], 404);
        }
        return new FoodDetailResource($food);
    }


}
