<?php
namespace Codevar\Citas\Controllers;
#use Codevar\Citas\Configurations\Controllers;
use Codevar\Citas\Models\Prueba;
#use Illuminate\Support\Facades\Request;

use Codevar\Citas\Configurations\Front;

class pruebaController{

    #Show all
    public static function show_all(int $skip = null, int $paginate = 15){
        if($skip == null){
            $pruebas = Prueba::take($paginate)->get();
        }else{
            $skip = $skip * $paginate;
            $pruebas = Prueba::skip($skip)->take($paginate)->get();
        }
        $pruebas->skip('10');
        
        Front::view_font('index.twig', $pruebas);
        
    }

    #show specific id
    public static function show_id(int $id){

    }

    #show with filters
    public function show_search(array $fields, array $values){

        
    }

    public function create(){
        try {

            prueba::create([
                "nombre"=> $_POST["nombre"],
                "apellido"=> $_POST["apellido"]
            ]);
            return "Insertado correctamente";

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

    public function delete(){
        try {

            prueba::destroy(874);
            return "Eliminado correctamente";

        } catch (\Throwable $th) {

            return "Se genero un error: ".$th;

        }
    }
    
}