<?php

use Ivansabik\DomHunter\DomHunter;
use Ivansabik\DomHunter\KeyValue;
use Ivansabik\DomHunter\IdUnico;
use Ivansabik\DomHunter\NodoDom;
use Ivansabik\DomHunter\Tabla;

class LlegadasTest extends PHPUnit_Framework_TestCase {

    private $_hunter, $_hunted;
    private static $_assert = array(
        
    );

    protected function setUp() {
        $html = '<table cellpadding="0" cellspacing="0" class="footable default footable-loaded" summary="Información de vuelos" width="100%"><thead><tr><th class="footable-first-column">Origen</th><th data-hide="phone">Aerolínea</th><th data-hide="phone">Vuelo</th><th data-hide="phone">Hora</th><th data-hide="tablet,phone">Estatus</th><th data-hide="tablet,phone">Sala</th><th class="footable-last-column" data-hide="tablet,phone">Terminal</th></tr></thead><tbody><tr><td class="footable-first-column">MANZANILLO</td><td>Aeromexconnect</td><td>SLI2565</td><td>14:01</td><td>ARRIBO</td><td>Q</td><td class="footable-last-column">T2</td></tr><tr><td class="footable-first-column">POZA RICA</td><td>Aeromar</td><td>TAO329</td><td>14:01</td><td>ARRIBO</td><td>Q</td><td class="footable-last-column">T2</td></tr><tr><td class="footable-first-column">P.VALLARTA</td><td>Interjet</td><td>AIJ2764</td><td>14:04</td><td>ARRIBO</td><td>A</td><td class="footable-last-column">T1</td></tr><tr><td class="footable-first-column">CANCUN</td><td>Aeromexico</td><td>AMX538</td><td>14:04</td><td>ARRIBO</td><td>Q</td><td class="footable-last-column">T2</td></tr><tr><td class="footable-first-column">CANCUN</td><td>Magnicharters</td><td>GMT781</td><td>14:05</td><td>ARRIBO</td><td>A</td><td class="footable-last-column">T1</td></tr><tr><td class="footable-first-column">VERACRUZ</td><td>Aeromar</td><td>TAO646</td><td>14:06</td><td>ARRIBO</td><td>Q</td><td class="footable-last-column">T2</td></tr><tr><td class="footable-first-column">TAMPICO</td><td>Aeromexconnect</td><td>SLI2413</td><td>14:11</td><td>ARRIBO</td><td>Q</td><td class="footable-last-column">T2</td></tr><tr><td class="footable-first-column">CD.VICTORI</td><td>Aeromar</td><td>TAO339</td><td>14:12</td><td>ARRIBO</td><td>Q</td><td class="footable-last-column">T2</td></tr><tr><td class="footable-first-column">ACAPULCO</td><td>Aeromar</td><td>TAO130</td><td>14:12</td><td>ARRIBO</td><td>Q</td><td class="footable-last-column">T2</td></tr><tr><td class="footable-first-column">CAMPECHE</td><td>Aeromexconnect</td><td>SLI2441</td><td>14:15</td><td>ARRIBO</td><td>Q</td><td class="footable-last-column">T2</td></tr><tr><td class="footable-first-column">TIJUANA</td><td>Interjet</td><td>AIJ2409</td><td>14:18</td><td>ARRIBO</td><td>A</td><td class="footable-last-column">T1</td></tr><tr><td class="footable-first-column">CANCUN</td><td>Viva Aerobus</td><td>VIV3141</td><td>14:25</td><td>ARRIBO</td><td>A</td><td class="footable-last-column">T1</td></tr><tr><td class="footable-first-column">LA PAZ</td><td>Aeromexconnect</td><td>SLI2071</td><td>14:27</td><td>ARRIBO</td><td>Q</td><td class="footable-last-column">T2</td></tr><tr><td class="footable-first-column">MONTERREY</td><td>Interjet</td><td>AIJ2109</td><td>14:27</td><td>ARRIBO</td><td>A</td><td class="footable-last-column">T1</td></tr><tr><td class="footable-first-column">TUXTLA</td><td>Interjet</td><td>AIJ2600</td><td>14:33</td><td>ARRIBO</td><td>A</td><td class="footable-last-column">T1</td></tr><tr><td class="footable-first-column">TUXTLA</td><td>Aeromexconnect</td><td>SLI554</td><td>14:35</td><td>ARRIBO</td><td>Q</td><td class="footable-last-column">T2</td></tr><tr><td class="footable-first-column">S.LUIS PO</td><td>Aeromexconnect</td><td>SLI2535</td><td>14:37</td><td>ARRIBO</td><td>Q</td><td class="footable-last-column">T2</td></tr><tr><td class="footable-first-column">MONTERREY</td><td>Aeromexconnect</td><td>SLI921</td><td>14:39</td><td>ARRIBO</td><td>Q</td><td class="footable-last-column">T2</td></tr><tr><td class="footable-first-column">MEXICALI</td><td>Volaris</td><td>VOI753</td><td>14:44</td><td>ARRIBO</td><td>A</td><td class="footable-last-column">T1</td></tr><tr><td class="footable-first-column">TAPACHULA</td><td>Aeromexconnect</td><td>SLI2777</td><td>14:46</td><td>ARRIBO</td><td>Q</td><td class="footable-last-column">T2</td></tr></tbody><tfoot><tr><td colspan="7"><span class="page-numbers current">1</span><a class="page-numbers" href="/vuelos?cpage=2">2</a> <a class="page-numbers" href="/vuelos?cpage=3">3</a> <a class="page-numbers" href="/vuelos?cpage=4">4</a> <a class="next page-numbers" href="/vuelos?cpage=2">»</a></td></tr></tfoot></table>';

        $this->_hunter = new DomHunter();
        $this->_hunter->strHtmlObjetivo = $html;

        $columnas = array('origen', 'aerolinea', 'vuelo', 'hora', 'estatus', 'sala', 'terminal');
		$presas[] = array('llegadas', new Tabla(array('ocurrencia' => 1), $columnas));

        $this->_hunter->arrPresas = $presas;
        $this->_hunted = $this->_hunter->hunt();
    }

    public function testOrigenes() {
        $this->assertEquals(self::$_assert[''], $this->_hunted['']);
    }
    
    public function testDestinos() {
        $this->assertEquals(self::$_assert[''], $this->_hunted['']);
    }
    
    public function testAerolineas() {
        $this->assertEquals(self::$_assert[''], $this->_hunted['']);
    }
    
    public function testVuelos() {
        $this->assertEquals(self::$_assert[''], $this->_hunted['']);
    }
    
    public function testHoras() {
        $this->assertEquals(self::$_assert[''], $this->_hunted['']);
    }
    
    public function testEstatus() {
        $this->assertEquals(self::$_assert[''], $this->_hunted['']);
    }
    
    public function testSalas() {
        $this->assertEquals(self::$_assert[''], $this->_hunted['']);
    }
    
    public function testTerminales() {
        $this->assertEquals(self::$_assert[''], $this->_hunted['']);
    }
}
