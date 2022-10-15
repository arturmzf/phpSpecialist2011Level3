<?php
	/*
	ЗАДАНИЕ 1
	- Создайте объект DOM
	- Загрузите XML-документ в объект
	- Получите корневой элемент
	*/

    $dom = new DOMDocument("1.0", "utf-8");
    $dom->load("catalog.xml");
    $root = $dom->documentElement;

    // echo($root->textContent);

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
	- Заполните таблицу необходимыми данными
	*/

    $children = $root->childNodes;

    foreach($children as $book){

        if($book->nodeType == 1){

            echo("<tr>");

            $booksChildren = $book->childNodes;

            foreach($booksChildren as $info){

                if($info->nodeType == 1){

                    echo("<td>");
                    echo($info->textContent);
                    echo("</td>");

                }

            }

            echo("</tr>");

        }

    }

?>
	</table>
</body>
</html>





