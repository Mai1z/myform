
<?php

require_once __DIR__ . '/connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $errorMSG = '';
    $pattern_name = '/^[a-zA-Zа-яА-ЯЁё]{1,10}$/u';
    $pattern_age = '/^[0-9]{1,2}$/u';

    if (empty($_POST["name"])) {
        $errorMSG = "<li>Введите имя</li>";
    } elseif (!preg_match($pattern_name, $_POST["name"])){
        $errorMSG = "<li>Некорректное имя</li>";
    } elseif (empty($_POST["surname"])) {
        $errorMSG = "<li>Введите фамилию</li>";
    } elseif (!preg_match($pattern_name, $_POST["surname"])){
        $errorMSG = "<li>Некорректная фамилия</li>";
    } elseif (empty($_POST["age"])) {
        $errorMSG = "<li>Введите возраст</li>";
    } elseif (!preg_match($pattern_age, $_POST["age"])){
        $errorMSG = "<li>Некорректный возраст</li>";
    } else {
        $name = trim($_POST['name']);
        $surname = trim($_POST['surname']);
        $age = trim($_POST['age']);
    }


    $stmt = $connection->prepare("INSERT INTO about (name, surname, age) VALUES (:name, :surname, :age)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':surname', $surname);
    $stmt->bindParam(':age', $age);
    $stmt->execute();

    if(empty($errorMSG)){
        echo json_encode(['code'=>200]);
        exit;
    }
    echo json_encode(['code'=>404, 'msg'=>$errorMSG]);

}

else {
    echo '404';
}







