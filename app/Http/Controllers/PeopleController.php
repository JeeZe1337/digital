<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use App\Models\Task;
class PeopleController extends Controller
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
