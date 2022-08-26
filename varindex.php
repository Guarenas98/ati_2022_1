<?php

$aux=
	"<select name='lenguaje' id='lenguaje' onchange='cambiarLenguaje(this)'>
	<option >Lenguaje</option>
	<option value='EN'>EN</option>
	<option value='ES'>ES</option>
	<option value='PT'>PT</option>
	</select>

	<form action=''>
		<input id='text'  type='text' placeholder='Search..'>
		<input id='boton'  value='Buscar' type='button' />
	</form>";

    echo $aux;
?>