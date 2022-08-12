<?php 
    session_start(); 
    require_once('database.php'); 

    class User{

        // Login
        public function login($username , $password)
        {
            $con = Database::connect();
            $sql = "SELECT * FROM users WHERE email = '$username' AND password = '$password'";
            $result = $con->query($sql);
            if ($result->num_rows == 1){
                $user = $result->fetch_assoc();
                $_SESSION['user'] = $user;
                header('location:../dashboard.php?login=success');
            }else{
                header("location:../index.php?fail=true");
            }
        }

        // Update
        public function update($id , $name, $age , $email , $password)
        {
            $con = Database::connect();
            $src = $_FILES['photo']['tmp_name'];
            $des = '../assets/uploads/'.time().$_FILES['photo']['name'];
            move_uploaded_file($src , $des);

            $sql = "UPDATE users
                SET name ='$name', age = $age , email ='$email', password = '$password',
                updated = curdate(), photo = '$des' WHERE id = " . $id;
            $result = $con->query($sql);
            if ($result) {
                header("location:../dashboard.php?success=true");
            } else {
                header("location:../dashboard.php?failed=true");
            }
        }

        // Logout
        public function logout()
        {
            unset($_SESSION['user']);
            header("location: ../index.php");
        }
    }