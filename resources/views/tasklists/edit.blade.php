@extends('layouts.app')

@section('content')

    <h1>id: {{ $task->id }} のタスク編集ページ</h1>
    
    {!! Form::model($task, ['route' => ['tasklists.update', $task->id], 'method' => 'put']) !!}
    
        {!! Form::label('content', 'タスク内容') !!}
        {!! Form::text('content') !!}
        
        {!! Form::submit('更 新') !!}
        
    {!! Form::close() !!}

@endsection