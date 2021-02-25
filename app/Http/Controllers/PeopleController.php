<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use App\Models\Task;
use App\Models\Jobs;
class PeopleController extends Controller
{
    public function index(){
    $tasks = new Task();
    $people = new People();
    return view('home', ['people'=> $people->all(), 'tasks'=> $tasks->all()]);
    }

    public function create(){    
    $tasks = new Task();
    $people = new People();
    return view('home', ['people'=> $people->all(), 'tasks'=> $tasks->all()]);
    }

    public function store(){
        $people  = new People();

        $people->name = request('name');
        $people->position = request('position');

        $people->save();

        return redirect('/#tab_02');
    } 
    public function deletePeople($id){
        $people = People::find($id);
        $people->delete();
        return response()->json(['Выполнено'=>'Запись удалена!']);

    }
    public function edit($id){
        $people = People::find($id);
        return view('editp', compact('people'));
    }
    public function update($id){
        $people = People::find($id);
        $people->name = request('name');
        $people->position = request('position');

        $people->save();

        return redirect('/#tab_02');
    }
}
