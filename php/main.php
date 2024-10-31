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
?>