@extends('layouts.app')
@section('title', 'Pelis - Editar Peliculas')

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <h1> <i class="fa fa-pen"></i> Editar Pelicula</h1>
        <hr>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('home') }}">
                        <i class="fa fa-clipboard-list"></i>  
                        Escritorio
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('movies.index') }}">
                        <i class="fas fa-list-alt"></i> 
                        Módulo Peliculas
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa fa-pen"></i> 
                    Editar Pelicula
                </li>
            </ol>
        </nav>
        <form method="POST" action="{{route('movies.update',$movie->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="">Nombre </label>

                <div class="">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $movie->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="4">{{ $movie->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="quality" class="">Calidad</label>
                <select class="form-select" aria-label="Seleccione un rol..." name="quality" required>
                    <option selected>Seleccione...</option>
                    <option value="Cam">Cam</option>
                    <option value="FullHD">FullHD</option>
                    <option value="720p">720p</option>
                    <option value="1080p">1080p</option>
                    <option value="4K">4K</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="release_year" class="">Fecha de lanzamiento</label>

                <div class="">
                    <input id="release_year" type="date" class="form-control @error('release_year') is-invalid @enderror" name="release_year" value="{{ $movie->release_year }}" required autocomplete="release_year" autofocus>

                    @error('release_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="language" class="">Idioma </label>

                <div class="">
                    <input id="language" type="text" class="form-control @error('language') is-invalid @enderror" name="language" value="{{ $movie->language }}" required>

                    @error('language')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group mb-3">
                <div class="text-center my-3">
                    <img src="{{ asset($movie->image) }}" class="img-thumbnail" id="preview" width="120px">
                </div>
                <label for="image" class="form-label">Portada</label>
                <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*">
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <div class="mb-3">
                <label for="video_link" class="">Link del video </label>

                <div class="">
                    <input id="video_link" type="text" class="form-control @error('video_link') is-invalid @enderror" name="video_link" value="{{ $movie->video_link }}" required>

                    @error('video_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="download_link" class="">Link de descarga </label>

                <div class="">
                    <input id="download_link" type="text" class="form-control @error('download_link') is-invalid @enderror" name="download_link" value="{{ $movie->download_link }}" required>

                    @error('download_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="user_id" class="">Usuario</label>
                <select class="form-select" aria-label="Seleccione un usuario..." name="user_id" required>
                    <option selected>Seleccione...</option>
                    @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->fullname}}</option>
                    @endforeach

                </select>
            </div>
            <div class="mb-3">
                <label for="category_id" class="">Categoría</label>
                <select class="form-select" aria-label="Seleccione un categoria..." name="category_id" required>
                    <option selected>Seleccione...</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                </select>
            </div>

            <div class="d-grid gap-2 mb-3">
                <button type="submit" class="btn btn-primary btn-block text-uppercase"> Editar <i class="fa fa-save mx-2"></i></button>
            </div>

        </form>
    </div>
</div> 
@endsection