<header>
    <nav>
        <ul>
            <li class="logo">
                <?php echo $config->sitio[0] ?>
                <small>
                    <?php echo $config->sitio[1] ?>
                </small>
                <?php echo $config->sitio[2] ?>
            </li>
            <li class="saludo">
                <?php
                    if (isset($_COOKIE['visitas'])) {
                        $visitas = $_COOKIE['visitas'];
                    }else{
                        $visitas = 1;
                    }
                    echo $config->saludo . ', ' .  $_SESSION["usuario"] . ' (visita ' . $visitas . ')'
                ?>
            </li>
            
            <li class="dropdown">
                <a href="#" id="lang" class="dropbtn">
                    <?php echo $_SESSION['len'] ?>
                </a>
                <div class="dropdown-content">
                    <a href="#" onclick="clickConf('EN')">EN</a>
                    <a href="#" onclick="clickConf('ES')">ES</a>
                    <a href="#" onclick="clickConf('PT')">PT</a>
                </div>
            </li>

            <li class="busqueda">
                <?php
                    if (isset($_GET["ci"])) {
                        echo 
                            '<a id="home" href="index.php">' . $config->home . '</a>';
                    }else{
                        echo 
                            "<form action=\"index.php\" method=\"get\" class=\"busqueda\">
                                <input name=\"name\" type=\"text\" class=\"form-control\" placeholder=" . $config->nombre . '...' . ">
                                <input type=\"submit\" value=" . $config->buscar .">
                            </form>";
                    }
                ?>
                
            </li>
        </ul>	
    </nav> 
</header>