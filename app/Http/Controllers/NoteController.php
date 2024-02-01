<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function index(){
        $notes = Note::all();
        if(!$notes){
            return response()->json(['message'=>'Não há registros cadastrados'],404);
        }
        return response()->json(['status'=>'Recuperando os registros','Registros:'=>$notes]);
 }
 public function show($id){
        $note = Note::find($id);
        if(!$note){
            return response()->json(['message'=>'Registro Não encontrado ou id inexistente']);
        }
        return response()->json(['message'=>'Registro Encontrado','Registro:'=>$note]);
 }
 public function store(Request $request){
        $requestValidate = $request->validate([
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:3',
        ]);
        $newNote = Note::create($requestValidate);
        if(!$newNote){
           return response()->json(['message'=>'Registro não criado!'],201);
        }
        return response()->json(['message'=>'Registro criado com sucesso','Registro'=>$newNote],200);

 }
 public function update(Request $request, $id){
        $note = Note::find($id);
        if(!$note){
            return response()->json(['message'=>'Nota não encontrada!'],404);
        }
        $validateUpdate = $request->validate([
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:3',
        ]);
        $updatedNote = $note->update($validateUpdate);
        if(!$updatedNote){
            return response()->json(['message'=>'Registro não atualizado!'],201);
        }
        return response()->json(['message'=>'Registro Atualizado com sucesso'],200);

 }
 public function destroy($id){
        $note = Note::find($id);
        if(!$note){
            return response()->json(['message'=>'Registro não encontrado ou id inexistente'],404);
        }
        $note->delete();
        return response()->json(['message'=>'Registro apagado com sucesso'],200);
        
 }
}
