@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>Tutte le tipologie</h1>
    <table class="table">
        <thead>
          <tr>
            
            <th scope="col">#</th>
            <th scope="col">Nome della tipologia</th>
            <th scope="col">Descrizione</th>
            <th scope="col"></th>
            
            
            
            
          </tr>
        </thead>
        <tbody>
            {{-- @dump($types); --}}
            @foreach ($types as $type)
                
                <tr>

                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$type->title}}</td>
                <td>{{$type->descriptiom}}</td>
                <td><a href="{{ route('admin.types.show', $type->id )}}" class="btn btn-light ">Mostra Progetto</a></td>

                
  
                </tr>

            @endforeach

        </tbody>
      </table>

{{--       <a href="{{route('admin.posts.create')}}" class="btn btn-info ">Aggiungi un Progetto</a>
 --}}      
</div>
@endsection