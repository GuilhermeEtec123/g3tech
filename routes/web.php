<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

// Auth::routes();

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\EquipeControllerController;
use App\Http\Controllers\TeamJoinRequestController;

//Modelo de rota com autenticação de usuario
// Route::get('/profile', [UserProfileController::class, 'show'])
//     ->middleware('App\Http\Middleware\ClientType:1') // Use o nome completo do middleware e o valor 1
//     ->name('profile');

Route::get('/perfil', function () {return view('pages.profile-freelancer');})->middleware('auth');
Route::get('/solicitacao', function () {return view('pages.Team.solicitacao');})->middleware('auth');
Route::get('/', function () {
    return redirect()->route('list-project');
})->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
// Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');


//solicitacoes
Route::get('/solicitacoes', [TeamJoinRequestController::class, 'index'])->name('solicitacoes')->middleware();
Route::post('/solicitacoes/aceitar/{id}', [TeamJoinRequestController::class, 'aceitar'])->name('solicitacoes.aceitar');
Route::delete('/solicitacoes/rejeitar/{id}', [TeamJoinRequestController::class, 'rejeitar'])->name('solicitacoes.rejeitar');
Route::post('/team-join-requests/{projetoId}', [TeamJoinRequestController::class, 'store'])->name('team-join-requests.store');
Route::get('/solicitacoes-list', [TeamJoinRequestController::class, 'show'])->name('solicitacoes-list')->middleware();

// Projeto	
Route::get('/projects', [ProjetoController::class, 'index'])->name('list-project')->middleware();
Route::get('/projetos/{id}', [ProjetoController::class, 'show'])->name('project')->middleware('auth');
Route::get('/new-project', [ProjetoController::class, 'create'])->name('new-project')->middleware('auth');
Route::post('/new-project', [ProjetoController::class, 'store'])->name('new-project')->middleware();
Route::delete('/projetos/{id}', [ProjetoController::class, 'destroy'])->name('destroy')->middleware('auth');
// Route::get('/projetos/{projeto}', [ProjetoController::class, 'show'])->name('project')->middleware();
// Route::get('/projetos/{id}', [ProjetoController::class, 'show'])->name('project')->middleware('auth');;
// Route::get('/projetos/{projeto}', [ProjetoController::class, 'show'])->name('project');


//Equipe
Route::get('/team', [EquipeController::class, 'index'])->name('team')->middleware();
Route::post('equipes/remove-participante/{membroId}', [EquipeController::class, 'removeParticipante'])->name('equipes.remove-participante');



Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/sign-in-staticxxxx', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
