@extends('layouts.app')

@section('content')

    <h1>id: {{ $tasklist->id }} のタスク編集ページ</h1>
    
    {!! Form::model($tasklist, ['route' => ['tasklists.update', $tasklist->id], 'method' => 'put']) !!}
    
        {!! Form::label('content', 'タスク内容') !!}
        {!! Form::text('content') !!}
        
        {!! Form::submit('更 新') !!}
        
    {!! Form::close() !!}

@endsection