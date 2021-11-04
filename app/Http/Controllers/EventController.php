<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index()
    {
        $search = request('search');

        if ($search) {
            $events = Event::where([
                ['title', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $events = Event::all();
        }

        return view('home', [
            'events' => $events,
            'search' => $search
        ]);
    }

    public function search(Request $search)
    {
    }

    // GET /events/create
    public function create()
    {
        return view('events.create');
    }

    // POST /events/create/store
    public function store(Request $request)
    {
        $event = new Event;
        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;
        $event->date = $request->date;

        // Image Upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->file('image');

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . time()) . '.' . $extension;

            // Salva a imagem no servidor
            $requestImage->move(public_path('assets/img/events'), $imageName);

            // Nome da imagem que será salva no banco
            $event->image = $imageName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect(route('index'))->with('message', 'Evento criado com sucesso!');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', [
            'event' => $event,
            'eventOwner' => $eventOwner
        ]);
    }
}
