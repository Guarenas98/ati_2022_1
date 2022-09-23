<?php echo 
'<header>
    <nav>
        <ul>
            <li class="logo">' .
                $config->sitio[0] .'<small>' . $config->sitio[1] . '</small> ' . $config->sitio[2] .
            '</li>
            <li class="saludo"> 
                <p>' . $config->saludo . ', ' . $nombre . $visitasTag .  '</p> 
            </li>
            <li class="busqueda">
                ' . $busquedaTag .'
            </li>
            <li class="lenguajes">
                <select name="lenguages">
                    <option value="es">Español</option>
                    <option value="en">English</option>
                    <option value="pt">Português</option>
                </select>
            </li>
        </ul>	
    </nav> 
</header>'
?>