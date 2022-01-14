@extends('layouts.main')

@section('title', 'Editando Evento ' . $event->title)

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1> Edição de evento</h1>
    <form action="/events/update/{{$event->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Imagem do evento:</label>
            <input type="file" class="form-control-file" id="image" name="image">             
            <img src="/img/events/{{$event->image}}" alt="{{$event->image}}" class="img-preview">
            
        </div>
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento" value="{{$event->title}}">
        </div> 
        <div class="form-group">
            <label for="date">Data do Evento:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{$event->date->format('Y-m-d')}}">
        </div>                
        <div class="form-group">
            <label for="city">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do Evento" value="{{$event->city}}" >
        </div>
        <div class="form-group">
            <label for="private">Evento privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1" {{$event->private ==1 ? "selected='selected'":""}}>Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea type="textarea" class="form-control" id="description" name="description" placeholder="Descrição do Evento" >{{$event->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Adicione itens de infraestrutura:</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="cadeiras"> Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="palco"> Palco
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="banheiro"> Banheiro Químico
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="buffet"> Buffet
            </div>
        </div>
        <div class="form-group">
            <input type="submit" value="Criar Evento" class="btn btn-primary">
        </div>
    </form>
</div>    

@endsection
