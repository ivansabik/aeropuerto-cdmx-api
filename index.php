<?php

error_reporting(0);
//header('Content-Type: application/json; charset=utf-8');

require 'vendor/autoload.php';

use Luracast\Restler\Restler;
use \Curl\Curl;
use Ivansabik\DomHunter\DomHunter;
use Ivansabik\DomHunter\Tabla;

define('URL_AICM', 'http://www.aicm.com.mx/vuelos');

$rest = new Restler();
$rest->addAPIClass('AeropuertoDf');
$rest->handle();

class AeropuertoDf {
	# Falta numero de vuelo, horario, ciudad, aerolinea
    # Endpoint de /llegadas
    public function llegadas($tipo = 'nacional') {
		$curl = new Curl();
		$paramsCurl = array();
		$paramsCurl['da'] = 'a';
		if($tipo == 'nacional') {
			$paramsCurl['in'] = 'n';
	    }
	    if($tipo == 'internacional') {
            $paramsCurl['in'] = 'i';
	    }
		$curl->get(URL_AICM, $paramsCurl);
		$hunter = new DomHunter();
		$hunter->strHtmlObjetivo = $curl->response;
		$columnas = array('origen', 'aerolinea', 'vuelo', 'hora', 'estatus', 'sala', 'terminal');
		$arrayPresas[] = array('llegadas', new Tabla(array('ocurrencia' => 1), $columnas));
		$hunter->arrPresas = $arrayPresas;
		$hunted = $hunter->hunt();
		array_pop($hunted['llegadas']);
		return $hunted;
    }
    # Endpoint de /salidas
    public function salidas($tipo = 'nacional') {
		$curl = new Curl();
		$paramsCurl = array();
		$paramsCurl['da'] = 'd';
		if($tipo == 'nacional') {
			$paramsCurl['in'] = 'n';
	    }
	    if($tipo == 'internacional') {
            $paramsCurl['in'] = 'i';
	    }
		$curl->get(URL_AICM, $paramsCurl);
		$hunter = new DomHunter();
		$hunter->strHtmlObjetivo = $curl->response;
		$columnas = array('origen', 'aerolinea', 'vuelo', 'hora', 'estatus', 'sala', 'terminal');
		$arrayPresas[] = array('salidas', new Tabla(array('ocurrencia' => 1), $columnas));
		$hunter->arrPresas = $arrayPresas;
		$hunted = $hunter->hunt();
		array_pop($hunted['salidas']);
		return $hunted;
    }
    # Endpoint de /transporte
    public function transporte($tipo) {
    }
}
?>
