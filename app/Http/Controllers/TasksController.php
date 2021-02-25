<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use App\Models\Task;
use App\Models\Jobs;

class TasksController extends Controller
{
    public function index(){
    $tasks = new Task();
    $people = new People();
    return view('home', ['people'=> $people->all(), 'tasks'=> $tasks->all()]);
    }
    
   public function create(){
        $people = new People();
        $tasks = new Task();
        $jobs = new Jobs();
        return view('home', ['people'=> $people->all(), 'tasks'=> $tasks->all(), 'jobs'=> $jobs->all() ]);
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
        $tasks = new Task();
        $people = new People();
        $jobs = new Jobs();
        return view('editt', ['tasks'=> $tasks->find($id), 'people'=> $people->all(), 'jobs'=> $jobs->all()]);
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

