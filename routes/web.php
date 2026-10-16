<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::livewire('/', 'pages::home');

// Don't want users to register their own account so leaving this here but commented out
Route::get('/register', function(){
    /*$user = User::create([
        'name' => '',
        'email' => '',
        'password' => Hash::make(''),
    ]);*/
});
Route::get('/logout', function(){
    Auth::logout();
});

