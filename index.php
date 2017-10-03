<?php session_start(); ?>
<?php require_once '.\include\connexionmysql.php'?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Photo For You</title>
<link rel="stylesheet" href="css/styles.css" type="text/css" />
</head>
<body>
<div id="container">
	<div id="header">
    	<h1><a href="/">Photo4You</a></h1>
        <h2>Des photos pros, pour les pros !</h2>
        <div class="clear"></div>
    </div>
    <?php require_once '.\include\header.php'?>
    <div id="body">
		<div id="content">
			</div>
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
