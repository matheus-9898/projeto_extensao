<?php 
    include('config.php');

    if(isset($_GET['logout'])){
        session_destroy();
        header('Location: ./');
        die();
    }

    if(isset($_SESSION['login'])){
        include('painel/index.php');
    }else{
        include('login/index.php');
    }
?>