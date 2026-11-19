<?php

namespace App\Http\Controllers\Api\V1;


use Illuminate\Http\Request;
use App\Http\Resources\V1\UserResource;
use App\Models\User;

class AuthorsController extends APIController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return UserResource::collection(User::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show(User $author)
    {
        //
        return new UserResource($author);
    }

}
