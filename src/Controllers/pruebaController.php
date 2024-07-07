<?php
namespace Codevar\Citas\Controllers;
#use Codevar\Citas\Configurations\Controllers;
use Codevar\Citas\Models\Prueba;
#use Illuminate\Support\Facades\Request;

use Codevar\Citas\Configurations\Front;
use Illuminate\Support\Facades\Redirect;

class pruebaController{

    #Show all
    public static function show_all(int $skip = null, int $paginate = 10){
       
        if($skip == null){
            $pruebas = Prueba::take($paginate)->whereNull("delete_at")->get();
        }else{
            $skip = $skip * $paginate;
            $pruebas = Prueba::skip($skip)->take($paginate)->whereNull("delete_at")->get();
        }
        Front::view_font('index', $pruebas);
    }

    #show specific id
    public static function show_id(int $id){

        $pruebas = Prueba::find($id);
        Front::view_font('prueba/update', $pruebas);
        
    }

    #show with filters
    public function show_search(array $fields, array $values){

        
    }

    public static function create(){
        Front::view_font('prueba/create');
    }

    public static function insert(){
        try {

            prueba::create([
                "nombre"=> $_POST["nombre"],
                "apellido"=> $_POST["apellido"]
            ]);
            header("location:http://127.0.0.1:3000/");

        } catch (\Throwable $th) {

            return "Se genero un error: ".$th;
        }   
    }

    public function update(){
        try {

            $prueba = prueba::find(874);
            $prueba->update([
                "apellido"=>$_POST["apellido"]
            ]);

            $prueba->save();
            return "Actualizado correctamente";

        } catch (\Throwable $th) {

            return "Se genero un error: ".$th;

        }
    }

    public static function logic_delete(int $id){
        try {
            $fecha = date("Y-m-d H:i:s");   
            $prueba = prueba::find($id);
            $prueba->update([
                "delete_at"=>$fecha
            ]);
            header("location:http://127.0.0.1:3000/");

        } catch (\Throwable $th) {

            return "Se genero un error: ".$th;

        }
    }

    public function delete(){
        try {

            prueba::destroy(874);
            return "Eliminado correctamente";

        } catch (\Throwable $th) {

            return "Se genero un error: ".$th;

        }
    }
    
}