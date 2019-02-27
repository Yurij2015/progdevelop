<?php
/**
 * Created by PhpStorm.
 * Date: 2019-02-27
 * Time: 9:59
 */
session_start();
require_once 'Session.php';
Session::destroy();
header('Location: index.php?msg=Вы вышли!');