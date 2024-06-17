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

 $router->post('/insert', function() {
    $pruebas  = new pruebaController;
    print_r($pruebas->create());
});

$router->put('/update', function() {
   $pruebas  = new pruebaController;
   print_r($pruebas->update());
});

$router->delete('/delete', function() {
   $pruebas  = new pruebaController;
   print_r($pruebas->delete());
});





$router->run();