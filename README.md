Aeropuerto DF API
================
[![Build Status](https://travis-ci.org/mexicapis/aeropuertodf-api.svg)](https://travis-ci.org/mexicapis/aeropuertodf-api)

API REST no oficial del Aeropuerto del la Ciudad de Mexico, proporciona informacion de llegadas y salidas.
Puedes probarla en http://mexicapis.org.mx/aeropuertodf, ej:

 - http://mexicapis.org.mx/aeropuertodf/llegadas?tipo=nacional
 - http://mexicapis.org.mx/aeropuertodf/llegadas?tipo=internacional 
 - http://mexicapis.org.mx/aeropuertodf/salidas?tipo=nacional
 - http://mexicapis.org.mx/aeropuertodf/salidas?tipo=internacional

## API

Endpoints:

 - /llegadas?tipo=nacional
 - /llegadas?tipo=internacional 
 - /salidas?tipo=nacional
 - /salidas?tipo=internacional
 
## Ejemplos

### /llegadas?tipo=nacional

```
{
    "llegadas": [
        {
            "origen": "S.LUIS PO",
            "aerolinea": "Interjet",
            "vuelo": "AIJ3043",
            "hora": "22:00",
            "estatus": "ARRIBO",
            "sala": "A",
            "terminal": "T1"
        },
        {
            "origen": "MONTERREY",
            "aerolinea": "Interjet",
            "vuelo": "AIJ2133",
            "hora": "22:12",
            "estatus": "ARRIBO",
            "sala": "A",
            "terminal": "T1"
        },
        ...
    ]
}
```

### /llegadas?tipo=internacional 

```
{
    "llegadas": [
        {
            "origen": "MIAMI",
            "aerolinea": "American Airlines",
            "vuelo": "AAL1647",
            "hora": "22:09",
            "estatus": "ARRIBO",
            "sala": "E",
            "terminal": "T1"
        },
        {
            "origen": "S. ANTONIO",
            "aerolinea": "Interjet",
            "vuelo": "AIJ2953",
            "hora": "22:24",
            "estatus": "ARRIBO",
            "sala": "E",
            "terminal": "T1"
        },
        ...
    ]
}
```

### /salidas?tipo=nacional

```
{
    "salidas": [
        {
            "origen": "MORELIA MI",
            "aerolinea": "Aeromexconnect",
            "vuelo": "SLI2452",
            "hora": "23:50",
            "estatus": "DESPEGO",
            "sala": "B",
            "terminal": "T2"
        },
        {
            "origen": "MAZATLAN",
            "aerolinea": "Aeromexconnect",
            "vuelo": "SLI242",
            "hora": "22:00",
            "estatus": "DESPEGO",
            "sala": "75",
            "terminal": "T2"
        },
        ...
    ]
}
```

### /salidas?tipo=internacional

```
{
    "salidas": [
        {
            "origen": "SAO.PAULO",
            "aerolinea": "Aeromexico",
            "vuelo": "AMX14",
            "hora": "23:10",
            "estatus": "DESPEGO",
            "sala": "58",
            "terminal": "T2"
        },
        {
            "origen": "SANTIAGO C",
            "aerolinea": "Aeromexico",
            "vuelo": "AMX10",
            "hora": "23:51",
            "estatus": "DESPEGO",
            "sala": "69",
            "terminal": "T2"
        },
        ...
    ]
}
```
