<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriaCollection;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        //dd('desde API/categoriaController');
        //return response()->json(['categorias' => Categoria::all()]);

        return new CategoriaCollection(Categoria::all());
    }
}
