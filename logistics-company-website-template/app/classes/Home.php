<?php

namespace App\classes;


class Home
{
    public $msg;
    public function __construct()
    {

    }
    public  function index(){
        header('Location: action.php?page=home');
    }
}