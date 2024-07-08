<?php

use App\Livewire\Pages\Login;
use App\Livewire\Pages\Logout;
use App\Livewire\Pages\Register;
use Illuminate\Support\Facades\Route;



Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    Route::get('/logout', [Logout::class , 'logout'])->name('logout');
    Route::view('profile', 'profile')->name('profile');
});

Route::middleware(['web', 'guest'])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth'])
    ->name('dashboard');
