@extends('layout')

@section('content')
        @unless ($people)
        <h3> Welcome <h3>
        @else
        <h3>Welcome</h3>
        @endunless
        
        @foreach ($people as $person) 
            <li>{{ $person }}</li>
        @endforeach
        
@stop