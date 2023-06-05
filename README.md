Pasos a seguir:

"dependencias del proyecto"

--composer install

--npm install

--npm run dev (para compilar)

--php artisan jwt:secret (para regenerar el token)

"crea la base de datos y hace las migraciones"
--php artisan create:dbprueba 					-"requerimiento de consideraciones generales"

--php artisan db:seed  (opcional)				-"Seeder de ciudades y provincias argentinas, se genera igual en el comando anterior"

"usuario por defecto para acceder por login al sistema"

--correo:prueba@gmail.com

--password:123456789

"A) Realizar un Abm de Provincia"
"aplicativo web"						
Despues de loguearse se dirige a la pestañna de provincias donde puede registrar provincias y buscar dentro del input como un combobox
esta consumiendo recursos de "https://apis.datos.gob.ar/georef/api/provincias", busca un nombre y puede registrarlo   

"B) Realizar una api con token que devuelva el listado de Ciudades con sus respectivas provincias"

"ruta swagger"								
	
--http://127.0.0.1:8000/api/documentation

"obtiene el token"								-"BEARER TOKEN"

--http://127.0.0.1:8000/api/auth/login

"obtiene las ciudades"							-"Utilizar el token(beader <token>) en el header para realizar la solicitud"

--http://127.0.0.1:8000/api/auth/getCiudades

"C) Realizar un comando para que la ciudad pueda ser creada mediante linea de comando"

--php artisan create:city cordoba,cordoba
