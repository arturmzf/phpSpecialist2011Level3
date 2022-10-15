<?php

    /*
	ЗАДАНИЕ 1
	- Создайте класс User со свойствами name, login и password
	- Создайте три объекта, экземпляра класса User
	- Задайте произвольные значения свойств name, login и password для каждого из объектов
	*/

    // К заданию №10
    abstract class AUser {

        abstract function showInfo();

    }

    class User extends AUser {

        public $name;
        public $login;
        public $password;

        // К заданию № 12
        static $usersCount = 0;

        // К заданию № 9
        const INFO_TITLE = "<h3>Данные пользователя:</h3><br />";

        public function __construct(){
            // К заданию № 12
            self::$usersCount++;
        }

        public function __clone(){

            // К заданию № 12
            self::$usersCount++;

            $this->name = "Guest";
            $this->login = "guest";
            $this->password = "qwerty";

        }

        // К заданию № 9
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

	/*
	ЗАДАНИЕ 2
	- В классе User опишите метод showInfo()
	- Метод showInfo() должен выводить значения свойств объектов
	- Вызовите метод showInfo() для каждого объекта
	*/

    echo(User::INFO_TITLE); // К 9-му заданию
    $user01->showInfo();
    echo(User::INFO_TITLE); // К 9-му заданию
    $user02->showInfo();
    echo(User::INFO_TITLE); // К 9-му заданию
    $user03->showTitle(); // К заданию № 9
    $user03->showInfo();

	/*
	ЗАДАНИЕ 3
	- В классе User опишите конструктор
	- Конструктор должен задавать начальные значения свойств name, login и password
	- Создайте заново три объекта, экземпляра класса User
	*/

    class User2
    {

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

    $user04 = new User2("Rinat", "rinat", "RiNaTkIn");
    $user04->showInfo();

	/*
	ЗАДАНИЕ 4
	- В классе User опишите метод __clone()
	- Метод __clone() должен задавать начальные значения свойств по умолчанию при копировании объектов
	- Значения свойств по умолчанию: name = "Guest", login = "guest", password = "qwerty" 
	- Создайте четвёртый объект скопировав один из имеющихся объектов
	*/

    $user05 = clone($user01);
    $user05->showInfo();

	/*
	ЗАДАНИЕ 5
	- Опишите класс SuperUser наследованный от класса User
	- В классе SuperUser опишите свойство role и создайте объект, экземпляр класса SuperUser
	- Задайте значение свойству role = "admin"
	- Вызовите метод showInfo() для созданного объекта 
	- Отдельно от метода showInfo() выведите значение свойства role
	*/

    // Для задания №11
    interface ISuperUser {

        function getInfo();

    }

    class SuperUser extends User implements ISuperUser {

        public $role;

        // К заданию № 12
        static $superUsersCount = 0;

        // Для задания № 6
        function __construct($name, $login, $password, $role){

            // К заданию № 12
            self::$superUsersCount++;

            $this->name = $name;
            $this->login = $login;
            $this->password = $password;
            $this->role = $role;

        }

        // Для задания № 6
        function showInfo(){

            echo("<b>Name:</b> ".$this->name."<br />");
            echo("<b>Login:</b> ".$this->login."<br />");
            echo("<b>Password:</b> ".$this->password."<br />");
            echo("<b>Role:</b> ".$this->role."<br />");
            echo("<br />");

        }

        // Для задания №11
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

    /*
    // Для задания № 5. Будет конфликтовать с заданием № 6, поэтому закомментил...
    $superUser1 = new SuperUser();
    $superUser1->role = "admin";
    $superUser1->showInfo(); // Будет пусто...
    echo($superUser1->role);
    */

    // Для задания № 6
    $superUser2 = new SuperUser("Super User", "root", "pass@Word1", "admin");
    $superUser2->showInfo();

    print_r($superUser2->getInfo());

	/*
	ЗАДАНИЕ 6
	- Опишите конструктор класса SuperUser, который будет задавать начальные значения свойств
	- В классе SuperUser опишите метод showInfo(), который будет выводить на экран значения всех свойств
	- Создайте заново объект класса SuperUser и вызовите метод showInfo().
	*/

    // См. выше

	/*
	ЗАДАНИЕ 7
	- Измените конструктор класса SuperUser, вызвав родительский конструктор
	- Передайте родительскому конструктору необходимые значения
	- Измените метод showInfo() класса SuperUser, вызвав родительский метод showInfo()
	- Передайте родительскому методу необходимые значения
	*/

    class SuperUser2 extends User2{

        public $role;

        function __construct($name, $login, $password, $role){

            // К заданию № 12
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

    $superUser3 = new SuperUser2("Second Super User", "root2", "pass@Word2", "admin");
    $superUser3->showInfo();

	/*
	ЗАДАНИЕ 8
	- Сделайте все параметры конструктора класса User параметрами по умолчанию со значениями "пустая строка"("")
	- В конструкторе класса User генерируйте исключение, если введены не все данные
	- Опишите перехват исключения и выводите в браузер сообщение об ошибке
	- Попробуйте создать экземпляр класса User без какого-либо параметра(-ов)
	*/

    class User08 {

        private $name;
        private $login;
        private $password;

        function __construct($name = "", $login = "", $password = ""){

            try{

                if(($name == "") || ($login == "") || ($password == "")) {
                    throw new Exception("Введены не все данные!");
                }

                // К заданию № 12
                User::$usersCount++;

                $this->name = $name;
                $this->login = $login;
                $this->password = $password;

            }catch(Exception $e08){

                echo $e08->getMessage();

            }

        }

    }

    $user08 = new User08("name", "login", "");


	/*
	ЗАДАНИЕ 9
	- Создайте константу класса User INFO_TITLE
	- Присвойте константе INFO_TITLE строковое значение "Данные пользователя:"
	- Обратитесь к константе INFO_TITLE перед вызовами метода showInfo()
	- Запустите код и проверьте его работоспособность
	- Создайте метод showTitle() в классе User
	- Опишите метод showTitle(), чтобы он выводил в браузер значение константы INFO_TITLE
	- Обратитесь к метод showTitle() перед вызовами метода showInfo()
	*/

    // См. выше

	/*
	ЗАДАНИЕ 10
	- Создайте абстрактный класс AUser
	- В абстрактном классе AUser объявите абстрактный метод showInfo()
	- Обновите класс User, унаследовав его от абстрактного класса AUser
	- Внесите в класс User необходимые изменения
	- Запустите код и проверьте его работоспособность
	*/

    // См. выше

	/*
	ЗАДАНИЕ 11
	- Создайте интерфейс ISuperUser
	- В интерфейс ISuperUser объявите метод getInfo()
	- Опишите метод getInfo() в классе SuperUser
	- Метод getInfo() должен возвращать ассоциативный массив, в котором 
	  именами ячеек являются имена свойств объекта, а значениями ячеек - значения свойств объекта
	- Вызовите метод getInfo() для экземпляра класса SuperUser
	- В цикле выведите данные, полученные с помощью метода getInfo()
	*/

    // См. выше

	/*
	ЗАДАНИЕ 12
	- Опишите в классах User и SuperUser статические свойства для подсчета количества созданных объектов
	- Присвойте этим свойствам начальные значения (0)
	- В конструкторах инкрементируйте значения данных свойств
	- После создания экземпляров классов User и SuperUser выведите в браузер количество тех и других объектов
	*/

    // См. выше в коде

	/*
	ЗАДАНИЕ 13
	- Опишите функцию checkObject(), которая принимает в качестве входящего параметра объект
	- Проверьте Ваш объект, используя следующие условия:
	  Если объект является экземпляром класса SuperUser, выводите сообщение,
		что данный пользователь обладает правами администратора
	  Если объект является экземпляром класса User, выводите сообщение,
		что данный пользователь является обычным пользователем
	  Если объект не является ни тем, ни другим, выводите сообщение, 
		что данный пользователь - неизвестный пользователь
	*/

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
	ЗАДАНИЕ 14
	- В директории "oop" создайте файл "User.class.php"
	- Перенесите описание класса User из файла "users.php" в файл "User.class.php"
	- В директории "oop" создайте файл "SuperUser.class.php"
	- Перенесите описание класса SuperUser из файла "users.php" в файл "SuperUser.class.php"
	- Посторите те же действия для класса AUser и интерфейса ISuperUser
	- В файле "users.php"(данный файл) опишите функцию __autoload(),
		которая автоматически присоединяет файлы с описанием классов к файлу "users.php"
	*/
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

    // К заданию № 12
    echo("<hr />");
    echo("Количество User: ".User::$usersCount."<br />");
    echo("Количество SuperUser: ".SuperUser::$superUsersCount."<br />");

    checkObject($user01);
    checkObject($superUser2);
    checkObject($superUser3);

?>