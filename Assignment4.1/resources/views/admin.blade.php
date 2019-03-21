@extends('layouts.home')

@section('userSpecificContent')
<!--View elements specific to the visitor user goes here-->

<!--Lists of things they can see-->
<!--NOTE: Edit functionality has not yet been implemented-->
<h2>Users</h2>
<ul>
@foreach($users as $user)
  <li>
    <ul>
      <li>Name: {{$user->name}}</li>
      <li>Role: {{$user->role}}</li>
      <li>Birthday: {{$user->dob}}</li>
      <li>Education Field: {{$user->educationField}}</li>
    </ul>
  </li>
  <br />
@endforeach
</ul>
<!--<p><b>Note: </b> The ability to edit users does not yet exist</p>-->
<br />
<br />

<h2>Subscriptions</h2>
<ul>
@foreach($subscriptions as $subscription)
  <li>
    <ul>
      <li>UserID: {{$subscription->user_id}}</li>
      <li>BookID: {{$subscription->book_id}}</li>
      <li>Start Date: {{$subscription->start}}</li>
      <li>End Date: {{$subscription->end}}</li>
    </ul>
    <a href="\editSubscription\{{$subscription->id}}">Edit</a>
  </li>
  <br />
@endforeach
</ul>
<a href="\addSubscription">Add Subscription</a>
<br />
<br />
<h2>Books</h2>
<ul>
@foreach($books as $book)
  <a href="\book_details\{{$book->id}}">
    <li>{{$book->title}}</li>
  </a>
@endforeach
</ul>
<p><b>Note: </b> The ability to edit books does not yet exist</p>

@endsection
