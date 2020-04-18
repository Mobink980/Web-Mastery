<?php

class User extends BaseModel
{

    private $id;
    private $email;
    private $password;
    private $deleted;
    private $createdAt;
    
    //constructor ($data is the array of the user)
    function __construct($data)
    { 
        if( isset($data['id']) )
        {
            $this->id = $data['id'];
        }

        if( isset($data['email']) )
        {
            $this->email = $data['email'];
        }

        if( isset($data['password']) )
        {
            $this->password = $data['password'];
        }

        if( isset($data['deleted']) )
        {
            $this->deleted = $data['deleted'];
        }

        if( isset($data['created_at']) )
        {
            $this->createdAt = $data['created_at'];
        }
    }

    //getting the user by the email
    public function getUserByEmail($email)
    {
        //sending the row sql query inside the database
        $sql = "SELECT * FROM user WHERE email = :userEmail";
        $db = $this->connect(); //connecting to the database
        $db = $db->prepare($sql); //Prepares a statement for execution and returns a statement object
        $db->bindParam('userEmail', $email); //binding the parameter
        $db->execute(); //executing the sql statement


        //fetching the results from the query
        //getting the results from the database in the form of an associative array
        $result = $db->fetch(PDO::FETCH_ASSOC);
        //return the object user, if the result does exist. if it does not, return $result (False)
        return $result ? new User($result) : $result;
    }

    public function saveUser()
    {
        //sql statement
        $sql = "INSERT INTO user (email, password) VALUES (:email, :password)";
        $db = $this->connect(); //connecting to the database
        $db = $db->prepare($sql); //Prepares a statement for execution and returns a statement object

        $db->bindParam('email', $this->email); //binding the parameter
        $db->bindParam('password', $this->password); //binding the parameter

        //executing the query
        return $db->execute();
    }

    //setting the email
    public  function setEmail($email)
    {
        $this->email = $email;
    }

        //setting the password
        public  function setPassword($password)
        {
            $this->password = $password;
        }
}