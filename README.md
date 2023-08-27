## Título
<h1>Práctica Symfony Gestión de Proveedores</h1>



## Insignias

   ![Badge en Desarollo](https://img.shields.io/badge/STATUS-EN%20DESAROLLO-green)



## Índice

*[Título](#Título-e-imagen-de-portada)

*[Insignias](#insignias)

*[Índice](#índice)

*[Descripción del proyecto](#descripción-del-proyecto)

*[Estado del proyecto](#Estado-del-proyecto)

*[Características de la aplicación y demostración](#Características-de-la-aplicación-y-demostración)

*[Esquema de la base de datos](#Esquema-de-la-base-de-datos)

*[Acceso al proyecto](#acceso-proyecto)

*[Tecnologías utilizadas](#tecnologías-utilizadas)

*[Personas-Desarrolladores del Proyecto](#personas-desarrolladores)


* [Autora](#autora)

<!-- * [Licencia](#licencia) -->


## Descripción del proyecto
El departamento de contabilidad necesita poder introducir en el sistema los datos de
los proveedores con los que trabajan habitualmente, se solicita una aplicación
que les permita hacerlo de forma rápida y sencilla

## Estado del proyecto
Se ha creado una app donde se puede ver todos los proveedors, actulizar, eliminar o añadir uno nuevo. <br>  
<img src="https://res.cloudinary.com/drjyg98uv/image/upload/v1693169025/gestion-proveedores-symonyy-php-mysql/bvpnkopuyuffunzshjai.png" width="100%"><br>


## Características de la aplicación y demostración
<img src="https://res.cloudinary.com/drjyg98uv/image/upload/v1693161001/gestion-proveedores-symonyy-php-mysql/uhh6lwcd2qymp9hmrfdt.png" width="100%"><br>
<img src="https://res.cloudinary.com/drjyg98uv/image/upload/v1693161001/gestion-proveedores-symonyy-php-mysql/ojpz4ct1au2qn9rsxsmo.png" width="100%"><br>
<img src="https://res.cloudinary.com/drjyg98uv/image/upload/v1693161001/gestion-proveedores-symonyy-php-mysql/p3gxfv35ciajofnvsnsa.png" width="100%"><br>

## Esquema de la base de datos
<img src="https://res.cloudinary.com/drjyg98uv/image/upload/v1693168922/gestion-proveedores-symonyy-php-mysql/abrmhyv7eufeumpaizat.png" width="100%"><br>


## Acceso al proyecto
Clonar el repositorio <br>
``` git clone   ``` <br>
``` composer install ``` <br>
``` php bin/console doctrine:database:create ``` <br>
``` php bin/console doctrine:migrations:migrate ``` <br>
``` php bin/console doctrine:fixtures:load ``` <br>
``` symfony serve ``` <br>
``` symfony open:local ``` <br>
``` symfony server:stop ``` <br>

Se ha dockerizado la aplicación, para ello se ha creado un archivo docker-compose.yml, donde se ha configurado el servicio de php, mysql. <br>


## Tecnologías utilizadas

- Frontend: Twig, Tailwind CSS, CSS
- Backend: PHP, Symfony, Composer, Cloudinary
- Control de Versiones: Git, GitHub
- Base de Datos: MySQL
- Herramientas: Visual Code Studio, Trello, XAMPP, phpMyAdmin, MySQL Workbench
- Servidor: Symfony CLI
- Docker


## Personas-Desarrolladores del Proyecto
- Angela Garcia: Desarrolladora Full Stack
## Autora

[<img src="https://avatars.githubusercontent.com/u/116819605?s=400&u=bae5f7e88a358d3fbbd2f0e8521dda9a57739c70&v=4" width=115><br><sub>Angela Garcia</sub>](https://github.com/Angela-GM)  

<!-- ## Licencia

Este proyecto está protegido por una licencia Creative Commons Atribución-NoComercial-SinDerivadas 4.0 Internacional. Puedes compartirlo tal como está, siempre que me atribuyas como autor, no lo utilices con fines comerciales y no crees obras derivadas basadas en él.

[Más detalles sobre la licencia](http://creativecommons.org/licenses/by-nc-nd/4.0/) -->