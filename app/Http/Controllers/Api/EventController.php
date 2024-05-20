<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required'
        ]);

        $event = Event::create($request->all());
        return response()->json($event, 201);
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)//$id
    {
        /*try {
            $event = Event::findOrFail($id);
            return response()->json($event);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Evento no encontrado'], 404);
        }*/

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required'
        ]);
    
        $event = Event::create($request->all());
        return response()->json([
            'EVENTO' => $event,
            'ESTADO' => true
        ], 201);
    }
    
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required'
        ]);

        // Buscar el evento existente
        $existingEvent = Event::findOrFail($event->id);

        // Actualizar los atributos con los datos de la solicitud
        $existingEvent->update($request->all());

        // Devolver la respuesta JSON con el evento actualizado
        return response()->json($existingEvent);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json(null, 204);
    }
}
