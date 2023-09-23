<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    /**
     * Obtener todos los elementos y los retorna la vista para su visualización
     * GET
     */
    public function index()
    {

        // $users = User::all();
        $users = User::paginate(10);
        return view('elements.users.index')->with('users',$users);
    }

    /**
     * Retornar la vista con el formulario para la creación del elemento con los registros que requiera
     * GET
     */
    public function create()
    {
        $roles = Role::all();

        return view('elements.users.create')->with('roles',$roles);
    }

    /**
     * Recibir solicitud del formulario de creación del elemento y creación del registro
     * POST
     */
    public function store(UserRequest $request)
    
    {
        $user = new User;

        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->hasFile('photo')) {
            $file = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images/uploads'),$file);
            $user->photo = 'images/uploads/'.$file;
        }
        
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        
        if($user->save()){
            return redirect('users')->with('message','El usuario: '.$user->fullname.' ha sido creado existosamente!!');
        }
    }

    /**
     * Retornar la vista para visualizar un elemento
     * POST
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('elements.users.show')->with('user',$user);
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
    public function destroy(User $user)
    {
        $file = public_path().'/'.$user->photo;
        if (!str_contains($user->photo, 'https') && getimagesize($file) && $user->photo != 'images/no-profile.png') {
            unlink($file);
        }

        if($user->delete()){
            return redirect('users')->with('message','El usuario: '.$user->fullname.' ha sido eliminado existosamente!!');
        }
    }
}
