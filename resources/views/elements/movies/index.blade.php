@extends('layouts.app')
@section('title', 'Pelis - Lista de Peliculas')

@section('content')
  <div class="row">
    <div class="col-md-10 offset-md-1">
        <h1 style="color: #2471A3;"> <i class="fa fa-film"></i> Lista de Peliculas</h1>
        <hr>
        @if (Auth::user()->role->name == 'Admin')
          <a href="{{route('movies.create')}}" class="btn btn-primary my-3"> 
            <i class="fa fa-plus pr-2"></i>
            Agregar Pelicula
          </a>
        @endif

        <br>
        @if (count($movies)>0)
        <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Categoría</th>
                <th scope="col">Idioma</th>
                <th scope="col">Imagen</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Acciones</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <th>{{$movie->id}}</th>
                        <td>{{$movie->name}}</td>
                        <td>{{$movie->category->name}}</td>
                        <td>{{$movie->language}}</td>
                        <td><img src="{{ asset($movie->image) }}" width="36px"></td>
                        <td>{{$movie->created_at}}</td>

                        <td>
                            <a href="{{route('movies.show',$movie->id)}}" class="btn btn-sm btn-light"> <i class="fa fa-search"></i></a>
                            @if (Auth::user()->role->name == 'Admin')
                              <a href="{{route('movies.edit',$movie->id)}}" class="btn btn-sm btn-light"> <i class="fa fa-pen"></i></a>
                              <form action="{{route('movies.destroy',$movie)}}" method="POST" class="d-inline">
                                  @csrf
                                  @method('delete')
                                  <button type="button" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                              </form>
                            @endif
                        </td>

                    </tr>
                @endforeach

            </tbody>
          </table>
        @else
            <div class="alert alert-warning my-4" role="alert">
                Aún no hay Peliculas registradas
            </div> 
        @endif
    </div>
  </div>
@endsection