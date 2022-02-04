<?php

class UserModel
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function register($data)
    {
        $this->db->query('INSERT INTO '.$this->table.' (name, email, password) VALUES(:name, :email, :password)');
        $this->db->bind('name',$data['name']);
        $this->db->bind('email',$data['email']);
        $this->db->bind('password',md5($data['password']));
        $this->db->execute();
    }

    public function login($data)
    {
		$this->db->query('SELECT * FROM '.$this->table.' WHERE email = :email AND password = :password');
        $this->db->bind('email',$data['email']);
        $this->db->bind('password',md5($data['password']));
        return $this->db->single();
    }
    
    public function checkEmail($email)
    {
		$res = $this->db->query("SELECT * FROM ".$this->table." WHERE email = :email");
        $this->db->bind('email',$email);
        return $this->db->single();
    }
    
    public function checkPassword($email, $password)
    {
		$res = $this->db->query("SELECT * FROM ".$this->table." WHERE email = :email AND password = :password");
        $this->db->bind('email',$email);
        $this->db->bind('password',$password);
        return $this->db->single();
    }
    
    public function setPassword($password, $email)
    {
		$res = $this->db->query("UPDATE ".$this->table." SET password = :password WHERE email = :email");
        $this->db->bind('password',md5($password));
        $this->db->bind('email',$email);
        return $this->db->single();
    }
}