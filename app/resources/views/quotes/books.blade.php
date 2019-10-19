{{-- Used to extend the base layout --}}
@extends('layouts.app')


@section('content')
    <header class="intro" style="height:230px;">
        <nav class="menu" style="top:204px;">
            <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open"/>
            <label class="menu-open-button" for="menu-open">
                <span class="lines line-1"></span>
                <span class="lines line-2"></span>
                <span class="lines line-3"></span>
            </label>

            <a href="#" class="menu-item blue" style="opacity: 0;">
                <i>
                </i>
            </a>

            <a href="/admin" class="menu-item green" style=""> <i class="fa fa-coffee">admin</i> </a>

            <a href="/profile" class="menu-item red"> <i style="position: absolute;left: 0;right: 0;top: 0px;">
                    profile
                </i> </a>
            <a href="/home" class="menu-item purple"> <i style="position: absolute;left: 0;right: 0;top: 0px;">
                    home
                </i> </a>
            <a href="/books" class="menu-item orange"> <i style="position: absolute;left: 0;right: 4px;top:0px;">
                    book
                </i> </a>
            <a href="/movies" class="menu-item lightblue" style=""> <i class="fa fa-diamond">
                    movie
                </i> </a>
            <a href="/export" class="menu-item lightblue" style=""> <i class="fa fa-diamond">
                    export
                </i> </a>
        </nav>
    </header>

    <main class="c-quotes-grid">
        <div id="grid-items-container">
            @foreach($books as $book)
                    <div class="c-quote-grid-item c-quote-sizer">
                        <div class="c-vertical-sizer">
                            <div class="e-inner" style="top:5%">
                                <h2>{{$book-> quote}}</h2>
                                <h4 class="v-above">- {{$book-> author}}</h4>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </main>


@stop