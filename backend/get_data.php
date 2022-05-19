<?php
include_once 'database.php';

function getFields() {
    $db = sql_query('SELECT * FROM Fields');
    $res = [];
    while ($row = $db->fetch_assoc()) {
        $res[] = $row['title'];
    }

    return $res;
}

function getHashtags() {
    $db = sql_query('SELECT * FROM hashtags');
    $res = [];
    while ($row = $db->fetch_assoc()) {
        $res[] = $row['name'];
    }

    return $res;
}

function getTableMessages() {
    $res = sql_query('SELECT * FROM SMS');

    return $res;
}
?>

