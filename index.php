<?php

$options = array();
$options['location'] = 'http://35.211.83.38/AZDigitalV6/WebServices/ServiciosAZDigital.wsdl';
$options['uri'] = 'http://35.211.83.38/AZDigitalV6/WebServices/SOAP/';
$options['cache_wsdl'] = WSDL_CACHE_NONE;
$options['soap_version'] = SOAP_1_2;

$cliente = new SoapClient('http://35.211.83.38/AZDigitalV6/WebServices/ServiciosAZDigital.wsdl?WSDL',$options);
						  
					
$parametros = array('Tipo' => 'FechaInicio', 'Expersion' => '2019-07-01 00:00:00');

$resultado = $cliente->BuscarArchivo(array('Condiciones' =>array('Condicion' => $parametros)));  /*$cliente ->__soapCall("BuscarArchivo", $parametros);*/

if ($cliente->fault) {
	echo 'Fallo';
	print_r($resultado);
} else {	// Chequea errores
	$err = $cliente->getError();
	if ($err) {		// Muestra el error
		echo 'Error' . $err ;
	} else {		// Muestra el resultado
		echo 'Resultado';
		print_r ($resultado);
	}
}

?>