@extends('layouts.app')

@section('content')
<div class="container py-5">

    

    

    <div class="card" style="width: 100%;">
        <img src="{{asset('storage/' . $post->src)}}" class="card-img-top" alt="Progetto : {{$post->id}}">
        
        <div class="card-body">
          <h5 class="card-title">Nome progetto: {{$post->name}}</h5>
          <p class="card-text">Di cosa tratta: {{$post->description}}</p>
          <p>Per visualizzare il progetto : <a href="#" class="btn btn-success">{{$post->link}}</a></p>
          <p>Tipologia : {{$post->type?->title}}</p>
        </div>
      
      </div>
      
      <div class="buttons mt-5">
        <a href="{{ route('admin.posts.edit', $post->id )}}" class="btn btn-light ">Modifica Progetto</a>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
          Elimina
       </button>
      </div>
     

<!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header">
            <h1 class="modal-title fs-5" id="deleteModalLabel">Elimina il post</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            Sei sicuro di voler eliminare il post?
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
            <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger">Elimina Progetto</button>
            </form>
        </div>

      </div>
    </div>
  </div>



</div>

    
@endsection