<?php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');
$ns="https://swander.000webhostapp.com/Lab6/ProyectoSW2020-Alumnos/php/VerifyPassWS.php?wsdl";
$server = new soap_server;
$server->configureWSDL('comprobar',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
$server->register('comprobar',array('x'=>'xsd:string','y'=>'xsd:string'),array('z'=>'xsd:string'),$ns);
function comprobar ($x, $y){
    if($y!="1010"){
        return "SIN SERVICIO";
    }
    $file = file("../txt/toppasswords.txt");
	foreach($file as $line){
		$word = trim($line , "\n");
		if (strcmp(trim($line),trim($x))===0){
				return "INVALIDA";
			}
	}
	return "VALIDA";
}

if (!isset( $HTTP_RAW_POST_DATA ) ) {
$HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );}
$server->service($HTTP_RAW_POST_DATA);
?> 