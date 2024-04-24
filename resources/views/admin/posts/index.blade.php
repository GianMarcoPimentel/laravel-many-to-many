@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>I miei progetti</h1>
    <table class="table">
        <thead>
          <tr>
            
            <th scope="col">#</th>
            <th scope="col">Nome del Progetto</th>
            <th scope="col"></th>
            
            
            
          </tr>
        </thead>
        <tbody>

            @foreach ($posts as $post)
                
                <tr>

                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$post->name}}</td>
                <td><a href="{{ route('admin.posts.show', $post->id )}}" class="btn btn-light ">Mostra Progetto</a></td>

                
  
                </tr>

            @endforeach

        </tbody>
      </table>

      <a href="{{route('admin.posts.create')}}" class="btn btn-info ">Aggiungi un Progetto</a>
      
</div>
@endsection