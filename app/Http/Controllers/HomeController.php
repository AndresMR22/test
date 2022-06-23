<?php

namespace App\Http\Controllers;






class HomeController extends Controller
{
    

    public function librosByCategoria($categoria_id)
    {
        $libros = json_decode(file_get_contents("http://www.etnassoft.com/api/v1/get/?category_id=".$categoria_id."&results_range=0,10"), true);
        $categorias = json_decode(file_get_contents('http://www.etnassoft.com/api/v1/get/?get_categories=all'), true);
        return view('index',compact('libros','categorias'));
    }

    public function index()
    {
        $categorias = json_decode(file_get_contents('http://www.etnassoft.com/api/v1/get/?get_categories=all'), true);

        $libros = json_decode(file_get_contents('http://www.etnassoft.com/api/v1/get/?category=libros_programacion&criteria=most_viewed'), true);

        return view('index',compact('categorias','libros'));
    }
}
