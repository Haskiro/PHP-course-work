<?php
    session_start();
    include '../backend/get_data.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <header class="bg-ligth">
        <div class="container">
            <nav class="navbar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <?php echo $_SESSION['username']; ?>
                    </a>
                    <a class="btn btn-primary" href="../index.php" role="button">Выйти</a>
                </div>
            </nav>
        </div>
    </header>
    <main class="container">
        <div class="d-flex justify-content-center mb-4">
            <form action="../backend/add_message.php" method="POST">
                <h2>Добавить сообщение</h2>
                <div class="mb-3">
                    <label for="message" class="form-label">Ваше сообщение</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="hashtag" class="form-label">Hashtag</label>
                    <input type="search" id="hashtag" name="hashtag" list="list" placeholder="exampletag" class="form-control" autocomplete="off">
                    <datalist id="list">
                        <?php 
                            for ($i = 0; $i < count($_SESSION['hashtag']); $i++) {
                                echo '<option value="' . $_SESSION['hashtag'][$i] . '">';
                            }
                        ?>
                    </datalist>
                </div>
                <div class="mb-3">
                    <label for="field" class="form-label">Область знаний</label>
                    <select name="field" id="field" class="form-select">
                        <?php
                            $fields = getFields();
                            for ($i = 0; $i < count($fields); $i++) {
                                echo '<option value="' . $fields[$i] . '">' . $fields[$i] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
        <div class="container row">
            <h2 class="mb-3">Сообщения</h2>
            <div class="row ">
                <?php
                    $messages = getTableMessages();
                    while($row = $messages->fetch_assoc()) {
                        $title = sql_query('SELECT title FROM `PHP-course-work`.`Fields` WHERE `id` =' . $row['fields_id'])->fetch_assoc()['title'];
                        $subtitle = sql_query('SELECT name FROM `PHP-course-work`.`hashtags` WHERE `id` =' . $row['hashtag_id'])->fetch_assoc()['name'];
                        $text = $row['Data'];
                        ?> 
                        <div class="col-4 mb-3">
                            <div class="card col-12">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $title ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $subtitle ?></h6>
                                    <p class="card-text"><?php echo $text ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>