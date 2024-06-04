<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleDetailResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'uuid' => $this->uuid,
            'author'=> $this->user->name,
            'title'=> $this->title,
            'body'=>$this->body,
            'image_url' => $this->image,
            'created_at' => Carbon::parse($this->created_at)->format('d F Y')
        ];
    }
}
