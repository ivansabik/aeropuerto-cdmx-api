Aeropuerto DF API
================
[![Build Status](https://travis-ci.org/mexicapis/aeropuertodf-api.svg)](https://travis-ci.org/mexicapis/aeropuertodf-api)

API no oficial de infor del Aeropuerto de la Cd. de México, tomada de http://www.aicm.com.mx y otras webs.

 - ¿Paginar, traer todas?

### LLegadas

 - /llegadas/
 - /llegadas/nacionales/
 - /llegadas/internacionales/

estado= a_tiempo | demorados | arribo | todos
 

### Salidas

 - /salidas/
 - /salidas/nacionales/
 - /salidas/internacionales/

estado= despego | demorado | cancelado | nacional | internacional

### Transporte

 - /transporte/cotizacion

tipo= taxi
colonia_destino= NOMBRE_COLONIA
destino=
##### Para taxis http://www.yellowcab.com.mx/tarifador2.php
