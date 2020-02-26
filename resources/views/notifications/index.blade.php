@extends('layouts.app')
@section('content')

<h2 class="text-center">Mis Notificaciones</h2>

<div class="container">
    
    <nav class="nav nav-pills nav-fill">
        <a class="nav-item nav-link" id="NotificationsNotRead" href="#">No leidos</a>
        <a class="nav-item nav-link" id="NotificationsRead" href="#">Leidos</a>
        <a class="nav-item nav-link" id="NotificationsFavorite" href="#">Favoritos</a>
    </nav>

    <div class="notifications-not-read__container" id="NotificationsNotReadContainer">
        <ul class="list-group notifications__container">
            @foreach($notifications as $notification)
                <li class="list-group-item mb-3 notification notification  " >
                    <div>
    
                        <p>
                            <b>{{ $notification->data['title'] }}</b>
                        </p>
                        <small>{{ $notification->id }}</small> <br>
                        <small>{{ $notification->data['message'] }}</small>
                    </div>
                    <div class="float-right ">
                        <form class="d-inline" action="{{ route('notifications.update',$notification->id) }}" method="post">
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