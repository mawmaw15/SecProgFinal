<?php

include "./../database/db.php";

if($_SERVER["REQUEST_METHOD"] == 'POST') {
    $username = $_POST['txtUsername'];
    $password = $_POST['txtPassword'];
    $hash_password = sha1($password);

    $sql = "SELECT * FROM 
        users WHERE 
        username = '$username'
        AND password = '$hash_password'";
    
    $result = $conn->query($sql);
    //$sql = $conn->prepare("SELECT users FROM users WHERE username = ? ");
    // $sql->bind_param("s", $username);
    // $sql->execute();
    // //$sql->close();

    // //$result = $conn->query($sql);
    // $result = $sql->get_result();
    // while($row = $result->fetch_assoc()){

    // }


    session_start();
    if($result->num_rows > 0) {
        // login success
        session_regenerate_id();
        $_SESSION['username'] = $username;

        if(isset($_POST['chkRemember'])) {
            setcookie(
                "username",
                $username,
                time() + 3600 * 24 * 3,
                "/",
                null,
                false,
                true
            );
            setcookie(
                "password",
                $password,
                time() + 3600 * 24 * 3,
                "/",
                null,
                false,
                true
            );
        }

        header("location: ./../index.php");
    } else {
        // login failed
        $_SESSION['error'] = "Wrong username or password";
        header("location: ./../login.php");
    }

    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // $username = $_POST['txtUsername'];
    // $password = $_POST['txtPassword'];

    // $sql = $conn->prepare('SELECT `id`, `password` FROM users WHERE username = ?');
    // $sql->bind_param('s', $username);

    // if (! $sql->execute()) {
    //     http_response_code(500);
    //     exit('Internal Server Error');
    // }

    // $result = $sql->get_result();
    // if (($fetchedUser = $result->fetch_object()) && password_verify($password, $fetchedUser->password)) {
    //     session_regenerate_id(true);

    //     $_SESSION['user_id'] = $fetchedUser->id;

    //     header('Location: ../index.php');
    //     http_response_code(302);
    //     exit;
    // }

    // $error = 'Incorrect username or password';

}