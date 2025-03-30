@extends('Games.form')
@section('formName')
    Editar a <b>{{$game->name}}</b>
@endsection
@section('action')
    action = "{{route('games.update',$game)}}"
@endsection
@section('method') @method('PUT') @endsection