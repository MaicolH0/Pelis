<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller
{
    public function test(string $name){
        // dd("Hola $name");
        $number = 5;
        $day = "Monday";

        $users = User::all();
        return view('test')->with('name',$name)
                            ->with('number',$number)
                            ->with('day',$day)
                            ->with('users',$users);
    }

    public function findUser(int $id){
        $user = User::find($id);
        dd($user);
    }

    public function findCategory(int $id){
        $category = User::find($id);
        dd($category);
    }
}
