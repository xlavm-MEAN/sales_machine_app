# MEAN Login and Registration

![MEAN Todo](/screenshots/angular-login1.PNG)
#
![MEAN Todo](/screenshots/angular-login2.PNG)
#
![MEAN Todo](/screenshots/angular-login3.PNG)


# Configuración Inicial
Clona el repo y ejecuta `npm install` en el server de Node js y en el client de Angular.

## Ejecución de Base de Datos MongoDB
1. ejecuta el mongod 
2. ejecuta el mongo
3. ejecuta dentro de mongo: `use nombre_bd`

## Ejecución del servidor Node JS
1. desde el cmd nos ubicamos en la ruta del server
2. digitamos el comando `npm run dev`

## Ejecución del client de Angular 8
1. desde el cmd nos ubicamos en la ruta del server
2. digitamos el comando `npm start`

# Solución a posibles errores
Si sale un error con `rxjs` vas al package.json y cambias esto: `"^6.1.0"` por esto: `"6.1.0"`

# Funcionamiento de la APP
## Server Node JS
* Usamos el `server.js` para conectarnos a nuestra base de datos MongoDB y seteamos las routes y definimos el puerto donde correrá la app
* Usamos el archivo de modelo de la entidad `Employee.js` para construir nuestra entidad en la base de datos mongoDB, por medio de mongoose
* Usamos los routes para crear la lógica del negocio, los register, login, find, etc. 

## Client Angular 8
* Usamos el `proxy-config` para en vez de usar: localhost:3000/ usamos: /employees
* En `package.json` indicamos que inicie el server con el proxy que creamos anteriormente
* Usamos el `Authentication.service.ts` para crear los metodos que usaremos para nuestro servicio de autenticación
* Usamos el `Auth-guard.service.ts` para gestionar la sesión y ver si está logeado y no se le ha vencido la sesión
* Usamos el `app.module.ts` para declarar las rutas del lado del front y de más (otras restricciones)
* Usamos el `app.component.ts` para indicar el uso de nuestro servicio de autenticación en nuestro pagina base (menú)
* Usamos el `app.component.html` para pegar nuestro html del menú
* para los components adicionales, se usa lo mismo que se describió en los dos últimos puntos