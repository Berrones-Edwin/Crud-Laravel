@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('notifications.store') }}" method="post">
        @csrf()
        <div class="form-group row">
            <label class="col-md-4" for="user_id">Usuario</label>
            <select name="user_id" id="user_id" class="form-control col-md-8">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>

        </div>
        <div class="form-group">
           <input type="text" name="title" id="title" autocomplete="off" placeholder="Titulo"  class="form-control">

        </div>
        <div class="form-group">
            <textarea name="description" placeholder="Escribe aqui tu mensaje..." class="form-control" id="description" cols="30" rows="10">
                Hola Ivan. ¿Como Estas?
            </textarea>

        </div>
        <div class="form-group">
            <input type="submit" class=" btn btn-block btn-secondary" value="Enviar">
        </div>
    </form>
</div>
@endsection