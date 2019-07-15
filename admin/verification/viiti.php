<?php
/**
 * Created by PhpStorm.
 * User: Dima Kruhlyi
 * Date: 5/10/2019
 * Time: 2:46 PM
 */
session_start();
session_destroy();
header("Location:../index.php");
?>