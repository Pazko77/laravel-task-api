<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\TaskController;

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::patch('/tasks/{task}/completed', [TaskController::class, 'completed']);
    Route::patch('/tasks/{task}/incompleted', [TaskController::class, 'incompleted']);
});

Route::get('/tasks', [TaskController::class, 'index']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/nouveau-prospect', function (Request $request) {
    // On définit des règles strictes
    $validator = Validator::make($request->all(), [
        'nom'   => 'required|string|max:50',
        'email' => 'required|email|unique:users,email', // Vérifie même si l'email existe déjà !
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422); // Code erreur 422 : Entité non traitable
    }

    return response()->json(['message' => 'Données parfaites, prêtes pour la base !']);
});
