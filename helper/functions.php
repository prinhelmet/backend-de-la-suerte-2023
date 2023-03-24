<?php

date_default_timezone_set('UTC');

function getOrders($mysqli) {
    $sql = "SELECT MAX(createdAt) AS createdAt FROM orders";
    return $mysqli->query($sql);
}

function setOrder($mysqli){
    $createdAt = date('Y-m-d\TH:i:sp');
    $sql = "INSERT INTO orders (createdAt) VALUES ('$createdAt')";
        return $mysqli->query($sql);
}

function showDatetime($time){
    $timestamp = strtotime($time);
    return date('H:i:s', $timestamp) . ' (' . date('Y-m-d', $timestamp) . ')';
}
