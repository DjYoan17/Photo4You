<?php require_once '.\include\connexionmysql.php'?>
<div id="nav">
    	<ul>
            <?php if(!empty($_SESSION['mail']) AND !empty($_SESSION['motdepasse']))
            {
                /*Affichage du Menu en haut de la page du site*/
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
