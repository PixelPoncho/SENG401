@extends ('layouts.app')
@section('content')
<h1>Someday, this page will show book details</h1>

<!-- <p> Until then, enjoy this image </p> -->

<!-- <img src = "https://cdn.pixabay.com/photo/2014/06/21/08/43/rabbit-373691__340.jpg" /> -->
<br>
<!-- <a href='//{{ $res->id }}/edit'>EDIT</a> -->
<h1>Information on Book: {{$res->title}}</h1>
<h2>id: {{$res->id}}</h2>
<h2>Title: {{$res->title}}</h2>
<h2>ISBN: {{$res->isbn}}</h2>
<h2>Author's ID: {{$res->author_id}}</h2>
<h2>Publication Year: {{$res->publicationYear}}</h2>
<h2>Publisher: {{$res->publisher}}</h2>
<h2>Link to Cover Image: {{$res->localLinkToImage}}</h2>
<H2>Cover Image:</h2>
<img src = "{{$res->localLinkToImage}}"/>
<br>
<br>
<p> UPDATE INFO </p>
<form method="POST" action="/book_details/updateManual">
  @csrf
  {{ method_field('PATCH') }}
  <input type="text" name="id" value="{{$res->id}}" disabled>
  <input type="text" name="title" value="{{$res->title}}">
  <input type="text" name="isbn" value="{{$res->isbn}}">
  <input type="text" name="author_id" value="{{$res->author_id}}">
  <input type="text" name="publicationYear" value="{{$res->publicationYear}}">
  <input type="text" name="publisher" value="{{$res->publisher}}">
  <input type="text" name="localLinkToImage" value="{{$res->localLinkToImage}}">
  <div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
      <button type="submit" class="btn btn-primary">
        Update
      </button>
    </div>
  </div>
</form>
@endsection
