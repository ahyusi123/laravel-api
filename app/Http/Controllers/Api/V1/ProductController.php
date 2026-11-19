<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Resources\V1\ProductResource;

class ProductController extends APIController
{
    /**
     * GET /api/v1/products
     * Returns every product (pagination and filters come in later steps).
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
    
    public function index()
    {
        if ($this->include('author')) {
            return ProductResource::collection(Product::with('author')->paginate());
        }

        return ProductResource::collection(Product::paginate());
    }

    public function show(Product $product)
    {

    if ($this->include('author')) {
            return new ProductResource($product->load('author'));
        }
        return new ProductResource($product);
    }
}