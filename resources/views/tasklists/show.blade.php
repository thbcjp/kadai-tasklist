@extends('layouts.app')

@section('content')

@if (Auth::check())

    <h1>id = {{ $task->id }} のタスク詳細ページ</h1>

    <table class="table table-bordered table-hover">
        <tr>
            <th>id</th>
            <td>{{ $task->id }}</td>
        </tr>
        <tr>
            <th>ステータス</th>
            <td>{{ $task->status }}</td>
        </tr>
        <tr>
            <th>タスク</th>
            <td>{{ $task->content }}</td>
        </tr>
    </table>
    
    {!! link_to_route('tasklists.edit', 'このタスクを編集する', ['id' => $task->id], ['class' => 'btn btn-default']) !!}
    
    {!! Form::model($task, ['route' => ['tasklists.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削 除', ['class' => 'btn  btn-danger']) !!}
    {!! Form::close() !!}
    
@else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>ようこそ、私のタスクリストへ！</h1>
            {!! link_to_route('signup.get', 'サインアップ', null, ['class' => 'btn btn-primary btn-block']) !!}
        </div>
    </div>
@endif
    
@endsection