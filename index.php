<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Login page</title>
</head>
<body>
    <div class="container justify-content-center align-items-center d-flex gap-4 min-vh-100">
        <div class="card card-body flex-grow-0" style="width: 400px;">
            <form action="./backend/authorization.php" method="POST">
                <h2>Войти</h2>
                <div class="mb-3">
                    <label for="logUsername" class="form-label">Логин</label>
                    <input type="text" class="form-control" name="username" id="logUsername">
                </div>
                <div class="mb-3">
                    <label for="logPassword" class="form-label">Пароль</label>
                    <input type="password" class="form-control" name="password" id="logPassword">
                </div>
                <input type="text" name="type" value="log" style="display: none;">
                <button type="submit" class="btn btn-primary">Войти</button>
            </form>
        </div>
        <div class="card card-body flex-grow-0" style="width: 400px;">
            <form action="./backend/authorization.php" method="POST" type="reg">
                <h2>Зарегистрироваться</h2>
                <div class="mb-3">
                    <label for="regUsername" class="form-label">Логин</label>
                    <input type="text" class="form-control" name="username" id="regUsername">
                </div>
                <div class="mb-3">
                    <label for="regPassword" class="form-label">Пароль</label>
                    <input type="password" class="form-control" name="password" id="regPassword">
                </div>
                <input type="text" name="type" value="reg" style="display: none;">
                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>