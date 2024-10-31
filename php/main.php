<?php
    # Conexión a la bases de datos #
    function conexion(){
        $pdo = new PDO('mysql:host=localhost; dbname=inventario', 'root', '');
        return $pdo;
    }

    # Verificar datos #
    function verificar_datos($filtro, $cadena){
        if (preg_match("/^".$filtro."$/", $cadena)){
            return false;
        }else{
            return true;
        }
    }

    # Limpiar cadenas de texto #
    function limpiar_cadena($cadena){
        $cadena = trim($cadena); # trim: elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena #
        $cadena = stripslashes($cadena); # stripslashes: quita las barras de un string con comillas escapadas #
        $cadena = str_ireplace("<script>", "", $cadena); # str_ireplace: reemplaza texto mediante una búsqueda. Versión insensible a mayúsculas y minúsculas #
        $cadena = str_ireplace("</script>", "", $cadena);
        $cadena = str_ireplace("<script src", "", $cadena);
        $cadena = str_ireplace("<script type=", "", $cadena);
        $cadena = str_ireplace("SELECT * FROM", "", $cadena);
        $cadena = str_ireplace("DELETE FROM", "", $cadena);
        $cadena = str_ireplace("INSERT INTO", "", $cadena);
        $cadena = str_ireplace("DROP TABLE", "", $cadena);
        $cadena = str_ireplace("DROP DATABASE", "", $cadena);
        $cadena = str_ireplace("TRUNCATE TABLE", "", $cadena);
        $cadena = str_ireplace("SHOW TABLES;", "", $cadena);
        $cadena = str_ireplace("SHOW DATABASES;", "", $cadena);
        $cadena = str_ireplace("<?php", "", $cadena);
        $cadena = str_ireplace("?>", "", $cadena);
        $cadena = str_ireplace("--", "", $cadena);
        $cadena = str_ireplace("^", "", $cadena);
        $cadena = str_ireplace("<", "", $cadena);
        $cadena = str_ireplace("[", "", $cadena);
        $cadena = str_ireplace("]", "", $cadena);
        $cadena = str_ireplace("==", "", $cadena);
        $cadena = str_ireplace(";", "", $cadena);
        $cadena = str_ireplace("::", "", $cadena);
        $cadena = trim($cadena); 
        $cadena = stripslashes($cadena);
        return $cadena;
    }

    # Función renombrar fotos #
    function renombrar_fotos($nombre){
        $nombre = str_ireplace(" ", "_", $nombre);
        $nombre = str_ireplace("/", "_", $nombre);
        $nombre = str_ireplace("$", "_", $nombre);
        $nombre = str_ireplace("#", "_", $nombre);
        $nombre = str_ireplace("-", "_", $nombre);
        $nombre = str_ireplace(".", "_", $nombre);
        $nombre = str_ireplace(",", "_", $nombre);
        $nombre = $nombre."_".rand(0,100); # rand: permite seleccionar un número aleatorio entre el mínimo y el maximo #
        return $nombre;
    }
?>