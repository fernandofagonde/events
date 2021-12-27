<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    //
    public function index(){
        $events = Event::all();
        return view('welcome',
            ['events'=>$events]);
    }
    public function create()
    {
        return view('events.create');
    }

    public function list()
    {
        return view('events.list');
    }

    public function store(Request $request){
        $event = new Event;

        $event->title       = $request->title;
        $event->city        = $request->city;
        $event->private     = $request->private;
        $event->description = $request->description;

        if($request->hasFile('image') && $request->file('image')->isValid() ) {
            
            $requestImage = $request->image;
            
            $extension = $requestImage->extension();
            
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;
            
            $requestImage->move(public_path('/img/events/'), $imageName);
            
            $event->image = $imageName;

        } else {
            return redirect('/')->with('msg', 'Erro no upload da imagem');    
        }

        $event->save();
        
        return redirect('/')->with('msg', 'Evento criado com sucesso');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        
        return view('events.show',['event'=>$event]);
    }


}
