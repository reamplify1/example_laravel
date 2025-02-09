<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

// Route::get('/', function () {
//     return view('home');
// });

Route::view('/', 'home');

Route::get('/contact', function () {
    return view('contact');
});

Route::resource('jobs', JobController::class);

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

