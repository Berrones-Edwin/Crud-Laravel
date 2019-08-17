@extends('layouts.app')
@section('content')

<div class="container">
    
    <h2>Editar los datos del EMPLEADO</h2>

    @if($empleado)
        <form action="{{ url('/empleados/' . $empleado[0]->id) }}" method="post" enctype="multipart/form-data">

            <!-- @csrf Generar un token -->
            @csrf
            {{ method_field('PUT') }}

            @include('empleados.form',['modo'=>'editar'])
        </form>
    @else
        {{ 'No existe' }}
    @endif
</div>

@endsection




