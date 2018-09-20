<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasklist;

class TasklistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasklists = Tasklist::all();
        
        return view('tasklists.index', compact('tasklists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tasklist = new Tasklist;
        
        return view('tasklists.create', compact('tasklist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $tasklist = new Tasklist;
        $tasklist->content = $request->content;
        $tasklist->save();
        
        return redirect()->route('tasklists.index')->with('success', '新規タスクの登録が完了しました');
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
        $tasklist = Tasklist::find($id);
        
        return view('tasklists.show', compact('tasklist'));
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
        $tasklist = Tasklist::find($id);
        
        return view('tasklists.edit', compact('tasklist'));
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
        //
        $tasklist = Tasklist::find($id);
        $tasklist->content = $request->content;
        $tasklist->save();
        
        return redirect()->route('tasklists.index')->with('success', 'タスクの更新が完了しました');
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
        $tasklist = Tasklist::find($id);
        $tasklist->delete();
        
        return redirect()->route('tasklists.index')->with('success', 'タスクの削除が完了しました');
    }
}
