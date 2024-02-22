<?php
class Conexion
{
    public static function StartUp()
    {
        $pdo = new PDO('pgsql:host=localhost;dbname=konecta;user=postgres;password=123');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;

    }
}
?>
