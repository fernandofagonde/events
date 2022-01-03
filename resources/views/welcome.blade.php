@extends('layouts.main')

@section('title', 'Eventos')
@section('content')
<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="GET">
        <input type="text" class="form-control" id="search" name="search" placeholder="Pesquisar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if ($search)
        <h2>Buscando por: <strong>{{$search}}</strong></h2>
    @else    
        <h2>Próximos eventos</h2>
    @endif
    
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    <div id="card-container" class="row">
        @foreach ($events as $event)
            <div class="card col-md-3">
                <img src="/img/events/{{$event->image}}" alt="{{$event->title}}">
                <div class="card-body">
                    <p class="card-date">{{date('d/m/Y',strtotime($event->date))}}</p>
                    <h5 class="card-title">{{$event->title}}</h5>
                    <p class="card-participants">X participantes</p>
                    <a href="/events/{{$event->id}}" class="btn btn-primary">Saber Mais</a>
                </div>
            </div>
            @if ($loop->iteration%4==0)
                </div>
                <div id="card-container" class="row">
                        
            @endif            
        @endforeach
        @if (count($events) == 0 && $search)
            <p >Não foi possível encontrar nenhum evento com {{$search}}! <a href="/"> Ver todos </a></p>
        @elseif(count($events) == 0)
            <p >Nenhum eventos disponível!</p>
        @endif
    </div>
</div>

@endsection