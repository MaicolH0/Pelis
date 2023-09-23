@extends('layouts.app')
@section('title', 'NovaTV - Lista de Usuarios')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h1 style="color: #2471A3;"><i class="fa fa-users"></i> Lista de Usuarios</h1>
            <hr>
            <a href="{{ route('users.create') }}" class="btn btn-primary my-3" style="background-color: #2471A3">
                <i class="fa fa-plus pr-2"></i>
                Agregar Usuario
            </a>
            @isset($users)
                @if (count($users) >0)
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre completo</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Télefono</th>
                                <th scope="col">Fecha de creación</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->fullname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a href="{{ route('users.show',$user->id)}}" class="btn btn-sm btn-light"> <i class="fa fa-search"></i> </a>
                                        <a href="{{ route('users.edit',$user->id)}}" class="btn btn-sm btn-light"> <i class="fa fa-pen"></i> </a>
                                        <form action="{{ route('users.destroy',$user) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{ $users->links() }}
                @else
                    <div class="alert alert-warning my-4" role="alert">
                        Aún no hay usuarios registrados
                    </div>
                @endif


            @endisset

        </div>
    </div>
@endsection