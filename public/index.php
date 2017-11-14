<?php
/**
 * Created by PhpStorm.
 * User: navarrocantero
 * Date: 14/11/2017
 * Time: 00:02
 */

include_once '../config.php';
include_once '../connectdb.php';
include_once '../helpers.php';

$route = $_GET['route'] ?? '/';

switch ($route){
    case '/':
        require_once '../index.php';
        break;
    case 'showAlbum':
        require_once '../showAlbum.php';
        break;
    case 'addAlbum':
        require_once '../addAlbum.php';
        break;
    case 'addTrack':
        require_once '../addTrack.php';
        break;
    case 'details':
        require_once '../details.php';
        break;
    case 'delete':
        require_once '../delete.php';
        break;
}