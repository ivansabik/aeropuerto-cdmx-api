Aeropuerto DF API
================
[![Build Status](https://travis-ci.org/mexicapis/aeropuertodf-api.svg)](https://travis-ci.org/mexicapis/aeropuertodf-api)

API no oficial de infor del Aeropuerto de la Cd. de México, tomada de http://www.aicm.com.mx y otras webs.

 - ¿Paginar, traer todas?

### LLegadas

 - /llegadas
 - /llegadas?estado=arribo
 - /llegadas?estado=a+tiempo
 - /llegadas?estado=demorado
 - /llegadas?procedencia=nacional
 - /llegadas?procedencia=internacional
 - /salidas?procedencia=internacional

### LLegadas

 - /salidas
 - /salidas?estado=despego
 - /salidas?estado=demorado
 - /salidas?estado=cancelado
 - /salidas?destino=nacional
 - /salidas?destino=internacional

### Transporte

 - /transporte?tipo=taxi&colonia_destino=santa+fe
 - /transporte?tipo=taxi&destinos
 - /transporte?tipo=taxi&destino=hoteles
 - /transporte?tipo=taxi&destino=clinicas_hospitales
 - /transporte?tipo=taxi&destino=gobierno_embajadas
 - /transporte?tipo=taxi&destino=sitios_interes
 - /transporte?tipo=taxi&destino=centros_ensenianza
 - /transporte?tipo=taxi&destino=foraneo

##### Para taxis http://www.yellowcab.com.mx/tarifador2.php
