<?php

    require_once __DIR__ . "/../database.php";

class Session{
    public $db;

    public $login_user;

    public function __construct(){
        $this->db = new Database();
        session_start();
        $this->check_session();
        $this->logout();
    }

    public function check_session(){
        if(!isset($_SESSION['email'])){
            if(basename($_SERVER['PHP_SELF']) !== 'index.php'){
                header("Location: index.php");
            }
            return;
        }
    }

    public function logout(){
        if(isset($_POST['logout'])){
            session_destroy();
            echo "<script>window.location.href='index.php';</script>";
        }
    }






}