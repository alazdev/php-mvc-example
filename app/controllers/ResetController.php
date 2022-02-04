<?php

class ResetController extends Controller
{
    public function __construct()
    {
        session_start();
        if(isset($_SESSION['email'])){$this->redirect('');}
    }
    
    public function reset($email, $password)
    {
        $check = $this->model('UserModel')->checkPassword($email, $password);
        if (!$check)
        {
            return $this->abort('NOT FOUND', '404 | PAGE NOT FOUND', 404);
        }
        if (isset($_POST['email']) && isset($_POST['npw']))
        {
            if ($_POST['npw'] === $_POST['cpw'])
            {
                $this->model('UserModel')->setPassword($_POST['npw'], $_POST['email']);
                return $this->redirect('login', ['success', 'Password changed!']);
            }else{
                return $this->redirect('reset/reset/'.$email.'/'.$password, ['error', 'Password does not match']);
            }
        }
        $data['email'] = $email;
        $data['password'] = $password;
        $this->view('auth/reset', $data);
    }
}