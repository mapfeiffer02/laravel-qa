<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\VotableController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\AcceptAnswerController;

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

Route::resource('questions', QuestionController::class)->except('show');
Route::get('/questions/{slug}', [QuestionController::class, 'show'])->name('questions.show');
Route::post('/questions/{question}/answers', [AnswerController::class, 'store'])->name('answers.store');
Route::get('/questions/{question}/{answer}', [AnswerController::class, 'edit'])->name('answers.edit');
Route::put('/questions/{question}/{answer}', [AnswerController::class, 'update'])->name('answers.update');
Route::delete('/questions/{question}/{answer}', [AnswerController::class, 'destroy'])->name('answers.destroy');

Route::post('/answers/{answer}/accept', AcceptAnswerController::class)->name('answers.accept');

Route::post('questions/{question}/favorites', [FavoritesController::class, 'store'])->name('questions.favorite');
Route::delete('/questions/{question}/favorites', [FavoritesController::class, 'destroy'])->name('questions.unfavorite');


Route::post('/questions/{question}/vote', VotableController::class);