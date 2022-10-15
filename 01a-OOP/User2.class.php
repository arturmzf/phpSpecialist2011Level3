<?php

    class User2 {

        public $name;
        public $login;
        public $password;

        public function __construct($name, $login, $password)
        {
            // К заданию № 12
            User::$usersCount++;

            $this->name = $name;
            $this->login = $login;
            $this->password = $password;

        }

        public function showInfo()
        {

            echo("<b>Name: </b>" . $this->name . "<br />");
            echo("<b>Login: </b>" . $this->login . "<br />");
            echo("<b>Password: </b>" . $this->password . "<br />");
            echo("<br />");

        }

    }

?>
