<?php

class LoginController extends Controller
{
    public function __construct()
    {
        session_start();
        if(isset($_SESSION['email'])){$this->redirect('');}
    }

    public function index(){
        if (isset($_POST['email']) && isset($_POST['password']))
        {
            $send['email'] = $_POST['email'];
            $send['password'] = $_POST['password'];
            $data = $this->model('UserModel')->login($send);
            if ($data)
            {
                $_SESSION['id']     = $data['id'];
                $_SESSION['name']   = $data['name'];
                $_SESSION['email']  = $data['email'];

                if(!isset($_POST['remember'])){
                    setcookie ("user_email",$_POST["email"],time()+ (3600 * 365 * 24 * 60 * 60));
                    setcookie ("user_password",$_POST["password"],time()+ (3600 * 365 * 24 * 60 * 60));
                }
                else
                {
                    if (isset($_COOKIE['user_email']))
                    {
                        setcookie ("user_email",'');
                    }
                    if (isset($_COOKIE['user_password']))
                    {
                        setcookie ("user_password",'');
                    }
                }

                return $this->redirect('', ['success','Welcome',$_SESSION['name']]);
            }else{
                return $this->redirect('login', ['error','ERROR','wrong email or password']);
            }
        }
        $this->view('auth/login');
    }
}