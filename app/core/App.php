<?php

class App 
{
    protected $controller = 'WelcomeController';
    protected $method = 'index';

    protected $parameters = [];

    public function __construct()
    {
        $url = $this->parseURL();

        if(!empty($url)){
            if (file_exists('app/controllers/'.$url[0].'Controller.php'))
            {
                $this->controller = ucfirst($url[0]).'Controller';
                unset($url[0]);
                
                if (isset($url[1]))
                {
                    $this->method = $url[1];
                    unset($url[1]);
                }
                $this->callController($url);
            }
            else
            {
                $this->page('NOT FOUND', '404 | PAGE NOT FOUND', 404);
            }
        }else{
            $this->callController($url);
        }
    }

    public function parseURL()
    {
        if (isset($_GET['url']))
        {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

    public function callController($url)
    {
        require_once 'app/controllers/'.$this->controller.'.php';
        $this->controller = new $this->controller;

        if (method_exists($this->controller, $this->method))
        {
            if (!empty($url))
            {
                $this->parameters = array_values($url);
            }

            try
            {
                call_user_func_array([$this->controller, $this->method], $this->parameters);
            }
            catch (\ArgumentCountError $th)
            {
                $this->page('NOT FOUND', '404 | PAGE NOT FOUND', 404);
            }
        }
        else
        {
            $this->page('NOT FOUND', '404 | PAGE NOT FOUND', 404);
        }
    }

    private function page($title, $desc, $respone_code = null)
    {
        $path = 'app/views/abort.php';
        if (!empty($respone_code))
        {
            http_response_code($respone_code);
        }
        if (file_exists($path))
        {
            $data['title'] = $title;
            $data['desc'] = $desc;
            require_once $path;
        }
        else
        {
            return "aborting error";
        }
    }
}