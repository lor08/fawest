@extends('layouts.master')

@section('body')
    <hr>
    <div class="text-right"><b>Всего новостей:</b> <i class="badge">{{ $count }}</i></div><br>
    @include('news.items')
@stop