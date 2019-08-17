@extends('layouts.app')
@section('content')

<div class="container">
    <!-- Si existe o tiene valor que se muestre -->
    @if(Session::has('Mensaje'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('Mensaje') }}
        </div>
    @endif

    <a href="{{ url('empleados/create') }}" class="btn btn-success mb-2">Agregar Empleado</a>


    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody> 
            @foreach($empleados as $empleado)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' .  $empleado->Foto }}" alt="{{ $empleado->Nombre }}" width="100">
                    </td>
                    <td>{{ $empleado->Nombre . ' ' . $empleado->ApellidoPaterno . ' ' . $empleado->ApellidoMaterno }}</td>
                    <td>{{ $empleado->Correo }}</td>
                    <td>
                        <form action="{{ url('/empleados/'.$empleado->id) }}" method="post">
                            <a href="{{ url('/empleados/'.$empleado->id .'/edit') }}" class="btn btn-warning">Editar</a>
                            @csrf
                            {{method_field('DELETE')}}
                        
                            <button type="submit" class="btn btn-danger">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $empleados->links() }}
</div>
@endsection