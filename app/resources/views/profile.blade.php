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

    <form class=form method="post" enctype="multipart/form-data" action="{{url('/avatars')}}">
        <input name="_token" type="hidden" value="{!! csrf_token() !!}"/>
        <input type="file" name="avatar">
        <button type="submit">Add picture</button>
    </form>

    @if(Auth::user()->avatar)
        <img src="storage/{{Auth::user()->avatar}}" id='avatar' style="position: relative;left: calc(50vw - 185px);">
    @else
        <h1 style="position: relative;left: calc(50vw - 125px);">No Image To Show!</h1>
    @endif

    <style>
        #avatar {
            border-radius: 50%
        }

        img[src=''] {
            display: none;
        }
    </style>


    <div class="login-page">
        <div class="form">
            <h2>Username</h2>
            {{Auth::user()->name}}
            <form action="{{ url('/profile') }}" method=POST>
                <input name="_token" type="hidden" value="{!! csrf_token() !!}"/>
                <input type="text" name="name">
                <button type="submit"> Submit changes</button>
            </form>

            <h2>Email</h2>
            {{Auth::user()->email}}
            <form action="{{ url('/profile') }}" method=POST>
                <input name="_token" type="hidden" value="{!! csrf_token() !!}"/>
                <input type="text" name="email">
                <button type="submit"> Submit changes</button>
            </form>

            <h2>Address</h2>
            @if(Auth::user()->address != null)
            {{Auth::user()->address}}
            @endif

            <form action="{{ url('/profile') }}" method=POST>
                <input name="_token" type="hidden" value="{!! csrf_token() !!}"/>
                <input type="text" name="address">
                <button type="submit"> Submit changes</button>
            </form>

        </div>
    </div>

    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .login-page {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
        }

        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        .form input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form button {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #4CAF50;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }

        .form button:hover, .form button:active, .form button:focus {
            background: #43A047;
        }

        .form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
        }

        .form .message a {
            color: #4CAF50;
            text-decoration: none;
        }

        .form .register-form {
            display: none;
        }

        .container {
            position: relative;
            z-index: 1;
            max-width: 300px;
            margin: 0 auto;
        }

        .container:before, .container:after {
            content: "";
            display: block;
            clear: both;
        }

        .container .info {
            margin: 50px auto;
            text-align: center;
        }

        .container .info h1 {
            margin: 0 0 15px;
            padding: 0;
            font-size: 36px;
            font-weight: 300;
            color: #1a1a1a;
        }

        .container .info span {
            color: #4d4d4d;
            font-size: 12px;
        }

        .container .info span a {
            color: #000000;
            text-decoration: none;
        }

        .container .info span .fa {
            color: #EF3B3A;
        }

        body {
            background: #76b852; /* fallback for old browsers */
            background: -webkit-linear-gradient(right, #76b852, #8DC26F);
            background: -moz-linear-gradient(right, #76b852, #8DC26F);
            background: -o-linear-gradient(right, #76b852, #8DC26F);
            background: linear-gradient(to left, #76b852, #8DC26F);
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>
@stop