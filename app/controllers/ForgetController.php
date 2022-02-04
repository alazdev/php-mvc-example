<?php

class ForgetController extends Controller
{
    public function __construct()
    {
        session_start();
        if(isset($_SESSION['email'])){$this->redirect('');}
    }
    
    public function index(){
        if (isset($_POST['email']))
        {
            $user = $this->model('UserModel')->checkEmail($_POST['email']);
            if($user)
            {
                return $this->redirect('reset/reset/'.$user['email'].'/'.$user['password']);
            }else{
                return $this->redirect('forget',['error','Email not found']);
            }
        }
        $this->view('auth/forget');
    }
}