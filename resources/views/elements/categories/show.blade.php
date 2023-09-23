@extends('layouts.app')
@section('title','NovaTV - Ver categoria')

@section('content')

    <div class="row py-4 px-4">
        <div class="col-md-10 offset-md-1">
            <h1 style="color: #2471A3;">
                <i class="fa fa-search"></i> Ver UCategoria
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
                        <i class="fa fa-search"></i>
                            Ver Categoria
                    </li>
                </ol>
            </nav>
            <div>

                <div class="mb-3">
                    <label for="name">Nombre</label>

                    <div class="">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" disabled>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="name">Descripción</label>

                    <div class="">
                        <textarea name="description" class="form-control id="description" rpws="3"disabled>{{ $category->description }}</textarea>

                    </div>
                </div>


                <div class="d-grid gap-2 mb-3">
                    <a href="{{ route('users.index') }}" class="btn btn-primary btn-block" style="background-color: #2471A3"><i class="fa fa-arrow-left mx-2"></i> Volver </a>
                </div>

            </form>
        </div>
    </div>

@endsection

