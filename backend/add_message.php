<?php
session_start();
include_once 'database.php';
include 'get_data.php';

$message = $_POST['message'];
$hashtag = $_POST['hashtag'];
$field = $_POST['field'];

if (!in_array($hashtag, $_SESSION['hashtag'])) {
    array_push($_SESSION['hashtag'], $hashtag);
}

if (sql_query('SELECT * FROM hashtags WHERE name =' . add_quotes($hashtag))->num_rows == 0) {
    sql_query('INSERT INTO hashtags (`id`,`name`) VALUES (NULL,' . add_quotes($hashtag) . ')');
}


$hashtagId = sql_query('SELECT id FROM hashtags WHERE name = ' . add_quotes($hashtag))->fetch_assoc()['id'];
$fieldsTable = sql_query('SELECT * FROM Fields WHERE title =' . add_quotes($field));
$fieldId = sql_query('SELECT id FROM Fields WHERE title = ' . add_quotes($field))->fetch_assoc()['id'];
$relateHashtagIdCount = sql_query('SELECT id_hashtag FROM hashtagAndFields WHERE id_hashtag = ' . add_quotes($hashtagId))->num_rows;


if ($fieldsTable->num_rows == 1) {
    if ($relateHashtagIdCount == 0) {
        sql_query('INSERT INTO hashtagAndFields (`id_hashtag`, `id_field`) VALUES (' . add_quotes($hashtagId) . ',' . add_quotes($fieldId) . ')');
    }
}


if ($message != '') {
    sql_query('INSERT INTO SMS (`id`,`hashtag_id`,`Data`,`fields_id`) VALUES (NULL,' . add_quotes($hashtagId) . ',' . add_quotes($message) . ',' . add_quotes($fieldId) . ')');
}

header('Location: ../pages/main.php');
?>