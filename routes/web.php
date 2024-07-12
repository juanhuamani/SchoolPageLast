<?php

use App\Livewire\Extras\VerifyEmail;
use App\Livewire\Pages\Login;
use App\Livewire\Pages\Logout;
use App\Livewire\Pages\Register;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Courses;

Route::middleware(['web', 'auth'])->group(function () {
    Route::view('/', 'welcome')->name('home');
    Route::get('/logout', [Logout::class, 'logout'])->name('logout');
    Route::view('profile', 'profile')->name('profile');
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('/courses/{name}', [Courses::class, 'render'])->name('courses');

    Route::group(['middleware' => ['can:edit courses']], function () {
        Route::get('/courses/{name}/edit', [Courses::class, 'edit'])->name('courses.edit');
        Route::get('/courses/{name}/update', [Courses::class, 'update'])->name('courses.update');
    });
});

Route::middleware(['web', 'guest'])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/verify-email/{token}', [VerifyEmail::class, 'verifyEmail'])->name('verify-email');
});
