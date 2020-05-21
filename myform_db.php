
<?php

require_once __DIR__ . '/connection.php';

if (!empty($_POST))
{
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $age = trim($_POST['age']);

    $filterName = filter_var($name, FILTER_SANITIZE_STRING);
    $filterSurname = filter_var($surname, FILTER_SANITIZE_STRING);
    $filterAge = filter_var($age, FILTER_SANITIZE_NUMBER_INT);
}

$stmt = $connection->prepare("INSERT INTO about (name, surname, age) VALUES (:name, :surname, :age)");
$stmt->bindParam(':name', $filterName);
$stmt->bindParam(':surname', $filterSurname);
$stmt->bindParam(':age', $filterAge);
$stmt->execute();


