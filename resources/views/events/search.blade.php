@extends('layouts.main')

@section('title', 'HDC Events') 

    
@section('content')

<div id="search-container" class="col-md-12" >
    <h1>Busque um evento</h1>
    <form class="row g-3" action="{{route('search')}}" method="GET">
        @csrf
        <div class="input-group mb-3">
          <input type="text" id="search" name="search" class="form-control" placeholder="Pesquisar...">
          <button class="btn btn-primary" type="submit" >Pesquisar</button>
        </div>
    </form>
</div>


<div id="events-container" class="container">
    <h2>Próximos Eventos</h2>
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    
    <div class="d-flex flex-row">
    <div id="cards-container" class="row">
        @if (count($events) > 0)        
            @foreach ($events as $event)
                <div class="card col-md "style="max-width:150px">
                    <img  class="img-fluid" src="/assets/img/events/{{$event->image}}" alt="{{ $event->title }}">
                    <div class="card-body">
                        <div class="card-date">
                            {{date('d/m/Y', strtotime($event->date))}}
                        </div>    
                        <h5 class="card-title">{{$event->title}}</h5>
                        <p class="card-participants">X participantes</p>
                        <a href="{{route('events.show', $event->id)}}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
        @else
            <!-- No results found -->
            <div class="card col-md">
                <div class="card-body bg-warning">
                    <p class="text-center">Nenhum evento encontrado</p>
                </div>
            </div>

        @endif
    </div>
    </div>
</div>




@endsection