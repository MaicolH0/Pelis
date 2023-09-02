<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Obtener todos los elementos y los retorna la vista para su visualización
     * GET
     */
    public function index()
    {
        $users = User::all();
        dd($users);
    }

    /**
     * Retornar la vista con el formulario para la creación del elemento con los registros que requiera
     * GET
     */
    public function create()
    {
        $roles = Role::all();
        dba_list($roles);
    }

    /**
     * Recibir solicitud del formulario de creación del elemento y creación del registro
     * POST
     */
    public function store(Request $request)
    {
        $user = new User;

        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        //$user->photo codigo para subir foto
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        
        if($user->save()){
            //redireccionar a la vista index
        }
    }

    /**
     * Retornar la vista para visualizar un elemento
     * POST
     */
    public function show(string $id)
    {
        $user = User::find($id);
        dd($user);
    }

    /**
     * Retornar la vista  para editar un elemento en específico
     * GET
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        dd($user);
    }

    /**
     * Recibe la solicitud de actualización de un elemento y actualiza el registro
     * PUT
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        //$user->photo codigo para subir foto
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        
        if($user->save()){
            //redireccionar a la vista index
        }
    }

    /**
     * Eliminar un registro
     * DELETE
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
