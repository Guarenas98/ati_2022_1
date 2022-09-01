# ati_2022_1
Proyecto del semestre 2022_1

## Importante:
Para construir y ejecutar el contenedor usamos las siguientes líneas:
docker build -t php-server . 
docker run --name php-server -p 8000:80 php-server

Y para abrir el servidor y el cliente ingresamos a las siguientes direcciones:
Servidor: http://localhost:8000/getDatos.php
Cliente http://localhost:8000/index.php

## Content

Este proyecto es para practicar paso a paso todo el contenido que se estudia en la primera parte de ATI. 
Es una aplicación web muy sencilla que muestra el listado de estudiantes y el perfil de cada uno de ellos haciendo clic sobre el nombre.
El código de este proyecto va evolucionando y existe una versión (una rama) por estudiante y reto. 
Es un proyecto muy sencillo con solo dos casos de uso:

<img src="/README_files/DiagramaUC.png" width="200" />

Y un modelo de datos de tres objetos:

<img src="/README_files/DiagramaClases.png" width="500" />

Sobre el prototipo tenemos varias versiones.

## Preview
Al principio es una aplicación web del tipo MPA, con una manera de navegar sencilla, así como las paginas:

<h2>Versión 1</h2>
<h3>Experiencia de usuario (UX)</h3>

<img src="/README_files/UX-MPA-PaginasDinamicas.png" width="100" />

<h3>Página de Listado:</h3>

<img src="/README_files/verListado1.png" width="400" />

<h3>Página de Perfil:</h3>

<img src="/README_files/verPerfil1.png" width="400" />

<h2>Versión 2</h2>

Luego se mantiene la manera de navegar, pero el diseño es mejorado:

<h3>Página de Listado:</h3>

<img src="/README_files/verListado2.png" width="400" />

<h3>Página de Perfil:</h3>

<img src="/README_files/verPerfil2.png" width="400" />
