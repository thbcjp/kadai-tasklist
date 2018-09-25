<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::check()){
            
            $user = Auth::user();
            // $tasks = Task::latest()->paginate(10); これだとTaskの中身が全部取れてしまう。
            $tasks = $user->tasks()->latest()->paginate(5); // これならユーザーごとに紐づけられたタスクのみ取れる
            
            //if (Auth::user()->id === $tasks->user()->id){ なぜこれがダメなのか？
                
                $data = [
                    'user' => $user,
                    'tasks' => $tasks,
                ];
                
                return view('tasklists.index', $data);
                
            } else {
                
            } return redirect('/');
            
        } 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Auth::check()){
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
        
        if(Auth::check()){
            
            // バリデーション
            $this->validate($request, [
                    'content' => 'required|max:191',
                    'status' => 'required|max:10',
            ]);
            
            $task = new Task;
            $task->user_id = $request->user()->id;
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
        if (Auth::check()){ // ログインチェック
        
            $user = Auth::user(); // $userにユーザー情報を入れる
            $task = Task::find($id); // $taskに$id情報を入れる
            
            if ( Auth::user()->id === $task->user_id ){ // ユーザーIDとタスクから紐づけられたユーザーIDが同一かチェック
                
                $data = [
                    'user' => $user,
                    'task' => $task,
                ];
                
                return view('tasklists.show', $data); //$dataは配列の形にしてデータを格納させる
                
            } else {
                return redirect('/'); // falseだったらリダイレクトさせて見れないようにする
            }
            
            /*$user = Auth::user();
            $task = $user->tasks()->find($id);
            
            $data = [
                'user' => $user,
                'task' => $task,
            ];*/
    
        } else {

        return redirect('/');
        //return view('tasklists.show', compact('user', 'task'));
        
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
        //
        if(Auth::check()){
            
           
            
            $task = Task::find($id);
            //Auth::user()->id === $task->user_id;
            
            $user = Auth::user();
            //$task = $user->tasks()->find($id);
            
            if ( Auth::user()->id === $task->user_id ){
                
                //$user = Auth::user();
                //dd($task = $user->tasks()->find($id));

                $data = [
                    'user' => $user,
                    'task' => $task,
                ];
                
                return view('tasklists.edit', $data);
                
            } else {
                return redirect('/');
            } 
            
        } else {
                return redirect('/');
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
        if(Auth::check()){
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
        if(Auth::check()){
            $task = Task::find($id);
            $task->delete();
            
            return redirect()->route('tasklists.index')->with('success', 'タスクの削除が完了しました');
        } else {
                return view('/');
            }

    }
}
