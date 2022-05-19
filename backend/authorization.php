<?php
    session_destroy();
    session_start();
    include_once 'database.php';

    $type = $_POST['type'];
    $login = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['hashtag'] = []; 
     
    if ($type == 'log') {
        $userDB = sql_query('SELECT * FROM Users WHERE name = ' . add_quotes($login));
        if ($userDB->num_rows > 0) {
            $user = $userDB->fetch_assoc();
            if($user['password'] == $password) {
                $_SESSION['username'] = $login;
                $_SESSION['id'] = $row['id'];
                $_SESSION['type'] = 'log';
                header('Location: ../pages/main.php');
            } else {
                header('Location: ../index.php');
            }
        } else {
            header('Location: ../index.php');
        }
    } else if ($type == 'reg') {
        if (sql_query('SELECT * FROM Users WHERE name = ' . add_quotes($login))->num_rows > 0) {
            header('Location: ../index.php');
        } else {
            sql_query('INSERT INTO Users (`id`, `name`, `email`, `password`) VALUES (NULL,' . add_quotes($login) . ',NULL,' . add_quotes($password) . ')');
            $_SESSION['username'] = $login;
            $_SESSION['id'] = $row['id'];
            $_SESSION['type'] = 'reg';
            header('Location: ../pages/main.php');
        }
    }


?>