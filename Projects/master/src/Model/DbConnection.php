<?php


class DbConnection
{
    //connecting to database
    public function connect()
    {
        $conn = new PDO('mysql:host=localhost;dbname=gallery', 'root', '');
        //setting the attribute of this connection to show errors 
        //occurring in connection with the database
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }
}