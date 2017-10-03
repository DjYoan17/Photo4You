<?php require_once '.\include\connexionmysql.php'?>
<?php session_start() ?>
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
    <div id="nav">
    	<ul>
            <?php if(!empty($_SESSION['mail']) AND !empty($_SESSION['motdepasse']))
            {
                $req=$db->query("SELECT * from menu where idMenu!=4 and idMenu!=5 order by idMenu");
                while($a = $req->fetch()) {?>
            <li><a href="<?php echo $a['Lien'];?>"><?php echo $a['Nom'];?></a></li>
            <?php
                }
            }
            else
            {
                    $req=$db->query("SELECT * FROM menu order by idMenu");
                while ($a = $req->fetch()){?>
            <li><a href="<?php echo $a['Lien'];?>"><?php echo $a['Nom'];?></a></li>
                <?php }
            $req->closeCursor();}?>
        </ul>
    </div>