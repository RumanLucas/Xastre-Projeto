<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Curso;

class CursoController extends Controller
{
    public function index(){
        $cursos = Curso::all();
        return view('cursos.cursos',['cursos' => $cursos]);
    }

    public function create(){
        return view('cursos.cadastro');
    }

    public function store(Request $request){
        $curso = new Curso;
        $curso->name = $request->name;
        $curso->description = $request->description;
        $curso->simplified_description = $request->simplified_description;
        $curso->alunosqtd = $request->alunosqtd;
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

///site de referencia: https://imasters.com.br/php/como-fazer-um-crud-no-laravel-do-zero-parte-2

    public function update(Request $request, $id){
        $curso = Curso::FindOrFail($id);

        $curso->update([
            'id_alunos' => $request->id_alunos,
        ]);
        /** para chamar essa funçao no front escrever: <input type="text" name= "Id do aluno" value="{{$curso->id_alunos}}"><br /> */

        return "Atualização concluida"
    }


}
