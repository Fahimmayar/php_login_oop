<?php 

    class Database{
        
        public static function connect()
        {
            $con = new mysqli('localhost' , 'root' , '' , 'login_system');
            if (!$con) {
                return "Connection Failed";
            }
            return $con;
        }
        
    }