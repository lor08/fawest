@extends('layouts.master')

@section('body')

    <style>.ibl {
            display: inline-block;
        }</style>
    <li class="ibl"><a href="{{URL::to('/')}}">Главная</a></li>
    <li class="ibl">> <a href="{{URL::to('/news/')}}">Новости</a></li>
    @if($pathCat)
        @foreach($pathCat->getAncestors() as $descend)
            <li class="ibl">> <a href="{{URL::to('/news/'.$descend->slug)}}">{{$descend->name}}</a></li>
        @endforeach
        <li class="ibl">> <a href="{{URL::to('/news/'.$pathCat->slug)}}">{{$pathCat->name}}</a></li>
    @endif
    <li class="ibl">> {{$news->name}}</li>

    <h1>Вывод изображений товара</h1>
    @if($news->attaches)
        @foreach($news->attaches as $attach)
            <img src="{{URL::to($attach->filename)}}" alt="{{$attach->alt}}" title="{{$attach->title}}">
        @endforeach
    @endif

    <h3>Название: {{$news->name}}</h3>

    <h3>Аннотация:</h3>
    {!! $news->note !!}

    <h3>Описание:</h3>
    {!!$news->note !!}

    <h3>Входит в категории:</h3>
    @foreach($news->parentCategories as $cat)
        <li><a href="{{URL::to('/news/'.$cat->slug)}}">{{$cat->name}}</a></li>
    @endforeach

@stop