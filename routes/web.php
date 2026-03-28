<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;

Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'projects' => Project::where('is_featured', true)->latest()->get(),
        'skills' => Skill::orderBy('proficiency', 'desc')->get(),
        'experiences' => Experience::orderBy('start_date', 'desc')->get(),
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard', [
            'projectCount' => Project::count(),
            'skillCount' => Skill::count(),
            'experienceCount' => Experience::count(),
        ]);
    })->name('dashboard');

    Route::resource('projects', App\Http\Controllers\Admin\ProjectController::class);
    Route::resource('skills', App\Http\Controllers\Admin\SkillController::class);
    Route::resource('experiences', App\Http\Controllers\Admin\ExperienceController::class);
});

// Alias for Breeze authentication redirects and Ziggy
Route::redirect('/dashboard', '/admin/dashboard')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
