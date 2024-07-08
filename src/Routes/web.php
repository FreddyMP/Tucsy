<?php
use Codevar\Citas\Controllers\pruebaController;
$router = new \Bramus\Router\Router();

#Home
$router->get('/', function() {
      pruebaController::show_all();
 });
 //paginar
 $router->get('/prueba/paginate/{skip}', function( int $skip = null) {
   if($skip == null){
      pruebaController::show_all();
   }else{
      pruebaController::show_all($skip);
   }
 });

 $router->get('/prueba/excel', function() {
   
      $enlace_actual = $_SERVER['HTTP_REFERER'];
      $delimitador = "/";
      $array = explode($delimitador, $enlace_actual);
      
      print_r($array[5]);

      if($array[5]){
         $skip = $array[5];
         pruebaController::excel_all($skip);
      }else {
         pruebaController::excel_all();
      }
   
 });

 $router->get("/prueba/detail/{1}", function( $id) {
   pruebaController::show_id($id);
});
$router->get("/prueba/create", function() {
   pruebaController::create();
});

 $router->post('/prueba/insert', function() {
    $pruebas  = new pruebaController;
    $pruebas::insert();
});

$router->post('/prueba/update', function() {
   $pruebas  = new pruebaController;
   print_r($pruebas->update());
});

$router->get('/prueba/delete/{1}', function(int $id) {
   
   pruebaController::logic_delete($id);
});





$router->run();