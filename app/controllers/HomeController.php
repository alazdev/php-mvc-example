<?php

class HomeController extends Controller
{
    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['email']))
        {
            return $this->redirect('login');
        }
    }

    public function index(){
        $this->view('home/index');
    }
}