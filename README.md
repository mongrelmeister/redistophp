# redistophp
** Practica CETI - Puesta Producción Segura - A. López**

**Dependencias necesarias para la Aplicación bajo Ubuntu 20.04**

- Instalación Servidor WEB Apache2 y librerias PHP necesarias:

```
sudo apt update
sudo apt install apache2 php libapache2-mod-php
```

- Instalación/Configuración Base de Datos REDIS y conector PHP

```
sudo apt update
sudo apt install -y php-redis 
sudo systemctl restart apache2
```

- Instalación/Configuración Base de Datos MySQL y conector PHP

```
sudo apt update
sudo apt install -y mysql-server php-mysql
sudo mysql_secure_installation
```

__Importante habilitar los credenciales configurados en la instalación dentro del código PHP.__
__Importante crear una Base de Datos y configurar ese mismo nombre en la configuración de PHP__

- Despliegue de la Aplicación WEB

Una vez realizada la configuración de las dependencias hay que
ubicar los archivos de la aplicación en la ruta /var/www/html
o en la ruta donde se configure el Dominio Virtual de Apache2.

Y por último, será necesario realizar un volcado de la estructura
de la Base de Datos mediante el comando:

```
sudo mysql -u root --database=nombre_base_de_datos_a_utilizar < bbdd.sql

```

**Por último será conveniente verificar usuarios y contraseñas para el acceso a las BBDD tanto en REDIS como en PHP**
