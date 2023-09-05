<?php

class HomeController
{
    public function index()
    {
        require_once ($_SERVER["DOCUMENT_ROOT"]) . "/src/views/login.php";
    }
}

class Usuario
{
    public function Dashbord()
    {
        if ($_SESSION['user']['id_permissoes'] === 1) 
        {
            $_SESSION['permicao'] = ["perm" => "administrador","menu" => "ADMINIDTRACION"];
        }
        if ($_SESSION['user']['id_permissoes'] === 2) 
        {
            $_SESSION['permicao'] = ["perm" => "teacher","menu" => "TEACHER"];
        }
        if ($_SESSION['user']['id_permissoes'] === 3) 
        {
            $$_SESSION['permicao'] = ["perm" => "students","menu" => "STUDENTS"];;
        }
    }
}
