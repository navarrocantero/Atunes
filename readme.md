# [aTuns](atuns.herokuapp.com )

## Pagina para registrar informacion acerca de albunes y canciones de musica
 

# Instalación

Configurar el archivo .env.example con tus datos de acceso a la base de datos.
Renombrar el **.env.example** a **.env**
## Cargar la base de datos

Puedes utilizar el script **_sql.sql_** para construir la base de datos contra la que se ejecuta la aplicación.

### Línea de comandos
Para importar la base de datos desde la teminal:

```
$ mysql -u username -p < createdb.sql
```

donde _username_ y _password_ son las credenciales de acceso a tu servidor MySQL.

### PHPMyadmin, Datagrip y similares
Lo primero que debes hacer es crear una base de datos : 

create database atuns;

Despues abre la consola SQL de esa BBDD e introduce
  el contenido de **_sql.sql_**.

Si todo ha salido correctamente deberias tener esto :


![Ejemplo](https://i.imgur.com/u0r9x7s.png)

En caso contrario, puedes mandarme un MD con tu problema.

### Rutas de acceso

La web cuenta con rutas para usuarios autenticados, sin autenticar, y rutas libres.

La mayoria de las rutas solo estan permitidas para los usuarios Logueados.


### Rutas autenticadas

#### get y post => (/album/add);  
##### Para añadir nuevo album
#### get y post => (/album/edit/{nombre_album}) 
##### Para editar album existente
#### delete      => (/album)
##### Para borrar un album (obvio?)
#### get y post => (/album/{nombre_album}) 
##### Para editar un album  
#### get y post => (/album/{nombre_album}/add) 
##### Para añadir una cancion al album
#### delete      => (/album/{track_name})
##### Para borrar una cancion
#### get y put => (/album/{nombre_album}/track/{nombre_cancion}) 
##### Para editar una cancion del album
#### get      => (/logout) 
##### Desloguea al usuario
#### get y post      => (/profile) 
##### Para modificar la cuenta del usuario 
   
### Rutas  No autenticadas
#### get y post => (/login);  
##### Para loguearse el usuario
#### get y post => (/register);  
##### Para registrarse el usuario 

   
### Rutas  Sin control de acceso
#### get   => (/);  
##### Muestra el index de la pagina
#### get   => (/album/{nombre_album});  
##### Muestra contenido de un album
#### get   => (/api);  
##### Devuelve un JSON con todos los albunes del sistema
#### get   => (/api/{album_name});  
##### Devuelve un JSON con todas las canciones de un determinado album 