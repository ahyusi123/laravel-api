<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'product',
            'id' => $this->id,

            'attributes' => [
                
                'description' => $this->when(
                    ! $request->routeIs(['products.index', 'users.products.index']),
                    $this->description
                ),
                'status' => $this->status,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,

                      'type' => 'user',
                      'id'=> $this->user_id,
            ],

            'relationships' => [
                'author' => [
                    'data' => [
                        'type' => 'user',
                        'id' => $this->author_id,
                    ]
                ]
            ],

            'links' => [
                'self' => route('authors.show', ['author' => $this->user_id]),
            ],

            //Link to this product
        ];
    }
}
