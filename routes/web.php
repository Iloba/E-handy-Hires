<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BioData\BiodataController;
use App\Http\Controllers\Experience\ExperienceController;
use App\Http\Controllers\Skills\SkillController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('update-domestic-staff-bio-data', [BiodataController::class, 'update'])
        ->name('update.bio.data');
        
        Route::post('save-domestic-staff-bio-data', [BiodataController::class, 'saveBioData'])->name('save.bio.data');
        Route::get('add-skill', [SkillController::class, 'addSkill'])->name('add.skills');
       Route::get('add-experience', [ExperienceController::class, 'addExperience'])->name('add.experience');
});
