# Yai

### Introduccion

*Yai es una aplicacion hecha en PHP que basicamente te ayuda a proveer servicios API Rest de cualquier base de datos que le configures, esta hecha usando en ORM Eloquent por tanto es compatible con cualquier motor d base de datos.*

*Lo que hace es de las tablas de la base datos que se le configuren debolver en formato JSON los dato que se le soliciten.*

### Configuracion

Descargar el repositorio https://gitlab.com/haroldmaussa/yai.git y ponerlo en tu servidor.

luego debes configurar la base de datos en la carpeta `app/DataBase/DataBase.php` 

###Configuracion de las tablas

 La aplicacion cuenta con el comando `php yai model` para crear los modelos que seran referencia a las tablas de mi base de datos y que deben cumplir la regla de ser la primera letra en mayucula y la tabla en la base de datos debe ser prural y y en minuscula:** Ejemplo: **  si el modelo se llama `User` la tabla se llama `users`.
 
 debes dirigirte a la raiz del proyecto y ejecutar el comando
 `php yai model nombremodel` reemplazando nombremodel por el nombre de tu modelo **Ejemplo:** `php yai model User`
 
 eso creara en la carpeta `app/model/` el modelo `User.php` y en la carpeta `app/Class` la clase `User.php`.
 
###  Uso

Una vez hecha la configuracion podras entrar al proyecto y empezar a usar los servicios APIRest de tu base de datos asi:
en tu navegador ingresa a: `localhost/yai-master/User` esto te devolvera todos los datos de tu tabla users de la base de dato.

puedes pasarle los parametros para que te filtre y te debuelva solo los datos que desees. `localhost/yai-master/user?id=2` id es el campo id de la tabla users esto te devuelve el json con los datos del usuario cullo id sea iguala dos. y asi los parametros deben ser los campos de la tabla en tu DataBase
tamben soporta multiples parametros `localhost/yai-master/User?id=1&name=david` esto te devuelve el jsson del usuario cullo id es 1 y nombre es david.

## Version

laversion actual es la 1.0 y aun estamos en desarrollo.