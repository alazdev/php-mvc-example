<?php

class RegisterController extends Controller
{
    public function __construct()
    {
        session_start();
        if(isset($_SESSION['email'])){$this->redirect('');}
    }

    public function index(){
        $data = null;
        if (isset($_POST['email']) && isset($_POST['password']))
        {
            if($this->model('UserModel')->checkEmail($_POST['email']) != null){
                $data['type'] = 'danger';
                $data['desc'] = 'Email already used';
            }else{
                $data = [
                    'name'      => $_POST['name'],
                    'email'     => $_POST['email'],
                    'password'  => $_POST['password'],
                ];
                $this->model('UserModel')->register($data);
                $user = $this->model('UserModel')->checkEmail($_POST['email']);
                if($user != null){
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['email'] = $user['email'];
                }
                return $this->redirect('', ['success','Success','Your account is active.']);
            }
        }
        $this->view('auth/register', $data);
    }
}