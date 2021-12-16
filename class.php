<?php
class User {

    public $name, $age, $password, $fur;
    static $work = 'pupils';

    function __construct(){
        $this->fur ='TRUE';
    }
    final function get_password(){
        return $this->password;
    }
    function get_sp(){
        return self::$work;
    }
}

class NewUser extends User{
    public $city, $stripes;
    static $email = 'test@test.com';

    function __construct(){
        parent::__construct();
        $this->stripes = 'TRUE';
    }
    function display(){
        echo '<br>' . "Name: " . $this->name . '<br>';
        echo "Age: " . $this->age . '<br>';
        echo "Password: " . $this->password . '<br>';
        echo "City: " . $this->city . '<br>';
    }
    function get_sp(){
        return self::$email;
    }
    function get_sp_parent(){
        return parent::get_sp();
    }
}

$Tom = new NewUser;
$Tom->name = 'Tom'; $Tom->age = 17; $Tom->password = 'secret';

$Alice = clone $Tom;
$Alice->name = 'Alice'; $Alice->age = 16; $Alice->city = 'Moscow';

printr($Tom); printr($Alice);
echo 'Метод get_password(): ' . $Tom->get_password() . '<br>';
echo 'Метод get_sp(): ' . $Tom->get_sp() . '<br>';
echo 'Метод get_sp_parent(): ' . $Tom->get_sp_parent() . '<br>';
echo 'Вызов статического свойста $work: ' . User::$work . '<br>';
echo 'Вызов статического свойста $email: ' . NewUser::$email . '<br>';


$Alice->display();

function printr($data){
    print('<pre>');
    print_r($data);
    print('</pre>');
}