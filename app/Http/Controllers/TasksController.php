<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [];
        if (Auth::check()){
            $user = Auth::user();
            $tasks = $user->tasks()->latest()->paginate(10);
            
            $data = [
                'user' => $users,
                'tasks' => $tasks,
            ];
        }
        return view('tasklists.index', compact('tasks', 'user', 'tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(\Auth::check()){
            $task = new Task;
            return view('tasklists.create', compact('task'));
        } else {
            return view('/');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if(\Auth::check()){
            
            // バリデーション
            $this->validate($request, [
                    'content' => 'required|max:191',
                    'status' => 'required|max:10',
            ]);
            
            $task = new Task;
            $task->content = $request->content;
            $task->status = $request->status;
            $task->save();
            
            return redirect()->route('tasklists.index')->with('success', '新規タスクの登録が完了しました');

        } else {
            return view('/');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if(\Auth::check()){

            $task = Task::find($id);
            
            return view('tasklists.show', compact('task'));
        
        } 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        if(\Auth::check()){

            $task = Task::find($id);
            
            return view('tasklists.edit', compact('task'));

        } else {
                return view('/');
            }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(\Auth::check()){
            // バリデーション
            $this->validate($request, [
                    'content' => 'required|max:191',
                    'status' => 'required|max:10',
            ]);
    
            $task = Task::find($id);
            $task->content = $request->content;
            $task->status = $request->status;
            $task->save();
            
            return redirect()->route('tasklists.index')->with('success', 'タスクの更新が完了しました');
        } else {
                return view('/');
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(\Auth::check()){
            $task = Task::find($id);
            $task->delete();
            
            return redirect()->route('tasklists.index')->with('success', 'タスクの削除が完了しました');
        } else {
                return view('/');
            }

    }
}
