<?php
class DbConnection
{
    //creates and returns new connection to db
    public function connect()
    {
        $conn = new PDO('mysql:host=localhost;dbname=gallery', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}
?>
