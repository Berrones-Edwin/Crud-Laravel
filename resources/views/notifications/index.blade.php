@extends('layouts.app')
@section('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
@section('content')

<h2 class="text-center">Mis Notificaciones</h2>
<a href="{{ route('notifications.create') }}" class="btn btn-primary">Enviar Notificacion</a>

<div class="container">
    <nav class="nav nav-pills nav-fill">
        <button class="nav-item nav-link" id="NotificationsNotRead">No leidos</button>
        <button class="nav-item nav-link" id="NotificationsRead">Leidos</button>
        <button class="nav-item nav-link" id="NotificationsFavorite">Favoritos</button>
    </nav>

    <div class="notifications-not-read__container" id="NotificationsNotReadContainer">
        <ul class="list-group notifications__container">
            @foreach($notifications as $notification)
                    <li class="list-group-item mb-3 notification {{ $notification->read_at == null ? 'notification-not-read' : '' }}  " >
                        <div>
        
                            <p>
                                <b>{{ $notification->data['title'] }}</b>
                            </p>
                            <small>{{ $notification->id }}</small> <br>
                            <small>{{ $notification->data['message'] }}</small>
                        </div>
                        <div class="float-right ">
                            
                            <form class="d-inline  " action="{{ route('notifications.update',$notification->id) }}" method="post">
                                @method('PUT') @csrf()
                                <button type="submit" class="btn btn-sm btn-info">*</button>
                            </form>
                            
                            <form class="d-inline" action="{{ route('notifications.destroy',$notification->id) }}" method="post">
                                @method('DELETE') @csrf()
                                <button type="submit" class="btn btn-sm btn-danger">x</button>
                            </form>
                        </div>
                    </li>
                    
            @endforeach
           
        </ul>

    </div>
</div>
@endsection