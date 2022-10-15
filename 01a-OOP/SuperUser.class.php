<?php

    class SuperUser extends User implements ISuperUser {

        public $role;

        static $superUsersCount = 0;

        function __construct($name, $login, $password, $role){

            // К заданию № 12
            self::$superUsersCount++;

            $this->name = $name;
            $this->login = $login;
            $this->password = $password;
            $this->role = $role;

        }

        function showInfo(){

            echo("<b>Name:</b> ".$this->name."<br />");
            echo("<b>Login:</b> ".$this->login."<br />");
            echo("<b>Password:</b> ".$this->password."<br />");
            echo("<b>Role:</b> ".$this->role."<br />");
            echo("<br />");

        }

        function getInfo(){

            /*
            $information = array(
                "Name" => $this->name,
                "Login" => $this->login,
                "Password" => $this->password,
                "Role" => $this->role
            );
            */

            $information = array();
            foreach($this as $key=>$value) {

                $information[$key] = $value;

            }

            return $information;

        }

    }

?>
