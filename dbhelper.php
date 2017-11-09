<?php
/**
 * Created by PhpStorm.
 * User: navarrocantero
 * Date: 02/11/2017
 * Time: 19:54
 */

function getSqlResult($id,$pdo){

    $sql = "Select * from tracks where id = :id";
    $result = $pdo->prepare($sql);
    $result->execute(['id' => $id]);
    return  $result->fetch(PDO::FETCH_ASSOC);
}

function getValue($from, $condition){
    return ($from[$condition]);
}