<?php

namespace App\Http\Controllers;
use App\Models\Evento;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventoController extends Controller
{
  public function index()
  {
    return view('evento.index');
  }

  public function create()
  {
  	//
  }

  public function store(Request $request)
  {
  	request()->validate(Evento::$rules);
  	$evento = Evento::create($request->all());
  }

  public function show(Evento $evento)
  {
  	$evento = Evento::all();
  	return response()->json($evento);
  }

  public function edit($id)
  {
  	$evento = Evento::find($id);
  	$evento->start = Carbon::createFromFormat("Y-m-d H:i:s", $evento->start)->format("Y-m-d");
  	$evento->end = Carbon::createFromFormat("Y-m-d H:i:s", $evento->end)->format("Y-m-d");
  	return response()->json($evento);
  }

  public function update(Request $request, Evento $evento)
  {
  	request()->validate(Evento::$rules);
    $evento->update($request->all());
    return response()->json($evento);
  }

  public function destroy($id)
  {
    $evento = Evento::find($id)->delete();
    return response()->json($evento);
  }
}
