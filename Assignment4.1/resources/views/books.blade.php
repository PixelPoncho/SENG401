@extends ('layouts.app')

@section('content')
<div class='container'>
  <div class='title'>
      <h1>Books</h1>

      <ul>
        @foreach($books as $book)
          <li>{{ $book }}</li>
        @endforeach
      </ul>
  </div>
</div>
@endsection
