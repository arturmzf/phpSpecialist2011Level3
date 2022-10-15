<?php
    /* ЗАДАНИЕ 1
    - Подключите файл с описанием класса GbookDB
    - Создайте объект gbook, экземпляр класса GbookDB
    - Создайте переменную $errMsg со строковым значением "" (пустая строка)
    */

    include "GbookDB.class.php";
    $gbook = new GbookDB;

    $errMsg = "";

/* ЗАДАНИЕ 3
- Проверьте, была ли отправлена HTML-форма?
- Если ДА, то подключите файл с кодом для обработки HTML-формы
*/

    // if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["msg"])) {
    if($_SERVER["REQUEST_METHOD" == "POST"]){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $msg = $_POST["msg"];
        // $gbook->savePost($name, $email, $msg);
        include "savepost.inc.php";

    }

    // if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["GET"])) {

        include "deletepost.inc.php";

    }

/*
ЗАДАНИЕ 5
- Проверьте, был ли запрос методом GET на удаление записи
- Если ДА, то подключите файл с кодом для удаления записи
*/

    if(!(empty($_GET[""]))){

        $gbook->deletePost();

    }

?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Гостевая книга</title>
        <meta charset="utf-8" />
    </head>
    <body>

        <h1>Гостевая книга</h1>
        <?php
        /* ЗАДАНИЕ 2
        - Проверьте, не является ли переменная $errMsg пустой строкой?
        - Если НЕТ, то выведите значение переменной $errMsg
        */

        if($errMsg){

            echo $errMsg;

        }

        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        Ваше имя:<br />
        <input type="text" name="name" /><br />
        Ваш e-mail:<br />
        <input type="text" name="email" /><br />
        Сообщение:<br />
        <textarea name="msg" cols="50" rows="5"></textarea><br />
        <br />
        <input type="submit" value="Добавить!" />

        </form>

        <?php
        /*
        ЗАДАНИЕ 4
        - Подключите файл с кодом для обработки полученных записей Гостевой книги
        */

        include "getall.inc.php";

        ?>

    </body>
</html>