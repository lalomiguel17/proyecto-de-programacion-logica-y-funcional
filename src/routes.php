<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
///
/// http://localhost/apirest/public/api/v1/employee
///

// API group
$app->group('/api', function () use ($app) {
   
    //REGISTROUSUARIOS
    $app->post('/calculadora','calculadora');
    $app->get('/calculadora','distancia');
    $app->put('/calculadora','PentagonoRegularArea');
    $app->get('/areacilindro','areacilindro');
    $app->get('/trapecio','trapecio');
    $app->post('/pitagoras','pitagoras');
    $app->get('/binomio','binomio');
    $app->get('/areatrapecio','areatrapecio');
    $app->get('/cuadrado','cuadrado');
    $app->get('/fuerza','fuerza');
    $app->get('/velocidad','velocidad');
    $app->get('/PuntoMedio','PuntoMedio');
    $app->post('/conversor','conversor');
    $app->get('/radio','radio');
    $app->get('/gravedad','gravedad');
    $app->get('/promedio','promedio');
    $app->get('/mruv','mruv');
    $app->get('/triangulo','triangulo');
    $app->get('/suma','suma');
    $app->get('/circulo','circulo');
    $app->get('/cilindro','cilindro');

    $app->post('/insert','setalumno');
    $app->get('/selectall','gettodoslosalumnos');
    $app->get('/select','getalumno');
    $app->put('/update','updatealumno');
    $app->delete('/delete','deletealumno');
    $app->post('/alumno','setalumno');
    $app->get('/productos','gettodoslosproductos');
    $app->get('/producto','getproducto');
    $app->post('/producto','setproducto');
    $app->get('/areatriangulo','areatriangulo');
   $app->get('/login','Accesslogin');
   $app->post('/login','Accesslogin');


$app->get('/paciente','AccessPaciente');
  $app->post('/paciente','AccessPaciente');

 
  $app->get('/cronicas','AccessCronicas');
  $app->post('/cronicas','AccessCronicas');


   
  $app->get('/tratamiento','AccessTratamiento');
  $app->post('/tratamiento','AccessTratamiento');

  
  $app->get('/registro','AccessRegistro');
  $app->post('/registro','AccessRegistro');



  $app->get('/sintomas','AccessSintomas');
  $app->post('/sintomas','AccessSintomas');



  
  $app->get('/preguntas','Accesspregunta');
  $app->post('/preguntas','Accesspregunta');

  $app->get('/respuestas','Accessrespuesta');
  $app->post('/respuestas','Accessrespuesta');
  

  
  
});
