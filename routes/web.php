<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect()->route('convocatorias');
});

Route::get('/proveedores', [\App\Modules\Suppliers\Adapters\In\SupplierController::class, 'search'])->name('proveedores');
Route::get('/proveedores/{id}',[\App\Modules\Suppliers\Adapters\In\SupplierController::class, 'find'])->name('proveedor.perfil');



Route::get('/register-supplier', function () {
    return Inertia::render('ProveedoresRegistro');
})->name('registerSupplier');
Route::post('/register-supplier', [\App\Modules\Suppliers\Adapters\In\SupplierController::class, 'create'])->name('supplier.create');

//Route::post('/apply-supplier', [\App\Modules\Suppliers\Adapters\In\SupplierController::class, 'apply'])->name('supplier.apply'); //aun no
Route::get('/apply-supplier', function () {
    return Inertia::render('Postularse');})->name('apply');
Route::get('/convocatoria/{id}', [\App\Modules\Invitations\Adapters\In\InvitationController::class, 'find'])->name('convocatoria.perfil');
Route::get('/convocatorias', [\App\Modules\Invitations\Adapters\In\InvitationController::class, 'search'])->name('convocatorias')->middleware(['auth', 'verified']);

Route::patch('update-invitation/{id}', [\App\Modules\Invitations\Adapters\In\InvitationController::class, 'edit'])->name('invitation.edit'); //aun no


Route::get('/register-invitation', function () {
    return Inertia::render('ConvocatoriasRegistro');
})->name('registerInvitation');
Route::post('/register-invitation', [\App\Modules\Invitations\Adapters\In\InvitationController::class, 'create'])->name('invitation.create');

//Route::get('/test',[\App\Modules\Users\Adapters\In\UserController::class, 'find'])->name('convocatorias');

Route::get('/convocatorias-iframe', function () {
    return Inertia::render('ConvocatoriasIframe');
})->name('convocatoriasIframe');

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
