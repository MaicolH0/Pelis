<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movie = new Movie;
        $movie->name = '¡Shazam! La furia de los dioses';
        $movie->description = 'Billy Batson y sus hermanos adoptivos, que se transforman en superhéroes al decir "¡Shazam!", se ven obligados a volver a la acción y luchar contra las Hijas de Atlas, a quienes deben evitar que use un arma que podría destruir el mundo.';
        $movie->quality = 'FullHD';
        $movie->image = 'images/movies/1679371803.png';
        $movie->release_year = '2023-03-20';
        $movie->reproduction_number = 0;
        $movie->language = 'Español Latino';
        $movie->video_link = 'https://repelisplus.app/v/shazam-la-furia-de-los-dioses/';
        $movie->download_link = 'https://repelisplus.app/v/shazam-la-furia-de-los-dioses/';
        $movie->user_id = 1;
        $movie->category_id = 1;
        $movie->save();

        $movie = new Movie;
        $movie->name = 'Avatar: El camino del agua';
        $movie->description = 'Ambientada más de una década después de los acontecimientos de la primera película, Avatar: The Way of Water empieza contando la historia de la familia Sully (Jake, Neytiri y sus hijos), los problemas que los persiguen, lo que tienen que hacer para mantenerse a salvo, las batallas que libran para seguir con vida y las tragedias que sufren.';
        $movie->quality = 'FullHD';
        $movie->image = 'images/movies/1679371871.jpg';
        $movie->release_year = '2022-12-20';
        $movie->reproduction_number = 0;
        $movie->language = 'Español Latino';
        $movie->video_link = 'https://repelisplus.app/v/avatar-the-way-of-water-avatar-el-camino-del-agua-kmyg/';
        $movie->download_link = 'https://repelisplus.app/v/avatar-the-way-of-water-avatar-el-camino-del-agua-kmyg/';
        $movie->user_id = 1;
        $movie->category_id = 1;
        $movie->save();

        $movie = new Movie;
        $movie->name = 'Black Panther: Wakanda Forever';
        $movie->description = 'La reina Ramonda, Shuri, M’Baku, Okoye y las Dora Milaje, luchan para proteger su nación de la injerencia de potencias mundiales a raíz de la muerte del rey T’Challa. Mientras los wakandianos se esfuerzan por adaptarse a su nueva etapa, los héroes deben actuar unidos, con la ayuda del Perro de la Guerra Nakia y Everett Ross, y forzar un nuevo destino para el reino de Wakanda.';
        $movie->quality = 'FullHD';
        $movie->image = 'images/movies/1679371988.jpg';
        $movie->release_year = '2022-12-20';
        $movie->reproduction_number = 0;
        $movie->language = 'Español Latino';
        $movie->video_link = 'https://repelisplus.app/v/black-panther-wakanda-forever-kono/';
        $movie->download_link = 'https://repelisplus.app/v/black-panther-wakanda-forever-kono/';
        $movie->user_id = 1;
        $movie->category_id = 1;
        $movie->save();

        $movie = new Movie;
        $movie->name = 'M3GAN';
        $movie->description = 'Un ingeniero en robótica de una empresa de juguetes construye una muñeca realista que comienza a cobrar vida propia.';
        $movie->quality = 'FullHD';
        $movie->image = 'images/movies/1679372103.jpg';
        $movie->release_year = '2022-12-20';
        $movie->reproduction_number = 0;
        $movie->language = 'Español Latino';
        $movie->video_link = 'https://repelisplus.app/v/m3gan/';
        $movie->download_link = 'https://repelisplus.app/v/m3gan/';
        $movie->user_id = 1;
        $movie->category_id = 2;
        $movie->save();

        $movie = new Movie;
        $movie->name = 'Annabelle 2: La creación';
        $movie->description = 'Varios años después del trágico fallecimiento de su hija, un juguetero que crea muñecas y su mujer, acogen en su casa a una enfermera y un grupo de chicas tratando de convertir su casa en un cálido orfanato. Sin embargo, los nuevos inquilinos se convertirán en el objetivo de Annabelle, una muñeca poseída por un ser demoníaco. Secuela de "Annabelle" (2014).';
        $movie->quality = 'FullHD';
        $movie->image = 'images/movies/1679372176.jpg';
        $movie->release_year = '2017-10-17';
        $movie->reproduction_number = 0;
        $movie->language = 'Español Latino';
        $movie->video_link = 'https://repelisplus.app/v/annabelle-2-la-creacion-hd-c/';
        $movie->download_link = 'https://repelisplus.app/v/annabelle-2-la-creacion-hd-c/';
        $movie->user_id = 1;
        $movie->category_id = 2;
        $movie->save();

        $movie = new Movie;
        $movie->name = 'Scream VI';
        $movie->description = 'Tras los últimos asesinatos de Ghostface, los cuatro supervivientes abandonan Woodsboro para dar comienzo a un nuevo capítulo.';
        $movie->quality = 'FullHD';
        $movie->image = 'images/movies/1679372307.jpg';
        $movie->release_year = '2023-03-20';
        $movie->reproduction_number = 0;
        $movie->language = 'Español Latino';
        $movie->video_link = 'https://repelisplus.app/v/scream-vi/';
        $movie->download_link = 'https://repelisplus.app/v/scream-vi/';
        $movie->user_id = 1;
        $movie->category_id = 2;
        $movie->save();

        $movie = new Movie;
        $movie->name = 'Creed III';
        $movie->description = 'Después de dominar el mundo del boxeo, Adonis Creed ha prosperado tanto en su carrera como en su vida familiar. Cuando un amigo de la infancia y ex prodigio de boxeo, Damien Anderson, resurge después de cumplir una larga sentencia en prisión, está ansioso por demostrar que merece su disparo en el ring. El enfrentamiento entre los antiguos amigos es más que una pelea. Para resolver el puntaje, Adonis debe poner su futuro en la línea para luchar contra Damien, un luchador que no tiene nada que perder.';
        $movie->quality = 'FullHD';
        $movie->image = 'images/movies/1679372389.jpg';
        $movie->release_year = '2023-03-20';
        $movie->reproduction_number = 0;
        $movie->language = 'Español Latino';
        $movie->video_link = 'https://repelisplus.app/v/creed-iii/';
        $movie->download_link = 'https://repelisplus.app/v/creed-iii/';
        $movie->user_id = 1;
        $movie->category_id = 3;
        $movie->save();

        $movie = new Movie;
        $movie->name = 'Luther: Cae la noche';
        $movie->description = 'Atormentado por un caso sin resolver, el brillante pero caído en desgracia inspector londinense John Luther se fuga de la cárcel para intentar atrapar a un sádico asesino en serie... Largometraje inspirado en la serie de televisión "Luther".';
        $movie->quality = 'FullHD';
        $movie->image = 'images/movies/1679372532.jpg';
        $movie->release_year = '2023-03-20';
        $movie->reproduction_number = 0;
        $movie->language = 'Español Latino';
        $movie->video_link = 'https://repelisplus.app/v/luther-cae-la-noche/';
        $movie->download_link = 'https://repelisplus.app/v/luther-cae-la-noche/';
        $movie->user_id = 1;
        $movie->category_id = 3;
        $movie->save();
    }
}
