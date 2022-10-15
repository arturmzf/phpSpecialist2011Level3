<?php
	/*
	ЗАДАНИЕ 1
	- Опишите функцию-обработчик начальных тегов
	- Опишите функцию-обработчик закрывающих тегов
	- Опишите функцию-обработчик текстового содержимого
	- Создайте парсер
	- Зарегистрируйте функцию-обработчики начальных и конечных тегов
	- Зарегистрируйте функцию-обработчик текстового содержимого
	*/

    // Создание парсера
    $parserSax = xml_parser_create("UTF-8");

    // Определение функций обработки
    function onStart($parserSax, $tag, $attributes){

        if($tag != "CATALOG" && $tag != "BOOK"){
            echo("<td>");
        }
        if($tag == "BOOK"){
            echo("<tr>");
        }

    }

    function onEnd($parserSax, $tag){

        if($tag != "CATALOG" && $tag != "BOOK"){
            echo("</td>");
        }
        if($tag == "BOOK"){
            echo("</tr>");
        }

    }

    function onText($parserSax, $data){

        echo($data);

    }

    // Регистрация функций
    xml_set_element_handler($parserSax, "onStart", "onEnd");
    xml_set_character_data_handler($parserSax, "onText");

?>
<html>
	<head>
		<title>Каталог</title>
	</head>
	<body>
	<h1>Каталог книг</h1>
	<table border="1" width="100%">
		<tr>
			<th>Автор</th>
			<th>Название</th>
			<th>Год издания</th>
			<th>Цена, руб</th>
		</tr>
	<?php
		/*
		ЗАДАНИЕ 2
		- Запустите парсер
		*/

        xml_parse($parserSax, file_get_contents("catalog.xml"));

	?>
	</table>
	</body>
</html>