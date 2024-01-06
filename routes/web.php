<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    $admins = App\Models\Admin::orderBy('created_at', 'asc')->get();
    $assignes = App\Models\Assigne::orderBy('created_at', 'asc')->get();

    $selectedAdmin = App\Models\Admin::first()->admin_id;
    $selectedAssigne = App\Models\Assigne::first()->assigne_id;
 
    return view('add', [
        'admins' => $admins,
        'assignes' => $assignes,
        'selectedAdmin' => $selectedAdmin,
        'selectedAssigne' => $selectedAssigne,

    ]);
});
 
/**
 * Add A New Task
 */
Route::post('/add-task', function (Request $request) {
    //
    $validator = Validator::make($request->all(), [
        'title' => 'required|max:255',
        'description' => 'required|max:255',
    ]);
 
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
 
    $task = new App\Models\Task;
    $task->admin_id = $request->admin_id;
    $task->assigne_id = $request->assigne_id;
    $task->title = $request->title;
    $task->description = $request->description;
    $task->save();
 
    return redirect('/list');
});

Route::get('/list', function () {
    $tasks = App\Models\Task::orderBy('created_at', 'asc')->paginate(10);
 
    return view('tasks', [
        'tasks' => $tasks,
    ]);
});

Route::get('/statistics', function () {
    $assignes = App\Models\Assigne::withCount('tasks')->get(10);
 
    return view('statistics', [
        'assignes' => $assignes,
    ]);
});