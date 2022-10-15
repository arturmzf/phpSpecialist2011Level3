<?php

    /*
    ЗАДАНИЕ 14
    - В директории "oop" создайте файл "User.class.php"
    - Перенесите описание класса User из файла "users.php" в файл "User.class.php"
    - В директории "oop" создайте файл "SuperUser.class.php"
    - Перенесите описание класса SuperUser из файла "users.php" в файл "SuperUser.class.php"
    - Посторите те же действия для класса AUser и интерфейса ISuperUser
    - В файле "users.php"(данный файл) опишите функцию __autoload(),
        которая автоматически присоединяет файлы с описанием классов к файлу "users.php"
    */

    function __autoload($className) {

        $fullClassName = $className.".class.php";
        include($fullClassName);
        /*
        // Ну, ты и дурак!
        switch($className) {
            case "User":
                include "User.class.php";
                break;
            case "User2":
                include "User2.class.php";
                break;
            case "User08":
                include "User08.class.php";
                break;
            case "SuperUser":
                include "SuperUser.class.php";
                break;
            case "SuperUser2":
                include "SuperUser2.class.php";
                break;
            case "AUser":
                include "AUser.class.php";
                break;
            case "ISuperUser.class.php":
                include "ISuperUser.class.php";
                break;
            default:
                include "User.class.php";
                break;
        }
        */
    }

    $user01 = new User();
    $user02 = new User();
    $user03 = new User();

    $user01->name = "Artur";
    $user01->login = "artur";
    $user01->password = "ArTuRkIn";

    $user02->name = "Kamilla";
    $user02->login = "kamilla";
    $user02->password = "KaMiLlKiN";

    $user03->name = "Kadriya";
    $user03->login = "kadriya";
    $user03->password = "KaDrIyUsHkIn";

    echo(User::INFO_TITLE); // К 9-му заданию
    $user01->showInfo();
    echo(User::INFO_TITLE); // К 9-му заданию
    $user02->showInfo();
    echo(User::INFO_TITLE); // К 9-му заданию
    $user03->showTitle(); // К заданию № 9
    $user03->showInfo();

	$user04 = new User2("Rinat", "rinat", "RiNaTkIn");
    $user04->showInfo();

    $user05 = clone($user01);
    $user05->showInfo();

	$superUser2 = new SuperUser("Super User", "root", "pass@Word1", "admin");
    $superUser2->showInfo();

    print_r($superUser2->getInfo());

    $superUser3 = new SuperUser2("Second Super User", "root2", "pass@Word2", "admin");
    $superUser3->showInfo();

    $user08 = new User08("name", "login", "");


	function checkObject($obj) {

        if($obj instanceOf User) {
            if($obj instanceOf SuperUser){
                echo("Данный пользователь обладает правами администратора...<br />");
            }else{
                echo("Данный пользователь является обычным рядовым...<br />");
            }
        } else{
            echo("Данный пользователь - неизвестный...<br />");
        }

    }


	/*
	ЗАДАНИЕ 15
	- Создайте свойство objNum, которое будет хранить порядковый номер объекта.
	  Подумайте, где лучше его создать?
	- Внесите изменения в классе User (а может и в SuperUser?), которые будут присваивать свойству objNum,
	  порядковый номер объекта.
	  Подумайте, где и как лучше это сделать?
	- В классе User (а может и в SuperUser?) опишите метод __toString()
	- Данный метод должен возвращать строку в формате "Объект #objNum: name".
	  Например: "Объект #3: Василий Пупкин"
	- Попробуйте преобразовать один из созданных Вами объектов в строку
	*/

    echo("<hr />");
    echo("Количество User: ".User::$usersCount."<br />");
    echo("Количество SuperUser: ".SuperUser::$superUsersCount."<br />");

    checkObject($user01);
    checkObject($superUser2);
    checkObject($superUser3);

?>