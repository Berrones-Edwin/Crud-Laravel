@extends('layouts.app')
@section('content')

<div class="container">

    @if(count($errors)>0)
        <section class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </section>
    @endif
    
    <form action="{{ url('/empleados') }}" method="post" enctype="multipart/form-data">

        <!-- @csrf Generar un token -->
        @csrf
        @include('empleados.form',['modo'=>'crear'])
        
    </form>
</div>
@endsection