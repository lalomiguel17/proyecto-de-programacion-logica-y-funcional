<?
function cilindro($request){
    
    $datos=json_decode($request->getbody());
    $operacion=$datos->operacion;

    $altura=$datos->h;
    $radio=$datos->r;

    $mul=$radio*$altura;
    $resp->volumen = 3.1416 *(($radio*$radio)*$altura);
    $resp->area = (2 *(3.1416))*$mul;

    return json_encode($resp);
}