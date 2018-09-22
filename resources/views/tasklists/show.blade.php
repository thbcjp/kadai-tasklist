@extends('layouts.app')

@section('content')

    <h1>id = {{ $task->id }} のタスク詳細ページ</h1>

    <p>タスク名 : {{ $task->content }} &nbsp;&nbsp;ステータス : {{ $task->status }}</p>
    
    {!! link_to_route('tasklists.edit', 'このタスクを編集する', ['id' => $task->id]) !!}
    
    {!! Form::model($task, ['route' => ['tasklists.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削 除') !!}
    {!! Form::close() !!}
    
@endsection