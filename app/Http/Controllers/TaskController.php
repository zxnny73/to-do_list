<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){

        $user=Auth()->user();
        //dd($user);
    if(Auth::id()){
        $usertype=Auth()->user()->usertype;

        if($usertype=='user'){
            $tasks = $user->tasks;
            //dd($tasks);
            return view('dashboard', compact('tasks'));
        }
        else if($usertype=='admin'){
            //dd($user);
            $name=User::all();
            //dd($name);
            return view('admins.adminhome', compact('name'));
        } 
        else {
            return redirect()->back();
        }
     }
    
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $task = Task::all();
        return view('dashboard', compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->input('task');
        $user_id = Auth::user()->id;
        $task = new Task();
        $task->tasks = $input;
        $task->user_id = $user_id;
        $task->save();
    
    return redirect()->route('home.index');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task,$id)
    {
        $task=Task::find($id);
        //dd($task);
        return view('profile.dashboardedit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $task=Task::find($id);
        $task->status= $request->status;
        $task->tasks = $request->tasks;
       // dd($task);
        $task->save();
        return redirect()->route("home.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task, $id)
    {
       
        $task = Task::find($id);
        $task->delete();
        return redirect()->back();
    }
    
    public function editusertasks($id)
    {
        $tasks=User::find($id)->load('tasks')->tasks()->get();
        return view('dashboard',compact('tasks'));
    }
}
