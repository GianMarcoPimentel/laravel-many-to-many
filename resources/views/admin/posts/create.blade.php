@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1>Aggiungi un nuovo progetto</h1>
    {{--     scrivo il nome della rotta come action e so dal terminale che il metodo della store è POST --}}    
    <form action="{{ route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      {{-- per salvare tutto ciò che ho già scritto di corretto devo usare il metodo old() --}}

        <div class="mb-3">
          <label for="name" class="form-label">Nome del progetto</label>
          <input 
          type="text" 
          class="form-control
          @error('name')
          is-invalid 
          @enderror" 
          id="name" 
          name="name" 
          value="{{ old('name') }}">
        </div>
        @error('name')
        <div class="alert alert-danger">
          {{$message}}
        </div>
        @enderror

        
        <div class="mb-3">
          <label for="description" class="form-label">Descrizione</label>
          <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name=" description">{{ old('description') }}</textarea>
        </div>
        @error('description')
        <div class="alert alert-danger">
          {{$message}}
        </div>
        @enderror

        
        <div class="mb-3 ">
          <label class="form-label" for="src">Immagine</label>
          <input type="file" class="form-control @error('src') is-invalid @enderror" id="src" name=" src" value="{{ old('src') }}">
        </div>
        @error('src')
        <div class="alert alert-danger">
          {{$message}}
        </div>
        @enderror

          
        <div class="mb-3 ">
          <label class="form-label" for="link">Link GitHub</label>
          <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name=" link" value="{{ old('link') }}">
        </div>
        @error('link')
        <div class="alert alert-danger">
          {{$message}}
        </div>
        @enderror

        <div class="mb-3 ">
          <label class="form-label" for="type_id">Tipologia</label>

          <select name="type_id" id="type_id">

            <option value="">#</option>
            @foreach ($types as $type)
            <option value="{{$type->id}}" {{ $type->id == old('type_id') ? 'selected' : '' }}>{{$type->title}}</option>    
            @endforeach
          </select>

        </div>

        {{--@dump($technologies)--}}
        <div class="mb-3">
          <label class="mb-3" for="">Tecnologie usate :</label>
          <div class="d-flex gap-4">

              @foreach($technologies as $technology)
    
              <input 
              type="checkbox"
              id="{{$technology->id}}"
              name="technologies[]"
              value="{{$technology->id}}"
              class="form-check-input "
              {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}

              >
              <label 
              for="{{$technology->id}}"
              class="form-check-label "

              >
              {{ $technology->name }}</label>
              @endforeach

          </div>
        </div>


        <button type="submit" class="btn btn-primary">Aggiungi Progetto</button>
      </form>
    </div>
@endsection