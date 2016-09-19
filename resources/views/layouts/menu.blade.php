@foreach(MainMenu::getMenu() as $item)
    <a href="/{{$item['url']}}">{{$item['name']}}</a>
@endforeach