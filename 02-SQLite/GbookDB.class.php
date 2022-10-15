<?php

    include "IGbookDB.class.php";
    include "SQLiteDatabase";

/*
ЗАДАНИЕ 1
- Создайте класс GbookDB наследующий интерфейс IGbookDB
- Создайте константу класса DB_NAME и присвойте ей значение gbook.db - имя базы данных
- Создайте закрытое свойство $_db для хранения объекта соединения с базой данных
- Создайте конструктор, в котором выполняется подключение к базе данных
- Создайте деструктор, в котором выполняется закрытие соединения с базой данных
- Создайте временный объект gbook, экземпляр класса GbookDB
- Для проверки работоспособности кода запустите данный файл в браузере и убедитесь, что файл gbook.db создан
- Удалите файл gbook.db
*/

    echo sqlite_libversion();

class GbookDB implements IGbookDB {

        const DB_NAME = "gbook.db";
        private $_db;

        public function __construct(){

            if(!(file_exists(self::DB_NAME))){

                $sql = "CREATE TABLE msgs (
                            id INTEGER PRIMARY KEY,
                            name TEXT,
                            email TEXT,
                            msg TEXT,
                            datetime INTEGER,
                            ip TEXT)";

                $this->_db = new SQLiteDatabase(self::DB_NAME);
                $this->_db->query($sql);

            }else{

                $this->_db = new SQLiteDatabase(self::DB_NAME);

            }

        }

        public function __destruct(){

            unset($this->_db);

        }

        public function clearData($data) {

            return sqlite_escape_string(trim(strip_tags(stripslashes($data))));

        }

        public function savePost($name, $email, $msg){

            $ip = $_SERVER["REMOTE_ADDR"];
            $dt = time();

            $sql = "INSERT INTO msgs (name, email, msg, datetime, ip)
                        VALUES ('".$name."', '".$email."', '".$msg."', '".$dt."', '".$ip."');";

            $this->_db->query($sql);

        }

        public function getAll() {

            $sql = "SELECT id, name, email, msg, datetime, ip FROM msgs ORDER BY id DESC;";
            $result = $this->_db->arrayQuery($sql, SQLITE_ASSOC);

            return $result;

        }

        public function deletePost($id){

            $sql = "DELETE FROM msgs WHERE id = '".$id."';";
            $this->_db->query($sql);

        }

    }

/*
ЗАДАНИЕ 2
- Измените конструктор так, чтобы в нём выполнялась проверка, существует ли база данных на следующих условиях: 
  Если базы данных не существует, создайте ее и выполните SQL-операторы для добавления таблицы (файл gbook.sql). 
  В противном случае, выполняйте подключение к существующей базе данных
- Для проверки работоспособности кода запустите данный файл в браузере и убедитесь, что файл gbook.db создан  
*/

/*
ЗАДАНИЕ 3
- Опишите метод savePost. Смотрите описание метода в интерфейсе IGbookDB
- Получите данные о текущих дате и времени
- Получите данные об IP адресе пользователя	
- Сформируйте строку запроса на добавление новой записи
- Добавьте новую запись в таблицу msgs	
*/

/*
ЗАДАНИЕ 4
- Опишите метод getAll. Смотрите описание метода в интерфейсе IGbookDB
- Сформируйте строку запроса на выборку всех данных из таблицы msgs в обратном порядке
- Получите и верните результат запроса
*/

/*
ЗАДАНИЕ 5
- Опишите метод deletePost. Смотрите описание метода в интерфейсе IGbookDB
- Сформируйте строку запроса на удаление новой записи
- Удалите запись из таблицы msgs	
*/

/*
ЗАДАНИЕ 6 (Если останется время)
- Опишите в конструкторе, а также в методах getAll, savePost и deletePost блок try-catch
- Создайте исключения на ошибки при выполнении SQL-запросов	
*/
?>