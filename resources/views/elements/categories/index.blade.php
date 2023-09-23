@extends('layouts.app')
@section('title', 'NovaTV - Lista de Usuarios')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h1 style="color: #2471A3;"><i class="fa fa-list-alt"></i> Lista de Categorias</h1>
            <hr>
            <a href="{{ route('categories.create') }}" class="btn btn-primary my-3" style="background-color: #2471A3">
                <i class="fa fa-plus pr-2"></i>
                Agregar Categoria
            </a>
            @isset($categories)
                @if (count($categories) >0)
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha de creación</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        <a href="{{ route('categories.show',$category->id)}}" class="btn btn-sm btn-light"> <i class="fa fa-search"></i> </a>
                                        <a href="{{ route('categories.edit',$category->id)}}" class="btn btn-sm btn-light"> <i class="fa fa-pen"></i> </a>
                                        <form action="{{ route('categories.destroy',$category) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{ $categories->links() }}
                @else
                    <div class="alert alert-warning my-4" role="alert">
                        Aún no hay categorias registrados
                    </div>
                @endif


            @endisset

        </div>
    </div>
@endsection