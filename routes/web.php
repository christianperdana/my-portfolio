<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;

// Route utama
Route::get('/', function () {
    $projectController = new ProjectController();
    $featuredProjects = $projectController->featured();

    return view('home', [
        'featuredProjects' => $featuredProjects
    ]);
});

Route::get('/tentang-saya', function () {
    return view('about');
});

// Route untuk projects
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

// Contact Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin routes untuk melihat messages (sementara bisa diakses semua)
Route::get('/contact/messages', [ContactController::class, 'messages'])->name('contact.messages');
Route::post('/contact/messages/{id}/read', [ContactController::class, 'markAsRead'])->name('contact.markAsRead');
