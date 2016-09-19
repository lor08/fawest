<!DOCTYPE html>
<html lang="ru-RU">
<head>
    @include('header.head')
</head>
<body>
<header id="header" class="">
    @include('header.header')
</header>
<section>
    <div class="container">
        <h1 class="text-center">
            @if( !empty($pagetitle) )
                {{ $pagetitle }}
            @elseif( !empty($title) )
                {{ $title }}
            @else
                FaWeSt - Быстрые сайты
            @endif
        </h1>
        @include('layouts.breadcrumbs')
        @include('errors.errmsg')
        @yield('body')
    </div>
</section>
@include('footer.footer')
@include('footer.foot_script')
</body>
</html>