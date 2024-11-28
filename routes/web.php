<?php

use Illuminate\Support\Facades\Route;

// Redirige directamente al dashboard sin necesidad de login
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Ruta del dashboard (asegúrate de que la vista 'dashboard.blade.php' esté disponible)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Si deseas que todas las rutas dentro del grupo 'auth' estén protegidas, pero que
// ya no se requiera login o registro, puedes dejar el middleware (si necesitas acceso
// autenticado a algunas rutas). Sin embargo, si no lo necesitas, elimínalo o ajustalo.
Route::middleware([
    'auth:sanctum', // Si sigues queriendo autenticación, mantén este middleware
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Aquí puedes incluir las rutas que requieran autenticación si es necesario
    // Si no necesitas autenticación en todo, puedes eliminar el middleware de la siguiente forma:
    
    // Ejemplo de una ruta protegida adicional
    // Route::get('/profile', function () {
    //     return view('profile');
    // })->name('profile');
});
