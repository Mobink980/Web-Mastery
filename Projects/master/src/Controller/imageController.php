<?php

class imageController extends Controller
{

    
    
    public function index()
    {
        //the default template is index
        $template = 'index';
        if( isset($_GET['id']) ) {

            $template = 'image';
        } 

        //invoking the function renderTemplate
        $this->renderTemplate($template, 'everything is working!!');
    }

    public function renderTemplate($template, $data = [])
    {
        $view = $this->view('image/' . $template , ['data' => $data]);
        $view->render();
    }
    
}





?>