@extends('layouts.app')
@section('title','NovaTV - Crear usuarios')

@section('content')

    <div class="row py-4 px-4">
        <div class="col-md-10 offset-md-1">
            <h1 style="color: #2471A3;">
                <i class="fa fa-plus"></i> Agregar Categoria
            </h1>
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
                        <a href="{{ route('categories.index') }}">
                            <i class="fa fa-list-alt"></i>
                            Módulo Categorias
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fa fa-plus"></i>
                            Adicionar Categoria
                    </li>
                </ol>
            </nav>
            <form action="{{ route('categories.update',$category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="fullname">Nombre</label>

                    <div class="">
                        <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" required autocomplete="name">
                        
                        @error('fullname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="name">Descripción</label>

                    <div class="">
                        <textarea name="description" class="form-control id="description" rpws="3">{{ $category->description }}</textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="d-grid gap-2 mb-3">
                    <button type="submit" class="btn btn-primary btn-block" style="background-color: #2471A3"> Actualizar <i class="fa fa-save mx-2"></i></button>
                </div>

            </form>
        </div>
    </div>


@endsection