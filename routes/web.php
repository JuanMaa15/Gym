<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginPersonalController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EntrenamientoPersonalizadoController;
use App\Http\Controllers\HoraController;
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
    Route::resource('entrenamiento_personalizado', EntrenamientoPersonalizadoController::class)->only('create', 'store');
    Route::get('entrenamiento_personalizado/completar/{fecha}', [EntrenamientoPersonalizadoController::class, 'completar'])->name('entrenamiento_personalizado.completar');
    Route::get('entrenamiento_personalizado/lista-entrenamientos', [EntrenamientoPersonalizadoController::class, 'indexCliente'])->name('entrenamiento_personalizado.index_cliente');


    //Solicitud plan alimenticio
    Route::resource('solicitud_plan_alimenticio', SolicitudPlanAlimenticioController::class)->only('create', 'store');

    //Planes adquiridos
    Route::get('planes_adquiridos/show-clientes/{cliente_id}', [PlanAdquiridoController::class, 'showClientes'])->name('planes_adquiridos.showClientes');
    Route::resource('planes_adquiridos', PlanAdquiridoController::class)->only('create', 'store', 'show');

    //Planes alimenticios
    //Route::resource('planes_alimenticios', PlanAlimentacionController::class);
    Route::get('planes_alimenticios/show-clientes/{cliente_id}', [PlanAlimentacionController::class, 'showClientes'])->name('planes_alimenticios.showClientes');

    //Clientes
    Route::resource('clientes', ClienteController::class)->only('edit', 'update');
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

    //Instructores
    Route::get('instructores/list-instructores-cliente', [InstructorController::class, 'indexCliente'])->name('instructores.index_cliente');

    //horas 
    Route::get('horas/horas-disponibles/{fecha}', [HoraController::class, 'horasDisponibles'])->name('horas.horas_disponibles');

    
    //Midldleware Instructores
    Route::group(['prefix' => 'instructor', 'middleware' => 'instructor'], function() {
        
        Route::resource('instructores', InstructorController::class)->only('edit', 'update');

        //Planes alimenticios
        Route::group(['prefix' => 'planes_alimenticios'], function(){
            Route::get('show-instructores/{personal_id}', [PlanAlimentacionController::class, 'showInstructores'])->name('planes_alimenticios.show_instructores');
            Route::get('completar/{plan_alimenticio}', [PlanAlimentacionController::class, 'completar'])->name('planes_alimenticios.completar');
            Route::put('iniciar/{plan_alimenticio}', [PlanAlimentacionController::class, 'iniciar'])->name('planes_alimenticios.iniciar');
            Route::get('listos/{plan_alimenticio}', [PlanAlimentacionController::class, 'listos'])->name('planes_alimenticios.listos');
            Route::get('show-listo/{plan_alimenticio}', [PlanAlimentacionController::class, 'showListo'])->name('planes_alimenticios.show_listo');

        });

        //Horas 
        Route::resource('horas', HoraController::class)->except('show');

        //Entrenamiento personalizado
        Route::resource('entrenamiento_personalizado', EntrenamientoPersonalizadoController::class)->only('index', 'show', 'destroy');
        
    });
    
    //Midldleware Administradores
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
       
        //Administradores
        Route::resource('admins', AdminController::class);
        Route::get('gestion', [AdminController::class, 'gestion'])->name('admins.gestion');
        Route::get('home', [AdminController::class, 'home'])->name('admins.home');

        //Instructores
        Route::resource('instructores', InstructorController::class)->except('edit', 'update');

        //Clientes
        Route::resource('clientes', ClienteController::class)->only('show', 'destroy', 'index');
        Route::put('clientes/update-estado/{cliente}', [ClienteController::class, 'updateEstado'])->name('clientes.update_estado');

        //Solicitud planes alimenticios
        Route::resource('solicitud_plan_alimenticio', SolicitudPlanAlimenticioController::class)->only('index');

        //Planes alimenticios
        Route::resource('planes_alimenticios', PlanAlimentacionController::class)->only('destroy', 'store');
        Route::get('planes_alimenticios/create-plan-alimentacion/{solicitud_plan_alimenticio}', [PlanAlimentacionController::class, 'create'])->name('planes_alimenticios.create');

        //Publicaciones
        Route::resource('publicaciones', PublicacionController::class)->except('show');
    });

    
});

//Cliente
Route::get('/clientes-create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/register', [RegisterController::class, 'register'])->name('register');


// Planes
Route::resource('planes', PlanController::class)->only('index');

//Auth
Auth::routes(['register' => false]);
Route::post('/login-personal', [LoginPersonalController::class, 'login'])->name('login_personal');
Route::get('/login-personal', [LoginPersonalController::class, 'showLoginForm'])->name('login_personal');
//(El controlador LoginPersonal esta sin )

