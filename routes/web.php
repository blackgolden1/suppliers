<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
use App\Modules\Applications\Adapters\In\ApplicationController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect()->route('convocatorias');
});

Route::get('/proveedores', [\App\Modules\Suppliers\Adapters\In\SupplierController::class, 'search'])->name('proveedores');
Route::get('/proveedores/{id}',[\App\Modules\Suppliers\Adapters\In\SupplierController::class, 'find'])->name('proveedor.perfil');

Route::get('/consulta', [\App\Modules\Suppliers\Adapters\In\SupplierController::class, 'getToken'])->name('consulta');
Route::get('/directorioAfiliados', [\App\Modules\Suppliers\Adapters\In\SupplierController::class, 'directorioAfiliados'])->name('directorio');

Route::get('/getRadicado', [\App\Modules\Applications\Adapters\In\ApplicationController::class, 'getRadicado'])->name('radicado');


Route::get('/register-supplier', function () {
    return Inertia::render('Proveedores/ProveedoresRegistro');
})->name('registerSupplier');
Route::post('/register-supplier', [\App\Modules\Suppliers\Adapters\In\SupplierController::class, 'create'])->name('supplier.create');

Route::post('/apply-supplier', [\App\Modules\Applications\Adapters\In\ApplicationController::class, 'apply'])->name('supplier.apply'); //aun no

Route::get('/convocatoria/{id}', [\App\Modules\Invitations\Adapters\In\InvitationController::class, 'find'])->name('convocatoria.perfil');

Route::get('/convocatorias', [\App\Modules\Invitations\Adapters\In\InvitationController::class, 'getActiveInvitations'])->name('convocatorias')->middleware(['auth', 'verified']);
Route::get('/iframe', [\App\Modules\Invitations\Adapters\In\InvitationController::class, 'iframe'])->name('iframe');

Route::post('convocatoria/{id}', [\App\Modules\Invitations\Adapters\In\InvitationController::class, 'edit'])->name('convocatoria.update'); //aun no
Route::delete('convocatoria/{id}/files/{index}', [\App\Modules\Invitations\Adapters\In\InvitationController::class, 'deleteFile'])->name('convocatoria.deleteFile'); //aun no

Route::get('/postulaciones', [\App\Modules\Invitations\Adapters\In\InvitationController::class, 'myPostulations'])->name('misPostulaciones')->middleware('can:isSupplier'); //aun no


Route::get('/register-invitation', function () {
    return Inertia::render('Convocatorias/ConvocatoriasCreacion');
})->name('registerInvitation')->middleware('can:isAdmin');


Route::get('/login-prov', function () {
    return Inertia::render('Proveedores/LoginProv');
})->name('loginProv');
Route::post('/register-invitation', [\App\Modules\Invitations\Adapters\In\InvitationController::class, 'create'])->name('invitation.create');

Route::get('/convocatorias-filter', [\App\Modules\Invitations\Adapters\In\InvitationController::class, 'filter'])->name('convocatoriasFilter')->middleware(['auth', 'verified']);

Route::post('file-upload', [FileController::class, 'store'])->name('file.store'); //aun no

Route::get('/dashboard', function () {
    return redirect('convocatorias');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
