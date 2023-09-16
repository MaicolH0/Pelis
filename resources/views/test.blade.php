@extends('layouts.app')
    
@section('content')
        
    <div>
        <h1>Hello {{ $name }}</h1>

        @if($number == 5)
            <h3>El número enviado es 5</h3>
        @else
            <h3>El número enviado no es 5</h3>
        @endif

        @isset($day)    {{-- para que si salen errores no lo muestre al usuario --}}
            @switch($day)
                @case($day == 'Monday')
                    <h3>Es lunes</h3>
                    @break
                @case($day == 'Tuesday')
                    <h3>Es martes</h3>
                    @break
                @default
                    <h3>Es otro día</h3>
            @endswitch
        @endisset

        <div class="container">
            <h3>Lista de usuarios</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre completo</th>
                        <th scope="col">Email</th>
                        <th scope="col">Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th>{{ $user->id }}</th>
                            <td>{{ $user->fullname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection