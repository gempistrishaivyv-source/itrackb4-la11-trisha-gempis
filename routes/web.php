<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shoes/featured', [ShoeController::class, 'featured'])
    ->name('shoes.featured');

Route::get('/shoes/filter/{value?}', function ($value = null) {
    if ($value) {
        return redirect()->route('shoes.index', [
            'category' => $value
        ]);
    }

    return redirect()->route('shoes.index');
})->name('shoes.filter');

Route::resource('shoe', ShoeController::class);