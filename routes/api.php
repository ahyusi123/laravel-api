<?php

use Illuminate\Support\Facades\Route;

Route::get('/ping', fn () => (new class {
    use \App\Traits\ApiResponses;

    public function run()
    {
        return $this->ok('API is working');
    }
})->run());