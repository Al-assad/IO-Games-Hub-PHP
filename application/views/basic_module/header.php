<?php
/**Created by Intellij IDEA
 * Author: Al-assad
 * E-mail: yulinying_1994@outlook.com
 * Github: https://github.com/Al-assad
 * Date: 2017/2/14 13:35
 * Description: 每个HTML页面的头部
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1，maximum-scale=1, user-scalable=no">
    <meta name="description" content="A simple site collecting IO games">
    <meta name="keywords" content="IO games,iogames,io games,io类游戏">
    <meta name="author" content="Al-assad">

    <!--引入依赖JS和CSS库-->
    <script src="<?php echo $base_url; ?>libraries/jquery-3.1.js"></script>
    <script src="<?php echo $base_url; ?>libraries/bootstrap/js/bootstrap.min.js"></script>
    <link href="<?php echo $base_url; ?>libraries/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="<?php echo $base_url;?>iogame.js"></script>
    <link href="<?php echo $base_url; ?>go_top.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>iogame.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>csshake.css" rel="stylesheet">
</head>
<body>

