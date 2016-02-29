@extends('layout')

@section('content')
        @unless ($people)
        <h3> About <h3>
        @else
        <h3>About</h3>
        @endunless
        
        @foreach ($people as $person) 
            <li>{{ $person }}</li>
        @endforeach
        
@stop