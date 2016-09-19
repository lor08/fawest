@extends('layouts.master')

@section('body')
    @if($many)
        <h1>Пример меню</h1>
        <ul class="menu-ul">
            @foreach($nodes as $node)
                <li>
                    <span>{{$node->name}}</span>
                    @foreach($node->attaches as $attach)
                        <img src="{{URL::to($attach->filename)}}" alt="{{$attach->alt}}" title="{{$attach->title}}">
                    @endforeach

                    @if($node->getDescendantCount()>0)
                        <ul class="sub-menu-ul">
                            @foreach($node->getDescendants() as $descend)
                                <li><a href="{{URL::to('/category/'.$descend->slug)}}">{{$descend->name}}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <h1>Пример вывода подкатегорий текущей вызванной</h1>
        Текущая категория: <span>{{$node->name}}</span>
        @foreach($node->attaches as $attach)
            <img src="{{URL::to($attach->filename)}}" alt="{{$attach->alt}}" title="{{$attach->title}}">
        @endforeach
        <h3>Подкатегории:</h3>
        @if($node->getDescendantCount()>0)
            <ul class="sub-menu-ul">
                @foreach($node->getDescendants() as $descend)
                    <li><a href="{{URL::to('/category/'.$descend->slug)}}">{{$descend->name}}</a></li>
                @endforeach
            </ul>
        @endif

        <h1>Товары категории</h1>
        <ul>
            @foreach($products as $product)
                <li>
                    @if($product->attaches()->count() > 0)
                        <img src="{{URL::to($product->attaches->first()->filename)}}"
                             alt="{{$product->attaches->first()->alt}} title="{{$product->attaches->first()->title}}>
                    @endif
                    <a href="{{URL::to('news/'.$product->slug.'/'.$node->id)}}">{{$product->name}}</a>
                </li>
            @endforeach
        </ul>
        {!! $products->links() !!}

        <h1>Пример breadcrumbs</h1>
        <style>.ibl {
                display: inline-block;
            }</style>
        <li class="ibl"><a href="{{URL::to('/')}}">Главная</a></li>
        @foreach($node->getAncestors() as $descend)
            <li class="ibl">-><a href="{{URL::to('/category/'.$descend->slug)}}">{{$descend->name}}</a></li>
        @endforeach
        <li class="ibl">->{{$node->name}}</li>
    @endif

@stop