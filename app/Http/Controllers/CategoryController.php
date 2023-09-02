<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Obtener todos los elementos y los retorna la vista para su visualización
     * GET
     */
    public function index()
    {
        $categories = Category::all();
        dd($categories);
    }

    /**
     * Retornar la vista con el formulario para la creación del elemento con los registros que requiera
     * GET
     */
    public function create()
    {
        //aqui va la vista
    }

    /**
     * Recibir solicitud del formulario de creación del elemento y creación del registro
     * POST
     */
    public function store(Request $request)
    {
        $category = new Category;

        $category->name = $request->name;
        $category->description = $request->description;
        
        if($category->save()){
            //redireccionar a la vista index
        }
    }

    /**
     * Retornar la vista para visualizar un elemento
     * POST
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        dd($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        dd($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;
        $category->description = $request->description;
        
        if($category->save()){
            //redireccionar a la vista index
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}
