<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
return redirect()->route('dashboard');
});

Route::get('/proveedores', function(){
    return Inertia::render('Proveedores');})->name('proveedores');


Route::get('/convocatorias', function(){
    return Inertia::render('Convocatorias');})->name('convocatorias');

Route::get('/register-supplier', function(){
    return Inertia::render('ProveedoresRegistro');})->name('registerSupplier');
Route::post('/register-supplier', [\App\Modules\Suppliers\Adapters\In\SupplierController::class,'create'])->name('supplier.create');

Route::get('/register-invitation', function(){
    return Inertia::render('ConvocatoriasRegistro');})->name('registerInvitation');
Route::post('/register-invitation', [\App\Modules\Invitations\Adapters\In\InvitationController::class,'create'])->name('invitation.create');

//Route::get('/test',[\App\Modules\Users\Adapters\In\UserController::class, 'find'])->name('convocatorias');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//})->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
