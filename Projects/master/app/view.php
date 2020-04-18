<?php

class View
{
    //This View class, is going to include our view templates that we need

    protected $file; //we use this variable, to call the filename
    protected $data; // a variable that the template is going to have access to

    public function __construct($file, $data)
    {
        $this->file = $file;
        $this->data = $data;
    }

    public function render() 
    {
        if( file_exists(VIEW . $this->file . '.php') )
        {
            include VIEW . $this->file . '.php';
        }
    }
}