<ul>
    <li class="ibl"><a href="{{URL::to('/')}}">Главная</a></li>
    @if(isset($pathCat))
        @foreach($pathCat->getAncestors() as $descend)
            <li class="ibl">> <a href="{{URL::to('/news/'.$descend->slug)}}">{{$descend->name}}</a></li>
        @endforeach
        <li class="ibl">> <a href="{{URL::to('/news/'.$pathCat->slug)}}">{{$pathCat->name}}</a></li>
    @endif
    @if( !empty($pagetitle) )
        <li class="ibl">> {{ $pagetitle }}</li>
    @elseif( !empty($title) )
        <li class="ibl">> {{ $title }}</li>
    @endif
</ul>
