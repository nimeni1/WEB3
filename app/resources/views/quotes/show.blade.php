{{-- Used to extend the base layout --}}
@extends('layouts.app')

{{-- Stupid undefined variable error --}}
@section('content')
    Showing One: </br>
        <div>
            {{$content-> subject}}</br>
            {{$content-> quote}}</br>
            {{$content-> author}}</br>
        </div>
@stop