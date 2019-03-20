@extends('home')

@section('userSpecificContent')
<h2>Books</h2>
<ul>
@foreach($books as $book)
<a href="\book_details">
<li>{{$book->title}}</li>
</a>
@endforeach
</ul>
<!--View elements specific to the visitor user goes here-->
@endsection
