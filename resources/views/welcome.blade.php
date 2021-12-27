@extends('layouts.main')

@section('title', 'Eventos')
@section('content')
<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="">
        <input type="text" class="form-control" id="search" name="search" placeholder="Pesquisar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    <h2>Próximos eventos</h2>
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    <div id="card-container" class="row">
        @foreach ($events as $event)
            <div class="card col-md-3">
                <img src="/img/events/{{$event->image}}" alt="{{$event->title}}">
                <div class="card-body">
                    <p class="card-date">10/09/2021</p>
                    <h5 class="card-title">{{$event->title}}</h5>
                    <p class="card-participants">X participantes</p>
                    <a href="" class="btn btn-primary">Saber Mais</a>
                </div>
            </div>
            @if ($loop->iteration%4==0)
                </div>
                <div id="card-container" class="row">
                        
            @endif            
        @endforeach
    </div>
</div>

@endsection