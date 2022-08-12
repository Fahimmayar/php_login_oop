<?php 

    require_once('Controller/controller.php'); 
    
    $user = new User();

    // Redirect to Login Method
    if(isset($_POST['submit'])){
        $user->login($_POST['email'], $_POST['password']);
    }

    // Redirect to Logout Method
    if(isset($_GET['logout'])){
        $user->logout();
    }

    // Update Method
    if(isset($_GET['update'])){
        $user->update(
            $_GET['id'],
            $_POST['name'],
            $_POST['age'],
            $_POST['email'],
            $_POST['password']
        );
    }