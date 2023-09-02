<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //inyectar datos de prueba sin que importen los datos

        $user = new User;
        $user->fullname = 'Maicol Hidalgo';
        $user->email = "maicole.hidalgoz@autonoma.edu.co";
        $user->phone = "3122901279";
        $user->photo = "images/no-photo.png";
        $user->password = "12345678";
        $user->role_id = 1; //para indicar que es el rol admin
        $user->save();

        $user = new User;
        $user->fullname = 'Mickey Mouse';
        $user->email = "micker.mouse@autonoma.edu.co";
        $user->phone = "78945612";
        $user->photo = "images/no-photo.png";
        $user->password = "12345678";
        $user->role_id = 2; //para indicar que es el rol invitado
        $user->save();

        for ($i=0; $i < 10; $i++) { 
            $user = new User;
            $user->fullname = "User $i";
            $user->email = "$i@autonoma.edu.co";
            $user->phone = "12345$i";
            $user->photo = "images/no-photo.png";
            $user->password = "12345678";
            $user->role_id = 2; //para indicar que es el rol invitado
            $user->save();
        }
    }
}
