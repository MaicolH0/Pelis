@extends('layouts.app')
@section('title','NovaTV - Home')
@section('content')

    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <img class="my-2 img-top-card" width="500px" src="{{ asset('images/elements/dashboard.svg') }}" alt="Img dahsboard">
                <div class="card-header-novatv text-center">
                    <h4>
                        <i class="fa fa-clipboard-list"></i>
                        Escritorio
                        |
                        <small>
                            <i class="fas fa-user-ninja"></i> Administrador
                        </small>
                    </h4>
                </div>
                <div class="card-body row">

                    <div class="col-md-4 my-4"> 
                        <div class="card text-center">
                            <img src="{{ asset('images/elements/users.svg') }}" alt="users" width="200px" class="my-2 img-top-card">
                            <div class="card-body">
                                <a href="{{ route('users.index') }}" class="btn btn-primary btn-block" style="background-color: #2471A3">
                                    <i class="fa fa-users"></i>
                                    Módulo Usuarios
                                </a>
                            </div>
                        </div> 
                    </div>
                    {{--  --}}
                    <div class="col-md-4 my-4"> 
                        <div class="card text-center">
                            <img src="{{ asset('images/elements/categories.svg') }}" alt="categories" width="140px" class="my-2 img-top-card">
                            <div class="card-body">
                                <a href="{{ route('categories.index') }}" class="btn btn-primary btn-block" style="background-color: #2471A3">
                                    <i class="fa fa-list-alt"></i>
                                    Módulo Categorias
                                </a>
                            </div>
                        </div> 
                    </div>
                    {{--  --}}
                    <div class="col-md-4 my-4"> 
                        <div class="card text-center">
                            <img src="{{ asset('images/elements/movies.svg') }}" alt="movies" width="252px" class="my-2 img-top-card">
                            <div class="card-body">
                                <a href="{{ route('movies.index') }}" class="btn btn-primary btn-block" style="background-color: #2471A3">
                                    <i class="fa fa-film"></i>
                                    Módulo Peliculas
                                </a>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection