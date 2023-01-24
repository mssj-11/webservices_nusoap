<?php
//  Agregando la libreria de NuSoap
include_once 'lib/nusoap.php';

//  Creando un objeto servicio
$servicio = new soap_server();

//  Creando el namespace
$namespace = "urn:miserviciowsdl";
//  Configuracion del servicio
$servicio->configureWSDL("MiServicioWeb", $namespace); //  Nombre, NameSpace
//  Almacenando el Espacio de Nombre del destino
$servicio->schemaTargetNamespace = $namespace;


//  Metodo Registrarse
$servicio->register("MiFuncion", array('miparametro' => 'xsd:string'), array('return' => 'xsd:string'), $namespace);  //  Funcion, Parametros de entrada

//  Funcion
function MiFuncion($miparametro){

    $resultado = "Mi parametro recibido es: " . $miparametro;

    return $resultado;  //  Retornando un String
}



//  Validando lo ingresado mediante POST
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';



//  Ejecutando lo que se envia a el servicio
$servicio->service($HTTP_RAW_POST_DATA);




?>