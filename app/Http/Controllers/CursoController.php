<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Curso;

class CursoController extends Controller
{
    public function index(){
        $cursos = Curso::all();
        return view('welcome',['cursos' => $cursos]);
    }

    public function create(){
        return view('cursos.cadastro');
    }
}
