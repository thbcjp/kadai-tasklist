@extends('layouts.app')

@section('content')

@if (Auth::check())

<div class="row">
    <div class="form-group col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">

    <h1>タスクの新規作成ページ</h1>
    
    {!! Form::model($task, ['route' => 'tasklists.store']) !!}
    
        <div class="form-group">
        {!! Form::label('content', 'タスク内容 : ') !!}
        {!! Form::text('content', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('status', 'ステータス : ') !!}
        {!! Form::text('status', null, ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit('投 稿', ['class' => 'btn btn-default']) !!}
        
    {!! Form::close() !!}

    </div>
</div>

@else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>ようこそ、私のタスクリストへ！</h1>
            {!! link_to_route('signup.get', 'サインアップ', null, ['class' => 'btn btn-primary btn-block']) !!}
        </div>
    </div>
@endif

@endsection