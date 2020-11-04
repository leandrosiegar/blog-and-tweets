<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;

class EntryController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {

        return view("entries.create");
    }

    public function store(Request $request) {
        // dd($request->all());

        $datosValidados = $request->validate([
            'title' => 'required|min:7|max:255|unique:entries',
            'content' => 'required|min:25|max:3000'
        ]);

        $entry = new Entry();
        $entry->title = $datosValidados["title"];
        $entry->content = $datosValidados["content"];
        $entry->user_id = auth()->id();
        $entry->save();

        $status = "Tu entrada se ha almacenado correctamente";
        return back()->with(compact('status'));
    }

    public function edit(Entry $entry) {
        // verificamos con el policie
        $this->authorize('update',$entry); // el id_user coge el user logueado por defecto

        return view("entries.edit", compact('entry'));
    }

    public function update(Request $request, Entry $entry) {
        // dd($request->all());

        // verificamos con el policie
        $this->authorize('update',$entry); // el id_user coge el user logueado por defecto

        $datosValidados = $request->validate([
            // Que el título sea único exceptuando el id de la misma entrada
            'title' => 'required|min:7|max:255|unique:entries,id,'.$entry->id,
            'content' => 'required|min:25|max:3000'
        ]);

        $entry->title = $datosValidados["title"];
        $entry->content = $datosValidados["content"];
        $entry->save();

        $status = "Tu entrada se ha modificado correctamente";
        return back()->with(compact('status'));
    }



}
