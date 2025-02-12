<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\JobController;
use App\Mail\JobPosted;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('test', function(){
//     Mail::to('test@test.com')->send(new JobPosted());
//     return 'Done';
// });


Route::view('/', 'home');

Route::get('/contact', function () {
    return view('contact');
});

// Route::resource('jobs', JobController::class)->only(['index', 'show']);
// Route::resource('jobs', JobController::class)->except(['index', 'show'])->middleware('auth');
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])
    ->middleware('auth');
    
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

//Auth
Route::get('/register', [RegisteredUserController::class, 'create']); 
Route::post('/register', [RegisteredUserController::class, 'store']); 

Route::get('/login', [SessionController::class, 'create'])->name('login'); 
Route::post('/login', [SessionController::class, 'store']); 
Route::post('/logout', [SessionController::class, 'destroy']); 

// Route::controller(JobController::class)->group(function() {
//     // Index (all jobs)
//         Route::get('/jobs', 'index');

//         // Create form
//         Route::get('jobs/create', 'create');

//         // show
//         Route::get('/jobs/{job}',  'show');

//         // store (+ in database)
//         Route::post('/jobs',  'store');

//         // edit
//         Route::get('/jobs/{job}/edit', 'edit');

//         // update
//         Route::patch('/jobs/{job}',  'update');

//         // delete
//         Route::delete('/jobs/{id}',  'delete');
//     });




// // Index (all jobs)
// Route::get('/jobs', [JobController::class, 'index']);

// // Create form
// Route::get('jobs/create', [JobController::class, 'create']);


// // show
// Route::get('/jobs/{job}', [JobController::class, 'show']);

// // store (+ in database)
// Route::post('/jobs', [JobController::class, 'store']);

// // edit
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

// // update
// Route::patch('/jobs/{job}', [JobController::class, 'update']);

// // delete
// Route::delete('/jobs/{id}', [JobController::class, 'delete']);

