<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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
        if(Auth::user()->role->name != 'Admin'){
            return redirect('home')->with('error','No se puede acceder a este recurso');
        }
        // $categories = category::all();
        $categories = Category::paginate(10);
        return view('elements.categories.index')->with('categories',$categories);
    }

    /**
     * Retornar la vista con el formulario para la creación del elemento con los registros que requiera
     * GET
     */
    public function create()
    {
        if(Auth::user()->role->name != "Admin"){
            return redirect('home')->with('error','No se puede acceder a este recurso');
        }

        return view('elements.categories.create');
    }

    /**
     * Recibir solicitud del formulario de creación del elemento y creación del registro
     * POST
     */
    public function store(CategoryRequest $request)
    
    {
        if(Auth::user()->role->name != "Admin"){
            return redirect('home')->with('error','No se puede acceder a este recurso');
        }
        $category = new Category;

        $category->name = $request->name;
        $category->description = $request->description;
        
        if($category->save()){
            return redirect('categories')->with('message','La categoria: '.$category->name.' ha sido creado existosamente!!');
        }
    }

    /**
     * Retornar la vista para visualizar un elemento
     * POST
     */
    public function show(string $id)
    {
        if(Auth::user()->role->name != "Admin"){
            return redirect('home')->with('error','No se puede acceder a este recurso');
        }
        $category = Category::find($id);
        return view('elements.categories.show')->with('category',$category);
    }

    /**
     * Retornar la vista  para editar un elemento en específico
     * GET
     */
    public function edit(string $id)
    {
        if(Auth::user()->role->name != "Admin"){
            return redirect('home')->with('error','No se puede acceder a este recurso');
        }
        $category = Category::find($id);
        return view('elements.categories.edit')->with('category',$category);
    }

    /**
     * Recibe la solicitud de actualización de un elemento y actualiza el registro
     * PUT
     */
    public function update(CategoryRequest $request, string $id)
    {
        if(Auth::user()->role->name != "Admin"){
            return redirect('home')->with('error','No se puede acceder a este recurso');
        }
        $category = Category::find($id);

        $category->name = $request->name;
        $category->description = $request->description;
        
        if($category->save()){
            return redirect('categories')->with('message','La categoria: '.$category->name.' ha sido actualizada existosamente!!');
        }
    }

    /**
     * Eliminar un registro
     * DELETE
     */
    public function destroy(Category $category)
    {
        if(Auth::user()->role->name != "Admin"){
            return redirect('home')->with('error','No se puede acceder a este recurso');
        }

        if($category->delete()){
            return redirect('categories')->with('message','La categoria: '.$category->name.' ha sido eliminado existosamente!!');
        }
}
}