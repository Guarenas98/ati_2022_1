<header style="z-index:3">
		<div class="container nav">
			<div class="row " id="ul">
				<div class="col logo" id="logo">
				<?php 
					printf("%s <small>%s</small> %s ", $config->sitio[0], $config->sitio[1], $config->sitio[2]);
				?>
				<script>
					document.getElementById("logo").innerHTML+= " ( Visita "+getCookie("visitas")+" )";
				</script>
				</div>
				<div class="col" id="saludo">
				<?php
					printf("%s, %s",$config->saludo , $_SESSION["username"]);
					?>
				</div>
				<div class="col ultimo" id="busqueda">

				</div>
			</div>
		</div>
	    </header>