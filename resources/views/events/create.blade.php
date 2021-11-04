@extends('layouts.main')

@section('title', 'HDC Events - Criar Evento')
    

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu evento</h1>
    <form action="{{route('events.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="imge">Imagem do evento</label>
            <input type="file" name="image" id="imge" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento">
        </div>
        <div class="form-group">
            <label for="date">Data do evento:</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="form-group">
            <label for="city">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Cidade">
        </div>
        <div class="form-group">
            <label for="private">O evento é privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select>
        </div>
        <div class="form-group">
            <label for="private">Adicione items de infraestrutura:</label>
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea class="form-control" id="description" name="description" rows="5" placeholder="Descrição do Evento..."></textarea>
        </div>
        <div class="form-group">
            <label for="estrutura">Adicione itens de infraestrutura:</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" id="items" value="Cadeiras">Cadeiras
                <input type="checkbox" name="items[]" id="items" value="Palco">Palco
                <input type="checkbox" name="items[]" id="items" value="Cerveja grátis">Cerveja Grátis
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" id="items" value="Open Food"> Open Food            
                <input type="checkbox" name="items[]" id="items" value="Open Bar">Open Bar
                <input type="checkbox" name="items[]" id="items" value="Brindes">Brindes
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Criar Evento">
        </div>
            
    </form>
</div>

@endsection
