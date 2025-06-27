<?php

require_once"../database.php";

class Register{

    public $db;

        public function __construct(){
        $this->db = new Database ();
    
    }
    public function signUp(){
        $username =$_POST['username'];
        $email =$_POST['email'];
        $password =$_POST['password'];

        if(empty($username) || empty($email) || empty($password)){
            echo"<script>alert('Form tidak boleh kosong!');</script>";
        }else{
            $get_email = "SELECT * FROM users WHERE email = '$email'";
            $result = $this->db->mysqli->query($get_email);
            $check_email = $result->num_rows;
            if($check_email == 1){
                echo "<script>alert('Email sudah terdaftar');</script>";
            }else{
                $pass = password_hash($password, PASSWORD_DEFAULT);
                $sql ="INSERT INTO users (username, email, password) VALUES('$username', '$email', '$pass' )";
                $query =$this->db->mysqli->prepare($sql);
                $query->execute();
                if($query){
                    echo "<script>windows.location.href = 'loginForm.php';</script>"; 
                }
            }
        }
    }

};