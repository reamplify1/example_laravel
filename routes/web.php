<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

// Index (all jobs)
Route::get('/jobs', function ()  {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

// Create form
Route::get('jobs/create', function(){
    return view('jobs.create');
});


// show
Route::get('/jobs/{id}', function ($id)  {

    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

// store (+ in database)
Route::post('/jobs', function(){
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request(key: 'salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
});

// edit
Route::get('/jobs/{id}/edit', function ($id)  {

    $job = Job::find($id);

    return view('jobs.edit', ['job' => $job]);
});

// update
Route::patch('/jobs/{id}', function ($id)  {
    //validate the request
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);
    //authorize the request (do you john have permission? is it your job)
    //update
    $job = Job::findOrFail($id);
    //1
    // $job->title = request('title');
    // $job->salary = request('salary');
    // $job->save();
    //2
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);
    //redirect to the job page
        return redirect('/jobs/' . $job->id);
});

// delete
Route::delete('/jobs/{id}', function ($id)  {
    $job = Job::findOrFail($id);
    $job->delete();
    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
