<?php
    if(isset($_POST)){
        $listado = file_get_contents("datos/index.json");
        $listado = json_decode($listado, true); 

        $id = 0; 
        $found = false; 

        // Buscar si existe estdiante en la lista
        foreach($listado as $estudiante){
            if($estudiante["ci"]==$_POST['cedula']){
                $file = $estudiante["imagen"]; 
                $ci = $_POST['cedula'];
                $found = true; 
                break ; 
            }
            $id = $id + 1; 
        }

        // Buscar si existe la carpeta del estudiante
        if(!file_exists($file)){
            $found = false;  
        }
        
        // Datos del Perfil
        $path = $ci . "/perfil.json"; 
        $perfil = file_get_contents($path);
        $perfil = json_decode($perfil, true);

        // Libro
        if(is_array($perfil["libro"])){
            $libro = $perfil["libro"][0]; 
        }else{
            $libro = $perfil["libro"]; 
        }

        // Música 
        if(is_array($perfil["musica"])){
            $musica = $perfil["musica"][0]; 
        }else{
            $musica = $perfil["musica"]; 
        }
        // Videojuego 
        $juegos= $perfil["video_juego"][0]; 
        foreach($perfil["video_juego"] as $i => $value){
            if ($i == 0 ) continue; 
            $juegos = $juegos . ", " . $value; 
        }
        // Lenguajes
        $lenguajesP= $perfil["lenguajes"][0]; 
        foreach($perfil["lenguajes"] as $i => $value){
            if ($i == 0 ) continue; 
            $lenguajesP = $lenguajesP . ", " . $value; 
        }
        if($found){
            // Página del perfil
            echo " 
            <section id='foto'>
                    <img id='miPerfil' src='" . $listado[$id]["imagen"] ."' alt='Foto de perfil'>
            </section>
                
            <section id='perfil'>
                <h1> " . $perfil["nombre"] .  "</h1>
                <p id='descrip'>"
                    . $perfil["descripcion"] .
                "</p>
            
                <table>
                    <tr>
                        <td>Mi color favorito es:</td>
                        <td>" .$perfil["color"]. "</td>
                    </tr>
                    <tr>
                        <td>Mi libro favorito es:</td>
                        <td>" .$libro. "</td>
                    </tr>
                    <tr>
                        <td>Estilo de música preferida es: </td>
                        <td>" .$musica. "</td>
                    </tr>
                    <tr>
                        <td>Mis Video juegos favoritos son:</td>
                        <td>" .$juegos. "</td>
                    </tr>
                    <tr>
                        <td><b>Lenguajes aprendidos:</b></td>
                        <td><b>" . $lenguajesP . "</b></td>
                    </tr>
                </table>
                    <p>Si necesitan comunicarse conmigo me pueden escribir a: <a href='mailto:" . $perfil["email"] . "'>" .$perfil["email"]. "</a></p>
                    
            </section> "; 
        }
    }
?>