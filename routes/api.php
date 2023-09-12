<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/persona', [PersonaController::class, 'index']);
Route::get('/persona/{id}', [PersonaController::class, 'show']);
Route::post('/persona/update/{id}', [PersonaController::class, 'update']);


Route::get('/usuario', [UsuarioController::class, 'index']);
Route::post('/usuario/create', [UsuarioController::class, 'create']);
Route::get('/usuario/{id}', [UsuarioController::class, 'show']);

Route::get('/bitacora', [BitacoraController::class, 'index']);
Route::post('/bitacora/create', [BitacoraController::class, 'create']);
Route::post('/bitacora/update/{id}', [BitacoraController::class, 'update']);

Route::controller(AuthController::class)->group(function () {
    Route::post('/auth/register', 'register');
    Route::post('/auth/login', 'login');
    Route::post('/auth/logout', 'logout');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/listRoles', 'listRoles');
    Route::get('/admin/listPermissions', 'listPermissions');
    Route::get('/admin/listUsers', 'listUsers');

    Route::post('/admin/createRole', 'createRole');
    Route::post('/admin/createPermission', 'createPermission');
    Route::post('/admin/grantPermissionsToRole', 'grantPermissionsToRole');
    Route::post('/admin/revokePermissionToRole', 'revokePermissionToRole');
    Route::post('/admin/givePermissionToUser', 'givePermissionToUser');
    Route::post('/admin/assignRoleToUser', 'assignRoleToUser');
});
