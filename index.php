<?php session_start();
require_once '.\include\connexionmysql.php'?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Photo For You</title>
<link rel="stylesheet" href="css/styles.css" type="text/css" />
</head>
<body>
<div id="container">
    <div id="header">
    	<h1><a href="index.php">Photo4You</a></h1>
        <?php if(isset($_SESSION['mail']))
        {
        echo("<h2>Bienvenue " . $_SESSION['pseudo'] . "</h2>");
        }?>
        <div class="clear"></div>
    </div>
    <?php require_once '.\include\header.php'?>
    <div id="body">
		<div id="content"></div>
        <div class="sidebar">
            <ul>
               <?php require_once '.\include\cotedroit.php'?>
            </ul>
        </div>
    	<div class="clear"></div>
    </div>
    <div id="footer">
        <div class="footer-bottom">
         </div>
    </div>
</div>
</body>
</html>