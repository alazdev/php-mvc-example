<?php

class Controller
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE)
        {
            session_start();
        }
    }

    public function view($view, $data = [])
    {
        $path = 'app/views/'.$view.'.php';
        if (file_exists($path))
        {
            require_once $path;
        }
        else
        {
            if (DEBUG == true)
            {
                echo "<i>".$view.".php</i> file not found in <i>views</i> folder";
            }
            else
            {
                return $this->abort('INTERNAL SERVER ERROR', '505 | INTERNAL SERVER ERROR', 505);
            }
        }
    }

    public function model($model)
    {
        $path = 'app/models/'.$model.'.php';
        if (file_exists($path))
        {
            require_once $path;
            return new $model;
        }
        else
        {
            if(DEBUG == true)
            {
                echo "<i>".$model.".php</i> file not found in <i>models</i> folder";
            }
            else
            {
                return $this->abort('INTERNAL SERVER ERROR', '505 | INTERNAL SERVER ERROR', 505);
            }
        }
    }
    
    public function abort($title, $desc, $respone_code = null)
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
            exit;
        }
        else
        {
            return "aborting error";
        }
    }
    
    public function redirect($url, $data = [])
    {
        $path = 'app/views/redirect.php';
        if (!empty($data))
        {
            if(isset($data[0])){
                if($data[0] != 'success' && $data[0] != 'error')
                {
                    if(DEBUG == true){
                        echo "<i>".$data[0]."</i> type not found in <i>redirect</i>";
                    }else{
                        echo $this->abort('INTERNAL SERVER ERROR', '505 | INTERNAL SERVER ERROR', 505);
                    }
                }
            }
            $data['url'] = $url;
            $data['type'] = isset($data[0]) ? $data[0]:'';
            $data['title'] = isset($data[1]) ? $data[1]:'';
            $data['desc'] = isset($data[2]) ? $data[2]:'';
            require_once $path;
        }
        else
        {
            echo "<script>location.href = '".BASEURL.$url."'</script>";
        }
    }
}