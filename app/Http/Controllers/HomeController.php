<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['welcome','filter']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Auth::user()->role->name == 'Admin'){
            return view('dashboard-admin');
        }else if(Auth::user()->role->name == 'Guest'){
            return view('dashboard-guest');
        }

    }

    
    /**
     * Show the welcome page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        $movies = Movie::all();
        $categories = Category::all();

        return view('welcome')->with('movies',$movies)
                            ->with('categories', $categories);

    }

    public function filter(Request $request){
        if($request->category_id >= 0){
            $movies = Movie::where('category_id',$request->category_id)->get();
            $categories = Category::where('id',$request->category_id)->get();

        }else{
            $movies = Movie::all();
            $categories = Category::all();
        }

        return view('filter')->with('movies',$movies)
                            ->with('categories', $categories);
    }
}
