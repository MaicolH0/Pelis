<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use App\Models\Category;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth', ['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::paginate(10);
        // $movies = Movie::all();
        // dd($movies);
        return view('elements.movies.index')->with('movies', $movies);
        // Retornar vista inyectando todos los usuarios

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role_id','1')->get();
        $categories = Category::all();
        return view('elements.movies.create')->with('categories',$categories)
                                            ->with('users',$users);
        // Retornar la vista elements.movies.create
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $movie = new Movie;

        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->quality = $request->quality;
        if($request->hasFile('image')){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/movies/'), $file);
            $movie->image = 'images/movies/'.$file;
        }

        $movie->release_year = $request->release_year;
        $movie->reproduction_number = 0;
        $movie->language = $request->language;
        $movie->video_link = $request->video_link;
        $movie->download_link = $request->download_link;
        $movie->user_id = $request->user_id;
        $movie->category_id = $request->category_id;

        if($movie->save()){
            return redirect('movies')->with('message', 'La pelicula: '.$movie->name.' fue creado con éxito!!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);
        $movie->reproduction_number = $movie->reproduction_number + 1;
        $movie->save();
        return view('elements.movies.show')->with('movie',$movie);
        // Retornar la vista
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        $users = User::where('role_id','1')->get();
        $categories = Category::all();
        return view('elements.movies.edit')->with('movie',$movie)
                                            ->with('categories',$categories)
                                            ->with('users',$users);
        //Retorna la vista con el formulario de edición del usuario 
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
        $movie = Movie::find($id);

        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->quality = $request->quality;
        if($request->hasFile('image')){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/movies/'), $file);
            $movie->image = 'images/movies/'.$file;
        }

        $movie->release_year = $request->release_year;
        $movie->reproduction_number = 0;
        $movie->video_link = $request->video_link;
        $movie->download_link = $request->download_link;
        $movie->language = $request->language;
        $movie->user_id = $request->user_id;
        $movie->category_id = $request->category_id;

        if($movie->save()){
            return redirect('movies')->with('message', 'La pelicula: '.$movie->name.' fue actualizada con éxito!!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $file = public_path().'/'.$movie->image;
        if (getimagesize($file) && $movie->image != 'images/no-image.png') {
            unlink($file);
        }

        if($movie->delete()){
            return redirect('movies')->with('message', 'La pelicula: '.$movie->name.' fue eliminado con éxito!!');
        }
    }
}
