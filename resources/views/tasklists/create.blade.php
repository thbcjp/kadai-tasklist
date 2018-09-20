@extends('layouts.app')

@section('content')

    <h1>タスクの新規作成ページ</h1>
    
    {!! Form::model($tasklist, ['route' => 'tasklists.store']) !!}
    
        {!! Form::label('content', 'メッセージ : ') !!}
        {!! Form::text('content') !!}
    
        {!! Form::submit('投 稿') !!}
        
    {!! Form::close() !!}

@endsection