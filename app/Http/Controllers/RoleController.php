<?php

namespace BiciRegistro\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(10);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:roles,name',
            'slug' => 'required|unique:roles,slug',
            ]);

        $role = Role::create($request->all());
        $role->permissions()->sync($request->get('permissions'));
        return back()->with('success','Rol guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \BiciRegistro\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BiciRegistro\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get();
        return view('roles.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BiciRegistro\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:roles,name,'.$role->id,
            ]);

        // Actualizamos el rol
        $role->update($request->all());
        // Actualizamos los permisos
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('roles.edit', $role->id)
        ->with('success','Rol actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BiciRegistro\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $role = Role::find($request->input('role_idModalDisable'));
        if(isset($role)){
          if($role->name == "Acceso denegado"){

            return back()->with('danger','Para la seguridad del sistema, este rol no debe ser eliminado');
          }else{
            $role->delete();
            return back()->with('success','Rol eliminado correctamente');
          }
        }else{
          return back()->with('danger','Error al eliminar el rol');
        }
    }
}
