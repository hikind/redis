<?php
/**
 * Created by PhpStorm.
 * User: kindness
 * Date: 2019/3/1
 * Time: 20:19
 */
//清空session
session_start();
session_destroy();
//跳转到登录页
header('Location:login.php');