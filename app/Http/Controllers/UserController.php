<?php

namespace BiciRegistro\Http\Controllers;

use BiciRegistro\User;
use BiciRegistro\RoleUser;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = User::select('roles.name as role_name','users.id as user_id')
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->get();
        $users = User::paginate(10);
        return view('users.index', compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('users.create', compact('roles'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'image' => 'image|mimes:jpeg,png,jpg',
            'password' => 'required',
            ]);

            $user = new User();

          if($request->hasFile('image')){
              $fechaHora=date("d-m-Y_g:i:s");
              $tamaño = getimagesize($request->file('image'));
              $width = intval($tamaño[0]);
              $height = intval($tamaño[1]);
              if($width > 500){
                  $widthResize = $width * (500 / $width);
                  $heightResize = $height * (500 / $width);
              }else{
                $widthResize = $width;
                $heightResize = $height;
              }
                $extension = $request->file('image')->getClientOriginalExtension();
                $user->image = 'users/'.$request->input('name').'_'.$fechaHora.'.'.$extension;
                Image::make($request->file('image'))->resize($widthResize,$heightResize)->save(storage_path('app/public/users/'.$request->input('name').'_'.$fechaHora.'.'.$extension));
            }

        $user2 = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'image' => $user->image,
            'password' => bcrypt($request->input('password')),
        ]);
        // Update roles
        $user2->roles()->sync($request->get('roles'));
        return back()->with('success','Usuario guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \BiciRegistro\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = User::select('roles.name')
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->where('role_user.user_id', '=', $user->id)
            ->get();
        return view('users.show', compact('user','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BiciRegistro\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BiciRegistro\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'image' => 'image|mimes:jpeg,png,jpg'
            ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if($request->hasFile('image')){
          $fechaHora=date("d-m-Y_g:i:s");
          $tamaño = getimagesize($request->file('image'));
          $width = intval($tamaño[0]);
          $height = intval($tamaño[1]);
          if($width > 500){
              $widthResize = $width * (500 / $width);
              $heightResize = $height * (500 / $width);
          }else{
            $widthResize = $width;
            $heightResize = $height;
          }
            $extension = $request->file('image')->getClientOriginalExtension();
            $user->image = 'users/'.$user->name.'_'.$fechaHora.'.'.$extension;
            Image::make($request->file('image'))->resize($widthResize,$heightResize)->save(storage_path('app/public/users/'.$user->name.'_'.$fechaHora.'.'.$extension));
        }


        if(!empty($request->input('password')))
        {
            $user->password = bcrypt($request->input('password'));
        }
        // Update user
        $user->update();
        // Update roles
        $user->roles()->sync($request->get('roles'));


        return redirect()->route('users.edit', $user->id)
        ->with('success','Usuario actualizado correctamente');
    }

    /**
     * Desactiva el usuario y agregamos el permiso especial no-access
     *
     * @return \Illuminate\Http\Response
     */
    public function disable(Request $request)
    {
      $user = User::find($request->input('user_idModalDisable'));
      $user->activo = false;
      $user->update();

      // Agregamos los roles en una variables para actualizarlos (sync)
      // junto con el rol especial "Acceso denegado"
      $rolesUpdate = array();
      foreach ($user->roles as $role) {
          array_push($rolesUpdate,$role->id);
      }
      // Agregamos ROl Aceeso denegado
      array_push($rolesUpdate,4);

      $user->roles()->sync($rolesUpdate);
        return back()->with('success','Deshabilitado correctamente');

    }

    /**
     * Activa el Usuario y le quitamos el permiso especial "no-access"
     *
     * @return \Illuminate\Http\Response
     */
    public function enable(Request $request)
    {
      $user = User::find($request->input('user_idModalEnable'));
      $user->activo = true;
      $user->update();

      // Agragamos los roles en una variables para actualizarlos (sync)
      // Y quitarle el rol especial "Acceso denegado"
      $rolesUpdate = array();
      foreach ($user->roles as $role) {
        // 4 => Acceso denegado
        if($role->id != 4){
          array_push($rolesUpdate,$role->id);
        }
      }

      $user->roles()->sync($rolesUpdate);

      return back()->with('success','Habilitado correctamente');
    }
}
