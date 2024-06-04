<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $ingredients = $this->foodIngredients->map(function ($ingredient) {
            $amount = $ingredient->amount ? $ingredient->amount . ' ' : '';
            $unit = $ingredient->unit ? $ingredient->unit . ' ' : ''; 
            return $amount . $unit . $ingredient->ingredient->name;
        });


        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'image_url' => $this->image,
            'ingredients' =>$ingredients->toArray(),
            'cooking_step' => $this->cookingStep->pluck('step')

        ];
    }
}
