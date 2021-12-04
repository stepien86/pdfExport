@extends('layouts.app')
@section('content')

    <h1> index </h1>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Text</th>

          </tr>
        </thead>
        <tbody>
           @foreach ($posts as $post )
            <tr>
               <td>{{$post->id}}</td>
               <td>{{$post->title}}</td>
               <td>{{$post->text}}</td>
            </tr>
            @endforeach

        </tbody>
      </table>
      <a href="{{ route('export')}}" class="btn btn-info">Export</a>

@endsection
