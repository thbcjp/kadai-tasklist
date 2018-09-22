@extends('layouts.app')

@section('content')

    <h1>タスクの新規作成ページ</h1>
    
    {!! Form::model($task, ['route' => 'tasklists.store']) !!}
    
        {!! Form::label('content', 'タスク内容 : ') !!}
        {!! Form::text('content') !!}
        {!! Form::label('status', 'ステータス : ') !!}
        {!! Form::text('status') !!}
    
        {!! Form::submit('投 稿') !!}
        
    {!! Form::close() !!}

@endsection