<?php require_once '.\include\connexionmysql.php'?>
<li>
    <h3>Menu</h3>
    <ul class="blocklist">
        
<?php
                    $req=$db->query("SELECT * FROM menu order by idMenu");
                while ($a = $req->fetch()){?>
            <li><a href="<?php echo $a['Lien'];?>"><?php echo $a['Nom'];?></a></li>
                <?php }
                $req->closeCursor();?>
    </ul></li>
    <?php 
    if (empty($_SESSION['mail']) AND empty($_SESSION['motdepasse']))
    {
    ?>
    <h3>Connexion</h3>
    <li>
        <form method='post' action="connexion.php">
            <label>Mail</label>
            <input type="text" name="mail" maxlenght="100">
            <label>Mot de passe</label>
            <input type="password" name="motdepasse" maxlenght="16">
            <input type="submit" value="Connexion">
        </form>
    </li>
    <?php } 
    else
    { ?>
    <p><a class="boutonDeco" href="deconnexion.php">Deconnexion</a></p>
    <?php
    }
    ?>


