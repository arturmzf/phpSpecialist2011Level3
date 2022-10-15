<?php

    class User extends AUser {

        public $name;
        public $login;
        public $password;

        static $usersCount = 0;

        const INFO_TITLE = "<h3>Данные пользователя:</h3><br />";

        public function __construct(){
            self::$usersCount++;
        }

        public function __clone(){

            self::$usersCount++;

            $this->name = "Guest";
            $this->login = "guest";
            $this->password = "qwerty";

        }

        public function showTitle(){

            echo(self::INFO_TITLE);

        }

        public function showInfo(){

            echo("<b>Name: </b>".$this->name."<br />");
            echo("<b>Login: </b>".$this->login."<br />");
            echo("<b>Password: </b>".$this->password."<br />");
            echo("<br />");

        }

    }

?>
