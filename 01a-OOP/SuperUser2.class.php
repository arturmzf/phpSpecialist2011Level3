<?php

    class SuperUser2 extends User2 {

        public $role;

        function __construct($name, $login, $password, $role){

            SuperUser::$superUsersCount++;

            parent::__construct($name, $login, $password);
            $this->role = $role;
            User::$usersCount--;

        }

        function showInfo(){

            parent::showInfo();
            echo("<b>Role: </b>".$this->role."<br />");
            echo("<br />");

        }

    }

?>
