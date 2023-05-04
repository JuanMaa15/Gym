<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginPersonalController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EntrenamientoPersonalizadoController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\PlanAdquiridoController;
use App\Http\Controllers\PlanAlimentacionController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\SolicitudPlanAlimenticioController;

use Faker\Provider\ar_EG\Person;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('index');


//Autenticacion usuario
Route::group(['middleware' => 'auth'], function() {


    //Entrenamiento personalizado
    Route::resource('entrenamiento_personalizado', EntrenamientoPersonalizadoController::class);

    //Solicitud plan alimenticio
    Route::resource('solicitud_plan_alimenticio', SolicitudPlanAlimenticioController::class);

    //Planes adquiridos
    Route::get('planes_adquiridos/show-clientes/{cliente_id}', [PlanAdquiridoController::class, 'showClientes'])->name('planes_adquiridos.showClientes');
    Route::resource('planes_adquiridos', PlanAdquiridoController::class);

    //Planes alimenticios
    Route::resource('planes_alimenticios', PlanAlimentacionController::class);
    Route::get('planes_alimenticios/show-clientes/{cliente_id}', [PlanAlimentacionController::class, 'showClientes'])->name('planes_alimenticios.showClientes');

    //Clientes
    Route::resource('clientes', ClienteController::class)->except('create', 'show', 'delete');
    Route::post('password-update', [PasswordController::class, 'update'])->name('password_update');

    //Imagen
    Route::group(['prefix' => 'imagen'], function() {
        Route::get('show/{nombre_imagen}', [ImagenController::class, 'show'])->name('imagen.show');
        Route::get('show-publicacion/{nombre_imagen}', [ImagenController::class, 'showPublicacion'])->name('imagen.show_publicacion');
        Route::put('update/{guard}', [ImagenController::class, 'update'])->name('imagen.update');
        //Route::post('update-personal', [ImagenController::class, 'updatePersonal'])->name('imagen.update_personal');
    });

    //Auth - Password
    Route::post('password-update-personal', [PasswordController::class, 'updatePersonal'])->name('password_update_personal');
    
    //Midldleware Instructores
    Route::group(['prefix' => 'instructor', 'middleware' => 'instructor'], function() {
        

    });
    
    //Midldleware Administradores
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
       
        //Administradores
        Route::resource('admins', AdminController::class);
        Route::get('gestion', [AdminController::class, 'gestion'])->name('admins.gestion');
        Route::get('home', [AdminController::class, 'home'])->name('admins.home');

        //Instructores
        Route::resource('instructores', InstructorController::class);

        //Clientes
        Route::resource('clientes', ClienteController::class)->only('show', 'destroy');
        Route::put('clientes/update-estado/{cliente}', [ClienteController::class, 'updateEstado'])->name('clientes.update_estado');

        //Solicitud planes alimenticios
        Route::resource('solicitud_plan_alimenticio', SolicitudPlanAlimenticioController::class)->only('index');

        //Planes alimenticios
        Route::resource('planes_alimenticios', PlanAlimentacionController::class)->only('destroy', 'store');
        Route::get('planes_alimenticios/create-plan-alimentacion/{solicitud_plan_alimenticio}', [PlanAlimentacionController::class, 'create'])->name('planes_alimenticios.create');

        //Publicaciones
        Route::resource('publicaciones', PublicacionController::class);
    });

    
});

//Cliente
Route::get('/clientes-create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/register', [RegisterController::class, 'register'])->name('register');


// Planes
Route::resource('planes', PlanController::class)->only('index');

//Auth
Auth::routes(['register' => false]);
Route::post('/login-personal', [LoginController::class, 'loginPersonal'])->name('login_personal');
Route::get('/login-personal', [LoginController::class, 'showLoginFormPersonal'])->name('login_personal');
//(El controlador LoginPersonal esta sin )

