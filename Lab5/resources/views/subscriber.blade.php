@extends('layouts.home')

@section('userSpecificContent')
@if((Auth::user()->role)!='subscriber')
  <h2>Error</h2>
  <p>Sorry, only subscribers can view this page</p>
@endif
@if((Auth::user()->role)=='subscriber')
  <h2>Books</h2>
  <ul>
  @foreach($books as $book)
  <a href='book_details/{{ $book->id }}'>
  <li>{{$book->title}}</li>
  </a>
  @endforeach
  </ul>
  <!--View elements specific to the visitor user goes here-->
@endif
@endsection
