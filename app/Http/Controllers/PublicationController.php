<?php

namespace App\Http\Controllers;

use App\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publication::paginate();
        return view('publications.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //se retorna la vista para crear una publicación
        return view('publications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Persiste en la BDD el registro creado
        // all() todo lo que se pase en el formulario va a serivir para que se cree el producto
        $publication = Publication::create($request->all());
        // with() envia un mensaje en una variable que se le asigne
        return redirect()->route('publications.edit', $publication->id)->with('info', 'Publicación guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //se presenta un producto
        return view('publications.show', compact($publication));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        //Muestra el formulario de actualización
        return view('publications.edit', compact($publication));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        //Se actualiza la publicación en la BDD
        $publication->update($request->all());

        return redirect()->route('publications.update', $publication->id)->with('info', 'Publicación actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        //Se elemina a la publicación con el id, enviado en la URL
        $publication->delete();
        //se retorna a la vista anterior con un mensaje en la variable info
        return back()->with('info', 'Eliminado correctamente');
    }
}
