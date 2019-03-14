@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          This is the page where you add a course <br>
          You are logged in! <br>
          Welcome {{Auth::user()->name}} <br>
          Your ID on this system is: {{Auth()->user()->id}} <br>
          Your role is: <span style="color:blue">{{Auth()->user()->role}}</span>

          <form method="POST" action="{{ action('CourseController@store') }}">
            @csrf
            <input type="text" name="user_id" placeholder="user_id">
            <input type="text" name="name" placeholder="name">
            <input type="text" name="department" placeholder="department">
            <input type="text" name="description" placeholder="description">
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('registerCourse') }}
                </button>
              </div>
            </div>
          </form>
          <br>
          <br>
          <tr>
            <td>user_id</td>
            <td>name</td>
            <td>department</td>
            <td>description</td>
            <br>
            <tr>
          @foreach($course_req as $row)
                <tr>
                    <td>{{$row->user_id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->department}}</td>
                    <td>{{$row->description}}</td>
                    <td><a href = 'delete/{{ $row->id }}'>Delete</a></td>
                    <br>
                </tr>
            @endforeach
            <br>
            <br>
            To Delete:

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
