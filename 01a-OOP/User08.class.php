<?php

    class User08 {

        private $name;
        private $login;
        private $password;

        function __construct($name = "", $login = "", $password = ""){

            try{

                if(($name == "") || ($login == "") || ($password == "")) {
                    throw new Exception("Введены не все данные!");
                }

                // К заданию № 12
                User::$usersCount++;

                $this->name = $name;
                $this->login = $login;
                $this->password = $password;

            }catch(Exception $e08){

                echo $e08->getMessage();

            }

        }

    }

?>
