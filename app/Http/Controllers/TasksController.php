<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Task;

class TasksController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('welcome', compact('user'));
    }

    public function create(Request $request){
        $task = new Task; //instantiate db schema
        $task -> description = $request->description;  //save description into table description field
        $task->user_id = Auth::id(); //save authentication id into user_id field
        $task -> save(); //save all variables
        return redirect('/'); //redirect back to home page when done
    }

    public function add(){
        return view('add'); //returns add.blade.php
    }

    public function edit(Task $task){

        if(Auth::check() && Auth::user()->id == $task->user_id) return view('edit', compact('task'));
        else return redirect('/');
        
    }

    public function update(Request $request, Task $task){
        $task->description = $request->description;
        $task->save();
        return redirect('/');
    }

    public function delete(Task $task){
        if(isset($_POST['DELETE'])){
            // $task = Task::findOrFail($task);

            $task->delete();
        
            // Session::flash('flash_message', 'Task successfully deleted!');
        
            // return redirect()->route('tasks.index');
            // $task->delete();
            return redirect('/');
        }

    }

}
