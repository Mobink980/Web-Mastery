<?php

class UserController extends Controller
{

    
    
    public function index()
    {
        //the default template is index
        echo "UserController works!!";
        // $template = 'index';
        // if( isset($_GET['id']) ) {

        //     $template = 'image';
        // } 

        // //invoking the function renderTemplate
        // $this->renderTemplate($template, 'everything is working!!');
    }

    public function register()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeatPassword'];

        // echo $email . " " . $password . " " . $repeatPassword;
        
        //check whether the passwords match
        if ($password != $repeatPassword){
            echo "Passwords do not match!";
            die(); //killing the script (nothing will be executed afterwards)
        }

        //check if the email is registered already
        $this->model('user');
        $user = $this->model->getUserByEmail($email);

        //if there was a user registered
        if($user)
        {
            echo "User with this email already exists! Please choose a new one!";
            die(); //killing the script (nothing will be executed afterwards)
        }

        //encrypt the password
        $password = $this->encryptPassword($password);

        //save the user
        //setEmail() and setPasswords are setters
        $this->model->setEmail($email);
        $this->model->setPassword($password);
        $this->model->saveUser();

        //log in functionality
    }

    public function renderTemplate($template, $data = [])
    {
        $view = $this->view('image/' . $template , ['data' => $data]);
        $view->render();
    }

    private function encryptPassword($password)
    {
        //encrypting the password quite securely!
        return crypt($password, '$2y$14$wHhBmAgOMZEld9iJtV./aq');
    }
    
}





?>