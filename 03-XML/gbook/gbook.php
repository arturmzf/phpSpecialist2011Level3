<?php
/* 
ЗАДАНИЕ 1
- Создайте константу для хранения имени XML-файла
- Проверьте, была ли отправлена HTML-форма?
	Если она была отправлена: отфильтруйте полученные данные
- Получите данные об IP-адресе пользователя	
- Получите данные о текущих дате и времени
*/

/*
ЗАДАНИЕ 2
- Создайте объект DOMDocument
- Проверьте, существует ли xml-документ с данными
	Если существует, загрузите его в созданный объект
	и получите корневой элемент
	Если не существует, создайте корневой элемент "users"
	и привяжите его к объекту
*/

    define("USERS", "users.xml");

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $name = stripslashes(trim(strip_tags($_POST["name"])));
        $email = stripslashes(trim(strip_tags($_POST["email"])));
        $msg = stripslashes(trim(strip_tags($_POST["msg"])));
        $ip = $_SERVER["REMOTE_ADDR"];
        $dateTime = time();

        $dom = new DOMDocument("1.0", "utf-8");
        // Добавили эти настройки в процессе выполнения лабораторной работы - чтобы XML был красивым, с переносами
        $dom->formatOutput = true;
        $dom->preserveWhiteSpace = false;

        if(file_exists(USERS)){
            $dom->load(USERS);
            $root = $dom->documentElement;
        }else{
            $root = $dom->createElement("users");
            $dom->appendChild($root);
        }

        $n = $dom->createElement("name", $name);
        $e = $dom->createElement("email", $email);
        $m = $dom->createElement("msg", $msg);
        $i = $dom->createElement("ip", $ip);
        $dt = $dom->createElement("dateTime", $dateTime);

        $user = $dom->createElement("user");
        $user->appendchild($n);
        $user->appendchild($e);
        $user->appendchild($m);
        $user->appendchild($i);
        $user->appendchild($dt);
        $root->appendChild($user);

        $dom->save(USERS);

        header("Location: gbook.php");
        exit;

    }

/*
ЗАДАНИЕ 3
- Cоздайте новый XML-элемент "user" для очередной записи
- Cоздайте XML-элементы для всех данных Гостевой книги:
	name, email, msg, IP, datetime
- Cоздайте текстовые узлы для всех указанных элементов
- Привяжите текстовые узлы к соответствующим XML-элементам
- Привяжите XML-элементы с данными заказа к XML-элементу "user"
- Привяжите XML-элемент "user" к корневому элементу "users"
- Сохраните файл
- Перезапросите страницу для избавления от посланных данных
*/	
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Гостевая книга</title>
        <meta charset="utf-8" />
    </head>
    <body>

        <h1>Гостевая книга</h1>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        Ваше имя:<br />
        <input type="text" name="name" /><br />
        Ваш E-mail:<br />
        <input type="text" name="email" /><br />
        Сообщение:<br />
        <textarea name="msg" cols="50" rows="5"></textarea><br />
        <br />
        <input type="submit" value="Добавить!" />

        </form>

        <?php
        /*
        ЗАДАНИЕ 4
        - Создайте объект SimpleXML и загрузите в него XML-документ
        - Выведите в браузер все сообщения, а также информацию
          об авторе каждого сообщения в произвольной форме
          в обратном порядке
        */
        ?>

    </body>
</html>