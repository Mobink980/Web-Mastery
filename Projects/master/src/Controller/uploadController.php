<?php

class UploadController extends Controller
{

    
    
    public function index()
    {
        //the default template is index
        $template = 'index';

        //invoking the function renderTemplate
        $this->renderTemplate($template, 'everything is working!!');
    }

    public function renderTemplate($template, $data = [])
    {
        $view = $this->view('upload/' . $template , ['data' => $data]);
        $view->render();
    }
    
}





?>