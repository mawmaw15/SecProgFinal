<?php

include "./../database/db.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['txtUsername'];
    $password = $_POST['txtPassword'];
    $hash_password = sha1($password);

    $sql = $conn->prepare("INSERT INTO users VALUES(
        null,
        '$username',
        '$hash_password'
    )") ;
    $sql->bind_param($_POST['txtUsername'], $_POST['txtPassword']);
    $sql->execute();
    $sql->close();

    $conn->query($sql);
    header("location: ./../login.php");
}

