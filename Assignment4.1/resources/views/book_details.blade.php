@extends ('layouts.app')
@section('content')
<h1><u>Book Details</u></h1>

<!-- <p> Until then, enjoy this image </p> -->

<!-- <img src = "https://cdn.pixabay.com/photo/2014/06/21/08/43/rabbit-373691__340.jpg" /> -->
<br>


<!-- BOOK DETAILS -->
<h1>{{ $res->title }}</h1>
<table border = 1>
  <tr>
    <!--<th>id: </th> -->
    <th>Title: </th>
    <th>ISBN: </th>
    <th>Authors: </th>
    <th>Publication Year: </th>
    <th>Publisher: </th>
    <!--<th>Link to Cover Image:</th>-->
    <th>Cover Image:</th>
  </tr>
  <tr>
    <!--<td>{{ $res->id }}</td> -->
    <td>{{ $res->title }}</td>
    <td>{{ $res->isbn }}</td>
    <td>{{ $res->author_id }}</td> <!--FIND A WAY TO MAKE THIS A LIST OF THE AUTHOR'S NAMES-->
    <td>{{ $res->publicationYear }}</td>
    <td>{{ $res->publisher }}</td>
    <!--<td> {{ $res->localLinkToImage }}</td>-->
    <td> <img src = "{{$res->localLinkToImage}}"/> </td>
  </tr>
</table>
<br />
<br />

<!-- COMMENTS -->
<h1> Comments </h1>
<ul>
@foreach($comments as $comment)

<li>{{ $comment->text }} <a href = '\commentEdit\{{$comment->id}}'> Edit </a></li>

@endforeach
</ul>
<br />
<a href = "\commentAdd\{{$res->id}}"> Add Comment</a>


<!--EDIT BOOK FORM-->
<h1> UPDATE INFO </h1>
<a href = "\bookEdit\{{$res->id}}"> Add Comment</a>
@endsection
