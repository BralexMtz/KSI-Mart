#KSI-Mart

Una tienda web para el curso de  Desarrollo de Software
###Requerimientos
------------

Se necesita:
- Tener instalado docker
- Tener habilitado el docker-compose, en caso de no tenerlo [en este enlace](https://docs.docker.com/compose/install/) se puede revisar como.

###Instrucciones

------------

- Al descargar este repositorio con `git clone` o `git remote add `  debera abrir la terminal y colocarse justo donde se encuentre el archivo **docker-compose.yml**
- Posteriormente ejecutar el comando `docker-compose up -d` , este proceso podrá tardar algunos minutos. Favor de ignorar los errores xd
- Despues de que se haya terminado la instalación deberemos incursionarnos dentro del contenedor de mysql para cargar la base de datos.
- Para ello realizamos el comando `docker exec -it mysql bash` esto nos permitira ingresar a la bash del contenedor
- Ahora adentro debemos ingresar el siguiente comando para cargar la base de datos `mysql -u root -p KsiMart < /home/KsiMart_MYSQL.sql`
- nos pedirá la contraseña la cual es:  **1q2w3e4r**
- comando para llenar los datos `mysql -u root -p KsiMart < /home/KsiMart_carga_inicial.sql`
- nos pedirá la contraseña nuevamente:  **1q2w3e4r**
- Ahora podemos salir del contenedor con `CTRL+p+q`
- Finalmente pueden visualizar la pagina inicial en el siguiente enlace-> [KSI-Mart](http://localhost:80 "KSI-Mart")

###End
