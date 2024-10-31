<?php
    # Conexión a la bases de datos #
    function conexion(){
        $pdo = new PDO('mysql:host=localhost; dbname=inventario', 'root', '');
        return $pdo;
    }
?>