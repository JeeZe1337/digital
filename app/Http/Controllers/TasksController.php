<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use App\Models\Task;

class TasksController extends Controller
{
    public function index(){
    $tasks = Task::all();
    $people = People::all();
    return view('home', compact('tasks'), compact('people'));
    }
    
    public function create(){
    
        $tasks = Task::all();
        $people = People::all();
        return view('home', compact('tasks'), compact('people'));
    }

    public function store(){
        $tasks  = new Task();
        $tasks->name_task = request('name_task');
        $tasks->executor = request('executor');
        $tasks->status = request('status');
        $tasks->description = request('description');
        $tasks->save();
        return redirect('/#tab_01');
    }
    
    public function deleteTask($id){
        $tasks = Task::find($id);
        $tasks->delete();
        return response()->json(['Выполнено'=>'Запись удалена!']);
    }

    public function edit($id){
        $tasks = Task::find($id);
        $people = People::all();
        return view('editt', compact('tasks'), compact('people'));
    }
    public function update($id){

        $tasks = Task::find($id);

        $tasks->name_task = request('name_task');
        $tasks->executor = request('executor');
        $tasks->status = request('status');
        $tasks->description = request('description');

        $tasks->save();

        return redirect('/#tab_01');
    }
}

