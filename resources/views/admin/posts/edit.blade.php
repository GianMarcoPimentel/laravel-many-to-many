@extends('layouts.app')

@section('content')

<div class="container py-5">
    <h1>Modifica il tuo progetto</h1>

<form action="{{ route('admin.posts.update', $post->id)}}" method="POST" enctype='multipart/form-data'>
    @csrf
    @method('PUT')

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
      value="{{old('name') ?? $post->name}}"">
    </div>
    @error('name')
    <div class="alert alert-danger">
      {{$message}}
    </div>
    @enderror

    
    <div class="mb-3">
      
      <label for="description" class="form-label">Descrizione</label>
      <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name=" description">{{old('description') ?? $post->description}}"</textarea>
    </div>
    @error('description')
    <div class="alert alert-danger">
      {{$message}}
    </div>
    @enderror

    
    <div class="mb-3 ">
{{--       <img src="{{asset('storage/' . $post->src)}}" class="card-img-top" alt="Progetto : {{$post->id}}">
 --}}
      <label class="form-label" for="src">Immagine</label>
      <input type="file" class="form-control @error('src') is-invalid @enderror" id="src" name="src" value="{{old('src') ?? $post->src}}" >
    </div>
    @error('src')
    <div class="alert alert-danger">
      {{$message}}
    </div>
    @enderror


      
    <div class="mb-3 ">
      <label class="form-label" for="link">Link GitHub</label>
      <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name=" link" value="{{old('link') ?? $post->link}}">
    </div>
    @error('link')
    <div class="alert alert-danger">
      {{$message}}
    </div>
    @enderror


    <div class="mb-3 ">
      <label class="form-label" for="type_id">Tipologia</label>

      <select name="type_id" id="type_id">

        @foreach ($types as $type)
       
        <option value="{{$type->id}}" {{ $type->id == $post->type_id ? 'selected' : '' }}>
          {{$type->title}}
        </option>
            
        @endforeach
      </select>
      
    </div>

    <div class="mb-3">
      <label class="mb-3" for="">Tecnologie usate :</label>
      <div class="d-flex gap-3">

          @foreach($technologies as $technology)
        <div class="form-check">

          {{-- conotrllo se ho errori , quindi sto ricevendo parametri old() --}}
          @if($errors->any())
          {{--  se ho errori , quindi parametro old() --}}
          <input 
          type="checkbox"
          id="{{$technology->id}}"
          name="technologies[]"
          value="{{$technology->id}}"
          class="form-check-input "
          {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}

          >
          @else
          {{-- se non ho errori , quindi old() nullo--}}
          <input 
          type="checkbox"
          id="{{$technology->id}}"
          name="technologies[]"
          value="{{$technology->id}}"
          class="form-check-input "
          {{ $post->technologies->contains($technology) ? 'checked' : '' }}

          >
          @endif
          <label 
          for="{{$technology->id}}"
          class="form-check-label "

          >
          {{ $technology->name }}</label>

        </div>
          @endforeach
          
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Salva</button>
  </form>
</div>

@endsection