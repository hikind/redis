<?php
/**
 * Created by PhpStorm.
 * User: kindness
 * Date: 2019/2/28
 * Time: 19:52
 */

$redis = new Redis();
$redis->connect('127.0.0.1','6379');

return $redis;
