<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', \compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Se guarda al rol
        // dd($request->all());
        $role = Role::create($request->all());

        //se agrega los permisos al rol creado
        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.create')->with('info', 'Rol registrado exitosamente');
    }

     /**
     * Display the specified resource.
     *
     * @param  Caffeinated\Shinobi\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //se presenta un rol
        return view('roles.show', compact('role'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  Caffeinated\Shinobi\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //Se elemina a la publicación con el id, enviado en la URL
        $role->delete();
        //se retorna a la vista anterior con un mensaje en la variable info
        return back()->with('info', 'Eliminado correctamente');
    }
}
