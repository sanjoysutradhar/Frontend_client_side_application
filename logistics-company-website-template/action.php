<?php
require_once "vendor/autoload.php";
//var_dump($_GET);

if(isset($_GET['page'])){
    if($_GET['page']=='home'){
        include 'pages/home.php';
    }
}