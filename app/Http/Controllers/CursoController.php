<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Curso;

class CursoController extends Controller
{
    public function index(){
        $search = request('search');
        if($search) {
            $cursos= Curso::where([
                ['name', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $cursos = Curso::all();
        }
        return view('cursos.cursos',['cursos' => $cursos, 'search' => $search]);
    }

    public function create(){
        return view('cursos.cadastro');
    }

    public function store(Request $request){
        $curso = new Curso;
        $curso->name = $request->name;
        $curso->description = $request->description;
        $curso->simplified_description = $request->simplified_description;
        $curso->alunosqtdmin = $request->alunosqtdmin;
        $curso->alunosqtdmax = $request->alunosqtdmax;
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/cursos'), $imageName);
            $curso->image = $imageName;
        }
        $curso->save(); 

        return redirect('/cursos')->with('msg', 'Curso criado com sucesso!');
    }

    public function show($id){
        $curso = Curso::FindOrFail($id);

        return view('cursos.curso', ['curso'=> $curso]);
    }
}
