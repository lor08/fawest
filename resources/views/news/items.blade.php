<div class="messages">
    @if( !$news->isEmpty() )
        @foreach($news as $item)
            {{!$path = ($item->path) ? $item->path : $item->slug}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span>
                            #{{ $item->id }} <a
                                    href="{{URL::to('news/'.$path.'/')}}">{{  $item->name }}</a>
                        </span>
                        <span class="pull-right label label-info">
                            {{--17:15:00 / 03.01.2015--}}
                            {{  $item->created_at }}
                        </span>
                    </h3>
                </div>
                <div class="panel-body">
                    {{  $item->note }}
                    <hr>
                    <div class="pull-right">
                        <a href="#" class="btn btn-info">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                        <button class="btn btn-danger">
                            <i class="glyphicon glyphicon-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="text-center">
            {!! $news->render() !!}
        </div>
    @else
        Новостей нет
    @endif
</div>