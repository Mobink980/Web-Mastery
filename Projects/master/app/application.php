<?php

class Application
{
    protected $controller = 'imageController';
    protected $action = 'index';
    protected $show404 = true;

    //A constructor which is going to be executed as soon as the class is initialized
    public function __construct()
    {
        //$this, refers to the application class
        $this->parseURL();

        // echo CONTROLLER . $this->controller . '.php';
        //checking whether the file exists
        if (file_exists(CONTROLLER . $this->controller . '.php')) {

            //checking if the method exists
            if (method_exists($this->controller, $this->action)) {
                //as we already know that the file exists, we are going to create an instance of the controller
                $this->controller = new $this->controller;
                //specifying the controller and the action and PHP is going to execute it
                //in this case, we don't want to pass any parameters to the function
                call_user_func_array([$this->controller, $this->action], []);

                //if everything is correct, we don't want to show 404 page
                $this->show404 = false;
            }

        }

        //if the file does not exist
        if ($this->show404) {
            echo "404, page not found";
        }

    }

    private function parseURL()
    {
        //getting the request and removing the slashes from
        $request = trim($_SERVER['REQUEST_URI'], '/');


        //If our request has question mark, then we got parameters
        if( strpos($request, '?') )
        {
            //Removing all GET parameters from the request
            $request = substr($request, 0, strpos($request, '?'));
        }

        if (!empty($request)) {

            $url = explode('/', $request); //split everything by slashes
            // var_dump($url);

            if ($url) {
                //The pattern of the url is ==> localhost/controller/action
                //controller is the first element of the url 
                //(basically we're checking for the files with Controller as the 
                //last part of their name, in the CONTROLLER directory, 
                //for instance, we have a file with name imageController.php in the CONTROLLER directory)
                $this->controller = $url[0] . 'Controller';
                //action is the second element of the url and if it is set we're using it,
                //otherwise we use index page
                $this->action = isset($url[1]) ? $url[1] : $this->action;
            }
        }
    }

}
