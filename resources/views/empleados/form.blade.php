<h2 class="text-center">{{ $modo === 'crear' ? 'Agregar Empleado' : 'Editar Empleado' }}</h2>

<div class="form-group">
        <label class="control-label" for="Nombre">{{'Nombre'}}</label>
        <input required type="text" autocomplete="off" name="Nombre" 
                id="Nombre" value="{{ isset($empleado[0]->Nombre) ? $empleado[0]->Nombre : old('Nombre') }}" class="form-control {{ $errors->has('Nombre') ? 'is-invalid' : '' }} ">
</div>
{!! $errors->first('Nombre','<div class="invalid-feedback"> :message  <div>') !!}

<div class="form-group">
        <label class="control-label" for="ApellidoPaterno">{{'ApellidoPaterno'}}</label>
        <input required type="text" autocomplete="off" 
                name="ApellidoPaterno" id="ApellidoPaterno"
                value="{{ isset($empleado[0]->ApellidoPaterno) ? $empleado[0]->ApellidoPaterno : old('ApellidoPaterno') }}" 
                class="form-control {{ $errors->has('ApellidoPaterno') ? 'is-invalid' : '' }} ">
</div>
{!! $errors->first('ApellidoPaterno','<div class="invalid-feedback"> :message  <div>') !!}

<div class="form-group">
        <label class="control-label" for="ApellidoMaterno">{{'ApellidoMaterno'}}</label>
        <input required type="text" autocomplete="off"
                name="ApellidoMaterno" id="ApellidoMaterno"
                value="{{ isset($empleado[0]->ApellidoMaterno) ? $empleado[0]->ApellidoMaterno : old('ApellidoMaterno') }}"
                 class="form-control {{ $errors->has('Nombre') ? 'is-invalid' : '' }} ">
</div>
{!! $errors->first('ApellidoMaterno','<div class="invalid-feedback"> :message  <div>') !!}


<div class="form-group">
        <label class="control-label" for="Correo">{{'Correo'}}</label>
        <input required type="email" autocomplete="off" 
                name="Correo" id="Correo"
                value="{{ isset($empleado[0]->Correo) ? $empleado[0]->Correo : old('Correo') }}"
                class="form-control {{ $errors->has('Correo') ? 'is-invalid' : '' }} ">
</div>
{!! $errors->first('Correo','<div class="invalid-feedback"> :message  <div>') !!}

<div class="form-group">

        <label class="control-label"  for="Foto">{{'Foto'}}</label>
        <input class="form-control {{ $errors->has('Foto') ? 'is-invalid' : '' }} " 
                type="file" autocomplete="off"
                name="Foto" id="Foto">
</div>
{!! $errors->first('Foto','<div class="invalid-feedback"> :message  <div>') !!}


@if(isset($empleado[0]->Foto))
<div class="form-group">
        <img src="{{ asset('storage') . '/' .  $empleado[0]->Foto }}" 
                alt="{{ $empleado[0]->Nombre }}" width="200"
                class="img-thumbnail img-fluid">
</div>
@endif
<input class="btn btn-success" type="submit" value="{{ $modo === 'crear' ? 'Agregar' : 'Editar' }}">
<a class="btn btn-secondary" href="{{ url('empleados') }}">Regresar</a>